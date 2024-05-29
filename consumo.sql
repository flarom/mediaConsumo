-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 12:15 AM
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
-- Database: `consumo`
--

-- --------------------------------------------------------

--
-- Table structure for table `abastecimento`
--

CREATE TABLE `abastecimento` (
  `id_abastecimento` int(11) NOT NULL,
  `id_veiculo` int(11) DEFAULT NULL,
  `litros` decimal(10,2) DEFAULT NULL,
  `tanque_completo` tinyint(1) DEFAULT NULL,
  `hodometro` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `media` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abastecimento`
--

INSERT INTO `abastecimento` (`id_abastecimento`, `id_veiculo`, `litros`, `tanque_completo`, `hodometro`, `data`, `media`) VALUES
(20, 23, 30.00, 0, 5600, '2024-05-28', 186.67),
(21, 23, 50.00, 1, 5739, '2024-05-29', 2.78),
(22, 23, 50.00, 1, 6200, '2024-05-31', 9.22);

-- --------------------------------------------------------

--
-- Table structure for table `veiculo`
--

CREATE TABLE `veiculo` (
  `id_veiculo` int(11) NOT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `placa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `veiculo`
--

INSERT INTO `veiculo` (`id_veiculo`, `marca`, `modelo`, `ano`, `placa`) VALUES
(23, 'chevrolet', 'celta', 2006, 'ifj-2859');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abastecimento`
--
ALTER TABLE `abastecimento`
  ADD PRIMARY KEY (`id_abastecimento`),
  ADD KEY `id_veiculo` (`id_veiculo`);

--
-- Indexes for table `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id_veiculo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abastecimento`
--
ALTER TABLE `abastecimento`
  MODIFY `id_abastecimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id_veiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abastecimento`
--
ALTER TABLE `abastecimento`
  ADD CONSTRAINT `abastecimento_ibfk_1` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id_veiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
