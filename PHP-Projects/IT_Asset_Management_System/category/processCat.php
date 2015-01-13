<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addCat();
		break;
		
	case 'delete' :
		deleteCat();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


function addCat()
{
    $cname = $_POST['txtCname'];
	$type = $_POST['txtType'];
	$desc = $_POST['txtDesc'];
	
	$sql = "SELECT ctype
	        FROM tbl_categories
			WHERE cname = '$cname' AND ctype = '$type'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ../view.php?v=addcat&error=' . urlencode('Category  Type already taken. Choose another one'));	
	} else {			
		$sql   = "INSERT INTO tbl_categories (cname, ctype, cdesc)
		          VALUES ('$cname', '$type', '$desc')";
	
		dbQuery($sql);
		header('Location: ../category');	
	}
}

/*
	Remove a category
*/
function deleteCat()
{
	if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
		$id = (int)$_GET['id'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_categories 
	        WHERE cid = $id";
	dbQuery($sql);
	
	header('Location: ../category');
}
?>