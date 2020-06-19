-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 11:58 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labours_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `phone`) VALUES
(1, 'admin@gmail.com', '123', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `claimed`
--

CREATE TABLE `claimed` (
  `claimed_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  `labour_id` int(10) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claimed`
--

INSERT INTO `claimed` (`claimed_id`, `job_id`, `labour_id`, `status`) VALUES
(1, 2, 1, 'Finished');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(10) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_pass` varchar(100) NOT NULL,
  `client_gender` varchar(100) NOT NULL,
  `client_phone` int(13) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_email`, `client_pass`, `client_gender`, `client_phone`, `image`, `status`) VALUES
(1, 'Sumaiya', 's@g.com', '12345', 'female', 1234, 'electrician.png', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'Electrician ', 'electrician.png'),
(2, 'Pickup-Delivery', 'pickup-delivery.png'),
(3, 'Tailor', 'tailor.png'),
(4, 'Cleaning', 'cleaner.png'),
(5, 'Handyman', 'handyman.png'),
(6, 'Plumber', 'plumber.png'),
(7, 'Painter', 'painter.png');

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `job_id` int(10) NOT NULL,
  `job_name` varchar(100) NOT NULL,
  `job_description` varchar(100) NOT NULL,
  `job_date` date NOT NULL,
  `job_location` varchar(100) NOT NULL,
  `job_packages` varchar(100) NOT NULL,
  `job_budget` varchar(100) NOT NULL,
  `job_status` varchar(100) NOT NULL,
  `client_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`job_id`, `job_name`, `job_description`, `job_date`, `job_location`, `job_packages`, `job_budget`, `job_status`, `client_id`, `category_id`) VALUES
(2, 'Electrician', 'Changing the wire of my fan and my whole home wire. sghlsglrhsgolrgoplhergolngslhgnvoaelrhnvorlhvnoi', '2020-03-07', '12 D', 'monthly', '10000', 'approved', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `labour`
--

CREATE TABLE `labour` (
  `labour_id` int(10) NOT NULL,
  `labour_name` varchar(100) NOT NULL,
  `labour_email` varchar(100) NOT NULL,
  `labour_pass` varchar(100) NOT NULL,
  `labour_phone` int(13) NOT NULL,
  `labour_gender` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `skill` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labour`
--

INSERT INTO `labour` (`labour_id`, `labour_name`, `labour_email`, `labour_pass`, `labour_phone`, `labour_gender`, `qualification`, `skill`, `image`, `status`) VALUES
(1, 'Mumu', 'm@g.com', '1234', 123, 'female', 'B.Sc in English', 'Teacher,Tailor', 'handyman.png', 'Confirmed'),
(5, 'Polash', 'polashbaidya01@gmail.com', '123', 1623957274, 'male', 'B.Sc in Math', 'Teacher', 'default_image.png', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `message_sender_id` int(10) NOT NULL,
  `message_receiver_id` int(10) NOT NULL,
  `sender_designation` varchar(100) NOT NULL,
  `receiver_designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message`, `message_sender_id`, `message_receiver_id`, `sender_designation`, `receiver_designation`) VALUES
(1, 'hi', 1, 1, 'Admin', 'Client'),
(2, 'hi', 1, 1, 'Admin', 'Labour'),
(3, 'Hey, Hi', 1, 1, 'Client', 'Admin'),
(4, 'hi', 5, 1, 'Labour', 'Admin'),
(5, 'yeah good', 1, 1, 'Admin', 'Client'),
(6, 'Message send', 5, 1, 'Labour', 'Admin'),
(7, 'hi', 1, 1, 'Client', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claimed`
--
ALTER TABLE `claimed`
  ADD PRIMARY KEY (`claimed_id`),
  ADD KEY `job_id_fk` (`job_id`),
  ADD KEY `labour_id_fk` (`labour_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `category_id_fk` (`category_id`),
  ADD KEY `client_id_fk` (`client_id`);

--
-- Indexes for table `labour`
--
ALTER TABLE `labour`
  ADD PRIMARY KEY (`labour_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `claimed`
--
ALTER TABLE `claimed`
  MODIFY `claimed_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `job_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `labour`
--
ALTER TABLE `labour`
  MODIFY `labour_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `claimed`
--
ALTER TABLE `claimed`
  ADD CONSTRAINT `job_id_fk` FOREIGN KEY (`job_id`) REFERENCES `job_post` (`job_id`),
  ADD CONSTRAINT `labour_id_fk` FOREIGN KEY (`labour_id`) REFERENCES `labour` (`labour_id`);

--
-- Constraints for table `job_post`
--
ALTER TABLE `job_post`
  ADD CONSTRAINT `category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `job_category` (`category_id`),
  ADD CONSTRAINT `client_id_fk` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
