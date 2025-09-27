<?php
require_once "Model/user.php";
$user = new User();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user->Create(
        $username = $_POST['username'],
        $email = $_POST['email'],
        $password = $_POST['password'],
    );

    header("Location:index.php?success=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Fadlan Server</title>
    <link rel="stylesheet" href="src/css/output.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body class="bg-gradient-to-r from-neutral-950 via-neutral-900 to-emerald-900 p-2">
    <div id="form" class="fixed z-100 inset-0 bg-neutral-950/30 backdrop-blur-2xl transition-all duration-300">
        <form action="register.php" method="POST" class="grid grid-cols-1 bg-neutral-950/50 backdrop-blur-lg gap-10 p-5 m-auto mt-20 relative z-100 max-w-xl rounded-lg shadow-xl border border-neutral-700 text-neutral-300 font-bold">
            <h2 class="text-2xl">Register</h2>
            <input type="text" name="username" placeholder="Username..." required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2">
            <input type="text" name="email" placeholder="Email..." required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2">
            <div class="w-full relative">
                <input id="pass" type="password" name="password" placeholder="Password..." required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2 w-full">
                <i id="eye" class="fa-solid fa-eye absolute p-2 top-1 right-6"></i>
            </div>
            <div class="grid grid-cols-2 gap-5 text-center">
                <input type="submit" value="Register" class="col-span-2 bg-orange-500 text-neutral-200 p-2 rounded-lg hover:bg-emerald-500 hover:text-neutral-900 transition-all duration-300">
                <hr class="border border-emerald-500 rounded-full">
                <hr class="border border-emerald-500 rounded-full">
                <a href="index.php" class="col-span-2 block text-center text-neutral-400 underline text-xs">Sudah punya akun? <b class="text-neutral-200">Login</b></a>
                <a href="index.php" type="button" class="col-span-2 hover:underline hover:text-neutral-700 transition-all duration-300">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>