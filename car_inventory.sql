-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2018 at 10:41 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `manufacturer`) VALUES
(1, 'maruti'),
(2, 'volksvagen'),
(3, 'sdcsdvd');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `manufacturer_id`, `model_name`) VALUES
(1, 1, 'zen'),
(2, 2, 'fiat'),
(3, 1, 'drgere');

-- --------------------------------------------------------

--
-- Table structure for table `model_details`
--

CREATE TABLE `model_details` (
  `model_detail_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `color` varchar(250) NOT NULL,
  `manufacturing_year` date NOT NULL,
  `registration_number` int(20) NOT NULL,
  `note` text NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model_details`
--

INSERT INTO `model_details` (`model_detail_id`, `manufacturer_id`, `model_id`, `color`, `manufacturing_year`, `registration_number`, `note`, `quantity`) VALUES
(1, 1, 1, 'black', '2018-07-03', 123456, 'Dtetails about the cars are as follows', 0),
(2, 2, 2, 'Green', '2018-07-18', 254178, 'Details aboutthe cars are as follows.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `model_details`
--
ALTER TABLE `model_details`
  ADD PRIMARY KEY (`model_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `model_details`
--
ALTER TABLE `model_details`
  MODIFY `model_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
