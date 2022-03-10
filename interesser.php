<?php
    if isset ($_POST["name"]) {
        $name = $_POST["name"];
        $tlf = $_POST["tlf"];
        $universitet = $_POST["universitet"];
        $alder = $_POST["alder"];
        $kjoenn = $_POST["kjoenn"];
        $fagomraade = $_POST["fagomraade"];
    }

    $sql_username = "root";
    $sql_password = ""; // endre te "root" hvis du e på mac
    $sql_server = "localhost";
    $sql_database = "sosialt_nettverk";

    // Create connection
    $conn = mysqli_connect($sql_server, $sql_username, $sql_password, $sql_database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- <link rel="style.css"> -->
        <title>Folk</title>
    </head>
    <body>
        <form action = "create_acc.html" method = "post">  
            <?php
                $sql_select = "SELECT navn FROM interesser";

                $result = mysqli_query($conn, $sql_select);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<label><input type=\"checkbox\" name=\"$row[navn]\"> $row[navn]</label> <br>";
                    }
                }
                else {
                    echo "0 results";
                }
                echo "<input type=\"hidden\" id=\"name\" name=\"name\" value=\"$name\">;
                echo "<input type=\"hidden\" id=\"tlf\" name=\"tlf\" value=\"$tlf\">;
                echo "<input type=\"hidden\" id=\"universitet\" name=\"universitet\" value=\"$universitet\">;
                echo "<input type=\"hidden\" id=\"alder\" name=\"alder\" value=\"$alder\">;
                echo "<input type=\"hidden\" id=\"kjoenn\" name=\"kjoenn\" value=\"$kjoenn\">;
                echo "<input type=\"hidden\" id=\"fagomraade\" name=\"fagomraade\" value=\"$fagomraade\">;
                
                

                mysqli_close($conn);
            ?>
            <input type = "submit" value = "Neste">
        </form>
    </body>
</html>
