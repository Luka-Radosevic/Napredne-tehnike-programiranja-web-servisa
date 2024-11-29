<?php
$con = mysqli_connect("localhost", "root", "123", "my_db");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $searchTerm = mysqli_real_escape_string($con, $_POST['search']);
    
    $query = "SELECT firstname, lastname FROM users WHERE firstname LIKE '%$searchTerm%' OR lastname LIKE '%$searchTerm%'";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Rezultati pretrage:</h2>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<p>" . $row['firstname'] . " " . $row['lastname'] . "</p>";
        }
    } else {
        echo "<p>Nema korisnika koji odgovaraju pretrazi.</p>";
    }
} else {
    echo "<p>Molimo unesite ime ili prezime za pretragu.</p>";
}

mysqli_close($con);
?>
