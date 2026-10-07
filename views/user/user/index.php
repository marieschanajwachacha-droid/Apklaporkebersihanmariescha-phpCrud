<?php
// user/index.php - Kelola Data Admin/Petugas
$query = mysqli_query($koneksi, "SELECT * FROM user ORDER BY iduser DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola User</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../component/user/navbar.php'; ?>
    <div class="d-flex">
        <?php include __DIR__ . '/../component/user/sidebaradmin.php'; ?>
        <main class="flex-grow-1 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold m-0">Data Admin & Petugas</h3>
                <a href="index.php?halaman=user_create" class="btn btn-success">+ Tambah User</a>
            </div>

            <div class="table-responsive bg-white p-3 rounded border shadow-sm">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama User</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        if (mysqli_num_rows($query) > 0):
                            while ($row = mysqli_fetch_assoc($query)): 
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['username']) ?></td>
                                <td class="fw-bold"><?= htmlspecialchars($row['namauser']) ?></td>
                                <td><span class="badge bg-info text-capitalize"><?= htmlspecialchars($row['role']) ?></span></td>
                                <td>
                                    <a href="index.php?halaman=user_show&id=<?= $row['iduser'] ?>" class="btn btn-info btn-sm text-white">Detail</a>
                                    <a href="index.php?halaman=user_edit&id=<?= $row['iduser'] ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                                    <a href="proses/prosesuser.php?aksi=hapus&id=<?= $row['iduser'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus user ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php 
                            endwhile;
                        else: 
                        ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada data user.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>