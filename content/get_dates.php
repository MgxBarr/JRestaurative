<?php
session_start();
if (file_exists($_SESSION['nompagedates'])) {
  $data = json_decode(file_get_contents($_SESSION['nompagedates']), true);
} else {
  $data = [];
}

header('Content-Type: application/json');
echo json_encode($data);
?>
