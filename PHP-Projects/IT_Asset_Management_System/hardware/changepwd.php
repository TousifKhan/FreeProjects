<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
?> 
<div class="prepend-1 span-17">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
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
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button"   class="button" id="btnAddUser" value="Add User" onClick="checkAddUserForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
</div>