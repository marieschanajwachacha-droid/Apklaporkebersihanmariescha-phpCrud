<?php
// views/pelapor/dashboardpelapor.php
require_once __DIR__ . '/../../proses/prosesdashboardpelapor.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelapor - Lapor Kebersihan</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap CSS jika belum ada di style.css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Panggil Navbar -->
    <?php 
    $navbarPath = __DIR__ . '/../component/pelapor/navbar.php';
    if (file_exists($navbarPath)) {
        include $navbarPath;
    }
    ?>

    <div class="d-flex">
        <!-- Panggil Sidebar -->
        <?php 
        $sidebarPath = __DIR__ . '/../component/pelapor/sidebar.php';
        if (file_exists($sidebarPath)) {
            include $sidebarPath;
        }
        ?>

        <!-- Main Content -->
        <main class="flex-grow-1 p-4">
            <h2 class="fw-bold mb-3">Selamat Datang, <?= htmlspecialchars($_SESSION['namapelapor'] ?? 'Siswa') ?>!</h2>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-success p-4 shadow-sm">
                        <h5 class="text-success fw-bold">Total Laporan Dikirim</h5>
                        <h1 class="display-3 fw-bold text-dark"><?= $_SESSION['stat_total_laporan'] ?? 0 ?></h1>
                        <a href="index.php?halaman=pengajuan_create" class="btn btn-success mt-2">Buat Laporan Baru</a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>