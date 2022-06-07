<?php
    require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Opprett Gruppe</title>
    <link rel="stylesheet" href="aksepter_aktivitet.css">
</head>
<body>
    <h1>Opprett Gruppe</h1>
    <form action="authenticate_gruppe" method="post">
        <input type="text" name="navn" id="navn">
        <textarea name="beskrivelse" id="beskrivelse" cols="30" rows="10"></textarea>
        <select name="interesser" id="interesser">
            <?php
$sql_interesser = "SELECT interesser.id AS id, interesser.navn AS navn
FROM interesser";

$result = mysqli_query($conn, $sql_interesser);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $navn = $row["navn"];
                echo "<option value=\"". $id ."\" id=\"" . $id . "\">". $navn . "</option>";
    }
}else {
    echo "server ded i guess";
}
            ?>
        </select>

        <select name="universitet" id="universitet">
<?php
    $sql_universitet = "SELECT universiteter.id AS id, universiteter.navn AS navn
    FROM universiteter";
    
    $result = mysqli_query($conn, $sql_universitet);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $navn = $row["navn"];
                    echo "<option value=\"". $id ."\" id=\"" . $id . "\">". $navn . "</option>";
        }
    }else {
        echo "server ded i guess";
    }
?>
        </select>
    </form>
</body>
</html>