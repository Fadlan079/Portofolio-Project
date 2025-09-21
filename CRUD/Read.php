<?php
// session_start();
// $message = "";
// include "connect.php"; 

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $email = mysqli_real_escape_string($kon, $_POST['email']);
//     $password = $_POST['password'];

//     $result = mysqli_query($kon, "SELECT * FROM users WHERE email='$email'");
    
//     if(mysqli_num_rows($result) == 1) {
//         $user = mysqli_fetch_assoc($result);

//         if(password_verify($password, $user['password'])) { 
//             $_SESSION['user'] = [
//                 'name' => $user['username'],
//                 'role' => $user['role']
//             ];
//             header("Location: /admin/dashboard.php");
//             exit;
//         } else {
//             $message = "Email atau password salah*";
//         }
//     } else {
//         $message = "Email atau password salah*";
//     }
// }

session_start();
require_once "connect.php";
$message = "";

try{
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username= :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $role = $user['role'] ?? NULL;

        if($user){
            if(password_verify($password, $user['password'])){
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

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
            }else{
                $message = "Password Salah !";
            }   
        }else{
            $message = "Username Salah !";
        }
    }
}catch (PDOException $e){
    echo("Query gagal: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Fadlan Server</title>
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

        </div>
        <div class="bg-emerald-800 rounded-l-2xl w-1/2">
            <div class="flex justify-between m-5">
                <div class="flex relative m-5" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">
                    <a class="bg-neutral-900 text-emerald-500 p-1 m-px rounded-lg font-bold text-2xl"><i class="fa-solid fa-code"></i></a>
                    <h3 class="text-neutral-200 font-bold p-1 m-px text-xl">Fadlan Server</h3>
                </div>
                <?php if (!empty($message)):?>
                    <div class="bg-neutral-900 text-red-500 p-2 rounded-xl col-span-2 block text-center font-bold m-auto" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="400"><?= htmlspecialchars($message)?></div>
                <?php endif?>
                </div>
            <form action="Read.php" method="POST" class="max-w-xl m-auto grid grid-cols-2 p-5 gap-7 rounded-2xl bg-neutral-800/30 backdrop-blur-xl border border-neutral-900 shadow-lg shadow-neutral-900/30">
                <h2 class="col-span-2 font-bold mx-3 text-2xl text-emerald-500 tracking-wide">Selamat datang Kembali!</h2>
                <p class="col-span-2 font-bold text-neutral-200 tracking-wide mx-3">"Login untuk mengakses akun anda."</p>
                <hr class="col-span-2 border border-emerald-500 rounded-full">
                <input class="col-span-2 bg-neutral-950 text-neutral-400 rounded-xl p-3 border border-neutral-900 focus:outline-none focus:border-orange-500 transition-all duration-300" type="text" name="username"  required placeholder="Nama">
                <input class="col-span-2 bg-neutral-950 text-neutral-400 p-3 border border-neutral-900 rounded-xl focus:outline-none focus:border-orange-500 transition-all duration-300" type="password" name="password"  required placeholder="Password">
                <a href="#" class="col-span-2 text-neutral-400 underline block text-right text-xs">forgot password?</a>
                <input class="col-span-2 tracking-wide bg-orange-500 p-3 rounded-xl font-bold text-xl text-neutral-200 hover:bg-emerald-500 hover:text-neutral-900  hover:-translate-y-1 hover:shadow-lg shadow-neutral-900/30 transsition-all duration-300" type="submit" value="Login">
                <hr class="border border-emerald-500 rounded-full">
                <hr class="border border-emerald-500 rounded-full">
                <a href="#" class="tracking-wide p-3 rounded-xl font-bold text-xl border border-neutral-900 text-neutral-200 hover:bg-orange-500 hover:text-neutral-900 hover:-translate-y-1 hover:shadow-lg shadow-neutral-900/30 transsition-all duration-300"><i class="fa-brands fa-google"></i> Google</a>
                <a href="#" class="group tracking-wide p-3 rounded-xl font-bold text-xl border border-neutral-900 text-neutral-200 hover:bg-orange-500 hover:text-neutral-900  hover:-translate-y-1 hover:shadow-lg shadow-neutral-900/30 transsition-all duration-300"><i class="fa-brands fa-github"></i> Github</a>
                <a href="Create.php" class="col-span-2 block text-center text-neutral-400 underline text-xs">Belum punya akun? <b class="text-neutral-950">Register</b></a>
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>