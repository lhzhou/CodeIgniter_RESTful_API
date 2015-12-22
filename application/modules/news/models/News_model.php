<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Created by PhpStorm.
 * User: zhoulin
 * Date: 19/12/15
 * Time: 下午9:06
 */
class News_model extends Base_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_category($data='' , $total = false)
    {

        $this->db->from('news_category');

        if (!$total) {

            if(!empty($data['id'])){
                $this->db->where('id' , $data['id']);
            }

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
        $this->db->insert('news_category' , $data);
        $id = $this->db->insert_id();
        return $id ? true : false;
    }

    public function update_category($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('news_category' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function delete_category($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('news_category' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function get_special($data='' , $total = false)
    {

        $this->db->from('news_special');

        if (!$total) {

            if(!empty($data['id'])){
                $this->db->where('id' , $data['id']);
            }

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

    public function create_special($data)
    {
        $this->db->insert('news_special' , $data);
        $id = $this->db->insert_id();
        return $id ? true : false;
    }

    public function update_special($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('news_special' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function delete_special($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('news_special' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function get_news($data='' , $total = false)
    {

        $this->db->from('news_content');

        if (!$total) {

            if(!empty($data['id'])){
                $this->db->where('id' , $data['id']);
            }

            if(!empty($data['category'])){
                $this->db->where('category_id' , $data['category_id']);
            }

            if(!empty($data['special'])){
                $this->db->where('special_id' , $data['special_id']);
            }

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

    public function create_news($data)
    {
        $this->db->insert('news_content' , $data);
        $id = $this->db->insert_id();
        return $id ? true : false;
    }

    public function update_news($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('news_content' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }

    public function delete_news($id , $data)
    {
        $this->db->where('id' , $id);
        $this->db->update('news_content' ,$data);
        $rs = $this->db->affected_rows();
        return $rs ? true : false;
    }



}