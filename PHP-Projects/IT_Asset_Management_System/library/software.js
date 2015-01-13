// JavaScript Document
function checkSoftwareForm()
{
	with (window.document.frmAddUser) {
		if (isEmpty(txtHname, 'Enter Software name')) {
			return;
		} else if (isEmpty(txtSerial, 'Enter Serial key')) {
			return;
		} else if (isEmpty(txtDp, 'Enter Date of Purchase')) {
			return;
		} else if (isEmpty(txtDx, 'Enter Date of Expiry')) {
			return;
		} else if (isEmpty(txtPrice, 'Enter Unit Price')) {
			return;
		} else {
			submit();
		}
	}
}

function addSoftware()
{
	//alert('addHardware');
	window.location.href = 'view.php?v=addsoftware';
}

function changePassword(userId)
{
	window.location.href = 'index.php?view=modify&userId=' + userId;
}

function deleteSw(id)
{
	if (confirm('Delete this Software?')) {
		window.location.href = 'software/processSoftware.php?action=delete&id=' + id;
	}
}

