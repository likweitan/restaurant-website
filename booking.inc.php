

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

    $error_msg = "";
    // checking empty fillin
    if(empty(trim($booking_fullname))){
        $error_msg = "Please enter your name.";
    }

    if(empty(trim($booking_contact))){
        $error_msg = "Please enter your contact number.";
    }

    if(empty(trim($booking_date))){
        $error_msg = "Please enter your booking date.";
    }

    if(empty(trim($booking_time))){
        $error_msg = "Please enter your booking time.";
    }

    if(empty(trim($numberPerson))){
        $error_msg = "Please enter number of person.";
    }

    // if one of them is not empty then error 
    if(empty($error_msg)){
        $insertBooking =  mysqli_query($link,"INSERT INTO bookingform (user_id,booking_fullname,booking_contact,booking_date,booking_time,numberPerson)
        VALUES('$user_id','$booking_fullname','$booking_contact', '$booking_date', '$booking_time', '$numberPerson')");

        header("location: status.php");


    }else{
        header("location: bookingform.php?error=1");
    }
    


?>
</body>
</html>