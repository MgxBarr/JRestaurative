<?php
  $data = array("code" => "", "statut" => "","nom_departement" => "","nom_resp" => "","numéro" => "","mesure1" => "","mesure2" => "","mesure3" => "");
  if (file_exists('departement.json')) {
    $data = json_decode(file_get_contents('departement.json'), true);
  }

  echo json_encode($data);
?>
