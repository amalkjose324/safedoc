-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 11:33 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safedocx_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_districts`
--

CREATE TABLE `safedocx_districts` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `district_state_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_districts`
--

INSERT INTO `safedocx_districts` (`district_id`, `district_name`, `district_state_id`) VALUES
(1, 'kannur', 1),
(2, 'Palakkad', 2),
(3, 'Kozhikkod', 2),
(4, 'Kasaragod', 1),
(5, 'Malappuram', 1),
(6, 'Kottayam', 2);

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_docs`
--

CREATE TABLE `safedocx_docs` (
  `doc_id` int(11) NOT NULL,
  `doc_user_id` int(11) NOT NULL,
  `doc_caption` varchar(100) NOT NULL,
  `doc_description` varchar(300) NOT NULL DEFAULT 'No Description',
  `doc_file` varchar(100) NOT NULL,
  `doc_status` tinyint(4) NOT NULL DEFAULT '2',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_docs`
--

INSERT INTO `safedocx_docs` (`doc_id`, `doc_user_id`, `doc_caption`, `doc_description`, `doc_file`, `doc_status`, `created_on`, `updated_on`) VALUES
(3, 1, 'optlampptempphpJDauBK', 'No Description', 'JDauBK15081686713033.pdf', 1, '2017-10-16 15:44:31', '2017-10-16 15:44:31'),
(4, 1, 'Mark List.pdf', 'No Description', 'SrsArE15081687787029.pdf', 1, '2017-10-16 15:46:18', '2017-10-16 15:46:18'),
(5, 1, 'Mark List.pdf', 'No Description', 'x3RupD15081688380953.pdf', 1, '2017-10-16 15:47:18', '2017-10-16 15:47:18'),
(6, 1, 'PPR27163494.pdf', 'No Description', '0SD5NO15081688381695.pdf', 1, '2017-10-16 15:47:18', '2017-10-16 15:47:18'),
(7, 1, 'resultAJC.pdf', 'No Description', 'dQAHc015081688382336.pdf', 1, '2017-10-16 15:47:18', '2017-10-16 15:47:18'),
(8, 1, 'ResumeAmal.pdf', 'No Description', 'Qq7kBb15081688382918.pdf', 1, '2017-10-16 15:47:18', '2017-10-16 15:47:18'),
(9, 1, 'ResumeAmalKJose.pdf', 'No Description', 'rvZB0m15081688383941.pdf', 1, '2017-10-16 15:47:18', '2017-10-16 15:47:18'),
(10, 1, 'Semester Grade Card.pdf', 'No Description', 'HirFPJ15081688384703.pdf', 1, '2017-10-16 15:47:18', '2017-10-16 15:47:18'),
(11, 1, 'Semester Grade Card 1.pdf', 'No Description', 'yG5gfV15081688385149.pdf', 1, '2017-10-16 15:47:18', '2017-10-16 15:47:18'),
(12, 1, 'Resume_Amal_K_Jose', 'No Description', 'ah09I31508172009097.pdf', 1, '2017-10-16 16:40:09', '2017-10-16 16:40:09'),
(13, 1, 'result_AJC', 'No Description', 'ep4JX8150817319433.pdf', 1, '2017-10-16 16:59:54', '2017-10-16 16:59:54'),
(14, 1, 'result_AJC', 'No Description', 'LhtT0M15081732523155.pdf', 1, '2017-10-16 17:00:52', '2017-10-16 17:00:52'),
(15, 1, 'PPR_27163494', 'No Description', '0rcfAh15081733069513.pdf', 1, '2017-10-16 17:01:46', '2017-10-16 17:01:46'),
(16, 1, 'Mark List', 'No Description', 'hf0YvN15081734497317.pdf', 1, '2017-10-16 17:04:09', '2017-10-16 17:04:09'),
(17, 1, 'PPR_27163494', 'No Description', '1kTttN15081736250294.pdf', 1, '2017-10-16 17:07:05', '2017-10-16 17:07:05'),
(18, 8, 'Mark List', 'No Description', 'rfn8UG15083898182983.pdf', 1, '2017-10-19 05:10:18', '2017-10-19 05:10:18'),
(19, 8, 'Mark List', 'No Description', 'T47F9Y15083899479009.pdf', 1, '2017-10-19 05:12:27', '2017-10-19 05:12:27'),
(20, 8, 'PPR_27163494', 'No Description', 'aWnr2q15083899479516.pdf', 1, '2017-10-19 05:12:27', '2017-10-19 05:12:27'),
(21, 8, 'result_AJC', 'No Description', 'vBCdVS15083899479964.pdf', 1, '2017-10-19 05:12:27', '2017-10-19 05:12:27'),
(22, 8, 'Resume_Amal', 'No Description', 'Sey0Nk15083899480412.pdf', 1, '2017-10-19 05:12:28', '2017-10-19 05:12:28'),
(23, 8, 'Resume_Amal_K_Jose', 'No Description', '5SN0IM15083899481305.pdf', 1, '2017-10-19 05:12:28', '2017-10-19 05:12:28'),
(24, 8, 'Semester Grade Card', 'No Description', 'T4qOAG15083899482196.pdf', 1, '2017-10-19 05:12:28', '2017-10-19 05:12:28'),
(25, 329, 'ASDSAD', 'AdAsdASD', '11A5.tmp15109339958206.pdf', 3, '2017-11-17 15:53:15', '2017-11-22 10:26:37'),
(27, 329, 'AMALKJOSE', 'amalkjose', '618C.tmp15109340162601.pdf', 3, '2017-11-17 15:53:36', '2017-11-22 10:26:39'),
(28, 329, 'Free of use', 'Amal K Jose', 'D2E5.tmp15111960287547.pdf', 1, '2017-11-20 16:40:28', '2017-11-22 09:21:22'),
(29, 330, 'SafeDocx-CoverFinal', 'No Description', 'D10A.tmp1511286664557.pdf', 1, '2017-11-21 17:51:04', '2017-11-21 17:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_doc_status`
--

CREATE TABLE `safedocx_doc_status` (
  `doc_status_id` int(11) NOT NULL,
  `doc_status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_doc_status`
--

INSERT INTO `safedocx_doc_status` (`doc_status_id`, `doc_status_name`) VALUES
(1, 'Verified\r\n'),
(2, 'Pending'),
(3, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_links`
--

CREATE TABLE `safedocx_links` (
  `link_id` int(11) NOT NULL,
  `link_doc_id` int(11) NOT NULL,
  `link_name` varchar(100) NOT NULL,
  `link_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_links`
--

INSERT INTO `safedocx_links` (`link_id`, `link_doc_id`, `link_name`, `link_status`, `created_on`, `updated_on`) VALUES
(1, 28, 'amal', 1, '2017-11-21 17:05:08', '2017-11-21 17:05:08'),
(2, 28, 'amals', 1, '2017-11-21 17:05:26', '2017-11-21 17:05:26'),
(3, 28, 'amalk', 1, '2017-11-21 17:07:47', '2017-11-21 17:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_login`
--

CREATE TABLE `safedocx_login` (
  `login_id` int(11) NOT NULL,
  `login_phone` varchar(30) NOT NULL,
  `login_email` varchar(100) NOT NULL,
  `login_pword` varchar(300) NOT NULL,
  `login_user_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1. User, 2. Admi, 3. State Nodal, 4. District Nodal, 5. Attester',
  `login_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_login`
--

INSERT INTO `safedocx_login` (`login_id`, `login_phone`, `login_email`, `login_pword`, `login_user_type`, `login_status`, `created_on`, `updated_on`) VALUES
(2, '8078515324', 'amalkjose@mca.ajce.in', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 1, '2017-09-20 20:04:18', '2017-11-06 15:00:28'),
(325, '8547928540', 'jyothijohnmp@mca.ajce.in', '3bac5e81e9ae5c12823426db19463d57a13770e8', 1, 1, '2017-10-05 10:05:07', '2017-11-05 18:25:51'),
(326, '8592962844', 'dkfh@sdf.int', 'f58e595838baca4858a633d8a2be98a45b293712', 1, 1, '2017-10-05 15:42:16', '2017-11-05 18:25:13'),
(327, '8768768679', 'amal@amal.oks', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '2017-10-05 16:14:08', '2017-11-06 14:49:06'),
(328, '7777777777', '555@dk.kk', 'ad9e1bc6be01ff6f0eeed34af39c40a02cdc9880', 3, 1, '2017-10-05 16:15:29', '2017-11-05 11:54:00'),
(329, '7012848331', 'amalkjose@mca.ajce.in', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 1, 1, '2017-10-07 20:52:11', '2017-11-06 14:57:49'),
(330, '8078514324', 'mail@amalkjose.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 1, 1, '2017-10-17 02:37:59', '2017-11-21 17:44:51'),
(331, '9744967620', 'jetty@amaljyothi.ac.in', '78b3516e200d9eca2e1b652017a82a071c878f8f', 3, 1, '2017-10-19 04:57:13', '2017-11-06 16:00:16'),
(332, '8592962849', 'mail@amalkjose.in', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 1, 1, '2017-11-06 15:47:11', '2017-11-06 15:48:46'),
(333, '8592962848', 'amalkjose@123.com', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 1, 1, '2017-11-06 15:50:45', '2017-11-06 15:50:45'),
(334, '8212848335', '', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 3, 1, '2017-11-06 15:53:45', '2017-11-06 15:53:45'),
(335, '8592962847', '', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 3, 1, '2017-11-06 15:54:14', '2017-11-06 15:54:14'),
(336, '8592962857', '', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 3, 1, '2017-11-06 15:57:37', '2017-11-06 15:57:37'),
(337, '8592962840', '8592962849@jaskjd.idd', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 3, 1, '2017-11-06 15:59:49', '2017-11-06 15:59:49'),
(338, '7894567893', 'attester@attester.com', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 5, 1, '2017-11-06 16:05:44', '2017-11-22 09:43:08'),
(339, '7012848991', 'mail_123@gmail.com', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 4, 1, '2017-11-12 10:37:35', '2017-11-12 11:37:17'),
(340, '7012848992', 'amal@qwerty.com', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 4, 1, '2017-11-12 12:30:27', '2017-11-12 13:32:01'),
(341, '7946135000', 'qwertu@qwert.cx', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 4, 1, '2017-11-12 13:21:23', '2017-11-12 13:21:23'),
(342, '7894561230', 'amal@amal.ama', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 4, 1, '2017-11-12 13:22:10', '2017-11-12 13:22:10'),
(343, '7854692480', 'jabir@jab.in', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 4, 1, '2017-11-12 13:24:21', '2017-11-12 13:24:21'),
(344, '8592962850', 'amal@amal.kjo', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 4, 1, '2017-11-12 13:25:40', '2017-11-12 13:25:40'),
(345, '7012848922', 'amal@jsjjs.jsj', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 4, 1, '2017-11-12 13:26:44', '2017-11-12 13:26:44'),
(346, '8200000000', 'amal0000@nwer.com', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 4, 1, '2017-11-12 13:27:24', '2017-11-12 13:27:24'),
(347, '8592962842', 'spider@spider.com', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 5, 1, '2017-11-12 14:24:04', '2017-11-22 09:43:10'),
(348, '7012840000', 'amal@tyuy.ih', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 5, 1, '2017-11-12 14:41:35', '2017-11-12 14:41:35'),
(349, '8589803556', 'vishnuskumar95@gmail.com', '5bb6a238a8b25141c697366030fe7a1d172f7d9d', 1, 1, '2017-11-17 10:36:52', '2017-11-17 10:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_login_log`
--

CREATE TABLE `safedocx_login_log` (
  `log_id` int(11) NOT NULL,
  `log_ip` varchar(50) NOT NULL,
  `log_browser` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_otp`
--

CREATE TABLE `safedocx_otp` (
  `otp_id` int(11) NOT NULL,
  `otp_login_id` int(11) NOT NULL,
  `otp_type` tinyint(4) NOT NULL COMMENT '0: phone  1: email',
  `otp_password` varchar(200) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_otp`
--

INSERT INTO `safedocx_otp` (`otp_id`, `otp_login_id`, `otp_type`, `otp_password`, `created_on`) VALUES
(11, 2, 0, '168921e821401f4f8fcff91b8dafdea182e0afae', '2017-10-07 20:26:24'),
(13, 329, 1, '6525ac0a3801fd78ab4e2e754cc09261a0fc7d4e', '2017-10-07 20:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_profile_pic`
--

CREATE TABLE `safedocx_profile_pic` (
  `profile_pic_id` int(11) NOT NULL,
  `profile_pic_user_id` int(11) NOT NULL,
  `profile_pic_image` varchar(300) NOT NULL DEFAULT 'default.png',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_profile_pic`
--

INSERT INTO `safedocx_profile_pic` (`profile_pic_id`, `profile_pic_user_id`, `profile_pic_image`, `created_on`, `updated_on`) VALUES
(1, 324, '1507408502.png', '2017-09-28 16:41:09', '2017-10-07 20:35:02'),
(2, 4, '1506841333.png', '2017-10-01 06:14:18', '2017-10-01 07:02:13'),
(3, 325, 'default.png', '2017-10-05 10:05:07', '2017-10-05 10:05:07'),
(4, 326, 'default.png', '2017-10-05 15:42:16', '2017-10-05 15:42:16'),
(5, 327, 'default.png', '2017-10-05 16:14:08', '2017-10-05 16:14:08'),
(6, 328, '1510471436.png', '2017-10-05 16:15:29', '2017-11-12 07:23:56'),
(7, 329, '1510815477.png', '2017-10-07 20:52:11', '2017-11-16 06:57:57'),
(8, 330, 'default.png', '2017-10-17 02:37:59', '2017-10-17 02:37:59'),
(9, 331, '1508389452.png', '2017-10-19 04:57:13', '2017-10-19 05:04:12'),
(10, 332, 'default.png', '2017-11-06 15:47:11', '2017-11-06 15:47:11'),
(11, 333, 'default.png', '2017-11-06 15:50:45', '2017-11-06 15:50:45'),
(12, 334, 'default.png', '2017-11-06 15:53:45', '2017-11-06 15:53:45'),
(13, 334, 'default.png', '2017-11-06 15:54:14', '2017-11-06 15:54:14'),
(14, 335, 'default.png', '2017-11-06 15:54:14', '2017-11-06 15:54:14'),
(15, 334, 'default.png', '2017-11-06 15:57:37', '2017-11-06 15:57:37'),
(16, 335, 'default.png', '2017-11-06 15:57:37', '2017-11-06 15:57:37'),
(17, 336, 'default.png', '2017-11-06 15:57:37', '2017-11-06 15:57:37'),
(18, 337, 'default.png', '2017-11-06 15:59:49', '2017-11-06 15:59:49'),
(19, 338, 'default.png', '2017-11-06 16:05:44', '2017-11-06 16:05:44'),
(20, 339, 'default.png', '2017-11-12 10:37:35', '2017-11-12 10:37:35'),
(21, 340, 'default.png', '2017-11-12 12:30:28', '2017-11-12 12:30:28'),
(22, 341, 'default.png', '2017-11-12 13:21:23', '2017-11-12 13:21:23'),
(23, 342, 'default.png', '2017-11-12 13:22:10', '2017-11-12 13:22:10'),
(24, 343, 'default.png', '2017-11-12 13:24:21', '2017-11-12 13:24:21'),
(25, 344, 'default.png', '2017-11-12 13:25:40', '2017-11-12 13:25:40'),
(26, 345, 'default.png', '2017-11-12 13:26:44', '2017-11-12 13:26:44'),
(27, 346, 'default.png', '2017-11-12 13:27:24', '2017-11-12 13:27:24'),
(28, 347, 'default.png', '2017-11-12 14:24:04', '2017-11-12 14:24:04'),
(29, 348, 'default.png', '2017-11-12 14:41:35', '2017-11-12 14:41:35'),
(30, 349, 'default.png', '2017-11-17 10:36:52', '2017-11-17 10:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_pwreset`
--

CREATE TABLE `safedocx_pwreset` (
  `pwreset_id` int(11) NOT NULL,
  `pwreset_login_id` int(11) NOT NULL,
  `pwreset_password` varchar(300) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_pwreset`
--

INSERT INTO `safedocx_pwreset` (`pwreset_id`, `pwreset_login_id`, `pwreset_password`, `created_on`, `updated_on`) VALUES
(44, 327, '03072df361cf6a6dbc90a41ae19badc47ca2f079', '2017-11-06 14:44:23', '2017-11-06 14:44:23'),
(80, 331, '03072df361cf6a6dbc90a41ae19badc47ca2f079', '2017-11-06 16:00:21', '2017-11-06 16:00:21'),
(86, 338, '03072df361cf6a6dbc90a41ae19badc47ca2f079', '2017-11-12 14:23:25', '2017-11-12 14:23:25'),
(87, 347, '03072df361cf6a6dbc90a41ae19badc47ca2f079', '2017-11-12 14:30:23', '2017-11-12 14:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_shareboxs`
--

CREATE TABLE `safedocx_shareboxs` (
  `sharebox_id` int(11) NOT NULL,
  `sharebox_user_id` int(11) NOT NULL,
  `sharebox_caption` varchar(50) NOT NULL,
  `sharebox_description` varchar(300) NOT NULL,
  `sharebox_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_shareboxs`
--

INSERT INTO `safedocx_shareboxs` (`sharebox_id`, `sharebox_user_id`, `sharebox_caption`, `sharebox_description`, `sharebox_status`, `created_on`, `updated_on`) VALUES
(1, 329, 'Amal', 'wewewwqwewqeqwe', 1, '2017-11-18 16:05:01', '0000-00-00 00:00:00'),
(2, 329, 'adsasda', 'qweqweqweqweqweqwe', 1, '2017-11-18 16:05:23', '0000-00-00 00:00:00'),
(3, 329, 'qweqweqweqwe', 'qweqweqweqweqweqwe', 1, '2017-11-18 16:05:32', '0000-00-00 00:00:00'),
(4, 329, 'adsasda', 'sdfsdfsdfdsf', 1, '2017-11-20 16:44:49', '0000-00-00 00:00:00'),
(5, 329, 'Spark', 'Group A', 1, '2017-11-21 14:11:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_sharebox_status`
--

CREATE TABLE `safedocx_sharebox_status` (
  `sb_status_id` tinyint(4) NOT NULL,
  `sb_status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_shares`
--

CREATE TABLE `safedocx_shares` (
  `share_id` int(11) NOT NULL,
  `share_recipient_id` int(11) NOT NULL,
  `share_doc_id` int(11) NOT NULL,
  `share_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_shares`
--

INSERT INTO `safedocx_shares` (`share_id`, `share_recipient_id`, `share_doc_id`, `share_status`, `created_on`, `updated_on`) VALUES
(1, 331, 28, 1, '2017-11-21 16:12:47', '2017-11-21 17:40:14'),
(2, 330, 28, 1, '2017-11-21 17:43:56', '2017-11-21 17:43:56'),
(3, 329, 29, 1, '2017-11-21 18:01:03', '2017-11-21 18:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_states`
--

CREATE TABLE `safedocx_states` (
  `state_def_id` int(11) NOT NULL,
  `state_id` tinyint(4) NOT NULL,
  `state_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_states`
--

INSERT INTO `safedocx_states` (`state_def_id`, `state_id`, `state_name`) VALUES
(2, 2, 'Tamilnadu'),
(3, 3, 'Karnataka'),
(4, 4, 'Goa'),
(6, 1, 'Kerala'),
(13, 5, 'Maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_status`
--

CREATE TABLE `safedocx_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_users`
--

CREATE TABLE `safedocx_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_aadhaar_no` varchar(50) DEFAULT NULL,
  `user_district_id` tinyint(4) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_users`
--

INSERT INTO `safedocx_users` (`user_id`, `user_name`, `user_aadhaar_no`, `user_district_id`, `user_dob`, `created_on`, `updated_on`) VALUES
(2, 'Amal K Jose', '966885789989', 1, '2017-09-21', '2017-09-29 08:19:09', '2017-10-05 13:49:36'),
(4, 'Amal K Jose', '677777777565', NULL, '2017-10-12', '2017-10-01 07:01:24', '2017-11-05 12:21:55'),
(32, NULL, NULL, NULL, NULL, '2017-10-05 10:05:07', '2017-10-07 20:34:23'),
(324, 'Amal K Jose', '966885789855', 1, '1995-04-24', '2017-10-07 20:34:26', '2017-10-07 20:34:33'),
(326, NULL, NULL, NULL, NULL, '2017-10-05 15:42:16', '2017-10-05 15:42:16'),
(327, NULL, NULL, NULL, NULL, '2017-10-05 16:14:08', '2017-10-05 16:14:08'),
(328, 'Rahul', '654654546546', 2, '2017-11-17', '2017-10-05 16:15:29', '2017-11-12 12:39:45'),
(329, 'Amal K Jose', '701284833284', 4, '1995-03-24', '2017-10-07 20:52:12', '2017-11-21 18:55:24'),
(330, 'Amak K Jose', '701284899625', 0, '1995-03-24', '2017-10-17 02:37:59', '2017-11-05 12:33:31'),
(331, 'jetty benjamin', '122344455566', 1, '2012-02-03', '2017-10-19 04:57:13', '2017-10-19 05:01:36'),
(332, NULL, NULL, NULL, NULL, '2017-11-06 15:47:11', '2017-11-06 15:47:11'),
(333, NULL, NULL, 2, NULL, '2017-11-06 15:50:45', '2017-11-12 12:45:10'),
(334, NULL, NULL, 3, NULL, '2017-11-06 15:53:45', '2017-11-12 12:45:08'),
(335, NULL, NULL, NULL, NULL, '2017-11-06 15:54:14', '2017-11-06 15:54:14'),
(336, NULL, NULL, NULL, NULL, '2017-11-06 15:57:37', '2017-11-06 15:57:37'),
(337, NULL, NULL, NULL, NULL, '2017-11-06 15:59:49', '2017-11-06 15:59:49'),
(338, NULL, NULL, NULL, NULL, '2017-11-06 16:05:44', '2017-11-06 16:05:44'),
(339, NULL, NULL, NULL, NULL, '2017-11-12 10:37:35', '2017-11-12 10:37:35'),
(340, NULL, NULL, 2, NULL, '2017-11-12 12:30:28', '2017-11-12 12:45:01'),
(341, NULL, NULL, 3, NULL, '2017-11-12 13:21:23', '2017-11-12 13:21:23'),
(343, NULL, NULL, NULL, NULL, '2017-11-12 13:24:22', '2017-11-12 13:24:22'),
(344, NULL, NULL, NULL, NULL, '2017-11-12 13:25:40', '2017-11-12 13:25:40'),
(345, NULL, NULL, 2, NULL, '2017-11-12 13:26:44', '2017-11-12 13:26:44'),
(346, 'Swathi', '794562854588', 4, '2017-11-03', '2017-11-12 13:27:24', '2017-11-12 13:44:19'),
(347, NULL, NULL, NULL, NULL, '2017-11-12 14:24:04', '2017-11-12 14:24:04'),
(348, 'Amal', '755822268682', 4, '2017-11-09', '2017-11-12 14:41:35', '2017-11-21 18:15:10'),
(349, NULL, NULL, NULL, NULL, '2017-11-17 10:36:52', '2017-11-17 10:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_user_type`
--

CREATE TABLE `safedocx_user_type` (
  `utype_id` tinyint(4) NOT NULL,
  `utype_name` varchar(50) NOT NULL,
  `utype_page` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_user_type`
--

INSERT INTO `safedocx_user_type` (`utype_id`, `utype_name`, `utype_page`) VALUES
(1, 'user', 'users.php'),
(2, 'admin', 'admin.php'),
(3, 's_nodal', 's_nodal.php'),
(4, 'd_nodal', 'd_nodal.php'),
(5, 'attestor', 'attestor.php');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_varify`
--

CREATE TABLE `safedocx_varify` (
  `varify_id` int(11) NOT NULL,
  `varify_login_id` int(11) NOT NULL,
  `varify_phone` tinyint(4) NOT NULL DEFAULT '0',
  `varify_email` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_varify`
--

INSERT INTO `safedocx_varify` (`varify_id`, `varify_login_id`, `varify_phone`, `varify_email`) VALUES
(2, 2, 1, 1),
(4, 1, 0, 0),
(5, 324, 1, 1),
(6, 4, 0, 0),
(7, 325, 0, 0),
(8, 326, 0, 0),
(9, 327, 0, 0),
(10, 328, 1, 1),
(11, 329, 1, 1),
(12, 330, 1, 1),
(13, 331, 1, 1),
(14, 332, 0, 0),
(15, 333, 0, 0),
(16, 334, 0, 0),
(17, 334, 0, 0),
(18, 335, 0, 0),
(19, 334, 0, 0),
(20, 335, 0, 0),
(21, 336, 0, 0),
(22, 337, 0, 0),
(23, 338, 1, 0),
(24, 339, 0, 0),
(25, 340, 0, 0),
(26, 341, 0, 0),
(27, 342, 0, 0),
(28, 343, 0, 0),
(29, 344, 0, 0),
(30, 345, 0, 0),
(31, 346, 1, 1),
(32, 347, 0, 0),
(33, 348, 1, 1),
(34, 349, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `safedocx_districts`
--
ALTER TABLE `safedocx_districts`
  ADD PRIMARY KEY (`district_id`),
  ADD UNIQUE KEY `district_id` (`district_id`),
  ADD UNIQUE KEY `district_name` (`district_name`);

--
-- Indexes for table `safedocx_docs`
--
ALTER TABLE `safedocx_docs`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `safedocx_doc_status`
--
ALTER TABLE `safedocx_doc_status`
  ADD PRIMARY KEY (`doc_status_id`);

--
-- Indexes for table `safedocx_links`
--
ALTER TABLE `safedocx_links`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `safedocx_login`
--
ALTER TABLE `safedocx_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `safedocx_login_log`
--
ALTER TABLE `safedocx_login_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `safedocx_otp`
--
ALTER TABLE `safedocx_otp`
  ADD PRIMARY KEY (`otp_id`);

--
-- Indexes for table `safedocx_profile_pic`
--
ALTER TABLE `safedocx_profile_pic`
  ADD PRIMARY KEY (`profile_pic_id`);

--
-- Indexes for table `safedocx_pwreset`
--
ALTER TABLE `safedocx_pwreset`
  ADD PRIMARY KEY (`pwreset_id`);

--
-- Indexes for table `safedocx_shareboxs`
--
ALTER TABLE `safedocx_shareboxs`
  ADD PRIMARY KEY (`sharebox_id`);

--
-- Indexes for table `safedocx_sharebox_status`
--
ALTER TABLE `safedocx_sharebox_status`
  ADD PRIMARY KEY (`sb_status_id`);

--
-- Indexes for table `safedocx_shares`
--
ALTER TABLE `safedocx_shares`
  ADD PRIMARY KEY (`share_id`);

--
-- Indexes for table `safedocx_states`
--
ALTER TABLE `safedocx_states`
  ADD PRIMARY KEY (`state_def_id`),
  ADD UNIQUE KEY `state_name` (`state_name`),
  ADD UNIQUE KEY `state_id` (`state_id`);

--
-- Indexes for table `safedocx_status`
--
ALTER TABLE `safedocx_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `safedocx_users`
--
ALTER TABLE `safedocx_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `safedocx_user_type`
--
ALTER TABLE `safedocx_user_type`
  ADD PRIMARY KEY (`utype_id`);

--
-- Indexes for table `safedocx_varify`
--
ALTER TABLE `safedocx_varify`
  ADD PRIMARY KEY (`varify_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `safedocx_districts`
--
ALTER TABLE `safedocx_districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `safedocx_docs`
--
ALTER TABLE `safedocx_docs`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `safedocx_links`
--
ALTER TABLE `safedocx_links`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `safedocx_login`
--
ALTER TABLE `safedocx_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `safedocx_login_log`
--
ALTER TABLE `safedocx_login_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `safedocx_otp`
--
ALTER TABLE `safedocx_otp`
  MODIFY `otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `safedocx_profile_pic`
--
ALTER TABLE `safedocx_profile_pic`
  MODIFY `profile_pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `safedocx_pwreset`
--
ALTER TABLE `safedocx_pwreset`
  MODIFY `pwreset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `safedocx_shareboxs`
--
ALTER TABLE `safedocx_shareboxs`
  MODIFY `sharebox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `safedocx_sharebox_status`
--
ALTER TABLE `safedocx_sharebox_status`
  MODIFY `sb_status_id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `safedocx_shares`
--
ALTER TABLE `safedocx_shares`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `safedocx_states`
--
ALTER TABLE `safedocx_states`
  MODIFY `state_def_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `safedocx_status`
--
ALTER TABLE `safedocx_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `safedocx_user_type`
--
ALTER TABLE `safedocx_user_type`
  MODIFY `utype_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `safedocx_varify`
--
ALTER TABLE `safedocx_varify`
  MODIFY `varify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
