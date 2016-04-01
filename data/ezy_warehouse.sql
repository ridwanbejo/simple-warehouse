-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2016 at 12:28 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ezy_warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE IF NOT EXISTS `master_barang` (
  `Kode_Barang` varchar(100) NOT NULL,
  `Nama_Barang` varchar(45) NOT NULL,
  `No_Part` varchar(45) DEFAULT NULL,
  `Created_Date` date DEFAULT NULL,
  `master_jenis_Kode_Jenis` varchar(2) NOT NULL,
  PRIMARY KEY (`Kode_Barang`),
  KEY `fk_master_barang_master_jenis_idx` (`master_jenis_Kode_Jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`Kode_Barang`, `Nama_Barang`, `No_Part`, `Created_Date`, `master_jenis_Kode_Jenis`) VALUES
('GR000001', 'Ragaji Mesin', 'XHR105', '2016-03-24', 'GR'),
('PD000001', 'Bor Listrik Shimizuoka', 'XHR404', '2016-03-24', 'BL'),
('PD000002', 'Bor Listrik Shinghua', 'XHR201', '2016-03-24', 'BL'),
('PD000004', 'Gunting Mesin', 'XHR505', '2016-03-24', 'GR');

-- --------------------------------------------------------

--
-- Table structure for table `master_gudang`
--

CREATE TABLE IF NOT EXISTS `master_gudang` (
  `Kode_Gudang` varchar(3) NOT NULL,
  `Nama_Gudang` varchar(45) NOT NULL,
  PRIMARY KEY (`Kode_Gudang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_gudang`
--

INSERT INTO `master_gudang` (`Kode_Gudang`, `Nama_Gudang`) VALUES
('GS', 'Gudang Selatan'),
('GU', 'Gudang Utara');

-- --------------------------------------------------------

--
-- Table structure for table `master_jenis`
--

CREATE TABLE IF NOT EXISTS `master_jenis` (
  `Kode_Jenis` varchar(2) NOT NULL,
  `Nama_Jenis` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Kode_Jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_jenis`
--

INSERT INTO `master_jenis` (`Kode_Jenis`, `Nama_Jenis`) VALUES
('BL', 'Bor Listrik'),
('GR', 'Gergaji');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_barang`
--

CREATE TABLE IF NOT EXISTS `mutasi_barang` (
  `id_mutasi_barang` int(11) NOT NULL AUTO_INCREMENT,
  `jumlah_barang` int(11) NOT NULL,
  `jenis_mutasi` enum('kredit','debit') DEFAULT NULL,
  `master_barang_Kode_Barang` varchar(100) NOT NULL,
  `master_gudang_Kode_Gudang` varchar(3) NOT NULL,
  `keterangan` text,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mutasi_barang`),
  KEY `fk_mutasi_barang_master_barang1_idx` (`master_barang_Kode_Barang`),
  KEY `fk_mutasi_barang_master_gudang1_idx` (`master_gudang_Kode_Gudang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mutasi_barang`
--

INSERT INTO `mutasi_barang` (`id_mutasi_barang`, `jumlah_barang`, `jenis_mutasi`, `master_barang_Kode_Barang`, `master_gudang_Kode_Gudang`, `keterangan`, `Created_Date`) VALUES
(1, 1, 'debit', 'GR000001', 'GS', 'test', '2016-03-24 04:41:02'),
(2, 10, 'debit', 'GR000001', 'GS', 'test', '2016-03-24 04:41:13'),
(4, 3, 'kredit', 'GR000001', 'GS', 'test', '2016-03-24 04:49:31'),
(5, 1, 'kredit', 'GR000001', 'GS', 'test', '2016-03-24 04:58:55'),
(6, 10, 'debit', 'GR000001', 'GS', 'test', '2016-03-24 04:59:06'),
(7, 5, 'debit', 'PD000001', 'GS', 'test', '2016-03-24 04:59:19'),
(8, 20, 'debit', 'PD000001', 'GU', 'test', '2016-03-24 04:59:30'),
(9, 5, 'kredit', 'PD000001', 'GU', 'test', '2016-03-24 05:19:03'),
(10, 30, 'debit', 'PD000002', 'GU', 'test', '2016-03-24 05:19:28'),
(11, 5, 'debit', 'PD000004', 'GU', 'testing', '2016-03-24 05:19:39');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD CONSTRAINT `fk_master_barang_master_jenis` FOREIGN KEY (`master_jenis_Kode_Jenis`) REFERENCES `master_jenis` (`Kode_Jenis`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mutasi_barang`
--
ALTER TABLE `mutasi_barang`
  ADD CONSTRAINT `fk_mutasi_barang_master_barang1` FOREIGN KEY (`master_barang_Kode_Barang`) REFERENCES `master_barang` (`Kode_Barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mutasi_barang_master_gudang1` FOREIGN KEY (`master_gudang_Kode_Gudang`) REFERENCES `master_gudang` (`Kode_Gudang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
