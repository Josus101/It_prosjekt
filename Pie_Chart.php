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