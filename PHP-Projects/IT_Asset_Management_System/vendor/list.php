<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['id']) && (int)$_GET['id'] >= 0) {
	$id = (int)$_GET['id'];
	$queryString = "&id=$id";
} else {
	$catId = 0;
	$queryString = '';
}
	
// for paging
// how many rows to show per page
$rowsPerPage = 15;

$sql = "SELECT id, vname, address, cno, email, website, thumb
        FROM tbl_vendors
		ORDER BY vname";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);
?>
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<p><img src="<?php echo WEB_ROOT;?>images/vendor.png" class="left"/>
<strong>The following is a contact list of  Hardware and Software vendors.</strong>
<br/><br/>
The third-party contact information included is provided to help you find the technical support you need. This contact information is subject to change without notice. We in no way guarantees the accuracy of this third-party contact information.
</p>
<form action="processCategory.php?action=addCategory" method="post"  name="frmListCategory" id="frmListCategory">
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Vendor Name</td>
   <td>Contact No.</td>
   <td>Address</td>
   <td>E-mail</td>
   <td width="75">Image</td>
   <td width="75">Delete</td>
  </tr>
  <?php
$cat_parent_id = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		if ($i%2) {
			$class = 'row1';
		} else {
			$class = 'row2';
		}
		
		$i += 1;
		
		if ($thumb) {
			$thumb = WEB_ROOT . 'images/vendors/' . $thumb;
		} else {
			$thumb = WEB_ROOT . 'images/no-image-small.png';
		}		
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $vname; ?></td>
   <td><?php echo nl2br($cno); ?></td>
   <td><?php echo $address; ?></td>
   <td><?php echo $email; ?></td>
   <td width="75" align="center"><img src="<?php echo $thumb; ?>"></td>
   <td width="75" align="center"><a href="javascript:deleteVendor(<?php echo $id; ?>);">Delete</a></td>
  </tr>
  <?php
	} // end while


?>
  <tr> 
   <td colspan="5" align="center">
   <?php 
   echo $pagingLink;
   ?></td>
  </tr>
<?php	
} else {
?>
  <tr> 
   <td colspan="5" align="center">No Vendor Yet</td>
  </tr>
  <?php
}
?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"> <input name="btnAddCategory" type="button" id="btnAddCategory" value="Add Vendor" class="button" onClick="addVendor()"> 
   </td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>