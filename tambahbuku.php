<?php

include_once ("koneksi.php");
$query= "SELECT * FROM tb_buku";

$hasil = mysqli_query ($conn, $query);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Tambah Buku</title>
  </head>
  <body>
    <div class="alert alert-success text-center" role="alert"><h2>Data Koleksi Buku Perpustakaan</h2></div>

    <div>
        <h1 class="ml-4"> Tambah Koleksi Buku</h1>
        <form method="post" action="prosestambahbuku.php" class="ml-4 mt-3">
            <div class="form-group row">
                <label for="judul" class="col-sm-1 col-form-label">Judul Buku</label>
                <div class="col-sm-5">
                    <input type="text" name="judul" class="form-control" placeholder="Judul Buku">
                </div>
            </div>

            <div class="form-group row">
                <label for="pengarang" class="col-sm-1 col-form-label">Pengarang</label>
                <div class="col-sm-5">
                    <input type="text" name="pengarang" class="form-control" placeholder="Pengarang">
                </div>
            </div>

            <div class="form-group row">
                <label for="tahun_terbit" class="col-sm-1 col-form-label">Tahun Terbit</label>
                <div class="col-sm-5">
                    <input type="number" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit">
                </div>
            </div>

            <div class="form-group row">
                <label for="kategori" class="col-sm-1 col-form-label">Kategori</label>
                <div class="col-sm-5">
                    <input type="text" name="kategori" class="form-control" placeholder="Kategori">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
            <a href="index.php" class="btn btn-primary">Koleksi Buku</a>

        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>