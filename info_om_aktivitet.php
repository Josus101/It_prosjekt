<?php
session_start();
// Koble til databasen oppe her

$sql_username = "root";
$sql_password = "root"; // endre te "root" hvis du e på mac
$sql_server = "localhost";
$sql_database = "sosialt_nettverk";

// Create connection
$conn = mysqli_connect($sql_server, $sql_username, $sql_password, $sql_database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

include "nav.html";

// $aktivitet_id = $_GET['aktivitet_id'];

$aktivitet_id = 1;
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Info Om aktivitet</title> <!-- skal bli til navnet på selve aktiviteten -->
        <link rel="stylesheet" href="info_om_aktivitet.css">
    </head>
    <body>

        <?php
            $sql = "SELECT navn, public, sted, tidspunkt, sluttTispunkt, maxFolk, gruppe_id, beskrivelse
            FROM Aktiviteter
            WHERE Aktiviteter.id = $aktivitet_id";
            $result = $conn->query($sql);
            #$sqlUSER = "SELECT skaper FROM Aktiviteter WHERE Aktiviteter.id = $aktivitet_id";
            #$resultUSER = $conn->query($sqlUSER);

            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    #for å få navnet te skaperen, jævelig trash men det funke håpe eg
                    #while ($row = $resultUSER->fetch_assoc()) {
                    #    $user = $row["name"];
                    #}
                    ?> <header>
                    <?php echo "<h1>" . $row["navn"] . "</h1>"; ?> </header> <?php
                    #echo "<p>Possibly bilde...?</p>"; Ser om me gidde
                    #echo "<p><strong>Publsert av: </strong>" . $user;
                    if ($row["public"] == 0) {
                        echo "<p><em>Denne aktiviteten er for alle.</em><p>";
                    }
                    else if ($row["public"] == 1) {
                        echo "<p><em>Denne aktiviteten er lukket til gruppa.</em><p>";
                    }
                    echo "<p><strong>Sted: </strong>" . $row["sted"] . "</p>";
                    echo "<p><strong>Oppmøte: </strong>" . $row["tidspunkt"] . "</p>";
                    if (isset($row["sluttTidspunkt"])){
                        echo "<p><strong>Avslutning: </strong>" . $row["sluttTidspunkt"] . "</p>";
                    }
                    if (isset($row["maxFolk"])){
                        echo "<p><strong>Maks antall deltakere: </strong>" . $row["maxFolk"] . "</p>"; #Hvis et max antall e gitt, så burde det skrivas som antall_deltakere/max_deltakere
                        #et problem for en annen gang for å si det slik
                    }
                    echo "<h3>Beskrivelse</h3>";
                    echo "<article>" . $row["beskrivelse"] . "</article>";
                    
                }
            }

        ?>
        <!--
        <h2>Navn på aktiviteten</h2>
        <p><em>Bilde av aktivitet eller någe</em></p>
        <p><strong>Sted:</strong> Mordi sitt hus</p>
        <p><strong>Starttidspunkt:</strong> 30. Februar, 12.30</p>
        <p><strong>Slutttidspunkt:</strong> 1. Mars, 11.00</p>
        <p><strong>Antall Personer:</strong> 15</p>
        <h3>Beskrivelse</h3>
        <article>Her skal det stå en beskrivelse av aktiviteten som den personen som har opprettet aktiviteten skriver.</article>
        -->
    </body>
</html>
