<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

    public function admin_login($username,$password)
    {
        $this->db->select('a.username , b.token');
        $this->db->from('account_login a');
        $this->db->join('account_token b' , 'a.id = b.u_id');
        $this->db->join('account_admin c' , 'a.id = c.u_id');
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

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */
?>