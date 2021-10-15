-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2021 at 03:23 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `msg` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `senderid`, `receiverid`, `msg`, `timestamp`, `status`) VALUES
(1, 1, 4, 'Hello Sam How are You?', '2021-10-15 18:12:14', 1),
(2, 4, 1, 'I am fine. What about you?', '2021-10-15 18:12:46', 1),
(3, 1, 4, 'Same here. What is going on?', '2021-10-15 18:13:18', 1),
(4, 4, 1, 'Noting special.', '2021-10-15 18:13:28', 1),
(5, 1, 4, 'I was actually testing this chat sytem.', '2021-10-15 18:13:43', 1),
(6, 4, 1, 'hmmmmm', '2021-10-15 18:13:50', 1),
(7, 4, 1, 'good', '2021-10-15 18:13:53', 1),
(8, 1, 3, 'Hello sofia', '2021-10-15 18:14:32', 1),
(9, 1, 3, 'How are you?', '2021-10-15 18:14:38', 1),
(10, 3, 1, 'I am fine', '2021-10-15 18:14:54', 1),
(11, 3, 1, 'Have you completed this chat system?', '2021-10-15 18:15:27', 1),
(12, 1, 3, 'Yes absolutely.', '2021-10-15 18:15:46', 1),
(13, 1, 3, 'With many features.', '2021-10-15 18:16:04', 1),
(14, 3, 1, 'very good', '2021-10-15 18:16:10', 1),
(15, 2, 1, 'Hello brother.', '2021-10-15 18:16:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_login_details`
--

CREATE TABLE `chat_login_details` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `lastactivity` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `istyping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_login_details`
--

INSERT INTO `chat_login_details` (`id`, `userid`, `lastactivity`, `istyping`) VALUES
(1, 1, '2021-10-15 13:18:25', 0),
(2, 2, '2021-10-15 13:17:27', 0),
(3, 3, '2021-10-15 13:17:31', 0),
(4, 4, '2021-10-15 13:16:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `online` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `online`) VALUES
(1, 'Abdul Razzaq', 'abrazzaq@gmail.com', '08063d54f807e8b5b1f4ab0a10006c4f', '1634303176.jpg', 0),
(2, 'John', 'john@gmail.com', '527bd5b5d689e2c32ae974c6229ff785', 'avatar.png', 0),
(3, 'Sofia', 'sofia@gmail.com', '17da1ae431f965d839ec8eb93087fb2b', '1634303266.jpg', 0),
(4, 'Sam', 'sam@gmail.com', '332532dcfaa1cbf61e2a266bd723612c', '1634303478.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_login_details`
--
ALTER TABLE `chat_login_details`
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
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chat_login_details`
--
ALTER TABLE `chat_login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
