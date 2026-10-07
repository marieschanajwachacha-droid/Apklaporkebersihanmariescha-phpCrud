<?php
// views/user/dashboard/dashboardadmin.php
require_once __DIR__ . '/../../../proses/prosesdashboarduser.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Lapor Kebersihan</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../../component/user/navbar.php'; ?>
    <div class="d-flex">
        <?php include __DIR__ . '/../../component/user/sidebaradmin.php'; ?>
        <main class="flex-grow-1 p-4">
            <h2 class="fw-bold mb-4">Dashboard Administrator</h2>
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card bg-primary text-white p-3">
                        <h5>Total Admin/User</h5>
                        <h2><?= $_SESSION['stat_total_user'] ?? 0 ?></h2>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white p-3">
                        <h5>Total Pelapor</h5>
                        <h2><?= $_SESSION['stat_total_pelapor'] ?? 0 ?></h2>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-dark p-3">
                        <h5>Total Kategori</h5>
                        <h2><?= $_SESSION['stat_total_kategori'] ?? 0 ?></h2>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info text-white p-3">
                        <h5>Total Lokasi</h5>
                        <h2><?= $_SESSION['stat_total_lokasi'] ?? 0 ?></h2>
                    </div>
                </div>
            </div>
            <div class="mt-4 card p-3">
                <h5>Total Laporan Masuk</h5>
                <h1 class="display-4 text-success fw-bold"><?= $_SESSION['stat_total_pelaporan'] ?? 0 ?></h1>
            </div>
        </main>
    </div>
</body>
</html>