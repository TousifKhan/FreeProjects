// JavaScript Document
function checkHardwareForm()
{
	with (window.document.frmAddUser) {
		if (isEmpty(txtHname, 'Enter Hardware name')) {
			return;
		} else if (isEmpty(txtQty, 'Enter Quantity')) {
			return;
		} else if (isEmpty(txtDp, 'Enter Date of Perchase')) {
			return;
		} else if (isEmpty(txtPrice, 'Enter Unit Price')) {
			return;
		} else {
			submit();
		}
	}
}

function addHardware()
{
	//alert('addHardware');
	window.location.href = 'view.php?v=addhardware';
}

function changePassword(userId)
{
	window.location.href = 'index.php?view=modify&userId=' + userId;
}

function deleteHw(id)
{
	if (confirm('Delete this Hardware?')) {
		window.location.href = 'hardware/processHardware.php?action=delete&id=' + id;
	}
}

