<?php
    session_start();
    include("connection.php");
    error_reporting(0);
    
    $u_id = $_GET['id'];
    $pin = $_SESSION['pin'];

    $_SESSION['u_id'] = $u_id;

    if($pin==false){
        header("location:index.php");
    }

    $query = "SELECT * FROM messages WHERE u_id = $u_id";
    $data = mysqli_query($conn,$query);

    $query_name = "SELECT * FROM users WHERE u_id = '$u_id'";
    $data_name = mysqli_query($conn,$query_name);
    $result_name = mysqli_fetch_assoc($data_name);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sent Secret Messages</title>
    <link rel="stylesheet" href="result.css">
    <link rel="shortcut icon" href="assests/prank.png" type="image/x-icon">
    <link rel="stylesheet" href="libs/emojionearea.min.css">
    <script src="libs/emojionearea.min.js"></script>
</head>
<body>
    <div id="intro">
        <b>&#128521;Let's Connect&#128073;</b> 
        &nbsp;<span id="image"><img src="assests/insta.png" width="30"></span>
        &nbsp;
        <span id="image"><img src="assests/twitter.png" width="30"></span>
    </div>
    <div class="aaru">
            <b style="float: left;">&#128274;SECRET MESSAGE 2020&#128525;</b>
            <a href="logout.php" style="float: right" id="logout" >Log out</a>
    </div>
    <br><br>

    <div id="main">
        <div id="outer">
            <div id="user">
                Please take a screenshot of these details <br>
                <hr>
                <b>User ID: <i style="background-color:black; color:white;"><?php echo $u_id;?></i></b><br><br>
                <b>Pin: <i style="background-color:black; color:white;"><?php echo $pin;?></i></b><br>
                <hr>
                You need these details to login from anywhere! PIN cannot be restored!
            </div>
            <br>
            <div id="content">
                Share this link with your friends and collect anonymous Messages <br><br>
                <input type="text" name="url" id="url" value="localhost/quizprank/message.php?id=<?php echo $u_id; ?>" readonly>
                <br><br>
                <button id="copy" onclick="myfunc();">Click to copy</button>
                <button id="whatsapp" onclick="sendWhatsapp();">Add to Whatsapp story</button>
                <button id="twitter" onclick="twit();">Add to Twitter Bio</button>
                <br><br><br>

                <span id="imp">Important</span> Please allow notification to get notified about new messages. <br>
                <span id="imp">Important</span> There are no ways to know who messaged you! <br>
                <span id="new">New</span> To see newly received messages, Refresh and scroll down on this page. Only you will see the received messages. Have FUN!
            </div>
        </div>
        <br><br>
        <div id="anonymous">
            Anonymous Message Timeline
        </div>
        <br><br>
        <?php
            if(mysqli_num_rows($data)){
                while($result = mysqli_fetch_assoc($data)){
                    echo "<div id='main'>
                            <div id='outer' style='text-align:center;'>
                                <div id='msg'>
                                     ".$result['msg']." 
                                </div>
                                <br>
                                <a href='delete.php?msg=$result[msg]' id='delete'>Delete</a>
                                <br><br>
                            </div>
                        </div><br><br>";
                }
            }else{
                echo "<div id='main'>
                        <div id='outer'>
                            <div id='msg'>
                                No messages yet! share your link on whatsapp and twitter to receive messages. 
                            </div>
                        </div>
                      </div>";
            }
            
        ?>
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
    <div id="refresh">
        <button onclick="location.reload();" id="ref">Refresh Messages &#8635;</button>
    </div>

    <script>
        function myfunc() { 
              var copyGfGText = document.getElementById("url"); 
              copyGfGText.select(); 
              document.execCommand("copy"); 
              alert("Link copied to clipboard! Paste it and have fun!"); 
        }

        function sendWhatsapp(){
            var url = document.getElementById("url").value;
            var sMsg = encodeURIComponent( "Send secret message 😁 to <?php echo $result_name['uname']; ?>
                             they will never know who send them which message 😝. Its's fun Try here👉 " + url);
            var whatsapp_url = "whatsapp://send?text=" + sMsg;
            window.location.href = whatsapp_url;
        }

        function twit(){
            var copyGfGText = document.getElementById("url"); 
              copyGfGText.select(); 
              document.execCommand("copy");
            window.alert("Link copied successfully!\nNow paste it into your Twitter BIO");
        }
    </script>
</body>
</html>