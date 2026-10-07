<?php
// proses/prosespelaporan.php - Pengolahan Pengajuan Laporan Kebersihan
session_start();

require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/session.php';

// Pastikan pelapor sudah login
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'pelapor') {
    header("Location: ../index.php?halaman=loginpelapor");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../index.php?halaman=pengajuan");
    exit;
}

$aksi = $_REQUEST['aksi'] ?? '';

switch ($aksi) {

    // ==========================================
    // INPUT PELAPORAN BARU (OLEH PELAPOR)
    // ==========================================
    case 'tambah':
        $idsiswa          = intval($_SESSION['idpelapor'] ?? 0);
        $idkategori       = intval($_POST['idkategori'] ?? 0);
        $idlokasi         = intval($_POST['idlokasi'] ?? 0);
        $iduser           = 1; // Default ID user/petugas awal sebelum ditangani
        $deskripsilengkap = trim($_POST['deskripsilengkap'] ?? '');
        $namaFoto         = 'default_laporan.png';

        if ($idsiswa <= 0 || $idkategori <= 0 || $idlokasi <= 0 || empty($deskripsilengkap)) {
            $_SESSION['flash_error'] = 'Semua field wajib diisi dengan benar.';
            header("Location: ../index.php?halaman=pengajuan_create");
            exit;
        }

        // Processing Upload Foto Laporan Kebersihan
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $fileTmp  = $_FILES['foto']['tmp_name'];
            $fileName = $_FILES['foto']['name'];
            $ext      = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowed  = ['jpg', 'jpeg', 'png', 'webp'];

            if (in_array($ext, $allowed)) {
                $namaFoto  = time() . '_' . uniqid() . '.' . $ext;
                $targetDir = __DIR__ . '/../assets/images/laporan/';

                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }

                move_uploaded_file($fileTmp, $targetDir . $namaFoto);
            }
        }

        $stmt = mysqli_prepare(
            $koneksi,
            "INSERT INTO pelaporan (idsiswa, idkategori, idlokasi, iduser, deskripsilengkap, foto) VALUES (?, ?, ?, ?, ?, ?)"
        );
        mysqli_stmt_bind_param($stmt, "iiiiss", $idsiswa, $idkategori, $idlokasi, $iduser, $deskripsilengkap, $namaFoto);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['flash_sukses'] = 'Laporan kebersihan berhasil dikirim.';
        } else {
            $_SESSION['flash_error'] = 'Gagal mengirimkan laporan kebersihan.';
        }

        mysqli_stmt_close($stmt);
        header("Location: ../index.php?halaman=pengajuan");
        exit;
        break;

    default:
        header("Location: ../index.php?halaman=pengajuan");
        exit;
        break;
}
?>