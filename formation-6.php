<!DOCTYPE html>
<?php
session_start();

$nompagephp= basename(__FILE__);;
$positionPoint = strrpos($nompagephp, '.');
$nomsansextension = substr($nompagephp, 0, $positionPoint);
$nompagejson = "json/".$nomsansextension . ".json";
$nompagedates = "json/".$nomsansextension . "-dates.json";

$_SESSION['nompage'] = $nompagejson;
$_SESSION['nompagedates'] = $nompagedates;
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation : Bénévole de la communauté - IFJR</title>
    <link rel="icon" type="image/png" href="assets/ifjr.png" />
    <link rel="stylesheet" type="text/css" href="css/style-page-formation.css"/>
    <link rel="stylesheet" type="text/css" href="css/style-adminbuttons.css"/>

    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<body>
    <div class="content">

        <!--NAVBAR-->
        <div class="navbar" id="navbar">
        </div>

        <div class="content-middle">
          <!--TITRE COLOR-->

          <!--FORMATION-->
          <div class="menu-form" id="menu-form">
            <ul class="ul-menu-form">
              <li><a href="#Le contexte" onclick="openmenu(this.innerHTML)">Le contexte</a></li>
              <li><a href="#À qui s’adresse cette formation ?" onclick="openmenu(this.innerHTML)">À qui s’adresse cette formation ?</a></li>
              <li><a href="#Les objectifs de la formation" onclick="openmenu(this.innerHTML)">Les objectifs de la formation</a></li>
              <li><a href="#Le contenu de la formation" onclick="openmenu(this.innerHTML)">Le contenu de la formation</a></li>
              <li><a href="#Les méthodes utilisées" onclick="openmenu(this.innerHTML)">Les méthodes utilisées</a></li>
              <li><a href="#Les ressources pédagogiques" onclick="openmenu(this.innerHTML)">Les ressources pédagogiques</a></li>
              <li><a href="#Les modalités d'évaluation" onclick="openmenu(this.innerHTML)">Les modalités d'évaluation</a></li>
              <li><a href="#Les modalités de suivi" onclick="openmenu(this.innerHTML)">Les modalités de suivi</a></li>
              <li><a href="#Profils et expérience de nos intervenants" onclick="openmenu(this.innerHTML)">Profils et expérience de nos intervenants</a></li>
            </ul>

            <script>
              /* affiche le menu ou non */
              var hauteurmenu=(12*window.innerHeight)/100;
              window.onscroll = function() {
              var currentScrollPos = window.pageYOffset;
                if (window.pageYOffset > hauteurmenu) {
                  document.getElementById("menu-form").style.top = "12vh";
                } else {
                  document.getElementById("menu-form").style.top = "-10vh";
                }
              }
            </script>
          </div>
          
          <div class="titre-form">
            <h3 class="titre"></h3>
            <h3 class="titre" id="text1"></h2>
            <button id="btn-edit-1" onclick="modif(1)" class="btn-edit">Modifier</button>
            <p class="sous-titre">Cette formation fait partie du parcours de formation à l’animation de mesures de justice restaurative</p>
            <div class="infos-titre">
              <div class="items-titre">
                <p class="text" id="text11"></p> 
                <p class="text" id="text12"></p>
                <p class="text" id="text13"></p>
              </div>
              <div class="infos-titre infos-titre-admin">
                <button id="btn-edit-11" onclick="modif(11)" class="btn-edit">Modifier</button>
                <button id="btn-edit-12" onclick="modif(12)" class="btn-edit">Modifier</button>
                <button id="btn-edit-13" onclick="modif(13)" class="btn-edit">Modifier</button>
              </div>
            </div>
          </div>

          <div class="infos-form">

            <div class="infos-formation">
              <div class="container" id="Le contexte">
                <div class="select-btn">
                  <p class="titre-infos-formation gras">Le contexte</p>
                  <span class="titre-infos-formation gras">+</span>
                </div>
                <div class="content-container">
                  <p class="text" id="text2"></p>
                  <button id="btn-edit-2" onclick="modif(2)" class="btn-edit">Modifier</button>
                </div>
              </div>

              <div class="container" id="À qui s’adresse cette formation ?">
                <div class="select-btn">
                  <p class="titre-infos-formation gras">À qui s’adresse cette formation ?</p>
                  <span class="titre-infos-formation gras">+</span>
                </div>
                <div class="content-container">
                  <p class="text" id="text3"></p>
                  <button id="btn-edit-3" onclick="modif(3)" class="btn-edit">Modifier</button>
                </div>
              </div>

              <div class="container" id="Les objectifs de la formation">
                <div class="select-btn">
                  <p class="titre-infos-formation gras">Les objectifs de la formation</p>
                  <span class="titre-infos-formation gras">+</span>
                </div>
                <div class="content-container">
                  <p class="text" id="text4"></p>
                  <button id="btn-edit-4" onclick="modif(4)" class="btn-edit">Modifier</button>
                </div>
              </div>

              <div class="container" id="Le contenu de la formation">
                <div class="select-btn">
                  <p class="titre-infos-formation gras">Le contenu de la formation</p>
                  <span class="titre-infos-formation gras">+</span>
                </div>
                <div class="content-container">
                  <p class="text" id="text5"></p>
                  <button id="btn-edit-5" onclick="modif(5)" class="btn-edit">Modifier</button>
                </div>
              </div>

              <div class="container" id="Les méthodes utilisées">
                <div class="select-btn">
                  <p class="titre-infos-formation gras">Les méthodes utilisées</p>
                  <span class="titre-infos-formation gras">+</span>
                </div>
                <div class="content-container">
                  <p class="text" id="text6"></p>
                  <button id="btn-edit-6" onclick="modif(6)" class="btn-edit">Modifier</button>
                </div>
              </div>

              <div class="container" id="Les ressources pédagogiques">
                <div class="select-btn">
                  <p class="titre-infos-formation gras">Les ressources pédagogiques</p>
                  <span class="titre-infos-formation gras">+</span>
                </div>
                <div class="content-container">
                  <p class="text" id="text7"></p>
                  <button id="btn-edit-7" onclick="modif(7)" class="btn-edit">Modifier</button>
                </div>
              </div>

              <div class="container" id="Les modalités d'évaluation">
                <div class="select-btn">
                  <p class="titre-infos-formation gras">Les modalités d'évaluation</p>
                  <span class="titre-infos-formation gras">+</span>
                </div>
                <div class="content-container">
                  <p class="text" id="text8"></p>
                  <button id="btn-edit-8" onclick="modif(8)" class="btn-edit">Modifier</button>
                </div>
              </div>

              <div class="container" id="Les modalités de suivi">
                <div class="select-btn">
                  <p class="titre-infos-formation gras">Les modalités de suivi</p>
                  <span class="titre-infos-formation gras">+</span>
                </div>
                <div class="content-container">
                  <p class="text" id="text9"></p>
                  <button id="btn-edit-9" onclick="modif(9)" class="btn-edit">Modifier</button>
                </div>
              </div>

              <div class="container" id="Profils et expérience de nos intervenants">
                <div class="select-btn">
                  <p class="titre-infos-formation gras">Profils et expérience de nos intervenants</p>
                  <span class="titre-infos-formation gras">+</span>
                </div>
                <div class="content-container">
                  <p class="text" id="text10"></p>
                  <button id="btn-edit-10" onclick="modif(10)" class="btn-edit">Modifier</button>
                </div>
              </div>



              <script>
                function openmenu(e) {
                  var i=document.getElementById(e).firstChild.nextSibling;
                  i.classList.add('open');
                  i.parentElement.style.marginBottom=i.nextElementSibling.clientHeight+document.documentElement.clientHeight*0.05+"px";
                  i.lastChild.previousSibling.innerHTML="-";
                }   
                /* script permettant d'ouvrir et de fermer les menus déroulants */ 
                let items = document.getElementsByClassName("select-btn");
                for (let i = 0; i < items.length; i++) {
                  items[i].addEventListener("click", () => {
                    items[i].classList.toggle("open");
                    items[i].parentElement.style.marginBottom=items[i].nextElementSibling.clientHeight+document.documentElement.clientHeight*0.05+"px";
                    if (items[i].lastChild.previousSibling.innerHTML=="+") {
                      items[i].lastChild.previousSibling.innerHTML="-";
                    }
                    else {
                      items[i].lastChild.previousSibling.innerHTML="+";
                    }
                  });
                }
              </script>
            </div>

            <div class="colonne">
              <div class="content-colonne">
                <p class="bouton" id="dates-et-villes" onclick="openmodal(this)">Consulter les dates/villes</p>
                <div id="modal-dates-et-villes" class="modal">
                  <div class="modal-content">
                      <span id="close-dates-et-villes" class="close">&times;</span>
                      <h1 class="title-modal">Les créneaux disponibles</h1>
                      <div class="liste-date-villes" id="liste-date-villes">
                      </div>
                      <button id="dupliquer" onclick="dupliquer()" class="btn-edit">Ajouter une date</button>
                  </div>
                </div>
                <p class="bouton" id="contact" onclick="openmodal(this)">Contacter</p>
                <div id="modal-contact" class="modal">
                  <div class="modal-content">
                      <span id="close-contact" class="close">&times;</span>
                      <h1 class="title-modal">Nous contacter</h1>
                      <form class="form-contact" id="contact-formation-module-1" action="content/contact.php" method="post" >
                        <div class="infos-form-contact">
                          <img class="logo-ifjr-contact" src="assets/logo-ifjr.png" alt="logoifjr">
                          <input class="input" required="required" type="text" id="nom" name="nom" placeholder="Nom *">
                          <input class="input" required="required" type="text" id="prenom" name="prenom" placeholder="Prenom *">
                          <input class="input" required="required" type="email" id="mail" name="mail" placeholder="Mail *">
                          <input type="hidden" id="nom-formation" name="nom-formation" value="formation-module-1">
                          <input class="submit" type="submit" name="submit" value="Envoyer">
                        </div>
                        <div class="colonne-message">
                          <textarea class="input message" name="message" id="message" placeholder="Message *"></textarea>
                          <p class="champobli">* : Champ obligatoire</p>
                        </div>
                      </form>
                  </div>
                </div>
                <p class="text-smaller">L’IFJR met son expertise à disposition de la fédération <a href="https://www.france-victimes.fr/" class="lien">France Victimes</a> et de l’<a href="https://www.enap.justice.fr/" class="lien">École Nationale d’administration pénitentiaire</a> (ENAP).</p>
                <p class="text-smaller">Merci de vous rapprocher de ces structures qui vous informeront sur leurs tarifs et modalités d’accès.</p>
                <a class="btn-link" href="assets/BC.pdf"><input class="btn-pdf" type="button" name="pdf" value="Voir le PDF"></a>
                <p class="" style="text-align: center; font-weight: bold; font-size: 1.5vh;" id="text14"></p>

                <script>
                  function openmodal(m) {
                    //ouvre le modal
                    document.body.classList.add("scrolling")
                    var modal=document.getElementById("modal-"+m.id);
                    modal.style.display="flex";
                    document.getElementById("menu-form").style.top="-10vh";
    
                    //ferme le modal si on clique sur sa croix
                    document.getElementById("close-"+m.id).onclick = function() {
                      modal.style.animation = "unloading 0.7s";
                      if (window.pageYOffset > ((12*window.innerHeight)/100)) {
                        document.getElementById("menu-form").style.top="12vh";
                      }
                      setTimeout(() => {  modal.style.display = "none", modal.style.animation="loading 0.7s", document.body.classList.remove("scrolling") }, 650);
                    }
    
                    //ferme le modal si on clique en dehors
                    window.onclick = function(event) {
                      if (event.target == modal) {
                        modal.style.animation = "unloading 0.7s";
                        if (window.pageYOffset > ((12*window.innerHeight)/100)) {
                          document.getElementById("menu-form").style.top="12vh";
                        }
                        setTimeout(() => {  modal.style.display = "none", modal.style.animation="loading 0.7s",  document.body.classList.remove("scrolling") }, 650);
                      }
                    }
                  }
                  
              </script>
              </div>
            </div>
          </div>
        </div>
        <!--FOOTER-->
    </div>
    <script>
      function supprimer(id) {
        var formData = new FormData();
        formData.append('id', id);

        fetch('content/supprimer.php', {
          method: 'POST',
          body: formData
        })
          .then(function(response) {
            return response.json();
          })
          .then(function(updatedData) {
            console.log(updatedData);
            alert('Suppression réussie. Veuillez rafraîchir la page pour voir les modifications.');
          })
          .catch(function(error) {
            console.error('Erreur lors de la suppression de l\'élément :', error);
          });
      }



      function dupliquer() {
        fetch('content/get_dates.php')
          .then(function(response) {
            return response.json();
          })
          .then(function(data) {
            //l'id du tableau qu'on ajoute, on indente +1 
            var newId = parseInt(data[data.length - 1].id) + 1;
            var newContent = "Veuillez saisir les informations de la nouvelle date"; 

            //infos qu'on envoi pour add dans le json
            var newItem = {
              id: newId.toString(),
              content: newContent
            };

            fetch('content/dupliquer.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json'
              },
              body: JSON.stringify(newItem)
            })
            .then(function(response) {
              return response.json();
            })
            .catch(function(error) {
              console.error('Erreur lors de l\'ajout de l\'élément :', error);
            });
            
            alert('Veuillez rafraichîr la page afin de voir le nouveau créneau')
          })
          .catch(function(error) {
            console.error('Erreur lors de la récupération des données', error);
          });
      }

     //load des infos depuis le json
      function getAdminText() {
        fetch('content/get_admin_text.php')
        .then(function(response) {
        return response.json();
        })
        .then(function(data) {
        data.forEach(function(item) {
            var admin_text = item.content;
            var div = document.getElementById("text" + item.id);
            if (div) {
                div.innerHTML = admin_text;
            }
        });
        })
        .catch(function(error) {
        console.error('Erreur lors de la récupération des données', error);
        });
      }
      getAdminText();

      //charger les infos contacts à droite de la map
      function getDates() {
        var admin_text;
        var isAdmin = "<?php echo $_SESSION["modif"]; ?>" === "1";
        fetch('content/get_dates.php')
        .then(function(response) {
          return response.json();
        })
        .then(function(data) {
          data.forEach(function(item) {
            //div principale 
            var div = document.createElement("div");
            div.className = "creneau";

            //balise <p> avec id du text
            var p = document.createElement("p");
            p.className = "creneau-item";
            p.id = "text"+item.id;

            //content de la balise <p>
            var textNode = document.createTextNode(item.content); 
            p.appendChild(textNode); 

            //bouton modifier
            var button = document.createElement("button");
            button.id = "btn-edit-"+item.id;
            button.textContent = "Modifier";
            button.className = "btn-edit";
            button.setAttribute("onclick", "modif_dates("+item.id+")");
            if (isAdmin) {
              button.style.display = 'block';
            }

            //bouton supprimer 
            var button_delete = document.createElement("button");
            button_delete.id = "btn-delete-" + item.id;
            button_delete.textContent = "Supprimer";
            button_delete.className = "btn-edit";
            button_delete.setAttribute("onclick", "supprimer(" + item.id + ")");
            if (isAdmin) {
              button_delete.style.display = 'block';
            }

            //bouton s'inscrire
            var link = document.createElement("a");
            var temp = item.content.toUpperCase();
            if (temp.includes('ENAP')) {
              link.href="https://www.enap.justice.fr/contact";
            } else if (temp.includes('FRANCE VICTIMES')) {
              link.href="https://www.france-victimes.fr/index.php/formation/formation-sur-la-justice-restaurative";
            } else {
              link.href="http://www.justicerestaurative.org/saint-denis-la-reunion-module-1/";
            }
            var input = document.createElement("input");
            input.type = "button";
            input.value = "S'inscrire";
            input.className = "bouton-sinscrire";

            //ajout bouton dans le lien 
            link.appendChild(input);

            //ajout des éléments à la div
            div.appendChild(p);
            div.appendChild(button);
            div.appendChild(button_delete);
            div.appendChild(link);

            //raccroche la div au modal 
            var parent = document.getElementById('liste-date-villes');
            parent.appendChild(div);
            
          });
        })
        .catch(function(error) {
        console.error('Erreur lors de la récupération des données', error);
        });
      }
      getDates();
    </script>
  
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
