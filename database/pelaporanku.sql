-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2023 pada 03.53
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelaporanku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `no_telp`, `aktif`) VALUES
('0051231231231231', 'sekar', 'sekar', '827ccb0eea8a706c4c34a16891f84e7b', '082123123123', 1),
('0978163875949095', 'raymon', 'raymon', 'c5a08664190cbeae58bed81ed2e6890b', '87156489506', 1),
('1234567890987654', 'Niaaa', 'masyarakat', '827ccb0eea8a706c4c34a16891f84e7b', '123456789098', 1),
('1283346542348765', 'icall', 'icall', '9d782f4907ce9fedf7d3014131435b8d', '089123456765', 1),
('1425376548976543', 'jeno', 'jenoo', '827ccb0eea8a706c4c34a16891f84e7b', '1234567797068', 1),
('1452637847654345', 'bagas', 'bagas', 'ee776a18253721efe8a62e4abd29dc47', '87654327685', 1),
('9109273849506594', 'aditya', 'aditya', '057829fa5a65fc1ace408f490be486ac', '14526378947', 1),
('989028987635478', 'andra', 'andra', '14180f38f11db420937b98aa24fad581', '088123547638', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` varchar(20) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `status_diterima` enum('diterima','ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `nama`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `status_diterima`) VALUES
(1677811923, 'aditya', '2023-03-03', '9109273849506594', 'ada sarang tawon besar dipohon pinggir jalan raya', 'sarang_tawon.jpg', 0, 'diterima'),
(1677811971, 'andra', '2023-03-03', '989028987635478', 'ada jalan retak sepanjang 2m yang bisa menyebar cepat', 'jalan_retak.jpg', 1, 'diterima'),
(1677812038, 'bagas', '2023-03-03', '1452637847654345', 'jembatan penghubung antara desa positif dan negatif rusak yang menghambat aktifitas warga', 'jembatan.jpg', 1, 'diterima'),
(1677812083, 'raymon', '2023-03-03', '0978163875949095', 'ada kucing yang saya temukan didepan rumah', 'kucing.jpg', 0, 'ditolak'),
(1677815223, 'sekar', '2023-03-03', '0051231231231231', 'terjadi pencurian perasaan orang laut yang tidak bisa move on, hanya karena disapa saat berangkat sekolah', 'kucing1.jpg', 2, 'diterima'),
(1677892047, 'bagas', '2023-03-04', '1452637847654345', 'ada rumah roboh disebabkan karena angin kencang semalam', 'rumah_roboh.jpg', 0, 'ditolak'),
(1677895473, 'icall', '2023-03-04', '1283346542348765', 'ada jalan berlubang yang cukup berbahaya jika dilewati oleh kendaraan bermotor', 'jalan-berlubang1.jpg', 0, 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `level` int(1) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_admin`, `nama`, `username`, `password`, `no_telp`, `level`, `aktif`) VALUES
(31, 'niaa', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '083133909901', 1, 1),
(32, 'aditt', 'aditt', '599856cf060b300e75bc6a9347f3fb47', '083456234897', 1, 0),
(33, 'faisal', 'faisal', 'f4668288fdbf9773dd9779d412942905', '089789876567', 2, 0),
(35, 'nia', 'petugas', '827ccb0eea8a706c4c34a16891f84e7b', '088123564675', 2, 0),
(36, 'novan', 'novan', '86b841de480bd4c10a60642dac5e8bb5', '081657485769', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`),
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `petugas` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
