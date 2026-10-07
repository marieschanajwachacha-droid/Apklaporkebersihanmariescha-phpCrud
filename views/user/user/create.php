<!-- user/create.php - Form Tambah User -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../component/user/navbar.php'; ?>
    <div class="d-flex">
        <?php include __DIR__ . '/../component/user/sidebaradmin.php'; ?>
        <main class="flex-grow-1 p-4">
            <h3 class="fw-bold mb-4">Tambah Admin/Petugas Baru</h3>
            <form action="proses/prosesuser.php" method="POST" class="col-md-6">
                <input type="hidden" name="aksi" value="tambah">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="namauser" class="form-control" required placeholder="Nama User">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Username</label>
                    <input type="text" name="username" class="form-control" required placeholder="Username">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Password</label>
                    <input type="password" name="password" class="form-control" required placeholder="Password">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="petugas">Petugas</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Simpan User</button>
                <a href="index.php?halaman=user" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </main>
    </div>
</body>
</html>