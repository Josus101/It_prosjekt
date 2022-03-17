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
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Opprett aktivitet</title>
    </head>
    <header><h2>Opprett aktivitet</h2></header>
    <body>
        <form action = "skapelsen.php" method = "post">
                <label for = "tittel">Hva skal aktiviteten være?</label> <input id="tittel" name="tittel" type="text" required> <br>
            <!--<label for = "bilde">Velg bilde:</label> Bilde er ikke i databasen i dette eksakte øyeblikk 
                <input type = "file" id = "bilde" name = "bilde" accept="image/*"> <br> -->
            <label for = "public">Hvem skal kunne delta på aktiviteten?</label> <select name="public" id="public">
                <option value = "0">Alle</option>
                <option value = "1">Bare de i gruppen</option>
                </select> <br>
            <label for = "sted">Hvor skal aktiviteten være?</label> 
                <input id="sted" name="sted" type="text" required> <br>
            <label for = "tidspunkt">Når skal aktiviteten finne sted?</label> 
                <input id="tidspunkt" name="tidspunkt" type="datetime-local" required> <br>
            <label for = "maxFolk">Hvor mange kan være med?</labeL>
                <select name="maxFolk" id="maxFolk"> 
                    <option value = "10">Mindre enn eller lik 10</option>
                    <option value = "20">Mindre enn eller lik 20</option>
                    <option value = "30">Mindre enn eller lik 30</option>
                    <option value = "40">Mindre enn eller lik 40</option>
                    <option value = "200">Ubegrenset</option>
                </select> <br>
            <label for = "beskrivelse">Gi en kort beskrivelse av aktiviteten.</label> <br>
                <textarea id="beskrivelse" name="beskrivelse" rows="10" cols="20" required></textarea> <br>
            <input type = "submit" value = "Opprett Aktivitet">
        </form>
    </body>
</html>
