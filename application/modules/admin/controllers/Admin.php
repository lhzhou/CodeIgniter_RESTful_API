<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends Base_Controller  {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model', 'am');
	}

    public function login()
    {
        $this->is_required('POST' , array('username' , 'password'));
        $input = $this->input->post();
        $username = $input['username'];
        $password = md5($input['password']);
        $response = $this->am->admin_login($username , $password);

        if($response){
            $this->response(
                array(
                    MESSAGE => Status_Code::ACCOUNT_LOGIN_SUCCESS,
                    RESULTS => $response

                )
            );
        }else{
            $this->response(
                array(
                    MESSAGE => Status_Code::ACCOUNT_LOGIN_FAILURE
                ),
                HEADER_NOT_FOUND
            );

        }
    }

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */