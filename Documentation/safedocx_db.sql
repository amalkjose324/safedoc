-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2017 at 02:56 PM
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
-- Table structure for table `safedocx_districts`
--

CREATE TABLE `safedocx_districts` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `district_state_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_docs`
--

CREATE TABLE `safedocx_docs` (
  `doc_id` int(11) NOT NULL,
  `doc_type` tinyint(4) NOT NULL,
  `doc_caption` varchar(100) NOT NULL,
  `doc_exp_date` date NOT NULL,
  `doc_code` varchar(100) NOT NULL,
  `doc_issued_by` date NOT NULL,
  `doc_file` varchar(100) NOT NULL,
  `doc_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_doc_status`
--

CREATE TABLE `safedocx_doc_status` (
  `doc_status_id` int(11) NOT NULL,
  `doc_status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedocx_doc_type`
--

CREATE TABLE `safedocx_doc_type` (
  `doc_type_id` int(11) NOT NULL,
  `doc_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '8592962849', 'amalkjose@mca.ajce.in', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '2017-09-20 08:29:57', '2017-09-24 14:40:36'),
(2, '8078515324', 'amalkjose@mca.ajce.in', '39807dbae8c56ded273aa1ea74d04b0f2e8686df', 1, 1, '2017-09-20 20:04:18', '2017-09-24 14:40:39'),
(3, '7012848331', 'amalkjose324@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '2017-09-20 20:53:45', '2017-09-24 14:40:42');

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
  `user_name` varchar(100) NOT NULL,
  `user_aadhaar_no` varchar(50) NOT NULL,
  `user_district_id` tinyint(4) NOT NULL,
  `user_photo` varchar(300) NOT NULL,
  `user_dob` date NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'User', 'users.php'),
(2, 'Admin', 'admin.php');

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
(4, 1, 1, 1),
(5, 3, 1, 1);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `safedocx_doc_type`
--
ALTER TABLE `safedocx_doc_type`
  ADD PRIMARY KEY (`doc_type_id`);

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
-- AUTO_INCREMENT for table `safedocx_districts`
--
ALTER TABLE `safedocx_districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedocx_docs`
--
ALTER TABLE `safedocx_docs`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `safedocx_login_log`
--
ALTER TABLE `safedocx_login_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedocx_otp`
--
ALTER TABLE `safedocx_otp`
  MODIFY `otp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedocx_pwreset`
--
ALTER TABLE `safedocx_pwreset`
  MODIFY `pwreset_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedocx_shares`
--
ALTER TABLE `safedocx_shares`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedocx_states`
--
ALTER TABLE `safedocx_states`
  MODIFY `state_id` tinyint(4) NOT NULL AUTO_INCREMENT;
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
  MODIFY `varify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
