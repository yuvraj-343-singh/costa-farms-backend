<?php

// use Shuchkin\SimpleXLSX;

require_once("./db.php");
// require_once './SimpleXLSX.php';
ini_set('max_execution_time', 0);


// echo '<h1>Parse books.xslx</h1><pre>';
// if ($xlsx = SimpleXLSX::parse('data.xlsx')) {
//     print_r($xlsx->rows());
// } else {
//     echo SimpleXLSX::parseError();
// }

$csv = array_map('str_getcsv', file('farms1.csv'));

$header = [];
$multiColumns = [];

$sql = "INSERT INTO farms ";

foreach ($csv as $k => $row) {
    $columns = [];
    foreach ($row as $key => $col) {
        if ($key) {
            if ($k === 0) {
                $header[] = '`' . $col . '`';
            } else {
                $columns[] = '"' . mysqli_real_escape_string($mysqli, $col) . '"';
            }
        }
    }
    if ($k === 0) {
        $sql .= '(' . implode(', ', $header) . ') VALUES ';
    } else {
        if (!mysqli_query($mysqli, $sql . '(' . implode(', ', $columns) . ')')) {
            echo "Error:<br>" . mysqli_error($conn);
        }
        // $multiColumns[] = '(' . implode(', ', $columns) . ')';
    }
}
// $sql .= implode(', ', $multiColumns);

// echo $sql;

// if (mysqli_query($mysqli, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error:<br>" . mysqli_error($conn);
// }

// mysqli_close($conn);
