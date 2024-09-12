<?php
session_start();
if (file_exists('../map/departement.json')) {
  $data = json_decode(file_get_contents('../map/departement.json'), true);
} else {
  $data = [];
}

header('Content-Type: application/json');
echo json_encode($data);
?>
