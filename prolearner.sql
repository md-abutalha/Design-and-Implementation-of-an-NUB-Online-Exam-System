-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2024 at 06:05 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prolearner`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `ann` varchar(500) NOT NULL,
  `file` varchar(75) NOT NULL DEFAULT 'na'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `course_id`, `ann`, `file`) VALUES
(1, 2, 'this is test announcement.', 'na'),
(2, 2, 'this is test', 'na'),
(3, 10, 'test an', 'na'),
(4, 11, 'this is test', 'na'),
(5, 13, 'this is test', 'na'),
(6, 1, 'dsgsdfgdsf', 'na'),
(7, 1, 'sdfsdfsdf', 'na'),
(8, 1, 'sdfsdf', 'na'),
(9, 1, 'dghfg', 'na'),
(10, 1, 'dghfg', 'na'),
(11, 1, 'dghfg', 'na'),
(12, 1, 'ergfdfgdfg', 'announcement-9846-5536.svg'),
(13, 1, 'sdfsdf', 'announcement-9830-4294.jpg'),
(14, 1, 'sdfsdfsdf', 'na'),
(15, 1, 'test', 'announcement-6090-5988.480p hdtv'),
(16, 14, 'Test announcement 1', 'announcement-8220-3434.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `quiz_id` int(20) NOT NULL,
  `att_key` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'not_submitted',
  `file` varchar(75) NOT NULL DEFAULT 'na',
  `eval` varchar(20) NOT NULL DEFAULT 'pending',
  `xmark` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `user_id`, `quiz_id`, `att_key`, `status`, `file`, `eval`, `xmark`) VALUES
(3, 3, 9, 'lTYPfJOwebVEs4Hp69Mi', 'not_submitted', 'na', 'pending', 0),
(4, 3, 10, 'drTiwt8NM4sbBqLDUC2P', 'not_submitted', 'na', 'pending', 0),
(5, 3, 11, 'lJE6LnaMBYz0yTRcK4Fg', 'not_submitted', 'na', 'pending', 0),
(6, 3, 12, '71vUmRwflSACQiPkIbyh', 'not_submitted', 'na', 'pending', 0),
(7, 3, 13, '6fU2duGlK0WzQ84c1kC9', 'submitted', 'na', 'checked', 0),
(8, 3, 14, 'hS7PLvFHJVEs589AQzIq', 'submitted', 'na', 'checked', 0),
(9, 3, 15, 'xVd3a0RieIl1uJzXSjWk', 'submitted', 'na', 'pending', 0),
(10, 9, 18, '6bcQxO5g4Dpn1ZsHGm27', 'submitted', 'na', 'checked', 0),
(11, 9, 20, '7SwQBza3xZI8hrq46bc1', 'submitted', 'na', 'pending', 0),
(12, 9, 22, 'BiZRn2yFd3M0TsILOWkN', 'submitted', 'na', 'checked', 0),
(13, 3, 26, 'zFM0GDko3tYadgAm2fKZ', 'submitted', 'na', 'checked', 12),
(15, 3, 25, '1uJK4ilmvdB8CNj7D2FE', 'submitted', 'answer-6125-2994.jpg', 'pending', 0),
(16, 3, 27, 'bijFaoVJsIlpr863Tvuk', 'submitted', 'na', 'pending', 0),
(18, 3, 28, 'AYl4DGH7Cy3xEIKPdb2B', 'submitted', 'na', 'pending', 0),
(22, 3, 29, 'yNlx2UJaROYTLHum6Ck3', 'submitted', 'answer-1814-6750.jpg', 'checked', 6),
(25, 3, 30, 'KRxglfTSyNCteP51kdYr', 'submitted', 'answer-4941-3624.pdf', 'checked', 20);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(350) NOT NULL,
  `owner` varchar(30) NOT NULL,
  `img` varchar(50) NOT NULL,
  `key` varchar(10) NOT NULL DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `owner`, `img`, `key`) VALUES
(1, 'Basics of Vue.js', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque necessitatibus distinctio adipisci eius, unde dignissimos maxime doloribus quisquam non harum?</p>', 'hridoy@gmail.com', 'course-9383-1014.jpg', '123456'),
(2, 'Basics test', '<p>Lor<strong>em ipsum dolor sit</strong> amet<em>, consectetur adipisicing elit. Cumque necessitatibus distinctio adipisci eius, unde dignissimos maxime dol</em>oribus quisquam non harum?</p>', 'hridoy@gmail.com', 'course-6728-6141.jpg', '123456'),
(3, 'google expert', '<p>this it <em>test </em><strong>descrition</strong>. <a href=\"https://google.com\" rel=\"noopener noreferrer\" target=\"_blank\">click here</a></p>', 'hridoy@gmail.com', 'course-6087-2173.jpg', '123456'),
(4, 'Basics of ssss', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque necessitatibus distinctio adipisci eius, unde dignissimos maxime doloribus quisquam non harum?</p>', 'hridoy@gmail.com', 'course-9075-4211.jpg', '123456'),
(5, 'Basdfd', '<p><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque necessitatibus distinctio adipisci eius, unde dignissimos maxime doloribus quisquam non harum</em>?</p>', 'hridoy@gmail.com', 'course-2611-7658.jpg', '123456'),
(8, 'final Test', '<p>This is the final quiz test.</p>', 'hridoy@gmail.com', 'course-3792-9639.jpg', '123456'),
(9, 'New101', '<p><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque necessitatibus distinctio adipisci eius, unde dignissimos maxime doloribus quisquam non harum?</strong></p>', 'hridoy@gmail.com', 'course-9083-5884.jpg', '123456'),
(10, 'Final test course-1', '<p><strong><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque necessitatibus distinctio adipisci eius, unde dignissimos maxime doloribus quisquam non harum?</em></strong></p>', 'mhhridoy@gmail.com', 'course-5338-7849.jpg', '123456'),
(11, 'new course1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque necessitatibus distinctio adipisci eius, unde dignissimos maxime doloribus quisquam non harum?</p>', 'tt@gmail.com', 'course-9296-9610.jpg', '123456'),
(12, 'Basics of Vue.js', '<p>Lorem ips<strong>um dolor</strong> sit amet, consectetur adipisicing elit. Cumque necessitatibus distinctio adipisci eius, unde dignissimos maxime doloribus quisquam non harum?</p>', 'tt@gmail.com', 'course-5064-3967.jpg', '59811'),
(13, 'test111', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque necessitatibus distinctio adipisci eius, unde dignissimos maxime doloribus quisquam non harum?</p>', 'hridoy101@gmail.com', 'course-9879-8809.jpg', '17037'),
(14, 'last course', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque necessitatibus distinctio adipisci eius, unde dignissimos maxime doloribus quisquam non harum?</p>', 'hridoy@gmail.com', 'course-1685-5080.jpg', '61353');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `user_id`, `course_id`) VALUES
(1, 3, 1),
(3, 3, 2),
(4, 3, 3),
(5, 3, 8),
(7, 3, 9),
(11, 9, 11),
(12, 9, 13),
(13, 3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `title` varchar(75) NOT NULL,
  `course_id` int(10) NOT NULL,
  `start_time` int(20) NOT NULL,
  `duration` int(10) NOT NULL,
  `file` varchar(100) NOT NULL DEFAULT 'na',
  `xmark` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `title`, `course_id`, `start_time`, `duration`, `file`, `xmark`) VALUES
(7, '12312345', 1, 1721993400, 180, 'na', 0),
(8, 'test test test', 3, 1720652400, 240, 'na', 0),
(9, 'Attempt Test', 3, 1720291200, 240, 'na', 0),
(10, 'timer Test', 3, 1720296600, 240, 'na', 0),
(11, 'test101', 2, 1720371600, 240, 'na', 0),
(12, 'minitest', 2, 1720412760, 7, 'na', 0),
(13, 'quiz201', 8, 1720417500, 240, 'na', 0),
(14, 'newXm', 9, 1720629600, 240, 'na', 0),
(15, 'test22', 9, 1720630200, 240, 'na', 0),
(16, 'Test111', 9, 1721757600, 240, 'na', 0),
(17, 'Final test Exam', 10, 1722583200, 180, 'na', 0),
(18, 'newexam', 11, 1722601800, 240, 'na', 0),
(20, 'ttttttttt', 11, 1722603000, 240, 'na', 0),
(21, 'Vue.js Introduction', 12, 1722538800, 240, 'na', 0),
(22, 'exam111', 13, 1722619200, 240, 'na', 0),
(23, 'Vue.js Introduction', 1, 1725562800, 240, 'na', 0),
(24, 'Vue.js Introduction1', 1, 1725562800, 240, 'question-4701-6454.png', 0),
(25, 'Vue.js I111111', 1, 1725785700, 240, 'question-3988-6656.jpg', 30),
(26, 'Vue5', 1, 1725783000, 20, 'question-6126-6773.jpg', 54),
(27, 'Vue.js Introduction', 1, 1725787800, 240, 'na', 0),
(28, 'Vue.js Introduction', 1, 1725789000, 240, 'na', 0),
(29, 'LT101', 14, 1727621100, 240, 'question-7989-6080.jpg', 10),
(30, 'FFF1', 1, 1728057300, 240, 'question-7695-6005.pdf', 50);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `exam_id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(10) NOT NULL,
  `mark` int(5) NOT NULL,
  `a` varchar(30) NOT NULL,
  `b` varchar(30) NOT NULL,
  `c` varchar(30) NOT NULL,
  `d` varchar(30) NOT NULL,
  `ans` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `title`, `type`, `mark`, `a`, `b`, `c`, `d`, `ans`) VALUES
(1, 1, 'Database Access', 'text', 50, '', '', '', '', ''),
(2, 1, 'Dadfhrtdysssssssssssssss', 'text', 50, '', '', '', '', ''),
(3, 1, 'Database Accessssssssssssssss', 'mcq', 3, 'asd', 'ads', 'das', 'ada', 'c'),
(6, 4, 'Question Statement', 'text', 50, '', '', '', '', ''),
(7, 4, 'Question Stcx', 'mcq', 50, 'asd', 'ads', 'das', 'ada', 'a'),
(8, 8, 'how are you', 'text', 50, '', '', '', '', ''),
(9, 8, 'are you ok?', 'mcq', 5, 'yes', 'no ', 'good', 'bad', 'a'),
(10, 10, 'Question Statement', 'text', 50, '', '', '', '', ''),
(11, 10, 'Question Statement', 'text', 50, '', '', '', '', ''),
(12, 11, 'q101', 'text', 5, '', '', '', '', ''),
(13, 11, 'q102', 'text', 5, '', '', '', '', ''),
(14, 13, 'QS1', 'text', 5, '', '', '', '', ''),
(15, 13, 'QS2', 'mcq', 5, 'test1', 'test2', 'test3', 'test4', 'c'),
(16, 14, 'Question q1', 'text', 5, '', '', '', '', ''),
(17, 14, 'Question Statement', 'mcq', 1, 'asd', 'sdfs', 'sdfsdf', 'sdfsd', 'b'),
(18, 15, 'Question Statement 1', 'text', 50, '', '', '', '', ''),
(19, 15, 'Question Statement', 'mcq', 50, 'asd', 'ads', 'das', 'ada', 'b'),
(20, 17, 'Final Test Q', 'text', 10, '', '', '', '', ''),
(21, 17, 'Final Test Q2', 'mcq', 1, 'test1', 'test2', 'test3', 'test4', 'c'),
(22, 18, 'qq1', 'text', 10, '', '', '', '', ''),
(23, 18, 'qq2', 'mcq', 5, 'test1', 'test2', 'test3', 'test4', 'a'),
(24, 20, 'Question Statement', 'text', 50, '', '', '', '', ''),
(25, 22, 'question111', 'text', 10, '', '', '', '', ''),
(26, 22, 'question112', 'mcq', 5, 'test1', 'test2', 'test3', 'test4', 'c'),
(27, 26, 'Question Statement', 'text', 50, '', '', '', '', ''),
(28, 26, 'Question Statement', 'text', 50, '', '', '', '', ''),
(29, 30, 'Question Statement 1', 'mcq', 5, 'a', 'b', 'c', 'd', 'a'),
(30, 30, 'Question Statement 2', 'mcq', 5, 'a', 'b', 'c', 'd', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `quiz_id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  `question_type` varchar(10) NOT NULL,
  `question_title` varchar(150) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `mark` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `quiz_id`, `question_id`, `question_type`, `question_title`, `answer`, `status`, `mark`) VALUES
(11, 3, 13, 14, 'text', 'QS1', 'q1', 'checked', '3'),
(12, 3, 13, 15, 'mcq', 'QS2', 'c', 'right', '5'),
(13, 3, 14, 16, 'text', 'Question q1', 'sdfsdf sd', 'checked', '3'),
(14, 3, 14, 17, 'mcq', 'Question Statement', 'a', 'wrong', '0'),
(15, 3, 15, 18, 'text', 'Question Statement 1', 'aedawdawww', 'pending', '0'),
(16, 3, 15, 19, 'mcq', 'Question Statement', 'b', 'right', '50'),
(17, 9, 18, 22, 'text', 'qq1', 'dfsdfsdf', 'checked', '7'),
(18, 9, 18, 23, 'mcq', 'qq2', 'a', 'right', '5'),
(19, 9, 20, 24, 'text', 'Question Statement', 'sfdsfsdf', 'pending', '0'),
(20, 9, 22, 25, 'text', 'question111', 'the test', 'checked', '5'),
(21, 9, 22, 26, 'mcq', 'question112', 'a', 'wrong', '0'),
(22, 3, 26, 27, 'text', 'Question Statement', 'fsdfsd', 'checked', '5'),
(23, 3, 26, 28, 'text', 'Question Statement', 'sdfsdf', 'checked', '5'),
(25, 3, 30, 29, 'mcq', 'Question Statement 1', 'a', 'right', '5'),
(26, 3, 30, 30, 'mcq', 'Question Statement 2', 'b', 'right', '5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'student',
  `bio` varchar(500) NOT NULL DEFAULT 'Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.',
  `id_no` varchar(20) NOT NULL DEFAULT '191-15-2395',
  `img` varchar(50) NOT NULL DEFAULT 'profile_demo.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `role`, `bio`, `id_no`, `img`) VALUES
(1, 'MH Hridoy', 'hridoy@gmail.com', '123456', 'teacher', 'Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.', '191-15-2395', 'profile-9158-2131.jpg'),
(2, 'Hridoy', 'mhhridoy0c@gmail.com', '12345', 'student', 'Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.', '191-15-2395', 'profile-9158-2131.jpg'),
(3, 'name edited', 'mh@gmail.com', '12345', 'student', 'test fine', '191-15-2395', 'profile-9158-2131.jpg'),
(4, 'MH Hridoy', 'test@gmail.com', '12345', 'Teacher', 'Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.', '191-15-2395', 'profile-9158-2131.jpg'),
(5, 'MH Hridoy', 'test1@gmail.com', '12345', 'teacher', 'Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.', '191-15-2395', 'profile-9158-2131.jpg'),
(6, 'Hdhd', '12@gmail.com', '123456', 'student', 'Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.', '191-15-2395', 'profile-9158-2131.jpg'),
(7, 'Hridoy', 'mhhridoy@gmail.com', '123456', 'teacher', 'Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.', '191-15-2395', 'profile-9158-2131.jpg'),
(8, 'Test Student', 'test101@gmail.com', '12345', 'student', 'Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.', '191-15-2395', 'profile-9158-2131.jpg'),
(9, 'TestStudent1', 'ts@gmail.com', '12345', 'student', 'this is test bio', '191-15-2395', 'profile-9158-2131.jpg'),
(10, 'TestTeacher1', 'tt@gmail.com', '123456', 'teacher', 'Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.', '191-15-2395', 'profile-9158-2131.jpg'),
(11, 'Hridoytest', 'hridoy101@gmail.com', '123456', 'teacher', 'Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.', '191-15-2395', 'profile-9158-2131.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
