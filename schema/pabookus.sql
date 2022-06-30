-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 04:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pabookus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bio`
--

CREATE TABLE `bio` (
  `bio_id` int(12) NOT NULL,
  `website_name` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(12) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(12) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `schedule_id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `fullname`, `email`, `password`, `contact`, `address`, `birthdate`, `schedule_id`) VALUES
(2, 'me me', 'me@me.me', 'meme', NULL, NULL, NULL, NULL),
(3, 'aaa aaaa', 'aaa@aa.a', 'aaa', '09194691080', NULL, '2000-07-22', NULL),
(4, NULL, 'ian@sisan.te', 'asd', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(12) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(12) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `industry` varchar(50) DEFAULT NULL,
  `owner` varchar(100) DEFAULT NULL,
  `founding_date` date DEFAULT NULL,
  `bio_id` int(12) DEFAULT NULL,
  `link_id` int(12) DEFAULT NULL,
  `schedule_id` int(12) DEFAULT NULL,
  `review_id` int(12) DEFAULT NULL,
  `services_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `email`, `password`, `contact`, `address`, `industry`, `owner`, `founding_date`, `bio_id`, `link_id`, `schedule_id`, `review_id`, `services_id`) VALUES
(1, 'Kyle\'s Salon', 'kylesalon@mail.me', '111', '09199991111', 'Pasay City?', '2', 'KyleRaiden', '1943-06-24', NULL, NULL, NULL, NULL, 'company1_service'),
(5, 'Ian Sisante BusinessGe                            ', 'ian.sisante@tup.edu.ph', '111', '09001110000', '443 Sitio Acacia, Malainen Bago., Naic, Cavite, 4110, Philippines, Asia, Earth, MilkyWay Galaxy, Universe', '8', 'Ian Sisante', '2022-06-01', NULL, NULL, NULL, NULL, 'company5_service'),
(6, 'Piri tuts', 'pirituts@mail.me', '111', '87000', 'Bacoor, Cavite', '5', 'Piri Bustarde', '2022-07-22', NULL, NULL, NULL, NULL, 'company6_service'),
(10, 'Kim Salon', 'kim@ber.ley', '123', '09198883333', 'Pasay', '1', 'Kim Delgado', '2022-06-22', NULL, NULL, NULL, NULL, 'company10_service'),
(11, 'AlexYoga', 'alex@min.on', '321', '091234561234', 'Somewhere', '9', 'Alex Minon', '2022-06-23', NULL, NULL, NULL, NULL, 'company11_service');

-- --------------------------------------------------------

--
-- Table structure for table `company1_service`
--

CREATE TABLE `company1_service` (
  `name` varchar(50) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `id` int(9) NOT NULL,
  `duration` int(4) NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company5_service`
--

CREATE TABLE `company5_service` (
  `name` varchar(50) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `id` int(9) NOT NULL,
  `duration` int(4) NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company5_service`
--

INSERT INTO `company5_service` (`name`, `price`, `id`, `duration`, `slot`) VALUES
('Training', 100, 9, 60, 3),
('Sparring', 200, 11, 30, 4),
('Advisor', 50, 12, 15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `company6_service`
--

CREATE TABLE `company6_service` (
  `name` varchar(50) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `id` int(9) NOT NULL,
  `duration` int(4) NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company6_service`
--

INSERT INTO `company6_service` (`name`, `price`, `id`, `duration`, `slot`) VALUES
('Guitar Tutorial', 234, 1, 10, 3),
('Headshot Tutorials', 99999, 2, 120, 1),
('How to get A+ on Japanese Proficiency Test', 500, 3, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `company10_service`
--

CREATE TABLE `company10_service` (
  `id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `duration` int(4) NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company10_service`
--

INSERT INTO `company10_service` (`id`, `name`, `price`, `duration`, `slot`) VALUES
(1, 'Serbisyong Totoo', 777, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `company11_service`
--

CREATE TABLE `company11_service` (
  `id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `duration` int(4) NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company11_service`
--

INSERT INTO `company11_service` (`id`, `name`, `price`, `duration`, `slot`) VALUES
(1, 'Home Service', 100, 0, 0),
(2, 'Coach', 800, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`, `category`) VALUES
(1, 'Beauty Salon', 1),
(1, 'Beauty Salon', 1),
(2, 'Hair Salon', 1),
(3, 'Nail Salon', 1),
(4, 'Massage and Body Treatments', 1),
(5, 'Tutorial Lessons', 2),
(6, 'Dental Clinic', 3),
(7, 'Medical Clinic', 3),
(8, 'Gyms', 4),
(9, 'Yoga Classes', 4),
(10, 'Fitness Classes', 4),
(11, 'Child Care', 5),
(12, 'Pet Services', 5),
(13, 'Auto Work Services', 5),
(14, 'Detailing Services', 5);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `link_id` int(12) NOT NULL,
  `website_name` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(12) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `review` decimal(2,0) NOT NULL,
  `client_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(12) NOT NULL,
  `company_id` int(12) NOT NULL,
  `booker_id` int(12) NOT NULL,
  `service_id` int(9) NOT NULL,
  `month` int(2) NOT NULL,
  `day` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `company_id`, `booker_id`, `service_id`, `month`, `day`, `year`, `status`) VALUES
(1, 5, 3, 9, 7, 22, 2022, 1),
(16, 6, 5, 2, 6, 17, 2022, 1),
(17, 6, 5, 2, 6, 16, 2022, 1),
(18, 5, 5, 9, 6, 21, 2022, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bio`
--
ALTER TABLE `bio`
  ADD PRIMARY KEY (`bio_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `client_schedule` (`schedule_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `company_bio` (`bio_id`),
  ADD KEY `company_link` (`link_id`),
  ADD KEY `company_schedule` (`schedule_id`),
  ADD KEY `company_review` (`review_id`);

--
-- Indexes for table `company1_service`
--
ALTER TABLE `company1_service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `company5_service`
--
ALTER TABLE `company5_service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `company6_service`
--
ALTER TABLE `company6_service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `company10_service`
--
ALTER TABLE `company10_service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `company11_service`
--
ALTER TABLE `company11_service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `review_client` (`client_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `schedule_company` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bio`
--
ALTER TABLE `bio`
  MODIFY `bio_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `company1_service`
--
ALTER TABLE `company1_service`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company5_service`
--
ALTER TABLE `company5_service`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `company6_service`
--
ALTER TABLE `company6_service`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company10_service`
--
ALTER TABLE `company10_service`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company11_service`
--
ALTER TABLE `company11_service`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `link_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_schedule` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_bio` FOREIGN KEY (`bio_id`) REFERENCES `bio` (`bio_id`),
  ADD CONSTRAINT `company_link` FOREIGN KEY (`link_id`) REFERENCES `links` (`link_id`),
  ADD CONSTRAINT `company_review` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`review_id`),
  ADD CONSTRAINT `company_schedule` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `review_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
