<?php
    $sql_server   = "mysql.elev.stolav.it";
    $sql_username = "stolav_universus";
    $sql_password = "3mMiNv!n";
    $sql_database = "stolav_universus";
    
    $conn = mysqli_connect($sql_server, $sql_username, $sql_password, $sql_database);
    
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    include 'nav.html';
?>

        
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
    echo "INteressers popularitet";
    interesser_stats($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Statistikk</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            $sql = "SELECT * FROM user";
            if (mysqli_query($conn, $sql)) {
                $last_id = mysqli_insert_id($conn);
            }
            echo "Universus har $last_id brukere";
        ?>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<svg height="200" width="200">
    <?php
    // Values er verdiene som skal vises i grafen
    $values = [5, 3, 2];
    $color = [];
    function rand_color() {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
    for ($i=0; $i < count($values); $i++) {
        array_push($color, rand_color());
    }
    $r = 100;
    $sum = array_sum($values);
    $ratio = 100 / $sum;

    function polarToCartesian($centerX, $centerY, $radius, $angleInDegrees){
        $angleInRadians = ($angleInDegrees - 90) * pi() / 180.0;
        $x = $centerX + $radius * cos($angleInRadians);
        $y = $centerY + $radius * sin($angleInRadians);

        return [$x, $y];
    }

    function draw_arc($x, $y, $radius, $startAngle, $endAngle){

        $start = polarToCartesian($x, $y, $radius, $startAngle);
        $end = polarToCartesian($x, $y, $radius, $endAngle);
        $largeArcFlag = $endAngle - $startAngle <= 180 ? "0" : "1";

        return "A $radius $radius 0 $largeArcFlag 1 $end[0] $end[1]";
    } 

    function draw_slice($values, $radius, $color){
        $offset = $radius;
        $start_point = [0 + $offset, 0];
        $center_point = [100, 100];
        $sum = array_sum($values);
        $ratio = 360 / $sum;

        $cur_angle = 0;
        for ($i=0; $i < count($values); $i++) { 
            $angle = $values[$i] * $ratio;
            $arc = draw_arc($center_point[0], $center_point[1], $radius, $cur_angle, $cur_angle + $angle);

            echo "<path d=\"M $center_point[0] $center_point[1] 
                            L $start_point[0] $start_point[1] 
                            $arc
                            L $center_point[0] $center_point[1] Z\" 
                            style=\"fill:$color[$i];stroke:$color[$i];\"/>";
            $cur_angle += $angle;
            $start_point = polarToCartesian($center_point[0], $center_point[1], $radius, $cur_angle);
        }
    }

    draw_slice($values, $r, $color);
?>
</svg>
</body>
</html>
