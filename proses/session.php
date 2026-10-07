<?php
// proses/session.php - Helper & Proteksi Sesi User/Pelapor

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Function helper untuk redirect halaman
if (!function_exists('redirect')) {
    function redirect($url) {
        header("Location: " . $url);
        exit;
    }
}

// Cek apakah user (Admin/Petugas) sudah login
if (!function_exists('cek_login_user')) {
    function cek_login_user() {
        if (!isset($_SESSION['login']) || $_SESSION['login'] !== true || !in_array($_SESSION['role'] ?? '', ['admin', 'petugas'])) {
            $_SESSION['error_login'] = 'Silakan login terlebih dahulu untuk mengakses halaman ini.';
            redirect('../index.php?halaman=loginuser');
        }
    }
}

// Cek apakah pelapor (Siswa/Guru) sudah login
if (!function_exists('cek_login_pelapor')) {
    function cek_login_pelapor() {
        if (!isset($_SESSION['login']) || $_SESSION['login'] !== true || ($_SESSION['role'] ?? '') !== 'pelapor') {
            $_SESSION['error_login'] = 'Silakan login sebagai pelapor untuk mengakses halaman ini.';
            redirect('../index.php?halaman=loginpelapor');
        }
    }
}

// Cek khusus role Admin
if (!function_exists('cek_role_admin')) {
    function cek_role_admin() {
        cek_login_user();
        if (($_SESSION['role'] ?? '') !== 'admin') {
            redirect('views/errors/403.php');
        }
    }
}
?>
