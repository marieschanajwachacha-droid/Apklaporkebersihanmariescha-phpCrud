<?php
// pelapor/show.php - Detail Pelapor
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
    <title>Detail Pelapor</title>
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
            <h3 class="fw-bold mb-4">Detail Pelapor</h3>
            <div class="card col-md-6 shadow-sm">
                <div class="card-body text-center p-4">
                    <img src="assets/images/pelapor/<?= htmlspecialchars($data['foto'] ?? 'default.png') ?>" 
                         onerror="this.src='assets/images/pelapor/default.png'" 
                         class="rounded-circle mb-3 border" width="100" height="100" alt="Foto">
                    <h5 class="fw-bold mb-1"><?= htmlspecialchars($data['namasiswa']) ?></h5>
                    <p class="text-muted"><?= htmlspecialchars($data['nisn'] ?? '-') ?></p>
                    <table class="table table-borderless text-start border-top m-0">
                        <tr>
                            <th>Kelas/Jabatan</th>
                            <td>: <?= htmlspecialchars($data['kelas'] ?? '-') ?></td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>: <?= htmlspecialchars($data['nohp'] ?? '-') ?></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer bg-light">
                    <a href="index.php?halaman=pelapor" class="btn btn-secondary btn-sm">Kembali</a>
                    <a href="index.php?halaman=pelapor_edit&id=<?= $data['idsiswa'] ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>