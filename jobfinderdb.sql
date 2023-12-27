-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 10:40 PM
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
('ana@zwin.com', 'ana@zwin.com', 28),
('info@apple.com', 'apple123', 14),
('info@cisco.com', 'cisco123', 19),
('info@facebook.com', 'facebook123', 17),
('info@google.com', 'google123', 15),
('info@ibm.com', 'ibm123', 18),
('info@jumia.ma', 'jumia123', 26),
('info@microsoft.com', 'microsoft123', 22),
('info@nasa.gov', 'nasa123', 21),
('info@nike.com', 'nike123', 27),
('info@oracle.com', 'oracle123', 20),
('info@tesla.com', 'tesla123', 16);

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
(14, 'Apple Inc.', 'images/apple.png', 'Cupertino, California', 'https://www.apple.com/', 'Apple Inc. is an American multinational technology company that designs, manufactures, and markets consumer electronics, computer software, and online\r\nservices.', 'info@apple.com'),
(15, ' Google Inc.', 'images/google.png', 'Mountain View, California', 'https://abc.xyz/', 'Alphabet Inc. is the parent company of Google, involved in various technology related businesses, including internet search, online advertising, and cloud computing.', 'info@google.com'),
(16, 'Tesla Inc.', 'images/tesla.png', 'Palo Alto, California', 'https://www.tesla.com/', 'Tesla Inc. is an American electric vehicle and clean energy company known for its electric cars, solar energy products, and energy storage solutions.', 'info@tesla.com'),
(17, ' Facebook, Inc.', 'images/facebook.png', 'Menlo Park, California', 'https://www.facebook.com/', 'Facebook, Inc. is a social media and technology company that focuses on social networking services and products.', 'info@facebook.com'),
(18, 'IBM (International Business Machines Corporation)', 'images/ibmm.png', 'Armonk, New York', 'https://www.ibm.com/', 'IBM is a global technology and consulting company that offers a range of products and services, including hardware, software, and cloud computing.\r\n', 'info@ibm.com'),
(19, 'Cisco Systems, Inc.', 'images/ciscoo.png', 'San Jose, California', 'https://www.cisco.com/', 'Cisco Systems, Inc. is a multinational technology conglomerate that designs, manufactures, and sells networking hardware, software, and telecommunications equipment.\r\n', 'info@cisco.com'),
(20, 'Oracle Corporation', 'images/oraclee.png', 'Redwood City, California', 'https://www.oracle.com/', 'Oracle Corporation is a global computer technology corporation specializing in database management systems, cloud services, and enterprise software.\r\n', 'info@oracle.com'),
(21, 'NASA (National Aeronautics and Space Administration)', 'images/nasaa.png', 'Washington, D.C.', 'https://www.nasa.gov/', 'NASA is the United States government agency responsible for the civilian space program, aeronautics research, and aerospace exploration.', 'info@nasa.gov'),
(22, 'Microsoft', 'images/microsoft.png', 'Redmond, Washington', 'https://www.microsoft.com/', 'Microsoft Corporation is an American multinational technology company that produces, licenses, and sells computer software, consumer electronics', 'info@microsoft.com'),
(23, 'hhh inc.', 'images/fi1.png', 'Armonk, New York', 'hhh.com', 'hhh', 'hhhh@gmail.com'),
(24, 'Jumia', 'images/fi1.png', 'Casablanca, Morocco', 'www.jumia.com', 'Jumia is a website where you can but everything you want.', 'info@jumia.ma'),
(25, 'Jumia', 'images/fi1.png', 'Casablanca, Morocco', 'https://www.jumia.com/', 'Jumia is a marketplace where you can buy whatever you want.', 'info@jumia.ma'),
(26, 'Jumia', 'images/fi1.png', 'Casablanca, Morocco', 'https://www.jumia.com/', 'Jumia is a marketplace where you can buy whatever you want.', 'info@jumia.ma'),
(27, 'Nike inc.', 'images/nike.png', 'Beaverton, Oregon, United States', 'https://www.nike.com/', 'Nike, Inc. is an American athletic footwear and apparel corporation headquartered near Beaverton, Oregon, United States. It is the world\'s largest supplier of athletic shoes and apparel and a major manufacturer of sports equipment, with revenue in excess of US$46 billion in its fiscal year 2022.', 'info@nike.com'),
(28, 'zwiinn', 'images/nasaa.png', 'dd', 'dd.com', 'ddd', 'ana@zwin.com');

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
(3, 'Software Developer', 'Full Time', 80000.00, 'Exciting opportunity for a Software Developer', 'We are looking for a skilled Software Developer...', 'Full Time', '2023-12-17 17:18:33', 14),
(4, 'test', 'Full Time', 100000.00, 'test', 'test', 'Full Time', '2023-12-19 13:01:45', 17),
(5, 'test', 'Full-time', 180000.00, 'test', 'testttttttttttttttttttttttttttttttttttttttttt', 'Hybrid', '2023-12-22 15:17:55', 26),
(6, 'Salal', 'Full-time', 10.00, 'test', 'testttttttttttttttttttttttttttttttttttttttttt', 'On-site', '2023-12-22 15:18:46', 26),
(7, 'test', 'Full-time', 3000.00, 'test', 'testttttttttttttttttttttttttttttt', 'Hybrid', '2023-12-22 15:21:45', 26),
(8, 'Marketing Analyst', 'Full-time', 150000.00, 'Marketing Analyst to work in Nike company.', 'We are seeking a highly motivated and analytical Marketing Analyst to join our dynamic marketing team. The ideal candidate will be responsible for gathering, analyzing, and interpreting data related to our marketing strategies and campaigns. The Marketing Analyst will play a crucial role in providing insights and recommendations to optimize our marketing efforts, drive business growth, and enhance overall performance.\\r\\n\\r\\nResponsibilities ------------------------------------------------------------------------------------------------------------------------------\\r\\n- Data Analysis : Collect, analyze, and interpret data from various sources, including customer behavior, market trends, and campaign performance. Utilize statistical techniques and tools to uncover meaningful insights and trends.\\r\\n- Campaign Evaluation : Evaluate the effectiveness of marketing campaigns, including ROI analysis, attribution modeling, and performance metrics. Provide actionable recommendations to improve campaign efficiency and effectiveness.\\r\\n- Market Research : Conduct market research to identify opportunities, market trends, and competitive landscape. Stay updated on industry developments and incorporate relevant findings into marketing strategies.\\r\\n- Reporting : Develop and maintain regular reports and dashboards to track key performance indicators (KPIs) and communicate results to stakeholders. Present findings and insights to cross-functional teams in a clear and concise manner.\\r\\n- A/B Testing : Design and implement A/B testing strategies to optimize marketing campaigns and website performance. Analyze test results and make data-driven recommendations for improvements.\\r\\n\\r\\nQualifications --------------------------------------------------------------------------------------------------------------------------------\\r\\n\\r\\n+ Education : Bachelor\\\'s degree in Marketing, Business, Statistics, or a related field. Advanced degree (Master\\\'s or MBA) is a plus.\\r\\n\\r\\n+ Experience : Proven experience as a Marketing Analyst or similar role, with a strong track record of data analysis and interpretation. Familiarity with marketing analytics tools and platforms (e.g., Google Analytics, Adobe Analytics, CRM systems).\\r\\n\\r\\n+ Analytical Skills : Strong quantitative and qualitative analytical skills, with the ability to turn data into actionable insights.\\r\\n\\r\\n+ Technical Skills : Proficiency in statistical analysis tools (e.g., R, Python, or similar). Advanced Excel skills and experience working with data visualization tools.\\r\\n\\r\\n+ Communication Skills : Excellent communication skills, both written and verbal. Ability to present complex data in a clear and understandable manner. Team Collaboration: Ability to collaborate effectively with cross-functional teams, including marketing, sales, and product teams.\\r\\n\\r\\n+ Adaptability : Ability to adapt to a fast-paced and dynamic work environment. Proactive in staying updated on industry trends and best practices.', 'On-site', '2023-12-22 17:49:06', 27),
(9, 'dd', 'Full-time', 20000.00, 'dddd', 'dddddddddddddddddddddddddddddddddddddd', 'Remote', '2023-12-24 12:18:22', 28);

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
  `seeker_resume_path` varchar(255) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`id_seeker`, `seeker_mail`, `seeker_name`, `seeker_gender`, `seeker_dob`, `seeker_phone`, `seeker_diplome`, `seeker_experience`, `seeker_skills`, `seeker_coverletter`, `seeker_resume_path`, `job_id`, `applied_at`) VALUES
(6, 'med.ameez02@gmail.com', 'Mohamed AMEZIANE', 'male', '2002-10-21', '0672720397', 'diploma3', 'experience2', 'C, Python, Machine Learning ...', 'Test Cover Letter...', 'resume_uploads/CV_AmezianeMohamed.pdf', 3, '2023-12-22 17:37:29'),
(7, 'ana@zwin.com', 'ana@zwin.com', 'male', '2024-01-05', '0672720397', 'diploma3', 'experience8', 'qwertyuio', 'qwertyu', 'resume_uploads/microsoft.png', 9, '2023-12-24 12:20:33');

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
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jobs_table`
--
ALTER TABLE `jobs_table`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_seeker`
--
ALTER TABLE `job_seeker`
  MODIFY `id_seeker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
