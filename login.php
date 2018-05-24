<!DOCTYPE html>
<html>
	<head>
        <link type="text/css" rel="stylesheet" href="style.css">
	</head>
	<?php
	include_once("config.php");
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$uid=$_POST["uid"];
			$pass=$_POST["pass"];
			$sql="select * from login where student_id='$uid' and password='$pass'";
			$result=$mysqli->query($sql);
			$row=mysqli_num_rows($result);
			$type=-1;
			if($row>0)
			{
				while($res=$result->fetch_object())
				{
					$type=$res->type;
				}
				if($type==0)
				{
					header("location:unverified.php");
				}
				else if($type==1)
				{
					header("location:user.php");
				}
				else if($type==2)
				{
					header("location:admin.php");
				}
				else if($type==3)
				{
					header("location:librarian");
				}
			}
		}

?>
	
	<body>
         <header><img src="img/logoname.png">
			<h2>Hamdard University Library</h2></header>
       <div class="content"><div class="form">
            <form method="post" action="login.php" >
               
                 <input type="text" name="uid" placeholder="User ID" > 
                 
                 <input type="password" name="pass" placeholder="Password" ><text ></text> 
                 <div class="login"><input type="submit" value="Log in"></div>
				
				<div class="signin">
					<a href="signup.php">Sign Up</a>
				</div>
            </form>
        </div>
		 </div>
		    <div class="footer">
        <div class="wrap">
            <div class="footer-grids">
                <div class="footer-grid">
                    <h3>EXTRAS</h3>
                    <p>Ut rutrum neque a mollis laoreet diam enim feuiat dui nec ulacoper quam felis id diam. Nunc ut tortor ligula eu petiu risus. Pelleesque conquat dignissim lacus quis altrcies.</p>
                </div>
                <div class="footer-grid">
                    <h3>RECENT POSTS</h3>
                    <ul>
                        <li><a href="#">Vestibulum felis</a></li>
                        <li><a href="#">Mauris at tellus</a></li>
                        <li><a href="#">Donec ut lectus</a></li>
                        <li><a href="#">vitae interdum</a></li>
                    </ul>
                </div>
                <div class="footer-grid">
                    <h3>USEFUL INFO</h3>
                    <ul>
                        <li><a href="#">Hendrerit quam</a></li>
                        <li><a href="#">Amet consectetur </a></li>
                        <li><a href="#">Iquam hendrerit</a></li>
                        <li><a href="#">Donec ut lectus </a></li>
                    </ul>
                </div>
                <div class="footer-grid footer-lastgrid">
                    <h3>CONTACT US</h3>
                    <p>Pelleesque conquat dignissim lacus quis altrcies.</p>
                    <div class="footer-grid-address">
                        <p>Tel.800-255-9999</p>
                        <p>Fax: 1234 568</p>
                        <p>Email:<a class="email-link" href="#">email(at)academia.com</a></p>
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
            <div class="copy-right">
                <p>Design by <a href="">&nbsp;Fawzia</a></p>
            </div>
        </div>
    </div>
    </body>
</html>