<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            title
        </title>
    </head>
    <body>
        <form action="interesser.php" method="post">
            <label for="navn">Navn:</label>
            <input type="text" id="navn" name="navn" required> <br>

            <label for="username">brukernavn:</label>
            <input type="text" id="username" name="username" required> <br>

            <label for="passord">Passord:</label>
            <input type="password" id="passord" name="passord" required> <br>

            <label for="tlf">Telefonnummer:</label>
            <input type="number" id="tlf" name="tlf" required> <br>

            <label for="universitet">Universitet:</label>
            <select name="universitet" id="universitet">
<?php
$sql = "SELECT id, navn FROM universitet";
$result = mysqli_query($conn, $sql);

if ( mysqli_num_rows($result) > 0) {          
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value=\"". $row["id"] ."\">". $row["navn"] ."</option>";
    }
}  
else{
    echo "no work sadge";
}  
?>
            </select> <br>

            <label for="alder">Alder:</label>
            <input type="number" id="alder" name="alder" required> <br>

            <p>Kjønn</p>

            
            <input type="radio" name="kjoenn" id="mann" value="0">
            <label for="mann">Mann</label>

            
            <input type="radio" name="kjoenn" id="kvinne" value="1"> 
            <label for="kvinne">Kvinne</label> <br>

            <label for="fagomraade">Fagområde:</label>
            <select name="fagomraade" id="fagomraade">
<?php
$sql = "SELECT id, fagomraade FROM fagomraade";
$result = mysqli_query($conn, $sql);

if ( mysqli_num_rows($result) > 0) {          
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value=\"". $row["id"] ."\">". $row["fagomraade"] ."</option>";
    }
}  
else{
    echo "no work sadge";
}      
?>
            </select>

            <input type="submit" value="Neste">
        </form>
    </body>
</html>
