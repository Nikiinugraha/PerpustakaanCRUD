<?php
include_once("koneksi.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Simpan parameter pencarian jika ada
    $search = isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : '';
    
    // Menggunakan variabel $conn yang sesuai dengan file koneksi.php
    $query = mysqli_query($conn, "DELETE FROM tb_buku WHERE id_buku='$id'");
    
    if($query) {
        // Redirect kembali ke halaman sebelumnya dengan parameter sukses
        header("location: index.php?status=success&action=hapus$search");
    } else {
        echo "<script>
            alert('Gagal menghapus data');
            window.location.href='index.php';
        </script>";
    }
} else {
    header("location: index.php");
}
?>