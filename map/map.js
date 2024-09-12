
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/*                                                         partie droite de la div qui contient la map                                                          */
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------------------------------------------------------*/
/*recherche départements - recup données du json et identitifie les departements correspondants à la recherche dans l'input texte*/
/*-------------------------------------------------------------------------------------------------------------------------------*/

//recup les données de departement.json
fetch('map/get-data.php')
.then(function(response) {
    return response.json();
})
.then(function(data) {
    //traiter data à l'intérieur car requête asynchrone
    //recup recherche de l'user
    const searchInput = document.getElementById('searchInput_dep');

    //à chaque fois qu'il tappe une touche
    searchInput.addEventListener('keyup',function(){
        //les valeurs des touches
        const input = searchInput.value.toLowerCase();

        if (input !== '') {
            result = data.filter(item => {
                const nomDep = item.nom_departement.toLowerCase();
                //comparaison
                return input.split('').every((letter, index) => nomDep[index] === letter);
            });
        }else if (input.length === 0){
            document.getElementById('searchResults_dep').innerHTML = ''; // Supprimez les suggestions en effaçant le contenu de l'élément
            return;
        }
    

        let suggestion ="";

        if (result.length > 0) {
            //on affiche seulement les 3 premiers s'il y en a plus
            const limitedResult = result.slice(0, 3);
            limitedResult.forEach(resultItem =>
              suggestion += `
              <div class="suggestion" id="${resultItem.code}" onclick="affichage(this)" style="display: block;">${resultItem.nom_departement}</div>`
            );
        } else {
            suggestion = `<div class="suggestion">Aucun département trouvé</div>`;
        }
        document.getElementById('searchResults_dep').innerHTML = suggestion;
    })
})
.catch(function(error) {
    console.error('Erreur lors de la récupération des données', error);
});
/*-------------------------------------------------------------------------------------------------------------------------------*/



/*--------------------------------------------------------------------------------*/
/*afficher les infos quand clique sur un élément du select (recherche département)*/
/*--------------------------------------------------------------------------------*/

function affichage(element_param){
    fetch('map/get-data.php')
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        data.forEach(function(element) {
            if (element_param.id == element.code) {
                document.getElementById("infos-departement").style.visibility="visible";
                document.getElementById("disponibilites").innerHTML = "<ul>"; 
                if (element.mesure1 == "green"){
                    document.getElementById("disponibilites").innerHTML += "<li> Médiations restauratives</li>"
                } else if (element.mesure2 == "green"){
                    document.getElementById("disponibilites").innerHTML += "<li> Rencontres détenus/condamnés-victimes</li>"
                }else if (element.mesure3 == "green"){
                    document.getElementById("disponibilites").innerHTML += "<li> Cercle de soutien</li>"
                }else{
                    document.getElementById("disponibilites").innerHTML = "Aucune mesure disponible"
                }
                document.getElementById("disponibilites").innerHTML += "</ul>";

                //charger les infos depuis le json
                getAdminTextMap(element_param.id);

                //si connecté en admin affichage boutons modifier dispo d'un département 
                var admin = document.getElementById('admin').innerHTML; 
                if (admin == '1'){
                    document.getElementById('changer_disponibilités').style.display="flex"; 
                    document.getElementById('code').innerHTML = element.code; 
                }

                //enlève le menu déroulant avec les départements quand on clique sur celui choisit
                const elements = document.getElementsByClassName('suggestion');
                for (let i = 0; i < elements.length; i++) {
                    elements[i].style.display = 'none';
                }

                //on clear la barre de recherche
                const searchInput = document.getElementById('searchInput_dep');
                searchInput.value='';
            }
        });
    })
    .catch(function(error) {
        console.error('Erreur lors de la récupération des données', error);
    });
}
/*--------------------------------------------------------------------------------*/

