-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 03:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `autofokus`
--

CREATE TABLE `autofokus` (
  `idAutofokus` int(1) NOT NULL,
  `nazivAutofokus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `autofokus`
--

INSERT INTO `autofokus` (`idAutofokus`, `nazivAutofokus`) VALUES
(1, 'Da'),
(2, 'Ne');

-- --------------------------------------------------------

--
-- Table structure for table `baterija_kapacitet`
--

CREATE TABLE `baterija_kapacitet` (
  `idBaterijaKapacitet` int(3) NOT NULL,
  `kapacitet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baterija_kapacitet`
--

INSERT INTO `baterija_kapacitet` (`idBaterijaKapacitet`, `kapacitet`) VALUES
(1, 1000),
(2, 1500),
(5, 2000),
(6, 3500),
(7, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `baterija_tip`
--

CREATE TABLE `baterija_tip` (
  `idBaterijaTip` int(3) NOT NULL,
  `nazivBaterija` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baterija_tip`
--

INSERT INTO `baterija_tip` (`idBaterijaTip`, `nazivBaterija`) VALUES
(1, 'Li-ion'),
(2, 'LiPo');

-- --------------------------------------------------------

--
-- Table structure for table `blic`
--

CREATE TABLE `blic` (
  `idBlic` int(1) NOT NULL,
  `nazivBlic` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blic`
--

INSERT INTO `blic` (`idBlic`, `nazivBlic`) VALUES
(1, 'da'),
(2, 'ne');

-- --------------------------------------------------------

--
-- Table structure for table `bluetooth`
--

CREATE TABLE `bluetooth` (
  `idBluetooth` int(5) NOT NULL,
  `nazivBluetooth` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bluetooth`
--

INSERT INTO `bluetooth` (`idBluetooth`, `nazivBluetooth`) VALUES
(1, '4.0'),
(2, '4.1'),
(3, '4.2'),
(4, '5'),
(5, '5.1'),
(6, '5.2');

-- --------------------------------------------------------

--
-- Table structure for table `cenovnik`
--

CREATE TABLE `cenovnik` (
  `idCenovnik` int(255) NOT NULL,
  `idTelefon` int(255) NOT NULL,
  `cena` decimal(6,3) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cenovnik`
--

INSERT INTO `cenovnik` (`idCenovnik`, `idTelefon`, `cena`, `datum`) VALUES
(4, 5, '49.999', '2021-03-13'),
(6, 7, '189.090', '2021-03-17'),
(7, 8, '129.999', '2021-03-13'),
(8, 9, '55.999', '2021-03-13'),
(9, 10, '87.799', '2021-03-17'),
(10, 11, '30.000', '2021-03-20'),
(11, 12, '32.000', '2021-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `chipset`
--

CREATE TABLE `chipset` (
  `idChipset` int(15) NOT NULL,
  `nazivChipset` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chipset`
--

INSERT INTO `chipset` (`idChipset`, `nazivChipset`) VALUES
(8, 'Apple A12 Bionic'),
(1, 'Apple A14 Bionic'),
(5, 'Exynos 2100'),
(7, 'Kirin 710A'),
(4, 'Kirin 980'),
(3, 'Kirin 990E'),
(6, 'Qualcomm SM8150 Snapdragon 855');

-- --------------------------------------------------------

--
-- Table structure for table `detekcija_osmeha`
--

CREATE TABLE `detekcija_osmeha` (
  `idDetekcijaOsmeha` int(1) NOT NULL,
  `nazivOsmeh` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detekcija_osmeha`
--

INSERT INTO `detekcija_osmeha` (`idDetekcijaOsmeha`, `nazivOsmeh`) VALUES
(1, 'Da'),
(4, 'Ne');

-- --------------------------------------------------------

--
-- Table structure for table `eksterna`
--

CREATE TABLE `eksterna` (
  `idEksterna` int(3) NOT NULL,
  `memorija` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eksterna`
--

INSERT INTO `eksterna` (`idEksterna`, `memorija`) VALUES
(4, 0),
(1, 128),
(2, 256),
(3, 512);

-- --------------------------------------------------------

--
-- Table structure for table `gps`
--

CREATE TABLE `gps` (
  `idGps` int(5) NOT NULL,
  `nazivGps` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gps`
--

INSERT INTO `gps` (`idGps`, `nazivGps`) VALUES
(1, 'Da'),
(2, 'Ne');

-- --------------------------------------------------------

--
-- Table structure for table `hdr`
--

CREATE TABLE `hdr` (
  `idHdr` int(1) NOT NULL,
  `nazivHdr` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hdr`
--

INSERT INTO `hdr` (`idHdr`, `nazivHdr`) VALUES
(1, 'Da'),
(3, 'Ne');

-- --------------------------------------------------------

--
-- Table structure for table `interna`
--

CREATE TABLE `interna` (
  `idInterna` int(3) NOT NULL,
  `memorija` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interna`
--

INSERT INTO `interna` (`idInterna`, `memorija`) VALUES
(1, 16),
(2, 32),
(3, 64),
(4, 128),
(5, 256),
(6, 512);

-- --------------------------------------------------------

--
-- Table structure for table `izvestaji`
--

CREATE TABLE `izvestaji` (
  `idIzvestaji` int(255) NOT NULL,
  `idKorisnik` int(255) NOT NULL,
  `aktivnost` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `datumAktivnosti` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `izvestaji`
--

INSERT INTO `izvestaji` (`idIzvestaji`, `idKorisnik`, `aktivnost`, `datumAktivnosti`) VALUES
(1, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se prijavio sa 127.0.0.1', '2021-03-19 16:10:02'),
(2, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se odjavio sa 127.0.0.1', '2021-03-19 16:10:20'),
(3, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se prijavio sa 127.0.0.1', '2021-03-19 16:22:43'),
(4, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se odjavio sa 127.0.0.1', '2021-03-19 19:45:49'),
(5, 7, 'Korisnik Mika Mikic,mika@gmail.com , se prijavio sa 127.0.0.1', '2021-03-19 19:46:03'),
(6, 7, 'Korisnik Mika Mikic,mika@gmail.com , se odjavio sa 127.0.0.1', '2021-03-19 19:46:04'),
(7, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se prijavio sa 127.0.0.1', '2021-03-19 19:46:10'),
(8, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se odjavio sa 127.0.0.1', '2021-03-19 19:46:34'),
(9, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se prijavio sa 127.0.0.1', '2021-03-20 02:33:21'),
(10, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se odjavio sa 127.0.0.1', '2021-03-20 03:20:29'),
(11, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se prijavio sa 127.0.0.1', '2021-03-20 09:45:08'),
(12, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se odjavio sa 127.0.0.1', '2021-03-20 10:51:58'),
(13, 7, 'Korisnik Mika Mikic,mika@gmail.com , se prijavio sa 127.0.0.1', '2021-03-20 10:58:06'),
(14, 7, 'Korisnik Mika Mikic,mika@gmail.com , se odjavio sa 127.0.0.1', '2021-03-20 11:03:45'),
(15, 7, 'Korisnik Mika Mikic,mika@gmail.com , se prijavio sa 127.0.0.1', '2021-03-20 11:07:12'),
(16, 7, 'Korisnik Mika Mikic,mika@gmail.com , se odjavio sa 127.0.0.1', '2021-03-20 11:16:25'),
(17, 7, 'Korisnik Mika Mikic,mika@gmail.com , se prijavio sa 127.0.0.1', '2021-03-20 13:47:16'),
(18, 7, 'Korisnik Mika Mikic,mika@gmail.com , se odjavio sa 127.0.0.1', '2021-03-20 13:51:21'),
(19, 8, 'Korisnik Tamara Vukovic,tamara@gmail.com , se prijavio sa 127.0.0.1', '2021-03-20 13:52:42'),
(20, 8, 'Korisnik Tamara Vukovic,tamara@gmail.com , se odjavio sa 127.0.0.1', '2021-03-20 14:13:40'),
(21, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se prijavio sa 127.0.0.1', '2021-03-20 14:13:49'),
(22, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se odjavio sa 127.0.0.1', '2021-03-20 14:27:46'),
(23, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se prijavio sa 127.0.0.1', '2021-03-20 14:27:52'),
(24, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se odjavio sa 127.0.0.1', '2021-03-20 15:21:46'),
(25, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se prijavio sa 127.0.0.1', '2021-03-20 15:22:32'),
(26, 1, 'Korisnik Nikola Jockovic,nikolajockovic99@gmail.com , se odjavio sa 127.0.0.1', '2021-03-20 15:23:10'),
(27, 1, 'Korisnik Nikola Jockovic,admin@gmail.com , se prijavio sa 127.0.0.1', '2021-03-20 15:25:47'),
(28, 1, 'Korisnik Nikola Jockovic,admin@gmail.com , se odjavio sa 127.0.0.1', '2021-03-20 15:25:58'),
(29, 1, 'Korisnik Nikola Jockovic,admin@gmail.com , se prijavio sa 127.0.0.1', '2021-03-20 15:26:04'),
(30, 1, 'Korisnik Nikola Jockovic,admin@gmail.com , se odjavio sa 127.0.0.1', '2021-03-20 15:27:10'),
(31, 1, 'Korisnik Nikola Jockovic,admin@gmail.com , se prijavio sa 127.0.0.1', '2021-03-20 15:27:17'),
(32, 1, 'Korisnik Nikola Jockovic,admin@gmail.com , se odjavio sa 127.0.0.1', '2021-03-20 15:27:34'),
(33, 8, 'Korisnik Tamara Vukovic,tamara@gmail.com , se prijavio sa 127.0.0.1', '2021-03-20 15:27:44'),
(34, 8, 'Korisnik Tamara Vukovic,tamara@gmail.com , se odjavio sa 127.0.0.1', '2021-03-20 15:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `kamera`
--

CREATE TABLE `kamera` (
  `idKamera` int(3) NOT NULL,
  `brojPiksela` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kamera`
--

INSERT INTO `kamera` (`idKamera`, `brojPiksela`) VALUES
(1, 8),
(2, 12),
(3, 16),
(4, 18),
(5, 20),
(6, 32),
(7, 50),
(8, 55),
(9, 60),
(10, 80),
(11, 90),
(12, 100),
(14, 48),
(15, 25);

-- --------------------------------------------------------

--
-- Table structure for table `kontakt`
--

CREATE TABLE `kontakt` (
  `idKontakt` int(255) NOT NULL,
  `ime` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `poruka` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `datumKontakt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kontakt`
--

INSERT INTO `kontakt` (`idKontakt`, `ime`, `prezime`, `email`, `poruka`, `datumKontakt`) VALUES
(1, 'Stefan', 'Stefanovic', 'stefan@gmail.com', 'Da li primate bubreg za ajfon 12?', '2021-03-20 02:59:26'),
(2, 'Milovan', 'Milovanovic', 'milovaneee@gmail.com', 'PRobaaaaaaaaaaaaaaaaaa', '2021-03-20 02:59:26'),
(6, 'Korisnik', 'Korisnik', 'korisnik@gmail.com', 'BravoBravoBravoBravoBravoBravo', '2021-03-20 03:01:38'),
(7, 'Korisnik', 'Korisnik', 'korisnik@gmail.com', 'BravoBravoBravoBravoBravoBravo', '2021-03-20 03:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(255) NOT NULL,
  `ime` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `brojTelefona` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idMesta` int(255) NOT NULL,
  `idUloga` int(3) NOT NULL,
  `status` smallint(6) NOT NULL,
  `aktivacioniKod` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datumKreiranja` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `ime`, `prezime`, `email`, `lozinka`, `brojTelefona`, `idMesta`, `idUloga`, `status`, `aktivacioniKod`, `datumKreiranja`) VALUES
(1, 'Nikola', 'Jockovic', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '066321871', 11420, 1, 1, 'ccc88f6b366f26c68b151c07dcc83586ff2cd8fc', '2021-03-20 14:25:40'),
(7, 'Mika', 'Mikic', 'mika@gmail.com', 'e471a891c22fb1b5b722f57bed71de32', '066321231', 11000, 2, 1, 'c70167bffcb89ccd0833364387e78a4b49452559', '2021-03-19 13:58:20'),
(8, 'Tamara', 'Vukovic', 'tamara@gmail.com', 'b4bd15e18040aeed3fea89609b0b1944', '063218723', 11000, 2, 1, '8da9f84abde6fd1f47940eb0a9e6f7489f0e1512', '2021-03-20 12:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `idKorpa` int(255) NOT NULL,
  `idKorisnik` int(255) NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`idKorpa`, `idKorisnik`, `datum`) VALUES
(1, 1, '2021-03-19 00:16:36'),
(2, 7, '2021-03-19 00:22:02'),
(3, 7, '2021-03-19 04:43:32'),
(4, 1, '2021-03-19 04:46:53'),
(5, 7, '2021-03-19 14:56:49'),
(6, 7, '2021-03-19 14:58:29'),
(7, 8, '2021-03-20 14:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `marka`
--

CREATE TABLE `marka` (
  `idMarka` int(10) NOT NULL,
  `nazivMarka` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marka`
--

INSERT INTO `marka` (`idMarka`, `nazivMarka`) VALUES
(1, 'Apple'),
(4, 'Huawei'),
(5, 'Samsung'),
(6, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `memorija`
--

CREATE TABLE `memorija` (
  `idMemorija` int(2) NOT NULL,
  `memorija` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `memorija`
--

INSERT INTO `memorija` (`idMemorija`, `memorija`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 6),
(6, 8),
(7, 12),
(8, 16),
(9, 32),
(10, 64),
(11, 128),
(12, 256),
(13, 512);

-- --------------------------------------------------------

--
-- Table structure for table `mesto`
--

CREATE TABLE `mesto` (
  `idMesta` int(255) NOT NULL,
  `nazivMesta` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesto`
--

INSERT INTO `mesto` (`idMesta`, `nazivMesta`) VALUES
(11000, 'Beograd'),
(11010, 'Beograd Voždovac'),
(11030, 'Beograd Čukarica'),
(11040, 'Beograd'),
(11050, 'Beograd Zvezdara'),
(11060, 'Beograd Palilula'),
(11070, 'Novi Beograd'),
(11075, 'Beograd'),
(11077, 'Beograd'),
(11080, 'Beograd Zemun'),
(11090, 'Beograd Rakovica'),
(11101, 'Beograd'),
(11102, 'Beograd'),
(11103, 'Beograd'),
(11104, 'Beograd'),
(11105, 'Beograd'),
(11106, 'Beograd'),
(11107, 'Beograd'),
(11108, 'Beograd'),
(11109, 'Beograd'),
(11110, 'Beograd'),
(11111, 'Beograd'),
(11112, 'Beograd'),
(11113, 'Beograd'),
(11114, 'Beograd'),
(11115, 'Beograd'),
(11116, 'Beograd'),
(11117, 'Beograd'),
(11118, 'Beograd'),
(11119, 'Beograd'),
(11120, 'Beograd'),
(11121, 'Beograd'),
(11122, 'Beograd'),
(11123, 'Beograd'),
(11124, 'Beograd'),
(11125, 'Beograd'),
(11126, 'Beograd'),
(11127, 'Beograd'),
(11128, 'Beograd'),
(11129, 'Beograd'),
(11130, 'Kaluđerica'),
(11131, 'Beograd'),
(11133, 'Beograd'),
(11134, 'Beograd'),
(11135, 'Beograd'),
(11136, 'Beograd'),
(11137, 'Beograd'),
(11138, 'Beograd'),
(11139, 'Beograd'),
(11141, 'Beograd'),
(11142, 'Beograd'),
(11143, 'Beograd'),
(11144, 'Beograd'),
(11145, 'Beograd'),
(11146, 'Beograd'),
(11147, 'Beograd'),
(11148, 'Beograd'),
(11149, 'Beograd'),
(11150, 'Beograd'),
(11151, 'Beograd'),
(11152, 'Beograd'),
(11153, 'Beograd'),
(11154, 'Beograd'),
(11155, 'Beograd'),
(11156, 'Beograd'),
(11157, 'Beograd'),
(11158, 'Beograd'),
(11159, 'Beograd'),
(11160, 'Beograd'),
(11161, 'Beograd'),
(11162, 'Beograd'),
(11163, 'Beograd'),
(11164, 'Beograd'),
(11165, 'Beograd'),
(11166, 'Beograd'),
(11169, 'Beograd'),
(11170, 'Beograd'),
(11171, 'Beograd'),
(11172, 'Beograd'),
(11173, 'Beograd'),
(11174, 'Beograd'),
(11175, 'Beograd'),
(11176, 'Beograd'),
(11177, 'Beograd'),
(11178, 'Beograd'),
(11179, 'Beograd'),
(11180, 'Beograd'),
(11181, 'Beograd'),
(11182, 'Beograd'),
(11183, 'Beograd'),
(11184, 'Beograd'),
(11185, 'Beograd'),
(11186, 'Beograd'),
(11187, 'Beograd'),
(11188, 'Beograd'),
(11189, 'Beograd'),
(11190, 'Beograd'),
(11191, 'Beograd'),
(11192, 'Beograd'),
(11193, 'Beograd'),
(11194, 'Rusanj'),
(11195, 'Beograd'),
(11196, 'Beograd'),
(11210, 'Beograd'),
(11211, 'Borča'),
(11212, 'Ovča'),
(11213, 'Padinska Skela'),
(11215, 'Slanci'),
(11221, 'Beograd'),
(11222, 'Beograd'),
(11223, 'Beli Potok'),
(11224, 'Vrčin'),
(11225, 'Zuce'),
(11226, 'Pinosava'),
(11231, 'Beograd'),
(11232, 'Ripanj'),
(11233, 'Ralja'),
(11234, 'Ripanj'),
(11235, 'Mali Požarevac'),
(11250, 'Beograd'),
(11251, 'Ostružnica'),
(11252, 'Beograd'),
(11253, 'Sremčica'),
(11260, 'Umka'),
(11261, 'Mala Moštanica'),
(11262, 'Velika Moštanica'),
(11270, 'Jakovo'),
(11271, 'Surčin'),
(11272, 'Dobanovci'),
(11273, 'Beograd'),
(11274, 'Beograd'),
(11275, 'Boljevci'),
(11276, 'Jakovo'),
(11277, 'Ugrinovci'),
(11278, 'Beograd'),
(11279, 'Becmen'),
(11280, 'Progar'),
(11281, 'Beograd'),
(11282, 'Petrovčic'),
(11300, 'Smederevo'),
(11303, 'Smederevo'),
(11304, 'Smederevo'),
(11305, 'Smederevo'),
(11306, 'Grocka'),
(11307, 'Boleč'),
(11308, 'Begaljica'),
(11309, 'Leštane'),
(11310, 'Lipe'),
(11311, 'Radinac'),
(11312, 'Mihajlovac'),
(11313, 'Mala Krsna'),
(11314, 'Osipaonica'),
(11315, 'Saraorci'),
(11316, 'Golobok'),
(11317, 'Lozovik'),
(11318, 'Miloševac'),
(11319, 'Krnjevo'),
(11320, 'Velika Plana'),
(11321, 'Lugavcina'),
(11322, 'Skobalj'),
(11323, 'Veliko Orašje'),
(11324, 'Staro Selo'),
(11325, 'Markovac'),
(11326, 'Donja Livadica'),
(11327, 'Rakinac'),
(11328, 'Vodanj'),
(11329, 'Vranovo'),
(11330, 'Smederevo'),
(11351, 'Vinča'),
(11400, 'Mladenovac'),
(11406, 'Vlaška'),
(11407, 'Selevac'),
(11408, 'Velika Krsna'),
(11409, 'Kovačevac'),
(11411, 'Ratari'),
(11412, 'Jagnjilo'),
(11413, 'Pruzatovac'),
(11414, 'Velika Ivanča'),
(11415, 'Koračica'),
(11420, 'Smederevska Palanka'),
(11421, 'Smederevska Palanka'),
(11423, 'Azanja'),
(11424, 'Banicina'),
(11425, 'Kusadak'),
(11426, 'Meljak'),
(11427, 'Vranić'),
(11430, 'Umcari'),
(11431, 'Kolari'),
(11432, 'Drugovac'),
(11433, 'Sepsin'),
(11450, 'Sopot'),
(11453, 'Rogaca'),
(11454, 'Sibnica'),
(11460, 'Barajevo'),
(11461, 'Beljina'),
(11462, 'Veliki Borak'),
(11500, 'Obrenovac'),
(11503, 'Obrenovac'),
(11504, 'Barič'),
(11505, 'Zabrežje'),
(11506, 'Drazevac'),
(11507, 'Stubline'),
(11508, 'Grabovac'),
(11509, 'Skela'),
(11550, 'Lazarevac'),
(11560, 'Vreoci'),
(11561, 'Dudovica'),
(11562, 'Junkovac'),
(11563, 'Veliki Crljeni'),
(11564, 'Stepojevac'),
(11565, 'Baroševac'),
(11566, 'Rudovci'),
(11567, 'Mirosaljci'),
(12000, 'Požarevac'),
(12102, 'Požarevac'),
(12103, 'Požarevac'),
(12104, 'Požarevac'),
(12105, 'Požarevac'),
(12106, 'Požarevac'),
(12107, 'Požarevac'),
(12205, 'Brezane'),
(12206, 'Bradarac'),
(12207, 'Dubravica'),
(12208, 'Kostolac'),
(12209, 'Klicevac'),
(12220, 'Veliko Gradište'),
(12221, 'Majilovac'),
(12222, 'Braničevo'),
(12223, 'Golubac'),
(12224, 'Dobra'),
(12225, 'Bratinac'),
(12226, 'Topolovnik'),
(12227, 'Bare'),
(12228, 'Veliko Gradište'),
(12229, 'Vinci'),
(12230, 'Brnjica'),
(12240, 'Kučevo'),
(12241, 'Kučevo'),
(12242, 'Neresnica'),
(12253, 'Srednjevo'),
(12254, 'Rabrovo'),
(12255, 'Duboka'),
(12256, 'Voluja'),
(12257, 'Turija'),
(12258, 'Klenje'),
(12300, 'Petrovac Na Mlavi'),
(12304, 'Ranovac'),
(12305, 'Melnica'),
(12306, 'Veliko Laole'),
(12307, 'Burovac'),
(12308, 'Oreškovica'),
(12309, 'Setonje'),
(12311, 'Malo Crniće'),
(12312, 'Smoljinac'),
(12313, 'Bozevac'),
(12314, 'Veliko Selo'),
(12315, 'Rasanac'),
(12316, 'Krepoljin'),
(12317, 'Osaonica'),
(12318, 'Vukovac'),
(12320, 'Žagubica'),
(12321, 'Laznica'),
(12322, 'Suvi Do'),
(12370, 'Aleksandrovac'),
(12371, 'Vlaški Do'),
(12372, 'Poljana'),
(12373, 'Simićevo'),
(12374, 'Žabari'),
(12375, 'Porodin'),
(14000, 'Valjevo'),
(14103, 'Valjevo'),
(14104, 'Valjevo'),
(14105, 'Valjevo'),
(14106, 'Valjevo'),
(14107, 'Valjevo'),
(14111, 'Valjevo'),
(14201, 'Brankovina'),
(14202, 'Rajković'),
(14203, 'Dračić'),
(14204, 'Divčibare'),
(14205, 'Lelić'),
(14206, 'Pocuta'),
(14207, 'Pećka'),
(14210, 'Ub'),
(14211, 'Radljevo'),
(14212, 'Brgule'),
(14213, 'Pambukovica'),
(14214, 'Banjani'),
(14221, 'Popucke'),
(14222, 'Divci'),
(14223, 'Slovac'),
(14224, 'Lajkovac'),
(14225, 'Bogovadja'),
(14226, 'Jabučje'),
(14240, 'Ljig'),
(14242, 'Mionica'),
(14243, 'Gornja Toplica'),
(14244, 'Brezde'),
(14245, 'Slavkovica'),
(14246, 'Belanovica'),
(14251, 'Pricevic'),
(14252, 'Kamenica'),
(14253, 'Osečina'),
(14254, 'Komirić'),
(14255, 'Stave'),
(15000, 'Šabac'),
(15103, 'Šabac'),
(15104, 'Šabac'),
(15211, 'Mačvanski Pričinović'),
(15212, 'Drenovac'),
(15213, 'Orid'),
(15214, 'Debrc'),
(15215, 'Provo'),
(15220, 'Koceljeva'),
(15221, 'Svileuva'),
(15222, 'Kamenica'),
(15224, 'Cerovac'),
(15225, 'Vladimirci'),
(15226, 'Draginje'),
(15227, 'Donje Crniljevo'),
(15232, 'Varna'),
(15233, 'Metlić'),
(15234, 'Tekeriš'),
(15235, 'Dobrić'),
(15300, 'Loznica'),
(15301, 'Loznica'),
(15302, 'Korenita'),
(15303, 'Tršić'),
(15304, 'Petlovača'),
(15305, 'Lipolist'),
(15306, 'Prnjavor Mačvanski'),
(15307, 'Lesnica'),
(15308, 'Jadranska Lesnica'),
(15309, 'Brezjak'),
(15310, 'Ribari'),
(15311, 'Draginac'),
(15312, 'Zavlaka'),
(15313, 'Bela Crkva'),
(15314, 'Krupanj'),
(15315, 'Zajaca'),
(15316, 'Banja Koviljaca'),
(15317, 'Donja Borina'),
(15318, 'Mali Zvornik'),
(15319, 'Uzovnica'),
(15320, 'Ljubovija'),
(15321, 'Radalj'),
(15322, 'Velika Reka'),
(15323, 'Donja Orovica'),
(15324, 'Drlace'),
(15350, 'Bogatić'),
(15352, 'Zminjak'),
(15353, 'Majur'),
(15354, 'Stitar'),
(15355, 'Crna Bara'),
(15356, 'Glušci'),
(15357, 'Klenje'),
(15358, 'Badovinći'),
(15359, 'Dublje'),
(15362, 'Banovo Polje'),
(16000, 'Leskovac'),
(16104, 'Leskovac'),
(16105, 'Leskovac'),
(16106, 'Leskovac'),
(16107, 'Leskovac'),
(16201, 'Manojlovce'),
(16203, 'Vučje'),
(16204, 'Mirosevce'),
(16205, 'Bojnik'),
(16206, 'Kosančić'),
(16210, 'Vlasotince'),
(16212, 'Svođe'),
(16213, 'Sastav Reka'),
(16215, 'Crna Trava'),
(16220, 'Grdelica'),
(16221, 'Velika Grabovnica'),
(16222, 'Predejane'),
(16223, 'Ruplje'),
(16230, 'Lebane'),
(16231, 'Turekovac'),
(16232, 'Bosnjace'),
(16233, 'Orane'),
(16240, 'Medveđa'),
(16244, 'Gornji Brestovac'),
(16246, 'Sijarinska Banja'),
(16247, 'Tulare'),
(16248, 'Lece'),
(16251, 'Pečanjevce'),
(16252, 'Razgojna'),
(16253, 'Brestovac'),
(17501, 'Vranje'),
(17503, 'Vranje'),
(17504, 'Vranje'),
(17505, 'Vranje'),
(17507, 'Vlase'),
(17508, 'Sveti Ilija'),
(17510, 'Vladičin Han'),
(17511, 'Priboj Vranjski'),
(17512, 'Stubal'),
(17513, 'Lepenica'),
(17514, 'Džep'),
(17520, 'Bujanovac'),
(17521, 'Ristovac'),
(17522, 'Biljaca'),
(17523, 'Preševo'),
(17524, 'Klenike'),
(17525, 'Trgovište'),
(17526, 'Donji Stajevac'),
(17527, 'Preševo'),
(17528, 'Veliki Trnovac'),
(17529, 'Muhovac'),
(17530, 'Surdulica'),
(17531, 'Jelasnica'),
(17532, 'Vlasina Okruglica'),
(17533, 'Vlasina Rid'),
(17534, 'Vlasina Stojkovicevo'),
(17535, 'Klisura'),
(17537, 'Bozica'),
(17538, 'Gornja Lisina'),
(17540, 'Bosilegrad'),
(17542, 'Vranjska Banja'),
(17543, 'Kriva Feja'),
(17544, 'Donja Ljubata'),
(17545, 'Korbevac'),
(17546, 'Bistar'),
(17547, 'Donje Tlamino'),
(17555, 'Presevo'),
(17556, 'Reljan'),
(17557, 'Oraovica'),
(17567, 'Bujanovac'),
(18101, 'Niš'),
(18103, 'Niš'),
(18104, 'Niš'),
(18105, 'Niš'),
(18106, 'Niš'),
(18107, 'Niš'),
(18108, 'Niš'),
(18109, 'Niš'),
(18110, 'Niš'),
(18111, 'Niš'),
(18112, 'Niš'),
(18114, 'Niš'),
(18201, 'Lalinac'),
(18202, 'Gornja Toponica'),
(18204, 'Gornji Matejevac'),
(18205, 'Niška Banja'),
(18206, 'Jelasnica'),
(18207, 'Malca'),
(18208, 'Guševac'),
(18209, 'Medosevac'),
(18210, 'Žitkovac'),
(18211, 'Trupale'),
(18212, 'Tesica'),
(18213, 'Gredetin'),
(18214, 'Kulina'),
(18215, 'Veliko Bonjince'),
(18216, 'Korman'),
(18217, 'Ljuberadja'),
(18219, 'Grejac'),
(18220, 'Aleksinac'),
(18223, 'Draževac'),
(18224, 'Rutevac'),
(18225, 'Katun'),
(18226, 'Aleksinački Rudnik'),
(18227, 'Subotinac'),
(18228, 'Luzane'),
(18229, 'Mozgovo'),
(18230, 'Soko Banja'),
(18232, 'Citluk'),
(18234, 'Josanica'),
(18235, 'Sarbanovac'),
(18236, 'Vrmdza'),
(18237, 'Dugo Polje'),
(18240, 'Gadzin Han'),
(18241, 'Gornji Barbes'),
(18242, 'Donji Dusnik'),
(18244, 'Zaplanjska Toponica'),
(18245, 'Licki Hanovi'),
(18246, 'Ravna Dubrava'),
(18250, 'Novo Selo'),
(18251, 'Mramor'),
(18252, 'Merosina'),
(18253, 'Jugbogdanovac'),
(18254, 'Donje Medurovo'),
(18255, 'Pukovac'),
(18256, 'Lalinac'),
(18257, 'Balajinac'),
(18258, 'Jovanovac'),
(18260, 'Popovac'),
(18300, 'Pirot'),
(18303, 'Pirot'),
(18304, 'Crnokliste'),
(18306, 'Visoka Rzana'),
(18307, 'Krupac'),
(18308, 'Pirot'),
(18310, 'Bela Palanka'),
(18311, 'Sicevo'),
(18312, 'Ostrovica'),
(18313, 'Crvena Reka'),
(18314, 'Dolac'),
(18315, 'Babin Kal'),
(18320, 'Dimitrovgrad'),
(18321, 'Gradina'),
(18322, 'Sukovo'),
(18323, 'Smilovci'),
(18324, 'Kamenica'),
(18326, 'Poganovo'),
(18330, 'Babusnica'),
(18332, 'Strelac'),
(18333, 'Zvonce'),
(18355, 'Temska'),
(18360, 'Svrljig'),
(18363, 'Palilula'),
(18365, 'Prekonoga'),
(18366, 'Nisevac'),
(18368, 'Burdimo'),
(18400, 'Prokuplje'),
(18401, 'Prokuplje'),
(18402, 'Prokuplje'),
(18403, 'Velika Plana'),
(18404, 'Donja Recica'),
(18405, 'Dzigolj'),
(18406, 'Dubovo'),
(18407, 'Zitni Potok'),
(18408, 'Dobri Do'),
(18409, 'Krusevica'),
(18410, 'Doljevac'),
(18411, 'Belotinac'),
(18412, 'Zitoradja'),
(18413, 'Pejkovac'),
(18414, 'Donje Crnatovo'),
(18415, 'Malosiste'),
(18417, 'Cecina'),
(18420, 'Blace'),
(18421, 'Donja Trnava'),
(18423, 'Mala Plana'),
(18424, 'Beloljin'),
(18425, 'Gornja Dragusa'),
(18426, 'Barbatovac'),
(18430, 'Kursumlija'),
(18431, 'Kursumlija'),
(18432, 'Barlovo'),
(18433, 'Prolom'),
(18435, 'Kursumlijska Banja'),
(18436, 'Mercez'),
(18437, 'Lukovo'),
(18438, 'Zuc'),
(18440, 'Raca'),
(18445, 'Merdare'),
(19000, 'Zajecar'),
(19103, 'Zajecar'),
(19204, 'Metovnica'),
(19205, 'Gradskovo'),
(19206, 'Veliki Izvor'),
(19207, 'Planinica'),
(19208, 'Lubnica'),
(19209, 'Mali Jasenovac'),
(19210, 'Bor'),
(19211, 'Bor'),
(19212, 'Bor'),
(19213, 'Donja Bela Reka'),
(19214, 'Rgotina'),
(19215, 'Zlot'),
(19216, 'Brestovacka Banja'),
(19218, 'Bor'),
(19219, 'Krivelj'),
(19220, 'Donji Milanovac'),
(19222, 'Klokocevac'),
(19223, 'Koprivnica'),
(19224, 'Salas'),
(19225, 'Sikole'),
(19227, 'Zvezdan'),
(19228, 'Gamzigradska Banja'),
(19229, 'Borski Brestovac'),
(19231, 'Borsko Bucje'),
(19234, 'Luka'),
(19235, 'Velika Jasikova'),
(19236, 'Halovo'),
(19250, 'Majdanpek'),
(19257, 'Rudna Glava'),
(19258, 'Vlaole'),
(19300, 'Negotin'),
(19303, 'Stubik'),
(19304, 'Jabukovac'),
(19305, 'Urovica'),
(19306, 'Trnjane'),
(19311, 'Nikolicevo'),
(19312, 'Vrazogrnac'),
(19313, 'Brusnik'),
(19314, 'Rajac'),
(19315, 'Bracevac'),
(19316, 'Kobisnica'),
(19317, 'Mokranja'),
(19318, 'Rogljevo'),
(19320, 'Kladovo'),
(19321, 'Podvrska'),
(19322, 'Mihajlovac'),
(19323, 'Brza Palanka'),
(19324, 'Slatina'),
(19325, 'Tekija'),
(19326, 'Sip'),
(19328, 'Velesnica'),
(19329, 'Korbovo'),
(19330, 'Prahovo'),
(19334, 'Radujevac'),
(19335, 'Dusanovac'),
(19340, 'Minicevo'),
(19341, 'Grljan'),
(19342, 'Grliste'),
(19343, 'Lenovac'),
(19344, 'Vratarnica'),
(19345, 'Donje Zunice'),
(19347, 'Mali Izvor'),
(19350, 'Knjazevac'),
(19352, 'Donja Kamenica'),
(19353, 'Kalna'),
(19362, 'Podvis'),
(19366, 'Beli Potok'),
(19367, 'Vasilj'),
(19368, 'Vina'),
(19369, 'Bucje'),
(19370, 'Boljevac'),
(19371, 'Lukovo'),
(19372, 'Bogovina'),
(19373, 'Sarbanovac'),
(19375, 'Krivi Vir'),
(19376, 'Sumrakovac'),
(19377, 'Savinac'),
(19378, 'Osnic'),
(19379, 'Sarbanovac Timok'),
(21000, 'Novi Sad'),
(21101, 'Novi Sad'),
(21102, 'Novi Sad'),
(21103, 'Novi Sad'),
(21104, 'Novi Sad'),
(21105, 'Novi Sad'),
(21106, 'Novi Sad'),
(21107, 'Novi Sad'),
(21108, 'Novi Sad'),
(21109, 'Novi Sad'),
(21110, 'Novi Sad'),
(21111, 'Novi Sad'),
(21112, 'Novi Sad'),
(21113, 'Novi Sad'),
(21114, 'Novi Sad'),
(21115, 'Novi Sad'),
(21116, 'Novi Sad'),
(21117, 'Novi Sad'),
(21118, 'Novi Sad'),
(21119, 'Novi Sad'),
(21120, 'Novi Sad'),
(21121, 'Novi Sad'),
(21122, 'Novi Sad'),
(21123, 'Novi Sad'),
(21124, 'Novi Sad'),
(21125, 'Novi Sad'),
(21126, 'Novi Sad'),
(21131, 'Petrovaradin'),
(21132, 'Petrovaradin'),
(21133, 'Petrovaradin'),
(21201, 'Rumenka'),
(21202, 'Sremska Kamenica'),
(21203, 'Veternik'),
(21204, 'Sremska Kamenica'),
(21205, 'Sremski Karlovci'),
(21206, 'Stari Ledinci'),
(21207, 'Ledinci'),
(21208, 'Sremska Kamenica'),
(21209, 'Bukovac'),
(21211, 'Kisac'),
(21212, 'Stepanovicevo'),
(21213, 'Zmajevo'),
(21214, 'Sirig'),
(21215, 'Turija'),
(21216, 'Nadalj'),
(21217, 'Backo Gradiste'),
(21220, 'Becej'),
(21221, 'Becej'),
(21225, 'Radicevic'),
(21226, 'Backo Petrovo Selo'),
(21227, 'Milesevo'),
(21230, 'Zabalj'),
(21233, 'Cenej'),
(21234, 'Backi Jarak'),
(21235, 'Temerin'),
(21236, 'Temerin'),
(21237, 'Gospodinci'),
(21238, 'Curug'),
(21239, 'Djurdjevo'),
(21240, 'Titel'),
(21241, 'Kac'),
(21242, 'Budisava'),
(21243, 'Kovilj'),
(21244, 'Sajkas'),
(21245, 'Mosorin'),
(21246, 'Vilovo'),
(21247, 'Gardinovci'),
(21248, 'Lok'),
(21299, 'Rakovac'),
(21300, 'Beocin'),
(21311, 'Cerevic'),
(21312, 'Banostor'),
(21313, 'Susek'),
(21314, 'Nestin'),
(21315, 'Lug'),
(21400, 'Backa Palanka'),
(21401, 'Backa Palanka'),
(21402, 'Backa Palanka'),
(21410, 'Futog'),
(21411, 'Begec'),
(21412, 'Glozan'),
(21413, 'Celarevo'),
(21420, 'Bac'),
(21421, 'Karadjordjevo'),
(21422, 'Mladenovo'),
(21423, 'Obrovac'),
(21424, 'Tovarisevo'),
(21425, 'Selenca'),
(21426, 'Vajska'),
(21427, 'Bodjani'),
(21428, 'Plavna'),
(21429, 'Backo Novo Selo'),
(21431, 'Nova Gajdobra'),
(21432, 'Gajdobra'),
(21433, 'Silbas'),
(21434, 'Parage'),
(21460, 'Vrbas'),
(21463, 'Vrbas'),
(21464, 'Vrbas'),
(21465, 'Backo Dobro Polje'),
(21466, 'Kucura'),
(21467, 'Savino Selo'),
(21468, 'Despotovo'),
(21469, 'Pivnice'),
(21470, 'Backi Petrovac'),
(21471, 'Ravno Selo'),
(21472, 'Kulpin'),
(21473, 'Maglic'),
(21480, 'Srbobran'),
(22000, 'Sremska Mitrovica'),
(22101, 'Sremska Mitrovica'),
(22103, 'Sremska Mitrovica'),
(22111, 'Sremska Mitrovica'),
(22112, 'Sremska Mitrovica'),
(22201, 'Zasavica'),
(22202, 'Macvanska Mitrovica'),
(22203, 'Nocaj'),
(22204, 'Salas Nocajski'),
(22205, 'Ravnje'),
(22206, 'Radenkovic'),
(22207, 'Lezimir'),
(22208, 'Mandjelos'),
(22211, 'Veliki Radinci'),
(22212, 'Besenovo'),
(22213, 'Grgurevci'),
(22217, 'Bosut'),
(22221, 'Lacarak'),
(22222, 'Martinci'),
(22223, 'Kuzmin'),
(22224, 'Kukujevci'),
(22225, 'Bacinci'),
(22230, 'Erdevik'),
(22231, 'Calma'),
(22232, 'Divos'),
(22239, 'Sid'),
(22240, 'Sid'),
(22241, 'Vasica'),
(22242, 'Berkasovo'),
(22243, 'Sot'),
(22244, 'Adasevci'),
(22245, 'Morovic'),
(22246, 'Visnjicevo'),
(22247, 'Sremska Raca'),
(22248, 'Jamena'),
(22250, 'Ilinci'),
(22251, 'Batrovci'),
(22253, 'Bingula'),
(22254, 'Bikic Do'),
(22255, 'Ljuba'),
(22256, 'Molovin'),
(22257, 'Privina Glava'),
(22258, 'Gibarac'),
(22300, 'Stara Pazova'),
(22303, 'Banovci Dunav'),
(22304, 'Novi Banovci'),
(22305, 'Stari Banovci'),
(22306, 'Belegis'),
(22307, 'Surduk'),
(22308, 'Golubinci'),
(22310, 'Simanovci'),
(22313, 'Vojka'),
(22314, 'Krnjesevci'),
(22319, 'Indjija'),
(22320, 'Indjija'),
(22321, 'Ljukovo'),
(22322, 'Novi Karlovci'),
(22323, 'Novi Slankamen'),
(22324, 'Beska'),
(22325, 'Krcedin'),
(22326, 'Cortanovci'),
(22327, 'Maradik'),
(22328, 'Krusedol'),
(22329, 'Stari Slankamen'),
(22330, 'Nova Pazova'),
(22400, 'Ruma'),
(22401, 'Ruma'),
(22402, 'Ruma'),
(22404, 'Putinci'),
(22405, 'Stejanovci'),
(22406, 'Irig'),
(22408, 'Vrdnik'),
(22409, 'Jazak'),
(22410, 'Pecinci'),
(22411, 'Kraljevci'),
(22412, 'Dobrinci'),
(22413, 'Sremski Mihaljevci'),
(22414, 'Subotiste'),
(22415, 'Brestac'),
(22416, 'Ogar'),
(22417, 'Obrez'),
(22418, 'Asanja'),
(22419, 'Kupinovo'),
(22420, 'Platicevo'),
(22421, 'Budjanovci'),
(22422, 'Nikinci'),
(22423, 'Grabovci'),
(22424, 'Klenak'),
(22425, 'Sasinci'),
(22426, 'Jarak'),
(22427, 'Hrtkovci'),
(22428, 'Popinci'),
(22429, 'Voganj'),
(22431, 'Vitojevci'),
(22440, 'Sibac'),
(22441, 'Dec'),
(22442, 'Prhovo'),
(22443, 'Karlovcic'),
(23000, 'Zrenjanin'),
(23101, 'Zrenjanin'),
(23102, 'Zrenjanin'),
(23103, 'Zrenjanin'),
(23104, 'Zrenjanin'),
(23105, 'Zrenjanin'),
(23106, 'Zrenjanin'),
(23107, 'Zrenjanin'),
(23108, 'Zrenjanin'),
(23109, 'Zrenjanin'),
(23110, 'Zrenjanin'),
(23111, 'Zrenjanin'),
(23112, 'Zrenjanin'),
(23113, 'Zrenjanin'),
(23114, 'Zrenjanin'),
(23115, 'Zrenjanin'),
(23202, 'Mihajlovo'),
(23203, 'Ecka'),
(23204, 'Stajicevo'),
(23205, 'Belo Blato'),
(23206, 'Muzlja'),
(23207, 'Aradac'),
(23208, 'Elemir'),
(23209, 'Taras'),
(23210, 'Zitiste'),
(23211, 'Klek'),
(23212, 'Ravni Topolovac'),
(23213, 'Banatski Dvor'),
(23214, 'Torda'),
(23215, 'Cestereg'),
(23216, 'Banatsko Karadjordjevo'),
(23217, 'Aleksandrovo'),
(23218, 'Nova Crnja'),
(23219, 'Vojvoda Stepa'),
(23220, 'Srpska Crnja'),
(23221, 'Radojevo'),
(23222, 'Toba'),
(23224, 'Lukino Selo'),
(23230, 'Jasa Tomic'),
(23231, 'Krajisnik'),
(23232, 'Begejci'),
(23233, 'Srpski Itebej'),
(23234, 'Medja'),
(23235, 'Hetin'),
(23236, 'Novi Itebej'),
(23237, 'Banatsko Visnjicevo'),
(23240, 'Secanj'),
(23241, 'Lazarevo'),
(23242, 'Banatski Despotovac'),
(23243, 'Botos'),
(23244, 'Sutjeska'),
(23245, 'Neuzina'),
(23250, 'Jarkovac'),
(23251, 'Banatska Dubica'),
(23252, 'Boka'),
(23253, 'Konak'),
(23254, 'Surjan'),
(23255, 'Zlatica'),
(23260, 'Perlez'),
(23261, 'Lukicevo'),
(23262, 'Tomasevac'),
(23263, 'Orlovat'),
(23264, 'Farkazdin'),
(23265, 'Knicanin'),
(23266, 'Centa'),
(23270, 'Melenci'),
(23271, 'Kumane'),
(23272, 'Novi Becej'),
(23273, 'Novo Milosevo'),
(23274, 'Bocar'),
(23300, 'Kikinda'),
(23301, 'Kikinda'),
(23302, 'Kikinda'),
(23303, 'Kikinda'),
(23304, 'Kikinda'),
(23305, 'Mokrin'),
(23306, 'Kikinda'),
(23307, 'Kikinda'),
(23308, 'Kikinda'),
(23309, 'Kikinda'),
(23310, 'Kikinda'),
(23311, 'Nakovo'),
(23312, 'Banatsko Veliko Selo'),
(23313, 'Novi Kozarci'),
(23314, 'Rusko Selo'),
(23315, 'Banatska Topola'),
(23316, 'Basaid'),
(23317, 'Kikinda'),
(23320, 'Coka'),
(23323, 'Idjos'),
(23324, 'Sajan'),
(23325, 'Padej'),
(23326, 'Ostojicevo'),
(23327, 'Jazovo'),
(23328, 'Crna Bara'),
(23329, 'Vrbica'),
(23330, 'Novi Knezevac'),
(23331, 'Sanad'),
(23332, 'Banatsko Arandjelovo'),
(23333, 'Majdan'),
(23334, 'Srpski Krstur'),
(23335, 'Djala'),
(23336, 'Novi Knezevac'),
(24000, 'Subotica'),
(24101, 'Subotica'),
(24103, 'Subotica'),
(24104, 'Kelebija'),
(24105, 'Subotica'),
(24106, 'Subotica'),
(24107, 'Subotica'),
(24108, 'Subotica'),
(24109, 'Subotica'),
(24110, 'Subotica'),
(24111, 'Subotica'),
(24112, 'Subotica'),
(24113, 'Subotica'),
(24114, 'Subotica'),
(24115, 'Subotica'),
(24116, 'Subotica'),
(24117, 'Subotica'),
(24118, 'Subotica'),
(24205, 'Kelebija Granicni Prelaz'),
(24206, 'Bikovo'),
(24207, 'Orom'),
(24210, 'Bajmok'),
(24211, 'Misicevo'),
(24213, 'Djurdjin'),
(24214, 'Tavankut'),
(24215, 'Ljutovo'),
(24217, 'Mala Bosna'),
(24220, 'Cantavir'),
(24222, 'Visnjevac'),
(24223, 'Novi Zednik'),
(24224, 'Stari Zednik'),
(24300, 'Backa Topola'),
(24302, 'Backa Topola'),
(24308, 'Karadjordjevo'),
(24309, 'Mali Beograd'),
(24311, 'Njegosevo'),
(24312, 'Gunaros'),
(24313, 'Pobeda'),
(24321, 'Mali Idjos'),
(24322, 'Lovcenac'),
(24323, 'Feketic'),
(24330, 'Panonija'),
(24331, 'Bajsa'),
(24340, 'Stara Moravica'),
(24341, 'Krivaja'),
(24342, 'Pacir'),
(24343, 'Backi Sokolac'),
(24344, 'Oreskovic'),
(24351, 'Novo Orahovo'),
(24352, 'Tornjos'),
(24400, 'Senta'),
(24401, 'Senta'),
(24406, 'Gornji Breg'),
(24407, 'Kevi'),
(24408, 'Bogaras'),
(24410, 'Horgos'),
(24411, 'Horgos Granicni Prelaz'),
(24413, 'Palic'),
(24414, 'Hajdukovo'),
(24415, 'Backi Vinogradi'),
(24416, 'Male Pijace'),
(24417, 'Martonos'),
(24418, 'Supljak'),
(24420, 'Kanjiza'),
(24425, 'Adorjan'),
(24426, 'Tresnjevac'),
(24427, 'Totovo Selo'),
(24430, 'Ada'),
(24435, 'Mol'),
(24437, 'Utrine'),
(25101, 'Sombor'),
(25103, 'Sombor'),
(25104, 'Sombor'),
(25105, 'Sombor'),
(25106, 'Sombor'),
(25107, 'Sombor'),
(25108, 'Sombor'),
(25210, 'Conoplja'),
(25211, 'Svetozar Miletic'),
(25212, 'Aleksa Santic'),
(25220, 'Crvenka'),
(25221, 'Kljajicevo'),
(25222, 'Telecka'),
(25223, 'Sivac'),
(25224, 'Nova Crvenka'),
(25225, 'Kruscic'),
(25230, 'Kula'),
(25231, 'Kula'),
(25232, 'Lipar'),
(25233, 'Ruski Krstur'),
(25234, 'Lalic'),
(25235, 'Kula'),
(25240, 'Stapar'),
(25242, 'Backi Brestovac'),
(25243, 'Doroslovo'),
(25244, 'Srpski Miletic'),
(25245, 'Bogojevo'),
(25250, 'Odzaci'),
(25252, 'Backi Gracac'),
(25253, 'Ratkovo'),
(25254, 'Deronje'),
(25255, 'Karavukovo'),
(25260, 'Apatin'),
(25262, 'Kupusina'),
(25263, 'Prigrevica'),
(25264, 'Sonta'),
(25265, 'Svilojevo'),
(25270, 'Bezdan'),
(25272, 'Backi Monostor'),
(25274, 'Kolut'),
(25275, 'Backi Breg'),
(25276, 'Backi Breg'),
(25280, 'Ridjica'),
(25282, 'Gakovo'),
(25283, 'Rastina'),
(25284, 'Stanisic'),
(26101, 'Pancevo'),
(26103, 'Pancevo'),
(26104, 'Pancevo'),
(26105, 'Pancevo'),
(26106, 'Pancevo'),
(26107, 'Pancevo'),
(26108, 'Pancevo'),
(26109, 'Pancevo'),
(26110, 'Pancevo'),
(26111, 'Pancevo'),
(26201, 'Jabuka'),
(26202, 'Glogonj'),
(26203, 'Sefkerin'),
(26204, 'Opovo'),
(26205, 'Baranda'),
(26206, 'Sakule'),
(26207, 'Idvor'),
(26210, 'Kovacica'),
(26212, 'Kacarevo'),
(26213, 'Crepaja'),
(26214, 'Debeljaca'),
(26215, 'Padina'),
(26216, 'Uzdin'),
(26220, 'Kovin'),
(26222, 'Bavaniste'),
(26223, 'Gaj'),
(26224, 'Dubovac'),
(26225, 'Deliblato'),
(26226, 'Mramorak'),
(26227, 'Dolovo'),
(26228, 'Skorenovac'),
(26229, 'Plocica'),
(26230, 'Omoljica'),
(26232, 'Starcevo'),
(26233, 'Ivanovo'),
(26234, 'Banatski Brestovac'),
(26300, 'Vrsac'),
(26302, 'Vrsac'),
(26303, 'Vrsac'),
(26304, 'Vrsac'),
(26305, 'Vrsac'),
(26310, 'Alibunar'),
(26314, 'Banatsko Novo Selo'),
(26315, 'Vladimirovac'),
(26316, 'Devojacki Bunar'),
(26320, 'Banatski Karlovac'),
(26322, 'Nikolinci'),
(26323, 'Crvena Crkva'),
(26324, 'Banatska Palanka'),
(26327, 'Banatska Subotica'),
(26328, 'Dupljaja'),
(26329, 'Kajtasovo'),
(26330, 'Uljma'),
(26331, 'Ritisevo'),
(26332, 'Vlajkovac'),
(26333, 'Pavlis'),
(26334, 'Veliko Srediste'),
(26335, 'Gudurica'),
(26336, 'Kustilj'),
(26337, 'Vatin'),
(26338, 'Vojvodinci'),
(26340, 'Bela Crkva'),
(26343, 'Izbiste'),
(26344, 'Zagajica'),
(26345, 'Straza'),
(26346, 'Jasenovo'),
(26347, 'Grebenac'),
(26348, 'Vracev Gaj'),
(26349, 'Kusic'),
(26350, 'Samos'),
(26351, 'Seleus'),
(26352, 'Ilandza'),
(26353, 'Novi Kozjak'),
(26354, 'Dobrica'),
(26360, 'Plandiste'),
(26361, 'Lokve'),
(26362, 'Janosik'),
(26363, 'Jermenovci'),
(26364, 'Margita'),
(26365, 'Veliki Gaj'),
(26366, 'Velika Greda'),
(26367, 'Barice'),
(26368, 'Kupinik'),
(26370, 'Hajducica'),
(26371, 'Stari Lec'),
(26373, 'Mileticevo'),
(26380, 'Kruscica'),
(31000, 'Uzice'),
(31102, 'Uzice'),
(31103, 'Uzice'),
(31104, 'Uzice'),
(31105, 'Uzice'),
(31106, 'Uzice'),
(31107, 'Uzice'),
(31203, 'Lunovo Selo'),
(31204, 'Karan'),
(31205, 'Sevojno'),
(31206, 'Ravni'),
(31207, 'Sirogojno'),
(31208, 'Rozanstvo'),
(31209, 'Ljubis'),
(31210, 'Pozega'),
(31213, 'Jezevica'),
(31214, 'Gornja Dobrinja'),
(31215, 'Jelen Do'),
(31230, 'Arilje'),
(31233, 'Kruscica'),
(31234, 'Brekovo'),
(31236, 'Divljaka'),
(31237, 'Roge'),
(31241, 'Bioska'),
(31242, 'Kremna'),
(31243, 'Mokra Gora'),
(31244, 'Sljivovica'),
(31250, 'Bajina Basta'),
(31251, 'Mitrovac'),
(31253, 'Zlodol'),
(31254, 'Kostojevici'),
(31255, 'Rogacica'),
(31256, 'Perucac'),
(31257, 'Kaludjerske Bare'),
(31258, 'Bacevci'),
(31260, 'Kosjeric'),
(31262, 'Seca Reka'),
(31263, 'Varda'),
(31265, 'Razana'),
(31300, 'Prijepolje'),
(31303, 'Prijepolje'),
(31305, 'Brodarevo'),
(31306, 'Jabuka'),
(31307, 'Aljinovici'),
(31310, 'Cajetina'),
(31311, 'Bela Zemlja'),
(31312, 'Mackat'),
(31313, 'Gostilje'),
(31314, 'Jablanica'),
(31315, 'Zlatibor'),
(31317, 'Draglica'),
(31318, 'Kokin Brod'),
(31319, 'Jasenovo'),
(31320, 'Nova Varos'),
(31322, 'Bozetici'),
(31325, 'Bistrica'),
(31330, 'Priboj'),
(31333, 'Priboj'),
(31335, 'Sastavci'),
(31337, 'Banja Kod Priboja'),
(32101, 'Cacak'),
(32102, 'Cacak'),
(32103, 'Cacak'),
(32104, 'Cacak'),
(32105, 'Cacak'),
(32205, 'Trbusani'),
(32206, 'Kamenica'),
(32210, 'Mrcajevci'),
(32211, 'Mojsinje'),
(32212, 'Preljina'),
(32213, 'Bresnica'),
(32215, 'Gornja Trepca'),
(32221, 'Trnava'),
(32222, 'Jezevica'),
(32223, 'Zablace'),
(32224, 'Slatina'),
(32225, 'Goricani'),
(32230, 'Guca'),
(32232, 'Goracici'),
(32233, 'Vica'),
(32234, 'Kaona'),
(32235, 'Kotraza'),
(32240, 'Lucani'),
(32242, 'Ovcar Banja'),
(32243, 'Markovica'),
(32250, 'Ivanjica'),
(32251, 'Bukovica'),
(32252, 'Prilicki Kiseljak'),
(32253, 'Brezova'),
(32254, 'Vionica'),
(32255, 'Medjurecje'),
(32256, 'Bratljevo'),
(32257, 'Kovilje'),
(32258, 'Kusici'),
(32259, 'Bele Vode'),
(32300, 'Gornji Milanovac'),
(32301, 'Gornji Milanovac'),
(32303, 'Brdjani'),
(32304, 'Takovo'),
(32305, 'Bersici'),
(32306, 'Gornji Banjani'),
(32307, 'Brezna'),
(32308, 'Pranjani'),
(32311, 'Silopaj'),
(32312, 'Boljkovci'),
(32313, 'Rudnik'),
(32314, 'Ugrinovci'),
(32315, 'Vracevsnica'),
(34000, 'Kragujevac'),
(34103, 'Kragujevac'),
(34104, 'Kragujevac'),
(34105, 'Kragujevac'),
(34106, 'Kragujevac'),
(34107, 'Kragujevac'),
(34108, 'Kragujevac'),
(34109, 'Kragujevac'),
(34110, 'Kragujevac'),
(34111, 'Kragujevac'),
(34112, 'Kragujevac'),
(34113, 'Kragujevac'),
(34114, 'Kragujevac'),
(34115, 'Kragujevac'),
(34202, 'Grosnica'),
(34203, 'Ilicevo'),
(34204, 'Divostin'),
(34205, 'Bare'),
(34206, 'Gornja Sabanta'),
(34207, 'Erdec'),
(34209, 'Marsic'),
(34210, 'Raca Kragujevacka'),
(34211, 'Jovanovac'),
(34212, 'Malo Krcmare'),
(34213, 'Sipic'),
(34214, 'Veliko Krcmare'),
(34215, 'Djurdjevo'),
(34216, 'Male Pcelice'),
(34217, 'Bukurovac'),
(34220, 'Lapovo'),
(34221, 'Lapovo'),
(34223, 'Lapovo Selo'),
(34224, 'Korman'),
(34225, 'Resnik'),
(34226, 'Badnjevac'),
(34227, 'Batocina'),
(34228, 'Brzan'),
(34229, 'Zirovnica'),
(34230, 'Gruza'),
(34231, 'Dragobraca'),
(34232, 'Guberevac'),
(34240, 'Knic'),
(34242, 'Bumbarevo Brdo'),
(34243, 'Toponica'),
(34244, 'Zabojnica'),
(34300, 'Arandjelovac'),
(34301, 'Bukovik'),
(34302, 'Ranilovic'),
(34303, 'Arandjelovac'),
(34304, 'Banja'),
(34305, 'Darosava'),
(34306, 'Vencane'),
(34307, 'Stojnik'),
(34308, 'Orasac'),
(34309, 'Jelovik'),
(34310, 'Topola'),
(34312, 'Belosavci'),
(34313, 'Natalinci'),
(34314, 'Donja Satornja'),
(34318, 'Jarmenovci'),
(34321, 'Desimirovac'),
(34322, 'Cumic'),
(34323, 'Stragari'),
(34325, 'Luznice'),
(35000, 'Jagodina'),
(35102, 'Jagodina'),
(35103, 'Jagodina'),
(35104, 'Jagodina'),
(35203, 'Siokovac'),
(35204, 'Bagrdan'),
(35205, 'Jovac'),
(35206, 'Rasevica'),
(35207, 'Potocac'),
(35208, 'Vojska'),
(35209, 'Subotica Kod Svilajnca'),
(35210, 'Svilajnac'),
(35211, 'Sedlare'),
(35212, 'Plazane'),
(35213, 'Despotovac'),
(35214, 'Svilajnac'),
(35215, 'Stenjevac'),
(35217, 'Bobovo'),
(35219, 'Koncarevo'),
(35220, 'Ribare'),
(35222, 'Glogovac'),
(35223, 'Veliki Popovic'),
(35224, 'Medvedja'),
(35226, 'Kusiljevo'),
(35227, 'Krusar'),
(35228, 'Supska'),
(35230, 'Cuprija'),
(35231, 'Cuprija'),
(35233, 'Senje'),
(35234, 'Senjski Rudnik'),
(35235, 'Ravna Reka'),
(35236, 'Mijatovac'),
(35237, 'Resavica'),
(35238, 'Bigrenica'),
(35241, 'Jasenovo'),
(35242, 'Kolare'),
(35247, 'Plana'),
(35248, 'Tresnjevica'),
(35249, 'Busilovac'),
(35250, 'Paracin'),
(35252, 'Paracin'),
(35253, 'Paracin'),
(35254, 'Popovac'),
(35255, 'Donja Mutnica'),
(35256, 'Sikirica'),
(35257, 'Drenovac'),
(35258, 'Donje Vidovo'),
(35259, 'Svojnovo'),
(35260, 'Rekovac'),
(35261, 'Glavinci'),
(35262, 'Dragosevac'),
(35263, 'Belusic'),
(35264, 'Prevest'),
(35265, 'Dragovo'),
(35267, 'Oparic'),
(35268, 'Milosevo'),
(35269, 'Strizilo'),
(35270, 'Majur'),
(35271, 'Novo Laniste'),
(35272, 'Dragocvet'),
(35273, 'Bunar'),
(35274, 'Locika'),
(36000, 'Kraljevo'),
(36101, 'Kraljevo'),
(36102, 'Kraljevo'),
(36103, 'Kraljevo'),
(36104, 'Kraljevo'),
(36105, 'Kraljevo'),
(36107, 'Kraljevo'),
(36108, 'Kraljevo'),
(36201, 'Mataruska Banja'),
(36202, 'Samaila'),
(36203, 'Adrani'),
(36204, 'Ladjevci'),
(36205, 'Rocevici'),
(36206, 'Vitanovac'),
(36207, 'Vitkovac'),
(36208, 'Sirca'),
(36210, 'Vrnjacka Banja'),
(36212, 'Ratina'),
(36214, 'Vrba'),
(36215, 'Podunavci'),
(36216, 'Novo Selo'),
(36217, 'Vrnjci'),
(36220, 'Cukojevac'),
(36221, 'Zica'),
(36222, 'Rudno'),
(36300, 'Novi Pazar'),
(36302, 'Novi Pazar'),
(36303, 'Novi Pazar'),
(36304, 'Novi Pazar'),
(36305, 'Dezeva'),
(36306, 'Lukare'),
(36307, 'Delimede'),
(36308, 'Sopocani'),
(36309, 'Ribarice'),
(36310, 'Sjenica'),
(36311, 'Stavalj'),
(36312, 'Duga Poljana'),
(36313, 'Ugao'),
(36314, 'Stitare'),
(36315, 'Bare'),
(36316, 'Novi Pazar'),
(36320, 'Tutin'),
(36321, 'Crkvine'),
(36340, 'Konarevo'),
(36341, 'Bogutovac'),
(36342, 'Usce'),
(36343, 'Studenica'),
(36344, 'Baljevac Na Ibru'),
(36345, 'Josanicka Banja'),
(36346, 'Brvenik'),
(36350, 'Raska'),
(36352, 'Raska'),
(36353, 'Rudnica'),
(36354, 'Kopaonik'),
(36355, 'Raska'),
(37000, 'Krusevac'),
(37102, 'Krusevac'),
(37103, 'Krusevac'),
(37104, 'Krusevac'),
(37105, 'Krusevac'),
(37106, 'Krusevac'),
(37107, 'Krusevac'),
(37108, 'Krusevac'),
(37109, 'Krusevac'),
(37201, 'Parunovac'),
(37202, 'Djunis'),
(37203, 'Zdravinje'),
(37204, 'Veliki Siljegovac'),
(37205, 'Ribarska Banja'),
(37206, 'Dvorane'),
(37207, 'Veliko Golovode'),
(37208, 'Citluk'),
(37209, 'Velika Lomnica'),
(37210, 'Cicevac'),
(37212, 'Stalac'),
(37213, 'Vitosevac'),
(37214, 'Pojate'),
(37215, 'Razanj'),
(37216, 'Novi Bracun'),
(37218, 'Skorica'),
(37220, 'Brus'),
(37221, 'Gornji Stepos'),
(37222, 'Kupci'),
(37223, 'Razbojna'),
(37224, 'Lepenac'),
(37225, 'Brzece'),
(37226, 'Blazevo'),
(37227, 'Milentija'),
(37228, 'Zlatari'),
(37229, 'Grasevci'),
(37230, 'Aleksandrovac'),
(37231, 'Pepeljevac'),
(37232, 'Lacisled'),
(37233, 'Velika Vrbnica'),
(37234, 'Gornji Stupanj'),
(37235, 'Trnavci'),
(37236, 'Rataje'),
(37237, 'Ploca'),
(37238, 'Ples'),
(37239, 'Sljivovo'),
(37240, 'Trstenik'),
(37241, 'Trstenik'),
(37242, 'Stopanja'),
(37243, 'Pocekovina'),
(37244, 'Medvedja'),
(37245, 'Velika Drenova'),
(37246, 'Milutovac'),
(37249, 'Trstenik'),
(37251, 'Globoder'),
(37252, 'Jasika'),
(37253, 'Bela Voda'),
(37254, 'Konjuh'),
(37255, 'Kukljin'),
(37256, 'Kaonik'),
(37257, 'Padez'),
(37258, 'Donji Krcin'),
(37259, 'Ribare'),
(37260, 'Varvarin'),
(37262, 'Bosnjane'),
(37265, 'Bacina'),
(37266, 'Obrez'),
(37271, 'Dasnica'),
(37272, 'Subotica'),
(37281, 'Osreci'),
(37282, 'Kriva Reka'),
(38157, 'Brezovica'),
(38205, 'Gracanica'),
(38209, 'Gusterica'),
(38210, 'Kosovo Polje'),
(38213, 'Priluzje'),
(38216, 'Banjska'),
(38217, 'Socanica'),
(38218, 'Leposavic'),
(38219, 'Lesak'),
(38220, 'Kosovska Mitrovica'),
(38223, 'Kosovska Mitrovica'),
(38227, 'Zvecan'),
(38228, 'Zubin Potok'),
(38236, 'Strpce'),
(38239, 'Drajkovce'),
(38266, 'Pasjane'),
(38267, 'Ranilug');

-- --------------------------------------------------------

--
-- Table structure for table `mreza2g`
--

CREATE TABLE `mreza2g` (
  `id2g` int(5) NOT NULL,
  `naziv2g` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mreza2g`
--

INSERT INTO `mreza2g` (`id2g`, `naziv2g`) VALUES
(1, 'da'),
(2, 'ne');

-- --------------------------------------------------------

--
-- Table structure for table `mreza3g`
--

CREATE TABLE `mreza3g` (
  `id3g` int(5) NOT NULL,
  `naziv3g` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mreza3g`
--

INSERT INTO `mreza3g` (`id3g`, `naziv3g`) VALUES
(1, 'da'),
(2, 'ne');

-- --------------------------------------------------------

--
-- Table structure for table `mreza4g`
--

CREATE TABLE `mreza4g` (
  `id4g` int(5) NOT NULL,
  `naziv4g` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mreza4g`
--

INSERT INTO `mreza4g` (`id4g`, `naziv4g`) VALUES
(1, 'da'),
(2, 'ne');

-- --------------------------------------------------------

--
-- Table structure for table `navigacija`
--

CREATE TABLE `navigacija` (
  `idNav` int(6) NOT NULL,
  `putanja` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `naziv` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prioritet` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `navigacija`
--

INSERT INTO `navigacija` (`idNav`, `putanja`, `naziv`, `prioritet`) VALUES
(1, 'home', 'Početna', 1),
(2, 'mobiles', 'Uređaji', 2),
(3, 'compare', 'Uporedi uređaje', 3),
(4, 'about', 'O nama', 4),
(5, 'contact', 'Kontakt', 5);

-- --------------------------------------------------------

--
-- Table structure for table `na_dodir`
--

CREATE TABLE `na_dodir` (
  `idNaDodir` int(1) NOT NULL,
  `nazivNaDodir` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `na_dodir`
--

INSERT INTO `na_dodir` (`idNaDodir`, `nazivNaDodir`) VALUES
(1, 'da'),
(2, 'Ne');

-- --------------------------------------------------------

--
-- Table structure for table `nfc`
--

CREATE TABLE `nfc` (
  `idNfc` int(5) NOT NULL,
  `nazivNfc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nfc`
--

INSERT INTO `nfc` (`idNfc`, `nazivNfc`) VALUES
(1, 'Da'),
(2, 'Ne');

-- --------------------------------------------------------

--
-- Table structure for table `os`
--

CREATE TABLE `os` (
  `idOs` int(2) NOT NULL,
  `nazivOs` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `os`
--

INSERT INTO `os` (`idOs`, `nazivOs`) VALUES
(2, 'Android'),
(1, 'iOS');

-- --------------------------------------------------------

--
-- Table structure for table `os_verzija`
--

CREATE TABLE `os_verzija` (
  `idOsVerzija` int(255) NOT NULL,
  `idOs` int(2) NOT NULL,
  `nazivOsVerzija` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `os_verzija`
--

INSERT INTO `os_verzija` (`idOsVerzija`, `idOs`, `nazivOsVerzija`) VALUES
(3, 1, '14.1'),
(4, 2, '10'),
(5, 2, '9'),
(6, 2, '11');

-- --------------------------------------------------------

--
-- Table structure for table `porudzbina`
--

CREATE TABLE `porudzbina` (
  `idPorudzbina` int(255) NOT NULL,
  `idKorpa` int(255) NOT NULL,
  `idCenovnik` int(255) NOT NULL,
  `kolicina` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `porudzbina`
--

INSERT INTO `porudzbina` (`idPorudzbina`, `idKorpa`, `idCenovnik`, `kolicina`) VALUES
(2, 1, 4, 1),
(3, 2, 4, 1),
(5, 2, 6, 1),
(6, 3, 8, 2),
(9, 4, 4, 1),
(10, 5, 4, 1),
(12, 7, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prednja_specifikacija`
--

CREATE TABLE `prednja_specifikacija` (
  `idPrednjaSpecifikacija` int(255) NOT NULL,
  `idKamera` int(3) NOT NULL,
  `idTelefon` int(255) NOT NULL,
  `idHdr` int(1) NOT NULL,
  `idDetekcijaOsmeha` int(1) NOT NULL,
  `idVideoZapis` int(1) NOT NULL,
  `idBlic` int(1) NOT NULL,
  `idAutofokus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prednja_specifikacija`
--

INSERT INTO `prednja_specifikacija` (`idPrednjaSpecifikacija`, `idKamera`, `idTelefon`, `idHdr`, `idDetekcijaOsmeha`, `idVideoZapis`, `idBlic`, `idAutofokus`) VALUES
(5, 15, 5, 1, 1, 1, 2, 1),
(7, 6, 7, 1, 1, 1, 1, 1),
(8, 2, 8, 1, 1, 1, 2, 1),
(9, 5, 9, 1, 1, 1, 1, 1),
(10, 2, 10, 1, 1, 1, 1, 1),
(11, 3, 11, 1, 1, 1, 1, 1),
(12, 5, 12, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `procesor`
--

CREATE TABLE `procesor` (
  `idProcesor` int(100) NOT NULL,
  `idChipset` int(15) NOT NULL,
  `nazivProcesor` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procesor`
--

INSERT INTO `procesor` (`idProcesor`, `idChipset`, `nazivProcesor`) VALUES
(3, 1, 'Hexa-core (2x3.1 GHz Firestorm + 4x1.8 GHz Icestorm)'),
(4, 3, 'Octa-core (2x2.86 GHz Cortex-A76 & 2x2.09 GHz Cortex-A76 & 4x1.86 GHz'),
(5, 4, 'ARMv8-A 64 bita (2x2.6 GHz Cortex-A76 & 2x1.92 GHz Cortex-A76 & 4x1.8 GHz Cortex-A55)'),
(6, 5, '2.9GHz Single-core (Cortex®-X1) + 2.8GHz Triple-core (Cortex®-A78) + 2.2GHz Quad-core (Cortex®-A55)'),
(7, 6, 'Octa-core (1x2.84 GHz Kryo 485 & 3x2.42 GHz Kryo 485 & 4x1.78 GHz Kryo 485)'),
(8, 7, 'Octa-core (4x2.0 GHz Cortex-A73 & 4x1.7 GHz Cortex-A53)'),
(9, 8, 'Hexa-core (2x2.5 GHz Vortex + 4x1.6 GHz Tempest)');

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `idRam` int(3) NOT NULL,
  `memorija` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`idRam`, `memorija`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 6),
(6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `rezolucija`
--

CREATE TABLE `rezolucija` (
  `idRezolucija` int(3) NOT NULL,
  `nazivRezolucija` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rezolucija`
--

INSERT INTO `rezolucija` (`idRezolucija`, `nazivRezolucija`) VALUES
(12, '1080 x 1920'),
(11, '1125 x 2436'),
(13, '1280 x 720'),
(14, '1440 x 2960'),
(9, '640 x 1136'),
(10, '750 x 1334');

-- --------------------------------------------------------

--
-- Table structure for table `telefon`
--

CREATE TABLE `telefon` (
  `idTelefon` int(255) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `coverSlika` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `idMarka` int(10) NOT NULL,
  `idOs` int(2) NOT NULL,
  `idChipset` int(15) NOT NULL,
  `idVelicinaEkrana` int(4) NOT NULL,
  `idNaDodir` int(1) NOT NULL,
  `idRezolucija` int(3) NOT NULL,
  `idVrstaEkrana` int(2) NOT NULL,
  `idBaterijaTip` int(3) NOT NULL,
  `idBaterijaKapacitet` int(3) NOT NULL,
  `idRam` int(3) NOT NULL,
  `idInterna` int(3) NOT NULL,
  `idEksterna` int(3) DEFAULT NULL,
  `idWifi` int(5) NOT NULL,
  `idBluetooth` int(5) NOT NULL,
  `idUsb` int(5) NOT NULL,
  `idNfc` int(5) NOT NULL,
  `idGps` int(5) NOT NULL,
  `idTezina` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `telefon`
--

INSERT INTO `telefon` (`idTelefon`, `naziv`, `coverSlika`, `idMarka`, `idOs`, `idChipset`, `idVelicinaEkrana`, `idNaDodir`, `idRezolucija`, `idVrstaEkrana`, `idBaterijaTip`, `idBaterijaKapacitet`, `idRam`, `idInterna`, `idEksterna`, `idWifi`, `idBluetooth`, `idUsb`, `idNfc`, `idGps`, `idTezina`) VALUES
(5, 'Honor 20', '1615679006.png', 4, 2, 4, 212, 1, 14, 2, 1, 7, 5, 4, 2, 1, 4, 5, 1, 1, 81),
(7, 'Iphone 12 Pro Max', '1615679376.png', 1, 1, 1, 215, 1, 14, 5, 1, 6, 5, 5, 4, 1, 4, 3, 1, 1, 100),
(8, 'Samsung Galaxy S21', '1615679543.png', 5, 2, 5, 215, 1, 13, 5, 1, 7, 6, 4, 3, 1, 4, 6, 1, 1, 101),
(9, 'Xiaomi MI 9', '1615679698.png', 6, 2, 6, 212, 1, 14, 5, 1, 6, 5, 4, 3, 1, 3, 4, 1, 1, 100),
(10, 'Iphone XS Max', '1615680117.png', 1, 1, 8, 206, 1, 14, 5, 1, 5, 4, 6, 4, 1, 2, 3, 1, 1, 78),
(11, 'Huawei P40 Lite', '1616249868.png', 4, 2, 4, 212, 1, 14, 2, 1, 7, 5, 4, 2, 1, 3, 4, 1, 1, 99),
(12, 'Huawei 5 Nova T', '1616249993.png', 4, 2, 3, 210, 1, 14, 2, 1, 6, 5, 4, 3, 1, 3, 3, 1, 1, 88);

-- --------------------------------------------------------

--
-- Table structure for table `tezina`
--

CREATE TABLE `tezina` (
  `idTezina` int(3) NOT NULL,
  `vrednost` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tezina`
--

INSERT INTO `tezina` (`idTezina`, `vrednost`) VALUES
(1, 100),
(2, 101),
(3, 102),
(4, 103),
(5, 104),
(6, 105),
(7, 106),
(8, 107),
(9, 108),
(10, 109),
(11, 110),
(12, 111),
(13, 112),
(14, 113),
(15, 114),
(16, 115),
(17, 116),
(18, 117),
(19, 118),
(20, 119),
(21, 120),
(22, 121),
(23, 122),
(24, 123),
(25, 124),
(26, 125),
(27, 126),
(28, 127),
(29, 128),
(30, 129),
(31, 130),
(32, 131),
(33, 132),
(34, 133),
(35, 134),
(36, 135),
(37, 136),
(38, 137),
(39, 138),
(40, 139),
(41, 140),
(42, 141),
(43, 142),
(44, 143),
(45, 144),
(46, 145),
(47, 146),
(48, 147),
(49, 148),
(50, 149),
(51, 150),
(52, 151),
(53, 152),
(54, 153),
(55, 154),
(56, 155),
(57, 156),
(58, 157),
(59, 158),
(60, 159),
(61, 160),
(62, 161),
(63, 162),
(64, 163),
(65, 164),
(66, 165),
(67, 166),
(68, 167),
(69, 168),
(70, 169),
(71, 170),
(72, 171),
(73, 172),
(74, 173),
(75, 174),
(76, 175),
(77, 176),
(78, 177),
(79, 178),
(80, 179),
(81, 180),
(82, 181),
(83, 182),
(84, 183),
(85, 184),
(86, 185),
(87, 186),
(88, 187),
(89, 188),
(90, 189),
(91, 190),
(92, 191),
(93, 192),
(94, 193),
(95, 194),
(96, 195),
(97, 196),
(98, 197),
(99, 198),
(100, 199),
(101, 200);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `idUloga` int(3) NOT NULL,
  `nazivUloga` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`idUloga`, `nazivUloga`) VALUES
(1, 'admin'),
(2, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `usb`
--

CREATE TABLE `usb` (
  `idUsb` int(5) NOT NULL,
  `nazivUsb` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usb`
--

INSERT INTO `usb` (`idUsb`, `nazivUsb`) VALUES
(1, '1.0'),
(2, '1.1'),
(3, '2.0'),
(4, '3.0'),
(5, '3.1'),
(6, '3.2'),
(7, '4');

-- --------------------------------------------------------

--
-- Table structure for table `velicina_ekrana`
--

CREATE TABLE `velicina_ekrana` (
  `idVelicinaEkrana` int(4) NOT NULL,
  `vrednostVelicina` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `velicina_ekrana`
--

INSERT INTO `velicina_ekrana` (`idVelicinaEkrana`, `vrednostVelicina`) VALUES
(182, '3.4'),
(183, '3.5'),
(184, '3.6'),
(185, '3.7'),
(186, '3.8'),
(187, '3.9'),
(188, '4.0'),
(189, '4.1'),
(190, '4.2'),
(191, '4.3'),
(192, '4.4'),
(193, '4.5'),
(194, '4.6'),
(195, '4.7'),
(196, '4.8'),
(197, '4.9'),
(198, '5.0'),
(199, '5.1'),
(200, '5.2'),
(201, '5.3'),
(202, '5.4'),
(203, '5.5'),
(204, '5.6'),
(205, '5.7'),
(206, '5.8'),
(207, '5.9'),
(208, '6.0'),
(209, '6.1'),
(210, '6.2'),
(211, '6.3'),
(212, '6.4'),
(213, '6.5'),
(214, '6.6'),
(215, '6.7'),
(216, '6.8'),
(217, '6.9');

-- --------------------------------------------------------

--
-- Table structure for table `video_zapis`
--

CREATE TABLE `video_zapis` (
  `idVideoZapis` int(1) NOT NULL,
  `nazivVideo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video_zapis`
--

INSERT INTO `video_zapis` (`idVideoZapis`, `nazivVideo`) VALUES
(1, 'Da'),
(3, 'Ne');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_ekrana`
--

CREATE TABLE `vrsta_ekrana` (
  `idVrstaEkrana` int(2) NOT NULL,
  `nazivEkrana` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vrsta_ekrana`
--

INSERT INTO `vrsta_ekrana` (`idVrstaEkrana`, `nazivEkrana`) VALUES
(5, 'AMOLED '),
(3, 'Capacitive Touchscreen LCD'),
(2, 'IPS LCD'),
(4, 'OLED'),
(1, 'TFT LCD');

-- --------------------------------------------------------

--
-- Table structure for table `wifi`
--

CREATE TABLE `wifi` (
  `idWifi` int(5) NOT NULL,
  `nazivWifi` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wifi`
--

INSERT INTO `wifi` (`idWifi`, `nazivWifi`) VALUES
(1, 'Da'),
(2, 'Ne'),
(3, '802.11a');

-- --------------------------------------------------------

--
-- Table structure for table `zadnja_specifikacija`
--

CREATE TABLE `zadnja_specifikacija` (
  `idZadnjaSpecifikacija` int(255) NOT NULL,
  `idKamera` int(3) NOT NULL,
  `idTelefon` int(255) NOT NULL,
  `idHdr` int(1) NOT NULL,
  `idDetekcijaOsmeha` int(1) NOT NULL,
  `idVideoZapis` int(1) NOT NULL,
  `idBlic` int(1) NOT NULL,
  `idAutofokus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zadnja_specifikacija`
--

INSERT INTO `zadnja_specifikacija` (`idZadnjaSpecifikacija`, `idKamera`, `idTelefon`, `idHdr`, `idDetekcijaOsmeha`, `idVideoZapis`, `idBlic`, `idAutofokus`) VALUES
(5, 14, 5, 1, 1, 1, 1, 1),
(7, 6, 7, 1, 1, 1, 1, 1),
(8, 11, 8, 1, 1, 1, 1, 1),
(9, 10, 9, 1, 1, 1, 1, 1),
(10, 2, 10, 1, 1, 1, 1, 1),
(11, 14, 11, 1, 1, 1, 1, 1),
(12, 7, 12, 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autofokus`
--
ALTER TABLE `autofokus`
  ADD PRIMARY KEY (`idAutofokus`),
  ADD UNIQUE KEY `nazivAutofokus` (`nazivAutofokus`);

--
-- Indexes for table `baterija_kapacitet`
--
ALTER TABLE `baterija_kapacitet`
  ADD PRIMARY KEY (`idBaterijaKapacitet`),
  ADD UNIQUE KEY `kapacitet` (`kapacitet`);

--
-- Indexes for table `baterija_tip`
--
ALTER TABLE `baterija_tip`
  ADD PRIMARY KEY (`idBaterijaTip`),
  ADD UNIQUE KEY `nazivBaterija` (`nazivBaterija`);

--
-- Indexes for table `blic`
--
ALTER TABLE `blic`
  ADD PRIMARY KEY (`idBlic`),
  ADD UNIQUE KEY `nazivBlic` (`nazivBlic`);

--
-- Indexes for table `bluetooth`
--
ALTER TABLE `bluetooth`
  ADD PRIMARY KEY (`idBluetooth`),
  ADD UNIQUE KEY `nazivBluetooth` (`nazivBluetooth`);

--
-- Indexes for table `cenovnik`
--
ALTER TABLE `cenovnik`
  ADD PRIMARY KEY (`idCenovnik`),
  ADD KEY `cenovnikTelefon` (`idTelefon`);

--
-- Indexes for table `chipset`
--
ALTER TABLE `chipset`
  ADD PRIMARY KEY (`idChipset`),
  ADD UNIQUE KEY `nazivChipset` (`nazivChipset`);

--
-- Indexes for table `detekcija_osmeha`
--
ALTER TABLE `detekcija_osmeha`
  ADD PRIMARY KEY (`idDetekcijaOsmeha`),
  ADD UNIQUE KEY `nazivOsmeh` (`nazivOsmeh`);

--
-- Indexes for table `eksterna`
--
ALTER TABLE `eksterna`
  ADD PRIMARY KEY (`idEksterna`),
  ADD UNIQUE KEY `uniqueExternal` (`memorija`);

--
-- Indexes for table `gps`
--
ALTER TABLE `gps`
  ADD PRIMARY KEY (`idGps`),
  ADD UNIQUE KEY `nazivGps` (`nazivGps`);

--
-- Indexes for table `hdr`
--
ALTER TABLE `hdr`
  ADD PRIMARY KEY (`idHdr`),
  ADD UNIQUE KEY `nazivHdr` (`nazivHdr`);

--
-- Indexes for table `interna`
--
ALTER TABLE `interna`
  ADD PRIMARY KEY (`idInterna`),
  ADD UNIQUE KEY `uniqueInternal` (`memorija`);

--
-- Indexes for table `izvestaji`
--
ALTER TABLE `izvestaji`
  ADD PRIMARY KEY (`idIzvestaji`),
  ADD KEY `izvestajKorisnik` (`idKorisnik`);

--
-- Indexes for table `kamera`
--
ALTER TABLE `kamera`
  ADD PRIMARY KEY (`idKamera`);

--
-- Indexes for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`idKontakt`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `brojTelefona` (`brojTelefona`),
  ADD KEY `mestoKorisnik` (`idMesta`),
  ADD KEY `ulogaKorisnik` (`idUloga`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`idKorpa`),
  ADD KEY `korpaKorisnik` (`idKorisnik`);

--
-- Indexes for table `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`idMarka`),
  ADD UNIQUE KEY `nazivMarka` (`nazivMarka`);

--
-- Indexes for table `memorija`
--
ALTER TABLE `memorija`
  ADD PRIMARY KEY (`idMemorija`);

--
-- Indexes for table `mesto`
--
ALTER TABLE `mesto`
  ADD PRIMARY KEY (`idMesta`);

--
-- Indexes for table `mreza2g`
--
ALTER TABLE `mreza2g`
  ADD PRIMARY KEY (`id2g`),
  ADD UNIQUE KEY `naziv2g` (`naziv2g`);

--
-- Indexes for table `mreza3g`
--
ALTER TABLE `mreza3g`
  ADD PRIMARY KEY (`id3g`),
  ADD UNIQUE KEY `naziv3g` (`naziv3g`);

--
-- Indexes for table `mreza4g`
--
ALTER TABLE `mreza4g`
  ADD PRIMARY KEY (`id4g`),
  ADD UNIQUE KEY `naziv4g` (`naziv4g`);

--
-- Indexes for table `navigacija`
--
ALTER TABLE `navigacija`
  ADD PRIMARY KEY (`idNav`),
  ADD UNIQUE KEY `putanja` (`putanja`),
  ADD UNIQUE KEY `naziv` (`naziv`);

--
-- Indexes for table `na_dodir`
--
ALTER TABLE `na_dodir`
  ADD PRIMARY KEY (`idNaDodir`),
  ADD UNIQUE KEY `nazivNaDodir` (`nazivNaDodir`);

--
-- Indexes for table `nfc`
--
ALTER TABLE `nfc`
  ADD PRIMARY KEY (`idNfc`),
  ADD UNIQUE KEY `nazivNfc` (`nazivNfc`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`idOs`),
  ADD UNIQUE KEY `nazivOs` (`nazivOs`);

--
-- Indexes for table `os_verzija`
--
ALTER TABLE `os_verzija`
  ADD PRIMARY KEY (`idOsVerzija`),
  ADD UNIQUE KEY `nazivOsVerzija` (`nazivOsVerzija`),
  ADD KEY `osVerzija` (`idOs`);

--
-- Indexes for table `porudzbina`
--
ALTER TABLE `porudzbina`
  ADD PRIMARY KEY (`idPorudzbina`),
  ADD KEY `korpaPorudzbina` (`idKorpa`),
  ADD KEY `cenovnikPorudzbina` (`idCenovnik`);

--
-- Indexes for table `prednja_specifikacija`
--
ALTER TABLE `prednja_specifikacija`
  ADD PRIMARY KEY (`idPrednjaSpecifikacija`),
  ADD KEY `telefonPrednjaSpecKamera` (`idTelefon`),
  ADD KEY `prednja_hdr` (`idHdr`),
  ADD KEY `prednja_osmeh` (`idDetekcijaOsmeha`),
  ADD KEY `prednja_video` (`idVideoZapis`),
  ADD KEY `prednja_blic` (`idBlic`),
  ADD KEY `prednja_fokus` (`idAutofokus`),
  ADD KEY `prednjaKamera` (`idKamera`);

--
-- Indexes for table `procesor`
--
ALTER TABLE `procesor`
  ADD PRIMARY KEY (`idProcesor`),
  ADD UNIQUE KEY `nazivProcesor` (`nazivProcesor`),
  ADD KEY `procesorChipset` (`idChipset`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`idRam`),
  ADD UNIQUE KEY `uniqueRam` (`memorija`);

--
-- Indexes for table `rezolucija`
--
ALTER TABLE `rezolucija`
  ADD PRIMARY KEY (`idRezolucija`),
  ADD UNIQUE KEY `nazivRezolucija` (`nazivRezolucija`);

--
-- Indexes for table `telefon`
--
ALTER TABLE `telefon`
  ADD PRIMARY KEY (`idTelefon`),
  ADD UNIQUE KEY `coverSlika` (`coverSlika`),
  ADD KEY `markaTelefon` (`idMarka`),
  ADD KEY `osTelefon` (`idOs`),
  ADD KEY `chipTelefon` (`idChipset`),
  ADD KEY `dodirTelefon` (`idNaDodir`),
  ADD KEY `rezolucijaTelefon` (`idRezolucija`),
  ADD KEY `vrsrtaEkranaTelefon` (`idVrstaEkrana`),
  ADD KEY `baterijaTipTelefon` (`idBaterijaTip`),
  ADD KEY `kapacitetBaterijaTelefon` (`idBaterijaKapacitet`),
  ADD KEY `ramTelefon` (`idRam`),
  ADD KEY `internaTelefon` (`idInterna`),
  ADD KEY `eksternaTelefon` (`idEksterna`),
  ADD KEY `wifiTelefon` (`idWifi`),
  ADD KEY `bluetoothTelefon` (`idBluetooth`),
  ADD KEY `usbTelefon` (`idUsb`),
  ADD KEY `nfcTelefon` (`idNfc`),
  ADD KEY `gpsTelefon` (`idGps`),
  ADD KEY `tezinaTelefon` (`idTezina`),
  ADD KEY `velicinaTelefon` (`idVelicinaEkrana`);

--
-- Indexes for table `tezina`
--
ALTER TABLE `tezina`
  ADD PRIMARY KEY (`idTezina`),
  ADD UNIQUE KEY `vrednost` (`vrednost`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`idUloga`),
  ADD UNIQUE KEY `nazivUloga` (`nazivUloga`);

--
-- Indexes for table `usb`
--
ALTER TABLE `usb`
  ADD PRIMARY KEY (`idUsb`),
  ADD UNIQUE KEY `nazivUsb` (`nazivUsb`);

--
-- Indexes for table `velicina_ekrana`
--
ALTER TABLE `velicina_ekrana`
  ADD PRIMARY KEY (`idVelicinaEkrana`),
  ADD UNIQUE KEY `vrednostVelicina` (`vrednostVelicina`);

--
-- Indexes for table `video_zapis`
--
ALTER TABLE `video_zapis`
  ADD PRIMARY KEY (`idVideoZapis`),
  ADD UNIQUE KEY `nazivVideo` (`nazivVideo`);

--
-- Indexes for table `vrsta_ekrana`
--
ALTER TABLE `vrsta_ekrana`
  ADD PRIMARY KEY (`idVrstaEkrana`),
  ADD UNIQUE KEY `nazivEkrana` (`nazivEkrana`);

--
-- Indexes for table `wifi`
--
ALTER TABLE `wifi`
  ADD PRIMARY KEY (`idWifi`);

--
-- Indexes for table `zadnja_specifikacija`
--
ALTER TABLE `zadnja_specifikacija`
  ADD PRIMARY KEY (`idZadnjaSpecifikacija`),
  ADD KEY `zadnja_telefon` (`idTelefon`),
  ADD KEY `zadnja_hdr` (`idHdr`),
  ADD KEY `zadnja_osmeh` (`idDetekcijaOsmeha`),
  ADD KEY `zadnja_video` (`idVideoZapis`),
  ADD KEY `zadnja_blic` (`idBlic`),
  ADD KEY `zadnja_fokus` (`idAutofokus`),
  ADD KEY `kameraZadnja` (`idKamera`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autofokus`
--
ALTER TABLE `autofokus`
  MODIFY `idAutofokus` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `baterija_kapacitet`
--
ALTER TABLE `baterija_kapacitet`
  MODIFY `idBaterijaKapacitet` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `baterija_tip`
--
ALTER TABLE `baterija_tip`
  MODIFY `idBaterijaTip` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blic`
--
ALTER TABLE `blic`
  MODIFY `idBlic` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bluetooth`
--
ALTER TABLE `bluetooth`
  MODIFY `idBluetooth` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cenovnik`
--
ALTER TABLE `cenovnik`
  MODIFY `idCenovnik` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chipset`
--
ALTER TABLE `chipset`
  MODIFY `idChipset` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detekcija_osmeha`
--
ALTER TABLE `detekcija_osmeha`
  MODIFY `idDetekcijaOsmeha` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eksterna`
--
ALTER TABLE `eksterna`
  MODIFY `idEksterna` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gps`
--
ALTER TABLE `gps`
  MODIFY `idGps` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hdr`
--
ALTER TABLE `hdr`
  MODIFY `idHdr` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `interna`
--
ALTER TABLE `interna`
  MODIFY `idInterna` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `izvestaji`
--
ALTER TABLE `izvestaji`
  MODIFY `idIzvestaji` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kamera`
--
ALTER TABLE `kamera`
  MODIFY `idKamera` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `idKontakt` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnik` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `idKorpa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `marka`
--
ALTER TABLE `marka`
  MODIFY `idMarka` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `memorija`
--
ALTER TABLE `memorija`
  MODIFY `idMemorija` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mreza2g`
--
ALTER TABLE `mreza2g`
  MODIFY `id2g` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mreza3g`
--
ALTER TABLE `mreza3g`
  MODIFY `id3g` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mreza4g`
--
ALTER TABLE `mreza4g`
  MODIFY `id4g` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `na_dodir`
--
ALTER TABLE `na_dodir`
  MODIFY `idNaDodir` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nfc`
--
ALTER TABLE `nfc`
  MODIFY `idNfc` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `idOs` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `os_verzija`
--
ALTER TABLE `os_verzija`
  MODIFY `idOsVerzija` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `porudzbina`
--
ALTER TABLE `porudzbina`
  MODIFY `idPorudzbina` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prednja_specifikacija`
--
ALTER TABLE `prednja_specifikacija`
  MODIFY `idPrednjaSpecifikacija` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `procesor`
--
ALTER TABLE `procesor`
  MODIFY `idProcesor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `idRam` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rezolucija`
--
ALTER TABLE `rezolucija`
  MODIFY `idRezolucija` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `telefon`
--
ALTER TABLE `telefon`
  MODIFY `idTelefon` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tezina`
--
ALTER TABLE `tezina`
  MODIFY `idTezina` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `usb`
--
ALTER TABLE `usb`
  MODIFY `idUsb` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `velicina_ekrana`
--
ALTER TABLE `velicina_ekrana`
  MODIFY `idVelicinaEkrana` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `vrsta_ekrana`
--
ALTER TABLE `vrsta_ekrana`
  MODIFY `idVrstaEkrana` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wifi`
--
ALTER TABLE `wifi`
  MODIFY `idWifi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `zadnja_specifikacija`
--
ALTER TABLE `zadnja_specifikacija`
  MODIFY `idZadnjaSpecifikacija` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cenovnik`
--
ALTER TABLE `cenovnik`
  ADD CONSTRAINT `cenovnikTelefon` FOREIGN KEY (`idTelefon`) REFERENCES `telefon` (`idTelefon`);

--
-- Constraints for table `izvestaji`
--
ALTER TABLE `izvestaji`
  ADD CONSTRAINT `izvestajKorisnik` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `mestoKorisnik` FOREIGN KEY (`idMesta`) REFERENCES `mesto` (`idMesta`),
  ADD CONSTRAINT `ulogaKorisnik` FOREIGN KEY (`idUloga`) REFERENCES `uloga` (`idUloga`);

--
-- Constraints for table `korpa`
--
ALTER TABLE `korpa`
  ADD CONSTRAINT `korpaKorisnik` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`);

--
-- Constraints for table `os_verzija`
--
ALTER TABLE `os_verzija`
  ADD CONSTRAINT `osVerzija` FOREIGN KEY (`idOs`) REFERENCES `os` (`idOs`);

--
-- Constraints for table `porudzbina`
--
ALTER TABLE `porudzbina`
  ADD CONSTRAINT `cenovnikPorudzbina` FOREIGN KEY (`idCenovnik`) REFERENCES `cenovnik` (`idCenovnik`),
  ADD CONSTRAINT `korpaPorudzbina` FOREIGN KEY (`idKorpa`) REFERENCES `korpa` (`idKorpa`);

--
-- Constraints for table `prednja_specifikacija`
--
ALTER TABLE `prednja_specifikacija`
  ADD CONSTRAINT `prednjaKamera` FOREIGN KEY (`idKamera`) REFERENCES `kamera` (`idKamera`),
  ADD CONSTRAINT `prednja_blic` FOREIGN KEY (`idBlic`) REFERENCES `blic` (`idBlic`),
  ADD CONSTRAINT `prednja_fokus` FOREIGN KEY (`idAutofokus`) REFERENCES `autofokus` (`idAutofokus`),
  ADD CONSTRAINT `prednja_hdr` FOREIGN KEY (`idHdr`) REFERENCES `hdr` (`idHdr`),
  ADD CONSTRAINT `prednja_osmeh` FOREIGN KEY (`idDetekcijaOsmeha`) REFERENCES `detekcija_osmeha` (`idDetekcijaOsmeha`),
  ADD CONSTRAINT `prednja_video` FOREIGN KEY (`idVideoZapis`) REFERENCES `video_zapis` (`idVideoZapis`),
  ADD CONSTRAINT `telefonPrednjaSpecKamera` FOREIGN KEY (`idTelefon`) REFERENCES `telefon` (`idTelefon`);

--
-- Constraints for table `procesor`
--
ALTER TABLE `procesor`
  ADD CONSTRAINT `procesorChipset` FOREIGN KEY (`idChipset`) REFERENCES `chipset` (`idChipset`);

--
-- Constraints for table `telefon`
--
ALTER TABLE `telefon`
  ADD CONSTRAINT `baterijaTipTelefon` FOREIGN KEY (`idBaterijaTip`) REFERENCES `baterija_tip` (`idBaterijaTip`),
  ADD CONSTRAINT `bluetoothTelefon` FOREIGN KEY (`idBluetooth`) REFERENCES `bluetooth` (`idBluetooth`),
  ADD CONSTRAINT `chipTelefon` FOREIGN KEY (`idChipset`) REFERENCES `chipset` (`idChipset`),
  ADD CONSTRAINT `dodirTelefon` FOREIGN KEY (`idNaDodir`) REFERENCES `na_dodir` (`idNaDodir`),
  ADD CONSTRAINT `eksternaTelefon` FOREIGN KEY (`idEksterna`) REFERENCES `eksterna` (`idEksterna`),
  ADD CONSTRAINT `gpsTelefon` FOREIGN KEY (`idGps`) REFERENCES `gps` (`idGps`),
  ADD CONSTRAINT `internaTelefon` FOREIGN KEY (`idInterna`) REFERENCES `interna` (`idInterna`),
  ADD CONSTRAINT `kapacitetBaterijaTelefon` FOREIGN KEY (`idBaterijaKapacitet`) REFERENCES `baterija_kapacitet` (`idBaterijaKapacitet`),
  ADD CONSTRAINT `markaTelefon` FOREIGN KEY (`idMarka`) REFERENCES `marka` (`idMarka`),
  ADD CONSTRAINT `nfcTelefon` FOREIGN KEY (`idNfc`) REFERENCES `nfc` (`idNfc`),
  ADD CONSTRAINT `osTelefon` FOREIGN KEY (`idOs`) REFERENCES `os` (`idOs`),
  ADD CONSTRAINT `ramTelefon` FOREIGN KEY (`idRam`) REFERENCES `ram` (`idRam`),
  ADD CONSTRAINT `rezolucijaTelefon` FOREIGN KEY (`idRezolucija`) REFERENCES `rezolucija` (`idRezolucija`),
  ADD CONSTRAINT `tezinaTelefon` FOREIGN KEY (`idTezina`) REFERENCES `tezina` (`idTezina`),
  ADD CONSTRAINT `usbTelefon` FOREIGN KEY (`idUsb`) REFERENCES `usb` (`idUsb`),
  ADD CONSTRAINT `velicinaTelefon` FOREIGN KEY (`idVelicinaEkrana`) REFERENCES `velicina_ekrana` (`idVelicinaEkrana`),
  ADD CONSTRAINT `vrsrtaEkranaTelefon` FOREIGN KEY (`idVrstaEkrana`) REFERENCES `vrsta_ekrana` (`idVrstaEkrana`),
  ADD CONSTRAINT `wifiTelefon` FOREIGN KEY (`idWifi`) REFERENCES `wifi` (`idWifi`);

--
-- Constraints for table `zadnja_specifikacija`
--
ALTER TABLE `zadnja_specifikacija`
  ADD CONSTRAINT `kameraZadnja` FOREIGN KEY (`idKamera`) REFERENCES `kamera` (`idKamera`),
  ADD CONSTRAINT `zadnja_blic` FOREIGN KEY (`idBlic`) REFERENCES `blic` (`idBlic`),
  ADD CONSTRAINT `zadnja_fokus` FOREIGN KEY (`idAutofokus`) REFERENCES `autofokus` (`idAutofokus`),
  ADD CONSTRAINT `zadnja_hdr` FOREIGN KEY (`idHdr`) REFERENCES `hdr` (`idHdr`),
  ADD CONSTRAINT `zadnja_osmeh` FOREIGN KEY (`idDetekcijaOsmeha`) REFERENCES `detekcija_osmeha` (`idDetekcijaOsmeha`),
  ADD CONSTRAINT `zadnja_telefon` FOREIGN KEY (`idTelefon`) REFERENCES `telefon` (`idTelefon`),
  ADD CONSTRAINT `zadnja_video` FOREIGN KEY (`idVideoZapis`) REFERENCES `video_zapis` (`idVideoZapis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
