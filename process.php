<?php

require("config.php");

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'capstone');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error($mysqli));

if (isset($_POST['savecont'])){
    $name = $_POST['name']; 
    $contact = $_POST['contact'];
    $date_input = $_POST['date_input'];
    $time_input = $_POST['time_input'];
    $num_people = $_POST['num_people'];

    $mysqli -> query("INSERT INTO bookingform (customer_name, contact, datentime, people) 
                        VALUES ('$name','$contact','$date_input','$num_people')") or
                            die($mysqli -> error);
}

    