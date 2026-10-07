<!-- pelapor/create.php - Form Tambah Pelapor -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pelapor</title>
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
            <h3 class="fw-bold mb-4">Tambah Data Pelapor</h3>
            <form action="proses/prosespelapor.php" method="POST" enctype="multipart/form-data" class="col-md-6">
                <input type="hidden" name="aksi" value="tambah">
                <div class="mb-3">
                    <label class="form-label fw-bold">NISN / NIP</label>
                    <input type="text" name="nisn" class="form-control" required placeholder="Masukkan NISN/NIP">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="namasiswa" class="form-control" required placeholder="Nama Lengkap">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Kelas / Jabatan</label>
                    <input type="text" name="kelas" class="form-control" placeholder="Contoh: XII RPL 1">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">No. Telepon/WA</label>
                    <input type="text" name="nohp" class="form-control" placeholder="08xxxxxxxxxx">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Foto Profil</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Simpan Data</button>
                <a href="index.php?halaman=pelapor" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </main>
    </div>
</body>
</html>