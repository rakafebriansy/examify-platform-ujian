-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2024 at 05:19 PM
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
-- Database: `examify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `nama_pengguna` varchar(60) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_pengguna`, `kata_sandi`) VALUES
(1, 'raka', '123');

-- --------------------------------------------------------

--
-- Table structure for table `detail_soal`
--

CREATE TABLE `detail_soal` (
  `id` int NOT NULL,
  `id_ujian` int NOT NULL,
  `id_soal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_soal`
--

INSERT INTO `detail_soal` (`id`, `id_ujian`, `id_soal`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `detail_ujian`
--

CREATE TABLE `detail_ujian` (
  `id` int NOT NULL,
  `id_siswa` int NOT NULL,
  `id_ujian` int NOT NULL,
  `skor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_ujian`
--

INSERT INTO `detail_ujian` (`id`, `id_siswa`, `id_ujian`, `skor`) VALUES
(1, 1, 1, 25),
(2, 1, 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int NOT NULL,
  `nip` char(18) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama`, `kata_sandi`) VALUES
(1, '12345678', 'kiko', '$2y$10$mzjZmSLHAROBPNE5rFdHb.4ncMwfcLu0vTjKuwvX5PpFr9uruuc/O');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int NOT NULL,
  `jawaban` text NOT NULL,
  `id_soal` int NOT NULL,
  `opsi` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `jawaban`, `id_soal`, `opsi`) VALUES
(1, 'Prabowo', 1, 'a'),
(2, 'Jamal', 1, 'b'),
(3, 'Devin', 1, 'c'),
(4, 'Deren', 1, 'd'),
(5, 'Ya', 2, 'a'),
(6, 'Tidak', 2, 'b'),
(7, 'Bukan', 2, 'c'),
(8, 'Mungkin', 2, 'd'),
(9, '49', 3, 'a'),
(10, '48', 3, 'b'),
(11, '1', 3, 'c'),
(12, '1000', 3, 'd'),
(13, 'Thomas Edison', 4, 'a'),
(14, 'Alexander Graham Bell', 4, 'b'),
(15, 'Jessica Alba', 4, 'c'),
(16, 'Leonardo Dicaprio', 4, 'd'),
(17, 'Kamu', 5, 'a'),
(18, 'Soeharto', 5, 'b'),
(19, 'Jajan', 5, 'c'),
(20, 'Babi', 5, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int NOT NULL,
  `nama` varchar(60) NOT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `nama`, `id_admin`) VALUES
(1, 'Matematika', 1),
(2, 'Bahasa Indonesia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int NOT NULL,
  `nis` char(10) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jurusan` enum('mipa','ips') NOT NULL,
  `kelas` enum('1','2','3','4','5','6') NOT NULL,
  `kata_sandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `jurusan`, `kelas`, `kata_sandi`) VALUES
(1, '12345678', 'raider', 'mipa', '6', '$2y$10$Fqfk/H/Zbv1Jq/yRjbjeIuAsY6ZM6P.NsA7Br52HJZd1oai0VPQ.G');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int NOT NULL,
  `pertanyaan` text NOT NULL,
  `kunci_jawaban` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `pertanyaan`, `kunci_jawaban`) VALUES
(1, 'Siapakah ayahku?', 'd'),
(2, 'Apakah zoom kamu premium?', 'd'),
(3, 'Berapa jumlah kromosom Y pada bulu babi?', 'd'),
(4, 'Siapa penemu bola lampu?', 'a'),
(5, 'Siapakah aku?', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id` int NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_mata_pelajaran` int NOT NULL,
  `id_guru` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id`, `nama`, `tanggal_ujian`, `token`, `id_mata_pelajaran`, `id_guru`) VALUES
(1, 'UTS Matematika Kelas 12', '2024-06-01', '665aa6079318a', 1, 1),
(2, 'UTS Bahasa Indonesia Kelas 12', '2024-06-01', '665aa60795539', 2, 1),
(3, 'UTS Bahasa Indonesia Kelas 11', '2024-06-01', '665aa607966d5', 2, 1),
(4, 'UTS Bahasa Indonesia Kelas 10', '2024-06-01', '665aa60799de6', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_soal`
--
ALTER TABLE `detail_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_soal` (`id_soal`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indexes for table `detail_ujian`
--
ALTER TABLE `detail_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ujian` (`id_ujian`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_mata_pelajaran` (`id_mata_pelajaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_soal`
--
ALTER TABLE `detail_soal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_ujian`
--
ALTER TABLE `detail_ujian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_soal`
--
ALTER TABLE `detail_soal`
  ADD CONSTRAINT `detail_soal_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id`),
  ADD CONSTRAINT `detail_soal_ibfk_2` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id`);

--
-- Constraints for table `detail_ujian`
--
ALTER TABLE `detail_ujian`
  ADD CONSTRAINT `detail_ujian_ibfk_1` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id`),
  ADD CONSTRAINT `detail_ujian_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`);

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id`);

--
-- Constraints for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD CONSTRAINT `mata_pelajaran_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `ujian_ibfk_2` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `mata_pelajaran` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
