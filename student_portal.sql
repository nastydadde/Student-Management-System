-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2025 at 02:38 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `department` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `semester` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `user_id`, `department`, `semester`, `division`, `created_at`, `updated_at`) VALUES
(178, 24, 'Electrical', '1', 'C', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(179, 24, 'Electrical', '1', 'D', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(180, 24, 'Electrical', '2', 'C', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(181, 24, 'Electrical', '2', 'D', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(182, 24, 'Electrical', '3', 'C', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(183, 24, 'Electrical', '3', 'D', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(184, 24, 'Electrical', '4', 'C', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(185, 24, 'Electrical', '4', 'D', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(186, 24, 'Electrical', '5', 'C', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(187, 24, 'Electrical', '5', 'D', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(188, 24, 'Electrical', '6', 'C', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(189, 24, 'Electrical', '6', 'D', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(190, 24, 'Mechanical', '1', 'C', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(191, 24, 'Mechanical', '1', 'D', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(192, 24, 'Mechanical', '2', 'C', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(193, 24, 'Mechanical', '2', 'D', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(194, 24, 'Mechanical', '3', 'C', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(195, 24, 'Mechanical', '3', 'D', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(196, 24, 'Mechanical', '4', 'C', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(197, 24, 'Mechanical', '4', 'D', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(198, 24, 'Mechanical', '5', 'C', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(199, 24, 'Mechanical', '5', 'D', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(200, 24, 'Mechanical', '6', 'C', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(201, 24, 'Mechanical', '6', 'D', '2025-07-29 08:25:32', '2025-07-29 08:25:32'),
(202, 26, 'Computer', '1', 'A', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(203, 26, 'Computer', '1', 'B', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(204, 26, 'Computer', '2', 'A', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(205, 26, 'Computer', '2', 'B', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(206, 26, 'Computer', '3', 'A', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(207, 26, 'Computer', '3', 'B', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(208, 26, 'Computer', '4', 'A', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(209, 26, 'Computer', '4', 'B', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(210, 26, 'Computer', '5', 'A', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(211, 26, 'Computer', '5', 'B', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(212, 26, 'Computer', '6', 'A', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(213, 26, 'Computer', '6', 'B', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(214, 26, 'Computer', '7', 'A', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(215, 26, 'Computer', '7', 'B', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(216, 26, 'Computer', '8', 'A', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(217, 26, 'Computer', '8', 'B', '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(218, 24, 'Electrical', '7', 'C', '2025-07-30 14:29:38', '2025-07-30 14:29:38'),
(219, 24, 'Electrical', '7', 'D', '2025-07-30 14:29:38', '2025-07-30 14:29:38'),
(220, 24, 'Electrical', '8', 'C', '2025-07-30 14:29:38', '2025-07-30 14:29:38'),
(221, 24, 'Electrical', '8', 'D', '2025-07-30 14:29:38', '2025-07-30 14:29:38'),
(225, 24, 'Mechanical', '7', 'C', '2025-07-30 14:29:38', '2025-07-30 14:29:38'),
(226, 24, 'Mechanical', '7', 'D', '2025-07-30 14:29:38', '2025-07-30 14:29:38'),
(227, 24, 'Mechanical', '8', 'C', '2025-07-30 14:29:38', '2025-07-30 14:29:38'),
(228, 24, 'Mechanical', '8', 'D', '2025-07-30 14:29:38', '2025-07-30 14:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3djn0MmhclrU99Ccxyqxlm6SvaOjvw4XSuGHkiMV', 25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVHh3b01yQVpTSW5COFgwb0xIM2phQnlKR2hSQmNYMGtjdEk4SUlSSyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vc3R1ZGVudC1wb3J0YWwtdjQudGVzdC9hZG1pbi9yZXN1bHRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjU7fQ==', 1753886011),
('FFCAUJ02l9Qz9SaULZUBn6CEcN0wwZg7uy86Cgqa', 25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUWZmaEtnZTFaSnQ5QWNibnI2NWJkV3RwbjJqOUdPMFR0RmV2T2VMUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9zdHVkZW50LXBvcnRhbC12My50ZXN0L2FkbWluL3N0dWRlbnRzLzEwL2VkaXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyNTt9', 1753885106),
('mRh4ICYJpFyzooDUzwq2vd6EqssAM3OzWErSA134', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRnZ4T3c2dnhGYjJSUmVPS3FzRGxhQm9DWVk5Y2E4R0xIQW1JTEtjdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9zdHVkZW50LXBvcnRhbC12NC50ZXN0L2xvZ2luIjt9fQ==', 1753882975),
('pIfitSETgXAyTGE85w9YYR9wJGZBdoSgqXw8Y5bS', 25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSndDZEJ6Yk9MaE9mQzRRYzU3eGx6WHVKb0RsZnQ5QUM2ZTJ6UWNqbyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ0OiJodHRwOi8vc3R1ZGVudC1wb3J0YWwtdjMudGVzdC9hZG1pbi9zdHVkZW50cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI1O30=', 1753881354);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `sr_no` int DEFAULT NULL,
  `enrollment_no` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `current_semester` int DEFAULT NULL,
  `division` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci,
  `cast` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aadhar_no` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `uid_no` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `abc_id` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `school` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hsc_school_uni` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hsc_city` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `sr_no`, `enrollment_no`, `current_semester`, `division`, `name`, `dob`, `gender`, `address`, `cast`, `category`, `aadhar_no`, `uid_no`, `email`, `abc_id`, `department`, `school`, `hsc_school_uni`, `hsc_city`, `created_at`) VALUES
(1, 1, 'ENR2025001', 3, 'A', 'Rahul Sharma', '2002-05-15', 'Male', '102, Green Park, Ahmedabad', 'SC', 'OBC', '789456123001', 'UID2025001', 'rahul.sharma@university.edu', 'ABC2025001', 'Computer Engineering', 'School of Technology', 'Ahmedabad Board', 'Ahmedabad', '2025-07-30 13:38:28'),
(2, 2, 'ENR2025002', 4, 'B', 'Priya Patel', '2001-11-22', 'Female', '45, Shivaji Nagar, Vadodara', 'ST', 'SC', '789456123002', 'UID2025002', 'priya.patel@university.edu', 'ABC2025002', 'Electrical Engineering', 'School of Technology', 'Vadodara Board', 'Vadodara', '2025-07-30 13:38:29'),
(3, 3, 'ENR2025003', 2, 'C', 'Amit Kumar', '2003-03-08', 'Male', '7, Gandhinagar Society, Surat', 'OBC', 'OBC', '789456123003', 'UID2025003', 'amit.kumar@university.edu', 'ABC2025003', 'Mechanical Engineering', 'School of Engineering', 'Surat Board', 'Surat', '2025-07-30 13:38:29'),
(4, 4, 'ENR001', 1, NULL, 'Student 1', '2003-06-01', 'Male', 'City 1', 'OBC', 'OBC', '123456789001', 'UID001', 'student1@example.com', 'ABC001', 'Computer', 'School of DS', 'Guj Uni', 'City 1', '2025-07-30 13:38:49'),
(5, 5, 'ENR002', 2, NULL, 'Student 2', '2003-06-02', 'Female', 'City 2', 'OBC', 'Open', '123456789002', 'UID002', 'student2@example.com', 'ABC002', 'Electrical', 'School of DS', 'Guj Uni', 'City 2', '2025-07-30 13:38:49'),
(6, 6, 'ENR003', 3, NULL, 'Student 3', '2003-06-03', 'Male', 'City 3', 'General', 'OBC', '123456789003', 'UID003', 'student3@example.com', 'ABC003', 'Mechanical', 'School of DS', 'Guj Uni', 'City 3', '2025-07-30 13:38:49'),
(7, 7, 'ENR004', 4, NULL, 'Student 4', '2003-06-04', 'Female', 'City 4', 'OBC', 'Open', '123456789004', 'UID004', 'student4@example.com', 'ABC004', 'Computer', 'School of DS', 'Guj Uni', 'City 4', '2025-07-30 13:38:49'),
(8, 8, 'ENR005', 5, NULL, 'Student 5', '2003-06-05', 'Male', 'City 5', 'OBC', 'OBC', '123456789005', 'UID005', 'student5@example.com', 'ABC005', 'Electrical', 'School of DS', 'Guj Uni', 'City 5', '2025-07-30 13:38:49'),
(9, 9, 'ENR006', 1, NULL, 'Student 6', '2003-06-06', 'Female', 'City 6', 'General', 'Open', '123456789006', 'UID006', 'student6@example.com', 'ABC006', 'Mechanical', 'School of DS', 'Guj Uni', 'City 6', '2025-07-30 13:38:49'),
(10, 10, 'ENR007', 2, NULL, 'Student 7', '2003-06-07', 'Male', 'City 7', 'OBC', 'OBC', '123456789007', 'UID007', 'student7@example.com', 'ABC007', 'Computer', 'School of DCE', 'Guj Uni', 'City 7', '2025-07-30 13:38:49'),
(11, 11, 'ENR008', 3, NULL, 'Student 8', '2003-06-08', 'Female', 'City 8', 'OBC', 'Open', '123456789008', 'UID008', 'student8@example.com', 'ABC008', 'Electrical', 'School of DCE', 'Guj Uni', 'City 8', '2025-07-30 13:38:49'),
(12, 12, 'ENR009', 4, NULL, 'Student 9', '2003-06-09', 'Male', 'City 9', 'General', 'OBC', '123456789009', 'UID009', 'student9@example.com', 'ABC009', 'Mechanical', 'School of DCE', 'Guj Uni', 'City 9', '2025-07-30 13:38:49'),
(13, 13, 'ENR010', 5, NULL, 'Student 10', '2003-06-10', 'Female', 'City 10', 'OBC', 'Open', '123456789010', 'UID010', 'student10@example.com', 'ABC010', 'Computer', 'School of DCE', 'Guj Uni', 'City 10', '2025-07-30 13:38:49'),
(14, 14, 'ENR011', 1, NULL, 'Student 11', '2003-06-11', 'Male', 'City 11', 'OBC', 'OBC', '123456789011', 'UID011', 'student11@example.com', 'ABC011', 'Electrical', 'School of DCE', 'Guj Uni', 'City 11', '2025-07-30 13:38:49'),
(15, 15, 'ENR012', 2, NULL, 'Student 12', '2003-06-12', 'Female', 'City 12', 'General', 'Open', '123456789012', 'UID012', 'student12@example.com', 'ABC012', 'Mechanical', 'School of DCE', 'Guj Uni', 'City 12', '2025-07-30 13:38:49'),
(16, 16, 'ENR013', 3, NULL, 'Student 13', '2003-06-13', 'Male', 'City 13', 'OBC', 'OBC', '123456789013', 'UID013', 'student13@example.com', 'ABC013', 'Computer', 'School of DCE', 'Guj Uni', 'City 13', '2025-07-30 13:38:49'),
(17, 17, 'ENR014', 4, NULL, 'Student 14', '2003-06-14', 'Female', 'City 14', 'OBC', 'Open', '123456789014', 'UID014', 'student14@example.com', 'ABC014', 'Electrical', 'School of DCE', 'Guj Uni', 'City 14', '2025-07-30 13:38:49'),
(18, 18, 'ENR015', 5, NULL, 'Student 15', '2003-06-15', 'Male', 'City 15', 'General', 'OBC', '123456789015', 'UID015', 'student15@example.com', 'ABC015', 'Mechanical', 'School of DCE', 'Guj Uni', 'City 15', '2025-07-30 13:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `attendance_percent` decimal(5,2) DEFAULT NULL
) ;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `student_id`, `semester`, `attendance_percent`) VALUES
(6495, 1, 1, 75.00),
(6496, 1, 2, 82.00),
(6497, 1, 3, NULL),
(6498, 1, 4, NULL),
(6499, 1, 5, NULL),
(6500, 1, 6, NULL),
(6501, 2, 1, 82.00),
(6502, 2, 2, 85.00),
(6503, 2, 3, 78.00),
(6504, 2, 4, NULL),
(6505, 2, 5, NULL),
(6506, 2, 6, NULL),
(6507, 3, 1, 65.00),
(6508, 3, 2, NULL),
(6509, 3, 3, NULL),
(6510, 3, 4, NULL),
(6511, 3, 5, NULL),
(6512, 3, 6, NULL),
(6513, 4, 1, NULL),
(6514, 4, 2, NULL),
(6515, 4, 3, NULL),
(6516, 4, 4, NULL),
(6517, 4, 5, NULL),
(6518, 4, 6, NULL),
(6519, 5, 1, 72.00),
(6520, 5, 2, NULL),
(6521, 5, 3, NULL),
(6522, 5, 4, NULL),
(6523, 5, 5, NULL),
(6524, 5, 6, NULL),
(6525, 6, 1, 73.00),
(6526, 6, 2, 78.00),
(6527, 6, 3, NULL),
(6528, 6, 4, NULL),
(6529, 6, 5, NULL),
(6530, 6, 6, NULL),
(6531, 7, 1, 74.00),
(6532, 7, 2, 79.00),
(6533, 7, 3, 81.00),
(6534, 7, 4, NULL),
(6535, 7, 5, NULL),
(6536, 7, 6, NULL),
(6537, 8, 1, 75.00),
(6538, 8, 2, 75.00),
(6539, 8, 3, 82.00),
(6540, 8, 4, 84.00),
(6541, 8, 5, NULL),
(6542, 8, 6, NULL),
(6543, 9, 1, NULL),
(6544, 9, 2, NULL),
(6545, 9, 3, NULL),
(6546, 9, 4, NULL),
(6547, 9, 5, NULL),
(6548, 9, 6, NULL),
(6549, 10, 1, 77.00),
(6550, 10, 2, 0.00),
(6551, 10, 3, 0.00),
(6552, 10, 4, 0.00),
(6553, 10, 5, 0.00),
(6554, 10, 6, 0.00),
(6555, 11, 1, 78.00),
(6556, 11, 2, 78.00),
(6557, 11, 3, NULL),
(6558, 11, 4, NULL),
(6559, 11, 5, NULL),
(6560, 11, 6, NULL),
(6561, 12, 1, 79.00),
(6562, 12, 2, 79.00),
(6563, 12, 3, 80.00),
(6564, 12, 4, NULL),
(6565, 12, 5, NULL),
(6566, 12, 6, NULL),
(6567, 13, 1, 70.00),
(6568, 13, 2, 75.00),
(6569, 13, 3, 81.00),
(6570, 13, 4, 83.00),
(6571, 13, 5, NULL),
(6572, 13, 6, NULL),
(6573, 14, 1, NULL),
(6574, 14, 2, NULL),
(6575, 14, 3, NULL),
(6576, 14, 4, NULL),
(6577, 14, 5, NULL),
(6578, 14, 6, NULL),
(6579, 15, 1, 72.00),
(6580, 15, 2, NULL),
(6581, 15, 3, NULL),
(6582, 15, 4, NULL),
(6583, 15, 5, NULL),
(6584, 15, 6, NULL),
(6585, 16, 1, 73.00),
(6586, 16, 2, 78.00),
(6587, 16, 3, NULL),
(6588, 16, 4, NULL),
(6589, 16, 5, NULL),
(6590, 16, 6, NULL),
(6591, 17, 1, 74.00),
(6592, 17, 2, 79.00),
(6593, 17, 3, 82.00),
(6594, 17, 4, NULL),
(6595, 17, 5, NULL),
(6596, 17, 6, NULL),
(6597, 18, 1, 75.00),
(6598, 18, 2, 75.00),
(6599, 18, 3, 80.00),
(6600, 18, 4, 82.00),
(6601, 18, 5, 0.00),
(6602, 18, 6, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `student_contacts`
--

CREATE TABLE `student_contacts` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `student_mobile` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `father_mobile` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_contacts`
--

INSERT INTO `student_contacts` (`id`, `student_id`, `student_mobile`, `father_mobile`) VALUES
(1092, 1, '9876543210', '9876543221'),
(1093, 2, '9876543211', '9876543222'),
(1094, 3, '9876543212', '9876543223'),
(1095, 4, '9876543201', '9876500001'),
(1096, 5, '9876543202', '9876500002'),
(1097, 6, '9876543203', '9876500003'),
(1098, 7, '9876543204', '9876500004'),
(1099, 8, '9876543205', '9876500005'),
(1100, 9, '9876543206', '9876500006'),
(1101, 10, '9876543207', '9876500007'),
(1102, 11, '9876543208', '9876500008'),
(1103, 12, '9876543209', '9876500009'),
(1104, 13, '9876543210', '9876500010'),
(1105, 14, '9876543211', '9876500011'),
(1106, 15, '9876543212', '9876500012'),
(1107, 16, '9876543213', '9876500013'),
(1108, 17, '9876543214', '9876500014'),
(1109, 18, '9876543215', '9876500015');

-- --------------------------------------------------------

--
-- Table structure for table `student_followups`
--

CREATE TABLE `student_followups` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `followup_date` date DEFAULT NULL,
  `remark` text COLLATE utf8mb4_general_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_followups`
--

INSERT INTO `student_followups` (`id`, `student_id`, `followup_date`, `remark`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(870, 1, '2025-07-10', 'Academic counseling', NULL, NULL, '2025-07-30 08:08:28', '2025-07-30 08:08:28'),
(871, 1, '2025-07-20', 'Attendance improvement needed', NULL, NULL, '2025-07-30 08:08:28', '2025-07-30 08:08:28'),
(872, 2, '2025-07-12', 'Scholarship discussion', NULL, NULL, '2025-07-30 08:08:29', '2025-07-30 08:08:29'),
(873, 3, '2025-07-15', 'Backlog clearance plan', NULL, NULL, '2025-07-30 08:08:29', '2025-07-30 08:08:29'),
(874, 4, '2025-07-16', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(875, 4, '2025-07-23', 'Check', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(876, 4, '2025-07-24', 'Hey', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(878, 4, '2025-07-25', 'Hey', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(879, 4, '2025-08-26', 'Hey', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(880, 5, '2025-07-17', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(881, 6, '2025-07-17', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(882, 7, '2025-07-17', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(883, 8, '2025-07-17', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(884, 9, '2025-07-17', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(885, 10, '2025-07-17', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(886, 11, '2025-07-17', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(887, 12, '2025-07-17', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(888, 13, '2025-07-17', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(889, 14, '2025-07-17', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(890, 15, '2025-07-17', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(891, 16, '2025-07-17', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(892, 17, '2025-07-17', 'Follow up note', NULL, NULL, '2025-07-30 08:08:49', '2025-07-30 08:08:49'),
(893, 18, '2025-07-26', 'Follow up note', NULL, 25, '2025-07-30 08:08:50', '2025-07-30 08:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `student_results`
--

CREATE TABLE `student_results` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `sgpa` decimal(3,2) DEFAULT NULL,
  `backlog_count` int DEFAULT '0'
) ;

--
-- Dumping data for table `student_results`
--

INSERT INTO `student_results` (`id`, `student_id`, `semester`, `sgpa`, `backlog_count`) VALUES
(6357, 1, 1, 7.20, 1),
(6358, 1, 2, 7.80, 0),
(6359, 1, 3, NULL, NULL),
(6360, 1, 4, NULL, NULL),
(6361, 1, 5, NULL, NULL),
(6362, 1, 6, NULL, NULL),
(6363, 2, 1, 8.10, 0),
(6364, 2, 2, 8.30, 0),
(6365, 2, 3, 7.90, 0),
(6366, 2, 4, NULL, NULL),
(6367, 2, 5, NULL, NULL),
(6368, 2, 6, NULL, NULL),
(6369, 3, 1, 6.20, 2),
(6370, 3, 2, NULL, NULL),
(6371, 3, 3, NULL, NULL),
(6372, 3, 4, NULL, NULL),
(6373, 3, 5, NULL, NULL),
(6374, 3, 6, NULL, NULL),
(6375, 4, 1, NULL, NULL),
(6376, 4, 2, NULL, NULL),
(6377, 4, 3, NULL, NULL),
(6378, 4, 4, NULL, NULL),
(6379, 4, 5, NULL, NULL),
(6380, 4, 6, NULL, NULL),
(6381, 5, 1, 7.00, 0),
(6382, 5, 2, NULL, NULL),
(6383, 5, 3, NULL, NULL),
(6384, 5, 4, NULL, NULL),
(6385, 5, 5, NULL, NULL),
(6386, 5, 6, NULL, NULL),
(6387, 6, 1, 7.50, 1),
(6388, 6, 2, 7.70, 0),
(6389, 6, 3, NULL, NULL),
(6390, 6, 4, NULL, NULL),
(6391, 6, 5, NULL, NULL),
(6392, 6, 6, NULL, NULL),
(6393, 7, 1, 8.00, 0),
(6394, 7, 2, 8.20, 1),
(6395, 7, 3, 8.40, 0),
(6396, 7, 4, NULL, NULL),
(6397, 7, 5, NULL, NULL),
(6398, 7, 6, NULL, NULL),
(6399, 8, 1, 6.00, 1),
(6400, 8, 2, 6.20, 2),
(6401, 8, 3, 6.40, 0),
(6402, 8, 4, 6.60, 1),
(6403, 8, 5, NULL, NULL),
(6404, 8, 6, NULL, NULL),
(6405, 9, 1, NULL, NULL),
(6406, 9, 2, NULL, NULL),
(6407, 9, 3, NULL, NULL),
(6408, 9, 4, NULL, NULL),
(6409, 9, 5, NULL, NULL),
(6410, 9, 6, NULL, NULL),
(6411, 10, 1, 7.00, 1),
(6412, 10, 2, NULL, 0),
(6413, 10, 3, NULL, 0),
(6414, 10, 4, NULL, 0),
(6415, 10, 5, NULL, 0),
(6416, 10, 6, NULL, 0),
(6417, 11, 1, 7.50, 0),
(6418, 11, 2, 7.70, 2),
(6419, 11, 3, NULL, NULL),
(6420, 11, 4, NULL, NULL),
(6421, 11, 5, NULL, NULL),
(6422, 11, 6, NULL, NULL),
(6423, 12, 1, 8.00, 1),
(6424, 12, 2, 8.20, 0),
(6425, 12, 3, 8.40, 0),
(6426, 12, 4, NULL, NULL),
(6427, 12, 5, NULL, NULL),
(6428, 12, 6, NULL, NULL),
(6429, 13, 1, 6.00, 0),
(6430, 13, 2, 6.20, 1),
(6431, 13, 3, 6.40, 0),
(6432, 13, 4, 6.60, 1),
(6433, 13, 5, NULL, NULL),
(6434, 13, 6, NULL, NULL),
(6435, 14, 1, NULL, NULL),
(6436, 14, 2, NULL, NULL),
(6437, 14, 3, NULL, NULL),
(6438, 14, 4, NULL, NULL),
(6439, 14, 5, NULL, NULL),
(6440, 14, 6, NULL, NULL),
(6441, 15, 1, 7.00, 0),
(6442, 15, 2, NULL, NULL),
(6443, 15, 3, NULL, NULL),
(6444, 15, 4, NULL, NULL),
(6445, 15, 5, NULL, NULL),
(6446, 15, 6, NULL, NULL),
(6447, 16, 1, 7.50, 1),
(6448, 16, 2, 7.70, 1),
(6449, 16, 3, NULL, NULL),
(6450, 16, 4, NULL, NULL),
(6451, 16, 5, NULL, NULL),
(6452, 16, 6, NULL, NULL),
(6453, 17, 1, 8.00, 0),
(6454, 17, 2, 8.20, 2),
(6455, 17, 3, 8.40, 0),
(6456, 17, 4, NULL, NULL),
(6457, 17, 5, NULL, NULL),
(6458, 17, 6, NULL, NULL),
(6459, 18, 1, 6.00, 1),
(6460, 18, 2, 6.20, 0),
(6461, 18, 3, 6.40, 0),
(6462, 18, 4, 6.60, 1),
(6463, 18, 5, NULL, 0),
(6464, 18, 6, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_summary`
--

CREATE TABLE `student_summary` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `total_backlogs` int DEFAULT NULL,
  `cgpa` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_summary`
--

INSERT INTO `student_summary` (`id`, `student_id`, `total_backlogs`, `cgpa`) VALUES
(25, 18, 0, 0.00),
(26, 10, 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('super_admin','admin') COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'John', 'john@gmail.com', '$2y$12$kdxEaup3qPEPHf0QLIRVHeS.7xs.9ZocuQI4booHkP4k/HrrRdR.S', 'super_admin', NULL, '2025-07-22 08:26:49', '2025-07-24 22:40:02'),
(10, 'Hey', 'demotest182932@gmail.com', '$2y$12$Xn6sNNTWnV6x53hgh5fHv.ynQeXuxpPrnNSuKE7JqnNwMjjw6L6m2', 'admin', NULL, '2025-07-24 22:33:15', '2025-07-26 08:02:48'),
(11, 'Jainil', 'jainillathigara18@gmail.com', '$2y$12$H1TRLMpgu79asxrQ2Afs8uHwdc0LQAXSvLE/ymqeJJd5dGB0r0hYW', 'super_admin', 'GcPNoxIfu5UwCpjnWF25rJML0NsAeIiRsAikJhlkAMBVT5qmBtVGr7hqNkGL', '2025-07-25 02:47:12', '2025-07-27 02:35:57'),
(24, 'John 2', 'jlathigara903@rku.ac.in', '$2y$12$Os73eKYdRXMnAIxi4GWu5OpZIK/qNITSqHl.zpxjiw5gNHFo9lore', 'admin', NULL, '2025-07-29 08:01:51', '2025-07-29 08:01:51'),
(25, 'niradpatel', 'niradpatel1@gmail.com', '$2y$12$CE2RMlhj6w312ayU/D7VO.DJMheqJjJIxi1memAdYjARwgSfmzAv.', 'super_admin', NULL, '2025-07-29 10:20:51', '2025-07-29 10:20:51'),
(26, 'niradpatel CE', 'niradpatel1+CE@gmail.com', '$2y$12$7k8wSLrA5DIhTSFzuq6fWOfS39pAFy21qj4aB/gyI6fQRY26VHzTu', 'admin', NULL, '2025-07-29 10:24:00', '2025-07-29 10:24:00'),
(27, 'jainil', 'jainillathigara18+test@gmail.com', '$2y$12$rZvIlEgHP8o28tGFPA05vuwWsN48Qp89l19k6YJen6wbSgNHzoNHm', 'admin', NULL, '2025-07-29 10:59:29', '2025-07-29 10:59:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_user` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enrollment_no` (`enrollment_no`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_contacts`
--
ALTER TABLE `student_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_followups`
--
ALTER TABLE `student_followups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `fk_student_followups_created_by` (`created_by`),
  ADD KEY `fk_student_followups_updated_by` (`updated_by`);

--
-- Indexes for table `student_results`
--
ALTER TABLE `student_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_summary`
--
ALTER TABLE `student_summary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_contacts`
--
ALTER TABLE `student_contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110;

--
-- AUTO_INCREMENT for table `student_followups`
--
ALTER TABLE `student_followups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=894;

--
-- AUTO_INCREMENT for table `student_results`
--
ALTER TABLE `student_results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_summary`
--
ALTER TABLE `student_summary`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD CONSTRAINT `fk_admin_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_contacts`
--
ALTER TABLE `student_contacts`
  ADD CONSTRAINT `student_contacts_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_followups`
--
ALTER TABLE `student_followups`
  ADD CONSTRAINT `fk_student_followups_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_followups_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `student_followups_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_results`
--
ALTER TABLE `student_results`
  ADD CONSTRAINT `student_results_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_summary`
--
ALTER TABLE `student_summary`
  ADD CONSTRAINT `student_summary_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
