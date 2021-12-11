-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql106.epizy.com
-- Generation Time: Feb 23, 2021 at 05:35 PM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_26075240_huawei1`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa_korisnik`
--

CREATE TABLE `anketa_korisnik` (
  `id` int(11) NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `id_ankete` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anketa_korisnik`
--

INSERT INTO `anketa_korisnik` (`id`, `id_korisnik`, `id_ankete`) VALUES
(8, 1, 1),
(9, 1, 5),
(6, 12, 1),
(7, 12, 5),
(16, 13, 1),
(17, 13, 5),
(10, 14, 1),
(11, 14, 5),
(12, 15, 1),
(13, 15, 5),
(14, 16, 1),
(15, 16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ankete`
--

CREATE TABLE `ankete` (
  `id` int(11) NOT NULL,
  `pitanje` varchar(100) NOT NULL,
  `aktivna` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ankete`
--

INSERT INTO `ankete` (`id`, `pitanje`, `aktivna`) VALUES
(1, 'Da li Vam se svidja nasa stranica?', 1),
(2, 'Da li biste promenili nesto ili nesto dodali?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brendovi`
--

CREATE TABLE `brendovi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brendovi`
--

INSERT INTO `brendovi` (`id`, `naziv`) VALUES
(1, 'P30'),
(2, 'Mate 30'),
(3, 'Honor 20');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id_korisnik` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_uloga` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnik`, `ime`, `prezime`, `email`, `password`, `id_uloga`) VALUES
(1, 'Julijana', 'Stojnic', 'julijana123@gmail.com', 'Admin_12345', 1),
(12, 'Vladimir', 'Stojnic', 'vladimir123@gmail.com', 'lozinka12', 2),
(13, 'Milica', 'Mirkovic', 'milica123@gmail.com', 'catsshop', 2),
(14, 'Mirko', 'Markovic', 'mirko123@gmail.com', 'huawei', 2),
(15, 'Vladimir', 'Stojnic', 'vladimir12345@gmail.com', 'Admin_12345', 2),
(16, 'Danijela', 'Nikitin', 'danijela123@gmail.com', 'catsshop', 2),
(17, 'Julijana', 'Milosavljevic', 'julijanamilosavljevic2@gmail.c', 'ecdb632aa5cbc455ad5febf93e2152c1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kupovina`
--

CREATE TABLE `kupovina` (
  `id` int(11) NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `id_proizvod` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kupovina`
--

INSERT INTO `kupovina` (`id`, `id_korisnik`, `id_proizvod`, `kolicina`) VALUES
(1, 12, 4, 1),
(2, 12, 9, 1),
(3, 12, 4, 1),
(4, 12, 3, 1),
(5, 12, 1, 1),
(6, 1, 9, 1),
(7, 1, 3, 1),
(8, 12, 1, 1),
(9, 1, 3, 1),
(10, 1, 1, 1),
(11, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `tekst` varchar(100) NOT NULL,
  `redosled` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id`, `link`, `tekst`, `redosled`) VALUES
(1, 'index.php', 'Pocetna', 1),
(2, 'onama.php', 'O nama', 2),
(3, 'proizvodi.php', 'Proizvodi', 3),
(4, 'oautoru.php', 'Autor', 4),
(5, 'prijava.php', 'Prijava', 5),
(6, 'logout.php', 'Odjavite se', 6),
(7, 'korisnik2.php', 'Korisnik', 7),
(8, 'korpa.php', '', 8),
(11, 'dokumentacija.pdf', 'Dokumentacija', 9);

-- --------------------------------------------------------

--
-- Table structure for table `odgovori`
--

CREATE TABLE `odgovori` (
  `id` int(11) NOT NULL,
  `odgovor` varchar(100) NOT NULL,
  `id_ankete` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `odgovori`
--

INSERT INTO `odgovori` (`id`, `odgovor`, `id_ankete`) VALUES
(3, 'Da', 1),
(4, 'Ne', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `opis` text NOT NULL,
  `slika` varchar(100) NOT NULL,
  `alt` varchar(100) NOT NULL,
  `cena` int(11) NOT NULL,
  `aktivan` tinyint(4) NOT NULL,
  `id_brend` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `naziv`, `opis`, `slika`, `alt`, `cena`, `aktivan`, `id_brend`) VALUES
(1, 'Huawei P30', 'Boje:\r\ncrna,twighlight,roze', 'images/products/slika11.jpg', 'slika', 89000, 1, 1),
(3, 'Huawei P30 Pro', 'Boje:\r\ncrna,crvena,twightlight,roze', 'images/products/slika22.jpg', 'slika', 109000, 1, 1),
(4, 'Huawei P30 lite', 'Boje:\r\ncrna,twightlight', 'images/products/slika33.jpg', 'slika', 39000, 1, 1),
(5, 'Huawei Mate 30', 'Boje:\r\ncrna,ljubicasta,narandzasta', 'images/products/slika44.jpg', 'slika', 79000, 1, 2),
(6, 'Huawei Mate 30 Pro', 'Boje:\r\ncrna,ljubicasta,narandzasta,crvena', 'images/products/slika55.jpg', 'slika', 109000, 1, 2),
(7, 'Huawei Mate 30 lite', 'Boje:\r\ncrna,ljubicasta', 'images/products/slika66.jpg', 'slika', 29000, 1, 2),
(8, 'Huawei Honor 20', 'Boje:\r\ncrna,zelena,plava', 'images/products/slika77.jpg', 'slika', 29000, 1, 3),
(9, 'Huawei Honor 20 Pro', 'Boje:\r\ncrna,bela,twighlight,zelena,plava', 'images/products/slika88.jpg', 'slika', 69000, 1, 3),
(10, 'Huawei Honor 20 lite', 'Boje:\r\ncrna,zelena', 'images/products/slika99.jpg', 'slika', 19000, 1, 3),
(2, 'Huawei P30', 'Boje:\r\ncrna,twighlight,roze', 'images/products/slika11.jpg', 'slika', 89000, 1, 1),
(14, 'Test', 'Opis', 'images/products/1593515987beagle3.jpg', 'alt', 7866, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rezultat`
--

CREATE TABLE `rezultat` (
  `id` int(11) NOT NULL,
  `rezultat` int(11) NOT NULL,
  `id_ankete` int(11) NOT NULL,
  `id_odgovor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rezultat`
--

INSERT INTO `rezultat` (`id`, `rezultat`, `id_ankete`, `id_odgovor`) VALUES
(4, 3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id`, `naziv`) VALUES
(1, 'Admin'),
(2, 'Korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa_korisnik`
--
ALTER TABLE `anketa_korisnik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_korisnik` (`id_korisnik`,`id_ankete`),
  ADD KEY `id_anketa` (`id_ankete`);

--
-- Indexes for table `ankete`
--
ALTER TABLE `ankete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brendovi`
--
ALTER TABLE `brendovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD KEY `id_uloga` (`id_uloga`);

--
-- Indexes for table `kupovina`
--
ALTER TABLE `kupovina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_korisnik` (`id_korisnik`,`id_proizvod`),
  ADD KEY `id_proizvod` (`id_proizvod`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `odgovori`
--
ALTER TABLE `odgovori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ankete` (`id_ankete`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brend` (`id_brend`);

--
-- Indexes for table `rezultat`
--
ALTER TABLE `rezultat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anketa` (`id_ankete`,`id_odgovor`),
  ADD KEY `id_odgovor` (`id_odgovor`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa_korisnik`
--
ALTER TABLE `anketa_korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ankete`
--
ALTER TABLE `ankete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brendovi`
--
ALTER TABLE `brendovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kupovina`
--
ALTER TABLE `kupovina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `odgovori`
--
ALTER TABLE `odgovori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rezultat`
--
ALTER TABLE `rezultat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
