<?php 
require_once __DIR__ .'/../model/User.class.php';
require_once __DIR__ .'/../model/Todo.class.php';
session_start();


function getToDos($db){
    $todos = [];
    $query = 'SELECT * FROM Todo WHERE emailFK = :emailFK';
    $stm = $db->prepare($query);
    $stm->bindValue(':emailFK', $_SESSION['user']->getEmail());
    $stm->execute();
    while($row = $stm->fetch()){
        array_push($todos,new Todo($row['idTodo'],$row['dateCreate'],$row['stato'],$row['descrizione']));
    }
    return $todos;
}



?>