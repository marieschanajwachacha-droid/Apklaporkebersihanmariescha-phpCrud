<?php
// penanganan/detail.php - Detail Penanganan Laporan Kebersihan
$id    = intval($_GET['id'] ?? 0);
$query = mysqli_query($koneksi, "SELECT p.*, s.namasiswa, k.namakategori, l.namalokasi 
                                   FROM pelaporan p 
                                   LEFT JOIN siswa s ON p.idsiswa = s.idsiswa 
                                   LEFT JOIN kategori k ON p.idkategori = k.idkategori 
                                   LEFT JOIN lokasi l ON p.idlokasi = l.idlokasi 
                                   WHERE p.idpelaporan = '$id'");
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
    <title>Detail Penanganan Laporan</title>
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
            <h3 class="fw-bold mb-4">Detail Laporan</h3>
            <div class="card col-md-8 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="assets/images/laporan/<?= htmlspecialchars($data['foto']) ?>" 
                                 onerror="this.src='assets/images/laporan/default.png'" 
                                 class="img-fluid rounded border mb-3" alt="Foto Laporan">
                        </div>
                        <div class="col-md-7">
                            <table class="table table-borderless m-0">
                                <tr><th>Pelapor</th><td>: <?= htmlspecialchars($data['namasiswa'] ?? '-') ?></td></tr>
                                <tr><th>Lokasi</th><td>: <?= htmlspecialchars($data['namalokasi'] ?? '-') ?></td></tr>
                                <tr><th>Kategori</th><td>: <?= htmlspecialchars($data['namakategori'] ?? '-') ?></td></tr>
                                <tr><th>Status</th><td>: <span class="badge bg-<?= ($data['status'] ?? '') == 'selesai' ? 'success' : 'warning' ?>"><?= htmlspecialchars($data['status'] ?? 'Proses') ?></span></td></tr>
                                <tr><th>Deskripsi</th><td>: <?= htmlspecialchars($data['deskripsilengkap']) ?></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <a href="index.php?halaman=penanganan" class="btn btn-secondary btn-sm">Kembali</a>
                    <a href="index.php?halaman=penanganan_konfirmasi&id=<?= $data['idpelaporan'] ?>" class="btn btn-success btn-sm">Ubah Status / Tindak Lanjuti</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>