<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
$id = $_GET["id"];
$sql = "SELECT * FROM tbl_depts WHERE id = $id";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-12">
<?php
if(dbAffectedRows() == 1){
while($row = dbFetchAssoc($result)){
extract($row);
?>
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="<?php echo WEB_ROOT; ?>labs/processLab.php?action=edit" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Edit Laboratory </td>
   </tr>
  <tr> 
   <td width="150" class="label">Lab Name </td>
   <td class="content">
    <input type="hidden" name="lid" value="<?php echo $id; ?>" />
	<input name="txtLname" type="text" id="txtLname" size="25" value="<?php echo $lname; ?>" ></td>
  </tr>
  <tr> 
   <td width="150" class="label">Room Name </td>
   <td class="content"> <input name="txtRoom" type="text" id="txtRoom"  size="25" value="<?php echo $room_name; ?>"></td>
  </tr>
  <tr>
    <td class="label">Floor</td>
    <td class="content"><input name="txtFloor" type="text" id="txtFloor" size="25"  value="<?php echo $floor; ?>"/></td>
  </tr>
  <tr>
    <td class="label">Building Name </td>
    <td class="content"><input name="txtBuilding" type="text" id="txtBuilding" size="30" value="<?php echo $building; ?>"/></td>
  </tr>
  <tr>
    <td class="label">&nbsp;</td>
    <td class="content">&nbsp;</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button"   class="button" id="btnAddUser" value="Edit Laboratory (+)" onClick="checkAddLabForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel (x)" onClick="window.location.href='index.php';" class="box">  
 </p>

</form>
<?php
}
}
else {
?>
<p>Not Valid Lab Selected.</p>
<?php
}
?>
</div>