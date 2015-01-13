<?php
$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
?>
<style>
.catBox {
	border:#094080 solid 1px;
	float:left;
	background-color:#D2E1E6;
	width:300px;
	margin-right:20px;
	margin-bottom:20px;
	margin-left:20px;
	padding-left:10px;
	padding-top:10px;
	border-radius:10px;
	border-radius:10px;
}

.catBox img.cImage {
	border:0px;
	float:left;
	padding:4px;
}
.catBox a {
	font-size:14px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-weight:bold;
	color:#094080;
}

.catBox a:hover {color:#FF9966;}
.catBox p {
	font-size:12px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	line-height:18px;
}
</style>

<div style="prepend-1 span-18 last">
<p>&nbsp;</p>
<p align="center" style="font-size:16px;font-weight:bold;">Welcome to Asset Management System</p>
<p align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px; margin-bottom:40px;">Choose a menu from the left navigation to get started</p>

<div class="span-18">

<div class="catBox">
<img src="<?php echo WEB_ROOT; ?>images/hw.png"  class="cImage" />
<a href="<?php echo WEB_ROOT; ?>menu.php?v=HRWR">Hardware Details</a>
<p>Choose a menu from the left navigation to get  all property details, add prooerty, edit property or delete it. You the property list by property categories, view thumbnail of Property.</p>
</div>

<div class="catBox">
<img src="<?php echo WEB_ROOT; ?>images/software.png"  height="36" width="36" class="cImage" />
<a href="<?php echo WEB_ROOT; ?>menu.php?v=SFWR">Software Details</a>
<p>Start from here to get the details of banks listed in a city. You can add bank, remove bank, or even modify it name, address. Remember deleting a bank will delete all the properties.</p>
</div>

</div>

<div style="span-18">


<div class="catBox">
<img src="<?php echo WEB_ROOT; ?>images/search.png" class="cImage" />
<a href="<?php echo WEB_ROOT; ?>menu.php?v=STCK">Search Stocks</a>
<p>Get the list of a city avaliable in Maharashtra State. View city details, Add city or delete it complelty. Remember, deleting a city will delete entire property records in it.</p>
</div>

<div class="catBox">
<img src="<?php echo WEB_ROOT; ?>images/users.png" class="cImage" />
<a href="<?php echo WEB_ROOT; ?>menu.php?v=USER">Register Users</a>
<p>View the list of a admin user(s). An admin can create a admin, sub-admin. sub-admin can't create a admin, or sub-admin. Access previledge is given to all the roles with responsibility.</p>
</div>


</div>


</div>
<p>&nbsp;</p><p>&nbsp;</p>