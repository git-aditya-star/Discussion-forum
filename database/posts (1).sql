-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 03:57 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `robospark`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(100) NOT NULL,
  `topic_id` int(100) NOT NULL,
  `post_text` varchar(150) NOT NULL,
  `post_owner` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `topic_id`, `post_text`, `post_owner`) VALUES
(1, 1, 'content for title 1', 'user1'),
(2, 2, 'content for title 2', 'user1'),
(3, 3, 'content for title 3', 'user2'),
(4, 4, 'this is the content about the question', 'user1'),
(5, 5, 'the question is about so and so', 'user1'),
(6, 6, 'How to create a database ?\r\n', 'user2'),
(7, 7, 'activites in android', 'user2'),
(8, 8, 'what is my name', 'user3'),
(9, 9, 'xyz', 'user1'),
(10, 9, 'This is an answer by user 2', 'user2'),
(11, 7, 'Please explain it briefly', 'user2'),
(12, 7, 'An activity represents a single screen with a user interface just like window or frame of Java.', 'user3'),
(13, 1, 'abcsd\r\n', 'user2'),
(14, 6, 'pls tell', 'user1'),
(15, 10, 'dfrggsdfvfsbfd', 'user2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
