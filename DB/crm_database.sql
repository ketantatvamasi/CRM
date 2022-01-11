-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: Jan 10, 2022 at 12:56 PM
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
(1, 1, 1, 'Tatvamasi Labs', 'super Admin', 'Super Admin', 'admin@gmail.com', 1, '123456', 9658478596, '310- Heaven solar design, Surat', 346714, 'surat', 'gujarat', 'India', '2022-01-07 10:55:21', '2022-01-08 10:11:33'),
(35, 2, 1, 'test company', 'test', 'first', 'test@gmail.com', 1, 'test', 695846165, '9 geeta nager soc', 394170, 'surat', 'gujarat', 'IN', '2022-01-10 11:33:18', '2022-01-10 12:58:11'),
(54, 3, 35, 'test', 'test', 'first', 'test@gmail.com', 1, 'test', 652658585985, 'surat', 394170, 'surat', 'gujarat', 'IN', '2022-01-10 16:32:37', '2022-01-10 16:32:37');

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
