<?php
// proses/proseslaporan.php - Pengolahan Rekapitulasi & Cetak Laporan Kebersihan
session_start();

require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/session.php';

// Pastikan hanya user yang sudah login (Admin / Petugas) yang dapat mengakses
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: ../index.php?halaman=loginuser");
    exit;
}

// Ambil parameter aksi dari request (GET/POST)
$aksi = $_REQUEST['aksi'] ?? '';

switch ($aksi) {

    // ==========================================
    // 1. FILTER LAPORAN HARIAN
    // ==========================================
    case 'filter_harian':
        $tanggal = trim($_POST['tanggal'] ?? date('Y-m-d'));

        if (empty($tanggal)) {
            $_SESSION['flash_error'] = 'Tanggal laporan wajib dipilih.';
            header("Location: ../index.php?halaman=laporanharian");
            exit;
        }

        // Redirect ke halaman laporan harian dengan parameter tanggal
        header("Location: ../index.php?halaman=laporanharian&tanggal=" . urlencode($tanggal));
        exit;
        break;

    // ==========================================
    // 2. FILTER LAPORAN BULANAN
    // ==========================================
    case 'filter_bulanan':
        $bulan = trim($_POST['bulan'] ?? date('m'));
        $tahun = trim($_POST['tahun'] ?? date('Y'));

        if (empty($bulan) || empty($tahun)) {
            $_SESSION['flash_error'] = 'Bulan dan Tahun wajib dipilih.';
            header("Location: ../index.php?halaman=laporanbulanan");
            exit;
        }

        // Redirect ke halaman laporan bulanan dengan parameter bulan & tahun
        header("Location: ../index.php?halaman=laporanbulanan&bulan=" . urlencode($bulan) . "&tahun=" . urlencode($tahun));
        exit;
        break;

    // ==========================================
    // 3. FILTER LAPORAN TAHUNAN
    // ==========================================
    case 'filter_tahunan':
        $tahun = trim($_POST['tahun'] ?? date('Y'));

        if (empty($tahun)) {
            $_SESSION['flash_error'] = 'Tahun laporan wajib dipilih.';
            header("Location: ../index.php?halaman=laporantahunan");
            exit;
        }

        // Redirect ke halaman laporan tahunan dengan parameter tahun
        header("Location: ../index.php?halaman=laporantahunan&tahun=" . urlencode($tahun));
        exit;
        break;

    // ==========================================
    // 4. HELPER DATA LAPORAN (UNTUK CETAK / VIEW)
    // ==========================================
    case 'get_data':
        $tipe = $_GET['tipe'] ?? 'semua';
        
        $sql = "SELECT p.idpelaporan, p.deskripsilengkap, p.foto, 
                       pel.namapelapor, pel.kelas,
                       k.namakategori, 
                       l.namalokasi, 
                       u.namauser
                FROM pelaporan p
                LEFT JOIN pelapor pel ON p.idsiswa = pel.idpelapor
                LEFT JOIN kategori k ON p.idkategori = k.idkategori
                LEFT JOIN lokasi l ON p.idlokasi = l.idlokasi
                LEFT JOIN user u ON p.iduser = u.iduser
                ORDER BY p.idpelaporan DESC";

        $query = mysqli_query($koneksi, $sql);
        $data  = [];

        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
        }

        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
        break;

    // ==========================================
    // DEFAULT ROUTE / REDIRECT
    // ==========================================
    default:
        header("Location: ../index.php?halaman=laporanharian");
        exit;
        break;
}
?>