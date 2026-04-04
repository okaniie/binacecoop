-- Binance Coop - Docker Init SQL
-- Auto-imported on first container start

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- Table: admin
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=2;

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin Admin', 'admin@mail.com', '123456');

-- --------------------------------------------------------
-- Table: deposits
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `deposits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `method` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `tranxId` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=3;

INSERT INTO `deposits` (`id`, `method`, `userId`, `tranxId`, `amount`, `currency`, `status`, `date`) VALUES
(1, 'Ethereum', '4', 'TRX4602847', '22222', '$', 'PENDING', '02-01-2024 08:11'),
(2, 'Ethereum', '4', 'TRX4251098', '3000.00', '$', 'PENDING', '02-01-2024 08:28');

-- --------------------------------------------------------
-- Table: investments
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `investments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=4;

INSERT INTO `investments` (`id`, `userId`, `planId`, `invest_amt`, `plan_name`, `increase`, `duration`, `total_profit`, `start_date`, `end_date`, `status`, `date`) VALUES
(1, '4', '17', '50', 'PLAN A', '5', '24', '2.5', '02-01-2024 08:10:15', '03-01-2024 08:10:15', '1', '2024-01-02 08:10:15'),
(2, '4', '23', '20000', 'VIP PLAN C', '60', '72', '12000', '02-01-2024 08:25:28', '05-01-2024 08:25:28', '1', '2024-01-02 08:25:28'),
(3, '4', '19', '1500', 'PLAN C', '15', '24', '225', '02-01-2024 09:11:23', '03-01-2024 09:11:23', '1', '2024-01-02 09:11:23');

-- --------------------------------------------------------
-- Table: package1
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `package1` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `pname` varchar(122) NOT NULL,
  `increase` double NOT NULL,
  `duration` int(11) NOT NULL,
  `min_amt` varchar(255) NOT NULL,
  `max_amt` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci AUTO_INCREMENT=24;

INSERT INTO `package1` (`id`, `pname`, `increase`, `duration`, `min_amt`, `max_amt`) VALUES
(17, 'PLAN A', 5, 24, '50', '500'),
(18, 'PLAN B', 8, 24, '500', '1500'),
(19, 'PLAN C', 15, 24, '1500', '3000'),
(20, 'PLAN D', 25, 24, '3000', '4500'),
(21, 'VIP PLAN A', 30, 48, '5000', '8000'),
(22, 'VIP PLAN B', 60, 48, '8000', '20000'),
(23, 'VIP PLAN C', 60, 72, '20000', 'Unlimited');

-- --------------------------------------------------------
-- Table: settings
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitename` varchar(255) NOT NULL,
  `siteurl` varchar(255) NOT NULL,
  `sitemail` varchar(255) NOT NULL,
  `ref_bonus` varchar(255) NOT NULL,
  `bwallet` varchar(255) NOT NULL DEFAULT '',
  `btc_wallet` varchar(255) NOT NULL DEFAULT '',
  `eth_wallet` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `livechat` text DEFAULT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `tmv` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_num` varchar(255) DEFAULT NULL,
  `swift` varchar(255) DEFAULT NULL,
  `routing` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=2;

INSERT INTO `settings` (`id`, `sitename`, `siteurl`, `sitemail`, `ref_bonus`, `bwallet`, `btc_wallet`, `eth_wallet`, `whatsapp`, `livechat`, `pin`, `tmv`, `bank_name`, `account_name`, `account_num`, `swift`, `routing`) VALUES
(1, 'Binance Coop', 'http://localhost:8080', 'support@binancecoop.com', '10', '', '', '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------
-- Table: users
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=31;

INSERT INTO `users` (`id`, `email`, `fname`, `lname`, `password`, `currency`, `phone`, `country`, `occupation`, `refcode`, `ref_balance`, `profit`, `balance`, `bonus`, `Id_photo`, `profile_photo`, `pin`, `referral`, `date`, `status`) VALUES
(4, 'user@mail.com', 'user', 'test', '123456', '$', NULL, NULL, NULL, 'WOUCX7', '0', '2345', '1912', '0', NULL, NULL, NULL, '', '2023-12-06 02:10:46', 'Pending');

-- --------------------------------------------------------
-- Table: wallet
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=7;

INSERT INTO `wallet` (`id`, `name`, `address`) VALUES
(1, 'Bitcoin', 'btbtbbtbtbtbbtbtbbtbt'),
(2, 'Ethereum', 'ehehhehehehhehehehhe'),
(3, 'USDT (TRC20)', 'ususususuusuusu'),
(4, 'Litecoin', 'ltltltltlltltltlltltl'),
(5, 'BNB Smart Chain', 'bnbnbnnbnbnnbnbnbnbnbnnbbn'),
(6, 'Tron', 'trtttrttrtttrttrtttrt');

-- --------------------------------------------------------
-- Table: withdrawals
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `withdrawals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
