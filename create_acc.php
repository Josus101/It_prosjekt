<?php
    if (isset($_POST["name"])) {
        $navn = $_POST["navn"];
        $user = $_POST["user"];
        $passord = $_POST["passord"];
        $tlf = $_POST["tlf"];
        $universitet = $_POST["universitet"];
        $alder = $_POST["alder"];
        $kjoenn = $_POST["kjoenn"];
        $fagomraade = $_POST["fagomraade"];
        
        $interesser = [];
        
        $interesser[] = [$_POST["fotball"], 
                              $_POST["innebandy"], 
                              $_POST["kampsport"], 
                              $_POST["gaming"], 
                              $_POST["slalom"], 
                              $_POST["langrenn"], 
                              $_POST["klatring"], 
                              $_POST["surfing"], 
                              $_POST["parkour"], 
                              $_POST["basketball"], 
                              $_POST["volleyball"], 
                              $_POST["skateboarding"], 
                              $_POST["sying"], 
                              $_POST["vektloefting"], 
                              $_POST["vektloefting"], 
                              $_POST["paintball"]];
                              
        $servername   = "mysql.elev.stolav.it";
        $username = "stolav_universus";
        $password = "3mMiNv!n";
        $db = "stolav_universus";

        $conn = mysqli_connect($servername, $username, $password, $db);

        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "INSERT INTO user (username, password) 
                VALUES (\"$user\", \"$passord\")";
        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
        }
        
        $sql = "INSERT INTO profile (user_id, navn, tlf, universitet, alder, kjoenn, fagomraade) 
                VALUES (\"$last_id\", \"$navn\", \"$tlf\", \"$universitet\", \"$alder\", \"$kjoenn\", \"$fagomraade\")";
        (mysqli_query($conn, $sql));
        
        for ($i = 0; $i < count($interesser); $i++) {
            if ($interesser[$i] == True) {
                $index = $i + 1;
                $sql = "INSERT INTO interesser_user (user_id, interesser_id) 
                VALUES($last_id, $index)";
                (mysqli_query($conn, $sql));
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Creating Account...</title>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="2; url='login.php'">
    </head>
    <body>
    </body>
</html>
