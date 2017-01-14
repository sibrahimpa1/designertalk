-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 09:54 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt`
--
CREATE DATABASE IF NOT EXISTS `wt` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci;
USE `wt`;

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` text COLLATE utf8_slovenian_ci NOT NULL,
  `category` varchar(11) COLLATE utf8_slovenian_ci NOT NULL,
  `image` text COLLATE utf8_slovenian_ci NOT NULL,
  `comments` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`id`, `id_user`, `title`, `category`, `image`, `comments`) VALUES
(20, 12, 'dodaj novi dizajn', 'Icons', 'images/10360442_278541085663594_8554763350767069327_n.jpg', NULL),
(22, 12, 'opet neki post iz baze', 'Icons', 'images/1525775_584170731675606_795122907_n.jpg', NULL),
(23, 12, 'opet neki novi :D', 'UI', 'images/1497652_584485594977453_665055182_n.jpg', NULL),
(26, 18, 'ajdeeee', 'Icons', 'images/1009967_321430428041326_6265486297079319528_n.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `design-comment`
--

CREATE TABLE `design-comment` (
  `id` int(11) NOT NULL,
  `id_design` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `design-comment`
--

INSERT INTO `design-comment` (`id`, `id_design`, `id_user`, `content`) VALUES
(5, 22, 12, 'novi komentar na ovaj post :D'),
(6, 20, 12, 'jos jedan komentar u postuuuuu'),
(7, 20, 18, 'bravooo'),
(8, 22, 12, 'hehehe'),
(9, 22, 18, 'novi komentar');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_slovenian_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `content` text COLLATE utf8_slovenian_ci NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `title`, `category`, `content`, `userid`) VALUES
(19, 'aaaaa', 'Icons', 'hajdeeee', 12),
(20, 'haj drugi user pls', 'UI', 'hohohohoh', 18),
(21, 'heeej', 'Icons', 'ajde ajde', 18),
(22, 'nejra forum', 'UI', 'aaaa', 18),
(23, 'reha forum', 'UI', 'reha', 18);

-- --------------------------------------------------------

--
-- Table structure for table `forum-comment`
--

CREATE TABLE `forum-comment` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `forum-comment`
--

INSERT INTO `forum-comment` (`id`, `id_post`, `id_user`, `content`) VALUES
(46, 20, 18, 'nejra\r\n'),
(47, 19, 18, 'njra'),
(48, 21, 18, 'nejra'),
(49, 19, 18, 'radi broj komentara\r\n'),
(50, 20, 12, 'dva komentara');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `email` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `email`) VALUES
(12, 'admin123', 'admin123', 'admin@admin.ad'),
(15, 'admin123444', 'admin123444', 'example@testeee.hehe'),
(18, 'tester12', 'tester12', 'tester@ah.ja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `design-comment`
--
ALTER TABLE `design-comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_design` (`id_design`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userid`);

--
-- Indexes for table `forum-comment`
--
ALTER TABLE `forum-comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_post` (`id_post`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `design-comment`
--
ALTER TABLE `design-comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `forum-comment`
--
ALTER TABLE `forum-comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `design`
--
ALTER TABLE `design`
  ADD CONSTRAINT `design_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `design-comment`
--
ALTER TABLE `design-comment`
  ADD CONSTRAINT `design-comment_ibfk_1` FOREIGN KEY (`id_design`) REFERENCES `design` (`id`),
  ADD CONSTRAINT `design-comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `forum-comment`
--
ALTER TABLE `forum-comment`
  ADD CONSTRAINT `forum-comment_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `forum` (`id`),
  ADD CONSTRAINT `forum-comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
