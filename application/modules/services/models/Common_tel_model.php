<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: zhoulin
 * Date: 20/12/15
 * Time: 上午10:33
 */
class Common_tel_model extends Base_Model 
{
	function __construct()
    {
        parent::__construct();
    }

	public function get_category($data='' , $total = false)
    {

        $this->db->from('common_tel_category');

        if(!empty($data['id'])){
            $this->db->where('id' , $data['id']);
        }

        if (!$total) {

            $this->db->limit($data['limit'],(($data['page']-1)*$data['limit']) );
            $this->db->order_by('id', 'desc');
        }

        $this->db->where('deleted_at' , NULL);
        $rs = $this->db->get();
        if (!$total) {
            return empty($data['id'])? $rs->result() : $rs->row() ;
        }else{
            return $rs->num_rows();
        }
    }

    public function create_category($data)
    {
        $this->db->insert('common_tel_category' , $data);
        $id = $this->db->insert_id();
        return $id ? true : false;
    }

    public function update_category($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('common_tel_category' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function delete_category($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('common_tel_category' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function get_tel($data='' , $total = false)
    {

        $this->db->from('common_tel');

        if(!empty($data['id'])){
            $this->db->where('id' , $data['id']);
        }

        if (!$total) {

            $this->db->limit($data['limit'],(($data['page']-1)*$data['limit']) );
            $this->db->order_by('id', 'desc');
        }

        $this->db->where('deleted_at' , NULL);
        $rs = $this->db->get();
        if (!$total) {
            return empty($data['id'])? $rs->result() : $rs->row() ;
        }else{
            return $rs->num_rows();
        }
    }

    public function create_tel($data)
    {
        $this->db->insert('common_tel' , $data);
        $id = $this->db->insert_id();
        return $id ? true : false;
    }

    public function update_tel($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('common_tel' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function delete_tel($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('common_tel' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

}