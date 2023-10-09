-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2023 pada 03.57
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `nama_pengadu` varchar(50) NOT NULL,
  `email_pengadu` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `isi_pengaduan` longtext NOT NULL,
  `tanggal_pengaduan` datetime NOT NULL,
  `balasan_pengaduan` longtext NOT NULL,
  `tanggal_balasan` datetime NOT NULL,
  `status_pengaduan` enum('Belum','Sudah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `nama_pengadu`, `email_pengadu`, `no_hp`, `isi_pengaduan`, `tanggal_pengaduan`, `balasan_pengaduan`, `tanggal_balasan`, `status_pengaduan`) VALUES
(1, 'Erwin', 'ricardo_@gmail.com', '081239239123', 'asdasd', '2023-09-30 14:54:16', '', '0000-00-00 00:00:00', 'Belum'),
(2, 'Ricardo', 'ricardokaslana@gmail.com', '081348017876', 'asdasd', '2023-09-30 14:56:53', '', '0000-00-00 00:00:00', 'Belum'),
(3, 'Ricardo', 'ricardokaslana@gmail.com', '081348017876', 'asdasdas', '2023-09-30 14:57:21', '', '0000-00-00 00:00:00', 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `level` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `password`, `email`, `level`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ricardokaslana@gmail.com', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
