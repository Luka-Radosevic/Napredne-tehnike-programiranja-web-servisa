<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Session Example</title>
    </head>
    <body>
        <h1>Spremite ime u sesiju</h1>
        <form action="news.php" method="post">
            <label for="ime">Unesite vaše ime:</label>
            <input type="text" id="ime" name="ime" required>
            <input type="submit" value="Spremi u sesiju">
        </form>
    </body>
</html>
