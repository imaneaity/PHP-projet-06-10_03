<?php

declare(strict_types=1);

include_once $_SERVER['DOCUMENT_ROOT']."/TODO/models/DB.php";

class UserModel extends DB
{
    private $email;
    private $password; 
     

    function __construct($email, $password)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }

    function addToDB()
    {
        $stmt = $this-> getConnect() -> prepare('INSERT INTO users( email, password) 
        VALUES (?, ?) ');

        $stmt->bindParam(1, $this->email);
        $stmt->bindParam(2, $this->password);
        $stmt ->execute();
    }
}
