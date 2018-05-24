<?php

	include_once("config.php");
	$id=$_GET["id"];
	$sql="update login set type='1' where student_id='$id'";
	$mysqli->query($sql);
	header("location:unaproved_user.php");
?>
