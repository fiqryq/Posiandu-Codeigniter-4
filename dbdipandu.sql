-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 01:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdipandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `id` int(10) NOT NULL,
  `nama_anak` varchar(255) NOT NULL,
  `umur_anak` varchar(255) NOT NULL,
  `tinggi_anak` varchar(255) NOT NULL,
  `berat_anak` varchar(255) NOT NULL,
  `lingkar_kepala` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `no_kk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id`, `nama_anak`, `umur_anak`, `tinggi_anak`, `berat_anak`, `lingkar_kepala`, `jenis_kelamin`, `no_kk`) VALUES
(1, 'INDAH RATNA FURI\r\n', '2', '50', '10', '10', 'Perempuan', '3276046501920003');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `id_penulis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `body`, `penulis`, `gambar`, `created_at`, `id_penulis`) VALUES
(39, 'Artikel Posiandu', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'bidan', 'playstore (1).png', '2021-03-22', 4);

-- --------------------------------------------------------

--
-- Table structure for table `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id` int(11) NOT NULL,
  `nama_imunisasi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imunisasi`
--

INSERT INTO `imunisasi` (`id`, `nama_imunisasi`, `tanggal`) VALUES
(12, 'Imunisasi 1', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `penyuluhan`
--

CREATE TABLE `penyuluhan` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyuluhan`
--

INSERT INTO `penyuluhan` (`id`, `kegiatan`, `date`) VALUES
(43, 'Contoh Penyuluhan 1', '2020-12-11'),
(44, 'Contoh Penyuluhan 3', '2021-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `posiandu`
--

CREATE TABLE `posiandu` (
  `id` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_alamat` varchar(255) NOT NULL,
  `user_nik` varchar(255) NOT NULL,
  `user_kk` varchar(255) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_email`, `user_name`, `user_password`, `user_alamat`, `user_nik`, `user_kk`, `level`) VALUES
(1, 'ortu@gmail.com', 'ortu', '12345678', 'Sukapura', '3271046504930001', '3276046501920003', 4),
(2, 'admin@gmail.com', 'admin', '12345678', 'Sukapura', '3271046504930002', '152152552', 1),
(3, 'kader@gmail.com', 'kader', '12345678', 'Sukapura', '3271046504930003', '353525353532', 3),
(4, 'bidan@gmail.com', 'bidan', '12345678', 'bandung', '3271046504930004', '757565645', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyuluhan`
--
ALTER TABLE `penyuluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posiandu`
--
ALTER TABLE `posiandu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penyuluhan`
--
ALTER TABLE `penyuluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `posiandu`
--
ALTER TABLE `posiandu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
