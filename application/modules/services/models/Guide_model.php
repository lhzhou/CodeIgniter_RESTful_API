<?php

/**
 * Created by PhpStorm.
 * User: zhoulin
 * Date: 20/12/15
 * Time: 下午3:29
 */
class Guide_model extends Base_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_category($data='' , $total = false)
    {

        $this->db->from('guide_category');

        if(!empty($data['id'])){
            $this->db->where('id' , $data['id']);
        }

        if(!empty($data['type_id'])){
            $this->db->where('type_id' , $data['type_id']);
        }

        if(!empty($data['name'])){
            $this->db->like('name' , $data['name']);
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
        $this->db->insert('guide_category' , $data);
        $id = $this->db->insert_id();
        return $id ? true : false;
    }

    public function update_category($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('guide_category' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function delete_category($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('guide_category' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function get_guide($data='' , $total = false)
    {

        $this->db->from('guide');

        if(!empty($data['id'])){
            $this->db->where('id' , $data['id']);
        }

        if(!empty($data['type_id'])){
            $this->db->where('type_id' , $data['type_id']);
        }

        if(!empty($data['name'])){
            $this->db->like('name' , $data['name']);
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

    public function create_guide($data)
    {
        $this->db->insert('guide' , $data);
        $id = $this->db->insert_id();
        return $id ? true : false;
    }

    public function update_guide($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('guide' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function delete_guide($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('guide' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }
}