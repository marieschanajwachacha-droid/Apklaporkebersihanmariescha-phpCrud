<?php
// proses/koneksi.php - Koneksi Database MySQL
$host = "localhost";
$user = "root";
$pass = "";
$db   = "apklaporkebersihanmariescha";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Set charset ke utf8 untuk mendukung berbagai karakter
mysqli_set_charset($koneksi, "utf8");
?>