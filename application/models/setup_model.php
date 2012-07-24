<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup_model extends CI_Model {
	
	public function __contstruct(){
		parent::__construct();
	}
	function create_config($hostname,$username,$password,$database,$driver){
		$databasefile ='<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the \'Database Connection\'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	[\'hostname\'] The hostname of your database server.
|	[\'username\'] The username used to connect to the database
|	[\'password\'] The password used to connect to the database
|	[\'database\'] The name of the database you want to connect to
|	[\'dbdriver\'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	[\'dbprefix\'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	[\'pconnect\'] TRUE/FALSE - Whether to use a persistent connection
|	[\'db_debug\'] TRUE/FALSE - Whether database errors should be displayed.
|	[\'cache_on\'] TRUE/FALSE - Enables/disables query caching
|	[\'cachedir\'] The path to the folder where cache files should be stored
|	[\'char_set\'] The character set used in communicating with the database
|	[\'dbcollat\'] The character collation used in communicating with the database
|	[\'swap_pre\'] A default table prefix that should be swapped with the dbprefix
|	[\'autoinit\'] Whether or not to automatically initialize the database.
|	[\'stricton\'] TRUE/FALSE - forces \'Strict Mode\' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the \'default\' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = \'default\';
$active_record = TRUE;

/*
 *	CONNECTING TO THE APPLICATION DATABASE
 */
$db[\'default\'][\'hostname\'] = \''.$hostname.'\';
$db[\'default\'][\'username\'] = \''.$username.'\';
$db[\'default\'][\'password\'] = \''.$password.'\';
$db[\'default\'][\'database\'] = \''.$database.'\';
$db[\'default\'][\'dbdriver\'] = \''.$driver.'\';
$db[\'default\'][\'dbprefix\'] = \'\';
$db[\'default\'][\'pconnect\'] = TRUE;
$db[\'default\'][\'db_debug\'] = FALSE;
$db[\'default\'][\'cache_on\'] = FALSE;
$db[\'default\'][\'cachedir\'] = \'\';
$db[\'default\'][\'char_set\'] = \'utf8\';
$db[\'default\'][\'dbcollat\'] = \'utf8_general_ci\';
$db[\'default\'][\'swap_pre\'] = \'\';
$db[\'default\'][\'autoinit\'] = TRUE;
$db[\'default\'][\'stricton\'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */';
		write_file('./application/config/database.php', $databasefile);
		
		$routesfile ='<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route[\'default_controller\'] = \'welcome\';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route[\'404_override\'] = \'errors/page_missing\';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route[\'default_controller\'] = "ab";
$route[\'404_override\'] = \'\';

$route[\'create\'] = \'docs/create_form\';
$route[\'edit\'] = \'docs/edit_form\';
$route[\'edit/(:any)\'] = \'docs/edit_form\';

$hostname = \''.$hostname.'\';
$username = \''.$username.'\';
$password = \''.$password.'\';
$database = \''.$database.'\';
$dbLink = mysqli_connect($hostname, $username, $password, $database);

$sql = "SELECT * FROM ads_resource_areas";
$result = mysqli_query($dbLink, $sql);
if($result && mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result)){
		$resource = str_replace(" ", "_", $row[\'ResourceArea\']);
		$resource = strtolower($resource);
		$route[$resource] = \'docs/view_resource/\'.$resource;
	}
}

$sql = "SELECT * FROM ads_doc_items JOIN ads_resource_areas ON ads_resource_areas.ResourceAreaId = ads_doc_items.ResourceAreaId";
$result = mysqli_query($dbLink, $sql);
if($result && mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result)){
		$resource = str_replace(" ", "_", $row[\'ResourceArea\']);
		$resource = strtolower($resource);
		
		$item = str_replace(" ", "_", $row[\'DocItem\']);
		$item = strtolower($item);
		
		$route[$resource.\'/\'.$item] = \'docs/view_doc/\'.$resource.\'/\'.$item;
	}
}

/* End of file routes.php */
/* Location: ./application/config/routes.php */';
		write_file('./application/config/routes.php', $routesfile);
		
		$textfile ="".md5('work')."";
		write_file('./application/config/'.md5('config').'txt', $textfile);
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