<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Base_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		# code...
	}

	public function add_category()
	{
		$data = array();
		Template::set_view('v_category_add');
        Template::set($data);
        Template::render();
	}




}