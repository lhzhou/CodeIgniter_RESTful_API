<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends Base_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->is_login();
	}	

	public function index($value='')
	{	
		$data = array();

		Template::set_view('v_type_list');
        Template::set($data);
        Template::render();
	}

	public function add_type($value='')
	{
		if ($this->input->is_ajax_request()) {
            $this->ajaxConfirmAddType();
            return;
        }

		$data = array();

		Template::set_view('v_type_add');
        Template::set($data);
        Template::render();
	}

	private function ajaxConfirmAddType(){

		// $name = $this->input->post('type_name');
		// $params['name_cn'] = $name['cn'];
		// $params['name_en'] = $name['en'];

		// echo json_encode($params);exit();
		
		$out['method'] = 'redirect';
		$out['message'] = '添加成功';
		$out['url'] = site_url('category/type/index');

		// $out['method'] = 'alert';
		// $out['message'] = '添加失败';
		$this->output->set_content_type('application/json')->set_output(json_encode($out));

		// echo json_encode($this->input->post());exit();
	}

}