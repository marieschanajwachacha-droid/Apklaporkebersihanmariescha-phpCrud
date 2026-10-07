<?php
// user/show.php - Detail User
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
    <title>Detail User</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../component/user/navbar.php'; ?>
    <div class="d-flex">
        <?php include __DIR__ . '/../component/user/sidebaradmin.php'; ?>
        <main class="flex-grow-1 p-4">
            <h3 class="fw-bold mb-4">Detail Data User</h3>
            <div class="card col-md-6 shadow-sm">
                <div class="card-body">
                    <table class="table table-borderless m-0">
                        <tr>
                            <th width="35%">ID User</th>
                            <td>: <?= $data['iduser'] ?></td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>: <?= htmlspecialchars($data['namauser']) ?></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>: <?= htmlspecialchars($data['username']) ?></td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>: <span class="badge bg-info text-capitalize"><?= htmlspecialchars($data['role']) ?></span></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer bg-light">
                    <a href="index.php?halaman=user" class="btn btn-secondary btn-sm">Kembali</a>
                    <a href="index.php?halaman=user_edit&id=<?= $data['iduser'] ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>