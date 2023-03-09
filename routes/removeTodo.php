<?php
session_start();

include_once "../controllers/UserController.php";

//créer l'utilisateur à partir de l'id
$user= UserController::createUserFromId($_SESSION['id']);

//suprimer la tache via le usercontroller
$user->removeTodo($_GET['remove']);

//redirection
header('Location: /TODO/profil.php');




?>