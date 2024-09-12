
function modif(id) {
    var div = document.getElementById("text" + id);
    //pour afficher les btn modifier  / enregistrer qu'un seul a la fois
    document.getElementById("btn-edit-" + id).setAttribute("onclick", "sauvegarde("+id+")");
    document.getElementById("btn-edit-" + id).innerHTML="Enregistrer";
    //texte devient modifiable
    div.contentEditable = true;
    // met directement le curseur sur le texte
    div.focus();
}

function modif_dates(id) {
    var div = document.getElementById("text" + id);
    //pour afficher les btn modifier  / enregistrer qu'un seul a la fois
    document.getElementById("btn-edit-" + id).setAttribute("onclick", "sauvegarde_dates("+id+")");
    document.getElementById("btn-edit-" + id).innerHTML="Enregistrer";
    //texte devient modifiable
    div.contentEditable = true;
    // met directement le curseur sur le texte
    div.focus();
}

function modif_map() {
    var code = document.getElementById('code').innerHTML; 
    //corse 
    if (code == '2A' || code == '2B'){
        code = '"'+code+'"';
    }
    var div = document.getElementById("text8");
    //pour afficher les btn modifier  / enregistrer qu'un seul a la fois
    document.getElementById("btn-edit-8").setAttribute("onclick", "sauvegarde_map("+code+")");
    document.getElementById("btn-edit-8").innerHTML="Enregistrer";
    //texte devient modifiable
    div.contentEditable = true;
    // met directement le curseur sur le texte
    div.focus();
}

function sauvegarde(id) {
    var div = document.getElementById("text" + id);
    document.getElementById("btn-edit-" + id).setAttribute("onclick", "modif("+id+")");
    document.getElementById("btn-edit-" + id).innerHTML="Modifier";
    // peut plus modifier le texte
    div.contentEditable = false;

    // recup du nouveau texte
    var admin_text = div.innerHTML.trim(); // Trim pour supprimer les espaces vides debut et fin du texte

    if (admin_text !== "") {
        //recup des donnees du fichier JSON
        fetch('content/get_admin_text.php')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            data.forEach(function(item) {
            if (item.id === id.toString()) {
                item.content = admin_text;
            }else if (item.id=="14"){
                //update la date de dernière mise à jour 
                var date = new Date();
                var tab_mois = [
                    "janvier", "février", "mars", "avril", "mai", "juin",
                    "juillet", "août", "septembre", "octobre", "novembre", "décembre"
                ];
            
                var annee = date.getFullYear();
                var mois = tab_mois[date.getMonth()];
            
                updatedText = "Dernière mise à jour : "+mois + " " + annee;
                item.content = updatedText; 
            }
            });

            // envoi des donnees au fichier update_admin_data.php
            fetch('content/update_admin_text.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
              },
            body: 'data=' + encodeURIComponent(JSON.stringify(data))
            })
            .then(function(response) {
                console.log('Les données ont été mises à jour');
            })
            .catch(function(error) {
                console.error('Erreur lors de la mise à jour', error);
            });
        })
        .catch(function(error) {
            console.error('Erreur lors de la récupération des données', error);
        });
    } else {
        console.error("Le texte administrateur n'est pas défini ou est vide.");
    }
    
}


function sauvegarde_dates(id) {
    //update la date de dernière mise à jour
    sauvegarde(1); 

    var div = document.getElementById("text" + id);
    document.getElementById("btn-edit-" + id).setAttribute("onclick", "modif("+id+")");
    document.getElementById("btn-edit-" + id).innerHTML="Modifier";
    // peut plus modifier le texte
    div.contentEditable = false;

    // recup du nouveau texte
    var admin_text = div.innerHTML.trim(); // Trim pour supprimer les espaces vides debut et fin du texte

    if (admin_text !== "") {
        //recup des donnees du fichier JSON
        fetch('content/get_dates.php')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            data.forEach(function(item) {
            if (item.id === id.toString()) {
                item.content = admin_text;
            }
            });

            // envoi des donnees au fichier update_dates.php
            fetch('content/update_dates.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
              },
            body: 'data=' + encodeURIComponent(JSON.stringify(data))
            })
            .then(function(response) {
                console.log('Les données ont été mises à jour');
            })
            .catch(function(error) {
                console.error('Erreur lors de la mise à jour', error);
            });
        })
        .catch(function(error) {
            console.error('Erreur lors de la récupération des données', error);
        });
    } else {
        console.error("Le texte administrateur n'est pas défini ou est vide.");
    }
}


function sauvegarde_map(code) {
    var div = document.getElementById("text8");
    document.getElementById("btn-edit-8").setAttribute("onclick", "modif_map()");
    document.getElementById("btn-edit-8").innerHTML="Modifier";
    // peut plus modifier le texte
    div.contentEditable = false;

    // recup du nouveau texte
    var admin_text = div.innerHTML; // Trim pour supprimer les espaces vides debut et fin du texte
    if (admin_text !== "") {
        //recup des donnees du fichier JSON
        fetch('content/get_admin_text_map.php')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            data.forEach(function(item) {
                if (item.code === (code < 10 ? '0' + code : code).toString()) {
                    item.contact = admin_text;
                }
            });
            // envoi des donnees au fichier update_admin_data_map.php
            fetch('content/update_admin_text_map.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
              },
            body: 'data=' + encodeURIComponent(JSON.stringify(data))
            })
            .then(function(response) {
                console.log('Les données ont été mises à jour');
            })
            .catch(function(error) {
                console.error('Erreur lors de la mise à jour', error);
            });
        })
        .catch(function(error) {
            console.error('Erreur lors de la récupération des données', error);
        });
    } else {
        console.error("Le texte administrateur n'est pas défini ou est vide.");
    }
}