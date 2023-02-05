-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2023 at 04:13 PM
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
(2, '2021 / 2022', '2022-11-09 07:44:17', '2022-11-09 07:44:17');

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
(2, 'Sosialisasi Aplikasi POINSS (Guru)', 'Dear, Dengan bangga sekolah ini akan memiliki aplikasi e learning sendiri, dan akan sosialisasi tangaal 15 Januari 2023 secara online zoom. Serta semua guru wajib hadir. Terima kasih.', '2', '2023-01-14 12:59:45', '2023-01-31 12:00:00', '2023-01-14 04:59:45', '2023-01-14 05:00:00'),
(3, 'Sosialisasi Aplikasi POINSS (Siswa)', 'Dear, Dengan bangga sekolah ini akan memiliki aplikasi e learning sendiri, dan akan sosialisasi tangaal 15 Januari 2023 di kelas masih-masih Serta semua guru wajib hadir. Terima kasih.', '0', '2023-01-14 13:00:45', '2023-01-31 12:00:00', '2023-01-14 05:00:45', '2023-01-14 05:00:45'),
(4, 'Informasi Libur Sekolah (Siswa)', 'Dear all, Seluruh guru dan siswa informasikan sekolah diliburkan saat cuti hari imlek yang ditentukan oleh pemerintah. Terima kasih', '0', '2023-01-14 13:04:06', '2023-02-21 12:00:00', '2023-01-14 05:04:06', '2023-01-14 05:04:06'),
(5, 'Informasi Libur Sekolah (Guru)', 'Dear all, Seluruh guru dan siswa informasikan sekolah diliburkan saat cuti hari imlek yang ditentukan oleh pemerintah. Terima kasih', '2', '2023-01-14 13:04:29', '2023-02-28 12:00:00', '2023-01-14 05:04:29', '2023-01-14 05:04:29');

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
(1, 'Latihan 1', '2023-01-04 12:00:00', '2023-01-13 23:59:00', '202301141335190-433-1-PB.pdf', '1', '2023-01-14 05:35:03', '2023-01-14 05:35:03'),
(2, 'Latihan Biologi 1', '2023-01-14 12:00:00', '2023-01-31 12:00:00', '202301141344439-Article Text-558-1-10-20190502.pdf', '2', '2023-01-14 05:44:20', '2023-01-14 05:44:20'),
(3, 'Pancasila', '2023-01-15 23:59:00', '2023-01-17 23:59:00', '202301160103171-290-1-PB (1).pdf', '6', '2023-01-15 17:03:31', '2023-01-15 17:03:31'),
(4, 'HAM', '2023-01-16 00:00:00', '2023-01-16 07:00:00', '202301160104171-290-1-PB (1).pdf', '6', '2023-01-15 17:04:33', '2023-01-15 17:04:33'),
(8, 'Menghitung', '2023-01-21 09:00:00', '2023-01-31 13:00:00', '202301210050Journal Analysis-and-design-of-web-based-database-Choirul-Huda.pdf', '7', '2023-01-20 16:50:36', '2023-01-24 18:15:00'),
(9, 'Perkalian', '2023-01-21 10:00:00', '2023-01-31 23:59:00', '202301210931grade (7).pdf', '7', '2023-01-21 01:31:33', '2023-01-23 05:48:00'),
(10, 'asdf', '2023-01-24 12:00:00', '2023-01-31 12:00:00', '202301252027Watson_Argume.pdf', '6', '2023-01-25 12:27:06', '2023-01-25 12:27:06'),
(11, 'PE 1 1', '2023-01-11 12:00:00', '2023-01-31 12:00:00', '20230129124313904-34086-1-PB.pdf', '9', '2023-01-29 05:43:45', '2023-01-29 05:43:45');

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
(1, '1', '18', '100', '2023011414102022_YLI-National-Program_Essay-Topic.pdf', '2023-01-14 06:10:43', '2023-01-14 08:50:47'),
(2, '1', '19', '85', '2023011416473B0FFAB4-BA30-4A18-995E-341485C1211A-Done_2301861125_2301862292_2301868232_ABCSC_Non_Kelas_2709.pdf', '2023-01-14 08:47:18', '2023-01-14 08:50:53'),
(3, '3', '28', '80', '202301160743171-290-1-PB (1).pdf', '2023-01-15 17:21:37', '2023-01-22 10:03:31'),
(5, '9', '20', '80', '2023012319402021-Asia Indonesia National-PLACE.pdf', '2023-01-23 11:40:40', '2023-01-23 11:49:41'),
(6, '8', '20', '90', '202301250215202301210050Journal Analysis-and-design-of-web-based-database-Choirul-Huda (2).pdf', '2023-01-24 18:15:21', '2023-01-24 18:15:42'),
(7, '10', '28', NULL, '202301252028Watson_Argume.pdf', '2023-01-25 12:28:46', '2023-01-25 12:28:46'),
(8, '11', '19', '100', '202301291252620-Article Text-895-1-10-20191113.pdf', '2023-01-29 05:52:48', '2023-01-29 06:20:08');

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
(1, '1', '2023-01-09', '1', 1, '2023-01-14 06:42:02', '2023-01-14 06:42:08'),
(2, '2', '2023-01-09', '2', 1, '2023-01-14 06:44:21', '2023-01-14 06:44:34'),
(3, '1', '2023-01-16', '1', 1, '2023-01-14 06:44:57', '2023-01-14 06:45:10'),
(4, '1', '2023-01-16', '1', 1, '2023-01-15 13:23:01', '2023-01-15 13:23:18'),
(5, '6', '2023-01-15', '4', 1, '2023-01-15 17:11:39', '2023-01-15 17:11:54'),
(6, '6', '2023-01-16', '4', 1, '2023-01-15 17:12:08', '2023-01-15 17:12:17'),
(7, '6', '2023-01-19', '4', 1, '2023-01-16 13:47:00', '2023-01-16 14:06:28'),
(9, '6', '2023-01-21', '4', 1, '2023-01-20 09:57:23', '2023-01-20 10:09:26'),
(10, '6', '2023-01-17', '4', 1, '2023-01-20 10:43:49', '2023-01-20 10:44:01'),
(12, '7', '2023-01-22', '6', 1, '2023-01-20 23:32:29', '2023-01-20 23:32:34'),
(14, '6', '2023-01-23', '4', 1, '2023-01-22 13:45:57', '2023-01-22 16:00:05'),
(15, '7', '2023-01-23', '6', 1, '2023-01-23 11:38:48', '2023-01-23 11:39:36'),
(17, '6', '2023-01-26', '4', 1, '2023-01-24 19:56:39', '2023-01-25 02:02:15'),
(18, '6', '2023-01-25', '4', 1, '2023-01-25 02:06:15', '2023-01-25 02:08:53'),
(19, '9', '2023-01-29', '5', 1, '2023-01-29 06:38:39', '2023-01-29 06:38:43');

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
(1, '1', '18', '2', NULL, '2023-01-14 06:42:08', '2023-01-14 06:42:08'),
(2, '1', '19', '2', NULL, '2023-01-14 06:42:08', '2023-01-14 06:42:08'),
(3, '2', '18', '4', 'Acara Osis', '2023-01-14 06:44:34', '2023-01-14 06:44:34'),
(4, '2', '19', '2', NULL, '2023-01-14 06:44:34', '2023-01-14 06:44:34'),
(5, '3', '18', '4', 'Acara OSIS', '2023-01-14 06:45:10', '2023-01-14 06:45:10'),
(6, '3', '19', '2', NULL, '2023-01-14 06:45:10', '2023-01-14 06:45:10'),
(7, '4', '18', '2', NULL, '2023-01-15 13:23:18', '2023-01-15 13:23:18'),
(8, '4', '19', '4', 'Acara Keluarga', '2023-01-15 13:23:18', '2023-01-15 13:23:18'),
(9, '5', '28', '2', NULL, '2023-01-15 17:11:54', '2023-01-15 17:11:54'),
(10, '5', '34', '4', NULL, '2023-01-15 17:11:54', '2023-01-15 17:11:54'),
(11, '6', '28', '4', NULL, '2023-01-15 17:12:17', '2023-01-15 17:12:17'),
(12, '6', '34', '2', NULL, '2023-01-15 17:12:17', '2023-01-15 17:12:17'),
(13, '7', '28', '2', NULL, '2023-01-16 14:06:28', '2023-01-16 14:06:28'),
(14, '7', '34', '2', NULL, '2023-01-16 14:06:28', '2023-01-16 14:06:28'),
(15, '9', '28', '2', NULL, '2023-01-20 10:09:26', '2023-01-20 10:09:26'),
(16, '9', '34', '2', NULL, '2023-01-20 10:09:26', '2023-01-20 10:09:26'),
(17, '10', '28', '4', 'OSIS', '2023-01-20 10:44:01', '2023-01-20 10:44:01'),
(18, '10', '34', '2', NULL, '2023-01-20 10:44:01', '2023-01-20 10:44:01'),
(19, '12', '20', '2', NULL, '2023-01-20 23:32:34', '2023-01-20 23:32:34'),
(20, '12', '29', '2', NULL, '2023-01-20 23:32:34', '2023-01-20 23:32:34'),
(21, '12', '22', '2', NULL, '2023-01-20 23:32:34', '2023-01-20 23:32:34'),
(22, '14', '28', '2', NULL, '2023-01-22 16:00:05', '2023-01-22 16:00:05'),
(23, '14', '34', '2', NULL, '2023-01-22 16:00:05', '2023-01-22 16:00:05'),
(24, '15', '20', '4', 'Ada acara keluarga', '2023-01-23 11:39:36', '2023-01-23 11:39:36'),
(25, '15', '29', '2', NULL, '2023-01-23 11:39:36', '2023-01-23 11:39:36'),
(26, '15', '22', '2', NULL, '2023-01-23 11:39:36', '2023-01-23 11:39:36'),
(27, '17', '28', '2', NULL, '2023-01-25 02:02:15', '2023-01-25 02:02:15'),
(28, '17', '34', '2', NULL, '2023-01-25 02:02:15', '2023-01-25 02:02:15'),
(29, '17', '28', '3', 'Kabur dari Kelas', '2023-01-25 02:08:36', '2023-01-25 02:08:36'),
(30, '17', '34', '2', NULL, '2023-01-25 02:08:36', '2023-01-25 02:08:36'),
(31, '18', '28', '2', NULL, '2023-01-25 02:08:53', '2023-01-25 02:08:53'),
(32, '18', '34', '2', NULL, '2023-01-25 02:08:53', '2023-01-25 02:08:53'),
(33, '19', '35', '2', NULL, '2023-01-29 06:38:43', '2023-01-29 06:38:43'),
(34, '19', '19', '2', NULL, '2023-01-29 06:38:43', '2023-01-29 06:38:43');

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
(3, '4', '57', 'sick', '2023-01-23 08:57:18', '2023-01-23 08:57:18');

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
(5, '28', '15', '2023-01-15 16:33:02', '2023-01-15 16:33:02'),
(6, '34', '15', '2023-01-15 16:38:24', '2023-01-15 16:38:24'),
(7, '20', '9', '2023-01-15 16:38:48', '2023-01-15 16:38:48'),
(8, '29', '9', '2023-01-15 16:38:55', '2023-01-15 16:38:55'),
(9, '27', '10', '2023-01-15 16:39:15', '2023-01-15 16:39:15'),
(10, '22', '10', '2023-01-15 16:39:22', '2023-01-15 16:39:22'),
(11, '35', '16', '2023-01-15 16:39:44', '2023-01-15 16:39:44'),
(12, '19', '16', '2023-01-15 16:39:53', '2023-01-15 16:39:53'),
(13, '18', '17', '2023-01-15 16:40:07', '2023-01-15 16:40:07'),
(14, '26', '17', '2023-01-15 16:40:13', '2023-01-15 16:40:13'),
(15, '21', '14', '2023-01-15 16:40:30', '2023-01-15 16:40:30'),
(16, '23', '14', '2023-01-15 16:40:36', '2023-01-15 16:40:36'),
(17, '30', '13', '2023-01-15 16:40:48', '2023-01-15 16:40:48'),
(18, '25', '13', '2023-01-15 16:40:55', '2023-01-15 16:40:55'),
(19, '32', '12', '2023-01-15 16:41:08', '2023-01-15 16:41:08'),
(20, '24', '12', '2023-01-15 16:41:19', '2023-01-15 16:41:19'),
(21, '33', '11', '2023-01-15 16:41:36', '2023-01-15 16:41:36'),
(22, '31', '11', '2023-01-15 16:41:43', '2023-01-15 16:41:43'),
(23, '22', '9', '2023-01-17 16:00:01', '2023-01-17 16:00:01');

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
(9, '10 Social 1', '2', '57', '2023-01-10 13:43:03', '2023-01-10 13:43:03'),
(10, '10 Social 2', '2', '58', '2023-01-10 13:43:14', '2023-01-10 13:43:14'),
(11, '11 Social 1', '2', '59', '2023-01-10 13:43:27', '2023-01-10 13:43:41'),
(12, '11 Social 2', '2', '60', '2023-01-10 13:43:54', '2023-01-10 13:43:54'),
(13, '12 Social 1', '2', '61', '2023-01-10 13:44:05', '2023-01-10 13:44:05'),
(14, '12 Social 2', '2', '62', '2023-01-10 13:44:16', '2023-01-10 13:44:23'),
(15, '10 Science', '1', '63', '2023-01-10 13:44:44', '2023-01-10 13:44:44'),
(16, '11 Science', '1', '64', '2023-01-10 13:44:54', '2023-01-10 13:44:54'),
(17, '12 Science', '1', '65', '2023-01-10 13:45:02', '2023-01-10 13:45:02');

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
(1, '1', '63', 'Bahas Array', 'Menurut kalian, apa itu array?', '0', '2023-01-14 09:17:07', '2023-01-14 01:17:07', '2023-01-14 01:17:07'),
(2, '1', '19', 'Bertanya Array', 'Mau bertanya itu contoh array seperti apa?', '0', '2023-01-14 09:22:19', '2023-01-14 01:22:19', '2023-01-14 01:22:19'),
(3, '2', '18', 'Biologi?', 'Mau bertanya biologi belajar apa saja?', '0', '2023-01-15 21:19:44', '2023-01-15 13:19:44', '2023-01-15 13:19:44'),
(4, '6', '57', 'Pancasila', 'Diskusi mengenai pancasila', '0', '2023-01-16 01:12:45', '2023-01-15 17:12:45', '2023-01-15 17:12:45'),
(12, '7', '58', 'BELAJAR APA?', 'mulai berhitung', '0', '2023-01-21 07:44:11', '2023-01-20 23:44:11', '2023-01-20 23:44:11'),
(13, '7', '20', 'berhitung', 'mulai dari 1', '0', '2023-01-21 11:33:10', '2023-01-21 03:33:10', '2023-01-21 03:33:10'),
(14, '9', '60', 'Latihan 1', 'Latihan 1', '0', '2023-01-29 14:16:06', '2023-01-29 07:16:06', '2023-01-29 07:16:06');

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
(1, '1', '18', 'Array adalah larik yang berisi kumpulan data dengan tipe serupa. Teknologi ini dapat digunakan untuk mempermudah penghitungan data karena mengelompokkan data-data berdasarkan kesamaannya.', '0', '2023-01-14 09:18:25', '2023-01-14 01:18:25', '2023-01-14 01:18:25'),
(2, '1', '19', 'Array adalah variabel yang mempunyai indeks sehingga dapat menyimpan sejumlah data yang bertipe sama. Dimensi array adalah jumlah indeks pada variabel array. Array multi dimensi (lebih dari satu indeks, maksimal 7 indeks). Dalam perhitungan, array sering digunakan untuk operasi matriks.', '0', '2023-01-14 09:19:42', '2023-01-14 01:19:42', '2023-01-14 01:19:42'),
(3, '2', '63', 'Contoh Array seperti ini dalam link: https://kumparan.com/how-to-tekno/tipe-data-array-pengertian-format-dan-jenis-jenisnya-1xdvxdaSyFq/full\r\n\r\nSemoga membantu', '1', '2023-01-14 11:45:10', '2023-01-14 01:25:23', '2023-01-14 03:45:10'),
(4, '1', '63', 'Coba jelasin lebih detail lagi, nanti ada bonus nilai', '0', '2023-01-14 12:01:50', '2023-01-14 04:01:50', '2023-01-14 04:01:50'),
(6, '4', '28', 'halo', '1', '2023-01-16 07:21:57', '2023-01-15 23:21:42', '2023-01-15 23:21:57'),
(14, '7', '57', 'Hak asasi manusia di Indonesia tertulis dalam UU No. 39 Tahun 1999 yang berbunyi HAM adalah seperangkat hak yang melekat pada hakikat dan keberadaan manusia sebagai makhluk Tuhan Yang Maha Esa dan merupakan anugerah-Nya yang wajib dihormati, dijunjung tinggi dan dilindungi oleh negara, hukum, pemerintah, dan setiap orang demi kehormatan serta perlindungan harkat dan martabat manusia.', '0', '2023-01-20 16:33:27', '2023-01-20 08:33:27', '2023-01-20 08:33:27'),
(15, '4', '57', 'yoo', '0', '2023-01-20 18:59:24', '2023-01-20 10:59:24', '2023-01-20 10:59:24');

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
(1, '1', '2', '1', '75', 1, '2023-01-14 06:39:46', '2023-01-14 06:40:11'),
(2, '2', '2', '1', '75', 1, '2023-01-14 06:42:38', '2023-01-14 06:43:59'),
(3, '5', '2', '1', '70', 1, '2023-01-15 13:26:50', '2023-01-15 13:27:49'),
(4, '6', '2', '1', '75', 1, '2023-01-15 17:01:14', '2023-01-15 17:02:05'),
(5, '12', '2', '1', '70', 1, '2023-01-19 14:29:53', '2023-01-19 14:30:35'),
(6, '7', '2', '1', '75', 1, '2023-01-19 15:59:10', '2023-01-20 15:27:38'),
(7, '7', '2', '2', '80', 0, '2023-01-24 06:31:02', '2023-01-24 06:31:02'),
(8, '6', '2', '1', '80', 1, '2023-01-24 06:32:53', '2023-01-24 11:59:21'),
(9, '9', '2', '1', '70', 1, '2023-01-29 05:35:00', '2023-01-29 05:43:05');

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
(1, '1', '18', '80', '90', '80', '70', '86', '81.2', '2023-01-14 06:40:11', '2023-01-14 06:40:26'),
(2, '1', '19', '80', '80', '80', '70', '88', '79.6', '2023-01-14 06:40:11', '2023-01-14 06:40:26'),
(3, '2', '18', '80', '90', '90', '70', '79', '81.8', '2023-01-14 06:43:59', '2023-01-14 06:43:59'),
(4, '2', '19', '90', '80', '80', '75', '78', '80.6', '2023-01-14 06:43:59', '2023-01-14 06:43:59'),
(5, '3', '20', '80', '70', '60', '100', '100', '82', '2023-01-15 13:27:49', '2023-01-15 13:27:49'),
(6, '3', '21', '90', '80', '80', '90', '73', '82.6', '2023-01-15 13:27:49', '2023-01-15 13:27:49'),
(7, '4', '28', '85', '95', '85', '70', '85', '84', '2023-01-15 17:02:05', '2023-01-24 12:54:57'),
(8, '4', '34', '100', '90', '100', '80', '75', '89', '2023-01-15 17:02:05', '2023-01-19 15:09:06'),
(9, '5', '18', '78', '82', '78', '74', '78', '78', '2023-01-19 14:30:35', '2023-01-19 14:31:19'),
(10, '5', '26', '79', '90', '79', '77', '78', '80.6', '2023-01-19 14:30:35', '2023-01-19 14:31:01'),
(11, '6', '20', '78', '80', '95', '70', '80', '80.6', '2023-01-20 15:27:38', '2023-01-20 15:27:38'),
(12, '6', '29', '0', '0', '0', '0', '0', '0', '2023-01-20 15:27:38', '2023-01-20 15:27:38'),
(13, '6', '22', '0', '0', '0', '0', '0', '0', '2023-01-20 15:27:38', '2023-01-20 15:27:38'),
(14, '8', '28', '100', '95', '90', '85', '80', '90', '2023-01-24 11:59:21', '2023-01-24 11:59:21'),
(15, '8', '34', '55', '60', '65', '70', '75', '65', '2023-01-24 11:59:21', '2023-01-24 11:59:21'),
(16, '9', '35', '80', '90', '70', '80', '70', '78', '2023-01-29 05:43:05', '2023-01-29 05:43:05'),
(17, '9', '19', '80', '70', '80', '90', '85', '81', '2023-01-29 05:43:05', '2023-01-29 05:43:05');

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
(1, '18', 'Telat Masuk', NULL, NULL),
(2, '34', 'Mencari Punya Teman', NULL, NULL),
(3, '26', 'Juara 2 Tingat Provinsi (Lomba Design)', NULL, NULL),
(4, '47', 'Juara 1 Tingat Nasional (OSN Matematika)', NULL, NULL),
(5, '18', 'Juara 2 Tingat Nasional (OSN Matematika)', NULL, NULL),
(6, '28', 'Pelanggaran', NULL, NULL),
(7, '28', 'Pelanggaran', NULL, NULL),
(8, '28', 'Lomba', NULL, NULL),
(9, '31', 'telat', NULL, NULL),
(10, '56', 'mencuri', NULL, NULL),
(11, '53', 'mencuri', NULL, NULL),
(12, '56', 'juara 1 sebintaro mendaki gunung', NULL, NULL),
(13, '50', 'Mencari Punya Teman', NULL, NULL);

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
(1, '3', 'Juara 2 Tingat Provinsi (Lomba Design)', '2023-01-19', '10', '63', NULL, NULL),
(2, '4', 'Juara 1 Tingat Nasional (OSN Matematika)', '2022-12-23', '20', '63', NULL, NULL),
(3, '5', 'Juara 1 Tingat Nasional (OSN Matematika)', '2022-12-13', '20', '63', NULL, NULL);

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
(1, '1', 'Telat Masuk', '2023-01-09', '2', '63', NULL, NULL),
(2, '2', 'Mencari Punya Teman', '2023-01-11', '6', '63', NULL, NULL),
(4, '7', 'Telat', '2023-01-16', '2', '57', NULL, NULL);

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
(1, '2', 'Quiz 1', '2023-01-14 12:00:00', '2023-01-31 12:00:00', 'https://forms.office.com/Pages/ResponsePage.aspx?id=Y7mFNLqCb0qBD7XMIm_4mK7cYEQAdjZGtxGvzVu_vuRUNE5IWktOSUFCQkM1OU05V1VGVkxXN1haOS4u', '2023-01-14 05:44:41', '2023-01-14 05:44:41'),
(2, '1', 'Math Quiz 1', '2023-01-15 12:00:00', '2023-01-31 12:00:00', 'https://forms.office.com/Pages/ResponsePage.aspx?id=Y7mFNLqCb0qBD7XMIm_4mK7cYEQAdjZGtxGvzVu_vuRUNE5IWktOSUFCQkM1OU05V1VGVkxXN1haOS4u', '2023-01-14 08:52:07', '2023-01-14 08:52:07'),
(3, '6', 'Pancasila', '2023-01-16 00:00:00', '2023-01-16 23:59:00', 'https://forms.gle/3N9TJBhPKvf64uLe9', '2023-01-15 17:10:15', '2023-01-15 17:10:15'),
(4, '6', 'HAM', '2023-01-16 00:00:00', '2023-01-16 23:59:00', 'https://forms.gle/3N9TJBhPKvf64uLe9', '2023-01-15 17:11:17', '2023-01-15 17:11:17'),
(5, '7', 'Berhitung', '2023-01-21 08:00:00', '2023-01-31 12:00:00', 'https://forms.office.com/r/Jjb3i1uyN7', '2023-01-20 17:07:10', '2023-01-23 06:19:11'),
(6, '9', 'Latihan', '2023-01-11 12:00:00', '2023-01-19 12:00:00', 'https://forms.office.com/Pages/ResponsePage.aspx?id=Y7mFNLqCb0qBD7XMIm_4mK7cYEQAdjZGtxGvzVu_vuRUNE5IWktOSUFCQkM1OU05V1VGVkxXN1haOS4u', '2023-01-29 06:22:32', '2023-01-29 06:22:32');

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
(1, '2', '18', '100', '2023-01-14 08:52:15', '2023-01-14 10:50:55'),
(2, '2', '19', '80', '2023-01-14 08:52:21', '2023-01-14 08:52:21'),
(3, '3', '28', '82', '2023-01-15 22:09:08', '2023-01-20 08:26:03'),
(6, '5', '20', '80', '2023-01-23 11:48:59', '2023-01-23 11:48:59'),
(7, '5', '29', '82', '2023-01-23 11:49:06', '2023-01-23 11:49:17'),
(8, '5', '22', '85', '2023-01-23 11:49:12', '2023-01-23 11:49:12'),
(9, '3', '34', '70', '2023-01-24 19:11:52', '2023-01-24 19:11:52'),
(12, '6', '35', '33', '2023-01-29 06:36:00', '2023-01-29 06:36:00');

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
(4, '2', '1', '07:30', '08:00', '6', '1', '2023-01-15 16:57:36', '2023-01-15 16:57:36'),
(5, '2', '1', '07:30', '08:00', '9', '1', '2023-01-15 16:58:02', '2023-01-15 16:58:02'),
(6, '2', '1', '07:30', '08:00', '10', '2', '2023-01-15 16:58:23', '2023-01-26 16:10:24'),
(7, '2', '2', '19:52', '19:52', '11', '1', '2023-01-20 12:17:56', '2023-01-20 12:17:56');

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
  `detail_material` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_academic_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_book` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id_sub`, `name_subject`, `id_class`, `id_teacher`, `id_subject_type`, `detail_material`, `id_academic_year`, `text_book`, `created_at`, `updated_at`) VALUES
(6, 'PPKN', '15', '57', '1', 'Pendidikan Pancasila dan Kewarganegaraan', '2', 'Erlangga', '2023-01-15 16:43:25', '2023-01-15 16:43:25'),
(7, 'Math', '9', '58', '1', 'Matematika', '2', 'Erlangga', '2023-01-15 16:44:21', '2023-01-15 16:44:21'),
(8, 'English', '10', '59', '1', 'Bahasa Inggris', '2', 'Erlangga', '2023-01-15 16:44:55', '2023-01-15 16:44:55'),
(9, 'P.E', '16', '60', '1', 'Physical Education', '2', 'Erlangga', '2023-01-15 16:45:54', '2023-01-15 16:45:54'),
(10, 'Sosiology', '11', '61', '2', 'Sosiologi', '2', 'Erlangga', '2023-01-15 16:48:07', '2023-01-15 16:48:07'),
(11, 'Economy', '12', '62', '2', 'Economy', '2', 'Erlangga', '2023-01-15 16:48:37', '2023-01-15 16:48:37'),
(12, 'Biology', '17', '63', '2', 'Biology', '2', 'Erlangga', '2023-01-15 16:49:12', '2023-01-15 16:49:12'),
(13, 'History', '13', '64', '1', 'History', '2', 'Erlangga', '2023-01-15 16:49:46', '2023-01-15 16:49:46'),
(14, 'Bahasa Indonesia', '14', '65', '1', 'Bahasa Indonesia', '2', 'Erlangga', '2023-01-15 16:50:25', '2023-01-15 16:50:25');

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
(1, '1', '2023-01-16', '1', 'Materi Array', 'Materi Array tahap 1', '10 Science', '202301141934190-433-1-PB.pdf', '2023-01-13 09:11:20', '2023-01-14 11:34:45'),
(2, '1', '2023-01-17', '1', 'Array 3', 'Array 3 Array 3 Array 3 Array 3', '10 Science', '202301152121cienciadosdados.pdf', '2023-01-15 13:21:52', '2023-01-15 13:21:52'),
(3, '6', '2023-01-15', '4', 'Pancasila', 'Pancasila', '10 Science', '202301160100171-290-1-PB (1).pdf', '2023-01-15 17:00:44', '2023-01-15 17:00:44'),
(4, '7', '2023-01-23', '6', 'Belajar menulis', 'lalala', '10 Social 1', '202301192344Journal Analysis-and-design-of-web-based-database-Choirul-Huda.pdf', '2023-01-19 15:44:42', '2023-01-19 15:44:42'),
(5, '9', '2023-01-30', '5', 'P E 1', 'P E 1 P E 1 P E 1', '11 Science', '202301291238620-Article Text-895-1-10-20191113.pdf', '2023-01-29 05:38:09', '2023-01-29 05:38:09');

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
(5, 'Admin 1', 'admin', 'admin@school.id', '1', '1', NULL, NULL, '202301131712no_image.jpg', '$2y$10$ZbXQiSXrk0I3i4/x7Y17JuZ0NSibtBkLNqrglYJgWAv9pZgx0eLom', NULL, '2022-10-23 21:31:52', '2023-01-13 09:12:11'),
(6, 'Admin 2', 'admin2', 'admin2@school.id', '1', '1', NULL, NULL, '202301131712no_image.jpg', '$2y$10$ZbXQiSXrk0I3i4/x7Y17JuZ0NSibtBkLNqrglYJgWAv9pZgx0eLom', NULL, '2022-10-23 21:31:52', '2023-01-13 09:12:11'),
(7, 'Admin 3', 'admin3', 'admin3@school.id', '1', '1', NULL, NULL, '202301131712no_image.jpg', '$2y$10$ZbXQiSXrk0I3i4/x7Y17JuZ0NSibtBkLNqrglYJgWAv9pZgx0eLom', NULL, '2022-10-23 21:31:52', '2023-01-13 09:12:11'),
(18, 'Helsa', 'Helsa', 'student1@student.com', '0', '2', '+62000011', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '2023-01-10 12:14:02', '2023-01-19 15:10:54'),
(19, 'Gerald', '0000002', 'student2@student.com', '0', '1', '+62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '2023-01-10 12:14:02', '2023-01-15 16:24:26'),
(20, 'Carissa', '0000003', 'student3@school.id', '0', '2', '+62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:24:54'),
(21, 'Kayla', '0000004', 'student4@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:25:13'),
(22, 'Evelyn', '0000005', 'student5@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:25:33'),
(23, 'Kezia', '0000006', 'student6@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:25:50'),
(24, 'Vabreanno', '0000007', 'student7@school.id', '0', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:26:07'),
(25, 'Otniel', '0000008', 'student8@school.id', '0', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:26:25'),
(26, 'Jollin', '0000009', 'student9@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:26:58'),
(27, 'Erlani', '0000010', 'student10@school.id', '0', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:27:18'),
(28, 'Andreasfss', '0000011', 'student@gmail.com', '0', '1', '62000000', NULL, NULL, '$2y$10$QdR3lRdzQ9kmL4F0hemRJefcMOcidi7T99Ba4T5lgCOJHsSCKAwg6', NULL, '0000-00-00 00:00:00', '2023-01-19 14:53:57'),
(29, 'Edbert', '0000012', 'student12@school.id', '0', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:27:48'),
(30, 'Luis', '0000013', 'student13@school.id', '0', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:28:04'),
(31, 'Xaverius', '0000014', 'student14@school.id', '0', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:28:21'),
(32, 'Steve', '0000015', 'student15@school.id', '0', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:35:12'),
(33, 'Violla', '0000016', 'student16@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:35:27'),
(34, 'Brian', '0000017', 'student17@school.id', '0', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:37:38'),
(35, 'Febriyana', '0000018', 'student18@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-15 16:37:57'),
(36, 'Student19', '0000019', 'student19@school.id', '0', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Student20', '0000020', 'student20@school.id', '0', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Student21', '0000021', 'student21@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Student22', '0000022', 'student22@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Student23', '0000023', 'student23@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Student24', '0000024', 'student24@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Student25', '0000025', 'student25@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Student26', '0000026', 'student26@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Student27', '0000027', 'student27@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'Student28', '0000028', 'student28@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Student29', '0000029', 'student29@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'Student30', '0000030', 'student30@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'Student31', '0000031', 'student31@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'Student32', '0000032', 'student32@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Student33', '0000033', 'student33@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Student34', '0000034', 'student34@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Student35', '0000035', 'student35@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Student36', '0000036', 'student36@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Student37', '0000037', 'student37@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Student38', '0000038', 'student38@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'Student39', '0000039', 'student39@school.id', '0', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'Teacher1', 'AA00001', 'teacher1@school.id', '2', '1', '62000000', NULL, NULL, '$2y$10$WhzylQTcy6DJa.QF1Kot9.3GtMgCRXb317MskkHD3z4KCU.Fkx.Yq', NULL, '0000-00-00 00:00:00', '2023-01-28 05:11:45'),
(58, 'Teacher2', 'AA00002', 'teacher2@school.id', '2', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'Teacher3', 'AA00003', 'teacher3@school.id', '2', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'Teacher4', 'AA00004', 'teacher4@school.id', '2', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Teacher5', 'AA00005', 'teacher5@school.id', '2', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'Teacher6', 'AA00006', 'teacher6@school.id', '2', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'Teacher7', 'Teacher7', 'teacher7@school.id', '2', '1', '62000011', NULL, '202301131708WhatsApp Image 2023-01-01 at 23.07.38.jpeg', '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-19 15:07:53'),
(64, 'Teacher8', 'AA00008', 'teacher8@school.id', '2', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'Teacher9', 'AA00009', 'teacher9@school.id', '2', '1', '62357687', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '2023-01-24 17:00:32'),
(67, 'Teacher11', 'AA00011', 'teacher11@school.id', '2', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'Teacher12', 'AA00012', 'teacher12@school.id', '2', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'Teacher13', 'AA00013', 'teacher13@school.id', '2', '1', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'Teacher14', 'AA00014', 'teacher14@school.id', '2', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'Teacher16', 'AA00016', 'teacher16@school.id', '2', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'Teacher18', 'AA00018', 'teacher18@school.id', '2', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'Teacher19', 'AA00019', 'teacher19@school.id', '2', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'Teacher20', 'AA00020', 'teacher20@school.id', '2', '2', '62000000', NULL, NULL, '$2y$10$29WjqMqqnQYTSL44pMThpefYUp4wUdUCg2zmqTVV81dEjtM27tKOW', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'Student40', '0000040', 'student40@school.id', '0', '2', '+62000000', NULL, NULL, '$2y$10$gh4ebFvez6CGDabarSkvH.Xu.LnUYl/kycuB0ezJ4kJBu9lcbBRKO', NULL, '2023-01-10 13:53:38', '2023-01-10 13:53:38');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `assignment_details`
--
ALTER TABLE `assignment_details`
  MODIFY `id_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id_atte` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `attendance_details`
--
ALTER TABLE `attendance_details`
  MODIFY `id_atte_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `attendance_types`
--
ALTER TABLE `attendance_types`
  MODIFY `id_atte_type` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cancelations`
--
ALTER TABLE `cancelations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_details`
--
ALTER TABLE `class_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `class_infos`
--
ALTER TABLE `class_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id_forum` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `forum_details`
--
ALTER TABLE `forum_details`
  MODIFY `id_forum_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id_grade` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grade_details`
--
ALTER TABLE `grade_details`
  MODIFY `id_grade_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `p_s_awards`
--
ALTER TABLE `p_s_awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p_s_violations`
--
ALTER TABLE `p_s_violations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz_details`
--
ALTER TABLE `quiz_details`
  MODIFY `id_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id_sch` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_sub` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subjects_details`
--
ALTER TABLE `subjects_details`
  MODIFY `id_sub_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
