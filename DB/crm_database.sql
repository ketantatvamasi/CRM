-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 01:53 PM
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
  `status` tinyint(4) NOT NULL COMMENT 'pendding',
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
(1, 1, 1, 'nayan', 'Business', 'varachha', 'nayan@gmail.com', 965874515, 0, 'surat', 'gujarat', 'IN', 0, 0, '', '96825484', '', '2022-01-11 14:26:04', '2022-01-11 17:18:57'),
(2, 35, 35, 'Test user1', 'Business', 'hirabag', 'admin@gmail.com', 68662, 5585592, 'surat', 'gujarat', 'IN', 394170, 0, 'dqwguibiuaw', 'threredws', 'rfedsaZ', '2022-01-11 17:12:38', '2022-01-17 12:06:29'),
(3, 35, 35, 'Test user2', 'Business', 'hirabag', 'admin@gmail.com', 68662, 5585592, 'surat', 'gujarat', 'IN', 394170, 0, 'dqwguibiuaw', 'threredws', 'rfedsaZ', '2022-01-11 17:12:38', '2022-01-17 12:06:29'),
(4, 35, 35, 'sdf', 'Business', 'fsgs', 'dfsd@sddfs', 9898989898, 0, 'df', 'fgd', 'AZ', 395010, 0, '', '', '', '2022-01-18 18:12:42', '2022-01-18 18:12:42');

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
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `company_id`, `item_code`, `item_name`, `sale_price`, `purchase_price`, `total_quantity`, `opening_quantity`, `cgst`, `sgst`, `igst`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'HZ', 'solar panel', 12000, 8000, 10, 2, 9, 9, 18, '', 0, '2022-01-12 00:11:23', '2022-01-12 00:11:23'),
(2, 35, 35, 'HZs', 'screw', 150, 100, 6, 4, 9, 9, 18, '', 0, '2022-01-12 00:11:23', '2022-01-20 18:12:45'),
(5, 35, 35, 'SC', 'solar panel', 500, 32, 1, 2, 9, 9, 18, '', 0, '2022-01-20 18:06:25', '2022-01-20 18:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `permission_menus`
--

CREATE TABLE `permission_menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `total_price` int(50) NOT NULL,
  `cgst_price` int(50) NOT NULL,
  `sgst_price` int(50) NOT NULL,
  `igst_price` int(50) NOT NULL,
  `total_gst_amount` int(50) NOT NULL,
  `round_of` int(50) NOT NULL,
  `total_amount` int(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'padding',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `vendor_id`, `vendor_invoice_no`, `user_id`, `company_id`, `purchse_date`, `total_quantity`, `total_price`, `cgst_price`, `sgst_price`, `igst_price`, `total_gst_amount`, `round_of`, `total_amount`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 342, 35, 35, '2022-01-05', 1, 150, 14, 14, 27, 54, 0, 204, 0, '2022-01-19 11:26:59', '2022-01-19 11:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE `purchase_item` (
  `id` int(11) NOT NULL,
  `purchase_id` int(20) NOT NULL,
  `item_id` int(20) NOT NULL,
  `quantity` int(50) NOT NULL,
  `rate` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `discount` int(50) NOT NULL,
  `cgst_tax` int(50) NOT NULL,
  `sgst_tax` int(50) NOT NULL,
  `igst_tax` int(50) NOT NULL,
  `total_amount` int(50) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`id`, `purchase_id`, `item_id`, `quantity`, `rate`, `amount`, `discount`, `cgst_tax`, `sgst_tax`, `igst_tax`, `total_amount`, `create_at`, `update_at`) VALUES
(1, 1, 2, 1, 150, 0, 0, 9, 9, 18, 150, '2022-01-19 11:26:59', '2022-01-19 11:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Id` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Id`, `Name`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Inventory Manager');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `permission_menus_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `create` tinyint(4) NOT NULL,
  `read` tinyint(4) NOT NULL,
  `update` tinyint(4) NOT NULL,
  `delete` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `role_id` int(11) NOT NULL DEFAULT 2,
  `parent_id` int(11) NOT NULL,
  `organization_name` varchar(500) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
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

INSERT INTO `users` (`user_id`, `role_id`, `parent_id`, `organization_name`, `firstname`, `lastname`, `email`, `status`, `password`, `phone`, `address`, `pincode`, `city`, `state`, `country`, `create_date`, `update_date`) VALUES
(1, 1, 1, 'Tatvamasi Labs', 'super Admin', 'Super Admin', 'admin@gmail.com', 1, '123456', 9658478596, '310- Heaven solar design, Surat', 0, 'surat', 'gujarat', 'India', '2022-01-07 10:55:21', '2022-01-07 12:43:11'),
(35, 2, 1, 'test company', 'test admin', 'first', 'test@gmail.com', 1, 'test', 695846165, '9 geeta nager soc', 394170, 'surat', 'gujarat', 'IN', '2022-01-10 11:33:18', '2022-01-11 12:28:44'),
(54, 3, 35, 'test', 'test', 'first', 'testim@gmail.com', 1, 'test', 652658585985, 'surat', 394170, 'surat', 'gujarat', 'IN', '2022-01-10 16:32:37', '2022-01-11 11:55:47'),
(55, 2, 1, 'tatvamasi nayan', 'nayan', 'sorathiya', 'nayan@gmail.com', 1, '123456', 564654654, 'varachha', 395010, 'surat', 'gujarat', 'IN', '2022-01-11 11:39:07', '2022-01-11 11:39:07'),
(57, 3, 55, 'tatvamasi nayan', 'IM 001', 'kjshjdfjs', 'IM001@gmail.com', 1, '123456', 4234242424, 'sddf', 0, 'sdf', 'sdf', 'IQ', '2022-01-11 11:42:04', '2022-01-11 11:42:04');

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
  `status` tinyint(4) NOT NULL COMMENT '0-active, 1-deactive',
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
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `user_id`, `company_id`, `company_name`, `code`, `contact_person_name`, `mobile_main`, `mobile1`, `mobile2`, `email`, `status`, `address`, `city`, `state`, `country`, `pincode`, `gst_no`, `cst_no`, `pan_no`, `bank_name`, `account_name`, `bank_branch`, `acccount_no`, `ifsc_code`, `website`, `referee_name`, `created_at`, `updated_at`) VALUES
(1, 35, 35, 'Heaven solar energy', 'HS01', 'keyurbhai', 9584856952, 6325548658, NULL, 'keyur.tatvamasi@gmail.com', 0, 'Mota varachha', 'surat', 'gujarat', 'india', 395006, 'GJ5698856952148', 'SS54845455664', '', 'SBI', 'Heaven Solar Energy', 'Yogi chowk', 9658456236, 'SBIN0018700', 'www.heavensolarenergy.com', '', '2022-01-08 16:09:39', '2022-01-11 11:45:47'),
(2, 54, 35, 'Heaven design', 'HS02', 'keyurbhai', 9584856952, 6325548658, NULL, 'keyur.tatvamasi@gmail.com', 0, 'Mota varachha', 'surat', 'gujarat', 'india', 395006, 'GJ5698856952148', 'SS54845455664', '', 'SBI', 'Heaven Solar Energy', 'Yogi chowk', 9658456236, 'SBIN0018700', 'www.heavensolarenergy.com', '', '2022-01-08 16:09:39', '2022-01-11 11:46:03'),
(3, 55, 55, 'Tatvamasi Labs\r\n', 'HS03', 'keyurbhai', 9584856952, 6325548658, NULL, 'keyur.tatvamasi@gmail.com', 0, 'Mota varachha', 'surat', 'gujarat', 'india', 395006, 'GJ5698856952148', 'SS54845455664', '', 'SBI', 'Heaven Solar Energy', 'Yogi chowk', 9658456236, 'SBIN0018700', 'www.heavensolarenergy.com', '', '2022-01-08 16:09:39', '2022-01-11 11:46:26'),
(5, 57, 55, 'dddd', 'df', 'kjsdfh', 34534, 0, 0, 'jhsdf', 1, '345345', '34534', 'bbjb', 'BD', 35, '345', '345', '', '345', '345', '345', 345, '345', '', '', '2022-01-10 16:43:58', '2022-01-11 11:46:30'),
(9, 54, 35, 'sdas', 'asdas', 'asd', 34234234, 234234, 0, 'sdasd', 1, 'sdf', 'ftg', 'gdfgdf', 'BY', 43353, '', '', '', 'sddfkjj', 'sdhfir47ueyfjisihd', 'hjs', 3427342746, '322427', '', '', '2022-01-11 12:01:08', '2022-01-11 12:01:08'),
(11, 35, 35, 'gdfg', 'fhjtyyhg', 'erg ', 453535, 0, 0, 'grgg@xfgd', 1, 'sdf', 'sdf', 'dsf', 'BS', 4324, '32442344234', '', '', 'sdf', 'sfsdf', 'sdfsd', 32423, '23423', '', '', '2022-01-11 15:43:26', '2022-01-11 15:43:26'),
(12, 35, 35, 'sdfsd', 'sdf', 'sdfsd', 4234234, 0, 0, 'jay@gmail.com', 0, '234fwr3', '2r32r', 'r23r23r32r', 'BH', 2434234, '234234', '', '', '2343rer3r', '242f323', 'r2343', 24324234, '34234', '', '', '2022-01-11 16:39:02', '2022-01-12 11:29:51'),
(13, 35, 35, 'sfd', 'jhsfkj', 'skdfh', 28374938479, 0, 0, 'skhdfsddhf@kjdjfdh', 0, 'sdfsdf', 'dfdfdsf', 'sdfs', 'BS', 234234, '233423adfdds', '', '', 'sdfs', 'dsfsdf', 'dsfs', 34234, '23423', '', '', '2022-01-11 16:45:41', '2022-01-11 16:45:41'),
(14, 54, 35, 'sdajfhhf bfiui', 'kaah', 'kahah', 34273743284279387, 0, 0, 'sdsjdfhj@dhfjh', 0, 'asda', 'hassdhhh', 'ahgfhg', 'KZ', 8374, 'jhddfjj8w887', '', '', 'asdajk', 'jhdfjhsfh', 'djjdfhjh', 384827, '873847jhfdh', '', '', '2022-01-11 16:50:50', '2022-01-11 16:50:50'),
(15, 1, 1, 'sfsdf', 'efew', 'wef', 34234234, 0, 0, 'hasdhah@kshfhd', 0, '324234', '2342', '234234', 'BD', 34243, '3423effew', '', '', '23424', 'ewewr3242', '234', 2343432, '234234', '', '', '2022-01-11 16:53:19', '2022-01-11 16:53:19');

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
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_m_id_fk` (`permission_menus_id`),
  ADD KEY `use_id_fk` (`user_id`);

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
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `Test` (`role_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permission_menus`
--
ALTER TABLE `permission_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sale_item`
--
ALTER TABLE `sale_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activites_logs`
--
ALTER TABLE `activites_logs`
  ADD CONSTRAINT `use` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `p_m_id_fk` FOREIGN KEY (`permission_menus_id`) REFERENCES `permission_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `use_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Test` FOREIGN KEY (`role_id`) REFERENCES `role` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
