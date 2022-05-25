<?php
    $sqlserver   = "localhost";
    $sqlusername = "root";
    $sqlpassword = "";
    $sqldatabase = "sosialt_nettverk";

    $conn = mysqli_connect($sqlserver, $sqlusername, $sqlpassword, $sqldatabase);

    mysqli_set_charset( $conn, "utf8" );

    if ( !$conn ) { die("Server down. Please try again later."); }
    echo "Connected successfully";
?>