<?php
require_once '../../../proses/session.php';
check_pelapor(); // Keamanan akses login pelapor

require_once '../../../proses/koneksi.php';

$id_pelapor = $_SESSION['id_pelapor'];

// Query join tabel pelaporan, lokasi, dan kategori
$query = "SELECT p.*, l.nama_lokasi, k.nama_kategori 
          FROM tb_pelaporan p
          JOIN tb_lokasi l ON p.id_lokasi = l.id_lokasi
          JOIN tb_kategori k ON p.id_kategori = k.id_kategori
          WHERE p.id_pelapor = '$id_pelapor'
          ORDER BY p.tanggal_lapor DESC";

$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengaduan Saya</title>
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <!-- Include Navbar Pelapor -->
    <?php include '../../component/pelapor/navbar.php'; ?>

    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-success">Riwayat Pengaduan Saya</h3>
            <a href="create.php" class="btn btn-success">+ Buat Laporan Baru</a>
        </div>

        <?php if (isset($_GET['status']) && $_GET['status'] == 'success_add'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Laporan berhasil dikirim! Petugas akan segera menindaklanjuti.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Lokasi</th>
                                <th>Kategori</th>
                                <th>Foto Bukti</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            if (mysqli_num_rows($result) > 0):
                                while ($row = mysqli_fetch_assoc($result)): 
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($row['tanggal_lapor'])); ?></td>
                                    <td><?= htmlspecialchars($row['nama_lokasi']); ?></td>
                                    <td><?= htmlspecialchars($row['nama_kategori']); ?></td>
                                    <td>
                                        <img src="../../../assets/images/laporan/<?= $row['foto']; ?>" width="60" height="60" class="rounded object-fit-cover" alt="Foto Bukti">
                                    </td>
                                    <td>
                                        <?php 
                                            if ($row['status'] == 'Pending') {
                                                echo '<span class="badge bg-warning text-dark">Pending</span>';
                                            } elseif ($row['status'] == 'Proses') {
                                                echo '<span class="badge bg-info text-dark">Diproses</span>';
                                            } elseif ($row['status'] == 'Selesai') {
                                                echo '<span class="badge bg-success">Selesai</span>';
                                            } else {
                                                echo '<span class="badge bg-danger">Ditolak</span>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php 
                                endwhile;
                            else: 
                            ?>
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">Belum ada riwayat laporan yang dibuat.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Footer Pelapor -->
    <?php include '../../component/pelapor/footer.php'; ?>

    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>