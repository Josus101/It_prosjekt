<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Opprett aktivitet</title>
    </head>
    <body>
        <h2>Opprett aktivitet</h2>
        <form action = "skapelsen.php" method = "post">
                <label for = "tittel">Hva skal aktiviteten være?</label> <input id="tittel" name="tittel" type="text"> <br>
            <label for = "bilde">Velg bilde:</label> <!-- Bilde er ikke i databasen i dette eksakte øyeblikk -->
                <input type = "file" id = "bilde" name = "bilde" accept="image/*"> <br>
            <label for = "public">Hvem skal kunne delta på aktiviteten?</label> <select name="public" id="public">
                <option value = "0">Alle</option>
                <option value = "1">Bare de i gruppen</option>
                </select> <br>
            <label for = "sted">Hvor skal aktiviteten være?</label> 
                <input id="sted" name="sted" type="text"> <br>
            <label for = "tidspunkt">Når skal aktiviteten finne sted?</label> 
                <input id="tidspunkt" name="tidspunkt" type="datetime-local"> <br>
            <label for = "sluttTidspunkt">Når skal aktiviteten eventuelt avsluttes</label> 
                <input id="sluttTidspunkt" name="sluttTidspunkt" type="datetime-local"> <br>
            <label for = "maxFolk">Hvor mange kan være med? La stå blank hvis det ikke skal være noen grense.</labeL>
                <input type="number" id="maxFolk" name="maxFolk" min="3" max="200"> <br>
            <input type = "submit" value = "Opprett Aktivitet">
        </form>
    </body>
</html>
