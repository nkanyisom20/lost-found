-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 08:59 PM
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
(19, '202350283', 'Molo', 'vote now', '2024-01-13 20:37:43');

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
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `collected` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lost_found`
--

INSERT INTO `lost_found` (`stu_lf_id`, `student_no`, `fullnames`, `surname`, `type_of_doc`, `location`, `date`, `collected`) VALUES
(33, 202350289, 'Senamile', 'Mnomiya', 'Student Card', 'Main Gate', '2024-01-13 20:15:01', 1),
(34, 201650289, 'Nqubeko Asibonge', 'Khabazela', 'Drivers Licence', 'Main Gate', '2024-01-13 20:15:31', 0),
(35, 202350283, 'Asibonge', 'Mkhize', 'Identity Document', 'Admin Building', '2024-01-13 20:15:37', 0),
(36, 201655488, 'Asibonge', 'Ngunezi', 'High Certificate', 'Admin Building', '2024-01-13 20:15:57', 0),
(37, 201325896, '', '', 'Identity Document', 'Admin Building', '2024-01-15 19:51:38', 0),
(38, 201325896, '', '', 'Identity Document', 'Admin Building', '2024-01-15 19:55:09', 0),
(39, 201350289, 'Nqubeko Asibonge Kha', 'Mkhize', 'Identity Document', 'Main Gate', '2024-01-15 19:56:01', 0),
(40, 201325896, '', '', 'Identity Document', 'Admin Building', '2024-01-15 20:09:51', 0),
(41, 201655488, 'Asibonge', 'Ngunezi', 'Drivers Licence', 'Admin Building', '2024-01-15 20:17:53', 0),
(42, 201325896, '', '', 'Drivers Licence', 'Admin Building', '2024-01-15 20:18:25', 0),
(43, 201650289, 'Nqubeko Asibonge', 'Khabazela', 'Identity Document', 'Admin Building', '2024-01-15 20:18:35', 1),
(44, 202350283, '', '', 'Student Card', 'Admin Building', '2024-01-15 20:20:06', 0),
(45, 201325896, '', '', 'Identity Document', 'Admin Building', '2024-01-15 20:20:54', 0),
(46, 201650289, 'Nqubeko Asibonge', 'Khabazela', 'Identity Document', 'Admin Building', '2024-01-15 20:21:00', 0),
(47, 201655488, 'Asibonge', 'Ngunezi', 'Student Card', 'Admin Building', '2024-01-15 20:21:45', 0),
(53, 2023568899, 'Nqubeko', 'jhj', 'Identity Document', 'Admin Building', '2024-01-15 20:34:31', 0),
(54, 201650289, 'Nqubeko Asibonge', 'Khabazela', 'Identity Document', 'Admin Building', '2024-01-15 20:34:48', 1),
(55, 2147483647, '', '', 'Identity Document', 'Admin Building', '2024-01-15 21:26:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_inf`
--

CREATE TABLE `student_inf` (
  `stu_inf_id` int(4) NOT NULL,
  `stu_reg_id` int(4) NOT NULL,
  `identity_no` varchar(16) NOT NULL,
  `email_addr` varchar(50) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `biography` varchar(1500) NOT NULL,
  `updates` int(2) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_inf`
--

INSERT INTO `student_inf` (`stu_inf_id`, `stu_reg_id`, `identity_no`, `email_addr`, `contact_no`, `biography`, `updates`, `date`) VALUES
(26, 28, '525255 5555 55 5', 'mnkanyiso@gmail.co.za', '076 855 3894', 'a student at university of DHA South Africa. Umgeni Branch.', 1, '2023-05-20 18:00:27'),
(27, 29, '161021 6564 08 4', '201350289@stu-uzl.ac.za', '071 568 0598', 'I am Nkanyiso M, a student at University of KwaZulu-Natal currently doing in-services training at DHA South Africa. Umgeni Branch...', 1, '2023-05-20 19:46:48'),
(33, 32, '021523 8975 08 2', 'mnkanyiso@gmail.co.za', '079 255 4654', 'Senamile Mnomiya a student at university of DHA South Africa. Durban Branch.', 1, '2023-05-20 23:10:57'),
(36, 33, '160227 3265 65 5', 'nqubeko@gmail.com', '076 855 3894', 'I am Nqubeko....', 0, '2023-10-15 21:09:53'),
(37, 34, '', '', '', '', 0, '2023-10-22 10:57:17'),
(38, 35, '161021 5896 08 4', 'nqubeko_a@yahoo.com', '071 852 9637', 'Im Nqubeko Mkhize from Nkandla.', 0, '2023-12-16 21:27:22'),
(39, 36, '', '', '', '', 0, '2023-12-17 20:01:34'),
(43, 46, '', '', '', '', 0, '2024-01-06 15:38:59'),
(44, 47, '', '', '', '', 0, '2024-01-06 15:39:58'),
(45, 48, '', 'asibonge@gmail.com', '071 201 5028', '', 0, '2024-01-07 12:01:53'),
(46, 49, '202356 5458 08 0', 'mina@gmail.com', '071 845 6985', 'Sanibonani', 0, '2024-01-15 21:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `stu_reg_id` int(4) NOT NULL,
  `student_no` varchar(10) NOT NULL,
  `fullnames` varchar(20) NOT NULL,
  `surname` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_birth` varchar(100) NOT NULL,
  `verified` int(2) NOT NULL DEFAULT 0,
  `removed` int(2) NOT NULL DEFAULT 0,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`stu_reg_id`, `student_no`, `fullnames`, `surname`, `password`, `gender`, `date_of_birth`, `verified`, `removed`, `date_registered`) VALUES
(28, '202550289', 'Nqubeko', 'Ngunezi', '$2y$10$2MQCPoOQbvazvwD7J5unJuIu4rawvtl5MnnAk4TiudtI9SQtXWHym', 'Female', '2023-05-26', 1, 0, '2023-05-20 17:58:36'),
(29, '201350289', 'Nqubeko Asibonge', 'Gcwabe', '$2y$10$.OsRBWwAAt3KtHBd3kkXt.eW0XpqH8C20Hp1jSWK6YRqwhxC52sAG', 'Male', '2023-05-26', 1, 0, '2023-05-20 19:46:48'),
(32, '202350289', 'Senamile', 'Mnomiya', '$2y$10$9gTKAyUcK1/rxWGVyic5huhiO2iDHtPPwPrNTW5eTNDEAAme2NNDe', 'Female', '2023-05-10', 1, 0, '2023-05-20 23:10:57'),
(33, '202350283', 'Asibonge', 'Mkhize', '$2y$10$3OrKpMPZHgMWLyeEDqjvV.aHRHnX8kWrEdfhnzsvVmvTlTfxjkIz2', 'Male', '2016-10-21', 1, 0, '2023-10-15 21:09:53'),
(34, '201350286', 'Nkanyiso', 'Mkhize', '$2y$10$rNdA4ipJ9IC/GSzlVeLB5OPqh6q2D/sMvscIy2N.bvM8xrnur/EQq', 'Male', '2023-10-04', 1, 0, '2023-10-22 10:57:17'),
(35, '201650289', 'Nqubeko Asibonge', 'Khabazela', '$2y$10$vyccChitJHt6dmt/7wIawuBHx1OpYlCmFhVa7Mcc0qW6nVR8f6WRi', 'Male', '2016-10-21', 1, 0, '2023-12-16 21:27:22'),
(36, '2023502890', 'Nqubeko', 'Amambo', '$2y$10$3phhovUXTtYxqBurb0g5IOBur3A877SzzMAdNxI9gPJdhR2MObEjC', 'Male', '2023-12-17', 1, 0, '2023-12-17 20:01:34'),
(37, '2016502891', 'Nqubeko', 'mk', '$2y$10$v5/zGwrkaYuztRAKK6AFsuHACfMuW5CobKK5iZ06uISlqct3XuLW6', 'Male', '2016-02-06', 0, 0, '2024-01-06 15:35:46'),
(43, '2016502894', 'Nqubekoklk', 'Ngunezi', '$2y$10$WWb8dCJTmWWhajN9giwisuEwwNMNanxn80vYxql5XpyTv3F3nYdCG', 'Male', '2024-01-03', 0, 0, '2024-01-06 15:37:26'),
(46, '201655488', 'Asibonge', 'Ngunezi', '$2y$10$CEPINGw7uS82zXWBlOK6SOtEPDcV2aHzBy6KVbX6PsSV7g0QHW4Re', 'Male', '2024-01-03', 0, 0, '2024-01-06 15:38:59'),
(47, '2023568899', 'Nqubeko', 'jhj', '$2y$10$R80PxkuAm4uajMkb7TUdjemwB2K6LLlRoqjLRa.vq00yudt1b8I/e', 'Female', '2024-01-03', 1, 0, '2024-01-06 15:39:58'),
(48, '2016502890', 'Asibonge', 'Ngunezi', '$2y$10$oL7wGpBguFpD7Cz7RaCREOBB/MYPsUyAd1/dj2AGCrMtP2ah3jGaO', 'Male', '2020-01-07', 1, 0, '2024-01-07 12:01:53'),
(49, '201550289', 'Mina', 'Ngunezi', '$2y$10$rlFcmgA50pHpwXFVXMC4aOXNZ4hprTcooN8YSRtKskQ7qRUiEMa0O', 'Female', '2024-01-02', 1, 0, '2024-01-15 21:38:55');

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lost_found`
--
ALTER TABLE `lost_found`
  MODIFY `stu_lf_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `student_inf`
--
ALTER TABLE `student_inf`
  MODIFY `stu_inf_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `student_reg`
--
ALTER TABLE `student_reg`
  MODIFY `stu_reg_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
