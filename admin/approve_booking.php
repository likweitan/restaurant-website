<?php
//including the database connection file
require '../config.php';


if(isset($_GET["booking_id"]))
{
    $booking_id = $_GET["booking_id"];
    $result = mysqli_query($link, "UPDATE bookingform SET booking_status='approved' WHERE booking_id=$booking_id");
    header("Location: index.php");
}

?>