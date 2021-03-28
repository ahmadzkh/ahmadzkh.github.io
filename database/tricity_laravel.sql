-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 06:13 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tricity_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `refer` varchar(30) DEFAULT NULL,
  `id_pln` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `first_meter` int(11) NOT NULL,
  `last_meter` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `checked` tinyint(1) NOT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_bill`, `refer`, `id_pln`, `nama`, `no_telp`, `golongan`, `bulan`, `tahun`, `first_meter`, `last_meter`, `price`, `checked`, `bank`, `created_at`, `updated_at`) VALUES
(1, 2147483647, NULL, '545200580455', 'Demo Pelanggan', '085256200870', 'R1/1300', 'MARCH', 2021, 0, 311, 466500, 0, NULL, '2021-03-16 00:07:49', '2021-03-28 08:38:59'),
(2, 2140483645, NULL, '545200580455', 'Demo Pelanggan', '085256200870', 'R1/1300', 'APRIL', 2021, 311, 550, 358500, 0, NULL, '2021-03-25 21:10:13', '2021-03-28 01:02:07'),
(3, 1101746568, NULL, '545200580455', 'Demo Pelanggan', '085256200870', 'R1/1300', 'MAY', 2021, 550, 800, 375000, 0, NULL, '2021-03-27 17:16:49', '2021-03-27 17:16:49'),
(4, 1140591640, NULL, '545200580455', 'Demo Pelanggan', '085256200870', 'R1/1300', 'JUNE', 2021, 800, 1300, 750000, 0, NULL, '2021-03-27 17:34:24', '2021-03-27 17:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `no_telp` char(15) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kota_kab` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id`, `user_id`, `nama_depan`, `nama_belakang`, `no_telp`, `avatar`, `kelurahan`, `kecamatan`, `kota_kab`, `alamat`, `kode_pos`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ahmad', 'Zaky', '082121084687', NULL, 'Makoto', 'Kyoutai', 'Tokyo', 'Tokyo, Japan', 67192, '2021-03-08 23:27:37', '2021-03-08 23:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `data_bank`
--

CREATE TABLE `data_bank` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `no_telp` char(15) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kota_kab` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_bank`
--

INSERT INTO `data_bank` (`id`, `user_id`, `nama_depan`, `nama_belakang`, `no_telp`, `avatar`, `kelurahan`, `kecamatan`, `kota_kab`, `alamat`, `kode_pos`, `created_at`, `updated_at`) VALUES
(1, 4, 'Demo', 'Bank', '2183901282', NULL, 'Gabwi', 'Gangnam', 'Gangnam City', 'Bank of Korea, South Korea', 88910, '2021-03-09 00:05:13', '2021-03-09 00:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_pln` char(15) NOT NULL,
  `golongan` varchar(100) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kota_kab` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id`, `user_id`, `nama_depan`, `nama_belakang`, `no_telp`, `no_pln`, `golongan`, `avatar`, `kelurahan`, `kecamatan`, `kota_kab`, `alamat`, `kode_pos`, `created_at`, `updated_at`) VALUES
(1, 5, 'Demo', 'Pelanggan', '085256200870', '545200580455', 'R1/1300', NULL, 'Setia Asih', 'Tarumajaya', 'Bekasi', 'Jl Melati 2, Wahana Harapan Blok C4 no 3, RT002 RW032', 17222, '2021-03-15 23:41:19', '2021-03-15 23:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `data_pln`
--

CREATE TABLE `data_pln` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `no_telp` char(15) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kota_kab` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pln`
--

INSERT INTO `data_pln` (`id`, `user_id`, `nama_depan`, `nama_belakang`, `no_telp`, `avatar`, `kelurahan`, `kecamatan`, `kota_kab`, `alamat`, `kode_pos`, `created_at`, `updated_at`) VALUES
(1, 3, 'Demo', 'PLN', '2183901283', NULL, 'Kayu Mati', 'Grogol', 'Jakarta Barat', 'Jl Indah Permai 2, Cluster Ubud U9 no 3, RT 005 RW 023', 16753, '2021-03-09 00:03:57', '2021-03-09 00:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `daya`
--

CREATE TABLE `daya` (
  `id` int(11) NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `tarif` decimal(19,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daya`
--

INSERT INTO `daya` (`id`, `golongan`, `tarif`) VALUES
(1, 'R1/450', '500.00'),
(2, 'R1/900', '1000.00'),
(3, 'R1/1300', '1500.00'),
(4, 'R1/2200', '2500.00');

-- --------------------------------------------------------

--
-- Table structure for table `daya_pelanggan`
--

CREATE TABLE `daya_pelanggan` (
  `id` int(11) NOT NULL,
  `id_pln` char(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daya_pelanggan`
--

INSERT INTO `daya_pelanggan` (`id`, `id_pln`, `nama`, `golongan`, `created_at`, `updated_at`) VALUES
(1, '545200580455', 'Demo Pelanggan', 'R1/1300', '2021-03-25 12:22:36', '2021-03-25 12:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `levels` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `levels`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin 01', 'admin@demo.com', NULL, '$2y$10$JNG1vRCf1S4m5mQB8Cl33.xWz0e6wTlqsQc9l3uJXcV2h/srs8e3q', 'dy5NiH8ukWxnRu34AciAT18b5GM4UjN48f3YsHYNKjxbifk2kQ4HSoPZRyC0', '2021-03-08 20:47:57', '2021-03-08 20:47:57'),
(2, 'Admin', 'Ahmad Zaky', 'humami539@gmail.com', NULL, '$2y$10$JNG1vRCf1S4m5mQB8Cl33.xWz0e6wTlqsQc9l3uJXcV2h/srs8e3q', 'GFdU7wAp4ogRhMs6KS4pctUpTNCqUd1NufQLxuZPH44YXju3EsJ2LGMwYhNA', '2021-03-08 23:27:37', '2021-03-08 23:27:37'),
(3, 'PLN', 'Demo PLN', 'pln@demo.com', NULL, '$2y$10$DbcA8XJT0otjBU1KFKM4O.WHBg3nYTA9zcGBluTtAuz3h0KcaZyH.', 'It1a2KR1ttA1EUFnON0bZ4lydsoF255BYEv7jTGWv4fnAawK2CdNKP3egSMe', '2021-03-09 00:03:57', '2021-03-09 00:03:57'),
(4, 'Bank', 'Demo Bank', 'bank@demo.com', NULL, '$2y$10$FOoknIAmOV4KmV81Boug1.6V6n0gMFW2.oq/HHQa00WAniPvqNRi6', 'xxQtxYg84JeukOC6gJMYzyuqJZTTBk0CDUM5budGMmOyhh1yMm71uVRp9OBG', '2021-03-09 00:05:13', '2021-03-09 00:05:13'),
(5, 'Pelanggan', 'Demo Pelanggan', 'pelanggan@demo.com', NULL, '$2y$10$9t4ptbAj6zNo7UCN/.UUvOujpnjJ88CjJt.J3wly4CCViF1ljq3oK', 'O98hUP0mpcrdblCIzO8rPyH3HBhrQZ5XYTJEUj1dhpuejsEfgaieRnjinGxG', '2021-03-15 23:41:19', '2021-03-15 23:41:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_bank`
--
ALTER TABLE `data_bank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `data_pln`
--
ALTER TABLE `data_pln`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `daya`
--
ALTER TABLE `daya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daya_pelanggan`
--
ALTER TABLE `daya_pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pln` (`id_pln`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_bank`
--
ALTER TABLE `data_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `data_pln`
--
ALTER TABLE `data_pln`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daya`
--
ALTER TABLE `daya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daya_pelanggan`
--
ALTER TABLE `daya_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
