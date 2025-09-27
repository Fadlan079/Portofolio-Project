<?php 
session_start();
$user = $_SESSION['users'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Fadlan Server</title>
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
            <a class="m-3 text-neutral-300 text-xl block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="projects.php"><i class="fa-solid fa-folder-open"></i> Project</a>
            <a class="m-3 text-neutral-500 text-xl  block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="messages.php"><i class="fa-solid fa-paper-plane"></i> Messages</a>
            <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded  hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="profile.php"><i class="fa-solid fa-user"></i> Identity</a>
            <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded  hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="archive.php"><i class="fa-solid fa-box-archive"></i> Archive</a>
            <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded  hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="user-management.php"><i class="fa-solid fa-users"></i> User Management</a>
            <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="preferences.php"><i class="fa-solid fa-gear"></i> Preferences</a>
        </nav>
    </header>
    <section class=" ml-64 p-5 relative z-20">
        <div class="flex justify-between shadow-xl p-6 rounded bg-neutral-900/30 backdrop-blur-md ">
            <div>
                <h1 class="text-emerald-500 text-2xl font-bold">Selamat Datang, <?php echo ucwords($user['name']);?></h1>
                <p class="text-neutral-500">Pegang Kendali Penuh proyekmu dengan sistem manajemen yang praktis</p>
            </div>
            <div class="flex">
                <img src="../src/image/foto.png" alt="" class="rounded-full w-16 h-auto bg-neutral-300 shadow-xl mr-10 border-2 border-emerald-500">
                <div class="block text-right"> 
                    <h3 class="text-emerald-500 text-xl font-bold"><?php echo ucwords($user['name']);?></h3>
                    <p class="text-neutral-500"><?php echo $user['role'];?></p>
                </div>
            </div>
        </div>
        <hr class="border-b border-emerald-600 w-1/1 mx-auto mb-3">
    </section>
</body>
</html>