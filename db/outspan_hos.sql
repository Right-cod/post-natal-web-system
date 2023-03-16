-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 07:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outspan_hos`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `mobile` varchar(1000) NOT NULL,
  `department` varchar(1000) NOT NULL,
  `child_age` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `application_day` varchar(1000) NOT NULL,
  `reply` varchar(1000) NOT NULL,
  `posted` varchar(1000) NOT NULL,
  `reply_day` varchar(1000) NOT NULL,
  `time_posted` varchar(1000) NOT NULL,
  `pay_status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_id`, `email`, `mobile`, `department`, `child_age`, `message`, `application_day`, `reply`, `posted`, `reply_day`, `time_posted`, `pay_status`) VALUES
(1, '1', 'denohkim12@gmail.com', '0795627968', 'Consultation', '11 Days', 'Iam depressed can i visit you cor consultation?', '07-04-2021 11:54:51am', 'Your reply is Pending...', '', '', '', ''),
(2, '', 'denohkim125@gmail.com', '0795627968', 'Consultation', '-0 Days', 'no message', '29-07-2021 01:44:33pm', 'Your reply is Pending...', '', '', '', ''),
(3, '9', 'dennohkim125@gmail.com', '0795627968', 'Consultation', '-1 Days', 'free', '13-09-2021 11:24:27pm', 'Your reply is Pending...', '', '', '', 'paid'),
(4, '9', 'dennohkim125@gmail.com', '0795627968', 'Select Department', '-1 Days', 'we are', '13-09-2021 11:37:17pm', 'Your reply is Pending...', '', '', '', 'paid'),
(5, '9', 'dennohkim125@gmail.com', '0795627968', 'Consultation', '-2 Days', 'werty', '13-09-2021 11:43:41pm', 'Your reply is Pending...', '', '', '', 'paid'),
(6, '9', 'dennohkim12@gmail.com', '0795627968', 'Select Department', '-1 Days', 'free', '13-09-2021 11:45:40pm', 'Your reply is Pending...', '', '', '', 'paid'),
(7, '9', 'dennohkim12@gmail.com', '0795627968', 'Consultation', '-3 Days', 'fre', '13-09-2021 11:46:43pm', 'Your reply is Pending...', '', '', '', 'paid'),
(8, '9', 'kimangadenis015@gmail.com', '0795627968', 'Consultation', '-1 Days', 'free', '13-09-2021 11:47:25pm', 'Your reply is Pending...', '', '', '', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `reply_message` varchar(1000) NOT NULL,
  `date_replied` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `email`, `mobile`, `password`, `question`, `date`, `reply_message`, `date_replied`) VALUES
(1, 'denohkim12@gmail.com', '0795627968', '81b073de9370ea873f548e31b8adc081', 'How can i treat constipation in a child 3 months?', '07-04-2021 12:00:03pm', 'Pending reply.....', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(100) NOT NULL,
  `first_name` varchar(1000) NOT NULL,
  `last_name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `mobile` varchar(1000) NOT NULL,
  `age` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `age`) VALUES
(1, 'Denis', 'Kimanga', 'denohkim12@gmail.com', 'c60f2272727e5c9a0951a084330f6292', '0795627968', '20'),
(2, 'Denis', 'Kimani', 'denohkim125@gmail.com', 'c60f2272727e5c9a0951a084330f6292', '0795627968', '19'),
(3, 'Joseph', 'Kimani', 'denohkim123@gmail.com', 'c60f2272727e5c9a0951a084330f6292', '0795627968', '34'),
(4, 'Joseph', 'Kimani', 'denohkim1236@gmail.com', 'c60f2272727e5c9a0951a084330f6292', '0795627968', '34'),
(5, 'Titus', 'Maina', 'denohkim128@gmail.com', 'c60f2272727e5c9a0951a084330f6292', '0795627968', '19'),
(6, 'Ivyne', 'Maina', 'denohkim14@gmail.com', 'c60f2272727e5c9a0951a084330f6292', '0795627968', '39'),
(7, 'Ivyne', 'Maina', 'denohkim129@gmail.com', 'c60f2272727e5c9a0951a084330f6292', '0795627968', '56'),
(8, 'Joseph', 'Kimani', 'denohkim199@gmail.com', 'c60f2272727e5c9a0951a084330f6292', '0795627968', '45'),
(9, 'Denis', 'Kimani', 'dennohkim125@gmail.com', 'c60f2272727e5c9a0951a084330f6292', '0795627968', '23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
