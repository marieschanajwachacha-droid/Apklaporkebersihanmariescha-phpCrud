<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - Lapor Kebersihan</title>
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Memanggil Navbar Component -->
    <?php include 'views/component/tamu/navbar.php'; ?>

    <!-- Konten Utama Kontak -->
    <div class="container my-5 flex-grow-1">
        <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
            <div class="text-center mb-5">
                <span class="badge bg-success px-3 py-2 rounded-pill mb-2">Layanan Informasi</span>
                <h2 class="fw-bold text-dark">Hubungi Kami</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Ada pertanyaan atau kendala terkait layanan kebersihan? Silakan hubungi tim pengelola kami melalui kontak di bawah ini.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Card Alamat -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 bg-light p-4 rounded-4 shadow-sm text-center">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mx-auto" style="width: 65px; height: 65px;">
                            <i class="bi bi-geo-alt-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold fs-6 text-dark">Alamat Sekolah</h5>
                        <p class="text-muted small mb-0">Jl. Sekolah Mariescha No. 123, Lingkungan Sekolah</p>
                    </div>
                </div>

                <!-- Card Telepon / Whatsapp -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 bg-light p-4 rounded-4 shadow-sm text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mx-auto" style="width: 65px; height: 65px;">
                            <i class="bi bi-telephone-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold fs-6 text-dark">Telepon / WhatsApp</h5>
                        <p class="text-muted small mb-0">+62 812-3456-7890</p>
                    </div>
                </div>

                <!-- Card Email -->
                <div class="col-md-4">
                    <div class="card h-100 border-0 bg-light p-4 rounded-4 shadow-sm text-center">
                        <div class="bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 mx-auto" style="width: 65px; height: 65px;">
                            <i class="bi bi-envelope-fill fs-3"></i>
                        </div>
                        <h5 class="fw-bold fs-6 text-dark">Email Resmi</h5>
                        <p class="text-muted small mb-0">kebersihan@mariescha.sch.id</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Memanggil Footer Component -->
    <?php include 'views/component/tamu/footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>