-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 08:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwdi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(500) NOT NULL,
  `category_posteddate` datetime NOT NULL,
  `category_status` enum('Available','Not Available') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_posteddate`, `category_status`) VALUES
(4, 'Youth Sports', '2024-11-22 09:52:04', 'Available'),
(6, 'Adult Education ', '2024-11-22 09:51:15', 'Available'),
(7, 'Elders Nutrition', '2024-11-22 09:51:27', 'Available'),
(8, 'Gender', '2024-11-22 10:14:24', 'Available'),
(9, 'Disability', '2024-11-22 10:24:47', 'Available'),
(10, 'Financial Empowerment', '2024-11-22 10:25:34', 'Available'),
(11, 'Women Program', '2024-11-22 12:51:48', 'Available'),
(12, 'Girls program', '2024-11-22 12:52:02', 'Available'),
(14, 'Youth Program', '2024-11-22 13:33:44', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(500) NOT NULL,
  `contact_email` varchar(500) NOT NULL,
  `contact_phone` varchar(500) NOT NULL,
  `contact_subject` varchar(500) NOT NULL,
  `contact_message` varchar(500) NOT NULL,
  `contact_date` datetime NOT NULL,
  `contact_status` enum('new','opened') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_subject`, `contact_message`, `contact_date`, `contact_status`) VALUES
(1, 'Willy', 'williamtangwa95@gmail.com', '0621462229', 'Ict service', 'Tunajaribu fomu ya kupost data.', '2024-10-23 00:00:00', 'opened'),
(2, 'CATHERINE PETER', 'cathe@gmail.com', '0714107283', 'Gender issue', 'Mpo salama wakuu?', '2024-10-23 00:00:00', 'opened'),
(3, 'William', 'williamtangwa95@gmail.com', '0714107283', 'Ict service', 'Hello', '2024-10-25 00:00:00', 'opened'),
(4, 'William', 'williamtangwa95@gmail.com', '0678429492', 'Ict service', 'Proffecional website needed!', '2024-10-27 01:21:34', 'opened'),
(5, 'Anna', 'anna@gmail.com', '0628657730', 'Volunteer', 'Mambo!', '2024-10-31 10:26:36', 'opened'),
(6, 'JOVENTI AUDAX', 'jovetaudax@gmail.com', '0768007712', 'Ict service', 'Salama.', '2024-10-31 10:28:20', 'opened'),
(7, 'William Tangwa', 'williamtangwa95@gmail.com', '0621462229', 'Huduma ya wazee', 'Hongeara kwa kazi nzuri.', '2024-11-21 18:10:41', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `events_id` int(11) NOT NULL,
  `events_title` varchar(500) NOT NULL,
  `events_description` varchar(500) NOT NULL,
  `events_date` date NOT NULL,
  `events_status` enum('enable','disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`events_id`, `events_title`, `events_description`, `events_date`, `events_status`) VALUES
(2, 'women Training', 'Women Empowerment training, activity at Chamwino Morogoro Tanzania.', '2024-10-20', 'enable'),
(6, 'AVP Programs', 'Alternative to violence peace trainings (AVP) for the community members.', '2024-10-21', 'disable'),
(7, 'Tenure security', 'Land rights and tenure security (CCROs) capacity building to community especially women, youth and leadership forums.', '2024-11-01', 'enable'),
(9, 'Education', 'Mobilizing community groups in a service network of savings and loans for community based microfinance', '2024-10-22', 'enable'),
(10, 'Microfinance', 'Vicoba seminar at chifu kingalu Smora Hall', '2024-10-25', 'enable'),
(12, 'Michezo', 'Michezo kwa afya ya mwanadamu', '2024-11-01', 'enable'),
(13, 'School Clubs', 'Linkages and collaboration with like minded organization .', '2024-11-23', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_title` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL,
  `gallery_description` varchar(500) NOT NULL,
  `gallery_photo` varchar(500) NOT NULL,
  `gallery_status` enum('enable','disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_title`, `category_id`, `gallery_description`, `gallery_photo`, `gallery_status`) VALUES
(13, 'Women Empowement', 11, 'Women empowerment activities such as sports, theatre, career development and drug abuse training, as well as building overall awareness and engagement through youth group projects..', '../gallery/gallery-20241122_141744.jpeg', 'enable'),
(14, 'School Clubs', 14, 'Establishment of environment and land rights school clubs,Programmes for cultural exchange, Community library for reading, borrowing and exchange of ideas.', '../gallery/gallery-20241122_144124.jpeg', 'enable'),
(15, 'Microfinance', 10, 'VICOBA Empowerment to all youth in the community.', '../gallery/gallery-20241122_144834.jpeg', 'enable'),
(16, 'Personal Hygiene', 12, 'Training youth and girls on usafi wa mwili.', '../gallery/gallery-20241122_144956.jpeg', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `prog_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `prog_name` varchar(500) NOT NULL,
  `prog_description` varchar(500) NOT NULL,
  `prog_status` enum('enable','disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`prog_id`, `category_id`, `prog_name`, `prog_description`, `prog_status`) VALUES
(2, 10, 'Ujasiriamali', 'Vijana kujihusidha na shughuli za ujasilimamali kama ilivyo ada kwa watu wetu.', 'enable'),
(4, 10, 'Financial', 'Linkages and collaboration with like minded organization .', 'enable'),
(7, 8, 'AVP Programs', 'Alternative to violence peace trainings (AVP) for the community members.', 'enable'),
(11, 10, 'Microfinance', 'Alternative to violence peace trainings (AVP) for the community members.', 'enable'),
(12, 11, 'Women and Men', 'Alternative to violence peace trainings (AVP) for the community members.', 'enable'),
(14, 6, 'School Clubs ', 'Establishment of environment and land rights school clubs,Programmes for cultural exchange, Community library for reading, borrowing and exchange of ideas. ', 'enable'),
(16, 9, 'Disability empowerment', 'Disability Establishment of environment and land rights school clubs, Programme for cultural exchange, Community library for reading, borrowing and exchange of idea.', 'enable'),
(20, 10, 'Youth Enterprenuership program', 'Youth empowerment', 'disable');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `slide_id` int(11) NOT NULL,
  `slide_title` varchar(500) NOT NULL,
  `slide_description` varchar(500) NOT NULL,
  `slide_status` enum('enable','disable') NOT NULL,
  `slide_photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`slide_id`, `slide_title`, `slide_description`, `slide_status`, `slide_photo`) VALUES
(14, 'Women and Men', 'Use of volunteers’ services from local communities and use of influential traditional leaders (women and men).', 'enable', '../slides/slide-20241020_004634.jpeg'),
(19, 'School Clubs', 'Establishment of environment and land rights school clubs,Programmes for cultural exchange, Community library for reading, borrowing and exchange of ideas.', 'enable', '../slides/slide-20241026_183637.jpeg'),
(22, 'Empowerment', 'Youth empowerment activities such as sports, theatre, career development and drug abuse training, as well as building overall awareness and engagement through youth group projects.', 'disable', '../slides/slide-20241031_002026.jpeg'),
(23, 'Human Diseases', 'HIV & AIDS, Malaria and TB awareness, counseling, support innovative programmes in orphans and vulnerable children and home based health care (HBC) for the HIV affected.', 'disable', '../slides/slide-20241119_141139.jpeg'),
(24, 'Volunteers', 'A volunteer program deploying of volunteers and places villagers in groups charged with specific community tasks in relation to their skills.', 'enable', '../slides/slide-20241121_172726.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(500) NOT NULL,
  `staff_email` varchar(500) NOT NULL,
  `staff_password` varchar(500) NOT NULL,
  `staff_ability` enum('No','Yes') NOT NULL,
  `staff_title` varchar(500) NOT NULL,
  `staff_photo` varchar(500) NOT NULL,
  `staff_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_email`, `staff_password`, `staff_ability`, `staff_title`, `staff_photo`, `staff_status`) VALUES
(29, 'William Tangwa', 'williamtangwa95@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Yes', 'Program Officer', '../staff/user-20241030_231403.jpeg', 'active'),
(34, 'Catherine Peter', 'cathe@gmail.com', 'bbc1381a070e4864960b715e74ddeee2', 'No', 'Finance & admin officer', '../staff/user-20241101_141204.png', 'active'),
(35, 'Alex Kasele', 'akasele@gmail.com', '3a650419be21533e570844d2593c5ae9', 'Yes', 'Executive Director', '../staff/user-20241101_222117.png', 'active'),
(36, 'Joyce Dean', 'jdean7@gmail.com', '45a04f0c6130246c111d1ece5027738f', 'No', 'Secretary', '../staff/user-20241111_160120.png', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `sub_id` int(11) NOT NULL,
  `sub_email` varchar(500) NOT NULL,
  `sub_status` enum('active','inactive') NOT NULL,
  `sub_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`sub_id`, `sub_email`, `sub_status`, `sub_date`) VALUES
(1, 'williamtangwa95@gmail.com', 'inactive', '2024-10-26 19:00:10'),
(2, 'kaselebration368@gmail.com', 'inactive', '2024-10-26 19:02:49'),
(3, 'akasele@gmail.com', 'inactive', '2024-10-26 19:03:08'),
(4, 'medsonmalongo@gmail.com', 'inactive', '2024-10-26 19:03:29'),
(5, 'kaselebration368@gmail.com', 'inactive', '2024-10-26 19:05:00'),
(6, 'akasele@gmail.com', 'inactive', '2024-10-26 19:11:04'),
(7, 'medsonmalongo@gmail.com', 'inactive', '2024-10-26 19:11:38'),
(8, 'williamtangwa95@gmail.com', 'inactive', '2024-10-27 00:40:36'),
(9, 'akasele@gmail.com', 'inactive', '2024-10-27 00:43:45'),
(10, 'cathe@gmail.com', 'inactive', '2024-10-27 00:44:02'),
(11, 'medsonmalongo@gmail.com', 'inactive', '2024-10-27 01:01:01'),
(12, 'cathe@gmail.com', 'inactive', '2024-10-27 01:01:13'),
(13, 'kaselebration368@gmail.com', 'inactive', '2024-10-27 01:01:47'),
(14, 'cathe@gmail.com', 'inactive', '2024-10-27 01:02:02'),
(15, 'williamtangwa95@gmail.com', 'inactive', '2024-10-27 01:02:15'),
(16, 'akasele@gmail.com', 'inactive', '2024-10-27 01:02:22'),
(17, 'akasele@gmail.com', 'inactive', '2024-10-27 01:02:37'),
(18, 'cathe@gmail.com', 'inactive', '2024-10-27 01:02:48'),
(19, 'williamtangwa95@gmail.com', 'inactive', '2024-10-27 01:07:47'),
(20, 'kaselebration368@gmail.com', 'inactive', '2024-10-27 01:08:01'),
(21, 'akasele@gmail.com', 'inactive', '2024-10-27 01:08:12'),
(22, 'saleh7@gmail.com', 'inactive', '2024-10-27 01:14:01'),
(23, 'kaselebration368@gmail.com', 'inactive', '2024-10-27 01:14:16'),
(24, 'cathe@gmail.com', 'inactive', '2024-10-27 01:16:28'),
(25, 'williamtangwa95@gmail.com', 'inactive', '2024-10-27 01:16:46'),
(26, 'kaselebration368@gmail.com', 'inactive', '2024-10-27 01:26:10'),
(27, 'akasele@gmail.com', 'inactive', '2024-10-27 01:26:24'),
(28, 'akasele@gmail.com', 'inactive', '2024-10-27 01:34:15'),
(29, 'medsonmalongo@gmail.com', 'inactive', '2024-10-27 01:34:27'),
(30, 'cathe@gmail.com', 'inactive', '2024-10-27 01:35:41'),
(31, 'williamtangwa95@gmail.com', 'inactive', '2024-10-28 19:57:52'),
(32, 'williamtangwa95@gmail.com', 'inactive', '2024-10-28 19:58:05'),
(33, 'cathe@gmail.com', 'inactive', '2024-10-28 19:58:14'),
(34, 'williamtangwa95@gmail.com', 'inactive', '2024-10-31 01:46:40'),
(35, 'grace@gmail.com', 'inactive', '2024-10-31 09:30:05'),
(36, 'williamtangwa95@gmail.com', 'inactive', '2024-11-06 11:00:03'),
(37, 'kaselebration368@gmail.com', 'inactive', '2024-11-06 11:52:35'),
(38, 'williamtangwa95@gmail.com', 'active', '2024-11-20 17:59:25'),
(39, 'kaselebration368@gmail.com', 'active', '2024-11-20 17:59:35'),
(40, 'williamtangwa95@gmail.com', 'active', '2024-11-21 10:49:16'),
(41, 'grace@gmail.com', 'active', '2024-11-22 21:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `voluntary`
--

CREATE TABLE `voluntary` (
  `voluntary_id` int(11) NOT NULL,
  `voluntary_fullname` varchar(500) NOT NULL,
  `voluntary_email` varchar(500) NOT NULL,
  `voluntary_phone` varchar(500) NOT NULL,
  `voluntary_subject` varchar(500) NOT NULL,
  `voluntary_message` varchar(500) NOT NULL,
  `voluntary_attachment` varchar(500) NOT NULL,
  `voluntary_date` date NOT NULL,
  `voluntary_status` enum('new','opened') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voluntary`
--

INSERT INTO `voluntary` (`voluntary_id`, `voluntary_fullname`, `voluntary_email`, `voluntary_phone`, `voluntary_subject`, `voluntary_message`, `voluntary_attachment`, `voluntary_date`, `voluntary_status`) VALUES
(9, 'Salma Juma', 'salma@gmail.com', '0741688652', 'Gender issue', 'Pleae receive application\r\nRequest for voluntary, Fill the application form below.\r\nThanks', '../attachments/attachments-20241023_030355.pdf', '2024-10-23', 'opened'),
(10, 'William Tangwa', 'williamtangwa95@gmail.com', '0678429492', 'IT VOLUNTEER', 'Shalom.\r\nPlease receive application for IT Volunteer.\r\nThanks be blessed.', '../attachments/attachments-20241023_031540.pdf', '2024-10-23', 'opened'),
(11, 'William', 'williamtangwa95@gmail.com', '0678429492', 'Ict service', 'kjvhjcjhcvhcvh', '../attachments/attachments-20241023_042537.pdf', '2024-10-23', 'opened'),
(12, 'William', 'williamtangwa95@gmail.com', '0678429492', 'IT VOLUNTEER', 'Please receive volunteer application as mention above.\r\nThanks ', '../attachments/attachments-20241025_100025.pdf', '2024-10-25', 'opened'),
(14, 'William', 'williamtangwa95@gmail.com', '0678429492', 'Ict service', 'ok', '../attachments/attachments-20241027_013214.pdf', '2024-10-27', 'opened'),
(15, 'William Tangwa', 'williamtangwa95@gmail.com', '0621462229', 'Ict service', 'Please receive, Thank you.', '../attachments/attachments-20241031_092141.pdf', '2024-10-31', 'opened'),
(16, 'Grace Juma', 'grace@gmail.com', '0768112233', 'Ict service', 'Please receive my application. \r\nThank you.', '../attachments/attachments-20241031_092308.pdf', '2024-10-31', 'opened'),
(17, 'PENINA ZABRON', 'penina7@gmail.com', '0628657730', 'IT VOLUNTEER', 'Please receive my application based on my IT career.\r\nThank you so much.', '../attachments/attachments-20241119_135216.pdf', '2024-11-19', 'opened'),
(18, 'William Tangwa', 'williamtangwa95@gmail.com', '0621462229', 'IT VOLUNTEER', 'Request for volunteer.', '../attachments/attachments-20241121_173005.pdf', '2024-11-21', 'new'),
(19, 'Alex Kasele', 'akasele@gmail.com', '0718917408', 'Ict service', 'Please receive my application.\r\nThank you.', '../attachments/attachments-20241121_173204.pdf', '2024-11-21', 'new');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`events_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`prog_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `voluntary`
--
ALTER TABLE `voluntary`
  ADD PRIMARY KEY (`voluntary_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `events_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `voluntary`
--
ALTER TABLE `voluntary`
  MODIFY `voluntary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
