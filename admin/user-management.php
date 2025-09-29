<?php
session_start();
$user = $_SESSION['users'];
require_once "../Model/user.php";

$pengguna = new User();
$data = $pengguna->Read();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['create'])){
        $pengguna->Create(
        $username = $_POST['username'],
        $email = $_POST['email'],
        $password = $_POST['password'],
        $role = $_POST['role']
    );

        header("Location:user-management.php?success=1");
        exit;
    }
    elseif(isset($_POST['update'])){
        $pengguna->Update(
        $id_users = $_POST['id_users'],
        $username = $_POST['username'],
        $email = $_POST['email'],
        $password = $_POST['password'],
        $role = $_POST['role']
    );
    }
}

if(isset($_GET['id_users'])){
    $pengguna->Delete($id_users = $_GET['id_users']);

    header("Location: user-management.php?succses=deleted");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Fadlan Server</title>
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
            <a class="m-3 text-neutral-300 text-xl block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
            <a class="m-3 text-neutral-300 text-xl block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="projects.php"><i class="fa-solid fa-folder-open"></i> Project</a>
            <a class="m-3 text-neutral-300 text-xl block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="messages.php"><i class="fa-solid fa-paper-plane"></i> Messages</a>
            <a class="m-3 text-neutral-300 text-xl block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="profile.php"><i class="fa-solid fa-user"></i> Identity</a>
            <a class="m-3 text-neutral-300 text-xl block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="archive.php"><i class="fa-solid fa-box-archive"></i> Archive</a>
            <a class="m-3 text-neutral-500 text-xl block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="user-management.php"><i class="fa-solid fa-users"></i> User Management</a>
            <a class="m-3 text-neutral-300 text-xl block px-4 py-2 rounded hover:text-emerald-500 hover:shadow-xl hover:scale-105 shadow-emerald-900/30 transition-all duration-300" href="preferences.php"><i class="fa-solid fa-gear"></i> Preferences</a>
        </nav>
    </header>
    <section class=" ml-64 p-5 relative z-20">
        <div class="shadow-xl p-6 rounded bg-neutral-900/30 backdrop-blur-md grid grid-col-1 gap-4">
            <div class="flex justify-between">
                <h1 class="text-emerald-500 text-2xl font-bold">Selamat Datang, <?php echo ucwords($user['name']);?></h1>
                <p class="text-neutral-500">Pegang Kendali Penuh proyekmu dengan sistem manajemen yang praktis</p>
                <button id="tambah" type="button" class="bg-emerald-500 p-2 m-2 rounded-lg sahdow-xl hover:scale-105 hover:bg-orange-500 hover:-translate-y-1 hover:text-neutral-200 transition-all duration-300"><i class="fa-solid fa-plus"></i> Tambah User</button>
            </div>
            <form method="GET" class="bg-neutral-950 text-neutral-200 border border-neutral-700 p-2 m-2 w-100 flex rounded-lg shadow-xl">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="text" placeholder= "Cari user..." class="w-full mx-2 rounded-lg focus:outline-none">
            </form>
        </div>
        <hr class="border-b border-emerald-600 w-1/1 mx-auto mb-3">

       <table class="my-5 w-full border-collapse text-left shadow-lg shadow-emerald-900/30">
            <tr class="bg-emerald-300/70 backdrop-blur-xl text-emerald-800">
                <th class="p-2 rounded-tl-sm">ID</th>
                <th class="p-2">Email</th>
                <th class="p-2">Username</th>
                <th class="p-2">Role</th>
                <th class="p-2 rounded-tr-sm">Option</th>
            </tr>
            <?php foreach($data as $row): ?>
                <tr class="text-neutral-200 bg-neutral-900/30 backdrop-blur-lg">
                    <td class="p-3"><?= htmlspecialchars($row['id_users'])?></td>
                    <td class="p-3"><?= htmlspecialchars($row['email'])?></td>
                    <td class="p-3"><?= htmlspecialchars($row['username'])?></td>
                    <?php if($row['role'] == 'owner'):?>
                        <td><span class="bg-gradient-to-r from-yellow-500 to-yellow-700 font-bold p-1 inline-block w-32 text-center rounded-full"><?= htmlspecialchars($row['role'])?></span></td>
                    <?php elseif($row['role'] == 'superadmin'):?>
                        <td><span class="bg-gradient-to-r from-red-500 to-red-800 font-bold p-1 inline-block w-32 text-center rounded-full"><?= htmlspecialchars($row['role'])?></span></td>
                    <?php elseif($row['role'] == 'admin'):?>
                        <td><span class="bg-gradient-to-r from-emerald-500 to-emerald-700 font-bold p-1 inline-block w-32 text-center rounded-full"><?= htmlspecialchars($row['role'])?></span></td>
                    <?php else:?>
                        <td><span class="bg-gradient-to-r from-neutral-500 to-neutral-700 font-bold p-1 inline-block w-32 text-center rounded-full"><?= htmlspecialchars($row['role'])?></span></td>
                    <?php endif?>     
                    <td class="p-3 grid grid-cols-2 gap-5">
                        <button type="button" class="update p-1 text-left text-emerald-500 font-bold border border-emerald-500 rounded-lg hover:text-neutral-900 hover:bg-emerald-500 transition-all duration-300"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                        <a href="user-management.php?id_users=<?= $row['id_users']?>" onclick="return confirm('Yakin mau Hapus User <?=htmlspecialchars($row['username'])?> dengan ID <?=htmlspecialchars($row['id_users'])?> ?')" class="p-1 text-left text-red-500 font-bold  border border-red-500 rounded-lg hover:text-neutral-900 hover:bg-red-500 transition-all duration-300"><i class="fa-solid fa-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php endforeach?>
       </table>
    </section>
    <div id="form" class="opacity-0 scale-95 pointer-events-none fixed z-30 inset-0 bg-neutral-950/30 backdrop-blur-xl transition-all duration-300">
        <form action="user-management.php" method="POST" class="grid grid-cols-1 bg-neutral-950/50 backdrop-blur-lg gap-7 p-5 m-auto mt-20 relative z-100 max-w-xl rounded-lg shadow-xl border border-neutral-700 text-neutral-300 font-bold">
            <h2 class="text-2xl">Tambah User</h2>
            <input type="text" name="username" placeholder="Username..." required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2">
            <input type="text" name="email" placeholder="Email..." required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2">
            <div class="w-full relative">
                <input id="pass" type="password" name="password" placeholder="Password..." required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2 w-full">
                <i id="eye" class="fa-solid fa-eye absolute p-2 top-1 right-6"></i>
            </div>
            <select name="role" required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2">
                <option disabled selected>Role</option>
                <option value="owner">Owner</option>
                <option value="superadmin">Superadmin</option>
                <option value="admin">Admin</option>
                <option value="visitor">Visitor</option>
            </select>
            <div class="grid grid-cols-2 gap-5 text-center">
                <input type="submit" name="create" value="Tambah User" class="col-span-2 bg-orange-500 text-neutral-200 p-2 rounded-lg hover:bg-emerald-500 hover:text-neutral-900 transition-all duration-300">
                <hr class="border border-emerald-500 rounded-full">
                <hr class="border border-emerald-500 rounded-full">
                <button id="kembali" type="button" class="col-span-2 hover:underline hover:text-neutral-700 transition-all duration-300">Batal</button>
            </div>
        </form>
    </div>
    <div id="form_update" class="opacity-0 scale-95 pointer-events-none fixed z-30 inset-0 bg-neutral-950/30 backdrop-blur-xl transition-all duration-300">
        <form action="user-management.php" method="POST" class="grid grid-cols-1 bg-neutral-950/50 backdrop-blur-lg gap-7 p-5 m-auto mt-20 relative z-100 max-w-xl rounded-lg shadow-xl border border-neutral-700 text-neutral-300 font-bold">
            <h2 class="text-2xl">Update User</h2>
            <input type="text" name="username" placeholder="Username..." required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2">
            <input type="text" name="email" placeholder="Email..." required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2">
            <div class="w-full relative">
                <input id="pass" type="password" name="password" placeholder="Password..." required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2 w-full">
                <i id="eye" class="fa-solid fa-eye absolute p-2 top-1 right-6"></i>
            </div>
            <select name="role" required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2">
                <option disabled selected>Role</option>
                <option value="owner">Owner</option>
                <option value="superadmin">Superadmin</option>
                <option value="admin">Admin</option>
                <option value="visitor">Visitor</option>
            </select>
            <div class="grid grid-cols-2 gap-5 text-center">
                <input type="submit" name="update" value="Update User" class="col-span-2 bg-orange-500 text-neutral-200 p-2 rounded-lg hover:bg-emerald-500 hover:text-neutral-900 transition-all duration-300">
                <hr class="border border-emerald-500 rounded-full">
                <hr class="border border-emerald-500 rounded-full">
                <button id="back" type="button" class="col-span-2 hover:underline hover:text-neutral-700 transition-all duration-300">Batal</button>
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

        const update = document.querySelectorAll(".update");
        const back = document.getElementById("back");
        const form_update = document.getElementById("form_update");

        update.forEach(btn => {
            btn.addEventListener("click", () => {
                form_update.classList.remove("opacity-0","scale-95","pointer-events-none");
                form_update.classList.add("opacity-100", "scale-100");
            });
        });

        back.onclick = function(){
            form_update.classList.remove("opacity-100","scale-100");
            form_update.classList.add("opacity-0", "scale-95","pointer-events-none");
        }

        const eye = document.getElementById("eye");
        const pass = document.getElementById("pass");
        eye.addEventListener("click", ()=>{
            pass.type = pass.type === "password" ? "text" : "password";
        });
    </script>
</body>
</html>