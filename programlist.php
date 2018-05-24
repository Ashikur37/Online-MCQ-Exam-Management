<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<?php 
		 include_once("config.php");
		 $dept=$_GET["dp"];
		 $sql="select * from program where department='$dept'";
		 $result=$mysqli->query($sql);
	?>
<body>
		<option value="">Choose Program</option>
		<?php
		while($res=$result->fetch_object())
		{
			echo "<option value='".$res->id."'>".$res->program_name."</option>";
		}
		?>
</body>
</html>