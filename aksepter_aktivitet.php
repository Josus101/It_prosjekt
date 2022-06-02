<?php
session_start();
$user_id = $_SESSION['user_id'];
$aktivitet_id = $_GET['id'];
require 'connect.php';

$sql = "INSERT INTO aktivitet_users (aktivitet_id, user_id) VALUES ($aktivitet_id, $user_id)";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} 
?>