<?php
// kategori/edit.php - Form Edit Kategori
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
    <title>Edit Kategori</title>
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
            <h3 class="fw-bold mb-4">Edit Data Kategori</h3>
            <form action="proses/proseskategori.php" method="POST" class="col-md-6">
                <input type="hidden" name="aksi" value="edit">
                <input type="hidden" name="idkategori" value="<?= $data['idkategori'] ?>">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Kategori</label>
                    <input type="text" name="namakategori" class="form-control" value="<?= htmlspecialchars($data['namakategori']) ?>" required>
                </div>
                <button type="submit" class="btn btn-success">Update Kategori</button>
                <a href="index.php?halaman=kategori" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </main>
    </div>
</body>
</html>