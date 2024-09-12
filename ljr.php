<!DOCTYPE html>
<?php
session_start();
$_SESSION['nompage'] = 'json/ljr.json';
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La justice restaurative - IFJR</title>
    <link rel="icon" type="image/png" href="assets/ifjr.png" />
    <link rel="stylesheet" type="text/css" href="css/style-ljr.css"/>
    <link rel="stylesheet" type="text/css" href="css/style-adminbuttons.css"/>

    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--Map-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css" /> <!--fichier CSS de la bibliothèque-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js"></script><!--fichier js de la bibliothèque-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script> <!-- plugin Leaflet.ajax pour charger des données depuis une url -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="content">

        <!--NAVBAR-->
        <div class="navbar" id="navbar">
        </div>

        <!--CONTENT MIDDLE-->
        <div class="content_middle">
            <div class="title-color">
                <div class="title"><h2>La justice restaurative</h2></div>
            </div>

            <div class="resume-ljr">
                <p class="text-ljr-small" id="text1"></p>
                <button id="btn-edit-1" onclick="modif(1)" class="btn-edit">Modifier</button>
            </div>
            <div class="infos-ljr">
                <!--1-->
                <div class="box" id="box1" onclick="openmodal(this)">
                    <!-- a fix si on modifie le titre dans le modal, ça le modifie pas ici, même si on met l'id="text5"-->
                    <p class="titre-box" ></p>
                </div>
                <div id="modal-box1" class="modal">
                    <div class="modal-content">
                        <span id="close-box1" class="close">&times;</span>
                        <h1 class="title-modal" id="text5"></h1>
                        <button id="btn-edit-5" onclick="modif(5)" class="btn-edit">Modifier</button>
                        <div class="text-modal">
                            <p id="text2"></p>
                            <button id="btn-edit-2" onclick="modif(2)" class="btn-edit">Modifier</button>
                        </div>
                        <a class="plus-dinfos" href="https://www.justicerestaurative.org/en-savoir-plus/">En savoir plus</a>
                    </div>
                </div>

                <!--2-->
                <div class="box" id="box2" onclick="openmodal(this)">
                    <p class="titre-box"></p>
                </div>
                <div id="modal-box2" class="modal">
                    <div class="modal-content">
                        <span id="close-box2" class="close">&times;</span>
                        <h1 class="title-modal" id="text6"></h1>
                        <button id="btn-edit-6" onclick="modif(6)" class="btn-edit">Modifier</button>
                        <div class="text-modal">
                            <p id="text3"></p>
                            <button id="btn-edit-3" onclick="modif(3)" class="btn-edit">Modifier</button>
                        </div>
                        <a class="plus-dinfos" href="https://www.justicerestaurative.org/en-savoir-plus/">En savoir plus</a>
                    </div>
                </div>

                <!--3-->
                <div class="box" id="box3" onclick="openmodal(this)">
                    <p class="titre-box"></p>
                </div>
                <div id="modal-box3" class="modal">
                    <div class="modal-content">
                        <span id="close-box3" class="close">&times;</span>
                        <h1 class="title-modal" id="text7"></h1>
                        <button id="btn-edit-7" onclick="modif(7)" class="btn-edit">Modifier</button>
                        <div class="text-modal">
                            <p id="text4"></p>
                            <button id="btn-edit-4" onclick="modif(4)" class="btn-edit">Modifier</button>
                        </div>
                        <a class="plus-dinfos" href="https://www.justicerestaurative.org/en-savoir-plus/">En savoir plus</a>
                    </div>
                </div>
                
                <script>
                    setTimeout(() => {
                        let titres=document.getElementsByClassName("titre-box");
                        for (let index = 0; index < titres.length; index++) {
                            titres[index].innerHTML=document.getElementById("close-"+titres[index].parentElement.id).nextSibling.nextSibling.innerHTML;
                        }
                    }, 500);  
                </script>

            </div>

            <!--MAP-->
            <div class="button-map" id="map" onclick="openmodal(this)">
                <p>TROUVER MON INTERLOCUTEUR</p>
            </div>
            <div id="modal-map" class="modal">
                <div class="modal-content">
                    <span id="close-map" class="close">&times;</span>
                    <h1 class="title-modal">Je trouve mon interlocuteur</h1>
                    <div class="map-content">
                        <div class="map-container">
                            <p id="cliquersurmondep">Cliquez sur votre département :</p>
                            <div id="map_programme"></div>
                            <div class="legende-boutons-changer-dispo">
                                    <p><button class="btn-dispo" id="dispo"></button> Opérationnel</p>
                                    <p><button class="btn-dispo" id="encours"></button> Bientôt disponible</p>
                                    <p><button class="btn-dispo" id="pasdispo"></button> Pas de programme</p>
                            </div>
                        </div>
                        <div class="content_right">
                            <div class="recherche"> 
                                <input type="text" id="searchInput_dep" placeholder="Renseignez votre département" >
                                <div id="searchResults_dep"></div>
                            </div>
                            <div class="filtres">
                                <div id="select-btn-filtres" class="select-btn" onclick="this.classList.toggle('open');">
                                    <p id="titre-filtre">Filtrer par mesure</p>
                                </div>
                                <div class="content-filtres">
                                    <button class="btn-filtre" id="original" value="Aucun filtre">Aucun filtre</button>
                                    <button class="btn-filtre" id="mesure1" value="Médiations restauratives">Médiations restauratives</button>
                                    <button class="btn-filtre" id="mesure2" value="Rencontres détenus/condamnés-victimes">Rencontres détenus / condamnés-victimes</button>
                                    <button class="btn-filtre" id="mesure3" value="Cercle de soutien">Cercle de soutien</button>
                                </div>
                            </div>
                            <div class="infos-departement" id="infos-departement">
                                <p id="text8"></p>
                                <button id="btn-edit-8" onclick="modif_map()" class="btn-edit">Modifier</button>
                                <p><span class='titreinfosdep'>Mesures disponibles :</span><ul id="disponibilites"></ul></p>
                                <div id="changer_disponibilités">
                                <div class="filtres" id="menu-changerdispo">
                                    <div id="select-btn-filtres" class="select-btn" onclick="this.classList.toggle('open');">
                                        <p id="titre-filtre" style="font-weight:bold;">Changer Statut/Disponibilités</p>
                                    </div>
                                    <div class="content-filtres">
                                        <div class="boutons-changer-dispo">
                                            <p>Programme</p>
                                            <button class="btn-dispo" id="dispo" onclick='changement("green","statut")'></button>
                                            <button class="btn-dispo" id="encours" onclick='changement("orange","statut")'></button>
                                            <button class="btn-dispo" id="pasdispo" onclick='changement("red","statut")'></button>
                                        </div>
                                        <div class="boutons-changer-dispo">
                                            <p>Médiations restauratives</p>
                                            <button class="btn-dispo" id="dispo" onclick='changement("green","mesure1")'></button>
                                            <button class="btn-dispo" id="encours" onclick='changement("orange","mesure1")'></button>
                                            <button class="btn-dispo" id="pasdispo" onclick='changement("red","mesure1")'></button>
                                        </div>
                                        <div class="boutons-changer-dispo">
                                            <p>Rencontres détenus / condamnés-victimes</p>
                                            <button class="btn-dispo" id="dispo" onclick='changement("green","mesure2")'></button>
                                            <button class="btn-dispo" id="encours" onclick='changement("orange","mesure2")'></button>
                                            <button class="btn-dispo" id="pasdispo" onclick='changement("red","mesure2")'></button>
                                        </div>
                                        <div class="boutons-changer-dispo">
                                            <p>Cercle de soutien</p>
                                            <button class="btn-dispo" id="dispo" onclick='changement("green","mesure3")'></button>
                                            <button class="btn-dispo" id="encours" onclick='changement("orange","mesure3")'></button>
                                            <button class="btn-dispo" id="pasdispo" onclick='changement("red","mesure3")'></button>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <!-- message confirmation de la modification-->
                                <div id="confirmation"></div>
                                <!--stocker infos-->
                                <div id="code"></div>
                                <div id="filtre">statut</div>
                                <div id="admin"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <script>
                
                <?php if($_SESSION["modif"]=="1"): ?>
                document.getElementById('admin').innerHTML = 1;
                <?php endif; ?>

                function openmodal(m) {
                    //ouvre le modal
                    document.body.classList.add("scrolling")
                    var modal=document.getElementById("modal-"+m.id);
                    modal.style.display="flex";
                    mapload();
                    
                    //ferme le modal si on clique sur sa croix
                    document.getElementById("close-"+m.id).onclick = function() {
                        modal.style.animation = "unloading 0.7s";
                        setTimeout(() => {  modal.style.display = "none", modal.style.animation="loading 0.7s", document.body.classList.remove("scrolling"), mapload(), document.getElementById("select-btn-filtres").classList.remove('open') }, 650);
                    }
    
                    //ferme le modal si on clique en dehors
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.animation = "unloading 0.7s";
                            setTimeout(() => {  modal.style.display = "none", modal.style.animation="loading 0.7s",  document.body.classList.remove("scrolling"), mapload(), document.getElementById("select-btn-filtres").classList.remove('open') }, 650);
                        }
                    }
                }
            </script>

            <script>


                /*--------------------------------------------------------------------------------------------------------------------------------------------------------------*/
                /*                                                         map (affichage couche de tuiles et tous les layers)                                                  */
                /*--------------------------------------------------------------------------------------------------------------------------------------------------------------*/
                var map = L.map('map_programme').setView([46.5, 2.5], 5); //([latitude,longitude],zoom)

                //pour pas quon puisse sortir trop du carré
                //map.setMaxBounds(map.getBounds());
                map.setMaxBounds([[35, -15], [55, 15]]);

                //pour que la map se load bien quand on charge la div
                function mapload() {
                    map.invalidateSize();
                }
                /*--------------------------------------------------------------------------------------------------------------------------------------------------*/
                /*                                                      Création map avec couleurs selon programmes                                                 */
                /*--------------------------------------------------------------------------------------------------------------------------------------------------*/

                //ajouter une couche de tuiles
                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                    attribution: '&copy; Mapbox',
                    minZoom:3,
                    maxZoom: 10,
                    id: 'swifties/clhgga8q401cy01pg9hfoerxm', //type carte
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'pk.eyJ1Ijoic3dpZnRpZXMiLCJhIjoiY2xoZ2U2ZTVnMWZ2MTNlcGNhN3BpM3NtbiJ9.0SS05-rMhD-lfPMQ2iIP4w'
                }).addTo(map);

                //tableaux pour stocker les disponibilité des programmes et mesures pour couleurs des départements 
                let tab = [];
                let tab_initial = []; 
                let tab_mesure1 = []; 
                let tab_mesure2 = []; 
                let tab_mesure3 = []; 
                var count = 0;

                //requête fetch pour aller récupérer les données du fichier json
                fetch('map/get-data.php')
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) { 
                    tab = [];
                    tab_initial = [];
                    tab_mesure1 = [];
                    tab_mesure2 = [];
                    tab_mesure3 = [];
                    var count = 0;
                    data.forEach(function(element) {
                        //remplissage du tableau avec les couleurs 
                        tab[count] = element.statut;
                        count++;
                    });

                    // Création du premier layer (couleurs correspondent à la disponibilité des programmes)
                    var geojsonLayer = L.geoJSON.ajax('https://france-geojson.gregoiredavid.fr/repo/departements.geojson', {
                    style: function(feature) {
                        var departementIndex = parseInt(feature.properties.code, 10);

                        if (feature.properties.code=="2A") {
                            return {
                                fillColor: tab[19],
                                color: 'white',
                                weight: 1,
                                fillOpacity: 0.5
                            };
                        }
                        if (feature.properties.code=="2B") {
                            return {
                                fillColor: tab[20],
                                color: 'white',
                                weight: 1,
                                fillOpacity: 0.5
                            };
                        }

                        if (departementIndex >= 0 && departementIndex < tab.length) {
                            if (departementIndex<=19) {
                                    departementIndex--;
                            }
                            var color = tab[departementIndex];    
                            return {
                                fillColor: color,
                                color: 'white',
                                weight: 1,
                                fillOpacity: 0.5
                            };
                        }
                    },

                    //ajout de la fonctionnalité de click sur chaque département pour afficher les infos de contacts 
                    onEachFeature: function(feature, layer) {
                        layer.on('click', function(e) {
                            var code_clique = feature.properties.code;
                            data.forEach(function(element) {
                                if (element.code == code_clique) {
                                    document.getElementById("infos-departement").style.visibility="visible";
                                    document.getElementById("disponibilites").innerHTML = "Aucune mesure disponible";
                                    if (element.mesure1 == "green" || element.mesure2 == "green" || element.mesure3 == "green") {
                                        document.getElementById("disponibilites").innerHTML = "";
                                    }
                                    if (element.mesure1 == "green"){
                                        document.getElementById("disponibilites").innerHTML += "<li> Médiations restauratives</li>"
                                    } 
                                    if (element.mesure2 == "green"){
                                        document.getElementById("disponibilites").innerHTML += "<li> Rencontres détenus / condamnés-victimes</li>"
                                    }
                                    if (element.mesure3 == "green"){
                                        document.getElementById("disponibilites").innerHTML += "<li> Cercle de soutien</li>"
                                    }
                                    getAdminTextMap(code_clique);
                                    <?php if($_SESSION["modif"]=="1"): ?>
                                    document.getElementById('changer_disponibilités').style.display="flex"; 
                                    document.getElementById('code').innerHTML = element.code; 
                                    <?php endif; ?>
                                }
                            })
                        });
                    } 
                }).addTo(map);

                /*--------------------------------------------------------------------------------------------------------------------------------------------------*/
                /*                                                      Création layers selon les mesures (filtres)                                                 */
                /*--------------------------------------------------------------------------------------------------------------------------------------------------*/
                // Fonction onEachFeature pour afficher les informations des départements (appelée sur chaque layer)
                function onEachFeature(feature, layer) {
                layer.on('click', function(e) {
                    var code_clique = feature.properties.code;
                    fetch('map/get-data.php')
                        .then(function(response) {
                            return response.json();
                        })
                        .then(function(data) {

                            data.forEach(function(element) {
                                if (element.code == code_clique) {
                                    document.getElementById("infos-departement").style.visibility="visible";
                                    document.getElementById("disponibilites").innerHTML = "Aucune mesure disponible";
                                    if (element.mesure1 == "green" || element.mesure2 == "green" || element.mesure3 == "green") {
                                        document.getElementById("disponibilites").innerHTML = "";
                                    } 
                                    if (element.mesure1 == "green"){
                                        document.getElementById("disponibilites").innerHTML += "<li> Médiations restauratives</li>"
                                    }
                                    if (element.mesure2 == "green"){
                                        document.getElementById("disponibilites").innerHTML += "<li> Rencontres détenus / condamnés-victimes</li>"
                                    }
                                    if (element.mesure3 == "green"){
                                        document.getElementById("disponibilites").innerHTML += "<li> Cercle de soutien</li>"
                                    }
                                    getAdminTextMap(code_clique);
                                    <?php if($_SESSION["modif"]=="1"): ?>
                                    document.getElementById('changer_disponibilités').style.display="flex"; 
                                    document.getElementById('code').innerHTML = element.code; 
                                    <?php endif; ?>
                                }
                            });
                        })
                        .catch(function(error) {
                            console.error('Erreur lors de la récupération des données', error);
                        });
                    });
                }

                /*---------------------------------------------------------------------------------------------------------------------------*/

                // Création des layers supplémentaires (cachés par défaut)

                //définition des variables
                var initialLayer;
                initialLayer = geojsonLayer;  
                var layer1;
                var layer2;
                var layer3;

                //requête fetch pour aller récupérer les données du fichier json
                fetch('map/get-data.php')
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) { 
                    //même compteur pour les tab que plus haut dans le code donc on le remet à 0 
                    count = 0; 
                    //on remplit chaque tableau avec les données souhaitées 
                    data.forEach(function(element) {
                        tab_initial[count] = element.statut;
                        tab_mesure1[count] = element.mesure1;
                        tab_mesure2[count] = element.mesure2;
                        tab_mesure3[count] = element.mesure3;
                        count++;
                    });

                    //layer initial (selon programmes)
                    var initialLayer = L.geoJSON.ajax('https://france-geojson.gregoiredavid.fr/repo/departements.geojson', {
                        onEachFeature: onEachFeature,
                        style: function(feature) {
                            var departementIndex = parseInt(feature.properties.code, 10);

                            if (feature.properties.code=="2A") {
                                return {
                                    fillColor: tab_initial[19],
                                    color: 'white',
                                    weight: 1,
                                    fillOpacity: 0.5
                                };
                            }
                            if (feature.properties.code=="2B") {
                                return {
                                    fillColor: tab[20],
                                    color: 'white',
                                    weight: 1,
                                    fillOpacity: 0.5
                                };
                            }

                            if (departementIndex >= 0 && departementIndex < tab_initial.length) {
                                if (departementIndex<=19) {
                                    departementIndex--;
                                }
                                var color = tab_initial[departementIndex];    
                                return {
                                    fillColor: color,
                                    color: 'white',
                                    weight: 1,
                                    fillOpacity: 0.5
                                };
                            }

                            return {
                            color: 'grey',
                            weight: 1,
                            fillOpacity: 0.5
                            };
                        }
                    });

                    //initialisation du premier layer (selon mesure 1)
                    var layer1 = L.geoJSON.ajax('https://france-geojson.gregoiredavid.fr/repo/departements.geojson', {
                        onEachFeature: onEachFeature,
                        style: function(feature) {
                            var departementIndex = parseInt(feature.properties.code, 10);

                            if (feature.properties.code=="2A") {
                                return {
                                    fillColor: tab_mesure1[19],
                                    color: 'white',
                                    weight: 1,
                                    fillOpacity: 0.5
                                };
                            }
                            if (feature.properties.code=="2B") {
                                return {
                                    fillColor: tab_mesure1[20],
                                    color: 'white',
                                    weight: 1,
                                    fillOpacity: 0.5
                                };
                            }

                            if (departementIndex >= 0 && departementIndex < tab_mesure1.length) {
                                if (departementIndex<=19) {
                                    departementIndex--;
                                }
                                var color = tab_mesure1[departementIndex];    
                                return {
                                    fillColor: color,
                                    color: 'white',
                                    weight: 1,
                                    fillOpacity: 0.5
                                };
                            }

                            return {
                            color: 'grey',
                            weight: 1,
                            fillOpacity: 0.5
                            };
                        }
                    });

                    //initialisation du second layer (selon mesure 2)
                    var layer2 = L.geoJSON.ajax('https://france-geojson.gregoiredavid.fr/repo/departements.geojson', {
                        onEachFeature: onEachFeature,
                        style: function(feature) {
                            var departementIndex = parseInt(feature.properties.code, 10);

                            if (feature.properties.code=="2A") {
                                return {
                                    fillColor: tab_mesure2[19],
                                    color: 'white',
                                    weight: 1,
                                    fillOpacity: 0.5
                                };
                            }
                            if (feature.properties.code=="2B") {
                                return {
                                    fillColor: tab_mesure2[20],
                                    color: 'white',
                                    weight: 1,
                                    fillOpacity: 0.5
                                };
                            }

                            if (departementIndex >= 0 && departementIndex < tab_mesure2.length) {
                                if (departementIndex<=19) {
                                    departementIndex--;
                                }
                                var color = tab_mesure2[departementIndex];    
                                return {
                                    fillColor: color,
                                    color: 'white',
                                    weight: 1,
                                    fillOpacity: 0.5
                                };
                            }

                            return {
                            color: 'grey',
                            weight: 1,
                            fillOpacity: 0.5
                            };
                        }
                    });

                    //initialisation du troisième layer (selon mesure 3)
                    var layer3 = L.geoJSON.ajax('https://france-geojson.gregoiredavid.fr/repo/departements.geojson', {
                        onEachFeature: onEachFeature,
                        style: function(feature) {
                            var departementIndex = parseInt(feature.properties.code, 10);

                            if (feature.properties.code=="2A") {
                                return {
                                    fillColor: tab_mesure3[19],
                                    color: 'white',
                                    weight: 1,
                                    fillOpacity: 0.5
                                };
                            }
                            if (feature.properties.code=="2B") {
                                return {
                                    fillColor: tab_mesure3[20],
                                    color: 'white',
                                    weight: 1,
                                    fillOpacity: 0.5
                                };
                            }

                            if (departementIndex >= 0 && departementIndex < tab_mesure3.length) {
                                if (departementIndex<=19) {
                                    departementIndex--;
                                }
                                var color = tab_mesure3[departementIndex];    
                                return {
                                    fillColor: color,
                                    color: 'white',
                                    weight: 1,
                                    fillOpacity: 0.5
                                };
                            }

                            return {
                            color: 'grey',
                            weight: 1,
                            fillOpacity: 0.5
                            };
                        }
                    });


                    // Fonction pour basculer entre les couches
                    function switchLayer(layer, titre) {
                        document.getElementById("select-btn-filtres").classList.remove('open');
                        document.getElementById("titre-filtre").innerHTML=titre;
                        map.eachLayer(function(lyr) {
                            if (lyr !== geojsonLayer && lyr !== map._layers[Object.keys(map._layers)[0]]) {
                                map.removeLayer(lyr);
                            }
                        });
                        layer.addTo(map);
                    }


                    // Appel de la fonction switchLayer quand on filtre selon mesures 
                    var mesure1 = document.getElementById("mesure1");
                    mesure1.addEventListener("click", function() {
                        switchLayer(layer1, "Médiations restauratives");
                        document.getElementById('filtre').innerHTML = "mesure1";
                    });

                    var mesure2 = document.getElementById("mesure2");
                    mesure2.addEventListener("click", function() {
                        switchLayer(layer2, "Rencontres détenus/condamnés-victimes");
                        document.getElementById('filtre').innerHTML = "mesure2";
                    });

                    var mesure3 = document.getElementById("mesure3");
                    mesure3.addEventListener("click", function() {
                        switchLayer(layer3, "Cercle de soutien");
                        document.getElementById('filtre').innerHTML = "mesure3";
                    });

                    var original = document.getElementById("original");
                    original.addEventListener("click", function() {
                        switchLayer(initialLayer, "Aucun Filtre");
                        document.getElementById('filtre').innerHTML = "statut";
                    });

                    })
                    .catch(function(error) {
                        console.error('Erreur lors de la récupération des données', error);
                    });

                })
                .catch(function(error) {
                    console.error('Erreur lors de la récupération des données', error);
                });

                //fonction admin pour changer couleurs map 
                function changement(couleur,filtre) {
                    var codeDep = document.getElementById('code').innerHTML; 
                    let data = {
                    code: codeDep,
                    filtre : filtre,
                    statut: couleur
                    };
                    
                    fetch('map/update_data.php', {
                        method: 'POST',
                        headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'data=' + encodeURIComponent(JSON.stringify(data))
                    })
                    .then(function(response) {
                        console.log('Les données ont été mises à jour');
                        document.getElementById('confirmation').innerHTML = "Les modifications ont été apportées"
                    })
                    .catch(function(error) {
                        console.error('Erreur lors de la mise à jour', error);
                    });
                }

            </script>
            <script src="map/map.js"></script>
            <script>
            //load les infos de la page depuis le json
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
            function getAdminTextMap(code) {
                var admin_text; 
                fetch('content/get_admin_text_map.php')
                .then(function(response) {
                return response.json();
                })
                .then(function(data) {
                data.forEach(function(item) {
                    if (item.code === code.toString()) {
                        admin_text = item.contact;
                        var div = document.getElementById("text8");
                        if (div) {
                            div.innerHTML = admin_text;
                        }
                    }
                });
                })
                .catch(function(error) {
                console.error('Erreur lors de la récupération des données', error);
                });
            }
            </script>
            
        </div>
        

        <!--FOOTER-->
    </div>
</body>
<?php
  if ($_SESSION["modif"]=="1") {
    echo "<script>
            var tab1=document.getElementsByClassName('btn-edit');
            for (var i = 0; i < tab1.length; i++) {
              tab1[i].style.display='block';
            }
          </script>";
      echo "<input class='btn-disconnect' type='submit' onclick=\"location.href = 'admin/deconnexion.php'\" value='Déconnexion'>";
  }
?>
<?php if($_SESSION["modif"]=="1"): ?>
<script type="text/javascript" src="content/modifs.js"></script>
<?php endif; ?>
</html>
