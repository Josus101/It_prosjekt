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
    $sql_select="SELECT Aktiviteter.id AS Aktiv_id, Aktiviteter.navn AS Aktiv_navn 
                FROM Aktiviteter, 
                     Grupper, 
                     Interesser, 
                     Interesser_user, 
                     profile 
                WHERE Aktiviteter.gruppe_id = Grupper.id 
                AND Grupper.interesser = Interesser.id 
                AND Interesser.id = Interesser_user.interesser_id 
                AND Interesser_user.user_id = 1
                AND Aktiviteter.public = 0

                GROUP BY Aktiviteter.id
    ";


    $result = mysqli_query($conn, $sql_select);

    if (mysqli_num_rows($result)) {
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["Aktiv_id"] . "\t";
            echo $row["Aktiv_navn"];
        }
    }else {
        echo "0 results";
    }
}

feed($user_id, $conn);
?>
    </body>
</html>
