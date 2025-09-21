<?php
class Database {
    private $host;
    private $db;
    private $user;
    private $pass;
    private $pdo;

    public function __construct($host,$db,$user,$pass){
        $this->host = $host;
        $this->db   = $db;
        $this->user = $user;
        $this->pass = $pass;
        try{
            $dsn = "mysql:host={$host};dbname={$db}";
            $this->pdo = new PDO($dsn, $this->user,$this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        }catch (PDOException $e) {
            echo("Server sedang sibuk, mohon tunggu sebentar.: " . $e->getMessage());
        }
    }

    public function getConnection(){
        return $this->pdo;
    }
}
$db = new Database("localhost","fadlanserver","root","");
$pdo = $db->getConnection();
?>