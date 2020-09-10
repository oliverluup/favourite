<?php
require 'connection.php';

if ($_GET['limit']) {
    $limitSQL = ' limit 0, ' . $_GET['limit'];
} else {
    $limitSQL = '';
}

$query = "SELECT * FROM noodles" . mysqli_real_escape_string($mysqli ,$limitSQL);

$noodles =
    [
        'info' => [
            'name' => 'Oliver Luup',
            'description' => 'Noodles'
        ],
    ];

if ($result = $mysqli->query($query)) {
    while ($noodle = $result->fetch_array()) {
        $noodles['data'][] =
            [
                'id' => $noodle['id'],
                'title' => $noodle['title'],
               'description' => $noodle['description'],
                'image' => $noodle['image'],
                'topic1'=> $noodle['flavor'],
                'topic2' => $noodle['grams']
        ];
    }
    $result->close();
}
header('Content-Type: application/json');
echo json_encode($noodles);