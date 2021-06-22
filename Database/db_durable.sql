-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 05:08 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_durable`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `catagory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `created_at`, `updated_at`, `catagory_name`) VALUES
(1, '2020-02-24 20:13:30', '2020-02-24 20:13:30', 'โซน A'),
(2, '2020-02-24 20:13:38', '2020-02-24 20:13:38', 'โซน B'),
(3, '2020-02-24 20:13:44', '2020-02-24 20:13:44', 'โซน C'),
(4, '2020-02-24 20:13:52', '2020-02-24 20:13:52', 'โซน D'),
(5, '2020-02-24 20:13:58', '2020-02-24 20:13:58', 'โซน E'),
(6, '2020-02-24 20:14:05', '2020-02-24 20:14:05', 'โซน F'),
(7, '2020-02-24 20:14:10', '2020-02-24 20:14:10', 'โซน G'),
(8, NULL, NULL, 'ห้องเก็บครุภัณฑ์');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `category_name`) VALUES
(1, '2020-02-24 20:17:49', '2020-02-25 00:59:46', 'เครื่องเสียง'),
(2, '2020-02-24 20:17:59', '2020-02-24 20:17:59', 'เครื่องคอมพิวเตอร์'),
(3, '2020-02-24 20:18:06', '2020-02-24 20:18:06', 'หน้าจอคอมพิวเตอร์'),
(4, '2020-02-24 20:19:14', '2020-02-24 20:19:14', 'โปรเจคเตอร์'),
(6, '2020-02-24 20:20:20', '2020-02-24 20:20:20', 'จอทีวี'),
(7, '2020-02-24 20:31:44', '2020-02-24 21:40:07', 'เครื่องเล่นไฟล์ HD'),
(8, '2020-02-24 20:44:12', '2020-02-24 20:44:12', 'คอมพิวเตอร์โน๊ตบุ๊ค'),
(9, '2020-02-24 20:47:47', '2020-02-24 20:47:47', 'อุปกรณ์ Network'),
(10, '2020-02-24 20:50:00', '2020-02-25 01:49:16', 'อุปกรณ์สลับ-ขยายสัญญาณ'),
(11, '2020-02-24 20:51:54', '2020-02-24 20:51:54', 'เครื่องอ่าน SD Card'),
(12, '2020-02-24 20:54:19', '2020-02-24 20:54:19', 'เครื่องเล่นวีดีโอ'),
(13, '2020-02-24 20:55:59', '2020-02-24 20:55:59', 'เครื่องฉายแสง'),
(14, '2020-02-24 21:03:19', '2020-02-24 21:03:19', 'เลนส์ภาพ'),
(15, '2020-02-24 21:06:49', '2020-02-24 21:06:49', 'แฟลชไดรฟ์'),
(16, '2020-02-24 21:10:07', '2020-02-24 21:10:07', 'กล้อง'),
(17, '2020-02-24 21:12:28', '2020-02-24 21:12:28', 'อุปกรณ์ Touch Screen'),
(18, '2020-02-24 23:02:29', '2020-02-24 23:02:29', 'อุปกรณ์ Sensor'),
(19, '2020-02-24 23:10:06', '2020-02-24 23:10:06', 'กลไก'),
(20, '2020-02-24 23:11:58', '2020-02-24 23:11:58', 'อุปกรณ์ Controller'),
(21, '2020-02-25 00:25:25', '2020-02-25 00:25:25', 'อุปกรณ์ไฟฟ้า'),
(22, '2020-02-25 00:49:27', '2020-02-25 00:49:27', 'อุปกรณ์ไอที'),
(23, '2020-02-25 01:01:52', '2020-02-25 01:01:52', 'เครื่องส่งสัญญาณ');

-- --------------------------------------------------------

--
-- Table structure for table `durablelog`
--

CREATE TABLE `durablelog` (
  `id` int(20) NOT NULL,
  `item_id` int(20) DEFAULT NULL,
  `item_name` text DEFAULT NULL,
  `item_category` text DEFAULT NULL,
  `item_amount` int(20) DEFAULT NULL,
  `total` int(20) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `durablelog`
--

INSERT INTO `durablelog` (`id`, `item_id`, `item_name`, `item_category`, `item_amount`, `total`) VALUES
(19, 6, 'Cayin Digital Signage', 'จอทีวี', 10, 1),
(20, 1, 'จอพลาสม่า TV 50 นิ้ว ยี่ห้อ LG รุ่น 50PC5R', 'จอทีวี', 1, 3),
(21, 3, 'Network HD media player ยี่ห้อ Egreat', 'เครื่องเล่นไฟล์ HD', 1, 1),
(22, 4, 'Flash drive ยี่ห้อ HP', 'แฟลชไดรฟ์', 1, 2),
(23, 11, 'เครื่องอ่าน SD Card VMX', 'เครื่องอ่าน SD Card', 10, 9),
(24, 10, 'VQA/UXQA Matrix Switcher Video', 'อุปกรณ์สลับ-ขยายสัญญาณ', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `durables`
--

CREATE TABLE `durables` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `catagory_id` int(10) UNSIGNED DEFAULT NULL,
  `du_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `break` int(11) DEFAULT NULL,
  `use` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `durables`
--

INSERT INTO `durables` (`id`, `created_at`, `updated_at`, `photo`, `duID`, `category_id`, `catagory_id`, `du_name`, `brand`, `gen`, `amount`, `break`, `use`) VALUES
(1, '2020-02-24 21:24:49', '2021-06-18 08:53:07', '', 'ITM-55-10-04-91-01-001', 6, NULL, 'จอพลาสม่า TV 50 นิ้ว ยี่ห้อ LG รุ่น 50PC5R', NULL, NULL, 1, NULL, 0),
(3, '2020-02-24 21:29:03', '2021-06-18 09:02:56', '', 'ITM-55-10-04-91-01-001', 7, NULL, 'Network HD media player ยี่ห้อ Egreat', NULL, NULL, 1, NULL, 0),
(4, '2020-02-24 21:29:26', '2021-06-22 07:56:39', '', 'ITM-55-10-04-91-01-001', 15, NULL, 'Flash drive ยี่ห้อ HP', NULL, NULL, 1, NULL, 1),
(5, '2020-02-24 21:29:56', '2021-06-08 00:26:06', '', 'ITM-55-10-04-91-01-001', 6, NULL, 'จอทีวี Samsung 42 นิ้ว รุ่น PPM42M5HBXJXST', NULL, NULL, 2, NULL, 5),
(6, '2020-02-24 21:31:10', '2021-06-18 04:46:42', '', 'ITM-55-10-04-91-01-001', 6, NULL, 'Cayin Digital Signage', NULL, NULL, 1, NULL, 5),
(7, '2020-02-24 21:31:43', '2021-06-18 03:10:13', '', 'ITM-55-10-04-91-01-002', 8, NULL, 'Note Book COMPAQ 435', NULL, NULL, 1, NULL, 5),
(8, '2020-02-24 21:33:38', '2021-06-18 04:47:24', '', 'ITM-55-10-04-91-01-002', 1, NULL, 'Power Amp Denon', NULL, NULL, 1, NULL, 6),
(9, '2020-02-24 21:34:09', '2021-06-18 04:31:35', '', 'ITM-55-10-04-91-01-002', 9, NULL, 'Switch Cisco 4 port', NULL, NULL, 1, NULL, 1),
(10, '2020-02-24 21:34:35', '2021-06-18 06:22:57', '', 'ITM-55-10-04-91-01-002', 10, NULL, 'VQA/UXQA Matrix Switcher Video', NULL, NULL, 1, NULL, 2),
(11, '2020-02-24 21:35:03', '2021-06-18 06:35:33', '', 'ITM-55-10-04-91-01-002', 11, NULL, 'เครื่องอ่าน SD Card VMX', NULL, NULL, 1, NULL, 2),
(12, '2020-02-24 21:35:56', '2021-04-30 08:23:56', '', 'ITM-55-10-04-91-01-002', 12, NULL, 'V WBOX-E122 iei Video', NULL, NULL, 1, NULL, 1),
(13, '2020-02-24 21:36:27', '2021-05-03 19:22:48', '', 'ITM-55-10-04-91-01-002', 13, NULL, 'เครื่องฉายแสง Gobo', NULL, NULL, 2, NULL, 1),
(14, '2020-02-24 21:36:45', '2020-02-24 21:36:45', '', 'ITM-55-10-04-91-01-002', 14, NULL, 'เลนส์ภาพควายBison', NULL, NULL, 2, NULL, 2),
(15, '2020-02-24 21:37:00', '2021-05-14 21:25:17', '', 'ITM-55-10-04-91-01-002', 1, NULL, 'ลำโพง stereo', NULL, NULL, 5, NULL, 5),
(16, '2020-02-24 21:37:26', '2021-06-18 04:02:16', '', 'ITM-55-10-04-91-01-002', 6, NULL, 'LCD TV Samsung 32 นิ้ว รุ่น LA32C650L1R', NULL, NULL, 5, NULL, 5),
(17, '2020-02-24 21:38:27', '2020-02-24 21:38:27', '', 'ITM-55-10-04-91-01-002', 7, NULL, 'Network HD Media Player R-Series Egreat', NULL, NULL, 1, NULL, 1),
(18, '2020-02-24 21:41:05', '2021-05-03 20:03:48', '', 'ITM-55-10-04-91-01-002', 15, NULL, 'Flash Drive Apacer', NULL, NULL, 1, NULL, 1),
(19, '2020-02-24 21:41:34', '2020-02-24 21:41:34', '', 'ITM-55-10-04-91-01-002', 3, NULL, 'จอ COMPAQ', NULL, NULL, 1, NULL, 1),
(21, '2020-02-24 21:43:30', '2021-05-14 21:25:13', '', 'ITM-55-10-04-91-01-002', 2, NULL, 'คอมพิวเตอร์ HP', NULL, NULL, 5, NULL, 5),
(22, '2020-02-24 21:43:50', '2021-05-03 19:21:21', '', 'ITM-55-10-04-91-01-002', 16, NULL, 'กล้อง Web Cam', NULL, NULL, 1, NULL, 1),
(23, '2020-02-24 21:44:09', '2020-02-24 23:00:37', '', 'ITM-55-10-04-91-01-002', 17, NULL, 'touch switch', NULL, NULL, 8, NULL, 8),
(25, '2020-02-24 23:03:28', '2021-05-03 19:29:50', '', 'ITM-55-10-04-91-01-002', 18, NULL, 'Senser', NULL, NULL, 1, NULL, 1),
(26, '2020-02-24 23:09:40', '2020-02-24 23:10:21', '', 'ITM-55-10-04-91-01-002', 19, NULL, 'ชุดกลไลขยับแขนและขยับคอ', NULL, NULL, 1, NULL, 1),
(27, '2020-02-24 23:12:42', '2020-02-24 23:12:42', '', 'ITM-55-10-04-91-01-002', 20, NULL, 'ชุดบอร์ดคอนโทรล', NULL, NULL, 1, NULL, 1),
(28, '2020-02-24 23:13:21', '2020-02-24 23:13:21', '', 'ITM-55-10-04-91-01-002', 3, NULL, 'จอมอนิเตอร์ DELL', NULL, NULL, 3, NULL, 3),
(32, '2020-02-24 23:30:58', '2020-02-25 00:16:59', '', 'ITM-55-10-04-91-01-002', 11, NULL, 'ชุดคอนโทรลตัวอ่าน SD Card', NULL, NULL, 8, NULL, 8),
(33, '2020-02-25 00:15:11', '2020-02-25 00:17:09', '', 'ITM-55-10-04-91-01-002', 1, NULL, 'ลำโพง', NULL, NULL, 10, NULL, 10),
(34, '2020-02-25 00:18:41', '2020-02-25 00:18:41', '', 'ITM-55-10-04-91-01-002', NULL, NULL, 'ศิลาจารึก (จำลอง)', NULL, NULL, 1, NULL, 1),
(35, '2020-02-25 00:22:02', '2020-02-25 00:27:22', '', 'ITM-55-10-04-91-01-002', 20, NULL, 'ชุดคอนโทรล LED', NULL, NULL, 2, NULL, 2),
(36, '2020-02-25 00:25:04', '2021-05-03 20:17:18', '', 'ITM-55-10-04-91-01-002', 21, NULL, 'สวิทซ์ชิ่ง 12V.', NULL, NULL, 2, NULL, 1),
(37, '2020-02-25 00:28:18', '2021-05-02 20:37:05', '', 'ITM-55-10-04-91-01-002', 9, NULL, 'Switch cisco 8 port', NULL, NULL, 1, NULL, 1),
(38, '2020-02-25 00:28:47', '2020-02-25 00:28:47', '', 'ITM-55-10-04-91-01-002', 7, NULL, 'HD Media Play R1-2', NULL, NULL, 1, NULL, 1),
(39, '2020-02-25 00:29:25', '2020-02-25 00:29:25', '', 'ITM-55-10-04-91-01-002', 4, NULL, 'Projector acer', NULL, NULL, 1, NULL, 1),
(41, '2020-02-25 00:32:06', '2020-02-25 00:32:06', '', 'ITM-55-10-04-91-01-002', 20, NULL, 'บอร์ดคอนโทรล', NULL, NULL, 1, NULL, 1),
(42, '2020-02-25 00:32:47', '2020-02-25 00:43:14', '', 'ITM-55-10-04-91-01-002', 6, NULL, 'LCD TV Samaung 40 นิ้ว รุ่น LA40C530F1R', NULL, NULL, 1, NULL, 1),
(43, '2020-02-25 00:44:11', '2020-02-25 00:44:11', '', 'ITM-55-10-04-91-01-002', 9, NULL, 'Networked Media tank', NULL, NULL, 1, NULL, 1),
(44, '2020-02-25 00:44:32', '2020-02-25 00:44:32', '', 'ITM-55-10-04-91-01-002', 15, NULL, 'Flash Drive', NULL, NULL, 1, NULL, 1),
(45, '2020-02-25 00:47:05', '2020-02-25 00:47:05', '', 'ITM-55-10-04-91-01-002', 2, NULL, 'เครื่องส่งรหัสมอส', NULL, NULL, 2, NULL, 2),
(46, '2020-02-25 00:47:35', '2020-02-25 00:47:35', '', 'ITM-55-10-04-91-01-002', 3, NULL, 'จอมอนิเตอร์', NULL, NULL, 2, NULL, 2),
(47, '2020-02-25 00:48:28', '2020-02-25 00:48:28', '', 'ITM-55-10-04-91-01-002', 2, NULL, 'ชุดคอมพิวเตอร์ hp', NULL, NULL, 2, NULL, 2),
(48, '2020-02-25 00:49:02', '2021-05-03 19:20:38', '', 'ITM-55-10-04-91-01-002', 22, NULL, 'คีร์บอร์ด+เมาส์', NULL, NULL, 2, NULL, 1),
(49, '2020-02-25 00:50:36', '2020-02-25 00:50:36', '', 'ITM-55-10-04-91-01-002', 18, NULL, 'อัลตร้าโซนิคเซนเซอร์', NULL, NULL, 10, NULL, 10),
(50, '2020-02-25 00:51:03', '2020-02-25 00:51:03', '', 'ITM-55-10-04-91-01-002', 22, NULL, 'ชุดหูฟัง', NULL, NULL, 10, NULL, 10),
(51, '2020-02-25 00:51:36', '2020-02-25 00:51:36', '', 'ITM-55-10-04-91-01-002', 21, NULL, 'แบตเตอรี่', NULL, NULL, 10, NULL, 10),
(52, '2020-02-25 00:52:06', '2020-02-25 00:53:10', '', 'ITM-55-10-04-91-01-002', 3, NULL, 'จอมอนิเตอร์ 17 นิ้ว', NULL, NULL, 2, NULL, 2),
(53, '2020-02-25 00:52:46', '2020-02-25 00:55:36', '', 'ITM-55-10-04-91-01-002', 7, NULL, 'Network HD Media Player', NULL, NULL, 2, NULL, 2),
(54, '2020-02-25 00:53:45', '2020-02-25 00:58:43', '', 'ITM-55-10-04-91-01-002', 1, NULL, 'ไมโครโฟน', NULL, NULL, 2, NULL, 2),
(55, '2020-02-25 00:54:46', '2020-02-25 00:54:46', '', 'ITM-55-10-04-91-01-002', 3, NULL, 'จอมอนิเตอร์ Samsung 17 นิ้ว', NULL, NULL, 1, NULL, 1),
(56, '2020-02-25 00:56:10', '2020-02-25 00:56:10', '', 'ITM-55-10-04-91-01-002', 20, NULL, 'ชุดคอนโทรล', NULL, NULL, 1, NULL, 1),
(58, '2020-02-25 00:58:15', '2020-02-25 00:58:15', '', 'ITM-55-10-04-91-01-002', 2, NULL, 'คอมพิวเตอร์', NULL, NULL, 1, NULL, 1),
(59, '2020-02-25 00:59:27', '2020-02-25 00:59:27', '', 'ITM-55-10-04-91-01-002', 1, NULL, 'Mixers MX-600', NULL, NULL, 1, NULL, 1),
(60, '2020-02-25 01:00:53', '2020-02-25 01:02:09', '', 'ITM-55-10-04-91-01-002', 23, NULL, 'เครื่องส่ง FM', NULL, NULL, 1, NULL, 1),
(61, '2020-02-25 01:02:33', '2020-02-25 01:02:33', '', 'ITM-55-10-04-91-01-002', 23, NULL, 'เครื่องส่ง AM', NULL, NULL, 1, NULL, 1),
(62, '2020-02-25 01:02:56', '2020-02-25 01:02:56', '', 'ITM-55-10-04-91-01-002', 23, NULL, 'Model วิทยุรุ่นต่างๆ', NULL, NULL, 6, NULL, 6),
(63, '2020-02-25 01:03:18', '2020-02-25 01:09:29', '', 'ITM-55-10-04-91-01-002', 1, NULL, 'ชุดลำโพง', NULL, NULL, 1, NULL, 1),
(64, '2020-02-25 01:03:42', '2020-02-25 01:03:42', '', 'ITM-55-10-04-91-01-002', 11, NULL, 'เครื่องเล่น Sdcard', NULL, NULL, 3, NULL, 3),
(65, '2020-02-25 01:04:06', '2021-05-03 20:00:38', '', 'ITM-55-10-04-91-01-002', 1, NULL, 'เครื่องขยายเสียง Crown', NULL, NULL, 1, NULL, 1),
(66, '2020-02-25 01:05:40', '2020-02-25 01:07:17', '', 'ITM-55-10-04-91-01-003', 1, NULL, 'ชุดลำโพงใต้น้ำ', NULL, NULL, 1, NULL, 1),
(67, '2020-02-25 01:06:03', '2020-02-25 01:07:29', '', 'ITM-55-10-04-91-01-003', 1, NULL, 'ไมโครโฟนใต้น้ำ', NULL, NULL, 1, NULL, 1),
(68, '2020-02-25 01:06:24', '2021-05-03 19:20:13', '', 'ITM-55-10-04-91-01-003', 11, NULL, 'ชุดอ่านการ์ด SD card', NULL, NULL, 1, NULL, 1),
(69, '2020-02-25 01:11:00', '2020-02-25 01:11:00', '', 'ITM-55-10-04-91-01-003', 1, NULL, 'ชุดลำโพง อากาศและน้ำ', NULL, NULL, 1, NULL, 1),
(70, '2020-02-25 01:11:49', '2020-02-25 01:11:49', '', 'ITM-55-10-04-91-01-003', 23, NULL, 'Exchange line telephone', NULL, NULL, 5, NULL, 5),
(71, '2020-02-25 01:12:15', '2020-02-25 01:12:15', '', 'ITM-55-10-04-91-01-003', 23, NULL, 'โทรศัพท์', NULL, NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `linetoken`
--

CREATE TABLE `linetoken` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `linetoken`
--

INSERT INTO `linetoken` (`id`, `token`) VALUES
(1, '0JwJGxTH6zfx6EQPP8RZPp6vZSDZ9KmctRj6K8AlAX9');

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
(24, '2019_12_23_073220_create_categories_table', 1),
(26, '2019_12_31_131124_create_orders', 1),
(27, '2019_12_31_132811_create_orders_items', 1),
(28, '2020_01_19_131234_create_catagories_table', 1),
(29, '2019_12_23_073616_create_durables_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_status` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `success` int(11) DEFAULT 0,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_category` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_brand` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_gen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `rdate` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_status` tinyint(1) NOT NULL DEFAULT 0,
  `borrow` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `username`, `names`, `position`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'ผู้ดูแลระบบ', 'นักวิชาการ', 'admin@itm.com', NULL, '$2y$10$4if9/gxCRifoZ7.AzHu3e.cjyF/QK8gH0ufhJZmfLfv0T9/3ar34C', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `durablelog`
--
ALTER TABLE `durablelog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durables`
--
ALTER TABLE `durables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `durables_du_name_unique` (`du_name`),
  ADD KEY `durables_category_id_index` (`category_id`),
  ADD KEY `durables_catagory_id_index` (`catagory_id`);

--
-- Indexes for table `linetoken`
--
ALTER TABLE `linetoken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `durablelog`
--
ALTER TABLE `durablelog`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `durables`
--
ALTER TABLE `durables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `linetoken`
--
ALTER TABLE `linetoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
