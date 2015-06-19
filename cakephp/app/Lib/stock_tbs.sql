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
-- テーブルの構造 `stock_tbs`
--

CREATE TABLE IF NOT EXISTS `stock_tbs` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `stock_tbs`
--

INSERT INTO `stock_tbs` (`id`, `number`, `date`, `item_id`) VALUES
(1, 5, '2015-06-19 14:26:34', 1),
(2, 10, '2015-06-19 14:26:52', 2),
(3, 2, '2015-06-19 14:27:27', 4),
(4, 1, '2015-06-19 14:27:43', 3),
(5, 15, '2015-06-19 14:28:36', 5),
(6, 10, '2015-06-19 14:29:00', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stock_tbs`
--
ALTER TABLE `stock_tbs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock_tbs`
--
ALTER TABLE `stock_tbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
