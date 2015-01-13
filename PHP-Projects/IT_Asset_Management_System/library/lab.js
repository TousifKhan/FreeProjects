// JavaScript Document
function checkAddLabForm()
{
	with (window.document.frmAddUser) {
		if (isEmpty(txtLname, 'Enter Laboratory name')) {
			return;
		} else if (isEmpty(txtRoom, 'Enter Room name')) {
			return;
		} else if (isEmpty(txtFloor, 'Enter Floor')) {
			return;
		} else if (isEmpty(txtBuilding, 'Enter Building name')) {
			return;
		} else if (isEmpty(txtLname, 'Enter Last name')) {
			return;
		}else {
			submit();
		}
	}
}

function addLab()
{
	window.location.href = 'view.php?v=addlab';
}

function deleteLab(id)
{
	if (confirm('Delete this Lab?')) {
		window.location.href = 'labs/processLab.php?action=delete&id=' + id;
	}
}

function editLab(id)
{
	window.location.href = 'labs/?view=edit&id=' + id;

}

