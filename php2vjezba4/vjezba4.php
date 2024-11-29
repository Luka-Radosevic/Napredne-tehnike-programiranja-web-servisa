<?php
// Obrada podataka iz forme
$c = null; // Zadana vrijednost c (null dok korisnik ne unese podatke)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = isset($_POST['a']) ? (float)$_POST['a'] : 0;
    $b = isset($_POST['b']) ? (float)$_POST['b'] : 0;
    $c = (3 * $a - $b) / 2; // Izračun vrijednosti c
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Izračun vrijednosti varijable c pomoću formule.">
    <meta name="keywords" content="PHP, formula, izračun, varijable, korisnički unos">
    <title>PHP 2 Vjezba 4</title>
</head>
<body>
    <h1>IZLAZ</h1>
    
    <form method="post" action="">
        <label for="a">Vrijednost a:</label>
        <input type="text" id="a" name="a" required>
        <br>
        <label for="b">Vrijednost b:</label>
        <input type="text" id="b" name="b" required>
        <br>
        <button type="submit">Pošalji</button>
    </form>

    <?php if ($c !== null): ?>
        <div class="output">
            IZLAZ: Vrijednost c iznosi <strong><?php echo number_format($c, 2); ?></strong>.
        </div>
    <?php endif; ?>
</body>
</html>
