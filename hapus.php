<?php
require_once 'koneksi.php';

$id = $_GET['id'];
$data = $conn->query("SELECT foto FROM siswa WHERE id='$id'")->fetch_assoc();

if($data['foto'] && file_exists("upload/".$data['foto'])){
    unlink("upload/".$data['foto']);
}

$conn->query("DELETE FROM siswa WHERE id='$id'");

header("location: data_siswa.php");
?>