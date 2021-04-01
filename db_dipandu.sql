-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Mar 2021 pada 17.44
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
-- Database: `db_dipandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anak`
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
-- Dumping data untuk tabel `anak`
--

INSERT INTO `anak` (`id`, `nama_anak`, `umur_anak`, `tinggi_anak`, `berat_anak`, `lingkar_kepala`, `jenis_kelamin`, `no_kk`) VALUES
(1, 'Contoh', '2', '50', '10', '10', 'Laki-laki', '7575757'),
(2, 'Testing', '3', '4', '4', '10', 'Laki-laki', '7575757');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
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
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `body`, `penulis`, `gambar`, `created_at`, `id_penulis`) VALUES
(39, 'Artikel Posiandu', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'bidan', 'playstore (1).png', '2021-03-22', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyuluhan`
--

CREATE TABLE `penyuluhan` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyuluhan`
--

INSERT INTO `penyuluhan` (`id`, `kegiatan`, `date`) VALUES
(43, 'Contoh Penyuluhan 1', '2020-12-11'),
(44, 'Contoh Penyuluhan 3', '2021-01-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `user_email`, `user_name`, `user_password`, `user_alamat`, `user_nik`, `user_kk`, `level`) VALUES
(1, 'fiqry@gmail.com', 'fiqry choerudin', '12345678', 'Sukapura', '123123123', '7575757', 4),
(2, 'admin@gmail.com', 'admin', '12345678', 'Sukapura', '123123123', '152152552', 1),
(3, 'kader@gmail.com', 'kader', '12345678', 'Sukapura', '123123123', '353525353532', 3),
(4, 'bidan@gmail.com', 'bidan', '12345678', 'bandung', '1124214212', '757565645', 2),
(30, 'fiqryq@gmail.com', 'fiqrychoerudin', '12345678', 'Gg.desa lengkong rt.05 rw.01  no.70 ds. ', '1234567890123456', '123123123123123', 4),
(32, 'asfafaf@asf.com', 'asfasfsf', 'afasfasf', 'afafafaff', '121312321312313', '13123131312213', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyuluhan`
--
ALTER TABLE `penyuluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anak`
--
ALTER TABLE `anak`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `penyuluhan`
--
ALTER TABLE `penyuluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
