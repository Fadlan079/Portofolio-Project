<?php
require_once "Database.php";

class Project {
    private $pdo;

    public function __construct(){
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function Createproject($title,$description,$image,$repo,$status){
        $sql = "INSERT INTO project(title,description,image,repo,status) 
        VALUES(:title, :description, ;image, :repo, :status)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":repo", $repo);
        $stmt->bindParam(":status", $status);
        return $stmt->execute();
    }

    public function Readproject(){
        $sql = "SELECT * FROM project";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Updateproject($id_project,$title,$description,$image,$repo,$status){
        $sql = "UPDATE project 
        SET title = :title, description = :description, image = :image, repo = :repo, status = :status WHERE id_project";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id_project", $id_project);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":repo", $repo);
        $stmt->bindParam(":status", $status);
    }

    public function Deleteproject($id_project){
        $sql = "DELETE FROM project WHERE id_project = :id_project";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id_project" , $id_project);
        return $stmt->execute();
    }
}
?>