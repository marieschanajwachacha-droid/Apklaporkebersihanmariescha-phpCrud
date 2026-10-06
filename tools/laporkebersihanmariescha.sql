-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2026 at 03:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporkebersihanmariescha`
--

-- --------------------------------------------------------

--
-- Table structure for table `coba`
--

CREATE TABLE `coba` (
  `idcoba` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int NOT NULL,
  `namakategori` varchar(50) NOT NULL,
  `deskripsi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`, `deskripsi`) VALUES
(1, 'sampah berserakan', 'baunya menyebar mengganggu siswa belajar'),
(2, 'genangan air hujan', 'saluran selokan mampet sehingga air menggenang'),
(3, 'toilet kotor', 'kloset tersumbat dan menimbulkan bau yang tidak sedap');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `idlokasi` int NOT NULL,
  `namalokasi` varchar(50) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `alamatlengkap` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`idlokasi`, `namalokasi`, `deskripsi`, `alamatlengkap`) VALUES
(1, 'toilet sekolah', 'depan ruang kelas XIrpl2', '-'),
(2, 'Selokan depan kelas', 'selokan dekat depan kelas XIrpl2', '-'),
(3, 'toilet sekolah', 'kamar mandi siswa', '-');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int NOT NULL,
  `namasiswa` varchar(30) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `Foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `namasiswa`, `kelas`, `Foto`) VALUES
(1, 'Echa', 'XI RPL 2', 'memer.png'),
(2, 'nujul', 'x rpl2', 'nujul.png'),
(3, 'lutpi', 'x rpl2', 'lutpi.png'),
(4, ' lutpi', ' XIrpl2', ' lutpi.png');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `idtanggapan` int NOT NULL,
  `idsiswa` int NOT NULL,
  `idkategori` int NOT NULL,
  `idlokasi` int NOT NULL,
  `iduser` int NOT NULL,
  `deskripsilengkap` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`idtanggapan`, `idsiswa`, `idkategori`, `idlokasi`, `iduser`, `deskripsilengkap`, `foto`) VALUES
(1, 1, 1, 1, 1, 'baik nanti saya akan konfirmasi kepada sesi kebersihan', 'memer.png'),
(2, 2, 2, 2, 2, 'baik nanti saya akan konfirmasi kepada sesi kebersihan', 'memer.png'),
(3, 3, 3, 3, 3, 'baik nanti saya akan konfirmasi kepada sesi kebersihan', 'memer.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int NOT NULL,
  `namauser` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `namauser`, `username`, `password`, `nohp`, `alamat`, `foto`) VALUES
(1, 'mariescha', 'memer', '123', '085177587751', 'kebun tengah', 'memer.png'),
(2, 'hasena', 'sena', '123', '085177587751', 'bukit rata', 'sena.png'),
(3, 'algaray', 'garay', '123', '085177587751', 'desa perdamaian', 'garay.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`idlokasi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`idtanggapan`),
  ADD KEY `idsiswa` (`idsiswa`),
  ADD KEY `idkategori` (`idkategori`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idlokasi` (`idlokasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `idlokasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `idtanggapan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `idkategori` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`),
  ADD CONSTRAINT `idlokasi` FOREIGN KEY (`idlokasi`) REFERENCES `lokasi` (`idlokasi`),
  ADD CONSTRAINT `idsiswa` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`),
  ADD CONSTRAINT `iduser` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
