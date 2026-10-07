<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/koneksi.php';

// Hak akses khusus Pelapor
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'pelapor') {
    header("Location: ../index.php?halaman=loginpelapor");
    exit();
}

$idpelapor = intval($_SESSION['idpelapor'] ?? 0);

// Hitung total laporan berdasarkan idsiswa
$stmt = mysqli_prepare($koneksi, "SELECT COUNT(*) AS total_laporan FROM pelaporan WHERE idsiswa = ?");
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $idpelapor);
    mysqli_stmt_execute($stmt);
    $resTotal = mysqli_stmt_get_result($stmt);
    $rowTotal = mysqli_fetch_assoc($resTotal);
    $_SESSION['stat_total_laporan'] = $rowTotal['total_laporan'] ?? 0;
    mysqli_stmt_close($stmt);
} else {
    $_SESSION['stat_total_laporan'] = 0;
}
?>