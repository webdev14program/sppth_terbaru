-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2022 at 12:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `terbaru_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `level` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`, `nama`, `level`) VALUES
(202, 'adminTU', '397cabe506e1a2ac39de41f24affc2c1', 'ADMINISTRATOR TATA USAHA', 'admin'),
(303, 'TUadmin', '90370fba20c4e0bb215a867a8c1e2fff', 'ADMINISTRATOR TATA USAHA 2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `group_kelas`
--

CREATE TABLE `group_kelas` (
  `id_groupKelas` int(16) NOT NULL,
  `nama_group` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_kelas`
--

INSERT INTO `group_kelas` (`id_groupKelas`, `nama_group`) VALUES
(1001, 'X BM'),
(2002, 'X TKJ'),
(3003, 'XI BM'),
(4004, 'XI TKJ'),
(5005, 'XII BM'),
(6006, 'XII TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `kode` varchar(8) NOT NULL,
  `jurusan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `kode`, `jurusan`) VALUES
(101, 'AKL', 'AKUTANSI DAN KEUANGAN LEMBAGA'),
(202, 'BDP', 'BISNIS DARING DAN PEMASARAN'),
(303, 'OTKP', 'OTOMATISASI DAN TATA KELOLA PERKANTORAN'),
(404, 'TKJ', 'TEKNIK KOMPUTER DAN JARINGAN'),
(505, 'MM', 'MULTIMEDIA');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kode` varchar(8) NOT NULL,
  `kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kode`, `kelas`) VALUES
(101853, 'AKL', 'X AKL 1'),
(102700, 'AKL', 'X AKL 2'),
(103409, 'BDP', 'X BDP 1'),
(105376, 'OTKP', 'X OTKP 1'),
(106899, 'OTKP', 'X OTKP 2'),
(107123, 'TKJ', 'X TKJ 1'),
(108155, 'TKJ', 'X TKJ 2'),
(109807, 'TKJ', 'X TKJ 3'),
(110599, 'AKL', 'XI AKL 1'),
(111546, 'AKL', 'XI AKL 2'),
(112625, 'BDP', 'XI BDP 1'),
(113182, 'BDP', 'XI BDP 2'),
(114382, 'OTKP', 'XI OTKP 1'),
(115353, 'OTKP', 'XI OTKP 2'),
(116953, 'TKJ', 'XI TKJ 1'),
(117204, 'TKJ', 'XI TKJ 2'),
(118862, 'TKJ', 'XI TKJ 3'),
(119717, 'AKL', 'XII AKL 1'),
(120675, 'AKL', 'XII AKL 2'),
(121465, 'BDP', 'XII BDP 1'),
(122273, 'BDP', 'XII BDP 2'),
(123710, 'OTKP', 'XII OTKP 1'),
(124270, 'OTKP', 'XII OTKP 2'),
(125353, 'TKJ', 'XII TKJ 1'),
(126854, 'TKJ', 'XII TKJ 2'),
(127374, 'TKJ', 'XII TKJ 3');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_spp`
--

CREATE TABLE `pembayaran_spp` (
  `id_spp` int(16) NOT NULL,
  `id_siswa` int(16) NOT NULL,
  `id_kelas` int(16) NOT NULL,
  `bulan` varchar(32) NOT NULL,
  `nominal` int(32) DEFAULT NULL,
  `bayar_perbulan` varchar(32) NOT NULL,
  `tahun_ajaran` varchar(16) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(16) NOT NULL,
  `nama_siswa` varchar(256) NOT NULL,
  `jurusan` varchar(16) NOT NULL,
  `kelas` varchar(18) NOT NULL,
  `group_kelas` varchar(16) NOT NULL,
  `tahun_ajaran` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jurusan`, `kelas`, `group_kelas`, `tahun_ajaran`) VALUES
(7365847, 1001, 'EKA DHANI', '404', '117204', '4004', '101');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int(16) NOT NULL,
  `tahun_ajaran` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`) VALUES
(101, '2020/2021'),
(202, '2021/2022'),
(303, '2022/2023'),
(404, '2023/2024'),
(505, '2024/2025'),
(606, '2025/2026');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran_kelas`
--

CREATE TABLE `tahun_ajaran_kelas` (
  `id_tahun_ajaran_kelas` int(16) NOT NULL,
  `tahun_ajaran_kelas` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `group_kelas`
--
ALTER TABLE `group_kelas`
  ADD PRIMARY KEY (`id_groupKelas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`) USING BTREE;

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127375;

--
-- AUTO_INCREMENT for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  MODIFY `id_spp` int(16) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
