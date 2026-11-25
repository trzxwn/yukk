
<?php
require_once "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Website Sekolah</title>
    <link rel="icon" type="image/svg+xml" href="assets/logo-sekolah.svg">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        html {
            scroll-behavior: smooth;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        html::-webkit-scrollbar {
            display: none;
        }

        .hero-screen {
            min-height: calc(100vh - 5rem);
        }

    </style>
</head>

<body class="bg-white text-slate-800">

<!-- NAVBAR -->
<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-xl border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-5 lg:px-8">

        <div class="flex items-center justify-between h-20">

            <!-- LOGO -->
            <a href="#home" class="flex items-center gap-3">
                <img src="assets/logo-sekolah.svg"
                     class="w-12 h-12 object-contain"
                     alt="Logo Sekolah">

                <div>
                    <h1 class="font-bold text-lg text-slate-900 leading-tight">Nzxwn</h1>
                    <p class="text-xs text-slate-500">Berkarakter dan Berprestasi</p>
                </div>
            </a>

            <!-- DESKTOP MENU -->
            <div class="hidden lg:flex items-center gap-8 text-sm font-medium">
                <a href="#home" class="site-nav-link text-slate-600 hover:text-blue-600 transition">Beranda</a>
                <a href="#tentang" class="site-nav-link text-slate-600 hover:text-blue-600 transition">Tentang</a>
                <a href="#data-siswa" class="site-nav-link text-slate-600 hover:text-blue-600 transition">Data Siswa</a>
                <a href="#kontak" class="site-nav-link text-slate-600 hover:text-blue-600 transition">Kontak</a>
            </div>

            <!-- LOGIN -->
            <div class="hidden lg:block">
                <a href="login.php"
                   class="px-6 py-2.5 bg-blue-600 text-white font-semibold rounded-full hover:bg-blue-700 shadow-lg shadow-blue-200 transition">
                    Login Sebagai Admin
                </a>
            </div>

            <!-- MOBILE BUTTON -->
            <button id="menuBtn" class="lg:hidden p-2 text-slate-700">
                <i data-lucide="menu" class="w-7 h-7"></i>
            </button>

        </div>

        <!-- MOBILE MENU -->
        <div id="mobileMenu" class="hidden lg:hidden pb-5 space-y-3">
            <a href="#home" class="site-nav-link block py-2 text-slate-600 hover:text-blue-600 transition">Beranda</a>
            <a href="#tentang" class="site-nav-link block py-2 text-slate-600 hover:text-blue-600 transition">Tentang</a>
            <a href="#data-siswa" class="site-nav-link block py-2 text-slate-600 hover:text-blue-600 transition">Data Siswa</a>
            <a href="#kontak" class="site-nav-link block py-2 text-slate-600 hover:text-blue-600 transition">Kontak</a>

            <a href="login.php"
               class="block text-center py-3 bg-blue-600 text-white rounded-xl">
                Login Sebagai Admin
            </a>
        </div>

    </div>
</nav>


<!-- HERO -->
<section id="home" class="hero-screen relative isolate flex items-center overflow-hidden bg-blue-950">
    <img
        src="https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=2000&q=90"
        alt="Gedung sekolah"
        class="absolute inset-0 h-full w-full object-cover object-center">

    <div class="absolute inset-0 bg-slate-950/60"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-950/90 via-blue-950/65 to-blue-950/20"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-5 lg:px-8 py-16 md:py-24">
        <div class="max-w-3xl space-y-7">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-semibold text-white backdrop-blur">
                <span class="w-2 h-2 rounded-full bg-blue-300"></span>
                Selamat Datang di Website Resmi Sekolah
            </div>

            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-extrabold leading-tight text-white">
                Membangun Generasi
                <span class="text-blue-300">Cerdas dan Berprestasi.</span>
            </h1>

            <p class="max-w-xl text-base leading-relaxed text-white/85 md:text-lg">
                Mewujudkan lingkungan pendidikan yang berkualitas,
                inovatif, kreatif, serta membentuk karakter generasi
                muda untuk masa depan yang lebih baik.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="#tentang"
                   class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-7 py-3.5 font-semibold text-white shadow-lg transition hover:-translate-y-1 hover:bg-blue-700">
                    Jelajahi Sekolah
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>

                <a href="#data-siswa"
                   class="inline-flex items-center gap-2 rounded-xl border border-white/50 bg-white/10 px-7 py-3.5 font-semibold text-white backdrop-blur transition hover:bg-white/20">
                    Data Siswa
                </a>
            </div>
        </div>
    </div>
</section>


<!-- STATISTIK -->
<section class="relative -mt-1">

    <div class="max-w-7xl mx-auto px-5 lg:px-8 py-10">

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

            <div class="bg-white border border-slate-100 shadow-sm rounded-2xl p-6 text-center hover:shadow-lg transition">
                <i data-lucide="users" class="w-8 h-8 text-blue-600 mx-auto mb-3"></i>
                <h3 class="text-3xl font-extrabold text-slate-800">850+</h3>
                <p class="text-sm text-slate-500 mt-1">Jumlah Siswa</p>
            </div>

            <div class="bg-white border border-slate-100 shadow-sm rounded-2xl p-6 text-center hover:shadow-lg transition">
                <i data-lucide="graduation-cap" class="w-8 h-8 text-blue-600 mx-auto mb-3"></i>
                <h3 class="text-3xl font-extrabold text-slate-800">45+</h3>
                <p class="text-sm text-slate-500 mt-1">Tenaga Pendidik</p>
            </div>

            <div class="bg-white border border-slate-100 shadow-sm rounded-2xl p-6 text-center hover:shadow-lg transition">
                <i data-lucide="book-open" class="w-8 h-8 text-blue-600 mx-auto mb-3"></i>
                <h3 class="text-3xl font-extrabold text-slate-800">24+</h3>
                <p class="text-sm text-slate-500 mt-1">Ruang Kelas</p>
            </div>

            <div class="bg-white border border-slate-100 shadow-sm rounded-2xl p-6 text-center hover:shadow-lg transition">
                <i data-lucide="trophy" class="w-8 h-8 text-blue-600 mx-auto mb-3"></i>
                <h3 class="text-3xl font-extrabold text-slate-800">50+</h3>
                <p class="text-sm text-slate-500 mt-1">Prestasi</p>
            </div>

        </div>

    </div>
</section>


<!-- TENTANG -->
<section id="tentang" class="py-20 bg-slate-50">

    <div class="max-w-7xl mx-auto px-5 lg:px-8">

        <div class="grid lg:grid-cols-2 gap-14 items-center">

            <div class="relative">

                <img
                    src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=1200&q=85"
                    alt="Lingkungan sekolah"
                    class="rounded-3xl shadow-xl w-full h-[350px] md:h-[430px] object-cover">

                <div class="absolute -bottom-6 -right-4 bg-blue-600 text-white rounded-2xl p-6 shadow-xl">
                    <p class="text-3xl font-bold">100%</p>
                    <p class="text-sm text-blue-100">Semangat Belajar</p>
                </div>

            </div>

            <div class="space-y-6">

                <span class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                    Tentang Kami
                </span>

                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 leading-tight">
                    Menciptakan Pendidikan yang Berkualitas dan Berkarakter
                </h2>

                <p class="text-slate-600 leading-relaxed">
                    Nama Sekolah merupakan lembaga pendidikan yang
                    berkomitmen untuk memberikan pelayanan pendidikan
                    terbaik kepada seluruh peserta didik.
                </p>

                <p class="text-slate-600 leading-relaxed">
                    Kami percaya bahwa setiap siswa memiliki potensi
                    untuk berkembang. Dengan lingkungan belajar yang
                    nyaman dan tenaga pendidik profesional, kami
                    berupaya menciptakan generasi yang unggul.
                </p>

                <a href="#data-siswa"
                   class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                    Lihat Data Siswa
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>

            </div>

        </div>

    </div>
</section>


<!-- DATA SISWA -->
<section id="data-siswa" class="py-20">
    <div class="max-w-7xl mx-auto px-5 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-blue-600 font-semibold text-sm">INFORMASI PESERTA DIDIK</span>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mt-3">Data Siswa</h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $data = $conn->query("SELECT * FROM siswa LIMIT 3");

            while ($d = $data->fetch_assoc()) {
            ?>
                <div class="h-full bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm hover:-translate-y-1 hover:shadow-xl transition duration-300">
                    <div class="relative h-64 overflow-hidden bg-blue-50">
                        <img src="upload/<?= $d['foto'] ?>"
                             class="w-full h-full object-cover object-center"
                             alt="Foto siswa">
                        <span class="absolute right-4 top-4 z-20 rounded-full bg-white/90 px-3 py-1.5 text-xs font-semibold text-blue-700 shadow-sm">
                            Kelas <?= $d['kelas'] ?>
                        </span>
                    </div>

                    <div class="flex flex-col p-5">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-blue-600">Profil Siswa</p>
                            <h3 class="mt-2 break-words text-lg font-bold text-slate-900"><?= $d['nama'] ?></h3>
                            <p class="mt-1 text-sm text-slate-500">NIS: <?= $d['nis'] ?></p>
                        </div>

                        <div class="mt-5 grid grid-cols-2 gap-3 border-t border-slate-100 pt-4">
                            <div class="rounded-xl bg-slate-50 p-3">
                                <p class="text-xs font-medium text-slate-400">Jurusan</p>
                                <p class="mt-1 break-words text-sm font-semibold text-slate-700"><?= $d['jurusan'] ?></p>
                            </div>
                            <div class="rounded-xl bg-slate-50 p-3">
                                <p class="text-xs font-medium text-slate-400">No. HP</p>
                                <p class="mt-1 break-words text-sm font-semibold text-slate-700"><?= $d['no_hp'] ?></p>
                            </div>
                            <div class="col-span-2 rounded-xl bg-slate-50 p-3">
                                <p class="text-xs font-medium text-slate-400">Alamat</p>
                                <p class="mt-1 break-words text-sm font-semibold text-slate-700"><?= $d['alamat'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="mt-10 text-center">
            <a href="login.php" class="inline-flex items-center gap-2 font-semibold text-blue-600 hover:text-blue-700 transition">
                Lihat semua data
                <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </a>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer id="kontak" class="bg-slate-950 text-white pt-16 pb-8">

    <div class="max-w-7xl mx-auto px-5 lg:px-8">

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10 pb-12">

            <div>

                <div class="flex items-center gap-3 mb-5">

                    <img src="assets/logo-sekolah.svg"
                         class="w-12 h-12 object-contain bg-white rounded-full p-1"
                         alt="Logo">

                    <h3 class="font-bold text-lg">Nzxwn</h3>

                </div>

                <p class="text-slate-400 text-sm leading-relaxed">
                    Mewujudkan generasi cerdas, kreatif,
                    berkarakter, dan berprestasi.
                </p>

            </div>


            <div>

                <h3 class="font-bold text-lg mb-5">Navigasi</h3>

                <div class="space-y-3 text-sm text-slate-400">

                    <a href="#home" class="block hover:text-blue-400">Beranda</a>
                    <a href="#tentang" class="block hover:text-blue-400">Tentang Sekolah</a>
                    <a href="#data-siswa" class="block hover:text-blue-400">Data Siswa</a>
                    <a href="login.php" class="block hover:text-blue-400">Login Admin</a>

                </div>

            </div>


            <div>

                <h3 class="font-bold text-lg mb-5">Hubungi Kami</h3>

                <div class="space-y-4 text-sm text-slate-400">

                    <p class="flex gap-3">
                        <i data-lucide="map-pin" class="w-5 h-5 text-blue-400 shrink-0"></i>
                        Alamat sekolah, Indonesia
                    </p>

                    <p class="flex gap-3">
                        <i data-lucide="phone" class="w-5 h-5 text-blue-400 shrink-0"></i>
                        08XX-XXXX-XXXX
                    </p>

                    <p class="flex gap-3">
                        <i data-lucide="mail" class="w-5 h-5 text-blue-400 shrink-0"></i>
                        info@sekolah.sch.id
                    </p>

                </div>

            </div>

        </div>


        <div class="border-t border-slate-800 pt-7 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-slate-500">

            <p>© <span id="year"></span> Nzxwn. All rights reserved.</p>

            <p>Designed with care for education.</p>

        </div>

    </div>

</footer>


<!-- JAVASCRIPT -->
<script>

    lucide.createIcons();

    // MOBILE MENU
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    });

    // MENU AKTIF
    const navLinks = document.querySelectorAll('.site-nav-link');

    function updateActiveNav(hash) {
        navLinks.forEach(link => {
            const active = link.getAttribute('href') === hash;
            link.classList.toggle('text-blue-600', active);
            link.classList.toggle('text-slate-600', !active);

            if (active) {
                link.setAttribute('aria-current', 'location');
            } else {
                link.removeAttribute('aria-current');
            }
        });
    }

    navLinks.forEach(link => {
        link.addEventListener('click', () => updateActiveNav(link.getAttribute('href')));
    });

    window.addEventListener('hashchange', () => {
        updateActiveNav(window.location.hash || '#home');
    });

    updateActiveNav(window.location.hash || '#home');

    // TAHUN OTOMATIS
    document.getElementById('year').textContent = new Date().getFullYear();

</script>

</body>
</html>
