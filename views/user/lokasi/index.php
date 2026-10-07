<?php
// lokasi/index.php - Menampilkan Daftar Lokasi
$query = mysqli_query($koneksi, "SELECT * FROM lokasi ORDER BY idlokasi DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Lokasi</title>
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold m-0">Data Lokasi Kebersihan</h3>
                <a href="index.php?halaman=lokasi_create" class="btn btn-success">+ Tambah Lokasi</a>
            </div>

            <div class="table-responsive bg-white p-3 rounded border shadow-sm">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Lokasi</th>
                            <th>Keterangan</th>
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
                                <td class="fw-bold"><?= htmlspecialchars($row['namalokasi']) ?></td>
                                <td><?= htmlspecialchars($row['keterangan'] ?? '-') ?></td>
                                <td>
                                    <a href="index.php?halaman=lokasi_show&id=<?= $row['idlokasi'] ?>" class="btn btn-info btn-sm text-white">Detail</a>
                                    <a href="index.php?halaman=lokasi_edit&id=<?= $row['idlokasi'] ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                                    <a href="proses/proseslokasi.php?aksi=hapus&id=<?= $row['idlokasi'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus lokasi ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php 
                            endwhile;
                        else: 
                        ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">Belum ada data lokasi.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>