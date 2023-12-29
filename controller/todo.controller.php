<?php 
require_once './../model/User.class.php';
require_once './login.controller.php';
require_once './db.controller.php';
session_start();


$create = 'INSERT INTO Todo(`descrizione`,`emailFK`) VALUES(:descrizione, :emailFK)';
$delete = 'DELETE FROM Todo WHERE idTodo = :idTodo';
$update = 'UPDATE Todo SET descrizione= :descrizione WHERE idTodo = :idTodo';
$updateState = 'UPDATE Todo SET stato= :stato WHERE idTodo = :idTodo';

    switch($_POST["action"]){
        case 'create' : {
            try {
                $descrizione = $_POST['descrizione'];
                $stm = $db->prepare($create);
                $stm->bindValue(':descrizione',$descrizione);
                $stm->bindValue(':emailFK',$_SESSION['user']->getEmail());
                $stm->execute();
                header('Location: ' . $_ENV['url'] . '/project/01/layout/todo.template.php');
            } catch (PDOException $e) {
                echo $e;
            }
        }break;
        case 'updateStato' : {
            $idTodo =  $_GET['id'];
            $stato =  $_GET['stato'];
            ($stato)? $stato = 0 : $stato = 1;
            $stm = $db->prepare($updateState);
            $stm->bindValue(':stato',$stato);
            $stm->bindValue(':idTodo',$idTodo);
            $stm->execute();
            header('Location: ' . $_ENV['url'] . '/project/01/layout/todo.template.php');
        }break;
        case 'delete' : {
            $idTodo =  $_GET['id'];
            $stm = $db->prepare($delete);
            $stm->bindValue(':idTodo',$idTodo);
            $stm->execute();
            header('Location: ' . $_ENV['url'] . '/project/01/layout/todo.template.php');
        }break;
        case 'update' : {
            $idTodo = $_POST['id'];
            $descrizione = $_POST['descrizione'];
            $stm = $db->prepare($update);
            $stm->bindValue(':idTodo', $idTodo);
            $stm->bindValue(':descrizione', $descrizione);
            $stm->execute();
            header('Location: ' . $_ENV['url'] . '/project/01/layout/todo.template.php');
        }break;
    }


?>