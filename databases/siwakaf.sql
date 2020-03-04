-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2020 pada 08.17
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siwakaf`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(20) NOT NULL,
  `id_ranting` varchar(20) NOT NULL,
  `nama_admin` varchar(250) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `is_online` int(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `id_ranting`, `nama_admin`, `level`, `alamat`, `telp`, `username`, `password`, `status`, `is_online`, `created`, `updated`) VALUES
('98441070693580802', '98441070693580800', 'Ervin Fikot M', 1, 'Piyungan', '12345', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1', 1, '2019-11-01 09:01:09', NULL),
('admin-218d3a0cdcdfc9', 'ranting-bc3311ef873b', 'ahmad', 2, 'akertopaten', '123456781473', 'a', '356a192b7913b04c54574d18c28d46e6395428ab', '1', 1, '2020-02-23 13:24:57', NULL),
('admin-9a589d8765130b', 'ranting-e8eea89ed31b', 'b', 2, 'b', '2', 'b', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', '1', 0, '2020-02-23 13:25:07', NULL),
('admin-aee38f187ec6db', 'ranting-8e1c8d93ff0f', 'Bambang', 2, 'Srimartani', '1235', 'Bambang', '8cb2237d0679ca88db6464eac60da96345513964', '1', 0, '2020-02-23 07:29:02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin_login`
--

CREATE TABLE `tb_admin_login` (
  `id_login` int(11) NOT NULL,
  `id_admin` varchar(20) NOT NULL,
  `time_login` datetime NOT NULL DEFAULT current_timestamp(),
  `time_logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin_login`
--

INSERT INTO `tb_admin_login` (`id_login`, `id_admin`, `time_login`, `time_logout`) VALUES
(30, '98441070693580802', '2020-02-25 21:02:13', '2020-02-29 18:10:46'),
(31, '98441070693580802', '2020-02-26 12:25:50', '2020-02-29 18:10:46'),
(32, '98441070693580802', '2020-02-28 20:58:59', '2020-02-29 18:10:46'),
(33, '98441070693580802', '2020-02-29 09:42:35', '2020-02-29 18:10:46'),
(34, '98441070693580802', '2020-02-29 10:23:00', '2020-02-29 18:10:46'),
(35, 'admin-218d3a0cdcdfc9', '2020-02-29 11:01:02', '2020-02-29 18:33:00'),
(36, '98441070693580802', '2020-02-29 17:55:40', '2020-02-29 18:10:46'),
(37, '98441070693580802', '2020-02-29 18:17:38', '2020-02-29 18:10:46'),
(38, '98441070693580802', '2020-02-29 19:06:23', '2020-02-29 18:10:46'),
(39, '98441070693580802', '2020-02-29 22:37:21', '2020-02-29 18:10:46'),
(40, 'admin-218d3a0cdcdfc9', '2020-03-01 00:10:49', '2020-02-29 18:33:00'),
(41, '98441070693580802', '2020-03-01 00:33:05', NULL),
(42, '98441070693580802', '2020-03-01 10:10:10', NULL),
(43, 'admin-218d3a0cdcdfc9', '2020-03-01 10:17:03', NULL),
(44, '98441070693580802', '2020-03-01 22:19:57', NULL),
(45, '98441070693580802', '2020-03-02 23:57:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aset_barang`
--

CREATE TABLE `tb_aset_barang` (
  `id_aset_barang` varchar(20) NOT NULL,
  `id_ranting` varchar(20) NOT NULL,
  `nama_aset` varchar(250) NOT NULL,
  `jenis_aset` varchar(100) NOT NULL,
  `kondisi_aset` enum('A','B','C') NOT NULL,
  `harga_aset` varchar(100) NOT NULL,
  `jumlah_aset` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar_aset` varchar(250) NOT NULL,
  `tgl_masuk_aset` date DEFAULT NULL,
  `created_aset_barang` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_aset_barang` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_aset_barang`
--

INSERT INTO `tb_aset_barang` (`id_aset_barang`, `id_ranting`, `nama_aset`, `jenis_aset`, `kondisi_aset`, `harga_aset`, `jumlah_aset`, `keterangan`, `gambar_aset`, `tgl_masuk_aset`, `created_aset_barang`, `updated_aset_barang`) VALUES
('AB-67e76785807363969', '98441070693580800', 'a', '1', 'A', '1', '1', '-', '', '2020-03-14', '2020-03-02 17:04:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aset_tanah`
--

CREATE TABLE `tb_aset_tanah` (
  `id_aset_tanah` varchar(20) NOT NULL,
  `id_ranting` varchar(20) NOT NULL,
  `lokasi_tanah` text DEFAULT NULL,
  `aset_akta_tanah` varchar(250) NOT NULL,
  `luas_tanah` varchar(100) DEFAULT NULL,
  `harga_tanah` varchar(100) NOT NULL,
  `penggunaan_aset` varchar(250) DEFAULT NULL,
  `luas_bangunan` varchar(100) DEFAULT NULL,
  `tempat_arsip` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dokumentasi` varchar(250) NOT NULL,
  `tgl_masuk_tanah` date NOT NULL,
  `created_aset_tanah` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_aset_tanah` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_forum`
--

CREATE TABLE `tb_forum` (
  `id_forum` int(11) NOT NULL,
  `id_admin` varchar(20) NOT NULL,
  `pesan_forum` text NOT NULL,
  `created_forum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_forum`
--

INSERT INTO `tb_forum` (`id_forum`, `id_admin`, `pesan_forum`, `created_forum`) VALUES
(67, '98441070693580802', 'Halooo.....', '2020-03-02 16:59:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ranting`
--

CREATE TABLE `tb_ranting` (
  `id_ranting` varchar(20) NOT NULL,
  `kode_ranting` varchar(10) NOT NULL,
  `nama_ranting` varchar(250) NOT NULL,
  `pimpinan` varchar(250) DEFAULT NULL,
  `alamat_ranting` text NOT NULL,
  `telp_ranting` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ranting`
--

INSERT INTO `tb_ranting` (`id_ranting`, `kode_ranting`, `nama_ranting`, `pimpinan`, `alamat_ranting`, `telp_ranting`) VALUES
('98441070693580800', 'AA123', 'Cabang Piyungan', 'Ervin Fikot M', 'Jalan Wonosari Km 12', '0582'),
('ranting-8e1c8d93ff0f', '0CZJ0', 'Ranting Srimartani', '', '', ''),
('ranting-bc3311ef873b', 'J4Q5U', 'Ranting Srimulyo Barat', '', '', ''),
('ranting-e8eea89ed31b', 'B77WZ', 'Ranting Srimulyo Timur', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayat_aset`
--

CREATE TABLE `tb_riwayat_aset` (
  `id_riwayat_aset` varchar(20) NOT NULL,
  `instansi` varchar(258) NOT NULL,
  `tgl_riwayat` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_aset` varchar(258) NOT NULL,
  `harga_aset` varchar(258) NOT NULL,
  `jumlah_aset` varchar(258) NOT NULL,
  `tgl_masuk_aset` timestamp NULL DEFAULT NULL,
  `jenis_aset` varchar(258) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_riwayat_aset`
--

INSERT INTO `tb_riwayat_aset` (`id_riwayat_aset`, `instansi`, `tgl_riwayat`, `nama_aset`, `harga_aset`, `jumlah_aset`, `tgl_masuk_aset`, `jenis_aset`) VALUES
('aset-0dbc775fe6', 'Cabang Piyungan', '2020-02-29 12:02:52', 'dfbhjbsdfj', '65162561', '2 Unit', '2020-02-11 17:00:00', 'Barang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wakaf_barang`
--

CREATE TABLE `tb_wakaf_barang` (
  `id_wakaf_barang` varchar(20) NOT NULL,
  `id_ranting` varchar(20) NOT NULL,
  `wakif` varchar(258) NOT NULL,
  `mauquf` varchar(250) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `jenis_barang` varchar(250) NOT NULL,
  `nilai_barang` varchar(100) NOT NULL,
  `jumlah_barang` varchar(100) NOT NULL,
  `tgl_wakaf` datetime NOT NULL,
  `waktu_wakaf` time NOT NULL,
  `doc_wakaf_barang` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `created_wakaf_barang` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_wakaf_barang` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wakaf_tanah`
--

CREATE TABLE `tb_wakaf_tanah` (
  `id_wakaf_tanah` varchar(20) NOT NULL,
  `id_ranting` varchar(20) NOT NULL,
  `no_akta_wakaf` varchar(100) NOT NULL,
  `nama_wakif` varchar(258) NOT NULL,
  `nama_mauquf` varchar(258) NOT NULL,
  `luas_tanah` varchar(100) NOT NULL DEFAULT 'NULL',
  `status_tanah` varchar(100) NOT NULL DEFAULT 'NULL',
  `harga_tanah` varchar(100) NOT NULL DEFAULT 'NULL',
  `luas_bangunan` varchar(100) NOT NULL DEFAULT 'NULL',
  `penggunaan_tanah` text NOT NULL DEFAULT 'NULL',
  `lokasi_tanah` text DEFAULT NULL,
  `tempat_arsip` text DEFAULT NULL,
  `doc_wakaf_tanah` varchar(200) NOT NULL,
  `keterangan_tanah` text DEFAULT NULL,
  `tgl_wakaf` datetime DEFAULT NULL,
  `created_wakaf_tanah` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_wakaf_tanah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wakaf_uang`
--

CREATE TABLE `tb_wakaf_uang` (
  `id_wakaf_uang` varchar(20) NOT NULL,
  `id_ranting` varchar(20) NOT NULL,
  `nama_wakif` varchar(250) NOT NULL,
  `nama_mauquf` varchar(250) NOT NULL,
  `tujuan_wakaf` varchar(250) NOT NULL,
  `nilai_wakaf` varchar(250) NOT NULL,
  `keterangan` text NOT NULL,
  `doc_wakaf_uang` varchar(258) NOT NULL,
  `tgl_wakaf` datetime NOT NULL,
  `created_wakaf_uang` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_wakaf_uang` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_ranting` (`id_ranting`);

--
-- Indeks untuk tabel `tb_admin_login`
--
ALTER TABLE `tb_admin_login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `tb_aset_barang`
--
ALTER TABLE `tb_aset_barang`
  ADD PRIMARY KEY (`id_aset_barang`),
  ADD KEY `id_ranting` (`id_ranting`);

--
-- Indeks untuk tabel `tb_aset_tanah`
--
ALTER TABLE `tb_aset_tanah`
  ADD PRIMARY KEY (`id_aset_tanah`),
  ADD KEY `id_ranting` (`id_ranting`);

--
-- Indeks untuk tabel `tb_forum`
--
ALTER TABLE `tb_forum`
  ADD PRIMARY KEY (`id_forum`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `tb_ranting`
--
ALTER TABLE `tb_ranting`
  ADD PRIMARY KEY (`id_ranting`),
  ADD UNIQUE KEY `kd_ranting` (`kode_ranting`);

--
-- Indeks untuk tabel `tb_riwayat_aset`
--
ALTER TABLE `tb_riwayat_aset`
  ADD PRIMARY KEY (`id_riwayat_aset`);

--
-- Indeks untuk tabel `tb_wakaf_barang`
--
ALTER TABLE `tb_wakaf_barang`
  ADD PRIMARY KEY (`id_wakaf_barang`),
  ADD KEY `id_ranting` (`id_ranting`);

--
-- Indeks untuk tabel `tb_wakaf_tanah`
--
ALTER TABLE `tb_wakaf_tanah`
  ADD PRIMARY KEY (`id_wakaf_tanah`),
  ADD UNIQUE KEY `no_akta_wakaf` (`no_akta_wakaf`),
  ADD KEY `id_riwayat` (`id_ranting`);

--
-- Indeks untuk tabel `tb_wakaf_uang`
--
ALTER TABLE `tb_wakaf_uang`
  ADD PRIMARY KEY (`id_wakaf_uang`),
  ADD KEY `id_ranting` (`id_ranting`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin_login`
--
ALTER TABLE `tb_admin_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tb_forum`
--
ALTER TABLE `tb_forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`id_ranting`) REFERENCES `tb_ranting` (`id_ranting`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_admin_login`
--
ALTER TABLE `tb_admin_login`
  ADD CONSTRAINT `tb_admin_login_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_aset_barang`
--
ALTER TABLE `tb_aset_barang`
  ADD CONSTRAINT `tb_aset_barang_ibfk_1` FOREIGN KEY (`id_ranting`) REFERENCES `tb_ranting` (`id_ranting`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_aset_tanah`
--
ALTER TABLE `tb_aset_tanah`
  ADD CONSTRAINT `tb_aset_tanah_ibfk_1` FOREIGN KEY (`id_ranting`) REFERENCES `tb_ranting` (`id_ranting`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_forum`
--
ALTER TABLE `tb_forum`
  ADD CONSTRAINT `tb_forum_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_wakaf_barang`
--
ALTER TABLE `tb_wakaf_barang`
  ADD CONSTRAINT `tb_wakaf_barang_ibfk_1` FOREIGN KEY (`id_ranting`) REFERENCES `tb_ranting` (`id_ranting`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tb_wakaf_tanah`
--
ALTER TABLE `tb_wakaf_tanah`
  ADD CONSTRAINT `tb_wakaf_tanah_ibfk_1` FOREIGN KEY (`id_ranting`) REFERENCES `tb_ranting` (`id_ranting`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_wakaf_uang`
--
ALTER TABLE `tb_wakaf_uang`
  ADD CONSTRAINT `tb_wakaf_uang_ibfk_1` FOREIGN KEY (`id_ranting`) REFERENCES `tb_ranting` (`id_ranting`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
