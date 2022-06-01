<?php
    Session_Start();
    $user_id = $_SESSION['user_id'];
    print_r($_SESSION);

    require 'connect.php';
    include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>aktiviteter</title>
    <link rel="stylesheet" type="text/css" href="default_style.css">
</head>
<body>
    <br>
    <p>Dette er aktivitetene du er meldt på</p>
    <br>
    <form action="info_om_aktivitet.php">
<?php
    $sql = "SELECT aktiviteter.id AS id, aktiviteter.navn AS navn
    FROM aktiviteter,
    aktivitet_users
    WHERE aktivitet_users.user_id = 1
    AND aktiviteter.id = aktivitet_users.aktivitet_id";
    
    $result = mysqli_query($conn, $sql);

    echo "<h1>Public feed</h1>";
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $navn = $row["navn"];
            echo "<ul>";
                    echo "<li> <a href=\"info_om_aktivitet.php?aktivitet_id=$id\"><button>" . $navn . "</button></a>" . "</li>";
            echo "</ul>";
        }
    }else {
        echo "0 public";
    }
?>
    </form>
</body>
</html>
