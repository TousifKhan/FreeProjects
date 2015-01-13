<?php


//Example to add 1 year to a date object

$currentDate = date("Y-m-d");// current date

//Display the current date
echo "Current Date: ".$currentDate."<br>";

//Add one year to current date
$dateOneYearAdded = strtotime(date("Y-m-d", strtotime($currentDate)) . " +1 year");
echo "Date After adding one year: ".date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . " +1 year"))."<br>";

?>