<?php
// proses/proseslokasi.php - Pengolahan Master Data Lokasi
session_start();

require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/session.php';

// Hak akses untuk kelola master lokasi
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: ../index.php?halaman=loginuser");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../index.php?halaman=lokasi");
    exit;
}

$aksi = $_REQUEST['aksi'] ?? '';

switch ($aksi) {

    // ==========================================
    // 1. TAMBAH DATA LOKASI
    // ==========================================
    case 'tambah':
        $namalokasi    = trim($_POST['namalokasi'] ?? '');
        $deskripsi     = trim($_POST['deskripsi'] ?? '');
        $alamatlengkap = trim($_POST['alamatlengkap'] ?? '');

        if (empty($namalokasi) || empty($deskripsi) || empty($alamatlengkap)) {
            $_SESSION['flash_error'] = 'Semua field data lokasi wajib diisi.';
            header("Location: ../index.php?halaman=lokasi_create");
            exit;
        }

        $stmt = mysqli_prepare($koneksi, "INSERT INTO lokasi (namalokasi, deskripsi, alamatlengkap) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $namalokasi, $deskripsi, $alamatlengkap);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['flash_sukses'] = 'Data lokasi berhasil ditambahkan.';
        } else {
            $_SESSION['flash_error'] = 'Gagal menambahkan data lokasi.';
        }

        mysqli_stmt_close($stmt);
        header("Location: ../index.php?halaman=lokasi");
        exit;
        break;

    // ==========================================
    // 2. EDIT DATA LOKASI
    // ==========================================
    case 'edit':
        $idlokasi      = intval($_POST['idlokasi'] ?? 0);
        $namalokasi    = trim($_POST['namalokasi'] ?? '');
        $deskripsi     = trim($_POST['deskripsi'] ?? '');
        $alamatlengkap = trim($_POST['alamatlengkap'] ?? '');

        if ($idlokasi <= 0 || empty($namalokasi) || empty($deskripsi) || empty($alamatlengkap)) {
            $_SESSION['flash_error'] = 'Data input lokasi tidak valid.';
            header("Location: ../index.php?halaman=lokasi_edit&id=" . $idlokasi);
            exit;
        }

        $stmt = mysqli_prepare($koneksi, "UPDATE lokasi SET namalokasi = ?, deskripsi = ?, alamatlengkap = ? WHERE idlokasi = ?");
        mysqli_stmt_bind_param($stmt, "sssi", $namalokasi, $deskripsi, $alamatlengkap, $idlokasi);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['flash_sukses'] = 'Data lokasi berhasil diperbarui.';
        } else {
            $_SESSION['flash_error'] = 'Gagal memperbarui data lokasi.';
        }

        mysqli_stmt_close($stmt);
        header("Location: ../index.php?halaman=lokasi");
        exit;
        break;

    // ==========================================
    // 3. HAPUS DATA LOKASI
    // ==========================================
    case 'hapus':
        $idlokasi = intval($_POST['idlokasi'] ?? 0);

        if ($idlokasi > 0) {
            $stmt = mysqli_prepare($koneksi, "DELETE FROM lokasi WHERE idlokasi = ?");
            mysqli_stmt_bind_param($stmt, "i", $idlokasi);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['flash_sukses'] = 'Data lokasi berhasil dihapus.';
            } else {
                $_SESSION['flash_error'] = 'Gagal menghapus lokasi karena terikat dengan data pelaporan.';
            }

            mysqli_stmt_close($stmt);
        }

        header("Location: ../index.php?halaman=lokasi");
        exit;
        break;

    default:
        header("Location: ../index.php?halaman=lokasi");
        exit;
        break;
}
?>