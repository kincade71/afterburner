<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup_model extends CI_Model {
	
	public function __contstruct(){
		parent::__construct();
	}

	function create_tables(){
		//MIGRATE THIS TO dbforge IF POSSIBLE
		
		//----------------------
		$sql = "
				CREATE TABLE IF NOT EXISTS `ads_doc_items` (
				  `DocItemId` int(11) NOT NULL AUTO_INCREMENT,
				  `DocItem` varchar(100) NOT NULL,
				  `DocItemContent` text NOT NULL,
				  `ResourceAreaId` int(11) NOT NULL,
				  `AddedBy` int(11) NOT NULL,
				  `AddedOn` datetime NOT NULL,
				  PRIMARY KEY (`DocItemId`)
				) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
		$docItems = $this->db->query($sql);

		$sql = "
				CREATE TABLE IF NOT EXISTS `ads_resource_areas` (
				  `ResourceAreaId` int(11) NOT NULL AUTO_INCREMENT COMMENT ' ',
				  `ResourceArea` varchar(100) NOT NULL,
				  `Description` text,
				  `AddedBy` int(11) NOT NULL,
				  `AddedOn` datetime NOT NULL,
				  PRIMARY KEY (`ResourceAreaId`)
				) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
		$resource = $this->db->query($sql);
		
		$sql = "SELECT ResourceArea FROM ads_resource_areas WHERE ResourceArea = 'Basic Info'";
		$basic = $this->db->query($sql);
		
		if($basic && $basic->num_rows()==0){
			$sql = "
					INSERT INTO `ads_resource_areas` (`ResourceArea`, `Description`, `AddedBy`, `AddedOn`) VALUES
					('Basic Info', NULL, 1, NOW());";
			$insert = $this->db->query($sql);
		}
		else{
			$insert = TRUE;
		}
				
		
		$sql = "		
				CREATE TABLE IF NOT EXISTS `ads_settings` (
				  `Title` varchar(200) NOT NULL,
				  `Logo` varchar(100) NOT NULL,
				  `Database` tinyint(1) NOT NULL DEFAULT '0',
				  `TrackUsers` tinyint(4) NOT NULL DEFAULT '0',
				  `SetupStep` tinyint(1) NOT NULL DEFAULT '1'
				) ENGINE=MyISAM DEFAULT CHARSET=latin1;
				";
		$settings = $this->db->query($sql);
		
		return ($docItems && $resource && $insert && $settings);
	}

}