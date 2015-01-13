// JavaScript Document
function checkAssignForm()
{
	with (window.document.frmAddUser) {
		if (isEmpty(txtQty, 'Enter Quantity')) {
			return;
		} else if (isEmpty(txtDp, 'Enter Date of Assignment')) {
			return;
		} else if (isEmpty(txtDr, 'Enter Date of Release')) {
			return;
		} else {
			submit();
		}
	}
}

function assignAsset()
{
	//alert('assign');
	window.location.href = '../view.php?v=assign';
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

