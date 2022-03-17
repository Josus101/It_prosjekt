<?php
    Session_Start();
    $user_id = $_SESSION['user_id'];
    print_r($_SESSION);


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

    include 'nav.html';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>statistikk</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
<?php
    function interesser_stats($conn){
        echo "<svg width=\"200\" height=\"200\">";

    $sql_select="SELECT COUNT(Interesser_user.user_id) AS count_users, interesser_user.interesser_id AS interesser_id
                FROM Interesser_user
                GROUP BY Interesser_id 
    ";


    $result = mysqli_query($conn, $sql_select);

    $count_users = array();
    $interesser_id = array();

    if (mysqli_num_rows($result)) {
        while($row = mysqli_fetch_assoc($result)) {
            $c_u = $row["interesser_id"];
            $i_i = $row["count_users"];

            array_push($count_users, $i_i);
            array_push($interesser_id , $c_u);
        }
    }else {
        echo "0 results";
    }

    $max = max($count_users);
    echo $max;
    $antall = count($interesser_id);

    for ($i=0; $i < $antall; $i++) { 
        $w=100/$antall;
        $h=$count_users[$i]/$max*100;
        $x=$i*$w;
        $y=100-$h;
        
        echo"<rect x=\"".$x."%\" y=\"".$y."%\" width=\"".$w."%\" height=\"".$h."%\" style=\"fill:rgb(255,0,0);stroke:rgb(0,0,0)\"/>";
    }

    echo "</svg>";
    }
    
    interesser_stats($conn);
?>
        

    </body>
</html>