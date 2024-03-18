-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 01:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jadwalpiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `piket`
--

CREATE TABLE `piket` (
  `id_hms` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `piket`
--

INSERT INTO `piket` (`id_hms`, `nama`, `kelas`, `jurusan`, `keterangan`, `waktu`) VALUES
(1, 'Harris Caine', 'XII', 'MM-3', 'sudah piket', '2024-03-17 15:55:34'),
(2, 'Cale Henitusse', 'XI', 'MM-3', 'sudah piket', '2024-03-17 15:55:34'),
(3, 'Haga Farutazui', 'XI', 'RPL-2', 'belum piket', '2024-03-18 00:12:20'),
(7, 'Kim Dokja', 'XI', 'MM-3', 'Belum Piket', '2024-03-18 08:48:51'),
(8, 'Shiho Hinomori', 'X', 'MM-1', 'Belum Piket', '2024-03-18 08:51:27'),
(9, 'Tea Shonami', 'X', 'RPL-3', 'Belum Piket', '2024-03-18 08:54:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `piket`
--
ALTER TABLE `piket`
  ADD PRIMARY KEY (`id_hms`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `piket`
--
ALTER TABLE `piket`
  MODIFY `id_hms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
