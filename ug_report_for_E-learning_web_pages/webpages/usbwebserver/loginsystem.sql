-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2023 at 08:22 PM
-- Server version: 5.5.20
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `first_name`, `last_name`, `user_name`, `email`, `password`) VALUES
(5, 'roshan', 'magan', 'roshanmagan', 'roshanmagan420@gmail.com', '9cd6a337fd08219752c4bcf116533775'),
(59, 'Mishwen', 'Magan', 'mishwenmagan', 'mishwenmagan@hotmail.com', '2c5755cac61d97a578340448d2148d15'),
(60, 'vinay', 'magan', 'vinay1433', 'vinaymagan4@gmail.com', '859cd3d3703f2a13c7fcaac69e680c70'),
(61, 'yankit', 'magan', 'yankitmagan', 'yankitmagan@yahoo.in', '5c29c30b44e0311e63120f7976004c0c'),
(63, 'bob', 'martin', 'bobmartin', 'bobmartin@hotmail.com', '2c5755cac61d97a578340448d2148d15'),
(65, 'mathan', 'kanly', 'mathankanly', 'mathan@gmail.com', '00a1132f71593ef62c5c44eb7cf1a8c1'),
(66, 'bob', 'marley', 'bobmarley', 'bobmarley@yahoo.in', 'aba084ce0d6bc74209c8de25830142c7'),
(67, 'jhon', 'bob', 'jhonbob', 'jhon.bob@gmail.com', 'afee2c44969f2d5cfc9c22edc341ef17'),
(68, 'david', 'mars', 'davidmars123', 'davidmars@outlook.com', '2d802624cb590e8e4c557187908cfccc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
