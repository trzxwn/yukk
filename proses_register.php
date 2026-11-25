<?php
    require_once 'koneksi.php';

    $username =$_POST['username'];
    $password =$_POST['password'];

    $query = mysqli_prepare($conn,"INSERT INTO `user` (username,password) VALUES (?,?)");
    mysqli_stmt_bind_param(
        $query,
        "ss",
        $username,
        $password
    );
    mysqli_stmt_execute($query);
    header("location:login.php");
    exit();
?>