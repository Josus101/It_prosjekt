<?php

    session_start();


    if ( isset( $_POST["username"] ) && isset( $_POST["password"] ) )
    {
        $user = $_POST["username"];
        $pass = $_POST["password"];

        $sqlserver   = "mysql.elev.stolav.it";
        $sqlusername = "stolav_universus";
        $sqlpassword = "3mMiNv!n";
        $sqldatabase = "stolav_universus";

        $conn = mysqli_connect($sqlserver, $sqlusername, $sqlpassword, $sqldatabase);

        mysqli_set_charset( $conn, "utf8" );

        if ( !$conn ) { die("Server down. Please try again later."); }


        $sql = "SELECT * FROM user
                WHERE username = \"$user\"
                AND   password = \"$pass\"";

        $result = mysqli_query($conn, $sql);

        if ( mysqli_num_rows($result) == 1 ) {          
          $_SESSION["username"] = $user;
          while($row = mysqli_fetch_assoc($result)) {
            $_SESSION["user_id"] = $row["id"];
          }
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
        <meta http-equiv="refresh" content="0; url='main_page.php'">
    </head>
    <body>
    </body>
</html>
