<?php
$host="localhost";
$user="root";
$password="";
$db="login";

$kon =mysqli_connect($host,$user,$password,$db);
if (!$kon){
    die("koneksi gagal:".mysqli_connect_error());
}
// cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $telp = $_POST['telp'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO datalog (email, username, telp, pass) 
            VALUES ('$email', '$username', '$telp', '$pass')";
    if (mysqli_query($kon, $sql)) {
        echo "Data berhasil ditambahkan!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($kon);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Tambah Data Login User</h2>
    <form method="post">
        Email: <input type="email" name="email" required><br><br>
        Username: <input type="text" name="username" required><br><br>
        No HP: <input type="tel" name="telp"></input><br><br>
        Password: <input type="password" name="pass" required><br><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>