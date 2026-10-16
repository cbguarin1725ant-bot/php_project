<?php

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') 
{
    header('location: home.php');
    exit;
}

$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$email =  trim($_POST['email']);
$service = $_POST['service'];
$date = $_POST['date'];
$time = $_POST['time'];

$invalid = '';

//Checks if user input is invalid
if ($name == '' || $phone == '') 
{
    $invalid = 'Please fill your name or phone number.';
}

elseif($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
    $invalid = 'Invalid email.';
}

elseif ($service != 'Gel Polish' && $service != 'Softgel Extension' && $service != 'Softgel Extension Removal') 
{
    $invalid = 'Invalid service.';
}

elseif ($date < date('Y-m-d'))
{
    $invalid = 'Please choose a future date.';
}

elseif ($time != '10:00' && time != '13:00' && $time != '16:00')
{
    $invalid = 'Invalid time.';
}

//Checking the available appointment time
if ($error = '')
{
    $check = $db->prepare("SELECT COUNT(*) FROM bookings WHERE booking_date = ? AND booking_time = ? AND status != 'cancelled'");
    $check->execute([$date, $time]);
    $howMany = $check->fetchColumn();

    if ($howMany > 0)
    {
        $invalid = 'Sorry, that time is already taken. Please pick another.';
    }
}
//Handles error while booking
if ($error != '') 
{
    header('location: home.php?error=' . urlencode($invalid) . '#booking');
    exit;
}

//Saves the booking
$save = $db->prepare("INSERT INTO bookings (name, phone, email, service, booking_date, booking_time) VALUES (?, ?, ?, ?, ?, ?)");
$save->execute([$name, $phone, $email, $service, $date, $time]);

header('location: home.php?booked=1#booking');
exit;


?>