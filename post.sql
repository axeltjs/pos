-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jun 11, 2015 at 07:36 AM
-- Server version: 5.0.21
-- PHP Version: 5.1.4
-- 
-- Database: `post`
-- 
CREATE DATABASE `post` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `post`;

-- --------------------------------------------------------

-- 
-- Table structure for table `barang`
-- 

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL auto_increment,
  `kategori_id` int(11) NOT NULL,
  `nama_barang` varchar(100) collate latin1_general_ci NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY  (`barang_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

-- 
-- Dumping data for table `barang`
-- 

INSERT INTO `barang` VALUES (9, 9, 'elHafidz 500gr', 75000);
INSERT INTO `barang` VALUES (10, 9, 'elHafidz 300gr (Toples)', 50000);
INSERT INTO `barang` VALUES (11, 9, 'Madu Hitam (al Qubro)', 50000);
INSERT INTO `barang` VALUES (12, 11, 'Baju Biru (Kecil)', 40000);
INSERT INTO `barang` VALUES (13, 11, 'Baju Putih (Kecil)', 40000);
INSERT INTO `barang` VALUES (14, 11, 'Baju Orange (Kecil)', 45000);
INSERT INTO `barang` VALUES (15, 11, 'Baju Putih (Besar)', 60000);
INSERT INTO `barang` VALUES (16, 11, 'Baju Hitam (Besar)', 60000);
INSERT INTO `barang` VALUES (17, 11, 'Baju Biru (Besar)', 60000);
INSERT INTO `barang` VALUES (18, 11, 'Baju Hijau', 65000);

-- --------------------------------------------------------

-- 
-- Table structure for table `kategori_barang`
-- 

CREATE TABLE `kategori_barang` (
  `kategori_id` int(11) NOT NULL auto_increment,
  `nama_kategori` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`kategori_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `kategori_barang`
-- 

INSERT INTO `kategori_barang` VALUES (9, 'Madu');
INSERT INTO `kategori_barang` VALUES (10, 'Stiker');
INSERT INTO `kategori_barang` VALUES (11, 'Baju');
INSERT INTO `kategori_barang` VALUES (12, 'Makanan');

-- --------------------------------------------------------

-- 
-- Table structure for table `petugas`
-- 

CREATE TABLE `petugas` (
  `op_id` int(11) NOT NULL auto_increment,
  `nama` varchar(50) collate latin1_general_ci NOT NULL,
  `username` varchar(30) collate latin1_general_ci NOT NULL,
  `email` varchar(32) collate latin1_general_ci NOT NULL,
  `password` varchar(32) collate latin1_general_ci NOT NULL,
  `last_login` date NOT NULL,
  PRIMARY KEY  (`op_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `petugas`
-- 

INSERT INTO `petugas` VALUES (1, 'administrator', 'mimin', 'admin@rpl1.com', 'a7c15c415c37626de8fa648127ba1ae5', '2015-05-11');
INSERT INTO `petugas` VALUES (2, 'Axel TJs', 'axeltjs', 'klon.axeltjs@gmail.com', '3734745e646f36eb511c6405e387b63e', '2015-04-04');
INSERT INTO `petugas` VALUES (9, 'Axel', 'CrossRyder', 'jne_88@yahoo.com', 'a7c15c415c37626de8fa648127ba1ae5', '2015-06-08');

-- --------------------------------------------------------

-- 
-- Table structure for table `transaksi`
-- 

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL auto_increment,
  `tanggal_transaksi` date NOT NULL,
  `op_id` int(11) NOT NULL,
  PRIMARY KEY  (`transaksi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `transaksi`
-- 

INSERT INTO `transaksi` VALUES (11, '2015-06-09', 9);
INSERT INTO `transaksi` VALUES (10, '2015-06-09', 9);

-- --------------------------------------------------------

-- 
-- Table structure for table `transaksi_detail`
-- 

CREATE TABLE `transaksi_detail` (
  `t_detail_id` int(11) NOT NULL auto_increment,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('0','1') collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`t_detail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `transaksi_detail`
-- 

INSERT INTO `transaksi_detail` VALUES (30, 13, 1, 11, 40000, '1');
INSERT INTO `transaksi_detail` VALUES (29, 12, 1, 11, 40000, '1');
INSERT INTO `transaksi_detail` VALUES (28, 14, 1, 10, 45000, '1');
