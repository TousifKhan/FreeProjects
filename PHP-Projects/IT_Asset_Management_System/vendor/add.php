<div class="prepend-1 span-17">
<?php
if (!defined('WEB_ROOT')) {
	exit;
}
?> 

<form action="processCategory.php?action=add" method="post" enctype="multipart/form-data" name="frmCategory" id="frmCategory">
 <p align="center" class="formTitle">&nbsp;</p>
 
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add New Vendor</td>
  </tr>
  <tr> 
   <td width="150" class="label">Vendor Name</td>
   <td class="content"> <input name="txtName" type="text" id="txtName" size="30" maxlength="50"></td>
  </tr>
  <tr>
    <td class="label">Contact No. </td>
    <td class="content"><input name="txtCno" type="text" id="txtCno" size="30" maxlength="50" /></td>
  </tr>
  <tr> 
   <td width="150" class="label">Address</td>
   <td class="content"> <textarea name="txtAddress" cols="30" rows="2"  id="txtAddress"></textarea></td>
  </tr>
  <tr> 
   <td width="150" class="label">Image</td>
   <td class="content"> <input name="fleImage" type="file" id="fleImage" > 
    <input name="hidParentId" type="hidden" id="hidParentId" value="<?php echo $parentId; ?>"></td>
  </tr>
  <tr>
    <td class="label">Email Id </td>
    <td class="content"><input name="txtEmail" type="text" id="txtEmail" size="30" maxlength="50" /></td>
  </tr>
  <tr>
    <td class="label">Website</td>
    <td class="content"><input name="txtWebsite" type="text" id="txtWebsite" size="30" maxlength="100" /></td>
  </tr>
  <tr>
    <td class="label">&nbsp;</td>
    <td class="content">&nbsp;</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddCategory" type="button" id="btnAddCategory" value="Add Vendor" onClick="checkCategoryForm();" class="button">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='<?php echo WEB_ROOT;?>vendor';" class="button">  
 </p>
</form>
</div>