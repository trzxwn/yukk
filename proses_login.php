<?php
require_once "koneksi.php";
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_prepare($conn, "SELECT username, password FROM `user` WHERE username = ?");
    mysqli_stmt_bind_param($query, "s", $username);
    mysqli_stmt_execute($query);
    $user = mysqli_stmt_get_result($query);

    if($user->num_rows === 0){
        echo '<script>alert("Akun belum ada. Silakan daftar terlebih dahulu."); window.location.href = "login.php";</script>';
        exit();
    }

    $data = $user->fetch_assoc();
    if($data['password'] !== $password){
        echo '<script>alert("Password salah!"); window.location.href = "login.php";</script>';
        exit();
    }

    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    header("location: admin.php");
    exit();
} 