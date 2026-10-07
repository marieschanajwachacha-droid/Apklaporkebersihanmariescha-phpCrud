<!-- lokasi/create.php - Form Tambah Lokasi -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Lokasi</title>
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
            <h3 class="fw-bold mb-4">Tambah Lokasi Baru</h3>
            <form action="proses/proseslokasi.php" method="POST" class="col-md-6">
                <input type="hidden" name="aksi" value="tambah">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Lokasi</label>
                    <input type="text" name="namalokasi" class="form-control" required placeholder="Contoh: Gedung A Lt. 2">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3" placeholder="Deskripsi tambahan lokasi..."></textarea>
                </div>
                <button type="submit" class="btn btn-success">Simpan Lokasi</button>
                <a href="index.php?halaman=lokasi" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </main>
    </div>
</body>
</html>