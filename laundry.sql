-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2019 at 03:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password2` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `nama`, `email`, `password`, `password2`, `level`) VALUES
('mif', 'miftaaaah', 'mif@gmail.com', 'mif', 'mif', 'user'),
('miftah', 'miftah', 'miftah@gmail.com', '123', '123', 'admin'),
('mus', 'Mustofa', 'mustofa@gmail.com', '135', '135', 'user'),
('naga', 'nagaza', 'nagaza@gmail.com', '123', '123', 'user'),
('topi', 'Ali Abidin', 'ali@gmail.com', 'ali', 'ali', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `total_biaya` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `id_paket` int(3) NOT NULL,
  `id_order` int(3) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`total_biaya`, `username`, `id_paket`, `id_order`, `status`) VALUES
(10000, 'miftah', 20, 458, 'antri'),
(12000, 'mus', 21, 460, 'antri'),
(20000, 'mif', 24, 458, 'diambil'),
(25000, 'naga', 22, 465, 'selesai'),
(30000, 'miftah', 27, 445, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_paket`
--

CREATE TABLE `jenis_paket` (
  `id_paket` int(3) NOT NULL,
  `jenis_paket` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_paket`
--

INSERT INTO `jenis_paket` (`id_paket`, `jenis_paket`, `harga`) VALUES
(17, 'Paket 1 Kilogram', 3500),
(19, 'Paket 2 Kilogram', 6500),
(20, 'Paket 3 Kilogram', 9000),
(21, 'Paket 4 Kilogram', 11000),
(22, 'Paket 5 Kilogram', 13000),
(23, 'Paket 6 Kilogram', 15000),
(24, 'Paket 7 Kilogram', 20000),
(25, 'Paket 8 Kilogram', 25000),
(27, 'Paket 9 Kilogram', 27000),
(28, 'Paket 10 Kilogram', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(4) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `no_telp`) VALUES
(5, 'Mustofa', '08975880215'),
(6, 'Miftah', '089123456789'),
(7, 'Melin', '081234567894'),
(8, 'Naga', '088123456789'),
(9, '-', '02132312343'),
(11, 'Hadiiii', '0895352295225'),
(12, 'Melynda', '085678534625');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `jenis_paket` varchar(255) NOT NULL,
  `id_karyawan` int(4) NOT NULL,
  `total_biaya` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `username`, `status`, `jenis_paket`, `id_karyawan`, `total_biaya`) VALUES
(445, 'Melynda', 'diambil', 'Paket 2 kilogram', 6, 6500),
(448, 'Ulfa', 'antri', 'Paket 2 Kilogram', 5, 6500),
(449, 'Sasa', 'diambil', 'Paket 3 Kilogram', 6, 9000),
(450, 'Qonitha', 'selesai', 'Paket 4 Kilogram', 5, 11000),
(458, 'Dyah', 'antri', 'Paket 7 Kilogram', 5, 20000),
(459, 'Ramadhan', 'antri', 'Paket 8 Kilogram', 5, 25000),
(460, 'Salman', 'selesai', 'Paket 9 Kilogram', 6, 27000),
(464, 'Nagaza', 'proses', 'Paket 6 Kilogram', 6, 15000),
(465, 'Siska', 'proses', 'Paket 3 Kilogram', 12, 9000),
(466, 'Anggi', 'proses', 'Paket 6 Kilogram', 7, 15000),
(467, 'Aji', 'selesai', 'Paket 5 Kilogram', 8, 13000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`total_biaya`),
  ADD KEY `username` (`username`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `jenis_paket`
--
ALTER TABLE `jenis_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `username` (`username`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_order` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=466;

--
-- AUTO_INCREMENT for table `jenis_paket`
--
ALTER TABLE `jenis_paket`
  MODIFY `id_paket` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_3` FOREIGN KEY (`username`) REFERENCES `admin` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_ibfk_4` FOREIGN KEY (`id_paket`) REFERENCES `jenis_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_ibfk_5` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
