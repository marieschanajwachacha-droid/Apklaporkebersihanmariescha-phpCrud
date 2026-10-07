<?php
// views/pelapor/profil.php - Halaman Profil Pelapor (Siswa)
$idsiswa = $_SESSION['idpelapor'] ?? 0;
$query   = mysqli_query($koneksi, "SELECT * FROM siswa WHERE idsiswa = '$idsiswa'");
$siswa   = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya - Lapor Kebersihan</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../component/pelapor/navbar.php'; ?>
    <div class="d-flex">
        <?php include __DIR__ . '/../component/pelapor/sidebar.php'; ?>
        <main class="flex-grow-1 p-4">
            <h3 class="fw-bold mb-4">Profil Pelapor</h3>
            <div class="card col-md-6 shadow-sm">
                <div class="card-body text-center p-4">
                    <img src="assets/images/pelapor/<?= htmlspecialchars($siswa['foto'] ?? 'default.png') ?>" 
                         onerror="this.src='assets/images/pelapor/default.png'" 
                         class="rounded-circle mb-3 border" width="100" height="100" alt="Foto Profil">
                    <h5 class="fw-bold mb-1"><?= htmlspecialchars($siswa['namasiswa'] ?? '-') ?></h5>
                    <p class="text-muted mb-3"><?= htmlspecialchars($siswa['nisn'] ?? '-') ?></p>
                    
                    <ul class="list-group list-group-flush text-start border-top">
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="text-muted">Kelas / Jabatan:</span>
                            <span class="fw-bold"><?= htmlspecialchars($siswa['kelas'] ?? '-') ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="text-muted">Nomor Telepon:</span>
                            <span class="fw-bold"><?= htmlspecialchars($siswa['nohp'] ?? '-') ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
    <?php include __DIR__ . '/../component/pelapor/footer.php'; ?>
</body>
</html>