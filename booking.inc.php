

<html>
<body>
<?php
    require("config.php");
    session_start();
    $user_id = $_SESSION['id'];
    $booking_fullname = $_POST['name'];
    $booking_contact = $_POST['contact'];
    $booking_date = $_POST['date_input'];
    $booking_time = $_POST['time_input'];
    $numberPerson = $_POST['num_people'];

    $insertBooking =  mysqli_query($link,"INSERT INTO bookingform (user_id,booking_fullname,booking_contact,booking_date,booking_time,numberPerson)
    VALUES('$user_id','$booking_fullname','$booking_contact', '$booking_date', '$booking_time', '$numberPerson')");

    #echo $insertBooking
    if($insertBooking){
        header("location: status.php");
    }
    else{
        header("location: bookingform.php?error=failed");
    }
?>
</body>
</html>