<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Base_Controller {

	public function index()
	{

		$headers['X_AUTHORIZATION'] = '4b1c1a6072dcc34ddbc7dcaa96988559'; 
		$resutls = $this->get('http://localhost/lhcloud/api/index.php/get/accounts/get_user_profile',array(),$headers);

	}

	public function login($value='')
	{
		$this->load->view('v_login');

	}

	public function out($value='')
	{
		$this->session->unset_userdata('user_token');
		$this->session->unset_userdata('admin_name');
		redirect('home', 'refresh');
	}
}
