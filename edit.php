
<?php
require_once "koneksi.php";

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM siswa WHERE id='$id'");
$d = $data->fetch_assoc();

if(isset($_POST['update'])){
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $foto = $d['foto'];

    if($_FILES['foto']['name']){
        $foto = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "upload/".$foto);
    }

    $conn->query("UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas', jurusan='$jurusan', alamat='$alamat', no_hp='$no_hp', foto='$foto' WHERE id='$id'");

    header("location: data_siswa.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
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

<div class="flex min-h-screen">

    <div id="overlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>

    <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-white border-r border-slate-200 -translate-x-full lg:translate-x-0 transition-transform duration-300 flex flex-col">
        <div class="p-6 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <img src="assets/logo-sekolah.svg" class="w-11 h-11 object-contain" alt="Logo">
                <div>
                    <h1 class="font-bold text-lg">Admin Panel</h1>
                    <p class="text-xs text-slate-500">School Management</p>
                </div>
            </div>
        </div>

        <nav class="p-4 space-y-2 flex-1">
            <a href="admin.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-100">
                <i data-lucide="layout-dashboard" class="w-5"></i>
                Dashboard
            </a>

            <a href="data_siswa.php" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-blue-600 text-white font-medium">
                <i data-lucide="users" class="w-5"></i>
                Data Siswa
            </a>

            <a href="tambah.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-100">
                <i data-lucide="user-plus" class="w-5"></i>
                Tambah Data
            </a>

            <a href="index.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 hover:bg-slate-100">
                <i data-lucide="house" class="w-5"></i>
                Halaman Utama
            </a>

        </nav>

        <div class="mt-auto p-4 border-t border-slate-100">
            <a href="logout.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50">
                <i data-lucide="log-out" class="w-5"></i>
                Logout
            </a>
        </div>
    </aside>

    <main class="flex-1 min-w-0">

        <header class="bg-white border-b border-slate-200 px-5 md:px-8 py-5 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button id="menuBtn" class="lg:hidden">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <div>
                    <h2 class="text-xl font-bold">Edit Data Siswa</h2>
                    <p class="text-sm text-slate-500">Perbarui informasi data siswa</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                    <i data-lucide="user"></i>
                </div>
                <div class="hidden sm:block">
                    <p class="text-sm font-semibold">Administrator</p>
                    <p class="text-xs text-slate-500">Admin Sekolah</p>
                </div>
            </div>
        </header>

        <div class="p-5 md:p-8 max-w-5xl mx-auto">

            <div class="mb-6">
                <a href="data_siswa.php" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-blue-600">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Kembali ke Data Siswa
                </a>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100">
                    <h3 class="font-bold text-lg">Informasi Siswa</h3>
                    <p class="text-sm text-slate-500 mt-1">Silakan ubah informasi siswa di bawah ini.</p>
                </div>

                <form method="POST" enctype="multipart/form-data" class="p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>
                            <label class="block text-sm font-medium mb-2">NIS</label>
                            <input type="text" name="nis" value="<?= $d['nis'] ?>" required class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Nama Lengkap</label>
                            <input type="text" name="nama" value="<?= $d['nama'] ?>" required class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Kelas</label>
                            <select name="kelas" required class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-blue-500">
                                <option value="X" <?= $d['kelas']=='X'?'selected':'' ?>>X</option>
                                <option value="XI" <?= $d['kelas']=='XI'?'selected':'' ?>>XI</option>
                                <option value="XII" <?= $d['kelas']=='XII'?'selected':'' ?>>XII</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Jurusan</label>
                            <select name="jurusan" required class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-blue-500">
                                <option value="IPA" <?= $d['jurusan']=='IPA'?'selected':'' ?>>IPA</option>
                                <option value="IPS" <?= $d['jurusan']=='IPS'?'selected':'' ?>>IPS</option>
                                <option value="Bahasa" <?= $d['jurusan']=='Bahasa'?'selected':'' ?>>Bahasa</option>
                                <option value="TKJ" <?= $d['jurusan']=='TKJ'?'selected':'' ?>>TKJ</option>
                                <option value="RPL" <?= $d['jurusan']=='RPL'?'selected':'' ?>>RPL</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">No. HP</label>
                            <input type="text" name="no_hp" value="<?= $d['no_hp'] ?>" required class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Foto Siswa</label>
                            <input type="file" name="foto" id="foto" accept="image/*" class="w-full text-sm border border-slate-200 rounded-xl p-2">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-2">Alamat</label>
                            <textarea name="alamat" rows="3" required class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-blue-500"><?= $d['alamat'] ?></textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-3">Foto Saat Ini</label>
                            <div class="flex items-center gap-4">
                                <img id="preview" src="upload/<?= $d['foto'] ?>" class="w-20 h-20 rounded-xl object-cover border border-slate-200">
                                <p class="text-sm text-slate-500">Pilih foto baru jika ingin mengganti foto siswa.</p>
                            </div>
                        </div>

                    </div>

                    <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-slate-100">
                        <a href="data_siswa.php" class="px-5 py-3 rounded-xl border border-slate-200 text-center text-sm font-medium hover:bg-slate-50">
                            Batal
                        </a>
                        <button type="submit" name="update" class="px-5 py-3 rounded-xl bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 flex items-center justify-center gap-2">
                            <i data-lucide="save" class="w-4 h-4"></i>
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>

            <footer class="text-center text-xs text-slate-400 mt-8">
                © 2026 Admin Panel Sekolah. All rights reserved.
            </footer>

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

    document.getElementById('foto').addEventListener('change', function(e) {
        if(e.target.files[0]){
            document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
        }
    });
</script>

</body>
</html>
