<?php 
$id = (int)$_GET['id'];
$con = mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("db_myasset");

$hsql = "SELECT h.id AS id, h.hw_name AS name, v.vname AS vname 
		 FROM tbl_hardwares h, tbl_vendors v
		 WHERE h.vid = v.id";

$ssql = "SELECT s.id AS id, s.sw_name AS name, v.vname AS vname 
		 FROM tbl_softwares s, tbl_vendors v
		 WHERE s.vid = v.id";

$result = mysql_query($id == 1 ? $hsql : $ssql);
$data = "<select name=\"type\">";
while($row = mysql_fetch_assoc($result)){
	extract($row);
	$data .= "<option value=\"$id\">".$name." ( VENDOR : ".$vname." )</option>";
}
$data .="</select>";
mysql_close($con);
echo $data;

?>