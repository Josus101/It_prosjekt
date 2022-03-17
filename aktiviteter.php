<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>aktiviteter</title>
    <link rel="stylesheet" type="text/css" href="default_style.css">
</head>
<body>
    <nav>
        <p><a href="main_page.php"><button>Main Page</button></a></p> 
        <p><a href="dine_grupper.php"><button>Dine Grupper</button></a></p>
        <p><a href="aktiviteter.php"><button><b>Aktiviteter</b></button></a></p>
        <p><a href="folk.html"><button>Folk</button></a></p>
    </nav>
    <br>
    <p>Dette er aktivitetene du er meldt på</p>
    <br>
    <!--bruker POST for å gi info siden id til aktiviteten-->
    <form action="info_om_aktivitet.php">
        <input type="submit" value="aktivitet 1">
        <br>
        <input type="submit" value="aktivitet 2">
        <br>
        <input type="submit" value="aktivitet 3">
        <br>
        <input type="submit" value="aktivitet 4">
        <br>
        <input type="submit" value="aktivitet 5">
    </form>
</body>
</html>
