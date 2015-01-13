<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT u.uid, u.uname, u.email, u.fname, u.lname, d.lname AS dname
        FROM tbl_users u,
		tbl_depts d
		WHERE u.utype != 'ADMIN' AND u.did = d.id
		ORDER BY uname";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<h2 class="catHead">User Management</h2>
<p><img src="images/users.png" class="left"/>
<strong>This page allow an administrator to manage the users in the system.</strong>
<br/>
It essentially supplies a list of users defined in the system. The user names are linked to a page where you can change the user's name, you can also reset their passwords through this page.

</p>

<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>User</td>
   <td>E-mail</td>
   <td>Full Name</td>
   <td>Laboratory</td>
   <td>Delete&nbsp;/&nbsp;Edit</td>
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
  <tr> 
   <td><?php echo ucfirst($uname); ?></td>
   <td align="center"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
   <td align="center"><?php echo ucfirst($fname.", ".$lname); ?></td>
   <td align="center"><?php echo $dname; ?></td>
   <td align="center"><a  style="font-weight:normal;" href="javascript:deleteUser(<?php echo $uid; ?>);">Delete</a>/<a  style="font-weight:normal;" href="javascript:editUser(<?php echo $uid; ?>);">Edit</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Add New User"  class="button" onClick="addUser()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>