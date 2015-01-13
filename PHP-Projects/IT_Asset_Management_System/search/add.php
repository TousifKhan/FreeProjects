<link href="<?php echo WEB_ROOT; ?>css/jquery.ui.datepicker.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_ROOT; ?>css/jquery.ui.theme.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/jquery.min.js" language="javascript"></script>
<script src="<?php echo WEB_ROOT; ?>library/jquery.ui.core.js" language="javascript"></script>
<script src="<?php echo WEB_ROOT; ?>library/jquery.ui.datepicker.js" language="javascript"></script>
<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$csql = "SELECT u.uid, u.uname, l.lname 
		FROM tbl_users u, tbl_depts l 
		WHERE u.did = l.id";
$cresult = dbQuery($csql);


?> 
<script language="javascript">
	function showType(id){
		$.get("ajax.php",
			{id: id},
			function(data){
				$("div#type").html(data);
			},
			"html");
	}
	$(function() {
		$("input#txtDp").datepicker({dateFormat: 'yy-mm-dd'});
		$("input#txtDr").datepicker({dateFormat: 'yy-mm-dd'});
	});

</script>
<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="assign/process.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Assign Asset to Users </td>
   </tr>
  <tr> 
   <td width="150" class="label">Entity </td>
   <td class="content"> <select name="entity"  onchange="showType(this.value);">
		<option value="1">&nbsp;Hardware&nbsp;</option>
		<option value="2">&nbsp;Software&nbsp;</option>
	</select></td>
  </tr>
  <tr>
    <td class="label">Assignment Type </td>
    <td class="content">
	<div id="type"></div>
	</td>
  </tr>
  <tr> 
   <td width="150" class="label">Quantity</td>
   <td class="content"> <input name="txtQty" type="text" id="txtQty" value="" size="10" maxlength="10" onKeyUp="checkNumber(this);"> 
   (Integer only) </td>
  </tr>
  <tr>
    <td class="label">Date of Assign </td>
    <td class="content"><input name="txtDp" type="text" id="txtDp" value="" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td class="label">Date of Return </td>
    <td class="content"><input name="txtDr" type="text" id="txtDr" value="" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td class="label">Assign to User/Lab </td>
    <td class="content">
	<select name="txtUid" id="txtUid">
	<?php
	while($row = dbFetchAssoc($cresult)) {
		extract($row);
	?>
	<option value="<?php echo $uid; ?>"><?php echo ucfirst($uname). " ( ".$lname. " )"; ?></option>
	<?php
	}
	?>
	</select>	</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button"   class="button" id="btnAddUser" value="Assing (+)" onClick="checkAssignForm();">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value=" Cancel " onClick="window.location.href='index.php';">  
 </p>
</form>
</div>