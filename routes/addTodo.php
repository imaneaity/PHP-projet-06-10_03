<?php
session_start();
include_once "../controllers/UserController.php";

if(isset($_POST['todo']))
{
    //créer l'utilisateur à partir de l'id
    $user = UserController::createUserFromId($_SESSION['id']);

    ////ajouter la todo à la bd
    $user->addTodo($_POST['todo']);
}

//redirection vers profil
header('Location: /TODO/profil.php');
?>