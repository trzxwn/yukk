<?php
    require_once "koneksi.php";
    if(isset($_POST['tambah'])){
    $nis =$_POST['nis'];
    $nama =$_POST['nama'];
    $kelas =$_POST['kelas'];
    $jurusan =$_POST['jurusan'];
    $alamat =$_POST['alamat'];
    $no_hp =$_POST['no_hp'];
    $foto =$_FILES['foto']['name'];
    $tmp =$_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp,"upload/$foto");
        $conn->query("INSERT INTO siswa (nis,nama,kelas,jurusan,alamat,no_hp,foto) 
    VALUES ('$nis','$nama','$kelas','$jurusan','$alamat','$no_hp','$foto')");
    }
    header("location:data_siswa.php");


?>