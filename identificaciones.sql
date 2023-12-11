-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 09:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `identificaciones`
--

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `nombre` varchar(100) NOT NULL,
  `apellidos_P` varchar(100) NOT NULL,
  `n_documento` int(11) NOT NULL,
  `Rut` varchar(8) NOT NULL,
  `n_identificador` varchar(1) NOT NULL,
  `apellidos_m` varchar(100) NOT NULL,
  `fotografia` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `lugar_nacimiento` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `profesion` varchar(100) NOT NULL,
  `donante_organos` varchar(2) NOT NULL,
  `discapacitado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`nombre`, `apellidos_P`, `n_documento`, `Rut`, `n_identificador`, `apellidos_m`, `fotografia`, `sexo`, `lugar_nacimiento`, `fecha_nacimiento`, `nacionalidad`, `profesion`, `donante_organos`, `discapacitado`) VALUES
('Benjamin Tomas', 'Castillo ', 1, '21546683', '3', 'Fuentes', 'img/308d795c3cac0f8f16610f53df4e1005.jpg', 'm', 'Quillota', '2004-04-03', 'Chilena', 'ninguna', 'si', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`n_documento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `n_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
