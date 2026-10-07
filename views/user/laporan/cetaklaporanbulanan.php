<?php
// laporan/cetaklaporanbulanan.php - Halaman Cetak Laporan Bulanan
require_once __DIR__ . '/../../proses/koneksi.php';

$bulan = $_GET['bulan'] ?? date('m');
$tahun = $_GET['tahun'] ?? date('Y');

$query = mysqli_query($koneksi, "SELECT p.*, s.namasiswa, k.namakategori, l.namalokasi 
                                   FROM pelaporan p 
                                   LEFT JOIN siswa s ON p.idsiswa = s.idsiswa 
                                   LEFT JOIN kategori k ON p.idkategori = k.idkategori 
                                   LEFT JOIN lokasi l ON p.idlokasi = l.idlokasi 
                                   WHERE MONTH(p.created_at) = '$bulan' AND YEAR(p.created_at) = '$tahun' 
                                   ORDER BY p.idpelaporan DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Bulanan - <?= $bulan ?>/<?= $tahun ?></title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2, h4 { text-align: center; margin: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body onload="window.print()">
    <h2>LAPORAN BULANAN KEBERSIHAN</h2>
    <h4>Bulan: <?= $bulan ?> | Tahun: <?= $tahun ?></h4>
    <hr>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelapor</th>
                <th>Lokasi</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)): 
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= date('d-m-Y', strtotime($row['created_at'])) ?></td>
                    <td><?= htmlspecialchars($row['namasiswa'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($row['namalokasi'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($row['namakategori'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($row['deskripsilengkap']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>