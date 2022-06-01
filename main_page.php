<?php
    Session_Start();
    $user_id = $_SESSION['user_id'];
    print_r($_SESSION);


    require 'connect.php';
    include 'nav.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Hjemmeside</title>
    </head>
<pre>
    <body>
<!-- Feed Algoritme -->

<?php

function public_feed($id, $conn){
    $sql_select="SELECT aktiviteter.id AS aktiv_id, 
        aktiviteter.navn AS aktiv_navn
        FROM aktiviteter, 
            aktiviteter_grupper,
            grupper, 
            interesser_user
        WHERE interesser_user.user_id = $id
        AND interesser_user.interesser_id = grupper.interesser
        AND aktiviteter_grupper.gruppe_id = grupper.id
        AND aktiviteter_grupper.aktivitet_id = aktiviteter.id
        AND aktiviteter.public = 1 
        GROUP BY aktiv_id
    ";


    $result = mysqli_query($conn, $sql_select);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $aktiv_id = $row["aktiv_id"];
            $aktiv_navn = $row["aktiv_navn"];
        }
    }else {
        echo "0 public";
    }
    $sql_select="SELECT user.universitet AS universitet
                FROM user
                WHERE user.user_id = $id
    ";
    $result = mysqli_query($conn, $sql_select);

    echo "<h2>Public Feed</h2>";
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
                echo "<ul>";
                    echo "<li> <a href=\"info_om_aktivitet.php?aktivitet_id=$aktiv_id\"><button>" . $aktiv_navn . "</button></a>" . "</li>";
                echo "</ul>";
        }
    }else {
        echo "0 results";
    }
}

public_feed($user_id, $conn);

function private_feed($id, $conn){
    $sql_select="SELECT aktiviteter.id AS aktiv_id, aktiviteter.navn AS aktiv_navn 
    FROM gruppe_users,
        grupper,
        aktiviteter_grupper,
        aktiviteter
    WHERE gruppe_users.user_id = $id
    AND gruppe_users.gruppe_id = grupper.id
    AND grupper.id = aktiviteter_grupper.gruppe_id
    AND aktiviteter_grupper.aktivitet_id = aktiviteter.id
    GROUP BY aktiv_id
    
    ";

    echo "<h2>Home Feed</h2>";
    $result = mysqli_query($conn, $sql_select);
    if (mysqli_num_rows($result)) {
        while($row = mysqli_fetch_assoc($result)) {
                echo "<ul>";
                    echo "<li> <a href=\"info_om_aktivitet.php?aktivitet_id=" . $row['aktiv_id'] . "\"><button>" . $row['aktiv_navn'] . "</button></a>" . "</li>";
                echo "</ul>";
        }
    }else {
        echo "0 results";
    }
}

private_feed($user_id, $conn);
?>
    </body>
</pre>
</html>
