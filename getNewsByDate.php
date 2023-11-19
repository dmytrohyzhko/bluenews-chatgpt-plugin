<?php

const API_URL = "http://54.85.82.33:8002/api/getNewsByDate?date=";

if (isset($_GET['date'])) {
    $sanitizedDate = filter_var($_GET['date'], FILTER_SANITIZE_STRING);

    if (file_put_contents("date.txt", $sanitizedDate) === false) {
        echo json_encode(["error" => "Failed to write to file."]);
        exit();
    }

    $apiUrl = API_URL . $sanitizedDate;
    $newsJson = file_get_contents($apiUrl);

    if ($newsJson === false) {
        echo json_encode(["error" => "Failed to fetch data from API."]);
    } else {
        echo $newsJson;
    }
} else {
    echo json_encode(["error" => "Date parameter is missing."]);
}