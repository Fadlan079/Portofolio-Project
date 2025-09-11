<!DOCTYPE html>
<html lang="en" class="scroll-smooth scroll-pt-20">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fadlan Server</title>
    <link rel="stylesheet" href="/src/css/output.css">
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
<body class="bg-neutral-950 font-sans">
    <section class="relative bg-carbon pt-36 pb-20 min-h-145 m-7 rounded-xl">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-neutral-950/30 to-neutral-950 rounded-xl"></div>
            <header class="flex justify-between">
                <div class="flex relative -top-35 m-3 left-19">
                    <a href="#home" class="bg-emerald-500 text-neutral-900 p-1 m-px rounded-lg font-bold text-2xl"><i class="fa-solid fa-code"></i></a>
                    <h3 class="text-neutral-200 font-bold p-1 m-px text-xl">Fadlan Server</h3>
                </div>
                <nav class="bg-neutral-950/70 px-5 py-6 z-50 fixed w-230 left-1/2 -translate-x-1/2 top-0 rounded-b-3xl shadow backdrop-blur-lg">
                    <div class="relative top-3 border border-neutral-700 flex justify-between max-w-7xl mx-auto px-6 rounded-xl">
                        <a href="#project" class="text-neutral-200 hover:text-emerald-500 transition-all duration-300 p-3">Project</a>
                        <a href="#about" class="text-neutral-200 hover:text-emerald-500 transition-all duration-300 p-3">About</a>
                        <a href="#" class="text-neutral-200 hover:text-emerald-500 transition-all duration-300 p-3">Contact</a>
                    </div>
                </nav>
                <div class="relative -top-37 m-3 right-43">
                    <span class="relative flex size-3">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-orange-400 opacity-75"></span>
                        <span class="relative inline-flex size-3 rounded-full bg-orange-500"></span>
                    </span>
                    <a href="#" class="text-emerald-500 border border-emerald-500 px-5 rounded-md hover:text-neutral-900 hover:bg-emerald-500 transition-all duration-300 p-1">Login</a>
                </div>
            </header>
            <section id="home" class="relative z-20 mx-auto max-w-7xl h-115">
                <div class="grid grid-cols-3 gap-10">
                    <div class="col-span-2 m-5 p-5 block justify-center items-center">
                        <div>
                            <hr class="border-4 border-emerald-500  rounded-full w-32 mb-3">
                            <h2 class="font-bold text-neutral-200 text-5xl mb-3">Eksplorasi Karya</h2>
                            <h2 class="font-bold text-emerald-500 text-5xl mb-3">bernuansa eksklusif</h2>
                            <p class="font-bold text-neutral-500 mb-3">Halo, saya Fadlan, lulusan Ilmu Komputer dengan minat di web development.
                            Menguasai Python, PHP, JavaScript, HTML, CSS, serta berpengalaman dengan Laragon.
                            Siap berkontribusi dan berkembang di bidang software development.</p>
                        </div>
                        <div class="flex">
                            <a href="#" class="bg-orange-500 p-2 m-2 rounded-xl text-neutral-200 font-bold hover:bg-emerald-500 hover:text-neutral-900 hover:scale-105 hover:-translate-y-1 hover:shadow-xl shadow-emerald-900/30 transition-all duration-300">Lihat Proyek <i class="fa-solid fa-right-to-bracket"></i></a>
                            <a href="#" class="border border-neutral-200 text-neutral-200 p-2 m-2 rounded-xl font-bold hover:border-emerald-500 hover:text-emerald-500 hover:scale-105 hover:-translate-y-1 hover:shadow-xl shadow-emerald-900/30 transition-all duration-300">Hubungi Saya</a>
                        </div>
                    </div>
                    <div class="col-span-1 bg-gradient-to-r from-emerald-950 to-neutral-900 w-90 h-90 backdrop-blur-xl rounded-4xl drop-shadow-xl drop-shadow-emerald-900/30 flex justify-center items-center border border-neutral-800">
                        <img src="/src/image/foto.png" class="bg-emerald-500/50 w-36 h-36 rounded-3xl shadow-2xl animate-pulse">
                    </div>
                </div>
            </section>
    </section>
    <section id="project" class="mx-auto max-w-7xl h-screen">
        <div class="grid grid-cols-3 gap-10">
            <div class="col-span-2 m-5 p-5 block text-left">
                <h2 class="font-bold text-neutral-200 text-5xl mb-3">Project List</h2>
                <p class="font-bold text-neutral-500">Beberapa proyek yang sedang di kembangkan</p>
            </div>
            <div class="col-span-1 m-5 p-5 block text-right">
                <a href="#" class="font-bold text-emerald-500 hover:text-orange-500 transition-colors duration-300">Show All</a>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-10 mb-20">
            <a href="#" class="group block">
                <div class="bg-neutral-900/30 backdrop-blur-md border border-neutral-800 shadow-lg rounded-xl shadow-emerald-900/30 m-px group-hover:shadow-xl group-hover:shadow-emerald-900/30 group-hover:-translate-y-5 transition-all duration-300">
                    <div class="h-1 bg-emerald-500 rounded-xl group-hover:bg-orange-500"></div>
                    <img src="/src/image/ilustration.jpg" class="w-full h-50 object-cover rounded-t-lg blur-xs">
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
                    <img src="/src/image/ilustration.jpg" class="w-full h-50 object-cover rounded-t-lg blur-xs">
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
                    <img src="/src/image/ilustration.jpg" class="w-full h-50 object-cover rounded-t-lg blur-xs">
                    <div class="p-7">
                        <h3 class="text-neutral-300">Judul Proyek</h3>
                        <p class="text-neutral-500">Belum Ada Deskripsi Yang di isi</p>
                        <p class="text-emerald-500 group-hover:text-orange-500 transition-all duration-300"> <i class="fa-solid fa-link"></i>Lihat Repo</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="grid grid-cols-4 gap-10">
            <div class="shadow-lg shadow-emerald-900/30 rounded-xl border border-neutral-800 block text-center p-5">
                <h2 class="font-bold text-emerald-500 text-xl mb-3">15</h2>
                <p class="text-neutral-500 text-lg">Total Proyek</p>
            </div>
                    <div class="shadow-lg shadow-emerald-900/30 rounded-xl border border-neutral-800 block text-center p-5">
                <h2 class="font-bold text-emerald-500 text-xl mb-3">15</h2>
                <p class="text-neutral-500 text-lg">Total Proyek</p>
            </div>
                    <div class="shadow-lg shadow-emerald-900/30 rounded-xl border border-neutral-800 block text-center p-5">
                <h2 class="font-bold text-emerald-500 text-xl mb-3">15</h2>
                <p class="text-neutral-500 text-lg">Total Proyek</p>
            </div>
                    <div class="shadow-lg shadow-emerald-900/30 rounded-xl border border-neutral-800 block text-center p-5">
                <h2 class="font-bold text-emerald-500 text-xl mb-3">15</h2>
                <p class="text-neutral-500 text-lg">Total Proyek</p>
            </div>
        </div>
    </section>
    <section id="about" class="mx-auto max-w-5xl h-screen mt-10">
        <div class="grid grid-cols-2 gap-10">
            <div class="bg-gradient-to-r from-emerald-950 to-neutral-900 w-70 h-70 backdrop-blur-xl rounded-4xl drop-shadow-xl drop-shadow-emerald-900/30 flex justify-center items-center border border-neutral-800">
                <img src="/src/image/foto.png" class="w-36 h-36 bg-emerald-500/50 rounded-xl animate-pulse">
            </div>
            <div class="m-auto">
                <h2 class="font-bold text-2xl text-neutral-200">Tentang Saya</h2>
                <p class="font-bold text-neutral-500 mb-3">Halo, saya Fadlan, lulusan Ilmu Komputer dengan minat di web development.
                Menguasai Python, PHP, JavaScript, HTML, CSS, serta berpengalaman dengan Laragon.
                Siap berkontribusi dan berkembang di bidang software development.</p>
            </div>
        </div>
    </section>
</body>
</html>