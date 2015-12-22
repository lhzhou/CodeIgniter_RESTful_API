<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_message extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_message($code)
    {   $condition['code'] = $code;
        $message =  $this->db->get_where('common_message' , $condition)->row('message');
        return ($message)? $message : "未知的消息($code)";

    }

    protected function _getMessage()
    {

    }

}