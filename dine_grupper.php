<?php
session_start();
$user_id = $_SESSION['user_id'];

include 'nav.php';
require 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dine Grupper</title>
</head>
<body>
    <p>gruppene dine:</p>
<?php
$sql = "SELECT grupper.id AS gruppe_id, grupper.navn AS gruppe_name
        FROM grupper, gruppe_users
        WHERE gruppe_id = gruppe_users.user_id
        AND gruppe_users.user_id = $user_id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<a href=\"gruppe.php?id=". $row['gruppe_id'] ."\"><button>". $row['gruppe_name'] ."</button></a> <br>";
    }
}else {

}
?>    

    
</body>
</html>
