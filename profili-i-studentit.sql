-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 06:38 AM
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
  `emri` varchar(50) NOT NULL,
  `kuotat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dega`
--

INSERT INTO `dega` (`id_dega`, `emri`, `kuotat`) VALUES
(7, 'informatike', 50),
(8, 'matematike', 50),
(9, 'fizike', 50);

-- --------------------------------------------------------

--
-- Table structure for table `dokument`
--

CREATE TABLE `dokument` (
  `id_kerkese` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `lloji` varchar(100) NOT NULL,
  `nr_kopjeve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokument`
--

INSERT INTO `dokument` (`id_kerkese`, `id_student`, `status`, `lloji`, `nr_kopjeve`) VALUES
(1, 3, '1', 'Vertetim', 1),
(2, 3, '1', 'Liste notash', 2);

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

--
-- Dumping data for table `grupi`
--

INSERT INTO `grupi` (`id_grupi`, `viti`, `id_dega`, `emer_grupi`) VALUES
(6, '1', 7, 'a1'),
(7, '2', 7, 'b2'),
(8, '3', 7, 'b1'),
(9, '3', 7, 'b2'),
(10, '1', 8, 'a1'),
(12, '1', 9, 'a1');

-- --------------------------------------------------------

--
-- Table structure for table `grupi_student`
--

CREATE TABLE `grupi_student` (
  `id_grup` int(11) NOT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grupi_student`
--

INSERT INTO `grupi_student` (`id_grup`, `id_student`) VALUES
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `idPerson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `image`, `idPerson`) VALUES
(1, 'profile.svg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jep_mesim_grup`
--

CREATE TABLE `jep_mesim_grup` (
  `id_pedagog` int(11) NOT NULL,
  `id_grup` int(11) NOT NULL,
  `id_lende` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jep_mesim_grup`
--

INSERT INTO `jep_mesim_grup` (`id_pedagog`, `id_grup`, `id_lende`) VALUES
(14, 8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `jep_mesim_lende`
--

CREATE TABLE `jep_mesim_lende` (
  `id_pedagog` int(11) NOT NULL,
  `id_lende` int(11) NOT NULL,
  `pike_projekt` int(11) DEFAULT NULL,
  `pike_laborator` int(11) DEFAULT NULL,
  `pike_kologium` int(11) DEFAULT NULL,
  `pike_seminar` int(11) DEFAULT NULL,
  `pike_provim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jep_mesim_lende`
--

INSERT INTO `jep_mesim_lende` (`id_pedagog`, `id_lende`, `pike_projekt`, `pike_laborator`, `pike_kologium`, `pike_seminar`, `pike_provim`) VALUES
(14, 12, 0, 0, 0, 0, 100),
(14, 13, 0, 0, 0, 0, 100),
(16, 9, 35, 15, 0, 0, 50);

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
  `viti_i_lendes` enum('1','2','3') NOT NULL,
  `me_zgjedhje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lenda`
--

INSERT INTO `lenda` (`id_lenda`, `emer`, `kredite`, `id_dega`, `ore_totale`, `viti_i_lendes`, `me_zgjedhje`) VALUES
(6, 'gis', 4, 7, 49, '3', 0),
(7, 'matematike', 12, 7, 71, '1', 80),
(8, 'c', 10, 7, 90, '1', 0),
(9, 'programim ne web', 11, 7, 71, '3', 0),
(10, 'fizika 1', 7, 9, 50, '1', 0),
(11, 'fizika 2', 11, 9, 75, '2', 0),
(12, 'algjeber', 7, 8, 58, '1', 0),
(13, 'uml', 7, 7, 69, '2', 50);

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
-- Table structure for table `ndrysho_password`
--

CREATE TABLE `ndrysho_password` (
  `id` int(11) NOT NULL,
  `code` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL
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
-- Table structure for table `perdorues`
--

CREATE TABLE `perdorues` (
  `id` int(11) NOT NULL,
  `emer` varchar(30) NOT NULL,
  `mbiemer` varchar(30) NOT NULL,
  `email` varchar(320) NOT NULL DEFAULT 'emer.mbiemer@fshn.com',
  `password` longtext NOT NULL DEFAULT 'student12345',
  `gjini` enum('m','f') NOT NULL,
  `datelindje` date NOT NULL,
  `rol_id` int(11) NOT NULL,
  `atesia` varchar(32) NOT NULL,
  `statusi` enum('i_rregullt','perserites') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perdorues`
--

INSERT INTO `perdorues` (`id`, `emer`, `mbiemer`, `email`, `password`, `gjini`, `datelindje`, `rol_id`, `atesia`, `statusi`) VALUES
(1, 'vangjel', 'gramozi', 'v@fshnadmin.info', '$2y$10$0spq1Ay89qb6HBH6P.XCC.EtO5y6NgfZc2A5i463xrbnMBbL.k1Na', 'm', '1999-03-22', 4, 'kostandin', NULL),
(2, 'stiven', 'kerthi', 'stiven.kerthi@fshnadmin.info', '$2y$10$jb.m/IdefmZDUcl7SlpRfuMUvhVlYmBnXhw9oX8MnGDcZ/8Uw9q/S', 'm', '1999-04-26', 4, 'ardian', NULL),
(3, 'xholjan', 'malia', 'xholjan.malia@fshnstudent.info', '$2y$10$YCsW2EBYqkLqCCn6YbNhlOnFhLyIIkOLSsG9.m1.sI3NIy0abNhNy', 'm', '1998-03-26', 1, 'behar', 'i_rregullt'),
(6, 'arlinda', 'profi', 'arlinda.profi@fshnpedagog.info', '$2y$10$hRSmGcvkeMQgH0aPfP1bS.nmOLELKf4Kggjx8a7jbh7ndH.83t1Xu', 'f', '2018-10-29', 2, 'arlinda', NULL),
(14, 'margerita', 'qerimi', 'margerita.qerimi@fshnpedagog.info', '$2y$10$MGaDOHJFmbY4t03o71Bh5u6KVP0O25jKzrIshJixzcMNtaDeOyMh6', 'f', '1999-02-16', 2, 'mq', NULL),
(15, 'olsi', 'mustafaj', 'olsi.mustafaj@fshnsekretare.info', '$2y$10$wNV9dgQjTYdNWdyOmAMpCe6PZpzMK2m88doI1O8UDmZNYbxZApBba', 'm', '1999-07-03', 3, 'om', NULL),
(16, 'ana', 'dhemi', 'ana.dhemi@fshnpedagog.info', '$2y$10$qToxxVm.I2UBBq6emm7Ae.eNAdDTv1lOlBEcYdm4yPLEjgn.d/A..', 'f', '2018-07-12', 2, 'adh', NULL);

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
(1, 'student'),
(2, 'pedagog'),
(3, 'sekretare'),
(4, 'administrator');

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
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPerson` (`idPerson`);

--
-- Indexes for table `jep_mesim_grup`
--
ALTER TABLE `jep_mesim_grup`
  ADD PRIMARY KEY (`id_pedagog`,`id_grup`),
  ADD KEY `id_grup` (`id_grup`),
  ADD KEY `id_lende` (`id_lende`);

--
-- Indexes for table `jep_mesim_lende`
--
ALTER TABLE `jep_mesim_lende`
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
-- Indexes for table `ndrysho_password`
--
ALTER TABLE `ndrysho_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_student`,`id_lenda`),
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
  MODIFY `id_dega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dokument`
--
ALTER TABLE `dokument`
  MODIFY `id_kerkese` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grupi`
--
ALTER TABLE `grupi`
  MODIFY `id_grupi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lenda`
--
ALTER TABLE `lenda`
  MODIFY `id_lenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ndrysho_password`
--
ALTER TABLE `ndrysho_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perdorues`
--
ALTER TABLE `perdorues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- Constraints for table `jep_mesim_lende`
--
ALTER TABLE `jep_mesim_lende`
  ADD CONSTRAINT `jep_mesim_lende_ibfk_1` FOREIGN KEY (`id_pedagog`) REFERENCES `perdorues` (`id`),
  ADD CONSTRAINT `jep_mesim_lende_ibfk_2` FOREIGN KEY (`id_lende`) REFERENCES `lenda` (`id_lenda`);

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
-- Constraints for table `perdorues`
--
ALTER TABLE `perdorues`
  ADD CONSTRAINT `perdorues_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roli` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
