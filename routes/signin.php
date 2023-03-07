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

//TODO: tester si les données sont valides sinon lever une erreur.

//verif si l'utilisateur existe sinon fermer la session
if(!($user->exist())){
    header("Location: /login.php?connexion=error&passwordError=PasswordIncorrect");
    die;
}

//verif si le mdp est correct


//Démarrer ma session