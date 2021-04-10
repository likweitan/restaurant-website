

<html>
<body>
<?php
    require("config.php");
    #$username = $_SESSION['username'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $date_input = $_POST['date_input'];
    $time_input = $_POST['time_input'];
    $datentime = '0000-00-00 00:00:00';
    $num_people = $_POST['num_people'];

    $insertBooking =  mysqli_query($link,"INSERT INTO bookingform (customer_name,contact,datentime,people)
    VALUES('$name','$contact','$datentime', '$num_people')");

    echo $insertBooking
?>
</body>
</html>