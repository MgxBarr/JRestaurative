<!DOCTYPE html>
<?php
session_start();
$_SESSION['nompage'] = 'json/la-formation.json';
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La formation - IFJR</title>
    <link rel="icon" type="image/png" href="assets/ifjr.png" />
    <link rel="stylesheet" type="text/css" href="css/style-la-formation.css"/>
    <link rel="stylesheet" type="text/css" href="css/style-adminbuttons.css"/>

    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="content">

        <!--NAVBAR-->
        <div class="navbar" id="navbar">
        </div>

        <!--CONTENT MIDDLE-->
        <div class="content_middle">
            <div class="title-color">
                <div class="title"><h2>La formation</h2></div>
            </div>

            <div class="resume-ljr">
                <p class="text-ljr-small" id="text3"></p>
                <button id="btn-edit-3" onclick="modif(3)" class="btn-edit">Modifier</button>
                <img id="imgchiffres" src="assets/chiffres_formation.png" alt="chiffres_formation">
            </div>

            <div class="la-formation" id="la-formation">
              <!--carré formation fill avec fonction js-->
            </div>
            <!--stocke le numéro de la page de formation à add-->
            <div><p id="text1"></p></div>
            <!--stocke l'id du modal qu'on ajoute-->
            <div><p id="text2"></p></div>
            <button id="btn-add-formation" onclick="ajouter_formation()" class="btn-edit">Ajouter une formation</button>
            <div class="infos-contact-formation">
              <p class="text-ljr-small" id="text4"></p>
              <button id="btn-edit-4" onclick="modif(4)" class="btn-edit">Modifier</button>
            </div>

        </div>

        <!--FOOTER-->
    </div>

    <script>
      function ajouter_formation(){
        /*--------------------------------------------duplique fichier--------------------------------------*/
        //recup le nom du fichier 
        var id_new = document.getElementById('text1').innerHTML; 
        id_new = parseInt(id_new)+1;
        console.log(id_new); 

        var file = "formation-"+ id_new; 
        console.log(file); 

        //envoyer avec méthode POST le nom du fichier 
        //duplique le fichier formation-1.php 
        var formData = new FormData();
        formData.append('file', file);

        fetch('content/dupliquer_formation.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.text())
        .then(result => {
          console.log(result); 
        })
        .catch(error => console.error(error)); 
        /*---------------------------------------------------------------------------------------------------*/

        /*-----------------------------------------------modif json------------------------------------------*/
        fetch('content/get_admin_text.php')
        .then(function(response) {
          return response.json();
        })
        .then(function(data) {
          var content1 = document.getElementById("text1").innerHTML; 
          var id = document.getElementById("text2").innerHTML; 
          var newContent1 = "Titre"+content1;
          var newId1 = id;

          var newContent2 = "Veuillez saisir le résumé de la formation"; 
          var newId2 = parseInt(id)+1;

          var num_page_add = document.getElementById("text1").innerHTML; 
          var num_boutons_add = document.getElementById("text2").innerHTML; 

          //on indente
          num_page_add = parseInt(num_page_add)+1; 
          num_boutons_add = parseInt(num_boutons_add)+2;

          
          // Création des nouveaux tableaux
          var newItems = [
            {
              id: newId1.toString(),
              content: newContent1
            },
            {
              id: newId2.toString(),
              content: newContent2
            },{
              id: '1',
              content: num_page_add
            },
            {
              id: '2',
              content: num_boutons_add
            }
          ];

          fetch('content/add_formation.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(newItems)
          })
          .then(function(response) {
            return response.json();
          })
          .catch(function(error) {
            console.error('Erreur lors de l\'ajout des éléments :', error);
          });
          
          alert('Veuillez rafraîchir la page afin de voir le nouvel élément');
        })
        .catch(function(error) {
          console.error('Erreur lors de la récupération des données', error);
        });
        /*---------------------------------------------------------------------------------------------------*/
      }

     //load des infos depuis le json
      function getAdminText() {
        var isAdmin = "<?php echo $_SESSION["modif"]; ?>" === "1";
        var id_file = '0'; 
        fetch('content/get_admin_text.php')
        .then(function(response) {
        return response.json();
        })
        .then(function(data) {
        data.forEach(function(item) {
          console.log(item.id); 
          console.log(item.content); 
          var admin_text = item.content;
          var div = document.getElementById("text" + item.id);
          if (item.id == 1 || item.id == 2 || item.id == 4 || item.id == 3){
            div.innerHTML = admin_text;
          }else if (parseInt(item.id) % 2 !== 0){
            var container =  document.getElementById('la-formation'); 
          
            // Création de l'élément div
            var div = document.createElement("div");
            div.className = "formation";

            // Création de l'élément h2
            var h2 = document.createElement("h2");
            h2.className = "titre-formation";
            h2.id = "text"+item.id;
            //content de la balise <p>
            var textNodeh2 = document.createTextNode(item.content); 
            h2.appendChild(textNodeh2); 
            div.appendChild(h2);

            // Création du bouton "Modifier" pour h2
            var btnEdit = document.createElement("button");
            btnEdit.id = "btn-edit-"+item.id;
            btnEdit.className = "btn-edit";
            btnEdit.textContent = "Modifier";
            btnEdit.setAttribute("onclick", "modif("+item.id+")");
            div.appendChild(btnEdit);
            if (isAdmin) {
              btnEdit.style.display = 'block';
            }

            var formation2 = document.createElement("div"); 
            formation2.id = 'formation'+(parseInt(item.id)+1); 
            div.appendChild(formation2); 

            // Ajout de l'élément a à div
            container.appendChild(div)
          }else{
            id_file = parseInt(id_file)+1; 
            var file = "formation-"+ id_file+".php"; 
            var container =  document.getElementById('formation'+item.id);
            var div = document.createElement("div");
            div.className = "formation_under";

            // Création de l'élément p
            var p = document.createElement("p");
            p.className = "resume-formation";
            p.id = "text"+item.id;
            var textNodep = document.createTextNode(item.content); 
            p.appendChild(textNodep); 
            div.appendChild(p);

            // Création du bouton "Modifier" pour p
            var btnEdit2 = document.createElement("button");
            btnEdit2.id = "btn-edit-"+item.id;
            btnEdit2.className = "btn-edit";
            btnEdit2.textContent = "Modifier";
            btnEdit2.setAttribute("onclick", "modif("+item.id+")");
            div.appendChild(btnEdit2);
            if (isAdmin) {
              btnEdit2.style.display = 'block';
            }

            // Création de l'élément a
            var a = document.createElement("a");
            a.href = file;

            // Création de l'élément input
            var input = document.createElement("input");
            input.className = "button-formation";
            input.type = "button";
            input.id = "formation"+item.id;
            input.name = "formation"+item.id;
            input.value = "Voir la formation";
            a.appendChild(input);

            // Ajout de l'élément a à div
            div.appendChild(a);
            container.appendChild(div)
          }
        });
        })
        .catch(function(error) {
        console.error('Erreur lors de la récupération des données', error);
        });
      }
      getAdminText();
    </script>
</body>

<?php
if ($_SESSION["modif"]=="1") {
  echo "<script>
          var tab=document.getElementsByClassName('btn-edit');
          for (var i = 0; i < tab.length; i++) {
            tab[i].style.display='block';
          }
        </script>";
    echo "<input class='btn-disconnect' type='submit' onclick=\"location.href = 'admin/deconnexion.php'\" value='Déconnexion'>";
}
?>

<?php if($_SESSION["modif"]=="1"): ?>
<script type="text/javascript" src="content/modifs.js"></script>
<?php endif; ?>
</html>
