<?php

include_once $_SERVER['DOCUMENT_ROOT']."/TODO/models/TodoModel.php";

class TodoController
{
    private $auteurId;
    private $contenu;
    private $date;
    private $isDone;
    private $id;

    private $todoModel;

    function __construct($todo, $auteurId){
        $this->contenu = $todo;
        $this->auteurId = $auteurId;
        $this->todoModel = new TodoModel($todo, $this->auteurId);
    }

    function addTodo(){
        //ajouter une tache à la bd via le todoModel
        $todoTab= $this->todoModel ->addTodo();
        $this->date = $todoTab['date'];
        $this->id = $todoTab['id'];
        $this->isDone = $todoTab['isDone'];

    }



}
