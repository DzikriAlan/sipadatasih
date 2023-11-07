-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Generation Time: Jul 29, 2022 at 06:14 AM
-- Server version: 10.6.8-MariaDB-1:10.6.8+maria~focal
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_kelurahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_admin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_admin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_admin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('perempuan','laki-laki') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` int(11) NOT NULL DEFAULT 0 COMMENT '0: Admin, 1: kasi, 2: Lurah',
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `email_admin`, `password_admin`, `jenis_kelamin`, `jabatan`, `no_hp`, `created_at`, `updated_at`) VALUES
(11, 'Adi Suryana', 'lurah@gmail.com', 'c6d19bddcfae6ca2b9dc0b90685ba2b590912955', 'laki-laki', 2, '089652847221', '2022-07-03 21:40:57', '2022-07-10 01:20:41'),
(12, 'Surya Imsomnia', 'kasi@gmail.com', 'c6d19bddcfae6ca2b9dc0b90685ba2b590912955', 'laki-laki', 1, '089652847221', '2022-07-10 01:12:15', '2022-07-10 01:12:15'),
(13, 'Aulia Harvy', 'admin@gmail.com', 'c6d19bddcfae6ca2b9dc0b90685ba2b590912955', 'laki-laki', 0, '089652847221', '2022-07-10 01:13:34', '2022-07-10 01:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_lembaga`
--

CREATE TABLE `anggota_lembaga` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_lembaga` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota_lembaga`
--

INSERT INTO `anggota_lembaga` (`id`, `nama`, `jabatan`, `foto`, `created_at`, `updated_at`, `id_lembaga`) VALUES
(1, 'Adnan Kasim', 'Kepala Kelurahan', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 1),
(2, 'Mohammad Fikri Luawo', 'Sekretaris Kelurahan', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 1),
(3, 'Mohammad Ilham Hamzah', 'Bendahara Kelurahan', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 1),
(4, 'Zulkifli Bantali', 'Kepala Lingkungan 1', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 1),
(5, 'Mirza Kurnia', 'Kepala Lingkungan 2', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 1),
(6, 'Mohammad Krisdewanto', 'Kepala Lingkungan 3', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 1),
(7, 'Reka Savira Zees', 'Kepala Lingkungan 4', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 1),
(8, 'Mohammad Hidayat Chandra', 'Kepala Lingkungan 5', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 1),
(9, 'Abrianto Nusi', 'Ketua PKK', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 2),
(10, 'Rian Sulistio', 'Sekretaris PKK', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 2),
(11, 'Shania A. Paudi', 'Bendahara PKK', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 2),
(12, 'Mohammad Ilham Akbar', 'Ketua Karang Taruna', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 3),
(13, 'Agung Akuba', 'Sekretaris Karang Taruna', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 3),
(14, 'Agung Pakaya', 'Bendahara Karang Taruna', 'default.jpg', '2022-07-03 21:40:57', '2022-07-03 21:40:57', 3);

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul_artikel` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_artikel` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_artikel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_artikel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_valid` enum('ya','tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tidak',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_pengguna` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul_artikel`, `slug_artikel`, `isi_artikel`, `gambar_artikel`, `is_valid`, `created_at`, `updated_at`, `id_pengguna`) VALUES
(16, 'Desa Berani Maju', 'desa-berani-maju', 'Desa Telaga Asih menjadi desa yang berani untuk maju ', 'hero_bg_1.jpg', 'ya', '2022-07-09 00:00:00', '2022-07-09 12:59:50', 12),
(17, 'Desa Berani Maju', 'desa-berani-maju', 'Desa Telaga Asih menjadi desa yang berani untuk maju ', 'hero_bg_1.jpg', 'ya', '2022-07-09 00:00:00', '2022-07-09 12:59:50', 12),
(18, 'Desa Berani Maju', 'desa-berani-maju', 'Desa Telaga Asih menjadi desa yang berani untuk maju ', 'hero_bg_1.jpg', 'ya', '2022-07-09 00:00:00', '2022-07-09 12:59:50', 12);

-- --------------------------------------------------------

--
-- Table structure for table `batas`
--

CREATE TABLE `batas` (
  `id` int(10) UNSIGNED NOT NULL,
  `mata_angin` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batas`
--

INSERT INTO `batas` (`id`, `mata_angin`, `uraian`, `created_at`, `updated_at`) VALUES
(1, 'Utara', 'Wanajaya', '2022-07-03 21:40:13', '2022-07-09 12:48:31'),
(2, 'Barat', 'Wanasari', '2022-07-03 21:40:13', '2022-07-09 12:48:55'),
(3, 'Timur', 'Telaga Murni', '2022-07-03 21:40:13', '2022-07-09 12:49:08'),
(4, 'Selatan', 'Sukadanau', '2022-07-03 21:40:13', '2022-07-09 12:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `belanja`
--

CREATE TABLE `belanja` (
  `id` int(10) UNSIGNED NOT NULL,
  `uraian_belanja` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_belanja` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `belanja`
--

INSERT INTO `belanja` (`id`, `uraian_belanja`, `nominal_belanja`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'Beli Barang ABC', '5000000', '2018', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(2, 'Beli Barang ABC', '5000000', '2019', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(3, 'Gaji Aparat Desa', '7500000', '2019', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(4, 'Maintenance Fasilitas Kantor', '11250000', '2019', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(5, 'Perbaiki Jalan Setapak', '17500000', '2019', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(6, 'Perbaiki Jalan Tol', '50500000', '2019', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(7, 'Perbaiki Alat Produksi', '12250000', '2019', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(8, 'Pembelian Alat', '5000000', '2022', '2022-07-04 00:20:42', '2022-07-04 00:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `file`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'default.pdf', 'Sed delectus velit sit modi nam unde.', '2007-10-04 03:43:47', '1994-12-31 11:36:31'),
(2, 'default.pdf', 'Minima sit qui reprehenderit temporibus dolorem optio.', '2006-02-12 15:29:48', '1971-06-10 02:18:39'),
(3, 'default.pdf', 'Quo est reprehenderit esse dolorem.', '1997-10-31 03:21:57', '1994-08-15 14:28:47'),
(4, 'default.pdf', 'Reprehenderit aliquid qui facere atque.', '1991-12-25 03:39:08', '1979-03-25 21:27:22'),
(5, 'default.pdf', 'Iste voluptatum expedita molestiae.', '1986-05-12 09:27:00', '2021-06-29 17:39:34'),
(6, 'default.pdf', 'Omnis ut eos deleniti aut.', '1987-07-26 03:31:33', '1979-04-18 06:09:10'),
(7, 'default.pdf', 'Voluptate eum quia culpa culpa animi praesentium autem.', '2002-11-14 07:07:04', '1986-11-19 01:59:43'),
(8, 'default.pdf', 'Veniam similique eum doloribus quisquam est.', '1985-02-11 21:40:33', '2003-11-24 04:37:16'),
(9, 'default.pdf', 'Numquam laborum adipisci sequi voluptas consequatur.', '2021-09-17 00:10:27', '2014-01-07 22:30:13'),
(10, 'default.pdf', 'Eius unde voluptatem laboriosam aut.', '1972-06-04 06:51:53', '1996-07-16 17:43:00'),
(11, 'default.pdf', 'In voluptates consequatur esse earum sed tempore sit.', '2015-09-10 17:54:56', '1996-09-19 11:31:38'),
(12, 'default.pdf', 'Saepe ducimus omnis ut eveniet quia magnam et.', '1984-08-14 04:56:33', '1973-04-14 15:14:54'),
(13, 'default.pdf', 'Nostrum porro ut ut et.', '1971-04-03 18:46:46', '1973-02-10 12:38:15'),
(14, 'default.pdf', 'Minima eius debitis enim voluptatem aut.', '1987-08-14 01:31:42', '1994-10-07 03:30:40'),
(15, 'default.pdf', 'Earum ipsum distinctio ut qui delectus iusto.', '1997-09-06 06:49:15', '1995-03-09 20:53:09'),
(16, 'default.pdf', 'Accusantium consequatur earum eum est deleniti aut.', '1986-07-24 05:56:47', '1982-03-14 23:11:11'),
(17, 'default.pdf', 'Autem voluptas consectetur voluptate nisi et non omnis.', '2004-05-15 19:03:15', '1973-09-06 18:25:44'),
(18, 'default.pdf', 'Minima dolorem eveniet autem voluptatem impedit animi at.', '2012-01-23 01:47:47', '2011-04-27 01:43:49'),
(19, 'default.pdf', 'Sit dolor est ex at.', '1973-08-22 02:44:39', '1983-10-08 00:19:16'),
(20, 'default.pdf', 'Voluptas voluptatum suscipit eum numquam in facere.', '2009-05-04 00:16:15', '2007-07-05 22:28:16'),
(21, 'default.pdf', 'Voluptas ipsam quia enim exercitationem ipsum.', '2013-09-27 06:15:06', '2008-04-05 08:25:31'),
(22, 'default.pdf', 'Temporibus fugit velit ab corrupti.', '2020-04-25 11:25:41', '1981-11-08 09:19:20'),
(23, 'default.pdf', 'Possimus voluptatem ea corporis tempore iusto quos possimus.', '2009-04-02 23:58:06', '2015-09-28 03:54:43'),
(24, 'default.pdf', 'Quia illum molestiae qui.', '2014-04-05 09:13:40', '2005-08-08 17:12:51'),
(25, 'default.pdf', 'Alias facilis blanditiis nihil eos.', '1981-11-15 01:25:23', '2009-03-18 18:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_ekonomi`
--

CREATE TABLE `fasilitas_ekonomi` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_fasilitas_ekonomi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_fasilitas_ekonomi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas_ekonomi`
--

INSERT INTO `fasilitas_ekonomi` (`id`, `jenis_fasilitas_ekonomi`, `keterangan_fasilitas_ekonomi`, `created_at`, `updated_at`) VALUES
(1, 'Usaha Peternakan', '3 Unit', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(2, 'Usaha Perkebunan', '3 Unit', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(3, 'Kel. Simpan Pinjam', '2 Kelompok', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(4, 'Usaha Angkutan', '10 Unit', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(5, 'Usaha Industri Kerajinan', '1 Unit', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(6, 'Usaha Pertanian', '10 HA', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(7, 'Usaha Peternakan', '3 Unit', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(8, 'Usaha Perkebunan', '3 Unit', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(9, 'Kel. Simpan Pinjam', '2 Kelompok', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(10, 'Usaha Angkutan', '10 Unit', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(11, 'Usaha Industri Kerajinan', '1 Unit', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(12, 'Usaha Pertanian', '10 HA', '2022-07-03 21:40:56', '2022-07-03 21:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kesehatan`
--

CREATE TABLE `fasilitas_kesehatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_fasilitas_kesehatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_fasilitas_kesehatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas_kesehatan`
--

INSERT INTO `fasilitas_kesehatan` (`id`, `jenis_fasilitas_kesehatan`, `keterangan_fasilitas_kesehatan`, `created_at`, `updated_at`) VALUES
(1, 'Puskesmas', '1 buah', '2022-07-03 21:40:13', '2022-07-09 12:55:34'),
(2, 'Poskes Kelurahan', '1 buah', '2022-07-03 21:40:13', '2022-07-09 12:55:39'),
(5, 'UKBM (Posyandu, Polindas)', '18 buah', '2022-07-09 12:55:29', '2022-07-09 12:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_pemerintahan`
--

CREATE TABLE `fasilitas_pemerintahan` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_fasilitas_pemerintahan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_fasilitas_pemerintahan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas_pemerintahan`
--

INSERT INTO `fasilitas_pemerintahan` (`id`, `jenis_fasilitas_pemerintahan`, `keterangan_fasilitas_pemerintahan`, `created_at`, `updated_at`) VALUES
(1, 'Kantor Desa', '1', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(2, 'Kantor BPD', '1', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(3, 'Karang Taruna', '1', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(4, 'PKK', '1', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(5, 'Kantor Desa', '1', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(6, 'Kantor BPD', '1', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(7, 'Karang Taruna', '1', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(8, 'PKK', '1', '2022-07-03 21:40:56', '2022-07-03 21:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_pemukiman`
--

CREATE TABLE `fasilitas_pemukiman` (
  `id` int(10) UNSIGNED NOT NULL,
  `uraian_fasilitas_pemukiman` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_fasilitas_pemukiman` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengguna_fasilitas_pemukiman` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas_pemukiman`
--

INSERT INTO `fasilitas_pemukiman` (`id`, `uraian_fasilitas_pemukiman`, `jumlah_fasilitas_pemukiman`, `pengguna_fasilitas_pemukiman`, `created_at`, `updated_at`) VALUES
(1, 'Sumur Gali', '1', '10 KK', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(2, 'Perpipaan', '1', '10 KK', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(3, 'Air Sungai', '1', '10 KK', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(4, 'HIPAM', '1', '10 KK', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(5, 'Sumur Gali', '1', '10 KK', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(6, 'Perpipaan', '1', '10 KK', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(7, 'Air Sungai', '1', '10 KK', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(8, 'HIPAM', '1', '10 KK', '2022-07-03 21:40:56', '2022-07-03 21:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_pendidikan`
--

CREATE TABLE `fasilitas_pendidikan` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_fasilitas_pendidikan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_fasilitas_pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas_pendidikan`
--

INSERT INTO `fasilitas_pendidikan` (`id`, `jenis_fasilitas_pendidikan`, `keterangan_fasilitas_pendidikan`, `created_at`, `updated_at`) VALUES
(8, 'Perpustakaan', '1 buah', '2022-07-03 21:40:56', '2022-07-09 12:55:52'),
(9, 'TK', '1 buah', '2022-07-09 12:53:37', '2022-07-09 12:55:58'),
(10, 'SD', '6 buah', '2022-07-09 12:53:50', '2022-07-09 12:56:02'),
(11, 'SMP', '1 buah', '2022-07-09 12:53:57', '2022-07-09 12:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_peribadatan`
--

CREATE TABLE `fasilitas_peribadatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_fasilitas_peribadatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_fasilitas_peribadatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas_peribadatan`
--

INSERT INTO `fasilitas_peribadatan` (`id`, `jenis_fasilitas_peribadatan`, `keterangan_fasilitas_peribadatan`, `created_at`, `updated_at`) VALUES
(1, 'Masjid', '1', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(2, 'Mushola', '1', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(3, 'Pura', '1', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(4, 'Gereja', '1', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(5, 'Masjid', '1', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(6, 'Mushola', '1', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(7, 'Pura', '1', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(8, 'Gereja', '1', '2022-07-03 21:40:56', '2022-07-03 21:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_prasarana`
--

CREATE TABLE `fasilitas_prasarana` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_fasilitas_prasarana` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_fasilitas_prasarana` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas_prasarana`
--

INSERT INTO `fasilitas_prasarana` (`id`, `jenis_fasilitas_prasarana`, `keterangan_fasilitas_prasarana`, `created_at`, `updated_at`) VALUES
(1, 'Jalan Aspal', '3 KM', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(2, 'Jalan Telford', '5 KM', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(3, 'Jalan Makadam', '1,5 KM', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(4, 'Jalan Rabat Beton', '1 KM', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(5, 'Jalan Tanah', '10 KM', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(6, 'Jembatan Beton', '10 M', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(7, 'Jembatan Besi', '15 M', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(8, 'Jembatan Kayu', '5 M', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(9, 'Pangkalan Ojek', '1 Unit', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(10, 'Jalan Aspal', '3 KM', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(11, 'Jalan Telford', '5 KM', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(12, 'Jalan Makadam', '1,5 KM', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(13, 'Jalan Rabat Beton', '1 KM', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(14, 'Jalan Tanah', '10 KM', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(15, 'Jembatan Beton', '10 M', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(16, 'Jembatan Besi', '15 M', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(17, 'Jembatan Kayu', '5 M', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(18, 'Pangkalan Ojek', '1 Unit', '2022-07-03 21:40:56', '2022-07-03 21:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `iklim`
--

CREATE TABLE `iklim` (
  `id` int(10) UNSIGNED NOT NULL,
  `uraian_iklim` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_iklim` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iklim`
--

INSERT INTO `iklim` (`id`, `uraian_iklim`, `keterangan_iklim`, `created_at`, `updated_at`) VALUES
(1, 'Tinggi Kelerengan / Tempat', '10 M', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(2, 'Curah Hujan', 'Rendah', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(3, 'Suhu Rata-Rata Harian', '-', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(4, 'Jumlah Bulan Hujan', '6', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(5, 'Bentang Wilayah', 'Dataran / Lautan', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(6, 'Tinggi Kelerengan / Tempat', '10 M', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(7, 'Curah Hujan', 'Rendah', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(8, 'Suhu Rata-Rata Harian', '-', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(9, 'Jumlah Bulan Hujan', '6', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(10, 'Bentang Wilayah', 'Dataran / Lautan', '2022-07-03 21:40:56', '2022-07-03 21:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `infra_melintasi`
--

CREATE TABLE `infra_melintasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `uraian_infra_melintasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panjang_infra_melintasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lebar_infra_melintasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infra_melintasi`
--

INSERT INTO `infra_melintasi` (`id`, `uraian_infra_melintasi`, `panjang_infra_melintasi`, `lebar_infra_melintasi`, `created_at`, `updated_at`) VALUES
(1, 'Sungai', '1.300 M', '5 M', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(2, 'Jalan Kecamatan', '1.500 M', '6 M', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(3, 'Jalan Kabupaten', '1.800 M', '6 M', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(4, 'Sungai', '1.300 M', '5 M', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(5, 'Jalan Kecamatan', '1.500 M', '6 M', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(6, 'Jalan Kabupaten', '1.800 M', '6 M', '2022-07-03 21:40:56', '2022-07-03 21:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_kegiatan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster_kegiatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `slug_kegiatan`, `deskripsi_kegiatan`, `poster_kegiatan`, `created_at`, `updated_at`) VALUES
(7, '\"KEGIATAN SENAM JANTUNG SEHAT\"', 'kegiatan-senam-jantung-sehat', '<p><span style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\">Tahu nggak di Telaga Asih ada Klub Jantung Sehat lho.</span><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><span style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\">Klub yang berisi Ibu-Ibu hebat, semangat dan selalu sehat.</span><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><span style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\">Setiap Hari Minggu kumpulan Ibu-Ibu Klub Jantung Sehat (KJS) melakukan Kegiatan Rutin berupa Senam Jantung Sehat.</span><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><span style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\">Selain menjaga kesehatan, Senam Jantung juga memberikan banyak manfaat terutama untuk kesehatan jantung dan agar terhindar dari penyakit berbahaya lainnya.</span></p>', '20220704002558.png', '2022-07-04 00:25:58', '2022-07-04 00:25:58'),
(16, '\"KEGIATAN SENAM JANTUNG SEHAT\"', 'kegiatan-senam-jantung-sehat', '<p><span style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\">Tahu nggak di Telaga Asih ada Klub Jantung Sehat lho.</span><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><span style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\">Klub yang berisi Ibu-Ibu hebat, semangat dan selalu sehat.</span><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><span style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\">Setiap Hari Minggu kumpulan Ibu-Ibu Klub Jantung Sehat (KJS) melakukan Kegiatan Rutin berupa Senam Jantung Sehat.</span><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><span style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\">Selain menjaga kesehatan, Senam Jantung juga memberikan banyak manfaat terutama untuk kesehatan jantung dan agar terhindar dari penyakit berbahaya lainnya.</span></p>', '20220704002558.png', '2022-07-04 00:25:58', '2022-07-04 00:25:58'),
(17, '\"KEGIATAN SENAM JANTUNG SEHAT\"', 'kegiatan-senam-jantung-sehat', '<p><span style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\">Tahu nggak di Telaga Asih ada Klub Jantung Sehat lho.</span><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><span style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\">Klub yang berisi Ibu-Ibu hebat, semangat dan selalu sehat.</span><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><span style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\">Setiap Hari Minggu kumpulan Ibu-Ibu Klub Jantung Sehat (KJS) melakukan Kegiatan Rutin berupa Senam Jantung Sehat.</span><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><br style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\" /><span style=\"color: #262626; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif;\">Selain menjaga kesehatan, Senam Jantung juga memberikan banyak manfaat terutama untuk kesehatan jantung dan agar terhindar dari penyakit berbahaya lainnya.</span></p>', '20220704002558.png', '2022-07-04 00:25:58', '2022-07-04 00:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `kesuburan_tanah`
--

CREATE TABLE `kesuburan_tanah` (
  `id` int(10) UNSIGNED NOT NULL,
  `uraian_kesuburan_tanah` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas_ha` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_kesuburan_tanah` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kesuburan_tanah`
--

INSERT INTO `kesuburan_tanah` (`id`, `uraian_kesuburan_tanah`, `luas_ha`, `keterangan_kesuburan_tanah`, `created_at`, `updated_at`) VALUES
(1, 'Sangat Subur', '-', '-', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(2, 'Subur', '65,084', 'Tadah Hujan', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(3, 'Sedang', '95,390', 'Tadah Hujan', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(4, 'Lahan Kritis', '-', '-', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(5, 'Sangat Subur', '-', '-', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(6, 'Subur', '65,084', 'Tadah Hujan', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(7, 'Sedang', '95,390', 'Tadah Hujan', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(8, 'Lahan Kritis', '-', '-', '2022-07-03 21:40:56', '2022-07-03 21:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `lembaga`
--

CREATE TABLE `lembaga` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lembaga`
--

INSERT INTO `lembaga` (`id`, `nama`, `deskripsi`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Pemerintah Kelurahan', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque, illum? Expedita aliquam sint aspernatur quae, voluptatum doloremque perspiciatis ipsum laboriosam pariatur error tenetur officiis alias, voluptas quibusdam temporibus modi? Numquam.Soluta autem, commodi sed tenetur vero quia sequi doloribus totam. Accusantium explicabo numquam debitis magni obcaecati odio dicta hic soluta excepturi maiores provident, dolorum molestias qui aut ut eligendi at.</p>', '20220710014242.png', '2022-07-03 21:40:57', '2022-07-10 01:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `master_increment`
--

CREATE TABLE `master_increment` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_increment`
--

INSERT INTO `master_increment` (`id`, `nama`, `number`) VALUES
(1, 'no_sp', 7);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_03_12_063835_create_penduduk_table', 1),
(2, '2019_03_12_094702_create_tanaman_komoditas_table', 1),
(3, '2019_03_12_094752_create_artikel_table', 1),
(4, '2019_03_12_094753_create_kegiatan_table', 1),
(5, '2019_03_12_094805_create_pengguna_table', 1),
(6, '2019_03_12_094901_create_profil_table', 1),
(7, '2019_03_12_094942_create_lembaga_table', 1),
(8, '2019_03_12_095123_create_dokumen_table', 1),
(9, '2019_03_12_095134_create_orbitasi_table', 1),
(10, '2019_03_12_095201_create_batas_table', 1),
(11, '2019_03_12_095215_create_tipologi_table', 1),
(12, '2019_03_12_095227_create_iklim_table', 1),
(13, '2019_03_12_095239_create_kesuburan_tanah_table', 1),
(14, '2019_03_12_095257_create_penggunaan_tanah_table', 1),
(15, '2019_03_12_095313_create_infra_melintasi_table', 1),
(16, '2019_03_12_095333_create_fasilitas_pemukiman_table', 1),
(17, '2019_03_12_095351_create_fasilitas_pemerintahan_table', 1),
(18, '2019_03_12_095404_create_fasilitas_peribadatan_table', 1),
(19, '2019_03_12_095423_create_fasilitas_kesehatan_table', 1),
(20, '2019_03_12_095444_create_fasilitas_ekonomi_table', 1),
(21, '2019_03_12_095501_create_fasilitas_prasarana_table', 1),
(22, '2019_03_13_035415_create_fasilitas_pendidikan', 1),
(23, '2019_05_28_170550_create_belanja_table', 1),
(24, '2019_05_28_170601_create_pendapatan_table', 1),
(25, '2019_06_14_171059_create_admin_table', 1),
(26, '2019_06_21_123645_create_pelayanan_table', 1),
(27, '2019_06_27_130749_create_pengaturan_table', 1),
(28, '2019_07_01_125441_create_anggota_lembaga_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orbitasi`
--

CREATE TABLE `orbitasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `uraian` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orbitasi`
--

INSERT INTO `orbitasi` (`id`, `uraian`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Jarak dari Pusat Pemerintahan Kecamatan', '0,5 KM', '2022-07-03 21:40:13', '2022-07-09 12:50:14'),
(13, 'Jarak dari Pusat Pemerintahan Kota', '32 KM', '2022-07-09 12:51:02', '2022-07-09 12:51:02'),
(14, 'Jarak dari Ibu Kota Kabupaten', '20 KM', '2022-07-09 12:51:22', '2022-07-09 12:51:22'),
(15, 'Jarak dari Ibu Kota Provinsi', '125 KM', '2022-07-09 12:51:42', '2022-07-09 12:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelayanan`
--

INSERT INTO `pelayanan` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(16, 'Pembuatan Surat Keterangan Domisili', '<p>Silakan Buat</p>', '2022-07-03 21:59:41', '2022-07-03 21:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `uraian_pendapatan` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_pendapatan` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`id`, `uraian_pendapatan`, `nominal_pendapatan`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'Piutang Barang ABC', '5000000', '2019', '2022-07-03 21:40:57', '2022-07-03 21:40:57'),
(2, 'Pajak Pasar', '12500000', '2019', '2022-07-03 21:40:57', '2022-07-03 21:40:57'),
(3, 'Piutang PT. Lorem Ipsum', '19750000', '2019', '2022-07-03 21:40:57', '2022-07-03 21:40:57'),
(4, 'Pajak Jalan Tol', '12250000', '2019', '2022-07-03 21:40:57', '2022-07-03 21:40:57'),
(5, 'Putang Barang ABC', '5000000', '2018', '2022-07-03 21:40:57', '2022-07-03 21:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penduduk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_penduduk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Telaga Asih',
  `kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cikarang Barat',
  `kabupaten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kabupaten Bekasi',
  `provinsi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Jawa Barat',
  `status_menikah` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto_penduduk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `pekerjaan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_darah` enum('o','a','b','ab','tidak diketahui') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lingkungan` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_pendatang` int(10) NOT NULL DEFAULT 0 COMMENT '0: pendududuk, 1: pendatang',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `alamat_penduduk`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `status_menikah`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `foto_penduduk`, `pekerjaan`, `agama`, `pendidikan_terakhir`, `golongan_darah`, `lingkungan`, `rt`, `rw`, `is_pendatang`, `created_at`, `updated_at`) VALUES
(1, '2793492587869391', '5529765186593508', 'Aulia Harvy', 'Jl. Imam Bonjol IIF/24a', 'Telaga Asih', 'Cikarang Barat', 'Kabupaten Bekasi', 'Jawa Barat', 'Belum Kawin', 'laki-laki', 'Jakarta', '1998-02-13', 'default.jpg', 'Karyawan Swasta', 'Muslim', 'sma', 'o', '2', '001', '001', 0, '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(76, '3793492587869398', '6629765186593508', 'Budi Sudarsono', 'DK Krajan', 'Peniron', 'Pejagoan', 'Kebumen', 'Jawa Tengah', 'Belum Kawin', 'laki-laki', 'Kebumen', '1998-02-13', 'default.jpg', 'Karyawan Swasta', 'Muslim', 'sma', 'o', '2', '002', '002', 1, '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(77, '21393492587869397', '2229765186593508', 'Mimin Suryana', 'Jl. Imam Bonjol IIF/27', 'Telaga Asih', 'Cikarang Barat', 'Kabupaten Bekasi', 'Jawa Barat', 'Belum Kawin', 'laki-laki', 'Jakarta', '1998-02-13', 'default.jpg', 'Karyawan Swasta', 'Muslim', 'sma', 'o', '2', '001', '001', 0, '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(78, '2793492587869393', '5529765186593508', 'Lukman', 'Perum Taman Aster', 'Telaga Asih', 'Cikarang Barat', 'Kabupaten Bekasi', 'Jawa Barat', 'Belum Kawin', 'laki-laki', 'Jakarta', '1998-02-13', 'default.jpg', 'Karyawan Swasta', 'Muslim', 'sma', 'o', '2', '002', '002', 0, '2022-07-03 21:40:56', '2022-07-03 21:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `gambar`, `warna`, `created_at`, `updated_at`) VALUES
(1, 'bg2.jpg', '#3498db', '2022-07-03 21:40:57', '2022-07-05 18:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_penduduk` int(11) NOT NULL DEFAULT 0,
  `is_ketua` int(10) NOT NULL DEFAULT 0 COMMENT '0: penduduk, 1: ketua rt, 2: ketua rw',
  `nama_pengguna` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pengguna` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_pengguna` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('perempuan','laki-laki') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_pengguna` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `id_penduduk`, `is_ketua`, `nama_pengguna`, `email_pengguna`, `password_pengguna`, `jenis_kelamin`, `no_hp`, `foto_pengguna`, `created_at`, `updated_at`) VALUES
(12, 1, 0, 'Aulia Harvy', 'penduduk@gmail.com', 'c6d19bddcfae6ca2b9dc0b90685ba2b590912955', 'laki-laki', '089652847221', '', '2022-07-03 21:53:44', '2022-07-03 21:53:44'),
(13, 76, 0, 'Budi Sudarsono', 'pendatang@gmail.com', 'c6d19bddcfae6ca2b9dc0b90685ba2b590912955', 'laki-laki', '089652847221', '', '2022-07-09 12:20:33', '2022-07-09 12:20:33'),
(14, 77, 1, 'Mimin Suryana', 'ketuart@gmail.com', 'c6d19bddcfae6ca2b9dc0b90685ba2b590912955', 'laki-laki', '089652847221', '', '2022-07-09 12:21:33', '2022-07-09 12:21:33'),
(15, 78, 1, 'Lukman', 'ketuart02@gmail.com', 'c6d19bddcfae6ca2b9dc0b90685ba2b590912955', 'laki-laki', '089652847221', '', '2022-07-09 12:21:33', '2022-07-09 12:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan_tanah`
--

CREATE TABLE `penggunaan_tanah` (
  `id` int(10) UNSIGNED NOT NULL,
  `uraian_penggunaan_tanah` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_penggunaan_tanah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penggunaan_tanah`
--

INSERT INTO `penggunaan_tanah` (`id`, `uraian_penggunaan_tanah`, `keterangan_penggunaan_tanah`, `created_at`, `updated_at`) VALUES
(1, 'Sawah Irigasi Teknis', '2 HA', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(2, 'Sawah Irigasi Semi Teknis', '2 HA', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(3, 'Sawah Tadah Hujan', '2 HA', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(4, 'Tegal / Ladang', '20 HA', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(5, 'Pemukiman', '30 HA', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(6, 'Tanah Perkebunan Rakyat', '2 HA', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(7, 'Tanah Perkebunan Swasta', '2 HA', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(8, 'Tanah Kas Desa', '2 HA', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(9, 'Lapangan', '2 HA', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(10, 'Perkantoran Pemerintah', '2 HA', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(11, 'Sawah Irigasi Teknis', '2 HA', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(12, 'Sawah Irigasi Semi Teknis', '2 HA', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(13, 'Sawah Tadah Hujan', '2 HA', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(14, 'Tegal / Ladang', '20 HA', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(15, 'Pemukiman', '30 HA', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(16, 'Tanah Perkebunan Rakyat', '2 HA', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(17, 'Tanah Perkebunan Swasta', '2 HA', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(18, 'Tanah Kas Desa', '2 HA', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(19, 'Lapangan', '2 HA', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(20, 'Perkantoran Pemerintah', '2 HA', '2022-07-03 21:40:56', '2022-07-03 21:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `no_sp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_register` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_sp` date DEFAULT NULL,
  `alamat_domisili` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_domisili` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_domisili` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten_domisili` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi_domisili` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt_domisili` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw_domisili` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penggunaan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0: Draft, 1: Proses Verifikasi, 2: Proses Checking, 3: Approved',
  `nik` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `verifikasi_rt` tinyint(1) NOT NULL DEFAULT 0,
  `verifikasi_rw` tinyint(1) NOT NULL DEFAULT 0,
  `checking_kasi` tinyint(1) NOT NULL DEFAULT 0,
  `approved_lurah` tinyint(1) NOT NULL DEFAULT 0,
  `alasan_tolak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_pendatang` int(10) NOT NULL DEFAULT 0 COMMENT '0: penduduk, 1: pendatang',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id_permohonan`, `id_layanan`, `no_sp`, `no_register`, `tgl_sp`, `alamat_domisili`, `desa_domisili`, `kecamatan_domisili`, `kabupaten_domisili`, `provinsi_domisili`, `rt_domisili`, `rw_domisili`, `keterangan`, `penggunaan`, `status`, `nik`, `id_user`, `verifikasi_rt`, `verifikasi_rw`, `checking_kasi`, `approved_lurah`, `alasan_tolak`, `is_pendatang`, `created_at`, `updated_at`) VALUES
(15, 16, '10/07/2022/5', NULL, NULL, 'Perumahan Taman Aster Blok D no 1', 'Telaga Asih', 'Cikarang Barat', 'Kabupaten Bekasi', 'Jawa Barat', '002', '002', NULL, 'Buat SKCK', 0, '3793492587869398', 13, 0, 0, 0, 0, NULL, 1, '2022-07-10 01:07:27', '2022-07-10 01:07:27'),
(16, 16, '10/07/2022/7', NULL, NULL, 'Jl. Imam Bonjol IIF/24a', 'Telaga Asih', 'Cikarang Barat', 'Kabupaten Bekasi', 'Jawa Barat', '001', '001', NULL, 'Melamar Pekerjaan', 4, '2793492587869391', 12, 1, 1, 1, 1, NULL, 0, '2022-07-10 01:07:53', '2022-07-10 01:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visi_misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `alamat`, `telepon`, `email`, `deskripsi`, `logo`, `visi_misi`, `created_at`, `updated_at`) VALUES
(1, 'Telaga Asih', 'Kecamatan Cikarang Barat, Kabupaten Bekasi', '0896-5284-7221', 'contoh@email.com', '<p>a</p>', '20220703230526.png', '<p>VISI : \"TERWUJUDNYA PELAYANAN <strong>PRIMA </strong>KEPADA MASYARAKAT SECARA PROFESIONAL, KUALITAS KERJA UNGGUL,&nbsp; DAN PEMBANGUNAN BERWAWASAN LINGKUNGAN&nbsp;&ldquo;</p>\r\n<p><br />MISI : <br />1. MENINGKATKAN KINERJA PEGAWAI YANG DISIPLIN DAN BERKUALITAS<br />2. MEMBINA HUBUNGAN KERJA DAN KOORDINASI YANG HARMONIS<br />3. MENDORONG TERCIPTANYA KESEJAHTERAAN MASYARAKAT DAN LINGKUNGAN YANG SEHAT<br /><br /></p>\r\n<p>MOTO : \"PELAYANAN YANG <strong>PRIMA (P</strong>ROFESIONAL<strong>, R</strong>AMAH<strong>, I</strong>NOVATIF,<strong> M</strong>AJU DAN TER<strong>A</strong>RAH\"</p>', '2022-07-03 21:40:13', '2022-07-05 18:30:32'),
(2, 'Kelurahan XYZ', 'Kec. ABC, Kab. DEF, Provinsi GHI', '08xx-xxxx-xxxx', 'contoh@email.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In leo nibh, ornare id nisl at, rhoncus tincidunt ante. Suspendisse potenti. Vivamus ultricies felis nec pharetra placerat. Cras nec massa varius, scelerisque felis ut, rutrum justo. Curabitur ornare dignissim nulla ac vehicula. Mauris at orci id urna eleifend volutpat feugiat eget justo. Nunc molestie dui sit amet ante pharetra viverra. Maecenas augue ex, lacinia quis nisi eget, ultricies vestibulum turpis. Quisque a sem tristique, tincidunt mi eu, scelerisque nisi. Mauris vitae tempus ex.\n                <br>\n                Cras sodales rutrum elementum. Aenean luctus, eros sit amet ultrices convallis, turpis orci condimentum purus, nec vehicula est felis at justo. Donec iaculis erat non justo fermentum, vel dapibus justo pulvinar. Mauris vestibulum quam odio, non molestie nunc volutpat eu. Maecenas arcu risus, rhoncus rutrum augue a, ultrices malesuada arcu. Fusce sit amet neque blandit augue semper efficitur. In risus magna, mollis sit amet faucibus vel, tempus sed eros. Aliquam ipsum libero, malesuada et nunc ac, pellentesque tincidunt quam.\n                <br>\n                Mauris ut mi felis. Vivamus in accumsan elit. Fusce id orci vitae erat varius vestibulum. Fusce ac mattis nisl. Sed in elit tellus. Nunc sodales finibus ipsum, et consequat nibh viverra in. Maecenas at ipsum nisl. Etiam vel nibh eget sapien commodo malesuada quis ut diam. In ac nisi sapien. In auctor rutrum consectetur. Morbi vitae rhoncus sapien. Sed nibh arcu, dictum eu ipsum quis, varius scelerisque nisl. Aliquam at fermentum ante.\n                <br>\n                Sed vulputate laoreet nisi, in rutrum lacus faucibus a. Proin id auctor lectus, at imperdiet ligula. Aliquam varius, ligula in dapibus dictum, nisi dolor vehicula lacus, ut auctor ipsum eros quis sapien. Suspendisse at semper enim, sit amet ullamcorper magna. Integer nec sodales lorem. Donec turpis massa, semper sit amet massa vitae, accumsan porta augue. Donec in tortor ligula. Sed ultrices arcu sed felis semper commodo. Morbi imperdiet justo eget tristique ornare. Nam cursus sagittis massa, sit amet faucibus purus bibendum sed. Phasellus justo est, efficitur vitae fringilla at, imperdiet at mi. Sed eu nisi consectetur ipsum egestas placerat. Nam ullamcorper elit id magna dictum, elementum efficitur augue finibus. Vestibulum tincidunt in turpis nec vestibulum. Quisque non ex non ipsum vulputate tempus et vitae neque.\n                <br>\n                Nunc vehicula ornare purus in vulputate. Sed congue justo ligula, a fermentum neque ullamcorper vel. Etiam a aliquet mi, vel consectetur ex. Maecenas sed luctus risus. Nam eu fringilla eros. Quisque interdum pulvinar nisi, eleifend bibendum quam convallis sed. Nulla ultricies massa tellus, nec vehicula eros blandit sed. In malesuada nisi euismod mauris tempus luctus. ', 'LOGOKABGOR.png', 'VISI : \"MENJADIKAN XYZ YANG BERSINAR“ <br>\n                MISI : <br>\n                1. Nunc vehicula ornare purus in vulputate. Sed congue justo ligula, a fermentum neque ullamcorper vel. Etiam a aliquet mi, vel consectetur ex. <br>\n                2. Nunc vehicula ornare purus in vulputate. Sed congue justo ligula, a fermentum neque ullamcorper vel. Etiam a aliquet mi, vel consectetur ex <br>\n                3. Nunc vehicula ornare purus in vulputate. Sed congue justo ligula, a fermentum neque ullamcorper vel. Etiam a aliquet mi, vel consectetur ex <br>\n                4. Nunc vehicula ornare purus in vulputate. Sed congue justo ligula, a fermentum neque ullamcorper vel. Etiam a aliquet mi, vel consectetur ex <br>\n                5. Nunc vehicula ornare purus in vulputate. Sed congue justo ligula, a fermentum neque ullamcorper vel. Etiam a aliquet mi, vel consectetur ex <br>\n                6. Nunc vehicula ornare purus in vulputate. Sed congue justo ligula, a fermentum neque ullamcorper vel. Etiam a aliquet mi, vel consectetur ex <br>\n                7. Nunc vehicula ornare purus in vulputate. Sed congue justo ligula, a fermentum neque ullamcorper vel. Etiam a aliquet mi, vel consectetur ex <br>', '2022-07-03 21:40:56', '2022-07-03 21:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `tanaman_komoditas`
--

CREATE TABLE `tanaman_komoditas` (
  `id` int(10) UNSIGNED NOT NULL,
  `uraian_tanaman_komoditas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas_tanaman_komoditas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produksi_per_ha` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanaman_komoditas`
--

INSERT INTO `tanaman_komoditas` (`id`, `uraian_tanaman_komoditas`, `luas_tanaman_komoditas`, `produksi_per_ha`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'Padi', '80 HA', '4,5 Ton', '2019', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(2, 'Jagung', '75 HA', '2,7 Ton', '2019', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(3, 'Kacang Hijau', '27 HA', '0,7 Ton', '2019', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(4, 'Kacang Tanah', '12 HA', '1 Ton', '2018', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(5, 'Semangka', '5 HA', '1 Ton', '2018', '2022-07-03 21:40:56', '2022-07-03 21:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `tipologi`
--

CREATE TABLE `tipologi` (
  `id` int(10) UNSIGNED NOT NULL,
  `uraian_tipologi` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_tipologi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipologi`
--

INSERT INTO `tipologi` (`id`, `uraian_tipologi`, `keterangan_tipologi`, `created_at`, `updated_at`) VALUES
(1, 'Desa Sekitar Hutan', 'tidak', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(2, 'Desa Terisolasi', 'tidak', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(3, 'Desa Perbatasan Kabupaten Lain', 'tidak', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(4, 'Desa Perbatasan Kecamatan Lain', 'tidak', '2022-07-03 21:40:13', '2022-07-03 21:40:13'),
(5, 'Desa Sekitar Hutan', 'tidak', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(6, 'Desa Terisolasi', 'tidak', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(7, 'Desa Perbatasan Kabupaten Lain', 'tidak', '2022-07-03 21:40:56', '2022-07-03 21:40:56'),
(8, 'Desa Perbatasan Kecamatan Lain', 'tidak', '2022-07-03 21:40:56', '2022-07-03 21:40:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota_lembaga`
--
ALTER TABLE `anggota_lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikel_id_pengguna_foreign` (`id_pengguna`);

--
-- Indexes for table `batas`
--
ALTER TABLE `batas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `belanja`
--
ALTER TABLE `belanja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_ekonomi`
--
ALTER TABLE `fasilitas_ekonomi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_kesehatan`
--
ALTER TABLE `fasilitas_kesehatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_pemerintahan`
--
ALTER TABLE `fasilitas_pemerintahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_pemukiman`
--
ALTER TABLE `fasilitas_pemukiman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_pendidikan`
--
ALTER TABLE `fasilitas_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_peribadatan`
--
ALTER TABLE `fasilitas_peribadatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_prasarana`
--
ALTER TABLE `fasilitas_prasarana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iklim`
--
ALTER TABLE `iklim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infra_melintasi`
--
ALTER TABLE `infra_melintasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kesuburan_tanah`
--
ALTER TABLE `kesuburan_tanah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_increment`
--
ALTER TABLE `master_increment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orbitasi`
--
ALTER TABLE `orbitasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_pengguna` (`email_pengguna`);

--
-- Indexes for table `penggunaan_tanah`
--
ALTER TABLE `penggunaan_tanah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanaman_komoditas`
--
ALTER TABLE `tanaman_komoditas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipologi`
--
ALTER TABLE `tipologi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `anggota_lembaga`
--
ALTER TABLE `anggota_lembaga`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `batas`
--
ALTER TABLE `batas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `belanja`
--
ALTER TABLE `belanja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `fasilitas_ekonomi`
--
ALTER TABLE `fasilitas_ekonomi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fasilitas_kesehatan`
--
ALTER TABLE `fasilitas_kesehatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fasilitas_pemerintahan`
--
ALTER TABLE `fasilitas_pemerintahan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fasilitas_pemukiman`
--
ALTER TABLE `fasilitas_pemukiman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fasilitas_pendidikan`
--
ALTER TABLE `fasilitas_pendidikan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fasilitas_peribadatan`
--
ALTER TABLE `fasilitas_peribadatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fasilitas_prasarana`
--
ALTER TABLE `fasilitas_prasarana`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `iklim`
--
ALTER TABLE `iklim`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `infra_melintasi`
--
ALTER TABLE `infra_melintasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kesuburan_tanah`
--
ALTER TABLE `kesuburan_tanah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_increment`
--
ALTER TABLE `master_increment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orbitasi`
--
ALTER TABLE `orbitasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penggunaan_tanah`
--
ALTER TABLE `penggunaan_tanah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanaman_komoditas`
--
ALTER TABLE `tanaman_komoditas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipologi`
--
ALTER TABLE `tipologi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
