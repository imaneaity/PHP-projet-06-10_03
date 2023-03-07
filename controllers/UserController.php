<?php

declare(strict_types=1);


include_once $_SERVER['DOCUMENT_ROOT']."/TODO/models/UserModel.php";

class UserController
{
    private $email;
    private $password;
    private $id;



    private const MIN_PASSWORD_LENGTH =6;


    function __construct(string $email, string $password)
    { 
        $this->email= $email;
        $this->password = $password;
    }

    function isEmailValid():bool{
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    function isPasswordValid() : bool
    {
        return strlen($this->password) >= self::MIN_PASSWORD_LENGTH;
    }

    function isDataValid()
    {
        return $this->isEmailValid() && $this->isPasswordValid();
    }

    function signupUser(){
        //sauvgarde des informations dans la base de données
        $userModel= new UserModel($this->email, $this->password);
        $userModel->addToDB();
        var_dump($this->email);

    }



    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
