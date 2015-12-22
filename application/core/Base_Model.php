<?php
/**
 * Created by PhpStorm.
 * User: zhoulin
 * Date: 19/12/15
 * Time: 下午6:03
 */
class Base_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    protected function set_message($code)
    {
        $this->load->model('common_message');
        $message =  $this->common_message->get_message($code);
        $this->response_message->set_message($message);
    }

    protected function set_results($array)
    {
        $this->response_message->set_results($array);

    }

    protected  function encrypt($str , $salt){
        $this->load->library('encryption');

        $this->encryption->initialize(
            array(
                'driver' => 'OpenSSL',
                'key' => $salt
            )
        );
        $hash =$this->encryption->encrypt($str);
        return $hash;
    }

    /**
     * @param $str
     * @param $salt
     * @return decrypt
     */
    protected function decrypt($str , $salt)
    {
        $this->load->library('encryption');

        $this->encryption->initialize(
            array(
                'driver' => 'OpenSSL',
                'key' => $salt
            )
        );
        $hash =$this->encryption->decrypt($str);
        return $hash;
    }

}

