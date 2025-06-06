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

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        /* Background Styles */
        body {
            min-height: 100vh;
            background: linear-gradient(20deg, #f5f7fa 0%,rgb(164, 213, 248) 100%);
            background-attachment: fixed;
            position: relative;
            overflow-x: hidden;
        }

        /* Efek pola halus */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(rgba(0, 0, 0, 0.05) 1px, transparent 1px);
            background-size: 20px 20px;
            z-index: -1;
            pointer-events: none;
        }

        /* Efek cahaya */
        body::after {
            content: "";
            position: fixed;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            z-index: -1;
            pointer-events: none;
        }

        /* Card Styles */
        .card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
            border: none;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Animasi halus untuk konten */
        .container {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Efek hover untuk tombol aksi */
        .action-buttons .btn {
            transition: all 0.3s ease;
            transform: scale(1);
        }

        .action-buttons .btn:hover {
            transform: scale(1.1);
        }

        .action-buttons .btn-warning:hover {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #000;
        }

        .action-buttons .btn-danger:hover {
            background-color: #dc3545;
            border-color: #dc3545;
        }

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

        .author-text {
            font-size: 0.8rem;
            opacity: 0.9;
            margin: 0.25rem 0 0 0;
            font-weight: 400;
            letter-spacing: 0.5px;
        }

        .card-header h1 {
            line-height: 1.2;
        }
    </style>

  </head>
  <body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm">
            <!-- Card Header -->
            <div class="card-header py-3" style="background-color: #0F67B1 ;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h5 mb-0 text-white">
                            <i class="fas fa-book me-2"></i>Data Koleksi Buku
                        </h1>
                        <p class="text-white-50 mb-0 author-text">
                            <i class="fas fa-user-edit me-1"></i>Niki Nugraha
                        </p>
                    </div>
                    
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
                                    <a href="#" 
                                       class="btn btn-sm btn-danger" 
                                       data-bs-toggle="tooltip" 
                                       title="Hapus"
                                       onclick="return confirmDelete(<?php echo $data['id_buku']; ?>, '<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES) : ''; ?>')">
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
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
    // Fungsi untuk konfirmasi hapus dengan SweetAlert2
    function confirmDelete(id, searchQuery) {
        // Simpan posisi scroll saat ini
        const scrollPosition = window.scrollY || document.documentElement.scrollTop;
        
        Swal.fire({
            title: 'Hapus Buku',
            text: 'Apakah Anda yakin ingin menghapus buku ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Simpan posisi scroll di sessionStorage sebelum redirect
                sessionStorage.setItem('scrollPosition', scrollPosition);
                
                // Buat URL dengan parameter pencarian jika ada
                let url = 'hapusbuku.php?id=' + id;
                if (searchQuery) {
                    url += '&search=' + encodeURIComponent(searchQuery);
                }
                
                // Redirect ke halaman hapus
                window.location.href = url;
            }
        });
        
        return false;
    }
    </script>
    
    <!-- Script untuk menampilkan notifikasi -->
    <script>
    // Cek jika ada parameter sukses di URL
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const action = urlParams.get('action');

    if (status === 'success') {
        let title = '';
        let text = '';
        
        if (action === 'tambah') {
            title = 'Berhasil!';
            text = 'Data buku berhasil ditambahkan';
        } else if (action === 'edit') {
            title = 'Berhasil!';
            text = 'Data buku berhasil diperbarui';
        } else if (action === 'hapus') {
            title = 'Dihapus!';
            text = 'Data buku berhasil dihapus';
        }

        if (title && text) {
            Swal.fire({
                icon: 'success',
                title: title,
                text: text,
                showConfirmButton: false,
                timer: 2000
            });
            
            // Hapus parameter dari URL tanpa reload halaman
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    }
    </script>
    <script>
        // Aktifkan tooltip
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
    <script>
        // Ambil posisi scroll dari sessionStorage dan scroll ke posisi tersebut
        const scrollPosition = sessionStorage.getItem('scrollPosition');
        if (scrollPosition) {
            window.scrollTo(0, parseInt(scrollPosition));
            sessionStorage.removeItem('scrollPosition');
        }
    </script>
  </body>
</html>