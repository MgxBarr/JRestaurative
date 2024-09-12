<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr" dir="ltr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Connexion Admin - IFJR</title>
      <!--<link rel="icon" type="image/png" href="../assets/ifjr.png" />-->
      <link rel="stylesheet" type="text/css" href="../css/style-cssadmin.css"/>

      <!--Font-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  </head>
  <body>

    <div class="wrapper">
      <h1 class="title">CONNEXION ADMIN</h1>
      <form name="form" id="form" class="form" action="verifadmin.php" method="post">
        <input class="input" required="required" type="text" id="id" name="id" placeholder="identifiant">
        <input class="input" required="required" type="password" id="mdp" name="mdp" placeholder="mot de passe">
        <input class="submit" type="submit" name="submit" value="Valider">
      </form>
    </div>

  </body>
</html>
