-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2025 at 04:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moving_class`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama_dosen`, `email`, `username`, `password`, `no_hp`, `alamat`, `created_at`) VALUES
(7, '123456789', 'Deri ', 'deri@gmail.com', 'deri2827', '$2y$10$qpRvqVR9jACruXJU3SG0eO7YJzhmQZ6eYrTv1sr4jPryq4P3Tkif.', '123456789', 'Cikoneng', '2025-04-21 02:50:48'),
(9, '123452727', 'Fery Fadly', 'fery@local.com', 'fery', '$2y$10$/wZPyZKqi8rcYgIKTQv53O6AhLwNIHI.JsiDIQEnTNwdngrYFtUgW', '1235444', 'tasikmalaya\r\n', '2025-05-05 03:25:00'),
(10, '18839284', 'fery', 'fery2@local.com', 'fery2727', '$2y$10$wBR8GIWTnTPR/jtUX/saKus.hv.lAgr3vMKtX1jtG7a1S07fWLGt6', '12345698', 'tasikmalaya\r\n', '2025-05-05 03:25:45'),
(11, '12345678', 'John Doe', 'johndoe@example.com', 'johndoe', NULL, '081234567890', 'Jl. Contoh Alamat No. 123', '2025-05-06 04:50:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
