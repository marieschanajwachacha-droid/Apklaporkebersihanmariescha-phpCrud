<?php
// views/component/user/navbar.php - Navbar Admin & Petugas
$namauser = $_SESSION['namauser'] ?? $_SESSION['username'] ?? 'Petugas';
$role     = $_SESSION['role'] ?? 'petugas';
$foto     = $_SESSION['foto'] ?? 'default.png';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-success" href="index.php?halaman=dashboard<?= $role ?>">
      🌱 Admin & Petugas Panel
    </a>
    <div class="ms-auto d-flex align-items-center text-white gap-3">
      <div class="text-end">
        <span class="d-block fw-bold"><?= htmlspecialchars($namauser) ?></span>
        <small class="text-muted text-capitalize"><?= htmlspecialchars($role) ?></small>
      </div>
      <img src="assets/images/user/<?= htmlspecialchars($foto) ?>" onerror="this.src='assets/images/user/default.png'" class="rounded-circle" width="40" height="40" alt="Foto Profile">
      <a href="index.php?halaman=logout" class="btn btn-outline-danger btn-sm ms-2">Logout</a>
    </div>
  </div>
</nav>