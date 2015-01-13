<?php
require_once 'library/config.php';
require_once 'library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['v']) && $_GET['v'] != '') ? $_GET['v'] : '';

switch ($view) {
	case 'USER' :
		$content 	= 'user/list.php';		
		$pageTitle 	= 'Asset Management - View Users';
		break;

	case 'HRWR' :
		$content 	= 'hardware/list.php';		
		$pageTitle 	= 'Asset Management - View Hardwares';
		break;

	case 'SFWR' :
		$content 	= 'software/list.php';		
		$pageTitle 	= 'Asset Management - View Softwares List';
		break;

	case 'LABS' :
		$content 	= 'labs/list.php';		
		$pageTitle 	= 'Asset Management - View Labs List';
		break;

	case 'STCK' :
		$content 	= 'stock/list.php';		
		$pageTitle 	= 'Asset Management - View Labs List';
		break;

}

$script    = array('user.js', 'hardware.js', 'software.js');

require_once 'template.php';

?>