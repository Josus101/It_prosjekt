<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="nav_style.css">
</head>
<body>
    <nav>
        <img src="Universus.png" alt="Logo Universus">
        <ul>
            <?php
                $urls = ["main_page.php", "dine_grupper.php", "aktiviteter.php", "folk.php"];

                $active = $_SERVER["REQUEST_URI"];
                
                for ($i = 0; $i < count($urls); $i++) {
                    if ("/" . $urls[$i] == $active) {
                        echo "<li><a class=\"active\" href=\"\\$urls[$i]\">$urls[$i]</a></li>";
                    }
                    else {
                        echo "<li><a href=\"$urls[$i]\">$urls[$i]</a></li>";
                    }
                }
            ?>
        </ul>
    </nav>
</body>
</html>
