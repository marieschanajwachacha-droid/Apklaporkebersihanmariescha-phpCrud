<?php
// proses/prosesdashboarduser.php - Pengolahan Data Statistik Dashboard Admin & Petugas
session_start();

require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/session.php';

// Validasi Hak Akses (Hanya Admin dan Petugas)
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true || !in_array($_SESSION['role'] ?? '', ['admin', 'petugas'])) {
    header("Location: ../index.php?halaman=loginuser");
    exit;
}

// ==========================================
// 1. HITUNG TOTAL MASTER USER / PETUGAS
// ==========================================
$qUser = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM user");
$rUser = mysqli_fetch_assoc($qUser);
$totalUser = $rUser['total'] ?? 0;

// ==========================================
// 2. HITUNG TOTAL MASTER PELAPOR
// ==========================================
$qPelapor = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pelapor");
$rPelapor = mysqli_fetch_assoc($qPelapor);
$totalPelapor = $rPelapor['total'] ?? 0;

// ==========================================
// 3. HITUNG TOTAL MASTER KATEGORI
// ==========================================
$qKategori = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM kategori");
$rKategori = mysqli_fetch_assoc($qKategori);
$totalKategori = $rKategori['total'] ?? 0;

// ==========================================
// 4. HITUNG TOTAL MASTER LOKASI
// ==========================================
$qLokasi = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM lokasi");
$rLokasi = mysqli_fetch_assoc($qLokasi);
$totalLokasi = $rLokasi['total'] ?? 0;

// ==========================================
// 5. HITUNG TOTAL PELAPORAN MASUK
// ==========================================
$qPelaporan = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pelaporan");
$rPelaporan = mysqli_fetch_assoc($qPelaporan);
$totalPelaporan = $rPelaporan['total'] ?? 0;

// ==========================================
// SIMPAN KE SESSION UNTUK VIEW DASHBOARD
// ==========================================
$_SESSION['stat_total_user']      = $totalUser;
$_SESSION['stat_total_pelapor']   = $totalPelapor;
$_SESSION['stat_total_kategori']  = $totalKategori;
$_SESSION['stat_total_lokasi']    = $totalLokasi;
$_SESSION['stat_total_pelaporan'] = $totalPelaporan;

// Jika file diakses langsung dari URL, redirect ke halaman dashboard yang sesuai
if (basename($_SERVER['PHP_SELF']) == 'prosesdashboarduser.php') {
    $role = $_SESSION['role'] ?? 'petugas';
    if ($role === 'admin') {
        header("Location: ../index.php?halaman=dashboardadmin");
    } else {
        header("Location: ../index.php?halaman=dashboardpetugas");
    }
    exit;
}
?>