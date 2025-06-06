<?php
include_once ("koneksi.php");
$id=$_GET['id'];
$query= "SELECT * FROM tb_buku WHERE id_buku=" .$id;
$hasil = mysqli_query ($conn, $query);
$data = mysqli_fetch_array($hasil);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Koleksi Buku - Perpustakaan</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS -->
     <link rel="stylesheet" href="style.css">
    
    <style>
        /* Set Calibri as the default font for the entire document */

        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-submit {
            min-width: 120px;
        }
    </style>
  </head>
  <body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm">
            <!-- Card Header -->
            <div class="card-header py-3" style="background-color: #0F67B1;">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h5 mb-0 text-white">
                        <i class="fas fa-edit me-2"></i>Ubah Data Buku
                    </h1>
                    <a href="index.php" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                </div>
            </div>
            
            <!-- Card Body -->
            <div class="card-body p-4">
                <form method="post" action="prosesubahbuku.php" class="needs-validation" novalidate>
                    <input type="hidden" name="id" value="<?php echo $data['id_buku']; ?>">
                    
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="judul" class="form-label">Judul Buku</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-book"></i></span>
                                <input type="text" class="form-control" id="judul" name="judul" 
                                       value="<?php echo htmlspecialchars($data['judul_buku']); ?>" required>
                                <div class="invalid-feedback">
                                    Mohon masukkan judul buku.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pengarang" class="form-label">Pengarang</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="pengarang" name="pengarang" 
                                       value="<?php echo htmlspecialchars($data['pengarang']); ?>" required>
                                <div class="invalid-feedback">
                                    Mohon masukkan nama pengarang.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" 
                                       min="1900" max="<?php echo date('Y'); ?>" 
                                       value="<?php echo htmlspecialchars($data['tahun_terbit']); ?>" required>
                                <div class="invalid-feedback">
                                    Mohon masukkan tahun terbit yang valid.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="kategori" class="form-label">Kategori</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                <input type="text" class="form-control" id="kategori" name="kategori" 
                                       value="<?php echo htmlspecialchars($data['kategori']); ?>" required>
                                <div class="invalid-feedback">
                                    Mohon masukkan kategori buku.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php" class="btn btn-outline-secondary me-md-2">
                            <i class="fas fa-times me-1"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary btn-submit">
                            <i class="fas fa-save me-1"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form validation
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
  </body>
</html>