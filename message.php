<?php
    include("connection.php");
    error_reporting(0);

    $u_id = $_GET['id']; 

    if($u_id == false){
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="message.css">
    <link rel="stylesheet" href="libs/emojionearea.min.css">
    <link rel="shortcut icon" href="assests/prank.png" type="image/x-icon">
    <script src="libs/emojionearea.min.js"></script>
</head>
<body>
    <div class="aaru">
        <b style="float: left;">&#128274;Prank.XYZ&#128525;</b>
        <a href="login.php" style="float: right" id="login">Login</a>
    </div>
    <br><br>

    <div id="main">
        <div id="outer">
            <span style="font-size: 19px;">
                Message your friend Secretly&#128521;, he/she will never know who messaged him/her.&#128517;
            </span>
            <br><br>
            <form action="" method="post">
                <textarea name="msg" placeholder="Enter your text message" required></textarea>
                <br><br>
                <input type="checkbox" name="pubg" required checked>&nbsp;You agree to <a href="#" id="jai">&nbsp;Privacy Policy</a>&nbsp;And <a href="#" id="jai">Terms and condition </a>
                 of our Website.
                <br><br>
                <input type="submit" value="Send Secret Message&#128526;" name="submit">
            </form>
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
        $msg = $_POST['msg'];

        $query_insert = "INSERT INTO messages(u_id,msg)VALUES('$u_id','$msg')";
        $data_insert = mysqli_query($conn,$query_insert);
        
        if($data_insert){
            ?>
                <script>
                    window.alert("Message Sent!");
                </script>
            <?php
        }else{
            ?>
                <script>
                    window.alert("Message not Sent!\n"<b>"Please remove Emoji...."</b>);
                </script>
            <?php
        }

    }
?>    