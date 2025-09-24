<?php
require_once "Database.php";

class User {
    private $pdo;

    public function __construct(){
        $db = new Database("localhost","fadlanserver","root","");
        $this->pdo = $db->getConnection();
       
    }

    public function Create($username,$email,$password,$role = null){
        try{
            $sql = "INSERT INTO users(username,email,password,role) VALUES(:username,:email,:password,:role)";
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $hash);
            $stmt->bindParam(":role", $role);
            return $stmt->execute();
        }catch(PDOException $e){
            echo "Data Gagal di tambahkan, silahkan coba lagi :" . $e->getMessage();
        }
    }

    public function Read($id_users = null, $username = null){
        if($id_users !== null){
            try{
                $sql = "SELECT * FROM users WHERE id_users = :id_users";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['id_users' => $id_users]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
                
            }catch(PDOException $e){
                echo "Data Gagal di ambil, silahkan coba lagi :" . $e->getMessage();
            }
        }elseif($username !== null){
            try{
                $sql = "SELECT * FROM users WHERE username = :username";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['username' => $username]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo "Data Gagal di ambil, silahkan coba lagi :" . $e->getMessage();
            }
        }else{
            try{
                $sql = "SELECT * FROM users";
                $stmt = $this->pdo->query($sql);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo "Data Gagal di ambil, silahkan coba lagi :" . $e->getMessage();
            }
        }
    }

    public function Update($id_users,$username,$email,$password,$role){
        try{
            $sql = "UPDATE users SET username = :username ,email = :email ,password = :password,role = :role WHERE id_users = :id_users";
            $stmt = $this->pdo->prepare($sql);
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt-> bindParam(':id_users',$id_users);
            $stmt-> bindParam(':username',$username);
            $stmt-> bindParam(':email',$email);
            $stmt-> bindParam(':password',$hash);
            $stmt-> bindParam(':role',$role);
            return $stmt->execute();
        }catch(PDOException $e){
            echo "Data Gagal di Update, silahkan coba lagi :" . $e->getMessage();
        }

    }

    public function Delete($id_users){
        try{
            $sql = "DELETE FROM users WHERE id_users = :id_users";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_users',$id_users);
            return $stmt->execute();
        }catch(PDOException $e){
            echo "Data Gagal di Hapus, silahkan coba lagi :" . $e->getMessage();
        }
    }
}
?>