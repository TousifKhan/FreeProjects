<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		assignUser();
		break;
		
	case 'delete' :
		deleteUser();
		break;

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


/*
functaion is used to assign Hardware, software to user, lab.
if the given qualtity is greater then available quantity then it shows error message to user.
*/
function assignUser()
{
    $entity = $_POST['entity'];
	$type = $_POST['type'];
	$qty = (int)$_POST['txtQty'];
	$dop = $_POST['txtDp'];
	$dor = $_POST['txtDr'];
	$uid = $_POST['txtUid'];
	
	$hsql = "SELECT avbl_qty AS avbl 
	        FROM tbl_hardwares
			WHERE id = $type";
	$ssql = "";
	
	if($entity == 1){
		$res = dbQuery($hsql);
		$avbl_qty;
		while($row = dbFetchAssoc($res)){
			$avbl_qty = $row['avbl'];
			
		}//while
		if($avbl_qty < $qty) {
			header('Location: ../view.php?v=assign&error=' . urlencode('Hardware Quantity is more then available Quantity. Please add less.'));	
		}else {
			//update avbl_qty
			$sql = "UPDATE tbl_hardwares 
					SET avbl_qty = avbl_qty - $qty 
					WHERE id = $type";
			//dbQuery($sql);
			$sql = "INSERT INTO tbl_assignments (entity, type, qty, uid, doa, doe, bdate)
					VALUES($entity, $type, $qty, $uid, '$dop', '$dor', NOW() )";
			dbQuery($sql);
			header('Location: ../assign');				
		}//else
	}else {
		//echo "SW";
		$sql = "INSERT INTO tbl_assignments (entity, type, qty, uid, doa, doe, bdate)
					VALUES($entity, $type, $qty, $uid, '$dop', '$dor', NOW() )";
			dbQuery($sql);
		header('Location: ../assign');				
	}
	
}

?>