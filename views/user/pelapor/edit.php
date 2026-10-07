<?php
// pelapor/edit.php - Form Edit Pelapor
$id    = intval($_GET['id'] ?? 0);
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE idsiswa = '$id'");
$data  = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: index.php?halaman=pelapor");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pelapor</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../component/user/navbar.php'; ?>
    <div class="d-flex">
        <?php 
        if (($_SESSION['role'] ?? '') === 'admin') {
            include __DIR__ . '/../component/user/sidebaradmin.php';
        } else {
            include __DIR__ . '/../component/user/sidebarpetugas.php';
        }
        ?>
        <main class="flex-grow-1 p-4">
            <h3 class="fw-bold mb-4">Edit Data Pelapor</h3>
            <form action="proses/prosespelapor.php" method="POST" enctype="multipart/form-data" class="col-md-6">
                <input type="hidden" name="aksi" value="edit">
                <input type="hidden" name="idsiswa" value="<?= $data['idsiswa'] ?>">
                <div class="mb-3">
                    <label class="form-label fw-bold">NISN / NIP</label>
                    <input type="text" name="nisn" class="form-control" value="<?= htmlspecialchars($data['nisn'] ?? '') ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="namasiswa" class="form-control" value="<?= htmlspecialchars($data['namasiswa']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Kelas / Jabatan</label>
                    <input type="text" name="kelas" class="form-control" value="<?= htmlspecialchars($data['kelas'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">No. Telepon/WA</label>
                    <input type="text" name="nohp" class="form-control" value="<?= htmlspecialchars($data['nohp'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Password Baru <small class="text-muted">(Kosongkan jika tidak diubah)</small></label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Ganti Foto Profil</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Update Data</button>
                <a href="index.php?halaman=pelapor" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </main>
    </div>
</body>
</html>