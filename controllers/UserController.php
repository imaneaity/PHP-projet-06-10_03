<?php

declare(strict_types=1);



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
        var_dump($this->email);

    }
}
