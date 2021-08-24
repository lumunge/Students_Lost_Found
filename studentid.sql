-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 07:12 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `date`) VALUES
(1, 'root', '1234', '2020-04-05 06:12:22'),
(3, 'roots', 'roots2015', '2020-04-05 09:52:36'),
(4, 'roots', 'roots2015', '2020-04-05 09:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `adminmessages`
--

CREATE TABLE `adminmessages` (
  `msg_id` int(11) NOT NULL,
  `admin` varchar(30) NOT NULL,
  `student` varchar(30) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminmessages`
--

INSERT INTO `adminmessages` (`msg_id`, `admin`, `student`, `message`, `date`) VALUES
(1, 'kibz@gmail.com', 'Jamo', 'I am the admin welcome', '2020-04-07 12:54:22'),
(2, 'kibz@gmail.com', 'Jamo', 'Hello again', '2020-04-07 12:56:10'),
(3, 'admin', 'Muthee', 'Hello muhtee this is the admin', '2020-04-07 13:07:34'),
(4, 'admin', 'Selly', 'My message to selly', '2020-04-07 14:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `foundids`
--

CREATE TABLE `foundids` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `regNo` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foundids`
--

INSERT INTO `foundids` (`id`, `firstName`, `lastName`, `regNo`, `date`) VALUES
(1, 'John', 'doe', '12345678', '2020-04-04 15:10:13'),
(2, 'doe', 'john', '123456', '2020-04-05 14:09:00'),
(3, 'Peter', 'Tosh', '234890', '2020-04-05 14:20:19'),
(4, 'James', 'Doba', '256256', '2020-04-05 14:45:04'),
(5, 'dylan', 'ngolo', '3434', '2020-04-05 14:45:29'),
(6, 'peter', 'Murume', '254254', '2020-04-05 14:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `lostids`
--

CREATE TABLE `lostids` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `regNo` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lostids`
--

INSERT INTO `lostids` (`id`, `firstName`, `lastName`, `regNo`, `date`) VALUES
(10, 'kibz', 'kibz', '123456', '2020-04-07 13:39:07'),
(11, 'kibz', 'kibz', '123456', '2020-04-07 13:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `studentmessages`
--

CREATE TABLE `studentmessages` (
  `msg_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentmessages`
--

INSERT INTO `studentmessages` (`msg_id`, `username`, `message`, `date`) VALUES
(1, '0', 'too gjjkjdks', '2020-04-06 17:14:49'),
(2, '0', 'jn,mn,n', '2020-04-06 17:16:16'),
(3, '0', 'njlkjlkjlkjl', '2020-04-06 17:18:20'),
(4, 'didil', 'jkldjklsjflds', '2020-04-06 17:20:16'),
(5, 'jamo', 'Hello there am james', '2020-04-07 12:42:56'),
(6, 'Muthee', 'Hello am muthee', '2020-04-07 13:05:55'),
(7, 'Selly', 'Shughuli', '2020-04-07 14:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `password`) VALUES
(7, 'long', 'long', 'long', 'longlong'),
(8, 'first', 'first', 'first', '123456'),
(9, 'first', 'first', 'first', '123456'),
(10, 'kibz', 'kibz', 'kibz', '123456'),
(11, 'didi', 'didi', 'didi', '$2y$10$XZCbYPAokLYpp'),
(12, 'bwa', 'bwa', 'bwa', '$2y$10$3OWvN.f1LDXcU'),
(13, 'bibi', 'bibi', 'bibi', '$2y$10$jVVQpljS8To4N'),
(14, 'clara', 'clara', 'clara', '$2y$10$gVjyutbzrx4JP'),
(15, 'juma', 'juma', 'juma', '12345678'),
(16, 'lara', 'lara', 'lara', '$2y$10$ubyYK6reJuUkd'),
(17, 'ben', 'ben', 'ben', '$2y$10$qPX4qotty.VAxwxEXkcGkux0UWFXdEsT/yaVZyuqy9WzhwjM9QQ4W'),
(18, 'didil', 'didil', 'didil', '$2y$10$2cUUQQSJq9GVtCguIRS0Wew0ikGx1XPgt3gCDsvx/WYfTFgYRDhJ6'),
(19, 'jamo', 'jamo', 'jamo', '$2y$10$IbyPuM5xb6ZbVwxP5QYELumLptJzpYfrZp17xxzcpkdS7pyqCfpBy'),
(20, 'Jacob', 'Muthee', 'Muthee', '$2y$10$9rQCjKV9wEw7QCsNlJFALOZg6.nEt9hMyq.ZL26X4/YUNMg6dVTJK'),
(21, 'Kenya', 'Nyake', 'Nyake', '$2y$10$Q2d3JGiz8tKTDP3McNxVZeGm2CkRJFjP.x/X2max.5TTILadCDIPa'),
(22, 'Selina', 'Selina', 'Selly', '$2y$10$h4yjssq3ZJBwIJ7O9yJ1t.Up.IUE6455ce9zdZc5MjkaEQ7TVGvAu'),
(23, 'Joshua', 'Joshua', 'Josh', '$2y$10$pcgMNgLGWhGdFusFlZrxqO1cr9VQSVq7DU2uiVyydpHuqB8KU6ZSe'),
(24, 'james', 'bond', 'jamok', '$2y$10$Lv3Aujcuo0VjkuIREvFBm.OFUSEprQvjjk1wd3iS0jzvqzrQyslq2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminmessages`
--
ALTER TABLE `adminmessages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `foundids`
--
ALTER TABLE `foundids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lostids`
--
ALTER TABLE `lostids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentmessages`
--
ALTER TABLE `studentmessages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `adminmessages`
--
ALTER TABLE `adminmessages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foundids`
--
ALTER TABLE `foundids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lostids`
--
ALTER TABLE `lostids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `studentmessages`
--
ALTER TABLE `studentmessages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
