<?php
session_start();
if (!isset($_SESSION["id"])){
      header('Location: connexion.php');
}
$verif=false;
if (($handle = fopen("infoadmin.csv", "r")) !== FALSE) {
    while ((($data = fgetcsv($handle, 1000, ";")) !== FALSE) && !$verif) {
        if ($_POST['id']==$data[0] && $_POST['mdp']==$data[1]){
             $verif=true;
             $_SESSION["type"]="admin";
             $_SESSION["id"]=$data[0];
             $_SESSION["modif"]=1;
        }
    }
    fclose($handle);
}
if (!$verif){
      header('Location: connexion.php');
      exit ();
}
if ($verif){
      header('Location: menuadmin.php');
      exit ();
}
?>
