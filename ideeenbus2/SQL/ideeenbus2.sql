-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 dec 2021 om 09:59
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideeenbus2`
--
CREATE DATABASE IF NOT EXISTS `ideeenbus2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ideeenbus2`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `berichten`
--

CREATE TABLE `berichten` (
  `berichtId` int(11) NOT NULL,
  `ontvangerId` int(11) NOT NULL,
  `verstuurderId` int(11) NOT NULL,
  `berichtTekst` varchar(600) NOT NULL,
  `berichtDatum` datetime NOT NULL,
  `berichtAntwoord` int(3) NOT NULL,
  `berichtHoeveelheidReacties` int(6) NOT NULL,
  `berichtScore` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `gebruikerId` int(11) NOT NULL,
  `gebruikerVoornaam` varchar(100) NOT NULL,
  `gebruikerAchternaam` varchar(100) NOT NULL,
  `gebruikerEmail` varchar(200) NOT NULL,
  `gebruikerWachtwoord` varchar(300) NOT NULL,
  `gebruikerProfielstatus` int(3) NOT NULL,
  `gebruikerProfielAanmaakdatum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ideeen`
--

CREATE TABLE `ideeen` (
  `ideeId` int(11) NOT NULL,
  `ideeTekst` varchar(600) NOT NULL,
  `ideeOnderwerp` varchar(200) NOT NULL,
  `ideeHoeveelheidStemmen` int(11) NOT NULL,
  `ideeAanmaakDatum` datetime NOT NULL,
  `gebruikerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stemmen`
--

CREATE TABLE `stemmen` (
  `stemId` int(11) NOT NULL,
  `gebruikerId` int(11) NOT NULL,
  `ideeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `zoekopdrachten`
--

CREATE TABLE `zoekopdrachten` (
  `zoekId` int(11) NOT NULL,
  `zoekTekst` varchar(120) NOT NULL,
  `zoekDatumOpdracht` datetime NOT NULL,
  `gebruikerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `berichten`
--
ALTER TABLE `berichten`
  ADD PRIMARY KEY (`berichtId`),
  ADD KEY `berichten_ibfk_1` (`ontvangerId`),
  ADD KEY `berichten_ibfk_2` (`verstuurderId`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`gebruikerId`);

--
-- Indexen voor tabel `ideeen`
--
ALTER TABLE `ideeen`
  ADD PRIMARY KEY (`ideeId`),
  ADD KEY `gebruikerId` (`gebruikerId`);

--
-- Indexen voor tabel `stemmen`
--
ALTER TABLE `stemmen`
  ADD PRIMARY KEY (`stemId`),
  ADD KEY `gebruikerId` (`gebruikerId`),
  ADD KEY `ideeId` (`ideeId`);

--
-- Indexen voor tabel `zoekopdrachten`
--
ALTER TABLE `zoekopdrachten`
  ADD PRIMARY KEY (`zoekId`),
  ADD KEY `gebruikerId` (`gebruikerId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `berichten`
--
ALTER TABLE `berichten`
  MODIFY `berichtId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `gebruikerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `ideeen`
--
ALTER TABLE `ideeen`
  MODIFY `ideeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `stemmen`
--
ALTER TABLE `stemmen`
  MODIFY `stemId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `zoekopdrachten`
--
ALTER TABLE `zoekopdrachten`
  MODIFY `zoekId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `berichten`
--
ALTER TABLE `berichten`
  ADD CONSTRAINT `berichten_ibfk_1` FOREIGN KEY (`ontvangerId`) REFERENCES `gebruikers` (`gebruikerId`) ON DELETE CASCADE,
  ADD CONSTRAINT `berichten_ibfk_2` FOREIGN KEY (`verstuurderId`) REFERENCES `gebruikers` (`gebruikerId`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `ideeen`
--
ALTER TABLE `ideeen`
  ADD CONSTRAINT `ideeen_ibfk_1` FOREIGN KEY (`gebruikerId`) REFERENCES `gebruikers` (`gebruikerId`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `stemmen`
--
ALTER TABLE `stemmen`
  ADD CONSTRAINT `stemmen_ibfk_1` FOREIGN KEY (`gebruikerId`) REFERENCES `gebruikers` (`gebruikerId`) ON DELETE CASCADE,
  ADD CONSTRAINT `stemmen_ibfk_2` FOREIGN KEY (`ideeId`) REFERENCES `ideeen` (`ideeId`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `zoekopdrachten`
--
ALTER TABLE `zoekopdrachten`
  ADD CONSTRAINT `zoekopdrachten_ibfk_1` FOREIGN KEY (`gebruikerId`) REFERENCES `gebruikers` (`gebruikerId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
