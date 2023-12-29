<?php 
class User{
    private $nome;
    private $cognome;
    private $telefono;
    private $dataN;
    private $email;
    private $password;

    public function __construct($nome,$cognome,$dataN, $telefono, $email, $password) {
        $this->setNome($nome);
        $this->setCognome($cognome);
        $this->setDataN($dataN);
        $this->setTelefono($telefono);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getNome(){
        return $this->nome;
    }
    public function getCognome(){
        return $this->cognome;
    }
    public function getDataN(){
        return $this->dataN;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setCognome($cognome){
        $this->cognome = $cognome;
    }
    public function setDataN($dataN){
        $this->dataN = $dataN;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function setEmail($email){
       $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }

}


?>