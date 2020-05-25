-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 12:38 PM
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
(2, 3, '2', 'Liste notash', 2),
(3, 3, '3', 'Vertetim', 3);

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
(6, 26),
(6, 27),
(7, 17),
(7, 18),
(7, 19),
(7, 38),
(8, 3),
(8, 20),
(8, 21),
(8, 22),
(8, 23),
(8, 30),
(8, 41),
(8, 44),
(10, 29),
(10, 37),
(12, 24),
(12, 25),
(12, 40);

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
(14, 12, 9),
(14, 7, 12),
(14, 8, 12),
(14, 6, 13),
(14, 9, 13),
(14, 10, 13);

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
(14, 12, 0, 30, 0, 0, 70),
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
(13, 'uml', 7, 7, 69, '2', 140);

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

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_student`, `id_lenda`, `pike_projekt`, `pike_laborator`, `pike_kologium`, `pike_seminar`, `pike_provim`) VALUES
(3, 12, 0, 0, 30, 0, 0),
(17, 12, 10, 0, 0, 0, 20),
(18, 12, 10, 0, 0, 0, 30),
(19, 12, 10, 0, 0, 0, 70),
(20, 12, 0, 0, 0, 0, 0),
(21, 12, 0, 0, 0, 0, 0),
(22, 12, 0, 0, 0, 0, 0),
(23, 12, 0, 0, 0, 0, 0),
(24, 13, 0, 0, 0, 0, 0),
(25, 13, 0, 0, 0, 0, 0),
(26, 13, 0, 0, 0, 0, 0),
(27, 13, 0, 0, 0, 0, 0),
(29, 13, 0, 0, 0, 0, 0),
(30, 12, 0, 0, 0, 0, 0),
(37, 13, 0, 0, 0, 0, 0),
(38, 12, 10, 10, 0, 0, 70),
(40, 13, 0, 0, 0, 0, 0),
(41, 12, 0, 0, 0, 0, 0),
(44, 12, 0, 0, 30, 0, 0);

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
(3, 'xholjan', 'malia', 'xholjan.malia@fshnstudent.info', '$2y$10$YCsW2EBYqkLqCCn6YbNhlOnFhLyIIkOLSsG9.m1.sI3NIy0abNhNy', 'm', '1998-03-26', 1, 'behar', 'i_rregullt'),
(6, 'arlinda', 'profi', 'arlinda.profi@fshnpedagog.info', '$2y$10$hRSmGcvkeMQgH0aPfP1bS.nmOLELKf4Kggjx8a7jbh7ndH.83t1Xu', 'f', '2018-10-29', 2, 'arlinda', NULL),
(14, 'margerita', 'qerimi', 'margerita.qerimi@fshnpedagog.info', '$2y$10$MGaDOHJFmbY4t03o71Bh5u6KVP0O25jKzrIshJixzcMNtaDeOyMh6', 'f', '1999-02-16', 2, 'mq', NULL),
(15, 'olsi', 'mustafaj', 'olsi.mustafaj@fshnsekretare.info', '$2y$10$wNV9dgQjTYdNWdyOmAMpCe6PZpzMK2m88doI1O8UDmZNYbxZApBba', 'm', '1999-07-03', 3, 'om', NULL),
(16, 'ana', 'dhembi', 'ana.dhemi@fshnpedagog.info', '$2y$10$qToxxVm.I2UBBq6emm7Ae.eNAdDTv1lOlBEcYdm4yPLEjgn.d/A..', 'f', '2018-07-12', 2, 'adh', NULL),
(17, 'lola', 'qerimi', 'lola.qerimi@fshnstudent.info', '$2y$10$lmIlJOe.Q0mVOBhIWkdkEeYYzul6gsxD9Al1d6Y8WhkyMaNtB1/hm', 'f', '2000-05-09', 1, 'shkelqim', 'i_rregullt'),
(18, 'lori', 'gega', 'lori.gega@fshnstudent.info', '$2y$10$MdlOptkbQyongokqioM14.PMnNkBbDN28t4TKWOSflMuQk9KWEfP6', 'm', '1999-05-06', 1, 'tani', 'i_rregullt'),
(19, 'meisi', 'sulaj', 'meisi.sulaj@fshnstudent.info', '$2y$10$X/FiehX8rl8JEjtzs6kqcOiaxtGQ/rZXChFdG.VK06sSXxXPtYGYC', 'f', '2001-05-13', 1, 'miri', 'i_rregullt'),
(20, 'doris', 'allamani', 'doris.allamani@fshnstudent.info', '$2y$10$07MHLj3b/vuZBgewTxxbleoJ03hlGcXjzLR4GkzXPlQ7frqeJM6ou', 'm', '2003-05-25', 1, 'andi', 'i_rregullt'),
(21, 'orkida', 'frangu', 'orkida.frangu@fshnstudent.info', '$2y$10$/DOfHOVXEhJcDoAXFYbkE.VQngdh7K1I/HL6xfFQ/M.q.OfJDcSmm', 'm', '1999-05-07', 1, 'mani', 'i_rregullt'),
(22, 'jevi', 'doka', 'jevi.doka@fshnstudent.info', '$2y$10$LNIMbwUWj5w/cvCuNlaYF.iCP/rnb/a64YYTLRknX/aSC4xX5jTB.', 'm', '2008-05-20', 1, 'jd', 'i_rregullt'),
(23, 'sara', 'haxhiaj', 'sara.haxhiaj@fshnstudent.info', '$2y$10$QCCFqXePycOfRKd4vzSPUOxFqyeOaPdlc1CfQFcu0SvDFhnbRuDsK', 'm', '1998-05-14', 1, 'sh', 'i_rregullt'),
(24, 'valbona', 'doda', 'valbona.doda@fshnstudent.info', '$2y$10$Xmx8Al0epvyenLI6RGTOR.LZZR6vagJz7nmCOX2ABW4tGSPfgtEh.', 'f', '1994-05-22', 1, 'vd', 'i_rregullt'),
(25, 'xhedi', 'hana', 'xhedi.hana@fshnstudent.info', '$2y$10$uUJNCJccbd8EAvVbNRf3Ge9YrGbVHhSiYvdT8Pp8Lvx8CvxJfMMOG', 'm', '1998-05-21', 1, 'xhh', 'i_rregullt'),
(26, 'endri', 'duka', 'endri.duka@fshnstudent.info', '$2y$10$Fe1rqQQe/d7B/3FsynDOrOOjtmQk58xXjwB2IEsl1EZ2p9Bw/tQ0W', 'm', '1999-12-31', 1, 'ed', 'i_rregullt'),
(27, 'hana', 'andrea', 'hana.andrea@fshnstudent.info', '$2y$10$ygOIWO6kugyH9iLYrD/uH.eBpyggbNwqsyRTN7MZ3NUiEy3m69Hx2', 'm', '2000-05-22', 1, 'ha', 'i_rregullt'),
(28, 'laura', 'ceka', 'laura.ceka@fshnstudent.info', '$2y$10$byva/z7GqnNECun6U8NppO6YladV55RsEETIfjCDOQiqBKPf5DcUS', 'm', '2003-05-11', 1, 'lc', 'i_rregullt'),
(29, 'zera', 'kuka', 'zera.kuka@fshnstudent.info', '$2y$10$s0vkA5nELJ5IAkAFpgt7muJzfv4Z1EV0TRhY997lRxBhNFofOgaAW', 'f', '2005-05-02', 1, 'zk', 'i_rregullt'),
(30, 'klark', 'kada', 'klark.kada@fshnstudent.info', '$2y$10$jDWZgNzFBsTaPTYsA/0aMOkroGfS.PwjhX0KoLqZdjOxpFR8DBwwm', 'm', '2002-05-02', 1, 'kk', 'i_rregullt'),
(37, 'klark', 'kada', 'klark.kada2@fshnstudent.info', '$2y$10$yNW9UFVgU9f.r10VjGcaBOUx9IgfAVwsves9yyLH95E46T6QZBNTq', 'm', '2002-05-02', 1, 'kk', 'i_rregullt'),
(38, 'klark', 'kada', 'klark.kada3@fshnstudent.info', '$2y$10$/XCAFO56B/0dNc5/5CZ9XeGDgB0cqFLE.51bWKlVpNltUdwQfU3.6', 'm', '2002-05-02', 1, 'kk', 'i_rregullt'),
(40, 'klark', 'kada', 'klark.kada5@fshnstudent.info', '$2y$10$9tnmFj2tzH4vyg.lcC3v6O7JrgOELaBQm8T4o.pZj2m6c8MWC3Jem', 'm', '2002-05-02', 1, 'kk', 'i_rregullt'),
(41, 'sindi', 'mana', 'sindi.mana@fshnstudent.info', '$2y$10$jIoVEEqgP4JmTvOT3LAl5O0wSAGq6Ge16mMa9oViEOPzS/aCSEO1.', 'f', '1995-05-15', 1, 'sm', 'i_rregullt'),
(42, 'klark', 'kada', 'klark.kada11@fshnstudent.info', '$2y$10$Zk1gVa1OM/CAO6A.sHbKe.naYpnjifFnvLgq7oCsopWBJ/7rocp.e', 'm', '2020-05-06', 1, 'kk', 'i_rregullt'),
(43, 'klark', 'kada', 'klark.kada12@fshnstudent.info', '$2y$10$TDULZ1OjHORTiUUxIPS7R.BbbH1HUg1ooaNB0Ve0xe7E9WDteor4q', 'm', '2004-05-05', 1, 'kk', 'i_rregullt'),
(44, 'stiven', 'kerthi', 'stiven.kerthi@fshnstudent.info', '$2y$10$yRpJF65hRQrlnPXe/MeKFePekhqL8czIesTjp1ZpVoNMPfeA5NfPO', 'm', '1999-04-26', 1, 'ardian', 'i_rregullt');

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
  MODIFY `id_kerkese` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perdorues`
--
ALTER TABLE `perdorues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
