<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addSoftware();
		break;
		
	case 'delete' :
		deleteSoftware();
		break;

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
function used to add software in tbl_softwares
*/
function addSoftware()
{
    $hname = $_POST['txtHname'];
	$serial = $_POST['txtSerial'];
	$vid = (int)$_POST['txtVname'];
	$dop = $_POST['txtDp'];
	$dox = $_POST['txtDx'];
	$price = $_POST['txtPrice'];
	$catid = (int)$_POST['txtCategory'];
	
	$sql = "SELECT sw_name
	        FROM tbl_softwares
			WHERE sw_name = '$hname'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ../view.php?v=addsoftware&error=' . urlencode('Software is already exist. Choose Add another'));	
	} else {			
		$sql   = "INSERT INTO tbl_softwares (sw_name, serial, vid, dop, price, exp_date, cid)
		          VALUES ('$hname', '$serial', $vid, '$dop', $price, '$dox', $catid)";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=SFWR');	
	}
}


/*
	Remove a user
*/
function deleteSoftware()
{
	if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
		$id = (int)$_GET['id'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_softwares
	        WHERE id = $id";
	dbQuery($sql);
	
	header('Location: ../menu.php?v=SFWR');
}
?>