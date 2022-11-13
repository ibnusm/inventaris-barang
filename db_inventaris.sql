-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 05:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_bahan`
--

CREATE TABLE `data_bahan` (
  `nomor_barang` int(25) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi` varchar(100) NOT NULL,
  `jumlah_barang` int(25) NOT NULL,
  `kondisi` varchar(25) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_bahan`
--

INSERT INTO `data_bahan` (`nomor_barang`, `nama_barang`, `spesifikasi`, `jumlah_barang`, `kondisi`, `keterangan`) VALUES
(1, 'barang 1', 'Ram 2GB', 1, 'Baik', 'ok'),
(2, 'barang 2', 'Ram 4GB', 2, 'Baik', 'ok'),
(3, 'barang 3', 'Ram 6GB', 3, 'Baik', 'ok'),
(4, 'barang 4', 'Ram 8GB', 4, 'Baik', 'ok'),
(5, 'barang 5', 'Ram 16GB', 5, 'Baik', 'ok'),
(6, 'barang 6', 'Ram 2GB', 6, 'Baik', 'ok'),
(7, 'barang 7', 'Ram 4GB', 7, 'Baik', 'ok'),
(8, 'barang 8', 'Ram 6GB', 8, 'Baik', 'ok'),
(9, 'barang 9', 'Ram 8GB', 9, 'Baik', 'ok'),
(10, 'barang 10', 'Ram 16GB', 10, 'Baik', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama_user`, `username`, `password`, `user_type`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Ibnu Said Ganteng', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_bahan`
--
ALTER TABLE `data_bahan`
  ADD PRIMARY KEY (`nomor_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `data_bahan` (`nomor_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
