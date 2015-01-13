<?php
require_once 'library/config.php';
require_once 'library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['v']) && $_GET['v'] != '') ? $_GET['v'] : '';

switch ($view) {
	case 'adduser' :
		$content 	= 'user/add.php';		
		$pageTitle 	= 'Asset Management - Add Users';
		break;

	case 'addvendor' :
		$content 	= 'vendor/add.php';		
		$pageTitle 	= 'Asset Management - Add Vendor';
		break;
		
	case 'addcat' :
		$content 	= 'category/add.php';		
		$pageTitle 	= 'Asset Management - Add catgegory';
		break;	

	case 'search' :
		$content 	= 'search/search.php';		
		$pageTitle 	= 'Asset Management - Search Asset';
		break;	

	case 'addlab' :
		$content 	= 'labs/add.php';		
		$pageTitle 	= 'Asset Management - Add Laboratory';
		break;	

	case 'assign' :
		$content 	= 'assign/add.php';		
		$pageTitle 	= 'Asset Management - Assign Asset';
		break;	

	case 'addhardware' :
		$content 	= 'hardware/add.php';		
		$pageTitle 	= 'Asset Management - Add Hardware';
		break;	

	case 'addsoftware' :
		$content 	= 'software/add.php';		
		$pageTitle 	= 'Asset Management - Add New Software';
		break;	

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Shop Admin Control Panel - View Users';
}

$script    = array('user.js','category.js','hardware.js');

require_once 'template.php';

?>