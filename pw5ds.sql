-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2017 at 06:27 PM
-- Server version: 5.7.17
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw5ds`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `kode_level` varchar(100) NOT NULL,
  `nama_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `kode_level`, `nama_level`) VALUES
(1, 'mgr', 'manager'),
(2, 'spv', 'supervisor'),
(3, 'stf', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=disable, 1=active',
  `kode_level` varchar(100) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama_lengkap`, `email`, `password`, `status`, `kode_level`, `tgl_input`) VALUES
(1, 'Andre Haphap', 'aha2@gmail.com', '$2y$10$2IzfrRftFFc8SnA.qAzmPuUv9UUwI5WMBKp2iiqDRG9IOauGubzUO', '1', 'mgr', '2017-01-08 16:43:54'),
(2, 'Parto Hutapea', 'parto.hut@gmail.com', '$2y$10$2IzfrRftFFc8SnA.qAzmPuUv9UUwI5WMBKp2iiqDRG9IOauGubzUO', '0', 'spv', '2017-01-08 16:43:59'),
(3, 'Aziz Gagap', 'aziz.ga2p@gmail.com', '$2y$10$2IzfrRftFFc8SnA.qAzmPuUv9UUwI5WMBKp2iiqDRG9IOauGubzUO', '1', 'stf', '2017-01-08 17:26:18'),
(4, 'Nunung', 'nunung@ovj.com', '$2y$10$2IzfrRftFFc8SnA.qAzmPuUv9UUwI5WMBKp2iiqDRG9IOauGubzUO', '1', 'spv', '2017-01-09 18:36:39'),
(5, 'Eko Okda', 'eko.okda@gmail.com', '$2y$10$gP0RIHonkvP6EQOPzfgMj.Tqxan.2SnJ5ymZkku6uzwOSR6IFHcVu', '0', 'mgr', '2017-01-09 18:15:59'),
(21, 'Lupus', 'lupus@indosiar.com', '$2y$10$lHD5Jlc3s/4anAzqIgWzc.U9CPhxoiVlDxAqjNdaAewbKmqESkSD6', '1', 'stf', '2017-01-09 20:17:19'),
(22, 'Batman', 'batman@batman.com', '$2y$10$5KxLcQzy7hRDrsfnfilCsef.4.MxUF6KKRsggaiHNcsehwzQUfMDG', '1', 'stf', '2017-01-10 10:22:02'),
(23, 'Suryana', 'suryana@gmail.com', '$2y$10$RRJlzu7C2Pt5CpKmsRHJ2.d887hW5hYUfi8qftiZcf1fsVk2NFnsq', '1', 'mgr', '2017-01-10 10:40:37'),
(24, 'Rian', 'rian@gmail.com', '$2y$10$d0czeB73MQxVxoHMxz6D0eNhCV.84BHYU0TYlFUoh9LWbXbdxrCHy', '1', 'stf', '2017-01-10 10:44:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`),
  ADD KEY `kode_level` (`kode_level`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
