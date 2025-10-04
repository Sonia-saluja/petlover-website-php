-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 12:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet_shop_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`id`, `name`, `contact`, `email`, `username`, `password`) VALUES
(1, 'sonia', '08219697824', 'soniasaluja50@gmail.com', 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tblcnp`
--

CREATE TABLE `tblcnp` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `age` varchar(255) NOT NULL,
  `prize` float DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcnp`
--

INSERT INTO `tblcnp` (`id`, `name`, `age`, `prize`, `description`, `image`, `status`) VALUES
(1, 'Baltimore Oriole', '', 350, 'The rich, whistling song of the Baltimore Oriole, ', '      ../assets/uploads/6635ed713a4f1.jpg ', 'Available'),
(2, 'Maltese', '', 500, 'A dog breed whoâ€™s gentle and fearless, the Malte', '      ../assets/uploads/6635d019c0c23.jpg ', 'Available'),
(4, 'Gordon Setter', '2 months', 600, 'The Gordon Setter, the black avenger of the Highla', '      ../assets/uploads/6635ed2bf0f9c.jpg ', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `id` int(11) NOT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `cnpoid` int(11) DEFAULT NULL,
  `oqty` int(11) DEFAULT NULL,
  `ostatus` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `otype` varchar(50) DEFAULT NULL,
  `datepickup` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`id`, `cname`, `address`, `contact`, `cnpoid`, `oqty`, `ostatus`, `timestamp`, `otype`, `datepickup`) VALUES
(10, 'Jeancen Sayoc', 'Tacloban City', '09369420867', 4, 1, 'new', '2016-10-13 15:09:46', 'Pick-up', '2016-10-14'),
(11, 'Jhazel Dela Cruz', 'Kabankalan City', '09095744586', 3, 3, 'Completed', '2024-05-04 06:18:39', 'Pick-up', '2019-03-18'),
(12, 'Jhazel Dela Cruz', 'kabfsheth', '14253', 5, 3, 'new', '2019-03-18 02:00:16', 'Pick-up', '0000-00-00'),
(13, 'dsgreer', 'xghre', '45744', 5, 4, 'new', '2019-03-18 02:21:14', 'Deliver', '0000-00-00'),
(15, 'sonia ', 'shimla', '123456789', 5, 1, 'Completed', '2024-05-01 10:40:49', 'Deliver', '0000-00-00'),
(16, 'sujata', 'shimla', '123456789', 6, 1, 'new', '2024-05-04 08:03:49', 'Deliver', '2024-05-29'),
(17, 'anirudh', 'shimla', '12345678', 6, 1, 'new', '2024-05-04 08:05:07', 'Pick-up', '2024-05-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcnp`
--
ALTER TABLE `tblcnp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admininfo`
--
ALTER TABLE `admininfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcnp`
--
ALTER TABLE `tblcnp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
