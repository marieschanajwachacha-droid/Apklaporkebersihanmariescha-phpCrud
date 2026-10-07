<?php
// penanganan/konfirmasi.php - Form Konfirmasi Tindak Lanjut
$id    = intval($_GET['id'] ?? 0);
$query = mysqli_query($koneksi, "SELECT * FROM pelaporan WHERE idpelaporan = '$id'");
$data  = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: index.php?halaman=penanganan");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Penanganan</title>
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
            <h3 class="fw-bold mb-4">Konfirmasi Penanganan Laporan</h3>
            <form action="proses/prosespenanganan.php" method="POST" class="col-md-6">
                <input type="hidden" name="aksi" value="update_status">
                <input type="hidden" name="idpelaporan" value="<?= $data['idpelaporan'] ?>">
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Status Penanganan</label>
                    <select name="status" class="form-select" required>
                        <option value="proses" <?= ($data['status'] ?? '') == 'proses' ? 'selected' : '' ?>>Proses</option>
                        <option value="selesai" <?= ($data['status'] ?? '') == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Catatan Petugas</label>
                    <textarea name="catatan" class="form-control" rows="3" placeholder="Tuliskan catatan pengerjaan..."></textarea>
                </div>
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="index.php?halaman=penanganan" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </main>
    </div>
</body>
</html>