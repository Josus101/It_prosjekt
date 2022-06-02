<?php
$gruppe_id = $_GET['id'];


require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gruppe</title>
</head>
<body>
    <p><a href="dine_grupper.php"><button>Dine Grupper</button></a></p>
    <p><a href="opprett_aktivitet.php"><button>Opprett Aktivitet</button></a></p>
    <br>
    <h2>Aktiviteter</h2>
<pre>
<?php

$sql = "SELECT  aktiviteter.id AS id,
                aktiviteter.navn AS navn, 
                aktiviteter.sted AS sted, 
                aktiviteter.start_tidspunkt AS start_tidspunkt, 
                aktiviteter.slutt_tidspunkt AS slutt_tidspunkt, 
                aktiviteter.max_folk AS max_folk
        FROM aktiviteter, aktiviteter_grupper
        WHERE aktiviteter.id = aktiviteter_grupper.aktivitet_id
        AND aktiviteter_grupper.gruppe_id = $gruppe_id       
        ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<strong>" . $row['navn'] . "</strong>\n";
        echo "Starter: ". $row['start_tidspunkt'] . " Slutter: ". $row['slutt_tidspunkt'] . "\n";
        echo "Sted: " . $row['sted'] . "\n";
        echo "Max antall folk: " . $row['max_folk'] . "\n";
        echo "<a href=\"info_om_aktivitet.php?aktivitet_id=". $row['id'] ."\"><button>Aksepter</button></a>\n\n\n";
    }
}else {
    echo "no work";
}
?>
</pre>
</body>
</html>
