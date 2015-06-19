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
-- テーブルの構造 `account_tbs`
--

CREATE TABLE IF NOT EXISTS `account_tbs` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `money` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `account_tbs`
--

INSERT INTO `account_tbs` (`id`, `name`, `pass`, `date`, `money`) VALUES
(1, 'koshikawa', '1234', '2015-06-19 14:19:32', 10000),
(2, 'saito', '3110', '2015-06-19 14:20:01', 30000),
(3, 'syake', '1234', '2015-06-19 14:31:46', 300000),
(4, 'ysman', '3110', '2015-06-19 14:32:06', 500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_tbs`
--
ALTER TABLE `account_tbs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_tbs`
--
ALTER TABLE `account_tbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
