-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2020 at 10:34 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `farming`
--

DROP TABLE IF EXISTS `farming`;
CREATE TABLE IF NOT EXISTS `farming` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farmid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avg_tem` float NOT NULL DEFAULT '0',
  `avg_hum` float NOT NULL DEFAULT '0',
  `avg_humS` float NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pre_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `farmid` (`farmid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `farming`
--

INSERT INTO `farming` (`id`, `farmid`, `name`, `des`, `avg_tem`, `avg_hum`, `avg_humS`, `create_at`, `pre_hash`, `hash`, `update_at`) VALUES
(1, 2, 'Chậu giá sạch 001', 'trồng trong nhà kính', 25, 25, 25, '2020-01-08 04:11:07', 'hatgiong001', 'nongtrai01-chaugia001', '2020-01-08 04:11:07'),
(7, 2, '23', '23', 0, 0, 0, '2020-01-08 09:49:51', '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', 'b61b1f6a3db5184406acc9d86579ad20cd6f38827b9794c77e1819cbb7b9c89f', '2020-01-08 09:49:51'),
(8, 2, '24', '24', 0, 0, 0, '2020-01-08 09:51:57', '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '477d14903b3884f37cd641ff288f7d5a94c169429313cf7e7f4e7863ae1c6ae8', '2020-01-08 09:51:57'),
(9, 2, '25', '25', 22, 22, 22, '2020-01-08 09:54:04', '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '55477eeb42829df8b8200ceb45574b4bc9ad576ff5adf86fa4b7730ca6a5ce92', '2020-01-08 09:55:54'),
(10, 2, '29', '29', 24, 24, 24, '2020-01-08 09:57:51', '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '9b102b6bd442cb2a5b642cdcf7058eda55c704287010c13e1cad15ea883e9680', '2020-01-08 09:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storeid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pre_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `storeid` (`storeid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `storeid`, `name`, `des`, `create_at`, `pre_hash`, `hash`) VALUES
(1, 4, 'Giá sạch 001', 'nhận đủ 5kg từ npp', '2020-01-08 04:15:56', 'npp01-giasach001', 'cuahang01-giasach001'),
(2, 4, '123123', '123123', '2020-01-08 10:00:09', '551c36c2931871d93714b6ab9dafd2ac6a3084d8a56d95e23171ad4a1b8755b8', 'd45d08aa25d788ddeda31c252b29d007086013a7adaae0b7b0cbc31af64cb52f');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `feedback` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `productid` (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scanned`
--

DROP TABLE IF EXISTS `scanned`;
CREATE TABLE IF NOT EXISTS `scanned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `productid` (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

DROP TABLE IF EXISTS `sensor`;
CREATE TABLE IF NOT EXISTS `sensor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farmid` int(11) NOT NULL,
  `des` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `farmid` (`farmid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id`, `farmid`, `des`, `mac`) VALUES
(1, 2, '123123', '123123'),
(2, 2, '123123', '123123'),
(3, 2, '25', '25');

-- --------------------------------------------------------

--
-- Table structure for table `sensorlogs`
--

DROP TABLE IF EXISTS `sensorlogs`;
CREATE TABLE IF NOT EXISTS `sensorlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sensorid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `avg_tem` float NOT NULL DEFAULT '0',
  `avg_hum` float NOT NULL DEFAULT '0',
  `avg_humS` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sensorid` (`sensorid`),
  KEY `productid` (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sensorlogs`
--

INSERT INTO `sensorlogs` (`id`, `sensorid`, `productid`, `avg_tem`, `avg_hum`, `avg_humS`) VALUES
(3, 1, 7, 0, 0, 0),
(4, 1, 8, 23, 23, 23),
(5, 1, 9, 22, 22, 22),
(6, 3, 10, 24, 24, 24);

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

DROP TABLE IF EXISTS `source`;
CREATE TABLE IF NOT EXISTS `source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `providerid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `providerld` (`providerid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `source`
--

INSERT INTO `source` (`id`, `providerid`, `name`, `des`, `create_at`, `hash`) VALUES
(1, 1, 'đậu xanh giống sạch 001', 'Đã được kiểm chứng qua công nghệ Gì đó', '2020-01-08 04:08:28', 'hatgiong001'),
(2, 1, 'Äáº­u xanh giá»‘ng sáº¡ch 002', 'ÄÃ£ Ä‘Æ°á»£c kiá»ƒm chá»©ng bá»Ÿi Dr. Huy', '2020-01-08 09:21:10', '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

DROP TABLE IF EXISTS `transport`;
CREATE TABLE IF NOT EXISTS `transport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transportid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pre_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `transportid` (`transportid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `transportid`, `name`, `des`, `quantity`, `create_at`, `pre_hash`, `hash`) VALUES
(1, 3, 'Giá sạch 001', 'Vận chuyển quốc nội qua đường bộ (đơn vị tính: KG)', 5, '2020-01-08 04:14:02', 'nongtrai01-chaugia001', 'npp01-giasach001'),
(2, 3, '99', '99', 99, '2020-01-08 09:59:05', '9b102b6bd442cb2a5b642cdcf7058eda55c704287010c13e1cad15ea883e9680', '551c36c2931871d93714b6ab9dafd2ac6a3084d8a56d95e23171ad4a1b8755b8');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `des`, `role`, `username`, `password`) VALUES
(1, 'Cơ sở hạt giống ABC', '123 đường Nào Đó, quận Nào Đó, thành phố Nào Đó', 'provider', 'provider01@charasa.com', '12345'),
(2, 'Nông trại ABC', '456 đường Nào Đó, quận Nào Đó, thành phố Nào Đó', 'farm', 'farm01@charasa.com', '12345'),
(3, 'Nhà phân phối XYZ', '789 đường Nào Đó, quận Nào Đó, thành phố Nào Đó', 'transporter', 'transporter01@charasa.com', '12345'),
(4, 'Cửa hàng Charasa 001', '234 đường Nào Đó, quận Nào Đó, thành phố Nào Đó', 'store', 'store01@charasa.com', '12345'),
(5, 'Huy Tran', '1 nngười dùng lào đó', 'user', 'tranhuy', 'tranhuy');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farming`
--
ALTER TABLE `farming`
  ADD CONSTRAINT `farming_ibfk_1` FOREIGN KEY (`farmid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`storeid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scanned`
--
ALTER TABLE `scanned`
  ADD CONSTRAINT `scanned_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scanned_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `Sensor_ibfk_1` FOREIGN KEY (`farmid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sensorlogs`
--
ALTER TABLE `sensorlogs`
  ADD CONSTRAINT `sensorlogs_ibfk_1` FOREIGN KEY (`sensorid`) REFERENCES `sensor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sensorlogs_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `farming` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `source`
--
ALTER TABLE `source`
  ADD CONSTRAINT `source_ibfk_1` FOREIGN KEY (`providerid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transport`
--
ALTER TABLE `transport`
  ADD CONSTRAINT `transport_ibfk_1` FOREIGN KEY (`transportid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
