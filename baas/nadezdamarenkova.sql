-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Sept 26, 2023 kell 05:56 PL
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
(1, 'Droonid', 'Nublu', 68, 'MULLE MEELDIB\n', 1),
(3, 'Hope', 'Stefan', 60, 'test test\nVäga ilus laul\n', 1),
(4, 'Universum', 'Mikael', 27, 'Soovitame hingamisega tegeledatest\ntest\ntest1\n', 1),
(5, 'Loodus ja hobused', 'Hendrik', 50, NULL, 1),
(6, '1-2', 'Nublu', NULL, NULL, 1);

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `eestilaul`
--
ALTER TABLE `eestilaul`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `eestilaul`
--
ALTER TABLE `eestilaul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
