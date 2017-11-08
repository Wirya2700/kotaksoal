-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 01:37 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kotaksoal`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `detailgroupsoal`
--
CREATE TABLE IF NOT EXISTS `detailgroupsoal` (
`soal` text
,`idsoal` int(11)
,`urlvidio` varchar(255)
,`nama` varchar(50)
,`chanel` varchar(50)
,`urlchanel` varchar(255)
,`namasitus` varchar(255)
,`urlsitus` varchar(255)
,`sumber` varchar(255)
,`iddetailkategorisoal` int(11)
,`idkategorisoal` int(11)
,`kategori` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `detailkategorisoal`
--

CREATE TABLE IF NOT EXISTS `detailkategorisoal` (
  `iddetailkategorisoal` int(11) NOT NULL,
  `idkategorisoal` int(11) NOT NULL,
  `idsoal` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailkategorisoal`
--

INSERT INTO `detailkategorisoal` (`iddetailkategorisoal`, `idkategorisoal`, `idsoal`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategorisoal`
--

CREATE TABLE IF NOT EXISTS `kategorisoal` (
  `idkategorisoal` int(11) NOT NULL,
  `kodekategori` varchar(10) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorisoal`
--

INSERT INTO `kategorisoal` (`idkategorisoal`, `kodekategori`, `kategori`, `type`, `waktu`) VALUES
(1, '220', 'Soal SAINTEK SBMPTN tahun 2017', 'SBMPTN', '2017-11-05 12:32:34'),
(2, '221', 'Soal SAINTEK SBMPTN tahun 2016', 'UM', '2017-11-05 12:32:34');

-- --------------------------------------------------------

--
-- Stand-in structure for view `situschanel`
--
CREATE TABLE IF NOT EXISTS `situschanel` (
`chanel` varchar(50)
,`urlchanel` varchar(255)
,`namasitus` varchar(255)
,`urlsitus` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `idsoal` int(11) NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `soal` text NOT NULL,
  `sumber` varchar(255) NOT NULL DEFAULT 'google.com',
  `nama` varchar(50) NOT NULL DEFAULT '-',
  `urlvidio` varchar(255) NOT NULL,
  `namasitus` varchar(255) DEFAULT NULL,
  `urlsitus` varchar(255) DEFAULT NULL,
  `chanel` varchar(50) DEFAULT NULL,
  `urlchanel` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`idsoal`, `tingkat`, `soal`, `sumber`, `nama`, `urlvidio`, `namasitus`, `urlsitus`, `chanel`, `urlchanel`) VALUES
(1, 'SLTA', 'Jika pencerminan titik P ( s, t ) terhadap garis\r\nx = a dan dilanjutkan dengan pencerminan\r\nterhadap garis y = b menghasilkan dilatasi\r\nsebesar 3 kali maka ab = ....', 'google.com', '-', 'https://www.youtube.com/embed/QKEKYm3mIFA', 'Soal.com', 'https:/soal.com', 'Soal', 'https://www.youtube.com/user/lastchildTV'),
(2, 'SLTA', 'Pada kubus ABCD.EFGH, titik P adalah titik\r\npotong diagonal AH dan DE. Jika R terletak\r\ndi tengah rusuk AD, maka nilai sin\r\nadalah ....', 'google.com', '-', 'https://www.youtube.com/embed/qPTfXwPf_HM', 'Belajar.com', 'Https:/belajar.com', 'Belajar', 'https://www.youtube.com/user/lastchildTV');

-- --------------------------------------------------------

--
-- Structure for view `detailgroupsoal`
--
DROP TABLE IF EXISTS `detailgroupsoal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detailgroupsoal` AS select `soal`.`soal` AS `soal`,`soal`.`idsoal` AS `idsoal`,`soal`.`urlvidio` AS `urlvidio`,`soal`.`nama` AS `nama`,`soal`.`chanel` AS `chanel`,`soal`.`urlchanel` AS `urlchanel`,`soal`.`namasitus` AS `namasitus`,`soal`.`urlsitus` AS `urlsitus`,`soal`.`sumber` AS `sumber`,`detailkategorisoal`.`iddetailkategorisoal` AS `iddetailkategorisoal`,`kategorisoal`.`idkategorisoal` AS `idkategorisoal`,`kategorisoal`.`kategori` AS `kategori` from ((`soal` join `detailkategorisoal` on((`soal`.`idsoal` = `detailkategorisoal`.`idsoal`))) join `kategorisoal` on((`kategorisoal`.`idkategorisoal` = `detailkategorisoal`.`idkategorisoal`)));

-- --------------------------------------------------------

--
-- Structure for view `situschanel`
--
DROP TABLE IF EXISTS `situschanel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `situschanel` AS select `soal`.`chanel` AS `chanel`,`soal`.`urlchanel` AS `urlchanel`,`soal`.`namasitus` AS `namasitus`,`soal`.`urlsitus` AS `urlsitus` from `soal` group by `soal`.`chanel`,`soal`.`urlchanel`,`soal`.`namasitus`,`soal`.`urlsitus` order by `soal`.`idsoal` desc limit 100;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailkategorisoal`
--
ALTER TABLE `detailkategorisoal`
  ADD PRIMARY KEY (`iddetailkategorisoal`);

--
-- Indexes for table `kategorisoal`
--
ALTER TABLE `kategorisoal`
  ADD PRIMARY KEY (`idkategorisoal`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`idsoal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailkategorisoal`
--
ALTER TABLE `detailkategorisoal`
  MODIFY `iddetailkategorisoal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategorisoal`
--
ALTER TABLE `kategorisoal`
  MODIFY `idkategorisoal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `idsoal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
