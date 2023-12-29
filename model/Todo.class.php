<?php 

class Todo{
    private $idTodo;
    private $dateCreate;
    private $stato;
    private $descrizione;

    function __construct($idTodo,$dateCreate,$stato,$descrizione)
    {
        $this->setIdTodo($idTodo);
        $this->setDateCreate($dateCreate);
        $this->setStato($stato);
        $this->setDescrizione($descrizione);        
    }


    function getIdTodo(){
        return $this->idTodo;
    }
    function getDateCreate(){
        return $this->dateCreate;
    }
    function getStato(){
        return $this->stato;
    }
    function getDescrizione(){
        return $this->descrizione;
    }

    function setIdTodo($idTodo){
        $this->idTodo = $idTodo;
    }
    function setDateCreate($dateCreate){
        $this->dateCreate = $dateCreate;
    }
    function setStato($stato){
        $this->stato = $stato;
    }
    function setDescrizione($descrizione){
        $this->descrizione = $descrizione;
    }

}

?>