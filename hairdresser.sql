-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 26 jun 2017 om 12:50
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `hairdresser`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `start_time` time(6) DEFAULT NULL,
  `end_time` time(6) DEFAULT NULL,
  `hairdresser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `hairdresser` (`hairdresser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` int(11) DEFAULT NULL,
  `hairdresser` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `hairdresser` (`hairdresser`),
  KEY `customer` (`customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `firstname` (`firstname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `FK_agenda_employees` FOREIGN KEY (`hairdresser`) REFERENCES `employees` (`firstname`);

--
-- Beperkingen voor tabel `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_appointments_agenda` FOREIGN KEY (`date`) REFERENCES `agenda` (`date`),
  ADD CONSTRAINT `FK_appointments_customers` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `FK_appointments_employees` FOREIGN KEY (`hairdresser`) REFERENCES `employees` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
