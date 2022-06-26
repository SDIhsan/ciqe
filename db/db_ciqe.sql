-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2022 at 01:58 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ciqe`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_distribusi`
--

CREATE TABLE `tb_distribusi` (
  `distribusi_id` int(11) NOT NULL,
  `distribusi_ket` text NOT NULL,
  `distribusi_jumlah` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_distribusi`
--

INSERT INTO `tb_distribusi` (`distribusi_id`, `distribusi_ket`, `distribusi_jumlah`) VALUES
(1, 'RT. 01', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penimbangan`
--

CREATE TABLE `tb_penimbangan` (
  `penimbangan_id` int(11) NOT NULL,
  `penimbangan_qurban` int(11) NOT NULL,
  `penimbangan_ke` int(11) NOT NULL,
  `penimbangan_jumlah` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penimbangan`
--

INSERT INTO `tb_penimbangan` (`penimbangan_id`, `penimbangan_qurban`, `penimbangan_ke`, `penimbangan_jumlah`) VALUES
(1, 2, 1, 8.9),
(2, 1, 1, 7),
(3, 2, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tb_qurban`
--

CREATE TABLE `tb_qurban` (
  `qurban_id` int(11) NOT NULL,
  `qurban_status` enum('Kelompok','Pribadi') NOT NULL,
  `qurban_nomor` int(11) NOT NULL,
  `qurban_shohibul` text NOT NULL,
  `qurban_sembelih` datetime DEFAULT NULL,
  `qurban_pengeletan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_qurban`
--

INSERT INTO `tb_qurban` (`qurban_id`, `qurban_status`, `qurban_nomor`, `qurban_shohibul`, `qurban_sembelih`, `qurban_pengeletan`) VALUES
(1, 'Kelompok', 1, 'Aji', '2022-06-14 12:06:07', '2022-06-14 12:06:07'),
(2, 'Kelompok', 2, 'Aji', NULL, NULL),
(5, 'Kelompok', 3, 'Ana', NULL, NULL),
(6, 'Kelompok', 4, 'Anaji', NULL, NULL),
(7, 'Pribadi', 2, 'Disa', NULL, NULL),
(8, 'Pribadi', 3, 'Anang', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_total`
--

CREATE TABLE `tb_total` (
  `total_id` int(11) NOT NULL,
  `total_qurban` float DEFAULT NULL,
  `total_sepertiga` float DEFAULT NULL,
  `total_duapertiga` float DEFAULT NULL,
  `total_minusdua` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_pass` text NOT NULL,
  `user_level` enum('Admin','Petugas') NOT NULL,
  `user_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `user_pass`, `user_level`, `user_status`) VALUES
(1, 'Admin', '$2y$10$6gTN.0RrzgHrDVL3Iu1J7OKcoBm.p3LQqhX.KkFqEajkG.jgQE1Dm', 'Admin', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_distribusi`
--
ALTER TABLE `tb_distribusi`
  ADD PRIMARY KEY (`distribusi_id`);

--
-- Indexes for table `tb_penimbangan`
--
ALTER TABLE `tb_penimbangan`
  ADD PRIMARY KEY (`penimbangan_id`);

--
-- Indexes for table `tb_qurban`
--
ALTER TABLE `tb_qurban`
  ADD PRIMARY KEY (`qurban_id`);

--
-- Indexes for table `tb_total`
--
ALTER TABLE `tb_total`
  ADD PRIMARY KEY (`total_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_distribusi`
--
ALTER TABLE `tb_distribusi`
  MODIFY `distribusi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_penimbangan`
--
ALTER TABLE `tb_penimbangan`
  MODIFY `penimbangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_qurban`
--
ALTER TABLE `tb_qurban`
  MODIFY `qurban_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_total`
--
ALTER TABLE `tb_total`
  MODIFY `total_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
