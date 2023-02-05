-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2023 at 02:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning-school`
--

-- --------------------------------------------------------

--
-- Table structure for table `academy_years`
--

CREATE TABLE `academy_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_academic_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academy_years`
--

INSERT INTO `academy_years` (`id`, `name_academic_year`, `created_at`, `updated_at`) VALUES
(2, '2022 / 2023', '2022-11-09 07:44:17', '2022-11-09 07:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL,
  `valid_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `detail_information`, `id_user`, `post_date`, `valid_date`, `created_at`, `updated_at`) VALUES
(21, 'Information: UTS', 'Kartu ujian sudah bisa diambil ke bagian TU.\r\nTerima kasih', '0', '2022-11-05 20:52:54', '2022-11-24 12:00:00', '2022-11-05 13:52:54', '2022-11-05 13:52:54'),
(25, 'Telat Masuk Sekolah', 'Bagi yang telat masuk dapat hukuman di DO dari sekolah. Maaf hukum ini sangat sadis hahahaha', '0', '2022-11-06 21:29:00', '2023-05-31 23:59:00', '2022-11-06 14:29:00', '2022-11-15 08:31:43'),
(26, 'INFO: BESOK LIBURAN KE PLANET MARS', '<p>Besok perlu bawa roket mainan. hahahahhahhahaha</p>', '2', '2022-11-07 09:35:42', '2023-01-06 01:00:00', '2022-11-07 02:35:42', '2023-01-06 02:22:05'),
(27, 'Daftar Lomba Coding', 'Daftar Lomba Coding', '0', '2022-11-09 09:40:53', '2022-11-30 23:30:00', '2022-11-09 02:40:53', '2022-11-09 07:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `file_asg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id_id`, `title`, `assign_date`, `due_date`, `file_asg`, `id_subject`, `created_at`, `updated_at`) VALUES
(13, 'Math 1 1', '2022-12-02 12:00:00', '2022-12-28 12:00:00', '20221203195862c429fd91ee1-ProposalSkripsiHafiz(Signed)-1.pdf', '5', '2022-12-03 12:58:17', '2022-12-03 12:59:31'),
(14, 'Bikin Tabel', '2022-12-15 12:00:00', '2022-12-29 12:00:00', '2022120319592879-7884-2-PB.pdf', '7', '2022-12-03 12:59:53', '2022-12-03 12:59:53'),
(16, 'Math 2 2', '2022-12-22 12:00:00', '2023-01-08 00:00:00', '202212082116190-433-1-PB.pdf', '5', '2022-12-08 14:16:13', '2022-12-08 14:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_details`
--

CREATE TABLE `assignment_details` (
  `id_id` bigint(20) UNSIGNED NOT NULL,
  `id_assignment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_student` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_assignment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignment_details`
--

INSERT INTO `assignment_details` (`id_id`, `id_assignment`, `id_student`, `score`, `file_assignment`, `created_at`, `updated_at`) VALUES
(156, '13', '12', '80', '2023010609403B0FFAB4-BA30-4A18-995E-341485C1211A-Done_2301861125_2301862292_2301868232_ABCSC_Non_Kelas_2709.pdf', '2023-01-06 02:40:05', '2023-01-06 02:40:05'),
(158, '13', '15', '100', '202301061800Seviera Prameswari.pdf', '2023-01-06 11:00:21', '2023-01-06 11:00:21'),
(159, '16', '12', '80', '202301062313190-433-1-PB.pdf', '2023-01-06 16:13:16', '2023-01-06 16:13:16'),
(160, '16', '15', '90', '202301071557Geochem Geophys Geosyst - 2008 - Korhonen - GEOMAGIA50 An archeointensity database with PHP and MySQL.pdf', '2023-01-06 16:21:12', '2023-01-07 08:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id_atte` bigint(20) UNSIGNED NOT NULL,
  `id_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `done` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id_atte`, `id_subject`, `date`, `time`, `done`, `created_at`, `updated_at`) VALUES
(21, '5', '2022-12-16', '6', 1, '2022-12-16 15:11:35', '2022-12-16 15:13:22'),
(22, '5', '2022-12-17', '6', 1, '2022-12-16 15:11:44', '2022-12-16 15:13:28'),
(23, '7', '2022-12-16', '6', 1, '2022-12-16 15:39:20', '2022-12-16 15:39:31'),
(24, '7', '2022-12-17', '8', 1, '2022-12-16 15:39:42', '2022-12-16 15:39:49'),
(25, '5', '2023-01-04', '6', 1, '2023-01-04 12:15:55', '2023-01-04 12:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_details`
--

CREATE TABLE `attendance_details` (
  `id_atte_detail` bigint(20) UNSIGNED NOT NULL,
  `id_atte` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_student` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_atte_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_details`
--

INSERT INTO `attendance_details` (`id_atte_detail`, `id_atte`, `id_student`, `id_atte_type`, `note`, `created_at`, `updated_at`) VALUES
(121, '21', '12', '2', NULL, '2022-12-16 15:13:22', '2022-12-16 15:13:22'),
(122, '21', '10', '2', NULL, '2022-12-16 15:13:22', '2022-12-16 15:13:22'),
(123, '21', '15', '1', NULL, '2022-12-16 15:13:22', '2022-12-16 15:13:22'),
(124, '22', '12', '2', NULL, '2022-12-16 15:13:28', '2022-12-16 15:13:28'),
(125, '22', '10', '2', NULL, '2022-12-16 15:13:28', '2022-12-16 15:13:28'),
(126, '22', '15', '4', NULL, '2022-12-16 15:13:28', '2022-12-16 15:13:28'),
(127, '23', '12', '2', NULL, '2022-12-16 15:39:31', '2022-12-16 15:39:31'),
(128, '23', '15', '2', NULL, '2022-12-16 15:39:31', '2022-12-16 15:39:31'),
(129, '23', '14', '4', 'Acara', '2022-12-16 15:39:31', '2022-12-16 15:39:31'),
(130, '24', '12', '2', NULL, '2022-12-16 15:39:49', '2022-12-16 15:39:49'),
(131, '24', '15', '2', NULL, '2022-12-16 15:39:49', '2022-12-16 15:39:49'),
(132, '24', '14', '1', NULL, '2022-12-16 15:39:49', '2022-12-16 15:39:49'),
(133, '25', '12', '2', NULL, '2023-01-04 12:16:24', '2023-01-04 12:16:24'),
(134, '25', '10', '4', 'Ada acara keluarga', '2023-01-04 12:16:24', '2023-01-04 12:16:24'),
(135, '25', '15', '2', NULL, '2023-01-04 12:16:24', '2023-01-04 12:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_types`
--

CREATE TABLE `attendance_types` (
  `id_atte_type` bigint(20) UNSIGNED NOT NULL,
  `name_attendance_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_types`
--

INSERT INTO `attendance_types` (`id_atte_type`, `name_attendance_type`, `created_at`, `updated_at`) VALUES
(1, 'Sick (Sakit)', '2022-12-11 17:00:00', '2022-12-11 17:00:00'),
(2, 'Present (Hadir)', '2022-12-11 17:00:00', '2022-12-11 17:00:00'),
(3, 'Absent (Alpa)', '2022-12-11 17:00:00', '2022-12-11 17:00:00'),
(4, 'Permit (Izin)', '2022-12-11 17:00:00', '2022-12-11 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cancelations`
--

CREATE TABLE `cancelations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_schedule` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teacher` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason_cancelation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cancelations`
--

INSERT INTO `cancelations` (`id`, `id_schedule`, `id_teacher`, `reason_cancelation`, `created_at`, `updated_at`) VALUES
(3, '5', '8', 'Lagi dinas di dinas pendidikan jakarta timur.', '2022-12-03 03:35:12', '2022-12-03 03:35:12'),
(5, '6', '8', 'Sakit', '2022-12-05 13:36:01', '2022-12-05 13:36:01'),
(6, '5', '8', 'Pada hari senin saya izin tidak masuk karena ada acara keluarga di luar kota.', '2022-12-15 12:50:45', '2022-12-15 12:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `class_details`
--

CREATE TABLE `class_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_details`
--

INSERT INTO `class_details` (`id`, `id_user`, `id_class`, `created_at`, `updated_at`) VALUES
(18, '10', '4', '2022-11-08 03:05:33', '2022-11-08 03:09:43'),
(21, '12', '1', '2022-11-08 13:13:58', '2022-11-09 03:56:03'),
(22, '10', '1', '2022-11-08 13:14:03', '2022-11-09 03:55:20'),
(23, '15', '1', '2022-11-08 13:14:07', '2022-11-08 13:14:07'),
(24, '12', '5', '2022-11-10 12:57:49', '2022-11-10 12:57:49'),
(25, '15', '2', '2022-11-21 12:44:29', '2022-11-21 12:44:29'),
(26, '4', '2', '2022-11-21 15:01:56', '2022-11-21 15:01:56'),
(27, '15', '5', '2022-11-21 15:08:48', '2022-11-21 15:08:48'),
(28, '14', '5', '2022-11-21 15:13:25', '2022-11-21 15:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `class_infos`
--

CREATE TABLE `class_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teacher` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_infos`
--

INSERT INTO `class_infos` (`id`, `name_class`, `major`, `id_teacher`, `created_at`, `updated_at`) VALUES
(1, '10 Science 1', '1', '16', '2022-10-29 02:10:24', '2022-10-29 02:10:24'),
(2, '10 Science 2', '1', '16', '2022-10-29 02:11:50', '2022-11-01 08:26:02'),
(4, '10 Social 2', '2', '7', '2022-10-29 02:28:11', '2022-11-11 02:17:05'),
(5, '10 Social 1', '2', '16', '2022-11-08 12:51:06', '2022-11-08 12:51:06'),
(6, '11 Science 1', '1', '17', '2022-11-08 12:51:27', '2022-11-11 02:05:05'),
(7, '11 Science 2', '1', '13', '2022-11-08 12:51:41', '2022-11-11 02:04:56'),
(8, '12 Science 1', '1', '7', '2022-11-11 02:05:26', '2022-11-11 02:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id_forum` bigint(20) UNSIGNED NOT NULL,
  `id_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user_full` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_forum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `done` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_forum` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id_forum`, `id_subject`, `id_user_full`, `title_forum`, `description`, `done`, `date_forum`, `created_at`, `updated_at`) VALUES
(1, '6', '4', 'Latihan 1 1', 'Belajar mandiri yaa untuk Latihan 1 1\r\n', '1', '2023-01-02 20:36:57', '2023-01-02 05:03:46', '2023-01-02 13:36:57'),
(5, '5', '8', 'Math 1 2', 'Math 1 Math 2 Math 3\r\n Math 1 Math 2 Math 3\r\n Math 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\nMath 1 Math 2 Math 3\r\n', '1', '2023-01-03 06:44:15', '2023-01-02 11:38:37', '2023-01-02 23:44:15'),
(6, '5', '15', 'Oke 2', 'Oke 2', '0', '2023-01-02 20:37:39', '2023-01-02 11:39:23', '2023-01-02 13:37:39'),
(7, '7', '8', 'SEPI BELOM MANDI', 'cara cara mandi', '0', '2023-01-04 19:52:12', '2023-01-04 12:52:12', '2023-01-04 12:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `forum_details`
--

CREATE TABLE `forum_details` (
  `id_forum_detail` bigint(20) UNSIGNED NOT NULL,
  `id_forum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user_full1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `done_detail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_forum_detail` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_details`
--

INSERT INTO `forum_details` (`id_forum_detail`, `id_forum`, `id_user_full1`, `description_detail`, `done_detail`, `date_forum_detail`, `created_at`, `updated_at`) VALUES
(4, '5', '8', 'Oke 1', '1', '2023-01-03 17:16:33', '2023-01-03 10:04:41', '2023-01-03 10:16:33'),
(5, '1', '4', 'rr 1', '1', '2023-01-03 17:16:22', '2023-01-03 10:04:45', '2023-01-03 10:16:22'),
(7, '6', '8', 'Oke', '1', '2023-01-03 17:25:48', '2023-01-03 10:21:50', '2023-01-03 10:25:48'),
(8, '6', '12', 'Siap kak', '1', '2023-01-04 07:31:33', '2023-01-03 10:22:24', '2023-01-04 00:31:33'),
(14, '7', '8', '1. ambil gayung', '0', '2023-01-04 19:52:23', '2023-01-04 12:52:23', '2023-01-04 12:52:23'),
(15, '7', '8', '2. celupkan ke bak', '0', '2023-01-04 19:52:33', '2023-01-04 12:52:33', '2023-01-04 12:52:33'),
(16, '5', '15', 'test', '0', '2023-01-04 19:58:55', '2023-01-04 12:58:55', '2023-01-04 12:58:55'),
(17, '7', '15', '3. siram ke BAdan', '0', '2023-01-04 19:59:23', '2023-01-04 12:59:23', '2023-01-04 12:59:23'),
(18, '8', '12', '1. Setelah mandi saya makan pagi', '0', '2023-01-07 20:16:41', '2023-01-07 13:16:41', '2023-01-07 13:16:41'),
(19, '8', '15', '2. Pergi', '0', '2023-01-07 20:18:56', '2023-01-07 13:18:56', '2023-01-07 13:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id_grade` bigint(20) UNSIGNED NOT NULL,
  `id_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_academic_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_score` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `done` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id_grade`, `id_subject`, `id_academic_year`, `id_semester`, `min_score`, `done`, `created_at`, `updated_at`) VALUES
(2, '7', '2', '1', '75', 1, '2022-12-20 03:46:11', '2022-12-31 05:33:07'),
(3, '8', '2', '1', '70', 1, '2022-12-31 10:38:23', '2023-01-01 01:01:43'),
(8, '5', '2', '1', '80', 1, '2023-01-04 12:44:00', '2023-01-04 12:45:59'),
(9, '7', '2', '2', '85', 1, '2023-01-11 15:06:26', '2023-01-12 09:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `grade_details`
--

CREATE TABLE `grade_details` (
  `id_grade_detail` bigint(20) UNSIGNED NOT NULL,
  `id_grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_student` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_t` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_details`
--

INSERT INTO `grade_details` (`id_grade_detail`, `id_grade`, `id_student`, `quiz`, `assignment`, `d_t`, `min_text`, `final_text`, `total`, `created_at`, `updated_at`) VALUES
(28, '2', '12', '90', '80', '90', '88', '69', '79.4', '2022-12-31 05:33:07', '2022-12-31 05:34:33'),
(29, '2', '15', '80', '80', '80', '90', '70', '78', '2022-12-31 05:33:07', '2022-12-31 05:34:33'),
(30, '2', '14', '70', '78', '70', '98', '81', '85.4', '2022-12-31 05:33:07', '2022-12-31 05:34:33'),
(72, '3', '12', '90', '80', '90', '70', '76', '81.2', '2023-01-01 01:01:43', '2023-01-01 01:01:43'),
(73, '3', '15', '70', '80', '80', '70', '80', '76', '2023-01-01 01:01:43', '2023-01-01 01:01:43'),
(74, '3', '14', '76', '78', '88', '80', '70', '78.4', '2023-01-01 01:01:43', '2023-01-01 01:01:43'),
(75, '8', '12', '90', '60', '90', '80', '100', '84', '2023-01-04 12:45:59', '2023-01-07 11:45:02'),
(76, '8', '10', '90', '80', '90', '90', '70', '84', '2023-01-04 12:45:59', '2023-01-07 11:44:32'),
(77, '8', '15', '90', '80', '90', '90', '100', '90', '2023-01-04 12:45:59', '2023-01-07 11:45:02'),
(78, '9', '12', '80', '80', '70', '100', '100', '86', '2023-01-12 09:04:21', '2023-01-12 09:04:21'),
(79, '9', '15', '100', '80', '70', '90', '98', '87.6', '2023-01-12 09:04:21', '2023-01-12 09:04:21'),
(80, '9', '14', '100', '100', '80', '70', '100', '90', '2023-01-12 09:04:21', '2023-01-12 09:04:21');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_29_030950_create_class_infos_table', 2),
(6, '2022_10_29_134928_create_class_details_table', 3),
(7, '2022_11_02_011759_create_announcements_table', 4),
(8, '2022_11_05_011759_create_announcements_table', 5),
(9, '2022_11_07_092121_create_point_students_table', 6),
(10, '2022_11_07_093704_create_p_s_violations_table', 7),
(11, '2022_11_07_094757_create_p_s_awards_table', 8),
(12, '2022_11_08_082024_create_p_s_violations_table', 9),
(13, '2022_11_08_082653_create_point_students_table', 10),
(14, '2022_11_08_133939_create_p_s_awards_table', 11),
(15, '2022_11_09_135959_create_academy_years_table', 12),
(16, '2022_11_09_154427_create_subjects_table', 13),
(17, '2022_11_09_180812_create_semesters_table', 13),
(18, '2022_11_10_173631_create_schedules_table', 14),
(19, '2022_11_10_182226_create_subjects_table', 15),
(20, '2022_11_11_140745_create_subject_types_table', 16),
(21, '2022_11_17_173253_create_assignments_table', 17),
(22, '2022_11_17_173845_create_assignment_details_table', 17),
(23, '2022_11_21_130029_create_temporary_files_table', 18),
(24, '2022_11_27_141257_create_quizzes_table', 19),
(25, '2022_11_27_142140_create_quiz_details_table', 19),
(26, '2022_12_02_123954_create_cancelations_table', 20),
(27, '2022_12_07_101621_create_subject_details_table', 21),
(28, '2022_12_08_210605_create_subjects_details_table', 22),
(29, '2022_12_12_182322_create_attendance_types_table', 23),
(30, '2022_12_12_183627_create_attendances_table', 24),
(31, '2022_12_13_093807_create_attendance_details_table', 25),
(32, '2022_12_17_112128_create_grades_table', 26),
(33, '2022_12_22_093454_create_grade_details_table', 27),
(34, '2023_01_02_100940_create_forums_table', 28),
(35, '2023_01_03_131335_create_forum_details_table', 29);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_students`
--

CREATE TABLE `point_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_student` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `point_students`
--

INSERT INTO `point_students` (`id`, `id_student`, `name_ps`, `created_at`, `updated_at`) VALUES
(30, '15', 'Telat', NULL, NULL),
(31, '15', 'Juara Olimpade Matematika Tingkat RT', NULL, NULL),
(32, '14', 'Nakal', NULL, NULL),
(33, '4', 'Tidak Sopan', NULL, NULL),
(34, '15', '1st Place International Level', NULL, NULL),
(35, '15', 'Tidak Sopan', NULL, NULL),
(36, '15', 'Telat', NULL, NULL),
(37, '10', 'Nakal', NULL, NULL),
(38, '12', 'Telat', NULL, NULL),
(39, '10', '2st Place International Level', NULL, NULL),
(40, '15', 'mencuri', NULL, NULL),
(41, '15', 'juara 1 sebintaro mendaki gunung', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_s_awards`
--

CREATE TABLE `p_s_awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `award` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `point` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_s_awards`
--

INSERT INTO `p_s_awards` (`id`, `id_ps`, `award`, `date`, `point`, `input`, `created_at`, `updated_at`) VALUES
(1, '31', 'Juara Olimpade Matematika Tingkat RT', '2022-10-30', '23', '5', NULL, NULL),
(3, '39', '2st Place International Level', '2022-11-29', '30', '7', NULL, NULL),
(4, '41', 'Award', '2023-01-04', '1', '8', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_s_violations`
--

CREATE TABLE `p_s_violations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `violation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `point` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_s_violations`
--

INSERT INTO `p_s_violations` (`id`, `id_ps`, `violation`, `date`, `point`, `input`, `created_at`, `updated_at`) VALUES
(22, '30', 'Telat', '2022-10-27', '2', '5', NULL, NULL),
(23, '32', 'Nakal', '2022-10-29', '2', '5', NULL, NULL),
(26, '36', 'Telat', '2022-10-29', '2', '7', NULL, NULL),
(27, '37', 'Nakal', '2020-01-01', '2', '8', NULL, NULL),
(28, '38', 'Telat', '2022-11-24', '2', '8', NULL, NULL),
(29, '40', 'Violation', '2023-01-04', '100', '8', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id_id` bigint(20) UNSIGNED NOT NULL,
  `id_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id_id`, `id_subject`, `title`, `assign_date`, `due_date`, `link`, `created_at`, `updated_at`) VALUES
(3, '5', 'Soal 1 Math', '2022-11-02 12:00:00', '2022-11-30 12:00:00', 'https://forms.office.com/Pages/ResponsePage.aspx?id=Y7mFNLqCb0qBD7XMIm_4mK7cYEQAdjZGtxGvzVu_vuRUMkVKQ0hQM0dXTE1TNzE3T1dNV0dRV05MMy4u', '2022-11-28 02:59:24', '2022-11-28 02:59:24'),
(7, '7', 'Soal 1 BI', '2022-11-01 12:00:00', '2022-11-29 12:00:00', 'https://forms.office.com/Pages/ResponsePage.aspx?id=Y7mFNLqCb0qBD7XMIm_4mK7cYEQAdjZGtxGvzVu_vuRUNE5IWktOSUFCQkM1OU05V1VGVkxXN1haOS4u', '2022-11-28 08:54:43', '2022-11-28 08:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_details`
--

CREATE TABLE `quiz_details` (
  `id_id` bigint(20) UNSIGNED NOT NULL,
  `id_quiz` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_student` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_details`
--

INSERT INTO `quiz_details` (`id_id`, `id_quiz`, `id_student`, `score`, `created_at`, `updated_at`) VALUES
(1, '7', '15', '100', '2022-11-28 11:20:28', '2022-11-28 14:12:55'),
(4, '7', '12', '40', '2022-11-28 14:16:09', '2022-11-28 14:16:09'),
(5, '7', '14', '80', '2022-12-04 14:35:45', '2022-12-04 14:35:45'),
(6, '3', '10', '90', '2022-12-09 12:37:06', '2022-12-09 12:37:06'),
(7, '8', '15', '0', '2023-01-04 12:51:28', '2023-01-04 12:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id_sch` bigint(20) UNSIGNED NOT NULL,
  `id_academic_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_off` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id_sch`, `id_academic_year`, `day`, `time_start`, `time_off`, `id_subject`, `id_semester`, `created_at`, `updated_at`) VALUES
(3, '2', '1', '08:00', '09:00', '6', '1', '2022-11-21 02:58:59', '2022-12-02 04:27:21'),
(4, '2', '2', '08:00', '10:00', '6', '1', '2022-11-21 02:59:26', '2022-11-21 02:59:26'),
(5, '2', '2', '11:00', '13:00', '5', '1', '2022-11-21 02:59:53', '2022-11-21 02:59:53'),
(6, '2', '5', '13:00', '15:00', '5', '1', '2022-11-30 07:17:22', '2022-12-03 13:10:57'),
(8, '2', '4', '09:00', '11:00', '7', '1', '2022-12-02 10:26:36', '2022-12-02 10:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name_semester`, `created_at`, `updated_at`) VALUES
(1, '1 (Odd)', '2022-11-09 17:00:00', '2022-11-09 17:00:00'),
(2, '2 (Even)', '2022-11-09 17:00:00', '2022-11-09 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id_sub` bigint(20) UNSIGNED NOT NULL,
  `name_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teacher` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_subject_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_academic_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_material` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_book` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id_sub`, `name_subject`, `id_class`, `id_teacher`, `id_subject_type`, `id_academic_year`, `detail_material`, `text_book`, `created_at`, `updated_at`) VALUES
(5, 'Mathematics', '1', '8', '1', '2', 'Matematika, adalah bidang ilmu, yang mencakup studi tentang topik-topik seperti bilangan, rumus dan struktur terkait, bangun dan ruang tempat mereka berada, dan besaran serta perubahannya. Tidak ada kesepakatan umum tentang ruang lingkup yang tepat atau status epistemologisnya.', 'Susanna S. Epp. (2011). Discrete mathematics with applications. 04. Brooks/Cole Publising. Boston', '2022-11-20 17:01:43', '2023-01-12 01:57:09'),
(6, 'Biology', '2', '13', '1', '2', 'Matematika, adalah bidang ilmu, yang mencakup studi tentang topik-topik seperti bilangan, rumus dan struktur terkait, bangun dan ruang tempat mereka berada, dan besaran serta perubahannya. Tidak ada kesepakatan umum tentang ruang lingkup yang tepat atau status epistemologisnya.', 'Susanna S. Epp. (2011)', '2022-11-20 17:04:36', '2023-01-12 01:57:14'),
(7, 'Bahasa Indonesia', '5', '8', '1', '2', 'Bahasa Indonesia adalah bahasa nasional dan resmi di seluruh Indonesia. Ini merupakan bahasa komunikasi resmi, diajarkan di sekolah-sekolah dan digunakan untuk disiarkan di media elektronik dan digital.', 'Susanna S. Epp. (2011). Discrete mathematics with applications. 04. Brooks/Cole Publising. Boston', '2022-11-20 22:54:19', '2023-01-12 01:57:16'),
(8, 'History', '6', '16', '2', '2', 'ejarah berfungsi sebagai sumber pengetahuan dan dijadikan media untuk menelusuri fakta dan peristiwa yang terjadi di masa lalu. Fungsi umum ini ditujukan supaya manusia di generasi selanjutnya bisa menjadikan peristiwa di masa lampau tersebut sebagai pelajaran serta pengalaman penting.', 'Susanna S. Epp. (2011). Discrete mathematics with applications. 04. Brooks/Cole Publising. Boston', '2022-11-21 03:02:18', '2023-01-12 03:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_details`
--

CREATE TABLE `subjects_details` (
  `id_sub_detail` bigint(20) UNSIGNED NOT NULL,
  `id_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_topics` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_material` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects_details`
--

INSERT INTO `subjects_details` (`id_sub_detail`, `id_subject`, `start_date`, `time`, `title`, `sub_topics`, `room`, `file_material`, `created_at`, `updated_at`) VALUES
(6, '5', '2022-12-29', '5', 'Test 1', 'Test 1 Test 1', '10 Science 1', '20221209205862c429fd91ee1-ProposalSkripsiHafiz(Signed)-1.pdf', '2022-12-09 06:34:56', '2022-12-09 13:58:27'),
(7, '5', '2022-12-31', '6', 'Test 2', 'Test 2 Test 2', '10 Science 1', '202212092056202211241106202211222346202211211503202211181727202208091919051000880055_Pengumuman Penerimaan Onsite Cross Campus Semester Ganjil 2210-1-1.pdf', '2022-12-09 06:34:56', '2022-12-10 04:02:01'),
(8, '7', '2022-12-19', '8', 'Bab 1', 'Bab 1 Bab 1 Bab 1 Bab 1 Bab 1 Bab 1 Bab 1 Bab 1 Bab 1 Bab 1', '10 Social 1', '202212171118190-433-1-PB.pdf', '2022-12-17 04:18:20', '2022-12-17 04:18:20'),
(11, '5', '2023-01-20', '6', 'Algo', 'Algo Algo Algo Algo Algo', '10 Science 1', '20230105090062c429fd91ee1-ProposalSkripsiHafiz(Signed).pdf', '2023-01-05 02:00:09', '2023-01-05 02:00:09'),
(12, '7', '2023-01-25', '8', 'Bab 2', 'Hahahaha', '10 Social 1', '202301050901202211210735LMS - SMA Poris Indah.pdf', '2023-01-05 02:01:02', '2023-01-05 02:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `subject_types`
--

CREATE TABLE `subject_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_types`
--

INSERT INTO `subject_types` (`id`, `subject_type`, `created_at`, `updated_at`) VALUES
(1, 'Compulsory Subjects', '2022-11-10 17:00:00', '2022-11-10 17:00:00'),
(2, 'Elective Subjects', '2022-11-10 17:00:00', '2022-11-10 17:00:00'),
(3, 'Local Subjects', '2022-11-10 17:00:00', '2022-11-10 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_files`
--

CREATE TABLE `temporary_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `folder` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `user_type`, `grade`, `phone`, `email_verified_at`, `profile_photo_path`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Student1', 'student1', 'student1@school.sch.id', '0', '1', '+620002', NULL, '202211142258sevieraa - 2956013873872358057.jpg', '$2y$10$bAR/5kPJo9dBKUjtfwnCweSOWBfze7xuMEAPH9U8eHIpzYoO3RaDK', NULL, '2022-10-23 00:26:23', '2022-11-14 15:58:40'),
(5, 'Admin', 'admin', 'admin@school.id', '1', '1', NULL, NULL, '2023011211558b167af653c2399dd93b952a48740620.jpg', '$2y$10$ZbXQiSXrk0I3i4/x7Y17JuZ0NSibtBkLNqrglYJgWAv9pZgx0eLom', NULL, '2022-10-23 21:31:52', '2023-01-12 04:56:38'),
(7, 'Teacher0', 'teacher0', 'teacher@school.sch.id', '2', '2', '+620000', NULL, NULL, '$2y$10$uuiliNVq3EulFsfIMolPSOI09GFs.ZhkCVr/mI3Ufc/Xzawk8QWC.', NULL, '2022-10-29 02:17:28', '2022-10-29 02:17:28'),
(8, 'Teacher1', 'teacher1', 'teacher1@school.sch.id', '2', '1', '+62857120000', NULL, '2023011122054cbe2490-7296-46b9-bb40-369fb2bf9c59.jpeg', '$2y$10$If8ENx0A/gbbhgvTnJWJ0OPrSTsLw5ADtnYCbpDrszvLMl/OMEBEu', NULL, '2022-10-29 02:17:44', '2023-01-11 15:05:25'),
(10, 'Student2', 'student2', 'student2@school.sch.id', '0', '2', '+620000', NULL, '202211151525Abroadening Scholarship Summit - IG Story Template.png', '$2y$10$TlwNcQLJpjpyA5jhRWDv9Ou.ZoTxnCj.riM7duuzy4.ph8O41kKsG', NULL, '2022-10-29 02:18:17', '2022-11-15 08:25:55'),
(12, 'Student3', 'student31', 'student3@school.sch.id', '0', '2', '+620000', NULL, NULL, '$2y$10$7WssYw3AZxJ9W/eu/bOO/.gSuWTDDGKtYuwr9pVeUGPzaeFbmfKSG', NULL, '2022-10-29 02:26:47', '2022-11-08 02:59:01'),
(13, 'Melissa', '84893932', 'teacher3@school.sch.id', '2', '2', '+628571234567899', NULL, NULL, '$2y$10$87EEA9f7YzNk4zdw50PXYebt/B6dvHiHfIaz0A004BX13obO1GG/O', NULL, '2022-10-29 02:27:08', '2022-11-03 06:09:58'),
(14, 'Student4', 'student4', 'student4@school.sch.id', '0', '1', '+620000', NULL, NULL, '$2y$10$er9yrdK6UqgKmRV7ejh1N..kwhg54acVHITlt4eUyo4bFdnNu4.MW', NULL, '2022-11-01 08:11:47', '2022-11-01 08:11:47'),
(15, 'Servira', '2301861124', 'student5@school.sch.id', '0', '1', '+6287724006119', NULL, '202211302040Screen Shot 2022-10-22 at 13.29.09.png', '$2y$10$gmG03.K02saD.H8H0ZGJpebjt2F.YNsjzamTzze1Rcl/LoLNd293i', NULL, '2022-11-08 12:32:36', '2022-11-30 13:40:05'),
(16, 'Hafiz', '2301861125', 'hafizelfiawedoputra@outlook.com', '2', '1', '+620000', NULL, NULL, '$2y$10$6SUXk9QytRPcu9/9Qn7tnuKVCo2Rsca21Owkd5ye2FuB.3gM1IBR6', NULL, '2022-11-08 12:40:35', '2022-11-08 12:40:35'),
(17, 'meliskong', 'teacher4', 'meliskong@school.sch.id', '2', '2', '+620000', NULL, NULL, '$2y$10$0NDZ6S14X.IAES5RrB3AH.XzbnEeM4qV7jwTta99qoX3m2tI6FbJW', NULL, '2022-11-08 12:41:01', '2022-11-08 12:41:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academy_years`
--
ALTER TABLE `academy_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id_id`);

--
-- Indexes for table `assignment_details`
--
ALTER TABLE `assignment_details`
  ADD PRIMARY KEY (`id_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id_atte`);

--
-- Indexes for table `attendance_details`
--
ALTER TABLE `attendance_details`
  ADD PRIMARY KEY (`id_atte_detail`);

--
-- Indexes for table `attendance_types`
--
ALTER TABLE `attendance_types`
  ADD PRIMARY KEY (`id_atte_type`);

--
-- Indexes for table `cancelations`
--
ALTER TABLE `cancelations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_details`
--
ALTER TABLE `class_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_infos`
--
ALTER TABLE `class_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id_forum`);

--
-- Indexes for table `forum_details`
--
ALTER TABLE `forum_details`
  ADD PRIMARY KEY (`id_forum_detail`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id_grade`);

--
-- Indexes for table `grade_details`
--
ALTER TABLE `grade_details`
  ADD PRIMARY KEY (`id_grade_detail`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `point_students`
--
ALTER TABLE `point_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_s_awards`
--
ALTER TABLE `p_s_awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_s_violations`
--
ALTER TABLE `p_s_violations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id_id`);

--
-- Indexes for table `quiz_details`
--
ALTER TABLE `quiz_details`
  ADD PRIMARY KEY (`id_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id_sch`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `subjects_details`
--
ALTER TABLE `subjects_details`
  ADD PRIMARY KEY (`id_sub_detail`);

--
-- Indexes for table `subject_types`
--
ALTER TABLE `subject_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary_files`
--
ALTER TABLE `temporary_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academy_years`
--
ALTER TABLE `academy_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `assignment_details`
--
ALTER TABLE `assignment_details`
  MODIFY `id_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id_atte` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `attendance_details`
--
ALTER TABLE `attendance_details`
  MODIFY `id_atte_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `attendance_types`
--
ALTER TABLE `attendance_types`
  MODIFY `id_atte_type` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cancelations`
--
ALTER TABLE `cancelations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class_details`
--
ALTER TABLE `class_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `class_infos`
--
ALTER TABLE `class_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id_forum` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forum_details`
--
ALTER TABLE `forum_details`
  MODIFY `id_forum_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id_grade` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grade_details`
--
ALTER TABLE `grade_details`
  MODIFY `id_grade_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_students`
--
ALTER TABLE `point_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `p_s_awards`
--
ALTER TABLE `p_s_awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `p_s_violations`
--
ALTER TABLE `p_s_violations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quiz_details`
--
ALTER TABLE `quiz_details`
  MODIFY `id_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id_sch` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_sub` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subjects_details`
--
ALTER TABLE `subjects_details`
  MODIFY `id_sub_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subject_types`
--
ALTER TABLE `subject_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `temporary_files`
--
ALTER TABLE `temporary_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
