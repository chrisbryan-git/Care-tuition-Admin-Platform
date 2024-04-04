-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 01:08 PM
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
-- Database: `cares database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `admin_code` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `admin_code`, `password`, `user_type`) VALUES
(12, 'Chris Brian', '$2y$10$tBzcgul7MubwZXJkte.G5OPf9jZK7AcQfH4Rb8NwIqyafDU4kdn1u', '$2y$10$kupDbd64fgbw/VtPe.lMzOQwCVxf/pTqhxm4Aj6DpaFuVY3o9ep9e', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `exam_scores`
--

CREATE TABLE `exam_scores` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `year_of_study` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `exam_type` varchar(255) DEFAULT NULL,
  `subjects_scores` varchar(255) DEFAULT NULL,
  `average_score` decimal(10,2) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_scores`
--

INSERT INTO `exam_scores` (`id`, `student_name`, `year_of_study`, `date`, `exam_type`, `subjects_scores`, `average_score`, `grade`) VALUES
(13, 'Denis Ngetich Opondo', '10', '2023-09-30', 'Opener Exam', 'maths: 100, english: 100, biology: 100, physics: 100, chemistry: 100, science: 100, geography: 90, indig: 100', '98.75', 'A+'),
(17, 'Levi Okoth', '10', '2023-09-10', 'Opener Exam', 'maths: 100, english: 100, biology: 100, physics: 80, chemistry: 79, science: 99, geography: 99, history: 90, ict: 99, accounting: 78, religion: 90, homescience: 95, programming: 60, swahili: 100, indig: 78', '89.80', 'A'),
(19, 'Erika Maina', '0', '2023-09-26', 'Admission Exam', 'maths: 89, english: 78, biology: 90, science: 78, ict: 89, homescience: 90', '85.67', 'A'),
(20, 'ken Obonyo', '10', '2023-09-30', 'CAT 2 Exam', 'maths: 80, english: 89, biology: 78, physics: 0, chemistry: 0, science: 0, geography: 0, history: 0, ict: 0, accounting: 0, religion: 0, homescience: 0, programming: 0, swahili: 0, indig: 0', '16.47', 'F'),
(21, 'Madline Anyango', '0', '2023-09-30', 'CAT 3 Exam', 'maths: 100, english: 90, biology: 100, physics: 0, chemistry: 0, science: 0, geography: 0, history: 0, ict: 0, accounting: 0, religion: 0, homescience: 0, programming: 0, swahili: 0, indig: 0', '19.33', 'F'),
(22, 'Laura Nyegenye', '0', '2023-09-30', 'Opener Exam', 'maths: 100, english: 10, biology: 99, physics: 80, chemistry: 79, science: 93, geography: 90, history: 90, ict: 99, accounting: 90, religion: 90, homescience: 95, programming: 0', '78.08', 'B'),
(23, 'Denis Nyagarangi', 'Yr/Grd 1', '2023-09-30', 'CAT 1 Exam', 'maths: 0, english: 90, biology: 0, physics: 0, chemistry: 0, science: 0, geography: 0, history: 0, ict: 0, accounting: 0, religion: 0, homescience: 0, programming: 0, swahili: 0, indig: 0', '6.00', 'F'),
(25, 'Denis Nyagarangi', 'Yr/Grd 4', '2023-10-01', 'Opener Exam', 'maths: 89, english: 30, biology: 70, physics: 56, chemistry: 29, geography: 65', '56.50', 'D'),
(26, 'Susan Veronica', 'Yr/Grd 9', '2023-10-10', 'CAT 1 Exam', 'maths: 100, english: 0, physics: 98, chemistry: 77, geography: 90, history: 54, programming: 44, swahili: 54, indig: 86', '67.00', 'C'),
(27, 'Jeane Kasande', 'Yr/Grd 3', '2023-10-18', 'Term 2 Exam', 'maths: 89, physics: 80, geography: 89, ict: 99, accounting: 90, religion: 90, homescience: 95, programming: 60, swahili: 90', '86.89', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `exam_timetable`
--

CREATE TABLE `exam_timetable` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `date_of_exams` date DEFAULT NULL,
  `exam_center` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `type_of_exam` varchar(255) DEFAULT NULL,
  `supervised_by` varchar(255) DEFAULT NULL,
  `exam_out_of` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_timetable`
--

INSERT INTO `exam_timetable` (`id`, `teacher_name`, `student_name`, `subject`, `date_of_exams`, `exam_center`, `day`, `start_time`, `type_of_exam`, `supervised_by`, `exam_out_of`) VALUES
(1, 'Teresia Omondi', 'Jane Olwande', 'Biology', '2023-10-20', 'kile', 'Wednesday', '20:14:00', 'CAT 1', 'Phylis Mwangi', 35),
(2, 'Teresia Omondi', 'Levi Makokha', 'Geography', '2023-10-08', 'karen', 'Tuesday', '10:32:00', 'End term 1', 'Phylis Mwangi', 50),
(4, 'james okwala', 'Levi Makokha', 'Geography', '2023-10-08', 'karen', 'Tuesday', '10:32:00', 'Chemistry', 'Tr Leila Amimo', 50),
(6, 'Phylis Mwangi', 'Leila Amimo', 'Mathematics', '2023-10-20', 'karen', 'Monday', '10:00:00', 'Geography', 'Teresia Omondi', 45),
(7, 'Teresia Omondi', 'Jane Olwande', 'Biology', '2023-10-19', 'karen', 'Tuesday', '06:58:00', 'Accounting', 'Teresia Omondi', 100),
(9, 'Teresia Omondi', 'Susan Nyonje', 'English', '2023-10-24', 'karen', 'Monday', '09:03:00', 'end term exam', 'Phylis Mwangi', 30),
(10, 'Teresia Omondi', 'Denis Barasa', 'ICT', '2023-10-08', 'karen', 'Tuesday', '13:02:00', 'midterm', 'Irene Obanda', 75),
(11, 'Teresia Omondi', 'Jane Olwande', 'Biology', '2023-10-12', 'karen', 'Sunday', '10:07:00', 'Monthly CAT', 'james okwala', 30),
(12, 'Teresia Omondi', 'Denis Nyagarangi', 'Chemistry', '2023-10-14', 'Kikuyu', 'Monday', '10:10:00', 'CAT 2', 'Phylis Mwangi', 70);

-- --------------------------------------------------------

--
-- Table structure for table `form_data`
--

CREATE TABLE `form_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`id`, `title`, `description`, `file_path`) VALUES
(1, '', 'ni;/op', 'uploads/569723-june-2021-supporting-document-21.zip');

-- --------------------------------------------------------

--
-- Table structure for table `kyle_table`
--

CREATE TABLE `kyle_table` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `Second_Name` varchar(100) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Contact` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kyle_table`
--

INSERT INTO `kyle_table` (`id`, `FirstName`, `Second_Name`, `DOB`, `Contact`) VALUES
(1, 'Kyle', 'Oyier', '2023-09-13', NULL),
(2, 'Kyle', 'Oyier', '2023-09-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `rate_value` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `rate_value`) VALUES
(1, '0.00'),
(19, '300.00'),
(20, '400.00'),
(21, '200.00'),
(22, '400.00'),
(23, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `students_table`
--

CREATE TABLE `students_table` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `subjects_to_be_taught` varchar(255) DEFAULT NULL,
  `date_of_admission` date DEFAULT NULL,
  `type_of_program` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `parent_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `parent_email` varchar(255) DEFAULT NULL,
  `location_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_table`
--

INSERT INTO `students_table` (`id`, `student_name`, `subjects_to_be_taught`, `date_of_admission`, `type_of_program`, `class`, `parent_name`, `phone_number`, `parent_email`, `location_address`) VALUES
(13, 'Jeane Kasande', 'English,kiswahili', '2023-08-31', 'homeschool', 'Form one', 'Lisa Pamela', '078834556', 'lisapam@gmail.com', 'Kikuyu'),
(14, 'Denis Nyagarangi', 'English,Maths', '2023-09-08', 'tuition', 'Grd 8', 'Elias Ngetich', '0718676455', 'denis@gmail.com', 'Runda'),
(16, 'Leila Kadush', 'Computing,English', '2023-09-23', 'Tuition', 'Form one', 'David Goliath', '075567746', 'leila@gmail.com', 'Uthiru'),
(19, 'Japeth Namnyi', 'English,Maths', '2023-09-30', 'homeschool', 'Form one', 'Felistas namanyi', '0788987765', 'fely@gmail.com', 'Mlolongo'),
(20, 'Laura Nyegenye', 'Ict', '2023-09-14', 'tuition', 'Form one', 'Felix Wandera', '0987677', '', 'Kikuyu'),
(22, 'Madline Anyango', 'English Kiswahili', '2023-09-29', 'Home Tuition', 'Yr/Grd 4', 'Alice Ngongwe', '0788933647', '', 'Ruiru');

--
-- Triggers `students_table`
--
DELIMITER $$
CREATE TRIGGER `student_name_update` AFTER UPDATE ON `students_table` FOR EACH ROW BEGIN
    UPDATE exam_scores
    SET student_name = NEW.student_name
    WHERE student_name = OLD.student_name;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_session_table`
--

CREATE TABLE `teacher_session_table` (
  `teacher_id` int(11) NOT NULL,
  `teacherName` varchar(50) DEFAULT NULL,
  `number_of_lessons` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_session_table`
--

INSERT INTO `teacher_session_table` (`teacher_id`, `teacherName`, `number_of_lessons`) VALUES
(1, 'John Smith', 10),
(2, 'Jane Doe', 8),
(3, 'Michael Johnson', 12),
(4, 'Emily Williams', 15),
(5, 'David Lee', 9);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_student_schedule`
--

CREATE TABLE `teacher_student_schedule` (
  `id` int(11) NOT NULL,
  `teacherName` varchar(255) NOT NULL,
  `personalId` int(11) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL,
  `subject` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `subtopic` varchar(255) NOT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_student_schedule`
--

INSERT INTO `teacher_student_schedule` (`id`, `teacherName`, `personalId`, `studentName`, `date`, `timeIn`, `timeOut`, `subject`, `topic`, `subtopic`, `comments`, `created_at`) VALUES
(21, 'Mr Kamau', 345473484, 'Chris Brian', '2023-08-31', '12:31:00', '13:34:00', 'History', 'colonization', 'Independence', 'Excellent', '2023-08-31 09:34:25'),
(22, 'John Omondi', 345473484, 'Chris Brian', '2023-09-01', '16:54:00', '17:54:00', 'Mathematics', 'Geometry', 'construction', 'well understood', '2023-08-31 09:55:07'),
(23, 'Levi Makokha', 0, 'Phanice Barsa', '2023-09-05', '11:20:47', '13:20:00', 'ICT', 'Computer Programming', 'Java prog', 'The lesson was well taught and the student understood', '2023-09-07 08:17:48'),
(25, 'Levi Makokha', 0, 'Phanice Simolo', '2023-09-05', '11:33:30', '13:20:00', 'ICT', 'Computer Programming', 'Java prog', 'The lesson was well taught and the student understood', '2023-09-07 08:33:31'),
(26, 'Diana Kemunto', 0, 'Kieo', '2023-09-07', '11:34:18', '14:34:00', 'jslk', 'jows', 'kdksl', 'ksl', '2023-09-07 08:34:19'),
(27, 'Levi Makokha', 0, 'Kelly Obonyo', '2023-09-05', '11:37:58', '14:40:00', 'ICT', 'Computer Programming', 'data structures', 'good', '2023-09-07 08:37:59'),
(29, 'Jack Omollo', 0, 'Mercy Opiyo', '2023-09-18', '13:19:49', '16:20:00', 'ICT', 'Programming', 'Forms', 'Well taught', '2023-09-18 10:19:50'),
(30, 'Kenethe Mwaura', 66, 'Chris Brian', '2023-09-22', '09:57:34', '11:59:00', 'nn', 'u', 'jjj', 'jjj', '2023-09-22 06:57:35'),
(31, 'Phylis Maina', 30245567, 'Chris Brian', '2023-09-22', '10:20:14', '12:22:00', 'Biology', 'njj', 'bio', 'bio', '2023-09-22 07:20:14'),
(32, 'Phylis Maina', 30245567, 'Chris Brian', '2023-09-22', '10:20:14', '12:22:00', 'Biology', 'njj', 'bio', 'bio', '2023-09-22 07:21:22'),
(33, 'Phylis Maina', 30245567, 'Levi Makokha', '2023-09-22', '10:27:33', '16:30:00', 'ICT', 'Computer Programming', 'Java prog', 'well learnt', '2023-09-22 07:27:33'),
(35, 'Phylis Maina', 30245567, 'Levi Makokha', '2023-09-22', '10:37:32', '13:00:00', 'English', 'special verbs', 'verbs', 'lesson well taught', '2023-09-22 07:37:32'),
(36, 'Phylis Mwangi', 30245567, 'Erika Maina', '2023-10-06', '21:54:00', '23:53:00', 'chemistry', 'moles', 'titration', 'lesson well taught and the student understood', '2023-10-06 18:55:12'),
(37, 'Phylis Mwangi', 30245567, 'Jane Kasande', '2023-10-11', '17:01:18', '20:00:00', 'Biology', 'Reproduction', 'human body', 'well taught and student understood', '2023-10-11 14:01:18'),
(38, 'Phylis Mwangi', 28869687, 'Jeane Kasande', '2023-10-14', '09:54:50', '10:55:00', 'Biology', 'Human Structure', 'bio', 'good understanding', '2023-10-14 06:54:51'),
(39, 'Phylis Mwangi', 28869687, 'Jeane Kasande', '2023-10-14', '09:55:03', '10:55:00', 'Biology', 'Human Structure', 'bio', 'good understanding', '2023-10-14 06:55:03'),
(40, 'Phylis Mwangi', 28869687, 'Jeane Kasande', '2023-10-14', '11:40:34', '13:42:00', 'English', 'nnn', 'nnn', 'jjjjjj', '2023-10-14 08:40:35'),
(41, 'Phylis Mwangi', 28869687, 'Jeane Kasande', '2023-10-05', '12:53:00', '13:54:00', 'English', 'verbs', 'verbs', 'jjjjjj', '2023-10-14 08:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_table`
--

CREATE TABLE `teacher_table` (
  `id` int(11) NOT NULL,
  `teacherName` varchar(255) DEFAULT NULL,
  `residence` varchar(255) DEFAULT NULL,
  `date_employed` date DEFAULT NULL,
  `personalId` varchar(255) DEFAULT NULL,
  `teacher_tsc` varchar(255) DEFAULT NULL,
  `mobilePhone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subjectCombination` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_table`
--

INSERT INTO `teacher_table` (`id`, `teacherName`, `residence`, `date_employed`, `personalId`, `teacher_tsc`, `mobilePhone`, `email`, `subjectCombination`, `qualification`, `gender`) VALUES
(4, 'Phylis Mwangi', 'Kikuyu', '2023-09-26', '28869687', '78776554', '078846646', 'phylis@gmail.com', 'Bio/Chem', 'Bsc maths and Coputer Sci', 'female'),
(6, 'Teresia Omondi', 'Langata', '2023-09-28', '55645546', '889887765', '078765756', 'teomondi@gmail.com', 'Math,CRE', 'bsce maths and computer', 'female'),
(7, 'Tr Leila Amimo', 'Mombasa', '2023-09-23', '78756657', '009', '0756788476', 'lei@gmail.com', 'sst an CRE', 'Bsc Maths and computer Science', 'female'),
(8, 'james okwala', 'Thika rd', '2023-09-30', '22334455', '899878875', '07999223774', 'james@gmail.com', 'Agric Business studies', 'Bsc sciences', 'male'),
(9, 'Irene Obanda', 'Ngong Rd ', '2023-09-30', '76647746', '88756647', '0788756647', 'io@gmail.com', 'Agric Home_science', 'Bsc Eduation', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_location` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `teacher_name`, `student_name`, `student_location`, `day`, `time_in`, `time_out`, `phone`) VALUES
(3, ' Leila Amimo', 'Susan Makokha', 'Kayole', 'Saturday', '18:08:00', '20:10:00', 'Physics'),
(5, 'Mr Kamau', 'Leila Amimo', 'Ngong Rd', 'Saturday', '16:30:00', '18:30:00', 'Kiswahili'),
(6, 'Ken Mwaura', 'Leila Amimo', 'Umoja', 'Monday', '10:00:00', '12:00:00', 'Geography'),
(7, 'Phylis Mwangi', 'Madline Anyango', 'Umoja', 'Saturday', '08:22:00', '09:24:00', 'English');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_scores`
--
ALTER TABLE `exam_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_timetable`
--
ALTER TABLE `exam_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_data`
--
ALTER TABLE `form_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyle_table`
--
ALTER TABLE `kyle_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_table`
--
ALTER TABLE `students_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_session_table`
--
ALTER TABLE `teacher_session_table`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_student_schedule`
--
ALTER TABLE `teacher_student_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_table`
--
ALTER TABLE `teacher_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam_scores`
--
ALTER TABLE `exam_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `exam_timetable`
--
ALTER TABLE `exam_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `form_data`
--
ALTER TABLE `form_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kyle_table`
--
ALTER TABLE `kyle_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students_table`
--
ALTER TABLE `students_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teacher_session_table`
--
ALTER TABLE `teacher_session_table`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_student_schedule`
--
ALTER TABLE `teacher_student_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `teacher_table`
--
ALTER TABLE `teacher_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
