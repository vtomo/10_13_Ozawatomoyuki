-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 年 3 月 01 日 12:45
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db09`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE IF NOT EXISTS `gs_an_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL,
  `upfile` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `important` int(64) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `naiyou`, `indate`, `upfile`, `important`) VALUES
(19, '体', '筋肉', '安心してください、筋トレです。', '2018-02-22 21:04:45', 'upload/20180222130445d41d8cd98f00b204e9800998ecf8427e.jpg', 25),
(20, '体', '健康', 'メロンを食べる', '2018-02-23 20:33:26', 'upload/20180223123326d41d8cd98f00b204e9800998ecf8427e.jpg', 10),
(21, '仕事', '国際的なビジネスマン', '・英語を仕事に使う\r\n・海外で働く', '2018-02-23 20:40:59', 'upload/20180223124059d41d8cd98f00b204e9800998ecf8427e.jpg', 55),
(22, '家庭', '結婚', '・婚活する', '2018-02-23 20:42:34', 'upload/20180223124234d41d8cd98f00b204e9800998ecf8427e.jpg', 45),
(23, '勉強', 'プログラミングの勉強', 'g’s academyの見学会に行く', '2018-02-23 20:43:26', 'upload/20180223124326d41d8cd98f00b204e9800998ecf8427e.png', 62),
(24, 'お金', '銀座の寿司', '給料が高い仕事を探す', '2018-02-23 20:45:45', 'upload/20180223124545d41d8cd98f00b204e9800998ecf8427e.jpg', 24),
(25, '仕事', '仕事に打ち込む', '好きな仕事を探す', '2018-02-23 20:46:45', 'upload/20180223124645d41d8cd98f00b204e9800998ecf8427e.jpg', 80),
(26, '体', '健康な体', '野菜を食べる', '2018-02-23 20:47:25', 'upload/20180223124725d41d8cd98f00b204e9800998ecf8427e.jpg', 60),
(27, 'お金', '豪邸', '不動産経営', '2018-02-23 22:05:06', 'upload/20180223140506d41d8cd98f00b204e9800998ecf8427e.jpg', 26),
(28, '恋愛', 'お嬢さん', 'テーブルマナーの勉強', '2018-02-23 22:10:19', 'upload/20180223141019d41d8cd98f00b204e9800998ecf8427e.png', 24),
(29, '体', '大きいセクスィーな体', '・筋トレ\r\n・プロテイン\r\n・糖質制限', '2018-02-24 09:55:09', 'upload/20180224015509d41d8cd98f00b204e9800998ecf8427e.jpg', 100),
(30, '恋愛', 'スペイン人と恋愛', '・スペイン語勉強\r\n・スペインへ留学', '2018-02-24 09:58:23', 'upload/20180224015823d41d8cd98f00b204e9800998ecf8427e.jpeg', 74),
(31, '仕事', 'スポーツビジネス', '・元スポーツ選手と会う', '2018-02-24 13:30:24', 'upload/20180224053024d41d8cd98f00b204e9800998ecf8427e.png', 77),
(32, '家庭', '明るい家庭', '・健康維持', '2018-02-24 13:34:29', 'upload/20180224053429d41d8cd98f00b204e9800998ecf8427e.jpg', 100),
(33, '家庭', '青い空、海、木目調の家', '・物件を探す', '2018-02-24 13:37:05', NULL, 88),
(34, '仕事', '農業', '・土地を探す\r\n・時間を作る', '2018-02-24 13:38:36', 'upload/20180224053836d41d8cd98f00b204e9800998ecf8427e.jpg', 31);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_user_table` (
`id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL DEFAULT '0',
  `life_flg` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'マネージャー', 'admin', 'admin', 1, 0),
(2, 'ユーザー', 'user', 'user', 0, 0),
(3, '退会者', 'taikai', 'taikai', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
