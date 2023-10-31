-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Okt 17, 2023 kell 11:22 EL
-- Serveri versioon: 10.4.27-MariaDB
-- PHP versioon: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `nadezdamarenkova`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `eestilaul`
--

CREATE TABLE `eestilaul` (
  `id` int(11) NOT NULL,
  `laulunimi` varchar(50) NOT NULL,
  `laulja` varchar(50) DEFAULT NULL,
  `punktid` int(11) DEFAULT NULL,
  `kommentaarid` text DEFAULT NULL,
  `avalik` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `eestilaul`
--

INSERT INTO `eestilaul` (`id`, `laulunimi`, `laulja`, `punktid`, `kommentaarid`, `avalik`) VALUES
(1, 'Droonid', 'Nublu', 68, 'MULLE MEELDIB\n123\n', 1),
(3, 'Hope', 'Stefan', 60, 'test test\nVäga ilus laul\n', 1),
(4, 'Universum', 'Mikael', 27, 'Soovitame hingamisega tegeledatest\ntest\ntest1\n', 1),
(5, 'Loodus ja hobused', 'Hendrik', 50, 'test\n', 1),
(6, '1-2', 'Nublu', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `jalgrattaeksam`
--

CREATE TABLE `jalgrattaeksam` (
  `id` int(11) NOT NULL,
  `eesnimi` varchar(30) DEFAULT NULL,
  `perekonnanimi` varchar(30) DEFAULT NULL,
  `teooriatulemus` int(11) DEFAULT -1,
  `slaalom` int(11) DEFAULT -1,
  `ringtee` int(11) DEFAULT -1,
  `t2nav` int(11) DEFAULT -1,
  `luba` int(11) DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `jalgrattaeksam`
--

INSERT INTO `jalgrattaeksam` (`id`, `eesnimi`, `perekonnanimi`, `teooriatulemus`, `slaalom`, `ringtee`, `t2nav`, `luba`) VALUES
(1, 'Juku', 'Juurikas', 9, 1, -1, -1, -1),
(2, 'Kati', 'Tamm', 10, 2, -1, -1, -1),
(3, 'Mati', 'Kask', 10, 1, 1, -1, -1),
(4, 'Kati', 'Tamm', 54, 1, -1, -1, -1),
(5, 'Alina', 'Toropova', 99, -1, 1, -1, -1),
(6, NULL, NULL, -1, -1, -1, -1, -1),
(7, NULL, NULL, -1, -1, -1, -1, -1),
(8, NULL, NULL, -1, -1, -1, -1, -1),
(9, NULL, NULL, -1, -1, -1, -1, -1),
(10, 'Allan', 'Malkolm', 54, -1, -1, -1, -1),
(11, 'Max', 'Pakrovski', 59, -1, -1, -1, -1),
(12, 'Taanel', 'Kuldmaa', 5, -1, -1, -1, -1),
(13, 'Max', 'Razenbaum', -1, -1, -1, -1, -1),
(14, 'test', 'test', -1, -1, -1, -1, -1),
(15, 'test', 'test', -1, -1, -1, -1, -1),
(16, 'test', 'test', 66, -1, -1, -1, -1),
(17, 'TTestt', 'TTestt', 55, 1, -1, -1, -1),
(18, 'max', 'max', 44, 1, -1, -1, -1),
(19, 'tt', 'tt', -1, -1, -1, -1, -1);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `kasutajad`
--

CREATE TABLE `kasutajad` (
  `id` int(11) NOT NULL,
  `kasutaja` varchar(50) DEFAULT NULL,
  `parool` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `kasutajad`
--

INSERT INTO `kasutajad` (`id`, `kasutaja`, `parool`) VALUES
(1, 'Nadezda', 'admin'),
(2, 'Alina', NULL),
(3, 'admin', 'tagJdjbPkRspk'),
(4, 'tagJdjbPkRspk', 'admin');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `kaubad`
--

CREATE TABLE `kaubad` (
  `id` int(11) NOT NULL,
  `nimetus` varchar(255) DEFAULT NULL,
  `kaubagrupi_id` int(11) DEFAULT NULL,
  `hind` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `kaubad`
--

INSERT INTO `kaubad` (`id`, `nimetus`, `kaubagrupi_id`, `hind`) VALUES
(1, 'ahjutellis', 1, '8.20'),
(2, 'fassaaditellis', 1, '7.50'),
(3, 'bituumenrull', 2, '520.00'),
(4, 'puit', 2, '80.00'),
(6, 'testtest2', 2, '75.00'),
(8, '', 1, '0.00'),
(9, '', 1, '0.00'),
(10, NULL, 1, NULL),
(11, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `kaubagrupid`
--

CREATE TABLE `kaubagrupid` (
  `id` int(11) NOT NULL,
  `grupinimi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `kaubagrupid`
--

INSERT INTO `kaubagrupid` (`id`, `grupinimi`) VALUES
(1, 'tellised'),
(2, 'katusematerjal'),
(3, ''),
(4, ''),
(5, '');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `tantsupaarid`
--

CREATE TABLE `tantsupaarid` (
  `id` int(11) NOT NULL,
  `oskustetase` varchar(5) DEFAULT NULL,
  `originaalsus` varchar(5) DEFAULT NULL,
  `valimus` varchar(5) DEFAULT NULL,
  `paarinumber` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `tantsupaarid`
--

INSERT INTO `tantsupaarid` (`id`, `oskustetase`, `originaalsus`, `valimus`, `paarinumber`) VALUES
(1, '4', '3', '5', '562'),
(2, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, 'f');

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `eestilaul`
--
ALTER TABLE `eestilaul`
  ADD PRIMARY KEY (`id`);

--
-- Indeksid tabelile `jalgrattaeksam`
--
ALTER TABLE `jalgrattaeksam`
  ADD PRIMARY KEY (`id`);

--
-- Indeksid tabelile `kasutajad`
--
ALTER TABLE `kasutajad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kasutaja` (`kasutaja`);

--
-- Indeksid tabelile `kaubad`
--
ALTER TABLE `kaubad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kaubagruppid` (`kaubagrupi_id`);

--
-- Indeksid tabelile `kaubagrupid`
--
ALTER TABLE `kaubagrupid`
  ADD PRIMARY KEY (`id`);

--
-- Indeksid tabelile `tantsupaarid`
--
ALTER TABLE `tantsupaarid`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `eestilaul`
--
ALTER TABLE `eestilaul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT tabelile `jalgrattaeksam`
--
ALTER TABLE `jalgrattaeksam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT tabelile `kasutajad`
--
ALTER TABLE `kasutajad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT tabelile `kaubad`
--
ALTER TABLE `kaubad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT tabelile `kaubagrupid`
--
ALTER TABLE `kaubagrupid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT tabelile `tantsupaarid`
--
ALTER TABLE `tantsupaarid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tõmmistatud tabelite piirangud
--

--
-- Piirangud tabelile `kaubad`
--
ALTER TABLE `kaubad`
  ADD CONSTRAINT `fk_kaubagruppid` FOREIGN KEY (`kaubagrupi_id`) REFERENCES `kaubagrupid` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
