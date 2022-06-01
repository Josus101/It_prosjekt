<?php
session_start();
$user_id = $_SESSION['user_id'];

require 'connect.php';

include 'nav.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="folk_style.css">
    <title>Folk</title>
</head>
<body>

<h1>Folk</h1>

<?php

$sql_select = "SELECT user_2_id, user.name AS name
FROM folk_du_har_vert_med, user
WHERE folk_du_har_vert_med.user_1_id = $user_id
AND user.user_id = folk_du_har_vert_med.user_2_id";

$result = mysqli_query($conn, $sql_select);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<h2 id=\"nylige_h1\">Nylige</h2>";
    echo "<ul id=\"nylige_liste\">";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li>name:" . $row["name"] . "</li>";
    }
    echo "</ul>";
}else {
    echo "0 results";
}


echo "<h2 id=\"dms\">DM's</h2>";

    

    

    mysqli_close($conn);
?>
</body>
</html>
