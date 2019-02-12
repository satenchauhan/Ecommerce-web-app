-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 08:40 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', '', 'raman@gmail.com', '$2y$10$MoVw0/MeUzlB1.ntZFM1L.Z1bxB2.4AzyRjCgu0STmYFg0/xZnE4u', 'WQ4Qk4sq7VM9CpOnWKEgzJC3dV0D9c9KFpp2s75o033gnBpGkpW4xCjSLLlQ', '2019-02-06 15:23:24', '2019-02-06 16:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `title`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, '72892.png', 'Big Mega Sale', 'Jeans', 1, '2019-01-24 00:07:06', '2019-01-24 00:07:06'),
(2, '94401.png', 'Grand Sale On Christmas', 'T-shirts', 1, '2019-01-24 00:07:44', '2019-01-24 00:07:44'),
(3, '13361.png', 'Holly Festival Offers', 'Shoes', 1, '2019-01-24 00:08:15', '2019-01-24 00:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `product_code`, `product_color`, `size`, `price`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(7, 26, 'Round Neck T-Shirt', 'RT112-M', 'Light Blue', 'Medium', 499.00, 1, 'rakesh@gmail.com', 'Ussd68EhMPST5lRN7YjP2DI15OzvyBwcmlWNWegi', NULL, NULL),
(8, 28, 'Round Neck T-Shirt', 'RT114-M', 'Green', 'Medium', 599.00, 1, '', 'JHKYXbwEJqso6p4swCSEYtgTj68FtNJd49BBUBsG', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `category`, `subcategory_id`, `url`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Top wear', 0, 'topwear', 1, NULL, '2019-01-03 08:37:27', '2019-01-07 01:52:56'),
(2, 0, 'Bottom wear', 0, 'bottomwear', 1, NULL, '2019-01-03 08:53:23', '2019-01-07 01:53:34'),
(3, 0, 'Footwear', 0, 'footwear', 1, NULL, '2019-01-03 09:09:44', '2019-01-07 01:54:44'),
(4, 0, 'Watches', 0, 'watches', 1, NULL, '2019-01-03 09:10:07', '2019-01-07 01:51:11'),
(5, 0, 'Electronics', 0, 'electronics', 1, NULL, '2019-01-05 03:19:41', '2019-01-07 02:10:57'),
(7, 0, 'Accessories', 0, 'accessories', 1, NULL, '2019-01-07 01:55:59', '2019-01-07 01:55:59'),
(8, 0, 'Sports wear', 0, 'sportswear', 1, NULL, '2019-01-07 01:57:05', '2019-01-07 01:57:05'),
(10, 0, 'Fashion', 0, 'fashion', 1, NULL, '2019-01-07 01:59:52', '2019-01-08 06:19:32'),
(12, 0, 'Featured Items', 0, 'featured-items', 1, NULL, '2019-01-07 02:02:59', '2019-01-07 02:02:59'),
(13, 1, 'T-shirts', 0, 't-shirts', 1, NULL, '2019-01-07 02:42:39', '2019-01-07 02:42:39'),
(14, 2, 'Jeans', 0, 'jeans', 1, NULL, '2019-01-07 02:44:13', '2019-01-07 02:44:13'),
(15, 3, 'Formal Shoes', 0, 'formal-shoes', 1, NULL, '2019-01-07 02:45:12', '2019-01-07 02:45:12'),
(16, 4, 'Formal Watch', 0, 'formal-watch', 1, NULL, '2019-01-07 02:46:31', '2019-01-07 02:46:31'),
(17, 5, 'Pen Drive', 0, 'pen-drive', 1, NULL, '2019-01-07 02:49:13', '2019-01-07 02:49:13'),
(18, 7, 'Wallets', 0, 'wallets', 1, NULL, '2019-01-07 02:50:33', '2019-01-07 02:50:33'),
(19, 7, 'Belts', 0, 'belts', 1, NULL, '2019-01-07 02:51:08', '2019-01-07 02:51:08'),
(20, 7, 'Jackets', 0, 'jackets', 1, NULL, '2019-01-07 02:53:45', '2019-01-07 02:53:45'),
(21, 0, 'Mobiles', 0, 'mobiles', 1, NULL, '2019-01-13 00:28:43', '2019-01-17 12:11:45'),
(23, 12, 'Blazers', 0, 'blazers', 1, NULL, '2019-01-13 06:21:07', '2019-01-13 06:21:07'),
(24, 1, 'Shirts', 0, 'shirts', 1, NULL, '2019-01-13 11:04:03', '2019-01-13 11:04:03'),
(25, 3, 'Nike Sports Shoe', 0, 'sports-shoes', 1, NULL, '2019-01-13 11:23:44', '2019-01-22 06:19:07'),
(26, 2, 'Paints', 0, 'piants', 1, NULL, '2019-01-13 11:34:43', '2019-01-13 11:34:43'),
(27, 0, 'Game', 0, 'game', 0, NULL, '2019-01-13 14:43:10', '2019-01-13 15:02:35'),
(28, 21, 'Samsung', 0, 'samsung', 1, NULL, '2019-01-13 15:29:42', '2019-01-17 12:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'SS', 'South Sudan'),
(203, 'ES', 'Spain'),
(204, 'LK', 'Sri Lanka'),
(205, 'SH', 'St. Helena'),
(206, 'PM', 'St. Pierre and Miquelon'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard and Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syrian Arab Republic'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania, United Republic of'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad and Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks and Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States minor outlying islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (U.S.)'),
(241, 'WF', 'Wallis and Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SHOP124', 20, 'Percentage', '2019-01-21', 1, '2019-01-21 14:52:14', '2019-01-23 13:28:21'),
(2, 'SHOP20', 20, 'Percentage', '2019-02-15', 0, '2019-01-23 12:23:24', '2019-01-23 13:30:12'),
(3, 'SHOP55', 55, 'Fixed', '2019-01-23', 1, '2019-01-23 12:55:40', '2019-01-23 13:02:22'),
(4, 'SHOP40', 40, 'Percentage', '2019-01-25', 1, '2019-01-23 13:29:59', '2019-01-23 13:32:02'),
(5, 'SHOP10', 10, 'Percentage', '2019-01-29', 1, '2019-01-23 14:37:23', '2019-01-23 14:37:37'),
(6, 'SHOP100', 100, 'Fixed', '2019-02-10', 1, '2019-01-23 14:38:16', '2019-01-23 14:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 3, 'aman@gmail.com', 'Raman Sharma', '518 Kailash Vihar', 'Lucknow', 'Uttar Pradesh', 'Hungary', '560087', '+91090909990', '2019-01-27 09:41:33', '2019-01-27 09:41:33'),
(2, 4, 'aman@gmail.com', 'Aman Kumar', '420', 'Kanpur', 'Uttar Pradesh', 'India', '208010', '9866788988', '2019-01-27 15:39:49', '2019-02-05 05:18:44'),
(3, 5, 'rakesh@gmail.com', 'Manoj Kumar', '450', 'karnal', 'harayan', 'India', '160014', '9845890002', '2019-01-28 12:24:36', '2019-01-30 11:01:40'),
(4, 8, 'ashum123@gmail.com', 'Ashum Chauhan', '486', 'kanpur', 'u.p.', 'India', '208010', '9096898878788', '2019-02-03 13:16:59', '2019-02-03 13:16:59'),
(5, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', '2019-02-04 02:44:07', '2019-02-04 04:53:49');

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
(4, '2019_01_01_093310_create_category_table', 2),
(5, '2019_01_03_114232_rename_category_in_categories_table', 3),
(6, '2019_01_03_180550_create_products_table', 4),
(7, '2019_01_05_184457_create_products_attributes_table', 5),
(8, '2019_01_10_080218_add_subcategory_id_to_products', 6),
(9, '2019_01_12_142139_add_subcategory_id_to_categories', 7),
(10, '2019_01_17_135852_add_column_care_to_products', 7),
(11, '2019_01_18_062237_create_product_images_table', 8),
(12, '2019_01_19_214845_add_column_status_to_products', 9),
(13, '2019_01_20_085034_create_cart_table', 10),
(14, '2019_01_21_163518_create_coupons_table', 11),
(15, '2019_01_23_211549_create_banners_table', 12),
(17, '2019_01_26_121955_add_columns_to_users', 13),
(18, '2019_01_27_104015_create_delivery_addresses_table', 14),
(19, '2019_01_29_154857_create_orders_table', 15),
(20, '2019_01_29_171030_create_orders_products_table', 16),
(21, '2019_01_29_175518_add_column_product_color_to_orders_products', 17),
(22, '2019_01_31_221809_create_admin_table', 18),
(23, '2019_02_03_193414_add_column_status_to_users_table', 19),
(24, '2019_02_05_113946_add_column_feature_item_to_products_table', 20),
(27, '2019_02_06_210132_add_column_remember_token_to_admins_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charges` double NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `coupon_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 5, 'rakesh@gmail.com', 'Rakesh Kumar', '450', 'karnal', 'harayan', 'India', '160014', '9845890002', 0, '', 0.00, 'In Process', 'COD', 599.00, '2019-01-30 10:47:45', '2019-01-31 16:39:21'),
(2, 5, 'rakesh@gmail.com', 'Manoj Kumar', '450', 'karnal', 'harayan', 'India', '160014', '9845890002', 0, '', 0.00, 'Shipped', 'COD', 699.00, '2019-01-30 10:48:52', '2019-01-31 16:37:33'),
(3, 4, 'aman@gmail.com', 'Raman Sharma', '518 Kailash Vihar', 'Lucknow', 'Uttar Pradesh', 'Hungary', '560087', '+91090909990', 0, '', 0.00, 'New', 'COD', 599.00, '2019-02-01 09:19:32', '2019-02-01 09:19:32'),
(4, 8, 'ashum123@gmail.com', 'Ashum Chauhan', '486', 'kanpur', 'u.p.', 'India', '208010', '9096898878788', 0, '', 0.00, 'New', 'COD', 599.00, '2019-02-03 13:17:10', '2019-02-03 13:17:10'),
(5, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 599.00, '2019-02-04 02:44:16', '2019-02-04 02:44:16'),
(6, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 599.00, '2019-02-04 02:44:33', '2019-02-04 02:44:33'),
(7, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 599.00, '2019-02-04 02:48:56', '2019-02-04 02:48:56'),
(8, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 499.00, '2019-02-04 02:56:19', '2019-02-04 02:56:19'),
(9, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 499.00, '2019-02-04 03:00:19', '2019-02-04 03:00:19'),
(10, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 499.00, '2019-02-04 04:34:59', '2019-02-04 04:34:59'),
(11, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 499.00, '2019-02-04 04:35:33', '2019-02-04 04:35:33'),
(12, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 499.00, '2019-02-04 04:37:21', '2019-02-04 04:37:21'),
(13, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 499.00, '2019-02-04 04:37:42', '2019-02-04 04:37:42'),
(14, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 499.00, '2019-02-04 04:39:29', '2019-02-04 04:39:29'),
(15, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 499.00, '2019-02-04 04:41:39', '2019-02-04 04:41:39'),
(16, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 499.00, '2019-02-04 04:43:08', '2019-02-04 04:43:08'),
(17, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 499.00, '2019-02-04 04:43:20', '2019-02-04 04:43:20'),
(18, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 699.00, '2019-02-04 04:49:45', '2019-02-04 04:49:45'),
(19, 12, 'munna@gmail.com', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 0, '', 0.00, 'New', 'COD', 599.00, '2019-02-04 04:53:55', '2019-02-04 04:53:55'),
(20, 4, 'aman@gmail.com', 'Raman Sharma', '518 Kailash Vihar', 'Lucknow', 'Uttar Pradesh', 'Hungary', '560087', '+91090909990', 0, 'SHOP100', 100.00, 'New', 'COD', 1098.00, '2019-02-04 09:00:09', '2019-02-04 09:00:09'),
(21, 4, 'aman@gmail.com', 'Raman Sharma', '518 Kailash Vihar', 'Lucknow', 'Uttar Pradesh', 'Hungary', '560087', '+91090909990', 0, '', 0.00, 'New', 'COD', 699.00, '2019-02-04 09:19:38', '2019-02-04 09:19:38'),
(22, 4, 'aman@gmail.com', 'Raman Sharma', '518 Kailash Vihar', 'Lucknow', 'Uttar Pradesh', 'Hungary', '560087', '+91090909990', 0, '', 0.00, 'New', 'COD', 599.00, '2019-02-04 09:22:41', '2019-02-04 09:22:41'),
(23, 4, 'aman@gmail.com', 'Raman Sharma', '518 Kailash Vihar', 'Lucknow', 'Uttar Pradesh', 'Hungary', '560087', '+91090909990', 0, '', 0.00, 'New', 'COD', 599.00, '2019-02-04 09:27:24', '2019-02-04 09:27:24'),
(24, 4, 'aman@gmail.com', 'Raman Sharma', '518 Kailash Vihar', 'Lucknow', 'Uttar Pradesh', 'Hungary', '560087', '+91090909990', 0, '', 0.00, 'New', 'COD', 699.00, '2019-02-04 09:37:43', '2019-02-04 09:37:43'),
(25, 4, 'aman@gmail.com', 'Raman Sharma', '518 Kailash Vihar', 'Lucknow', 'Uttar Pradesh', 'Hungary', '560087', '+91090909990', 0, '', 0.00, 'New', 'COD', 599.00, '2019-02-04 09:52:04', '2019-02-04 09:52:04'),
(26, 4, 'aman@gmail.com', 'Raman Sharma', '518 Kailash Vihar', 'Lucknow', 'Uttar Pradesh', 'Hungary', '560087', '+91090909990', 0, '', 0.00, 'New', 'COD', 1797.00, '2019-02-05 05:04:29', '2019-02-05 05:04:29'),
(27, 4, 'aman@gmail.com', 'Raman Sharma', '518 Kailash Vihar', 'Lucknow', 'Uttar Pradesh', 'Hungary', '560087', '+91090909990', 0, 'SHOP100', 100.00, 'New', 'COD', 1198.00, '2019-02-05 05:18:49', '2019-02-05 05:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_size`, `product_color`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 29, 'RT115-M', 'Collar T-Shirt', 'Medium', 'Carrot Color', 599.00, 1, '2019-01-30 10:47:45', '2019-01-30 10:47:45'),
(2, 2, 5, 30, 'DT116 -L', 'Dotted Shirt', 'Large', 'Ligth Blue', 699.00, 1, '2019-01-30 10:48:53', '2019-01-30 10:48:53'),
(3, 3, 4, 28, 'RT114-S', 'Round Neck T-Shirt', 'Small', 'Green', 599.00, 1, '2019-02-01 09:19:32', '2019-02-01 09:19:32'),
(4, 4, 8, 28, 'RT114-M', 'Round Neck T-Shirt', 'Medium', 'Green', 599.00, 1, '2019-02-03 13:17:11', '2019-02-03 13:17:11'),
(5, 5, 12, 29, 'RT115-M', 'Collar T-Shirt', 'Medium', 'Carrot Color', 599.00, 1, '2019-02-04 02:44:16', '2019-02-04 02:44:16'),
(6, 6, 12, 29, 'RT115-M', 'Collar T-Shirt', 'Medium', 'Carrot Color', 599.00, 1, '2019-02-04 02:44:33', '2019-02-04 02:44:33'),
(7, 7, 12, 28, 'RT114-M', 'Round Neck T-Shirt', 'Medium', 'Green', 599.00, 1, '2019-02-04 02:48:56', '2019-02-04 02:48:56'),
(8, 8, 12, 26, 'RT112-M', 'Round Neck T-Shirt', 'Medium', 'Light Blue', 499.00, 1, '2019-02-04 02:56:19', '2019-02-04 02:56:19'),
(9, 9, 12, 26, 'RT112-M', 'Round Neck T-Shirt', 'Medium', 'Light Blue', 499.00, 1, '2019-02-04 03:00:19', '2019-02-04 03:00:19'),
(10, 10, 12, 26, 'RT112-M', 'Round Neck T-Shirt', 'Medium', 'Light Blue', 499.00, 1, '2019-02-04 04:34:59', '2019-02-04 04:34:59'),
(11, 11, 12, 26, 'RT112-M', 'Round Neck T-Shirt', 'Medium', 'Light Blue', 499.00, 1, '2019-02-04 04:35:33', '2019-02-04 04:35:33'),
(12, 12, 12, 26, 'RT112-M', 'Round Neck T-Shirt', 'Medium', 'Light Blue', 499.00, 1, '2019-02-04 04:37:21', '2019-02-04 04:37:21'),
(13, 13, 12, 26, 'RT112-M', 'Round Neck T-Shirt', 'Medium', 'Light Blue', 499.00, 1, '2019-02-04 04:37:42', '2019-02-04 04:37:42'),
(14, 14, 12, 26, 'RT112-M', 'Round Neck T-Shirt', 'Medium', 'Light Blue', 499.00, 1, '2019-02-04 04:39:29', '2019-02-04 04:39:29'),
(15, 15, 12, 26, 'RT112-M', 'Round Neck T-Shirt', 'Medium', 'Light Blue', 499.00, 1, '2019-02-04 04:41:39', '2019-02-04 04:41:39'),
(16, 16, 12, 26, 'RT112-M', 'Round Neck T-Shirt', 'Medium', 'Light Blue', 499.00, 1, '2019-02-04 04:43:08', '2019-02-04 04:43:08'),
(17, 17, 12, 26, 'RT112-M', 'Round Neck T-Shirt', 'Medium', 'Light Blue', 499.00, 1, '2019-02-04 04:43:21', '2019-02-04 04:43:21'),
(18, 18, 12, 30, 'DT116-M', 'Dotted Shirt', 'Medium', 'Ligth Blue', 699.00, 1, '2019-02-04 04:49:45', '2019-02-04 04:49:45'),
(19, 19, 12, 28, 'RT114-M', 'Round Neck T-Shirt', 'Medium', 'Green', 599.00, 1, '2019-02-04 04:53:55', '2019-02-04 04:53:55'),
(20, 20, 4, 29, 'RT115-M', 'Collar T-Shirt', 'Medium', 'Carrot Color', 599.00, 1, '2019-02-04 09:00:09', '2019-02-04 09:00:09'),
(21, 20, 4, 28, 'RT114-L', 'Round Neck T-Shirt', 'Large', 'Green', 599.00, 1, '2019-02-04 09:00:09', '2019-02-04 09:00:09'),
(22, 21, 4, 30, 'DT116-M', 'Dotted Shirt', 'Medium', 'Ligth Blue', 699.00, 1, '2019-02-04 09:19:38', '2019-02-04 09:19:38'),
(23, 22, 4, 28, 'RT114-M', 'Round Neck T-Shirt', 'Medium', 'Green', 599.00, 1, '2019-02-04 09:22:41', '2019-02-04 09:22:41'),
(24, 23, 4, 29, 'RT115-M', 'Collar T-Shirt', 'Medium', 'Carrot Color', 599.00, 1, '2019-02-04 09:27:24', '2019-02-04 09:27:24'),
(25, 24, 4, 30, 'DT116-M', 'Dotted Shirt', 'Medium', 'Ligth Blue', 699.00, 1, '2019-02-04 09:37:43', '2019-02-04 09:37:43'),
(26, 25, 4, 29, 'RT115-M', 'Collar T-Shirt', 'Medium', 'Carrot Color', 599.00, 1, '2019-02-04 09:52:04', '2019-02-04 09:52:04'),
(27, 26, 4, 29, 'RT115-M', 'Collar T-Shirt', 'Medium', 'Carrot Color', 599.00, 2, '2019-02-05 05:04:29', '2019-02-05 05:04:29'),
(28, 26, 4, 29, 'RT115-L', 'Collar T-Shirt', 'Large', 'Carrot Color', 599.00, 1, '2019-02-05 05:04:29', '2019-02-05 05:04:29'),
(29, 27, 4, 30, 'DT116-M', 'Dotted Shirt', 'Medium', 'Ligth Blue', 699.00, 1, '2019-02-05 05:18:50', '2019-02-05 05:18:50'),
(30, 27, 4, 28, 'RT114-M', 'Round Neck T-Shirt', 'Medium', 'Green', 599.00, 1, '2019-02-05 05:18:50', '2019-02-05 05:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('raman@gmail.com', '$2y$10$PRrdRlYQ4GkOP4MMKxBzR.TELK1rDmxtcInEd.ejM9XmmkOLCVZpW', '2019-02-06 16:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `care` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `feature_item` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `product_name`, `product_code`, `product_color`, `description`, `care`, `price`, `image`, `status`, `feature_item`, `created_at`, `updated_at`) VALUES
(24, 2, 14, 'Flexi Jeans', 'FJ122', 'Blues', 'Flexi Jeans', '', 1200.00, '31769.jpg', 1, 1, '2019-01-13 15:25:02', '2019-02-05 06:38:20'),
(26, 1, 13, 'Round Neck T-Shirt', 'RT112', 'Light Blue', 'Light Blue Round Neck T-Shirt', '', 499.00, '58643.jpg', 1, 0, '2019-01-14 02:41:05', '2019-01-19 17:23:05'),
(27, 1, 13, 'Round Neck T-Shirt', 'RT113', 'Drak Blue', 'Round Neck T-thirt', '', 399.00, '92588.jpg', 1, 0, '2019-01-14 02:56:00', '2019-01-19 17:30:19'),
(28, 1, 13, 'Round Neck T-Shirt', 'RT114', 'Green', 'Green round neck cotton T-shirt, Half Sleeves.', 'Made of 90% cotton, 10% spun', 599.00, '24851.jpg', 1, 0, '2019-01-14 02:58:32', '2019-01-20 13:47:20'),
(29, 1, 13, 'Collar T-Shirt', 'RT115', 'Carrot Color', 'Collar T-shirt', '', 599.00, '29021.jpg', 1, 0, '2019-01-14 03:00:44', '2019-01-19 17:23:20'),
(30, 1, 24, 'Dotted Shirt', 'DT116', 'Ligth Blue', 'Dotted Designer Shirt', '', 699.00, '53707.jpg', 1, 0, '2019-01-14 03:02:19', '2019-01-14 03:02:19'),
(31, 1, 24, 'Check Shirt', 'CS117', 'White & Balck', 'White & Balck Check Shirt', '', 799.00, '8588.jpg', 1, 0, '2019-01-14 03:04:04', '2019-01-19 17:23:29'),
(32, 2, 14, 'Slim Fit Jeans', 'SFJ118', 'Light Blue', 'Slim Fit Jeans For  Girl', '', 1299.00, '32383.jpg', 1, 0, '2019-01-14 09:14:12', '2019-01-14 09:14:12'),
(33, 3, 25, 'Nike Shoe', 'NS120', 'Sky Blue', 'Nike Shoe For Men', '', 899.00, '49887.jpg', 1, 1, '2019-01-14 09:15:30', '2019-02-05 06:39:04'),
(34, 4, 16, 'Swatch Watch', 'TW124', 'Silver', 'Swatch Watch For Men', '', 1499.00, '17471.png', 1, 0, '2019-01-14 09:17:17', '2019-01-19 10:14:30'),
(35, 1, 24, 'Denim Shirt', 'DS125', 'Blue', 'Blue formal shirt, has a spread collar, a full button placket, long sleeves.', 'This product  is made of  90% Cotton, 10% Polyester\r\nMachine-wash', 999.00, '35684.jpg', 1, 0, '2019-01-17 08:54:12', '2019-01-19 10:18:01'),
(36, 21, 28, 'Prime Galaxy J7', 'SGMJ7', 'Silver', 'Samsung Prime Galaxy J7', 'Fiber  Plastic and  Metal', 14700.00, '71114.jpg', 1, 0, '2019-01-17 12:10:38', '2019-01-17 12:10:38'),
(37, 1, 13, 'Nike Blues T-Shirt', 'NBT-122', 'Sky Blue', 'This is brand nike sport blues t-shirt', 'Made of 90% spandex, 10% Nylon, Stretchable, half sleeves,\r\nMachine Washable at temperature 30.', 1800.00, '38978.jpg', 1, 1, '2019-01-19 16:45:21', '2019-01-19 17:24:07'),
(38, 4, 16, 'Rolex Gent Date Just', 'RW244', 'Steel', 'Rolex watch for men', 'Made of metal  stainless steel', 500.00, '26946.png', 1, 0, '2019-01-19 17:08:45', '2019-01-19 17:08:45'),
(39, 7, 18, 'Leather Wallet', 'LW220', 'Black', 'Lather wallet for men, double fold', 'Pure ship leather with multiple pocket and coin pocket', 499.00, '44354.jpg', 1, 1, '2019-01-22 05:49:58', '2019-01-22 05:49:58'),
(40, 7, 19, 'Leather Belt', 'LB122', 'Black', 'Black leather belt', 'Made of  leather, pure leather,\r\n100 % genuine leather', 399.00, '279.jpg', 1, 1, '2019-02-05 06:21:05', '2019-02-05 06:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 4, 'FJ220-S', 'Small', 1200.00, 15, '2019-01-11 15:17:14', '2019-01-11 15:17:14'),
(2, 4, 'FJ220-M', 'Medium', 1200.00, 12, '2019-01-11 15:17:14', '2019-01-11 15:17:14'),
(3, 4, 'FJ220-L', 'Large', 1200.00, 18, '2019-01-11 15:17:14', '2019-01-11 15:17:14'),
(4, 5, 'FSJ120-S', 'Small', 1300.00, 18, '2019-01-12 06:33:20', '2019-01-12 06:33:20'),
(5, 5, 'FSJ120-M', 'Medium', 1400.00, 14, '2019-01-12 06:33:20', '2019-01-12 06:33:20'),
(6, 6, 'BB120-S', 'Small', 800.00, 12, '2019-01-12 11:54:58', '2019-01-12 11:54:58'),
(7, 6, 'BB120-M', 'Medium', 800.00, 10, '2019-01-12 11:54:58', '2019-01-12 11:54:58'),
(8, 6, 'BB120-L', 'Large', 800.00, 15, '2019-01-12 11:54:58', '2019-01-12 11:54:58'),
(9, 26, 'RT112-S', 'Small', 499.00, 20, '2019-01-14 09:20:15', '2019-01-14 09:20:15'),
(10, 26, 'RT112-M', 'Medium', 499.00, 17, '2019-01-14 09:20:15', '2019-01-14 09:20:15'),
(11, 26, 'RT112-', 'Large', 499.00, 8, '2019-01-14 09:20:15', '2019-01-14 09:20:15'),
(12, 26, 'RT112-XL', 'Extra Large', 499.00, 5, '2019-01-14 09:20:15', '2019-01-14 09:20:15'),
(13, 29, 'RT115-S', 'Small', 599.00, 3, '2019-01-14 09:22:04', '2019-02-05 02:47:54'),
(14, 29, 'RT115-M', 'Medium', 599.00, 2, '2019-01-14 09:22:04', '2019-02-05 02:47:54'),
(15, 29, 'RT115-L', 'Large', 599.00, 5, '2019-01-14 09:22:04', '2019-02-05 02:47:54'),
(17, 24, 'FJ122-S', 'Small', 1200.00, 22, '2019-01-14 09:23:43', '2019-01-14 09:23:43'),
(18, 24, 'FJ122-M', 'Medium', 1200.00, 18, '2019-01-14 09:23:43', '2019-01-14 09:23:43'),
(19, 24, 'FJ122-L', 'Large', 1200.00, 10, '2019-01-14 09:23:43', '2019-01-14 09:23:43'),
(20, 24, 'FJ122-XL', 'Extra Large', 1200.00, 0, '2019-01-14 09:23:43', '2019-01-14 09:23:43'),
(21, 30, 'DT116-S', 'Small', 699.00, 21, '2019-01-14 09:25:09', '2019-01-14 09:25:09'),
(22, 30, 'DT116-M', 'Medium', 699.00, 19, '2019-01-14 09:25:09', '2019-01-14 09:25:09'),
(23, 30, 'DT116 -L', 'Large', 699.00, 8, '2019-01-14 09:25:09', '2019-01-14 09:25:09'),
(24, 33, 'NS120-36', '36', 899.00, 20, '2019-01-14 09:27:54', '2019-01-14 09:27:54'),
(25, 33, 'NS120-38', '38', 899.00, 24, '2019-01-14 09:27:54', '2019-01-14 09:27:54'),
(26, 33, 'NS120-40', '40', 899.00, 16, '2019-01-14 09:27:55', '2019-01-14 09:27:55'),
(27, 33, 'NS120-42', '42', 899.00, 8, '2019-01-14 09:27:55', '2019-01-14 09:27:55'),
(28, 33, 'NS120-45', '44', 899.00, 5, '2019-01-14 09:27:55', '2019-01-14 09:27:55'),
(29, 28, 'RT114-S', 'Small', 599.00, 3, '2019-01-14 09:30:09', '2019-01-20 15:02:56'),
(30, 28, 'RT114-M', 'Medium', 599.00, 4, '2019-01-14 09:30:09', '2019-01-20 15:02:56'),
(31, 28, 'RT114-L', 'Large', 599.00, 1, '2019-01-14 09:30:09', '2019-01-20 15:02:56'),
(32, 28, 'RT114-XL', 'Extra Large', 599.00, 0, '2019-01-19 13:59:19', '2019-01-20 15:02:56'),
(33, 39, 'LW220-S', 'Small', 499.00, 10, '2019-01-22 05:51:33', '2019-01-22 05:51:33'),
(34, 39, 'LW220-M', 'Medium', 499.00, 12, '2019-01-22 05:51:33', '2019-01-22 05:51:33'),
(35, 39, 'LW220-L', 'Large', 499.00, 8, '2019-01-22 05:51:33', '2019-01-22 05:51:33'),
(36, 29, 'RT115-XL', 'Extra-Large', 599.00, 0, '2019-02-05 03:34:35', '2019-02-05 03:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 28, '28326.jpg', '2019-01-19 02:26:01', '2019-01-19 02:26:01'),
(3, 28, '91712.jpg', '2019-01-19 02:26:02', '2019-01-19 02:26:02'),
(5, 28, '37712.jpg', '2019-01-19 05:01:43', '2019-01-19 05:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, NULL, 'Aman Kumar', '420', 'Kanpur', 'Uttar Pradesh', 'India', '208010', '9866788988', 'aman@gmail.com', NULL, '$2y$10$WkAm8N9usUtEZwSVW0qSIOzAD6.tCTneAHYHMCN1YznsyitDtKvb6', 1, 'vGqd89HxmLrKcOc1kruFuVFfXUquo4WgHd7BWpMWAoMWUfOZ8qIqGkNXwlJi', '2019-01-27 13:56:12', '2019-02-08 04:04:54'),
(5, NULL, 'Rakesh Kumar', '450', 'karnal', 'harayan', 'India', '160014', '9845890002', 'rakesh@gmail.com', NULL, '$2y$10$VkmPaUhpfQHDKutbup3M3uukBwbGus.7489brwyKpRjGFe9tC/CmO', 0, 'XiadUFuSGvoq9p1SOZ0X51W9yNzYexgBclpXFvQcunoMYirE1hHVyowKY4bF', '2019-01-28 11:13:55', '2019-01-30 11:01:40'),
(8, '0', 'Daman Kumar', NULL, NULL, NULL, NULL, NULL, NULL, 'daman@gmail.com', NULL, '$2y$10$oLf.NphdX6GOSAYnwm6/g.Em0xZEWp6iITfcdCA/bI66r8Qu0O0D.', 1, '7E78vRClQJxSrOhjTkUSVm7pzkGEk1J7dII80RSWMsPHZKp1d9yNHZC0HPbH', '2019-02-03 14:27:03', '2019-02-06 16:47:48'),
(12, '0', 'Munna Yadav', '518', 'kanpur', 'U.P.', 'India', '208010', '9868998989', 'munna@gmail.com', NULL, '$2y$10$.PCNDsmyXqZ9NoLW7Bcm1edoBoNDXUKTu7WeMgK41YaGIMunShfe2', 1, 'Fzdh4ra81nL76iIQK2NljIkphmfq8RzDmORMGvfDBCFHXPWqOKGOgX3kG5FN', '2019-02-03 15:50:02', '2019-02-06 13:31:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
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
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
