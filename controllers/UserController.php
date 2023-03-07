<?php

declare(strict_types=1);


include_once $_SERVER['DOCUMENT_ROOT']."/TODO/models/UserModel.php";

class UserController
{
    private $email;
    private $password;
    private $id;


    function __construct(string $email, string $password)
    { 
        $this->email= $email;
        $this->password = $password;
    }

    function signupUser(){
        //sauvgarde des informations dans la base de données
        $userModel= new UserModel($this->email, $this->password);
        $userModel->addToDB();
        var_dump($this->email);

    }
}
