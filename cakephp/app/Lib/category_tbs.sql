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
-- テーブルの構造 `category_tbs`
--

CREATE TABLE IF NOT EXISTS `category_tbs` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `category_tbs`
--

INSERT INTO `category_tbs` (`id`, `name`, `date`) VALUES
(1, '家電', '2015-06-19 14:15:06'),
(2, '衣類', '2015-06-19 14:15:34'),
(3, 'PC', '2015-06-19 14:15:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tbs`
--
ALTER TABLE `category_tbs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_tbs`
--
ALTER TABLE `category_tbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
