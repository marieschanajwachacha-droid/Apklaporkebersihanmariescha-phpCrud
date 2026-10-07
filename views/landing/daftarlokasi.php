<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lokasi - Lapor Kebersihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <?php include 'views/component/tamu/navbar.php'; ?>

    <div class="container my-5 flex-grow-1">
        <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
            <h2 class="fw-bold text-success mb-2"><i class="bi bi-geo-alt-fill me-2"></i>Daftar Zonasi Lokasi</h2>
            <p class="text-muted mb-4">Daftar area dan wilayah pemantauan kebersihan di lingkungan sekolah.</p>

            <div class="row g-3">
                <!-- Contoh Card Lokasi -->
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 bg-light p-3 rounded-3 shadow-sm h-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-success text-white p-3 rounded-circle">
                                <i class="bi bi-pin-map-fill fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Selokan Depan Kelas</h6>
                                <p class="text-muted small mb-0">Selokan dekat depan kelas XI RPL 2</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 bg-light p-3 rounded-3 shadow-sm h-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-success text-white p-3 rounded-circle">
                                <i class="bi bi-pin-map-fill fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Toilet Siswa Utama</h6>
                                <p class="text-muted small mb-0">Kamar mandi & W.C. siswa blok barat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'views/component/tamu/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>