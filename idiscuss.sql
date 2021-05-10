-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 08:54 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catid` int(11) NOT NULL,
  `catname` varchar(50) NOT NULL,
  `catdes` text NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catid`, `catname`, `catdes`, `dt`) VALUES
(1, 'Php', 'PHP is a popular general-purpose scripting language that is especially suited to web development.It ', '2020-07-21 13:35:05'),
(2, 'Python', 'Python is an interpreted, high-level, general-purpose programming language. Created by Guido van Ros', '2020-07-21 13:35:05'),
(5, 'Javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ]', '2020-07-21 13:38:47'),
(6, 'C language', 'C (/siː/, as in the letter c) is a general-purpose,  By design, C provides constructs that map efficiently to typical machine ', '2020-07-21 13:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cmtid` int(11) NOT NULL,
  `comtdes` text NOT NULL,
  `thid` int(8) NOT NULL,
  `userid` int(8) NOT NULL,
  `username` varchar(100) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cmtid`, `comtdes`, `thid`, `userid`, `username`, `dt`) VALUES
(1, 'Please search in tutorials.', 2, 0, '', '2020-07-22 16:41:43'),
(2, 'this is my reply', 2, 0, '', '2020-07-22 17:05:34'),
(3, 'this is my comment', 2, 25, 'Kuldeep', '2020-07-22 17:07:41'),
(4, 'hello my comment\r\n', 1, 25, 'Kuldeep', '2020-07-22 17:11:27'),
(5, 'Can you please ', 26, 25, 'Kuldeep', '2020-07-22 17:31:33'),
(6, 'Can you please ', 26, 25, 'Kuldeep', '2020-07-22 17:31:59'),
(7, 'yes you can just go on php manuals webiste.', 29, 25, 'Kuldeep', '2020-07-22 17:59:46'),
(8, 'hello', 26, 25, 'Kuldeep', '2020-07-23 17:44:52'),
(9, 'hello again kindly reply fast', 32, 12, 'kamal', '2020-07-23 17:49:58'),
(10, 'Yes you can visit on online website of php manuals.', 34, 14, 'Nitin Parashar', '2020-07-23 18:00:59'),
(11, 'revisit this thread\r\n', 34, 14, 'Nitin Parashar', '2020-07-23 18:10:12'),
(12, 'yes u can use it please find some tutorials about this\r\n', 28, 14, 'Nitin Parashar', '2020-07-24 16:09:33'),
(13, 'go and ewhwcheoirheiorhfiorej', 32, 15, 'Tarun', '2020-07-24 20:42:16'),
(15, 'yes we can use', 40, 17, 'keshav parashar', '2020-08-18 19:19:55'),
(16, 'This nothing please type correctly', 47, 18, 'Nitin', '2020-08-27 17:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `sno` int(8) NOT NULL,
  `userid` int(8) NOT NULL,
  `followid` int(8) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`sno`, `userid`, `followid`, `dt`) VALUES
(1, 14, 15, '2020-07-24 22:27:45'),
(2, 14, 12, '2020-07-24 22:27:45'),
(8, 15, 14, '2020-07-25 21:27:49'),
(10, 15, 9, '2020-07-25 21:39:27'),
(11, 15, 8, '2020-07-25 21:39:53'),
(12, 15, 8, '2020-07-25 21:42:55'),
(13, 15, 2, '2020-07-25 21:43:08'),
(14, 15, 7, '2020-07-25 21:50:01'),
(15, 15, 11, '2020-07-25 21:53:04'),
(16, 15, 10, '2020-07-25 21:57:09'),
(18, 14, 4, '2020-07-25 23:49:23'),
(19, 16, 14, '2020-08-06 18:55:36'),
(20, 14, 16, '2020-08-06 18:57:11'),
(21, 16, 15, '2020-08-06 19:06:37'),
(22, 4, 14, '2020-08-14 12:51:28'),
(23, 17, 4, '2020-08-18 19:18:34'),
(24, 17, 1, '2020-08-18 19:18:49'),
(25, 14, 17, '2020-08-18 19:22:46'),
(26, 17, 14, '2020-08-18 19:23:39'),
(27, 18, 17, '2020-08-27 17:42:11'),
(28, 4, 12, '2021-04-12 22:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `sno` int(11) NOT NULL,
  `msg` text NOT NULL,
  `sendid` int(8) NOT NULL,
  `sendname` varchar(50) NOT NULL,
  `recid` int(8) NOT NULL,
  `recname` varchar(50) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thid` int(11) NOT NULL,
  `thtitle` text NOT NULL,
  `thdes` text NOT NULL,
  `thcatid` int(10) NOT NULL,
  `thuserid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thid`, `thtitle`, `thdes`, `thcatid`, `thuserid`, `username`, `dt`) VALUES
(1, 'I\'m implementing a PHP script and I\'m having troub', 'Basically, it\'s a financial system script that should account for profits every hour, but this is not working. I\'ve tried to put the CRON task to run on Files\\core\\vendor\\autoload.php and with all the files named as CRON, but it won\'t. I\'ve even tried to run the whole folder on CRON.', 1, 23, 'Nitin parashar', '2020-07-22 00:38:13'),
(2, 'nearest GPS location\r\n', 'I run www.airfieldcards.com/wordpress where we give airfield information for pilots of Microlights and light aircraft.\r\n\r\nI would like to design a widget that takes the lat/long (already in each card) then displays the nearest other airfields.\r\n\r\nHow would you approach this problem? Or could you point me to some online resources to teach me how to solve this problem?\r\n\r\nKind Regards', 1, 24, 'Rajender Kumar', '2020-07-22 00:52:56'),
(3, 'this is ques', 'this is des', 1, 25, 'raaj kumar', '2020-07-22 13:20:58'),
(8, 'this is my question', 'this is description', 0, 25, 'raaj kumar', '2020-07-22 13:38:29'),
(9, 'this is my question 2', 'description  jj', 0, 25, 'raaj kumar', '2020-07-22 13:59:07'),
(10, 'this is my question 2', 'description  jj', 0, 25, 'raaj kumar', '2020-07-22 14:00:47'),
(17, 'this is my question 2', 'Ellaborate your conserm', 1, 25, 'raaj kumar', '2020-07-22 15:43:01'),
(18, 'this is my question 2', 'Ellaborate your conserm', 1, 25, 'raaj kumar', '2020-07-22 15:43:30'),
(20, 'this is my question', 'descascacnjksdnkj', 1, 25, 'raaj kumar', '2020-07-22 15:47:54'),
(21, 'this is my question', 'descascacnjksdnkj', 1, 25, 'raaj kumar', '2020-07-22 15:48:14'),
(22, 'this is my question', 'descascacnjksdnkj', 1, 25, 'raaj kumar', '2020-07-22 15:48:54'),
(23, 'knnjnjnj', 'kokko', 1, 25, 'raaj kumar', '2020-07-22 15:49:07'),
(24, 'this is my question regarding python', 'i m unable to download python. plz help me', 2, 25, 'raaj kumar', '2020-07-22 15:50:24'),
(25, 'python error occurs', 'this is description\r\n', 2, 25, 'raaj kumar', '2020-07-22 15:51:32'),
(26, 'python error occurs', 'this is description\r\n', 2, 25, 'raaj kumar', '2020-07-22 15:55:46'),
(27, 'Can we use audio file in php?', 'i want to use some audio file in webpage dose anyone has any soltion for that please reply on this.', 1, 25, 'raaj kumar', '2020-07-22 17:23:26'),
(28, 'Can we use audio file in php?', 'i want to use some audio file in webpage dose anyone has any soltion for that please reply on this.', 1, 25, 'raaj kumar', '2020-07-22 17:24:57'),
(29, 'Can we use audio file in php?', 'i want to use some audio file in webpage dose anyone has any soltion for that please reply on this.', 1, 25, 'raaj kumar', '2020-07-22 17:26:04'),
(30, 'regarding tutorials of javascript ', 'i need some good tutorials for learning javascript.', 5, 25, 'raaj kumar', '2020-07-22 21:25:14'),
(31, 'jnjndjenw', 'nncwecn', 1, 13, '', '2020-07-23 17:46:07'),
(32, 'hi i want to knw about python', 'ewndenwndlwenw', 2, 12, 'kamal', '2020-07-23 17:47:05'),
(33, 'php tutorials', 'does anyone have complete tutorials. plz send me the link', 1, 12, 'kamal', '2020-07-23 17:53:34'),
(34, 'php tutorials', 'does anyone have complete tutorials. plz send me the link', 1, 12, 'kamal', '2020-07-23 17:55:08'),
(35, 'this is on c#', 'Ellaborate your consernEllaborate your consernEllaborate your consernEllaborate your consern', 6, 14, 'Nitin Parashar', '2020-07-23 21:10:49'),
(36, 'some tutorials ', 'hbjhbjhhbbjbhjb', 6, 14, 'Nitin Parashar', '2020-07-23 21:34:11'),
(37, 'uiuninininiunkih', 'uiujihuihuihhuyhuyyuyugtferew', 6, 0, '', '2020-07-23 21:35:47'),
(38, 'uiuninininiunkih', 'uiujihuihuihhuyhuyyuyugtferew', 6, 0, '', '2020-07-23 21:36:24'),
(40, 'can we use python as web development', 'i want some tutorials', 2, 14, 'Nitin Parashar', '2020-07-24 12:49:41'),
(41, 'javascript', 'tutorials', 5, 14, 'Nitin Parashar', '2020-07-24 13:08:07'),
(42, 'This is my question on c ++', 'I want to learn c ++', 6, 12, 'kamal', '2020-07-24 14:39:00'),
(43, 'c ++ tutorila', 'send me plz', 6, 12, 'kamal', '2020-07-24 14:44:57'),
(44, 'my ques', 'hiowehiheuihccuincneicneuincienuihi', 2, 15, 'Tarun', '2020-07-24 20:41:07'),
(45, 'this is my question', 'owiejfioewjiofjewiojfoiwj', 1, 0, '', '2020-08-06 18:50:04'),
(46, 'my quesnioj i dnt understand this ', 'please help me.hciuiuhcuiewhc jkihudcb juegecyugewg jhcuygcyugucjewnic', 5, 16, 'yashoda', '2020-08-06 18:53:30'),
(47, 'i dnt understand this', 'ddudvuund\r\ndfvfovjdfnlv\r\nfdvlndfinvdfa\r\nfdvodfnvklnfv\r\nvdfvjoidfmvd\r\nv;fdviundv\r\nfvpfdmvolfmdovld', 5, 17, 'keshav parashar', '2020-08-18 19:25:08'),
(48, 'mjnk,', ', ,k', 2, 4, 'tarun', '2021-04-12 22:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `passw` varchar(300) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `name`, `email`, `passw`, `dt`) VALUES
(4, 'tarun', 'tar@hmm.com', '$2y$10$e9fSZIXSgJV8zqbncdE8uusRW6fdZArkRakTrGb14wCKQ1jXPTuie', '2020-07-22 23:39:37'),
(14, 'Nitin Parashar', 'nitinp1212@gmail.com', '$2y$10$ZP74py9rp6EValiloLhndOrGKYEIdplnYe.kMKhkmhERBE2sjk0GW', '2020-07-23 17:59:14'),
(15, 'Tarun', 'tarun123@gmail.com', '$2y$10$xuTxxiVfsmubGUiX5eoRTOFgWbGk5px2LBA0HqIwYGLHUAuXC/GiK', '2020-07-24 20:39:46'),
(17, 'keshav parashar', 'ptkeshv22@gmail.com', '$2y$10$hVWGHRWjyMQsM7PI/BVS1.g0l04RUijpdawtWnaQSa1NgR2NkTFl6', '2020-08-18 19:16:40'),
(18, 'Nitin', 'nitinp12@gmail.com', '$2y$10$GJIIZqUUWbhWIUytCRWl3OsX6XaQ30y8GIwgHXYmXRd3SBSeVYc36', '2020-08-27 17:41:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cmtid`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thid`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thtitle` (`thtitle`,`thdes`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cmtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
