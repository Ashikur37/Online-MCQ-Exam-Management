<!DOCTYPE html>
<html>
<head>
	<?php 
		include_once("config.php");
		$sql="SELECT * FROM login l,student s,program p where l.student_id=s.student_id and s.program=p.id";
		$result=$mysqli->query($sql);
	?>
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
			<li><a href="unaproved_user.php">unaproved_user</a> </li>
			<li  class="active"><a href="view_user.php">View user</a> </li>
			<li><a href="#">Block user</a> </li>
		</ul>
		</div>
		</nav>
		<div class="container">

			<table class="table table-striped">
				<tr>
					<th>Student Name</th>
					<th>Student ID</th>
					<th>Email</th>
					<th>Program</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<?php
					while($res=$result->fetch_object())
					{
						echo "<tr>";
						echo "<td>".$res->student_name."</td>";
						echo "<td>".$res->student_id."</td>";
						echo "<td>".$res->email."</td>";
						echo "<td>".$res->program_name."</td>";
						if($res->type==1)
						{
							echo "<td class='text text-success'>Verified</td>";
							echo "<td ><a class='btn btn-sm btn-danger' href='block.php?id=".$res->student_id."'>Block</td>"; 
						}
						else if($res->type==0)
						{
							echo "<td class='text text-warning'>Unverified</td>";
							echo "<td ><a class='btn btn-sm btn-success' href='verify.php?id=".$res->student_id."'>Verify</td>"; 
						}	
						else if($res->type==5)
						{
							echo "<td class='text text-danger'>Blocked</td>";
							echo "<td ><a class='btn btn-sm btn-info' href='unblock.php?id=".$res->student_id."'>Unblock</td>";
						}

						echo "</tr>";
					}
				?>
			</table>
		</div>
</body>
</html>