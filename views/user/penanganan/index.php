<?php
// penanganan/index.php - Daftar Penanganan Laporan Kebersihan
$query = mysqli_query($koneksi, "SELECT p.*, s.namasiswa, k.namakategori, l.namalokasi 
                                   FROM pelaporan p 
                                   LEFT JOIN siswa s ON p.idsiswa = s.idsiswa 
                                   LEFT JOIN kategori k ON p.idkategori = k.idkategori 
                                   LEFT JOIN lokasi l ON p.idlokasi = l.idlokasi 
                                   ORDER BY p.idpelaporan DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penanganan Laporan</title>
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
            <h3 class="fw-bold mb-4">Daftar Penanganan Laporan</h3>
            <div class="table-responsive bg-white p-3 rounded border shadow-sm">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Pelapor</th>
                            <th>Lokasi</th>
                            <th>Kategori</th>
                            <th>Status</th>
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
                                <td><?= htmlspecialchars($row['namasiswa'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['namalokasi'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['namakategori'] ?? '-') ?></td>
                                <td>
                                    <span class="badge bg-<?= ($row['status'] ?? '') == 'selesai' ? 'success' : 'warning' ?>">
                                        <?= htmlspecialchars($row['status'] ?? 'Proses') ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="index.php?halaman=penanganan_detail&id=<?= $row['idpelaporan'] ?>" class="btn btn-info btn-sm text-white">Detail</a>
                                    <a href="index.php?halaman=penanganan_konfirmasi&id=<?= $row['idpelaporan'] ?>" class="btn btn-success btn-sm">Tindak Lanjuti</a>
                                </td>
                            </tr>
                        <?php 
                            endwhile;
                        else: 
                        ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada data penanganan laporan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>