<?php
    if (isset ($_POST["navn"])) {
        $navn = $_POST["navn"];
        $username = $_POST["username"];
        $passord = $_POST["passord"];
        $tlf = $_POST["tlf"];
        $universitet = $_POST["universitet"];
        $alder = $_POST["alder"];
        $kjoenn = $_POST["kjoenn"];
        $fagomraade = $_POST["fagomraade"];
    }

    require 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- <link rel="style.css"> -->
        <title>Interesser</title>
    </head>
    <body>
        <form action = "create_acc.php" method = "post">  
            <?php
                $sql_select = "SELECT id, navn FROM interesser";

                $result = mysqli_query($conn, $sql_select);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<label><input type=\"checkbox\" name=\"". $row['navn']. "\" value=\"". $row['id']."\"> ". $row['navn']. "</label> <br>";
                    }
                }
                else {
                    echo "0 results";
                }
                echo "<input type=\"hidden\" id=\"navn\" name=\"navn\" value=\"$navn\">";
                echo "<input type=\"hidden\" id=\"user\" name=\"username\" value=\"$username\">";
                echo "<input type=\"hidden\" id=\"passord\" name=\"passord\" value=\"$passord\">";
                echo "<input type=\"hidden\" id=\"tlf\" name=\"tlf\" value=\"$tlf\">";
                echo "<input type=\"hidden\" id=\"universitet\" name=\"universitet\" value=\"$universitet\">";
                echo "<input type=\"hidden\" id=\"alder\" name=\"alder\" value=\"$alder\">";
                echo "<input type=\"hidden\" id=\"kjoenn\" name=\"kjoenn\" value=\"$kjoenn\">";
                echo "<input type=\"hidden\" id=\"fagomraade\" name=\"fagomraade\" value=\"$fagomraade\">";

                mysqli_close($conn);
            ?>
            <input type = "submit" value = "Neste">
        </form>
    </body>
</html>
