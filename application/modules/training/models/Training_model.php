<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: zhoulin
 * Date: 20/12/15
 * Time: 上午12:05
 */
class Training_model extends Base_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_category($data='' , $total = false)
    {

        $this->db->from('training_category');

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
        $this->db->insert('training_category' , $data);
        $id = $this->db->insert_id();
        return $id ? true : false;
    }

    public function update_category($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('training_category' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function delete_category($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('training_category' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }
    //培训机构

    public function get_org($data='' , $total = false)
    {

        $this->db->from('training_org');

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

    public function create_org($data)
    {
        $this->db->insert('training_org' , $data);
        $id = $this->db->insert_id();
        return $id ? true : false;
    }

    public function update_org($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('training_org' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function delete_org($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('training_org' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    //培训课程

    public function get_course($data='' , $total = false)
    {

        $this->db->from('training_course');

        if(!empty($data['id'])){
            $this->db->where('id' , $data['id']);
        }

        if(!empty($data['category_id'])){
            $this->db->where('category_id' , $data['category_id']);
        }

        if(!empty($data['org_id'])){
            $this->db->where('org_id' , $data['org_id']);
        }

        if(!empty($data['name'])){
            $this->db->like('name' , $data['name']);
        }

        if (!$total) {

            $this->db->limit($data['limit'],(($data['page']-1)*$data['limit']) );
            $this->db->order_by('sort', 'desc');
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

    public function create_course($data)
    {
        $this->db->insert('training_course' , $data);
        $id = $this->db->insert_id();
        return $id ? true : false;
    }

    public function update_course($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('training_course' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function delete_course($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('training_course' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }



}