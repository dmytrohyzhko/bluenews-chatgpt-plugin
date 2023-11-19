<?php

const API_URL = "http://54.85.82.33:8002/api/getNewsByQuery?query=";

if (isset($_GET['query'])) {
    $sanitizedQuery = filter_var($_GET['query'], FILTER_SANITIZE_STRING);

    $apiUrl = API_URL . $sanitizedQuery;
    $newsJson = file_get_contents($apiUrl);

    if ($newsJson === false) {
        echo json_encode(["error" => "Failed to fetch data from API."]);
    } else {
        echo $newsJson;
    }
} else {
    echo json_encode(["error" => "Query parameter is missing."]);
}