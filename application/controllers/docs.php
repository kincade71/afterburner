<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docs extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ADS_model', 'ads');
			$this->data['ResourceAreas'] = $this->ads->get_resource_areas();
		$this->load->model('Create_model', 'create');
		
		//CHECK TO SEE WHETHER OR NOT THIS USER HAS COMPLETED ALL THE SETUP STEPS,
		//IF NOT, RE-ROUTE TO /setup
	}

	function index()
	{	
		$this->data['current_page'] = 'Welcome to the Documentation Creator!';
		$this->data['content'] = 'index';
		$this->data['page_title'] = 'ODS Documentation';
		$this->load->view('template', $this->data);
	}

	function create_form()
	{
		$resourcesAreas = $this->ads->get_resource_areas();
		$this->data['current_page'] = 'Create Documentation';
		foreach($this->data['ResourceAreas'] as $r => $info){
			$this->data['resourceAreas'][$info['ResourceAreaId']] = $r;
		}
		$this->data['content'] = 'create_form';
		$this->data['page_title'] = 'Create | ODS Documentation';
		$this->load->view('template', $this->data);
	}

	function edit_form()
	{
		$resource = $this->uri->segment(2);
		$item = $this->uri->segment(3);
		$resource_label = ucwords(str_replace("_", " ", $this->uri->segment(2)));
		$item_label = ucwords(str_replace("_", " ", $this->uri->segment(3)));
		
		$this->data['current_page'] = '<a href="' . base_url() . $resource . '/' . $item .'" >' . $item_label . '</a> &nbsp;&#8250;&nbsp; Edit Documentation';
		$this->data['resource'] = $resource_label;
		$this->data['item'] = $item_label;
		
		$this->data['DocItem'] = $this->ads->get_doc_item($resource_label,$item_label);
		
		$resourcesAreas = $this->ads->get_resource_areas();
		foreach($this->data['ResourceAreas'] as $r => $info){
			$this->data['resourceAreas'][$info['ResourceAreaId']] = $r;
		}
		$this->data['hidden'] = ($this->data['DocItem']['DocItemId'])?array('DocItemId'=>$this->data['DocItem']['DocItemId']):array();
		$this->data['content'] = 'edit_form';
		$this->data['page_title'] = 'Create | ODS Documentation';
		$this->load->view('template', $this->data);
	}
	
	

	function view_doc()
	{	
		$resource = $this->uri->segment(1);
		$item = $this->uri->segment(2);
		$resource_label = ucwords(str_replace("_", " ", $this->uri->segment(1)));
		$item_label = ucwords(str_replace("_", " ", $this->uri->segment(2)));
		
		
		$this->data['current_page'] = '<a href="' . base_url() . $resource . '" >' . $resource_label . '</a> &nbsp;&#8250;&nbsp; ' . $item_label;
		$this->data['resource_label'] = $resource_label;
		$this->data['item_label'] = $item_label;
		$this->data['resource'] = $resource;
		$this->data['item'] = $item;
		
		$this->data['DocItem'] = $this->ads->get_doc_item($resource_label,$item_label);
		$this->data['content'] = 'view_doc';
		$this->data['page_title'] = 'ODS Documentation';
		$this->load->view('template', $this->data);
	}

	function view_resource()
	{	
		$resource = ucwords(str_replace("_", " ", $this->uri->segment(1)));
		$this->data['current_page'] = $resource;
		$this->data['resource'] = $resource;
		$this->data['content'] = 'index';
		$this->data['page_title'] = 'ODS Documentation';
		$this->load->view('template', $this->data);
	}
	
	
	////////////////////////////////////////////////
	function add_doc_field(){
		$FieldName = $this->input->post('FieldName');
		$added = $this->create->add_resource_area($FieldName);
		
		if($added)
			echo $added;
		else
			echo 'Fail';
	}
	
	function add_doc_item(){
		$DocItem = $this->input->post('DocItem');
		$DocItemContent = $this->input->post('DocItemContent');
		$ResourceArea = $this->input->post('ResourceArea');
		$added = $this->create->add_doc_item($DocItem, $DocItemContent, $ResourceArea);
		
		if($added)
			echo $added;
		else
			echo 'Fail';

	}
	
	
	function update_doc_item(){
		$DocItemId = $this->input->post('DocItemId');
		$DocItem = $this->input->post('DocItem');
		$DocItemContent = $this->input->post('DocItemContent');
		$ResourceArea = $this->input->post('ResourceArea');
		
		$updated = $this->create->update_doc_item($DocItemId, $DocItem, $DocItemContent, $ResourceArea);
		
		if($updated)
			echo 'Pass';
		else
			echo 'Fail';

	}
}
