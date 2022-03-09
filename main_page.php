<?php
    Session_Start();
    $user_id = $_SESSION['user_id'];
    print_r($_SESSION);


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

include 'nav.html';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Hjemmeside</title>
    </head>
    <body>
        <p><a href="profil.php"><button>Profil</button></a></p>
        <p><a href="folk.php"><button>Folk</button></a></p>
        <p><a href="logg_ut.php"><button>Logg Out</button></a></p>
        <p>Her skal det komme en feed</p>
<!-- Feed Algoritme -->

<?php

function publicfeed($id, $conn){
    $sql_select="SELECT Aktiviteter.id AS Aktiv_id, 
                        Aktiviteter.navn AS Aktiv_navn, 
                        profile.universitet AS Universitet
                FROM Aktiviteter, 
                     Grupper, 
                     Interesser, 
                     Interesser_user, 
                     profile 
                WHERE Aktiviteter.gruppe_id = Grupper.id 
                AND Grupper.interesser = Interesser.id 
                AND Interesser.id = Interesser_user.interesser_id 
                AND Interesser_user.user_id = $id
                AND Aktiviteter.public = 0


                GROUP BY Aktiviteter.id
    ";


    $result = mysqli_query($conn, $sql_select);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $Aktivitet_id = $row["Aktiv_id"];
            $Aktivitet_navn = $row["Aktiv_navn"];
            $Universitet = $row["Universitet"];
        }
    }else {
        echo "0 results";
    }
    $sql_select="SELECT profile.universitet AS universitet
                FROM profile
                WHERE profile.user_id = $id
    ";
    $result = mysqli_query($conn, $sql_select);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if($row["universitet"] == $Universitet){
                echo "<h2>Public Feed</h2>";
                echo "<ul>";
                    echo "<li>" . $Aktivitet_navn . "\t" . "<a href=\"info_om_aktivitet.php?aktivitet_id=$Aktivitet_id\"><button>Info om aktiviteten</button></a>" . "</li>";
                echo "</ul>";
            }
        }
    }else {
        echo "0 results";
    }
}

publicfeed($user_id, $conn);
?>
    </body>
</html>
