<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "ab";
$route['404_override'] = '';

$route['create'] = 'docs/create_form';
$route['edit'] = 'docs/edit_form';
$route['edit/(:any)'] = 'docs/edit_form';

$hostname = 'localhost';
$username = '';
$password = '';
$database = '';
$dbLink = mysqli_connect($hostname, $username, $password, $database);

$sql = "SELECT * FROM ads_resource_areas";
$result = mysqli_query($dbLink, $sql);
if($result && mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result)){
		$resource = str_replace(" ", "_", $row['ResourceArea']);
		$resource = strtolower($resource);
		$route[$resource] = 'docs/view_resource/'.$resource;
	}
}

$sql = "SELECT * FROM ads_doc_items JOIN ads_resource_areas ON ads_resource_areas.ResourceAreaId = ads_doc_items.ResourceAreaId";
$result = mysqli_query($dbLink, $sql);
if($result && mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_array($result)){
		$resource = str_replace(" ", "_", $row['ResourceArea']);
		$resource = strtolower($resource);
		
		$item = str_replace(" ", "_", $row['DocItem']);
		$item = strtolower($item);
		
		$route[$resource.'/'.$item] = 'docs/view_doc/'.$resource.'/'.$item;
	}
}

//echo '<pre>';
//print_r($route);
//echo '</pre>';


/* End of file routes.php */
/* Location: ./application/config/routes.php */