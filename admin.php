
<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['login'] !== true){
    header("location: login.php");
    exit();
}

require_once "koneksi.php";

$total_siswa = $conn->query("SELECT COUNT(*) AS total FROM siswa")->fetch_assoc()['total'];
$total_kelas = $conn->query("SELECT COUNT(DISTINCT kelas) AS total FROM siswa")->fetch_assoc()['total'];
$total_jurusan = $conn->query("SELECT COUNT(DISTINCT jurusan) AS total FROM siswa")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/svg+xml" href="assets/logo-sekolah.svg">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        html {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        html::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">

<div class="min-h-screen flex">

    <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-white border-r border-slate-200 -translate-x-full lg:translate-x-0 transition-transform duration-300 flex flex-col">

        <div class="p-6 border-b border-slate-100 flex items-center gap-3">
            <img src="assets/logo-sekolah.svg" class="w-11 h-11 object-contain" alt="Logo">
            <div>
                <h1 class="font-bold text-lg">Admin Panel</h1>
                <p class="text-xs text-slate-400">School Management</p>
            </div>
        </div>

        <div class="p-5 flex-1">
            <p class="text-xs font-bold text-slate-400 uppercase mb-4">Menu Utama</p>

            <nav class="space-y-2">
                <a href="admin.php" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-blue-600 text-white font-medium">
                    <i data-lucide="layout-dashboard"></i>
                    Dashboard
                </a>

                <a href="data_siswa.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition">
                    <i data-lucide="users"></i>
                    Data Siswa
                </a>

                <a href="tambah.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition">
                    <i data-lucide="user-plus"></i>
                    Tambah Data
                </a>
                <a href="index.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition">
                    <i data-lucide="house"></i>
                    Halaman Utama
                </a>
            </nav>
        </div>

        <div class="p-5 border-t border-slate-100">
            <a href="logout.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 transition">
                <i data-lucide="log-out"></i>
                Logout
            </a>
        </div>

    </aside>

    <div id="overlay" class="hidden fixed inset-0 bg-black/40 z-40 lg:hidden"></div>

    <main class="flex-1 min-w-0">

        <header class="h-20 bg-white border-b border-slate-200 px-5 md:px-8 flex items-center justify-between">

            <div class="flex items-center gap-4">
                <button id="menuBtn" class="lg:hidden">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>

                <div>
                    <h2 class="text-xl font-bold">Dashboard</h2>
                    <p class="text-xs text-slate-400">Ringkasan data sekolah</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="font-semibold text-sm">Administrator</p>
                    <p class="text-xs text-slate-400">Admin Sekolah</p>
                </div>

                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                    <i data-lucide="user"></i>
                </div>
            </div>

        </header>

        <div class="p-5 md:p-8">

            <div class="mb-8">
                <h2 class="text-2xl font-bold">Selamat Datang, Admin!</h2>
                <p class="text-sm text-slate-500 mt-2">Berikut ringkasan informasi data siswa sekolah.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5 mb-8">

                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-slate-500">Total Siswa</p>
                            <h3 class="text-3xl font-bold mt-3"><?= $total_siswa ?></h3>
                        </div>
                        <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center">
                            <i data-lucide="users" class="w-7 h-7"></i>
                        </div>
                    </div>
                    <p class="text-xs text-slate-400 mt-4">Jumlah seluruh siswa</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-slate-500">Total Kelas</p>
                            <h3 class="text-3xl font-bold mt-3"><?= $total_kelas ?></h3>
                        </div>
                        <div class="w-14 h-14 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center">
                            <i data-lucide="school" class="w-7 h-7"></i>
                        </div>
                    </div>
                    <p class="text-xs text-slate-400 mt-4">Jumlah kelas terdaftar</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-slate-500">Total Jurusan</p>
                            <h3 class="text-3xl font-bold mt-3"><?= $total_jurusan ?></h3>
                        </div>
                        <div class="w-14 h-14 bg-sky-100 text-sky-600 rounded-2xl flex items-center justify-center">
                            <i data-lucide="book-open" class="w-7 h-7"></i>
                        </div>
                    </div>
                    <p class="text-xs text-slate-400 mt-4">Jumlah jurusan tersedia</p>
                </div>

            </div>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

                <div class="p-6 flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                    <div>
                        <h3 class="font-bold text-lg">Data Siswa</h3>
                        <p class="text-sm text-slate-400 mt-1">Daftar seluruh siswa sekolah.</p>
                    </div>

                    <a href="data_siswa.php" class="inline-flex items-center justify-center gap-2 border border-slate-200 hover:bg-slate-50 text-slate-600 px-5 py-3 rounded-xl text-sm font-semibold transition">
                        <i data-lucide="users" class="w-4 h-4"></i>
                        Lihat Semua
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left whitespace-nowrap">
                        <thead class="bg-slate-50 text-slate-600 border-y border-slate-100">
                            <tr>
                                <th class="px-5 py-4">ID</th>
                                <th class="px-5 py-4">Foto</th>
                                <th class="px-5 py-4">NIS</th>
                                <th class="px-5 py-4">Nama</th>
                                <th class="px-5 py-4">Kelas</th>
                                <th class="px-5 py-4">Jurusan</th>
                                <th class="px-5 py-4">Alamat</th>
                                <th class="px-5 py-4">No. HP</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            <?php
                            $no = 1;
                            $data = $conn->query("SELECT * FROM siswa");

                            while($d = $data->fetch_assoc()){
                            ?>
                            <tr class="hover:bg-blue-50/50 transition">
                                <td class="px-5 py-4"><?= $no++ ?></td>
                                <td class="px-5 py-4">
                                    <img src="upload/<?= $d['foto'] ?>" class="w-11 h-11 rounded-full object-cover" alt="Foto siswa">
                                </td>
                                <td class="px-5 py-4"><?= $d['nis'] ?></td>
                                <td class="px-5 py-4 font-semibold"><?= $d['nama'] ?></td>
                                <td class="px-5 py-4">
                                    <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs"><?= $d['kelas'] ?></span>
                                </td>
                                <td class="px-5 py-4"><?= $d['jurusan'] ?></td>
                                <td class="px-5 py-4"><?= $d['alamat'] ?></td>
                                <td class="px-5 py-4"><?= $d['no_hp'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

            <p class="text-center text-xs text-slate-400 mt-8">© 2026 Admin Panel Sekolah</p>

        </div>

    </main>

</div>

<script>
lucide.createIcons();

const menuBtn = document.getElementById('menuBtn');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

menuBtn.addEventListener('click', () => {
    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
});

overlay.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
});
</script>

</body>
</html>
