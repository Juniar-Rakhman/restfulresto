-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2014 at 09:54 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('dapur', '7', NULL, 'N;'),
('kasir', '6', NULL, 'N;'),
('pelayan', '8', NULL, 'N;'),
('reviewer', '6', NULL, 'N;'),
('reviewer', '7', NULL, 'N;'),
('reviewer', '8', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('dapur', 2, 'dapur', NULL, 'N;'),
('kasir', 2, 'kasir', NULL, 'N;'),
('kategori.admin', 0, 'kategori.admin', NULL, 'N;'),
('kategori.create', 0, 'kategori.create', NULL, 'N;'),
('kategori.delete', 0, 'kategori.delete', NULL, 'N;'),
('kategori.index', 0, 'kategori.index', NULL, 'N;'),
('kategori.update', 0, 'kategori.update', NULL, 'N;'),
('kategori.view', 0, 'kategori.view', NULL, 'N;'),
('menu.admin', 0, 'menu.admin', NULL, 'N;'),
('menu.create', 0, 'menu.create', NULL, 'N;'),
('menu.delete', 0, 'menu.delete', NULL, 'N;'),
('menu.index', 0, 'menu.index', NULL, 'N;'),
('menu.update', 0, 'menu.update', NULL, 'N;'),
('menu.view', 0, 'menu.view', NULL, 'N;'),
('pegawai.admin', 0, 'pegawai.admin', NULL, 'N;'),
('pegawai.create', 0, 'pegawai.create', NULL, 'N;'),
('pegawai.delete', 0, 'pegawai.delete', NULL, 'N;'),
('pegawai.index', 0, 'pegawai.index', NULL, 'N;'),
('pegawai.update', 0, 'pegawai.update', NULL, 'N;'),
('pegawai.view', 0, 'pegawai.view', NULL, 'N;'),
('pelayan', 2, 'pelayan', NULL, 'N;'),
('pengguna.admin', 0, 'pengguna.admin', NULL, 'N;'),
('pengguna.create', 0, 'pengguna.create', NULL, 'N;'),
('pengguna.delete', 0, 'pengguna.delete', NULL, 'N;'),
('pengguna.index', 0, 'pengguna.index', NULL, 'N;'),
('pengguna.update', 0, 'pengguna.update', NULL, 'N;'),
('pengguna.view', 0, 'pengguna.view', NULL, 'N;'),
('pesanan.admin', 0, 'pesanan.admin', NULL, 'N;'),
('pesanan.create', 0, 'pesanan.create', NULL, 'N;'),
('pesanan.delete', 0, 'pesanan.delete', NULL, 'N;'),
('pesanan.index', 0, 'pesanan.index', NULL, 'N;'),
('pesanan.update', 0, 'pesanan.update', NULL, 'N;'),
('pesanan.view', 0, 'pesanan.view', NULL, 'N;'),
('reviewer', 2, 'hanya melihat', NULL, 'N;'),
('transaksi.admin', 0, 'transaksi.admin', NULL, 'N;'),
('transaksi.create', 0, 'transaksi.create', NULL, 'N;'),
('transaksi.delete', 0, 'transaksi.delete', NULL, 'N;'),
('transaksi.index', 0, 'transaksi.index', NULL, 'N;'),
('transaksi.laporan', 0, 'transaksi.laporan', NULL, 'N;'),
('transaksi.update', 0, 'transaksi.update', NULL, 'N;'),
('transaksi.view', 0, 'transaksi.view', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('reviewer', 'kategori.index'),
('reviewer', 'kategori.view'),
('reviewer', 'menu.index'),
('reviewer', 'menu.view'),
('reviewer', 'pegawai.index'),
('reviewer', 'pegawai.view'),
('reviewer', 'pengguna.index'),
('reviewer', 'pengguna.view'),
('dapur', 'pesanan.admin'),
('pelayan', 'pesanan.admin'),
('pelayan', 'pesanan.create'),
('reviewer', 'pesanan.index'),
('dapur', 'pesanan.update'),
('pelayan', 'pesanan.update'),
('reviewer', 'pesanan.view'),
('kasir', 'transaksi.admin'),
('kasir', 'transaksi.create'),
('reviewer', 'transaksi.index'),
('kasir', 'transaksi.laporan'),
('kasir', 'transaksi.update'),
('reviewer', 'transaksi.view');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `byteSize` int(10) unsigned NOT NULL,
  `mimeType` varchar(255) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `extension`, `filename`, `byteSize`, `mimeType`, `created`) VALUES
(2, '', 'jpg', 'lgoptimus4xhd.jpg', 89994, 'image/jpeg', '2013-09-07 10:25:44'),
(3, '', 'png', 'thumb_lisa_light.png', 68065, 'image/png', '2013-09-07 10:30:59'),
(4, '', 'jpg', 'ubuntuandroid.jpg', 35831, 'image/jpeg', '2013-09-08 00:06:47'),
(5, '', 'jpg', 'imagesCAV8SJUQ.jpg', 10351, 'image/jpeg', '2013-09-08 00:13:53'),
(6, '', 'jpg', 'Jellyfish.jpg', 775702, 'image/jpeg', '2013-09-08 00:29:15'),
(7, '', 'jpg', 'Desert.jpg', 845941, 'image/jpeg', '2013-09-08 00:30:39'),
(8, '', 'jpg', 'SNSD Wallpaper--56.jpg', 151748, 'image/jpeg', '2013-12-28 07:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(64) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_UNIQUE` (`nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `keterangan`) VALUES
(1, 'Makanan Pembuka', 'Makanan ringan yang dihidangkan sebelum menu utama'),
(2, 'Makanan Utama', 'Makanan utama yang menjadi andalan restoran'),
(3, 'Makanan Penutup', 'Makanan ringan yang disajikan setelah menu utama'),
(4, 'Minuman Ringan', 'Semua minuman yang tidak mengandung alkohol'),
(5, 'Minuman Keras', 'Semua minuman yang mengandung alkohol');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `harga` double NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_UNIQUE` (`nama`),
  KEY `kategori_idx` (`kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `kategori_id`, `gambar`, `harga`, `keterangan`) VALUES
(1, 'Sate Kambing Buntel', 2, '5', 40000, 'Sate yang enak sekali'),
(2, 'Nasi Goreng Hongkong', 1, '6', 25000, 'Nasi goreng dengan rasa khas oriental'),
(3, 'Ayam Katsu', 2, '7', 30000, 'Ayam goreng tepung khas Jepang'),
(4, 'Salad Buah', 3, '8', 15000, 'Campuran bereneka macam buah segar yang dihidangkan bersama dengan perasan jeruk lemon dan madu'),
(5, 'Jus Jeruk', 4, NULL, 8000, 'Minuman yang dibuat dari sari jeruk asli, tanpa bahan pengawet'),
(6, 'Ayam Presto', 2, NULL, 14000, ''),
(7, 'Cumi Lada Hitam', 2, NULL, 25000, ''),
(8, 'Udang Goreng Tepung', 2, NULL, 23000, ''),
(10, 'Udah Galah Bakar', 2, NULL, 45000, '');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_induk` varchar(8) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor_induk_UNIQUE` (`nomor_induk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nomor_induk`, `tgl_masuk`, `tgl_keluar`, `nama`, `alamat`, `telepon`, `aktif`) VALUES
(1, '1234', '2013-01-01', '0000-00-00', 'Sandra Dewi', 'Jl. Pegangsaan Timur No. 56 Jakarta', '08123456789', 'Y'),
(2, 'P001', '2013-09-02', '0000-00-00', 'Mariana Renata', 'Jl. Merah Putih Biru no. 12x\r\nJakarta Pusat', '081234567890', 'Y'),
(4, '0002', '2014-03-09', '0000-00-00', 'Shiren Sungkar', 'Jl. Berbatu', '0361234567', 'Y'),
(6, '0004', '2014-03-03', '0000-00-00', 'Farah Queen', 'Jl. Tentara Pelajar', '1234567890', 'Y'),
(7, '001', '2014-03-03', '0000-00-00', 'Mr Admin', 'Jl. Aspal', '081234567890', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `saltPassword` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `level_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `level_id` (`level_id`),
  KEY `fk_pengguna_pegawai1_idx` (`pegawai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `saltPassword`, `email`, `tgl_daftar`, `level_id`, `pegawai_id`) VALUES
(6, 'kasir', 'd156be8273d07708a3b1c3a8a9d49c46', '523db90545c0b7.56376652', 'kasir@localhost', '2013-09-17 10:48:37', 1, 4),
(7, 'dapur', '3594422a330b2bfb84cfbc4f3e2cbdab', '523833da9ec241.10947470', 'dapur@localhost', '2013-09-17 10:50:02', 2, 2),
(8, 'pelayan', 'dce805124438cbdd1c99d502874389b3', '523833f0c7bb35.12959465', 'pelayan@localhost', '2013-09-17 10:50:24', 3, 1),
(9, 'admin', '41f770dfe4cb0a7626a9a447cfb70dc4', '532cf20e601261.91412370', 'admin@resto', '2014-03-22 02:14:38', 9, 7);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_meja` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama_pelanggan` varchar(64) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `total_harga` double DEFAULT NULL,
  `lunas` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`),
  KEY `pelayan_idx` (`pegawai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `nomor_meja`, `tanggal`, `nama_pelanggan`, `pegawai_id`, `total_harga`, `lunas`) VALUES
(2, 1, '2013-09-14', 'Zaskia Gothic', 2, 95000, 'Y'),
(3, 4, '2013-09-15', 'Vicky Zhu', 1, 40000, 'Y'),
(4, 9, '2013-09-15', 'Marshanda', 1, 55000, 'N'),
(5, 1, '2013-10-13', 'Saya', 1, 15000, 'Y'),
(6, 0, '2013-11-10', 'Ayu Tingting', 1, NULL, 'N'),
(7, 6, '2013-12-29', 'Tunai', 1, 60000, 'Y'),
(8, 2, '2014-04-07', 'Juniar', 1, 90000, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE IF NOT EXISTS `pesanan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pesanan_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `catatan` text,
  `batal` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`),
  KEY `pesanan_idx` (`pesanan_id`),
  KEY `menu_idx` (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id`, `pesanan_id`, `menu_id`, `harga`, `jumlah`, `status`, `catatan`, `batal`) VALUES
(1, 2, 2, 25000, 1, 1, 'gak pedes', 'N'),
(2, 2, 3, 30000, 1, 3, '', 'N'),
(4, 2, 1, 40000, 1, 1, '', 'N'),
(5, 3, 2, 25000, 1, 1, '', 'N'),
(6, 3, 4, 15000, 1, 1, '', 'N'),
(7, 4, 2, 25000, 1, 1, '', 'N'),
(8, 4, 3, 30000, 1, 1, '', 'N'),
(9, 5, 4, 15000, 1, 1, '', 'N'),
(10, 7, 4, 15000, 1, 1, '', 'N'),
(11, 7, 10, 45000, 1, 1, '', 'N'),
(12, 8, 1, 40000, 1, 1, '', 'N'),
(13, 8, 2, 25000, 2, 1, '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `harga_pesanan` double NOT NULL,
  `pajak` double NOT NULL,
  `harga_total` double NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kasir_idx` (`pegawai_id`),
  KEY `pesanan_trans_idx` (`pesanan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `jam`, `pesanan_id`, `harga_pesanan`, `pajak`, `harga_total`, `pegawai_id`) VALUES
(1, '2013-09-15', '21:08:00', 2, 70000, 10, 77000, 1),
(2, '2013-09-16', '19:58:00', 3, 40000, 10, 44000, 2),
(3, '2013-12-29', '14:06:00', 7, 60000, 10, 66000, 1),
(4, '2014-01-25', '08:33:00', 5, 15000, 10, 16500, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `fk_pengguna_pegawai1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pelayan` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `menu` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `pesanan` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `kasir` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `pesanan_trans` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
