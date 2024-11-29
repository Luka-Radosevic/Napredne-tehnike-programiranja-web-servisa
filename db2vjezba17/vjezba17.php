<?php
$con = mysqli_connect("localhost", "root", "123", "my_db");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "
    SELECT users.firstname, users.lastname, countries.country_name 
    FROM users 
    JOIN countries ON users.country_id = countries.id
    ORDER BY users.lastname ASC
";

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {

    echo "<h2>Lista korisnika i njihovih država:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Ime</th><th>Prezime</th><th>Država</th></tr>";
    
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['country_name'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "Nema korisnika u bazi.";
}

mysqli_close($con);
?>
