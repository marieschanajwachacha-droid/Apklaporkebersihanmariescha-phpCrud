<?php
// views/auth/logout.php - Menghapus Sesi dan Menghancurkan Login
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Bersihkan seluruh variabel session
$_SESSION = array();

// Hapus cookie session jika ada
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Hancurkan session
session_destroy();

// Redirect ke halaman utama
header("Location: index.php?halaman=home");
exit;
?>