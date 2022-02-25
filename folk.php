<?php
session_start();
// $user_id = $_SESSION['user_id'];
$user_id = 2;

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <link rel="style.css"> -->
    <title>Folk</title>
</head>
<body>
<?php
    $sql_select = "SELECT profile.name AS name, user_2_id
                    FROM folk_du_har_vert_med, profile
                    WHERE folk_du_har_vert_med.user_1_id = $user_id";

    $result = mysqli_query($conn, $sql_select);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<br>id: " . $row["user_2_id"] . "name:" . $row["name"];
        }
    }else {
        echo "0 results";
    }

    mysqli_close($conn);
?>
</body>
</html>