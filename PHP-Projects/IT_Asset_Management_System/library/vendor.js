// JavaScript Document
function checkCategoryForm()
{
    with (window.document.frmCategory) {
		if (isEmpty(txtName, 'Enter Vendor name')) {
			return;
		} else if (isEmpty(txtCno, 'Enter Contact name')) {
			return;
		} else if (isEmpty(txtAddress, 'Enter Vendor Address')) {
			return;
		} else if (isEmpty(txtEmail, 'Enter Email address')) { 
			return;
		} else if (isEmpty(txtWebsite, 'Enter Website ')) { 
			return;
		} else {
			submit();
		}
	}
}

function addVendor()
{
	window.location.href =  'index.php?view=add';
}


function deleteVendor(catId)
{
	if (confirm('Deleting Vendor?')) {
		window.location.href = 'processCategory.php?action=delete&id=' + catId;
	}
}

function deleteImage(catId)
{
	if (confirm('Delete this image?')) {
		window.location.href = 'processCategory.php?action=deleteImage&catId=' + catId;
	}
}