<?php
session_start();

include_once "../controllers/UserController.php";

//créer l'utilisateur à partir de l'id
$user= UserController::createUserFromId($_SESSION['id']);

//valider la tache vie le usercontroller
$user->validateTodo($_GET['validate']);

//redirection
header('Location: /TODO/profil.php');




?>