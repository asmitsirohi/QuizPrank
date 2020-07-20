<?php
    session_start();
    include("connection.php");
    $msg = $_GET['msg'];
    $id = $_SESSION['u_id'];

    $query = "DELETE FROM messages WHERE msg='$msg'";
    $data = mysqli_query($conn,$query);

    header("location:result.php?id=$id");

?>