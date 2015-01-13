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
<form action="labs/processLab.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add Laboratory </td>
   </tr>
  <tr> 
   <td width="150" class="label">Lab Name </td>
   <td class="content"> <input name="txtLname" type="text" id="txtLname" size="25" maxlength="20"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Room Name </td>
   <td class="content"> <input name="txtRoom" type="text" id="txtRoom" value="" size="25" maxlength="40"></td>
  </tr>
  <tr>
    <td class="label">Floor</td>
    <td class="content"><input name="txtFloor" type="text" id="txtFloor" value="" size="25" maxlength="40" /></td>
  </tr>
  <tr>
    <td class="label">Building Name </td>
    <td class="content"><input name="txtBuilding" type="text" id="txtBuilding" value="" size="30" maxlength="40" /></td>
  </tr>
  <tr>
    <td class="label">&nbsp;</td>
    <td class="content">&nbsp;</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button"   class="button" id="btnAddUser" value="Add Laboratory (+)" onClick="checkAddLabForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel (x)" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
</div>