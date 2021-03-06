-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2020 at 03:31 PM
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
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `farmid` (`farmid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `farming`
--

INSERT INTO `farming` (`id`, `farmid`, `name`, `des`, `avg_tem`, `avg_hum`, `avg_humS`, `create_at`, `pre_hash`, `hash`, `update_at`, `isApproved`) VALUES
(1, 2, 'Chậu giá sạch 001', 'trồng trong nhà kính', 25, 25, 25, '2020-01-08 04:11:07', 'hatgiong001', 'nongtrai01-chaugia001', '2020-01-08 04:11:07', 1),
(7, 2, '23', '23', 0, 0, 0, '2020-01-08 09:49:51', '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', 'b61b1f6a3db5184406acc9d86579ad20cd6f38827b9794c77e1819cbb7b9c89f', '2020-01-08 09:49:51', 1),
(8, 2, '24', '24', 0, 0, 0, '2020-01-08 09:51:57', '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '477d14903b3884f37cd641ff288f7d5a94c169429313cf7e7f4e7863ae1c6ae8', '2020-01-08 09:51:57', 0),
(9, 2, '25', '25', 22, 22, 22, '2020-01-08 09:54:04', '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '55477eeb42829df8b8200ceb45574b4bc9ad576ff5adf86fa4b7730ca6a5ce92', '2020-01-08 09:55:54', 0),
(10, 2, '29', '29', 24, 24, 24, '2020-01-08 09:57:51', '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '9b102b6bd442cb2a5b642cdcf7058eda55c704287010c13e1cad15ea883e9680', '2020-01-08 09:58:11', 0),
(11, 2, 'admin', 'admin', 0, 0, 0, '2020-01-09 01:59:05', '3141592654', '', '2020-01-09 01:59:05', 0),
(12, 2, 'admin', 'aadminn', 0, 0, 0, '2020-01-09 02:34:56', 'hatgiong001', '', '2020-01-09 02:34:56', 0),
(13, 2, 'admin', 'test', 0, 0, 0, '2020-01-09 02:43:36', 'hatgiong001', '', '2020-01-09 02:43:36', 0);

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
  `quantity` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pre_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `storeid` (`storeid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `storeid`, `name`, `des`, `quantity`, `create_at`, `pre_hash`, `hash`, `isApproved`) VALUES
(2, 4, '123123', '123123', 0, '2020-01-08 10:00:09', '551c36c2931871d93714b6ab9dafd2ac6a3084d8a56d95e23171ad4a1b8755b8', 'd45d08aa25d788ddeda31c252b29d007086013a7adaae0b7b0cbc31af64cb52f', 0),
(3, 4, '1', '1', 0, '2020-01-08 17:54:52', '551c36c2931871d93714b6ab9dafd2ac6a3084d8a56d95e23171ad4a1b8755b8', 'b3039ba270da595046208cced4cf04a45ed2261675da314fa4dd2945ffc41035', 0),
(4, 4, '2', '2', 0, '2020-01-08 17:55:01', '551c36c2931871d93714b6ab9dafd2ac6a3084d8a56d95e23171ad4a1b8755b8', 'a2717dbb6e74bf9db056f269f06c91b9fe5f4ad1cd77a44f7a5b85696fd589d3', 0),
(5, 4, '3', '3', 0, '2020-01-08 17:55:07', '', 'f679da2775fc66f8ea10743f971e7ed8c11e236d3e889c0062e12f3f124416d3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `userid`, `hash`, `rating`, `feedback`, `create_at`) VALUES
(1, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', 5, 'Vip pro', '2020-01-11 06:27:53'),
(3, 2, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', 4, 'Vip hơi pro', '2020-01-11 06:34:07'),
(4, 3, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', 4, 'qwe', '2020-01-11 06:37:22'),
(5, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', 5, '123qwe', '2020-01-11 06:48:51'),
(6, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', 4, 'wer12e', '2020-01-11 06:49:03'),
(7, 4, 'd45d08aa25d788ddeda31c252b29d007086013a7adaae0b7b0cbc31af64cb52f', 5, 'Rất tốt', '2020-01-11 06:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `scanned`
--

DROP TABLE IF EXISTS `scanned`;
CREATE TABLE IF NOT EXISTS `scanned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scanned`
--

INSERT INTO `scanned` (`id`, `userid`, `hash`, `create_at`) VALUES
(1, 4, '551c36c2931871d93714b6ab9dafd2ac6a3084d8a56d95e23171ad4a1b8755b8', '2020-01-11 03:54:59'),
(2, 4, 'd45d08aa25d788ddeda31c252b29d007086013a7adaae0b7b0cbc31af64cb52f', '2020-01-11 03:55:12'),
(3, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 05:50:11'),
(4, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 05:50:42'),
(5, 4, '9b102b6bd442cb2a5b642cdcf7058eda55c704287010c13e1cad15ea883e9680', '2020-01-11 05:50:56'),
(6, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:21:54'),
(7, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:22:07'),
(8, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:22:22'),
(9, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:22:32'),
(10, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:23:51'),
(11, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:26:02'),
(12, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:27:58'),
(13, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:28:11'),
(14, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:32:30'),
(15, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:32:42'),
(16, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:34:25'),
(17, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:34:42'),
(18, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:37:49'),
(19, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:37:59'),
(20, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:40:15'),
(21, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:44:13'),
(22, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:45:03'),
(23, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:46:34'),
(24, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:48:40'),
(25, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:48:56'),
(26, 4, '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197', '2020-01-11 06:49:08'),
(27, 4, 'd45d08aa25d788ddeda31c252b29d007086013a7adaae0b7b0cbc31af64cb52f', '2020-01-11 06:49:18'),
(28, 4, 'd45d08aa25d788ddeda31c252b29d007086013a7adaae0b7b0cbc31af64cb52f', '2020-01-11 06:49:31');

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
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `farmid` (`farmid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id`, `farmid`, `des`, `mac`, `create_at`) VALUES
(1, 2, '123123', '123123', '2020-01-09 09:53:46'),
(2, 2, '123123', '123123', '2020-01-09 09:53:46'),
(3, 2, '25', '25', '2020-01-09 09:53:46'),
(4, 2, 'Bộ cảm biến 01', 'AA:VV:CD:8E:2D:32', '2020-01-09 10:02:08');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sensorlogs`
--

INSERT INTO `sensorlogs` (`id`, `sensorid`, `productid`, `avg_tem`, `avg_hum`, `avg_humS`) VALUES
(3, 1, 7, 0, 0, 0),
(4, 1, 8, 23, 23, 23),
(5, 1, 9, 22, 22, 22),
(6, 3, 10, 24, 24, 24),
(7, 1, 11, 0, 0, 0),
(8, 1, 12, 0, 0, 0),
(9, 1, 13, 0, 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `source`
--

INSERT INTO `source` (`id`, `providerid`, `name`, `des`, `create_at`, `hash`) VALUES
(1, 1, 'đậu xanh giống sạch 001', 'Đã được kiểm chứng qua công nghệ Gì đó', '2020-01-08 04:08:28', 'hatgiong001'),
(2, 1, 'Äáº­u xanh giá»‘ng sáº¡ch 002', 'ÄÃ£ Ä‘Æ°á»£c kiá»ƒm chá»©ng bá»Ÿi Dr. Huy', '2020-01-08 09:21:10', '15de2611ed9e805bcc88ee8d50224dc344fc2df36449eb0dadc8de708fa7c197'),
(3, 1, '', '', '2020-01-08 17:27:30', '6301d29e21acad310c89c0722935a57fc105e38b855404fa49a1f062c174c856'),
(4, 1, '123', '123', '2020-01-08 17:28:44', 'f2e8a74dcc78840185dc6eb224c28ea127ba0f4f0f9810245f9c3f3e4188ab0b'),
(5, 1, '', '', '2020-01-08 17:28:47', '082ae3419316b30c1bd945c99d9f080345130bc7a28fbfe7299b55bf2fa10c8b'),
(6, 1, '', '', '2020-01-08 17:31:14', 'c2026afddd3c1bb8ecabfe8dcca4eb7cbbe7304728b8ccd94b8d887d71465d49'),
(7, 1, '', '', '2020-01-08 17:36:36', '06f445c57f46ba9efaba088b7c9b35b00f76b9c6c4fcbaec915ff25a2b265644'),
(8, 1, '', '', '2020-01-08 17:37:34', 'e0daff78c465ede28e670f5c7a9bf0d15708fa611993ee5f9237f14f1d783e82');

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
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `transportid` (`transportid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `transportid`, `name`, `des`, `quantity`, `create_at`, `pre_hash`, `hash`, `isApproved`) VALUES
(1, 3, 'Giá sạch 001', 'Vận chuyển quốc nội qua đường bộ (đơn vị tính: KG)', 5, '2020-01-08 04:14:02', 'nongtrai01-chaugia001', 'npp01-giasach001', 0),
(2, 3, '99', '99', 99, '2020-01-08 09:59:05', '9b102b6bd442cb2a5b642cdcf7058eda55c704287010c13e1cad15ea883e9680', '551c36c2931871d93714b6ab9dafd2ac6a3084d8a56d95e23171ad4a1b8755b8', 0);

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
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scanned`
--
ALTER TABLE `scanned`
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
