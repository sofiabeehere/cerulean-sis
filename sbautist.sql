-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 08:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbautist`
--
CREATE DATABASE IF NOT EXISTS `sbautist` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sbautist`;

-- --------------------------------------------------------

--
-- Table structure for table `courselist`
--

DROP TABLE IF EXISTS `courselist`;
CREATE TABLE IF NOT EXISTS `courselist` (
  `course_id` varchar(5) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `course_desc` varchar(1500) NOT NULL,
  `num_credits` int(1) NOT NULL,
  `grade_level` int(2) NOT NULL,
  `term_offered` varchar(10) DEFAULT NULL,
  `dept_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`course_id`),
  UNIQUE KEY `course_id` (`course_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courselist`
--

INSERT INTO `courselist` (`course_id`, `course_name`, `course_desc`, `num_credits`, `grade_level`, `term_offered`, `dept_id`) VALUES
('ENG11', 'English 11', 'English 11 course works together with English 12 to develop the skills required for students to graduate from high school and enter either post-secondary education or work. These skills include analytical reading, effective writing, identifying truth when we read it, developing opinions, and presenting ideas and opinions. We must be able to understand nonsense when we read it, and we must be able to recognize sense.\r\n\r\nEnglish 11 students will be challenged to read engaging works of literature and to develop insight into the works. Through the development of writing skills, students will learn to develop their skills to maximize their potential. Also, students will be challenged to develop a thorough understanding of terminology for poetry, drama, short stories, novels, and prose non-fiction. Students will be periodically tested with material patterned after Provincial exam questions, or questions taken from Provincial exams that have been released by the Ministry of Education. These questions are designed to assist students in understanding the government?s grading system (a 6 point scale); thus, students will maximize their understanding of the government grading system over a two year period prior to writing the required English 12 Provincial exam.\r\n\r\nThe course will rely on the use of resources posted to the website, webinars, personal conversations through skype and telephone, and any other means of suitable communication that promotes learning.', 4, 11, 'Term 1', 1),
('PC12', 'Pre-Calculus 12', 'Who wants to be a scientist? How about an engineer, or computer programmer? If you answered yes, then Pre-Calculus 12 is the course for you!\r\n\r\nAll of these topics above are presented in a fun-video format, and uses innovative online technology to deliver the course in an extremely exciting and interactive way. This course is also the final step before that all-mysterious topic? Calculus. Don?t miss out, sign up for Pre-Calculus 12 today!', 4, 12, 'Term 1', 2),
('SOC10', 'Social Studies 10', 'This course takes a look at Canada\'s development from colonies to country. The course views the issues that led the people of eight British North American colonies that existed in 1815 to eventually weave themselves into one nation a mari usque ad mare by the beginning of the Twentieth Century. Why do we have a country, and how did it grow to be the second largest country on Earth? We?ll study all of this, as well as the moral implications of many of the actions different leaders took during the process.\r\n\r\nThe course will rely on Internet resources selected by the teacher, along with questions that students will answer to develop a base of knowledge for unit projects and assignments. These major assessments will be the bulk of students? work and the bulk of graded material. Students will also have opportunities for discussions in scheduled webinars, and for intellectual interaction in written forums.', 4, 10, 'Term 2', 1),
('VA10', 'Visual Arts 10', 'Through readings, videos, art-making, and research projects, this course enables students to develop their skills in producing art by introducing them to the fundamentals of art: elements of design, principles of design, and image-development strategies. Each of the course?s lessons are rooted in BC?s new curriculum, and ? as such ? requires students to engage in creative, experimental, project-based art-making. Students have the freedom to work with any media they?d like, whether its graphite pencil, ink, charcoal, watercolour, acrylic, or similar.', 4, 10, 'Summer', 3);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `dept_id` int(2) NOT NULL,
  `dept_name` char(20) NOT NULL,
  PRIMARY KEY (`dept_id`),
  UNIQUE KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`) VALUES
(1, 'Humanities'),
(2, 'Math/Sciences'),
(3, 'Electives');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_in`
--

DROP TABLE IF EXISTS `enrolled_in`;
CREATE TABLE IF NOT EXISTS `enrolled_in` (
  `course_id` varchar(5) NOT NULL,
  `pen` int(9) NOT NULL,
  PRIMARY KEY (`course_id`,`pen`),
  KEY `pen` (`pen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled_in`
--

INSERT INTO `enrolled_in` (`course_id`, `pen`) VALUES
('ENG11', 122704216),
('PC12', 122704216),
('SOC10', 122704216),
('SOC10', 509739199),
('VA10', 122704216);

-- --------------------------------------------------------

--
-- Table structure for table `head_of`
--

DROP TABLE IF EXISTS `head_of`;
CREATE TABLE IF NOT EXISTS `head_of` (
  `dept_id` int(2) NOT NULL,
  `sin` int(9) DEFAULT NULL,
  PRIMARY KEY (`dept_id`),
  KEY `sin` (`sin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `head_of`
--

INSERT INTO `head_of` (`dept_id`, `sin`) VALUES
(1, 123456789),
(3, 202122232),
(2, 415161718);

-- --------------------------------------------------------

--
-- Table structure for table `parents_guardians`
--

DROP TABLE IF EXISTS `parents_guardians`;
CREATE TABLE IF NOT EXISTS `parents_guardians` (
  `parent_name` char(100) NOT NULL,
  `cell_num` varchar(12) NOT NULL,
  `phone_num` varchar(12) NOT NULL,
  `address` varchar(200) NOT NULL,
  `relation_to_student` char(15) NOT NULL,
  `pen` int(9) NOT NULL,
  PRIMARY KEY (`parent_name`,`pen`),
  KEY `pen` (`pen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents_guardians`
--

INSERT INTO `parents_guardians` (`parent_name`, `cell_num`, `phone_num`, `address`, `relation_to_student`, `pen`) VALUES
('Abigail Faraldo', '604-717-6665', '', '1115 No. 3 Road, Richmond British Columbia, V6X 2B8', 'mother', 575834643),
('Erik Malinowski', '', '604-622-1041', '332 Robson St, Vancouver British Columbia, V6B 3K9', 'father', 262701543),
('Henry Faraldo', '604-717-6664', '', '1115 No. 3 Road, Richmond British Columbia, V6X 2B8', 'father', 575834643),
('Jessica Van Altena', '', '604-727-1695', '1242 Hastings Street, Vancouver British Columbia, V6C 1B4', 'mother', 326798345),
('Lourdes Rodgers', '', '555-567-5678', '2456 King George Hwy, Surrey British Columbia, V3W 4E3', 'guardian', 509739199),
('Marie Bautista', '', '555-555-5556', '1234 Fake Address Street, Surrey British Columbia, V4D 1F8', 'mother', 122704216),
('Tom Bautista', '', '555-555-5557', '1234 Fake Address Street, Surrey British Columbia, V4D 1F8', 'father', 122704216);

-- --------------------------------------------------------

--
-- Table structure for table `school_calendar`
--

DROP TABLE IF EXISTS `school_calendar`;
CREATE TABLE IF NOT EXISTS `school_calendar` (
  `event_id` int(3) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `start_date` varchar(10) NOT NULL,
  `end_date` varchar(10) NOT NULL,
  PRIMARY KEY (`event_id`),
  UNIQUE KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_calendar`
--

INSERT INTO `school_calendar` (`event_id`, `event_title`, `start_date`, `end_date`) VALUES
(1, 'School Reopens After Spring Break', '2017-04-03', ''),
(2, 'Good Friday', '2017-04-14', ''),
(3, 'Easter Monday', '2017-04-17', ''),
(4, 'Deadline for invoices and PO purchases with budget allocation', '2017-04-28', ''),
(5, 'Deadline for Internet reimbursement claims', '2017-05-01', ''),
(6, 'BC Provincial Exams', '2017-05-08', '2017-05-12'),
(7, 'Graduation Ceremony for Grade 12s', '2017-05-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `pen` int(9) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `preferredname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `dob` varchar(10) NOT NULL,
  `country_birth` varchar(100) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `phone_num` varchar(12) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `first_nations` char(3) DEFAULT NULL,
  `grade` int(2) NOT NULL,
  `program_type` char(15) NOT NULL,
  `prev_school_name` varchar(50) DEFAULT NULL,
  `prev_school_contact` varchar(12) DEFAULT NULL,
  `iep` char(3) DEFAULT NULL,
  `gifted` char(3) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  PRIMARY KEY (`pen`),
  UNIQUE KEY `pen` (`pen`),
  UNIQUE KEY `user_password` (`user_password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`pen`, `lastname`, `firstname`, `preferredname`, `middlename`, `dob`, `country_birth`, `email_address`, `phone_num`, `gender`, `first_nations`, `grade`, `program_type`, `prev_school_name`, `prev_school_contact`, `iep`, `gifted`, `username`, `user_password`) VALUES
(122704216, 'Bautista', 'Sofia', '', '', '29/04/1999', 'Philippines', 'sbautist@sfu.ca', '555-555-5555', 'f', 'no', 12, 'enrolled', 'Sunnyside High School', '250-123-1234', 'no', 'no', 'sbautista', '6ed7593efc0565c355860f7ed3223c4b45588703'),
(262701543, 'Malinowski', 'Devon', '', '', '13/08/2008', 'Poland', 'erik_malinowski@gmail.com', '604-622-1041', 'm', 'no', 2, 'registered', 'Abraham Elementary', '604-312-8208', 'no', 'no', 'dmalinowski', 'e22eb717137afd153925ae6651139789d68e3055'),
(326798345, 'Van Altena', 'Adelina', '', '', '30/11/1939', 'Canada', 'avaltena@yahoo.ca', '778-523-1245', 'f', 'yes', 6, 'enrolled', 'Terry Fox Elementary School', '778-881-6583', 'yes', 'yes', 'avanaltena', '9045fdaf59af380f32a5ab542ce5a0ca6f735d05'),
(509739199, 'Rodgers', 'CÃ©sar', '', '', '01/10/2001', 'Spain', 'crodgers@hotmail.com', '555-123-1234', 'm', 'no', 10, 'registered', 'St. James Secondary School', '604-123-1234', 'no', 'no', 'crodgers', 'dc488b389e1d1da21470845cf027bf3e1286a7fb'),
(575834643, 'Faraldo', 'Irma', '', '', '25/05/2003', 'Canada', 'irfaraldo@gmail.com', '778-839-4580', 'f', 'no', 8, 'enrolled', 'Penny Elementary School', '604-270-8025', 'no', 'no', 'ifaraldo', '7fe2f050a3cc0c6c1e097eb1e417c16d6a1b89bd');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `sin` int(9) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `dept_speciality` char(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  PRIMARY KEY (`sin`),
  UNIQUE KEY `sin` (`sin`),
  UNIQUE KEY `user_password` (`user_password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`sin`, `lastname`, `firstname`, `dob`, `dept_speciality`, `username`, `user_password`) VALUES
(101112131, 'White', 'Emily', '04/02/1980', 'Humanities', 'ewhite', '2cd9db7d008300239024557c34a89075771aceeb'),
(123456789, 'Doe', 'John', '10/03/1960', 'Humanities', 'jdoe', 'd35514736146439b7277437016cdb40d7fb65497'),
(202122232, 'Smith', 'Adam', '08/13/1976', 'Electives', 'asmith', '329761ccbbac92b6d84b8e98fb67579293c7905d'),
(415161718, 'Doe', 'Jane', '06/21/1965', 'Math/Sciences', 'jadoe', '1ae0be80441ebadde375fe57798b008ed925373a'),
(425262728, 'Chen', 'Anne', '02/03/1982', 'Electives', 'achen', '7364008dc3be68102ea8f9d7e1fdcc07eb756637');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

DROP TABLE IF EXISTS `teaches`;
CREATE TABLE IF NOT EXISTS `teaches` (
  `course_id` varchar(5) NOT NULL,
  `sin` int(9) NOT NULL,
  PRIMARY KEY (`course_id`,`sin`),
  KEY `sin` (`sin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`course_id`, `sin`) VALUES
('ENG11', 123456789),
('PC12', 415161718),
('SOC10', 101112131),
('VA10', 202122232);

-- --------------------------------------------------------

--
-- Table structure for table `works_in`
--

DROP TABLE IF EXISTS `works_in`;
CREATE TABLE IF NOT EXISTS `works_in` (
  `sin` int(9) NOT NULL,
  `dept_id` int(2) NOT NULL,
  PRIMARY KEY (`sin`,`dept_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `works_in`
--

INSERT INTO `works_in` (`sin`, `dept_id`) VALUES
(101112131, 1),
(123456789, 1),
(202122232, 3),
(415161718, 2),
(425262728, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courselist`
--
ALTER TABLE `courselist`
  ADD CONSTRAINT `courselist_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`);

--
-- Constraints for table `enrolled_in`
--
ALTER TABLE `enrolled_in`
  ADD CONSTRAINT `enrolled_in_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courselist` (`course_id`),
  ADD CONSTRAINT `enrolled_in_ibfk_2` FOREIGN KEY (`pen`) REFERENCES `students` (`pen`);

--
-- Constraints for table `head_of`
--
ALTER TABLE `head_of`
  ADD CONSTRAINT `head_of_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`),
  ADD CONSTRAINT `head_of_ibfk_2` FOREIGN KEY (`sin`) REFERENCES `teachers` (`sin`);

--
-- Constraints for table `parents_guardians`
--
ALTER TABLE `parents_guardians`
  ADD CONSTRAINT `parents_guardians_ibfk_1` FOREIGN KEY (`pen`) REFERENCES `students` (`pen`) ON DELETE CASCADE;

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courselist` (`course_id`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`sin`) REFERENCES `teachers` (`sin`);

--
-- Constraints for table `works_in`
--
ALTER TABLE `works_in`
  ADD CONSTRAINT `works_in_ibfk_1` FOREIGN KEY (`sin`) REFERENCES `teachers` (`sin`),
  ADD CONSTRAINT `works_in_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
