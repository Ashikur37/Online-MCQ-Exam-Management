<html>
 <head>
	<link rel="stylesheet" href="Asset/css/bootstrap.min.css">
	 <link rel="stylesheet" href="Asset/css/datepicker3.css">
	 <script src="Asset/js/jquery-3.2.1.min.js"></script>
	 <script src="Asset/js/bootstrap-datepicker.js"></script>
	 <script src="Asset/js/myscripts.js"></script>
	 <script src="Asset/js/bootstrap-datepicker.js"></script>
	 <link type="text/css" rel="stylesheet" href="style.css">
	      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	 <?php
	 include_once("config.php");	
	 $sql="select * from department";
        $dresult=$mysqli->query($sql);
        if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$sid=$_POST["sid"];
            $sname=$_POST["sname"];
			$email=$_POST["email"];
			$pass=$_POST["pass"];
			$confirmpass=$_POST["confirmpass"];
            $dob=$_POST["dob"];
            $department=$_POST["department"];
            $program=$_POST["program"];
            $target_dir = "Asset/uploads/images/";
            $target_file = $target_dir .$_POST["sid"].".jpg";
            $sql="select * from student where student_id=$sid";
            $sresult=$mysqli->query($sql);
            $gender=$_POST["gender"];
            if(mysqli_num_rows($sresult)==1)
                $iderror="Student ID already registered";
            else
               {
                $sql="insert into student values(null,'$sid','$sname','$email','$pass','$gender','$dob','$program')";
                $mysqli->query($sql);
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file); 
				      $sql1="insert into login values(null,'$sid','$pass','0')";
			       $mysqli->query($sql1);
                header("location:success_student.php?id=$sid");
               } 
		}
	 ?>
	 </head>
 <body>
	<header><img style="margin-bottom: 1%;" src="img/logoname.png">
			<h2 style="color:white;">Hamdard University Library</h2></header>
	 <nav style="margin-bottom:0;" class="navbar navbar-inverse">
  <div class="container-fluid">

    <ul class="nav navbar-nav">
      <li ><a href="user.php">Home</a></li>
	  <li ><a href="#">About</a></li>
      <li><a href="user.php">Library</a></li>
      <li class="active"><a href="signup.php">Registration</a></li>
	  <li><a href="#">Issues</a></li>
      <li><a href="#">Contact us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
	<div style="width:100%; margin-left:0;" class="container">
	 <div class="panel panel-success">
		 <div class="panel-heading">
                    <h4 style="color: darkslategrey; font-weight: bold;font-size: 18px;" class="text text-info">Registration form</h4>
                </div>
		 <div class="panel-body">
		 <form action="" onsubmit="return validate()" method="post" enctype="multipart/form-data">
			 <div class="form-group">
    <label  style="display: block;" >Student ID</label>
    <input type="text" class="form-control" name="sid" placeholder="Student ID "style="width:70%; display: inline;" id="sid">
  <span class="text text-danger" id="eid"></span>
  </div>
		<div class="form-group">
    <label  style="display: block;">Student Name</label>
    <input type="text" class="form-control" name="sname" placeholder="Student name same as ID card " style="width:70%; display: inline;" id="sname">
<span class="text text-danger" id="ename"></span>
  </div>
  <div class="form-group">
    <label  style="display: block;">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email" style="width:70%; display: inline;" required="">
    
  </div>
  <div class="form-group">
    <label style="display: block;">Password</label>
    <input type="password" class="form-control" id="spass" placeholder="Password" name="pass" style="width:70%; display: inline;">
	  <span class="text text-danger" id="epass"></span>
  </div>
			 <div class="form-group">
    <label  style="display: block;">Confirm Password</label>
    <input type="password" class="form-control" id="cspass" placeholder="Confirm Password" name="confirmpass" style="width:70%; display: inline;"><span class="text text-danger" id="cepass"></span>
  </div>
			 <div class="form-group">
    <label style="display: block;" >Gender</label>
    <label class="radio-inline">
      <input type="radio" checked="true" name="gender"  value="Male">Male
    </label>
    <label class="radio-inline">
      <input type="radio" name="gender" value="Fe-male">Fe-male
    </label>
  </div>
			<div class="form-group">
                    <label style="display: block;">Date of birth</label>
                    <input type="text" class="form-control " id="datepicker" style="width:70%; display: inline;" name="dob">
                    <span class="text text-danger" id="edob"></span>
                </div>
			  <div class="form-group">
                    <label  style="display: block;">Department</label>
                    <select name="department" class="form-control" id="dp" style="width:70%; display: inline;">
                        <option value="">Choose Department</option>
                        <?php
                          while($res=$dresult->fetch_object())
                          {
                            echo "<option value='".$res->id."'>".$res->department_name."</option>";
                          }
                        ?>
                    </select> <span class="text text-danger" id="edp"></span>
			 </div>
			  <div class="form-group">
                    <label style="display: block;">Program</label>
                    <select name="program" class="form-control" style="width:70%; display: inline;" id="prg">
                        <option value="">Choose Program</option>
                    </select><span class="text text-danger" id="epr"></span>
                     </div>
			 <div class="form-group">
                    <label  style="display: block;">Profile Image</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" style="width:70%; display: inline;"> <span class="text text-danger" id="eimg"></span></div>
  <input type="submit" class="btn btn-primary" value="signup">
</form>
		 
		 </div>
		</div>
	 </div>
	
	
 </body>
</html>