<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'search' :
		search();
		break;
		
	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


/*
search() function used to search hadrware, software with user given criteria.

*/

function search()
{
    $name = $_POST['name'];
	$type = (int)$_POST['type'];
	$sdate = $_POST['sdate'];
	$edate = $_POST['edate'];
//	$cond = $_POST['condition'];
	
	$hsql = "SELECT h.hw_name, v.vname, v.thumb, h.dop, c.ctype
	         FROM tbl_hardwares h, tbl_vendors v, tbl_categories c
			 WHERE h.hw_name LIKE '%$name%' 
			 OR h.dop >= '$sdate' AND h.dop <= '$edate'
			 AND h.cid = c.cid AND v.id = h.vid";
			 
	$ssql = "SELECT s.sw_name, v.vname, v.thumb, s.dop, c.ctype
	         FROM tbl_softwares s, tbl_vendors v, tbl_categories c
			 WHERE s.sw_name LIKE '%$name%' 
			 OR s.dop >= '$sdate' AND s.dop <= '$edate'
			 AND s.cid = c.cid AND v.id = s.vid";		 
	
	$data = array();
	if($type == 1){
		$result = dbQuery($hsql);
		if(dbNumRows($result) == 0) {
			header('Location: ../view.php?v=search&error=' . urlencode('No Hardware Found. Please try Again.'));	
		}else {
			while($row = dbFetchAssoc($result)){
				extract($row);
				$data[] = array('name'       => $hw_name,
                              'vname'         => $vname,
							  'thumb'         => $thumb,
                              'dop'          => $dop,
                              'cname'          => $ctype);
			}
			$_SESSION["result_data"] = $data;
			header('Location: ../search');				
		}//else
	}else {
	
		$result = dbQuery($ssql);
		if(dbNumRows($result) == 0) {
			header('Location: ../view.php?v=search&error=' . urlencode('No Software Found. Please try Again.'));	
		}else {
			while($row = dbFetchAssoc($result)){
				extract($row);
				$data[] = array('name'           => $sw_name,
                              'vname'         => $vname,
							  'thumb'         => $thumb,
                              'dop'          => $dop,
                              'cname'          => $ctype);
			}
			$_SESSION["result_data"] = $data;
			header('Location: ../search');				
		}//else
	
	}
	
}

?>