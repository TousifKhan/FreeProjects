<link href="<?php echo WEB_ROOT; ?>css/jquery.ui.datepicker.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_ROOT; ?>css/jquery.ui.theme.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/jquery.min.js" language="javascript"></script>
<script src="<?php echo WEB_ROOT; ?>library/jquery.ui.core.js" language="javascript"></script>
<script src="<?php echo WEB_ROOT; ?>library/jquery.ui.datepicker.js" language="javascript"></script>
<script language="javascript">
	$(function() {
		$("input#txtDp").datepicker({dateFormat: 'yy-mm-dd'});
		$("input#txtDx").datepicker({dateFormat: 'yy-mm-dd'});
	});
</script>

<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$vsql = "SELECT id, vname FROM tbl_vendors";
$vresult = dbQuery($vsql);

$csql = "SELECT cid, cname, ctype FROM tbl_categories WHERE cname != 'Hardware'";
$cresult = dbQuery($csql);

?> 
<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="software/processSoftware.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add New Software </td>
   </tr>
  <tr> 
   <td width="150" class="label">Software Name</td>
   <td class="content"> <input name="txtHname" type="text" id="txtHname" size="20" maxlength="20"></td>
  </tr>
  <tr>
    <td class="label">Serial Key</td>
    <td class="content"><input name="txtSerial" type="text" id="txtSerial" size="30" maxlength="100" /></td>
  </tr>
  <tr>
    <td class="label">Vendor Name </td>
    <td class="content">
	<select name="txtVname" id="txtVname" >
	<?php
	while($row = dbFetchAssoc($vresult)) {
		extract($row);
	?>
	<option value="<?php echo $id; ?>">&nbsp;&nbsp;<?php echo $vname; ?>&nbsp;&nbsp;</option>
	<?php
	}
	?>
	</select>	</td>
  </tr>
  <tr>
    <td class="label">Date of Purchase </td>
    <td class="content"><input name="txtDp" type="text" id="txtDp" value="<?php echo date("Y-m-d"); ?>" size="15" maxlength="20" readonly="true" /></td>
  </tr>
  <tr>
    <td class="label">Date of Expiry </td>
    <td class="content"><input name="txtDx" type="text" id="txtDx" value="<?php echo date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . " +1 year")); ?>" size="15" maxlength="20"  /> (After 1 Year)</td>
  </tr>
  <tr>
    <td class="label">Unit Price </td>
    <td class="content"><input name="txtPrice" type="text" id="txtPrice" value="" size="10" maxlength="20" onKeyUp="checkNumber(this);"/>
    (Integer Only)</td>
  </tr>
  <tr>
    <td class="label">Category</td>
    <td class="content">
	<select name="txtCategory" id="txtCategory">
	<?php
	while($row = dbFetchAssoc($cresult)) {
		extract($row);
	?>
	<option value="<?php echo $cid; ?>">&nbsp;&nbsp;<?php echo $cname. " -> ".$ctype; ?>&nbsp;&nbsp;</option>
	<?php
	}
	?>
	</select>	</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button"   class="button" id="btnAddUser" value="Add New Software (+)" onClick="checkSoftwareForm();">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value=" Cancel " onClick="window.location.href='index.php';">  
 </p>
</form>
</div>