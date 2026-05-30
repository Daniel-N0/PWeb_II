-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for perpustakaan_daniel
CREATE DATABASE IF NOT EXISTS `perpustakaan_daniel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `perpustakaan_daniel`;

-- Dumping structure for table perpustakaan_daniel.buku
CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(500) NOT NULL,
  `penulis` varchar(500) DEFAULT NULL,
  `penerbit` varchar(250) DEFAULT NULL,
  `tahun_terbit` int DEFAULT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table perpustakaan_daniel.buku: ~5 rows (approximately)
INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`) VALUES
	(1, 'Pemrograman Web dengan PHP dan MySQL', 'Budi Raharjo', 'Informatika', 2021),
	(2, 'Mastering Android Jetpack Compose', 'Google Developer Team', 'Android Press', 2023),
	(3, 'Database Systems: Design, Implementation, and Management', 'Carlos Coronel', 'Cengage Learning', 2018),
	(4, 'Jaringan Komputer Dasar dengan Cisco', 'Iwan Sofana', 'Informatika', 2020),
	(5, 'Implementasi AIoT untuk Pertanian Modern', 'Tim Peneliti', 'Agrikultur Press', 2025);

-- Dumping structure for table perpustakaan_daniel.member
CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int NOT NULL AUTO_INCREMENT,
  `nama_member` varchar(250) NOT NULL,
  `nomor_member` varchar(15) NOT NULL,
  `alamat` text,
  `tgl_mendaftar` datetime DEFAULT NULL,
  `tgl_terakhir_bayar` date DEFAULT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table perpustakaan_daniel.member: ~5 rows (approximately)
INSERT INTO `member` (`id_member`, `nama_member`, `nomor_member`, `alamat`, `tgl_mendaftar`, `tgl_terakhir_bayar`) VALUES
	(1, 'Daniel Noprianto', 'MBR-001', 'Jl. Kayu Tangi No. 1', '2025-10-01 08:30:00', '2026-05-01'),
	(2, 'Indra', 'MBR-002', 'Jl. Kayu Tangi No. 4', '2025-10-02 09:15:00', '2026-05-02'),
	(3, 'Rizki', 'MBR-003', 'Jl. Cendana No. 7', '2025-10-03 10:45:00', '2026-05-03'),
	(4, 'Nando', 'MBR-004', 'Jl. Cendana No. 10', '2025-10-04 11:20:00', '2026-05-04'),
	(5, 'Zul', 'MBR-005', 'Jl. Pramuka No. 15', '2025-10-05 13:00:00', '2026-05-05');

-- Dumping structure for table perpustakaan_daniel.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int NOT NULL AUTO_INCREMENT,
  `id_member` int DEFAULT NULL,
  `id_buku` int DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  PRIMARY KEY (`id_peminjaman`),
  KEY `id_member` (`id_member`),
  KEY `id_buku` (`id_buku`),
  CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table perpustakaan_daniel.peminjaman: ~5 rows (approximately)
INSERT INTO `peminjaman` (`id_peminjaman`, `id_member`, `id_buku`, `tgl_pinjam`, `tgl_kembali`) VALUES
	(1, 1, 2, '2026-05-01', '2026-05-08'),
	(2, 5, 1, '2026-05-02', '2026-05-09'),
	(3, 2, 3, '2026-05-03', '2026-05-10'),
	(4, 3, 4, '2026-05-04', '2026-05-11'),
	(5, 4, 5, '2026-05-05', '2026-05-12');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
