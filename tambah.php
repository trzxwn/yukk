
<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['login'] !== true){
    header("location: login.php");
    exit();
}

require_once "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
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
                <a href="admin.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition">
                    <i data-lucide="layout-dashboard"></i>
                    Dashboard
                </a>

                <a href="data_siswa.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition">
                    <i data-lucide="users"></i>
                    Data Siswa
                </a>

                <a href="tambah.php" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-blue-600 text-white font-medium">
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
                    <h2 class="text-xl font-bold">Tambah Data</h2>
                    <p class="text-xs text-slate-400">Tambahkan informasi siswa baru</p>
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
                <h2 class="text-2xl font-bold">Tambah Siswa Baru</h2>
                <p class="text-sm text-slate-500 mt-2">Silakan lengkapi formulir berikut untuk menambahkan data siswa.</p>
            </div>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

                <div class="p-6 md:p-8 border-b border-slate-100 flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                        <i data-lucide="user-plus" class="w-6 h-6"></i>
                    </div>

                    <div>
                        <h3 class="font-bold text-lg">Formulir Siswa</h3>
                        <p class="text-sm text-slate-400 mt-1">Lengkapi seluruh informasi siswa.</p>
                    </div>
                </div>

                <form action="proses_tambah.php" method="POST" enctype="multipart/form-data" class="p-6 md:p-8 space-y-6">

                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold mb-2">NIS</label>
                            <input type="text" name="nis" placeholder="Masukkan NIS" required
                                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-2">Nama Lengkap</label>
                            <input type="text" name="nama" placeholder="Masukkan nama siswa" required
                                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold mb-2">Kelas</label>
                            <select name="kelas" required
                                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-blue-500 transition">
                                <option value="">Pilih Kelas</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-2">Jurusan</label>
                            <select name="jurusan" required
                                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-blue-500 transition">
                                <option value="">Pilih Jurusan</option>
                                <option value="IPA">IPA</option>
                                <option value="IPS">IPS</option>
                                <option value="Bahasa">Bahasa</option>
                                <option value="TKJ">TKJ</option>
                                <option value="RPL">RPL</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Alamat</label>
                        <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required
                            class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition resize-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Nomor HP</label>
                        <input type="tel" name="no_hp" placeholder="Contoh: 08123456789" required
                            class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Foto Siswa</label>

                        <label class="flex flex-col items-center justify-center border-2 border-dashed border-slate-300 rounded-2xl p-8 cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition">

                            <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mb-3">
                                <i data-lucide="cloud-upload" class="w-9 h-9 text-blue-500"></i>
                            </div>

                            <span class="text-sm font-semibold text-slate-700">Klik untuk upload foto</span>
                            <span class="text-xs text-slate-400 mt-2">Format JPG, PNG, WEBP</span>

                            <input type="file" name="foto" id="foto" accept="image/*" required class="hidden">

                        </label>

                        <p id="namaFile" class="text-sm text-blue-600 mt-3"></p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 pt-5 border-t border-slate-100">

                        <button type="submit" name="tambah"
                            class="flex-1 flex justify-center items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 rounded-xl transition shadow-lg shadow-blue-100">
                            <i data-lucide="save" class="w-5 h-5"></i>
                            Simpan Data
                        </button>

                        <a href="admin.php"
                            class="px-8 py-3.5 text-center border border-slate-200 text-slate-600 font-semibold rounded-xl hover:bg-slate-50 transition">
                            Batal
                        </a>

                    </div>

                </form>

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

document.getElementById('foto').addEventListener('change', function() {
    const file = this.files[0];
    document.getElementById('namaFile').textContent =
        file ? 'Foto dipilih: ' + file.name : '';
});
</script>

</body>
</html>
