<?php
session_start();
require_once "connect.php";

try{
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $insert = $pdo->prepare("INSERT INTO users (email,username,password) VALUES (:email, :username, :password)");
        $insert->execute([
            'email' => $email,
            'username' => $username,
            'password' => $hash
        ]);

        $select = $pdo->prepare("SELECT * FROM users WHERE id_users = :id_users");
        $user = $select->fetch(PDO::FETCH_ASSOC);
        $role = $user['role'] ?? NULL;
        $id_users = $user['id_users'];
        $select->execute([
            'id_users' => $id_users
        ]);

        if($role == 'admin' || $role == 'superadmin'){    
            $_SESSION['users'] = [
                'name' => $user['username'],
                'role' => $user['role']
            ];
            header("Location:/admin/dashboard.php?success=1");
            exit;
        }else{
            header("Location:../../index.php?success=1");
            exit;
        }
    }
}catch (PDOException $e){
    echo("Query gagal: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - Fadlan Server</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="/src/css/output.css" rel="stylesheet">
    <style>
        .bg-carbon {
            background-color: #0a0a0a;
            background-image:
                linear-gradient(45deg, rgba(255,255,255,0.04) 25%, transparent 25%),
                linear-gradient(-45deg, rgba(255,255,255,0.04) 25%, transparent 25%),
                linear-gradient(45deg, transparent 75%, rgba(255,255,255,0.04) 75%),
                linear-gradient(-45deg, transparent 75%, rgba(255,255,255,0.04) 75%);
            background-size: 18px 18px;
            background-position: 0 0, 0 9px, 9px -9px, -9px 0px;
        }
    </style>
</head>
<body class="bg-neutral-950">
    <div class="flex justify-between h-screen">
        <div class="bg-neutral-950 rounded-r-2xl w-1/2">
            <div class="flex relative m-5" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">
                <a class="bg-emerald-500 text-neutral-900 p-1 m-px rounded-lg font-bold text-2xl"><i class="fa-solid fa-code"></i></a>
                <h3 class="text-neutral-200 font-bold p-1 m-px text-xl">Fadlan Server</h3>
            </div>
            <form action="Create.php" method="POST" class="max-w-xl m-auto grid grid-cols-2 p-5 gap-7 rounded-2xl bg-neutral-800/30 backdrop-blur-xl border border-neutral-700 shadow-lg shadow-emerald-900/30">
                <h2 class="col-span-2 font-bold mx-3 text-2xl text-emerald-500 tracking-wide">Selamat datang!</h2>
                <p class="col-span-2 font-bold text-neutral-200 tracking-wide mx-3">"Daftar sekarang untuk mengakses semua fitur."</p>
                <hr class="col-span-2 border border-emerald-500 rounded-full">
                <input class="bg-neutral-950 text-neutral-400 rounded-xl p-3 border border-neutral-800 focus:outline-none focus:border-emerald-500 transition-all duration-300" type="email" name="email" required placeholder="Email">
                <input class="bg-neutral-950 text-neutral-400 rounded-xl p-3 border border-neutral-800 focus:outline-none focus:border-emerald-500 transition-all duration-300" type="text" name="username"  required placeholder="Username">
                <div class="w-full relative col-span-2">
                    <input id="pass" class="w-full bg-neutral-950 text-neutral-400 p-3 border border-neutral-800 rounded-xl focus:outline-none focus:border-emerald-500 transition-all duration-300" type="password" name="password"  required placeholder="Password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,16}" title="Password harus 8-16 karakter, minimal 1 huruf besar, 1 huruf kecil, 1 angka, 1 simbol">
                    <i id="eye" class="fa-solid fa-eye absolute p-2 top-2 right-6 text-neutral-200"></i>
                </div>
                <input class="col-span-2 tracking-wide bg-orange-500 p-3 rounded-xl font-bold text-xl text-neutral-200 hover:bg-emerald-500 hover:text-neutral-900  hover:-translate-y-1 hover:shadow-lg shadow-emerald-900/30 transsition-all duration-300" type="submit" value="Register">
                <hr class="border border-emerald-500 rounded-full">
                <hr class="border border-emerald-500 rounded-full">
                <a href="#" class="tracking-wide p-3 rounded-xl font-bold text-xl border border-neutral-700 text-neutral-200 hover:bg-orange-500 hover:text-neutral-900 hover:-translate-y-1 hover:shadow-lg shadow-emerald-900/30 transsition-all duration-300"><i class="fa-brands fa-google"></i> Google</a>
                <a href="#" class="group tracking-wide p-3 rounded-xl font-bold text-xl border border-neutral-700 text-neutral-200 hover:bg-orange-500 hover:text-neutral-900  hover:-translate-y-1 hover:shadow-lg shadow-emerald-900/30 transsition-all duration-300"><i class="fa-brands fa-github"></i> Github</a>
                <a href="Read.php" class="col-span-2 block text-center text-neutral-400 underline text-xs">Sudah punya akun? <b class="text-emerald-500">Login</b></a>
            </form>
        </div>
        <div class="bg-emerald-800 rounded-l-2xl w-1/2">

        </div>
    </div>
    <script>
        const eye = document.getElementById("eye");
        const pass = document.getElementById("pass");
        eye.addEventListener("click", ()=>{
            pass.type = pass.type === "password" ? "text" : "password";
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>