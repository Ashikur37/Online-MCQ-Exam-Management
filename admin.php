<html>
 <head>
 	<?php
 		include_once("config.php");
 		$sql="select * from login where type='0'";
 		$result=$mysqli->query($sql);
 		$count_unaproved=mysqli_Num_rows($result);
 	?>
	 <link type="text/css" rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="Asset/css/bootstrap.min.css">
	 <script src="Asset/js/jquery-3.2.1.min.js"></script>
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
		<li class="active"><a href="admin.php">Home</a> </li>
			<li><a href="unaproved_user.php">unaproved_user <span class="badge"><?php echo $count_unaproved;?></span></a> </li>
			<li><a href="#">View user</a> </li>
			<li><a href="#">Block user</a> </li>
		</ul>
		</div>
		</nav>
	
	
	</body>
</html>