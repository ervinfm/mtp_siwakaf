-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2019 pada 12.55
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.32

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
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `id_ranting`, `nama_admin`, `level`, `alamat`, `telp`, `username`, `password`, `status`, `created`, `updated`) VALUES
('98441070693580802', '98441070693580800', 'Ervin Fikot M', 1, 'Piyungan', '12345', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1', '2019-11-01 09:01:09', NULL);

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
('98441070693580800', 'AA123', 'Cabang Piyungan', '', '', ''),
('ranting-8e1c8d93ff0f', '0CZJ0', 'Ranting Srimartani', '', '', ''),
('ranting-bc3311ef873b', 'J4Q5U', 'Ranting Srimulyo Barat', '', '', ''),
('ranting-e8eea89ed31b', 'B77WZ', 'Ranting Srimulyo Timur', '', '', '');

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
-- Indeks untuk tabel `tb_ranting`
--
ALTER TABLE `tb_ranting`
  ADD PRIMARY KEY (`id_ranting`),
  ADD UNIQUE KEY `kd_ranting` (`kode_ranting`);

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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`id_ranting`) REFERENCES `tb_ranting` (`id_ranting`) ON DELETE CASCADE ON UPDATE CASCADE;

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
