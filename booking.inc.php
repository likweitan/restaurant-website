

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

    $booking_fullname_err = $booking_contact_err = $booking_date_err = $fullname_err = $insertBooking = "";
    // checking empty fillin
    if(empty(trim($booking_fullname))){
        $booking_fullname_err = "Please enter your name.";
    }

    if(empty(trim($booking_contact))){
        $booking_contact_err = "Please enter your contact number.";
    }

    if(empty(trim($booking_date))){
        $booking_date_err = "Please enter your booking date.";
    }

    if(empty(trim($booking_time))){
        $booking_time_err = "Please enter your booking time.";
    }

    if(empty(trim($numberPerson))){
        $booking_numberPerson_err = "Please enter number of person.";
    }
         
    // if one of them is not empty then error 
    if(empty($booking_fullname_err) && empty($booking_contact_err) && empty($booking_date_err) && empty($booking_time_err) && empty($booking_numberPerson_err)){
        $insertBooking =  mysqli_query($link,"INSERT INTO bookingform (user_id,booking_fullname,booking_contact,booking_date,booking_time,numberPerson)
        VALUES('$user_id','$booking_fullname','$booking_contact', '$booking_date', '$booking_time', '$numberPerson')");

        header("location: status.php");


    }else{
        header("location: bookingform.php?error=failed");
    }
    


?>
</body>
</html>