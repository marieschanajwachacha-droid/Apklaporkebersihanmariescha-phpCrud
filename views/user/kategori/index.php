<?php
// kategori/index.php - Menampilkan Daftar Kategori Kebersihan
$query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY idkategori DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Kategori Kebersihan</title>
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold m-0">Data Kategori Kebersihan</h3>
                <a href="index.php?halaman=kategori_create" class="btn btn-success">+ Tambah Kategori</a>
            </div>

            <div class="table-responsive bg-white p-3 rounded border shadow-sm">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
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
                                <td class="fw-bold"><?= htmlspecialchars($row['namakategori']) ?></td>
                                <td>
                                    <a href="index.php?halaman=kategori_show&id=<?= $row['idkategori'] ?>" class="btn btn-info btn-sm text-white">Detail</a>
                                    <a href="index.php?halaman=kategori_edit&id=<?= $row['idkategori'] ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                                    <a href="proses/proseskategori.php?aksi=hapus&id=<?= $row['idkategori'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php 
                            endwhile;
                        else: 
                        ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">Belum ada data kategori.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>