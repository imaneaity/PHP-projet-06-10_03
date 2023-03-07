<?php

include_once "../controllers/UserController.php";


//si le formulaire est validé par l'utilisateur
if (isset($_POST['email'] , $_POST['password'])){
    //instencier la classe user controller
    $user = new UserController($_POST['email'], $_POST['password']);

    $user->signupUser();
}