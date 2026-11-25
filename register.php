<?php
    require_once "koneksi.php"
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sekolah</title>
    <link rel="icon" type="image/svg+xml" href="assets/logo-sekolah.svg">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-50 flex items-center justify-center p-5">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8 md:p-10">

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img
                src="assets/logo-sekolah.svg"
                alt="Logo Sekolah"
                class="w-20 h-20 object-contain"
            >
        </div>

        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-slate-800">
                Create Account
            </h1>

            <p class="text-slate-500 mt-2 text-sm">
                Silakan isi data untuk membuat akun baru.
            </p>
        </div>

        <!-- Form -->
        <form action="proses_register.php" method="POST" class="space-y-5">

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    placeholder="Masukkan username"
                    required
                    class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition"
                >
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Password
                </label>

                <div class="relative">
                    <input
                        id="registerPassword"
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                        class="w-full px-4 pr-12 py-3.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition"
                    >
                    <button
                        type="button"
                        onclick="togglePassword('registerPassword', this)"
                        aria-label="Tampilkan password"
                        aria-pressed="false"
                        class="absolute inset-y-0 right-0 flex items-center px-4 text-slate-400 hover:text-blue-600 transition">
                        <svg class="eye-open h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                        <svg class="eye-closed hidden h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m3 3 18 18"/>
                            <path d="M10.585 10.587a2 2 0 0 0 2.828 2.828"/>
                            <path d="M9.88 5.09A10.5 10.5 0 0 1 12 4.5c5.523 0 10 5.5 10 5.5a15.7 15.7 0 0 1-2.167 2.618"/>
                            <path d="M6.61 6.61A15.7 15.7 0 0 0 2 12s4.477 5.5 10 5.5a10.5 10.5 0 0 0 4.68-1.09"/>
                        </svg>
                    </button>
                </div>
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 rounded-xl shadow-lg shadow-blue-100 transition duration-300">
                Register Account →
            </button>

        </form>

        <!-- Login -->
        <p class="text-center text-sm text-slate-500 mt-7">
            Sudah punya akun?
            <a href="login.php" class="text-blue-600 font-semibold hover:underline">
                Login
            </a>
        </p>
           <p class="text-blue-600 font-semibold hover:underline"> <a href="index.php"><-Back</a></p>
    </div>

<script>
function togglePassword(inputId, button) {
    const input = document.getElementById(inputId);
    const showPassword = input.type === "password";

    input.type = showPassword ? "text" : "password";
    button.setAttribute("aria-pressed", showPassword);
    button.setAttribute("aria-label", showPassword ? "Sembunyikan password" : "Tampilkan password");
    button.querySelector(".eye-open").classList.toggle("hidden", showPassword);
    button.querySelector(".eye-closed").classList.toggle("hidden", !showPassword);
}
</script>

</body>
</html>
