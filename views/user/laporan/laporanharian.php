<?php
// laporan/laporanharian.php
$tgl   = $_GET['tanggal'] ?? date('Y-m-d');
$query = mysqli_query($koneksi, "SELECT p.*, s.namasiswa, k.namakategori, l.namalokasi 
                                   FROM pelaporan p 
                                   LEFT JOIN siswa s ON p.idsiswa = s.idsiswa 
                                   LEFT JOIN kategori k ON p.idkategori = k.idkategori 
                                   LEFT JOIN lokasi l ON p.idlokasi = l.idlokasi 
                                   WHERE DATE(p.created_at) = '$tgl' ORDER BY p.idpelaporan DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Harian</title>
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
            <h3 class="fw-bold mb-4">Rekap Laporan Harian</h3>
            
            <form method="GET" class="row g-3 mb-4">
                <input type="hidden" name="halaman" value="laporanharian">
                <div class="col-auto">
                    <input type="date" name="tanggal" class="form-control" value="<?= $tgl ?>">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="views/laporan/cetaklaporanharian.php?tanggal=<?= $tgl ?>" target="_blank" class="btn btn-success">🖨️ Cetak PDF/Print</a>
                </div>
            </form>

            <div class="table-responsive bg-white p-3 rounded border shadow-sm">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Pelapor</th>
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
                                <td><?= htmlspecialchars($row['namasiswa'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['namalokasi'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['namakategori'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['deskripsilengkap']) ?></td>
                                <td><span class="badge bg-secondary"><?= htmlspecialchars($row['status'] ?? 'Proses') ?></span></td>
                            </tr>
                        <?php 
                            endwhile;
                        else: 
                        ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">Tidak ada data untuk tanggal ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>