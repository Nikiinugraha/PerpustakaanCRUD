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
$query = mysqli_query($conn, "INSERT INTO tb_buku (judul_buku, pengarang, tahun_terbit, kategori) 
                                VALUES ('$judul', '$pengarang', '$tahun_terbit', '$kategori')");

if($query) {
    header("location: index.php?status=success&action=tambah");
} else {
    echo "Gagal menambahkan data";
    echo "<br>";
    echo "<a href='tambahbuku.php'>Kembali</a>";
}

?>