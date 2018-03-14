-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 05:34 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `t_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `t_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `o_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_teams` int(5) DEFAULT NULL,
  `no_byes` int(5) DEFAULT NULL,
  `no_rounds` int(5) DEFAULT NULL,
  `team_names` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `schedule_html` text COLLATE utf8_unicode_ci,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `t_id`, `t_name`, `o_name`, `no_teams`, `no_byes`, `no_rounds`, `team_names`, `schedule_html`, `date`, `time`, `status`) VALUES
(1, 'match_2018/03/08', 'match', 'jd', 3, 1, 2, NULL, NULL, NULL, NULL, NULL),
(2, 'match_2018/03/08', 'match', 'jd', 3, 1, 2, NULL, NULL, NULL, NULL, NULL),
(3, 'match_2018/03/08', 'match', 'jd', 3, 1, 2, NULL, NULL, NULL, NULL, NULL),
(4, 'match_2018/03/08', 'match', 'jd', 3, 1, 2, NULL, NULL, NULL, NULL, NULL),
(5, 'asd_2018/03/09_09:35:33', 'asd', 'asd', 3, 1, 2, 'one_two_three', NULL, NULL, NULL, NULL),
(6, 'asd_2018/03/09_09:58:21', 'asd', 'aa', 4, 0, 2, 'one_two_three_four', NULL, NULL, NULL, NULL),
(7, 'asd_2018/03/09_09:59:03', 'asd', 'aa', 3, 1, 2, 'one_two_three', NULL, NULL, NULL, NULL),
(8, 'asd_2018/03/09_10:00:24', 'asd', 'aa', 11, 5, 4, '1_2_3_4_5_6_7_8_9_10_11', NULL, NULL, NULL, NULL),
(9, 'this_2018/03/12_01:00:14', 'this', 'ipl', 3, 1, 2, 'one_two_three', NULL, NULL, NULL, NULL),
(10, 'this_2018/03/12_01:01:24', 'this', 'ddd', 11, 5, 4, '1_2_34_4_5_6_7_8_9_10_11', NULL, NULL, NULL, NULL),
(11, 'this _2018/03/12_01:12:16', 'this ', 'jdjdj', 11, 5, 4, 'one_two_three_four_5_6_7_8_9_10_11', NULL, NULL, NULL, NULL),
(12, 'this _2018/03/12_01:40:08', 'this ', 'jdjdj', 4, 0, 2, '1_2_3_4', NULL, NULL, NULL, NULL),
(13, 'this _2018/03/12_01:43:52', 'this ', 'jdjdj', 6, 2, 3, '_____', NULL, NULL, NULL, NULL),
(14, 'this _2018/03/12_01:44:45', 'this ', 'jdjdj', 6, 2, 3, '1_2_3_7_8_9', NULL, NULL, NULL, NULL),
(15, 'adas_2018/03/12_08:35:44', 'adas', 'adas', 11, 5, 4, '__________', NULL, NULL, NULL, NULL),
(16, 'abcd_2018/03/12_08:56:18', 'abcd', 'aha', 11, 5, 4, '1_2_3_4_5_6_7_8_9_10_11', NULL, NULL, NULL, NULL),
(17, 'kfjak_2018/03/12_09:06:57', 'kfjak', 'iaji', 11, 5, 4, '1_2_3_4_5_6_7_8_9_10_11', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
