<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Lapor Kebersihan</title>
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Navbar Component -->
    <?php include 'views/component/tamu/navbar.php'; ?>

    <!-- Konten Utama Tentang -->
    <div class="container my-5 flex-grow-1">
        <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
            <div class="text-center mb-5">
                <span class="badge bg-success px-3 py-2 rounded-pill mb-2">Profil Aplikasi</span>
                <h2 class="fw-bold text-dark">Tentang Aplikasi Lapor Kebersihan</h2>
                <p class="text-muted mx-auto" style="max-width: 700px;">
                    Sistem Informasi Kebersihan Mariescha dirancang untuk mempermudah partisipasi seluruh warga sekolah (siswa, guru, dan staf) dalam menjaga kebersihan lingkungan sekolah secara real-time.
                </p>
            </div>

            <div class="row g-4">
                <!-- Card Visi -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 bg-light p-4 rounded-4 shadow-sm">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success text-white rounded-circle p-3 me-3">
                                <i class="bi bi-bullseye fs-3"></i>
                            </div>
                            <h4 class="fw-bold mb-0 text-success">Visi</h4>
                        </div>
                        <p class="text-muted mb-0">
                            Mewujudkan lingkungan sekolah yang bersih, asri, sehat, dan kondusif melalui digitalisasi pelaporan dan respon cepat kebersihan.
                        </p>
                    </div>
                </div>

                <!-- Card Misi -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 bg-light p-4 rounded-4 shadow-sm">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success text-white rounded-circle p-3 me-3">
                                <i class="bi bi-rocket-takeoff fs-3"></i>
                            </div>
                            <h4 class="fw-bold mb-0 text-success">Misi</h4>
                        </div>
                        <ul class="text-muted mb-0 ps-3">
                            <li class="mb-2">Mempermudah pengaduan kebersihan area zonasi sekolah.</li>
                            <li class="mb-2">Meningkatkan efisiensi kerja tim petugas kebersihan.</li>
                            <li>Menjaga transparansi proses tindak lanjut laporan.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Component -->
    <?php include 'views/component/tamu/footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>