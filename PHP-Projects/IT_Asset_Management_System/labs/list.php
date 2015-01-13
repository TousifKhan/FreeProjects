<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT * FROM tbl_depts ORDER BY lname";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<h2 class="catHead">Lab Management</h2>
<p><img src="images/labs.png" class="left"/>
<strong>This page allow an administrator to manage the users in the system.</strong>
<br/>
It essentially supplies a list of users defined in the system. The user names are linked to a page where you can change the user's name, you can also reset their passwords through this page.

</p>

<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Lab Name </td>
   <td>Room Name</td>
   <td>Floor</td>
   <td>Building</td>
   <td>Delete&nbsp;/&nbsp;Update</td>
  </tr>
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'row2';
	}
	
	$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $lname; ?></td>
   <td align="center"><?php echo $room_name; ?></td>
   <td align="center"><?php echo $floor; ?></td>
   <td align="center"><?php echo $building; ?></td>
   <td align="center"><a  style="font-weight:normal;" href="javascript:deleteLab(<?php echo $id; ?>);">Delete</a>&nbsp;/&nbsp;<a  style="font-weight:normal;" href="javascript:editLab(<?php echo $id; ?>);">Edit</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Add New Lab"  class="button" onClick="addLab()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>