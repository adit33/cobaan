-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2015 at 01:24 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `l5`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kodeBarang` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kodeBarang`, `nama`, `harga`, `stok`) VALUES
('BRG-000005', 'Barcelona', 1750, 200),
('BRG-000006', 'Bulgari', 1800, 247),
('BRG-000007', 'Bulgari', 1800, 250),
('BRG-000008', 'Axe Alasca', 1700, 190);

-- --------------------------------------------------------

--
-- Table structure for table `detailjual`
--

CREATE TABLE IF NOT EXISTS `detailjual` (
  `id` int(11) NOT NULL,
  `kodeJual` varchar(255) NOT NULL,
  `kodeBarang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `detailjual`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `detailjual`
 FOR EACH ROW BEGIN
UPDATE barang 
SET stok=stok-new.jumlah where barang.kodeBarang=new.kodeBarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE IF NOT EXISTS `jual` (
  `kodeJual` varchar(255) NOT NULL,
  `idPelanggan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `total` double NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `idPelanggan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `nama`, `alamat`, `telepon`) VALUES
('PLG-000001', 'Aditya Suryadi', 'Bandung', '089656234771'),
('PLG-000002', 'Harry Jaya ', 'Sukaleeur', '08912345678'),
('PLG-000003', 'Anto', 'Jl. Kopo', '08987097171');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `idSuplier` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`idSuplier`, `nama`, `alamat`, `telepon`) VALUES
('SPL-000001', 'PT Maju Jaya', 'Bandung', '0225221234'),
('SPL-000002', 'wkwkw', 'Bandung', '89326423'),
('SPL-000003', 'a', 'a', 'a'),
('SPL-000004', 'b', 'b', 'b'),
('SPL-000005', 'c', 'c', 'c'),
('SPL-000006', 'b', 's', 's'),
('SPL-000007', 'k', 'k', 'k');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `remember_token`) VALUES
(4, 'aditya', 'adit33', '12345', ''),
(32, 'Aditya Suryadi', 'Adit33', '12345', ''),
(33, 'adit', 'adit93', '$2y$10$hSrOTQBLea5u1UfQW8iEPe.pZGb5373Pgh3xNB0VDNCXaNLGreSH.', ''),
(34, 'admin', 'admin', '$2y$10$SHnjjE.NyzENbh3JQznAsOm5vGxrF2hJQJDTBk2zAMpeMpGntgK96', 'B3ch3wR7oEdlF2I6hvDqSKLJW7v1alFPCAFK3KGfYEK1UWJK7TMBPGueGFxr');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$58UkRAhKk4/mJ0Aj2cplR.o3pGdppCll6/S7LEfk0cQbSxjYG2m9y', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodeBarang`);

--
-- Indexes for table `detailjual`
--
ALTER TABLE `detailjual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`kodeJual`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`idSuplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailjual`
--
ALTER TABLE `detailjual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
