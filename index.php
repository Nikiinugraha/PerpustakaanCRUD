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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Koleksi Buku Perpustakaan</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Jost:ital,wght@0,100..900;1,100..900&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- CSS -->
     <link rel="stylesheet" href="style.css">

    <style>
        .action-buttons .btn {
            margin: 0 2px;
        }
        .table-responsive {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .btn-add {
            transition: all 0.3s;
        }
        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .bg-custom-blue th {
            background-color: #3FA2F6 !important;
            color: white;
        }

    </style>

  </head>
  <body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm">
            <!-- Card Header -->
            <div class="card-header py-3" style="background-color: #0F67B1 ;">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h5 mb-0 text-white">
                        <i class="fas fa-book me-2"></i>Data Koleksi Buku
                    </h1>
                    <a href="tambahBuku.php" class="btn btn-light btn-sm btn-add">
                        <i class="fas fa-plus-circle me-1"></i>Tambah Buku
                    </a>
                </div>
            </div>
            
            <!-- Card Body -->
            <div class="card-body p-0">
                <div>
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-custom-blue text-white">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Pengarang</th>
                                <th scope="col" class="text-center">Tahun Terbit</th>
                                <th scope="col">Kategori</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nomor = 1;
                            while($data = mysqli_fetch_array($hasil)) { 
                            ?> 
                            <tr>
                                <th scope="row" class="text-center"><?php echo $nomor++; ?></th>
                                <td class="fw-normal"><?php echo htmlspecialchars($data['judul_buku']); ?></td>
                                <td class="fw-normal"><?php echo htmlspecialchars($data['pengarang']); ?></td>
                                <td class="text-center">
                                    <span class="badge bg-info text-white fw-normal"><?php echo htmlspecialchars($data['tahun_terbit']); ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark fw-normal"><?php echo htmlspecialchars($data['kategori']); ?></span>
                                </td>
                                <td class="text-center action-buttons">     
                                    <a href="ubahbuku.php?id=<?php echo $data['id_buku']; ?>" 
                                       class="btn btn-sm btn-warning" 
                                       data-bs-toggle="tooltip" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="hapusbuku.php?id=<?php echo $data['id_buku']; ?>" 
                                       class="btn btn-sm btn-danger" 
                                       data-bs-toggle="tooltip" 
                                       title="Hapus"
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php if(mysqli_num_rows($hasil) == 0): ?>
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="fas fa-book-open fa-2x text-muted mb-3"></i>
                                    <p class="text-muted mb-0">Tidak ada data buku tersedia</p>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Aktifkan tooltip
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
  </body>
</html>