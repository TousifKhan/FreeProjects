<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT id, lname, room_name, floor, building FROM tbl_depts";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="<?php echo WEB_ROOT; ?>user/processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add User</td>
   </tr>
  <tr> 
   <td width="150" class="label">User Name</td>
   <td class="content"> <input name="txtUserName" type="text" id="txtUserName" size="20" maxlength="20"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Password</td>
   <td class="content"> <input name="txtPassword" type="password" id="txtPassword" value="" size="20" maxlength="20"></td>
  </tr>
  <tr>
    <td class="label">Email</td>
    <td class="content"><input name="txtEmail" type="text" id="txtEmail" value="" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td class="label">First Name </td>
    <td class="content"><input name="txtFname" type="text" id="txtFname" value="" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td class="label">Last Name </td>
    <td class="content"><input name="txtLname" type="text" id="txtLname" value="" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td class="label">Building Name</td>
    <td class="content">
	<select name="did">
	<?php
	while($row = dbFetchAssoc($result)) {
		extract($row);
	?>
	<option value="<?php echo $id; ?>"><?php echo $lname." (".$room_name. ", ".$floor." )"; ?></option>
	<?php
	}
	?>
	</select>
	</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button"   class="button" id="btnAddUser" value="Add User" onClick="checkAddUserForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
</div>