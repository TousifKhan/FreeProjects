<?php
require_once '../library/config.php';
require_once '../library/functions.php';
$errorMessage = "";

$sql = "SELECT id, lname, room_name, floor, building FROM tbl_depts";
$result = dbQuery($sql);
$uid =(int)$_GET["id"];
$sql_u = "SELECT * FROM tbl_users WHERE uid = $uid";
$result_u = dbQuery($sql_u);
//echo $sql_u;
?> 
<div class="prepend-1 span-12">
<p align="center"><strong><font color="#660000"><?php echo $errorMessage; ?></font></strong></p>
<?php
if(dbAffectedRows() == 1){
while($d = dbFetchAssoc($result_u)){
extract($d);
?>
<form action="<?php echo WEB_ROOT; ?>user/processUser.php?action=edit" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
  <table width="80%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
    <tr align="center" id="listTableHeader">
      <td colspan="2">Edit User</td>
    </tr>
    <tr>
      <td width="150" class="label">User Name</td><input type="hidden" name="id" value="<?php echo $uid; ?>">
      <td class="content"><input name="txtUserName" type="text" id="txtUserName" size="20"  value="<?php echo $uname; ?>" /></td>
    </tr>
    <tr>
      <td width="150" class="label">Password</td>
      <td class="content"><input name="txtPassword" type="password" id="txtPassword" value="<?php echo $pwd; ?>" size="20"  /></td>
    </tr>
    <tr>
      <td class="label">Email</td>
      <td class="content"><input name="txtEmail" type="text" id="txtEmail"  size="20" value="<?php echo $email; ?>" /></td>
    </tr>
    <tr>
      <td class="label">First Name </td>
      <td class="content"><input name="txtFname" type="text" id="txtFname"  size="20" value="<?php echo $fname; ?>" /></td>
    </tr>
    <tr>
      <td class="label">Last Name </td>
      <td class="content"><input name="txtLname" type="text" id="txtLname" value="<?php echo $lname; ?>" size="20" maxlength="20" /></td>
    </tr>
    <tr>
      <td class="label">Building Name</td>
      <td class="content"><select name="did">
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
    <input name="btnAddUser" type="button"   class="button" id="btnAddUser" value="Edit User" onClick="checkAddUserForm();" class="box">
    &nbsp;&nbsp;
    <input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php';" class="box">
  </p>
</form>
<?php 
}//while
}else {
?>
<p> No user found.</p>
<?php 
} 
?>
</div>