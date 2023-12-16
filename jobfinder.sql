-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 17 déc. 2023 à 00:09
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jobfinder`
--

-- --------------------------------------------------------

--
-- Structure de la table `company`
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
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id_company`, `company_name`, `company_picture`, `location`, `website`, `about_company`, `contact_email`) VALUES
(1, 'Apple Inc.', 'images/apple.png', 'Cupertino, California', 'https://www.apple.com/', 'Apple Inc. is an American multinational technology company that designs, manufactures, and markets consumer electronics, computer software, and online services.', 'info@apple.com'),
(2, 'Google Inc.', 'images/google.png', 'Mountain View, California', 'https://abc.xyz/', 'Alphabet Inc. is the parent company of Google, involved in various technology-related businesses, including internet search, online advertising, and cloud computing.', 'info@google.com'),
(3, 'Tesla Inc.', 'images/tesla.png', 'Palo Alto, California', 'https://www.tesla.com/', 'Tesla Inc. is an American electric vehicle and clean energy company known for its electric cars, solar energy products, and energy storage solutions.', 'info@tesla.com'),
(4, 'Facebook, Inc.', 'images/facebook.png', 'Menlo Park, California', 'https://www.facebook.com/', 'Facebook, Inc. is a social media and technology company that focuses on social networking services and products.', 'info@facebook.com'),
(6, 'IBM (International Business Machines Corporation)', 'images/ibmm.png', 'Armonk, New York', 'https://www.ibm.com/', 'IBM is a global technology and consulting company that offers a range of products and services, including hardware, software, and cloud computing.', 'info@ibm.com'),
(7, 'Cisco Systems, Inc.', 'images/ciscoo.png', 'San Jose, California', 'https://www.cisco.com/', 'Cisco Systems, Inc. is a multinational technology conglomerate that designs, manufactures, and sells networking hardware, software, and telecommunications equipment.', 'info@cisco.com'),
(8, 'Oracle Corporation', 'images/oraclee.png', 'Redwood City, California', 'https://www.oracle.com/', 'Oracle Corporation is a global computer technology corporation specializing in database management systems, cloud services, and enterprise software.', 'info@oracle.com'),
(9, 'NASA (National Aeronautics and Space Administration)', 'images/nasaa.png', 'Washington, D.C.', 'https://www.nasa.gov/', 'NASA is the United States government agency responsible for the civilian space program, aeronautics research, and aerospace exploration.', 'info@nasa.gov'),
(10, 'Microsoft', 'images/microsoft.png', 'Redmond, Washington', 'https://www.microsoft.com/', 'Microsoft Corporation is an American multinational technology company that produces, licenses, and sells computer software, consumer electronics, and personal computers.', 'info@microsoft.com');

-- --------------------------------------------------------

--
-- Structure de la table `jobs_table`
--

CREATE TABLE `jobs_table` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `full_time` enum('Full Time','Part Time') NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `brief_info` text DEFAULT NULL,
  `job_description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `jobType` enum('Hybrid','On Site','Remote') NOT NULL,
  `posted_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_company` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jobs_table`
--

INSERT INTO `jobs_table` (`job_id`, `job_name`, `full_time`, `salary`, `brief_info`, `job_description`, `requirements`, `jobType`, `posted_time`, `id_company`) VALUES
(1, 'Software Engineer', 'Full Time', 12000.00, 'Exciting opportunity for a skilled software engineer to join our innovative team.', 'Develop and maintain software applications for various platforms.', 'Bachelor\'s degree in Computer Science, proficiency in programming languages (e.g., Java, Swift), problem-solving skills.', 'Hybrid', '2023-12-16 20:36:10', 1),
(2, 'Marketing Specialist', 'Part Time', 15000.00, 'Part-time position for a creative marketing specialist to contribute to our marketing campaigns.', 'Plan and execute marketing strategies, create engaging content, and analyze campaign performance.', 'Bachelor\'s degree in Marketing, experience with social media platforms, strong communication skills.', 'Remote', '2023-12-16 20:36:10', 1),
(3, 'Machine Learning Engineer', 'Full Time', 28000.00, 'Join our team as a machine learning engineer and work on cutting-edge projects.', 'Design, implement, and deploy machine learning models, collaborate with cross-functional teams.', 'Master\'s or Ph.D. in Computer Science, strong background in machine learning, proficiency in Python and TensorFlow.', 'On Site', '2023-12-16 20:36:10', 2),
(4, 'Customer Support Specialist', 'Full Time', 18000.00, 'Exciting opportunity for a customer-focused individual to join our support team.', 'Provide excellent customer support, troubleshoot issues, and escalate complex cases.', 'Bachelor\'s degree, customer service experience, excellent communication skills.', 'Hybrid', '2023-12-16 20:36:10', 2),
(5, 'Electrical Engineer', 'Full Time', 25000.00, 'Seeking an electrical engineer to contribute to the development of electric vehicle technologies.', 'Design and optimize electrical systems, collaborate with cross-functional teams.', 'Bachelor\'s or Master\'s in Electrical Engineering, experience with electric vehicle systems.', 'On Site', '2023-12-16 20:36:10', 3),
(6, 'Environmental Sustainability Analyst', 'Part Time', 32000.00, 'Join our sustainability team and contribute to environmental initiatives.', 'Analyze environmental data, recommend sustainable practices, and support green initiatives.', 'Bachelor\'s degree in Environmental Science, experience in sustainability analysis.', 'Remote', '2023-12-16 20:36:10', 3),
(7, 'Data Scientist', 'Part Time', 30000.00, 'Exciting opportunity for a data scientist to work on impactful projects.', 'Develop and implement data models, analyze large datasets, and present insights.', 'Master\'s or Ph.D. in Data Science or related field, proficiency in programming languages (e.g., Python, R).', 'Remote', '2023-12-16 20:36:10', 4),
(8, 'Content Moderator', 'Full Time', 12000.00, 'Part-time position for a content moderator to ensure a safe and positive user experience.', 'Review and moderate user-generated content, enforce community guidelines.', 'High school diploma, strong attention to detail, ability to handle sensitive content.', 'Hybrid', '2023-12-16 20:36:10', 4),
(11, 'Software Developer', 'Full Time', 27000.00, 'Exciting opportunity for a skilled software developer to contribute to cutting-edge projects.', 'Develop and maintain software applications, collaborate with cross-functional teams.', 'Bachelor\'s or Master\'s in Computer Science, proficiency in programming languages (e.g., Java, C++), problem-solving skills.', 'Hybrid', '2023-12-16 20:36:10', 6),
(12, 'Cloud Solutions Architect', 'Full Time', 32000.00, 'Join our cloud services team and design innovative solutions for our clients.', 'Architect and implement cloud solutions, provide technical expertise.', 'Bachelor\'s or Master\'s in Computer Science, experience in cloud architecture, certifications in cloud platforms (e.g., AWS, Azure).', 'Remote', '2023-12-16 20:36:10', 6),
(13, 'Network Security Engineer', 'Full Time', 30000.00, 'Exciting opportunity for a network security engineer to contribute to the security of our systems.', 'Design and implement network security measures, conduct security audits.', 'Bachelor\'s or Master\'s in Cybersecurity or related field, Cisco certification (e.g., CCNP), experience in network security.', 'On Site', '2023-12-16 20:36:10', 7),
(14, 'Technical Support Specialist', 'Full Time', 18000.00, 'Join our technical support team and assist customers with their technical inquiries.', 'Provide excellent technical support, troubleshoot hardware and software issues.', 'Bachelor\'s degree in Information Technology, strong problem-solving skills, excellent communication skills.', 'Remote', '2023-12-16 20:36:10', 7),
(15, 'Database Administrator', 'Part Time', 25000.00, 'Exciting opportunity for a database administrator to manage and optimize databases.', 'Administer and maintain databases, implement security measures.', 'Bachelor\'s or Master\'s in Database Management or related field, experience with database administration, knowledge of SQL.', 'Hybrid', '2023-12-16 20:36:10', 8),
(16, 'Cloud Solutions Consultant', 'Part Time', 32000.00, 'Join our cloud services team and provide consultancy on cloud solutions to clients.', 'Assess client requirements, design and implement cloud solutions.', 'Bachelor\'s or Master\'s in Computer Science, experience in cloud consulting, certifications in cloud platforms (e.g., AWS, Oracle Cloud).', 'On Site', '2023-12-16 20:36:10', 8),
(17, 'Aerospace Engineer', 'Part Time', 35000.00, 'Exciting opportunity for an aerospace engineer to work on groundbreaking space projects.', 'Design and analyze aerospace systems, collaborate with scientists and engineers.', 'Bachelor\'s or Master\'s in Aerospace Engineering, experience in spacecraft design, knowledge of industry standards.', 'On Site', '2023-12-16 20:36:10', 9),
(18, 'Data Scientist - Space Exploration', 'Part Time', 30000.00, 'Join our space exploration team as a data scientist and contribute to data-driven insights.', 'Analyze space exploration data, develop algorithms, and present findings.', 'Master\'s or Ph.D. in Data Science or related field, experience in space data analysis, proficiency in programming languages (e.g., Python).', 'Remote', '2023-12-16 20:36:10', 9),
(19, 'Software Engineer', 'Full Time', 120000.00, NULL, NULL, NULL, 'Hybrid', '2023-12-16 09:00:00', 10),
(20, 'Product Manager', 'Full Time', 130000.00, NULL, NULL, NULL, 'Remote', '2023-12-16 10:30:00', 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Index pour la table `jobs_table`
--
ALTER TABLE `jobs_table`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `id_company` (`id_company`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `jobs_table`
--
ALTER TABLE `jobs_table`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `jobs_table`
--
ALTER TABLE `jobs_table`
  ADD CONSTRAINT `jobs_table_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
