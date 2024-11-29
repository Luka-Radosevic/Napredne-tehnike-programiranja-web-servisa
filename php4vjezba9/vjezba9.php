<?php
date_default_timezone_set("Europe/Zagreb");

function ducan($stanje = "otvoren") {
    echo "Dućan je $stanje.";
}

$currentHour = (int)date("H");
$currentDay = date("l");
$currentDate = date("Y-m-d");

$holidays = [
    "2024-01-01", // Nova godina
    "2024-05-01", // Praznik rada
    "2024-12-25", // Božić
    "2024-12-26", // Sveti Stjepan
];

if (in_array($currentDate, $holidays)) {
    ducan("zatvoren jer je danas državni praznik");
} elseif ($currentDay === "Sunday") {
    ducan("zatvoren jer je nedjelja");
} elseif ($currentDay === "Saturday") {
    if ($currentHour >= 9 && $currentHour < 14) {
        ducan("otvoren. Radno vrijeme subotom: 9:00 - 14:00");
    } else {
        ducan("zatvoren. Radno vrijeme subotom: 9:00 - 14:00");
    }
} else {
    if ($currentHour >= 8 && $currentHour < 20) {
        ducan("otvoren. Radno vrijeme: 8:00 - 20:00");
    } else {
        ducan("zatvoren. Radno vrijeme: 8:00 - 20:00");
    }
}
?>
