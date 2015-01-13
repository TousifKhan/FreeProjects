<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addUser();
		break;
		
	case 'delete' :
		deleteUser();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


function addUser()
{
    $hname = $_POST['txtHname'];
	$qty = $_POST['txtQty'];
	$vid = (int)$_POST['txtVname'];
	$dop = $_POST['txtDp'];
	$price = $_POST['txtPrice'];
	$catid = (int)$_POST['txtCategory'];
	
	$sql = "SELECT hw_name
	        FROM tbl_hardwares
			WHERE hw_name = '$hname'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ../view.php?v=addhardware&error=' . urlencode('Hardware is already exist. Choose Add another'));	
	} else {			
		$sql   = "INSERT INTO tbl_hardwares (hw_name, qty, vid, dop, price, cid)
		          VALUES ('$hname', $qty, $vid, NOW(), $price, $catid)";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=HRWR');	
	}
}

/*
	Modify a user
*/
function modifyUser()
{
	$userId   = (int)$_POST['hidUserId'];	
	$password = $_POST['txtPassword'];
	
	$sql   = "UPDATE tbl_user 
	          SET user_password = PASSWORD('$password')
			  WHERE user_id = $userId";

	dbQuery($sql);
	header('Location: index.php');	

}

?>