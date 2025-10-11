-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2025 at 12:12 PM
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
-- Database: `studentmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `department` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `semester` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `division` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `user_id`, `department`, `semester`, `division`, `created_at`, `updated_at`) VALUES
(261, 28, 'Electrical', '1', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(262, 28, 'Electrical', '1', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(263, 28, 'Electrical', '1', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(264, 28, 'Electrical', '1', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(265, 28, 'Electrical', '1', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(266, 28, 'Electrical', '2', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(267, 28, 'Electrical', '2', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(268, 28, 'Electrical', '2', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(269, 28, 'Electrical', '2', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(270, 28, 'Electrical', '2', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(271, 28, 'Electrical', '3', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(272, 28, 'Electrical', '3', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(273, 28, 'Electrical', '3', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(274, 28, 'Electrical', '3', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(275, 28, 'Electrical', '3', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(276, 28, 'Electrical', '4', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(277, 28, 'Electrical', '4', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(278, 28, 'Electrical', '4', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(279, 28, 'Electrical', '4', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(280, 28, 'Electrical', '4', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(281, 28, 'Electrical', '5', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(282, 28, 'Electrical', '5', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(283, 28, 'Electrical', '5', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(284, 28, 'Electrical', '5', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(285, 28, 'Electrical', '5', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(286, 28, 'Electrical', '6', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(287, 28, 'Electrical', '6', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(288, 28, 'Electrical', '6', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(289, 28, 'Electrical', '6', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(290, 28, 'Electrical', '6', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(291, 28, 'Electrical', '7', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(292, 28, 'Electrical', '7', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(293, 28, 'Electrical', '7', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(294, 28, 'Electrical', '7', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(295, 28, 'Electrical', '7', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(296, 28, 'Electrical', '8', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(297, 28, 'Electrical', '8', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(298, 28, 'Electrical', '8', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(299, 28, 'Electrical', '8', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(300, 28, 'Electrical', '8', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(301, 28, 'Mechanical', '1', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(302, 28, 'Mechanical', '1', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(303, 28, 'Mechanical', '1', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(304, 28, 'Mechanical', '1', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(305, 28, 'Mechanical', '1', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(306, 28, 'Mechanical', '2', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(307, 28, 'Mechanical', '2', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(308, 28, 'Mechanical', '2', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(309, 28, 'Mechanical', '2', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(310, 28, 'Mechanical', '2', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(311, 28, 'Mechanical', '3', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(312, 28, 'Mechanical', '3', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(313, 28, 'Mechanical', '3', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(314, 28, 'Mechanical', '3', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(315, 28, 'Mechanical', '3', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(316, 28, 'Mechanical', '4', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(317, 28, 'Mechanical', '4', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(318, 28, 'Mechanical', '4', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(319, 28, 'Mechanical', '4', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(320, 28, 'Mechanical', '4', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(321, 28, 'Mechanical', '5', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(322, 28, 'Mechanical', '5', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(323, 28, 'Mechanical', '5', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(324, 28, 'Mechanical', '5', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(325, 28, 'Mechanical', '5', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(326, 28, 'Mechanical', '6', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(327, 28, 'Mechanical', '6', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(328, 28, 'Mechanical', '6', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(329, 28, 'Mechanical', '6', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(330, 28, 'Mechanical', '6', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(331, 28, 'Mechanical', '7', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(332, 28, 'Mechanical', '7', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(333, 28, 'Mechanical', '7', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(334, 28, 'Mechanical', '7', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(335, 28, 'Mechanical', '7', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(336, 28, 'Mechanical', '8', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(337, 28, 'Mechanical', '8', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(338, 28, 'Mechanical', '8', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(339, 28, 'Mechanical', '8', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(340, 28, 'Mechanical', '8', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(341, 28, 'Computer', '1', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(342, 28, 'Computer', '1', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(343, 28, 'Computer', '1', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(344, 28, 'Computer', '1', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(345, 28, 'Computer', '1', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(346, 28, 'Computer', '2', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(347, 28, 'Computer', '2', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(348, 28, 'Computer', '2', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(349, 28, 'Computer', '2', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(350, 28, 'Computer', '2', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(351, 28, 'Computer', '3', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(352, 28, 'Computer', '3', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(353, 28, 'Computer', '3', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(354, 28, 'Computer', '3', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(355, 28, 'Computer', '3', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(356, 28, 'Computer', '4', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(357, 28, 'Computer', '4', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(358, 28, 'Computer', '4', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(359, 28, 'Computer', '4', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(360, 28, 'Computer', '4', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(361, 28, 'Computer', '5', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(362, 28, 'Computer', '5', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(363, 28, 'Computer', '5', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(364, 28, 'Computer', '5', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(365, 28, 'Computer', '5', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(366, 28, 'Computer', '6', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(367, 28, 'Computer', '6', 'B', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(368, 28, 'Computer', '6', 'C', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(369, 28, 'Computer', '6', 'D', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(370, 28, 'Computer', '6', 'E', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(371, 28, 'Computer', '7', 'A', '2025-10-10 00:36:00', '2025-10-10 00:36:00'),
(372, 28, 'Computer', '7', 'B', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(373, 28, 'Computer', '7', 'C', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(374, 28, 'Computer', '7', 'D', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(375, 28, 'Computer', '7', 'E', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(376, 28, 'Computer', '8', 'A', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(377, 28, 'Computer', '8', 'B', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(378, 28, 'Computer', '8', 'C', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(379, 28, 'Computer', '8', 'D', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(380, 28, 'Computer', '8', 'E', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(381, 28, 'Civil', '1', 'A', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(382, 28, 'Civil', '1', 'B', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(383, 28, 'Civil', '1', 'C', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(384, 28, 'Civil', '1', 'D', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(385, 28, 'Civil', '1', 'E', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(386, 28, 'Civil', '2', 'A', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(387, 28, 'Civil', '2', 'B', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(388, 28, 'Civil', '2', 'C', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(389, 28, 'Civil', '2', 'D', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(390, 28, 'Civil', '2', 'E', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(391, 28, 'Civil', '3', 'A', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(392, 28, 'Civil', '3', 'B', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(393, 28, 'Civil', '3', 'C', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(394, 28, 'Civil', '3', 'D', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(395, 28, 'Civil', '3', 'E', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(396, 28, 'Civil', '4', 'A', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(397, 28, 'Civil', '4', 'B', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(398, 28, 'Civil', '4', 'C', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(399, 28, 'Civil', '4', 'D', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(400, 28, 'Civil', '4', 'E', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(401, 28, 'Civil', '5', 'A', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(402, 28, 'Civil', '5', 'B', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(403, 28, 'Civil', '5', 'C', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(404, 28, 'Civil', '5', 'D', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(405, 28, 'Civil', '5', 'E', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(406, 28, 'Civil', '6', 'A', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(407, 28, 'Civil', '6', 'B', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(408, 28, 'Civil', '6', 'C', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(409, 28, 'Civil', '6', 'D', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(410, 28, 'Civil', '6', 'E', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(411, 28, 'Civil', '7', 'A', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(412, 28, 'Civil', '7', 'B', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(413, 28, 'Civil', '7', 'C', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(414, 28, 'Civil', '7', 'D', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(415, 28, 'Civil', '7', 'E', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(416, 28, 'Civil', '8', 'A', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(417, 28, 'Civil', '8', 'B', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(418, 28, 'Civil', '8', 'C', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(419, 28, 'Civil', '8', 'D', '2025-10-10 00:36:01', '2025-10-10 00:36:01'),
(420, 28, 'Civil', '8', 'E', '2025-10-10 00:36:01', '2025-10-10 00:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1QcFmHZkPdhoPZGtMc1UfQECuQqXahQOzGFeTWYU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1FxcHVtbW9WU0RibzJmODNCNGdvYk04NTdwT3d4U0Rva3ZSVVlWTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vc3R1ZGVudC1wb3J0YWwudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1760184339),
('dLhJefFyXtR8eVmny5YmCUVL016CU3hvgbxXErTP', 26, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNURGOTNiUlRwN3R6YzFWV3lCblJTVVVPQjRaMVM1MmhMVWFKMDhEOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vc3R1ZGVudC1wb3J0YWwudGVzdC9hZG1pbi9jcmVkaXRzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjY7fQ==', 1760077358),
('h0F9DecyBVd7TWhnLOMNID5kW12JCn5rb3Fjqib3', 26, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYWFuODQyVXFYZjR1eUV3V0lxM1NlRXlXek9iUkNHYW9xNjdCRGM5ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vc3R1ZGVudC1wb3J0YWwudGVzdC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyNjt9', 1760184363),
('iLsLe9wo8luZIgcN1COpQEfj3ajzEtbzcMdX8zrK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlJhWm9wWklKUHVEUVVnVW9GbUV2S2FpME1GaDRTZG5VUG92eWlhNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9zdHVkZW50LXBvcnRhbC50ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760077281),
('Kn4E9AdLGdvetoY8dZiWZ8eECN1ljzr8iWDxmatf', 25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaWMxOVlkc1FsVTZkVVRRZ0dYY0xGZnNIT1hyVUozSnprdUdBYXVxZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9zdHVkZW50LXBvcnRhbC12NC50ZXN0L2FkbWluL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI1O30=', 1760074567),
('PVZRAdFFDKCVOimAv7ejEy5XN7u9vx1zHPfCrNR8', 26, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQlhHcHVWWm1rd05HdTRQV1lhTUtNYXlCeVFBNm1iNjN1aFBtUktXZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vc3R1ZGVudF9tYW5hZ2VtZW50X3N5c3RlbS50ZXN0L2FkbWluL3N0dWRlbnRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjY7fQ==', 1760184609),
('wNtVnR1XySW9sVXnvWw1geHOZVURrqIzOnGrlV7E', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:143.0) Gecko/20100101 Firefox/143.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiak82VXJlTkZPZmxJUFVJWE9IN0RuMWxQY0FCYVZSTTlWU21KcTlqWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9zdHVkZW50LXBvcnRhbC50ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760077625),
('wQAg1C7AgZDr0zymqRde3p6yBAA9eRxcmGsBV3Y5', 26, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSkhCN3c3RHRjTUs3NDhMVEFPaEVKVGgxSWxzcklWQ1dUakVLQlRnbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9zdHVkZW50LXBvcnRhbC50ZXN0L2FkbWluL2NyZWRpdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyNjt9', 1760077531);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `sr_no` int DEFAULT NULL,
  `enrollment_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `current_semester` int DEFAULT NULL,
  `division` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `cast` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aadhar_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `uid_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `abc_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `school` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hsc_school_uni` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hsc_city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `sr_no`, `enrollment_no`, `current_semester`, `division`, `name`, `dob`, `gender`, `address`, `cast`, `category`, `aadhar_no`, `uid_no`, `email`, `abc_id`, `department`, `school`, `hsc_school_uni`, `hsc_city`, `created_at`) VALUES
(1, 1, 'ENR001', 1, 'A', 'Student 1', '2003-06-01', 'Male', 'City 1', 'OBC', 'OBC', '123456789001', 'UID001', 'student1@example.com', 'ABC001', 'Computer', 'School of DS', 'Guj Uni', 'City 1', '2025-08-04 08:30:09'),
(2, 2, 'ENR002', 2, 'B', 'Student 2', '2003-06-02', 'Female', 'City 2', 'OBC', 'Open', '123456789002', 'UID002', 'student2@example.com', 'ABC002', 'Electrical', 'School of DS', 'Guj Uni', 'City 2', '2025-08-04 08:30:09'),
(3, 3, 'ENR003', 3, 'C', 'Student 3', '2003-06-03', 'Male', 'City 3', 'General', 'OBC', '123456789003', 'UID003', 'student3@example.com', 'ABC003', 'Mechanical', 'School of DS', 'Guj Uni', 'City 3', '2025-08-04 08:30:09'),
(4, 4, 'ENR004', 7, 'A', 'Student 4', '2003-06-04', 'Female', 'City 4', 'OBC', 'Open', '123456789004', 'UID004', 'student4@example.com', 'ABC004', 'Computer', 'School of DS', 'Guj Uni', 'City 4', '2025-08-04 08:30:09'),
(5, 5, 'ENR005', 5, 'B', 'Student 5', '2003-06-05', 'Male', 'City 5', 'OBC', 'OBC', '123456789005', 'UID005', 'student5@example.com', 'ABC005', 'Electrical', 'School of DS', 'Guj Uni', 'City 5', '2025-08-04 08:30:09'),
(6, 6, 'ENR006', 1, 'C', 'Student 6', '2003-06-06', 'Female', 'City 6', 'General', 'Open', '123456789006', 'UID006', 'student6@example.com', 'ABC006', 'Mechanical', 'School of DS', 'Guj Uni', 'City 6', '2025-08-04 08:30:09'),
(7, 7, 'ENR007', 2, 'A', 'Student 7', '2003-06-07', 'Male', 'City 7', 'OBC', 'OBC', '123456789007', 'UID007', 'student7@example.com', 'ABC007', 'Computer', 'School of DCE', 'Guj Uni', 'City 7', '2025-08-04 08:30:09'),
(8, 8, 'ENR008', 3, 'B', 'Student 8', '2003-06-08', 'Female', 'City 8', 'OBC', 'Open', '123456789008', 'UID008', 'student8@example.com', 'ABC008', 'Electrical', 'School of DCE', 'Guj Uni', 'City 8', '2025-08-04 08:30:09'),
(9, 9, 'ENR009', 4, 'C', 'Student 9', '2003-06-09', 'Male', 'City 9', 'General', 'OBC', '123456789009', 'UID009', 'student9@example.com', 'ABC009', 'Mechanical', 'School of DCE', 'Guj Uni', 'City 9', '2025-08-04 08:30:09'),
(10, 10, 'ENR010', 5, 'A', 'Student 10', '2003-06-10', 'Female', 'City 10', 'OBC', 'Open', '123456789010', 'UID010', 'student10@example.com', 'ABC010', 'Computer', 'School of DCE', 'Guj Uni', 'City 10', '2025-08-04 08:30:09'),
(11, 11, 'ENR011', 1, 'B', 'Student 11', '2003-06-11', 'Male', 'City 11', 'OBC', 'OBC', '123456789011', 'UID011', 'student11@example.com', 'ABC011', 'Electrical', 'School of DCE', 'Guj Uni', 'City 11', '2025-08-04 08:30:09'),
(12, 12, 'ENR012', 2, 'C', 'Student 12', '2003-06-12', 'Female', 'City 12', 'General', 'Open', '123456789012', 'UID012', 'student12@example.com', 'ABC012', 'Mechanical', 'School of DCE', 'Guj Uni', 'City 12', '2025-08-04 08:30:09'),
(13, 13, 'ENR013', 3, 'A', 'Student 13', '2003-06-13', 'Male', 'City 13', 'OBC', 'OBC', '123456789013', 'UID013', 'student13@example.com', 'ABC013', 'Computer', 'School of DCE', 'Guj Uni', 'City 13', '2025-08-04 08:30:09'),
(14, 14, 'ENR014', 4, 'B', 'Student 14', '2003-06-14', 'Female', 'City 14', 'OBC', 'Open', '123456789014', 'UID014', 'student14@example.com', 'ABC014', 'Electrical', 'School of DCE', 'Guj Uni', 'City 14', '2025-08-04 08:30:09'),
(15, 15, 'ENR0020', 2, 'C', 'Student 20', '2004-05-01', 'Male', 'Address', 'Cast', 'Category', '1234567890', 'UID0020', 'hey@gmail.com', 'ABC0020', 'Civil', 'DCE', 'School_Uni', 'HSC', '2025-08-04 08:30:09'),
(16, 16, 'ENR020', 5, 'A', 'John', '2005-07-31', 'Male', 'Hey', 'General', 'OBC', '1728392817283', 'UID020', 'sa@gmail.com', 'ABC020', 'Mechanical', 'School of DCE', 'HSC School', 'HSC City', '2025-08-04 08:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `attendance_percent` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `student_id`, `semester`, `attendance_percent`) VALUES
(8602, 1, 1, NULL),
(8603, 1, 2, NULL),
(8604, 1, 3, NULL),
(8605, 1, 4, NULL),
(8606, 1, 5, NULL),
(8607, 1, 6, NULL),
(8608, 1, 7, NULL),
(8609, 1, 8, NULL),
(8610, 2, 1, 72.00),
(8611, 2, 2, NULL),
(8612, 2, 3, NULL),
(8613, 2, 4, NULL),
(8614, 2, 5, NULL),
(8615, 2, 6, NULL),
(8616, 2, 7, NULL),
(8617, 2, 8, NULL),
(8618, 3, 1, 73.00),
(8619, 3, 2, 78.00),
(8620, 3, 3, NULL),
(8621, 3, 4, NULL),
(8622, 3, 5, NULL),
(8623, 3, 6, NULL),
(8624, 3, 7, NULL),
(8625, 3, 8, NULL),
(8626, 4, 1, 74.00),
(8627, 4, 2, 79.00),
(8628, 4, 3, 81.00),
(8629, 4, 4, 74.00),
(8630, 4, 5, 79.00),
(8631, 4, 6, 81.00),
(8632, 4, 7, NULL),
(8633, 4, 8, NULL),
(8634, 5, 1, 75.00),
(8635, 5, 2, 75.00),
(8636, 5, 3, 82.00),
(8637, 5, 4, 84.00),
(8638, 5, 5, NULL),
(8639, 5, 6, NULL),
(8640, 5, 7, NULL),
(8641, 5, 8, NULL),
(8642, 6, 1, NULL),
(8643, 6, 2, NULL),
(8644, 6, 3, NULL),
(8645, 6, 4, NULL),
(8646, 6, 5, NULL),
(8647, 6, 6, NULL),
(8648, 6, 7, NULL),
(8649, 6, 8, NULL),
(8650, 7, 1, 77.00),
(8651, 7, 2, NULL),
(8652, 7, 3, NULL),
(8653, 7, 4, NULL),
(8654, 7, 5, NULL),
(8655, 7, 6, NULL),
(8656, 7, 7, NULL),
(8657, 7, 8, NULL),
(8658, 8, 1, 78.00),
(8659, 8, 2, 78.00),
(8660, 8, 3, NULL),
(8661, 8, 4, NULL),
(8662, 8, 5, NULL),
(8663, 8, 6, NULL),
(8664, 8, 7, NULL),
(8665, 8, 8, NULL),
(8666, 9, 1, 79.00),
(8667, 9, 2, 79.00),
(8668, 9, 3, 80.00),
(8669, 9, 4, NULL),
(8670, 9, 5, NULL),
(8671, 9, 6, NULL),
(8672, 9, 7, NULL),
(8673, 9, 8, NULL),
(8674, 10, 1, 70.00),
(8675, 10, 2, 75.00),
(8676, 10, 3, 81.00),
(8677, 10, 4, 83.00),
(8678, 10, 5, NULL),
(8679, 10, 6, NULL),
(8680, 10, 7, NULL),
(8681, 10, 8, NULL),
(8682, 11, 1, NULL),
(8683, 11, 2, NULL),
(8684, 11, 3, NULL),
(8685, 11, 4, NULL),
(8686, 11, 5, NULL),
(8687, 11, 6, NULL),
(8688, 11, 7, NULL),
(8689, 11, 8, NULL),
(8690, 12, 1, 72.00),
(8691, 12, 2, NULL),
(8692, 12, 3, NULL),
(8693, 12, 4, NULL),
(8694, 12, 5, NULL),
(8695, 12, 6, NULL),
(8696, 12, 7, NULL),
(8697, 12, 8, NULL),
(8698, 13, 1, 73.00),
(8699, 13, 2, 78.00),
(8700, 13, 3, NULL),
(8701, 13, 4, NULL),
(8702, 13, 5, NULL),
(8703, 13, 6, NULL),
(8704, 13, 7, NULL),
(8705, 13, 8, NULL),
(8706, 14, 1, 74.00),
(8707, 14, 2, 79.00),
(8708, 14, 3, 82.00),
(8709, 14, 4, NULL),
(8710, 14, 5, NULL),
(8711, 14, 6, NULL),
(8712, 14, 7, NULL),
(8713, 14, 8, NULL),
(8714, 15, 1, 80.00),
(8715, 15, 2, NULL),
(8716, 15, 3, NULL),
(8717, 15, 4, NULL),
(8718, 15, 5, NULL),
(8719, 15, 6, NULL),
(8720, 15, 7, NULL),
(8721, 15, 8, NULL),
(8722, 16, 1, 80.00),
(8723, 16, 2, 80.00),
(8724, 16, 3, 80.00),
(8725, 16, 4, 75.00),
(8726, 16, 5, NULL),
(8727, 16, 6, NULL),
(8728, 16, 7, NULL),
(8729, 16, 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_contacts`
--

CREATE TABLE `student_contacts` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `student_mobile` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `father_mobile` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_contacts`
--

INSERT INTO `student_contacts` (`id`, `student_id`, `student_mobile`, `father_mobile`) VALUES
(1361, 1, '9876543201', '9876500001'),
(1362, 2, '9876543202', '9876500002'),
(1363, 3, '9876543203', '9876500003'),
(1364, 4, '9876543204', '9876500004'),
(1365, 5, '9876543205', '9876500005'),
(1366, 6, '9876543206', '9876500006'),
(1367, 7, '9876543207', '9876500007'),
(1368, 8, '9876543208', '9876500008'),
(1369, 9, '9876543209', '9876500009'),
(1370, 10, '9876543210', '9876500010'),
(1371, 11, '9876543211', '9876500011'),
(1372, 12, '9876543212', '9876500012'),
(1373, 13, '9876543213', '9876500013'),
(1374, 14, '9876543214', '9876500014'),
(1375, 15, '1234567891', '1234567891'),
(1376, 16, '9876543215', '9876500015');

-- --------------------------------------------------------

--
-- Table structure for table `student_followups`
--

CREATE TABLE `student_followups` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `followup_date` date DEFAULT NULL,
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_followups`
--

INSERT INTO `student_followups` (`id`, `student_id`, `followup_date`, `remark`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1185, 1, '2025-07-16', 'Follow up note', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1186, 1, '2025-07-23', 'Check', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1187, 1, '2025-07-24', 'Hey', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1188, 1, '2025-07-30', 'Hey', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1189, 1, '2025-07-25', 'Hey', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1190, 1, '2025-08-26', 'Hey', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1191, 2, '2025-07-17', 'Follow up note', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1192, 3, '2025-07-17', 'Follow up note', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1193, 4, '2025-07-17', 'Follow up note', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1194, 5, '2025-07-17', 'Follow up note', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1195, 6, '2025-07-17', 'Follow up note', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1196, 7, '2025-07-17', 'Follow up note', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1197, 8, '2025-07-17', 'Follow up note', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1198, 9, '2025-07-17', 'Follow up note', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1199, 9, '2025-07-27', 'Hey', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1200, 10, '2025-07-17', 'Follow up note', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1201, 11, '2025-07-17', 'Follow up note', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1202, 12, '2025-07-17', 'Follow up note', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1203, 12, '2025-07-29', 'Hey 2', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1204, 13, '2025-07-17', 'Follow up note', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1205, 14, '2025-07-17', 'Follow up note 2', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1206, 14, '2025-07-29', 'Hey 2', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1207, 15, '2025-07-30', 'Hey', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09'),
(1208, 15, '2025-07-31', 'Hey', NULL, NULL, '2025-08-04 03:00:09', '2025-08-04 03:00:09');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_results`
--

INSERT INTO `student_results` (`id`, `student_id`, `semester`, `sgpa`, `backlog_count`) VALUES
(8471, 1, 1, NULL, NULL),
(8472, 1, 2, NULL, NULL),
(8473, 1, 3, NULL, NULL),
(8474, 1, 4, NULL, NULL),
(8475, 1, 5, NULL, NULL),
(8476, 1, 6, NULL, NULL),
(8477, 1, 7, NULL, NULL),
(8478, 1, 8, NULL, NULL),
(8479, 2, 1, 7.00, 0),
(8480, 2, 2, NULL, NULL),
(8481, 2, 3, NULL, NULL),
(8482, 2, 4, NULL, NULL),
(8483, 2, 5, NULL, NULL),
(8484, 2, 6, NULL, NULL),
(8485, 2, 7, NULL, NULL),
(8486, 2, 8, NULL, NULL),
(8487, 3, 1, 7.50, 1),
(8488, 3, 2, 7.70, 0),
(8489, 3, 3, NULL, NULL),
(8490, 3, 4, NULL, NULL),
(8491, 3, 5, NULL, NULL),
(8492, 3, 6, NULL, NULL),
(8493, 3, 7, NULL, NULL),
(8494, 3, 8, NULL, NULL),
(8495, 4, 1, 8.00, 0),
(8496, 4, 2, 8.20, 1),
(8497, 4, 3, 8.40, 0),
(8498, 4, 4, 8.00, 0),
(8499, 4, 5, 8.20, 1),
(8500, 4, 6, 8.40, 0),
(8501, 4, 7, NULL, NULL),
(8502, 4, 8, NULL, NULL),
(8503, 5, 1, 6.00, 1),
(8504, 5, 2, 6.20, 2),
(8505, 5, 3, 6.40, 0),
(8506, 5, 4, 6.60, 1),
(8507, 5, 5, NULL, NULL),
(8508, 5, 6, NULL, NULL),
(8509, 5, 7, NULL, NULL),
(8510, 5, 8, NULL, NULL),
(8511, 6, 1, NULL, NULL),
(8512, 6, 2, NULL, NULL),
(8513, 6, 3, NULL, NULL),
(8514, 6, 4, NULL, NULL),
(8515, 6, 5, NULL, NULL),
(8516, 6, 6, NULL, NULL),
(8517, 6, 7, NULL, NULL),
(8518, 6, 8, NULL, NULL),
(8519, 7, 1, 7.00, 1),
(8520, 7, 2, NULL, NULL),
(8521, 7, 3, NULL, NULL),
(8522, 7, 4, NULL, NULL),
(8523, 7, 5, NULL, NULL),
(8524, 7, 6, NULL, NULL),
(8525, 7, 7, NULL, NULL),
(8526, 7, 8, NULL, NULL),
(8527, 8, 1, 7.50, 0),
(8528, 8, 2, 7.70, 2),
(8529, 8, 3, NULL, NULL),
(8530, 8, 4, NULL, NULL),
(8531, 8, 5, NULL, NULL),
(8532, 8, 6, NULL, NULL),
(8533, 8, 7, NULL, NULL),
(8534, 8, 8, NULL, NULL),
(8535, 9, 1, 8.00, 1),
(8536, 9, 2, 8.20, 0),
(8537, 9, 3, 8.40, 0),
(8538, 9, 4, NULL, NULL),
(8539, 9, 5, NULL, NULL),
(8540, 9, 6, NULL, NULL),
(8541, 9, 7, NULL, NULL),
(8542, 9, 8, NULL, NULL),
(8543, 10, 1, 6.00, 0),
(8544, 10, 2, 6.20, 1),
(8545, 10, 3, 6.40, 0),
(8546, 10, 4, 6.60, 1),
(8547, 10, 5, NULL, NULL),
(8548, 10, 6, NULL, NULL),
(8549, 10, 7, NULL, NULL),
(8550, 10, 8, NULL, NULL),
(8551, 11, 1, NULL, NULL),
(8552, 11, 2, NULL, NULL),
(8553, 11, 3, NULL, NULL),
(8554, 11, 4, NULL, NULL),
(8555, 11, 5, NULL, NULL),
(8556, 11, 6, NULL, NULL),
(8557, 11, 7, NULL, NULL),
(8558, 11, 8, NULL, NULL),
(8559, 12, 1, 7.00, 0),
(8560, 12, 2, NULL, NULL),
(8561, 12, 3, NULL, NULL),
(8562, 12, 4, NULL, NULL),
(8563, 12, 5, NULL, NULL),
(8564, 12, 6, NULL, NULL),
(8565, 12, 7, NULL, NULL),
(8566, 12, 8, NULL, NULL),
(8567, 13, 1, 7.50, 1),
(8568, 13, 2, 7.70, 1),
(8569, 13, 3, NULL, NULL),
(8570, 13, 4, NULL, NULL),
(8571, 13, 5, NULL, NULL),
(8572, 13, 6, NULL, NULL),
(8573, 13, 7, NULL, NULL),
(8574, 13, 8, NULL, NULL),
(8575, 14, 1, 8.00, 0),
(8576, 14, 2, 8.20, 2),
(8577, 14, 3, 8.40, 0),
(8578, 14, 4, NULL, NULL),
(8579, 14, 5, NULL, NULL),
(8580, 14, 6, NULL, NULL),
(8581, 14, 7, NULL, NULL),
(8582, 14, 8, NULL, NULL),
(8583, 15, 1, 8.00, 0),
(8584, 15, 2, NULL, NULL),
(8585, 15, 3, NULL, NULL),
(8586, 15, 4, NULL, NULL),
(8587, 15, 5, NULL, NULL),
(8588, 15, 6, NULL, NULL),
(8589, 15, 7, NULL, NULL),
(8590, 15, 8, NULL, NULL),
(8591, 16, 1, 8.00, 0),
(8592, 16, 2, 8.00, 0),
(8593, 16, 3, 8.00, 0),
(8594, 16, 4, 7.00, 0),
(8595, 16, 5, NULL, NULL),
(8596, 16, 6, NULL, NULL),
(8597, 16, 7, NULL, NULL),
(8598, 16, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_summary`
--

CREATE TABLE `student_summary` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `cgpa` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_summary`
--

INSERT INTO `student_summary` (`id`, `student_id`, `cgpa`) VALUES
(204, 1, NULL),
(205, 2, 7.00),
(206, 3, 7.60),
(207, 4, 8.20),
(208, 5, 6.30),
(209, 6, NULL),
(210, 7, 7.00),
(211, 8, 7.60),
(212, 9, 8.20),
(213, 10, 6.30),
(214, 11, NULL),
(215, 12, 7.00),
(216, 13, 7.60),
(217, 14, 8.20),
(218, 15, 8.00),
(219, 16, 7.75);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('super_admin','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(26, 'Super Admin', 'team.818x@gmail.com', '$2y$12$.Mu/M8u/AQlnrdEk53a8M.EXgxesFlEWquUwqhTLh9sA9hW5R2Wv6', 'super_admin', NULL, '2025-07-29 10:24:00', '2025-10-10 00:38:29'),
(28, 'Panda Cord', 'dccord3@gmail.com', '$2y$12$Y3JR3l/uclGFXWxZ9BnDCOiEXKNeymNuNxyM8riViq/ORCnlUJrOK', 'admin', NULL, '2025-10-10 00:36:00', '2025-10-10 00:36:00');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8730;

--
-- AUTO_INCREMENT for table `student_contacts`
--
ALTER TABLE `student_contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1377;

--
-- AUTO_INCREMENT for table `student_followups`
--
ALTER TABLE `student_followups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1209;

--
-- AUTO_INCREMENT for table `student_results`
--
ALTER TABLE `student_results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8599;

--
-- AUTO_INCREMENT for table `student_summary`
--
ALTER TABLE `student_summary`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
