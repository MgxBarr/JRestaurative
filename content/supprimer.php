<?php
session_start();
$data = json_decode(file_get_contents($_SESSION['nompagedates']), true);
$idToDelete = $_POST['id'];

// Cherche l'index à supprimer 
$indexToDelete = -1;
foreach ($data as $index => $item) {
  if ($item['id'] === $idToDelete) {
    $indexToDelete = $index;
    break;
  }
}

// Supprime l'élément du tableau 
if ($indexToDelete !== -1) {
  array_splice($data, $indexToDelete, 1);
}

file_put_contents($_SESSION['nompagedates'], json_encode($data));

header('Content-Type: application/json');
echo json_encode($data);
?>
