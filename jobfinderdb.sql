-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 05:58 PM
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
('info@tesla.com', 'tesla123', 16);

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
(22, 'Microsoft', 'images/microsoft.png', 'Redmond, Washington', 'https://www.microsoft.com/', 'Microsoft Corporation is an American multinational technology company that produces, licenses, and sells computer software, consumer electronics', 'info@microsoft.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
