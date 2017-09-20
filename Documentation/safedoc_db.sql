-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 20, 2017 at 09:28 AM
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
-- Database: `safedoc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_districts`
--

CREATE TABLE `safedoc_districts` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `district_state_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_docs`
--

CREATE TABLE `safedoc_docs` (
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
-- Table structure for table `safedoc_doc_status`
--

CREATE TABLE `safedoc_doc_status` (
  `doc_status_id` int(11) NOT NULL,
  `doc_status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_doc_type`
--

CREATE TABLE `safedoc_doc_type` (
  `doc_type_id` int(11) NOT NULL,
  `doc_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_links`
--

CREATE TABLE `safedoc_links` (
  `link_id` int(11) NOT NULL,
  `link_code` varchar(100) NOT NULL,
  `link_validity` int(11) NOT NULL,
  `link_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_link_permission`
--

CREATE TABLE `safedoc_link_permission` (
  `permission_id` int(11) NOT NULL,
  `permission_link_id` int(11) NOT NULL,
  `permission_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_login`
--

CREATE TABLE `safedoc_login` (
  `login_id` int(11) NOT NULL,
  `login_phone` varchar(30) NOT NULL,
  `login_email` varchar(100) NOT NULL,
  `login_pword` varchar(300) NOT NULL,
  `login_user_type` tinyint(4) NOT NULL DEFAULT '0',
  `login_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_login_log`
--

CREATE TABLE `safedoc_login_log` (
  `log_id` int(11) NOT NULL,
  `log_ip` varchar(50) NOT NULL,
  `log_browser` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_otp`
--

CREATE TABLE `safedoc_otp` (
  `otp_id` int(11) NOT NULL,
  `otp_login_id` int(11) NOT NULL,
  `otp_type` tinyint(4) NOT NULL,
  `otp_password` varchar(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_pwreset`
--

CREATE TABLE `safedoc_pwreset` (
  `pwreset_id` int(11) NOT NULL,
  `pwreset_login_id` int(11) NOT NULL,
  `pwreset_password` varchar(300) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_shares`
--

CREATE TABLE `safedoc_shares` (
  `share_id` int(11) NOT NULL,
  `share_link_id` int(11) NOT NULL,
  `share_doc_id` int(11) NOT NULL,
  `share_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_states`
--

CREATE TABLE `safedoc_states` (
  `state_id` tinyint(4) NOT NULL,
  `state_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_status`
--

CREATE TABLE `safedoc_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_users`
--

CREATE TABLE `safedoc_users` (
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
-- Table structure for table `safedoc_user_type`
--

CREATE TABLE `safedoc_user_type` (
  `utype_id` tinyint(4) NOT NULL,
  `utype_name` varchar(50) NOT NULL,
  `utype_page` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safedoc_verify`
--

CREATE TABLE `safedoc_verify` (
  `varify_id` int(11) NOT NULL,
  `varify_login_id` int(11) NOT NULL,
  `varify_phone` tinyint(4) NOT NULL DEFAULT '0',
  `varify_email` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `safedoc_districts`
--
ALTER TABLE `safedoc_districts`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `safedoc_docs`
--
ALTER TABLE `safedoc_docs`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `safedoc_doc_status`
--
ALTER TABLE `safedoc_doc_status`
  ADD PRIMARY KEY (`doc_status_id`);

--
-- Indexes for table `safedoc_doc_type`
--
ALTER TABLE `safedoc_doc_type`
  ADD PRIMARY KEY (`doc_type_id`);

--
-- Indexes for table `safedoc_links`
--
ALTER TABLE `safedoc_links`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `safedoc_link_permission`
--
ALTER TABLE `safedoc_link_permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `safedoc_login`
--
ALTER TABLE `safedoc_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `safedoc_login_log`
--
ALTER TABLE `safedoc_login_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `safedoc_pwreset`
--
ALTER TABLE `safedoc_pwreset`
  ADD PRIMARY KEY (`pwreset_id`);

--
-- Indexes for table `safedoc_shares`
--
ALTER TABLE `safedoc_shares`
  ADD PRIMARY KEY (`share_id`);

--
-- Indexes for table `safedoc_states`
--
ALTER TABLE `safedoc_states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `safedoc_status`
--
ALTER TABLE `safedoc_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `safedoc_users`
--
ALTER TABLE `safedoc_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `safedoc_user_type`
--
ALTER TABLE `safedoc_user_type`
  ADD PRIMARY KEY (`utype_id`);

--
-- Indexes for table `safedoc_verify`
--
ALTER TABLE `safedoc_verify`
  ADD PRIMARY KEY (`varify_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `safedoc_districts`
--
ALTER TABLE `safedoc_districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedoc_docs`
--
ALTER TABLE `safedoc_docs`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedoc_links`
--
ALTER TABLE `safedoc_links`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedoc_link_permission`
--
ALTER TABLE `safedoc_link_permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedoc_login`
--
ALTER TABLE `safedoc_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedoc_login_log`
--
ALTER TABLE `safedoc_login_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedoc_pwreset`
--
ALTER TABLE `safedoc_pwreset`
  MODIFY `pwreset_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedoc_shares`
--
ALTER TABLE `safedoc_shares`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedoc_states`
--
ALTER TABLE `safedoc_states`
  MODIFY `state_id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedoc_status`
--
ALTER TABLE `safedoc_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedoc_user_type`
--
ALTER TABLE `safedoc_user_type`
  MODIFY `utype_id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `safedoc_verify`
--
ALTER TABLE `safedoc_verify`
  MODIFY `varify_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
