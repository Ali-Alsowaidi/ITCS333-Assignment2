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

    //Check if the data retrieved successsfully
    if (!$result){
        echo "Failed to fetch the data";
        exit();
    }

    // Extract the records
    $students = $result['records'] ?? [];

    //Parse the JSON response
    $tableData = [];
    foreach ($students as $student){
        $fields = $student ['record'] ?? [];
        $tableData[] = [
            'year' => $fields['year']?? '',
            'semester' => $fields['semester']?? '',
            'program' => $fields['the_programs'] ?? '',
            'nationality' => $fields['student_nationalities'] ?? '',
            'college' => $fields['colleges'] ?? '',
        ];
    }
?>


<!-- Task 2 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Statistics</title>

    <!-- Pico CSS styling -->
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>

<body>
    <main class="container">
        <h1>Statistics of Students by Nationality</h1>

        <!-- Table-->
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Program</th>
                    <th>Nationality</th>
                    <th>College</th>
                    <th>Number of Students</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tableData as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['year']); ?></td>
                        <td><?= htmlspecialchars($row['semester']); ?></td>
                        <td><?= htmlspecialchars($row['program']); ?></td>
                        <td><?= htmlspecialchars($row['nationality']); ?></td>
                        <td><?= htmlspecialchars($row['college']); ?></td>
                        <td><?= htmlspecialchars($row['students_count']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>