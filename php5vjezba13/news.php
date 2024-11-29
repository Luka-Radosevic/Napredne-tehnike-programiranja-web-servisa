<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ime'])) {
    $_SESSION['ime'] = $_POST['ime'];
}

if (isset($_SESSION['ime'])) {
    echo "<h1>Vaše ime je: " . $_SESSION['ime'] . "</h1>";
} else {
    echo "<h1>Ime nije uneseno.</h1>";
}
?>

<p><a href="index.php">Povratak na početnu stranicu</a></p>
