# Justice Restaurative 
## Projet Web P2 S2

Pages web développées pour le site de l'institut français de la justice restaurative. 

L'une dédiée aux particuliers pour qu'ils puissent trouver les informations essentielles sur la justice restaurative
et avoir les coordonnéese de la personne dédiée sur leur département. Pour cela, il y a une carte de la France cliquable et divisée selon les départements,
une barre de recherche et un outil de filtrage selon différentes mesures. Lors d'un clic sur la carte ou d'une recherche dans la barre dédiée, les informations 
des personnes à contacter s'affichent ainsi que les disponibilités des mesures/programmes. 

L'autre est un espace de formation qui contient notamment un catalogue des formations et une page par formation. 
Ces dernières contiennent des informations, précisions, mais aussi les dates et villes de déroulement ainsi qu'un formulaire de contact. 

Vous pouvez également vous connecter en tant qu'admin, alors, la majeure partie du contenu devient modifiable. 
Vous pouvez aussi modifier la disponibilité d'une mesure sur la carte ou encore ajouter des formations et des dates. 

# Utilisation 

- téléchargez l'archive
- extraire l'archive
- ouvrez l'emplacement du dossier dans un terminal
- tapez la ligne suivante : php -S localhost:8080 
- ouvrez votre navigateur favori (CHROME)

Pour se rendre sur le site en tant qu'utilisateur : 
- tapez la ligne suivante : http://localhost:8080/ljr.php (pour accéder à la page d'informations)
- ou bien tapez la ligne suivante : http://localhost:8080/la-formation.php (pour accéder au catalogue de formations, les pages de chacunes des formations sont accessibles depuis celle-ci)

Pour se rendre sur le site en tant qu'administrateur : 
- tapez la ligne suivante : http://localhost:8080/admin/connexion.php (pour accéder à la page de connexion)
- connectez vous avec le login : admin et le mot de passe : admin
- une fois sur le menu, choisissez la page qui vous intéresse 
- déconnectez-vous pour voir le site tel un utilisateur
