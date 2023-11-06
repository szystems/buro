-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2023 a las 20:28:21
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbbocacostacafe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`, `updated_at`) VALUES
(123, 1, 2, 1, '2023-07-04 23:11:14', '2023-07-04 23:11:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Café Verde', 'Café-Verde', 'Nuestro café verde es uno de los mejores. Nuestras diferencias son frag, sabor, cuerpo, dulzura, taza limpia y uniformidad.', 1, 0, '1679521809.jpeg', '2023-03-23 03:50:09', '2023-05-31 18:18:59'),
(2, 'Café Oscuro', 'Café-Oscuro', 'Café claro, medio y oscuro. Nuestros catadores trabajan constantemente para mantener la calidad.', 1, 0, '1679522037.jpg', '2023-03-23 03:53:57', '2023-05-31 18:18:02'),
(3, 'Café saborizado', 'Café-Saborizado', 'De notas dulces y afrutadas. Sabor a chocolate y vainilla. Nuestros catadores trabajan constantemente para mantener la calidad.', 1, 0, '1679522091.jpg', '2023-03-23 03:54:51', '2023-05-31 18:18:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `currency` varchar(191) NOT NULL DEFAULT 'USD',
  `currency_simbol` varchar(191) NOT NULL DEFAULT '$',
  `tax_status` tinyint(4) NOT NULL DEFAULT 0,
  `tax` int(11) NOT NULL DEFAULT 0,
  `paypal` tinyint(4) NOT NULL DEFAULT 0,
  `dbt` tinyint(4) NOT NULL DEFAULT 0,
  `shipping_description` varchar(191) DEFAULT NULL,
  `shipping` decimal(11,2) NOT NULL DEFAULT 0.00,
  `email` varchar(50) DEFAULT NULL,
  `store` tinyint(4) NOT NULL,
  `shopify` tinyint(4) NOT NULL,
  `shopify_link` varchar(500) DEFAULT NULL,
  `amazon` tinyint(4) NOT NULL,
  `amazon_link` varchar(500) DEFAULT NULL,
  `advertisement` tinyint(4) NOT NULL DEFAULT 0,
  `advertisement_link` varchar(100) DEFAULT NULL,
  `advertisement_image` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configs`
--

INSERT INTO `configs` (`id`, `logo`, `currency`, `currency_simbol`, `tax_status`, `tax`, `paypal`, `dbt`, `shipping_description`, `shipping`, `email`, `store`, `shopify`, `shopify_link`, `amazon`, `amazon_link`, `advertisement`, `advertisement_link`, `advertisement_image`, `created_at`, `updated_at`) VALUES
(1, '1680564311.jpg', 'GTQ Q', 'Q', 1, 8, 0, 1, 'En las cabezas departamentales de Guatemala y Quetzaltenango el envió será completamente Gratis, el resto de departamentos y sus municipios tendrá un precio fijo de distribución.', '20.00', 'szotto18@hotmail.com', 1, 0, 'https://bocacosta-coffee.myshopify.com/', 0, 'https://www.amazon.com/Nespresso-Vertuoline-Seller-Assortment-Count/dp/B01N05APQY/ref=sr_1_1?crid=1HNJASS1G9KP2&keywords=bocacosta+coffee&qid=1682639321&sprefix=bocacosta+coffee%2Caps%2C137&sr=8-1', 0, 'https://bocacostacoffee.com/category', '1684881514.jpg', '2023-02-13 23:08:39', '2023-07-04 21:31:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_20_164418_create_categories_table', 2),
(6, '2022_12_22_174834_create_products_table', 3),
(7, '2022_12_28_175036_create_carts_table', 4),
(8, '2022_12_28_175319_create_carts_table', 5),
(9, '2023_01_09_173718_create_orders_table', 6),
(10, '2023_01_09_174317_create_order_items_table', 6),
(11, '2023_01_17_170939_create_wishlists_table', 7),
(12, '2023_01_30_154745_create_ratings_table', 8),
(13, '2023_01_31_172307_create_reviews_table', 9),
(14, '2023_02_13_224240_create_configs_table', 10),
(15, '2023_03_21_215853_add_timezone_field_to_users_table', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address1` varchar(191) NOT NULL,
  `address2` varchar(191) DEFAULT NULL,
  `city` varchar(191) NOT NULL,
  `state` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `zipcode` varchar(191) NOT NULL,
  `note` varchar(191) DEFAULT NULL,
  `total_tax` decimal(11,2) DEFAULT 0.00,
  `shipping` decimal(11,2) NOT NULL DEFAULT 0.00,
  `total_price` decimal(11,2) DEFAULT NULL,
  `payment_mode` varchar(191) DEFAULT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT '0',
  `tracking_no` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `zipcode`, `note`, `total_tax`, `shipping`, `total_price`, `payment_mode`, `payment_id`, `status`, `tracking_no`, `created_at`, `updated_at`) VALUES
(1, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '4.64', '0.00', '62.64', 'POD or DBT', NULL, '0', 'eshop2818', '2023-03-30 05:11:45', '2023-03-30 05:11:45'),
(2, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '10.72', '0.00', '144.72', 'POD or DBT', NULL, '1', 'eshop2710', '2023-03-31 22:37:12', '2023-04-01 00:19:08'),
(3, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '1.60', '0.00', '21.60', 'Paid by PayPal', '52U85030WA389600X', '0', 'eshop5214', '2023-04-01 00:32:35', '2023-04-01 00:32:35'),
(4, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '13.28', '0.00', '179.28', 'POD or DBT', NULL, '0', 'eshop6322', '2023-04-03 22:13:30', '2023-04-03 22:13:30'),
(5, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '3.60', '0.00', '48.60', 'POD or DBT', NULL, '0', 'eshop4953', '2023-04-03 23:38:04', '2023-04-03 23:38:04'),
(6, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '3.60', '0.00', '3.60', 'POD or DBT', NULL, '0', 'eshop8961', '2023-04-03 23:40:27', '2023-04-03 23:40:27'),
(7, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '3.44', '0.00', '46.44', 'POD or DBT', NULL, '0', 'eshop7710', '2023-04-03 23:41:18', '2023-04-03 23:41:18'),
(8, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '3.44', '0.00', '3.44', 'POD or DBT', NULL, '0', 'eshop4970', '2023-04-03 23:42:32', '2023-04-03 23:42:32'),
(9, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '3.44', '0.00', '3.44', 'POD or DBT', NULL, '0', 'eshop3625', '2023-04-03 23:43:00', '2023-04-03 23:43:00'),
(10, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '3.44', '0.00', '3.44', 'POD or DBT', NULL, '0', 'eshop1250', '2023-04-03 23:43:27', '2023-04-03 23:43:27'),
(11, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '3.44', '0.00', '46.44', 'POD or DBT', NULL, '0', 'eshop5807', '2023-04-03 23:44:15', '2023-04-03 23:44:15'),
(12, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '4.88', '0.00', '65.88', 'POD or DBT', NULL, '0', 'eshop6218', '2023-04-04 04:08:30', '2023-04-04 04:08:30'),
(13, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '8.00', '0.00', '108.00', 'POD or DBT', NULL, '0', 'eshop6581', '2023-04-04 04:11:44', '2023-04-04 04:11:44'),
(14, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '8.48', '0.00', '114.48', 'POD or DBT', NULL, '0', 'eshop5578', '2023-04-04 04:13:26', '2023-04-04 04:13:26'),
(15, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '8.48', '0.00', '8.48', 'POD or DBT', NULL, '0', 'eshop9348', '2023-04-04 04:13:54', '2023-04-04 04:13:54'),
(16, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '8.48', '0.00', '8.48', 'POD or DBT', NULL, '0', 'eshop2680', '2023-04-04 04:14:20', '2023-04-04 04:14:20'),
(17, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '8.48', '0.00', '8.48', 'POD or DBT', NULL, '0', 'eshop7743', '2023-04-04 04:14:30', '2023-04-04 04:14:30'),
(18, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '8.48', '0.00', '8.48', 'POD or DBT', NULL, '0', 'eshop3314', '2023-04-04 04:14:46', '2023-04-04 04:14:46'),
(19, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '6.32', '0.00', '85.32', 'POD or DBT', NULL, '0', 'eshop8288', '2023-04-04 04:16:43', '2023-04-04 04:16:43'),
(20, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '2.88', '0.00', '38.88', 'POD or DBT', NULL, '0', 'eshop1705', '2023-04-04 04:23:00', '2023-04-04 04:23:00'),
(21, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '4.88', '0.00', '65.88', 'POD or DBT', NULL, '0', 'eshop6283', '2023-04-04 04:33:06', '2023-04-04 04:33:06'),
(22, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '4.88', '0.00', '4.88', 'POD or DBT', NULL, '0', 'eshop5638', '2023-04-04 04:36:08', '2023-04-04 04:36:08'),
(23, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '4.48', '0.00', '60.48', 'POD or DBT', NULL, '0', 'eshop8979', '2023-04-04 04:43:38', '2023-04-04 04:43:38'),
(24, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '4.48', '0.00', '60.48', 'POD or DBT', NULL, '0', 'eshop7768', '2023-04-04 05:11:05', '2023-04-04 05:11:05'),
(25, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '4.64', '0.00', '62.64', 'POD or DBT', NULL, '0', 'eshop9814', '2023-04-04 05:13:45', '2023-04-04 05:13:45'),
(26, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '4.80', '0.00', '64.80', 'POD or DBT', NULL, '0', 'eshop2410', '2023-04-04 05:26:07', '2023-04-04 05:26:07'),
(27, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '3.44', '0.00', '46.44', 'POD or DBT', NULL, '0', 'eshop3059', '2023-04-04 05:31:25', '2023-04-04 05:31:25'),
(28, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '2.00', '0.00', '27.00', 'POD or DBT', NULL, '0', 'eshop4407', '2023-04-04 05:34:25', '2023-04-04 05:34:25'),
(29, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '2.00', '0.00', '2.00', 'POD or DBT', NULL, '0', 'eshop4967', '2023-04-04 05:37:19', '2023-04-04 05:37:19'),
(30, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '3.20', '0.00', '43.20', 'POD or DBT', NULL, '0', 'eshop8243', '2023-04-04 21:45:02', '2023-04-04 21:45:02'),
(31, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '3.20', '0.00', '3.20', 'POD or DBT', NULL, '0', 'eshop6667', '2023-04-04 21:45:06', '2023-04-04 21:45:06'),
(32, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '2.88', '0.00', '38.88', 'POD or DBT', NULL, '0', 'eshop5731', '2023-04-04 21:47:15', '2023-04-04 21:47:15'),
(33, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '3.04', '0.00', '41.04', 'POD or DBT', NULL, '0', 'eshop2518', '2023-04-04 21:50:27', '2023-04-04 21:50:27'),
(34, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '3.44', '0.00', '46.44', 'POD or DBT', NULL, '1', 'eshop7941', '2023-04-05 03:11:32', '2023-04-19 04:04:00'),
(35, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'California', 'EEUU', '90802', NULL, '2.00', '0.00', '27.00', 'Paid by PayPal', '2G5545708S484203A', '2', 'eshop6126', '2023-04-05 03:57:17', '2023-04-05 04:16:57'),
(36, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'CA California', 'United States', '90802', NULL, '7.84', '0.00', '105.84', 'POD or DBT', NULL, '0', 'eshop2249', '2023-04-26 21:42:50', '2023-04-26 21:42:50'),
(37, '17', 'Francisco', 'Szarata', 'szotto18@hotmail.com', '+50242153288', 'y 1120 e 2nd st apt 12', NULL, 'long beach', 'CA California', 'United States', '90802', NULL, '12.48', '0.00', '168.48', 'POD or DBT', NULL, '0', 'eshop5051', '2023-04-26 22:16:19', '2023-04-26 22:16:19'),
(38, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Long Beach', 'CA California', 'United States', '90802', NULL, '0.00', '0.00', '40.00', 'POD or DBT', NULL, '0', 'eshop5352', '2023-06-16 22:27:46', '2023-06-16 22:27:46'),
(39, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Quetzaltenango', 'Quetzaltenango', 'Guatemala', '09001', NULL, '16.00', '0.00', '216.00', 'POD or DBT', NULL, '0', 'eshop3442', '2023-07-04 17:17:15', '2023-07-04 17:17:15'),
(40, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Quetzaltenango', 'Quetzaltenango', 'Guatemala', '09001', NULL, '16.00', '0.00', '16.00', 'POD or DBT', NULL, '0', 'eshop8236', '2023-07-04 17:17:21', '2023-07-04 17:17:21'),
(41, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Quetzaltenango', 'Quetzaltenango', 'Guatemala', '09001', NULL, '6.40', '0.00', '86.40', 'POD or DBT', NULL, '0', 'eshop5919', '2023-07-04 17:19:34', '2023-07-04 17:19:34'),
(42, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Almolonga', 'Quetzaltenango', 'Guatemala', '09001', NULL, '6.24', '20.00', '84.24', 'POD or DBT', NULL, '0', 'eshop7108', '2023-07-04 17:22:00', '2023-07-04 17:22:00'),
(43, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Almolonga', 'Quetzaltenango', 'Guatemala', '09001', NULL, '0.00', '20.00', '65.00', 'POD or DBT', NULL, '0', 'eshop6636', '2023-07-04 17:35:56', '2023-07-04 17:35:56'),
(44, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Quetzaltenango', 'Quetzaltenango', 'Guatemala', '09001', NULL, '0.00', '0.00', '38.00', 'POD or DBT', NULL, '0', 'eshop9872', '2023-07-04 17:38:57', '2023-07-04 17:38:57'),
(45, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Almolonga', 'Quetzaltenango', 'Guatemala', '09001', NULL, '7.20', '20.00', '97.20', 'POD or DBT', NULL, '0', 'eshop6987', '2023-07-04 17:48:58', '2023-07-04 17:48:58'),
(46, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Quetzaltenango', 'Quetzaltenango', 'Guatemala', '09001', NULL, '4.80', '0.00', '64.80', 'POD or DBT', NULL, '0', 'eshop2013', '2023-07-04 17:50:54', '2023-07-04 17:50:54'),
(47, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Quetzaltenango', 'Quetzaltenango', 'Guatemala', '09001', NULL, '0.00', '0.00', '54.00', 'POD or DBT', NULL, '0', 'eshop9436', '2023-07-04 17:52:36', '2023-07-04 17:52:36'),
(48, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Quetzaltenango', 'Quetzaltenango', 'Guatemala', '09001', NULL, '0.00', '0.00', '20.00', 'POD or DBT', NULL, '0', 'eshop5164', '2023-07-04 21:30:56', '2023-07-04 21:30:56'),
(49, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', '1120 e 2nd st apt 12', 'Diagonal 2 32-22 zona 3', 'Ostuncalco', 'Quetzaltenango', 'Guatemala', '09001', NULL, '4.80', '20.00', '64.80', 'Paid by PayPal', '0F219926FM1878347', '1', 'eshop6117', '2023-07-04 21:45:27', '2023-07-04 21:54:18'),
(50, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', 'Diagonal 2 32-22 zona 3', 'Diagonal 2 32-22 zona 3 2', 'Quetzaltenango', 'Quetzaltenango', 'Guatemala', '09001', NULL, '8.64', '0.00', '116.64', 'POD or DBT', NULL, '0', 'eshop5081', '2023-07-04 22:34:43', '2023-07-04 22:34:43'),
(51, '1', 'Otto', 'Szarata', 'szystems@hotmail.com', '42153288', 'Diagonal 2 32-22 zona 3', 'Diagonal 2 32-22 zona 3 2', 'Cajolá', 'Quetzaltenango', 'Guatemala', '09001', NULL, '9.60', '20.00', '129.60', 'Paid by PayPal', '6MF446460R603271Y', '0', 'eshop6877', '2023-07-04 22:55:17', '2023-07-04 22:55:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `discount` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '20.00', 0, '2023-03-30 05:11:45', '2023-03-30 05:11:45'),
(2, 1, 1, 1, '18.00', 1, '2023-03-30 05:11:45', '2023-03-30 05:11:45'),
(3, 1, 3, 1, '20.00', 0, '2023-03-30 05:11:45', '2023-03-30 05:11:45'),
(4, 2, 2, 2, '20.00', 0, '2023-03-31 22:37:12', '2023-03-31 22:37:12'),
(5, 2, 1, 3, '18.00', 1, '2023-03-31 22:37:12', '2023-03-31 22:37:12'),
(6, 2, 3, 2, '20.00', 0, '2023-03-31 22:37:12', '2023-03-31 22:37:12'),
(7, 3, 2, 1, '20.00', 0, '2023-04-01 00:32:35', '2023-04-01 00:32:35'),
(8, 4, 6, 2, '18.00', 1, '2023-04-03 22:13:30', '2023-04-03 22:13:30'),
(9, 4, 5, 2, '20.00', 1, '2023-04-03 22:13:30', '2023-04-03 22:13:30'),
(10, 4, 2, 2, '20.00', 0, '2023-04-03 22:13:30', '2023-04-03 22:13:30'),
(11, 4, 4, 2, '25.00', 0, '2023-04-03 22:13:30', '2023-04-03 22:13:30'),
(12, 5, 4, 1, '25.00', 0, '2023-04-03 23:38:04', '2023-04-03 23:38:04'),
(13, 5, 5, 1, '20.00', 1, '2023-04-03 23:38:04', '2023-04-03 23:38:04'),
(14, 7, 4, 1, '25.00', 0, '2023-04-03 23:41:18', '2023-04-03 23:41:18'),
(15, 7, 6, 1, '18.00', 1, '2023-04-03 23:41:18', '2023-04-03 23:41:18'),
(16, 11, 4, 1, '25.00', 0, '2023-04-03 23:44:15', '2023-04-03 23:44:15'),
(17, 11, 6, 1, '18.00', 1, '2023-04-03 23:44:15', '2023-04-03 23:44:15'),
(18, 12, 4, 1, '25.00', 0, '2023-04-04 04:08:30', '2023-04-04 04:08:30'),
(19, 12, 6, 2, '18.00', 1, '2023-04-04 04:08:30', '2023-04-04 04:08:30'),
(20, 13, 2, 1, '20.00', 0, '2023-04-04 04:11:44', '2023-04-04 04:11:44'),
(21, 13, 5, 4, '20.00', 1, '2023-04-04 04:11:44', '2023-04-04 04:11:44'),
(22, 14, 5, 1, '20.00', 1, '2023-04-04 04:13:26', '2023-04-04 04:13:26'),
(23, 14, 6, 2, '18.00', 1, '2023-04-04 04:13:26', '2023-04-04 04:13:26'),
(24, 14, 4, 2, '25.00', 0, '2023-04-04 04:13:26', '2023-04-04 04:13:26'),
(25, 19, 4, 1, '25.00', 0, '2023-04-04 04:16:43', '2023-04-04 04:16:43'),
(26, 19, 1, 1, '18.00', 1, '2023-04-04 04:16:43', '2023-04-04 04:16:43'),
(27, 19, 6, 2, '18.00', 1, '2023-04-04 04:16:43', '2023-04-04 04:16:43'),
(28, 20, 6, 2, '18.00', 1, '2023-04-04 04:23:00', '2023-04-04 04:23:00'),
(29, 21, 6, 2, '18.00', 1, '2023-04-04 04:33:06', '2023-04-04 04:33:06'),
(30, 21, 4, 1, '25.00', 0, '2023-04-04 04:33:06', '2023-04-04 04:33:06'),
(31, 23, 2, 1, '20.00', 0, '2023-04-04 04:43:38', '2023-04-04 04:43:38'),
(32, 23, 6, 2, '18.00', 1, '2023-04-04 04:43:38', '2023-04-04 04:43:38'),
(33, 24, 2, 1, '20.00', 0, '2023-04-04 05:11:05', '2023-04-04 05:11:05'),
(34, 24, 1, 2, '18.00', 1, '2023-04-04 05:11:05', '2023-04-04 05:11:05'),
(35, 25, 1, 1, '18.00', 1, '2023-04-04 05:13:45', '2023-04-04 05:13:45'),
(36, 25, 5, 2, '20.00', 1, '2023-04-04 05:13:45', '2023-04-04 05:13:45'),
(37, 26, 5, 2, '20.00', 1, '2023-04-04 05:26:07', '2023-04-04 05:26:07'),
(38, 26, 2, 1, '20.00', 0, '2023-04-04 05:26:07', '2023-04-04 05:26:07'),
(39, 27, 4, 1, '25.00', 0, '2023-04-04 05:31:25', '2023-04-04 05:31:25'),
(40, 27, 1, 1, '18.00', 1, '2023-04-04 05:31:25', '2023-04-04 05:31:25'),
(41, 28, 4, 1, '25.00', 0, '2023-04-04 05:34:25', '2023-04-04 05:34:25'),
(42, 30, 2, 2, '20.00', 0, '2023-04-04 21:45:02', '2023-04-04 21:45:02'),
(43, 32, 1, 1, '18.00', 1, '2023-04-04 21:47:15', '2023-04-04 21:47:15'),
(44, 32, 6, 1, '18.00', 1, '2023-04-04 21:47:15', '2023-04-04 21:47:15'),
(45, 33, 2, 1, '20.00', 0, '2023-04-04 21:50:27', '2023-04-04 21:50:27'),
(46, 33, 1, 1, '18.00', 1, '2023-04-04 21:50:27', '2023-04-04 21:50:27'),
(47, 34, 6, 1, '18.00', 1, '2023-04-05 03:11:32', '2023-04-05 03:11:32'),
(48, 34, 4, 1, '25.00', 0, '2023-04-05 03:11:32', '2023-04-05 03:11:32'),
(49, 35, 4, 1, '25.00', 0, '2023-04-05 03:57:17', '2023-04-05 03:57:17'),
(50, 36, 5, 2, '20.00', 1, '2023-04-26 21:42:50', '2023-04-26 21:42:50'),
(51, 36, 3, 2, '20.00', 0, '2023-04-26 21:42:50', '2023-04-26 21:42:50'),
(52, 36, 6, 1, '18.00', 1, '2023-04-26 21:42:50', '2023-04-26 21:42:50'),
(53, 37, 1, 1, '18.00', 1, '2023-04-26 22:16:19', '2023-04-26 22:16:19'),
(54, 37, 6, 1, '18.00', 1, '2023-04-26 22:16:19', '2023-04-26 22:16:19'),
(55, 37, 2, 6, '20.00', 0, '2023-04-26 22:16:19', '2023-04-26 22:16:19'),
(56, 38, 3, 2, '20.00', 0, '2023-06-16 22:27:46', '2023-06-16 22:27:46'),
(57, 39, 2, 10, '20.00', 0, '2023-07-04 17:17:15', '2023-07-04 17:17:15'),
(58, 41, 3, 1, '20.00', 0, '2023-07-04 17:19:34', '2023-07-04 17:19:34'),
(59, 41, 2, 3, '20.00', 0, '2023-07-04 17:19:34', '2023-07-04 17:19:34'),
(60, 42, 3, 1, '20.00', 0, '2023-07-04 17:22:00', '2023-07-04 17:22:00'),
(61, 42, 5, 1, '20.00', 1, '2023-07-04 17:22:00', '2023-07-04 17:22:00'),
(62, 42, 1, 1, '18.00', 1, '2023-07-04 17:22:00', '2023-07-04 17:22:00'),
(63, 43, 3, 1, '20.00', 0, '2023-07-04 17:35:56', '2023-07-04 17:35:56'),
(64, 43, 4, 1, '25.00', 0, '2023-07-04 17:35:56', '2023-07-04 17:35:56'),
(65, 44, 3, 1, '20.00', 0, '2023-07-04 17:38:57', '2023-07-04 17:38:57'),
(66, 44, 1, 1, '18.00', 1, '2023-07-04 17:38:57', '2023-07-04 17:38:57'),
(67, 45, 3, 1, '20.00', 0, '2023-07-04 17:48:58', '2023-07-04 17:48:58'),
(68, 45, 4, 2, '25.00', 0, '2023-07-04 17:48:58', '2023-07-04 17:48:58'),
(69, 46, 2, 1, '20.00', 0, '2023-07-04 17:50:54', '2023-07-04 17:50:54'),
(70, 46, 3, 2, '20.00', 0, '2023-07-04 17:50:54', '2023-07-04 17:50:54'),
(71, 47, 1, 1, '18.00', 1, '2023-07-04 17:52:36', '2023-07-04 17:52:36'),
(72, 47, 6, 2, '18.00', 1, '2023-07-04 17:52:36', '2023-07-04 17:52:36'),
(73, 48, 3, 1, '20.00', 0, '2023-07-04 21:30:56', '2023-07-04 21:30:56'),
(74, 49, 3, 1, '20.00', 0, '2023-07-04 21:45:27', '2023-07-04 21:45:27'),
(75, 49, 2, 1, '20.00', 0, '2023-07-04 21:45:27', '2023-07-04 21:45:27'),
(76, 50, 1, 6, '18.00', 1, '2023-07-04 22:34:43', '2023-07-04 22:34:43'),
(77, 51, 5, 5, '20.00', 1, '2023-07-04 22:55:17', '2023-07-04 22:55:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('szystems@hotmail.com', '$2y$10$Bu8drX6SQ0A6Aklz4g2DT.MmaQZQRjEm0zqtRn8dTdm9eaYNmNzce', '2023-04-03 22:36:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `code` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `original_price` varchar(191) NOT NULL,
  `selling_price` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `tax` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `discount` tinyint(4) NOT NULL,
  `shopify_link` varchar(500) DEFAULT NULL,
  `amazon_link` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `cate_id`, `code`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `tax`, `status`, `trending`, `discount`, `shopify_link`, `amazon_link`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Café Verde', 'Café-Verde', 'Nuestro café verde es uno de los mejores, siempre con la mejor calidad del mercado. Nuestras diferencias son frag, sabor, cuerpo, dulzura, taza limpia y uniformidad.', 'Nuestro café verde es uno de los mejores, siempre con la mejor calidad del mercado. Nuestras diferencias son frag, sabor, cuerpo, dulzura, taza limpia y uniformidad. Nuestros catadores trabajan constantemente para mantener la calidad.', '20', '18', '1679522223.jpeg', 979, NULL, 1, 1, 1, NULL, NULL, '2023-03-23 03:57:03', '2023-07-04 22:34:43'),
(2, 2, NULL, 'Café tostado ligero', 'Café-Tostado-Ligero', 'Cuerpo ligero y notas dulces.', 'Cuerpo ligero y notas dulces. Nuestros catadores trabajan constantemente para mantener la calidad.', '20', '18', '1679522278.jpg', 966, NULL, 1, 1, 0, NULL, NULL, '2023-03-23 03:57:58', '2023-07-04 21:45:27'),
(3, 2, NULL, 'Café de tueste medio', 'Café-De-Tueste-Medio', 'Notas equilibrados y ricos con un poco más de cuerpo.', 'Notas equilibradas y ricas con un poco más de cuerpo. Nuestros catadores trabajan constantemente para mantener la calidad.', '20', '18', '1679522332.jpg', 984, NULL, 1, 1, 0, NULL, NULL, '2023-03-23 03:58:52', '2023-07-04 21:45:27'),
(4, 2, NULL, 'Café tostado oscuro', 'Café-Tostado-Oscuro', 'Notas fuertes, cuerpo duro.', 'Notas fuertes, cuerpo duro. Nuestros catadores trabajan constantemente para mantener la calidad.', '25', '20', '1679522399.jpg', 983, NULL, 1, 1, 0, 'https://bocacosta-coffee.myshopify.com/products/bocacosta-coffee-dark-roast-whole-bean-ground', 'https://www.amazon.com/AmazonFresh-Bright-Ground-Coffee-Light/dp/B0721BFMTQ/ref=sr_1_1_ffob_sspa?crid=3MVSTLWZ6LBZF&keywords=coffee&qid=1682641216&sprefix=coffee%2Caps%2C136&sr=8-1-spons&spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUExTk1HWlpQVjA2SlU4JmVuY3J5cHRlZElkPUEwOTc0MjY4MzM4SVRTWE0xWkxRWiZlbmNyeXB0ZWRBZElkPUEwNDc5NTQ2MjJJQUJPS1gwWE1TSCZ3aWRnZXROYW1lPXNwX2F0ZiZhY3Rpb249Y2xpY2tSZWRpcmVjdCZkb05vdExvZ0NsaWNrPXRydWU&th=1', '2023-03-23 03:59:59', '2023-07-04 17:48:58'),
(5, 3, NULL, 'Café con sabor a vainilla', 'Café-Con-Sabor-A-Vainilla', 'De notas dulces y afrutadas. Sabor a vainilla.', 'De notas dulces y afrutadas. Sabor a vainilla. Nuestros catadores trabajan constantemente para mantener la calidad.', '25', '20', '1679522450.jpg', 980, NULL, 1, 1, 1, NULL, NULL, '2023-03-23 04:00:50', '2023-07-04 22:55:17'),
(6, 3, NULL, 'Café con sabor a chocolate', 'Café-Con-Sabor-A-Chocolate', 'De notas dulces y afrutadas. Sabor a chocolate.', 'De notas dulces y afrutadas. Sabor a chocolate. Nuestros catadores trabajan constantemente para mantener la calidad.', '23', '18', '1679522499.jpg', 978, NULL, 1, 0, 1, NULL, NULL, '2023-03-23 04:01:39', '2023-07-04 17:52:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `stars_rated` int(11) NOT NULL,
  `review` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `lname` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address1` varchar(191) DEFAULT NULL,
  `address2` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `zipcode` varchar(191) DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `principal` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `timezone` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `lname`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `zipcode`, `role_as`, `status`, `principal`, `remember_token`, `created_at`, `updated_at`, `timezone`) VALUES
(1, 'Otto Szarata', 'szystems@hotmail.com', NULL, '$2y$10$kdmLU.0IgcTI/K96fCWlXecz6AUGboIQHYj8FtlaoG0CLTx4FHhu6', '', '42153288', 'Diagonal 2 32-22 zona 3', 'Diagonal 2 32-22 zona 3 2', 'Cajolá', 'Quetzaltenango', 'Guatemala', '09001', 1, 1, 1, 'Evlbdf5hThX8Jz0jis2buOYgsZxz3NjrKJzHr5VuFHYmzSkGGaaxSNDzQYxh', '2022-12-17 00:25:50', '2023-07-04 22:55:17', NULL),
(15, 'otencio szarata', 'otencio@gmail.com', NULL, '$2y$10$1hPN8lRQJOjCrSj6knAX/eo.PqqzPGQKGzi9kX.vxVnKybkxdow62', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, NULL, '2023-03-24 23:12:30', '2023-03-24 23:12:30', 'America/Guatemala'),
(16, 'Jorge daga', 'jorge@hotmail.com', NULL, '$2y$10$slqQsPxzTd9iw4YHcvCpUejxyyLg60jOpEWxKRoAYZGhb72fGBFnK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, NULL, '2023-04-25 22:40:18', '2023-04-25 22:40:18', NULL),
(17, 'Abril Calderon', 'acalderon@gmail.com', NULL, '$2y$10$eDkMvC55Gv6IdBwxG0EJDOSiu4C87jd7WjtU.VvEJDCtZHrq8Oy0O', NULL, '+50242153288', 'y 1120 e 2nd st apt 12', NULL, 'Guatemala', 'Guatemala', 'Guatemala', '09001', 0, 1, 0, NULL, '2023-04-26 21:47:42', '2023-07-03 21:58:55', NULL),
(18, 'Francisco Szarata', 'szotto18@hotmail.com', NULL, 'eshop7004', NULL, NULL, '343srtsdrt', NULL, 'Cantel', 'Quetzaltenango', 'Guatemala', '09001', 0, 1, 0, NULL, '2023-04-26 22:36:52', '2023-07-03 21:59:22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `prod_id`, `created_at`, `updated_at`) VALUES
(24, 17, 4, '2023-04-26 22:09:12', '2023-04-26 22:09:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
