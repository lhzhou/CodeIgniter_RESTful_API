<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends Base_Controller  {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('account_model' , 'am');
	}

	public function account_login()
	{
		$this->is_required('POST' , array('username' , 'password'));
		$input = $this->input->post();
		$username = $input['username'];
		$password = md5($input['password']);

		$response = $this->am->account_login($username , $password);

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


	public function create()
	{
		$this->load->helper('string');


		$this->is_required('POST' , array('username' , 'password'));
		$input = $this->input->post();


		$results = $this->am->account_exists($input['username']);
		if($results == false){
			$this->response(
					array(
							MESSAGE => Status_Code::ACCOUNT_EXISTS
					),
					HEADER_NOT_FOUND
			);
			return false;
		}

		$params['username'] = $input['username'];
		$params['password'] = md5($input['password']);
		$params['salt'] = random_string('alnum', 8);

		$response = $this->am->create_account($params);
		if($response){
			$this->response(
					array(
							MESSAGE => Status_Code::CREATE_ACCOUNT_SUCCESS
					)
			);
		}else{
			$this->response(
					array(
							MESSAGE => Status_Code::CREATE_ACCOUNT_FAILURE
					),
					HEADER_NOT_FOUND
			);

		}
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */