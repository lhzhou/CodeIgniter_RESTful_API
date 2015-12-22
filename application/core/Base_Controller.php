<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Base_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    /**
     * @return int u_id
     */
    protected function get_user_id()
    {
        return 2;
    }
    
    // Output formats
    protected $output_formats = array(
        'json' 	=> 'application/json'
    );
    
    /**
     * @params array $data
     * @params int $status_code
     */
    protected function response($data, $status_code = 200)
    {
        foreach($data as $k=>$v)
        {
            switch($k)
            {
                case 'code':
                    $output_data['code'] = $v;
                    break;

                case 'message':
                    $output_data['status_code'] = $v;
                    $output_data['message'] = $this->get_message($v);

                    break;

                case 'total':
                    $output_data['total'] = $v;
                    break;

                case 'results':
                    $output_data['results'] = $v;
                    break;

                case 'errors':
                    $output_data['errors'] = $v;
                    break;

                default:
                    $output_data[$k] = $v;
            }
        }

        if (isset($output_data))
        {
            // set http response header
            $this->output->set_status_header($status_code);
            $output = json_encode($output_data);

        }
        else
        {
            // set http response header
            $this->output->set_status_header(HEADER_INTERNAL_SERVER_ERROR);
            $output = json_encode(array(MESSAGE => 'Internal server error: Try again later.'));
        }

        // set output content type
        $this->output->set_header('Content-Type: '.$this->output_formats['json'].'; charset=utf-8');

        // send output
        $this->output->set_output($output);
    }

    /**
     * @param $type
     * @param null $rules
     * @param bool|TRUE $chekZero
     */
    protected function is_required($type, $rules = NULL, $chekZero = TRUE)
    {
        $type = strtolower($type);

        switch ($type) {
            case 'post':
                $param = $this->input->post();
                break;
            case 'get':
                $param = $this->input->get();
                break;
            default:
                $this->invalid_params($rules);
                break;
        }
        foreach ($rules as $value)
        {
            if(!isset($param[$value]))
            {
                $this->invalid_params($value);
            }
            else
            {
                $val = trim($param[$value]);
                if(is_null($val))
                {
                    $this->invalid_params($value);
                }

                if($chekZero){
                    if(empty($val)){
                        $this->invalid_params($value);
                    }
                }
            }
        }
    }

    /**
     * @param $str
     * @param $salt
     * @return encrypt;
     */

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

    protected function invalid_params($paramName = NULL)
    {
        header("Content-Type: application/json");
        header("Cache-Control: no-store");
        header("HTTP/1.1 ". HEADER_NOT_FOUND);
        // Output json and die
        echo json_encode(array('status_code'=>HEADER_NOT_FOUND, 'message' => $paramName ? "Invalid or missing parameters: $paramName" : "Invalid or missing parameters."));
        die;
    }

    /**
     * @param int $num
     * @return string
     */
    protected function  makecode($num=4) {
        $re = '';
        $s = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        while(strlen($re)<$num) {
            $re .= $s[rand(0, strlen($s)-1)]; //从$s中随机产生一个字符
        }
        return $re;
    }

    protected function get_message($code)
    {
        $this->load->model('common_message');
        return $this->common_message->get_message($code);
    }

    protected function get_date()
    {
        return date('Y-m-d : h:i:s');
    }

    protected function get_page()
    {
        $page = $this->input->get_post('page');
        return $page ? $page : DEFAULT_PAGE ;
    }
    protected function get_limit()
    {
        $limit = $this->input->get_post('limit');
        return $limit ? $limit : DEFAULT_LIMIT;
    }

    protected function xml_to_json($source) {
        if(is_file($source)){
            $xml_array=simplexml_load_file($source);
        }else{
            $xml_array=simplexml_load_string($source);
        }
        $json = json_encode($xml_array);
        return $json;
    }

    protected function xml_to_array($source) {
        if(is_file($source)){
            $xml_array=simplexml_load_file($source);
        }else{
            $xml_array=simplexml_load_string($source);
        }
//        $json = json_encode($xml_array);
        return $xml_array;
    }


}

/* End of file Base_Controller.php */
/* Location: ./application/core/Base_Controller.php */