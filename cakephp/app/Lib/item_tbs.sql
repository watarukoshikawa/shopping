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
-- テーブルの構造 `item_tbs`
--

CREATE TABLE IF NOT EXISTS `item_tbs` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `price` int(10) NOT NULL,
  `text` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `item_tbs`
--

INSERT INTO `item_tbs` (`id`, `name`, `date`, `price`, `text`, `category_id`) VALUES
(1, '洗濯機1', '2015-06-19 14:21:26', 5000, '早い！\r\n安い！\r\n使いにくい！', 1),
(2, 'ゔぃとんさんTシャツ', '2015-06-19 14:22:48', 4000, '超スーパーウルトラマーベリックス高級Tシャツ', 2),
(3, 'エアコン１', '2015-06-19 14:23:42', 30000, '涼しくするぜ〜\r\n超するぜ〜', 1),
(4, 'えいりあんうぇあ', '2015-06-19 14:24:36', 100000, 'ゲーマー向け', 3),
(5, '普通のシャツ', '2015-06-19 14:25:27', 1000, '普通', 2),
(6, '色つきシャツ', '2015-06-19 14:26:05', 1300, '普通のシャツに色がつきました！', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_tbs`
--
ALTER TABLE `item_tbs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_tbs`
--
ALTER TABLE `item_tbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
