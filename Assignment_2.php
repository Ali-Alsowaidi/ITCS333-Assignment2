<?php

    // Fetching the data from the API
    $url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
    $response = file_get_contents($url);
    $result = json_decode($response,true);

    // Parse the JSON response
    $students = $result['records'];
?>