-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2017 at 11:24 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_krisukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbayar`
--

CREATE TABLE `tbayar` (
  `id_bayar` varchar(15) NOT NULL,
  `id_daftar` varchar(15) NOT NULL,
  `id_resep` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `biaya` int(100) NOT NULL,
  `tgl_up` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbayar`
--

INSERT INTO `tbayar` (`id_bayar`, `id_daftar`, `id_resep`, `id_user`, `biaya`, `tgl_up`) VALUES
('Byr413879', 'PeNdaf26635113', 'Resp9442', 'Dok6334', 25000, '2017-02-16 17:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `tdaftar`
--

CREATE TABLE `tdaftar` (
  `id_daftar` varchar(15) NOT NULL,
  `id_pasien` varchar(15) NOT NULL,
  `id_poli` varchar(15) NOT NULL,
  `biaya` int(100) NOT NULL,
  `tgl_up` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdaftar`
--

INSERT INTO `tdaftar` (`id_daftar`, `id_pasien`, `id_poli`, `biaya`, `tgl_up`) VALUES
('PeNdaf26635113', 'Pas3350', 'Pol175', 0, '2017-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `tdetail_resep`
--

CREATE TABLE `tdetail_resep` (
  `id_det_resep` varchar(15) NOT NULL,
  `id_resep` varchar(15) NOT NULL,
  `id_obat` varchar(15) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `aturan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdetail_resep`
--

INSERT INTO `tdetail_resep` (`id_det_resep`, `id_resep`, `id_obat`, `jumlah`, `harga`, `aturan`) VALUES
('DetResp5587158', 'Resp9442', 'Obt62607', 2, 3000, '2 kali sehari'),
('DetResp7142639', 'Resp9442', 'Obt67290', 5, 3000, '3 x 1 sesudah makan'),
('DetResp749206', 'Resp9442', 'Obt49022', 2, 3000, '1 kali sehari');

-- --------------------------------------------------------

--
-- Table structure for table `tobat`
--

CREATE TABLE `tobat` (
  `id_obat` varchar(15) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jenis` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tobat`
--

INSERT INTO `tobat` (`id_obat`, `nama_obat`, `jenis`, `harga`, `stok`) VALUES
('Obt49022', 'simbion,(STRP)', 'bb', 15000, 11),
('Obt62607', 'Vaksin,(BTL)', 'tb', 7000, 24),
('Obt67290', 'paramek,(STRP)', 'bb', 3000, 4),
('Obt98728', 'Procol,(STRP)', 'bb', 12000, 38);

-- --------------------------------------------------------

--
-- Table structure for table `tpasien`
--

CREATE TABLE `tpasien` (
  `id_pasien` varchar(15) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `hp_pasien` int(15) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `umur` date NOT NULL,
  `tgl_up` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpasien`
--

INSERT INTO `tpasien` (`id_pasien`, `nama_pasien`, `alamat_pasien`, `hp_pasien`, `jk`, `umur`, `tgl_up`) VALUES
('Pas3350', 'alex YP', 'sampung', 2147483647, 'L', '2009-10-01', '2017-02-08 13:19:47'),
('Pas58386', 'sidik kuncoro', 'jenangan', 76567098, 'L', '0000-00-00', '2017-02-08 13:26:42'),
('Pas97415', 'Mita Devi', 'Siman', 850542354, 'P', '1999-05-09', '2017-02-16 11:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `tpoli`
--

CREATE TABLE `tpoli` (
  `id_poli` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpoli`
--

INSERT INTO `tpoli` (`id_poli`, `nama`) VALUES
('Pol175', 'Saraf'),
('Pol222', 'Jiwa'),
('Pol386', 'THT');

-- --------------------------------------------------------

--
-- Table structure for table `tresep`
--

CREATE TABLE `tresep` (
  `id_resep` varchar(15) NOT NULL,
  `id_daftar` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_poli` varchar(15) NOT NULL,
  `biaya` int(100) NOT NULL,
  `keluhan` text NOT NULL,
  `status_resep` int(2) NOT NULL,
  `tgl_up` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tresep`
--

INSERT INTO `tresep` (`id_resep`, `id_daftar`, `id_user`, `id_poli`, `biaya`, `keluhan`, `status_resep`, `tgl_up`) VALUES
('Resp9442', 'PeNdaf26635113', 'Dok6334', 'Pol175', 30000, 'sakit', 3, '2017-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id_user` varchar(15) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `alamat_user` text NOT NULL,
  `spesialis` varchar(15) NOT NULL,
  `tarif` int(11) NOT NULL,
  `id_poli` varchar(15) NOT NULL,
  `hp_user` varchar(13) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id_user`, `nama_user`, `alamat_user`, `spesialis`, `tarif`, `id_poli`, `hp_user`, `password`, `status`) VALUES
('Ad554', 'admin', 'admin', 'admin', 0, '0', '857080375', 'YWRtaW4=', '4'),
('Dok6334', 'dr.Krisnanto', 'sampung', 'saraf', 30000, 'Pol175', '9876777', 'a3Jpcw==', '1'),
('Dok6415', 'cilik', 'ngasinan', 'THT', 15000, 'Pol386', '0987867', 'Y2lsaWs=', '1'),
('Dok7648', 'dokter', 'ponorogo', 'Jiwa', 50000, 'Pol222', '6317214533', 'ZG9rdGVy', '1'),
('Kary549140', 'daftar', 'sampung', 'NULL', 0, 'NULL', '08708037533', 'ZGFmdGFy', '3'),
('Kary795522', 'kasir', 'pagerukir', 'NULL', 0, 'NULL', '987656787', 'a2FzaXI=', '5'),
('Kary816882', 'apotek', 'kunti', 'NULL', 0, 'NULL', '67214322', 'YXBvdGVr', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbayar`
--
ALTER TABLE `tbayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tdaftar`
--
ALTER TABLE `tdaftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `tdetail_resep`
--
ALTER TABLE `tdetail_resep`
  ADD PRIMARY KEY (`id_det_resep`);

--
-- Indexes for table `tobat`
--
ALTER TABLE `tobat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tpasien`
--
ALTER TABLE `tpasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tresep`
--
ALTER TABLE `tresep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `fk_daftar` (`id_daftar`) USING BTREE;

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_poli` (`id_poli`(10)) USING BTREE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
