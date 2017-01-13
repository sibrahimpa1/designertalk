-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2017 at 11:55 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_slovenian_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `content` text COLLATE utf8_slovenian_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `email` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

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
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `forum-comment`
--
ALTER TABLE `forum-comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_post` (`id_post`) USING BTREE;

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `design-comment`
--
ALTER TABLE `design-comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum-comment`
--
ALTER TABLE `forum-comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `design`
--
ALTER TABLE `design`
  ADD CONSTRAINT `design_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `korisnici` (`id`);

--
-- Constraints for table `design-comment`
--
ALTER TABLE `design-comment`
  ADD CONSTRAINT `design-comment_ibfk_1` FOREIGN KEY (`id_design`) REFERENCES `design` (`id`),
  ADD CONSTRAINT `design-comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `korisnici` (`id`);

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `korisnici` (`id`);

--
-- Constraints for table `forum-comment`
--
ALTER TABLE `forum-comment`
  ADD CONSTRAINT `forum-comment_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `forum` (`id`),
  ADD CONSTRAINT `forum-comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `korisnici` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
