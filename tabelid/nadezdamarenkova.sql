-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Okt 03, 2023 kell 11:25 EL
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

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `eestilaul`
--
ALTER TABLE `eestilaul`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `eestilaul`
--
ALTER TABLE `eestilaul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
