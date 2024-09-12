<?php
session_start();

if (isset($_POST['data'])) {
  $data = json_decode($_POST['data'], true);

  if ($data) {
    $fichier = file_get_contents('departement.json');
    $departements = json_decode($fichier, true);

    //cherche département correspond au code 
    $index = array_search($data['code'], array_column($departements, 'code'));
    if ($index !== false) {
      // update le statut du département
      $departements[$index][$data['filtre']] = $data['statut'];

      if (file_put_contents('departement.json', json_encode($departements))) {
        echo "Le fichier JSON a été mis à jour avec succès.";
      } else {
        echo "Une erreur est survenue lors de l'écriture dans le fichier JSON.";
      }
    } else {
      echo "Le département correspondant au code fourni n'a pas été trouvé.";
    }
  }
} else {
  echo "Les données n'ont pas été transmises.";
}
?>
