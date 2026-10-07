<?php
// Cek agar session tidak dibuka dua kali saat di-include dari index.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek koneksi dari root folder
if (file_exists('proses/koneksi.php')) {
    require_once 'proses/koneksi.php';
} elseif (file_exists('../../proses/koneksi.php')) {
    require_once '../../proses/koneksi.php';
}

// Jika sudah login, alihkan ke dashboard
if (isset($_SESSION['role']) && $_SESSION['role'] == 'pelapor') {
    echo "<script>window.location.href = 'index.php?halaman=dashboardpelapor';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun Pelapor - Sistem Kebersihan Sekolah</title>
    <!-- CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: linear-gradient(135deg, #1e7e34, #20c997); }
        .card-register { border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100 py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card card-register border-0 p-4 bg-white">
                <div class="card-body">
                    
                    <div class="text-center mb-4">
                        <div class="bg-success-subtle text-success rounded-circle d-inline-flex p-3 mb-2">
                            <i class="bi bi-person-plus-fill fs-1"></i>
                        </div>
                        <h4 class="fw-bold">Registrasi Pelapor</h4>
                        <p class="text-muted small">Daftar Akun Siswa / Guru / Warga Sekolah</p>
                    </div>

                    <!-- Notifikasi Pesan Error -->
                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php 
                                if ($_GET['error'] == 'nama_ada') echo "Nama Pelapor sudah terdaftar!";
                                else if ($_GET['error'] == 'gagal') echo "Gagal mendaftar, silakan coba lagi.";
                                else if ($_GET['error'] == 'ekstensi') echo "Format foto harus JPG atau PNG!";
                                else if ($_GET['error'] == 'ukuran') echo "Ukuran foto maksimal 2MB!";
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form action="proses/prosespelapor.php?aksi=register" method="POST" enctype="multipart/form-data">

                        <!-- Input Nama Pelapor -->
                        <div class="form-floating mb-3">
                            <input type="text" name="namapelapor" id="namapelapor" class="form-control rounded-3" placeholder="Nama Lengkap" required>
                            <label for="namapelapor">Nama Lengkap Pelapor</label>
                        </div>

                        <!-- Input Kelas / Jabatan -->
                        <div class="form-floating mb-3">
                            <input type="text" name="kelas" id="kelas" class="form-control rounded-3" placeholder="Contoh: XI RPL 2 / Guru" required>
                            <label for="kelas">Kelas / Jabatan (Contoh: XI RPL 2)</label>
                        </div>

                        <!-- Upload Foto Profil -->
                        <div class="mb-3">
                            <label for="foto" class="form-label small text-muted">Foto Profil (Opsional)</label>
                            <input type="file" name="foto" id="foto" class="form-control rounded-3" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100 rounded-pill shadow-sm mb-3">Daftar Sekarang</button>
                    </form>

                    <div class="text-center">
                        <p class="small text-muted mb-1">Sudah punya akun? <a href="index.php?halaman=loginpelapor" class="text-success fw-bold text-decoration-none">Login di sini</a></p>
                        <a href="index.php?halaman=home" class="small text-secondary text-decoration-none"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>