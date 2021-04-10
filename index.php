<?php
require("config.php");
// Initialize the session
session_start();

if(isset($_SESSION['id']))
{
    $sql = "SELECT *
            FROM users
            WHERE user_id =".$_SESSION['id'];
    $query = mysqli_query($link,$sql);
    if($query)
    {
        while($row = mysqli_fetch_array($query))
        {
            $myRole = $row['role'];
        }
    }
}

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
else if($myRole == 'admin'){
    header("location: admin.php");
}
else{
    header("location: welcome.php");
}
?>