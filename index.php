<?php
session_start();
require_once "Model/project.php";
require_once "Model/user.php";
require_once "Model/form.php";
$user = new User();
$form = new Form();

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data = $user->Read(null, $username);

        if($data){
            if(password_verify($password, $data['password'])){
                $_SESSION['username'] = $data['username'];
                $_SESSION['role'] = $data['role'];

                if($data['role'] == 'admin' || $data['role'] == 'superadmin' || $data['role'] == 'owner'){    
                    $_SESSION['users'] = [
                        'name' => $data['username'],
                        'role' => $data['role']
                    ];
                    header("Location:admin/dashboard.php?success=1");
                    exit;
                }else{
                    header("Location:index.php?success=1");
                    exit;
                }
            }else{
                echo "Password Salah!";
            }   
        }else{
            echo "User tidak ditemukan!";
        }  
    }elseif(isset($_POST['form'])){
        $form->Createform(
        $nama = $_POST['nama'],
        $email = $_POST['email'],
        $pesan = $_POST['pesan']
    );
        header("Location:index.php?submit=1");
        exit;
    } 
}
$project = new Project();
$data = $project->Readproject();
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth scroll-pt-30">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fadlan Server</title>
    <link rel="stylesheet" href="src/css/output.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
<body class="bg-neutral-950 font-sans overflow-x-hidden">
    <div id="form" class="opacity-0 scale-95 pointer-events-none fixed z-100 inset-0 bg-neutral-950/30 backdrop-blur-xl transition-all duration-300">
        <form action="index.php" method="POST" class="grid grid-cols-1 bg-neutral-950/50 backdrop-blur-lg gap-10 p-5 m-auto mt-20 relative z-100 max-w-xl rounded-lg shadow-xl border border-neutral-700 text-neutral-300 font-bold">
            <h2 class="text-2xl">Login</h2>
            <input type="text" name="username" placeholder="Username..." required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2">
            <div class="w-full relative">
                <input id="pass" type="password" name="password" placeholder="Password..." required class="bg-neutral-900 border border-neutral-700 rounded-lg focus:outline-none focus:border-emerald-500 p-2 w-full">
                <i id="eye" class="fa-solid fa-eye absolute p-2 top-1 right-6"></i>
            </div>
            <a href="#" class="text-neutral-400 underline block text-right text-xs">forgot password?</a>
            <div class="grid grid-cols-2 gap-5 text-center">
                <input type="submit" value="Login" class="col-span-2 bg-orange-500 text-neutral-200 p-2 rounded-lg hover:bg-emerald-500 hover:text-neutral-900 transition-all duration-300">
                <hr class="border border-emerald-500 rounded-full">
                <hr class="border border-emerald-500 rounded-full">
                <a href="register.php" class="col-span-2 block text-center text-neutral-400 underline text-xs">Belum punya akun? <b class="text-neutral-200">Register</b></a>
                <button id="kembali" type="button" class="col-span-2 hover:underline hover:text-neutral-700 transition-all duration-300">Batal</button>
            </div>
        </form>
    </div>
    <section class="relative bg-carbon lg:pt-5 lg:min-h-145 lg:m-7 rounded-xl">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-neutral-950/30 to-neutral-950 rounded-xl"></div>
            <header class="flex justify-between items-center px-3">
                <div class="flex relative" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">
                    <h2 id="logo" class="bg-emerald-500 text-neutral-900 p-1 m-px rounded-lg font-bold text-2xl"><i class="fa-solid fa-code"></i></h2>
                    <h3 class="text-neutral-200 font-bold p-1 m-px text-xl">Fadlan Server</h3>
                </div>
                <nav id="navbar" class="bg-neutral-950/70 w-1/2 lg:px-5 lg:py-6 z-50 fixed lg:w-230 lg:left-1/2 lg:-translate-x-1/2 top-0 rounded-b-3xl shadow backdrop-blur-lg transition-all duration-300">
                    <div class="items-center border border-neutral-700 flex justify-between lg:max-w-7xl mx-auto px-6 rounded-xl" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="800">
                        <a href="#home" class="font-bold text-neutral-200 hover:text-emerald-500 transition-all duration-300 p-3"><i class="fa-solid fa-house"></i> Home</a>
                        <a href="#project" class="font-bold text-neutral-200 hover:text-emerald-500 transition-all duration-300 p-3"><i class="fa-solid fa-folder-open"></i> Project</a>
                        <a href="#about" class="font-bold text-neutral-200 hover:text-emerald-500 transition-all duration-300 p-3"><i class="fa-solid fa-user"></i> About</a>
                        <a href="#contact" class="font-bold text-neutral-200 hover:text-emerald-500 transition-all duration-300 p-3"><i class="fa-solid fa-address-book"></i> Contact</a>
                    </div>
                </nav>
            </header>
            <section id="home" class="relative mt-20 z-20 mx-auto h-screen max-w-7xl lg:h-85">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 lg:gap-10">
                    <div class="lg:col-span-2 m-5 p-5 block justify-center items-center">
                        <div>
                            <hr class="border-2 lg:border-4 border-emerald-500  rounded-full w-26 lg:w-32 mb-3" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="1800">
                            <h2 class="font-bold text-neutral-200 text-2xl lg:text-5xl mb-3" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="0">Eksplorasi Karya</h2>
                            <h2 class="font-bold text-emerald-500 text-2xl lg:text-5xl mb-3" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">tanpa batas</h2>
                            <p class="font-bold text-neutral-500  mb-3" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="600">Halo, saya Fadlan, lulusan Ilmu Komputer dengan minat di web development.
                            Menguasai Python, PHP, JavaScript, HTML, CSS, serta berpengalaman dengan Laragon.
                            Siap berkontribusi dan berkembang di bidang software development.</p>
                        </div>
                        <div class="flex" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="800">
                            <a href="#" class="bg-orange-500 p-2 m-2 rounded-xl text-neutral-900 font-bold hover:bg-emerald-500 hover:text-neutral-200 hover:scale-105 hover:-translate-y-1 hover:shadow-xl shadow-emerald-900/30 transition-all duration-300">Lihat Proyek <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                            <a href="#" class="border border-neutral-200 text-neutral-200 p-2 m-2 rounded-xl font-bold hover:border-emerald-500 hover:text-emerald-500 hover:scale-105 hover:-translate-y-1 hover:shadow-xl shadow-emerald-900/30 transition-all duration-300">Hubungi Saya</a>
                        </div>
                    </div>
                    <div class="lg:col-span-1 bg-gradient-to-r from-emerald-950 to-neutral-900 w-50 lg:w-90 h-50 lg:h-90 backdrop-blur-xl rounded-4xl drop-shadow-xl drop-shadow-emerald-900/30 flex justify-center items-center border border-neutral-800" data-aos="zoom-in" data-aos-duration="1800" data-aos-delay="1200">
                        <img src="src/image/foto.png" class="bg-emerald-500/50 w-26 lg:w-36 h-26 lg:h-36 rounded-3xl shadow-2xl animate-pulse">
                    </div>
                </div>
            </section>
    </section>
    <section id="project" class="mx-auto max-w-7xl h-screen">
        <div class="grid lg:grid-cols-3 gap-10">
            <div class="col-span-2 m-5 p-5 block text-left">
                <h2 class="font-bold text-neutral-200 text-5xl mb-3" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="0">Project List</h2>
                <p class="font-bold text-neutral-500" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">Beberapa proyek yang sedang di kembangkan</p>
            </div>
            <div class="col-span-1 m-5 p-5 block text-right" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="400">
                <a href="#" class="font-bold text-emerald-500 hover:text-orange-500 transition-colors duration-300">Show All</a>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mb-20">
            <?php foreach($data as $row):?>
                <a href="<?=htmlspecialchars($row['repo'])?>" class="group block" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="0">
                    <div class="bg-neutral-800/30 backdrop-blur-md border border-neutral-800 shadow-lg rounded-xl shadow-emerald-900/30 m-px group-hover:shadow-xl group-hover:shadow-emerald-900/30 group-hover:-translate-y-5 group-hover:scale-105 transition-all duration-300">
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
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-10">
            <div class="shadow-lg shadow-emerald-900/30 rounded-xl border bg-neutral-800/30 backdrop-blur-xl border-neutral-800 block text-center p-5" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="1000">
                <h2 class="font-bold text-emerald-500 text-2xl mb-3">15</h2>
                <p class="text-neutral-500 text-lg">Total Projects</p>
            </div>
                    <div class="shadow-lg shadow-emerald-900/30 rounded-xl border bg-neutral-800/30 backdrop-blur-xl border-neutral-800 block text-center p-5" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="800">
                <h2 class="font-bold text-emerald-500 text-2xl mb-3">12.4k</h2>
                <p class="text-neutral-500 text-lg">Page Views</p>
            </div>
                    <div class="shadow-lg shadow-emerald-900/30 bg-neutral-800/30 backdrop-blur-xl rounded-xl border border-neutral-800 block text-center p-5" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="600">
                <h2 class="font-bold text-emerald-500 text-2xl mb-3">2+</h2>
                <p class="text-neutral-500 text-lg">Years Experience</p>
            </div>
                    <div class="shadow-lg shadow-emerald-900/30 rounded-xl border bg-neutral-800/30 backdrop-blur-xl border-neutral-800 block text-center p-5" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">
                <h2 class="font-bold text-emerald-500 text-2xl mb-3">7+</h2>
                <p class="text-neutral-500 text-lg">Tools</p>
            </div>
        </div>
    </section>
    <section id="about" class="mx-auto max-w-5xl h-screen mt-40">
        <div class="grid grid-cols-2 gap-10">
            <div class="bg-gradient-to-r from-emerald-950 to-neutral-900 w-70 h-70 backdrop-blur-xl rounded-4xl drop-shadow-xl drop-shadow-emerald-900/30 flex justify-center items-center border border-neutral-800" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="0">
                <img src="src/image/foto.png" class="w-36 h-36 bg-emerald-500/50 rounded-xl animate-pulse">
            </div>
            <div class="m-auto">
                <h2 class="font-bold text-2xl text-neutral-200 mb-3" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">Tentang Saya</h2>
                <p class="font-bold text-neutral-500 mb-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="400">Halo, saya Fadlan, lulusan Ilmu Komputer dengan minat di web development.
                Menguasai Python, PHP, JavaScript, HTML, CSS, serta berpengalaman dengan Laragon.
                Siap berkontribusi dan berkembang di bidang software development.</p>
                <div class="flex mt-2" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                    <a href="#" class="border border-neutral-500 p-2 m-2 font-bold text-neutral-500 rounded-xl px-5 hover:bg-emerald-500 hover:text-neutral-900 hover:scale-105 hover:-translate-y-1 hover:shadow-xl shadow-emerald-900/30 hover:border-none transition-all duration-300">Hubungi</a>
                    <a href="#" class="bg-emerald-500 p-2 m-2 rounded-xl font-bold text-neutral-900 hover:bg-orange-500 hover:text-neutral-200 hover:scale-105 hover:-translate-y-1 hover:shadow-xl shadow-emerald-900/30 transition-all duration-300">Lihat Proyek <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="mx-auto max-w-5xl h-screen -mt-30">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div>
                <h2 class="text-neutral-200 font-bold text-5xl mb-3" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="0">Mari Bekerja Sama</h2>
                <p class="text-neutral-500" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">Tertarik berdiskusi atau ingin memberikan masukan? Tinggalkan pesan, saya akan merespons secepatnya.</p>
                <form action="index.php" method="POST" class="grid grid-cols-1 gap-10 bg-neutral-800/30 backdrop-blur-xl p-5 m-5 border border-neutral-800 shadow-lg shadow-emerald-900/30 rounded-2xl" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                    <input type="text" name="nama" placeholder="Nama" class="text-neutral-400 bg-neutral-950 font-bold p-3 rounded-xl border border-neutral-800 focus:outline-none focus:border-emerald-500">
                    <input type="email" name="email" placeholder="Email" class="text-neutral-400 bg-neutral-950 font-bold p-3 rounded-xl border border-neutral-800 focus:outline-none focus:border-emerald-500">
                    <textarea name="pesan" placeholder="Isi Pesan" class="text-neutral-400 bg-neutral-950 font-bold p-3 rounded-xl border border-neutral-800 focus:outline-none focus:border-emerald-500"></textarea>
                    <input type="submit" name="form" class="bg-orange-500 p-3 rounded-xl font-bold text-neutral-200 hover:text-neutral-900 hover:bg-emerald-500 hover:-translate-y-1 hover:shadow-lg shadow-emerald-900/30 transition-all duration-300">
                </form>
            </div>
            <div class="grid grid-rows-2">
                <div class="bg-neutral-800/30 backdrop-blur-xl p-5 m-5 border border-neutral-800 shadow-lg shadow-emerald-900/30 rounded-2xl" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="800">
                    <h2 class="text-neutral-200 font-bold text-2xl mb-3">Mari Terhubung</h2>
                    <p class="text-neutral-500">Mari terhubung dan saling berbagi ide. Jangan ragu untuk menghubungi saya, saya siap merespons secepatnya.</p>
                    <div class="mt-7 flex">
                        <a href="https://github.com/Fadlan079" class="bg-neutral-900 text-neutral-200 rounded p-1 m-2 font-bold hover:bg-neutral-200 text-xl hover:text-neutral-900 hover:-translate-y-1 hover:shadow-lg shadow-emerald-900/30 transition-all duration-300"><i class="fa-brands fa-github"></i></a>
                        <a href="#" class="bg-sky-700 rounded p-1 m-2 font-bold text-neutral-200 hover:bg-neutral-200 hover:text-sky-700 text-xl hover:-translate-y-1 hover:shadow-lg shadow-emerald-900/30 transition-all duration-300"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWstptjhccStvXLcpRwqBXlZvFNkHJRlQMXlVcvjHsLhBBkwwwJdjpsgMWfhhxBwnzLNLqHNb" class="bg-red-500 rounded p-1 m-2 font-bold text-xl text-neutral-200 hover:bg-neutral-200 hover:text-red-500 hover:-translate-y-1 hover:shadow-lg shadow-emerald-900/30 transition-all duration-300"><i class="fa-solid fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="border border-neutral-700">
    <footer class="p-5 flex justify-between max-w-7xl mx-auto">
        <p class="text-neutral-500 font-bold">&copy; Fadlan Server. All rights reserved</p>
    </footer>
    <script>
        const navbar = document.getElementById("navbar");
        let lastScrollY = window.scrollY;

        window.addEventListener("scroll", () => {
            if (window.scrollY > lastScrollY) {
                navbar.classList.add("-translate-y-20");
                navbar.classList.remove("py-6");
            } else {
                navbar.classList.remove("-translate-y-20");
                navbar.classList.add("py-6");
            }

            lastScrollY = window.scrollY;
        });

        let clickcount = 0;
        const logo = document.getElementById("logo");
        const form = document.getElementById("form")
        const kembali = document.getElementById("kembali");

        logo.addEventListener("click",() => {
            clickcount++;
            if(clickcount === 7){
                form.classList.remove("opacity-0","scale-95","pointer-events-none");
                form.classList.add("opacity-100", "scale-100");

                clickcount = 0;
            }
        })

        kembali.onclick = function(){
            form.classList.remove("opacity-100","scale-100");
            form.classList.add("opacity-0", "scale-95","pointer-events-none");
        }

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