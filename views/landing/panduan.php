<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Penggunaan - Lapor Kebersihan</title>
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Memanggil Navbar Component -->
    <?php include 'views/component/tamu/navbar.php'; ?>

    <!-- Konten Utama Panduan -->
    <div class="container my-5 flex-grow-1">
        <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
            <div class="text-center mb-5">
                <span class="badge bg-success px-3 py-2 rounded-pill mb-2">Panduan Penggunaan</span>
                <h2 class="fw-bold text-dark">Langkah Mudah Melaporkan Kebersihan</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Ikuti petunjuk sederhana di bawah ini untuk menyampaikan laporan kebersihan lingkungan sekolah.
                </p>
            </div>

            <div class="row g-4">
                <!-- Langkah 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 bg-light p-3 rounded-4 shadow-sm text-center">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mx-auto" style="width: 60px; height: 60px;">
                            <i class="bi bi-person-plus fs-3"></i>
                        </div>
                        <h5 class="fw-bold fs-6">1. Registrasi & Login</h5>
                        <p class="text-muted small mb-0">Daftarkan akun pelapor Anda terlebih dahulu, lalu masuk menggunakan Nama dan Kelas/Jabatan yang telah terdaftar.</p>
                    </div>
                </div>

                <!-- Langkah 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 bg-light p-3 rounded-4 shadow-sm text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mx-auto" style="width: 60px; height: 60px;">
                            <i class="bi bi-file-earmark-plus fs-3"></i>
                        </div>
                        <h5 class="fw-bold fs-6">2. Buka Form Pengajuan</h5>
                        <p class="text-muted small mb-0">Pilih menu "Lapor Kebersihan" pada dashboard pelapor untuk membuka form pengaduan.</p>
                    </div>
                </div>

                <!-- Langkah 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 bg-light p-3 rounded-4 shadow-sm text-center">
                        <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mx-auto" style="width: 60px; height: 60px;">
                            <i class="bi bi-camera fs-3"></i>
                        </div>
                        <h5 class="fw-bold fs-6">3. Isi Detail & Unggah Foto</h5>
                        <p class="text-muted small mb-0">Pilih lokasi zonasi, kategori masalah kebersihan, berikan deskripsi lengkap, dan sertakan foto bukti pendukung.</p>
                    </div>
                </div>

                <!-- Langkah 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 bg-light p-3 rounded-4 shadow-sm text-center">
                        <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mx-auto" style="width: 60px; height: 60px;">
                            <i class="bi bi-clock-history fs-3"></i>
                        </div>
                        <h5 class="fw-bold fs-6">4. Pantau Status</h5>
                        <p class="text-muted small mb-0">Laporan Anda akan langsung masuk ke sistem untuk ditangani oleh petugas kebersihan secara berkala.</p>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="text-center mt-5 pt-3">
                <a href="index.php?halaman=registerpelapor" class="btn btn-success rounded-pill px-4 me-2 shadow-sm">Daftar Akun Pelapor</a>
                <a href="index.php?halaman=loginpelapor" class="btn btn-outline-success rounded-pill px-4 shadow-sm">Login Pelapor</a>
            </div>
        </div>
    </div>

    <!-- Memanggil Footer Component -->
    <?php include 'views/component/tamu/footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>