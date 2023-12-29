<?php
/**
 * connessione restituita utilizando il design pattern singleton
 */
class Connector{

    private static $db = null;
    private $user = "root";
    private $pass = "";
    private $db_url = 'mysql:host=localhost;dbname=Account';


    function __construct(){
        // Costruttore privato per evitare l'istanza diretta
        try {
            self::$db = new PDO($this->db_url, $this->user, $this->pass);
        } catch (PDOException $e) {
            // Gestisci l'errore di connessione
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$db) {
            // Crea un'istanza solo se non esiste già
            new self();
        }
        return self::$db;
    }
}


?>