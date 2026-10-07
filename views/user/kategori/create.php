<!-- kategori/create.php - Form Tambah Kategori -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
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
            <h3 class="fw-bold mb-4">Tambah Kategori Baru</h3>
            <form action="proses/proseskategori.php" method="POST" class="col-md-6">
                <input type="hidden" name="aksi" value="tambah">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Kategori</label>
                    <input type="text" name="namakategori" class="form-control" required placeholder="Contoh: Sampah Organik">
                </div>
                <button type="submit" class="btn btn-success">Simpan Kategori</button>
                <a href="index.php?halaman=kategori" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </main>
    </div>
</body>
</html>