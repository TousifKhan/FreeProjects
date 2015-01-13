<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addLabs();
		break;
		
	case 'delete' :
		deleteLab();
		break;
    
	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
this function will add lab entry in tbl_depts table. 
if the lab with given name is already exist, it shows error message to user.
*/
function addLabs()
{
    $lname = $_POST['txtLname'];
	$room = $_POST['txtRoom'];
	$floor = $_POST['txtFloor'];
	$building = $_POST['txtBuilding'];
	
	$sql = "SELECT lname
	        FROM tbl_depts
			WHERE lname = '$lname'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ../view.php?v=addlab&error=' . urlencode('Lab name already taken. Choose another one'));	
	} else {			
		$sql   = "INSERT INTO tbl_depts (lname, room_name, floor, building)
		          VALUES ('$lname', '$room', '$floor', '$building')";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=LABS');	
	}
}

/*
function used to delete Lab
*/
function deleteLab()
{
	if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
		$id = (int)$_GET['id'];
	} else {
		header('Location: index.php');
	}
	
	$sql = "DELETE FROM tbl_depts 
	        WHERE id = $id";
	dbQuery($sql);
	
	header('Location: ../menu.php?v=LABS');
}
?>