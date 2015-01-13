<?php
require_once 'library/config.php';
require_once 'library/functions.php';

$errorMessage = '&nbsp;';

if (isset($_POST['txtUserName'])) {
	$result = doLogin();
	
	if ($result != '') {
		$errorMessage = $result;
	}
}

?>
<html>
<head>
<title>Asset Management - Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?php echo WEB_ROOT;?>css/screen.css" rel="stylesheet" type="text/css">
<link href="<?php echo WEB_ROOT;?>css/menu.css" rel="stylesheet" type="text/css">

<link href="<?php echo WEB_ROOT;?>include/style.css" rel="stylesheet" type="text/css">
<style>
body{ margin-top:20px; background-color:#EEEEEE;}
a {text-decoration:none;}
</style>
</head>

<body>
<div class="container" style="border: 1px solid #999999;">

<div class="span-24">
<img src="<?php echo WEB_ROOT; ?>images/asset_header.jpg" width="950"/>
</div>
<div class="span-6">&nbsp;</div>
<div class="span-12" style="margin:50px 0px;">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<img src="images/Vista_icons_09.png" />	</td>
    <td>
	<h2 style="font-size:18px;">User Login</h2>
		<form method="post" name="frmLogin" id="frmLogin">
		 <div class="errorMessage" align="center"><?php echo $errorMessage; ?></div>
         <strong>Name : </strong><input name="txtUserName" type="text" id="txtUserName"  size="10" maxlength="20"><br/>
         <strong>Password : </strong><input name="txtPassword" type="password"  id="txtPassword"  size="10"><br/>
         <br/>  <input name="btnLogin" type="submit" id="btnLogin" value="Login" class="button">

      </form>

	</td>
  </tr>
</table>

</div>
<div class="span-6">&nbsp;</div>
<div class="prepend-5 span-15 append-4" style="background-color:#F8F8F8; border-top:dashed 1px #181818;">
	<?php include_once("footer.php"); ?>
</div>	  
</div>
</body>
</html>
