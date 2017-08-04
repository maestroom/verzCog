-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2017 at 04:53 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cog`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `banner_link`, `banner_image`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'banner2', '', 'download1.png', 1, 1, 1, '2017-06-11 18:21:29', '2017-06-11 18:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `championship`
--

CREATE TABLE `championship` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `images_array` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_cutoff_date` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_status` tinyint(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `championship`
--

INSERT INTO `championship` (`id`, `user_id`, `images_array`, `title`, `contents`, `start_date`, `end_date`, `featured_image`, `location`, `registration_cutoff_date`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(0, NULL, 'a:3:{i:0;s:10:\"images.jpg\";i:1;s:12:\"download.jpg\";i:2;s:0:\"\";}', 'sdasd', 'sadsadsad', '2017-06-12 03:38:43', '2017-06-12 03:38:45', 'images.jpg', 'sdsadsad', '2017-06-12 03:39:13', 1, 1, '2017-06-11 23:39:15', '2017-06-11 23:40:40', 1),
(0, NULL, 'a:3:{i:0;s:10:\"images.jpg\";i:1;s:12:\"download.jpg\";i:2;s:0:\"\";}', 'sdasd', 'sadsadsad', '2017-06-12 03:38:43', '2017-06-12 03:38:45', 'images.jpg', 'sdsadsad', '2017-06-12 03:39:13', 1, 1, '2017-06-11 23:40:09', '2017-06-11 23:40:40', 1),
(0, NULL, 'a:3:{i:0;s:10:\"images.jpg\";i:1;s:12:\"download.jpg\";i:2;s:0:\"\";}', 'sdasd', 'sadsadsad', '2017-06-12 03:38:43', '2017-06-12 03:38:45', 'images.jpg', 'sdsadsad', '2017-06-12 03:39:13', 1, 1, '2017-06-11 23:40:35', '2017-06-11 23:40:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `domain`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'verzdesgn123', 'verzdesgn.com121', 1, 1, 1, '2017-05-23 16:00:00', '2017-05-23 16:00:00'),
(2, 'somecompany121', 'somecompany.com1', 1, 2, 2, '2017-05-23 16:00:00', '2017-05-23 16:00:00'),
(3, 'new company12121', 'new domain.com', 1, 0, 0, NULL, NULL),
(4, 'sasasas', 'asasasasa', 1, 0, 0, '0000-00-00 00:00:00', NULL),
(5, 'asasa', 'sasasa', 1, 0, 0, '2017-05-24 02:41:50', NULL),
(6, 'asasa', 'asasasa', 1, 0, 0, '2017-05-24 02:42:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `corporate`
--

CREATE TABLE `corporate` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `corporate`
--

INSERT INTO `corporate` (`id`, `name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'soemthing corporate12', 0, 0, 0, '2017-05-30 17:12:21', '2017-05-30 17:12:25'),
(2, 'corporate 98979789', 1, 0, 0, '2017-05-30 17:12:44', NULL),
(3, '121212323232', 0, 0, 0, '2017-05-30 17:16:01', NULL),
(4, '090909890789897uj7j7j7', 0, 0, 0, '2017-05-30 17:16:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emailtemplates`
--

CREATE TABLE `emailtemplates` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emailtemplates`
--

INSERT INTO `emailtemplates` (`id`, `name`, `contents`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1211w1w1w1', '<p><strong>asasas asasasasa</strong></p>', 0, 0, 0, '2017-06-11 22:41:45', '2017-07-20 00:09:45'),
(2, 'welcome mail', 'contentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontentscontent', 1, 0, 0, '2017-06-11 22:43:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `security_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images_array` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_attendees` int(11) DEFAULT NULL,
  `max_waiting_list` int(11) DEFAULT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topics` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `delete_status` tinyint(5) DEFAULT '0',
  `chargeble` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `type`, `security_code`, `images_array`, `title`, `event_url`, `max_attendees`, `max_waiting_list`, `contents`, `start_date`, `end_date`, `featured_image`, `location`, `tags`, `topics`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`, `delete_status`, `chargeble`) VALUES
(1, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'New final Event', 'fdfdf.com', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 3.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-25 19:21:47', '2017-06-22 20:23:32', 0, 0, 1),
(2, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'Final 123', '', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 2.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-26 00:39:25', '2017-05-29 00:46:59', 1, 1, NULL),
(3, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'Final 123', '', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 2.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-26 00:41:01', '2017-05-29 00:46:59', 1, 0, NULL),
(4, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'Final 123', '', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 2.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-26 00:43:01', '2017-05-29 00:46:59', 1, 0, NULL),
(5, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'Final 123', '', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 2.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-26 00:58:30', '2017-05-29 00:46:59', 1, 0, NULL),
(6, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'Final 123', '', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 2.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-28 18:52:07', '2017-05-29 00:46:59', 1, 0, NULL),
(7, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'Final 123', '', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 2.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-28 18:58:39', '2017-05-29 00:46:59', 1, 0, NULL),
(8, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'Final 123', '', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 2.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-28 19:00:24', '2017-05-29 00:46:59', 1, 0, NULL),
(9, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'Final 123', '', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 2.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-28 19:01:09', '2017-05-29 00:46:59', 1, 0, NULL),
(10, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'Final 123', '', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 2.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-28 19:02:00', '2017-05-29 00:46:59', 1, 0, NULL),
(11, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'Final 123', '', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 2.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-28 19:02:46', '2017-05-29 00:46:59', 1, 0, NULL),
(12, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'Final 123', '', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 2.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-28 19:03:18', '2017-05-29 00:46:59', 1, 0, NULL),
(13, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'Final 123', '', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 2.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-28 23:19:20', '2017-05-29 00:46:59', 1, 0, NULL),
(14, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'Final 224', '', NULL, NULL, 'sdsdsdsds', '2017-05-29 03:28:26', '2017-05-29 03:28:29', 'Aviary Stock Photo 3.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-28 23:29:34', '2017-05-29 00:51:02', 1, 0, NULL),
(15, NULL, 0, NULL, 'a:1:{i:0;s:24:\"Aviary Stock Photo 3.png\";}', 'sdsd', '', NULL, NULL, 'sdsdsd', '2017-05-29 05:06:34', '2017-05-29 05:06:36', 'Aviary', 'bangalore', 'a:2:{i:0;s:1:\"6\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"4\";i:1;s:1:\"5\";}', 1, NULL, '2017-05-29 01:07:10', NULL, 1, 0, NULL),
(16, NULL, 0, NULL, 'a:2:{i:0;a:2:{i:0;s:24:\"Aviary Stock Photo 2.png\";i:1;s:24:\"Aviary Stock Photo 3.png\";}i:1;a:1:{i:0;s:9:\"srini.png\";}}', 'dwwwwwwwwwwwwww', '', NULL, NULL, 'dwdwdwdw', '2017-05-29 05:15:41', '2017-05-29 05:15:43', 'Aviary', 'india', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"6\";}', 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}', 1, NULL, '2017-05-29 01:16:26', NULL, 1, 0, NULL),
(17, NULL, 0, NULL, 'a:2:{i:0;a:2:{i:0;s:24:\"Aviary Stock Photo 3.png\";i:1;s:0:\"\";}i:1;a:1:{i:0;s:9:\"srini.png\";}}', 'something', '', NULL, NULL, 'sdsdsds', '2017-05-29 05:37:42', '2017-05-29 05:37:44', 'Aviary', 'sdsds', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"6\";}', 'a:1:{i:0;s:1:\"5\";}', 1, NULL, '2017-05-29 01:38:19', NULL, 1, 0, NULL),
(18, NULL, 0, NULL, 'a:2:{i:0;a:2:{i:0;s:9:\"leena.png\";i:1;s:8:\"raty.png\";}i:1;a:1:{i:0;s:9:\"srini.png\";}}', 'sdsd', '', NULL, NULL, 'sdsds', '2017-05-29 05:42:14', '2017-05-29 05:42:16', 'leena.png', 'sdsds', 'a:1:{i:0;s:1:\"6\";}', 'a:1:{i:0;s:1:\"3\";}', 1, NULL, '2017-05-29 01:42:43', NULL, 1, 0, NULL),
(19, NULL, 0, NULL, 'a:2:{i:0;s:9:\"leena.png\";i:1;s:8:\"raty.png\";}', 'sds', '', NULL, NULL, 'dsdsds', '2017-05-29 05:58:36', '2017-05-29 05:58:38', 'raty.png', 'sdsd', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"6\";}', 'N;', 1, NULL, '2017-05-29 01:59:06', NULL, 1, 0, NULL),
(20, NULL, 0, NULL, 'a:3:{i:0;s:9:\"srini.png\";i:1;s:8:\"raty.png\";i:2;s:9:\"leena.png\";}', 'sdsds', '', NULL, NULL, 'dsdsd', '2017-05-29 06:02:06', '2017-05-29 06:02:08', 'raty.png', 'sdsds', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:1:\"4\";}', 1, 1, '2017-05-29 02:02:41', '2017-05-29 02:09:56', 1, 0, NULL),
(21, NULL, 0, NULL, 'a:1:{i:0;s:9:\"leena.png\";}', 'general', '', NULL, NULL, 'sdsd', '2017-05-29 06:11:44', '2017-05-29 06:11:46', 'leena.png', 'bangalore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"6\";}', 'a:1:{i:0;s:1:\"5\";}', 1, NULL, '2017-05-29 02:12:41', NULL, 1, 0, NULL),
(22, NULL, 0, NULL, 'a:1:{i:0;s:8:\"raty.png\";}', 'sdsd', '', NULL, NULL, 'sds', '2017-05-29 06:24:44', '2017-05-29 06:24:46', 'raty.png', 'sdsd', 'a:1:{i:0;s:1:\"6\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"4\";}', 1, NULL, '2017-05-29 02:25:08', NULL, 1, 0, NULL),
(23, NULL, 1, '1212', 'a:2:{i:0;s:9:\"leena.png\";i:1;s:8:\"raty.png\";}', 'wewewewewewewewew', '', NULL, NULL, 'wewewew12121231221312312312', '2017-05-29 06:26:53', '2017-05-29 06:27:01', 'raty.png', 'singaproe', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"6\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, NULL, '2017-05-29 02:29:31', NULL, 1, 0, NULL),
(24, NULL, 1, '1213786', 'a:1:{i:0;s:9:\"leena.png\";}', 'some title need to be added', '', NULL, NULL, 'contenets added succfully', '2017-05-30 12:29:26', '2017-05-30 12:29:28', 'leena.png', 'singapore', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:1:{i:0;s:1:\"2\";}', 1, NULL, '2017-05-29 20:30:47', NULL, 1, 0, NULL),
(25, NULL, 1, '2121w1w1', 'a:1:{i:0;s:9:\"srini.png\";}', 'asas', '', NULL, NULL, 'asasas', '2017-05-30 12:33:08', '2017-05-30 12:33:11', 'srini.png', 'bangalore', 'a:2:{i:0;s:1:\"6\";i:1;s:1:\"7\";}', 'a:1:{i:0;s:1:\"5\";}', 1, NULL, '2017-05-29 20:34:00', NULL, 0, 0, NULL),
(28, NULL, 0, NULL, 'a:4:{i:0;s:9:\"leena.png\";i:1;s:9:\"srini.png\";i:2;s:9:\"leena.png\";i:3;s:8:\"raty.png\";}', 'final old new1234', '', NULL, NULL, 'final old newfinal old newfinal old newfinal old newfinal old newfinal old newfinal old newfinal old newfinal old newfinal old newfinal old newfinal old newfinal old newfinal old newfinal old newfinal old newfinal old newfinal old new', '2017-05-30 01:54:23', '2017-05-30 01:54:26', 'leena.png', 'india', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"6\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-05-29 21:55:40', '2017-05-29 23:37:36', 1, 0, NULL),
(29, NULL, 0, NULL, 'a:1:{i:0;s:9:\"leena.png\";}', 'asas', '', NULL, NULL, 'asas', '2017-05-30 03:39:36', '2017-05-30 03:39:38', 'leena.png', '1212121', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:1:\"2\";}', 1, 1, '2017-05-29 23:40:05', '2017-05-30 00:08:49', 1, 0, NULL),
(30, NULL, 0, NULL, 'a:3:{i:0;s:9:\"srini.png\";i:1;s:9:\"leena.png\";i:3;s:8:\"raty.png\";}', 'New Topic Event', 'google.com', NULL, NULL, 'New Topic EventNew Topic EventNew Topic EventNew Topic EventNew Topic EventNew Topic EventNew Topic EventNew Topic EventNew Topic EventNew Topic EventNew Topic EventNew Topic EventNew Topic EventNew Topic EventNew Topic EventNew Topic EventNew Topic Event', '2017-05-30 04:09:48', '2017-05-30 04:09:50', 'srini.png', 'wqwqwqw', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"4\";i:1;s:1:\"5\";}', 1, 1, '2017-05-30 00:11:31', '2017-06-05 21:56:20', 1, 0, NULL),
(31, 4, 1, 'sdsds', 'a:1:{i:0;s:8:\"raty.png\";}', 'sds', '', NULL, NULL, 'dsdsds', '2017-05-30 04:13:06', '2017-05-30 04:13:08', 'raty.png', 'sdsds', 'a:1:{i:0;s:1:\"6\";}', 'a:1:{i:0;s:1:\"4\";}', 1, 1, '2017-05-30 00:13:33', '2017-06-05 21:55:33', 1, 0, NULL),
(32, 4, 0, NULL, 'a:1:{i:0;s:8:\"raty.png\";}', 'new event123', 'google.com', NULL, NULL, 'new event new event new event new event', '2017-06-06 01:54:11', '2017-06-06 01:54:13', 'raty.png', 'india', 'a:1:{i:0;s:1:\"1\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-06-05 21:55:04', '2017-06-05 21:55:16', 1, 0, NULL),
(33, NULL, 0, NULL, 'a:2:{i:0;s:10:\"events.PNG\";i:1;s:11:\"images1.jpg\";}', 'NVPS event', NULL, 5, 2, 'some discussion on meeting', '2017-06-19 10:54:05', '2017-06-19 10:54:08', 'events.PNG', 'singapore', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"6\";i:2;s:1:\"7\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, NULL, '2017-06-18 18:56:07', NULL, 1, 0, 0),
(34, NULL, 2, NULL, 'a:2:{i:0;s:12:\"download.jpg\";i:1;s:13:\"download1.png\";}', 'New event on July', NULL, 15, 8, 'Some contents for new event.....', '2017-07-04 10:10:00', '2017-07-10 02:10:00', 'download.jpg', 'singapore', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"6\";i:2;s:1:\"9\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 1, 1, '2017-06-22 20:20:59', '2017-06-22 20:22:16', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events_guest`
--

CREATE TABLE `events_guest` (
  `id` int(10) NOT NULL,
  `events_id` int(12) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `events_guest`
--

INSERT INTO `events_guest` (`id`, `events_id`, `name`, `designation`, `comments`, `photo`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 28, 'rahul', 'final old new123', 'asasafinal old newfinal old new', 'raty.png', 1, 1, '2017-05-29 21:55:41', '2017-05-29 23:37:36'),
(6, 28, 'rahul', 'final old new123', 'asasafinal old newfinal old new', 'raty.png', 1, 1, '2017-05-29 21:55:41', '2017-05-29 23:37:36'),
(7, 28, 'rahul', 'final old new123', 'asasafinal old newfinal old new', 'raty.png', 1, 1, '2017-05-29 23:37:35', '2017-05-29 23:37:36'),
(8, 28, '1q1q1a1a', '12121212', '1212121212', 'srini.png', 1, 0, '2017-05-29 23:37:36', NULL),
(9, 29, 'asasas', 'qwqw', 'qwqwqwq', 'raty.png', 1, 1, '2017-05-29 23:40:06', '2017-05-30 00:08:49'),
(10, 29, 'asasas', 'qwqw', 'qwqwqwq', 'raty.png', 1, 1, '2017-05-30 00:08:30', '2017-05-30 00:08:49'),
(11, 29, 'sdsdsds', 'dsdsdsd', '1212121', 'srini.png', 1, 0, '2017-05-30 00:08:49', NULL),
(12, 30, 'srini', 'final old new', 'asasasasasasasassasa', 'srini.png', 1, 1, '2017-05-30 00:11:31', '2017-06-05 21:56:20'),
(13, 30, 'srini', 'final old new', 'asasasasasasasassasa', 'srini.png', 1, 1, '2017-05-30 00:12:24', '2017-06-05 21:56:20'),
(14, 31, 'sdsds', 'dsdsdsds', 'sdsdsdsds', 'raty.png', 1, 1, '2017-05-30 00:13:33', '2017-06-05 21:55:33'),
(15, 31, 'sdsds', 'dsdsdsds', 'sdsdsdsds', 'raty.png', 1, 1, '2017-05-30 00:18:30', '2017-06-05 21:55:33'),
(16, 32, 'srini', 'sdsds', 'dsdsdsds', 'srini.png', 1, 1, '2017-06-05 21:55:04', '2017-06-05 21:55:16'),
(17, 31, 'asasas', 'asasa', 'asasasasa', 'srini.png', 1, 0, '2017-06-05 21:55:33', NULL),
(18, 30, 'asas', 'asas', 'asasas', 'leena.png', 1, 0, '2017-06-05 21:56:20', NULL),
(19, 33, 'henry', 'sasasa', 'qw12123e24343', 'download1.png', 1, 0, '2017-06-18 18:56:07', NULL),
(20, 34, 'Alex', 'Professor', 'lets write some details about him', 'images1.jpg', 1, 1, '2017-06-22 20:20:59', '2017-06-22 20:22:16'),
(21, 34, 'Alex', 'Professor', 'lets write some details about him', 'images1.jpg', 1, 1, '2017-06-22 20:20:59', '2017-06-22 20:22:16'),
(22, 34, 'steve', 'Doctor', 'lets write some details about doctor', 'download1.png', 1, 0, '2017-06-22 20:22:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events_topic`
--

CREATE TABLE `events_topic` (
  `id` int(10) NOT NULL,
  `title` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events_topic`
--

INSERT INTO `events_topic` (`id`, `title`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'general123asasasa', 0, 1, 1, '2017-05-28 21:56:24', '2017-05-28 22:38:32'),
(2, 'asasasasasasa', 1, 1, 0, '2017-05-28 22:01:25', NULL),
(3, 'sdsdsdsds', 1, 1, 0, '2017-05-28 22:12:06', NULL),
(4, 'sdsdsds', 1, 1, 0, '2017-05-28 22:12:51', NULL),
(5, '2w2w2w2w', 1, 1, 0, '2017-05-28 22:14:44', NULL),
(6, 'new topic 12232323', 0, 1, 0, '2017-05-28 22:48:55', NULL),
(7, 'some topic213123123', 0, 1, 1, '2017-06-22 20:15:27', '2017-06-22 20:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `name`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'asasasa', 0, 1, 0, '2017-06-13 19:17:14', NULL),
(2, '58763475347r347r34hrh4', 1, 1, 0, '2017-06-13 19:38:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faqanswers`
--

CREATE TABLE `faqanswers` (
  `id` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_question_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_id` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_others` int(11) NOT NULL,
  `is_none` int(11) NOT NULL,
  `answer_cat` int(11) NOT NULL,
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqanswers`
--

INSERT INTO `faqanswers` (`id`, `title`, `faq_question_id`, `faq_id`, `note`, `is_others`, `is_none`, `answer_cat`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'some answerss', '1', 1, '', 0, 0, 0, 1, 1, 1, '2017-06-13 19:38:02', '2017-06-22 20:14:45'),
(2, '4987[8907[80-4[\'0[-\'1p[15\'[', '2', 2, '', 0, 0, 0, 1, 1, 0, '2017-06-13 19:39:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faqquestions`
--

CREATE TABLE `faqquestions` (
  `id` int(10) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqquestions`
--

INSERT INTO `faqquestions` (`id`, `question`, `faq_id`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'where do we have q213131232', '1', 0, 1, 1, '2017-06-13 19:32:11', '2017-06-13 19:33:08'),
(2, 'ut568ut54u8t45jt9j845tgj45gjm54', '2', 1, 1, 0, '2017-06-13 19:38:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fellowship`
--

CREATE TABLE `fellowship` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `images_array` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_cutoff_date` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_status` tinyint(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `fellowship`
--

INSERT INTO `fellowship` (`id`, `user_id`, `images_array`, `title`, `contents`, `start_date`, `end_date`, `featured_image`, `location`, `registration_cutoff_date`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(2, NULL, 'a:3:{i:0;s:12:\"download.jpg\";i:1;s:10:\"images.jpg\";i:2;s:11:\"images1.jpg\";}', 'fellow title', 'fellow titlefellow titlefellow titlefellow titlefellow titlefellow titlefellow titlefellow titlefellow titlefellow titlefellow titlefellow title', '2017-06-12 11:22:06', '2017-06-12 11:22:07', 'download.jpg', '1212121', '2017-06-13 02:10:30', 1, 1, '2017-06-11 19:23:52', '2017-06-18 19:07:42', 0),
(3, NULL, 'a:1:{i:0;s:11:\"images1.jpg\";}', 'fgfg', 'fgfgfg', '2017-06-19 11:07:17', '2017-06-19 11:07:19', 'images1.jpg', 'gfgfgfgfg', '2017-06-19 11:07:33', 1, NULL, '2017-06-18 19:07:35', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `founders`
--

CREATE TABLE `founders` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `founders`
--

INSERT INTO `founders` (`id`, `name`, `company_link`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1212121', 'google.com', 1, 1, 1, '2017-05-31 02:23:57', '2017-05-31 02:32:20'),
(2, 'qwqwqw12121212', '23123123', 0, 1, 4, '2017-05-31 02:32:27', '2017-06-08 22:45:53'),
(3, 'dsdsds', 'dsdasdasdasdas', 0, 4, 0, '2017-06-08 22:45:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `getinvolved`
--

CREATE TABLE `getinvolved` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `company_logo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `delete_status` int(10) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `getinvolved`
--

INSERT INTO `getinvolved` (`id`, `user_id`, `company_logo`, `title`, `message`, `start_date`, `end_date`, `delete_status`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, 4, 'images1.jpg', 'dsdfsdfsdfsd', 'fafsafsafasfsadsadasdasdsa', '2017-06-23 11:01:39', '2017-06-23 11:01:41', 0, '2017-06-22 19:01:47', NULL, NULL),
(3, 4, 'download1.png', '2323423432423423423432423432432432', '3e423d43ff vrfverfrefrfreferferfer', '2013-02-27 06:50:00', '2013-02-19 05:10:00', 0, '2017-06-22 19:03:16', NULL, NULL),
(4, 4, 'download.jpg', 'sdsdsd', 'sdasdasdsadsad', '2013-02-20 05:20:00', '2017-06-23 11:19:33', 0, '2017-06-22 19:19:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `global_tracks`
--

CREATE TABLE `global_tracks` (
  `tracked_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `web_visitor` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `resource_downloaded` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `event_register_click` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `event_registered` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `fellowship_register_click` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `fellowship_registered` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `championship_register_click` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `championship_registered` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `giving_sg_click` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `logo_download` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `ciguide_download` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `attempted_quiz` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `completed_quiz` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `global_tracks`
--

INSERT INTO `global_tracks` (`tracked_date`, `web_visitor`, `resource_downloaded`, `event_register_click`, `event_registered`, `fellowship_register_click`, `fellowship_registered`, `championship_register_click`, `championship_registered`, `giving_sg_click`, `logo_download`, `ciguide_download`, `attempted_quiz`, `completed_quiz`, `created_at`, `updated_at`) VALUES
('24-07-2017', 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-07-23 20:05:56', '2017-07-23 20:09:44'),
('27-07-2017', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-07-26 17:31:06', NULL),
('28-07-2017', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017-07-27 18:30:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(842, '2014_04_02_193005_create_translations_table', 1),
(843, '2014_10_12_000000_create_users_table', 1),
(844, '2014_10_12_100000_create_password_resets_table', 1),
(845, '2017_02_16_230800_create_webmaster_settings_table', 1),
(846, '2017_02_16_230846_create_webmaster_sections_table', 1),
(847, '2017_02_16_230900_create_webmaster_banners_table', 1),
(848, '2017_02_16_231036_create_webmails_groups_table', 1),
(849, '2017_02_16_231044_create_webmails_files_table', 1),
(850, '2017_02_16_231053_create_webmails_table', 1),
(851, '2017_02_16_231114_create_topics_table', 1),
(852, '2017_02_16_231142_create_settings_table', 1),
(853, '2017_02_16_231230_create_sections_table', 1),
(854, '2017_02_16_231240_create_photos_table', 1),
(855, '2017_02_16_231248_create_menus_table', 1),
(856, '2017_02_16_231259_create_maps_table', 1),
(857, '2017_02_16_231306_create_events_table', 1),
(858, '2017_02_16_231317_create_countries_table', 1),
(859, '2017_02_16_231327_create_contacts_groups_table', 1),
(860, '2017_02_16_231339_create_contacts_table', 1),
(861, '2017_02_16_231346_create_comments_table', 1),
(862, '2017_02_16_231352_create_banners_table', 1),
(863, '2017_02_16_231359_create_analytics_visitors_table', 1),
(864, '2017_02_16_231409_create_analytics_pages_table', 1),
(865, '2017_02_28_095712_create_permissions_table', 1),
(866, '2017_03_30_033311_create_activity_log_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(2, 'faq', 'FAQ', '2017-06-14 02:55:07', '2017-06-14 02:55:07'),
(3, 'events', 'Events', '2017-06-07 08:54:02', '2017-06-07 08:54:02'),
(4, 'tags', 'Tags', '2017-06-07 08:54:02', '2017-06-07 08:54:02'),
(5, 'quiz', 'Quiz', '2017-06-07 08:54:02', '2017-06-07 08:54:02'),
(6, 'company', 'Companies', '2017-06-07 08:54:02', '2017-06-07 08:54:02'),
(7, 'emailtemplates', 'Email Templates', '2017-06-07 08:54:02', '2017-06-07 08:54:02'),
(8, 'resources', 'Resources', '2017-06-07 08:54:02', '2017-06-07 08:54:02'),
(9, 'partners', 'Partners', '2017-06-07 08:54:02', '2017-06-07 08:54:02'),
(10, 'founders', 'Founders', '2017-06-07 08:54:02', '2017-06-07 08:54:02'),
(11, 'testimonial', 'Testimonial', '2017-06-07 08:54:02', '2017-06-07 08:54:02'),
(12, 'banners', 'Banners', '2017-06-07 08:54:02', '2017-06-07 08:54:02'),
(13, 'stories', 'Stories', '2017-06-07 08:54:02', '2017-06-07 08:54:02'),
(14, 'fellowship', 'FellowShip', '2017-06-07 08:54:02', '2017-06-07 08:54:02'),
(15, 'championship', 'Champion Ship\r\n', '2017-06-07 08:54:02', '2017-06-07 08:54:02'),
(16, 'users', 'Users & Permissions', '2017-06-07 08:54:02', '2017-06-07 08:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `company_link`, `company_logo`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'HP', 'google.com', 'raty.png', 1, 1, 1, '2017-05-31 01:37:32', '2017-05-31 01:42:43'),
(2, '12121212', 'hp.com', 'srini.png', 0, 1, 1, '2017-05-31 01:43:13', '2017-05-31 02:37:13'),
(3, 'e3e3e3e3e3', '2313131231', 'srini.png', 0, 1, 0, '2017-05-31 02:37:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_status` tinyint(4) NOT NULL DEFAULT '0',
  `add_status` tinyint(4) NOT NULL DEFAULT '0',
  `edit_status` tinyint(4) NOT NULL DEFAULT '0',
  `delete_status` tinyint(4) NOT NULL DEFAULT '0',
  `analytics_status` tinyint(4) NOT NULL DEFAULT '0',
  `quiz_status` tinyint(4) NOT NULL DEFAULT '0',
  `company_status` tinyint(4) NOT NULL DEFAULT '0',
  `emailtemplate_status` tinyint(4) NOT NULL DEFAULT '0',
  `partners_status` tinyint(4) NOT NULL DEFAULT '0',
  `banners_status` tinyint(4) NOT NULL DEFAULT '0',
  `userspermissions_status` tinyint(4) NOT NULL DEFAULT '0',
  `livefeed_status` tinyint(4) NOT NULL DEFAULT '0',
  `webmaster_status` tinyint(4) NOT NULL DEFAULT '0',
  `banner_status` tinyint(4) NOT NULL DEFAULT '0',
  `event_status` tinyint(4) NOT NULL DEFAULT '0',
  `tag_status` tinyint(4) NOT NULL DEFAULT '0',
  `fundingmember_status` tinyint(4) NOT NULL DEFAULT '0',
  `newsletter_status` tinyint(4) NOT NULL DEFAULT '0',
  `permset_status` tinyint(4) NOT NULL DEFAULT '0',
  `testimonial_status` tinyint(4) NOT NULL DEFAULT '0',
  `settings_status` tinyint(4) NOT NULL DEFAULT '0',
  `activity_log` tinyint(4) NOT NULL DEFAULT '0',
  `resourcelib_status` tinyint(4) NOT NULL DEFAULT '0',
  `stories_status` tinyint(4) NOT NULL DEFAULT '0',
  `champion_status` tinyint(4) NOT NULL,
  `fellowship_status` tinyint(4) NOT NULL,
  `resourcetype_status` tinyint(4) NOT NULL DEFAULT '0',
  `data_sections` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `superAdmin_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `view_status`, `add_status`, `edit_status`, `delete_status`, `analytics_status`, `quiz_status`, `company_status`, `emailtemplate_status`, `partners_status`, `banners_status`, `userspermissions_status`, `livefeed_status`, `webmaster_status`, `banner_status`, `event_status`, `tag_status`, `fundingmember_status`, `newsletter_status`, `permset_status`, `testimonial_status`, `settings_status`, `activity_log`, `resourcelib_status`, `stories_status`, `champion_status`, `fellowship_status`, `resourcetype_status`, `data_sections`, `status`, `superAdmin_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'Super Admin', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, '', 1, 1, 1, 1, '2017-04-02 20:13:15', '2017-05-19 00:00:30'),
(5, 'Basic', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, '', 1, 0, 1, 1, '2017-05-03 22:47:54', '2017-05-25 17:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `name`, `contents`, `year`, `type`, `status`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'quiz name1', 'success added successfully    something added successfully    something added successfully    something added successfully    something added successfully    something added successfully    something added successfully    something added successfully', '2017', 0, 1, 1, 1, 1, '2017-05-31 23:32:34', '2017-06-01 00:51:38'),
(2, 'quiz name123', '1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede1234adddede12', '2018', 1, 1, 1, 1, 1, '2017-06-01 00:42:07', '2017-06-04 17:40:33'),
(3, 'some quiz 2', 'some quiz 2 some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2some quiz 2s', '2019', 0, 1, 0, 1, 0, '2017-06-04 17:40:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizanswers`
--

CREATE TABLE `quizanswers` (
  `id` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_question_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_others` int(11) NOT NULL,
  `is_none` int(11) NOT NULL,
  `answer_cat` int(11) NOT NULL,
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizanswers`
--

INSERT INTO `quizanswers` (`id`, `title`, `quiz_question_id`, `quiz_id`, `note`, `is_others`, `is_none`, `answer_cat`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'answer 1234', '1', 3, 'some answer written', 1, 0, 0, 0, 1, 1, '2017-06-04 23:17:40', '2017-06-06 00:48:17'),
(2, 'my answers', '3', 3, 'my answers', 0, 1, 1, 0, 1, 0, '2017-06-04 23:20:37', NULL),
(3, 'Answer for 1st question', '3', 3, 'Answer for 1st question', 0, 0, 2, 0, 1, 0, '2017-06-04 23:24:10', NULL),
(4, 'All new answers new added', '5', 3, 'All new answers', 1, 1, 3, 0, 1, 1, '2017-06-04 23:27:02', '2017-06-05 17:32:08'),
(5, 'All New Answers 345', '5', 3, 'All New Answers 3', 1, 1, 0, 0, 1, 1, '2017-06-05 17:13:18', '2017-06-05 17:15:01'),
(6, 'answer for quez i 3', '1', 3, 'some note', 1, 1, 1, 0, 1, 0, '2017-06-06 00:36:27', NULL),
(7, 'answer for quez i 3', '1', 3, 'some note', 1, 1, 2, 0, 1, 0, '2017-06-06 00:39:47', NULL),
(8, 'answer for quiz 35', '1', 3, 'answer for quiz 33 answer for quiz 34', 0, 1, 1, 0, 1, 1, '2017-06-06 00:49:01', '2017-06-06 00:54:31'),
(9, '123 quiz name', '4', 3, '123 quiz name', 1, 1, 3, 1, 1, 0, '2017-06-06 00:56:03', NULL),
(10, 'quiz name 123456', '4', 3, 'quiz name 123456', 1, 1, 1, 1, 1, 0, '2017-06-06 00:56:33', NULL),
(11, '545454564', '1', 3, '55454645``44556', 0, 0, 1, 0, 1, 0, '2017-06-15 18:19:32', NULL),
(12, 'fsdfdsfds', '1', 3, 'dsfdsfdsfd', 1, 1, 3, 0, 1, 0, '2017-06-15 18:19:49', NULL),
(13, 'dfsdfdsf', '1', 3, 'dsfsdfdsfds', 1, 1, 3, 0, 1, 0, '2017-06-15 18:20:09', NULL),
(14, 'dsfsdfsd', '1', 3, 'fsdfsdfdsfds', 1, 1, 3, 0, 1, 0, '2017-06-15 18:20:17', NULL),
(15, 'dfsdf', '1', 3, 'fsdfsdf', 1, 1, 3, 0, 1, 0, '2017-06-15 18:20:26', NULL),
(16, 'dsfsdfds', '1', 3, 'fsdfsdfsd', 1, 1, 2, 0, 1, 0, '2017-06-15 18:20:36', NULL),
(17, 'dsfsdf', '1', 3, 'sdfsdfsdfsd', 1, 1, 1, 0, 1, 0, '2017-06-15 18:20:45', NULL),
(18, 'sdfsdf', '1', 3, 'dsfdsfsdfsd', 1, 1, 0, 0, 1, 0, '2017-06-15 18:20:55', NULL),
(19, 'dsfsdf', '1', 3, 'sdfsdfsdfsdfsd', 1, 1, 0, 0, 1, 0, '2017-06-15 18:21:00', NULL),
(20, 'sdfsdf', '1', 3, 'sdfsdfsdfsdfds', 1, 1, 0, 0, 1, 0, '2017-06-15 18:21:04', NULL),
(21, 'wqeqwew2132131232', '1', 3, 'qeqweqwewq3123', 1, 1, 0, 0, 1, 0, '2017-06-15 18:21:27', NULL),
(22, 'w2w2w2w2w', '1', 3, '23232323', 1, 1, 1, 0, 1, 0, '2017-06-15 18:21:43', NULL),
(23, 'rtreter', '1', 3, 'tretertre', 1, 1, 2, 0, 1, 0, '2017-06-15 18:22:19', NULL),
(24, 'retretre', '3', 3, 'tretert', 1, 1, 0, 0, 1, 0, '2017-06-15 18:22:41', NULL),
(25, '-09-09-90-09', '3', 3, '09-90-09', 1, 1, 0, 0, 1, 0, '2017-06-15 18:22:54', NULL),
(26, '09-90-09', '3', 3, '-09-09p09p90p90p', 1, 1, 1, 0, 1, 0, '2017-06-15 18:23:03', NULL),
(27, '0p90p90p90p', '3', 3, '90p90p90p90p', 1, 1, 2, 0, 1, 0, '2017-06-15 18:23:12', NULL),
(28, '-09-9009p90p90', '3', 3, 'p90p90p90p90p09', 1, 1, 2, 0, 1, 0, '2017-06-15 18:23:24', NULL),
(29, '0p90p', '3', 3, '90p9009;90;0', 1, 1, 3, 0, 1, 0, '2017-06-15 18:23:35', NULL),
(30, '09-09-09-', '3', 3, '09-90-09-09-09', 1, 1, 3, 0, 1, 0, '2017-06-15 18:23:43', NULL),
(31, '980980980', '3', 3, '98089089089089', 1, 1, 3, 0, 1, 0, '2017-06-15 18:23:50', NULL),
(32, '98098098089', '3', 3, '9098098089089', 1, 1, 3, 0, 1, 0, '2017-06-15 18:23:58', NULL),
(33, '9098098098', '3', 3, '098o89o89o', 1, 1, 0, 0, 1, 0, '2017-06-15 18:24:14', NULL),
(34, '978978978978', '5', 3, '78987987978978', 1, 1, 0, 0, 1, 0, '2017-06-15 18:24:29', NULL),
(35, '987978978654 58 o5694o5698', '5', 3, '89879789', 1, 1, 0, 0, 1, 0, '2017-06-15 18:24:37', NULL),
(36, '898958765+9465784956789567856456456', '5', 3, '465', 1, 1, 0, 0, 1, 0, '2017-06-15 18:24:46', NULL),
(37, '90980909', '5', 3, '090909', 1, 1, 1, 0, 1, 0, '2017-06-15 18:24:54', NULL),
(38, '90890980', '5', 3, '98098098098', 1, 1, 1, 0, 1, 0, '2017-06-15 18:25:09', NULL),
(39, '4654659046594560945465', '5', 3, '9809098', 1, 1, 1, 0, 1, 0, '2017-06-15 18:25:21', NULL),
(40, '946549856045698456456456', '5', 3, '465', 1, 1, 2, 0, 1, 0, '2017-06-15 18:25:37', NULL),
(41, '98089089', '5', 3, 'o89o98l98l98;', 1, 1, 2, 0, 1, 0, '2017-06-15 18:25:44', NULL),
(42, '0p09;l', '5', 3, ';0;09;90;', 1, 1, 2, 0, 1, 0, '2017-06-15 18:25:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizquestions`
--

CREATE TABLE `quizquestions` (
  `id` int(10) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hint` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_cat` int(11) NOT NULL,
  `status` int(10) DEFAULT '1',
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizquestions`
--

INSERT INTO `quizquestions` (`id`, `question`, `quiz_id`, `hint`, `question_cat`, `status`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'question 123', '3', 'kooooooooooomething added', 1, 1, 0, 1, 1, '2017-06-04 19:21:00', '2017-06-04 20:18:25'),
(2, 'question 123', '3', 'ddddomething new', 1, 1, 1, 1, 0, '2017-06-04 19:23:45', NULL),
(3, 'question 456', '3', 'question456question456', 1, 1, 0, 1, 1, '2017-06-04 23:19:24', '2017-06-05 18:54:52'),
(4, 'one question for this123', '3', 'one question for this', 1, 1, 1, 1, 1, '2017-06-04 23:23:00', '2017-06-04 23:23:38'),
(5, 'All new question', '3', 'All new question', 1, 1, 0, 1, 0, '2017-06-04 23:26:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `images_array` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `one_liner` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci,
  `pdf_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topics` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `delete_status` tinyint(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `user_id`, `type`, `images_array`, `title`, `one_liner`, `contents`, `pdf_name`, `featured_image`, `tags`, `topics`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`, `delete_status`) VALUES
(1, 4, 1, 'a:3:{i:0;s:9:\"srini.png\";i:1;s:9:\"leena.png\";i:2;s:8:\"raty.png\";}', 'new reources', 'resources_summary oneline', 'resources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summaryresources_summary', 'some_pdf.pdf', 'srini.png', 'a:1:{i:0;s:1:\"1\";}', 'a:2:{i:0;s:1:\"4\";i:1;s:1:\"5\";}', 1, NULL, '2017-05-30 21:24:47', NULL, 0, 0),
(2, NULL, 0, 'a:2:{i:0;s:9:\"leena.png\";i:1;s:9:\"srini.png\";}', 'asasas', 'qqwq', 'qwqwqw', 'new_cog.pdf', 'leena.png', 'a:2:{i:0;s:1:\"6\";i:1;s:1:\"7\";}', 'a:2:{i:0;s:1:\"4\";i:1;s:1:\"5\";}', 1, NULL, '2017-05-30 19:25:23', NULL, 0, 0),
(3, NULL, 0, 'a:1:{i:0;s:32:\"verz-design-logo-small-20161.png\";}', 'fsdfsdf', 'sdfdsfsd', '<p>fsdfdsfsdf</p>', 'Inner pages mock-ups review.pdf', 'verz-design-logo-small-20161.png', 'a:1:{i:0;s:1:\"6\";}', 'a:1:{i:0;s:1:\"4\";}', 1, NULL, '2017-07-23 17:27:05', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `resources_topic`
--

CREATE TABLE `resources_topic` (
  `id` int(10) NOT NULL,
  `title` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources_topic`
--

INSERT INTO `resources_topic` (`id`, `title`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'new topic1232121212', 1, 1, 1, '2017-05-30 02:38:17', '2017-05-30 16:53:12'),
(2, 'asasasasasa', 1, 1, 0, '2017-05-30 16:54:39', NULL),
(3, 'new topic edited', 0, 1, 1, '2017-05-30 16:56:11', '2017-05-30 16:56:41'),
(4, 'old topic', 0, 1, 0, '2017-05-30 17:51:57', NULL),
(5, '1212121 topic', 0, 1, 0, '2017-05-30 17:52:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_type`
--

CREATE TABLE `role_type` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_type`
--

INSERT INTO `role_type` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 0, 1, '2017-06-07 08:57:56', '2017-06-13 18:55:24'),
(2, 'admin', 0, 1, '2017-06-07 08:57:56', '2017-06-13 20:23:15'),
(3, 'staff', 0, 0, '2017-06-07 08:57:56', '2017-06-07 08:57:56'),
(4, 'basic', 0, 0, '2017-06-07 08:57:56', '2017-06-07 08:57:56'),
(5, 'View Admin', 1, 1, '2017-06-08 17:49:00', '2017-06-08 22:58:24'),
(6, 'srinivas', 1, 1, '2017-07-03 01:44:56', '2017-07-03 19:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_type_access`
--

CREATE TABLE `role_type_access` (
  `id` int(10) NOT NULL,
  `module_id` int(10) NOT NULL,
  `view` int(10) DEFAULT '0',
  `create` int(10) DEFAULT '0',
  `edit` int(10) DEFAULT '0',
  `delete` int(10) DEFAULT '0',
  `role_type_id` int(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_type_access`
--

INSERT INTO `role_type_access` (`id`, `module_id`, `view`, `create`, `edit`, `delete`, `role_type_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(125, 2, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(126, 3, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(127, 4, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(128, 5, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(129, 6, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(130, 7, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(131, 8, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(132, 9, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(133, 10, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(134, 11, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(135, 12, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(136, 13, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(137, 14, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(138, 15, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:24', NULL),
(139, 16, 1, 1, 1, 1, 1, 1, 0, '2017-06-13 18:55:25', NULL),
(140, 6, 1, 1, 1, 1, 2, 1, 0, '2017-06-13 20:23:15', NULL),
(141, 7, 1, 1, 1, 1, 2, 1, 0, '2017-06-13 20:23:15', NULL),
(142, 12, 1, 1, 1, 1, 2, 1, 0, '2017-06-13 20:23:15', NULL),
(143, 13, 1, 1, 1, 1, 2, 1, 0, '2017-06-13 20:23:15', NULL),
(144, 14, 1, 1, 1, 1, 2, 1, 0, '2017-06-13 20:23:15', NULL),
(145, 15, 1, 1, 1, 1, 2, 1, 0, '2017-06-13 20:23:15', NULL),
(161, 2, 0, 1, 0, 0, 6, 1, 0, '2017-07-03 19:35:36', NULL),
(162, 3, 0, 0, 0, 0, 6, 1, 0, '2017-07-03 19:35:36', NULL),
(163, 4, 1, 1, 1, 1, 6, 1, 0, '2017-07-03 19:35:36', NULL),
(164, 5, 1, 1, 1, 1, 6, 1, 0, '2017-07-03 19:35:36', NULL),
(165, 6, 1, 1, 1, 1, 6, 1, 0, '2017-07-03 19:35:36', NULL),
(166, 7, 1, 1, 1, 1, 6, 1, 0, '2017-07-03 19:35:36', NULL),
(167, 8, 1, 1, 1, 1, 6, 1, 0, '2017-07-03 19:35:36', NULL),
(168, 9, 1, 1, 1, 1, 6, 1, 0, '2017-07-03 19:35:36', NULL),
(169, 10, 0, 1, 1, 1, 6, 1, 0, '2017-07-03 19:35:36', NULL),
(170, 11, 1, 1, 1, 1, 6, 1, 0, '2017-07-03 19:35:36', NULL),
(171, 12, 1, 1, 1, 1, 6, 1, 0, '2017-07-03 19:35:36', NULL),
(172, 13, 1, 1, 0, 1, 6, 1, 0, '2017-07-03 19:35:36', NULL),
(173, 14, 1, 1, 1, 1, 6, 1, 0, '2017-07-03 19:35:37', NULL),
(174, 15, 1, 1, 1, 1, 6, 1, 0, '2017-07-03 19:35:37', NULL),
(175, 16, 0, 1, 0, 1, 6, 1, 0, '2017-07-03 19:35:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_desc_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_desc_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_keywords_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_keywords_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_webmails` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notify_messages_status` tinyint(4) DEFAULT NULL,
  `notify_comments_status` tinyint(4) DEFAULT NULL,
  `notify_orders_status` tinyint(4) DEFAULT NULL,
  `site_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_status` tinyint(4) NOT NULL,
  `close_msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link5` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link6` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link7` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link8` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link9` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link10` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t1_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t1_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t5` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t6` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t7_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t7_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `style_logo_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_logo_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_fav` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_apple` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_color1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_color2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_type` tinyint(4) DEFAULT NULL,
  `style_bg_type` tinyint(4) DEFAULT NULL,
  `style_bg_pattern` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_bg_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_bg_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_subscribe` tinyint(4) DEFAULT NULL,
  `style_footer` tinyint(4) DEFAULT NULL,
  `style_footer_bg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_preload` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title_ar`, `site_title_en`, `site_desc_ar`, `site_desc_en`, `site_keywords_ar`, `site_keywords_en`, `site_webmails`, `notify_messages_status`, `notify_comments_status`, `notify_orders_status`, `site_url`, `site_status`, `close_msg`, `social_link1`, `social_link2`, `social_link3`, `social_link4`, `social_link5`, `social_link6`, `social_link7`, `social_link8`, `social_link9`, `social_link10`, `contact_t1_ar`, `contact_t1_en`, `contact_t3`, `contact_t4`, `contact_t5`, `contact_t6`, `contact_t7_ar`, `contact_t7_en`, `style_logo_ar`, `style_logo_en`, `style_fav`, `style_apple`, `style_color1`, `style_color2`, `style_type`, `style_bg_type`, `style_bg_pattern`, `style_bg_color`, `style_bg_image`, `style_subscribe`, `style_footer`, `style_footer_bg`, `style_preload`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '', 'Company of Good', '', 'Website description and some little information about it', '', 'key, words, website, web', 'info@nvpc.com', 0, 0, 0, 'http://localhost:8000', 1, 'Website under maintenance \n<h1>Comming SOON</h1>', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '', 'Building, Street name, City, Country', '+(00) 0123456789', '+(00) 0123456789', '+(00) 0123456789', 'info@nvpc.com', '', 'Sunday to Thursday 08:00 AM to 05:00 PM', '14888091199919.png', '14918036507131.png', '14888091191764.png', '14888091198179.png', '#3494c8', '#2e3e4e', 0, 0, NULL, '#2e3e4e', NULL, 0, 1, NULL, 0, 1, 1, '2017-03-06 11:06:23', '2017-04-10 01:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `story_by` int(11) NOT NULL,
  `images_array` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topics` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `delete_status` tinyint(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `user_id`, `story_by`, `images_array`, `title`, `contents`, `featured_image`, `tags`, `topics`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`, `delete_status`) VALUES
(1, 4, 1, 'a:3:{i:0;s:9:\"srini.png\";i:1;s:9:\"leena.png\";i:2;s:8:\"raty.png\";}', 'some new story edited', 'new some new storysome new storysome new storysome new storysome new storysome new storysome new storysome new storysome new storysome new story', 'srini.png', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}', 'a:1:{i:0;s:1:\"4\";}', 1, 1, '2017-05-31 19:14:14', '2017-05-31 19:24:30', 0, 1),
(2, NULL, 4, 'a:1:{i:0;s:8:\"logo.png\";}', 'ererere', 'asasas', 'logo.png', 'a:1:{i:0;s:1:\"9\";}', 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}', 1, 1, '2017-06-09 01:07:20', '2017-06-09 01:07:32', 0, 0),
(3, NULL, 4, 'a:1:{i:0;s:12:\"download.jpg\";}', 'dfgfdgdfgf', 'fgdfg', 'download.jpg', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"6\";}', 'a:1:{i:0;s:1:\"3\";}', 1, NULL, '2017-07-14 00:55:14', NULL, 0, 0),
(4, NULL, 1, 'a:2:{i:0;s:78:\"Singtel_Learning@Singtel_Career&Development_EducationSponsorshipProgrammes.jpg\";i:1;s:63:\"Singtel_Learning@Singtel_Leadership_Performance&Development.jpg\";}', 'tinymce', '<p><img src=\"/laravel-filemanager/photos/1/Singtel_HRClick_0717.jpg\" alt=\"\" width=\"665\" height=\"716\" /></p>\r\n<p>&nbsp;</p>\r\n<p>hiiii srini bold <strong>texttstdsdsdsds</strong></p>', 'Singtel_Learning@Singtel_Career&Development_EducationSponsorshipProgrammes.jpg', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:1:\"3\";}', 1, NULL, '2017-07-19 19:40:01', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stories_topic`
--

CREATE TABLE `stories_topic` (
  `id` int(10) NOT NULL,
  `title` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stories_topic`
--

INSERT INTO `stories_topic` (`id`, `title`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'new story topic123', 1, 1, 1, '2017-05-31 18:39:08', '2017-05-31 18:39:36'),
(2, 'sdsdsdsdsds', 0, 1, 0, '2017-05-31 18:40:11', NULL),
(3, 'sdsdqweqweqweqw', 0, 1, 0, '2017-05-31 18:41:49', NULL),
(4, 'sdsdsdsdsd', 0, 1, 0, '2017-05-31 18:43:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `user_id`, `email`, `created_by`, `created_at`) VALUES
(1, 295, 'contactus@adeleduxton.com', 1, '2017-06-11 16:00:00'),
(2, NULL, 'srini@gmail.com', 1, NULL),
(3, 296, 'srini@fmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) DEFAULT '1',
  `events_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `stories_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `status`, `events_id`, `resource_id`, `stories_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Investment', 1, 6, NULL, NULL, 1, 0, '2017-05-25 23:01:41', NULL),
(2, 'interest123', 0, NULL, NULL, NULL, 1, 1, '2017-05-25 23:01:41', '2017-05-25 23:04:35'),
(6, 'control', 1, 12, NULL, NULL, 1, 0, '2017-05-25 23:32:27', NULL),
(7, 'arts', 1, 11, NULL, NULL, 1, 0, '2017-05-25 23:32:27', NULL),
(9, 'general', 1, NULL, NULL, NULL, 1, 0, '2017-06-01 18:20:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_id` int(11) NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci,
  `code` text COLLATE utf8mb4_unicode_ci,
  `file_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` tinyint(4) DEFAULT NULL,
  `youtube_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `visits` int(11) NOT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `section_id`, `title_en`, `details_en`, `code`, `file_ar`, `file_en`, `video_type`, `youtube_link`, `link_url`, `icon`, `status`, `visits`, `row_no`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Welcome Email', 'Put text here', NULL, '14888109018814.jpg', '14918092352645.jpg', NULL, NULL, '#', NULL, 1, 0, 3, 1, 1, '2017-03-06 11:06:24', '2017-04-09 23:28:46'),
(2, 2, 'Forgot Password', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL, '14888112232028.jpg', '14918151593896.jpg', NULL, NULL, 'http://www.yahoo.com', NULL, 1, 0, 2, 1, 1, '2017-03-06 11:06:24', '2017-04-10 01:06:51'),
(3, 3, 'Event Registration', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL, '', '', NULL, NULL, '#', 'NULL', 1, 0, 1, 1, NULL, '2017-03-06 11:06:24', '2017-03-07 18:27:19'),
(4, 4, 'Completed quiz', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL, '', '', NULL, NULL, '#', 'NULL', 1, 0, 2, 1, NULL, '2017-03-06 11:06:24', '2017-03-07 18:27:19'),
(5, 5, 'Champion Registration', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL, '', '', NULL, NULL, '#', 'NULL', 1, 0, 3, 1, NULL, '2017-03-06 11:06:24', '2017-03-07 18:27:19'),
(6, 6, 'Auto Reply', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL, '', '', NULL, NULL, '#', 'NULL', 1, 0, 4, 1, NULL, '2017-03-06 11:06:24', '2017-03-07 18:27:19'),
(8, 7, 'Newsletter Subscription', NULL, NULL, '14888184555359.png', '14888184559632.png', NULL, NULL, '#', NULL, 1, 0, 5, 1, 1, '2017-03-06 14:25:52', '2017-03-07 18:27:19'),
(9, 8, 'Reminer', NULL, NULL, '14888184555359.png', '14888184559632.png', NULL, NULL, '#', NULL, 1, 0, 5, 1, 1, '2017-03-06 14:25:52', '2017-03-07 18:27:19'),
(10, 9, 'Invitation to CSR', NULL, NULL, '14888184555359.png', '14888184559632.png', NULL, NULL, '#', NULL, 1, 0, 5, 1, 1, '2017-03-06 14:25:52', '2017-03-07 18:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `contents`, `company_link`, `company_logo`, `video_link`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'asasas', 'sasas', 'asasa', 'srini.png', 'asasasasas', 1, 1, 0, '2017-05-30 23:36:00', NULL),
(2, '232323', '123123123', '13123123', 'srini.png', 'yahoo.com', 0, 1, 1, '2017-05-30 23:37:48', '2017-05-30 23:59:28'),
(3, '2w1w12w2', 'w2w2w2w2', 'w2w12', 'raty.png', '2w2w2w2w.com', 0, 1, 0, '2017-05-30 23:38:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userType` tinyint(4) DEFAULT '0',
  `permissions_id` int(11) DEFAULT NULL,
  `role_type_id` int(11) NOT NULL,
  `subscribed` int(4) NOT NULL DEFAULT '0',
  `quiz_rep` tinyint(5) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `csr` int(11) NOT NULL DEFAULT '0',
  `connect_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connect_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `super` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company`, `name`, `email`, `password`, `userType`, `permissions_id`, `role_type_id`, `subscribed`, `quiz_rep`, `status`, `csr`, `connect_email`, `connect_password`, `remember_token`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `super`) VALUES
(1, '2', 'Jessica123', 'admin@site.com', '$2y$10$1iuRKoAblI9LZJM0er0DMOmc1NA8CnmqUDW/vZ2xcityI.A4dm37i', 2, 4, 1, 0, 1, 1, 1, NULL, NULL, 'JSRf026moKqdTUKwuyi5xCQQuGqGK6Jldxx7QbngJ4n5exSRCG8MJ7hPNr2a', 0, 1, 1, '2017-03-06 11:06:23', '2017-07-20 23:51:44', 1),
(4, '2', 'Mary4', 'mary@site.com', '$2y$10$FlqHL2JHUWeX8u9f22gzxeWe79TH3Csbh2ToS3bmJFH2bYQ2NyFjG', 1, 5, 3, 0, 0, 1, 0, NULL, NULL, 'fRxNvRrEl1opNyB9cjxIO902gEIqhzbn5e3YgrNnB5eo6THjQqSk4JmA4iUU', 0, 1, 1, '2017-05-03 22:55:29', '2017-07-20 23:51:44', 0),
(5, '1', 'Super Admin', 'bediyan@vsc.com.sg', '$2y$10$od5p.Q.nMiiZmQWeZckYP.j74oaxjLP5..I/O0mii9zdq355r0hdO', 0, 5, 3, 0, 1, 1, 0, NULL, NULL, 'nWKNzHBvm7tsnShGoH0Jw9metbDUK3EjHx0OIYuIOdWU5AnsHhOwEKDITDhm', 0, 1, 1, NULL, '2017-07-20 23:51:44', 0),
(6, '1', 'VSC Admin', 'project@vsapac.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 1, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(7, '1', 'NVPC Super Admin', 'contact@companyofgood.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-20 23:51:44', 0),
(8, '1', 'CHAN GUO XIONG', 'mummyyummy21@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 1, 1, 1, NULL, '2017-07-20 23:51:44', 0),
(9, '1', 'Quek Shiyun', 'shiyunquek@nvpc.org.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-20 23:51:44', 0),
(10, '1', 'Galvin Tay', 'galvintay@nvpc.org.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-20 23:51:44', 0),
(11, '1', 'Ong Siew Mei', 'ongsiewmei@fareast.com.sg', '', 0, 5, 3, 0, 0, 1, 1, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-20 23:51:44', 0),
(12, '1', 'Theodore Pang', 'theodore.pang.jx@tractors.simedarby.com.sg', '', 0, 5, 3, 0, 0, 1, 1, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-20 23:51:44', 0),
(13, '1', 'Melissa Kwee', 'melissa@nvpc.org.sg', '', 0, 5, 3, 0, 0, 1, 1, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-20 23:51:44', 0),
(14, '1', 'Caroline Barlerin', 'cbarlerin@twitter.com', '', 0, 5, 3, 0, 0, 1, 1, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(15, '1', 'Claire Louise Lynch', 'clairelouise.lynch@lendlease.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(16, '1', 'Ryan Ng', 'ryan@societystaples.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(17, '1', 'Audrey Lee', 'audrey.sylee@RWSentosa.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(18, '1', 'Gina Ho', 'hoslg@sg.ibm.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(19, '1', 'Chloe', 'chloe@liontrust.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(20, '1', 'Tan Yingzhi Elizabeth', 'yingzhi@singaporepower.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(21, '1', 'Aseem K Thakur', 'aseem@givola.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(22, '1', 'Community Foundation of Singapore', 'contactus@cf.org.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(23, '1', 'Luciana', 'lluciana@ups.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(24, '1', 'Cindy Koh', 'cindy.koh@barclays.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(25, '1', 'Melissa Lou', 'melissa@delegate.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(26, '1', 'Angeline You', 'angeline.ch.you@sg.pwc.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(27, '1', 'Geraldine Lim', 'geraldine.lim@sc.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(28, '1', 'Zhennan Low', 'zhennan.low@sjlowbros.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(29, '1', 'YVONNE TANG', 'ytang@comfortdelgro.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(30, '1', 'Kathy', 'kathy.chiam@teeintl.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(31, '1', 'Sunny Tham', 'sunny@kuiddle.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(32, '1', 'Loh Wai Yee', 'wai-yee.loh@hp.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(33, '1', 'Luo Zhe (Renee)', 'zhe.luo@merck.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(34, '1', 'Lilian Chong', 'rene.yapbp@uobgroup.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(35, '1', 'Audrey Chin', 'audrey.chin@fullertonhealth.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(36, '1', 'Susan Chong', 'eco@greenpac.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(37, '1', 'Vernice Chua', 'vernice@activistebrands.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(38, '1', 'Roger Chua', 'chua.roger@sunmoonfood.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(39, '1', 'Saranta', 'saranta@theworkingcapitol.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(40, '1', 'Annie', 'annie.yeo@db.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(41, '1', 'Tan Poh Lay', 'tan.pohlay@uol.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(42, '1', 'Robin Pho', 'robinpho@poncoss.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(43, '1', 'Shiao-yin', 'Yin@thethoughtcollective.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(45, '1', 'Maysie Co', 'maysie.co@bilsteingroup.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(46, '1', 'Jaylyn Tey', 'jaylyn.tey@pacificlight.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(47, '1', 'Christian Bustamante', 'cbustamante@has.hitachi.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(48, '1', 'Lim Wern Li', 'wernli.lim@thomsonreuters.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(49, '1', 'Sharon Eng', 'sharoneng@maybank.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(50, '1', 'Joanna Tan', 'jotan@scor.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(51, '1', 'Charles Gothong', 'Ctgothong@gothong.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(52, '1', 'Kamsani', 'kamsani@harum.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(53, '1', 'Paul Dunn', 'paul@b1g1.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(54, '1', 'Edwin Lim Wee Choon', 'edwinlim@hci.edu.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(55, '1', 'Henry Tan', 'henrytan@nexiats.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(56, '1', 'Wan Chin Khoh', 'wanchin@creamier.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(57, '1', 'Deen', 'deen@archipelagoventures.co', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(58, '1', 'Martin Shong', 'enquiry@sungprojects.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(59, '1', 'Chan Siok Bin', 'chan.siokbin@capitaland.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(60, '1', 'Marcus Tay', 'Marcus.tay@ikano.asia', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(61, '1', 'Imelda Ho', 'imelda@icon-plus.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(62, '1', 'd', 'e@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(63, '1', 'Christian Rahnsch', 'chris@bigheroes.org.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(64, '1', 'Joyce Siew', 'Joyce.siew@marinabaysands.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(65, '1', 'Shyn Quek', 'shynqueks@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(66, '1', 'Pedro Aguirre', 'pedro@makethechange.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(67, '1', 'Lim Feng Ling', 'fengling.lim@quantedge.org', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(68, '1', 'Leong Huey Min', 'hueymin.leong@breadtalk.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(69, '1', 'Angela Lim', 'angela@acalliz.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(70, '1', 'Madhu verma', 'Madhu@sochinaction.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(71, '1', 'Ang Kian Peng', 'ang.kp@samsui.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(72, '1', 'Lawrence Patrick', 'lawrence@imc.jhmi.edu', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(73, '1', 'Erik Lee', 'alnexfood@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(74, '1', 'Suan', 'hweesuanong@yahoo.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(75, '1', 'Winnie Qiu', 'WQIU@ARINC.COM', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(76, '1', 'Henry Ang', 'henryang@nipponpaint.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(77, '1', 'Subbaraju Alluri', 'raju@grey.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(78, '1', 'Toh Poh Suan', 'tohpohsuan88@yahoo.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(79, '1', 'Bee Yan', 'beeyantan@nvpc.org.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(80, '1', 'Dharani Kumar', 'dharanik@qti.qualcomm.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(81, '1', 'Thomas Chiam', 'Chiam168@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(82, '1', 'Ian Lim', 'ian.lim@tsmp.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(83, '1', 'Jenny Teo', 'Jenny@banleong.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(84, '1', 'Eileen Lee', 'eileen.lee@mapletree.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(85, '1', 'Alicia Ng', 'ang23@ra.rockwell.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(86, '1', 'Carolyn Goh', 'carolyn@pandnholdings.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(87, '1', 'Francis Woo', 'Francis.Woo@anz.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(88, '1', 'Joyce Lee', 'tianjoyce.lee@infineon.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(89, '1', 'Hsin-Ee Chia', 'hsinee.chia@edis.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(90, '1', 'Cheryl Chen', 'cheryl.shulian.chen@citi.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(91, '1', 'Tay Kok Chin', 'Kokchin.tay@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(92, '1', 'Ken Chia', 'ken@modetti.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(93, '1', 'Sheryll Poh', 'Sheryll.poh@marsh.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(94, '1', 'Lewis', 'lewis.liu@sequoia.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(95, '1', 'Anthony Caravello', 'anthony@beanidea.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(96, '1', 'Gwendolyn Loh', 'gwendolyn.loh@sembcorp.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(97, '1', 'PAMELA PEH YI NING', 'pamela@changecs.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(98, '1', 'Joshua', 'joshua.li@epcos.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(99, '1', 'Lewis Moh', 'lewis.moh@allisonpr.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(100, '1', 'Usman Akhtar', 'usman.akhtar@bain.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(101, '1', 'OM PRAKASH MUNISAMY', 'prakash@sumtwo.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(102, '1', 'Joy Wong', 'joywong@nvpc.org.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(103, '1', 'Seet King Hwee', 'finance@krtc.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(104, '1', 'Kalrin', 'Spuah@paypal.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(105, '1', 'Heather Chua', 'heather_chua@sg.mufg.jp', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(106, '1', 'Earl Tan', 'earl.tan@accenture.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(107, '1', 'Mac Ling', 'mac.ling@lta-company.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(108, '1', 'Sylvia Low', 'sylvia.low@hilton.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(109, '1', 'raymond khoo', 'raykhoo22@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(110, '1', 'Hwai Lin Khor', 'HwaiLin.khor@infineon.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(111, '1', 'Christine Toguchi', 'chris@macrovisionnetwork.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(112, '1', 'Grace', 'moispace@hotmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(113, '1', 'Carin Looi', 'carin.looi@rcma.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(114, '1', 'Usha Pillai ', 'usha.pillai@credit-suisse.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(115, '1', 'Martina Mettgenberg', 'martina@avpn.asia', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(116, '1', 'Allison Hollowell', 'allison@avpn.asia', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(117, '1', 'Lena Han', 'lena.han@ascendas-singbridge.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(118, '1', 'Karen Wong', 'karen.ty.wong@exxonmobil.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(119, '1', 'Raena Aihara Cheong', 'raenaaihara.cheong@nike.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(120, '1', 'Corporate Communications & CSR', 'sphcorp@sph.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(121, '1', 'Yuki Ghantous', 'yuki.ghantous@riotinto.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(122, '1', 'Joyce Poh', 'joyce.poh@sg.ddb.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(123, '1', 'Gwyn', '121340u@student.hci.edu.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(124, '1', 'Faye Hugo', 'faye.hugo@haworth.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(125, '1', 'Wendy Lai', 'wendy.ly.lai@starhub.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(126, '1', 'Yohesh', 'yohesh1999@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(127, '1', 'Mktg2', 'mktg2@yms.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(128, '1', 'Chia Boon Chong', 'boonchong@singtel.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(129, '1', 'Shu Xin', 'shuxin.pang@mothercare.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(130, '1', 'Sheer Mohamed Farid Angullia', 'sheer.hufc@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(131, '1', 'Rina Lim', 'rina@quirk.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(132, '1', 'NVPC COG Administrator', 'corporate@nvpc.org.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(133, '1', 'Terence Kek', 'terence.kek@asm.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(134, '1', 'Nicholas Goh', 'nicholas.goh@verztec.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(135, '1', 'Joseph Foo', 'josephfoo@jason.co.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(136, '1', 'Sasha Lim', 'evp@riotinto.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(137, '1', 'Joanne Tan', 'joannetan@ageingasia.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(138, '1', 'Grace', 'grace@scal.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(139, '1', 'Lena teo', 'Lena@eastmarine.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(140, '1', 'Bernard Lim', 'Bhlim@taisin.comsg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(141, '1', 'Poh khim hong', 'khimhong@ptclogistics.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(142, '1', 'Ronald Lim', 'ronald.lim@samwoh.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(143, '1', 'Anthea Ong', 'anthea@hushteabar.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(144, '1', 'Grace Teo', 'contact@manor.asia', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(145, '1', 'Isaac', 'isaackyleferdaus.ahmad@barclays.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(146, '1', 'ng choon jin', 'choonjin.ng@logoslearning.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(147, '1', 'Sally Teo', 'sally.teo@8investment.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(148, '1', 'Eric Goh', 'eric.goh@edgevantage.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(149, '1', 'Selena Chong', 'selena@singpost.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(150, '1', 'Amanda Teh', 'worldcaffe0803@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(151, '1', 'Arian Hassani (Tisserand)', 'arian.hassani@jpmorgan.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(152, '1', 'Edward', 'edward.liauw@jti.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(153, '1', 'Hannah Winfrey', 'hannah_winfrey11@hotmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(154, '1', 'Eileen Chua', 'eileen.chua@colliers.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(155, '1', 'Betsy Leong', 'betsy.leong@ngahr.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(156, '1', 'Mah Lay Choon', 'mahlaychoon@gic.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(157, '1', 'Alvin Yapp', 'alvin@busads.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(158, '1', 'Masami Bell', 'masami@cxagroup.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(159, '1', 'Leah Goh', 'Leahgohel@crimsonlogic.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(160, '1', 'Thio Chin Wui', 'Chin-Wui.Thio@shell.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(161, '1', 'Wee Carolyn', 'carolyn_wee@ite.edu.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(162, '1', 'Angelinena Song', 'angelinena.song@sg.yusen-logistics.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(163, '1', 'Kai Li', 'kaili_fu@hyflux.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(164, '1', 'Joyce Tham', 'joyce.tham@nice.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(165, '1', 'Steven Chin', 'steven.chin@vdomainhost.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(166, '1', 'Deng Boyuan', '1998dbyctw@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(167, '1', 'Haikel Aziz', 'haikel.aziz@oppo.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(168, '1', 'B', 'B@a.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(169, '1', 'Damian Sim', 'damian@ldr.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(170, '1', 'Cynthia Chia', 'cynthia.chia@bsci.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(171, '1', 'Pratibha Kurnool', 'pratibha.kurnool@cognizant.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(172, '1', 'Michell Soh', 'michell.soh@diageo.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(173, '1', 'Derek Wong', 'Derek@inknpixel.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(174, '1', 'Joanne Loh', 'jloh@aimsampcapital.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(175, '1', 'Fion Ng Siew Chin', 'fion@pacifictech.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(176, '1', 'Ng Hui Cheng Dorothy', 'dorothy.ng@swire.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(177, '1', 'Michelle Lee', 'michelle.lee@cummins.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(178, '1', 'Farand Ngoh', 'communications.sg@sg.abb.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(179, '1', 'Cherie Ang', 'sgsin@cargo-partner.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(180, '1', 'Emelyn Gaitan Redano', 'emelyngaitan.redano@edmi-meters.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(181, '1', 'Michelle Ng', 'Michelle@iwadesign.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(182, '1', 'Selene Liu', 'selene.liu@pontiacland.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(183, '1', 'Samantha Wong', 'samantha.wong@nirvana.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(184, '1', 'Emma Toh', 'emma.toh@bossini.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(185, '1', 'Rigmor Berthier', 'rberthier@lime-agency.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(186, '1', 'Noor Irdawaty Bte Jammarudin', 'noor.irdawaty@cpgfm.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(187, '1', 'Charmaine Lee', 'charmaine@skycrm.asia', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(188, '1', 'Charmaine Lee', 'char.lee@thegooddesigners.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(189, '1', 'Marie Li', 'meijli@deloitte.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(190, '1', 'Karen Aw', 'karen_aw@sg.msig-asia.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(191, '1', 'Tay Siow Chien', 'taysiowchien@sgpoolz.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(192, '1', 'Clarissa Wang', 'clwang@heidrick.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(193, '1', 'Sharin Yong', 'sharin.yong@horizon-singapore.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(194, '1', 'Nik', 'palnikhil06@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(195, '1', 'Charlene Poon', 'charlenepoon@courts.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(196, '1', 'Roshith RAJAN', 'roshith.rajan@sodexo.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(197, '1', 'Clara Wong', 'clara.wong@ascendas-singbridge.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(198, '1', 'Melissa Chia', 'melissa.chia@tcs.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(199, '1', 'Isaiah Chng', 'isaiah@proage.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(200, '1', 'Tan Chin Chin', 'chin@gooodpetcollars.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(201, '1', 'Sharon Wong', 'sharon@motherswork.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(202, '1', 'Priscillia Lai', 'lchuili@dso.org.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(203, '1', 'Daniel Chen', 'danielchen@nexiats.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(204, '1', 'Michelle Goh', 'michelle.goh@danone.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(205, '1', 'Shuo Yan', 'shuoyan.tan@grab.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(206, '1', 'Isabella Chia', 'Chiagn@ocbc.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(207, '1', 'Soh Pey Pey', 'peypey@trumarine.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(208, '1', 'Yen Siow', 'yen@d-w-b.org', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(209, '1', 'Komala Murugiah', 'komalamurugiah@alphadevelopment.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(210, '1', 'Louisa Daly', 'louisa.daly@pontiacland.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(211, '1', 'Chandra Thanabalan', 'cbalan@inclusiontherapy.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(212, '1', 'Martina Daniel', 'daniel.m.1@pg.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(213, '1', 'Chng Chu Lan', 'chngchulan@weehur.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(214, '1', 'Joginder Kaur', 'jo@steelwood.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(215, '1', 'Kevin Thio', 'kevin@yellowoctopus.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(216, '1', 'Bee L. Ng', 'bee.ng@hella.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(217, '1', 'Ivan Tan', 'ivan.tan@hp.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(218, '1', 'Wilfred Tan', 'wilfredt@vmware.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(219, '1', 'Pauline Lam', 'paulinelam@mediacorp.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(220, '1', 'Philip Chua', 'chuap@garena.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(221, '1', 'Isabel Tan', 'isabel@re-blossom.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(222, '1', 'Annabel Tan', 'annabel.t@miceglobal.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(223, '1', 'Serene Wai', 'serene.wai@hawksford.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(224, '1', 'Sheryl Lau', 'lau.sheryl@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(225, '1', 'Chandran Nair', 'chandran@singex.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(226, '1', 'Joy Wong', 'roxyrecords1962@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(227, '1', 'Ervinna Ong, DOHR', 'ervinna.ong@capellahotels.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(228, '1', 'Andy Chan', 'andychan@pcg.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(229, '1', 'Ng Kee Wee', 'keewee_ng@jabil.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(230, '1', 'Nozomi Yamaguchi', 'nozomi.yamaguchi@sg.pigeon.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(231, '1', 'Sagar Baldwa', 'baldwasagar@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(232, '1', 'Geraldine Chua', 'geraldine.chua@isca.org.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(233, '1', 'Ng Li Tying', 'litying@naiise.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(234, '1', 'Avnish Desai', 'avnish@trdcom.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(235, '1', 'Wong Shuk Leng', 'shuklengwong@select.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(236, '1', 'Loo', 'theupcyclingfactory@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(237, '1', 'Grace Chua', 'gracec@uber.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(238, '1', 'Lee Chien Herr', 'melnchien@owlreaders.club', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(239, '1', 'Germaine', 'germaine.chua@euyansang.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(240, '1', 'Ivy Choo', 'ivy.choo@changiairport.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(241, '1', 'Jack Yu', 'Info@goshenartgallery.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(242, '1', 'Terence Lim', 'terence@aggro.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(243, '1', 'Suhanah Alwi', 'suhanah_alwi@nuhs.edu.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(244, '1', 'Charmaine Wai', 'charmaine.wai@essilor.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(245, '1', 'Diana Neo', 'diananeo@citygas.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(246, '1', 'Corey Kor', 'coreykor@ricoh.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(247, '1', 'Jeffrey Sim', 'sjeffrey@globalpsa.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(248, '1', 'Ken Cheng (Ms)', 'ken.cheng@khind.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(249, '1', 'Mirza', 'vincent@dminormusic.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(250, '1', 'Nicholas Syn', 'nicksyn@italauto.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(251, '1', 'Yu-Siang Chieng', 'Yu-Siang.Chieng@schneider-electric.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(252, '1', 'Sandee Goh', 'sandee.goh@hyatt.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(253, '1', 'Lynn Lim', 'lynn@lqueen.fr', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(254, '1', 'Mandy Lee', 'mandy@lifeline.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(255, '1', 'Steven Yeah', 'steven@valuemax.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(256, '1', 'Paul Tan', 'tanpaul@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(257, '1', 'Jackson Tan K L', 'PerfectSTORM.Services@Gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(258, '1', 'Claire Au', 'claire@skinbalance.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(259, '1', 'test', 'test@sg.ibm.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(260, '1', 'William Wan', 'william_wan@kindness.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(261, '1', 'Edwin Ng', 'edwinng@markono.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(262, '1', 'Brina', 'Brinaho@hnt.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(263, '1', 'Tan Rui Qing', 'Ruiqing@cassg.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(264, '1', 'Tan Kon Yew', 'konyewtan@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(265, '1', 'Anita', 'anitaye@allianzecs.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(266, '1', 'Germaine Lye', 'germaine.lye@essilor.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(267, '1', 'ESTHER TAN', 'esther@landex.asia', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(268, '1', 'tet1', 'test@test.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(269, '1', 'jason', 'jasonchong@firstcom.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(270, '1', 'Zhengyang', 'zenith@delegance.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(271, '1', 'Tess Cao', 'tess@verzdesign.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(272, '1', 'Lilian Poh', 'marketing@parkwaycollege.edu.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(273, '1', 'Ben Boeglin', 'ben.boeglin@kali-majapahit.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(274, '1', 'Ryan White', 'paisijian@firstcom.asia', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(275, '1', 'Tan Teck Kuan', 'teckkuan@thenextchapterfilm.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(276, '1', 'Shann', 'shannlim@scintillastudio.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(277, '1', 'Lee Li Jen', 'lijen.lee@fhf.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(278, '1', 'jason 2', 'jasonchong2@firstcom.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(279, '1', 'Chris', 'chrislow@firstcom.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(280, '1', 'Liu Shasha', 'liushasha@cnqc.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(281, '1', 'Tan', 'contact@tba.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(282, '1', 'Mark Lee', 'mark.lee@wmhlaw.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(283, '1', 'Catherine Chai', 'catherine@broc.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(284, '1', 'Mandy', 'puretabby@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(285, '1', 'Ong Hui Ming', 'huiming@econhealthcare.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(286, '1', 'Michelle Tay', 'michelle@netccentric.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(287, '1', 'Gregory Tay', 'gregorytay@smrt.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(288, '1', 'Vanessa', 'vanessa.ng@samsung.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(289, '1', 'Aina Zulkarnain', 'makanstate@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(290, '1', 'Phoebe Fong', 'phoebe.fong@sgp.fujixerox.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(291, '1', 'Andrew Khoo', 'andrewkhoo@abr.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(292, '1', 'Ong Ya-Yi', 'yayiong@hsbc.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(293, '1', 'Serene Cheong', 'serene.cheong@acuutech.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(294, '1', 'Ong Chee Siong', 'cheesiong.ong@fngroup.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(295, '1', 'Adeline Tan', 'contactus@adeleduxton.com', '$2y$10$yBWfkVVhu4mTxBTfFrZcAeZz0sqfT6BsndMffVTPoMFQKA462DxGq', 0, 5, 3, 1, 0, 1, 0, NULL, NULL, 'ESkYoUt5nTCiXZp4aykYxwY57ZC4umsQr0uT5nmek9bkg8s9rp0oMYTllJOs', 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(296, '1', 'Lee Choon Hong', 'support@amedelumiere.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(297, '1', 'Winnie', 'winnie@anticsatplay.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(298, '1', 'Nate Low', 'chlow@visa.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(299, '1', 'Pearlyn', 'pearlyn.ascent@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(300, '1', 'Desiree', 'desiree_wong@jabil.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(301, '1', 'Debbie Lo', 'Debbie.Lo@cartus.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(302, '1', 'Eugene Pang', 'eugene.pang@facilitylink.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(303, '1', 'Raymond Peter Francis', 'Raymond.p.francis@gsk.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(304, '1', 'Nicholas Ng', 'nicholas@foodxervices.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(305, '1', 'Rathika Shamugham', 'rathika.s@income.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(306, '1', 'cathy chia', 'cathy.chia@fullerton-heritage.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(307, '1', 'Joshua Gan', 'joshuagan@dbs.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(308, '1', 'Irin', 'irin.ng@comohotels.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(309, '1', 'Tay Jia Wei', 'jiawei.tay@kepcorp.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(310, '2', 'Adam123', 'adam.tham@expressmelody.com', '$2y$10$IEniCZ4q3jOuR2mCGkWH2eLuQ13K7BvRSM9Kbh/RYP0N4OckQ9LR.', 1, 4, 3, 0, 0, 0, 0, NULL, NULL, '3b0JcVfGVhiB4CqSPyHtb0cp4W9S7RjKSphObOddqlZz8DQuarRUygOYEB7P', 0, 1, 1, NULL, '2017-07-05 22:35:08', 0),
(311, '1', 'Julie Lee', 'juliealessandralee@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(312, '1', 'Ng Bao Qi', 'bqng@fossil.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(313, '1', 'Lim Kong Wee', 'kongwee@forthavens.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(314, '1', 'Kimberly Norman', 'kimberly.norman@dlapiper.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(315, '1', 'Khee Shihui', 'skhee@kpmg.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(316, '1', 'Felicia Koh', 'felicia@gallery278.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(317, '1', 'Magali CROESE', 'm.croese@arkadin.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(318, '1', 'Nikhil Pal', 'nikhil_pal@jabil.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(319, '1', 'Sulina Tsai', 'sulinatsai@lamsoon.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(320, '1', 'Andy Lim', 'andy.lim@oceanifm.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(321, '1', 'Pansy Lian', 'pansy.lian@medtronic.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(322, '1', 'Charles Tan', 'charles@maplelifestyle.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(323, '1', 'Jacquelyn Tan', 'jacquelyn.tan@meinhardtgroup.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(324, '1', 'Koo Hoong Mun', 'koo.hoong.mun@mtalvernia.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(325, '1', 'John Ng', 'john@meta.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(326, '1', 'Christine Chong', 'cchong@neptunems.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(327, '1', 'Wan Ting', 'lee.wanting@pphg.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(328, '1', 'Brian Leong', 'brian@oxygensd.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(329, '1', 'Spencer Mong', 'spencer.mong@parkroyalhotels.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(330, '1', 'Philip Ky', 'kyanhphuong@hotmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(331, '1', 'rhoda dimasuay', 'rhoda.dimasuay@phoenixsolar.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(332, '1', 'Kenney Kwan', 'kenney@systemnixasia.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(333, '1', 'TAN SOON MEI', 'mei@whizmeal.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(334, '1', 'Ekta Jagtiani', 'pr@lushsg.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(335, '1', 'Foo Yongjun', 'yongjun@focusadventure.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(336, '1', 'Esther Quek', 'emailrcw@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(337, '1', 'Camilla Adindamaulani', 'camilla.adindamaulani@thebodyshop.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(338, '1', 'Faith Chng', 'faith@funatgiggles.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(339, '1', 'Daniel', 'daniel@servishero.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(340, '1', 'Tara Teo', 'tarateo@irisada.co', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(341, '1', 'Ernz Lim', 'ernz.lim@indochine-group.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(342, '1', 'Huili', 'huili@sprmrkt.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(343, '1', 'Louise Shenton', 'louiseshenton@dalishenton.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(344, '1', 'Marc Wong', 'marcwong@RSMSingapore.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(345, '1', 'Diana Win', 'wppst10@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(346, '1', 'Jereme Wong', 'jereme@clicktrue.biz', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(347, '1', 'Antoine Monod', 'monoda@ruderfinnasia.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(348, '1', 'Melisa Evelin', 'melisasundari@phoenixcontact.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(349, '1', 'Irene Chui-Seetoh', 'irene.chui@sap.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(350, '1', 'Winnie Ng', 'winnie.ng@hoganlovells.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(351, '1', 'ROSHAN MANI', 'roshan@fortunascientific.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(352, '1', 'Alvin Chan', 'ac@mapicglobal.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(353, '1', 'PATRICK TAN', 'pat17eve@hotmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(354, '1', 'Justin chou', 'Justin.chou.zq@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(355, '1', 'Delphine Guenther', 'a-delphg@microsoft.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(356, '1', 'Laxmi Iyer', 'laxmi@biotechin.asia', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(357, '1', 'Soh Linsin', 'linsin@kovansports.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(358, '1', 'Joyce Nang', 'joyce_nang@hsa.gov.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(359, '1', 'Nur Safiah Alias', 'saf@halalfoodhunt.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(360, '1', 'Agnes Ting', 'agnes.ting@neogroup.com.sg', '', 0, 5, 3, 1, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(361, '1', 'Anne Dhanaraj', 'anne_dhanaraj@science.edu.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(362, '1', 'Jason Chua', 'chuajson@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(363, '1', 'Axel Tan', 'axel@goodpeople.productions', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(364, '1', 'KS Chak', 'kschak@stream.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(365, '1', 'Carol', 'carol@nogginasia.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0);
INSERT INTO `users` (`id`, `company`, `name`, `email`, `password`, `userType`, `permissions_id`, `role_type_id`, `subscribed`, `quiz_rep`, `status`, `csr`, `connect_email`, `connect_password`, `remember_token`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `super`) VALUES
(366, '1', 'Carol Kuok', 'carol@bizcatalyst.net', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(367, '1', 'MARILYN TAN', 'marilyn.tan@soilbuild.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(368, '1', 'Joe Tan', 'joe@loveactionproject.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(369, '1', 'Supriya Sen', 'Supriya.sen@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(370, '1', 'The Social Co Pte Ltd', 'cheryl@thesocialco.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(371, '1', 'Clara Lee', 'clara_lee@mof.gov.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(372, '1', 'Aparna Kasbekar', 'aparna.niranjan@sage.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(373, '1', 'Isebelle Ang', 'isebelleang@sutd.edu.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(374, '1', 'ANG FOONG YEN', 'foong_yen_ang@sg.smbc.co.jp', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(375, '1', 'Ho Hui Xin', 'huho@deloitte.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(377, '1', 'Henry Seah', 'henry@sgcarmart.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(378, '1', 'Chew Choon Yan', 'choonyan.chew@framework.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(379, '1', 'Erwin', 'erwin@shade.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(380, '1', 'Alvin Chua Teck Wei', 'general@resnovia.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(381, '1', 'Glenn Seah', 'glenn.seah@sgx.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(382, '1', 'ROGER', 'ROGER@MIND.COM.SG', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(383, '1', 'Goh Ailing', 'gohali@stee.stengg.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(384, '1', 'Shermaines Siew', 'siewshermaine@stengg.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(385, '1', 'Gracia Ting', 'gracia@mindful-company.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(386, '1', 'Anne Lai', 'annelai@sks.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(387, '1', 'Siti Nurbiah Daud', 'sdaud@tableau.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(388, '1', 'SL LIM', 'sales@elect-chem.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(389, '1', 'Sim Wee Li', 'wee_li.sim@roche.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(390, '1', 'Amy Picanço', 'Amy@aymdesign.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(391, '1', 'Tan Khai Hua', 'tan.khaihua@securagroup.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(392, '1', 'Claire', 'claire@thecarousell.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(393, '1', 'Tan Yingzhi, Elizabeth', 'yingzhi@spgroup.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(394, '1', 'SERENA', 'SERENA@WEEGUAN.COM.SG', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(395, '1', 'Vivian Hoo', 'vivianhoo@nvpc.org.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(396, '1', 'Quak Ren Qi', 'rquak@coffeebean.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(397, '1', 'Min', 'min@theheartbazaar.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(398, '1', 'Cynthia Lau', 'cynthia.lau@decathlon.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(399, '1', 'Emily Choo', 'emily.choo@cityneon.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(400, '1', 'Nadiah Mahad', 'nadiah.mahad@adecco.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(401, '1', 'Angela Sze', 'angela.sze@titansoft.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(402, '1', 'Sohni Kaur', 'sohnik@netflix.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(403, '1', 'Liew Siow Gian Patrick', 'patrickliew77@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(404, '1', 'Wendy Poh', '3asy3ducation@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(405, '1', 'Kim Ong', 'Kimong@iartsg.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(406, '1', 'STEVEN LIM KEE THUAN', 'stev@weeguan.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(407, '1', 'MC', 'edmyip@yahoo.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(408, '1', 'Alvin Yeo', 'alvin_yeo@faithmusic.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(409, '1', 'Naweera Sidik', 'naweera.sidik@emergenetics.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(410, '1', 'Maggie Eng', 'maggie.eng@sumitomocorp.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(411, '1', 'SAY HUANYUAN', 'say.huanyuan@stengg.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(412, '1', 'Jenny Yeoh', 'verticas.consultancy@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(413, '1', 'DATO\' SERI DR DEREK GOH', 'derek.goh@serialsystem.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(414, '1', 'Ang Joo Hin', 'joohin@globotron.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(415, '1', 'Yong Fook Chyi', 'Yong_fook_chyi@toteboard.gov.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(416, '1', 'Joyce Leow', 'joyce_leow@wohhup.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(417, '1', 'Qi Wen Ng', 'qwng@wspc.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(418, '1', 'Yvette Teo', 'yvetteteo@worldcourier.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(419, '1', 'Nicole Li', 'nicole.li@yusin-sg.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(420, '1', 'Anne marie', 'annemarie.low@zenithmedia.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(421, '1', 'koh hui ying', 'huiying.koh@zeonsg.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(422, '1', 'Sherlyn Ang', 'sang@zendesk.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(423, '1', 'BRANDON LEW', 'brandon.lew@t-systems.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(424, '1', 'Marcus Quah', 'marcus@ablethrive.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(425, '1', 'Cheryl Tan', 'chtan@linkedin.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(426, '1', 'Allard Mueller', 'allard@doverpark.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(427, '1', 'Bryan Toh', 'bryantoh@wohhupfood.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(428, '1', 'Anastasia Ling', 'anastasialing@quintessentially.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(429, '1', 'Aida Mekonnen', 'Aida.mekonnen@nabasia.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(430, '1', 'Nicholas Lee', 'veu@wrs.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(431, '1', 'Sharon Teo', 'sharon.teo@siemens.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(432, '1', 'Jane Toh', 'jane.toh@ksbdist.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(433, '1', 'Stephanie Keen', 'stephanie.keen@hoganlovells.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(434, '1', 'Rie Watanabe', 'rie.watanabe@pure-international.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(435, '1', 'Kevin Tan', 'kevin@pantropic.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(436, '1', 'Gerald Tan', 'gtan@future-asia.co', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(437, '1', 'Tan Kee Tuan', 'cas@cycleaire.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(438, '1', 'Lee Choon Mui', 'choonmui.lee@2wglobal.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(439, '1', 'Toh Ang Poh', 'angpoh@vasss.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(440, '1', 'Angela Lee', 'angela@kompacplus.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(441, '1', 'Wendy Chong', 'chsec@ktlsg.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(442, '1', 'Brian Lee', 'brianlee@kurihara.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(443, '1', 'Georgette Tan', 'georgette_tan@mastercard.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(444, '1', 'Nim Sivakumaran', 'nims@jointhe.co', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(445, '1', 'Andrew Ing', 'andrew.ing@lobehold.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(446, '1', 'Irene Hoon', 'irenehoon@tessatherapeutics.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(447, '1', 'TOCK Liang Lim Darien', 'darien.tock@accesstech.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(448, '1', 'Cindy Loy', 'cindy.loy@arcadis.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(449, '1', 'Jyn Cheong', 'jyn.cheong@amway.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(450, '1', 'Arvin', 'arvin.loh@ashurst.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(451, '1', 'Tina Ling', 'tina_ling@excel-precast.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(452, '1', 'Joreen Peh', 'joreen.peh@greenwavesystems.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(453, '1', 'Joanne Koh', 'joannekoh@cdl.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(454, '1', 'Chris', 'chris@thatsinnovative.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(455, '1', 'Fitri Agustina', 'afitri@buckman.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(456, '1', 'Amy Chong', 'amy.chong@hypertherm.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(457, '1', 'Monita Sen', 'monita.sen@ibo.org', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(458, '1', 'tina', 'kris@verzdesign.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(459, '1', 'Angela Lau', 'angela.lau@frasershospitality.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(460, '1', 'Jury Yaw', 'jury@malifax.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(461, '1', 'Alvin Yap', 'alvin.yap@sg-akc.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(462, '1', 'Patricia', 'patricia@mis.org.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(463, '1', 'Ong Ai Leng', 'ailenghr.ong@milliken.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(464, '1', 'FU YONG HONG', 'yhfu1989@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(465, '1', 'Sylvia Ang', 'Sylvia@denso.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(466, '1', 'Isabelle Lim', 'isabelle.lim@loreal.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(467, '1', 'Doreen Neo', 'doreen@seahconst.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(468, '1', 'Mike Seah', 'seahwk@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(469, '1', 'Tessa', 'tesscao0790@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(470, '1', 'RUBI PANDEY', 'rubi@seriesofintentions.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(471, '1', 'Patsian Low', 'patsianlow@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(472, '1', 'Will', 'ngpxcheryl@hotmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(473, '1', 'Jerome Lau', 'jerome@splash.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(474, '1', 'Alvin Foo', 'alvin.jp.foo@exxonmobil.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(475, '1', 'Katherine Ng', 'katherine.ngkailin@sg.wilmar-intl.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(476, '1', 'Yeong Wai Teck', 'attyka@aegis-be.com.sg', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(477, '1', 'Kelly Toh', 'kelly.toh@swireos.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(478, '1', 'Grace Yang', 'grace.yang@suntecsingapore.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(479, '1', 'WAYNE SOO', 'wayne.fiduciallp@gmail.com', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(480, '1', 'Daniel Chia', 'daniel.hy.chia@carlsberg.asia', '', 0, 5, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, NULL, '2017-07-06 01:28:54', 0),
(481, '1', 'srinivas', 'srini@site.com', '$2y$10$iZ5LtoZzUZoeBMlHnGTNI./07PdmrX.og7tYTertn6iGvgFPW2Zgu', 0, 4, 2, 0, 0, 1, 0, NULL, NULL, 'jUDrZtuDx3Xp2P6uznGgocxL67m9Jz20XUAQ7UAPbjKw5czwBdZXpjvFOEuI', 0, 1, 1, '2017-05-24 00:09:03', '2017-07-06 01:28:55', 0),
(482, '1', 'Rahul', 'asasa@site.com', '$2y$10$WjqHv8bW5s.OwnprNyuCfOBrk6YV0dxjZg/NBhJ8yfBy0wcewo3LC', 0, 4, 3, 0, 0, 0, 0, NULL, NULL, NULL, 0, 1, 1, '2017-05-24 00:16:35', '2017-07-06 01:28:54', 0),
(483, '1', 'rohit', 'asas@gmail.com', '$2y$10$61TeuQbAvSsjf94Z.yyX8.UPhopKWYM2ucWaADEQfu9lWAT0TWv3m', 0, 4, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, '2017-05-24 00:17:17', '2017-07-06 01:28:54', 0),
(484, '2', 'nisha', 'wqqq@site.com', '$2y$10$NpjHDKB4YlziAtCRn/SBFOdOoAwYhYLBz/byyNGNoGZjTjhQvD5AS', 0, 4, 3, 0, 0, 1, 0, NULL, NULL, NULL, 0, 1, 1, '2017-05-24 02:08:12', '2017-07-05 22:35:08', 0),
(485, '2', 'new user2', 'admintt@site.com', '$2y$10$I/7fjOrZP./fjt/axOaBGeC8ztHcjeJgtdv0eqt7dNdVqv2fL1WDi', 0, NULL, 2, 0, 0, 1, 0, NULL, NULL, 'QEEi6BvglEVbgxVbZYsp894O0Bbvr0UNz2BLaptr7Fybc2W7o9MlNGEyOiy9', 0, 1, 1, '2017-06-08 02:03:38', '2017-07-05 22:35:08', 0),
(486, '1', 'nymnahalli', 'nymnahalli@gmail.com', '$2y$10$Vox.b9uNb8dJ.TXmau8ymuPSYArVAjzHnOTzb5tls/.daFRBsBQCa', 0, NULL, 4, 0, 0, 1, 0, NULL, NULL, 'DY4818lld24LCsd5ze4Xv5HT2u3cMy1ZWeUokKaSLLniKV8jEximhsxdP5CK', 0, 1, 1, '2017-06-12 01:29:12', '2017-07-06 01:28:54', 0),
(490, '', 'Add delete', 'add@gmail.com', '$2y$10$7Lvk5pdTXd8vYfBdkfek1.51lDptd0D/VgmUTzXK040pGv6ajApcC', 0, NULL, 4, 0, 0, 0, 0, NULL, NULL, 'MwqfpmgHcGDLvd9CWEp8bgsgqWU5SkrVl7qbhy36sVXnKEXM2UhOUlYVlRlj', 0, NULL, NULL, '2017-06-13 00:50:13', '2017-06-13 00:50:13', 0),
(491, '', 'srinivas', 'srini@verzdesign.com', '$2y$10$JdgdFhOiQi/.mtI.daUYeek4je9gE5sQhuAHYeDuftSZdXs8ZmPJW', 0, NULL, 4, 0, 0, 1, 0, NULL, NULL, 'XaG4pNz7fiop9wcrX2nul46djF9DMKx8D3cfpeq3nXITviv1IzHn6nnWhsRg', 0, NULL, NULL, '2017-06-20 22:42:53', '2017-06-20 22:45:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_quiz_answers`
--

CREATE TABLE `users_quiz_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `answer_id` int(10) UNSIGNED DEFAULT NULL,
  `users_quiz_result_id` int(200) DEFAULT NULL,
  `delete_status` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_quiz_answers`
--

INSERT INTO `users_quiz_answers` (`id`, `year`, `quiz_id`, `user_id`, `question_id`, `answer_id`, `users_quiz_result_id`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Jul-2017', 3, 4, 1, 6, 1, 1, '2017-07-10 01:45:16', NULL),
(2, 'Jul-2017', 3, 4, 3, 3, 1, 1, '2017-07-10 01:45:16', NULL),
(3, 'Jul-2017', 3, 4, 5, 4, 1, 1, '2017-07-10 01:45:16', NULL),
(4, 'Jul-2017', 3, 4, 5, 5, 1, 1, '2017-07-10 01:45:16', NULL),
(5, 'Jul-2017', 3, 481, 1, 6, 2, 0, '2017-07-10 01:46:13', NULL),
(6, 'Jul-2017', 3, 481, 1, 7, 2, 0, '2017-07-10 01:46:13', NULL),
(7, 'Jul-2017', 3, 481, 3, 3, 2, 0, '2017-07-10 01:46:13', NULL),
(8, 'Jul-2017', 3, 481, 3, 24, 2, 0, '2017-07-10 01:46:13', NULL),
(9, 'Jul-2017', 3, 4, 1, 1, 3, 0, '2017-07-10 02:15:44', NULL),
(10, 'Jul-2017', 3, 4, 3, 2, 3, 0, '2017-07-10 02:15:44', NULL),
(11, 'Jul-2017', 3, 4, 3, 24, 3, 0, '2017-07-10 02:15:44', NULL),
(12, 'Jul-2017', 3, 4, 5, 5, 3, 0, '2017-07-10 02:15:44', NULL),
(13, 'Jul-2017', 3, 4, 1, 15, 4, 0, '2017-07-10 02:26:52', NULL),
(14, 'Jul-2017', 3, 4, 3, 28, 4, 0, '2017-07-10 02:26:52', NULL),
(15, 'Jul-2017', 3, 4, 3, 30, 4, 0, '2017-07-10 02:26:52', NULL),
(16, 'Jul-2017', 3, 4, 5, 35, 4, 0, '2017-07-10 02:26:52', NULL),
(17, 'Jul-2017', 3, 481, 1, 8, 5, 0, '2017-07-10 02:32:31', NULL),
(18, 'Jul-2017', 3, 481, 3, 24, 5, 0, '2017-07-10 02:32:31', NULL),
(19, 'Jul-2017', 3, 481, 3, 25, 5, 0, '2017-07-10 02:32:31', NULL),
(20, 'Jul-2017', 3, 481, 5, 5, 5, 0, '2017-07-10 02:32:31', NULL),
(21, 'Jul-2017', 3, 481, 5, 34, 5, 0, '2017-07-10 02:32:31', NULL),
(22, 'Jul-2017', 3, 481, 1, 6, 6, 0, '2017-07-10 02:32:58', NULL),
(23, 'Jul-2017', 3, 481, 1, 8, 6, 0, '2017-07-10 02:32:59', NULL),
(24, 'Jul-2017', 3, 481, 1, 12, 6, 0, '2017-07-10 02:32:59', NULL),
(25, 'Jul-2017', 3, 481, 1, 14, 6, 0, '2017-07-10 02:32:59', NULL),
(26, 'Jul-2017', 3, 481, 1, 15, 6, 0, '2017-07-10 02:32:59', NULL),
(27, 'Jul-2017', 3, 481, 1, 17, 6, 0, '2017-07-10 02:32:59', NULL),
(28, 'Jul-2017', 3, 481, 3, 3, 6, 0, '2017-07-10 02:32:59', NULL),
(29, 'Jul-2017', 3, 481, 3, 24, 6, 0, '2017-07-10 02:32:59', NULL),
(30, 'Jul-2017', 3, 481, 3, 25, 6, 0, '2017-07-10 02:32:59', NULL),
(31, 'Jul-2017', 3, 481, 3, 26, 6, 0, '2017-07-10 02:32:59', NULL),
(32, 'Jul-2017', 3, 481, 3, 28, 6, 0, '2017-07-10 02:32:59', NULL),
(33, 'Jul-2017', 3, 481, 3, 29, 6, 0, '2017-07-10 02:32:59', NULL),
(34, 'Jul-2017', 3, 481, 3, 30, 6, 0, '2017-07-10 02:32:59', NULL),
(35, 'Jul-2017', 3, 481, 3, 32, 6, 0, '2017-07-10 02:32:59', NULL),
(36, 'Jul-2017', 3, 481, 5, 5, 6, 0, '2017-07-10 02:32:59', NULL),
(37, 'Jul-2017', 3, 481, 5, 34, 6, 0, '2017-07-10 02:32:59', NULL),
(38, 'Jul-2017', 3, 481, 5, 35, 6, 0, '2017-07-10 02:32:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_quiz_result`
--

CREATE TABLE `users_quiz_result` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `invest_percent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `integration_percent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution_percent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `impact_percent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_status` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_quiz_result`
--

INSERT INTO `users_quiz_result` (`id`, `year`, `quiz_id`, `user_id`, `invest_percent`, `integration_percent`, `institution_percent`, `impact_percent`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Jul-2017', 3, 4, '0', '0', '0', '0', 1, '2017-07-10 01:45:15', NULL),
(2, 'Jul-2017', 3, 481, '0', '0', '0', '0', 1, '2017-07-10 01:46:13', NULL),
(3, 'Jul-2017', 3, 4, '0', '0', '0', '0', 1, '2017-07-10 02:15:44', NULL),
(4, 'Jul-2017', 3, 4, '0', '0', '0', '0', 1, '2017-07-10 02:26:52', NULL),
(5, 'Jul-2017', 3, 481, '33.3333333333332', '10', '0', '0', 0, '2017-07-10 02:32:31', NULL),
(6, 'Jul-2017', 3, 481, '41.6666666666665', '40', '22.222222222222', '66.666666666666', 0, '2017-07-10 02:32:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_stories`
--

CREATE TABLE `users_stories` (
  `id` int(10) NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_causes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_programmes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_overview` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_begin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_motivation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_status` int(10) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webmaster_banners`
--

CREATE TABLE `webmaster_banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `row_no` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `desc_status` tinyint(4) NOT NULL,
  `link_status` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `icon_status` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `webmaster_banners`
--

INSERT INTO `webmaster_banners` (`id`, `row_no`, `name`, `width`, `height`, `desc_status`, `link_status`, `type`, `icon_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Add New Banner', 1600, 500, 1, 1, 1, 0, 1, 1, 1, '2017-03-06 11:06:23', '2017-05-17 00:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `webmaster_sections`
--

CREATE TABLE `webmaster_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `row_no` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `sections_status` tinyint(4) NOT NULL,
  `comments_status` tinyint(4) NOT NULL,
  `date_status` tinyint(4) NOT NULL,
  `longtext_status` tinyint(4) NOT NULL,
  `editor_status` tinyint(4) NOT NULL,
  `attach_file_status` tinyint(4) NOT NULL,
  `multi_images_status` tinyint(4) NOT NULL,
  `section_icon_status` tinyint(4) NOT NULL,
  `icon_status` tinyint(4) NOT NULL,
  `maps_status` tinyint(4) NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `webmaster_sections`
--

INSERT INTO `webmaster_sections` (`id`, `row_no`, `name`, `type`, `sections_status`, `comments_status`, `date_status`, `longtext_status`, `editor_status`, `attach_file_status`, `multi_images_status`, `section_icon_status`, `icon_status`, `maps_status`, `order_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 2, 'services', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, '2017-03-06 11:06:23', '2017-04-03 02:34:37'),
(3, 3, 'stories', 0, 0, 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 1, NULL, '2017-03-06 11:06:23', '2017-03-06 11:06:23'),
(4, 4, 'photos', 1, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, '2017-03-06 11:06:23', '2017-04-03 02:36:52'),
(6, 6, 'sounds', 3, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, '2017-03-06 11:06:23', '2017-04-03 02:34:18'),
(7, 7, 'blog', 0, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 1, NULL, '2017-03-06 11:06:23', '2017-03-06 11:06:23'),
(8, 8, 'products', 0, 2, 1, 0, 1, 1, 0, 1, 1, 0, 0, 1, 0, 1, 1, '2017-03-06 11:06:23', '2017-04-03 02:35:42'),
(9, 9, 'Events', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, NULL, '2017-04-10 01:56:28'),
(10, 10, 'Stories', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL),
(11, 11, 'EmailTemplates', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL),
(12, 12, 'ResourceLibrary', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL),
(13, 13, 'Banners', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL),
(15, 15, 'Tracking', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, 1, NULL, '2017-04-10 20:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `webmaster_settings`
--

CREATE TABLE `webmaster_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `ar_box_status` tinyint(4) NOT NULL,
  `en_box_status` tinyint(4) NOT NULL,
  `seo_status` tinyint(4) NOT NULL,
  `analytics_status` tinyint(4) NOT NULL DEFAULT '0',
  `banners_status` tinyint(4) NOT NULL,
  `resourcetype_status` tinyint(4) NOT NULL,
  `stories_status` tinyint(4) NOT NULL,
  `testimonial_status` tinyint(4) NOT NULL,
  `log_status` tinyint(4) NOT NULL DEFAULT '0',
  `settings_status` tinyint(4) NOT NULL,
  `newsletter_status` tinyint(4) NOT NULL,
  `members_status` tinyint(4) NOT NULL,
  `fundingmember_status` tinyint(4) NOT NULL,
  `shop_status` tinyint(4) NOT NULL,
  `event_status` tinyint(4) NOT NULL,
  `story_status` tinyint(4) NOT NULL,
  `fellowship_status` tinyint(4) NOT NULL,
  `champion_status` tinyint(4) NOT NULL,
  `emailtemplate_status` tinyint(4) NOT NULL,
  `resourcelib_status` tinyint(4) NOT NULL,
  `partners_status` tinyint(4) NOT NULL DEFAULT '0',
  `banner_status` tinyint(4) NOT NULL,
  `up_status` tinyint(4) NOT NULL,
  `shop_settings_status` tinyint(4) NOT NULL,
  `default_currency_id` int(11) NOT NULL,
  `languages_count` int(11) NOT NULL,
  `latest_news_section_id` int(11) NOT NULL,
  `header_menu_id` int(11) NOT NULL,
  `footer_menu_id` int(11) NOT NULL,
  `home_banners_section_id` int(11) NOT NULL,
  `home_text_banners_section_id` int(11) NOT NULL,
  `side_banners_section_id` int(11) NOT NULL,
  `contact_page_id` int(11) NOT NULL,
  `newsletter_contacts_group` int(11) NOT NULL,
  `new_comments_status` tinyint(4) NOT NULL,
  `home_content1_section_id` int(11) NOT NULL,
  `userspermissions_status` tinyint(4) NOT NULL DEFAULT '0',
  `home_content2_section_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `webmaster_settings`
--

INSERT INTO `webmaster_settings` (`id`, `ar_box_status`, `en_box_status`, `seo_status`, `analytics_status`, `banners_status`, `resourcetype_status`, `stories_status`, `testimonial_status`, `log_status`, `settings_status`, `newsletter_status`, `members_status`, `fundingmember_status`, `shop_status`, `event_status`, `story_status`, `fellowship_status`, `champion_status`, `emailtemplate_status`, `resourcelib_status`, `partners_status`, `banner_status`, `up_status`, `shop_settings_status`, `default_currency_id`, `languages_count`, `latest_news_section_id`, `header_menu_id`, `footer_menu_id`, `home_banners_section_id`, `home_text_banners_section_id`, `side_banners_section_id`, `contact_page_id`, `newsletter_contacts_group`, `new_comments_status`, `home_content1_section_id`, `userspermissions_status`, `home_content2_section_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 3, 1, 2, 1, 2, 3, 2, 1, 1, 7, 1, 0, 1, 1, '2017-03-06 11:06:23', '2017-04-09 23:25:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporate`
--
ALTER TABLE `corporate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_guest`
--
ALTER TABLE `events_guest`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `events_topic`
--
ALTER TABLE `events_topic`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqanswers`
--
ALTER TABLE `faqanswers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqquestions`
--
ALTER TABLE `faqquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fellowship`
--
ALTER TABLE `fellowship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `founders`
--
ALTER TABLE `founders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getinvolved`
--
ALTER TABLE `getinvolved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_tracks`
--
ALTER TABLE `global_tracks`
  ADD PRIMARY KEY (`tracked_date`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizanswers`
--
ALTER TABLE `quizanswers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizquestions`
--
ALTER TABLE `quizquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Indexes for table `resources_topic`
--
ALTER TABLE `resources_topic`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `role_type`
--
ALTER TABLE `role_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_type_access`
--
ALTER TABLE `role_type_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_type_id` (`role_type_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories_topic`
--
ALTER TABLE `stories_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_type_id` (`role_type_id`);

--
-- Indexes for table `users_quiz_answers`
--
ALTER TABLE `users_quiz_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_quiz_result`
--
ALTER TABLE `users_quiz_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_stories`
--
ALTER TABLE `users_stories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `webmaster_banners`
--
ALTER TABLE `webmaster_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webmaster_sections`
--
ALTER TABLE `webmaster_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webmaster_settings`
--
ALTER TABLE `webmaster_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `corporate`
--
ALTER TABLE `corporate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `events_guest`
--
ALTER TABLE `events_guest`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `events_topic`
--
ALTER TABLE `events_topic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faqanswers`
--
ALTER TABLE `faqanswers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faqquestions`
--
ALTER TABLE `faqquestions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fellowship`
--
ALTER TABLE `fellowship`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `founders`
--
ALTER TABLE `founders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `getinvolved`
--
ALTER TABLE `getinvolved`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=867;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quizanswers`
--
ALTER TABLE `quizanswers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `quizquestions`
--
ALTER TABLE `quizquestions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resources_topic`
--
ALTER TABLE `resources_topic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `role_type`
--
ALTER TABLE `role_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `role_type_access`
--
ALTER TABLE `role_type_access`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stories_topic`
--
ALTER TABLE `stories_topic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;
--
-- AUTO_INCREMENT for table `users_quiz_answers`
--
ALTER TABLE `users_quiz_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `users_quiz_result`
--
ALTER TABLE `users_quiz_result`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users_stories`
--
ALTER TABLE `users_stories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `webmaster_banners`
--
ALTER TABLE `webmaster_banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `webmaster_sections`
--
ALTER TABLE `webmaster_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `webmaster_settings`
--
ALTER TABLE `webmaster_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_type_access`
--
ALTER TABLE `role_type_access`
  ADD CONSTRAINT `role_type_access_ibfk_1` FOREIGN KEY (`role_type_id`) REFERENCES `role_type` (`id`),
  ADD CONSTRAINT `role_type_access_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_type_id`) REFERENCES `role_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
