<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Lapor Kebersihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        .hero-banner { background: linear-gradient(135deg, #e8f5e9, #c8e6c9); border-radius: 0 0 30px 30px; }
        .card-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <?php include 'views/component/tamu/navbar.php'; ?>

    <section class="hero-banner py-5 mb-5 shadow-sm">
        <div class="container py-4 text-center">
            <span class="badge bg-success px-3 py-2 rounded-pill mb-3 fs-6">🌱 Gerakan Kebersihan Sekolah</span>
            <h1 class="display-4 fw-bold text-dark mb-3">Lingkungan Bersih, Belajar Lebih Nyaman</h1>
            <p class="lead text-muted mx-auto" style="max-width: 720px;">Laporkan area sekolah yang kotor atau butuh penanganan kebersihan secara langsung dan transparan melalui platform digital interaktif.</p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="index.php?halaman=loginpelapor" class="btn btn-success btn-lg rounded-pill px-4 shadow"><i class="bi bi-plus-circle me-1"></i> Buat Laporan</a>
                <a href="index.php?halaman=daftarlokasi" class="btn btn-white text-success border border-success btn-lg rounded-pill px-4 shadow-sm"><i class="bi bi-geo-alt me-1"></i> Zonasi Lokasi</a>
            </div>
        </div>
    </section>

    <div class="container my-4 flex-grow-1">
        <div class="text-center mb-5">
            <h3 class="fw-bold text-dark">Alur Pelaporan Kebersihan</h3>
            <p class="text-muted">3 Langkah mudah menyampaikan aspirasi kebersihan</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center card-hover rounded-4">
                    <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mx-auto" style="width:70px; height:70px;">
                        <i class="bi bi-camera fs-2"></i>
                    </div>
                    <h5 class="fw-bold">1. Foto & Laporkan</h5>
                    <p class="text-muted small">Ambil foto area kotor di lingkungan sekolah dan kirimkan form pengaduan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center card-hover rounded-4">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mx-auto" style="width:70px; height:70px;">
                        <i class="bi bi-tools fs-2"></i>
                    </div>
                    <h5 class="fw-bold">2. Penanganan Lapangan</h5>
                    <p class="text-muted small">Petugas kebersihan akan menerima notifikasi dan segera membersihkan lokasi.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center card-hover rounded-4">
                    <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mx-auto" style="width:70px; height:70px;">
                        <i class="bi bi-check-circle fs-2"></i>
                    </div>
                    <h5 class="fw-bold">3. Selesai & Verifikasi</h5>
                    <p class="text-muted small">Pantau pembaruan status pengerjaan secara transparan sampai area dinyatakan bersih.</p>
                </div>
            </div>
        </div>
    </div>

    <?php include 'views/component/tamu/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>