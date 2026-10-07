<?php
// views/user/dashboard/dashboardpetugas.php
require_once __DIR__ . '/../../../proses/prosesdashboarduser.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Petugas - Lapor Kebersihan</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../../component/user/navbar.php'; ?>
    <div class="d-flex">
        <?php include __DIR__ . '/../../component/user/sidebarpetugas.php'; ?>
        <main class="flex-grow-1 p-4">
            <h2 class="fw-bold mb-4">Dashboard Petugas Lapangan</h2>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card bg-success text-white p-3">
                        <h5>Total Siswa/Pelapor</h5>
                        <h2><?= $_SESSION['stat_total_pelapor'] ?? 0 ?></h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-info text-white p-3">
                        <h5>Total Area Zonasi</h5>
                        <h2><?= $_SESSION['stat_total_lokasi'] ?? 0 ?></h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-dark p-3">
                        <h5>Laporan Perlu Penanganan</h5>
                        <h2><?= $_SESSION['stat_total_pelaporan'] ?? 0 ?></h2>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>