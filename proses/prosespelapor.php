<?php
session_start();
include "koneksi.php";

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

if ($aksi == 'login') {
    $namapelapor = strtolower(trim($_POST['namapelapor']));

    $query = mysqli_query($koneksi, "SELECT * FROM pelapor WHERE LOWER(namapelapor)='$namapelapor'");
    $data = mysqli_fetch_array($query);

    if ($data) {
        $_SESSION['login'] = true;
        $_SESSION['role'] = 'pelapor';
        $_SESSION['idpelapor'] = $data['idpelapor'];
        $_SESSION['namapelapor'] = $data['namapelapor'];
        
        header("Location: ../index.php?halaman=dashboardpelapor");
        exit();
    } else {
        echo "<script>alert('Nama Pelapor tidak ditemukan!'); window.location='../index.php?halaman=loginpelapor';</script>";
        exit();
    }
}
?>