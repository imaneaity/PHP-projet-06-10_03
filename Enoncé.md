# Road map

On va créer une todo liste avec un système d'authentification.

## Base de donnée

Table: users: id, email, password, avatarURL, role 

Table: todos: id, contenu, date, isDone, auteurID 

## Page login

- Un formulaire pour s'inscrire 
- Script pour ajouter un user dans la base de données 

- formulaire de connection 
- script pour verifier si l'utilisateur a donné un email et password valide 
- Stocker les infos (id, email, avatar, role) quelque part: session 

- Mieux gerer les erreurs.

## Page Profil

- Afficher l'avatar de l'utilisateur, sinon afficher une image par défaut. 
- Un formulaire pour changer l'image de profil.
- Un script (/routes/uploadAvatar.php), enregistre l'image, et met a jour l'utilisateur dans la base de données.

Le todo: il faut TodoController, TodoModel.

- Un formulaire pour ajouter des taches. 
- script pour ajouter un todo dans la base données.

- afficher la liste des taches de l'utilisateur.
- Ajouter l'option pour valider une tache 
- Ajouter l'option pour supprimer une tache. 


