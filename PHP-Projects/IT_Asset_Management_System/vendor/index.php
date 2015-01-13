<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'Asset Management - Vendor';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Asset Management - Add Vendor';
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Asset Management - View vendor';
}


$script    = array('vendor.js');

require_once '../template.php';
?>
