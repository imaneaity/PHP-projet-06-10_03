<?php

//lancer la session
session_start();

//include...
include_once $_SERVER['DOCUMENT_ROOT']."/TODO/controllers/UserController.php";

//verif si le formulaire est rempli isset() sinon fermer la session
if(!(isset($_POST['email'], $_POST['password']))){ // si le formulaire a une erreur d'envoie

    //alors fermer la session et rediriger la page
    header("Location: /login.php");
    die(); // instruction qui ferme la session
}

//instencier le UserController
$user = new UserController($_POST['email'], $_POST['password']);

// tester si les données sont valides sinon lever une erreur et fermer la session.
if(!($user->isDataValid())){
    header("Location: ../login.php?connexion=error&".$user->getErrors());
    die();
}

//verif si l'utilisateur existe sinon fermer la session
if(!($user->exist())){
    header("Location: ../login.php?connexion=error&emailError=EmailDoesntExist");
    die();
}

//verif si le mdp est correct
if(!$user -> isPasswordCorrect()){
    header("Location: ../login.php?connexion=error&passwordError=PasswordIncorrect");
    die();
}

//Démarrer ma session
echo "session démarrée";

$_SESSION["email"] = $user ->getEmail();
$_SESSION["id"] = $user->getId();
$_SESSION["avatarURL"] = $user->getAvatarURL();
$_SESSION["role"] = $user->getRole(); 


header('Location: /TODO/profil.php');

?>