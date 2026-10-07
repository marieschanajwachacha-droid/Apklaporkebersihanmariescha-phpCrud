<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pelapor - Lapor Kebersihan</title>
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: linear-gradient(135deg, #1e7e34, #20c997); }
        .card-login { border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100 py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card card-login border-0 p-4 bg-white">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <div class="bg-success-subtle text-success rounded-circle d-inline-flex p-3 mb-2">
                                <i class="bi bi-person-fill fs-1"></i>
                            </div>
                            <h4 class="fw-bold">Login Pelapor</h4>
                            <p class="text-muted small">Masuk menggunakan nama terdaftar Anda</p>
                        </div>
                        
                        <form action="proses/prosespelapor.php?aksi=login" method="POST">
                            <!-- Input Nama Pelapor -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="namapelapor" name="namapelapor" placeholder="Nama Pelapor" required>
                                <label for="namapelapor">Nama Pelapor</label>
                            </div>

                            <button type="submit" name="login" class="btn btn-success btn-lg w-100 rounded-pill shadow-sm mb-3">Masuk Sistem</button>
                        </form>
                        
                        <div class="text-center">
                            <p class="small text-muted mb-1">Belum punya akun? <a href="index.php?halaman=registerpelapor" class="text-success fw-bold text-decoration-none">Daftar Baru</a></p>
                            <a href="index.php?halaman=home" class="small text-secondary text-decoration-none"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>