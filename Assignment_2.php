<!--
Done by: 
Ali Majed AlSowaidi 202104585
Mohamed Abdulmonem AlJanahi 202008794
Section 8
-->


<!-- Task 1 -->

<?php

    // Fetching the data from the API
    $url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
    $response = file_get_contents($url);
    $result = json_decode($response,true);

    // Parse the JSON response
    $students = $result['records'];
?>


<!-- Task 2 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Statistics</title>
    <!-- Include Pico CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body>
    <main class="container">
        <h1>Statistics of Students by Nationality</h1>
        <table>
            <thead>
                <tr>
                    <th>College</th>
                    <th>Program</th>
                    <th>Nationality</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tableData as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['college']); ?></td>
                        <td><?= htmlspecialchars($row['program']); ?></td>
                        <td><?= htmlspecialchars($row['nationality']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>