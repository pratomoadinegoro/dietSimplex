-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2017 at 04:48 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nutrisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktifitas`
--

CREATE TABLE IF NOT EXISTS `aktifitas` (
  `id_aktifitas` int(1) NOT NULL,
  `aktifitas` varchar(30) NOT NULL,
  `rumus` varchar(20) NOT NULL,
  `deskripsi` varchar(400) NOT NULL,
  PRIMARY KEY (`id_aktifitas`),
  KEY `id_aktifitas` (`id_aktifitas`),
  KEY `id_aktifitas_2` (`id_aktifitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktifitas`
--

INSERT INTO `aktifitas` (`id_aktifitas`, `aktifitas`, `rumus`, `deskripsi`) VALUES
(1, 'Sedentary', 'BMR x 1.2', 'tidak beraktivitas atau hanya melakukan aktivitas kecil saja'),
(2, 'Mild activity level ', 'BMR x 1.3 - 1.375', 'aktivitas ringan seperti berolahraga satu hingga tiga kali dalam seminggu'),
(3, 'Moderate activity level ', 'BMR x 1.5 - 1.55', 'aktivitas berat menengah dimana seperti melakukan olahraga tiga hingga lima kali dalam seminggu'),
(4, 'Heavy or (Labor-intensive) act', 'BMR x 1.7', 'aktivitas berat menengah dimana seperti melakukan olahraga tiga hingga lima kali dalam seminggu'),
(5, 'Extreme level ', 'BMR x 1.9', 'aktivitas sangat berat atau ekstrem yaitu seperti berolahraga dua kali dalam sehari selama seminggu dan bekerja fisik');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE IF NOT EXISTS `biodata` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `umur` int(3) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `bBadan` float NOT NULL,
  `tBadan` float NOT NULL,
  `id_aktifitas` int(1) NOT NULL,
  PRIMARY KEY (`username`,`id_aktifitas`),
  KEY `id_aktifitas` (`id_aktifitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`username`, `nama`, `umur`, `jenis_kelamin`, `bBadan`, `tBadan`, `id_aktifitas`) VALUES
('adinegoro', 'adinegoro', 6, 'lakilaki', 20, 115, 1),
('akbarjoe', 'akbar joe taslim', 22, 'L', 65, 170, 1),
('akbarkim', 'hakim bao', 22, 'L', 60, 180, 1),
('Andri', 'Andri H', 28, 'L', 45, 182, 5),
('ani2', 'ani2', 6, 'perempuan', 20, 115, 1),
('budi', 'budi', 4, 'lakilaki', 16, 103, 1),
('budi2', 'budi2', 4, 'perempuan', 16, 103, 1),
('chen', 'chen', 6, 'lakilaki', 20, 115, 3),
('chen2', 'chen', 6, 'perempuan', 20, 115, 1),
('cobaumur12', 'cobaumur12', 12, 'lakilaki', 31, 141, 1),
('daffarez', 'Daffarez Elguska', 20, 'L', 62, 166, 3),
('Fadel', 'Fadel Trivandi Dipantara', 22, 'L', 55, 172, 2),
('ghulam', 'Ghulam Mahmudi', 9, 'lakilaki', 28, 132, 2),
('ghulam3', 'ghulam3', 9, 'perempuan', 28, 132, 2),
('hakim10', 'prabowo 10', 22, 'L', 65, 170, 1),
('kukuh', 'kukuh wiliam', 19, 'L', 50, 165, 2),
('novelaksono', 'Novelasari Nadia Putri', 21, 'P', 50, 160, 5),
('pepi', 'pepi pepi', 23, 'L', 69, 168, 2),
('poppy', 'poppy', 7, 'lakilaki', 23, 121, 1),
('poppy2', 'poppy2', 7, 'perempuan', 23, 121, 1),
('randy111', 'randy', 21, 'L', 55, 160, 2),
('rey', 'rey', 6, 'lakilaki', 20, 115, 4),
('rey2', 'rey', 6, 'perempuan', 20, 115, 4),
('rindo', 'rindo', 5, 'lakilaki', 18, 110, 1),
('r_ridho', 'Muhammad Rasyid Ridho', 21, 'L', 55, 182, 2),
('sandro', 'sandro okejohn', 50, 'L', 70, 170, 1),
('sheva', 'shevchenko', 35, 'L', 90, 190, 3),
('tommy', 'pratomo', 21, 'L', 63, 178, 1),
('tommy2', 'tommy', 6, 'lakilaki', 20, 115, 1),
('trotoar', 'hakim', 30, 'L', 60, 180, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_makanan`
--

CREATE TABLE IF NOT EXISTS `menu_makanan` (
  `id_makanan` int(4) NOT NULL,
  `nama_makanan` varchar(30) NOT NULL,
  `kalori` decimal(10,2) NOT NULL,
  `protein` decimal(10,2) NOT NULL,
  `lemak` decimal(10,2) NOT NULL,
  `karbohidrat` decimal(10,2) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_makanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_makanan`
--

INSERT INTO `menu_makanan` (`id_makanan`, `nama_makanan`, `kalori`, `protein`, `lemak`, `karbohidrat`, `harga`) VALUES
(1, 'Nasi Putih', 178.00, 2.10, 0.10, 40.60, 2300),
(2, 'Nasi Beras Merah', 179.50, 3.75, 0.45, 38.50, 2750),
(3, 'Nasi Beras Hitam', 150.00, 5.40, 0.50, 40.00, 3500),
(4, 'Nasi Jagung', 149.00, 4.10, 1.30, 30.30, 1500),
(5, 'Papeda', 84.80, 61.00, 0.20, 14.90, 1750),
(6, 'Nasi Uduk', 232.00, 3.00, 12.00, 28.00, 3500),
(7, 'Nasi Tim daging', 250.00, 11.00, 15.40, 56.10, 4000),
(8, 'nasi minyak', 265.00, 15.00, 17.00, 62.00, 4500),
(9, 'Nasi Goreng', 250.00, 6.30, 6.23, 21.06, 3000),
(10, 'Ketupat', 182.00, 1.90, 0.10, 42.00, 1000),
(11, 'Nasi Bakar', 195.00, 1.80, 2.50, 48.00, 1500),
(12, 'Nasi Liwet', 365.00, 7.13, 0.66, 79.85, 2350),
(13, 'Buras', 88.00, 2.30, 1.30, 16.70, 750),
(14, 'Sereal Beras', 432.00, 5.43, 12.90, 73.76, 5000),
(15, 'Nasi Kuning', 475.00, 7.80, 15.80, 80.00, 3000),
(16, 'Bubur kacang Hijau', 205.00, 5.00, 3.20, 45.00, 2000),
(17, 'Bubur Sumsum', 170.00, 3.80, 2.10, 34.00, 1000),
(18, 'Bubur Tinotuan', 350.00, 19.00, 8.30, 34.70, 2500),
(19, 'bubur ayam', 372.00, 27.50, 12.30, 36.12, 1600),
(20, 'Pulut', 216.00, 2.60, 3.10, 44.40, 750),
(21, 'Ketan Hitam', 169.00, 3.51, 0.33, 36.70, 1800),
(22, 'Ketan putih', 178.00, 3.00, 0.33, 37.00, 1850),
(23, 'Roti tawar bakar', 264.00, 9.60, 3.20, 48.90, 1400),
(24, 'Roti gandum', 285.00, 10.00, 4.00, 52.00, 1600),
(25, 'bubur jagung', 91.50, 2.56, 0.34, 23.10, 1500),
(26, 'oatmeal', 130.00, 3.00, 0.00, 28.00, 2000),
(27, 'bubur wortel', 7.30, 1.40, 0.00, 56.00, 1500),
(28, 'bubur kacang merah', 106.00, 3.90, 3.60, 53.20, 3000),
(29, 'Bubur Ketan Hitam', 189.00, 5.01, 2.00, 40.00, 2500),
(30, 'Bubur Manado', 300.00, 38.90, 15.00, 69.00, 3000),
(31, 'Tahu Goreng', 271.00, 17.19, 20.18, 10.49, 1000),
(32, 'pepes tahu', 126.00, 11.42, 7.11, 4.29, 1950),
(33, 'Sapo tahu', 150.00, 19.90, 6.60, 2.70, 3500),
(34, 'Tahu isi Ayam', 112.00, 8.54, 5.53, 7.72, 1750),
(35, 'Tempe', 193.00, 18.54, 10.80, 9.39, 850),
(36, 'Ayam Panggang', 147.00, 16.70, 8.36, 0.00, 2950),
(37, 'Ayam Kecap', 150.00, 15.00, 9.60, 0.00, 2750),
(38, 'Sop Ayam', 75.00, 1.05, 2.46, 9.36, 2600),
(39, 'Gulai Ikan', 126.00, 4.20, 9.20, 6.20, 6000),
(40, 'Bakmie Ayam', 356.00, 35.00, 12.50, 30.00, 3500),
(41, 'Dendeng Sapi', 476.00, 45.00, 9.80, 4.20, 18000),
(42, 'Burung Puyuh', 131.00, 20.20, 4.30, 4.80, 5000),
(43, 'dendeng Itik', 496.00, 30.30, 33.50, 18.40, 7500),
(44, 'Ayam Taliwang', 264.00, 18.20, 20.10, 2.70, 8500),
(45, 'Tenggiri', 109.00, 21.50, 2.60, 0.00, 4500),
(46, 'Gudeg', 345.00, 40.50, 12.00, 5.00, 3500),
(47, 'Ikan Belida Bakar', 128.00, 18.00, 3.00, 7.20, 6000),
(48, 'Ikan Cakalang', 107.00, 19.60, 0.70, 5.50, 7500),
(49, 'Ikan baronang', 78.00, 14.50, 0.60, 3.70, 4500),
(50, 'Gulai Telur Ikan', 146.00, 12.30, 7.10, 8.10, 6000),
(51, 'Sate Ayam', 225.00, 19.54, 14.82, 1.89, 1000),
(52, 'Abon Ikan', 435.00, 27.20, 20.20, 36.10, 8750),
(53, 'Ikan patin bakar', 144.00, 17.50, 6.30, 4.30, 5750),
(54, 'gulai Ikan paya', 148.00, 10.00, 9.80, 5.00, 7500),
(55, 'coto makasar', 84.00, 6.00, 6.00, 1.40, 10500),
(56, 'Teri', 74.00, 10.30, 1.40, 4.10, 6500),
(57, 'Sidat', 81.00, 11.40, 1.90, 3.80, 21500),
(58, 'Tuna', 92.00, 20.00, 0.70, 0.00, 10750),
(59, 'Hati sapi', 132.00, 19.70, 3.20, 6.00, 15000),
(60, 'abon sapi', 212.00, 18.00, 10.60, 59.30, 5650),
(61, 'pindang', 124.00, 9.50, 9.60, 0.00, 4500),
(62, 'bandeng presto', 296.00, 17.10, 20.30, 11.30, 7750),
(63, 'soto ayam', 312.00, 24.01, 14.92, 19.55, 2500),
(64, 'telur ayam', 162.00, 12.80, 11.50, 0.70, 1500),
(65, 'telur bebek', 189.00, 13.10, 14.50, 0.80, 1700),
(66, 'telur puyuh', 168.00, 12.30, 12.70, 1.20, 1800),
(67, 'ikan lele', 204.00, 14.93, 12.35, 12.35, 1750),
(68, 'ikan kembung', 167.00, 19.23, 9.30, 0.00, 1600),
(69, 'ikan nila', 128.00, 26.15, 2.65, 0.00, 3450),
(70, 'ikan tuna sirip biru', 144.00, 23.33, 4.90, 0.00, 6575),
(71, 'ikan kakap', 100.00, 20.51, 1.34, 0.00, 7800),
(72, 'ikan salmon', 183.00, 19.90, 10.85, 0.00, 2500),
(73, 'ikan tongkol', 110.00, 23.87, 0.92, 0.00, 2000),
(74, 'Bihun goreng', 192.00, 1.60, 0.35, 43.82, 1000),
(75, 'ayam kecap', 421.00, 16.70, 18.74, 46.21, 1850),
(76, 'mie telur goreng', 146.00, 5.38, 1.69, 27.08, 2000),
(77, 'telur orak arik', 199.00, 13.01, 15.21, 1.96, 2150),
(78, 'telur balado', 202.00, 10.21, 16.43, 3.40, 2550),
(79, 'kari ayam', 124.00, 11.47, 6.67, 4.74, 3250),
(80, 'kari daging sapi', 184.00, 11.69, 12.96, 2.80, 8000),
(81, 'rendang', 195.00, 19.68, 11.07, 4.49, 9000),
(82, 'daging kornet', 251.00, 18.71, 18.89, 0.47, 6750),
(83, 'sosis ayam', 172.00, 17.82, 9.98, 1.52, 2000),
(84, 'sosis sapi', 325.00, 11.04, 29.80, 3.99, 3500),
(85, 'dimsum', 112.00, 11.55, 2.64, 9.56, 1000),
(86, 'rawon daging', 119.00, 9.60, 7.40, 3.48, 6750),
(87, 'mie china', 237.00, 3.77, 13.84, 25.89, 8750),
(88, 'bothok', 336.00, 23.40, 3.20, 59.90, 1000),
(89, 'gulai telur ikan', 146.00, 12.30, 7.10, 8.10, 6000),
(90, 'oncom', 187.00, 13.00, 6.00, 22.60, 2350),
(91, 'kembang tahu', 380.00, 48.90, 13.80, 23.30, 4000),
(92, 'bawal goreng', 96.00, 4.16, 1.70, 2.00, 5000),
(93, 'soto banjar', 110.00, 2.90, 9.50, 3.20, 4500),
(94, 'sop konro', 71.00, 7.40, 2.60, 4.50, 11850),
(95, 'Sayur Bayam', 74.00, 5.33, 4.16, 6.81, 1700),
(96, 'Brokoli', 20.00, 3.50, 0.10, 3.10, 3200),
(97, 'perkedel kentang', 83.00, 2.00, 0.10, 19.10, 1350),
(98, 'Macaroni Panggang', 365.00, 8.70, 0.40, 78.70, 4500),
(99, 'Sup Kembang Tahu', 380.00, 48.90, 13.80, 23.30, 4000),
(100, 'Cah Jamur Kuping', 21.00, 3.80, 0.60, 0.90, 2700),
(101, 'Capjay', 189.00, 11.30, 15.70, 0.60, 5000),
(102, 'Sayur asem', 85.00, 1.10, 0.80, 0.70, 2300),
(103, 'kembang kol', 22.00, 2.80, 0.50, 1.12, 3450),
(104, 'sup kubis', 71.00, 3.92, 3.26, 7.69, 2650),
(105, 'sop brokoli', 20.00, 3.50, 0.10, 3.10, 3200),
(106, 'bayam merah', 5.10, 4.60, 0.50, 10.00, 2150),
(107, 'oseng daun singkong', 60.00, 1.10, 7.10, 2.40, 1450),
(108, 'oseng kangkung', 92.00, 2.20, 9.20, 2.00, 1700),
(109, 'sayur lodeh', 104.00, 3.48, 2.62, 17.44, 2000),
(110, 'urap', 112.00, 2.32, 7.65, 10.89, 1500),
(111, 'pecel', 463.00, 15.63, 30.38, 40.04, 2350),
(112, 'sayur sop', 90.00, 10.70, 4.00, 4.70, 2000),
(113, 'sayur buntil', 1441.00, 4.10, 10.20, 8.00, 1750),
(114, 'gado-gado', 203.00, 6.70, 8.70, 24.60, 2500),
(115, 'sayur tumis toge', 114.00, 3.40, 5.00, 0.00, 1000),
(116, 'tumis bayam', 193.00, 2.00, 0.00, 0.00, 850),
(117, 'sayur telur wortel', 140.00, 10.70, 0.50, 0.00, 3500),
(118, 'cah brokoli', 249.00, 12.45, 7.00, 5.00, 3750),
(119, 'tumis teri buncis', 158.00, 33.50, 3.00, 5.00, 2000),
(120, 'Alpukat', 322.00, 1.02, 29.47, 17.45, 3000),
(121, 'apel', 72.00, 0.36, 0.23, 19.06, 1500),
(122, 'jambu biji', 49.00, 0.90, 0.20, 12.20, 1750),
(123, 'jeruk manis', 45.00, 0.90, 0.20, 12.40, 3500),
(124, 'semangka', 30.00, 0.61, 0.15, 7.55, 3250),
(125, 'jus strawberry', 32.00, 0.67, 0.23, 7.68, 1650),
(126, 'pepaya', 55.00, 0.85, 0.20, 13.37, 3000),
(127, 'jeruk mandarin', 37.00, 0.57, 0.22, 9.34, 3750),
(128, 'pisang ambon', 99.00, 1.20, 0.20, 20.90, 2000),
(129, 'mangga', 107.00, 0.84, 0.45, 28.05, 1850),
(130, 'melon', 19.00, 0.46, 0.10, 4.49, 2250),
(131, 'susu sapi', 122.00, 8.03, 4.88, 11.49, 950),
(132, 'susu kedelai', 54.00, 4.69, 1.99, 5.10, 500),
(133, 'pisang susu', 118.00, 1.20, 0.20, 31.80, 1850),
(134, 'pisang cavandis', 150.00, 6.00, 0.20, 40.80, 3000),
(135, 'Ubi Kuning', 72.60, 119.00, 0.50, 25.10, 1000),
(136, 'Singkong Rebus', 77.80, 88.00, 0.40, 20.60, 1300),
(137, 'Onde- Onde', 336.00, 4.00, 57.80, 57.80, 2000),
(138, 'Apem', 148.00, 2.00, 0.50, 33.90, 1500),
(139, 'Rangginang', 471.00, 4.70, 21.80, 64.10, 3500),
(140, 'Bingka Ambon', 273.00, 53.00, 10.60, 39.10, 1750),
(141, 'Bolu Pecah', 197.00, 3.30, 4.60, 35.60, 1000),
(142, 'Putu Mayang', 121.00, 1.70, 3.40, 18.10, 1000),
(143, 'Srikaya Ketan', 265.00, 2.70, 6.40, 49.10, 2500),
(144, 'Kue Putu Singkong', 217.00, 1.20, 0.50, 53.20, 2000),
(145, 'Kue Kelapa', 591.00, 56.50, 42.10, 47.50, 3000),
(146, 'Biskuit', 458.00, 6.90, 14.40, 75.10, 3000),
(147, 'Roti Kukus', 249.00, 5.10, 2.10, 52.50, 3500),
(148, 'Bakpao', 239.00, 12.20, 2.60, 41.60, 3000),
(149, 'Pastel', 208.00, 5.20, 15.40, 31.40, 2000),
(150, 'Risoles', 134.00, 2.10, 1.40, 28.80, 2500),
(151, 'Kelepon', 215.00, 3.70, 3.70, 41.80, 2000),
(152, 'Kue Bakpia', 272.00, 3.70, 6.70, 44.10, 3500),
(153, 'Nagasari', 166.00, 6.30, 2.80, 32.90, 2500),
(154, 'Kue Lumpur', 591.00, 5.60, 42.10, 47.50, 3500),
(155, 'Pandan Cake', 86.00, 1.00, 5.00, 9.60, 2300),
(156, 'Brownies', 129.00, 1.62, 4.68, 21.26, 3200),
(157, 'Donat', 133.00, 1.40, 8.68, 13.44, 2500),
(158, 'Kue Coklat', 235.00, 2.26, 10.50, 34.68, 3750),
(159, 'Kue Sus', 182.00, 4.58, 10.92, 16.58, 1800),
(160, 'Ubi Madu', 91.00, 21.00, 0.20, 27.00, 2000),
(161, 'Kue keju', 257.00, 4.00, 18.00, 20.40, 4750),
(162, 'Puding Coklat', 157.00, 3.05, 4.52, 25.99, 2950),
(163, 'Puding Vanilla', 147.00, 2.60, 4.07, 24.48, 2500),
(164, 'Puding Tapioka', 134.00, 2.26, 21.92, 4.18, 2000),
(165, 'Kue Beras Merah', 35.00, 0.75, 0.25, 7.34, 1750),
(166, 'Roti Bakar', 89.00, 6.00, 7.10, 35.00, 1500),
(167, 'Martabak Manis', 79.00, 5.00, 12.00, 33.00, 2150),
(168, 'Lemper', 95.00, 7.00, 6.45, 55.00, 2000),
(169, 'Orem-Orem', 87.00, 6.70, 5.44, 50.00, 1500),
(170, 'Perut Ayam', 76.00, 2.70, 6.70, 35.00, 1000),
(171, 'Kue Gandum', 450.00, 6.20, 18.10, 18.00, 2450),
(172, 'Kroket Ayam', 7.30, 1.20, 2.80, 0.70, 1750),
(173, 'Gethuk Singkong', 70.00, 2.40, 1.60, 11.20, 1000),
(174, 'Gethuk Lindri', 75.00, 3.70, 2.30, 14.00, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`) VALUES
('adinegoro', 'adinegoro1'),
('akbarjoe', 'akbarjoe'),
('akbarkim', 'kimkim'),
('Andri', '12345'),
('ani', 'ani123'),
('ani2', 'ani123'),
('budi', 'budi123'),
('budi2', 'budi123'),
('chen', 'chen123'),
('chen2', 'chen123'),
('coba', 'coba123'),
('coba2', 'coba123'),
('cobaumur12', 'coba123'),
('daffarez', 'daffarez'),
('Fadel', 'fadeltd'),
('ghulam', 'ghulam123'),
('ghulam2', 'ghulam123'),
('ghulam3', 'ghulam123'),
('hakim10', 'hakim10'),
('kukuh', '12345'),
('mencoba', 'mencoba'),
('mencoba2', 'mencoba'),
('novelaksono', '182182182'),
('pepi', 'pepi'),
('poppy', 'poppy123'),
('poppy2', 'poppy123'),
('randy111', '12345'),
('rey', 'rey123'),
('rey2', 'rey123'),
('rindo', 'rindo123'),
('r_ridho', '123qwe'),
('sandro', 'sandro'),
('sheva', 'sheva'),
('tommy', 'tommy123'),
('tommy2', 'tommy123'),
('trotoar', 'desdes');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `id_record` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `kebutuhan_gizi` varchar(1000) NOT NULL,
  `biaya` int(11) NOT NULL,
  PRIMARY KEY (`id_record`,`tanggal`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id_record`, `tanggal`, `username`, `kebutuhan_gizi`, `biaya`) VALUES
(8, '2015-12-30', 'hakim10', 'Nasi Jagung = 1049.0087 gram # Nasi Uduk = 524.08596 gram # nasi minyak = 15 gram # Ikan patin bakar = 65.33543 gram # gulai Ikan paya = 15 gram # Kue Coklat = 15 gram # ', 26798),
(9, '2016-01-13', 'hakim10', 'Nasi Beras Hitam = 126.34887 gram # Nasi Jagung = 150 gram # Bubur Tinotuan = 150 gram # bubur ayam = 406.36078 gram # Ketan Hitam = 150 gram # Ketan putih = 150 gram # ', 16509),
(10, '2016-01-14', 'hakim10', 'Nasi Beras Hitam = 0 gram # Nasi Jagung = 0 gram # Sereal Beras = 0 gram # Nasi Kuning = 603.31891 gram # ', 919509),
(11, '2016-12-30', 'tommy', 'Tempe = 1041.85825 gram # mangga = 899.05979 gram # melon = 150 gram # ', 19242),
(12, '2016-12-31', 'tommy', 'Nasi Putih = 817.52765 gram # Ayam Panggang = 150 gram # telur ayam = 818.25999 gram # ', 23668),
(13, '2017-01-02', 'tommy', 'Nasi Putih = 829.04937 gram # Ayam Panggang = 872.49831 gram # telur ayam = 150 gram # ', 0),
(14, '2017-01-09', 'tommy2', 'Nasi Putih = 341.60311 gram <br> Ketan Hitam = 150 gram <br> Ayam Kecap = 573.72498 gram <br> ', -15544),
(15, '2017-01-13', 'tommy2', 'Nasi Putih = 150 gram <br> abon sapi = 150 gram <br> ayam kecap = 270.10475 gram <br> ', -11281),
(16, '2017-04-25', 'tommy2', 'Gethuk Singkong = 2299.48714 gram # Gethuk Lindri = 150 gram # ', -16830),
(17, '2017-04-27', 'budi2', 'Gethuk Singkong = 1920.53314 gram # Gethuk Lindri = 150 gram # ', -14304),
(18, '2017-05-03', 'ani2', 'Nasi Jagung = 186.59332 gram <br> Nasi Tim daging = 150 gram <br> sosis ayam = 150 gram <br> apel = 150 gram <br> susu kedelai = 1101.81843 gram <br> ', -13039),
(19, '2017-05-03', 'tommy2', 'Nasi Putih = 374.41059 gram <br> Tahu Goreng = 150 gram <br> Tempe = 336.36796 gram <br> ', -8647),
(20, '2017-05-03', 'ghulam', 'Nasi Putih = 459.30406 gram <br> Tahu Goreng = 150 gram <br> Tempe = 512.1676 gram <br> ', -10945),
(21, '2017-05-03', 'rey', 'Gethuk Singkong = 3324.57107 gram <br> Gethuk Lindri = 150 gram <br> ', -23664),
(22, '2017-05-03', 'rey2', 'Gethuk Singkong = 3105.72643 gram <br> Gethuk Lindri = 150 gram <br> ', -22205),
(23, '2017-05-03', 'tommy2', 'Nasi Putih = 458.44724 gram <br> Sate Ayam = 402.71329 gram <br>', -9714),
(24, '2017-05-03', 'chen', 'Nasi Putih = 572.15167 gram <br> Sate Ayam = 388.40946 gram <br> sosis ayam = 150 gram <br>', -13362),
(25, '2017-05-03', 'tommy2', 'Nasi Putih = 386.78752 gram <br> Tempe = 360.70426 gram <br> Sate Ayam = 150 gram <br>', -8975),
(26, '2017-05-03', 'ani2', 'Nasi Putih = 429.66087 gram <br> Sate Ayam = 377.42651 gram <br> ', -9104),
(27, '2017-05-04', 'poppy', 'Gethuk Singkong = 2470.79057 gram <br> Gethuk Lindri = 150 gram <br> ', -17972),
(28, '2017-05-04', 'poppy', 'Nasi Putih = 395.16855 gram <br> Tahu Goreng = 150 gram <br> Tempe = 379.35409 gram <br> ', -9209),
(29, '2017-05-04', 'poppy', 'Nasi Putih = 466.26563 gram <br> Sop Ayam = 150 gram <br> telur ayam = 555.309 gram <br> ', -15302),
(30, '2017-05-04', 'tommy2', 'ayam kecap = 239.81971 gram <br> sosis ayam = 150 gram <br> susu kedelai = 150 gram <br> Roti Kukus = 150 gram <br> ', -8958),
(31, '2017-06-14', 'ghulam', 'Gethuk Singkong = 3000.06386 gram <br> Gethuk Lindri = 150 gram <br> ', -21500),
(32, '2017-06-14', 'ghulam', 'Nasi Putih = 593.82967 gram <br> Ayam Kecap = 150 gram <br> Sate Ayam = 413.56795 gram <br> ', -14613),
(33, '2017-06-14', 'cobaumur12', 'Nasi Putih = 150 gram <br> Roti gandum = 181.08782 gram <br> Tempe = 387.18307 gram <br> Abon Ikan = 150 gram <br> ', -15176),
(34, '2017-06-15', 'tommy2', 'Roti gandum = 269.52316 gram <br> pepes tahu = 150 gram <br> Sop Ayam = 150 gram <br> Abon Ikan = 150 gram <br> ', -16175),
(35, '2017-06-15', 'ani2', 'Nasi Putih = 530.20406 gram <br> Ayam Panggang = 303.90665 gram <br> Sop Ayam = 150 gram <br> Sayur Bayam = 150 gram <br> ', -18407);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `biodata_ibfk_2` FOREIGN KEY (`id_aktifitas`) REFERENCES `aktifitas` (`id_aktifitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `biodata_ibfk_3` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
