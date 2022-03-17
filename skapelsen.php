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
echo "Connected successfully";


$skaper    = $_SESSION['user_id']; //Tar inn id-en te brukeren
echo "$skaper";


$tittel    = $_POST['tittel'];
$public    = $_POST['public'];
$sted      = $_POST['sted'];
$tidspunkt = $_POST['tidspunkt'];
$maxFolk   = $_POST['maxFolk']; 

//Disse variablene e ikkje nødvendige så hvis de ikkje e satt så blir de satt te NULL
//Burde værr rett med idk

if (isset($_SESSION['gruppe_id'])) {
    $gruppe_id = $_SESSION['gruppe_id'];
}

//Bare sjekke at alt e som det ska værr før me legge inn i databasen
if (isset($tittel) && isset($public) && isset($sted) && isset($tidspunkt)){
    $sql = "INSERT INTO Aktiviteter (user_id, navn, public, sted, tidspunkt, maxFolk, gruppe_id, beskrivelse)
        VALUES (2, \"$tittel\", $public, \"$sted\", \"$tidspunkt\", $maxFolk, NULL, \"$beskrivelse\")";
} else { echo "error 69"; }


if ($conn -> query($sql) === TRUE) {
    echo "Aktivitet opprettet";
} else { echo "error: " . $sql . "<br>" . $conn->error; }
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Oppretter Aktivitet...</title>
        <meta http-equiv="REFRESH" content="3; url=http://localhost:8888/Universus/main_page.php">
    </head>
</html>

<?php
mysqli_close();
?>
