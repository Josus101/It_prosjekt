<?php
    $servername   = "mysql.elev.stolav.it";
    $username = "stolav_universus";
    $password = "3mMiNv!n";
    $db = "stolav_universus";
    
    $conn = mysqli_connect($servername, $username, $password, $db);
    
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Statistikk</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            $sql = "SELECT * FROM user";
            if (mysqli_query($conn, $sql)) {
                $last_id = mysqli_insert_id($conn);
            }
            echo "Universus har $last_id brukere";
        ?>
    </body>
</html>
