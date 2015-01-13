// JavaScript Document
function checkAddCatForm()
{
	with (window.document.frmAddUser) {
		if (isEmpty(txtCname, 'Enter Category name')) {
			return;
		} else if (isEmpty(txtType, 'Enter Type')) {
			return;
		} else if (isEmpty(txtDesc, 'Enter Category Description')) {
			return;
		} else {
			submit();
		}
	}
}

function addCategory()
{
	window.location.href = '../view.php?v=addcat';
}

function changePassword(userId)
{
	window.location.href = 'index.php?view=modify&userId=' + userId;
}

function deleteCategory(id)
{
	if (confirm('Delete this Category?')) {
		window.location.href = '../category/processCat.php?action=delete&id=' + id;
	}
}

