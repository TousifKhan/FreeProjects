<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT id, room_name, floor, building FROM tbl_depts";
$result = dbQuery($sql);

$vsql = "SELECT id, vname FROM tbl_vendors";
$vresult = dbQuery($vsql);

$csql = "SELECT cid, cname, ctype FROM tbl_categories WHERE cname != 'Software'";
$cresult = dbQuery($csql);


?> 
<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="hardware/processHardware.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add New Hardware </td>
   </tr>
  <tr> 
   <td width="150" class="label">Hardware Name</td>
   <td class="content"> <input name="txtHname" type="text" id="txtHname" size="20" maxlength="20"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Quantity</td>
   <td class="content"> <input name="txtQty" type="text" id="txtQty" value="" size="10" maxlength="10" onKeyUp="checkNumber(this);"> 
   (Integer only) </td>
  </tr>
  <tr>
    <td class="label">Vendor Name </td>
    <td class="content">
	<select name="txtVname" id="txtVname" >
	<?php
	while($row = dbFetchAssoc($vresult)) {
		extract($row);
	?>
	<option value="<?php echo $id; ?>"><?php echo $vname; ?></option>
	<?php
	}
	?>
	</select>
	
	</td>
  </tr>
  <tr>
    <td class="label">Date of Purchase </td>
    <td class="content"><input name="txtDp" type="text" id="txtDp" value="" size="20" maxlength="20" /></td>
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
	<option value="<?php echo $cid; ?>"><?php echo $cname. " -> ".$ctype; ?></option>
	<?php
	}
	?>
	</select>
	</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button"   class="button" id="btnAddUser" value="Add Hardware (+)" onClick="checkHardwareForm();">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value=" Cancel " onClick="window.location.href='index.php';">  
 </p>
</form>
</div>