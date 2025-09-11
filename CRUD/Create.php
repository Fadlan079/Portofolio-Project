<?php
session_start();
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $hash = password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email,username,password)
            VALUES ('$email', '$username', '$hash')";
          
          
    if (mysqli_query($kon, $sql)) {
        $user_id = mysqli_insert_id($kon);
        $result = mysqli_query($kon, "SELECT * FROM users WHERE id_users=$user_id");
        $user = mysqli_fetch_assoc($result); 

        $_SESSION['user'] = [
            "name" => $user['username'],
            "role" => $user['role']
        ];
        header("Location:/admin/dashboard.php?success=1");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign in - Fadlan Server</title>
    <link href="/src/css/output.css" rel="stylesheet">
</head>
<body class="text-gray-300 bg-gray-900">
    <form method="post" class="bg-gray-800 grid grid-cols-1 gap-9 m-auto p-6 w-150 rounded-xl shadow-lg shadow-emerald-900">
        <h2 class="font-bold m-auto text-2xl text-emerald-400 tracking-wide">Signin Pengelola Proyek</h2>
        <hr class="border-2 border-emerald-500 rounded-2xl opacity-50">
        <label class="font-bold mb-2">Email:</label>
        <input class="bg-gray-700 px-4 py-2 border-2 border-orange-500 text-gray-200 rounded-xl focus:outline-none focus:border-emerald-500" type="email" name="email" required placeholder="example@gmail.com">
        <label class="font-bold mb-2">Username:</label>
        <input class="bg-gray-700 px-4 py-2 border-2 border-orange-500 text-gray-200 rounded-xl focus:outline-none focus:border-emerald-500 " type="text" name="username"  required placeholder="Contoh:Fadlan">
        <label class="font-bold mb-2">Password:</label>
        <input class="bg-gray-700 px-4 py-2 border-2 border-orange-500 text-gray-200 rounded-xl focus:outline-none focus:border-emerald-500 " type="password" name="password"  required placeholder="8-16 karakter: huruf, angka, simbol" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,16}" title="Password harus 8-16 karakter, minimal 1 huruf besar, 1 huruf kecil, 1 angka, 1 simbol">
        <input class="tracking-wide bg-orange-500 p-3 rounded font-bold text-xl hover:bg-emerald-500 hover:text-gray-900  hover:-translate-y-1 shadow-xl hover:shadow-3xl transsition-all duration-300" type="submit" value="Submit">
        <a class="underline" href="Read.php">Sudah punya akun? Login Sekarang</a>
    </form>
</body>
</html>