-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 03:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lygweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `id` bigint(11) NOT NULL,
  `nama` text DEFAULT NULL,
  `deleted` int(1) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `nama`, `deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'API Marketplace', 0, '2024-01-20 09:11:46', 1, NULL, NULL),
(2, 'API absensi karyawan', 0, '2024-01-20 09:11:58', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `api_list`
--

CREATE TABLE `api_list` (
  `id` bigint(20) NOT NULL,
  `api_id` int(11) DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `ket_nama` text DEFAULT NULL,
  `method` varchar(10) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `struktural` varchar(30) DEFAULT NULL,
  `permintaan` varchar(30) DEFAULT NULL,
  `inputan` text DEFAULT NULL,
  `hasil` text DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_list`
--

INSERT INTO `api_list` (`id`, `api_id`, `nama`, `ket_nama`, `method`, `url`, `struktural`, `permintaan`, `inputan`, `hasil`, `deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 2, 'Melihat Semua yang sudah diupload', 'API ini digunakan untuk mengupload gambar', 'POST', 'http://localhost/erpAdminLteCI3/api/Documentation/list_api/', 'Body', '', '                                                                                                                                                                                              ', '                                                                                                                                                                                                                                                 {\r\n    \"status\": 200,\r\n    \"data\": [\r\n        {\r\n            \"id\": \"313\",\r\n            \"kode\": \"B.222\",\r\n            \"nopol\": \"E 7804 B\"\r\n        },\r\n        {\r\n            \"id\": \"364\",\r\n            \"kode\": \"B.373\",\r\n            \"nopol\": \"E 7684 AA\"\r\n        },\r\n        {\r\n            \"id\": \"352\",\r\n            \"kode\": \"B.333\",\r\n            \"nopol\": \"E 7835 B\"\r\n        },\r\n        {\r\n            \"id\": \"327\",\r\n            \"kode\": \"B.208\",\r\n            \"nopol\": \"E 7780 B\"\r\n        },\r\n        {\r\n            \"id\": \"446\",\r\n            \"kode\": \"B.380\",\r\n            \"nopol\": \"E 7709 AA\"\r\n        },\r\n        {\r\n            \"id\": \"448\",\r\n            \"kode\": \"B.381\",\r\n            \"nopol\": \"E 7706 AA\"\r\n        }\r\n    ]\r\n}                                                                                                                                                                                                                        ', 0, '2024-01-20 15:32:26', 1, '2024-01-21 05:59:30', 1),
(3, 2, 'Membuat upload multiple file', 'API ini digunakan pada saat user mengupload bukti transaksi', 'PUT', 'https://chat.openai.com/c/cac8020d-13e9-4850-834f-392c84005e5f', 'Body', 'form-data', 'images : gambar.png\r\nlink : link', '{\r\nresult: 200,\r\ndata : {\r\nberhasil\r\n}\r\n}', 0, '2024-01-21 03:36:46', 1, NULL, NULL),
(4, 2, 'Melihat detail data stok barang digudang', 'Api ini digunakan untuk melihat detail data barang digudang', 'DELETE', 'https://chat.openai.com/c/cac8020d-13e9-4850-834f-392c84005e5f', 'Params', '', '', '{\r\nhasil api disini\r\n}', 0, '2024-01-21 03:40:14', 1, NULL, NULL),
(5, 2, 'API menampilkan slide', 'Api ini digunakan untuk menampilkan slide di menu HOME', 'GET', 'https://chat.openai.com/c/cac8020d-13e9-4850-834f-392c84005e5f', 'Body', 'form-data', '', '{\r\nhasil\r\n}', 0, '2024-01-21 04:08:47', 1, NULL, NULL),
(6, 2, 'BUMPER', 'API ini digunakan pada saat user mengupload bukti transaksi', 'POST', 'https://chat.openai.com/c/cac8020d-13e9-4850-834f-392c84005e5f', 'Body', 'x-www-form-urlencoded', '                    fd                  ', '                    fdf                  ', 0, '2024-01-21 06:03:51', 1, '2024-01-21 06:04:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `hp` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `latitude` text DEFAULT NULL,
  `longitude` text DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `hp`, `alamat`, `img`, `latitude`, `longitude`, `deleted`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('240312103201', 'Yanuar Pratiwi', '089514760700', 'Ds Gamel Kec Plered Cirebon', 'Home-1710214321.jpg', '-6.6912166', '108.4778667', 0, NULL, '2024-03-12 10:32:01', 1, '2024-03-12 10:46:01'),
('240312113929', 'Dinda Lestari', '089514760700', 'Ds Kaliwulu Kec Plered Cirebon', 'Home-1710218369.jpg', '-6.6908973', '108.4778667', 0, 1, '2024-03-12 11:39:29', NULL, NULL),
('240312132900', 'Hendi Suwono', '089514760700', 'Ds Lurah Kec Plumbon Cirebon', 'Home-1710224940.jpg', '-6.6882817', '108.476035', 0, 1, '2024-03-12 13:29:00', 1, '2024-03-13 03:54:05'),
('240313035742', 'Rois Iskandar', '089514760700', 'Ds Pamijahan Kec Plumbon Cirebon', 'Home-1710277062.jpg', '-6.6908973', '108.4778667', 0, 1, '2024-03-13 03:57:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deleted` int(1) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_username` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_username` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama`, `deleted`, `created_by`, `created_username`, `created_at`, `updated_by`, `updated_username`, `updated_at`) VALUES
(1, 'Administrator', 0, 11, 'dikyanwar22', '2023-11-04 23:42:58', NULL, NULL, NULL),
(2, 'Akunting', 0, 11, 'dikyanwar22', '2023-11-04 23:43:36', NULL, NULL, NULL),
(3, 'HRD', 0, 11, 'dikyanwar', '2023-11-04 23:46:39', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lygdestination`
--

CREATE TABLE `lygdestination` (
  `DestinationCode` varchar(20) NOT NULL,
  `DestinationName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lygdestination`
--

INSERT INTO `lygdestination` (`DestinationCode`, `DestinationName`) VALUES
('HK', 'Hongkong'),
('SG', 'Singapore');

-- --------------------------------------------------------

--
-- Table structure for table `lygsewingoutput`
--

CREATE TABLE `lygsewingoutput` (
  `TrnDate` date NOT NULL,
  `OperatorName` varchar(50) NOT NULL,
  `StyleCode` varchar(50) NOT NULL,
  `SizeName` varchar(10) NOT NULL,
  `DestinationCode` varchar(20) NOT NULL,
  `QtyOutput` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lygsewingoutput`
--

INSERT INTO `lygsewingoutput` (`TrnDate`, `OperatorName`, `StyleCode`, `SizeName`, `DestinationCode`, `QtyOutput`) VALUES
('2024-01-02', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'XS', 'HK', 15),
('2024-01-02', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'S', 'HK', 25),
('2024-01-02', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'L', 'HK', 30),
('2024-01-02', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'XL', 'HK', 17),
('2024-01-02', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'XXL', 'HK', 11),
('2024-01-02', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'XS', 'SG', 3),
('2024-01-02', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'S', 'SG', 5),
('2024-01-02', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'XL', 'SG', 12),
('2024-01-02', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'XXL', 'SG', 1),
('2024-01-02', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'XS', 'HK', 12),
('2024-01-02', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'S', 'HK', 12),
('2024-01-02', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'L', 'HK', 9),
('2024-01-02', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'XL', 'HK', 25),
('2024-01-02', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'XXL', 'HK', 7),
('2024-01-02', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'XS', 'SG', 2),
('2024-01-02', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'L', 'SG', 1),
('2024-01-02', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'XL', 'SG', 3),
('2024-01-02', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '92', 'HK', 21),
('2024-01-02', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '98', 'HK', 20),
('2024-01-02', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '152', 'HK', 10),
('2024-01-02', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '92', 'SG', 19),
('2024-01-02', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '98', 'SG', 18),
('2024-01-02', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '152', 'SG', 9),
('2024-01-02', 'Afizza Shabira', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '92', 'HK', 13),
('2024-01-02', 'Afizza Shabira', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '98', 'HK', 12),
('2024-01-02', 'Afizza Shabira', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '152', 'HK', 6),
('2024-01-03', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'S', 'HK', 32),
('2024-01-03', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'L', 'HK', 39),
('2024-01-03', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'XL', 'HK', 33),
('2024-01-03', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'XXL', 'HK', 11),
('2024-01-03', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'S', 'SG', 9),
('2024-01-03', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'XL', 'SG', 30),
('2024-01-03', 'M. Zaidan', 'BOSSE FANCY OH HOOD S.9', 'XXL', 'SG', 12),
('2024-01-03', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'S', 'HK', 36),
('2024-01-03', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'L', 'HK', 31),
('2024-01-03', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'XL', 'HK', 26),
('2024-01-03', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'XXL', 'HK', 13),
('2024-01-03', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'L', 'SG', 6),
('2024-01-03', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'XL', 'SG', 11),
('2024-01-03', 'Afizza Shabira', 'BOSSE FANCY OH HOOD S.9', 'XXL', 'SG', 13),
('2024-01-03', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '92', 'HK', 11),
('2024-01-03', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '98', 'HK', 12),
('2024-01-03', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '104', 'HK', 21),
('2024-01-03', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '110', 'HK', 14),
('2024-01-03', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '116', 'HK', 17),
('2024-01-03', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '122', 'HK', 23),
('2024-01-03', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '128', 'HK', 25),
('2024-01-03', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '134', 'HK', 27),
('2024-01-03', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '140', 'HK', 29),
('2024-01-03', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '146', 'HK', 14),
('2024-01-03', 'M. Zaidan', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '152', 'HK', 12),
('2024-01-03', 'Afizza Shabira', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '92', 'SG', 21),
('2024-01-03', 'Afizza Shabira', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '98', 'SG', 11),
('2024-01-03', 'Afizza Shabira', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '104', 'SG', 19),
('2024-01-03', 'Afizza Shabira', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '110', 'SG', 7),
('2024-01-03', 'Afizza Shabira', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '116', 'SG', 6),
('2024-01-03', 'Afizza Shabira', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '122', 'SG', 5),
('2024-01-03', 'Afizza Shabira', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '134', 'SG', 12),
('2024-01-03', 'Afizza Shabira', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '140', 'SG', 18),
('2024-01-03', 'Afizza Shabira', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '146', 'SG', 19),
('2024-01-03', 'Afizza Shabira', 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', '152', 'SG', 21);

-- --------------------------------------------------------

--
-- Table structure for table `lygstylesize`
--

CREATE TABLE `lygstylesize` (
  `StyleCode` varchar(50) NOT NULL,
  `SizeSort` int(11) DEFAULT NULL,
  `SizeName` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lygstylesize`
--

INSERT INTO `lygstylesize` (`StyleCode`, `SizeSort`, `SizeName`) VALUES
('BOSSE FANCY OH HOOD S.9', 1, 'XS'),
('BOSSE FANCY OH HOOD S.9', 2, 'S'),
('BOSSE FANCY OH HOOD S.9', 3, 'M'),
('BOSSE FANCY OH HOOD S.9', 4, 'L'),
('BOSSE FANCY OH HOOD S.9', 5, 'XL'),
('BOSSE FANCY OH HOOD S.9', 6, 'XXL'),
('FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', 1, '92'),
('FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', 2, '98'),
('FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', 3, '104'),
('FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', 4, '110'),
('FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', 5, '116'),
('FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', 6, '122'),
('FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', 7, '128'),
('FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', 8, '134'),
('FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', 9, '140'),
('FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', 10, '146'),
('FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9', 11, '152');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `uri` varchar(100) DEFAULT NULL,
  `tipe` enum('dropdown','menu') NOT NULL DEFAULT 'dropdown',
  `level_id` varchar(100) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_username` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_username` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` bigint(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `uri` varchar(100) DEFAULT NULL,
  `level_id` varchar(100) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_username` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_username` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `level_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `level_id`, `created_at`, `updated_at`, `is_admin`, `is_confirmed`, `is_deleted`) VALUES
(1, 'dikyanwar22', 'dikyanwar22@gmail.com', '202cb962ac59075b964b07152d234b70', 'default.jpg', 1, '2023-11-04 08:28:39', NULL, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_list`
--
ALTER TABLE `api_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_uri` (`uri`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_url` (`uri`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api`
--
ALTER TABLE `api`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `api_list`
--
ALTER TABLE `api_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
