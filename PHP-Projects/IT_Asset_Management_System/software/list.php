<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT s.id, s.sw_name, s.dop, s.exp_date, v.vname as vname, v.thumb AS thumb, c.cname AS cname, c.ctype AS ctype, s.price
        FROM tbl_softwares s, tbl_categories c, tbl_vendors v
		WHERE s.vid = v.id AND s.cid = c.cid
		ORDER BY sw_name";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<p><img src="<?php echo WEB_ROOT; ?>images/software.png" class="left"/>
<strong>A complete List of computer Softwares (Essential & Optional).</strong>
<br/>
It essentially supplies a list of users defined in the system. The user names are linked to a page where you can change the user's name, you can also reset their passwords through this page.

</p>

<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Software</td>
   <td>Price</td>
   <td>Vendor</td>
   <td>Category</td>
   <td>DOP/DOE</td>
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
	if($thumb) {$img = WEB_ROOT . "images/vendors/".$thumb;}
	else {$img = "images/no-image-small.png";} 
	$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $sw_name; ?></td>
   <td align="center"><?php echo $price." $"; ?></td>
   <td align="center">
   <img src="<?php echo $img;?>" title="<?php echo $vname; ?>" /></td>
   <td align="center"><?php echo $cname.", ".$ctype; ?></td>
   <td align="center"><?php echo $dop." / ".$exp_date; ?></td>
   <td align="center"><a href="javascript:deleteSw(<?php echo $id; ?>);">Delete</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Add New Software (+)" class="button" onClick="addSoftware()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>