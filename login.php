<?php
    session_start();
	include("connection.php");
	error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="shortcut icon" href="assests/prank.png" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="aaru">
        <b>&#128274;SECRET MESSAGE 2020&#128525;</b>
    </div>
    <br>
    <div id="main">
        <div id="outer">
                <span style="font-size: 25px;">Login to check your Secret Messages!</span>
                <p>
                    Only for existing users, new users can create account from here ->
                    <a href="index.php">Create Account</a>
                </p> 
                <br>
                <form action="" method="post">
                    <input type="text" name="u_id" placeholder="Enter user ID">
                    <br><br>
                    <input type="password" name="pin" placeholder="Enter PIN">
                    <br><br>
                    <input type="submit" value="Login" name="submit">
                </form>
                <p>Tutorial:</p>
                <img src="assests/detail.png" alt="image" >
                <p>
                    In the user ID section above, fill your unique user ID. 
                    Please refer to the screenshot you took earlier (not the screenshot above) i.e. while creating your account.
                    <b>Please do not fill your name there.</b> A lot of users are filling there name here and complaining that they are unable to login. 
                </p>    
                <br>
                <p>If you forgot PIN, create a new account. There is no way to recover PIN. And you will losse all your message from the previous account.</p>
                <p>If you are facing any other problem while login, please contact me and describe everything in detail!</p>
            </div>
            <br>
            <div id="outer">
                <ul>
                    <li>Message your friend anonymously, they will never know who sent the message.&#128525;</li>
                    <li>This website is just for fun&#128540;. Do not go out of your way to spread hate.&#128581;</li>
                </ul>
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
        $u_id = $_POST['u_id'];
        $pin = $_POST['pin'];

        $query = "SELECT * FROM users WHERE u_id='$u_id' && pin='$pin'";
        $data = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($data);

        if(mysqli_num_rows($data)){
            $_SESSION['pin'] = $pin;

            echo "<script>window.location.href='result.php?id=$u_id'</script>";
        }else{
            ?>
                <script>
                    window.alert("User ID, Password combination invalid, Try again!");
                </script>
            <?php
        }

        
    }
?>