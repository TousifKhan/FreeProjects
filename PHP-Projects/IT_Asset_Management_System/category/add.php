<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


?> 
<div class="prepend-1 span-14">
<p style="margin-top:20px;">This form is used to create new Hadrware/ Software category.</p>
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="category/processCat.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add New Category </td>
   </tr>
  <tr> 
   <td width="150" class="label">Category Name</td>
   <td class="content"> <select name="txtCname">
   	<option value="Hardware">Hardware</option>
	<option value="Software">Software</option>
   </select>
   </td>
  </tr>
  <tr> 
   <td width="150" class="label">Type</td>
   <td class="content"> <input name="txtType" type="text" id="txtType" value="" size="20" maxlength="20"></td>
  </tr>
  <tr>
    <td class="label">Description</td>
    <td class="content"><textarea name="txtDesc" cols="20" rows="2" id="txtDesc"></textarea></td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button"   class="button" id="btnAddUser" value="Add Category (+) " onClick="checkAddCatForm();" >
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value=" (x) Cancel " onClick="window.location.href='category';">  
 </p>
</form>
</div>