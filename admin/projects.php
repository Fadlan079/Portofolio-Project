<?php 
session_start();
$islogin = isset($_SESSION['users']);
if (isset($_SESSION['users'])){
    $user = $_SESSION['users'];
}else{
    $user = [
        "name" => "Username",
        "role" => "Guest"
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Fadlan Server</title>
    <link rel="stylesheet" href="../src/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
<body class="bg-neutral-950 font-sans relative">
    <div class="absolute inset-0 bg-carbon z-0 h-100"></div>
    <div class="absolute top-68 left-0 right-0 h-32 bg-gradient-to-b from-carbon to-neutral-950 z-0"></div>

    <header>
        <nav class="flex flex-col w-64 h-screen fixed bg-neutral-900/30 backdrop-blur-md shadow-xl border border-neutral-800 py-2  z-20" >
            <div class="m-4 flex">
                <img src="../src/image/foto.png" alt="profile" class="rounded-full w-16 h-auto bg-neutral-300 shadow-xl border-2 border-emerald-500" >
                <div class="block m-auto">
                    <h3 class=" text-emerald-500 font-bold"><?php echo ucwords($user['name']);?></h3>
                    <p class="text-neutral-500"><?php echo $user['role'];?></p>
                </div>
            </div>
            <hr class="border-b border-emerald-600 w-1/1 mx-auto mb-3 opacity-50">
            <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded  hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
            <?php if($islogin):?>
            <a class="m-3 text-neutral-500 text-xl block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="projects.php"><i class="fa-solid fa-folder-open"></i> Project</a>
            <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="messages.php"><i class="fa-solid fa-paper-plane"></i> Messages</a>
            <a class="m-3  text-neutral-300 text-xl  block px-4 py-2 rounded  hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="profile.php"><i class="fa-solid fa-user"></i> Identity</a>
            <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded  hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="archive.php"><i class="fa-solid fa-box-archive"></i> Archive</a>
            <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded  hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="user-management.php"><i class="fa-solid fa-users"></i> User Management</a>
            <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="preferences.php"><i class="fa-solid fa-gear"></i> Preferences</a>
            <a class="m-3 bg-orange-500 text-neutral-300 text-xl  block px-4 py-2 rounded shadow-xl hover:bg-emerald-600 hover:scale-105 hover:text-neutral-950 hover:shadow-xl hover:shadow-emerald-900/30 transition-all duration-300 delay-150" href="logout.php"><i class="fa-solid fa-door-open"></i> Logout</a>
            <?php else:?>
            <a class="m-3  text-neutral-300 text-xl  block px-4 py-2 rounded  hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="profile.php"><i class="fa-solid fa-user"></i> Identity</a>
            <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="preferences.php"><i class="fa-solid fa-gear"></i> Preferences</a>
            <a class="m-3 bg-orange-500 text-neutral-300 text-xl  block px-4 py-2 rounded shadow-xl hover:bg-emerald-600 hover:scale-105  hover:shadow-xl hover:shadow-emerald-900/30 hover:text-neutral-950 transition-all duration-300" href="/CRUD/Read.php"><i class="fa-solid fa-door-closed"></i> Login</a>
            <?php endif;?>
        </nav>
    </header>
    <section class=" ml-64 p-5 relative z-20">
        <h2>Project List</h2>
        <p></p>
        <div class="grid grid-cols-3 gap-10 mt-10">
            <a href="#" class="group block">
                <div class="bg-neutral-900/30 backdrop-blur-md border border-neutral-800 shadow-lg rounded-xl shadow-emerald-900/30 m-px group-hover:shadow-xl group-hover:shadow-emerald-900/30 group-hover:-translate-y-5 transition-all duration-300">
                    <div class="h-1 bg-emerald-500 rounded-xl group-hover:bg-orange-500"></div>
                    <img src="../src/image/ilustration.jpg" class="w-full h-50 object-cover rounded-t-lg blur-xs">
                    <div class="p-7">
                        <h3 class="text-neutral-300">Judul Proyek</h3>
                        <p class="text-neutral-500">Belum Ada Deskripsi Yang di isi</p>
                        <p class="text-emerald-500 group-hover:text-orange-500 transition-all duration-300"> <i class="fa-solid fa-link"></i>Lihat Repo</p>
                    </div>
                </div>
            </a>
            <a href="#" class="group block">
                <div class="bg-neutral-900/30 backdrop-blur-md border border-neutral-800 shadow-lg rounded-xl shadow-emerald-900/30 m-px group-hover:shadow-xl group-hover:shadow-emerald-900/30 group-hover:-translate-y-5 transition-all duration-300">
                    <div class="h-1 bg-emerald-500 rounded-xl group-hover:bg-orange-500"></div>
                    <img src="../src/image/ilustration.jpg" class="w-full h-50 object-cover rounded-t-lg blur-xs">
                    <div class="p-7">
                        <h3 class="text-neutral-300">Judul Proyek</h3>
                        <p class="text-neutral-500">Belum Ada Deskripsi Yang di isi</p>
                        <p class="text-emerald-500 group-hover:text-orange-500 transition-all duration-300"> <i class="fa-solid fa-link"></i>Lihat Repo</p>
                    </div>
                </div>
            </a>
            <a href="#" class="group block">
                <div class="bg-neutral-900/30 backdrop-blur-md border border-neutral-800 shadow-lg rounded-xl shadow-emerald-900/30 m-px group-hover:shadow-xl group-hover:shadow-emerald-900/30 group-hover:-translate-y-5 transition-all duration-300">
                    <div class="h-1 bg-emerald-500 rounded-xl group-hover:bg-orange-500"></div>
                    <img src="../src/image/ilustration.jpg" class="w-full h-50 object-cover rounded-t-lg blur-xs">
                    <div class="p-7">
                        <h3 class="text-neutral-300">Judul Proyek</h3>
                        <p class="text-neutral-500">Belum Ada Deskripsi Yang di isi</p>
                        <p class="text-emerald-500 group-hover:text-orange-500 transition-all duration-300"> <i class="fa-solid fa-link"></i>Lihat Repo</p>
                    </div>
                </div>
            </a>
        </div>
    </section>
</body>    