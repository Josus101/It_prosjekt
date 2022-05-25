<?php
    Session_Start();
    $user_id = $_SESSION['user_id'];
    print_r($_SESSION);

    require 'connect.php';

include 'nav.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>aktiviteter</title>
    <link rel="stylesheet" type="text/css" href="default_style.css">
</head>
<body>
    <br>
    <p>Dette er aktivitetene du er meldt på</p>
    <br>
    <!--bruker POST for å gi info siden id til aktiviteten-->
    <form action="info_om_aktivitet.php">
        <input type="submit" value="aktivitet 1">
        <br>
        <input type="submit" value="aktivitet 2">
        <br>
        <input type="submit" value="aktivitet 3">
        <br>
        <input type="submit" value="aktivitet 4">
        <br>
        <input type="submit" value="aktivitet 5">
    </form>
</body>
</html>
