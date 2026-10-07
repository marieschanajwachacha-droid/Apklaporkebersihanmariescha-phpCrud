<?php
// laporan/cetaklaporanharian.php - Halaman Cetak Laporan Harian
require_once __DIR__ . '/../../proses/koneksi.php';

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
    <title>Cetak Laporan Harian - <?= $tgl ?></title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2, h4 { text-align: center; margin: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body onload="window.print()">
    <h2>LAPORAN HARIAN KEBERSIHAN</h2>
    <h4>Tanggal: <?= date('d-m-Y', strtotime($tgl)) ?></h4>
    <hr>
    <table>
        <thead>
            <tr>
                <th>No</th>
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