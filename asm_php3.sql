-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 03, 2024 lúc 06:30 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm_php3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `urlCategory` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `keywords`, `urlCategory`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(8, 'Đồ nam', 'quần áo nam bao gồm Áo sơ mi ,  Áo thun , Quần jeans , Quần âu , Áo khoác , Đồ thể thao , Đồ lót', 'nam', 'do-nam', 0, 0, '2024-07-30 23:15:18', '2024-07-30 23:17:13'),
(9, 'Đồ nữ', 'Đồ nữa bao gồm  Váy đầm , Áo sơ mi  , Áo thun ,Quần jeans ,Quần legging, Áo khoác, Đồ thể thao ,Đồ lót', 'nu', 'do-nu', 0, 0, '2024-07-30 23:16:54', '2024-07-30 23:16:54'),
(10, 'Trẻ em', 'Đồ em em gồm  Áo thun, Quần short ,Váy, Áo khoác, Đồ bộ', 'tre em', 'tre-em', 0, 0, '2024-07-30 23:18:00', '2024-07-30 23:18:00'),
(11, 'Phụ kiện', 'Đồ phụ kiện nhiều đồ đẹp', 'phu kien', 'phu-kien', 0, 0, '2024-07-30 23:18:48', '2024-07-30 23:18:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `name`, `code`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Xanh', '#0e9d0c', 0, 1, '2024-07-24 15:37:23', '2024-08-02 04:55:44'),
(2, 'Vàng', '#edfd77', 0, 0, '2024-07-24 15:38:14', '2024-07-25 14:17:58'),
(3, 'Đen', 'LP05', 0, 1, '2024-07-24 15:39:19', '2024-07-24 15:39:22'),
(4, 'Tím', '#7f22aa', 0, 0, '2024-07-24 15:42:02', '2024-07-24 15:42:02'),
(5, 'Đen', '#000000', 0, 0, '2024-07-31 08:27:03', '2024-07-31 08:27:03'),
(6, 'Trắng', '#ffffff', 0, 0, '2024-07-31 08:27:18', '2024-07-31 08:27:18'),
(7, 'Xanh da trời', '#4fb7e3', 0, 0, '2024-07-31 08:32:18', '2024-07-31 08:32:18'),
(8, 'Xám', '#c9c9c9', 0, 0, '2024-07-31 11:41:38', '2024-07-31 11:41:38'),
(9, 'Nâu nhạt', '#b19191', 0, 0, '2024-07-31 11:42:49', '2024-07-31 11:42:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount_code`
--

CREATE TABLE `discount_code` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `percent_amount` varchar(255) DEFAULT NULL,
  `expridate` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `discount_code`
--

INSERT INTO `discount_code` (`id`, `name`, `type`, `percent_amount`, `expridate`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'giam gia 344', 'Percent', '15', '2024-08-03', 0, 0, '2024-08-02 04:51:21', '2024-08-02 05:01:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_17_145526_create_category_table', 2),
(6, '2024_07_17_152220_create_categories_table', 3),
(7, '2024_07_18_061530_change_categories', 4),
(8, '2024_07_18_073203_create_subcategories_table', 5),
(9, '2024_07_18_073610_change_foreign_subcategories_table', 6),
(10, '2024_07_24_085846_change_foreign_products_table', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_code` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address_one` varchar(255) DEFAULT NULL,
  `address_two` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `payment_method` varchar(25) DEFAULT NULL,
  `discount_amount` varchar(255) NOT NULL DEFAULT '0',
  `discount_code` varchar(255) DEFAULT NULL,
  `total_amount` varchar(25) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `is_payment` tinyint(4) NOT NULL DEFAULT 0,
  `payment_data` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_code`, `first_name`, `last_name`, `address_one`, `address_two`, `phone`, `email`, `note`, `payment_method`, `discount_amount`, `discount_code`, `total_amount`, `status`, `is_delete`, `is_payment`, `payment_data`, `created_at`, `updated_at`) VALUES
(55, 29, NULL, 'uyen', 'pham', 'tesst', 'tesst', '0346795326', 'admin@gmail.com', 'dfghj', 'paypal', '0', '', '250000', 0, 0, 0, NULL, '2024-08-03 15:02:21', '2024-08-03 15:02:21'),
(56, 29, NULL, 'uyen', 'pham', 'dd', 'dd', '0346795326', 'admin@gmail.com', 'dd', 'paypal', '0', '', '250000', 0, 0, 0, NULL, '2024-08-03 15:03:09', '2024-08-03 15:03:09'),
(57, 29, NULL, 'uyen', 'pham', 'sdfgh', 'sdfg', '0346795326', 'hihi012@gmail.com', 'sdfghj', 'paypal', '0', '', '114000', 0, 0, 0, NULL, '2024-08-03 15:08:53', '2024-08-03 15:08:53'),
(58, 29, NULL, 'uyen', 'pham', 'sdfgh', 'sdfg', '0346795326', 'hihi012@gmail.com', 'sdfghj', 'paypal', '0', '', '114000', 0, 0, 0, NULL, '2024-08-03 15:24:13', '2024-08-03 15:24:13'),
(59, 29, NULL, 'uyen', 'pham', 'tesst', 'hi', '0346795326', 'uyen@gmail.com', 'dfghj', 'paypal', '0', '', '114000', 0, 0, 0, NULL, '2024-08-03 15:27:22', '2024-08-03 15:27:22'),
(60, 29, NULL, 'uyen', 'pham', 'tesst', 'hi', '0346795326', 'uyen@gmail.com', 'dfghj', 'paypal', '0', '', '114000', 0, 0, 0, NULL, '2024-08-03 15:37:59', '2024-08-03 15:37:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` varchar(255) NOT NULL DEFAULT '0',
  `color_name` varchar(255) NOT NULL,
  `size_name` varchar(255) DEFAULT NULL,
  `size_amount` varchar(255) DEFAULT '0',
  `total_price` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `quantity`, `price`, `color_name`, `size_name`, `size_amount`, `total_price`, `created_at`, `updated_at`) VALUES
(6, 8, 7, 3, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 04:40:43', '2024-08-03 04:40:43'),
(7, 9, 10, 1, '225000', 'Nâu nhạt', 'freeSize', '0', '225000', '2024-08-03 05:19:25', '2024-08-03 05:19:25'),
(8, 10, 10, 1, '225000', 'Nâu nhạt', 'freeSize', '0', '225000', '2024-08-03 05:25:16', '2024-08-03 05:25:16'),
(9, 11, 10, 1, '225000', 'Nâu nhạt', 'freeSize', '0', '225000', '2024-08-03 05:26:24', '2024-08-03 05:26:24'),
(10, 12, 10, 1, '225000', 'Nâu nhạt', 'freeSize', '0', '225000', '2024-08-03 05:59:01', '2024-08-03 05:59:01'),
(11, 12, 7, 2, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 05:59:01', '2024-08-03 05:59:01'),
(12, 16, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 06:02:59', '2024-08-03 06:02:59'),
(13, 17, 10, 3, '225000', 'Trắng', 'freeSize', '0', '225000', '2024-08-03 06:07:24', '2024-08-03 06:07:24'),
(14, 18, 7, 2, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 07:00:27', '2024-08-03 07:00:27'),
(15, 19, 7, 2, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 08:24:28', '2024-08-03 08:24:28'),
(16, 20, 7, 2, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 08:24:40', '2024-08-03 08:24:40'),
(17, 21, 7, 2, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 08:24:57', '2024-08-03 08:24:57'),
(18, 22, 7, 2, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 08:26:53', '2024-08-03 08:26:53'),
(19, 23, 7, 2, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 08:30:13', '2024-08-03 08:30:13'),
(20, 24, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 08:30:49', '2024-08-03 08:30:49'),
(21, 25, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 08:48:28', '2024-08-03 08:48:28'),
(22, 26, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 08:56:10', '2024-08-03 08:56:10'),
(23, 27, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 08:57:12', '2024-08-03 08:57:12'),
(24, 28, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 09:49:23', '2024-08-03 09:49:23'),
(25, 29, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 09:49:46', '2024-08-03 09:49:46'),
(26, 30, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 09:49:55', '2024-08-03 09:49:55'),
(27, 31, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 09:54:44', '2024-08-03 09:54:44'),
(28, 32, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 09:57:26', '2024-08-03 09:57:26'),
(29, 33, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 09:57:52', '2024-08-03 09:57:52'),
(30, 34, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 10:06:39', '2024-08-03 10:06:39'),
(31, 35, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 10:10:18', '2024-08-03 10:10:18'),
(32, 36, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 10:10:55', '2024-08-03 10:10:55'),
(33, 37, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 10:11:31', '2024-08-03 10:11:31'),
(34, 38, 7, 1, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 10:11:55', '2024-08-03 10:11:55'),
(35, 42, 8, 1, '89000', 'Xanh da trời', 'S(39-45kg)', '0', '89000', '2024-08-03 10:15:10', '2024-08-03 10:15:10'),
(36, 43, 8, 1, '89000', 'Xanh da trời', 'S(39-45kg)', '0', '89000', '2024-08-03 10:15:39', '2024-08-03 10:15:39'),
(37, 44, 8, 1, '89000', 'Xanh da trời', 'S(39-45kg)', '0', '89000', '2024-08-03 10:15:53', '2024-08-03 10:15:53'),
(38, 45, 8, 1, '89000', 'Xanh da trời', 'S(39-45kg)', '0', '89000', '2024-08-03 10:23:27', '2024-08-03 10:23:27'),
(39, 46, 8, 1, '89000', 'Xanh da trời', 'S(39-45kg)', '0', '89000', '2024-08-03 11:45:49', '2024-08-03 11:45:49'),
(40, 47, 8, 1, '89000', 'Xanh da trời', 'S(39-45kg)', '0', '89000', '2024-08-03 11:52:30', '2024-08-03 11:52:30'),
(41, 48, 7, 2, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 11:53:30', '2024-08-03 11:53:30'),
(42, 49, 7, 2, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 12:01:07', '2024-08-03 12:01:07'),
(43, 50, 7, 2, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 12:03:53', '2024-08-03 12:03:53'),
(44, 51, 7, 2, '105000', 'Trắng', 'S', '5000', '105000', '2024-08-03 12:09:55', '2024-08-03 12:09:55'),
(45, 52, 9, 1, '125000', 'Nâu nhạt', 'M', '0', '125000', '2024-08-03 12:11:10', '2024-08-03 12:11:10'),
(46, 53, 9, 3, '125000', 'Xám', 'M', '0', '125000', '2024-08-03 13:59:06', '2024-08-03 13:59:06'),
(47, 54, 9, 3, '125000', 'Xám', 'M', '0', '125000', '2024-08-03 14:02:53', '2024-08-03 14:02:53'),
(48, 55, 10, 1, '225000', 'Nâu nhạt', 'freeSize', '0', '225000', '2024-08-03 15:02:21', '2024-08-03 15:02:21'),
(49, 56, 10, 1, '225000', 'Nâu nhạt', 'freeSize', '0', '225000', '2024-08-03 15:03:09', '2024-08-03 15:03:09'),
(50, 57, 8, 1, '89000', 'Trắng', 'S(39-45kg)', '0', '89000', '2024-08-03 15:08:53', '2024-08-03 15:08:53'),
(51, 58, 8, 1, '89000', 'Trắng', 'S(39-45kg)', '0', '89000', '2024-08-03 15:24:13', '2024-08-03 15:24:13'),
(52, 59, 8, 1, '89000', 'Trắng', 'S(39-45kg)', '0', '89000', '2024-08-03 15:27:22', '2024-08-03 15:27:22'),
(53, 60, 8, 1, '89000', 'Trắng', 'S(39-45kg)', '0', '89000', '2024-08-03 15:37:59', '2024-08-03 15:37:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `old_price` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `sub_category_id`, `code`, `url`, `price`, `old_price`, `description`, `short_description`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(6, 'Váy Babydoll', 9, 13, 'V01', 'vay-babydoll', 175000, 210000, 'Hàng bên Viivu tự sản xuất, tất cả đều được may đa phần 2 lớp cao cấp nhưng giá cực kì hạt dẻ. Các nàng nào ủng hộ shop lâu đều tin tưởng nè. Nàng chỉ cần mặc đẹp còn lại để Viivu lo\r\nTHÔNG TIN MÔ TẢ: \r\nVáy nữ trễ vai , Váy babydoll trễ vai thắt nơ bồng xòe freesize từ 40kg đến 60kg\r\nV1 <95cm\r\nV2 <75cm\r\nV3 <95cm\r\nCân nặng mặc đẹp: 43-50kg (chiều cao cân đối)\r\nChất liệu: Voan không châm chích, có lót\r\nChiều dài: 70cm\r\nĐộ rộng ngang vai: 40cm ( chưa giãn)\r\nĐộ rộng ngang ngực: 94cm\r\nRộng tùng váy 125cm\r\n** LƯU Ý\r\n. Khi sử dụng sản phẩm quý khách cần LƯU Ý một số điều quan trọng:\r\n. Khi sử dụng, quý khách hãy giặt sản phẩm trước để loại bỏ bất kỳ bụi bẩn. \r\n. Quý khách có thể giặt bằng tay và hạn chế giặt bằng máy giặt hay dùng chất tẩy rửa giúp shop nhé để bảo vệ chất lượng của sản phẩm tốt hơn ạ\r\n. Ngoài ra, hãy lưu ý tránh giặt sản phẩm với các quần áo khác để tránh màu phai và hãy giữ sản phẩm ở nơi khô ráo, thoáng mát để đảm bảo độ bền.\r\n\r\n** Quy cách đổi trả:\r\n-	Khách nhớ quay video khi khui hàng giúp shop nhe \r\n-	Khi khui hàng nếu hàng có vấn đề, bạn liên hệ shop để shop hỗ trợ bạn nha\r\n-	Shop sẽ hỗ trợ đổi trả 1:1 nếu hàng lỗi không mong muốn từ NSX\r\n-	Shop hỗ trợ đổi trả cho khách trong vòng 4 ngày kể từ khi nhận hàng', 'Váy nữ trễ vai , Váy babydoll trễ vai thắt nơ bồng xòe freesize từ 40kg đến 60kg', 0, 0, '2024-07-31 01:22:57', '2024-07-31 01:25:03'),
(7, 'Váy Body', 9, 13, 'V02', 'vay-body', 100000, 120000, 'đầm body dáng ôm cổ 3 phân tay ngắn,váy tăm cổ 3cm dáng ôm body tôn dáng chất thun tăm co giãn V661 SUTANO ra sẵn dáng tay ngắn phục vụ chị em mua sắm\r\nMÔ TẢ SẢN PHẨM:\r\n+ Tên sản phầm : đầm body dáng ôm cổ 3 phân tay ngắn,váy tăm cổ 3cm dáng ôm body tôn dáng chất thun tăm co giãn V661 SUTANO\r\n+ Chất liệu: thun tăm\r\n+ Dáng: ôm body\r\n+ Kích thước: dài 88cm\r\n+ Form<58kg\r\nSUTANO CAM KẾT:\r\n+ Hàng luôn tốt,giá luôn rẻ\r\n+ Đổi trả miễn phí nếu có lỗi sản xuất\r\n+ Được kiểm hàng trước khi thanh toán\r\n+ SUTANO không bán hàng tốt, chất lượng luôn là hàng đầu để shop có thể phát triển thương hiệu và vươn xa\r\n+ Tư vấn nhiệt tình, chu đáo luôn lắng nghe khách hàng để phục vụ tốt\r\n+ Giao hàng nhanh đúng tiến độ không phải để quý khách chờ đợi lâu để nhận hàng\r\nLưu ý sử dụng và bảo quản 📍\r\n- Nên giặt sản phẩm trước khi sử dụng\r\n- Tốt nhất nên giặt tay và không nên chà mạnh bằng bàn chải có sợi cứng\r\n- Nếu giặt máy, nên chọn chế độ giặt nhẹ và sản phẩm có chất vải phù hợp để bảo quản được lâu\r\n- Không nên sử dụng chất giặt tẩy\r\n- Không nên ngâm chung với trang phục ra bị màu\r\n- Tránh phơi với ánh nắng trực tiếp\r\n- Ủi (là) sản phẩm nếu cần và cài đặt nhiệt độ bàn ủi (là) phù hợp với từng loại vải', 'đầm body dáng ôm cổ 3 phân tay ngắn,váy tăm cổ 3cm dáng ôm body tôn dáng chất thun tăm co giãn V661 SUTANO', 0, 0, '2024-07-31 01:26:35', '2024-07-31 01:30:47'),
(8, 'Áo sơ mi dài tay', 9, 14, 'A01', 'ao-so-mi-dai-tay', 89000, 100000, 'Áo Sơ Mi Kẻ Sọc Xanh UNISEX Nam Nữ Form Rộng Họa Tiết Thêu Chữ S Phong Cách Retrostyle Chất Lanh Lụa Mềm Mịn KO Nhăn\r\n\r\n✔️ Xuất xứ: Việt Nam\r\n✔️ Chất liệu: Vải Lụa\r\n\r\nHƯỚNG DẪN CHỌN SIZE ÁO:\r\n- Bảng Size:\r\n- Size M: 1m40-160/45-55kg\r\n- Size L : 1m60-1m70/55kg-65kg\r\n- Size XL: 1m70-1m78/66kg-78kg\r\n\r\n3.HƯỚNG DẪN SỬ DỤNG\r\n- Khuyến khích giặt tay với nước ở nhiệt độ thường, hạn chế để sản phẩm tiếp xúc với chất tẩy hoặc nước giặt có độ tẩy mạnh.\r\n- Nếu giặt máy, sản phẩm nên được lộn trái và cho vào túi giặt.\r\n- Phơi ở nơi bóng râm, tránh ánh nắng trực tiếp. \r\n\r\n4. QUY ĐỊNH ĐỔI TRẢ CỦA SHOPEE\r\n* Điều kiện áp dụng (trong vòng 03 ngày kể từ khi nhận sản phẩm):\r\n	- Hàng hoá vẫn còn mới, chưa qua sử dụng \r\n	- Hàng hóa hư hỏng do vận chuyển hoặc do nhà sản xuất. \r\n*Trường hợp được chấp nhận: \r\n-  Hàng không đúng size, kiểu dáng như quý khách đặt hàng \r\n-  Không đủ số lượng như trong đơn hàng \r\n* Trường hợp không đủ điều kiện áp dụng chính sách Đổi/Trả : \r\n- Quá 03 ngày kể từ khi Quý khách nhận hàng \r\n- Gửi lại hàng không đúng mẫu mã, không phải hàng của shop', 'Áo Sơ Mi Kẻ Sọc Xanh UNISEX Nam Nữ Form Rộng Họa Tiết Thêu Chữ S Phong Cách Retrostyle Chất Lanh Lụa Mềm Mịn KO Nhăn', 0, 0, '2024-07-31 01:32:32', '2024-07-31 01:35:59'),
(9, 'Quần âu', 8, 16, 'Q01', 'quan-au', 125000, 150000, '*Bạn quá thất vọng với những chiếc Quần tây âu giá rẻ chỉ vài chục, hình ảnh nịnh mắt bán tràn lan trên Shopee nhưng mặc vào thì không chuẩn form, chất vải xấu nhanh xù, bai, gây khó chịu - Cạp quần lỗi thời, đường chỉ thì thưa thớt thừa tùm lum. \r\nViệc lạm dụng và làm giảm chất lượng quần của các nhà bán hàng đã làm phai mờ đi rất nhiều giá trị của 1 chiếc quần Tây. Suốt Lịch sử thời trang hình ảnh 1 chiếc quần Tây luôn đại diện cho sự trang trọng, lịch thiệp đảm bảo phong thái thoải mái, tự tin của nam giới.\r\nVINTINO có mặt ở đây để định hình lại giá trị của chiếc Quần Âu và tạo cho Bạn sự Thời thượng, Phong cách mà những chiếc quần rẻ tiền không thể làm được\r\n*Giới thiệu sản phẩm\r\n- Quần âu nam Hàn Quốc hàng tiêu chuẩn VNXK chính hãng VINTINO do Xưởng Sản Xuất Trực Tiếp.\r\n- Quần âu vải tuyết hàn thiết kế trẻ trung. thoải mái\r\n- Quần baggy nam có cạp quần phối viền đẹp mắt, bo viền túi, đường may không chỉ thừa, tinh tế từng mm\r\n- Chất liệu quần âu baggy nam: Vải tuyết hàn dày dặn, co giãn nhẹ\r\n- Màu sắc quần vải nam hàn quốc: 4 màu cơ bản:  Đen, Be, Xanh Than, Ghi\r\n- Quần âu hàn có Size : 28-34 cho người từ 45-83kg (Chat với Shop để nhận tư vấn chính xác nhất)\r\n- Form dáng quần tây nam :Ống xuông, đáy cao ôm vừa phải tạo sự lịch lãm, sang trọng nhưng vẫn rất thoải mái\r\n** VINTINO CAM KẾT\r\nBảo hành sản phẩm trong vòng 7 ngày\r\nHoàn tiền nếu sản phẩm không giống với mô tả\r\nHỗ trợ đổi size nhanh chóng khi không vừa\r\nHình ảnh sản phẩm quần âu co giãn là ảnh thật do shop tự chụp và giữ bản quyền hình ảnh\r\nQuần vải cạp chun nam được kiểm tra kỹ, cẩn thận và tư vấn nhiệt tình \r\nHàng có sẵn, giao hàng ngay khi nhận được đơn \r\nGiao hàng trên toàn quốc, nhận hàng trả tiền \r\n* QUY ĐỊNH BẢO HÀNH, ĐỔI TRẢ\r\n1. Điều kiện áp dụng (trong vòng 07 ngày kể từ khi nhận sản phẩm) \r\n- Hàng hoá vẫn còn mới, chưa qua sử dụng \r\n- Hàng hoá bị lỗi hoặc hư hỏng do vận chuyển hoặc do nhà sản xuất \r\n2. Trường hợp được chấp nhận: \r\n- Hàng không đúng size, kiểu dáng như quý khách đặt hàng \r\n- Không đủ số lượng, không đủ bộ như trong đơn hàng\r\nDo màn hình và điều kiện ánh sáng khác nhau, màu sắc thực tế của sản phẩm có thể chênh lệch khoảng 3-5%\r\nChúc các anh luôn tự tin với diện mạo mới, song hành vững bước tạo thành công', 'Quần tây nam, Quần âu nam hàn quốc ống côn công sở vải tuyết hàn co giãn dày dặn QA1 VINTINO', 0, 0, '2024-07-31 04:43:00', '2024-08-01 01:49:32'),
(10, 'Áo khoác gió', 8, 17, 'A02', 'ao-khoac-gio', 225000, 250000, 'Áo khoác gió nam-nữ 2 lớp 𝐂𝐨́ 𝐓𝐮́𝐢 𝐓𝐫𝐨𝐧𝐠, Áo khoác dù chất liệu vải gió cao cấp kháng nước full tem tag phụ kiện', 'Áo khoác gió nam-nữ 2 lớp 𝐂𝐨́ 𝐓𝐮́𝐢 𝐓𝐫𝐨𝐧𝐠, Áo khoác dù chất liệu vải gió cao cấp kháng nước full tem tag phụ kiện', 0, 0, '2024-07-31 04:52:33', '2024-08-01 18:07:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_color`
--

CREATE TABLE `product_color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_color`
--

INSERT INTO `product_color` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(58, 6, 4, '2024-07-31 08:25:03', '2024-07-31 08:25:03'),
(59, 6, 2, '2024-07-31 08:25:03', '2024-07-31 08:25:03'),
(60, 6, 1, '2024-07-31 08:25:03', '2024-07-31 08:25:03'),
(61, 7, 6, '2024-07-31 08:30:47', '2024-07-31 08:30:47'),
(62, 7, 1, '2024-07-31 08:30:47', '2024-07-31 08:30:47'),
(63, 8, 6, '2024-07-31 08:35:59', '2024-07-31 08:35:59'),
(64, 8, 7, '2024-07-31 08:35:59', '2024-07-31 08:35:59'),
(77, 11, 9, '2024-08-01 08:42:42', '2024-08-01 08:42:42'),
(80, 9, 9, '2024-08-01 08:49:32', '2024-08-01 08:49:32'),
(81, 9, 6, '2024-08-01 08:49:32', '2024-08-01 08:49:32'),
(82, 9, 8, '2024-08-01 08:49:32', '2024-08-01 08:49:32'),
(83, 9, 5, '2024-08-01 08:49:32', '2024-08-01 08:49:32'),
(90, 10, 9, '2024-08-02 01:07:41', '2024-08-02 01:07:41'),
(91, 10, 6, '2024-08-02 01:07:41', '2024-08-02 01:07:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name_image` varchar(255) DEFAULT NULL,
  `image_extension` varchar(255) DEFAULT NULL,
  `order_by` int(11) NOT NULL DEFAULT 100,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `name_image`, `image_extension`, `order_by`, `created_at`, `updated_at`) VALUES
(10, 6, '6bcqkkfkdk6gabps7rhta.jpg', 'jpg', 100, '2024-07-31 08:25:03', '2024-07-31 08:25:03'),
(11, 6, '6vzqdkkbncohbjjoksvfk.jpg', 'jpg', 100, '2024-07-31 08:25:03', '2024-07-31 08:25:03'),
(12, 6, '6ve5nbx3mxnjrcpudiav7.jpg', 'jpg', 100, '2024-07-31 08:25:03', '2024-07-31 08:25:03'),
(13, 7, '7lr6hdtgu7xdzsodib4kh.jpg', 'jpg', 100, '2024-07-31 08:30:47', '2024-07-31 08:30:47'),
(14, 7, '7q5woilkm6ewr48blg4z3.jpg', 'jpg', 100, '2024-07-31 08:30:47', '2024-07-31 08:30:47'),
(15, 8, '8cq2b37pb4w5srbxo3voi.jpg', 'jpg', 100, '2024-07-31 08:35:59', '2024-07-31 08:35:59'),
(16, 8, '8e0yjvt2qlodqwiyumr1m.jpg', 'jpg', 100, '2024-07-31 08:35:59', '2024-07-31 08:35:59'),
(17, 8, '858ltgcahmwnzxqr8k6fz.jpg', 'jpg', 100, '2024-07-31 08:35:59', '2024-07-31 08:35:59'),
(18, 9, '9rpjnuawzpa3drevyulcu.jpg', 'jpg', 100, '2024-07-31 11:51:09', '2024-07-31 11:51:09'),
(19, 9, '9jdngjjtzpktdap4ism2e.jpg', 'jpg', 100, '2024-07-31 11:51:09', '2024-07-31 11:51:09'),
(20, 9, '9hagjz5xmadenbdsiv9gf.jpg', 'jpg', 100, '2024-07-31 11:51:09', '2024-07-31 11:51:09'),
(21, 10, '10ak1hrl2knh3m3mn4svr7.jpg', 'jpg', 100, '2024-07-31 11:55:42', '2024-07-31 11:55:42'),
(22, 10, '10mdl0italzwznrx2yfjwo.jpg', 'jpg', 100, '2024-07-31 11:55:42', '2024-07-31 11:55:42'),
(23, 11, '11b9peuhp6r22zkcjqxx2m.jpg', 'jpg', 100, '2024-08-01 08:42:43', '2024-08-01 08:42:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(23, 7, 'S', 5000, '2024-07-31 08:30:47', '2024-07-31 08:30:47'),
(24, 7, 'M', 10000, '2024-07-31 08:30:47', '2024-07-31 08:30:47'),
(25, 8, 'S(39-45kg)', 0, '2024-07-31 08:35:59', '2024-07-31 08:35:59'),
(26, 8, 'M(45-55kg)', 0, '2024-07-31 08:35:59', '2024-07-31 08:35:59'),
(32, 11, 'S', 1, '2024-08-01 08:42:42', '2024-08-01 08:42:42'),
(34, 9, 'M', 0, '2024-08-01 08:49:32', '2024-08-01 08:49:32'),
(38, 10, 'freeSize', 0, '2024-08-02 01:07:41', '2024-08-02 01:07:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `description`, `keywords`, `url`, `category_id`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(13, 'Váy', 'Nhiều loại báy đẹp', 'vay', 'vay-nu', 9, 0, 0, '2024-07-30 23:19:37', '2024-07-30 23:19:37'),
(14, 'Áo sơ mi', 'Đây là áo sơ mi nữ', 'so mi', 'so-mi-nu', 9, 0, 0, '2024-07-30 23:20:11', '2024-07-30 23:20:11'),
(15, 'Áo thun', 'đây là áo thun nữ', 'ao thun', 'ao-thun-nu', 9, 0, 0, '2024-07-30 23:21:34', '2024-07-30 23:21:34'),
(16, 'Quần âu', 'quần của nam', 'quan au', 'quan-au-nam', 8, 0, 0, '2024-07-30 23:22:12', '2024-07-30 23:22:12'),
(17, 'Áo khoác', 'Áo khoác của nam', 'ao khoac', 'ao-khoac-nam', 8, 0, 0, '2024-07-30 23:22:36', '2024-07-30 23:22:36'),
(18, 'Đồ lót', 'đồ lót của nam', 'do lot', 'do-lot-nam', 8, 0, 0, '2024-07-30 23:23:40', '2024-07-30 23:23:40'),
(19, 'Đồ lót', 'đồ lot của nữ', 'do lot', 'do-lot-nu', 9, 0, 0, '2024-07-30 23:24:16', '2024-07-30 23:24:16'),
(20, 'Quần short', 'đây là đồ trẻ em', 'quan', 'quan-tre-em', 10, 0, 0, '2024-07-30 23:25:01', '2024-07-30 23:25:01'),
(21, 'Đồ bộ', 'Đồ bọ của trẻ em', 'do bo', 'do-bo', 10, 0, 0, '2024-07-30 23:25:26', '2024-07-30 23:25:26'),
(22, 'Túi xách', 'day là túi xách', 'tui xach', 'tui-xach', 11, 0, 0, '2024-07-30 23:26:01', '2024-07-30 23:26:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `status`, `is_delete`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2024-07-11 09:30:09', '$2y$10$PfoKBTRK9TMJZP7NtgEnduSTw.wvrfw9oXttfudyscHHXcGmTr5Yy', 1, 0, 0, '0T9rh9EU2SoXRTGEox7JFluORIVlEPJMkKoP74vhXIjC9KNJD9rgdb7jgq7O', '2024-07-13 09:30:09', '2024-08-02 02:39:19'),
(9, 'uyen ne', 'uyen@gmail.com', '2024-07-11 08:29:59', '$2y$10$ILNs.GUCuQCE5vKdiI5FM.3gbfY2XE531yC.tot4sqi5xsdg8gsiW', 0, 0, 0, NULL, '2024-07-17 01:29:12', '2024-07-17 01:29:12'),
(18, 'phạm thị uyên', 'thiuyen1132004@gmail.com', NULL, '$2y$10$4WKukn25ejcZO/rLwutIReGcy2BP5p6iEpT0EajYovaDNvWwuAXku', 0, 0, 0, 'VSuy2ilr65zr5E9gXlLtyFlunuabIw', '2024-07-17 03:04:04', '2024-08-02 02:47:39'),
(27, 'name', 'admin123@gmail.com', NULL, '$2y$10$JU9B/yXQ7ut9gq/BZ9lneumYRVPKN0CyXKFyTXMI0.J9/ZKLpKoPG', 0, 0, 0, NULL, '2024-08-02 00:30:00', '2024-08-02 00:30:00'),
(28, 'tuan', 'uyenlun@gmail.com', NULL, '$2y$10$RCE10WzoyWNhCUyDSOP9WexPGeZaa0uKEwSX/BVwyX.7Sc4SdlnZO', 0, 0, 0, NULL, '2024-08-02 00:54:22', '2024-08-02 00:54:22'),
(29, 'uyenlun', 'tuanxu@gmail.com', NULL, '$2y$10$eODDsIEMOvQqiCOBoZaqzu3vbDqQX.1ul2vD7XW6MxHZfpjSLn8MS', 0, 0, 0, NULL, '2024-08-02 22:17:53', '2024-08-02 22:17:53');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`);

--
-- Chỉ mục cho bảng `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
