-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015 年 6 月 19 日 07:34
-- サーバのバージョン： 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `history_tbs`
--

CREATE TABLE IF NOT EXISTS `history_tbs` (
  `id` int(11) NOT NULL,
  `number` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `account_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `history_tbs`
--

INSERT INTO `history_tbs` (`id`, `number`, `date`, `account_id`, `item_id`) VALUES
(1, 1, '2015-06-19 09:00:00', 1, 3),
(2, 1, '2015-06-20 09:00:00', 2, 5),
(3, 1, '2015-06-21 09:00:00', 1, 4),
(4, 2, '2015-06-19 14:32:21', 3, 4),
(5, 2, '2015-06-19 14:32:43', 3, 2),
(6, 2, '2015-06-19 14:33:07', 4, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_tbs`
--
ALTER TABLE `history_tbs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_tbs`
--
ALTER TABLE `history_tbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
