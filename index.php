<?php
	session_start();
	include("connection.php");
	error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quizprank</title>
	<link rel="stylesheet" type="text/css" href="quizprank.css">
	<link rel="shortcut icon" href="assests/prank.png" type="image/x-icon">
</head>
<body>
	<div class="aaru">
		<header>
			<b>&#128274;Prank.XYZ&#128525;</b>
	
			<a href="login.php" style="float: right" id="login">LOGIN</a>
	
		</header>
	</div>
	<br><br>
<div id="main">
	<div id="outer">
		<span style="font-size: 24px;">
			&#128274;SECRET MESSAGE 2020&#128525;
		</span>

		<ul>
  			<li>Get anonymous feedback from your friends, coworkers and Fans.</li>
  			<li>Improve your relations by discovering your Strengths &#128170; and areas of Improvement.</li>
  			<li>Please allow NOTIFICATION to receive all the notification about new messages.</li>
		</ul>
    	<br>
		<form action="" method="post">
 		   YOUR NAME:<br><br>
 		   <input type="text" name="uname" placeholder="Enter Your Name" required>
 		   <br><br>
 		   <input type="checkbox" name="pubg" required checked>&nbsp;You agree to <a href="#" id="jai">Privacy Policy </a>And <a href="#" id="jai">Terms and condition </a>
 			of our Website.
 			<br><br>
 			<input type="submit" name="submit" value="Create Your Link">
		</form>
	</div>

	<br><br>
	<div class="gujjar">
	
	</div>
</div>
<br><br><br>
<div class="gujjar2">
        <ul id="ul">
            <li><a href="tnc.html" id="a"><b>TERM OF USE</b></a></li>
            <li><a href="aboutus.html" id="a"><b>ABOUT US</b></a></li>
            <li><a href="dis.html" id="a"><b>DISCLAIMER</b></a></li>
            <li><a href="pnp.html" id="a"><b>PRIVACY POLICY</b></a></li>
            <li><a href="cntct.html" id="a"><b>CONTACT US</b></a></li>
        </ul>      
    </div>
    <footer>&#169; 2020 Copyright:&#128274;Secret Messages 2020&#128525; </footer>
</body>
</html>

<?php
	if(isset($_POST['submit'])){
		$uname = $_POST['uname'];
		$u_id = mt_rand();
		$pin = mt_rand(1000,10000);

		$query_insert = "INSERT INTO users(u_id,uname,pin)VALUES('$u_id','$uname','$pin')";
		$data_insert = mysqli_query($conn,$query_insert);

		if($data_insert){
			$_SESSION['pin'] = $pin;

			echo "<script>window.location.href='result.php?id=$u_id'</script>";
		}
	}
?>