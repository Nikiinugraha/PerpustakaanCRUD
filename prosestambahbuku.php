<?php

include_once("koneksi.php");
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$tahun_terbit = $_POST['tahun_terbit'];
$kategori = $_POST['kategori'];

if (empty($judul) || empty($pengarang) || empty($tahun_terbit) || empty($kategori)) {
    echo "<script>alert('Semua kolom wajib diisi!'); window.location.href='tambahbuku.php';</script>";
    exit;
}
$query="INSERT INTO tb_buku(judul_buku,pengarang,tahun_terbit,kategori) VALUE('$judul','$pengarang', '$tahun_terbit', '$kategori')";

$hasil=mysqli_query($conn, $query);
if($hasil) {
    header('location:index.php');
} else{
    echo "input gagal";
}

?>