-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 07:38 AM
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
-- Table structure for table `permission_menus`
--

CREATE TABLE `permission_menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(35, 2, 1, 'test company', 'test', 'first', 'test@gmail.com', 1, 'test', 695846165, '9 geeta nager soc', 394170, 'surat', 'gujarat', 'IN', '2022-01-10 11:33:18', '2022-01-10 12:58:11'),
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
  `parent_id` int(11) NOT NULL,
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

INSERT INTO `vendors` (`id`, `user_id`, `parent_id`, `company_name`, `code`, `contact_person_name`, `mobile_main`, `mobile1`, `mobile2`, `email`, `status`, `address`, `city`, `state`, `country`, `pincode`, `gst_no`, `cst_no`, `pan_no`, `bank_name`, `account_name`, `bank_branch`, `acccount_no`, `ifsc_code`, `website`, `referee_name`, `created_at`, `updated_at`) VALUES
(1, 35, 35, 'Heaven solar energy', 'HS01', 'keyurbhai', 9584856952, 6325548658, NULL, 'keyur.tatvamasi@gmail.com', 0, 'Mota varachha', 'surat', 'gujarat', 'india', 395006, 'GJ5698856952148', 'SS54845455664', '', 'SBI', 'Heaven Solar Energy', 'Yogi chowk', 9658456236, 'SBIN0018700', 'www.heavensolarenergy.com', '', '2022-01-08 16:09:39', '2022-01-11 11:45:47'),
(2, 54, 35, 'Heaven design', 'HS02', 'keyurbhai', 9584856952, 6325548658, NULL, 'keyur.tatvamasi@gmail.com', 0, 'Mota varachha', 'surat', 'gujarat', 'india', 395006, 'GJ5698856952148', 'SS54845455664', '', 'SBI', 'Heaven Solar Energy', 'Yogi chowk', 9658456236, 'SBIN0018700', 'www.heavensolarenergy.com', '', '2022-01-08 16:09:39', '2022-01-11 11:46:03'),
(3, 55, 55, 'Tatvamasi Labs\r\n', 'HS03', 'keyurbhai', 9584856952, 6325548658, NULL, 'keyur.tatvamasi@gmail.com', 0, 'Mota varachha', 'surat', 'gujarat', 'india', 395006, 'GJ5698856952148', 'SS54845455664', '', 'SBI', 'Heaven Solar Energy', 'Yogi chowk', 9658456236, 'SBIN0018700', 'www.heavensolarenergy.com', '', '2022-01-08 16:09:39', '2022-01-11 11:46:26'),
(5, 57, 55, 'dddd', 'df', 'kjsdfh', 34534, 0, 0, 'jhsdf', 1, '345345', '34534', 'bbjb', 'BD', 35, '345', '345', '', '345', '345', '345', 345, '345', '', '', '2022-01-10 16:43:58', '2022-01-11 11:46:30'),
(9, 54, 35, 'sdas', 'asdas', 'asd', 34234234, 234234, 0, 'sdasd', 1, 'sdf', 'ftg', 'gdfgdf', 'BY', 43353, '', '', '', 'sddfkjj', 'sdhfir47ueyfjisihd', 'hjs', 3427342746, '322427', '', '', '2022-01-11 12:01:08', '2022-01-11 12:01:08');

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
-- Indexes for table `permission_menus`
--
ALTER TABLE `permission_menus`
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
-- AUTO_INCREMENT for table `permission_menus`
--
ALTER TABLE `permission_menus`
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
