<?php

//Require connection to the database
require 'db.php';
$submit=1;

if ($_SERVER['REQUEST_METHOD']=='POST') {
    //Get the message submited Sanitize and validated it
    $messages = htmlspecialchars(trim($_POST['message']));
    $names = htmlspecialchars($_POST['names']);
    $email =htmlspecialchars(trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)));


    $sql="INSERT INTO messages (`message`,`names`, `email`) values('$messages', '$names', '$email')";
    $check=$conn->query($sql);
    if ($check==true) {
        echo "<script type='text/javascript'>alert('Hello I have recieved your message, I will get in touch with you ASAP via your email, thank you.');
    window.location='index.php';
    </script>";
    } else {
        echo 'error occured '.$conn->error;
    }
}