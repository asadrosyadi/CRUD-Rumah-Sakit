-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 04:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_sakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(10) NOT NULL,
  `nm_dokter` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `sip` varchar(50) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nm_dokter`, `jenis_kelamin`, `tanggal_lahir`, `no_telepon`, `sip`, `spesialis`, `alamat`) VALUES
(1, 'leina', 'P', '2010-01-14', '085251386145', '10527', 'penyakit dalam', 'hksn'),
(3, 'bu dokter', 'P', '2022-06-01', '000000', 'Pagi', 'ginjal', 'Jl. Kijokotoyo Cemandi Sedati Sidoarjo');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kd_obat` int(10) NOT NULL,
  `nm_obat` varchar(50) NOT NULL,
  `harga_modal` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nm_obat`, `harga_modal`, `harga_jual`, `stok`, `keterangan`) VALUES
(1, 'paracetamol', 10000, 12000, 100, 'bagus'),
(3, 'Bodrek', 8000, 10000, 100, 'Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `nomor_rmk` int(10) NOT NULL,
  `nm_pasien` varchar(50) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `jns_kelamin` enum('L','P') NOT NULL,
  `gol_darah` enum('AB','O','B','A') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `stts_nikah` enum('BELUM','SUDAH') NOT NULL,
  `pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`nomor_rmk`, `nm_pasien`, `no_identitas`, `jns_kelamin`, `gol_darah`, `tanggal_lahir`, `no_telepon`, `alamat`, `stts_nikah`, `pekerjaan`) VALUES
(1, 'sidia', '101010', 'P', 'AB', '1995-01-02', '0828282848', 'pekan baru', 'BELUM', 'wirausaha'),
(2, 'Sasa Parade', '351517009982', 'P', 'O', '2011-11-17', '000000', 'semarang', 'SUDAH', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `no_daftar` int(10) NOT NULL,
  `nomor_rmk` int(10) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `kd_tindakan` int(10) NOT NULL,
  `nomor_antri` int(10) NOT NULL,
  `id_petugas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`no_daftar`, `nomor_rmk`, `tgl_daftar`, `keluhan`, `kd_tindakan`, `nomor_antri`, `id_petugas`) VALUES
(1, 1, '2022-03-14', 'sakit kepala kiri', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(10) NOT NULL,
  `nm_petugas` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `level` varchar(50) NOT NULL,
  `remember_token` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nm_petugas`, `no_telepon`, `username`, `password`, `level`, `remember_token`) VALUES
(1, 'asad', '08977316433', 'asad', '$2y$10$f7pUeaQnMMDvRadWc9QfAOTwiN0.63hw6Vd/Vg/7BwA10m2QvfwKO', 'admin', NULL),
(2, 'petugas1', '000000', 'petugas1', '$2y$10$7NLYZSbTE47tKBJ/Cx6FBucXiw90AdOMAipLLgCByxh/jXY.BBteC', 'admin', 'IwCly3IFsrrvtmhCAcqd8Tka1O7jfnzKgrSFYQqoDra3rFVsnAVyTlqMuteu'),
(4, 'baru', '32432432', 'baru', '$2y$10$PQKSZyP2p2f87eBLeEbkK.ChuGiJBSSY0EYj4wzMTpIcyy9Vr5YBq', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rawat`
--

CREATE TABLE `rawat` (
  `no_rawat` int(10) NOT NULL,
  `tgl_rawat` date NOT NULL,
  `nomor_rmk` int(10) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `hasil_diagnosa` varchar(50) NOT NULL,
  `bayar` int(10) NOT NULL,
  `id_petugas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawat`
--

INSERT INTO `rawat` (`no_rawat`, `tgl_rawat`, `nomor_rmk`, `id_dokter`, `hasil_diagnosa`, `bayar`, `id_petugas`) VALUES
(1, '2022-03-14', 1, 1, 'kurang istirahat', 100000, 1),
(3, '2022-05-04', 2, 1, 'panas', 100000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rawat_obat`
--

CREATE TABLE `rawat_obat` (
  `no_rawat` int(10) NOT NULL,
  `tgl_obat` date NOT NULL,
  `kd_obat` int(10) NOT NULL,
  `aturan_pakai` varchar(50) NOT NULL,
  `id_petugas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawat_obat`
--

INSERT INTO `rawat_obat` (`no_rawat`, `tgl_obat`, `kd_obat`, `aturan_pakai`, `id_petugas`) VALUES
(1, '2022-05-04', 1, '3x sehari', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rawat_tindakan`
--

CREATE TABLE `rawat_tindakan` (
  `no_tindakan` int(10) NOT NULL,
  `tgl_tindakan` date NOT NULL,
  `no_rawat` int(10) NOT NULL,
  `kd_tindakan` int(10) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id_petugas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawat_tindakan`
--

INSERT INTO `rawat_tindakan` (`no_tindakan`, `tgl_tindakan`, `no_rawat`, `kd_tindakan`, `id_dokter`, `keterangan`, `id_petugas`) VALUES
(1, '2022-05-03', 1, 1, 1, 'Urgent banget', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `kd_tindakan` int(10) NOT NULL,
  `nm_tindakan` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`kd_tindakan`, `nm_tindakan`, `harga`) VALUES
(1, 'cek darah', 30000),
(3, 'Cek kolestrol', 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`nomor_rmk`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`no_daftar`),
  ADD KEY `nomor_rmk` (`nomor_rmk`),
  ADD KEY `kd_tindakan` (`kd_tindakan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawat`
--
ALTER TABLE `rawat`
  ADD PRIMARY KEY (`no_rawat`),
  ADD KEY `nomor_rmk` (`nomor_rmk`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `rawat_obat`
--
ALTER TABLE `rawat_obat`
  ADD KEY `kd_obat` (`kd_obat`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `no_rawat` (`no_rawat`);

--
-- Indexes for table `rawat_tindakan`
--
ALTER TABLE `rawat_tindakan`
  ADD PRIMARY KEY (`no_tindakan`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `no_rawat` (`no_rawat`),
  ADD KEY `kd_tindakan` (`kd_tindakan`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`kd_tindakan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `kd_obat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `nomor_rmk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `no_daftar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rawat`
--
ALTER TABLE `rawat`
  MODIFY `no_rawat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rawat_tindakan`
--
ALTER TABLE `rawat_tindakan`
  MODIFY `no_tindakan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `kd_tindakan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`nomor_rmk`) REFERENCES `pasien` (`nomor_rmk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`kd_tindakan`) REFERENCES `tindakan` (`kd_tindakan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rawat`
--
ALTER TABLE `rawat`
  ADD CONSTRAINT `rawat_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_ibfk_2` FOREIGN KEY (`nomor_rmk`) REFERENCES `pasien` (`nomor_rmk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_ibfk_3` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rawat_obat`
--
ALTER TABLE `rawat_obat`
  ADD CONSTRAINT `rawat_obat_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_obat_ibfk_2` FOREIGN KEY (`kd_obat`) REFERENCES `obat` (`kd_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_obat_ibfk_3` FOREIGN KEY (`no_rawat`) REFERENCES `rawat` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rawat_tindakan`
--
ALTER TABLE `rawat_tindakan`
  ADD CONSTRAINT `rawat_tindakan_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_tindakan_ibfk_2` FOREIGN KEY (`no_rawat`) REFERENCES `rawat` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_tindakan_ibfk_3` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_tindakan_ibfk_4` FOREIGN KEY (`kd_tindakan`) REFERENCES `tindakan` (`kd_tindakan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
