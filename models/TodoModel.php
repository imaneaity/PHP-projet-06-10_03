<?php

include_once $_SERVER['DOCUMENT_ROOT']."/TODO/models/DB.php";

class TodoModel extends DB
{
    private $contenu;
    private $auteurId;
    private $id;

    function __construct($todo , $auteurId)
    {
        parent::__construct();
        $this->contenu = $todo;
        $this->auteurId = $auteurId;
    }

    function addTodo(){
        //définir la requete
        $stmt= $this-> getConnect() ->prepare("INSERT INTO todos(contenu, auteurID) VALUES (?,?)");
        $stmt -> bindParam(1, $this->contenu);
        $stmt -> bindParam(2, $this->auteurId);

        //executer le request
        $stmt->execute();

        //recuperer le id afin de l'utiliser dans l'objet
        $this->id = $this -> getConnect() ->lastInsertId();

        //recuperer l'objet ajouté
        return $this->fetch();
    }


    function fetch(){
        $stmt = $this ->getConnect() -> prepare("SELECT * FROM todos WHERE id=?");
        $stmt->bindParam(1, $this->id);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    static function fetchAll($id){
        $connect = DB::getConnection();
        $stmt= $connect->getConnect() ->prepare('SELECT * FROM todos WHERE auteurID = ? ');
        $stmt->bindParam(1 , $id);
        $res = $stmt ->execute();
        $userFromDB = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $userFromDB;
    }


    static function updateIsDone($id){
        $active = true;
        $connect = DB::getConnection();
        $stmt= $connect->getConnect() ->prepare('UPDATE todos SET isDone= ? WHERE id =? ');
        $stmt->bindParam(1 , $active);
        $stmt->bindParam(2 , $id);
        $stmt ->execute();

    }


    static function removeTodo($id){
        $connect = DB::getConnection();
        $stmt= $connect->getConnect() ->prepare('DELETE FROM todos WHERE id = ? ');
        $stmt->bindParam(1 , $id);
        $stmt ->execute();

    }




}
