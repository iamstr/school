-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 12:41 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schools`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `admission_id` int(11) NOT NULL,
  `admission_date` date NOT NULL,
  `girl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `agency_id` int(11) NOT NULL,
  `agency_name` varchar(255) NOT NULL,
  `agency_status` varchar(10) NOT NULL DEFAULT 'active',
  `agency_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`agency_id`, `agency_name`, `agency_status`, `agency_created_date`) VALUES
(1, 'Al riyadh', 'active', '2021-07-02 01:01:08'),
(2, 'Al bisha', 'active', '2021-07-02 01:01:08'),
(6, 'lucky.jesse', 'active', '2021-07-02 02:49:50'),
(8, 'Wajib agency', 'active', '2021-07-02 13:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `county_id` int(11) NOT NULL,
  `county_name` varchar(100) NOT NULL,
  `county_status` enum('active','inactive','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `girls`
--

CREATE TABLE `girls` (
  `girl_id` int(11) NOT NULL,
  `girl_name` varchar(255) NOT NULL,
  `girl_IDNumber` int(15) NOT NULL,
  `girl_phone` varchar(15) NOT NULL,
  `passport` varchar(30) NOT NULL,
  `county` varchar(50) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `kin_name` varchar(255) NOT NULL,
  `kin_phone` varchar(15) NOT NULL,
  `admission_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `girls`
--

INSERT INTO `girls` (`girl_id`, `girl_name`, `girl_IDNumber`, `girl_phone`, `passport`, `county`, `agency_id`, `age`, `kin_name`, `kin_phone`, `admission_date`, `updated_by`, `updated_date`) VALUES
(1, 'Abdisatar Mohamed', 12389787, '+254708693536', 'A2108246', '1', 8, 22, 'MARIAM WANJIRU MBONI', '0720806680', '2021-07-02', 1, 0),
(5, 'Mary Kamau', 54521000, '0722134566', 'AK0701187 ', '1', 6, 22, 'John Kamau', '0722145630', '2021-07-02', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_type` enum('cheque','cash','mpesa','') NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report_id` int(11) NOT NULL,
  `recieved_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_type`, `payment_date`, `report_id`, `recieved_by`) VALUES
(1, 'cash', '2021-07-04 00:59:41', 13, 1),
(2, 'cash', '2021-07-04 01:00:19', 13, 1),
(3, 'cash', '2021-07-04 01:00:30', 13, 1),
(4, 'cash', '2021-07-04 01:02:13', 13, 1),
(5, 'mpesa', '2021-07-04 01:04:01', 13, 1),
(6, 'mpesa', '2021-07-04 01:04:30', 13, 1),
(7, 'mpesa', '2021-07-04 01:04:53', 13, 1),
(8, 'cash', '2021-10-07 14:03:08', 12, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `report`
-- (See below for the actual view)
--
CREATE TABLE `report` (
`girl_id` int(11)
,`girl_name` varchar(255)
,`girl_IDNumber` int(15)
,`girl_phone` varchar(15)
,`passport` varchar(30)
,`county` varchar(50)
,`age` int(11)
,`kin_name` varchar(255)
,`kin_phone` varchar(15)
,`admission_date` date
,`agency_name` varchar(255)
,`report_amount` int(11)
,`report_paid` int(11)
,`report_due` int(11)
,`report_date` datetime
,`report_updated_date` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `report_amount` int(11) NOT NULL DEFAULT '25000',
  `report_paid` int(11) NOT NULL,
  `report_due` int(11) NOT NULL,
  `girl_id` int(11) NOT NULL,
  `report_date` datetime NOT NULL,
  `report_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report_update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `report_amount`, `report_paid`, `report_due`, `girl_id`, `report_date`, `report_updated_date`, `report_update_by`) VALUES
(12, 25000, 4000, 21000, 1, '2021-07-02 00:00:00', '2021-07-02 09:22:12', 1),
(13, 25000, 29400, -4400, 5, '2021-07-02 00:00:00', '2021-07-02 10:48:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'standard',
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`, `email`, `phone`, `role`, `status`, `date`) VALUES
(1, '', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 'admin', 'active', '2021-07-05 17:23:48'),
(2, '', 'sm', '21232f297a57a5a743894a0e4a801fc3', 'smshaaban@gmail.com', '0722453040', 'standard', 'active', '2021-07-05 17:23:48'),
(3, 'Abdisatar Mohamed', 'iamsatar', '827ccb0eea8a706c4c34a16891f84e7b', 'iamsatarinho@gmail.com', '0708693536', 'standard', 'active', '2021-07-14 02:08:41');

-- --------------------------------------------------------

--
-- Structure for view `report`
--
DROP TABLE IF EXISTS `report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report`  AS  select `girls`.`girl_id` AS `girl_id`,`girls`.`girl_name` AS `girl_name`,`girls`.`girl_IDNumber` AS `girl_IDNumber`,`girls`.`girl_phone` AS `girl_phone`,`girls`.`passport` AS `passport`,`girls`.`county` AS `county`,`girls`.`age` AS `age`,`girls`.`kin_name` AS `kin_name`,`girls`.`kin_phone` AS `kin_phone`,`girls`.`admission_date` AS `admission_date`,`agencies`.`agency_name` AS `agency_name`,`reports`.`report_amount` AS `report_amount`,`reports`.`report_paid` AS `report_paid`,`reports`.`report_due` AS `report_due`,`reports`.`report_date` AS `report_date`,`reports`.`report_updated_date` AS `report_updated_date` from ((`girls` left join `agencies` on((`agencies`.`agency_id` = `girls`.`agency_id`))) left join `reports` on((`girls`.`girl_id` = `reports`.`girl_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`admission_id`);

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`agency_id`),
  ADD UNIQUE KEY `agency_name` (`agency_name`);

--
-- Indexes for table `girls`
--
ALTER TABLE `girls`
  ADD PRIMARY KEY (`girl_id`),
  ADD UNIQUE KEY `girl_IDNumber` (`girl_IDNumber`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD UNIQUE KEY `girl_id` (`girl_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `agency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `girls`
--
ALTER TABLE `girls`
  MODIFY `girl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
