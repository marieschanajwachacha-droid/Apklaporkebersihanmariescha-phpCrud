<?php
// user/edit.php - Form Edit User
$id    = intval($_GET['id'] ?? 0);
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE iduser = '$id'");
$data  = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: index.php?halaman=user");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../component/user/navbar.php'; ?>
    <div class="d-flex">
        <?php include __DIR__ . '/../component/user/sidebaradmin.php'; ?>
        <main class="flex-grow-1 p-4">
            <h3 class="fw-bold mb-4">Edit Data User</h3>
            <form action="proses/prosesuser.php" method="POST" class="col-md-6">
                <input type="hidden" name="aksi" value="edit">
                <input type="hidden" name="iduser" value="<?= $data['iduser'] ?>">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="namauser" class="form-control" value="<?= htmlspecialchars($data['namauser']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Username</label>
                    <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($data['username']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Password Baru <small class="text-muted">(Kosongkan jika tidak diubah)</small></label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="petugas" <?= $data['role'] == 'petugas' ? 'selected' : '' ?>>Petugas</option>
                        <option value="admin" <?= $data['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Update User</button>
                <a href="index.php?halaman=user" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </main>
    </div>
</body>
</html>