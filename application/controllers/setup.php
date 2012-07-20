<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ADS_model', 'ads');
			$this->data['ResourceAreas'] = $this->ads->get_resource_areas();
		$this->load->model('Create_model', 'create');
	}

	function index()
	{	
		$this->data['current_page'] = 'Set Up Your Documentation Creator';
		$this->data['content'] = 'setup';
		$this->data['page_title'] = 'ODS Documentation';
		$this->load->view('template', $this->data);
	}

	function database()
	{	
		$this->load->model('Setup_model', 'setup');
		$this->data['database'] = $this->setup->create_tables();
		
		$this->data['current_page'] = 'Create Database Tables';
		$this->data['content'] = 'create_database';
		$this->data['page_title'] = 'ODS Documentation';
		$this->load->view('template', $this->data);
	}
}
