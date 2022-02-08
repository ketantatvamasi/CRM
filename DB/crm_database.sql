-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 12:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `activites_logs`
--

CREATE TABLE `activites_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `property` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_category` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_main` bigint(11) NOT NULL,
  `mobile1` bigint(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` bigint(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-active, 1-deactive\r\n',
  `referee_name` varchar(255) NOT NULL,
  `gst_no` varchar(100) NOT NULL,
  `pan_no` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `company_id`, `customer_name`, `customer_category`, `address`, `email`, `mobile_main`, `mobile1`, `city`, `state`, `country`, `pincode`, `status`, `referee_name`, `gst_no`, `pan_no`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Nayanbhai', 'Business', 'awdef', 'nayan@gmail.com', 8797956465, 0, 'surat', 'gujarat', 'BS', 395010, 0, '', '', '', '2022-01-31 10:07:50', '2022-01-31 10:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `item_code` varchar(25) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `sale_price` float NOT NULL,
  `purchase_price` float NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `opening_quantity` int(11) NOT NULL,
  `cgst` float NOT NULL,
  `sgst` float NOT NULL,
  `igst` float NOT NULL,
  `note` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-active, 1-deactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permission_menus`
--

CREATE TABLE `permission_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_menus`
--

INSERT INTO `permission_menus` (`id`, `permission_name`) VALUES
(1, 'User View'),
(2, 'User Add'),
(3, 'User Edit'),
(4, 'User Delete'),
(5, 'Vendor View'),
(6, 'Vendor Add'),
(7, 'Vendor Edit'),
(8, 'Vendor Delete'),
(9, 'Customer View'),
(10, 'Customer Add'),
(11, 'Customer Edit'),
(12, 'Customer Delete'),
(13, 'Item View'),
(14, 'Item Add'),
(15, 'Item Edit'),
(16, 'Item Delete'),
(17, 'Purchase View'),
(18, 'Purchase Add'),
(19, 'Purchase Edit'),
(20, 'Purchase Delete'),
(21, 'Sale View'),
(22, 'Sale Add'),
(23, 'Sale Edit'),
(24, 'Sale Delete'),
(25, 'Role View'),
(26, 'Role Add'),
(27, 'Role Edit'),
(28, 'Role Delete');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `vendor_id` int(20) NOT NULL,
  `vendor_invoice_no` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `company_id` int(20) NOT NULL,
  `purchse_date` date NOT NULL,
  `total_quantity` int(50) NOT NULL,
  `total_price` float NOT NULL,
  `cgst_price` float NOT NULL,
  `sgst_price` float NOT NULL,
  `igst_price` float NOT NULL,
  `total_gst_amount` float NOT NULL,
  `round_of` int(50) NOT NULL,
  `total_amount` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'padding',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE `purchase_item` (
  `id` int(11) NOT NULL,
  `purchase_id` int(20) NOT NULL,
  `item_id` int(20) NOT NULL,
  `quantity` int(50) NOT NULL,
  `rate` float NOT NULL,
  `discount` float NOT NULL,
  `cgst_tax` float NOT NULL,
  `sgst_tax` float NOT NULL,
  `igst_tax` float NOT NULL,
  `total_amount` float NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `company_id`, `role_name`) VALUES
(1, 1, 'Super Admin'),
(2, 1, 'Admin'),
(13, 1, 'Employee'),
(14, 64, 'Vi sales'),
(15, 64, 'Airtel');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`) VALUES
(67, 13, 1),
(68, 13, 2),
(69, 13, 3),
(70, 13, 4),
(71, 2, 1),
(72, 2, 2),
(73, 2, 3),
(74, 2, 4),
(75, 2, 5),
(76, 2, 6),
(77, 2, 7),
(78, 2, 8),
(79, 2, 9),
(80, 2, 10),
(81, 2, 11),
(82, 2, 12),
(83, 2, 13),
(84, 2, 14),
(85, 2, 15),
(86, 2, 16),
(87, 2, 17),
(88, 2, 18),
(89, 2, 19),
(90, 2, 20),
(91, 2, 21),
(92, 2, 22),
(93, 2, 23),
(94, 2, 24),
(95, 2, 25),
(96, 2, 26),
(97, 2, 27),
(98, 2, 28),
(99, 1, 1),
(100, 1, 2),
(101, 1, 3),
(102, 1, 4),
(103, 1, 5),
(104, 1, 6),
(105, 1, 7),
(106, 1, 8),
(107, 1, 9),
(108, 1, 10),
(109, 1, 11),
(110, 1, 12),
(111, 1, 13),
(112, 1, 14),
(113, 1, 15),
(114, 1, 16),
(115, 1, 17),
(116, 1, 18),
(117, 1, 19),
(118, 1, 20),
(119, 1, 21),
(120, 1, 22),
(121, 1, 23),
(122, 1, 24),
(123, 1, 25),
(124, 1, 26),
(125, 1, 27),
(126, 1, 28),
(127, 14, 1),
(128, 14, 2),
(129, 14, 5),
(130, 14, 6),
(131, 14, 9),
(132, 14, 10),
(133, 14, 13),
(134, 14, 14),
(135, 15, 1),
(136, 15, 28);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `customer_invoice_id` int(20) NOT NULL,
  `bill_date` date NOT NULL,
  `user_id` int(20) NOT NULL,
  `company_id` int(20) NOT NULL,
  `total_quantity` int(50) NOT NULL,
  `total_price` float NOT NULL,
  `cgst_price` float NOT NULL,
  `sgst_price` float NOT NULL,
  `igst_price` float NOT NULL,
  `total_gst_amount` float NOT NULL,
  `round_of` float NOT NULL,
  `total_amount` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'padding',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sale_item`
--

CREATE TABLE `sale_item` (
  `id` int(11) NOT NULL,
  `sale_id` int(20) NOT NULL,
  `item_id` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL,
  `discount` float NOT NULL,
  `cgst` float NOT NULL,
  `sgst` float NOT NULL,
  `igst` float NOT NULL,
  `total_amount` float NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `organization_name` varchar(500) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-active, 1-deactive',
  `password` varchar(150) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `pincode` int(20) NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `company_id`, `parent_id`, `organization_name`, `firstname`, `lastname`, `email`, `status`, `password`, `phone`, `address`, `pincode`, `city`, `state`, `country`, `create_date`, `update_date`) VALUES
(1, 1, 1, 'Tatvamasi Labs', 'super Admin', 'Super Admin', 'admin@gmail.com', 0, '123456', 9658478596, '310- Heaven solar design, Surat', 0, 'surat', 'gujarat', 'India', '2022-01-07 10:55:21', '2022-02-08 09:38:57'),
(64, 64, 1, 'First Test org', 'Test Admin', 'User', 'nayan.tatvamasi@gmail.com', 0, '123456', 9664919955, 'Yogi chowk', 395010, 'Surat', 'Gujarat', 'IN', '2022-01-29 10:55:58', '2022-02-08 14:29:03'),
(65, 65, 1, 'Vi', 'Parth', 'Sabhadiya ', 'parth@gmail.com', 0, '123456', 8798564648, 'Yogi chowk', 395010, 'surat', 'gujarat', 'IN', '2022-02-07 15:03:39', '2022-02-08 09:39:07'),
(66, 64, 64, 'vijay sales', 'Jaydev ', 'Suriya', 'jaydev@gmail.com', 0, '123456', 9664919955, 'Yogi chowk', 395010, 'sdfsd', 'gujarat', 'IN', '2022-02-07 15:10:27', '2022-02-08 14:25:31'),
(67, 64, 66, 'tatvamasi ', 'ketan', 'P', 'ketan.tatvamasi@gmail.com', 0, '123456', 8798798798, 'Yogi chowk', 395006, 'surat', 'Gujarat', 'IN', '2022-02-08 10:47:57', '2022-02-08 10:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_permission`
--

CREATE TABLE `user_role_permission` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `permission_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role_permission`
--

INSERT INTO `user_role_permission` (`id`, `user_id`, `role_id`, `permission_id`) VALUES
(1, 1, 1, 2),
(85, 65, 13, 1),
(86, 65, 13, 2),
(87, 65, 13, 3),
(114, 67, 15, 1),
(115, 67, 15, 28),
(116, 64, 2, 2),
(117, 64, 2, 3),
(118, 64, 2, 4),
(119, 64, 2, 5),
(120, 64, 2, 6),
(121, 64, 2, 7),
(122, 64, 2, 8),
(123, 64, 2, 9),
(124, 64, 2, 10),
(125, 64, 2, 11),
(126, 64, 2, 12),
(127, 64, 2, 13),
(128, 64, 2, 14),
(129, 64, 2, 15),
(130, 64, 2, 16),
(131, 64, 2, 17),
(132, 64, 2, 18),
(133, 64, 2, 19),
(134, 64, 2, 20),
(135, 64, 2, 21),
(136, 64, 2, 22),
(137, 64, 2, 23),
(138, 64, 2, 24),
(139, 64, 2, 25),
(140, 64, 2, 26),
(141, 64, 2, 27),
(142, 64, 2, 28),
(143, 64, 2, 1),
(158, 1, 1, 1),
(160, 1, 1, 3),
(161, 1, 1, 4),
(162, 1, 1, 5),
(163, 1, 1, 6),
(164, 1, 1, 7),
(165, 1, 1, 8),
(166, 1, 1, 9),
(167, 1, 1, 10),
(168, 1, 1, 11),
(169, 1, 1, 12),
(170, 1, 1, 13),
(171, 1, 1, 14),
(172, 1, 1, 15),
(173, 1, 1, 16),
(174, 1, 1, 17),
(175, 1, 1, 18),
(176, 1, 1, 19),
(177, 1, 1, 20),
(178, 1, 1, 21),
(179, 1, 1, 22),
(180, 1, 1, 23),
(181, 1, 1, 24),
(182, 1, 1, 25),
(183, 1, 1, 26),
(184, 1, 1, 27),
(185, 1, 1, 28),
(203, 66, 15, 1),
(204, 66, 15, 2),
(205, 66, 15, 3),
(206, 66, 15, 5),
(207, 66, 15, 9),
(208, 66, 15, 13),
(209, 66, 15, 17),
(210, 66, 15, 21);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `code` varchar(50) NOT NULL,
  `contact_person_name` varchar(250) NOT NULL,
  `mobile_main` bigint(11) NOT NULL,
  `mobile1` bigint(11) DEFAULT NULL,
  `mobile2` bigint(11) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-active, 1-deactive',
  `address` varchar(500) NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `pincode` bigint(11) NOT NULL,
  `gst_no` varchar(250) NOT NULL,
  `cst_no` varchar(250) NOT NULL,
  `pan_no` varchar(250) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `account_name` varchar(250) NOT NULL,
  `bank_branch` varchar(250) NOT NULL,
  `acccount_no` bigint(20) NOT NULL,
  `ifsc_code` varchar(250) NOT NULL,
  `website` varchar(1000) NOT NULL,
  `referee_name` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activites_logs`
--
ALTER TABLE `activites_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `use` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_menus`
--
ALTER TABLE `permission_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_item`
--
ALTER TABLE `sale_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role_permission`
--
ALTER TABLE `user_role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activites_logs`
--
ALTER TABLE `activites_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_menus`
--
ALTER TABLE `permission_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sale_item`
--
ALTER TABLE `sale_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user_role_permission`
--
ALTER TABLE `user_role_permission`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activites_logs`
--
ALTER TABLE `activites_logs`
  ADD CONSTRAINT `use` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
