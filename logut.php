<?php
    session_start();
    session_unset();
    session_destroy();
    echo "You are now logged out";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Logout</title>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="2; url=login.html">
    </head>
</html>