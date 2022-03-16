<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <p><a href="main_page.php"><button>Main Page</button></a></p>
    <p><a href="dine_grupper.php"><button>Dine Grupper</button></a></p>
    <br>
    <p>dette er aktivitetene du er meldt på:</p>
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
