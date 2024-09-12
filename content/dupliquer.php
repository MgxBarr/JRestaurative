<?php
session_start();
$data = json_decode(file_get_contents($_SESSION['nompagedates']), true);
$newdata = json_decode(file_get_contents('php://input'), true);

$data[] = $newdata;

file_put_contents($_SESSION['nompagedates'], json_encode($data));

header('Content-Type: application/json');
echo json_encode($data);
?>
