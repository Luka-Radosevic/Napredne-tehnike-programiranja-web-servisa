<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$response = [
    'url' => 'https://www.index.hr/vijesti/'
];

echo json_encode($response);
?>
