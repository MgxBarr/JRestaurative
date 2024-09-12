<?php
session_start();

if (!isset($_SESSION["id"])){
      header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Menu Admin - IFJR</title>
      <!--<link rel="icon" type="image/png" href="../assets/ifjr.png" />-->
      <link rel="stylesheet" type="text/css" href="../css/style-cssadmin.css"/>

      <!--Font-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
      <h1 class="title">MENU ADMIN</h1>
      <div class="menu">
        <a class="btn-menu" href="../ljr.php">PAGE LJR</a>
        <a class="btn-menu" href="../la-formation.php">PAGE LA FORMATION</a>
      </div>
      <input class="submit" type="submit" onclick="location.href = 'deconnexion.php'" value="Déconnexion">
    </div>
  </body>
</html>
