<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ab extends CI_Controller {
	
	private $data;

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
		$this->data['content'] = 'index';
		$this->data['page_title'] = '';
		$this->load->view('template', $this->data);
	}
}
