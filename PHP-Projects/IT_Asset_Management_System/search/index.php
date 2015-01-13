<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'Serach Asset';
		break;

	default :
		$content 	= 'search.php';		
		$pageTitle 	= 'Search Asset ';
}

$script    = array('hardware.js');

require_once '../template.php';
?>
