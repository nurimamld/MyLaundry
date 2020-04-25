-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 08:22 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `keterangan` text NOT NULL,
  `status_detail` enum('dikeranjang','ditransaksi') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_paket`, `qty`, `keterangan`, `status_detail`, `id_user`) VALUES
(110, 61, 2, 3, '', 'ditransaksi', 1),
(111, 62, 2, 2, '', 'ditransaksi', 1),
(119, 65, 2, 2, '', 'ditransaksi', 1),
(120, 65, 5, 1, '', 'ditransaksi', 1),
(121, 66, 2, 1, '', 'ditransaksi', 1),
(122, 66, 2, 2, '', 'ditransaksi', 1),
(128, 70, 2, 1, '', 'ditransaksi', 2),
(129, 70, 6, 1, '', 'ditransaksi', 2),
(130, 71, 2, 1, '', 'ditransaksi', 2),
(131, 71, 5, 1, '', 'ditransaksi', 2),
(132, 71, 2, 1, '', 'ditransaksi', 2),
(133, 72, 2, 1, '', 'ditransaksi', 2),
(134, 72, 3, 1, '', 'ditransaksi', 2),
(137, 75, 3, 1, '', 'ditransaksi', 2),
(138, 76, 2, 1, '', 'ditransaksi', 2),
(139, 76, 2, 1, '', 'ditransaksi', 2),
(140, 77, 3, 1, '', 'ditransaksi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(100) NOT NULL,
  `alamat_member` text NOT NULL,
  `jk_member` enum('L','P') NOT NULL,
  `tlp_member` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nm_member`, `alamat_member`, `jk_member`, `tlp_member`, `id_user`) VALUES
(1, 'Rini', 'Cipoho', 'P', '0879765433', 2),
(2, 'nurima', 'bhayangkara', 'P', '12324', 2),
(3, 'Agus', 'Ciaul', 'L', '01293872', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id_outlet` int(11) NOT NULL,
  `nm_outlet` varchar(100) NOT NULL,
  `alamat_outlet` text NOT NULL,
  `tlp_outlet` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`id_outlet`, `nm_outlet`, `alamat_outlet`, `tlp_outlet`) VALUES
(1, 'MyLaundry1', 'bandung', '0266 235212'),
(2, 'MyLaundry2', 'Sukabumi', '0266 2352222'),
(4, 'MyLaundry3', 'Jakarta', '0212202');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `jenis_paket` enum('standar','paketan') NOT NULL,
  `nm_paket` varchar(100) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `deskripsi_paket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `id_outlet`, `jenis_paket`, `nm_paket`, `harga_paket`, `deskripsi_paket`) VALUES
(2, 1, 'paketan', 'A', 25000, 'All clothes 5kg'),
(3, 1, 'paketan', 'B', 50000, 'All clothes 10kg'),
(4, 1, 'paketan', 'C', 75000, 'All clothes 15kg'),
(5, 1, 'standar', 'Suits', 20000, 'Jas, Blazer, Tuxedo, dll'),
(6, 1, 'standar', 'Bedcover', 25000, 'Bedcover sintesis, flanel, fleece, dll.'),
(8, 1, 'standar', 'Jaket', 15000, 'Jacket Jeans, Sweater,cardigan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `batas_waktu` date NOT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `biaya_tambahan` int(11) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `pajak` int(11) DEFAULT NULL,
  `status_transaksi` enum('baru','proses','selesai','diambil') NOT NULL,
  `status_pembayaran` enum('dibayar','dp','belum bayar') NOT NULL,
  `id_user` int(11) NOT NULL,
  `bayar_transaksi` int(11) DEFAULT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_outlet`, `kode_invoice`, `id_member`, `tgl_transaksi`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status_transaksi`, `status_pembayaran`, `id_user`, `bayar_transaksi`, `total_harga`) VALUES
(70, 1, '5e954e3a15064', 2, '2020-04-14', '2020-04-16', '2020-04-25 06:20:50', 0, 5, 0, 'diambil', 'dibayar', 2, 38000, 38000),
(71, 1, '5ea3b9d8d07af', 3, '2020-04-25', '2020-04-26', '2020-04-25 06:17:58', 1000, 5, 2, 'diambil', 'dibayar', 2, 68900, 68900),
(72, 1, '5ea3c8b129c5d', 1, '2020-04-25', '2020-04-27', '2020-04-25 07:24:49', 1000, 0, 0, 'selesai', 'dibayar', 2, 76000, 76000),
(75, 1, '5ea3cb7fd83ee', 1, '2020-04-25', '2020-04-27', '2020-04-25 07:41:22', 0, 0, 0, 'diambil', 'dibayar', 2, 50000, 50000),
(76, 1, '5ea3d39b4b7e3', 1, '2020-04-25', '2020-04-27', '2020-04-25 08:07:51', 0, 0, 0, 'selesai', 'dibayar', 2, 50000, 0),
(77, 1, '5ea3d691e4828', 1, '2020-04-25', '2020-04-27', '2020-04-25 08:20:12', 0, 0, 0, 'proses', 'dibayar', 2, 50000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `role` enum('admin','kasir','owner') NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nm_user`, `username`, `password`, `id_outlet`, `role`, `active`) VALUES
(1, 'admin', 'admin', 'admin', 1, 'admin', 1),
(2, 'kasir', 'kasir', 'kasir', 1, 'kasir', 1),
(3, 'owner', 'owner', 'owner', 1, 'owner', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`,`id_paket`,`id_user`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `kode_invoice` (`kode_invoice`),
  ADD KEY `id_outlet` (`id_outlet`,`id_member`,`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
