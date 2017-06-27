-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 27 jun 2017 om 14:32
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
  `workdate` date DEFAULT NULL,
  `start_time` varchar(6) DEFAULT NULL,
  `end_time` varchar(6) DEFAULT NULL,
  `hairdresser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`workdate`),
  KEY `hairdresser` (`hairdresser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `agenda`
--

INSERT INTO `agenda` (`id`, `workdate`, `start_time`, `end_time`, `hairdresser`) VALUES
(1, '2017-07-04', '10:30', '11:00', 'Ankie');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` int(11) DEFAULT NULL,
  `hairdresser` int(11) DEFAULT NULL,
  `workdate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`workdate`),
  KEY `hairdresser` (`hairdresser`),
  KEY `customer` (`customer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `appointments`
--

INSERT INTO `appointments` (`id`, `customer`, `hairdresser`, `workdate`, `status`) VALUES
(3, 1, 1, '2017-07-04', 'Gereserveerd');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `prefix`, `lastname`, `username`, `password`, `email`, `phone_number`) VALUES
(1, 'Romy', '', 'Bijkerk', 'romy96', '27fa9d3a680e68b32cfe2cd22bbdba28', 'romy-bijkerk@hotmail.com', '0636010210');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `prefix`, `lastname`, `username`, `password`, `email`, `phone_number`) VALUES
(1, 'Ankie', 'van', 'Grunsven', 'Ankie69', 'fb2af291bc5832de8a5f2731c45613b1', 'AnkievanGunsven@gmail.com', '06617783');

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
  ADD CONSTRAINT `FK_appointments_agenda` FOREIGN KEY (`workdate`) REFERENCES `agenda` (`workdate`),
  ADD CONSTRAINT `FK_appointments_customers` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `FK_appointments_employees` FOREIGN KEY (`hairdresser`) REFERENCES `employees` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
