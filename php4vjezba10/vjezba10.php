<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Zadatak <code>str_word_count</code></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <h1>Zadatak <code>str_word_count</code></h1>
        <form action="" method="post">
            <p>U zadataku se traži da se ispiše koliko je riječi u rečenici. Koristite naredbu <code>str_word_count</code></p>
            <div>
                <label for="ulaz">Ulazni niz:</label>
                <input type="text" name="ulaz" size="80" value="">
            </div>
            <div>
                <input type="submit" value="ispiši broj riječi">
            </div>
        </form>
        <br />
        
        <?php
        if (isset($_POST['ulaz'])) {
            $ulaz = $_POST['ulaz'];
            $brojRijeci = str_word_count($ulaz);
            echo "Broj riječi u unesenoj rečenici: <strong>$brojRijeci</strong>";
        } else {
            echo "Unesite rečenicu i pritisnite 'ispiši broj riječi'.";
        }
        ?>
    </body>
</html>
