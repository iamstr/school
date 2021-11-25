-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 02:49 AM
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
-- Database: `recruitment`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `agency_id` int(11) NOT NULL,
  `agency_name` int(11) NOT NULL,
  `agency_status` int(11) NOT NULL,
  `agency_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `agent_id` int(11) NOT NULL,
  `agent_fullname` varchar(50) NOT NULL,
  `agent_phone` int(50) NOT NULL,
  `girl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agent_id`, `agent_fullname`, `agent_phone`, `girl_id`) VALUES
(1, 'shaban Sama', 123456780, 1),
(2, 'John Kamau', 123456781, 2),
(3, 'osama khateeb', 70014662, 5),
(5, 'osama khateeb', 70014663, 8);

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `clearance_id` int(11) NOT NULL,
  `clearance_attestationList` varchar(50) NOT NULL,
  `clearance_CertificateOfIncorporation` varchar(50) NOT NULL,
  `clearance_status` varchar(50) NOT NULL,
  `clearance_FullMedical` varchar(50) NOT NULL,
  `clearance_GoodConduct` varchar(50) NOT NULL,
  `clearance_PassportCopy` varchar(50) NOT NULL,
  `clearance_GirlContract` varchar(50) NOT NULL,
  `clearance_NextOfKinIDCopy` varchar(50) NOT NULL,
  `clearance_VisaForm` varchar(50) NOT NULL,
  `girl_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `updatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`clearance_id`, `clearance_attestationList`, `clearance_CertificateOfIncorporation`, `clearance_status`, `clearance_FullMedical`, `clearance_GoodConduct`, `clearance_PassportCopy`, `clearance_GirlContract`, `clearance_NextOfKinIDCopy`, `clearance_VisaForm`, `girl_id`, `user_id`, `updatedBy`, `updatedDate`) VALUES
(6, 'ready', 'printed', 'ready', 'printed', 'printed', 'printed', 'printed', 'printed', 'printed', 5, 1, 1, '2021-06-22 20:08:24'),
(7, 'ready', 'printed', 'ready', 'printed', 'printed', 'printed', 'printed', 'printed', 'printed', 6, 1, 1, '2021-06-23 18:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `embassy`
--

CREATE TABLE `embassy` (
  `embassy_id` int(11) NOT NULL,
  `embassy_status` varchar(20) NOT NULL,
  `embassy_date` date NOT NULL,
  `embassy_visaForm` varchar(20) NOT NULL,
  `embassy_medical` varchar(20) NOT NULL,
  `girl_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `updatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `enjaz_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `embassy`
--

INSERT INTO `embassy` (`embassy_id`, `embassy_status`, `embassy_date`, `embassy_visaForm`, `embassy_medical`, `girl_id`, `user_id`, `updatedBy`, `updatedDate`, `enjaz_number`) VALUES
(1, 'paid', '2021-06-17', 'prepared', 'uploaded', 5, 1, 1, '2021-06-18 00:09:25', 'e2444444444444');

-- --------------------------------------------------------

--
-- Table structure for table `enjaz`
--

CREATE TABLE `enjaz` (
  `enjaz_id` int(11) NOT NULL,
  `enjaz_status` varchar(20) NOT NULL,
  `enjaz_date` datetime NOT NULL,
  `enjaz_medical` varchar(20) NOT NULL,
  `medical_id` varchar(50) NOT NULL,
  `enjaz_medicalDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `enjaz_wakala` varchar(20) NOT NULL,
  `girl_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enjaz`
--

INSERT INTO `enjaz` (`enjaz_id`, `enjaz_status`, `enjaz_date`, `enjaz_medical`, `medical_id`, `enjaz_medicalDate`, `enjaz_wakala`, `girl_id`, `user_id`, `updatedBy`, `updatedDate`) VALUES
(1, 'paid', '2021-06-22 19:06:39', 'done', '1', '2021-06-22 20:06:39', 'not paid', 5, 1, 1, '2021-06-22 17:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `girls`
--

CREATE TABLE `girls` (
  `girl_id` int(11) NOT NULL,
  `girl_fullname` varchar(100) NOT NULL,
  `girl_IDnumber` int(12) NOT NULL,
  `girl_phone` varchar(12) NOT NULL,
  `girl_dob` date NOT NULL,
  `girl_religion` varchar(12) NOT NULL,
  `girl_county` varchar(50) NOT NULL,
  `girl_passport` varchar(20) DEFAULT NULL,
  `passport_date_issue` date NOT NULL,
  `passport_date_expiry` date NOT NULL,
  `girl_passport_place` varchar(50) NOT NULL,
  `girl_goodConduct` varchar(30) NOT NULL,
  `girl_birth` varchar(5) NOT NULL DEFAULT 'yes',
  `girl_firstMedical` varchar(5) NOT NULL DEFAULT 'yes',
  `user_id` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `girls`
--

INSERT INTO `girls` (`girl_id`, `girl_fullname`, `girl_IDnumber`, `girl_phone`, `girl_dob`, `girl_religion`, `girl_county`, `girl_passport`, `passport_date_issue`, `passport_date_expiry`, `girl_passport_place`, `girl_goodConduct`, `girl_birth`, `girl_firstMedical`, `user_id`, `dateCreated`, `dateUpdated`, `updatedBy`) VALUES
(1, 'Mary Moraa', 147898123, '0701234567', '2000-06-14', 'Non Muslim', '2', 'AK073451', '0000-00-00', '0000-00-00', '1', 'PHSH-1234', 'on', 'on', 1, '2021-06-14 21:06:19', '2021-06-14 19:23:19', 0),
(2, 'Maimuna Mohamed Kamau', 12345678, '0722134567', '2000-06-15', 'Muslim', '2', 'AK0142578', '0000-00-00', '0000-00-00', '1', 'PHSH-1235', 'on', 'on', 1, '2021-06-15 23:06:25', '2021-06-15 21:56:25', 0),
(5, 'Faith Moraa Wanjiku', 89456120, '0746616598', '1998-02-04', 'Non Muslim', '2', 'AK0142570', '0000-00-00', '0000-00-00', '2', 'PHSH-1236', 'on', 'on', 1, '2021-06-17 23:06:35', '2021-06-17 21:01:35', 0),
(6, 'Susan Bitengo', 89456121, '0708693536', '1991-07-03', 'Non Muslim', '2', 'APPLIED ', '0000-00-00', '0000-00-00', '2', 'APPLIED', 'on', 'on', 1, '2021-06-22 01:06:21', '2021-06-21 23:06:21', 1),
(8, 'Susan Bitengo', 89456127, '0708693536', '1991-07-03', 'Non Muslim', '2', 'APPLIED ', '0000-00-00', '0000-00-00', '2', 'APPLIED', 'on', 'on', 1, '2021-06-22 01:06:57', '2021-06-21 23:06:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `medical_id` int(11) NOT NULL,
  `medical_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical`
--

INSERT INTO `medical` (`medical_id`, `medical_name`) VALUES
(2, 'Bayan'),
(1, 'Tai');

-- --------------------------------------------------------

--
-- Table structure for table `musaned`
--

CREATE TABLE `musaned` (
  `musaned_id` int(11) NOT NULL,
  `musaned_status` varchar(15) NOT NULL,
  `musaned_sponsporName` varchar(50) NOT NULL,
  `musaned_sponsporNumber` varchar(20) NOT NULL,
  `musaned_sponsporID` varchar(50) NOT NULL,
  `musaned_sponsporAddress` varchar(100) NOT NULL,
  `musaned_contractNumber` varchar(50) DEFAULT NULL,
  `musaned_visaNumber` varchar(50) DEFAULT NULL,
  `agency_id` int(11) NOT NULL,
  `girl_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musaned`
--

INSERT INTO `musaned` (`musaned_id`, `musaned_status`, `musaned_sponsporName`, `musaned_sponsporNumber`, `musaned_sponsporID`, `musaned_sponsporAddress`, `musaned_contractNumber`, `musaned_visaNumber`, `agency_id`, `girl_id`, `user_id`, `updatedBy`, `updatedDate`) VALUES
(1, 'collected', 'salah gsghshsh', '0096541557784', '00000452875', 'riyadh', '14022222222', '85552236877', 2, 5, 1, 1, '2021-06-17 21:07:19'),
(2, 'collected', 'salah gsghshsh', '0096541557784', '00000452875', 'riyadh', '14022222222', '12125634738', 1, 6, 1, 1, '2021-06-23 15:03:36'),
(3, 'collected', '', '', '', '', '', '', 1, 1, 1, 1, '2021-06-24 12:17:11'),
(4, 'collected', '', '', '', '', '', '', 1, 2, 1, 1, '2021-06-24 12:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `nea`
--

CREATE TABLE `nea` (
  `nea_id` int(11) NOT NULL,
  `nea_date` date NOT NULL,
  `nea_status` varchar(20) NOT NULL,
  `girl_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `updatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nea`
--

INSERT INTO `nea` (`nea_id`, `nea_date`, `nea_status`, `girl_id`, `user_id`, `updatedBy`, `updatedDate`) VALUES
(1, '2021-06-16', 'pending', 2, 1, 1, '2021-06-16 17:55:07'),
(2, '2021-06-17', 'approved', 5, 1, 1, '2021-06-18 00:08:00'),
(3, '2021-06-23', 'sent', 6, 1, 1, '2021-06-23 18:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `next_of_kin`
--

CREATE TABLE `next_of_kin` (
  `next_of_kin_id` int(11) NOT NULL,
  `next_of_kin_fullname` varchar(100) NOT NULL,
  `next_of_kin_IDnumber` int(11) NOT NULL,
  `next_of_kin_relationship` varchar(30) NOT NULL,
  `next_of_kin_phone` varchar(12) NOT NULL,
  `next_of_kin_fullname2` varchar(100) NOT NULL,
  `next_of_kin_IDnumber2` int(11) NOT NULL,
  `next_of_kin_phone2` varchar(15) NOT NULL,
  `next_of_kin_relationship2` varchar(30) NOT NULL,
  `girl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `next_of_kin`
--

INSERT INTO `next_of_kin` (`next_of_kin_id`, `next_of_kin_fullname`, `next_of_kin_IDnumber`, `next_of_kin_relationship`, `next_of_kin_phone`, `next_of_kin_fullname2`, `next_of_kin_IDnumber2`, `next_of_kin_phone2`, `next_of_kin_relationship2`, `girl_id`) VALUES
(1, 'John Kamau', 12345678, 'Father', '712345670', 'Mama Rovar', 56478945, '745123456', 'Mother', 1),
(2, 'Jamal Kamau', 1234567, 'Father', '722145630', 'Salma Kamau', 113645600, '712345678', 'Mother', 2),
(3, 'john hataga', 25479632, 'Father', '76665987', 'mary hataga', 12345678, '71245638', 'Mother', 5),
(4, 'Juma Kamau Kavet', 1234567, 'Father', '712345670', 'Jamila Kamau Kavet', 12345678, '745123456', 'Mother', 6),
(5, 'Juma Kamau Kavet', 1234567, 'Father', '712345670', 'Jamila Kamau Kavet', 12345678, '745123456', 'Mother', 8);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL,
  `school_names_id` int(100) NOT NULL,
  `school_start` date NOT NULL,
  `school_end` date NOT NULL,
  `school_cert` varchar(100) NOT NULL,
  `girl_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `updatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_names_id`, `school_start`, `school_end`, `school_cert`, `girl_id`, `user_id`, `updatedBy`, `updatedDate`) VALUES
(1, 1, '2021-06-20', '2021-07-09', 'pending', 5, 1, 1, '2021-06-20 02:26:17'),
(2, 1, '2021-06-24', '2021-07-14', 'pending', 6, 1, 1, '2021-06-23 18:01:20'),
(8, 1, '2021-06-25', '2021-07-14', 'pending', 2, 1, 1, '2021-06-24 15:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `school_names`
--

CREATE TABLE `school_names` (
  `school_names_id` int(11) NOT NULL,
  `school_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_names`
--

INSERT INTO `school_names` (`school_names_id`, `school_name`) VALUES
(0, 'ARGON SCHOOL');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `travel_id` int(11) NOT NULL,
  `travel_date` datetime NOT NULL,
  `travel_arrival` datetime NOT NULL,
  `travel_pregnancy` varchar(30) NOT NULL,
  `travel_pcrStatus` varchar(30) NOT NULL,
  `travel_pcrCode` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `travel_pcrDate` date NOT NULL,
  `travel_tshirt` varchar(30) NOT NULL,
  `travel_stampedClearanceForm` varchar(30) NOT NULL,
  `travel_ticket` varchar(50) NOT NULL,
  `travel_yellowFever` varchar(30) NOT NULL,
  `girl_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `updatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`travel_id`, `travel_date`, `travel_arrival`, `travel_pregnancy`, `travel_pcrStatus`, `travel_pcrCode`, `travel_pcrDate`, `travel_tshirt`, `travel_stampedClearanceForm`, `travel_ticket`, `travel_yellowFever`, `girl_id`, `user_id`, `updatedBy`, `updatedDate`) VALUES
(1, '2021-07-29 00:07:00', '2021-07-31 00:07:00', 'passed', 'recieved', 'pcr20134', '2020-06-21', 'given', 'ready', 'printed', 'ready', 5, 1, 1, '2021-06-22 20:10:37'),
(2, '2021-07-01 00:07:00', '2021-07-02 00:07:00', 'passed', 'recieved', 'pcr20134', '2021-06-23', 'given', 'ready', 'printed', 'ready', 6, 1, 1, '2021-06-23 18:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'standard',
  `status` varchar(70) NOT NULL DEFAULT 'working',
  `phone` varchar(15) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `dateStarted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`, `email`, `role`, `status`, `phone`, `branch_id`, `dateStarted`) VALUES
(1, 'Mohamed Yusuf', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'iamsatarmovic@gmail.com', 'admin', 'working', '0708693536', 1, '2021-06-24 01:32:23'),
(2, 'Abdisatar Mohamed', 'iamstr', '21232f297a57a5a743894a0e4a801fc3', 'iamstrdeveloper@gmail.com', 'standard', 'working', '0708693536', 1, '2021-06-24 01:32:23'),
(9, 'Lucky Jesse', 'lucky.jesse', '827ccb0eea8a706c4c34a16891f84e7b', '', 'admin', 'working', '07xxxxxx', 1, '2021-06-24 01:32:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`agency_id`),
  ADD UNIQUE KEY `agency_name` (`agency_name`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`clearance_id`),
  ADD UNIQUE KEY `girl_id` (`girl_id`);

--
-- Indexes for table `embassy`
--
ALTER TABLE `embassy`
  ADD PRIMARY KEY (`embassy_id`),
  ADD UNIQUE KEY `girl_id` (`girl_id`);

--
-- Indexes for table `enjaz`
--
ALTER TABLE `enjaz`
  ADD PRIMARY KEY (`enjaz_id`),
  ADD UNIQUE KEY `girl_id` (`girl_id`);

--
-- Indexes for table `girls`
--
ALTER TABLE `girls`
  ADD PRIMARY KEY (`girl_id`),
  ADD UNIQUE KEY `girl_IDnumber` (`girl_IDnumber`);

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`medical_id`),
  ADD UNIQUE KEY `medical_name` (`medical_name`);

--
-- Indexes for table `musaned`
--
ALTER TABLE `musaned`
  ADD PRIMARY KEY (`musaned_id`),
  ADD UNIQUE KEY `girl_id` (`girl_id`);

--
-- Indexes for table `nea`
--
ALTER TABLE `nea`
  ADD PRIMARY KEY (`nea_id`);

--
-- Indexes for table `next_of_kin`
--
ALTER TABLE `next_of_kin`
  ADD PRIMARY KEY (`next_of_kin_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`),
  ADD UNIQUE KEY `girl_id` (`girl_id`);

--
-- Indexes for table `school_names`
--
ALTER TABLE `school_names`
  ADD PRIMARY KEY (`school_names_id`),
  ADD UNIQUE KEY `school_name` (`school_name`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`travel_id`),
  ADD UNIQUE KEY `girl_id` (`girl_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `agency_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `clearance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `embassy`
--
ALTER TABLE `embassy`
  MODIFY `embassy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `enjaz`
--
ALTER TABLE `enjaz`
  MODIFY `enjaz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `girls`
--
ALTER TABLE `girls`
  MODIFY `girl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `musaned`
--
ALTER TABLE `musaned`
  MODIFY `musaned_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nea`
--
ALTER TABLE `nea`
  MODIFY `nea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `next_of_kin`
--
ALTER TABLE `next_of_kin`
  MODIFY `next_of_kin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `travel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
