-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2017 at 04:12 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consultation`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `conversation_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`conversation_id`, `user_1`, `user_2`, `date_created`) VALUES
(1, 1, 1, '2017-05-07 13:16:56'),
(2, 1, 2, '2017-05-07 13:56:52'),
(3, 1, 4, '2017-05-09 16:28:59'),
(4, 1, 3, '2017-05-10 17:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `short_name` varchar(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `full_name`, `short_name`, `date_created`) VALUES
(1, 'Bachelor of Science in Information Technology', 'BSIT', '2017-05-02 22:09:50'),
(2, 'Bachelor of Science in Computer Science', 'BSCS', '2017-05-02 22:09:50'),
(3, 'Bachelor in Elementary Education', 'BEED', '2017-05-02 22:09:50'),
(4, 'Bachelor in Secondary Education', 'BSED', '2017-05-02 22:09:50'),
(6, 'Bachelor of Science in Tourism and Hotel Restaurant Management', 'BSTHRM', '2017-05-02 22:09:50'),
(7, 'Bachelor in Library and Information Science', 'BLIS', '2017-05-02 22:09:50'),
(8, 'Bachelor of Science in Civil Engineering', 'BSCE', '2017-05-02 22:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `msg_id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`msg_id`, `conversation_id`, `msg`, `date_created`, `status`, `from_id`, `to_id`) VALUES
(1, 2, 'from sir q', '2017-05-07 14:35:09', 0, 2, 1),
(2, 2, 'Hi dama.', '2017-05-07 15:37:33', 0, 1, 2),
(3, 1, 'From jack to sir laz', '2017-05-08 11:25:26', 0, 1, 1),
(4, 1, 'SIR LAZZZ', '2017-05-10 12:11:39', 0, 1, 1),
(5, 2, 'dsdsdsdsd', '2017-05-11 17:53:36', 0, 1, 2),
(6, 1, 'dsds', '2017-05-11 18:10:31', 0, 1, 1),
(7, 2, 'ss', '2017-05-13 17:02:41', 0, 1, 2),
(8, 1, 'sas', '2017-05-13 17:02:59', 0, 1, 1),
(9, 2, 'jacks', '2017-05-13 17:14:57', 0, 1, 2),
(10, 2, 'fg', '2017-05-22 15:41:57', 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `prof_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `about` varchar(300) NOT NULL,
  `department` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`prof_id`, `name`, `img`, `email`, `about`, `department`, `username`, `password`, `date_created`) VALUES
(1, 'Laz Caluza', 'laz1.jpg', 'las@gmail.com', 'I am a Computer Science Professor.', 1, 'las21', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-05-06 08:21:16'),
(2, 'Lowell Quisombing', 'lowell.jpg', 'lowell21@gmail.com', 'I am a networking Guro.', 1, 'lowell21', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-05-06 08:23:15'),
(3, 'Brix Verecio', 'brix.jpg', 'brix@gmail.com', 'I am the head of IT/Computer Education Unit', 1, 'brix21', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-05-06 08:23:42'),
(4, 'Jeffrey Cinco', 'jeff.jpg', 'jeffrey Cinco', 'I love Web Development.', 2, 'jeff21', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-05-06 08:24:04'),
(5, 'Mark Zuckerberg', 'default.png', 'zuck_on_it@gmai.com', 'Founder of Facebook', 2, 'mark21', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-05-13 08:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sched_id` int(11) NOT NULL,
  `weekday` int(11) NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `room` varchar(255) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sched_id`, `weekday`, `from_time`, `to_time`, `room`, `prof_id`, `date_created`) VALUES
(7, 1, '07:30:00', '09:00:00', 'SR12', 1, '2017-05-14 11:16:54'),
(2, 1, '12:00:00', '13:30:00', 'ORC 12', 1, '2017-05-14 11:21:47'),
(3, 1, '10:30:00', '12:00:00', 'Balai Bhouse', 1, '2017-05-14 11:22:20'),
(4, 1, '09:00:00', '10:30:00', 'Comp Lab 4', 1, '2017-05-14 13:00:57'),
(8, 1, '07:30:00', '08:32:00', 'Comp Lab 3', 1, '2017-05-15 14:42:28'),
(9, 1, '06:45:00', '07:45:00', 'Comp Lab 3', 1, '2017-05-15 14:45:45'),
(10, 1, '18:00:00', '19:07:00', 'Comp Lab 3', 1, '2017-05-15 18:07:48'),
(11, 1, '12:02:00', '14:02:00', 'Comp Lab 7', 1, '2017-05-16 10:17:45'),
(12, 1, '22:06:00', '00:07:00', 'Comp Lab 6', 1, '2017-05-18 22:07:23'),
(13, 1, '10:57:00', '12:57:00', 'asas', 1, '2017-05-22 10:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stud_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `course` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stud_id`, `name`, `img`, `email`, `course`, `username`, `password`, `date_created`) VALUES
(1, 'Jack Owen Bula', 'jack21.jpg', 'jack.bula@yahoo.com', 1, 'creativegoof', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-05-06 07:11:35'),
(2, 'Kirby Lopez', 'default.png', 'kirbz@gmail.com', 2, 'kirbz21', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-05-07 08:44:38'),
(3, 'Kirby Lopez', 'default.png', 'kirbz@gmail.com', 1, 'kirbz21', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-05-07 08:46:46'),
(4, 'Jerome Noveda', 'default.png', 'novz@yahoo.com', 1, 'novs21', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-05-07 08:48:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`prof_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `prof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
