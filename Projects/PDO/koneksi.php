<?php 
$host = "localhost";
$db = "perpustakaan";
$user ="root";
$pass ="";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);   
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    // echo("koneksi berhasil");
}catch (PDOException $e){
    echo("koneksi gagal: " . $e->getMessage());
}
?>