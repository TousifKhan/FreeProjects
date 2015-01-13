<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT h.id, h.hw_name, h.qty, h.dop,  v.vname as vname, v.thumb AS thumb, c.cname AS cname, c.ctype AS ctype, h.price
        FROM tbl_hardwares h, tbl_categories c, tbl_vendors v
		WHERE h.vid = v.id AND h.cid = c.cid 
		ORDER BY hw_name";
$result = dbQuery($sql);

$sql1 = "SELECT s.id, s.sw_name, s.dop, s.exp_date, v.vname as vname, v.thumb AS thumb, c.cname AS cname, c.ctype AS ctype, s.price
        FROM tbl_softwares s, tbl_categories c, tbl_vendors v
		WHERE s.vid = v.id AND s.cid = c.cid
		ORDER BY sw_name";
$result1 = dbQuery($sql1);

?> 
<p>&nbsp;</p>
<?php include_once("tabs.php"); ?>
