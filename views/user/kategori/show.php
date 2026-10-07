<?php
// kategori/show.php - Detail Kategori
$id    = intval($_GET['id'] ?? 0);
$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE idkategori = '$id'");
$data  = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: index.php?halaman=kategori");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Kategori</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../component/user/navbar.php'; ?>
    <div class="d-flex">
        <?php 
        if ($_SESSION['role'] == 'admin') {
            include __DIR__ . '/../component/user/sidebaradmin.php';
        } else {
            include __DIR__ . '/../component/user/sidebarpetugas.php';
        }
        ?>
        <main class="flex-grow-1 p-4">
            <h3 class="fw-bold mb-4">Detail Data Kategori</h3>
            <div class="card col-md-6 shadow-sm">
                <div class="card-body">
                    <table class="table table-borderless m-0">
                        <tr>
                            <th width="35%">ID Kategori</th>
                            <td>: <?= $data['idkategori'] ?></td>
                        </tr>
                        <tr>
                            <th>Nama Kategori</th>
                            <td>: <?= htmlspecialchars($data['namakategori']) ?></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer bg-light">
                    <a href="index.php?halaman=kategori" class="btn btn-secondary btn-sm">Kembali</a>
                    <a href="index.php?halaman=kategori_edit&id=<?= $data['idkategori'] ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>