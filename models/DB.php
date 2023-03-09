<?php

declare(strict_types=1);



class DB
{
    private $connect;
    function __construct()
    {
        // connexion à la base de données Mysql avec l'invocation de pilote
        $dsn= 'mysql:dbname=todo;host=localhost';
        $user = 'root';
        $password= '';
        $this->connect = new PDO($dsn, $user, $password);
    }

    

    /**
     * Get the value of connect
     */ 
    public function getConnect()
    {
        return $this->connect;
    }

    static function getConnection(){ //static car je ne veut pas changer cette fonction
        return new self();
    }
}
