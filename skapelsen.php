<?php
session_start();
// Koble til databasen oppe her

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


$skaper    = $_SESSION['id']; //Tar inn id-en te brukeren


$tittel    = $_POST['tittel'];
$public    = $_POST['public'];
$sted      = $_POST['sted'];
$tidspunkt = $_POST['tidspunkt'];

//Disse variablene e ikkje nødvendige så hvis de ikkje e satt så blir de satt te NULL
//Burde værr rett med idk
if (isset($_POST['sluttTidspunkt'])){
    $sluttTidspunkt = $_POST['sluttTidspunkt'];
} else { $sluttTidspunkt = NULL; }

if (isset( $_POST['bilde'])) {
    $image = $_POST['bilde'];
} else { $image = NULL; }

if (isset($_SESSION['gruppe_id'])) {
    $gruppe_id = $_SESSION['gruppe_id'];
} else { $gruppe_id = NULL; }

if (isset($_POST['maxFolk'])) {
    $maxFolk = $_POST['maxFolk'];
} else { $maxFolk = NULL; }

//Bare sjekke at alt e som det ska værr før me legge inn i databasen
if (isset($skaper) && isset($tittel) && isset($public) && isset($sted) && isset($tidspunkt) && isset($gruppe_id)){
    $sql = "INSERT INTO aktiviteter (navn, public, sted, tidspunkt, sluttTidspunkt, maxFolk, gruppe_id)
        VALUES ($skaper, \"$public\", \"$sted\", \"$tidspunkt\", \"$sluttTidspunkt\", \"$maxFolk\", \"$gruppe_id\")";
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
        <meta http-equiv="REFRESH" content="3; url=http://localhost:8888/Sosialt_nettverk/MainPage.php">
    </head>
</html>

<?php
mysqli_close();
?>
