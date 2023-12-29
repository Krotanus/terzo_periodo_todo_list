<?php 
session_start();
require_once './db.controller.php';
require_once './../environment/env.php';
require_once './../model/User.class.php';

/**Questo controller gestisce il signin e il login di un utente all'interno dell'applicazione */

if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case 'login': {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = 'SELECT password FROM Authentication WHERE email = :email';
            $stm = $db->prepare($query);
            $stm->bindValue(':email', $email);
            $stm->execute();
          
            while ($row = $stm->fetch()) {
            $password_hash = $row['password'];
            }      
            $test_verify = password_verify($password, $password_hash);
            if($test_verify){
                $query = 'SELECT nome, cognome, dataN, telefono FROM User WHERE emailFK = :email';
                $stm = $db->prepare($query);
                $stm->bindValue(':email', $email);
                $stm->execute();
                while($row = $stm->fetch()){
                    $user = new User($row['nome'],$row['cognome'],$row['dataN'],$row['telefono'],$email,$password);
                }
                $_SESSION['user'] = $user;
                $db = null;
                header('Location: '.$_ENV['url'].'/project/01/layout/todo.template.php');   
            }else{
                $msg = "Nome utente o password errate!";
                $db = null;
                require_once './../layout/login.template.php';    
            }}break; //end login
        case 'signin': {
            //prelevo dal form gli elementi di interesse
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $password = $_POST['password'];
            $dataN = $_POST['dataN'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            //creo la query di popolamento della tabella contentente email e password
            $query = 'INSERT INTO Authentication(`email`,`password`) VALUES (:email, :password)';
            $stm = $db->prepare($query);
            $stm->bindValue(':email', $email);
            //cifro la password con un algoritmo di hashing SHA226
            $password_hash = password_hash($password,PASSWORD_BCRYPT);
            $stm->bindValue(':password', $password_hash);
            $stm->execute();
            //creo la query di popolamento della tabella contentente dati dell'utente
            $query = 'INSERT INTO User(`nome`,`cognome`, `dataN`, `emailFK`, `telefono`) VALUES (:nome, :cognome, :dataN, :emailFK, :telefono)';
            $stm = $db->prepare($query);
            $stm->bindValue(':nome', $nome);
            $stm->bindValue(':cognome', $cognome);
            $stm->bindValue(':dataN', $dataN);
            $stm->bindValue(':emailFK', $email);
            $stm->bindValue(':telefono', $telefono);
            $stm->execute();
            $db = null;
            header('Location: '.$_ENV['url'].'/project/01/layout/login.template.php');   
            }break; //end signin
           
        
    }
}


?>