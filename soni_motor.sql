-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 04:13 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soni_motor`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id_data_barang` int(3) NOT NULL,
  `nomor_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori_barang` varchar(7) NOT NULL,
  `stok_barang` int(4) NOT NULL,
  `harga_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`id_data_barang`, `nomor_barang`, `nama_barang`, `kategori_barang`, `stok_barang`, `harga_barang`) VALUES
(3, '14119092', 'Oli Motor Honda', 'Barang', 81, 49000),
(4, '14118782', 'Ganti Oli', 'Layanan', 74, 91000),
(5, '14117822', 'Tambal Ban Tubles', 'Layanan', 111, 27000),
(6, '14118094', 'Service Lengkap', 'Layanan', 98, 135000);

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id_transaksi` int(4) NOT NULL,
  `nomor_transaksi` varchar(7) NOT NULL,
  `id_data_barang` int(3) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `nomor_barang` int(15) NOT NULL,
  `kategori_barang` varchar(7) NOT NULL,
  `jumlah_barang` int(2) NOT NULL,
  `harga_barang` int(10) NOT NULL,
  `total_harga_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `roles` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `username`, `email`, `password`, `nama_depan`, `nama_belakang`, `roles`) VALUES
(1, 'fuad', 'fuad@gmail.com', '28dc8b1b99e861e4889ed8965ce9e258', 'Fuad Hasanudin', 'Sonny', '9');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_transaksi`
--

CREATE TABLE `laporan_transaksi` (
  `id_laporan` int(4) NOT NULL,
  `nomor_transaksi` varchar(7) NOT NULL,
  `total_tagihan` int(10) NOT NULL,
  `nominal_bayar` int(10) NOT NULL,
  `nominal_kembalian` int(10) NOT NULL,
  `status_tagihan` varchar(11) NOT NULL,
  `tanggal_bayar` int(2) NOT NULL,
  `bulan_bayar` varchar(10) NOT NULL,
  `tahun_bayar` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_data_barang`);

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `laporan_transaksi`
--
ALTER TABLE `laporan_transaksi`
  ADD PRIMARY KEY (`id_laporan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_data_barang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id_transaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_transaksi`
--
ALTER TABLE `laporan_transaksi`
  MODIFY `id_laporan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
