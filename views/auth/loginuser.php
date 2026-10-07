<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User - Sistem Kebersihan Sekolah</title>
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background: #212529; }
        .card-login { border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.3); }
    </style>
</head>
<body class="d-flex align-items-center min-vh-100 py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card card-login border-0 p-4 bg-white">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <div class="bg-warning-subtle text-warning rounded-circle d-inline-flex p-3 mb-2">
                                <i class="bi bi-shield-lock-fill fs-1"></i>
                            </div>
                            <h4 class="fw-bold">Akses User</h4>
                            <p class="text-muted small">Portal Login Khusus Admin & Petugas Kebersihan</p>
                        </div>
                        
                        <!-- Action mengarah ke folder proses relatif dari index.php -->
                        <form action="proses/prosesuser.php?aksi=login" method="POST">
                            <!-- Input Username -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="username" name="username" placeholder="Username" required autocomplete="username">
                                <label for="username">Username User</label>
                            </div>

                            <!-- Input Password dengan Toggle Mata -->
                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control rounded-3 pe-5" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                                <label for="password">Password</label>
                                
                                <button type="button" id="togglePassword" class="btn border-0 position-absolute end-0 top-50 translate-middle-y me-2 text-secondary" style="z-index: 10;">
                                    <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                </button>
                            </div>

                            <button type="submit" class="btn btn-warning btn-lg w-100 rounded-pill shadow-sm mb-3 fw-bold text-dark">Login Sistem</button>
                        </form>
                        
                        <div class="text-center">
                            <a href="index.php?halaman=home" class="small text-secondary text-decoration-none"><i class="bi bi-arrow-left"></i> Kembali ke Beranda Public</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Toggle Password -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const toggleIcon = document.querySelector('#toggleIcon');

        if (togglePassword) {
            togglePassword.addEventListener('click', function () {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                
                toggleIcon.classList.toggle('bi-eye');
                toggleIcon.classList.toggle('bi-eye-slash');
            });
        }
    </script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>