<?php
// proses/prosespenanganan.php - Pengolahan Konfirmasi & Tindak Lanjut Penanganan Kebersihan
session_start();

require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/session.php';

// Cek hak akses (hanya Admin & Petugas)
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: ../index.php?halaman=loginuser");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../index.php?halaman=penanganan");
    exit;
}

$aksi = $_REQUEST['aksi'] ?? '';

switch ($aksi) {

    // ==========================================
    // UPDATE USER / PETUGAS PENANGGUNG JAWAB LAPORAN
    // ==========================================
    case 'konfirmasi':
        $idpelaporan = intval($_POST['idpelaporan'] ?? 0);
        $iduser      = intval($_SESSION['iduser'] ?? $_POST['iduser'] ?? 0);

        if ($idpelaporan <= 0 || $iduser <= 0) {
            $_SESSION['flash_error'] = 'Data penanganan tidak valid.';
            header("Location: ../index.php?halaman=penanganan");
            exit;
        }

        // Assign iduser (petugas) ke tabel pelaporan
        $stmt = mysqli_prepare($koneksi, "UPDATE pelaporan SET iduser = ? WHERE idpelaporan = ?");
        mysqli_stmt_bind_param($stmt, "ii", $iduser, $idpelaporan);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['flash_sukses'] = 'Laporan berhasil dikonfirmasi dan ditangani.';
        } else {
            $_SESSION['flash_error'] = 'Gagal memperbarui status penanganan laporan.';
        }

        mysqli_stmt_close($stmt);
        header("Location: ../index.php?halaman=penanganan");
        exit;
        break;

    default:
        header("Location: ../index.php?halaman=penanganan");
        exit;
        break;
}
?>