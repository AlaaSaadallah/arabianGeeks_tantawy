-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2022 at 04:47 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arabianGeeks_tantawy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@tantawy.com', '$2y$10$ifFuqdWTDgzfboEaO1Q/cu6M259sPffeMktBviRJ/CwpKl1GYK.j6', '2022-01-24 19:09:54', '2022-01-24 19:09:54', NULL),
(2, 'admin', 'admin@arabiangeeks.com', '$2y$10$XUrUcoM6mxOjbKO/UrMz7uyiFzIKw.nRc2kbxAnjsB1A9hRfspILG', '2022-01-24 19:09:54', '2022-01-24 19:09:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_quantity` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `video_url`, `min_quantity`, `created_at`, `updated_at`) VALUES
(1, 'كروت شخصية', NULL, NULL, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(2, 'بروشور', NULL, NULL, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(3, 'فلاير', NULL, NULL, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(4, 'مجلات', NULL, NULL, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(5, 'كتب', NULL, NULL, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(6, 'بلوك نوت', NULL, NULL, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(7, 'ليتر هيد', NULL, NULL, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(8, 'طباعة', NULL, NULL, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(9, 'أظرف', NULL, NULL, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(10, 'ملصقات', NULL, NULL, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(11, 'فولدرات صغيرة', NULL, NULL, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(12, 'فولدرات كبيرة', NULL, NULL, '2022-01-24 19:09:54', '2022-01-24 19:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `category_color`
--

CREATE TABLE `category_color` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint NOT NULL,
  `color_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_color`
--

INSERT INTO `category_color` (`id`, `category_id`, `color_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 11, 1),
(6, 11, 2),
(7, 11, 3),
(8, 11, 4),
(9, 12, 3),
(10, 12, 4),
(11, 12, 2),
(12, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_finish_direction`
--

CREATE TABLE `category_finish_direction` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint NOT NULL,
  `finish_direction_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_finish_option`
--

CREATE TABLE `category_finish_option` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint NOT NULL,
  `finish_option_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_images`
--

CREATE TABLE `category_images` (
  `id` bigint UNSIGNED NOT NULL,
  `cat_id` bigint NOT NULL,
  `img_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_paper_size`
--

CREATE TABLE `category_paper_size` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint NOT NULL,
  `paper_size_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_paper_size`
--

INSERT INTO `category_paper_size` (`id`, `category_id`, `paper_size_id`) VALUES
(1, 2, 17),
(2, 2, 18),
(3, 2, 19),
(4, 2, 22),
(5, 2, 23),
(6, 2, 24),
(7, 12, 16),
(8, 12, 3),
(9, 12, 7),
(10, 11, 22),
(11, 11, 17),
(12, 11, 23),
(13, 11, 18);

-- --------------------------------------------------------

--
-- Table structure for table `category_paper_type`
--

CREATE TABLE `category_paper_type` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint NOT NULL,
  `paper_type_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_paper_type`
--

INSERT INTO `category_paper_type` (`id`, `category_id`, `paper_type_id`) VALUES
(1, 12, 36),
(2, 12, 37),
(3, 12, 38),
(4, 12, 44),
(5, 12, 45),
(6, 11, 36),
(7, 11, 37),
(8, 11, 38),
(9, 11, 44),
(10, 11, 45);

-- --------------------------------------------------------

--
-- Table structure for table `category_print_option`
--

CREATE TABLE `category_print_option` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint NOT NULL,
  `print_option_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_print_option`
--

INSERT INTO `category_print_option` (`id`, `category_id`, `print_option_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 12, 1),
(4, 12, 2),
(5, 12, 3),
(6, 12, 4),
(7, 11, 3),
(8, 11, 4),
(9, 11, 1),
(10, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `price`, `is_available`, `created_at`, `updated_at`) VALUES
(1, '1 لون', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(2, '2 لون', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(3, '3 لون', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(4, '4 لون', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finish_directions`
--

CREATE TABLE `finish_directions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finish_directions`
--

INSERT INTO `finish_directions` (`id`, `name`, `price`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 'فوق', NULL, 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(2, 'تحت', NULL, 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(3, 'يمين', NULL, 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(4, 'شمال', NULL, 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `finish_options`
--

CREATE TABLE `finish_options` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finish_options`
--

INSERT INTO `finish_options` (`id`, `name`, `price`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 'غراء', NULL, 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(2, 'دبوس', NULL, 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(3, 'سلك', NULL, 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55');

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
(1, '2022_01_24_100021_create_admins_table', 1),
(2, '2022_01_24_100318_create_categories_table', 2),
(3, '2022_01_24_100332_create_category_images_table', 2),
(4, '2022_01_24_100400_create_category_paper_types_table', 2),
(5, '2022_01_24_100434_create_category_print_options_table', 2),
(6, '2022_01_24_100506_create_category_colors_table', 2),
(7, '2022_01_24_100523_create_category_finish_options_table', 2),
(8, '2022_01_24_100537_create_category_finish_directions_table', 2),
(9, '2022_01_24_100040_create_customers_table', 3),
(10, '2022_01_24_100101_create_cities_table', 4),
(11, '2022_01_24_100129_create_paper_types_table', 5),
(12, '2022_01_24_100144_create_print_options_table', 5),
(13, '2022_01_24_100225_create_colors_table', 5),
(14, '2022_01_24_100240_create_finish_options_table', 5),
(15, '2022_01_24_100251_create_finish_directions_table', 5),
(16, '2022_01_24_193740_create_paper_sizes_table', 5),
(17, '2022_01_24_100637_create_orders_table', 6),
(18, '2022_01_24_100655_create_order_statuses_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_nu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paper_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` decimal(8,2) NOT NULL,
  `height` decimal(8,2) NOT NULL,
  `print_option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finish_option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finish_direction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paper_sizes`
--

CREATE TABLE `paper_sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` decimal(8,2) DEFAULT NULL,
  `height` decimal(8,2) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paper_sizes`
--

INSERT INTO `paper_sizes` (`id`, `name`, `width`, `height`, `price`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 'الفرخ', '100.00', '70.00', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(2, 'نص الفرخ', '50.00', '70.00', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(3, 'ربع الفرخ', '33.50', '48.50', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(4, 'ثمن الفرخ', '24.25', '33.50', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(5, 'نص ثمن الفرخ', '16.75', '24.25', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(6, 'ربع ثمن الفرخ', '12.12', '16.75', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(7, 'خمس الفرخ', '28.50', '38.50', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(8, 'نص خمس الفرخ', '19.25', '28.50', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(9, 'ربع خمس الفرخ', '14.00', '19.25', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(10, 'سدس الفرخ', '21.50', '48.50', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(11, 'نص سدس الفرخ-عرض', '21.50', '24.25', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(12, 'نص سدس الفرخ-طول', '12.25', '21.50', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(13, '11 حته', '18.50', '28.50', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(14, 'تسع الفرخ', '21.25', '31.50', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(15, 'دبل تسعات', '31.50', '44.50', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(16, 'a3', '29.70', '42.00', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(17, 'a4', '21.00', '29.70', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(18, 'a5', '15.00', '21.00', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(19, 'a6', '10.00', '15.00', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(20, 'ربع الجاير الطبع', '29.70', '42.00', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(21, 'ربع الجاير الكوشيه', '31.50', '42.50', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(22, 'B4', '24.00', '33.00', NULL, 1, NULL, NULL),
(23, 'B5', '16.00', '24.00', NULL, 1, NULL, NULL),
(24, 'B6', '16.00', '12.00', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paper_types`
--

CREATE TABLE `paper_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` decimal(8,2) DEFAULT NULL,
  `height` decimal(8,2) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paper_types`
--

INSERT INTO `paper_types` (`id`, `name`, `width`, `height`, `price`, `is_available`, `created_at`, `updated_at`) VALUES
(1, '100 جرام جاير طبع', '60.00', '84.00', '1.45', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(2, '100 جرام طبع سرينا', '70.00', '100.00', '1.88', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(3, '100 جرام كلاريانا', '70.00', '100.00', '3.20', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(4, '115 جرام جاير لامع اوروبي', '66.00', '88.00', '2.00', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(5, '115 جرام جاير لامع صيني', '70.00', '100.00', '2.30', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(6, '115 جرام لامع صيني', '70.00', '100.00', '2.57', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(7, '115 جرام مط اوروبي', '70.00', '100.00', '2.45', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(8, '115 جرام مط صيني', '70.00', '100.00', '2.05', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(9, '120 جرام طبع سرينا', '70.00', '100.00', '2.25', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(10, '130 جرام بريستول', '70.00', '100.00', '2.20', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(11, '130 جرام بريستول ازرق', '70.00', '100.00', '2.70', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(12, '130 جرام جاير لامع اووروبي', '66.00', '88.00', '2.45', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(13, '130 جرام جاير لامع صيني', '66.00', '88.00', '2.45', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(14, '130 جرام لامع صيني', '70.00', '100.00', '2.80', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(15, '130 جرام مط صيني', '70.00', '100.00', '2.80', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(16, '130 جرام مط اوروبي', '70.00', '100.00', '2.80', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(17, '140 بريستول الوان', '70.00', '100.00', '2.20', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(18, '140 جرام بريستول ابيض', '70.00', '100.00', '2.65', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(19, '140 جرام مانيلا', '70.00', '100.00', '1.65', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(20, '150 جرام جاير لامع اوروبي', '66.00', '88.00', '2.80', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(21, '150 جرام جاير لامع صيني', '66.00', '88.00', '2.95', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(22, '150 جرام جاير مط صيني', '66.00', '88.00', '2.74', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(23, '150 جرام لامع صيني', '70.00', '100.00', '3.26', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(24, '150 جرام مط اوروبي', '70.00', '100.00', '3.10', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(25, '150 جرام مط صيني', '70.00', '100.00', '2.65', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(26, '180 جرام بريستول', '70.00', '100.00', '3.10', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(27, '180 جرام مانيلا', '70.00', '100.00', '2.00', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(28, '200 جرام جاير لامع اوروبي', '66.00', '88.00', '3.90', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(29, '200 جرام جاير لامع صيني', '66.00', '88.00', '4.05', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(30, '200 جرام لامع اوروبي', '70.00', '100.00', '4.40', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(31, '200 جرام لامع صيني', '70.00', '100.00', '4.52', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(32, '200 جرام مط اوروبي', '70.00', '100.00', '4.50', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(33, '230 جرام بريستول ابيض', '70.00', '100.00', '3.60', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(34, '230 جرام بريستول ازرق', '70.00', '100.00', '3.75', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(35, '230 جرام لامع صيني', '70.00', '100.00', '2.70', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(36, '250 جرام بريستول', '70.00', '100.00', '4.25', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(37, '250 جرام بريستول كوشيه', '70.00', '100.00', '6.55', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(38, '250 جرام بريستول كوشيه فنلندي', '70.00', '100.00', '5.25', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(39, '250 جرام جاير لامع صيني', '66.00', '88.00', '5.05', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(40, '250 جرام دوبليكس', '70.00', '100.00', '3.95', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(41, '250 جرام لامع صيني', '70.00', '100.00', '5.95', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(42, '250 جرام مط اوروبي', '70.00', '100.00', '5.85', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(43, '250 جرام مط صيني', '70.00', '100.00', '5.89', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(44, '300 جرام بريستول ابيض', '70.00', '100.00', '5.00', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(45, '300 جرام بريستول كوشيه', '70.00', '100.00', '7.25', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(46, '300 جرام جاير لامع اوروبي', '66.00', '88.00', '5.95', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(47, '300 جرام جاير لامع صيني', '66.00', '88.00', '5.75', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(48, '300 جرام جاير مط اوروبي', '66.00', '88.00', '5.75', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(49, '300 جرام دوبليكس', '70.00', '100.00', '4.50', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(50, '300 جرام لامع اندونيسي', '70.00', '100.00', '6.75', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(51, '300 جرام لامع صيني', '70.00', '100.00', '7.05', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(52, '300 جرام مط صيني', '70.00', '100.00', '6.66', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(53, '350 جرام جاير لامع صيني', '66.00', '88.00', '6.00', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(54, '350 جرام دوبليكس', '70.00', '100.00', '4.25', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(55, '350 جرام لامع اندونيسي', '70.00', '100.00', '7.75', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(56, '350 جرام لامع اوروبي', '70.00', '100.00', '6.00', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(57, '350 جرام لامع صيني', '70.00', '100.00', '7.75', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(58, '350 جرام مط اوروبي', '70.00', '100.00', '7.81', 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(59, '350 جرام مط صيني', '70.00', '100.00', '8.10', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(60, '380 جرام لامع اوروبي', '70.00', '100.00', '7.80', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(61, '60 جرام جاير طبع', '60.00', '84.00', '0.90', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(62, '60 جرام طبع', '70.00', '100.00', '1.15', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(63, '70 جرام جاير طبع', '60.00', '84.00', '1.07', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(64, '70 جرام طبع', '70.00', '100.00', '1.31', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(65, '75 جرام ازوريه', '70.00', '100.00', '1.50', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(66, '80 جرام جاير طبع', '60.00', '84.00', '1.10', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(67, '80 جرام طبع سرينا', '70.00', '100.00', '1.54', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(68, 'استيكر ae', '70.00', '100.00', '6.08', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(69, 'استيكر اسباني', '70.00', '100.00', '10.25', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(70, 'كرفت', '85.00', '110.00', '1.55', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(71, 'كريمى', '70.00', '100.00', '3.20', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(72, 'مظروف غزاله عادي DL', '11.00', '22.00', '0.22', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(73, 'مظروف غزاله لزق ذاتي DL', '11.00', '22.00', '0.40', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(74, 'مكربن', NULL, NULL, '1.49', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(75, 'مكربن وسط', NULL, NULL, '1.68', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(76, 'ورق بورشمان', '70.00', '100.00', '1.25', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55'),
(77, 'ورق زبده', NULL, NULL, '0.85', 1, '2022-01-24 19:09:55', '2022-01-24 19:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `print_options`
--

CREATE TABLE `print_options` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `print_options`
--

INSERT INTO `print_options` (`id`, `name`, `price`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 'وجه فقط', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(2, 'وجه و ضهر', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(3, 'وجه و ضهر(1 لون)', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54'),
(4, 'وجه و ضهر(2 لون)', NULL, 1, '2022-01-24 19:09:54', '2022-01-24 19:09:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_color`
--
ALTER TABLE `category_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_finish_direction`
--
ALTER TABLE `category_finish_direction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_finish_option`
--
ALTER TABLE `category_finish_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_images`
--
ALTER TABLE `category_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_paper_size`
--
ALTER TABLE `category_paper_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_paper_type`
--
ALTER TABLE `category_paper_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_print_option`
--
ALTER TABLE `category_print_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `finish_directions`
--
ALTER TABLE `finish_directions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finish_options`
--
ALTER TABLE `finish_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_sizes`
--
ALTER TABLE `paper_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_types`
--
ALTER TABLE `paper_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print_options`
--
ALTER TABLE `print_options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category_color`
--
ALTER TABLE `category_color`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category_finish_direction`
--
ALTER TABLE `category_finish_direction`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_finish_option`
--
ALTER TABLE `category_finish_option`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_images`
--
ALTER TABLE `category_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_paper_size`
--
ALTER TABLE `category_paper_size`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category_paper_type`
--
ALTER TABLE `category_paper_type`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category_print_option`
--
ALTER TABLE `category_print_option`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finish_directions`
--
ALTER TABLE `finish_directions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `finish_options`
--
ALTER TABLE `finish_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paper_sizes`
--
ALTER TABLE `paper_sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `paper_types`
--
ALTER TABLE `paper_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `print_options`
--
ALTER TABLE `print_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
