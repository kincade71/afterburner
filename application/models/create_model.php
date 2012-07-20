<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create_model extends CI_Model {
	
	public function __contstruct(){
		parent::__construct();
	}

	function add_resource_area($area, $description=NULL){
		$insert_data = array(
					'ResourceArea' => $area,
					'Description' => $description,
					'AddedBy' => 1,
					'AddedOn' => date('Y-m-d h:i:s')
				);
		$insert = $this->db->insert('ads_resource_areas', $insert_data);
		if($insert){
			$newest = $this->db->get_where('ads_resource_areas', array('ResourceArea'=>$area));
			if($newest && $newest->num_rows()>0){
				$data = $newest->first_row('array');
				return $data['ResourceAreaId'];
			}
		}
	}

	function add_doc_item($docItem, $content=NULL, $area){
		$insert_data = array(
					'DocItem' => $docItem,
					'DocItemContent' => $content,
					'ResourceAreaId' => $area,
					'AddedBy' => 1,
					'AddedOn' => date('Y-m-d h:i:s')
				);
		$insert = $this->db->insert('ads_doc_items', $insert_data);
		if($insert){
			$newest = $this->db->get_where('ads_doc_items', array('DocItem'=>$docItem, 'DocItemContent'=>$content));
			if($newest && $newest->num_rows()>0){
				$data = $newest->first_row('array');
				return $data['DocItemId'];
			}
		}
	}
	

	function update_doc_item($DocItemId, $docItem, $content=NULL, $area){
		$insert_data = array(
					'DocItem' => $docItem,
					'DocItemContent' => $content,
					'ResourceAreaId' => $area,
					'AddedBy' => 1,
					'AddedOn' => date('Y-m-d h:i:s')
				);
		$this->db->where('DocItemId', $DocItemId);
		$update = $this->db->update('ads_doc_items', $insert_data);
		return $DocItemId;
	}

}