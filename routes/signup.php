<?php

include_once "../controllers/UserController.php";


//si le formulaire est validé par l'utilisateur
if (isset($_POST['email'] , $_POST['password'])){
    //instencier la classe user controller
    $user = new UserController($_POST['email'], $_POST['password']);

    //tester si l'utilisateur est déja inscrit et s'il a saisit un bon mail
    if($user->isDataValid()){//teste si les formats sont respectés
        //verif si l'utilisateur existe déjà
        if($user->exist()){
            header('Location: /TODO/login.php?inscription=error&emailError=EmailExist');
            die();
        }
        $user->signupUser();
        header('Location: /TODO/login.php');

    }
    else{ //cas ou l'email ou le mdp ne sont pas valides
        $returnData= $user->getErrors();
        header('Location: /TODO/login.php?inscription=error&'.$returnData);
    }

}else{ //cas ou le formulaire a beugé lors de l'envoie
    header('Location: /TODO/login.php');
}


