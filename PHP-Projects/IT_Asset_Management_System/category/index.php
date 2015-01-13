<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'Asset Management - View Category List';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Asset Management - Add Category';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'Asset Management - Modify Users';
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Asset Management - View Users';
}

$script    = array('category.js');

require_once '../template.php';
?>
