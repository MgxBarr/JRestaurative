<?php
$data = json_decode(file_get_contents('json/la-formation.json'), true);
$newdata = json_decode(file_get_contents('php://input'), true);

foreach ($newdata as $item) {
    $data[] = $item;
}

file_put_contents('json/la-formation.json', json_encode($data));

header('Content-Type: application/json');
echo json_encode($data);
?>
