-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 05:02 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memo`
--

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `id` int(11) NOT NULL,
  `permohonan` int(11) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `setoran` varchar(20) DEFAULT NULL,
  `fee` varchar(20) DEFAULT NULL,
  `norekening` varchar(30) DEFAULT NULL,
  `bendahara` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`id`, `permohonan`, `desa`, `setoran`, `fee`, `norekening`, `bendahara`) VALUES
(1, 3, 'Kekalik', '7000', '3000', '1234', 'Faris'),
(2, 3, 'Jelojokkk', '10000', '5000', '4567', 'FatirArsalan'),
(3, 3, 'Swadaya', '9000', '4000', '180', 'Sulistyo'),
(13, 11, 'Jelojokkk', '5999', '3000', '4567', 'FatirArsalanaa'),
(14, 13, 'Keruak', '60000', '5000', '345', 'Azis gagap');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id` int(11) NOT NULL,
  `nomor` varchar(100) DEFAULT NULL,
  `kepada` int(11) DEFAULT NULL,
  `direktur` int(11) NOT NULL,
  `dari` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `hal` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id`, `nomor`, `kepada`, `direktur`, `dari`, `tanggal`, `hal`, `deskripsi`, `status`, `komentar`) VALUES
(3, '3434', 4, 5, 9, '2019-12-04', 'duit', 'Loteng', 2, ''),
(10, 'adassssssss', 4, 5, 1, '2019-12-03', 'adas', 'asdas', 0, 'cc'),
(11, '1212/BDNR', 2, 5, 1, '2019-12-04', 'Hal apaaaaaadsadasasd', 'Deskripsi apaasdsadsad', 2, 'masih tidak jelas'),
(13, '45/xxxxxxxxxxxxxxxxxxxxyyyy', 2, 5, 1, '2019-03-04', 'Abc', 'aaa', 0, 'Komentarasdassa'),
(17, 'asas', 4, 5, 1, '2019-12-09', 'as', 'asda', 0, ''),
(18, 'sadsaghhfjg', 2, 3, 1, '2019-12-04', 'sadsa', 'asdasda', 3, 'Komentarasdasdsa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `jabatan`, `level`, `password`) VALUES
(1, 'iman', 'auditor', 1, 'iman'),
(2, 'sp', 'supervisor', 2, 'sp'),
(3, 'diektur it', 'direktur it', 3, 'xx'),
(4, 'kacab', 'kacab', 2, 'kacab'),
(5, 'dir', 'direktru', 3, 'dir'),
(6, 'superadmin', 'admin', 0, 'super'),
(9, 'fff', 'ff', 1, 'f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permohonan` (`permohonan`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kepada` (`kepada`),
  ADD KEY `dari` (`dari`),
  ADD KEY `direktur` (`direktur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `memo`
--
ALTER TABLE `memo`
  ADD CONSTRAINT `memo_ibfk_1` FOREIGN KEY (`permohonan`) REFERENCES `permohonan` (`id`);

--
-- Constraints for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD CONSTRAINT `permohonan_ibfk_1` FOREIGN KEY (`kepada`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `permohonan_ibfk_2` FOREIGN KEY (`dari`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `permohonan_ibfk_3` FOREIGN KEY (`direktur`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
