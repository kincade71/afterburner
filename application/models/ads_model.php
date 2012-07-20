<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ADS_model extends CI_Model {
	
	public function __contstruct(){
		parent::__construct();
	}
	
	function get_resource_areas(){
		$this->db->select('ads_resource_areas.ResourceAreaId, ads_resource_areas.ResourceArea, DocItem');
		$this->db->join('ads_doc_items', 'ads_doc_items.ResourceAreaId = ads_resource_areas.ResourceAreaId', 'LEFT');
		$query = $this->db->get('ads_resource_areas');
		
		if($query && $query->num_rows()){
			foreach($query->result_array() as $item){
				if(!isset($data[$item['ResourceArea']]))
					$data[$item['ResourceArea']] = array('ResourceAreaId'=>$item['ResourceAreaId']);
				if($item['DocItem'])
					$data[$item['ResourceArea']]['Items'][] = $item['DocItem'];
			}
			return $data;
		}
	}
	
	function get_resource_id($ResourceArea){
		$this->db->select('ResourceAreaId');
		$query = $this->db->get_where('ads_resource_areas', array('ResourceArea'=>$ResourceArea));
		if($query && $query->num_rows()>0){
			$data = $query->first_row('array');
			return $data['ResourceAreaId'];
		}
	}
	
	function get_doc_item($ResourceArea,$DocItem){
		$ResourceAreaId = $this->get_resource_id($ResourceArea);
		$query = $this->db->get_where('ads_doc_items', array('DocItem'=>$DocItem, 'ResourceAreaId'=>$ResourceAreaId));
		
		if($query && $query->num_rows()>0){
			return $query->first_row('array');
		}
	}
	
	function get_doc_item_byid($DocItemId){
		$query = $this->db->get_where('ads_doc_items', array('DocItemId'=>$DocItemId));
		
		if($query && $query->num_rows()>0){
			return $query->first_row('array');
		}
	}
	
	

}