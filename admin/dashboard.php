<?php 
session_start();
$user = $_SESSION['users'];
require_once "../Model/project.php";
require_once "../Model/user.php";
require_once "../Model/form.php";

$project = new Project();
$dataproject = $project->Readproject();

$pengguna = new User();
$datauser = $pengguna->Read();

$pesan = new Form();
$datapesan = $pesan->Readform();
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
<body class="bg-neutral-200 font-sans h-screen relative">
    <!-- <div class="absolute inset-0 bg-carbon z-0 h-100"></div>
    <div class="absolute top-68 left-0 right-0 h-32 bg-gradient-to-b from-carbon to-neutral-950 z-0"></div> -->
    <header class="bg-neutral-900 h-1/2">
        <div class="max-w-7xl m-auto grid grid-flow-col grid-rows-3 gap-7 p-7">
            <div class="flex justify-between">
                <div class="flex text-center my-auto">
                    <h2 class="bg-neutral-200 text-neutral-900 p-1 m-px rounded-lg font-bold text-2xl"><i class="fa-solid fa-code"></i></h2>
                    <h2 class="text-neutral-200 text-2xl p-1 font-bold">Fadlan Server</h2>
                </div>
                <div class="text-neutral-200 font-bold">
                    <img src="" alt="profil">
                </div>
            </div>
            <div >
                <div class="text-neutral-200 font-bold">
                    <a href="dashboard.php" class="bg-neutral-200 text-neutral-900 rounded-xl p-1"><i class="fa-solid fa-house"></i> Dashboard</a>
                    <a href="projects.php" class="p-1"><i class="fa-solid fa-bars-progress"></i> Project</a>
                    <a href="projects.php" class="p-1"><i class="fa-solid fa-users"></i> User</a>
                </div>
            </div>
            <div class="text-neutral-200 font-bold">
                <h1 class="text-2xl">Selamat Datang,<span class="text-orange-500">Fadlan Firdaus</span></h1>
                <p>Pegang Kendali Penuh proyekmu dengan sistem manajemen yang praktis</p>
            </div>

            <!-- <div class="flex relative" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">
                <h2 id="logo" class="bg-emerald-500 text-neutral-900 p-1 m-px rounded-lg font-bold text-2xl"><i class="fa-solid fa-code"></i></h2>
                <h3 class="text-neutral-200 font-bold p-1 m-px text-xl">Fadlan Server</h3>
            </div>
            <div class="grid grid-flow-col grid-rows-1 gap-10 z-100 m-1 text-neutral-200 font-bold">
                <a href="dashboard.php" class="bg-neutral-200 text-neutral-900 rounded-xl p-1"><i class="fa-solid fa-house"></i> Dashboard</a>
                <a href="projects.php" class="p-1"><i class="fa-solid fa-bars-progress"></i> Project</a>
                <a href="projects.php" class="p-1"><i class="fa-solid fa-users"></i> User</a>
            </div>
            <a href="#" class="rounded-full w-10 h-10 bg-neutral-200 z-100"><i class="fa-solid fa-envelope"></i></a>
            <img src="../src/image/foto.png" alt="" class="rounded-full w-11 h-11 bg-neutral-200 shadow-xl border-2 z-20  border-emerald-500"> -->
            <form method="GET" class="bg-neutral-200 text-neutral-950 border border-neutral-700 flex absolute top-77 left-1/2 translate-y-1/2 -translate-x-1/2 w-1/2 p-4 rounded-full">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="text" placeholder= "Cari apapun disini..." class="w-full mx-2 rounded-lg focus:outline-none">
            </form>
        </div>
        

    </header>
    <nav class="grid grid-cols-1 gap-5 text-neutral-900 font-bold absolute mt-10">
        <button type="button" class="z-100 bg-neutral-200 rounded-full w-10 h-10 border border-neutral-400 shadow-xl ml-6"><i class="fa-solid fa-caret-left"></i></button>
        <button type="button" class="z-100 bg-neutral-200 rounded-full w-10 h-10 border border-neutral-400 shadow-xl ml-6"><i class="fa-solid fa-plus"></i></button>
        <button type="button" class="z-100 bg-neutral-200 rounded-full w-10 h-10 border border-neutral-400 shadow-xl ml-6"><i class="fa-solid fa-user-plus"></i></button>
    </nav>
    <!-- <nav class="flex flex-col w-64 h-screen fixed bg-neutral-900/30 backdrop-blur-md shadow-xl border border-neutral-800 py-2  z-20" >
        <div class="m-4 flex">
            <img src="../src/image/foto.png" alt="profile" class="rounded-full w-16 h-auto bg-neutral-300 shadow-xl border-2 border-emerald-500" >
            <div class="block m-auto">
                <h3 class=" text-emerald-500 font-bold"><?php echo ucwords($user['name']);?></h3>
                <p class="text-neutral-500"><?php echo $user['role'];?></p>
            </div>
        </div>
        <hr class="border-b border-emerald-600 w-1/1 mx-auto mb-3 opacity-50">
        <a class="m-3 text-neutral-500 text-xl  block px-4 py-2 rounded  hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
        <a class="m-3 text-neutral-300 text-xl block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="projects.php"><i class="fa-solid fa-folder-open"></i> Project</a>
        <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="messages.php"><i class="fa-solid fa-paper-plane"></i> Messages</a>
        <a class="m-3  text-neutral-300 text-xl  block px-4 py-2 rounded  hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="profile.php"><i class="fa-solid fa-user"></i> Identity</a>
        <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded  hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="archive.php"><i class="fa-solid fa-box-archive"></i> Archive</a>
        <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded  hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="user-management.php"><i class="fa-solid fa-users"></i> User Management</a>
        <a class="m-3 text-neutral-300 text-xl  block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="preferences.php"><i class="fa-solid fa-gear"></i> Preferences</a>
    </nav> -->
    <section class="relative ml-20 mt-10 mx-10 grid grid-cols-2 gap-3 z-100">
        <div class="col-span-2 w-full m-auto bg-neutral-200 shadow-xl rounded-4xl p-5">
            <h2 class="font-bold text-neutral-900 text-2xl">Portofolio Journey</h2>
        </div>
        <section class="col-span-2 m-auto bg-gradient-to-b from-neutral-200 via-neutral-300 to-neutral-700 rounded-3xl p-5">
            <div class="flex justify-between">
                <h2 class="font-bold text-2xl m-2 text-neutral-900">Recent Project</h2>
                <div>
                    <button class="w-10 h-10 rounded-full shadow-xl border border-neutral-400"><i class="fa-solid fa-plus"></i></button>
                    <button class="w-10 h-10 rounded-full shadow-xl border border-neutral-400"><i class="fa-solid fa-filter"></i></button>
                </div>
                
            </div>
            <div class="grid grid-cols-4 gap-4 mt-5">
                <?php foreach($dataproject as $row):?>
                    <a href="<?=htmlspecialchars($row['repo'])?>" class="group block">
                        <div class="bg-neutral-900 backdrop-blur-md border border-neutral-800 shadow-xl rounded-3xl  m-px group-hover:shadow-2xl group-hover:-translate-y-5 transition-all duration-300">
                            <img src="<?=htmlspecialchars($row['image'])?>" class="w-full h-40 object-cover rounded-t-3xl ">
                            <div class="p-3">
                                <h3 class="text-neutral-200 font-bold text-xl tracking-wide"><?=htmlspecialchars($row['title'])?></h3>
                                <p class="text-neutral-400 tracking-wide text-xs"><?=htmlspecialchars($row['description'])?></p>
                                <p class="text-emerald-500 font-bold group-hover:text-orange-500 transition-all duration-300"> <i class="fa-solid fa-link"></i>Lihat Repo</p>
                            </div>
                        </div>
                    </a>
                <?php endforeach?>
            </div>
        </section>
        <section class="w-full min-h-full m-auto bg-gradient-to-t from-neutral-200 via-neutral-300 to-neutral-700 rounded-3xl p-5">
            <div class="flex justify-between">
                <h2 class="font-bold text-2xl m-2 text-neutral-200">Recent User</h2>
                <div class="text-neutral-200">
                    <button class="w-10 h-10 rounded-full shadow-xl border border-neutral-400"><i class="fa-solid fa-plus"></i></button>
                    <button class="w-10 h-10 rounded-full shadow-xl border border-neutral-400"><i class="fa-solid fa-filter"></i></button>
                </div>
            </div>
            <table class="my-5 w-full border-collapse text-center shadow-xl">
                <tr class="bg-neutral-900 text-neutral-200 text-sm">
                    <th class="p-1 rounded-tl-3xl">ID</th>
                    <th class="p-1">Email</th>
                    <th class="p-1">Username</th>
                    <th class="p-1">Role</th>
                    <th class="p-1 rounded-tr-3xl">Option</th>
                </tr>
                <?php foreach($datauser as $row):?>
                    <tr class="text-neutral-200 bg-neutral-900 text-xs">
                        <td class="p-3"><?= htmlspecialchars($row['id_users'])?></td>
                        <td class="p-3"><?= htmlspecialchars($row['email'])?></td>
                        <td class="p-3"><?= htmlspecialchars($row['username'])?></td>
                        <?php if($row['role'] == 'owner'):?>
                            <td><span class="bg-gradient-to-r from-yellow-500 to-yellow-700  p-1 inline-block w-32 text-center rounded-full"><?= htmlspecialchars($row['role'])?></span></td>
                        <?php elseif($row['role'] == 'superadmin'):?>
                            <td><span class="bg-gradient-to-r from-red-500 to-red-800  p-1 inline-block w-32 text-center rounded-full"><?= htmlspecialchars($row['role'])?></span></td>
                        <?php elseif($row['role'] == 'admin'):?>
                            <td><span class="bg-gradient-to-r from-emerald-500 to-emerald-700  p-1 inline-block w-32 text-center rounded-full"><?= htmlspecialchars($row['role'])?></span></td>
                        <?php else:?>
                            <td><span class="bg-gradient-to-r from-neutral-500 to-neutral-700 d p-1 inline-block w-32 text-center rounded-full"><?= htmlspecialchars($row['role'])?></span></td>
                        <?php endif?>     
                        <td class="p-3 grid grid-cols-2 gap-5">
                            <button type="button" class="update p-1 text-left  border border-neutral-400 rounded-full shadow-xl  hover:text-neutral-900 hover:bg-emerald-500 transition-all duration-300"><i class="fa-solid fa-pen-to-square"></i></button>
                            <a href="user-management.php?id_users=<?= $row['id_users']?>" onclick="return confirm('Yakin mau Hapus User <?=htmlspecialchars($row['username'])?> dengan ID <?=htmlspecialchars($row['id_users'])?> ?')" class="p-1 text-left text-red-500 font-bold  border border-neutral-400 rounded-full shadow-xl hover:text-neutral-900 hover:bg-red-500 transition-all duration-300"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach?>
            </table>
        </section>
        <section class="w-full h-full m-auto bg-gradient-to-t from-neutral-200 via-neutral-300 to-neutral-700 rounded-3xl p-5">
            <div class="flex justify-between">
                <h2 class="font-bold text-2xl m-2 text-neutral-200">Recent Messages</h2>
                <div class="text-neutral-200">
                    <button class="w-10 h-10 rounded-full shadow-xl border border-neutral-400"><i class="fa-solid fa-plus"></i></button>
                    <button class="w-10 h-10 rounded-full shadow-xl border border-neutral-400"><i class="fa-solid fa-filter"></i></button>
                </div>
                
            </div>
            <div class="grid grid-cols-1 gap-4 mt-5">
                <?php foreach($datapesan as $row):?>
                    <div class="bg-neutral-900 backdrop-blur-md border border-neutral-800 shadow-xl rounded-3xl  m-px group-hover:shadow-2xl group-hover:-translate-y-5 transition-all duration-300">
                        <div class="p-3">
                            <h3 class="text-neutral-200 font-bold text-xl tracking-wide"><?=htmlspecialchars($row['nama'])?></h3>
                            <p class="text-neutral-400 tracking-wide text-xs"><?=htmlspecialchars($row['email'])?></p>
                            <p class="text-neutral-400 tracking-wide text-xs"><?=htmlspecialchars($row['pesan'])?></p>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
        </section>
        <!-- <div>


            <div class="grid grid-cols-3 gap-10 mt-10 ">
                <div class="block bg-neutral-900/30 shadow-2xl rounded-lg m-px p-5 backdrop-blur-md">
                    <h3 class="text-neutral-300 m-3"><i class="fa-solid fa-eye"></i> Page Views</h3>
                    <hr class="border-b border-emerald-600 w-1/1 mx-auto mb-3">
                    <p class="text-orange-500 text-3xl font-bold">12,450</p>
                    <p class="text-sm text-neutral-500">+300 this week</p>
                </div>
                <div class="block bg-neutral-900/30 shadow-2xl rounded-lg m-px p-5 backdrop-blur-md">
                    <h3 class="text-neutral-300 m-3"><i class="fa-solid fa-bars-progress"></i> Total Project</h3>
                    <hr class="border-b border-emerald-600 w-1/1 mx-auto mb-3">
                    <p class="text-orange-500 text-3xl font-bold">15</p>
                    <p class="text-sm text-neutral-500">+3 this week</p>
                    <div class="flex">
                        <h3 class="border-1 border-emerald-500 rounded p-1 text-sm m-2 w-25 shadow-2xl text-neutral-400">Published: 8</h3>
                        <h3 class="border-1 border-yellow-500 p-1 rounded text-sm m-2 w-25 shadow-2xl text-neutral-400">Draft: 3</h3>
                        <h3 class="border-1 border-red-500 p-1 rounded text-sm m-2 w-25 shadow-2xl text-neutral-400">Archive: 4</h3>
                    </div>
                </div>
                <div class="block bg-neutral-900/30 shadow-2xl rounded-lg m-px p-5 backdrop-blur-md">
                    <h3 class="text-neutral-300 m-3"><i class="fa-solid fa-chart-pie"></i> Project Rate</h3>
                    <hr class="border-b border-emerald-600 w-1/1 mx-auto mb-3">
                    <div class="grid grid-cols-3 gap-6 mt-6">
                        <div>
                            <p class="text-orange-500 text-3xl font-bold">53%</p><span class="text-sm text-neutral-500">Published</span>
                        </div>
                        <div>
                            <p class="text-orange-500 text-3xl font-bold">20%</p><span class="text-sm text-neutral-500">Draft</span>
                        </div>
                        <div>
                            <p class="text-orange-500 text-3xl font-bold">27%</p><span class="text-sm text-neutral-500">Archive</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-neutral-950 ml-64 p-5 ">
        <div class="grid grid-cols-3 gap-10 ">
            <div class="col-span-2 bg-neutral-900/30 backdrop-blur-md shadow-2xl rounded-lg p-5">
                <h3 class="text-neutral-300 font-bold"><i class="fa-solid fa-chart-line"></i> Project Overview</h3>
                <hr class="border-b border-emerald-600 w-full mx-auto mb-3">
                <p class="text-neutral-500 font-bold italic">*Contoh Chart, Data asli akan muncul di versi full.</p>
            </div>

            <div class="col-span-1 bg-neutral-900/30 backdrop-blur-md shadow-2xl rounded-lg p-4 ">
                <h3 class="text-neutral-300 font-bold"><i class="fa-solid fa-bell"></i> Notifications</h3>
                <hr class="border-b border-emerald-600 w-full mx-auto mb-3">
                <a href="massages.html" class="flex bg-neutral-900/30 backdrop-blur-md shadow-lg shadow-emerald-900/30 m-3 mt-6 p-5 rounded-xl">
                    <img src="../src/image/foto.png" class="rounded-full w-16 h-auto bg-neutral-300 shadow-xl mr-10 border-2 border-emerald-500">
                    <div>
                        <h3 class="text-xl font-medium text-neutral-200">Chit Chat</h3>
                        <p class="text-neutral-400">you have new messages!</p>
                    </div>
                </a>
                <a href="#" class="flex bg-neutral-900/30 backdrop-blur-md shadow-lg shadow-emerald-900/30 m-3 mt-6 p-4 rounded-xl">
                    <img src="../src/image/foto.png" class="rounded-full w-16 h-auto bg-neutral-300 shadow-xl mr-10 border-2 border-emerald-500">
                    <div>
                        <h3 class="text-xl font-medium text-neutral-200">Chit Chat</h3>
                        <p class="text-neutral-400">you have new messages!</p>
                    </div>
                </a>
                <a href="#" class="flex bg-neutral-900/30 backdrop-blur-md shadow-lg shadow-emerald-900/30 m-3 mt-6 p-4 rounded-xl">
                    <img src="../src/image/foto.png" class="rounded-full w-16 h-auto bg-gray-300 shadow-xl mr-10 border-2 border-emerald-500">
                    <div>
                        <h3 class="text-xl font-medium text-neutral-200">Chit Chat</h3>
                        <p class="text-neutral-400">you have new messages!</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-10 mt-10">
            <div class="block bg-neutral-900/30 backdrop-blur-md shadow-2xl rounded-lg m-px p-5">
                <h3 class="text-neutral-300 m-3"><i class="fa-solid fa-eye"></i> Page Views</h3>
                <hr class="border-b border-emerald-600 w-1/1 mx-auto mb-3">
                <p class="text-orange-500 text-3xl font-bold">12,450</p>
                <p class="text-sm text-neutral-500">+300 this week</p>
            </div>
        </div>

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
        </div> -->
    </section>
</body>
</html>