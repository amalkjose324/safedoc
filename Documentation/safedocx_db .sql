-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2017 at 07:21 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

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
-- Table structure for table `safedocx_directory`
--

CREATE TABLE `safedocx_directory` (
  `directory_id` int(11) NOT NULL,
  `directory_user_id` int(11) NOT NULL,
  `directory_name` varchar(100) NOT NULL,
  `directory_description` varchar(200) NOT NULL,
  `directory_parent_id` int(11) NOT NULL,
  `directory_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_directory`
--

INSERT INTO `safedocx_directory` (`directory_id`, `directory_user_id`, `directory_name`, `directory_description`, `directory_parent_id`, `directory_status`, `created_on`, `updated_on`) VALUES
(1, 329, 'home', 'sdfsdfsdf', 0, 1, '2017-10-15 11:42:54', '2017-10-16 11:23:02'),
(2, 329, 'ABC', 'sdfsdfsdfsdfsdfdsf', 1, 1, '2017-10-16 07:50:03', '2017-10-16 11:23:07'),
(3, 329, 'asdsa', 'asdasdasd', 1, 1, '2017-10-16 13:31:41', '2017-10-16 13:31:41'),
(4, 329, 'Amal', '2016 LMCA', 1, 1, '2017-10-16 16:24:26', '2017-10-16 16:24:26'),
(5, 329, 'Sapliment', 'this is an maJSADJSFAJASUHD', 1, 1, '2017-10-16 17:01:10', '2017-10-16 17:01:10'),
(6, 329, 'Good morning', 'Abcd efghi jko lasdjsadnasdj  ', 1, 1, '2017-10-16 17:07:30', '2017-10-16 17:07:30');

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
(1, 'Kasaragod', 1),
(2, 'Kannur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_docs`
--

CREATE TABLE `safedocx_docs` (
  `doc_id` int(11) NOT NULL,
  `doc_directory_id` int(11) NOT NULL,
  `doc_caption` varchar(100) NOT NULL,
  `doc_description` varchar(300) NOT NULL DEFAULT 'No Description',
  `doc_file` varchar(100) NOT NULL,
  `doc_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_docs`
--

INSERT INTO `safedocx_docs` (`doc_id`, `doc_directory_id`, `doc_caption`, `doc_description`, `doc_file`, `doc_status`, `created_on`, `updated_on`) VALUES
(1, 1, 'SSLC BOOK', 'No Description', 'abc.pdf', 1, '2017-10-09 16:02:45', '2017-10-09 16:02:45'),
(2, 1, 'qwerty', 'No Description', 'abc11.jpg', 1, '2017-10-09 16:18:57', '2017-10-09 16:18:57'),
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
(17, 1, 'PPR_27163494', 'No Description', '1kTttN15081736250294.pdf', 1, '2017-10-16 17:07:05', '2017-10-16 17:07:05');

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
(1, 'Varified\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_links`
--

CREATE TABLE `safedocx_links` (
  `link_id` int(11) NOT NULL,
  `link_code` varchar(100) NOT NULL,
  `link_validity` int(11) NOT NULL,
  `link_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_link_permission`
--

CREATE TABLE `safedocx_link_permission` (
  `permission_id` int(11) NOT NULL,
  `permission_link_id` int(11) NOT NULL,
  `permission_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_login`
--

CREATE TABLE `safedocx_login` (
  `login_id` int(11) NOT NULL,
  `login_phone` varchar(30) NOT NULL,
  `login_email` varchar(100) NOT NULL,
  `login_pword` varchar(300) NOT NULL,
  `login_user_type` tinyint(4) NOT NULL DEFAULT '1',
  `login_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_login`
--

INSERT INTO `safedocx_login` (`login_id`, `login_phone`, `login_email`, `login_pword`, `login_user_type`, `login_status`, `created_on`, `updated_on`) VALUES
(1, '8592962849', 'amalkjose@gmail.in', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '2017-09-20 08:29:57', '2017-09-29 12:07:27'),
(2, '8078515324', 'amalkjose@mca.ajce.ins', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 1, '2017-09-20 20:04:18', '2017-10-07 20:52:00'),
(4, '8078514324', 'info.amalkjose@gmail.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 1, 1, '2017-10-01 06:14:18', '2017-10-01 11:09:00'),
(325, '8547928540', 'jyothijohnmp@mca.ajce.in', '3bac5e81e9ae5c12823426db19463d57a13770e8', 1, 1, '2017-10-05 10:05:07', '2017-10-05 10:05:07'),
(326, '8592962844', 'dkfh@sdf.ij', 'f58e595838baca4858a633d8a2be98a45b293712', 1, 1, '2017-10-05 15:42:16', '2017-10-05 15:42:16'),
(327, '87687686786', 'amal@amal.ok', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '2017-10-05 16:14:08', '2017-10-05 16:14:08'),
(328, '7777777777', '555@dk.kk', 'ad9e1bc6be01ff6f0eeed34af39c40a02cdc9880', 1, 1, '2017-10-05 16:15:29', '2017-10-05 16:15:29'),
(329, '7012848331', 'amalkjose@mca.ajce.in', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 1, 1, '2017-10-07 20:52:11', '2017-10-07 20:52:11');

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
(6, 328, 'default.png', '2017-10-05 16:15:29', '2017-10-05 16:15:29'),
(7, 329, 'default.png', '2017-10-07 20:52:11', '2017-10-07 20:52:11');

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
(22, 1, '7a5b29507f6de29a15f4c7c045977a42db8c32f0', '2017-10-05 13:26:43', '2017-10-05 13:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_shares`
--

CREATE TABLE `safedocx_shares` (
  `share_id` int(11) NOT NULL,
  `share_link_id` int(11) NOT NULL,
  `share_doc_id` int(11) NOT NULL,
  `share_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_states`
--

CREATE TABLE `safedocx_states` (
  `state_id` tinyint(4) NOT NULL,
  `state_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safedocx_states`
--

INSERT INTO `safedocx_states` (`state_id`, `state_name`) VALUES
(1, 'Kerala'),
(2, 'Tamilnadu');

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
(4, 'Amal K Jose', '677777777565', 1, '2017-10-12', '2017-10-01 07:01:24', '2017-10-01 11:41:01'),
(32, NULL, NULL, NULL, NULL, '2017-10-05 10:05:07', '2017-10-07 20:34:23'),
(324, 'Amal K Jose', '966885789855', 1, '1995-04-24', '2017-10-07 20:34:26', '2017-10-07 20:34:33'),
(326, NULL, NULL, NULL, NULL, '2017-10-05 15:42:16', '2017-10-05 15:42:16'),
(327, NULL, NULL, NULL, NULL, '2017-10-05 16:14:08', '2017-10-05 16:14:08'),
(328, NULL, NULL, NULL, NULL, '2017-10-05 16:15:29', '2017-10-05 16:15:29'),
(329, 'Amal K Jose', '701284833214', 2, '1995-03-24', '2017-10-07 20:52:12', '2017-10-07 20:53:08');

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
(2, 'admin', 'admin.php');

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
(2, 2, 0, 1),
(4, 1, 0, 0),
(5, 324, 1, 1),
(6, 4, 0, 0),
(7, 325, 0, 0),
(8, 326, 0, 0),
(9, 327, 0, 0),
(10, 328, 0, 0),
(11, 329, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `safedocx_directory`
--
ALTER TABLE `safedocx_directory`
  ADD PRIMARY KEY (`directory_id`);

--
-- Indexes for table `safedocx_districts`
--
ALTER TABLE `safedocx_districts`
  ADD PRIMARY KEY (`district_id`);

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
-- Indexes for table `safedocx_link_permission`
--
ALTER TABLE `safedocx_link_permission`
  ADD PRIMARY KEY (`permission_id`);

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
-- Indexes for table `safedocx_shares`
--
ALTER TABLE `safedocx_shares`
  ADD PRIMARY KEY (`share_id`);

--
-- Indexes for table `safedocx_states`
--
ALTER TABLE `safedocx_states`
  ADD PRIMARY KEY (`state_id`);

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
-- AUTO_INCREMENT for table `safedocx_directory`
--
ALTER TABLE `safedocx_directory`
  MODIFY `directory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `safedocx_districts`
--
ALTER TABLE `safedocx_districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `safedocx_docs`
--
ALTER TABLE `safedocx_docs`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `safedocx_links`
--
ALTER TABLE `safedocx_links`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedocx_link_permission`
--
ALTER TABLE `safedocx_link_permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedocx_login`
--
ALTER TABLE `safedocx_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;
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
  MODIFY `profile_pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `safedocx_pwreset`
--
ALTER TABLE `safedocx_pwreset`
  MODIFY `pwreset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `safedocx_shares`
--
ALTER TABLE `safedocx_shares`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedocx_states`
--
ALTER TABLE `safedocx_states`
  MODIFY `state_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `safedocx_status`
--
ALTER TABLE `safedocx_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedocx_user_type`
--
ALTER TABLE `safedocx_user_type`
  MODIFY `utype_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `safedocx_varify`
--
ALTER TABLE `safedocx_varify`
  MODIFY `varify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
