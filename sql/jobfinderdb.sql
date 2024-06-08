-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 02:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobfinderdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`email`, `password`, `id_company`) VALUES
('info@apple.com', 'apple123', 14),
('info@cisco.com', 'cisco123', 19),
('info@facebook.com', 'facebook123', 17),
('info@google.com', 'google123', 15),
('info@ibm.com', 'ibm123', 18),
('info@microsoft.com', 'microsoft123', 22),
('info@nasa.gov', 'nasa123', 21),
('info@oracle.com', 'oracle123', 20),
('info@tesla.com', 'tesla123', 16),
('info@x.com', 'x123', 34);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_picture` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `about_company` text DEFAULT NULL,
  `contact_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `company_name`, `company_picture`, `location`, `website`, `about_company`, `contact_email`) VALUES
(14, 'Apple Inc.', 'assets/images/apple.png', 'Cupertino, California', 'https://www.apple.com/', 'Apple Inc. is an American multinational technology company that designs, manufactures, and markets consumer electronics, computer software, and online\r\nservices.', 'info@apple.com'),
(15, ' Google Inc.', 'assets/images/google.png', 'Mountain View, California', 'https://abc.xyz/', 'Alphabet Inc. is the parent company of Google, involved in various technology related businesses, including internet search, online advertising, and cloud computing.', 'info@google.com'),
(16, 'Tesla Inc.', 'assets/images/tesla.png', 'Palo Alto, California', 'https://www.tesla.com/', 'Tesla Inc. is an American electric vehicle and clean energy company known for its electric cars, solar energy products, and energy storage solutions.', 'info@tesla.com'),
(17, ' Facebook, Inc.', 'assets/images/facebook.png', 'Menlo Park, California', 'https://www.facebook.com/', 'Facebook, Inc. is a social media and technology company that focuses on social networking services and products.', 'info@facebook.com'),
(18, 'IBM (International Business Machines Corporation)', 'assets/images/ibm.png', 'Armonk, New York', 'https://www.ibm.com/', 'IBM is a global technology and consulting company that offers a range of products and services, including hardware, software, and cloud computing.\r\n', 'info@ibm.com'),
(19, 'Cisco Systems, Inc.', 'assets/images/cisco.png', 'San Jose, California', 'https://www.cisco.com/', 'Cisco Systems, Inc. is a multinational technology conglomerate that designs, manufactures, and sells networking hardware, software, and telecommunications equipment.\r\n', 'info@cisco.com'),
(20, 'Oracle Corporation', 'assets/images/oracle.png', 'Redwood City, California', 'https://www.oracle.com/', 'Oracle Corporation is a global computer technology corporation specializing in database management systems, cloud services, and enterprise software.\r\n', 'info@oracle.com'),
(21, 'NASA (National Aeronautics and Space Administration)', 'assets/images/nasa.png', 'Washington, D.C.', 'https://www.nasa.gov/', 'NASA is the United States government agency responsible for the civilian space program, aeronautics research, and aerospace exploration.', 'info@nasa.gov'),
(22, 'Microsoft', 'assets/images/microsoft.png', 'Redmond, Washington', 'https://www.microsoft.com/', 'Microsoft Corporation is an American multinational technology company that produces, licenses, and sells computer software, consumer electronics', 'info@microsoft.com'),
(34, 'X inc.', 'assets/images/F1x5VdQX0AA9Sgt.jpeg', 'Mohammedia, Morocco', 'x.com', 'test', 'info@x.com');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_table`
--

CREATE TABLE `jobs_table` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `full_time` varchar(25) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `brief_info` varchar(255) DEFAULT NULL,
  `job_description` text DEFAULT NULL,
  `jobType` varchar(50) DEFAULT NULL,
  `posted_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs_table`
--

INSERT INTO `jobs_table` (`job_id`, `job_name`, `full_time`, `salary`, `brief_info`, `job_description`, `jobType`, `posted_time`, `id_company`) VALUES
(1, 'Software Engineer', 'Full-time', 120000.00, 'Exciting opportunity for a skilled software engineer.', 'We are looking for a talented software engineer to join our team and contribute to cutting-edge projects.', 'On-site', '2024-01-09 22:32:52', 14),
(2, 'Marketing Specialist', 'Part-time', 90000.00, 'Join our dynamic marketing team.', 'We are seeking a creative and motivated marketing specialist to help promote our products.', 'Remote', '2024-01-09 22:32:52', 14),
(3, 'Data Scientist', 'Full-time', 130000.00, 'Exciting opportunity in data science.', 'We are seeking a skilled data scientist to analyze and interpret complex datasets.', 'Hybrid', '2024-01-09 22:32:52', 15),
(4, 'UX Designer', 'Part-time', 95000.00, 'Join our user experience design team.', 'We are looking for a creative and detail-oriented UX designer to enhance our product interfaces.', 'On-site', '2024-01-09 22:32:52', 15),
(5, 'Electrical Engineer', 'Full-time', 110000.00, 'Exciting opportunity to work on electric vehicles.', 'We are hiring electrical engineers to contribute to the development of innovative electric cars.', 'Remote', '2024-01-09 22:32:52', 16),
(6, 'Solar Energy Analyst', 'Full-time', 85000.00, 'Join our clean energy team.', 'We are seeking a solar energy analyst to analyze and optimize solar energy systems.', 'On-site', '2024-01-09 22:32:52', 16),
(7, 'Software Developer', 'Part-time', 100000.00, 'Exciting opportunity for a software developer.', 'We are looking for a skilled software developer to contribute to our social media platforms.', 'Remote', '2024-01-09 22:32:52', 17),
(8, 'Digital Marketing Manager', 'Full-time', 95000.00, 'Join our marketing team.', 'We are seeking a digital marketing manager to lead online advertising campaigns.', 'Hybrid', '2024-01-09 22:32:52', 17),
(9, 'Cloud Solutions Architect', 'Part-Time', 120000.00, 'Exciting opportunity in cloud computing.', 'We are hiring a cloud solutions architect to design and implement scalable cloud solutions.', 'On-site', '2024-01-09 22:32:52', 18),
(10, 'Data Analyst', 'Full-time', 90000.00, 'Join our data analytics team.', 'We are seeking a data analyst to analyze and interpret business data for informed decision-making.', 'Remote', '2024-01-09 22:32:52', 18),
(11, 'Network Engineer', 'Full-time', 110000.00, 'Exciting opportunity in networking.', 'We are hiring a network engineer to design and implement network solutions.', 'Remote', '2024-01-09 22:32:52', 19),
(12, 'Cybersecurity Specialist', 'Full-time', 100000.00, 'Join our cybersecurity team.', 'We are seeking a cybersecurity specialist to protect our network and systems.', 'On-site', '2024-01-09 22:32:52', 19),
(13, 'Database Administrator', 'Part-time', 95000.00, 'Exciting opportunity in database management.', 'We are looking for a skilled database administrator to manage and optimize databases.', 'Hybrid', '2024-01-09 22:32:52', 20),
(14, 'Software Sales Representative', 'Full-time', 85000.00, 'Join our sales team.', 'We are seeking a software sales representative to promote and sell our enterprise software solutions.', 'On-site', '2024-01-09 22:32:52', 20),
(15, 'Aerospace Engineer', 'Full-time', 130000.00, 'Exciting opportunity in aerospace engineering.', 'We are hiring aerospace engineers to contribute to space exploration projects.', 'Remote', '2024-01-09 22:32:52', 21),
(16, 'Data Scientist', 'Part-time', 100000.00, 'Join our data science team.', 'We are seeking a data scientist to analyze and interpret data for aerospace research.', 'On-site', '2024-01-09 22:32:52', 21),
(17, 'Software Development Engineer', 'Part-time', 120000.00, 'Exciting opportunity for a software development engineer.', 'We are looking for a skilled software development engineer to work on cutting-edge projects.', 'Hybrid', '2024-01-09 22:32:52', 22),
(18, 'Product Manager', 'Full-time', 110000.00, 'Join our product management team.', 'We are seeking a product manager to lead product development and strategy.', 'On-site', '2024-01-09 22:32:52', 22),
(21, 'Data Analyst', 'Full-time', 70000.00, 'test', 'test', 'Hybrid', '2024-01-10 08:35:03', 14);

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE `job_seeker` (
  `id_seeker` int(11) NOT NULL,
  `seeker_mail` varchar(255) NOT NULL,
  `seeker_name` varchar(255) NOT NULL,
  `seeker_gender` enum('male','female') NOT NULL,
  `seeker_dob` date DEFAULT NULL,
  `seeker_phone` varchar(20) NOT NULL,
  `seeker_diplome` varchar(50) NOT NULL,
  `seeker_experience` varchar(50) NOT NULL,
  `seeker_skills` text NOT NULL,
  `seeker_coverletter` text NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`id_seeker`, `seeker_mail`, `seeker_name`, `seeker_gender`, `seeker_dob`, `seeker_phone`, `seeker_diplome`, `seeker_experience`, `seeker_skills`, `seeker_coverletter`, `job_id`, `applied_at`) VALUES
(13, 'med.ameez02@gmail.com', 'AMEZIANE Mohamed', 'male', '2002-10-21', '0677777777', 'diploma2', 'experience2', 'test', 'test', 2, '2024-01-10 08:33:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`email`),
  ADD KEY `company_fk` (`id_company`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `jobs_table`
--
ALTER TABLE `jobs_table`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `jobs_table_ibfk_1` (`id_company`);

--
-- Indexes for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD PRIMARY KEY (`id_seeker`),
  ADD KEY `job_id` (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `jobs_table`
--
ALTER TABLE `jobs_table`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `job_seeker`
--
ALTER TABLE `job_seeker`
  MODIFY `id_seeker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `company_fk` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs_table`
--
ALTER TABLE `jobs_table`
  ADD CONSTRAINT `jobs_table_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD CONSTRAINT `job_seeker_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs_table` (`job_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
