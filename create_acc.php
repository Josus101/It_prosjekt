<?php
    require 'connect.php';

    if (isset($_POST["navn"])) {
        $navn = $_POST["navn"];
        $username = $_POST["username"];
        $passord = $_POST["passord"];
        $tlf = $_POST["tlf"];
        $universitet = $_POST["universitet"];
        $alder = $_POST["alder"];
        $kjoenn = $_POST["kjoenn"];
        $fagomraade = $_POST["fagomraade"];
        
        $interesser = [];

        $sql = "SELECT navn FROM interesser";

        $result = mysqli_query($conn, $sql);

        if ( mysqli_num_rows($result) > 0) {          
            while($row = mysqli_fetch_assoc($result)) {
                if(isset($_POST[$row['navn']])){
                    array_push($interesser, $_POST[$row['navn']]);
                }
            }
        }  
        else{
            echo "no work sadge";
        }
        $sql = "INSERT INTO user (username, password, navn, tlf, universitet, alder, kjoenn, fagomraade) 
                VALUES (\"$username\", \"$passord\", \"$navn\", $tlf, $universitet, $alder, $kjoenn, $fagomraade)";
        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
        }
        else {
            echo "monkee";
        }
        for ($i = 0; $i < count($interesser); $i++) {
            $index = $i + 1;
            $sql = "INSERT INTO interesser_user (user_id, interesser_id) 
            VALUES($last_id, $index)";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            } 
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Creating Account...</title>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="2; url='login.html'">
    </head>
    <body>
    </body>
</html>
