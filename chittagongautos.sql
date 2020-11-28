-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 05:09 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chittagongautos`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentnumber` int(7) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commenter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commenttime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `replyto` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentnumber`, `comment`, `commenter`, `commenttime`, `replyto`) VALUES
(1, ' nooo', 'anne', '11:53 AM', 0),
(2, 'hfgh', 'tushita', '11:56 AM', 0),
(3, 'the', 'rank', '11:57 AM', 2),
(4, 'hehe', 'dcsdcdc', '11:57 AM', 1),
(5, 'tushinana', 'chayti', '11:58 AM', 2),
(6, 'i hate', 'konka', '11:59 AM', 1),
(7, '@tushita lol', 'haha', '12:03 PM', 2),
(8, '@anne dfsf', 'dfsf', '12:09 PM', 1),
(9, '@anne no', 'hashi ', '1:28 PM', 1),
(10, '@tushita sdsd', 'dsf', '1:33 PM', 2),
(11, '@tushita ds', 'dsfs', '1:35 PM', 2),
(12, '@anne sds', 'dsf', '1:35 PM', 1),
(13, '@tushita dsdds', 'dfdsf', '1:36 PM', 2),
(14, '@anne ds', 'ssd', '1:36 PM', 1),
(15, '@tushita dsd', 'ssd', '1:41 PM', 2),
(16, '@anne aas', 'ssdas', '1:42 PM', 1),
(17, '@tushita jkl', 'hgg', '1:44 PM', 2),
(18, '@anne sas', 'asdad', '1:51 PM', 1),
(19, '@tushita dss', 'edew', '1:51 PM', 2),
(20, '@anne dsd', 'dsd', '1:51 PM', 1),
(21, '@anne sdds', 'dcsd', '1:52 PM', 1),
(22, '@anne dsd', 'dds', '1:52 PM', 1),
(23, '@tushita sdsaf', 'fafaf', '9:37 PM', 2),
(24, '@tushita ssa', 'sadas', '9:37 PM', 2),
(25, '@dcsdcdc dsf', 'dvs', '9:39 PM', 4),
(26, '@tushita xvxzv', 'xzczc', '11:33 AM', 2),
(27, '@tushita cv', 'cvx', '11:33 AM', 2),
(28, '@dsf cvcxv', 'xcvxc', '11:33 AM', 10),
(29, 'Hey', 'Tasnim', '10:28 AM', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentnumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentnumber` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
