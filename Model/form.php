<?php
require_once "Database.php";

class Form {
    private $pdo;
    
    public function __construct(){
        $db = new Database("localhost","fadlanserver","root","");
        $this->pdo = $db->getConnection();
       
    }

    public function Createform($nama,$email,$pesan){
        try{
            $sql = "INSERT INTO form(nama,email,pesan) VALUES(:nama,:email,:pesan)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":nama",$nama);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":pesan",$pesan);
            return $stmt->execute();
        }catch(PDOException $e){
            echo "Data Gagal di tambahkan, silahkan coba lagi :" . $e->getMessage();
        }
    }

    public function Readform(){
        $sql = "SELECT * FROM form";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Deleteform($id_form){
        $sql = "DELETE FROM form WHERE id_form = :id_form";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id_form", $id_form);
        return $stmt->execute();
    }
}
?>