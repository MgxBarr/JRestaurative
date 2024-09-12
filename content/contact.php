<?php
    $file = fopen("contact.csv", "a+");
    fwrite($file,$_POST["nom-formation"]);
    fwrite($file,";");
    fwrite($file,$_POST["nom"]);
    fwrite($file,";");
    fwrite($file,$_POST["prenom"]);
    fwrite($file,";");
    fwrite($file,$_POST["mail"]);
    fwrite($file,";");
    fwrite($file,$_POST["message"]);
    fwrite($file, "\n");
    fclose($file);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>