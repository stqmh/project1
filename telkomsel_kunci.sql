-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2018 at 08:07 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telkomsel_kunci`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(200) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `pass_admin` varchar(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `username_admin`, `pass_admin`, `email_admin`) VALUES
(1, 'Fitriana Istiqomah', 'admin', 'admin', 'admin@telkomsel.com');

-- --------------------------------------------------------

--
-- Table structure for table `kunci`
--

CREATE TABLE `kunci` (
  `id` int(11) NOT NULL,
  `nama_kunci` varchar(200) NOT NULL,
  `status_kunci` int(11) NOT NULL,
  `warna_kunci` int(11) NOT NULL,
  `jenis_kunci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunci`
--

INSERT INTO `kunci` (`id`, `nama_kunci`, `status_kunci`, `warna_kunci`, `jenis_kunci`) VALUES
(1, 'Kunci Inggris', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `admin_pinjam` int(11) NOT NULL,
  `user_pinjam` int(11) NOT NULL,
  `kunci_pinjam` int(11) NOT NULL,
  `awak_pinjam` datetime NOT NULL,
  `akhir_pinjam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rfjeniskunci`
--

CREATE TABLE `rfjeniskunci` (
  `id` int(11) NOT NULL,
  `jenis_kunci` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rfstatus`
--

CREATE TABLE `rfstatus` (
  `id` int(11) NOT NULL,
  `status_kunci` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfstatus`
--

INSERT INTO `rfstatus` (`id`, `status_kunci`) VALUES
(1, 'Tersedia'),
(2, 'Tidak Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `rfvendor`
--

CREATE TABLE `rfvendor` (
  `id` int(11) NOT NULL,
  `nama_vendor` varchar(100) NOT NULL,
  `phone_vendor` varchar(20) NOT NULL,
  `add_vendor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfvendor`
--

INSERT INTO `rfvendor` (`id`, `nama_vendor`, `phone_vendor`, `add_vendor`) VALUES
(1, 'Huawei Tech', '021-123', 'Mall Kota Kasablanka'),
(2, 'Alita Prima', '021-900', 'TB Simatupang');

-- --------------------------------------------------------

--
-- Table structure for table `rfwarnakunci`
--

CREATE TABLE `rfwarnakunci` (
  `id` int(11) NOT NULL,
  `warna_kunci` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfwarnakunci`
--

INSERT INTO `rfwarnakunci` (`id`, `warna_kunci`) VALUES
(1, 'Merah'),
(2, 'Kuning');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `hp_user` varchar(20) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `vendor_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `hp_user`, `email_user`, `vendor_user`) VALUES
(1, 'Fitriana Istiqomah', '089128901921', 'admin@telkomsel.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kunci`
--
ALTER TABLE `kunci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfjeniskunci`
--
ALTER TABLE `rfjeniskunci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfstatus`
--
ALTER TABLE `rfstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfvendor`
--
ALTER TABLE `rfvendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfwarnakunci`
--
ALTER TABLE `rfwarnakunci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kunci`
--
ALTER TABLE `kunci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rfjeniskunci`
--
ALTER TABLE `rfjeniskunci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rfstatus`
--
ALTER TABLE `rfstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rfvendor`
--
ALTER TABLE `rfvendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rfwarnakunci`
--
ALTER TABLE `rfwarnakunci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
