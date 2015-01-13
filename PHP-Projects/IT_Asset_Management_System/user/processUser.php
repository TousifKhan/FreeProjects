<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addUser();
		break;
		
	case 'edit' :
		modifyUser();
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
function used to create single user in table tbl_users
*/
function addUser()
{
    $userName = $_POST['txtUserName'];
	$password = $_POST['txtPassword'];
	$email = $_POST['txtEmail'];
	$fname = $_POST['txtFname'];
	$lname = $_POST['txtLname'];
	$utype = 'USER';
	$did = (int)$_POST['did'];
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
	*/	
	// check if the username is taken
	$sql = "SELECT uname
	        FROM tbl_users
			WHERE uname = '$userName'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ../view.php?v=adduser&error=' . urlencode('Username already taken. Choose another one'));	
	} else {			
		$sql   = "INSERT INTO tbl_users (uname, pwd, email, fname, lname, bdate, utype, did)
		          VALUES ('$userName', '$password', '$email', '$fname', '$lname', NOW(), '$utype', $did)";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=USER');	
	}
}

/*
	Modify a user, it will mdify, edit user and able to update user details
*/
function modifyUser()
{
 	$uid = $_POST["id"];
    $userName = $_POST['txtUserName'];
	$password = $_POST['txtPassword'];
	$email = $_POST['txtEmail'];
	$fname = $_POST['txtFname'];
	$lname = $_POST['txtLname'];
	$utype = 'USER';
	$did = (int)$_POST['did'];
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
	*/	
	// check if the username is taken
		$sql   = "UPDATE tbl_users  
			SET uname = '$userName', 
				pwd = '$password', 
				email = '$email', 
				fname = '$fname', 
				lname = '$lname', 
				did = $did
				WHERE uid = $uid";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=USER');	
	
}

/*
	Remove a user
*/
function deleteUser()
{
	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
		$userId = (int)$_GET['userId'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_users 
	        WHERE uid = $userId";
	dbQuery($sql);
	
	header('Location: ../menu.php?v=USER');
}
?>