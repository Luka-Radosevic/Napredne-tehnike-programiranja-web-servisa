<?php
$poruka = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ocjena1 = isset($_POST['ocjena1']) ? (float)$_POST['ocjena1'] : null;
    $ocjena2 = isset($_POST['ocjena2']) ? (float)$_POST['ocjena2'] : null;

    // Validacija unosa
    if ($ocjena1 < 1 || $ocjena1 > 5 || $ocjena2 < 1 || $ocjena2 > 5) {
        $poruka = "Ocjene moraju biti između 1 i 5.";
    } else {
        if ($ocjena1 > 1 && $ocjena2 > 1) {
            $prosjek = ($ocjena1 + $ocjena2) / 2;
            $poruka = "Prosjek ocjena: " . number_format($prosjek, 2) . "<br>Konačna ocjena: " . round($prosjek);
        } else {
            $poruka = "Jedan od kolokvija je negativan. Krajnja ocjena je negativna.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izračun prosjeka i ocjene</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Izračun prosjeka i konačne ocjene</h1>
        <form method="post" action="">
            <label for="ocjena1">Ocjena I. kolokvija:</label>
            <input type="number" id="ocjena1" name="ocjena1" min="1" max="5" step="0.01" required>

            <label for="ocjena2">Ocjena II. kolokvija:</label>
            <input type="number" id="ocjena2" name="ocjena2" min="1" max="5" step="0.01" required>

            <button type="submit">Izračunaj</button>
        </form>
        <div class="output">
            <?php if ($poruka): ?>
                <p><?php echo $poruka; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>