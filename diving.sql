-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2017 at 10:22 AM
-- Server version: 5.5.23
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diving`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `stud_count` int(11) NOT NULL,
  `id_course` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `email`, `stud_count`, `id_course`) VALUES
(1, 'test2@test.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `id` int(11) NOT NULL,
  `id_booking` int(11) DEFAULT NULL,
  `id_course_classes` int(11) DEFAULT NULL,
  `class_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`id`, `id_booking`, `id_course_classes`, `class_date`) VALUES
(1, 1, 2, '2017-04-19'),
(2, 1, 4, '2017-04-20'),
(3, 1, 8, '2017-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `class_sched`
--

CREATE TABLE `class_sched` (
  `id` int(6) NOT NULL,
  `id_class` int(11) DEFAULT NULL,
  `week_day` int(11) NOT NULL,
  `start_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_sched`
--

INSERT INTO `class_sched` (`id`, `id_class`, `week_day`, `start_time`) VALUES
(3, 2, 1, '10:00:00'),
(14, 2, 3, '17:30:00'),
(15, NULL, 5, '04:18:00'),
(16, NULL, 6, '20:15:00'),
(17, NULL, 5, '05:00:00'),
(21, 4, 4, '11:00:00'),
(22, NULL, 2, '22:00:00'),
(23, NULL, 6, '06:00:00'),
(24, NULL, 2, '04:00:00'),
(81, 9, 5, '12:00:00'),
(82, 9, 6, '14:45:00'),
(83, 10, 7, '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `id_instr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `id_instr`) VALUES
(1, 'Open water', 4);

-- --------------------------------------------------------

--
-- Table structure for table `course_classes`
--

CREATE TABLE `course_classes` (
  `id` int(10) NOT NULL,
  `id_course` int(11) DEFAULT NULL,
  `id_class` int(11) DEFAULT NULL,
  `day_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_classes`
--

INSERT INTO `course_classes` (`id`, `id_course`, `id_class`, `day_number`) VALUES
(2, 1, 2, 1),
(4, 1, 4, 2),
(8, 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dclasses`
--

CREATE TABLE `dclasses` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `spots` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dclasses`
--

INSERT INTO `dclasses` (`id`, `title`, `description`, `spots`) VALUES
(2, 'Diving theory', 'Using the book provided, learn the diving theory', 8),
(4, 'Skills Development 1', 'Learn how to use the gear', 5),
(9, 'Skills Development 2', 'Learn how to use the gear in confined water', 6),
(10, 'Boat Dives', 'Final class diving from the boat', 6);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(5) NOT NULL,
  `instr_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `instr_name`) VALUES
(11, 'bvdnjkg'),
(7, 'Cool instructor'),
(8, 'First instructor'),
(10, 'Instructor 3'),
(4, 'Mega Instr'),
(3, 'Mr Ralph Lauren'),
(6, 'Test Instr'),
(9, 'Test test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course` (`id_course`);

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_booking` (`id_booking`),
  ADD KEY `id_course_classes` (`id_course_classes`);

--
-- Indexes for table `class_sched`
--
ALTER TABLE `class_sched`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class` (`id_class`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A9A55A4CBF396750` (`id`),
  ADD KEY `id_instr` (`id_instr`);

--
-- Indexes for table `course_classes`
--
ALTER TABLE `course_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course` (`id_course`),
  ADD KEY `id_class` (`id_class`);

--
-- Indexes for table `dclasses`
--
ALTER TABLE `dclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instr_name` (`instr_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `class_sched`
--
ALTER TABLE `class_sched`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course_classes`
--
ALTER TABLE `course_classes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dclasses`
--
ALTER TABLE `dclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_E00CEDDE30A9DA54` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`);

--
-- Constraints for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD CONSTRAINT `FK_D31813193748C62F` FOREIGN KEY (`id_course_classes`) REFERENCES `course_classes` (`id`),
  ADD CONSTRAINT `FK_D31813193E9144AE` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id`);

--
-- Constraints for table `class_sched`
--
ALTER TABLE `class_sched`
  ADD CONSTRAINT `FK_A385B4E23CE58AF` FOREIGN KEY (`id_class`) REFERENCES `dclasses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `FK_A9A55A4CC49359CA` FOREIGN KEY (`id_instr`) REFERENCES `instructors` (`id`);

--
-- Constraints for table `course_classes`
--
ALTER TABLE `course_classes`
  ADD CONSTRAINT `FK_A2E7B2930A9DA54` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `FK_A2E7B293CE58AF` FOREIGN KEY (`id_class`) REFERENCES `dclasses` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
