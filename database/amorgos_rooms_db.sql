-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 11:16 AM
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
-- Database: `amorgos_rooms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `numa` int(10) NOT NULL,
  `numk` int(10) NOT NULL,
  `ardate` int(10) NOT NULL,
  `depdate` int(10) NOT NULL,
  `pet` int(4) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `cname` varchar(40) NOT NULL,
  `loc` varchar(40) NOT NULL,
  `comp-phone` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `link` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `cname`, `loc`, `comp-phone`, `email`, `link`) VALUES
(1, 'Pension Amorgos', 'Katapola', 2285010101, 'pension.amorgos@gmail.com', 'Pension-Amorgos.html'),
(2, 'Pension The Big Blue', 'Katapola', 22850071094, 'thebigblue_amorgos@yahoo.com', 'https://thebigblue.gr/?gad_source=1&gclid=Cj0KCQjw6PGxBhCVARIsAIumnWb1QZb-0kwqF5IEmxFWXd9pBdYX9-ObZbG-fXB5aV24rCQaZpeZuuQaAsmdEALw_wcB'),
(3, 'Aperanto Galazio', 'Aegiali', 2285001010, 'aperanto-galazio@yahoo.com', 'Aperanto-Galazio.html'),
(4, 'Lakki Village', 'Aegiali', 22850073505, 'info@lakkivillage.gr', 'https://www.lakkivillage.com/el/'),
(5, 'Casaprimavera', 'Katapola', 22850074154, 'info@casaprimavera.gr', 'https://www.casaprimavera.gr'),
(6, 'Kykladonisia Amorgos', 'Xora', 2285071549, 'Disabled', 'https://kykladonisiaamorgos.gr'),
(7, 'Itonia House', 'Leykes', 3336061830, 'Disabled', 'https://amorgos.online-reservations.com/?hotelid=7340330&gad_source=1&gclid=CjwKCAjw7NmzBhBLEiwAxrHQ-f3Bvxyi-wEgCGqQVDxeGe1gO1JuTGQ26EVHU9HqUGEk_97ovYNJeBoCYTAQAvD_BwE'),
(8, 'Hippocrates\' House', 'Lagada', 6946621194, 'Disabled', 'https://www.airbnb.com/rooms/662265461433770271?source_impression_id=p3_1719076935_P3DPB-QlhUUJQU7s');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `pnumber` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usr` varchar(25) NOT NULL,
  `psw` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `activated` tinyint(1) NOT NULL DEFAULT 0,
  `random` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
