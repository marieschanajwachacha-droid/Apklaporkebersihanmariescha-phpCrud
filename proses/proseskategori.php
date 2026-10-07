<?php
session_start();
require_once 'koneksi.php';

$aksi = $_REQUEST['aksi'] ?? '';

// 1. TAMBAH KATEGORI
if ($aksi == 'tambah' && isset($_POST['simpan'])) {
    $nama_kategori      = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
    $deskripsi_kategori = mysqli_real_escape_string($koneksi, $_POST['deskripsi_kategori']);

    $query = "INSERT INTO tb_kategori (nama_kategori, deskripsi_kategori) VALUES ('$nama_kategori', '$deskripsi_kategori')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: ../views/user/kategori/index.php?status=success_add");
    } else {
        header("Location: ../views/user/kategori/create.php?status=failed");
    }
    exit();
}

// 2. EDIT KATEGORI
elseif ($aksi == 'edit' && isset($_POST['update'])) {
    $id_kategori        = mysqli_real_escape_string($koneksi, $_POST['id_kategori']);
    $nama_kategori      = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
    $deskripsi_kategori = mysqli_real_escape_string($koneksi, $_POST['deskripsi_kategori']);

    $query = "UPDATE tb_kategori SET nama_kategori = '$nama_kategori', deskripsi_kategori = '$deskripsi_kategori' WHERE id_kategori = '$id_kategori'";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: ../views/user/kategori/index.php?status=success_edit");
    } else {
        header("Location: ../views/user/kategori/edit.php?id=$id_kategori&status=failed");
    }
    exit();
}

// 3. HAPUS KATEGORI
elseif ($aksi == 'hapus' && isset($_GET['id'])) {
    $id_kategori = mysqli_real_escape_string($koneksi, $_GET['id']);

    $query = "DELETE FROM tb_kategori WHERE id_kategori = '$id_kategori'";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: ../views/user/kategori/index.php?status=success_delete");
    } else {
        header("Location: ../views/user/kategori/index.php?status=failed_delete");
    }
    exit();
}

else {
    header("Location: ../views/errors/403.php");
    exit();
}
?>