<?php
session_start();
$message = "";
include "connect.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($kon, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($kon, "SELECT * FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password'])) { 
            $_SESSION['user'] = [
                'name' => $user['username'],
                'role' => $user['role']
            ];
            header("Location: /admin/dashboard.php");
            exit;
        } else {
            $message = "Email atau password salah*";
        }
    } else {
        $message = "Email atau password salah*";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Fadlan Server</title>
    <link href="/src/css/output.css" rel="stylesheet">
</head>
<body class="text-gray-300 bg-gray-900">
    <form method="post" class="bg-gray-800 grid grid-cols-1 gap-9 mt-15 m-auto p-6 w-150 rounded-xl shadow-lg shadow-emerald-900">
        <h2 class="font-bold m-auto text-2xl text-emerald-400 tracking-wide">Login Pengelola Proyek</h2>
        <hr class="border-2 border-emerald-500 rounded-2xl opacity-50">
        <?php if($message): ?>
            <div class="relative bg-gray-700 mb-4 p-3 rounded-lg">
                <div class="absolute inset-y-0 left-0 w-3 rounded-l-lg  bg-red-500"></div>
                <p class="ml-3 text-red-500 font-bold tracking-wide"><?php echo $message; ?></p>
            </div>
        <?php endif; ?>
        <label class="font-bold mb-2">Email:</label>
        <input class="bg-gray-700 px-4 py-2 border-2 border-orange-500 text-gray-200 rounded-xl focus:outline-none focus:border-emerald-500" type="email" name="email" required placeholder="example@gmail.com">
        <label class="font-bold mb-2">Password:</label>
        <input class="bg-gray-700 px-4 py-2 border-2 border-orange-500 text-gray-200 rounded-xl focus:outline-none focus:border-emerald-500 " type="password" name="password"  required placeholder="8-16 karakter: huruf, angka, simbol" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,16}" title="Password harus 8-16 karakter, minimal 1 huruf besar, 1 huruf kecil, 1 angka, 1 simbol">
        <input class="tracking-wide bg-orange-500 p-3 rounded font-bold text-xl hover:bg-emerald-500 hover:text-gray-900  hover:-translate-y-1 shadow-xl hover:shadow-3xl transsition-all duration-300" type="submit" value="Submit">
        <a class="underline" href="Create.php">belum punya akun? daftar sekarang Sign in</a>
    </form>
</body>
</html>