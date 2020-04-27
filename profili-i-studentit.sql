-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 08:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profili-i-studentit`
--

-- --------------------------------------------------------

--
-- Table structure for table `dega`
--

CREATE TABLE `dega` (
  `id_dega` int(11) NOT NULL,
  `emri` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dokument`
--

CREATE TABLE `dokument` (
  `id_kerkese` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `lloji` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grupi`
--

CREATE TABLE `grupi` (
  `id_grupi` int(11) NOT NULL,
  `viti` enum('1','2','3') NOT NULL,
  `id_dega` int(11) NOT NULL,
  `emer_grupi` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grupi_student`
--

CREATE TABLE `grupi_student` (
  `id_grup` int(11) NOT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jep_mesim_grup`
--

CREATE TABLE `jep_mesim_grup` (
  `id_pedagog` int(11) NOT NULL,
  `id_grup` int(11) NOT NULL,
  `id_orar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jep_mesim_lene`
--

CREATE TABLE `jep_mesim_lene` (
  `id_pedagog` int(11) NOT NULL,
  `id_lende` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lenda`
--

CREATE TABLE `lenda` (
  `id_lenda` int(11) NOT NULL,
  `emer` varchar(70) NOT NULL,
  `kredite` int(11) NOT NULL,
  `id_dega` int(11) NOT NULL,
  `ore_totale` int(11) NOT NULL,
  `viti_i_lendes` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mungesa`
--

CREATE TABLE `mungesa` (
  `data` datetime NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_lende` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_student` int(11) NOT NULL,
  `id_lenda` int(11) NOT NULL,
  `pike_projekt` int(11) DEFAULT NULL,
  `pike_laborator` int(11) DEFAULT NULL,
  `pike_kologium` int(11) DEFAULT NULL,
  `pike_seminar` int(11) DEFAULT NULL,
  `pike_provim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orari`
--

CREATE TABLE `orari` (
  `id_orari` int(11) NOT NULL,
  `salla` char(4) NOT NULL,
  `ora` time NOT NULL,
  `dita_e_javes` enum('e hene','e marete','e merkure','e enjte','e premte') NOT NULL,
  `id_lenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perdorues`
--

CREATE TABLE `perdorues` (
  `id` int(11) NOT NULL,
  `emer` varchar(30) NOT NULL,
  `mbiemer` varchar(30) NOT NULL,
  `email` varchar(320) NOT NULL DEFAULT 'emer.mbiemer@fshn.com',
  `password` varchar(100) NOT NULL DEFAULT 'student12345',
  `gjini` enum('m','f') NOT NULL,
  `datelindje` date NOT NULL,
  `rol_id` int(11) NOT NULL,
  `atesia` varchar(32) NOT NULL,
  `statusi` enum('i_rregullt','perserites') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roli`
--

CREATE TABLE `roli` (
  `rol_id` int(11) NOT NULL,
  `emer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roli`
--

INSERT INTO `roli` (`rol_id`, `emer`) VALUES
(0, 'administrator'),
(1, 'student'),
(2, 'pedagog'),
(3, 'sekretare');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dega`
--
ALTER TABLE `dega`
  ADD PRIMARY KEY (`id_dega`);

--
-- Indexes for table `dokument`
--
ALTER TABLE `dokument`
  ADD PRIMARY KEY (`id_kerkese`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexes for table `grupi`
--
ALTER TABLE `grupi`
  ADD PRIMARY KEY (`id_grupi`),
  ADD KEY `dega` (`id_dega`);

--
-- Indexes for table `grupi_student`
--
ALTER TABLE `grupi_student`
  ADD PRIMARY KEY (`id_grup`,`id_student`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexes for table `jep_mesim_grup`
--
ALTER TABLE `jep_mesim_grup`
  ADD PRIMARY KEY (`id_pedagog`,`id_grup`),
  ADD KEY `id_orar` (`id_orar`),
  ADD KEY `id_grup` (`id_grup`);

--
-- Indexes for table `jep_mesim_lene`
--
ALTER TABLE `jep_mesim_lene`
  ADD PRIMARY KEY (`id_pedagog`,`id_lende`),
  ADD KEY `id_lende` (`id_lende`);

--
-- Indexes for table `lenda`
--
ALTER TABLE `lenda`
  ADD PRIMARY KEY (`id_lenda`),
  ADD KEY `id_dega` (`id_dega`);

--
-- Indexes for table `mungesa`
--
ALTER TABLE `mungesa`
  ADD PRIMARY KEY (`data`,`id_student`),
  ADD KEY `id_lende` (`id_lende`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_student`,`id_lenda`),
  ADD KEY `id_lenda` (`id_lenda`);

--
-- Indexes for table `orari`
--
ALTER TABLE `orari`
  ADD PRIMARY KEY (`id_orari`),
  ADD KEY `id_lenda` (`id_lenda`);

--
-- Indexes for table `perdorues`
--
ALTER TABLE `perdorues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indexes for table `roli`
--
ALTER TABLE `roli`
  ADD PRIMARY KEY (`rol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dega`
--
ALTER TABLE `dega`
  MODIFY `id_dega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokument`
--
ALTER TABLE `dokument`
  MODIFY `id_kerkese` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupi`
--
ALTER TABLE `grupi`
  MODIFY `id_grupi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lenda`
--
ALTER TABLE `lenda`
  MODIFY `id_lenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orari`
--
ALTER TABLE `orari`
  MODIFY `id_orari` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perdorues`
--
ALTER TABLE `perdorues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokument`
--
ALTER TABLE `dokument`
  ADD CONSTRAINT `dokument_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `perdorues` (`id`);

--
-- Constraints for table `grupi`
--
ALTER TABLE `grupi`
  ADD CONSTRAINT `grupi_ibfk_1` FOREIGN KEY (`id_dega`) REFERENCES `dega` (`id_dega`);

--
-- Constraints for table `grupi_student`
--
ALTER TABLE `grupi_student`
  ADD CONSTRAINT `grupi_student_ibfk_1` FOREIGN KEY (`id_grup`) REFERENCES `grupi` (`id_grupi`),
  ADD CONSTRAINT `grupi_student_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `perdorues` (`id`);

--
-- Constraints for table `jep_mesim_grup`
--
ALTER TABLE `jep_mesim_grup`
  ADD CONSTRAINT `jep_mesim_grup_ibfk_1` FOREIGN KEY (`id_pedagog`) REFERENCES `perdorues` (`id`),
  ADD CONSTRAINT `jep_mesim_grup_ibfk_2` FOREIGN KEY (`id_grup`) REFERENCES `grupi` (`id_grupi`);

--
-- Constraints for table `jep_mesim_lene`
--
ALTER TABLE `jep_mesim_lene`
  ADD CONSTRAINT `jep_mesim_lene_ibfk_1` FOREIGN KEY (`id_pedagog`) REFERENCES `perdorues` (`id`),
  ADD CONSTRAINT `jep_mesim_lene_ibfk_2` FOREIGN KEY (`id_lende`) REFERENCES `lenda` (`id_lenda`);

--
-- Constraints for table `lenda`
--
ALTER TABLE `lenda`
  ADD CONSTRAINT `lenda_ibfk_1` FOREIGN KEY (`id_dega`) REFERENCES `dega` (`id_dega`);

--
-- Constraints for table `mungesa`
--
ALTER TABLE `mungesa`
  ADD CONSTRAINT `mungesa_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `perdorues` (`id`),
  ADD CONSTRAINT `mungesa_ibfk_2` FOREIGN KEY (`id_lende`) REFERENCES `lenda` (`id_lenda`);

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_lenda`) REFERENCES `lenda` (`id_lenda`),
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `perdorues` (`id`);

--
-- Constraints for table `orari`
--
ALTER TABLE `orari`
  ADD CONSTRAINT `orari_ibfk_1` FOREIGN KEY (`id_lenda`) REFERENCES `lenda` (`id_lenda`);

--
-- Constraints for table `perdorues`
--
ALTER TABLE `perdorues`
  ADD CONSTRAINT `perdorues_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roli` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
