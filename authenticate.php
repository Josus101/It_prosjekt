<?php

    session_start();

    $login = false;
    if ( isset( $_POST["username"] ) && isset( $_POST["password"] ) ) {
        $user = $_POST["username"];
        $pass = $_POST["password"];

        require 'connect.php';

        $sql = "SELECT * FROM user
                WHERE username = \"$user\"
                AND   password = \"$pass\"";

        $result = mysqli_query($conn, $sql);

        if ( mysqli_num_rows($result) == 1 ) {          
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION["user_id"] = $row["id"];
            }
            echo "Login OK";
            $login = true;
        }else {
          session_destroy();
          echo "Login failed";
        }
    }

    else{
        session_destroy();
        echo "Login failed!";
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Authenticate</title>
        <meta charset="utf-8">
<?php
if($login){
    echo "<meta http-equiv=\"refresh\" content=\"2; url='main_page.php'\">";
}
else{
    echo "<meta http-equiv=\"refresh\" content=\"2; url='main_page.php'\">";
}
?>
    </head>
    <body>
    </body>
</html>
