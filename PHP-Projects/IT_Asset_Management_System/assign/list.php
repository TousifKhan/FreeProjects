<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$hsql = "SELECT a.id, h.hw_name, c.cname, c.ctype, a.qty, a.doa, a.doe, u.fname, u.lname, v.vname, v.thumb
      	 FROM tbl_hardwares h, tbl_categories c, tbl_assignments a, tbl_users u, tbl_vendors v
		 WHERE h.id = a.type AND h.cid = c.cid AND a.uid = u.uid AND h.vid = v.id AND a.entity = 1
		 ORDER BY h.hw_name";
		
$ssql = "SELECT a.id, s.sw_name, c.cname, c.ctype, a.qty, a.doa, a.doe, u.fname, u.lname, v.vname, v.thumb
      	 FROM tbl_softwares s, tbl_categories c, tbl_assignments a, tbl_users u, tbl_vendors v
		 WHERE s.id = a.type AND s.cid = c.cid AND a.uid = u.uid AND s.vid = v.id AND a.entity = 2
		 ORDER BY s.sw_name";
				
$result = dbQuery($hsql);
$results = dbQuery($ssql);
?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<strong>A complete List of hardware Assigment.</strong>
<br/><br/>
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Hardware</td>
   <td>Qty</td>
   <td>Vendor</td>
   <td>Category</td>
   <td>D.O.A./D.O.E</td>
   <td>Assign To</td>
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
   <td><?php echo $hw_name; ?></td>
   <td align="center"><?php echo $qty; ?></td>
   <td align="center">
   <img src="<?php echo $img;?>" title="<?php echo $vname; ?>" /></td>
   <td align="center"><?php echo $cname.", ".$ctype; ?></td>
   <td align="center"><?php echo $doa." / ".$doe; ?></td>
   <td align="center"><?php echo $lname.", ".$fname; ?></td>
  </tr>
<?php
} // end while

?>
 </table>
 <p>&nbsp;</p>
</form>
</div>

<div class="prepend-1 span-17">
<strong>A complete List of Software Assign.</strong>
<br/><br/>
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Hardware</td>
   <td>Qty</td>
   <td>Vendor</td>
   <td>Category</td>
   <td>D.O.A./D.O.E</td>
   <td>Assign To</td>
  </tr>
<?php
while($row = dbFetchAssoc($results)) {
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
   <td align="center"><?php echo $qty; ?></td>
   <td align="center">
   <img src="<?php echo $img;?>" title="<?php echo $vname; ?>" /></td>
   <td align="center"><?php echo $cname.", ".$ctype; ?></td>
   <td align="center"><?php echo $doa." / ".$doe; ?></td>
   <td align="center"><?php echo $lname.", ".$fname; ?></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Assign Asset to User (+)" class="button" onClick="assignAsset()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>


</div>