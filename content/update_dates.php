<?php
session_start();
if (isset($_POST['data'])) {
  $data = json_decode($_POST['data'], true);
  if ($data) {
    if (file_put_contents($_SESSION['nompagedates'], json_encode($data))) {
      echo "Le fichier JSON a été mis à jour avec succès.";
    } else {
      echo "Une erreur est survenue lors de l'écriture dans le fichier JSON.";
    }
  } else {
    echo "Les données JSON sont invalides.";
  }
} else {
  echo "Les données n'ont pas été transmises.";
}

?>
