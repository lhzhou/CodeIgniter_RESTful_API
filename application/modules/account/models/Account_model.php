<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_Model extends Base_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create_account($data)
    {
        $this->db->insert('account_login' , $data);
        $id = $this->db->insert_id();
        if($id){
            $this->_create_token($id);
            $this->_create_profile($id);
            $this->_create_finance($id,$data['salt']);
            return true;
        }else{
            return false;
        }
    }

    public function account_login($username,$password)
    {
        $this->db->select('a.username , b.token');
        $this->db->from('account_login a');
        $this->db->join('account_token b' , 'a.id = b.u_id');
        $this->db->where('a.username' , $username);
        $this->db->where('a.password' , $password);
        $this->db->where('a.active' , 'Y');
        $rs = $this->db->get()->row();

        if($rs){
            return $rs;
        }else{
            return false;
        }

    }

    private function _create_token($id)
    {
        $token = md5(md5(mt_rand(1000 , 9999)).time());
        $data['u_id'] = $id;
        $data['token'] = $token;
        $this->db->insert('account_token' , $data);
        
    }

    private function _create_profile($id)
    {
        $data['u_id'] = $id;
        $data['name'] = NULL;
        $data['email'] = NULL;
        $data['gender'] = NULL;
        $data['phone'] = NULL;
        $this->db->insert('account_profile' ,$data);
    }

    private function _create_finance($id,$salt)
    {
        $data['u_id'] = $id;
        $data['balance'] = $this->encrypt(0,$salt);
        $this->db->insert('account_finance' , $data);
    }

    public function account_exists($username)
    {
        $condition['username'] =$username;
        $num = $this->db->get_where('account_login' )->num_rows();

        if($num == 0){
            return true;
        }else{
            return false;
        }
    } 
    

}