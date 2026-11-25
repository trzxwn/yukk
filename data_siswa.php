
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
    <title>Data Siswa</title>
    <link rel="icon" type="image/svg+xml" href="assets/logo-sekolah.svg">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
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

                <a href="data_siswa.php" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-blue-600 text-white font-medium">
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
                    <h2 class="text-xl font-bold">Data Siswa</h2>
                    <p class="text-xs text-slate-400">Informasi data siswa sekolah</p>
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
                <h2 class="text-2xl font-bold">Daftar Seluruh Siswa</h2>
                <p class="text-sm text-slate-500 mt-2">Informasi seluruh siswa yang terdaftar di sekolah.</p>
            </div>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

                <div class="p-6 flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                    <div>
                        <h3 class="font-bold text-lg">Data Siswa</h3>
                        <p class="text-sm text-slate-400 mt-1">Daftar seluruh siswa sekolah.</p>
                    </div>

                    <a href="tambah.php" class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl text-sm font-semibold transition">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        Tambah Siswa
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
                                <th class="px-5 py-4">Aksi</th>
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

                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-2">

                                        <a href="edit.php?id=<?= $d['id'] ?>"
                                           class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition"
                                           title="Edit">
                                            <i data-lucide="pencil" class="w-4 h-4"></i>
                                        </a>

                                        <a href="hapus.php?id=<?= $d['id'] ?>"
                                           onclick="return confirm('Yakin ingin menghapus data siswa ini?')"
                                           class="p-2 text-red-500 bg-red-50 hover:bg-red-100 rounded-lg transition"
                                           title="Hapus">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </a>

                                    </div>
                                </td>

                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>
                </div>

                <div class="p-5 border-t border-slate-100 text-sm text-slate-400">
                    Menampilkan seluruh data siswa.
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
