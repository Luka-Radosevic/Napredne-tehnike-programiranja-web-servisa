<?php
$con = mysqli_connect("localhost", "root", "123", "my_db");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_user'])) {
    $user_id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $country_id = $_POST['country_id'];

    $update_query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', country_id = '$country_id' WHERE id = $user_id";
    if (mysqli_query($con, $update_query)) {
        echo "Podaci su uspješno ažurirani!";
    } else {
        echo "Greška pri ažuriranju podataka: " . mysqli_error($con);
    }
}

$query = "
    SELECT users.id, users.firstname, users.lastname, countries.country_name, countries.id AS country_id
    FROM users 
    JOIN countries ON users.country_id = countries.id
    ORDER BY users.lastname ASC
";

$result = mysqli_query($con, $query);

$countries_query = "SELECT * FROM countries";
$countries_result = mysqli_query($con, $countries_query);

echo "<h2>Lista korisnika i njihovih država:</h2>";
echo "<table border='1'>";
echo "<tr><th>Ime</th><th>Prezime</th><th>Država</th><th>Uredi</th></tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td>" . $row['country_name'] . "</td>";
    echo "<td>
            <form action='' method='POST'>
                <input type='hidden' name='user_id' value='" . $row['id'] . "'>
                <input type='text' name='firstname' value='" . $row['firstname'] . "'>
                <input type='text' name='lastname' value='" . $row['lastname'] . "'>
                <select name='country_id'>";
    
    while ($country = mysqli_fetch_array($countries_result)) {
        $selected = ($country['id'] == $row['country_id']) ? 'selected' : '';
        echo "<option value='" . $country['id'] . "' $selected>" . $country['country_name'] . "</option>";
    }
    
    echo "</select>
          <input type='submit' name='edit_user' value='Spremi'>
          </form>
          </td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
