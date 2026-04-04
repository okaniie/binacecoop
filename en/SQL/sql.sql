-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2024 at 10:20 AM
-- Server version: 10.6.15-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karamelh_beacondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin Admin', 'admin@mail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `tranxId` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `method`, `userId`, `tranxId`, `amount`, `currency`, `status`, `date`) VALUES
(1, 'Ethereum', '4', 'TRX4602847', '22222', '$', 'PENDING', '02-01-2024 08:11'),
(2, 'Ethereum', '4', 'TRX4251098', '3000.00', '$', 'PENDING', '02-01-2024 08:28');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `planId` varchar(255) NOT NULL,
  `invest_amt` varchar(255) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `increase` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `total_profit` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `userId`, `planId`, `invest_amt`, `plan_name`, `increase`, `duration`, `total_profit`, `start_date`, `end_date`, `status`, `date`) VALUES
(1, '4', '17', '50', 'PLAN A', '5', '24', '2.5', '02-01-2024 08:10:15', '03-01-2024 08:10:15', '1', '2024-01-02 08:10:15'),
(2, '4', '23', '20000', 'VIP PLAN C', '60', '72', '12000', '02-01-2024 08:25:28', '05-01-2024 08:25:28', '1', '2024-01-02 08:25:28'),
(3, '4', '19', '1500', 'PLAN C', '15', '24', '225', '02-01-2024 09:11:23', '03-01-2024 09:11:23', '1', '2024-01-02 09:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `package1`
--

CREATE TABLE `package1` (
  `id` int(6) NOT NULL,
  `pname` varchar(122) NOT NULL,
  `increase` double NOT NULL,
  `duration` int(11) NOT NULL,
  `min_amt` varchar(255) NOT NULL,
  `max_amt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `package1`
--

INSERT INTO `package1` (`id`, `pname`, `increase`, `duration`, `min_amt`, `max_amt`) VALUES
(17, 'PLAN A', 5, 24, '50', '500'),
(18, 'PLAN B', 8, 24, '500', '1500'),
(19, 'PLAN C', 15, 24, '1500', '3000'),
(20, 'PLAN D', 25, 24, '3000', '4500'),
(21, 'VIP PLAN A', 30, 48, '5000', '8000'),
(22, 'VIP PLAN B', 60, 48, '8000', '20000'),
(23, 'VIP PLAN C', 60, 72, '20000', 'Unlimited ');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `siteurl` varchar(255) NOT NULL,
  `sitemail` varchar(255) NOT NULL,
  `ref_bonus` varchar(255) NOT NULL,
  `btc_wallet` varchar(255) NOT NULL,
  `eth_wallet` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `livechat` text DEFAULT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `tmv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename`, `siteurl`, `sitemail`, `ref_bonus`, `btc_wallet`, `eth_wallet`, `whatsapp`, `livechat`, `pin`, `tmv`) VALUES
(1, 'Beacon Traders', 'https://beacontraders.net', 'support@beacontraders.com', '10', '', '', '', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `refcode` varchar(255) NOT NULL,
  `ref_balance` varchar(255) NOT NULL DEFAULT '0',
  `profit` varchar(255) NOT NULL DEFAULT '0',
  `balance` varchar(255) NOT NULL DEFAULT '0',
  `bonus` varchar(255) NOT NULL DEFAULT '0',
  `Id_photo` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `referral` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fname`, `lname`, `password`, `currency`, `phone`, `country`, `occupation`, `refcode`, `ref_balance`, `profit`, `balance`, `bonus`, `Id_photo`, `profile_photo`, `pin`, `referral`, `date`, `status`) VALUES
(4, 'user@mail.com', 'user', 'test', '123456', '$', NULL, NULL, NULL, 'WOUCX7', '0', '2345', '1912', '0', NULL, NULL, NULL, '', '2023-12-06 02:10:46', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `name`, `address`) VALUES
(1, 'Bitcoin', 'btbtbbtbtbtbbtbtbbtbt'),
(2, 'Ethereum', 'ehehhehehehhehehehhe'),
(3, 'USDT (TRC20)', 'ususususuusuusu'),
(4, 'Litecoin', 'ltltltltlltltltlltltl'),
(5, 'BNB Smart Chain', 'bnbnbnnbnbnnbnbnbnbnbnnbbn'),
(6, 'Tron', 'trtttrttrtttrttrtttrt');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `wallet` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `acct_number` varchar(255) DEFAULT NULL,
  `acct_name` varchar(255) DEFAULT NULL,
  `swift` varchar(255) DEFAULT NULL,
  `tranxid` varchar(255) NOT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package1`
--
ALTER TABLE `package1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package1`
--
ALTER TABLE `package1`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
