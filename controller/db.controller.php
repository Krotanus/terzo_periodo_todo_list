<?php 
$stato_connessione = 200;
$msg = 'Connection: success';
$db;
try {
    $user = "root";
    $pass = "";
    $db_url = 'mysql:host=localhost;dbname=Account';
    http_response_code($stato_connessione);
    header($msg);
    $db = new PDO($db_url, $user, $pass);
   
} catch (PDOException $e) {
    $stato_connessione = $e->getCode();
    http_response_code($stato_connessione);
    header('Connection : refused');
    header('Error message :' . $e->getMessage());
    $db = null;
}
?>