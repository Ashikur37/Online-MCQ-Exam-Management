<?php

// server info
$server = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'exam_result';

$mysqli = new mysqli($server, $dbuser, $dbpass, $db);

// show errors 
mysqli_report(MYSQLI_REPORT_ERROR);		
	
?>

