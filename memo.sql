-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 01:01 AM
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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `permohonan` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `permohonan`, `nama_barang`, `unit`, `harga`, `satuan`, `keterangan`) VALUES
(1, 21, 'abc', '2', 6000, 'unit', 'qqqqqqq'),
(2, 21, 'kipas', '4', 5000, 'buah', 'keteranganaaaaaaaXXXX'),
(3, 18, 'ada', '2', 9000, 'pcs', 'keteranganXXXXXX'),
(6, 22, 'ASD', '7', 7, 'cd', '<p>ASDASD</p>\r\n'),
(8, 18, 'komputer', '5', 5000, 'pcs', '<p>keterangansadsadsasd</p>\r\n'),
(9, 18, 'kipas', '5', 7000, 'buah', '<p>Untuk pembelian gerai</p>\r\n'),
(10, 18, 'printer', '5', 10000, 'buah', 'untuk print');

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
(13, 11, 'Jelojokkk', '5999', '3000', '4567', 'FatirArsalanaa'),
(14, 13, 'Keruak', '60000', '5000', '345', 'Azis gagap'),
(15, 19, 'Jelojokkk', '5999', '3000', '233', 'FatirArsalan'),
(17, 10, 'Kekalik', '7000', '3000', '4567', 'Faris');

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
  `komentar` text NOT NULL,
  `jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id`, `nomor`, `kepada`, `direktur`, `dari`, `tanggal`, `hal`, `deskripsi`, `status`, `komentar`, `jenis`) VALUES
(3, '3434', 4, 5, 9, '2019-12-04', 'duit', 'Loteng', 0, '', 0),
(10, '345/bpr/lotim', 4, 5, 1, '2019-12-03', 'adas', '<p>&nbsp;B<em><strong>gaimana k</strong></em>anh <s>ini</s></p>\r\n', 0, 'cc', 0),
(11, '1212/BDNR', 2, 5, 1, '2019-12-04', 'Hal apaaaaaadsadasasd', 'Deskripsi apaasdsadsad', 33, '<p><s><em><strong>apanih gblok</strong></em></s></p>\r\n', 0),
(13, '45/xxxxxxxxxxxxxxxxxxxxyyyy', 2, 5, 1, '2019-03-04', 'Abc', 'aaa', 2, '<p>bagus</p>\r\n', 0),
(17, 'asas', 4, 5, 1, '2019-12-09', 'as', 'asda', 0, '', 0),
(18, 'COba', 2, 3, 1, '2019-12-04', 'sadsa', 'asdasda', 0, '<p><em><strong>good</strong></em></p>\r\n', 1),
(19, '454/adad', 4, 5, 9, '2019-12-03', 'membaut', 'adasd', 0, 'fasasd', 1),
(21, '5644', 2, 5, 1, '2019-03-04', 'asd', 'asd', 33, '<p>gblk</p>\r\n', 1),
(22, 'sss', 2, 5, 1, '2019-12-03', 'x', '<p>ssssssssss DASDASD</p>\r\n', 2, '<p>oke kembangkan</p>\r\n', 1),
(24, 'saa', 4, 3, 1, '2019-03-04', 'asd', '<p><em>jalnku</em></p>\r\n', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `lokasi`, `jabatan`, `level`, `password`) VALUES
(1, 'imanaja', 'admin@gmail.com', 'mataram', 'auditor', 1, '5be9a68073f66a56554e25614e9f1c9a'),
(2, 'sp', 'beko@gmail.com', 'Lotim', 'supervisor', 2, '1952a01898073d1e561b9b4f2e42cbd7'),
(3, 'diektur it', '', '', 'direktur it', 3, 'xx'),
(4, 'sai aran kacab ni', '', '', 'kacabbs', 2, 'cf2e3e5791b0561920fdaaa8067acb13'),
(5, 'dir', '', '', 'direktru', 3, '736007832d2167baaae763fd3a3f3cf1'),
(6, 'superadmin', '', '', 'admin', 0, '1b3231655cebb7a1f783eddf27d254ca'),
(9, 'eko', '', '', 'ff', 1, 'e5ea9b6d71086dfef3a15f726abcc5bf'),
(10, 'faris', '', '', 'jjj', 1, '3f9e03a0d7508196ad935ec6f1bb9eb2'),
(12, 'bagasu', '', '', 'OB', 1, 'ee776a18253721efe8a62e4abd29dc47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permohonan` (`permohonan`);

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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`permohonan`) REFERENCES `permohonan` (`id`);

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
