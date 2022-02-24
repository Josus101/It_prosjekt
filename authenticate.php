<?php

    session_start();


    if ( isset( $_POST["username"] ) && isset( $_POST["password"] ) )
    {
        $user = $_POST["username"];
        $pass = $_POST["password"];

        $sqlserver   = "localhost";
        $sqlusername = "root";
        $sqlpassword = "";
        $sqldatabase = "users";

        $conn = mysqli_connect($sqlserver, $sqlusername, $sqlpassword, $sqldatabase);

        mysqli_set_charset( $conn, "utf8" );

        if ( !$conn ) { die("Server down. Please try again later."); }


        $sql = "SELECT * FROM user
                WHERE username = \"$user\"
                AND   password = \"$pass\"";

        $result = mysqli_query($conn, $sql);

        if ( mysqli_num_rows($result) == 1 ) {          
          $_SESSION["username"] = $user;
          echo "Login OK";
        }  

        else {
          session_destroy();
          echo "Login failed";
        }
    }

  else {
        session_destroy();
        echo "Login failed!";
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Authenticate</title>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="2; url='index.php'">
    </head>
    <body>
    </body>
</html>