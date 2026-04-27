-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2026 at 01:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmb-online`
--

-- --------------------------------------------------------

--
-- Table structure for table `agamas`
--

CREATE TABLE `agamas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agamas`
--

INSERT INTO `agamas` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Islam', '2026-04-27 00:25:10', '2026-04-27 00:25:10'),
(2, 'Kristen', '2026-04-27 00:25:10', '2026-04-27 00:25:10'),
(3, 'Katolik', '2026-04-27 00:25:10', '2026-04-27 00:25:10'),
(4, 'Hindu', '2026-04-27 00:25:10', '2026-04-27 00:25:10'),
(5, 'Budha', '2026-04-27 00:25:10', '2026-04-27 00:25:10'),
(6, 'Khonghucu', '2026-04-27 00:25:10', '2026-04-27 00:25:10'),
(7, 'Lainnya', '2026-04-27 00:25:10', '2026-04-27 00:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kabupatens`
--

CREATE TABLE `kabupatens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provinsi_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kabupatens`
--

INSERT INTO `kabupatens` (`id`, `provinsi_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jakarta Pusat', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(2, 1, 'Jakarta Utara', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(3, 1, 'Jakarta Barat', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(4, 1, 'Jakarta Selatan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(5, 1, 'Jakarta Timur', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(6, 1, 'Kepulauan Seribu', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(7, 2, 'Kota Bogor', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(8, 2, 'Kabupaten Bogor', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(9, 2, 'Kota Depok', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(10, 2, 'Kota Bekasi', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(11, 2, 'Kabupaten Bekasi', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(12, 3, 'Kota Tangerang', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(13, 3, 'Kota Tangerang Selatan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(14, 3, 'Kabupaten Tangerang', '2026-04-27 00:11:07', '2026-04-27 00:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kabupaten_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatans`
--

INSERT INTO `kecamatans` (`id`, `kabupaten_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gambir', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(2, 1, 'Tanah Abang', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(3, 1, 'Menteng', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(4, 1, 'Senen', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(5, 1, 'Cempaka Putih', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(6, 1, 'Johar Baru', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(7, 1, 'Kemayoran', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(8, 1, 'Sawah Besar', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(9, 2, 'Penjaringan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(10, 2, 'Tanjung Priok', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(11, 2, 'Koja', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(12, 2, 'Cilincing', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(13, 2, 'Pademangan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(14, 2, 'Kelapa Gading', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(15, 3, 'Cengkareng', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(16, 3, 'Grogol Petamburan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(17, 3, 'Kalideres', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(18, 3, 'Kebon Jeruk', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(19, 3, 'Kembangan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(20, 3, 'Palmerah', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(21, 3, 'Taman Sari', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(22, 3, 'Tambora', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(23, 4, 'Kebayoran Baru', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(24, 4, 'Kebayoran Lama', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(25, 4, 'Pesanggrahan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(26, 4, 'Cilandak', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(27, 4, 'Pasar Minggu', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(28, 4, 'Jagakarsa', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(29, 4, 'Mampang Prapatan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(30, 4, 'Pancoran', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(31, 4, 'Tebet', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(32, 4, 'Setiabudi', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(33, 5, 'Matraman', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(34, 5, 'Pulo Gadung', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(35, 5, 'Jatinegara', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(36, 5, 'Duren Sawit', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(37, 5, 'Kramat Jati', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(38, 5, 'Makasar', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(39, 5, 'Ciracas', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(40, 5, 'Pasar Rebo', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(41, 5, 'Cipayung', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(42, 5, 'Cakung', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(43, 6, 'Kepulauan Seribu Utara', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(44, 6, 'Kepulauan Seribu Selatan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(45, 7, 'Bogor Barat', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(46, 7, 'Bogor Selatan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(47, 7, 'Bogor Tengah', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(48, 7, 'Bogor Timur', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(49, 7, 'Bogor Utara', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(50, 7, 'Tanah Sareal', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(51, 8, 'Cibinong', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(52, 8, 'Gunung Putri', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(53, 8, 'Citeureup', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(54, 8, 'Babakan Madang', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(55, 8, 'Sukaraja', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(56, 8, 'Ciawi', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(57, 8, 'Cisarua', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(58, 8, 'Megamendung', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(59, 8, 'Caringin', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(60, 8, 'Cijeruk', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(61, 8, 'Tamansari', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(62, 8, 'Ciomas', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(63, 8, 'Dramaga', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(64, 8, 'Ciampea', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(65, 8, 'Tenjolaya', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(66, 8, 'Cibungbulang', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(67, 8, 'Pamijahan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(68, 8, 'Leuwiliang', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(69, 8, 'Leuwisadeng', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(70, 8, 'Nanggung', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(71, 8, 'Cigudeg', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(72, 8, 'Sukajaya', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(73, 8, 'Jasinga', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(74, 8, 'Tenjo', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(75, 8, 'Parung Panjang', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(76, 8, 'Gunung Sindur', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(77, 8, 'Rumpin', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(78, 8, 'Cigombong', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(79, 8, 'Ciseeng', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(80, 8, 'Parung', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(81, 8, 'Kemang', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(82, 8, 'Rancabungur', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(83, 8, 'Sukatani', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(84, 8, 'Cariu', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(85, 8, 'Sukamakmur', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(86, 8, 'Jonggol', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(87, 8, 'Cileungsi', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(88, 8, 'Klapanunggal', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(89, 9, 'Pancoran Mas', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(90, 9, 'Cimanggis', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(91, 9, 'Sawangan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(92, 9, 'Limo', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(93, 9, 'Sukmajaya', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(94, 9, 'Beji', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(95, 9, 'Cipayung', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(96, 9, 'Cilodong', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(97, 9, 'Tapos', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(98, 9, 'Bojongsari', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(99, 9, 'Cinere', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(100, 10, 'Bekasi Barat', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(101, 10, 'Bekasi Timur', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(102, 10, 'Bekasi Utara', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(103, 10, 'Bekasi Selatan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(104, 10, 'Rawalumbu', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(105, 10, 'Bantar Gebang', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(106, 10, 'Pondok Gede', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(107, 10, 'Jatiasih', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(108, 10, 'Jatisampurna', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(109, 10, 'Mustika Jaya', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(110, 10, 'Medan Satria', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(111, 10, 'Pondok Melati', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(112, 11, 'Tarumajaya', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(113, 11, 'Babelan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(114, 11, 'Sukawangi', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(115, 11, 'Tambun Utara', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(116, 11, 'Tambun Selatan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(117, 11, 'Cibitung', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(118, 11, 'Cikarang Barat', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(119, 11, 'Cikarang Pusat', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(120, 11, 'Cikarang Selatan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(121, 11, 'Cikarang Utara', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(122, 11, 'Cikarang Timur', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(123, 11, 'Setu', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(124, 11, 'Serang Baru', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(125, 11, 'Cibarusah', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(126, 11, 'Bojongmangu', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(127, 11, 'Kedung Waringin', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(128, 11, 'Pebayuran', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(129, 11, 'Sukakarya', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(130, 11, 'Sukatani', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(131, 11, 'Muara Gembong', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(132, 11, 'Cabangbungin', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(133, 12, 'Tangerang', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(134, 12, 'Jatiuwung', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(135, 12, 'Batuceper', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(136, 12, 'Benda', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(137, 12, 'Ciledug', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(138, 12, 'Cipondoh', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(139, 12, 'Karawaci', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(140, 12, 'Periuk', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(141, 12, 'Pinang', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(142, 12, 'Karang Tengah', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(143, 12, 'Larangan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(144, 12, 'Neglasari', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(145, 12, 'Cibodas', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(146, 13, 'Serpong', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(147, 13, 'Serpong Utara', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(148, 13, 'Ciputat', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(149, 13, 'Ciputat Timur', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(150, 13, 'Pondok Aren', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(151, 13, 'Pamulang', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(152, 13, 'Setu', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(153, 14, 'Balaraja', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(154, 14, 'Cikupa', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(155, 14, 'Cisauk', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(156, 14, 'Cisoka', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(157, 14, 'Curug', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(158, 14, 'Gunung Kaler', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(159, 14, 'Jambe', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(160, 14, 'Jayanti', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(161, 14, 'Kelapa Dua', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(162, 14, 'Kosambi', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(163, 14, 'Kresek', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(164, 14, 'Kronjo', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(165, 14, 'Legok', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(166, 14, 'Mauk', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(167, 14, 'Mekarbaru', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(168, 14, 'Pagedangan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(169, 14, 'Pakuhaji', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(170, 14, 'Panongan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(171, 14, 'Pasarkemis', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(172, 14, 'Rajeg', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(173, 14, 'Sepatan', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(174, 14, 'Sepatan Timur', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(175, 14, 'Sindang Jaya', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(176, 14, 'Solear', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(177, 14, 'Sukadiri', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(178, 14, 'Sukamulya', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(179, 14, 'Teluknaga', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(180, 14, 'Tigaraksa', '2026-04-27 00:11:07', '2026-04-27 00:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_27_041048_add_role_to_users', 1),
(5, '2026_04_27_041356_create_pendaftarans_table', 1),
(6, '2026_04_27_043309_add_detail_to_pendaftarans', 1),
(7, '2026_04_27_064543_create_provinsis_table', 1),
(8, '2026_04_27_064553_create_kabupatens_table', 1),
(9, '2026_04_27_064555_create_kecamatans_table', 1),
(10, '2026_04_27_072233_create_agamas_table', 2),
(11, '2026_04_27_075101_drop_alamat_from_pendaftarans_table', 3),
(12, '2026_04_27_075420_fix_kecamatan_column_in_pendaftarans_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftarans`
--

CREATE TABLE `pendaftarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat_ktp` text DEFAULT NULL,
  `alamat_sekarang` text DEFAULT NULL,
  `kecamatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kabupaten_id` bigint(20) UNSIGNED DEFAULT NULL,
  `provinsi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `kewarganegaraan` enum('WNI Asli','WNI Keturunan','WNA') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `status` enum('Belum menikah','Menikah','Lainnya') DEFAULT NULL,
  `agama_id` bigint(20) UNSIGNED DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftarans`
--

INSERT INTO `pendaftarans` (`id`, `user_id`, `nama`, `email`, `no_hp`, `created_at`, `updated_at`, `alamat_ktp`, `alamat_sekarang`, `kecamatan_id`, `kabupaten_id`, `provinsi_id`, `telp`, `kewarganegaraan`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `status`, `agama_id`, `foto`) VALUES
(3, 1, 'Anugrah Lan Pambudi', 'anugrahlanpambudi27@gmail.com', '081903687959', '2026-04-27 00:58:17', '2026-04-27 00:58:17', 'JALAN SWADAYA1 RT14 RW04 NO 39', 'JALAN SWADAYA1 RT14 RW04 NO 39', 7, 1, 1, '081903687959', 'WNI Asli', '2001-11-27', 'Jakarta', 'Pria', 'Belum menikah', 1, 'foto/tJqyINWX0uTenzJY0Q72KkZJfjvHNl9Iw7BtC0Ey.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `provinsis`
--

CREATE TABLE `provinsis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsis`
--

INSERT INTO `provinsis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'DKI Jakarta', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(2, 'Jawa Barat', '2026-04-27 00:11:07', '2026-04-27 00:11:07'),
(3, 'Banten', '2026-04-27 00:11:07', '2026-04-27 00:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0CInXN1SxO7RN9RdEejwlF286w9dQBIuu09oPE2L', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'eyJfdG9rZW4iOiI3TmVuZW91UWp1ZmVZWHh3dExRTkVlSW51bFVPVVBnSUR2aGdxY2xuIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3BlbmRhZnRhcmFuIiwicm91dGUiOiJwZW5kYWZ0YXJhbi5jcmVhdGUifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9', 1777290040),
('XUm9wEixHDDYQ3FkGwnhJbSOPgFnPd2xcMB3cDB5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'eyJfdG9rZW4iOiJUa2RNVW8wQ1FPTnNkckFwdzdFTVM5SmpObXp3Z0lmMDR4MWR3eTBPIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1777285195);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$qojRTmmB0R4xHfYrpRUERuLfcXcXGo3OgpKM5gbnFOKLhE43uJ7Pa', NULL, '2026-04-27 00:06:34', '2026-04-27 02:34:15', 'admin'),
(2, 'Anugrah Lan Pambudi', 'anugrahlanpambudi27@gmail.com', NULL, '$2y$12$LD16AyuupGbFrZ2.5CNuK.H4.kE8tg8S6ondDff56hnTk0iOSaKt6', NULL, '2026-04-27 02:22:12', '2026-04-27 02:22:12', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agamas`
--
ALTER TABLE `agamas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupatens`
--
ALTER TABLE `kabupatens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kabupatens_provinsi_id_foreign` (`provinsi_id`);

--
-- Indexes for table `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatans_kabupaten_id_foreign` (`kabupaten_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftarans_user_id_foreign` (`user_id`);

--
-- Indexes for table `provinsis`
--
ALTER TABLE `provinsis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agamas`
--
ALTER TABLE `agamas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kabupatens`
--
ALTER TABLE `kabupatens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kecamatans`
--
ALTER TABLE `kecamatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `provinsis`
--
ALTER TABLE `provinsis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kabupatens`
--
ALTER TABLE `kabupatens`
  ADD CONSTRAINT `kabupatens_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD CONSTRAINT `kecamatans_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupatens` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD CONSTRAINT `pendaftarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
