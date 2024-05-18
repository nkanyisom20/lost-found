-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 01:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report_l_f`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `student_no` text NOT NULL,
  `salute` text NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `student_no`, `salute`, `comment`, `comment_at`) VALUES
(2, '201451289', 'Password Reset', 'To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other.', '2024-05-16 16:52:47'),
(3, '201451289', 'Alysulum', 'Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme', '2024-05-16 16:52:03'),
(4, '201454289', 'Mina', 'Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it', '2024-05-16 16:52:20'),
(5, '201455289', 'Sawubona', 'Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. ', '2024-05-16 16:54:36'),
(6, '201451289', 'zcv', 'xcvx', '2024-02-25 18:58:23'),
(7, '201453289', 'WTERT', 'AFERFERFEF RETERF ERETERG', '2024-04-08 15:30:28'),
(8, '201453289', 'hi', 'Hellowwwwwwwww admin', '2024-04-15 17:26:59'),
(9, '201453289', 'HELLO', 'HI ADMIN', '2024-04-15 17:30:14'),
(10, '201453289', 'howzit', 'eita holla', '2024-04-15 17:34:16'),
(11, '201453289', 'good morning', 'hi how you doing', '2024-04-15 17:37:15'),
(12, '201453289', 'hi Admin', 'how you doing\r\n\r\ni miss you ', '2024-05-16 16:49:42'),
(13, '201453289', 'portifolio', 'during my studies at university, i learnt many ict modules including client/server computing (systems development), info', '2024-04-15 17:41:18'),
(14, '201453289', 'hello ', 'during my studies at university, i learnt many ict modules including client/server computing (systems development), information systems management 3c & 3d (systems analysis and design) and database & ', '2024-04-15 17:53:59'),
(15, '201453289', 'hello ', 'during my studies at university, i learnt many ict modules including client/server computing (systems development), information systems management 3c & 3d (systems analysis and design) and database & ', '2024-04-15 17:54:38'),
(16, '201453289', 'hello ', 'during my studies at university, i learnt many ict modules including client/server computing (systems development), information systems management 3c & 3d (systems analysis and design) and database & ', '2024-04-15 17:54:38'),
(17, '201453289', 'hello ', 'during my studies at university, i learnt many ict modules including client/server computing (systems development), information systems management 3c & 3d (systems analysis and design) and database & ', '2024-04-15 17:54:38'),
(18, '201453289', 'hello ', 'during my studies at university, i learnt many ict modules including client/server computing (systems development), information systems management 3c & 3d (systems analysis and design) and database & ', '2024-04-15 17:54:43'),
(19, '201457289', 'gf', 'fghj', '2024-04-16 18:10:03'),
(20, '201455289', 'hi', 'copyright | all rights reserved | designed by nkanyiso consulting pty ltd ......', '2024-04-17 14:29:08'),
(21, '201460289', 'dg', '', '2024-04-30 19:31:43'),
(22, '201460256', 'f', '', '2024-05-02 20:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `lost_found`
--

CREATE TABLE `lost_found` (
  `stu_lf_id` int(4) NOT NULL,
  `student_no` int(20) NOT NULL,
  `fullnames` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `type_of_doc` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `reported_by` varchar(12) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL DEFAULT 'Un-Collected'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lost_found`
--

INSERT INTO `lost_found` (`stu_lf_id`, `student_no`, `fullnames`, `surname`, `type_of_doc`, `location`, `reported_by`, `date`, `status`) VALUES
(1, 201451289, 'MINA', 'Homee', 'Identity Document', 'Admin Building', '201450289', '2024-01-28 22:50:35', 'Collected'),
(2, 201451289, 'MINA', 'Homee', 'Matric Certificate', 'Admin Building', '201450289', '2024-01-28 22:53:45', 'Collected'),
(3, 201451289, 'MINA', 'Homee', 'Edu-Loan Card', 'Admin Building', '201450289', '2024-01-28 22:53:51', 'Collected'),
(4, 201451289, 'MINA', 'Homee', 'Student Card', 'Admin Building', '201450289', '2024-01-28 22:53:58', 'Un-Collected'),
(5, 201452289, 'Mina', 'THINA', 'Matric Certificate', 'Main Gate', '201450289', '2024-02-25 21:02:11', 'Un-Collected'),
(6, 201452289, 'Aquele', 'Yeka', 'Student Card', 'Admin Building', '201450289', '2024-03-17 21:26:13', 'Collected'),
(7, 201453289, 'Sona', 'Zonke', 'Identity Document', 'Admin Building', '201450289', '2024-04-07 21:35:54', 'Collected'),
(10, 201453289, 'Sona', 'Zonke', 'Identity Document', 'Main Gate', '201450289', '2024-04-08 21:13:20', 'Collected'),
(11, 201452289, 'Number', 'Two', 'Identity Document', 'Admin Building', '201450289', '2024-04-15 19:55:25', 'Collected'),
(12, 201455289, 'Zonke', 'Bonke', 'Identity Document', 'Admin Building', '201450289', '2024-04-16 10:14:11', 'Collected'),
(13, 201457289, 'Ninety-two', 'Seven', 'Identity Document', 'Admin Building', '201450289', '2024-04-20 15:58:37', 'Collected'),
(14, 201452289, 'Number', 'Two', 'Identity Document', 'Admin Building', '201450289', '2024-04-21 15:00:15', 'Collected'),
(15, 201457289, 'Ninety-two', 'Seven', 'Identity Document', 'Admin Building', '201450289', '2024-04-24 14:58:21', 'Collected'),
(22, 201450289, 'Nkanyiso', 'Mkhize', 'Identity Document', 'Admin Building', '201450289', '2024-05-04 19:04:52', 'Un-Collected'),
(23, 201452289, 'Number', 'Two', 'Identity Document', 'Admin Building', '201450289', '2024-05-04 19:06:43', 'Un-Collected'),
(30, 201450289, 'Nkanyiso', 'Mkhize', 'Identity Document', 'Admin Building', '', '2024-05-04 20:49:35', 'Collected'),
(31, 201450289, 'Nkanyiso', 'Mkhize', 'Identity Document', 'Admin Building', '201450289', '2024-05-04 20:53:39', 'Collected'),
(32, 201457289, 'Ninety-two', 'Seven', 'Identity Document', 'Admin Building', '201450289', '2024-05-04 20:56:32', 'Un-Collected'),
(33, 201450289, 'Nkanyiso', 'Mkhize', 'Identity Document', 'Admin Building', '', '2024-05-04 21:03:35', 'Un-Collected'),
(34, 201450289, 'Nkanyiso', 'Mkhize', 'Identity Document', 'Admin Building', '', '2024-05-04 21:07:30', 'Un-Collected'),
(35, 201450289, 'Nkanyiso', 'Mkhize', 'Identity Document', 'Admin Building', '201450289', '2024-05-04 21:08:03', 'Un-Collected'),
(36, 201450289, 'Nkanyiso', 'Mkhize', 'Student Card', 'Admin Building', '201450289', '2024-05-04 21:09:55', 'Un-Collected'),
(37, 201457289, 'Ninety-two', 'Seven', 'Identity Document', 'Admin Building', '201450289', '2024-05-04 21:14:36', 'Un-Collected'),
(38, 201452289, 'Number', 'Two', 'Identity Document', 'Admin Building', '201450289', '2024-05-09 21:28:27', 'Collected');

-- --------------------------------------------------------

--
-- Table structure for table `student_inf`
--

CREATE TABLE `student_inf` (
  `stu_inf_id` int(4) NOT NULL,
  `stu_reg_id` int(4) NOT NULL,
  `identity_no` varchar(16) NOT NULL,
  `email_addr` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `biography` varchar(1500) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_inf`
--

INSERT INTO `student_inf` (`stu_inf_id`, `stu_reg_id`, `identity_no`, `email_addr`, `date_of_birth`, `contact_no`, `biography`, `date`) VALUES
(4, 61, '124565 6555 55 5', 'asibonge@gmail.com', '2018-08-28', '076 855 3894', 'Helloooooooooooow', '2024-01-27 21:50:31'),
(5, 82, '454554 4444 55 4', 'mina@gmail.com', '0000-00-00', '071 840 7522', 'Nkanyiso Mh', '2024-03-16 19:34:34'),
(29, 87, '544855 1555 25 4', 'bonke@gmil.com', '0000-00-00', '072 856 4859', '', '2024-04-08 08:44:44'),
(30, 88, '256652 2225 56 6', '201456289@lost_found.com', '0000-00-00', '076 854 5955', 'Yellowwwwwwwwwww', '2024-04-08 09:10:53'),
(31, 89, '', '', '0000-00-00', '', '', '2024-04-08 16:14:35'),
(32, 90, '787888 8788 88 8', 'mnka@web.com', '0000-00-00', '076 855 3894', '', '2024-04-08 16:15:03'),
(33, 91, '245568 8975 65 6', '201457289@stu-uz.ac.za', '0000-00-00', '076 855 9595', 'jbnj nkn', '2024-04-08 16:15:42'),
(34, 92, '794653 2326 662', '201459289@gmail.com', '0000-00-00', '076 854 5825', '', '2024-04-13 15:58:49'),
(35, 93, '656652 6666 56 6', 'ngu@gmail.com', '0000-00-00', '068 746 4565', '', '2024-04-15 23:05:42'),
(36, 94, '', '', '0000-00-00', '', '', '2024-04-18 21:09:39'),
(37, 95, '', '', '0000-00-00', '', '', '2024-04-30 22:17:38'),
(38, 96, '', '', '0000-00-00', '', '', '2024-05-01 12:57:55'),
(39, 97, '', '', '0000-00-00', '', '', '2024-05-01 12:58:50'),
(40, 98, '', '', '0000-00-00', '', '', '2024-05-02 22:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `stu_reg_id` int(4) NOT NULL,
  `student_no` varchar(10) NOT NULL,
  `surname` varchar(10) NOT NULL,
  `fullnames` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_birth` varchar(100) NOT NULL,
  `verified` text NOT NULL DEFAULT 'No',
  `role` text NOT NULL DEFAULT 'Student',
  `removed` text NOT NULL DEFAULT 'No',
  `date_registered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`stu_reg_id`, `student_no`, `surname`, `fullnames`, `password`, `gender`, `date_of_birth`, `verified`, `role`, `removed`, `date_registered`) VALUES
(61, '201450289', 'Mkhize', 'Nkanyiso', '$2y$10$.3TkkMTIxzVXZPD3.GlZpOZyPxfqjfc.XyQbx5WIJISk1R8KNgc9.', 'Male', '2024-01-02', 'Yes', 'Admin', 'No', '2024-01-27 21:50:31'),
(82, '201453289', 'Zonke', 'Sona', '$2y$10$62NtU2F22Pykacd5AgAE/uNr4A2YNZlglmEQ487W/ssPhW1.4q1p2', 'Female', '2024-03-14', 'Yes', 'Student', 'Yes', '2024-03-16 19:34:34'),
(87, '201455289', 'Bonke', 'Zonke', '$2y$10$EMVC4ZD6Kp9gHRE.1Vh8OupGCQPBV98YyQB3RN0VL40alcqxlsbeW', 'Female', '1970-01-01', 'No', 'Student', 'No', '2024-04-08 08:44:44'),
(88, '201456289', 'Sona', 'Mina', '$2y$10$XqwISRSuT6kR1fiqLjMmgeWAFB1iWqW4xzfnoXD96UBVE8K4c1Ln.', 'Male', '1970-01-01', 'No', 'Admin', 'No', '2024-04-08 09:10:52'),
(89, '201452289', 'Two', 'Number', '$2y$10$C.4XV8WBFV03YvreBXb/2.n5nuVtjHZagzGbzldr/cBBOOT5L60rW', 'Female', '1970-01-01', 'No', 'Student', 'Yes', '2024-04-08 16:14:35'),
(90, '201454289', 'Five', 'Minaaa', '$2y$10$ymbFWOhdHeCIS.HB8QW/e.Mec5FkFhQG82Y929nDoCDFlYnvYDnTe', 'Female', '1970-01-01', 'No', 'Student', 'No', '2024-04-08 16:15:02'),
(91, '201457289', 'Seven', 'Ninety-two', '$2y$10$QHCdbeOTAJHZO5YnYr3dOu.eOnGqrpS7TKH.VZcwWRLg2D0TFo5NC', 'Male', '1970-01-01', 'No', 'Student', 'No', '2024-04-08 16:15:42'),
(92, '201459289', 'Liswa', 'Nip', '$2y$10$4bbW24m8mxdKWLYCy.9W5.S.uisSKFtBZJyMD3XPUjc9ejSQa/YTy', 'Female', '1970-01-01', 'No', 'Student', 'Yes', '2024-04-13 15:58:49'),
(93, '201460289', 'Mkhize', 'Ngunezi', '$2y$10$.YqXCJkI.dAp0yZrH9KSCeW8VVsKZwTuNa29XQDKOUQsUfj2WFFze', 'Male', '1970-01-01', 'Yes', 'Student', 'No', '2024-04-15 23:05:42'),
(94, '201461289', 'Bona', 'Zona', '$2y$10$00J1KxZ5FmwfiP6Ohf9SNuddAy.N1/VoIZZ7owkmBvaqaR0HNXWdW', 'Female', '1970-01-01', 'No', 'Student', 'Yes', '2024-04-18 21:09:39'),
(95, '201450223', 'Mkhize', 'Nqubeko', '$2y$10$bOI.1x4HAsz0PbUcqRZsa.ImKW5YuvrCbrXFVqQGGDzAf0CNT41Aa', 'Male', '1970-01-01', 'Yes', 'Student', 'No', '2024-04-30 22:17:37'),
(96, '201450236', 'Gh', '201450223', '$2y$10$hOMLlV.jBYSPQjzWnzwEbeJX942n21LWFc3Ogy4eQQmyWUf250q5W', 'Male', '1970-01-01', 'No', 'Student', 'No', '2024-05-01 12:57:55'),
(97, '201466666', 'Hfj', '201450223', '$2y$10$zyYAMEy87JF5w0kt9ROraeldtPuKZCL9S5MXTq1BRTemehrM/6b8S', 'Female', '1970-01-01', 'No', 'Student', 'No', '2024-05-01 12:58:50'),
(98, '201460256', 'Asibonge', 'Mkhize', '$2y$10$EnkQWCUZo/hYdBHNQj7eBebkn3.4y7rCV0dHDPRl3iWd0T8Tta45e', 'Male', '1970-01-01', 'No', 'Student', 'No', '2024-05-02 22:32:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `lost_found`
--
ALTER TABLE `lost_found`
  ADD PRIMARY KEY (`stu_lf_id`),
  ADD UNIQUE KEY `stu_lf_id` (`stu_lf_id`);

--
-- Indexes for table `student_inf`
--
ALTER TABLE `student_inf`
  ADD PRIMARY KEY (`stu_inf_id`),
  ADD UNIQUE KEY `stu_inf_id` (`stu_inf_id`),
  ADD KEY `student_inf_ibfk_1` (`stu_reg_id`);

--
-- Indexes for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD PRIMARY KEY (`stu_reg_id`),
  ADD UNIQUE KEY `stu_reg_id` (`stu_reg_id`),
  ADD UNIQUE KEY `student_no` (`student_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lost_found`
--
ALTER TABLE `lost_found`
  MODIFY `stu_lf_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student_inf`
--
ALTER TABLE `student_inf`
  MODIFY `stu_inf_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `student_reg`
--
ALTER TABLE `student_reg`
  MODIFY `stu_reg_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_inf`
--
ALTER TABLE `student_inf`
  ADD CONSTRAINT `student_inf_ibfk_1` FOREIGN KEY (`stu_reg_id`) REFERENCES `student_reg` (`stu_reg_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
