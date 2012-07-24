<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ab extends CI_Controller {
	
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->model('ADS_model', 'ads');
		$this->data['ResourceAreas'] = $this->ads->get_resource_areas();	
		$this->load->model('Create_model', 'create');
		$this->load->model('setup_model', 'setup');
	}

	function index()
	{	
		//run setup
		$map= directory_map('application/config/');
			if(!in_array(md5('config').'txt',$map)){
				$this->data['current_page'] = 'Set Up Your Documentation Creator';
				$this->data['content'] = 'setup';
				$this->data['page_title'] = 'Set Up Your Documentation Creator';
				$this->load->view('template', $this->data);
			}else{
				$this->data['current_page'] = '';
				$this->data['content'] = 'index';
				$this->data['page_title'] = '';
				$this->load->view('template', $this->data);
		}
	}
	
	function setup_afterburner(){
	$this->setup->create_config($this->input->post('localhost'),$this->input->post('username'),$this->input->post('password'),$this->input->post('database'),$this->input->post('driver'));	
	
	$this->setup->create_tables();
	
	redirect(base_url());	
	}
}
