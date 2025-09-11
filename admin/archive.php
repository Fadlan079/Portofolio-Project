<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fadlan Server — Portfolio</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Montserrat:wght@600;800&display=swap" rel="stylesheet">
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Fonts */
    .font-body { font-family: "Inter", system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", sans-serif; }
    .font-heading { font-family: "Montserrat", ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", sans-serif; }

    /* Carbon texture */
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

    /* Soft card shadow */
    .elevated { box-shadow: 0 12px 24px rgba(16, 185, 129, 0.08); }

    /* Simple fade-up animation */
    @keyframes fadeUp { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
    .fade-up { animation: fadeUp .6s ease-out both; }
  </style>
</head>
<body class="bg-neutral-950 text-gray-200 font-body">
  <!-- NAVBAR -->
  <header class="fixed inset-x-0 top-0 z-50">
    <div class="mx-auto max-w-7xl px-4">
      <nav class="mt-4 flex items-center justify-between rounded-2xl bg-neutral-900/70 backdrop-blur supports-[backdrop-filter]:bg-neutral-900/60 border border-neutral-800 px-4 py-2">
        <a href="#" class="flex items-center gap-3">
          <span class="grid place-items-center h-10 w-10 rounded-xl bg-gradient-to-br from-emerald-600 to-emerald-400 text-neutral-900 font-heading text-lg font-extrabold">FS</span>
          <span class="font-heading text-lg tracking-wide">Fadlan Server</span>
        </a>
        <button id="menuBtn" class="md:hidden px-3 py-2 rounded-lg border border-neutral-700">Menu</button>
        <ul id="menu" class="hidden md:flex items-center gap-6 text-sm">
          <li><a href="#projects" class="hover:text-emerald-400 transition-colors">Projects</a></li>
          <li><a href="#about" class="hover:text-emerald-400 transition-colors">About</a></li>
          <li><a href="#contact" class="hover:text-emerald-400 transition-colors">Contact</a></li>
          <li><a href="/admin/login.php" class="text-xs px-3 py-1.5 rounded-lg border border-emerald-600 text-emerald-400 hover:bg-emerald-600 hover:text-neutral-900 transition">Admin Login</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- HERO -->
  <section class="relative bg-carbon pt-36 md:pt-40 pb-20">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-neutral-950/40 to-neutral-950"></div>
    <div class="mx-auto max-w-7xl px-4 relative">
      <div class="grid md:grid-cols-2 items-center gap-10">
        <div class="fade-up">
          <div class="h-1.5 w-28 bg-emerald-500 rounded-full mb-6"></div>
          <h1 class="font-heading text-4xl md:text-5xl font-extrabold leading-tight">
            Eksplorasi Karya
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-emerald-600">bernuansa eksklusif</span>
          </h1>
          <p class="mt-4 text-gray-400 max-w-xl">Halo, saya Fadlan Firdaus. Saya membangun sistem web modern dengan presisi desain—terinspirasi oleh elegansi McLaren Senna, tetap dengan identitas personal.</p>
          <div class="mt-8 flex items-center gap-4">
            <a href="#projects" class="inline-flex items-center gap-2 rounded-xl bg-orange-600 px-6 py-3 font-semibold text-white hover:bg-emerald-600 transition-colors">
              Lihat Proyek
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"><path d="M13.5 4.5l6 6-6 6m6-6H4.5"/></svg>
            </a>
            <a href="#contact" class="inline-flex items-center gap-2 rounded-xl border border-neutral-700 px-6 py-3 font-medium text-gray-300 hover:border-emerald-600 hover:text-emerald-400 transition-colors">Hubungi Saya</a>
          </div>
        </div>
        <div class="fade-up md:justify-self-end">
          <div class="relative h-72 w-72 md:h-[22rem] md:w-[22rem] rounded-3xl bg-neutral-900 border border-neutral-800 elevated grid place-items-center">
            <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-emerald-600/10 to-transparent"></div>
            <div class="h-28 w-28 rounded-2xl bg-gradient-to-br from-emerald-600 to-emerald-400 text-neutral-900 font-heading text-4xl font-extrabold grid place-items-center scale-110 animate-pulse">FS</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PROJECTS -->
  <section id="projects" class="py-20 bg-neutral-950">
    <div class="mx-auto max-w-7xl px-4">
      <div class="flex items-end justify-between gap-4 mb-10">
        <div>
          <h2 class="font-heading text-2xl md:text-3xl font-extrabold">Proyek Pilihan</h2>
          <p class="text-gray-400 mt-1">Beberapa karya terbaru yang saya kembangkan.</p>
        </div>
        <a href="#" class="hidden md:inline-flex items-center gap-2 text-sm text-emerald-400 hover:text-emerald-300">Lihat Semua</a>
      </div>

      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card -->
        <article class="group rounded-2xl border border-neutral-800 bg-neutral-900 overflow-hidden elevated">
          <div class="aspect-[16/9] bg-gradient-to-br from-neutral-800 to-neutral-900 grid place-items-center">
            <svg class="h-10 w-10 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 7h16M4 12h16M4 17h10"/></svg>
          </div>
          <div class="p-5">
            <h3 class="font-semibold">Dashboard Analytics</h3>
            <p class="mt-1 text-sm text-gray-400">Panel analitik real-time dengan arsitektur modular dan desain elegan.</p>
            <div class="mt-4 flex items-center justify-between text-xs text-gray-400">
              <span class="inline-flex items-center gap-1"><span class="h-2 w-2 rounded-full bg-emerald-500"></span> Published</span>
              <a class="text-emerald-400 group-hover:text-orange-400 transition-colors" href="#">Detail →</a>
            </div>
          </div>
        </article>

        <!-- Card -->
        <article class="group rounded-2xl border border-neutral-800 bg-neutral-900 overflow-hidden elevated">
          <div class="aspect-[16/9] bg-gradient-to-br from-neutral-800 to-neutral-900 grid place-items-center">
            <svg class="h-10 w-10 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 6v12M6 12h12"/></svg>
          </div>
          <div class="p-5">
            <h3 class="font-semibold">Project Manager</h3>
            <p class="mt-1 text-sm text-gray-400">Aplikasi pengelolaan proyek dengan sistem arsip dan notifikasi.</p>
            <div class="mt-4 flex items-center justify-between text-xs text-gray-400">
              <span class="inline-flex items-center gap-1"><span class="h-2 w-2 rounded-full bg-emerald-500"></span> Published</span>
              <a class="text-emerald-400 group-hover:text-orange-400 transition-colors" href="#">Detail →</a>
            </div>
          </div>
        </article>

                    <div class="grid grid-cols-3 gap-10">
                <a href="#" class="group block">
                    <div class="bg-neutral-900/30 backdrop-blur-md border border-neutral-800 shadow-lg rounded-lg shadow-emerald-900/30 m-px  group-hover:shadow-xl group-hover:shadow-emerald-900/30 group-hover:-translate-y-5 transition-all duration-300">
                        <div class="h-1 bg-emerald-500 rounded-t-lg group-hover:bg-orange-500 transition-all duration-300"></div>
                        <img src="/src/image/ilustration.jpg" class="w-full h-50 object-cover rounded-t-lg blur-xs">
                        <div class="p-7">
                            <h3 class="text-neutral-300">Judul Proyek</h3>
                            <p class="text-neutral-500">Belum Ada Deskripsi Yang di isi</p>
                            <p class="text-emerald-500 group-hover:text-orange-500 transition-all duration-300"> <i class="fa-solid fa-link"></i>Lihat Repo</p>
                        </div>
                    </div>
                </a>

                <div class="block bg-neutral-900/30 backdrop-blur-md border border-neutral-800 shadow-lg rounded-lg shadow-emerald-900/30 m-px  hover:shadow-xl hover:shadow-emerald-900/30 hover:-translate-y-5 transition-all duration-300">
                    <div class="h-1 bg-emerald-500 rounded-t-lg"></div>
                    <img src="/src/image/ilustration.jpg" class="w-full h-50 object-cover rounded-t-lg blur-xs">
                    <div class="p-7">
                        <h3 class="text-neutral-300">Judul Proyek</h3>
                        <p class="text-neutral-500">Belum Ada Deskripsi Yang di isi</p>
                        <a href="#" class="text-emerald-400 hover:text-emerald-600"> <i class="fa-solid fa-link"></i>Lihat Repo</a>
                    </div>
                </div>
                <div class="block bg-neutral-900/30 backdrop-blur-md border border-neutral-800 shadow-lg rounded-lg shadow-emerald-900/30 m-px  hover:shadow-xl hover:shadow-emerald-900/30 hover:-translate-y-5 transition-all duration-300">
                    <div class="h-1 bg-emerald-500 rounded-t-lg"></div>
                    <img src="/src/image/ilustration.jpg" class="w-full h-50 object-cover rounded-t-lg blur-xs">
                    <div class="p-7">
                        <h3 class="text-neutral-300">Judul Proyek</h3>
                        <p class="text-neutral-500">Belum Ada Deskripsi Yang di isi</p>
                        <a href="#" class="text-emerald-400 hover:text-emerald-600"> <i class="fa-solid fa-link"></i>Lihat Repo</a>
                    </div>
                </div>
            </div>

        <!-- Card -->
        <article class="group rounded-2xl border border-neutral-800 bg-neutral-900 overflow-hidden elevated">
          <div class="aspect-[16/9] bg-gradient-to-br from-neutral-800 to-neutral-900 grid place-items-center">
            <svg class="h-10 w-10 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 12h16M12 4v16"/></svg>
          </div>
          <div class="p-5">
            <h3 class="font-semibold">UI Components Library</h3>
            <p class="mt-1 text-sm text-gray-400">Koleksi komponen Tailwind bergaya eksklusif untuk proyek cepat.</p>
            <div class="mt-4 flex items-center justify-between text-xs text-gray-400">
              <span class="inline-flex items-center gap-1"><span class="h-2 w-2 rounded-full bg-orange-500"></span> Draft</span>
              <a class="text-emerald-400 group-hover:text-orange-400 transition-colors" href="#">Detail →</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- STATS (optional public) -->
  <section class="py-14 bg-neutral-950/95">
    <div class="mx-auto max-w-7xl px-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
      <div class="rounded-2xl border border-neutral-800 bg-neutral-900 p-6 text-center elevated">
        <p class="text-3xl font-extrabold text-emerald-400 font-heading">15</p>
        <p class="text-sm text-gray-400 mt-1">Total Proyek</p>
      </div>
      <div class="rounded-2xl border border-neutral-800 bg-neutral-900 p-6 text-center elevated">
        <p class="text-3xl font-extrabold text-emerald-400 font-heading">12.4K</p>
        <p class="text-sm text-gray-400 mt-1">Page Views</p>
      </div>
      <div class="rounded-2xl border border-neutral-800 bg-neutral-900 p-6 text-center elevated">
        <p class="text-3xl font-extrabold text-emerald-400 font-heading">3+</p>
        <p class="text-sm text-gray-400 mt-1">Tahun Berkarya</p>
      </div>
      <div class="rounded-2xl border border-neutral-800 bg-neutral-900 p-6 text-center elevated">
        <p class="text-3xl font-extrabold text-emerald-400 font-heading">A+</p>
        <p class="text-sm text-gray-400 mt-1">Quality Focus</p>
      </div>
    </div>
  </section>

  <!-- ABOUT -->
  <section id="about" class="py-20 bg-neutral-950">
    <div class="mx-auto max-w-5xl px-4 grid md:grid-cols-3 gap-8 items-center">
      <div class="md:col-span-1 md:justify-self-center">
        <div class="h-36 w-36 rounded-3xl bg-gradient-to-br from-emerald-600 to-emerald-400 text-neutral-900 grid place-items-center font-heading text-3xl font-extrabold">FF</div>
      </div>
      <div class="md:col-span-2">
        <h2 class="font-heading text-2xl md:text-3xl font-extrabold">Tentang Saya</h2>
        <p class="text-gray-400 mt-3 leading-relaxed">Saya Fadlan Firdaus, membangun aplikasi web dengan pendekatan presisi dan perhatian pada detail visual. Bagi saya, performa dan estetika berjalan beriringan—seperti cockpit supercar yang dibuat untuk kecepatan dan kenyamanan sekaligus.</p>
        <div class="mt-6 flex gap-3">
          <a href="#contact" class="rounded-xl border border-neutral-700 px-5 py-2 text-sm hover:border-emerald-600 hover:text-emerald-400 transition-colors">Hubungi</a>
          <a href="#projects" class="rounded-xl bg-emerald-600 px-5 py-2 text-sm text-neutral-900 font-semibold hover:bg-emerald-500 transition">Lihat Proyek</a>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACT -->
  <section id="contact" class="py-20 bg-neutral-950">
    <div class="mx-auto max-w-4xl px-4 grid md:grid-cols-2 gap-8 items-start">
      <div>
        <h2 class="font-heading text-2xl md:text-3xl font-extrabold">Mari Bekerja Sama</h2>
        <p class="text-gray-400 mt-2">Tertarik berdiskusi atau ingin memberikan masukan? Tinggalkan pesan, saya akan merespons secepatnya.</p>
        <div class="mt-8 rounded-2xl border border-neutral-800 bg-neutral-900 p-6 elevated">
          <form action="#" method="post" class="grid gap-4">
            <input type="text" name="nama" placeholder="Nama" required class="w-full px-4 py-3 rounded-lg bg-neutral-950 border border-neutral-800 text-gray-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
            <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-3 rounded-lg bg-neutral-950 border border-neutral-800 text-gray-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
            <textarea name="pesan" rows="4" placeholder="Pesan" class="w-full px-4 py-3 rounded-lg bg-neutral-950 border border-neutral-800 text-gray-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500"></textarea>
            <button type="submit" class="mt-2 inline-flex items-center justify-center rounded-xl bg-orange-600 px-6 py-3 font-semibold text-white hover:bg-emerald-600 transition-colors">Kirim Pesan</button>
          </form>
        </div>
      </div>
      <div class="rounded-2xl border border-neutral-800 bg-neutral-900 p-6 elevated">
        <h3 class="font-semibold">Info Singkat</h3>
        <ul class="mt-4 space-y-3 text-gray-300">
          <li class="flex items-center gap-3"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Berbasis di Indonesia</li>
          <li class="flex items-center gap-3"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Web Development • UI Design</li>
          <li class="flex items-center gap-3"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Open for collaboration</li>
        </ul>
        <div class="mt-6 flex gap-3 text-sm text-gray-400">
          <a href="#" class="hover:text-emerald-400">GitHub</a>
          <span>•</span>
          <a href="#" class="hover:text-emerald-400">LinkedIn</a>
          <span>•</span>
          <a href="#" class="hover:text-emerald-400">Email</a>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="border-t border-neutral-800 py-8 bg-neutral-950">
    <div class="mx-auto max-w-7xl px-4 flex flex-col md:flex-row items-center justify-between gap-3 text-sm text-gray-400">
      <p>© <span id="year"></span> Fadlan Server. Terinspirasi oleh eksklusifitas McLaren Senna.</p>
      <a href="/admin/login.php" class="inline-flex items-center gap-2 text-emerald-400 hover:text-emerald-300">Admin Login →</a>
    </div>
  </footer>

  <!-- Scripts -->
  <script>
    // year
    document.getElementById('year').textContent = new Date().getFullYear();

    // simple mobile menu toggle
    const btn = document.getElementById('menuBtn');
    const menu = document.getElementById('menu');
    if (btn) {
      btn.addEventListener('click', () => menu.classList.toggle('hidden'));
    }

    // smooth scroll for in-page links
    document.querySelectorAll('a[href^="#"]').forEach(a => {
      a.addEventListener('click', e => {
        const id = a.getAttribute('href');
        const el = document.querySelector(id);
        if (el) {
          e.preventDefault();
          window.scrollTo({ top: el.offsetTop - 80, behavior: 'smooth' });
        }
      });
    });
  </script>
</body>
</html>
