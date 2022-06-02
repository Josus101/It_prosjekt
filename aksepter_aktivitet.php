<?php
session_start();
$user_id = $_SESSION['user_id'];
$aktivitet_id = $_GET['aktivitet_id'];
require 'connect.php';

$sql = "INSERT INTO aktivitet_users (aktivitet_id, user_id) VALUES ($aktivitet_id, $user_id)";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully <br>";
    echo "Du har akseptert aktiviteten";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} 
?>
<head>
    <meta http-equiv="refresh" content="2; url='aktiviteter.php'">
</head>
