<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek status login
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'pelapor') {
    header("Location: index.php?halaman=loginpelapor");
    exit();
}

require_once 'proses/koneksi.php';

// Ambil data lokasi (disesuaikan dengan nama kolom 'namalokasi' pada tabel lokasi)
$queryLokasi = mysqli_query($koneksi, "SELECT * FROM lokasi ORDER BY namalokasi ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan Kebersihan Baru</title>
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .btn-success-custom {
            background-color: #198754;
            border: none;
        }
        .btn-success-custom:hover {
            background-color: #157347;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <!-- Tombol Kembali -->
            <div class="mb-3">
                <a href="index.php?halaman=dashboardpelapor" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>

            <!-- Form Card -->
            <div class="card card-custom p-4 bg-white">
                <div class="d-flex align-items-center mb-4 border-bottom pb-3">
                    <i class="bi bi-plus-circle-fill text-success fs-2 me-3"></i>
                    <div>
                        <h4 class="mb-0 fw-bold">Lapor Kebersihan Baru</h4>
                        <small class="text-muted">Isi formulir di bawah ini untuk mengirimkan laporan kebersihan.</small>
                    </div>
                </div>

                <form action="proses/prosespelaporan.php?aksi=tambah" method="POST" enctype="multipart/form-data">
                    
                    <!-- Pilih Lokasi -->
                    <div class="mb-3">
                        <label for="idlokasi" class="form-label fw-semibold">Lokasi Fasilitas / Area</label>
                        <select name="idlokasi" id="idlokasi" class="form-select" required>
                            <option value="">-- Pilih Lokasi --</option>
                            <?php 
                            if ($queryLokasi && mysqli_num_rows($queryLokasi) > 0) {
                                while ($lokasi = mysqli_fetch_assoc($queryLokasi)) {
                                    $namaLokasi = $lokasi['namalokasi'] ?? $lokasi['nama_lokasi'] ?? 'Lokasi';
                                    echo "<option value='".$lokasi['idlokasi']."'>".htmlspecialchars($namaLokasi)."</option>";
                                }
                            } else {
                                echo "<option value='1'>Area Umum / Kelas</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Judul / Catatan Laporan -->
                    <div class="mb-3">
                        <label for="catatan" class="form-label fw-semibold">Deskripsi Laporan / Keluhan</label>
                        <textarea name="catatan" id="catatan" rows="4" class="form-control" placeholder="Jelaskan kondisi kebersihan atau kendala yang ditemui..." required></textarea>
                    </div>

                    <!-- Upload Foto Bukti -->
                    <div class="mb-4">
                        <label for="foto" class="form-label fw-semibold">Foto Bukti Kebersihan</label>
                        <input type="file" name="foto" id="foto" class="form-control" accept="image/*" required>
                        <small class="text-muted">Format yang diperbolehkan: JPG, JPEG, PNG (Maksimal 2MB).</small>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-success-custom py-2 fw-semibold">
                            <i class="bi bi-send-fill me-1"></i> Kirim Laporan Sekarang
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>