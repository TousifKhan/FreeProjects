<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addHardware();
		break;
		
	case 'modify' :
		modifyUser();
		break;
		
	case 'delete' :
		deleteHardware();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
Function used to add entry in tbl_hardwares table.
*/
function addHardware()
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
		$sql   = "INSERT INTO tbl_hardwares (hw_name, qty, avbl_qty, vid, dop, price, cid)
		          VALUES ('$hname', $qty, $qty, $vid, '$dop', $price, $catid)";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=HRWR');	
	}
}

/*
	Remove a Hardware
*/
function deleteHardware()
{
	if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
		$id = (int)$_GET['id'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_hardwares
	        WHERE id = $id";
	dbQuery($sql);
	
	header('Location: ../menu.php?v=HRWR');
}
?>