<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (file_exists('proses/koneksi.php')) {
    require_once 'proses/koneksi.php';
}

$halaman = $_GET['halaman'] ?? 'home';

switch ($halaman) {
    // LANDING PAGES
    case 'home':
        $file = 'views/landing/home.php';
        break;
    case 'daftarlokasi':
        $file = 'views/landing/daftarlokasi.php';
        break;
    case 'panduan':
        $file = 'views/landing/panduan.php';
        break;
    case 'tentang':
        $file = 'views/landing/tentang.php';
        break;
    case 'kontak':
        $file = 'views/landing/kontak.php';
        break;

    // AUTHENTICATION
    case 'loginpelapor':
        $file = 'views/auth/loginpelapor.php';
        break;
    case 'loginuser':
        $file = 'views/auth/loginuser.php';
        break;
    case 'registerpelapor':
        $file = 'views/auth/registerpelapor.php';
        break;
    case 'logout':
        $file = 'views/auth/logout.php';
        break;

    // DASHBOARD & PELAPOR
    case 'dashboardpelapor':
        $file = 'views/pelapor/dashboardpelapor.php';
        break;
    case 'pengajuan_create':
        $file = 'views/pelapor/pengajuan/create.php';
        break;

    default:
        $file = 'views/landing/home.php';
        break;
}

if (file_exists($file)) {
    include $file;
} else {
    echo "<div style='text-align:center; padding:50px; font-family:sans-serif;'>";
    echo "<h2>File Halaman Tidak Ditemukan!</h2>";
    echo "<p>Sistem tidak menemukan file: <code>$file</code></p>";
    echo "<a href='index.php?halaman=home'>Kembali ke Beranda</a>";
    echo "</div>";
}
?>