<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT *
        FROM tbl_categories
		ORDER BY cname";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<p><img src="<?php echo WEB_ROOT; ?>images/update.png" class="left"/>
<strong>This page list down the category available in the system.</strong>
<br/>
It essentially supplies a list of users defined in the system. The user names are linked to a page where you can change the user's name, you can also reset their passwords through this page.

</p>

<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Category Name</td>
   <td>Type</td>
   <td>SDescription</td>
   <td>Delete</td>
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
   <td><?php echo $cname; ?></td>
   <td align="center"><?php echo $ctype; ?></a></td>
   <td align="center"><?php echo $cdesc; ?></td>
   <td align="center"><a href="javascript:deleteCategory(<?php echo $cid; ?>);">Delete</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Add New Category"  class="button" onClick="addCategory()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>