<?php
require_once "connect.php";

if(isset($_GET['id_users'])){
    $id = (int)$_GET['id_users'];

    try{
        $del = $pdo->prepare("DELETE FROM users WHERE id_users = :id_users");
        $del->execute([
            'id_users' => $id
        ]);

        header("Location: ../admin/user-management.php?succses=deleted");
        exit;
    }catch(PDOException $e){
        echo("Query gagal: " . $e->getMessage());
    }
}else{
    echo "id tidak di temukan";
}
?>