<?php 
session_start();
require_once "../Model/project.php";

$user = $_SESSION['users'];
$project = new Project();
$data = $project->Readproject();

if($_SERVER['REQUEST_METHOD']=="POST"){
    $project->Createproject(
    $title = $_POST['title'],
    $description = $_POST['description'],
    $image = $_FILES['image'],
    $repo = $_POST['repo'],
    $status = $_POST['status']
);

    header("Location:projects.php?success=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project - Fadlan Server</title>
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
            <a class="m-3 text-neutral-500 text-xl block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="projects.php"><i class="fa-solid fa-folder-open"></i> Project</a>
            <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="messages.php"><i class="fa-solid fa-paper-plane"></i> Messages</a>
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
        <h2 class="text-2xl text-neutral-200 font-bold p-2 m-2">Project List</h2>
        <p></p>
        <div class="flex justify-between">
            <button id="tambah" type="button" class="bg-emerald-500 p-2 m-2 rounded-lg sahdow-xl hover:scale-105 hover:bg-orange-500 hover:-translate-y-1 hover:text-neutral-200 transition-all duration-300"><i class="fa-solid fa-plus"></i> Tambah Project</button>
            <form method="GET" class="bg-neutral-950 text-neutral-200 border border-neutral-700 p-2 m-2 w-100 flex rounded-lg shadow-xl">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="text" placeholder= "Cari Proyek..." class="w-full mx-2 rounded-lg focus:outline-none">
            </form>
        </div>
        <div class="grid grid-cols-3 gap-10 mt-10">
            <?php foreach($data as $row):?>
                <a href="<?=htmlspecialchars($row['repo'])?>" class="group block">
                    <div class="bg-neutral-900/30 backdrop-blur-md border border-neutral-800 shadow-lg rounded-xl shadow-emerald-900/30 m-px group-hover:shadow-xl group-hover:shadow-emerald-900/30 group-hover:-translate-y-5 transition-all duration-300">
                        <div class="h-1 bg-emerald-500 rounded-xl group-hover:bg-orange-500"></div>
                        <img src="<?=htmlspecialchars($row['image'])?>" class="w-full h-50 object-cover rounded-t-lg blur-xs">
                        <div class="p-7">
                            <h3 class="text-neutral-300"><?=htmlspecialchars($row['title'])?></h3>
                            <p class="text-neutral-500"><?=htmlspecialchars($row['description'])?></p>
                            <p class="text-emerald-500 group-hover:text-orange-500 transition-all duration-300"> <i class="fa-solid fa-link"></i>Lihat Repo</p>
                        </div>
                    </div>
                </a>
            <?php endforeach?>
    </section>
    <div id="form" class="opacity-0 scale-95 pointer-events-none fixed z-30 inset-0 bg-neutral-950/30 backdrop-blur-xl transition-all duration-300">
        <form action="projects.php" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 bg-neutral-950/50 backdrop-blur-lg gap-7 p-5 m-auto mt-20 relative z-100 max-w-xl rounded-lg shadow-xl border border-neutral-700 text-neutral-300 font-bold">
            <h2 class="text-2xl">Tambah Proyek</h2>
            <input type="text" name="title" placeholder="Judul Proyek..." required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2">
            <textarea name="description" placeholder="Deskripsi..." maxlength="255" required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2"></textarea>
            <input type="file" name="image" required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2">
            <input type="text" name="repo" placeholder="Link Repo..." required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2">
            <select name="status" required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2">
                <option disabled selected>Status</option>
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
            <div class="grid grid-cols-2 gap-5 text-center">
                <input type="submit" value="Tambah Proyek" class="col-span-2 bg-orange-500 text-neutral-200 p-2 rounded-lg hover:bg-emerald-500 hover:text-neutral-900 transition-all duration-300">
                <hr class="border border-emerald-500 rounded-full">
                <hr class="border border-emerald-500 rounded-full">
                <button id="kembali" type="button" class="col-span-2 hover:underline hover:text-neutral-700 transition-all duration-300">Batal</button>
            </div>
        </form>
    </div>

    <script>
        const tambah = document.getElementById("tambah");
        const kembali = document.getElementById("kembali");
        const form = document.getElementById("form");
        tambah.onclick = function(){
            form.classList.remove("opacity-0","scale-95","pointer-events-none");
            form.classList.add("opacity-100", "scale-100");
        }
        kembali.onclick = function(){
            form.classList.remove("opacity-100","scale-100");
            form.classList.add("opacity-0", "scale-95","pointer-events-none");
        }
    </script>
</body>    