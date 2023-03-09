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


    function fetch(): array{
        //déclarer la requete sql
        $stmt = $this-> getConnect() -> prepare('SELECT * FROM users WHERE email=?');

        //ajout du parametre
        $stmt->bindParam(1, $this->email);

        //executer la requete
        $res= $stmt->execute();

        //recuperer les informations retournées par la requete
        $userFromDB = $stmt ->fetch(PDO::FETCH_ASSOC); //[email: imane@gmail.Com, password: mdp ]

        //si la requete ne retourne rien 0
        if(is_bool($userFromDB)){ // retourne vrai si c'est un booléen
            return [];
        }
        return $userFromDB;

    }



    static function fetchByID($id){
        $connect = DB::getConnection();
        $stmt= $connect->getConnect() ->prepare('SELECT * FROM users WHERE id =?');
        $stmt->bindParam(1 , $id);
        $res = $stmt ->execute();
        $userFromDB = $stmt->fetch(PDO::FETCH_ASSOC);
        return $userFromDB;
    }

    function saveImageToDB($image){
        $stmt= $this->getConnect() ->prepare('UPDATE users SET avatarURL=? WHERE email=?');
        $stmt->bindParam(1 , $image);
        $stmt->bindParam(2 , $this->email);
        $stmt->execute();
        //pas de fetch car il n y a pas de résultat à recuperer
    }
}
