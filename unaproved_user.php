<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="Asset/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
	<header><img style="margin-bottom: 1%;" src="img/logoname.png">
			<h2 style="color:white;">Hamdard University Library</h2></header>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand" href="#">Admin Side</a>
		</div>
		<ul class="nav navbar-nav">
		<li ><a href="admin.php">Home</a> </li>
			<li class="active"><a href="unaproved_user.php">unaproved_user</a> </li>
			<li><a href="view_user.php">View user</a> </li>
			<li><a href="#">Block user</a> </li>
		</ul>
		</div>
		</nav>
	<?php
		include_once("config.php");
		$sql="SELECT * FROM login l,student s,program p where l.student_id=s.student_id and l.type=0 and s.program=p.id";
		$result=$mysqli->query($sql);
		echo "<table style='width:100%;' class='table table-striped'><tr><td>Student_id</td><td>Student_name</td><td>Email</td><td>Gender</td><td>Program</td><td>Verify</td></tr>";
		while ($res=$result->fetch_object()) {
			echo "<tr>";
			echo "<td>".$res->student_id."</td>";
			echo "<td>".$res->student_name."</td>";
			echo "<td>".$res->email."</td>";
			echo "<td>".$res->gender."</td>";
			echo "<td>".$res->program_name."</td>";
			echo "<td><a class='btn btn-sm btn-info'href='verify.php?id=".$res->student_id."'>verify</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	?>
</body>
</html>
