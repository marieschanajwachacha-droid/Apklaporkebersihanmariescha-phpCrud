<?php
// views/pelapor/riwayatlaporan.php - Riwayat Laporan Pelapor
$idsiswa = $_SESSION['idpelapor'] ?? 0;
$query   = mysqli_query($koneksi, "SELECT p.*, k.namakategori, l.namalokasi 
                                   FROM pelaporan p 
                                   LEFT JOIN kategori k ON p.idkategori = k.idkategori 
                                   LEFT JOIN lokasi l ON p.idlokasi = l.idlokasi 
                                   WHERE p.idsiswa = '$idsiswa' 
                                   ORDER BY p.idpelaporan DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Laporan - Lapor Kebersihan</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../component/pelapor/navbar.php'; ?>
    <div class="d-flex">
        <?php include __DIR__ . '/../component/pelapor/sidebar.php'; ?>
        <main class="flex-grow-1 p-4">
            <h3 class="fw-bold mb-4">Riwayat Laporan Saya</h3>
            <div class="table-responsive bg-white p-3 rounded border shadow-sm">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Lokasi</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
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
                                <td>
                                    <img src="assets/images/laporan/<?= htmlspecialchars($row['foto']) ?>" 
                                         onerror="this.src='assets/images/laporan/default.png'" 
                                         width="60" height="60" class="rounded object-fit-cover" alt="Foto Laporan">
                                </td>
                                <td><?= htmlspecialchars($row['namalokasi'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['namakategori'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['deskripsilengkap']) ?></td>
                                <td>
                                    <span class="badge bg-<?= ($row['status'] ?? '') == 'selesai' ? 'success' : 'warning' ?>">
                                        <?= htmlspecialchars($row['status'] ?? 'Proses') ?>
                                    </span>
                                </td>
                            </tr>
                        <?php 
                            endwhile;
                        else: 
                        ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada riwayat laporan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <?php include __DIR__ . '/../component/pelapor/footer.php'; ?>
</body>
</html>