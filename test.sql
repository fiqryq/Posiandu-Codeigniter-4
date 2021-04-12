-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2021 pada 12.21
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayi`
--

CREATE TABLE `bayi` (
  `id` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayi`
--

INSERT INTO `bayi` (`id`, `nama`, `tanggal_lahir`) VALUES
(1, 'Bayi A', '22 Juni 2021'),
(2, 'Bayi B', '22 Juni 2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_imunisasi`
--

CREATE TABLE `detail_imunisasi` (
  `id` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `ket_hadir` varchar(100) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `jadwal_imunisasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_imunisasi`
--

INSERT INTO `detail_imunisasi` (`id`, `nama`, `ket_hadir`, `catatan`, `jadwal_imunisasi`) VALUES
(NULL, 'Bayi A', 'tidak hadir', '', 'Testing'),
(NULL, 'Bayi B', 'tidak hadir', '', 'Testing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id` int(11) DEFAULT NULL,
  `tanggal` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `imunisasi`
--

INSERT INTO `imunisasi` (`id`, `tanggal`, `judul`) VALUES
(NULL, '22 Juli 2020', '123123'),
(NULL, '22 Juli 2020', 'Campak'),
(NULL, '22 Juli 2020', 'Polio'),
(NULL, '22 Juli 2020', 'Polio'),
(NULL, '22 Juli 2020', 'Polio 2'),
(NULL, '22 Juli 2020', 'Polio 2'),
(NULL, '22 Juli 2020', 'Testing');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
