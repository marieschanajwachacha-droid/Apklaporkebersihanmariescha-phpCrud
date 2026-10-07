<?php
// views/component/pelapor/navbar.php - Navbar Pelapor
$namapelapor = $_SESSION['namapelapor'] ?? 'Pelapor';
$foto        = $_SESSION['foto'] ?? 'default.png';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php?halaman=dashboardpelapor">
      🌱 Portal Pelapor Kebersihan
    </a>
    <div class="ms-auto d-flex align-items-center text-white gap-3">
      <span class="fw-bold"><?= htmlspecialchars($namapelapor) ?></span>
      <img src="assets/images/pelapor/<?= htmlspecialchars($foto) ?>" onerror="this.src='assets/images/pelapor/default.png'" class="rounded-circle" width="38" height="38" alt="Profil Pelapor">
      <a href="index.php?halaman=logout" class="btn btn-outline-light btn-sm ms-2">Keluar</a>
    </div>
  </div>
</nav>