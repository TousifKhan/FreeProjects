<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
    case 'add' :
        addCategory();
        break;
      
       
    case 'delete' :
        deleteCategory();
        break;
    
   
    default :
        // if action is not defined or unknown
        // move to main category page
        header('Location: index.php');
}


/*
this function is used to crate vendor list. it used tbl_vendors and insert recpord in it.
*/


function addCategory()
{
    $name        = $_POST['txtName'];
	$cno        = $_POST['txtCno'];
	$email        = $_POST['txtEmail'];
	$web        = $_POST['txtWebsite'];
    $address = $_POST['txtAddress'];
    $image       = $_FILES['fleImage'];
  //  $parentId    = $_POST['hidParentId'];
    
    $imagePath = uploadImage('fleImage', SRV_ROOT . 'images/vendors/');
    
    $sql   = "INSERT INTO tbl_vendors (vname, cno, address, email, website, thumb) 
              VALUES ('$name', '$cno', '$address', '$email', '$web', '$imagePath')";
    $result = dbQuery($sql) or die('Cannot add category' . mysql_error());
    //echo $sql;
    header('Location: ../vendor');              
}

/*
    Upload an image and return the uploaded image name 
*/
function uploadImage($inputName, $uploadDir)
{
    $image     = $_FILES[$inputName];
    $imagePath = '';
    
    // if a file is given
    if (trim($image['tmp_name']) != '') {
        // get the image extension
        $ext = substr(strrchr($image['name'], "."), 1); 

        // generate a random new file name to avoid name conflict
        $imagePath = md5(rand() * time()) . ".$ext";
        
		// check the image width. if it exceed the maximum
		// width we must resize it
		$size = getimagesize($image['tmp_name']);
		
		if ($size[0] > MAX_CATEGORY_IMAGE_WIDTH) {
			$imagePath = createThumbnail($image['tmp_name'], $uploadDir . $imagePath, MAX_CATEGORY_IMAGE_WIDTH);
		} else {
			// move the image to category image directory
			// if fail set $imagePath to empty string
			if (!move_uploaded_file($image['tmp_name'], $uploadDir . $imagePath)) {
				$imagePath = '';
			}
		}	
    }

    
    return $imagePath;
}


/*
    Remove a vendot from database table tbl_vendors
*/
function deleteCategory()
{
    if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
        $id = (int)$_GET['id'];
    } else {
        header('Location: index.php');
    }
   
	// delete the products
	$sql = "DELETE FROM tbl_vendors
			WHERE id = $id";
	dbQuery($sql);
	
    header('Location: ../vendor');
}


?>