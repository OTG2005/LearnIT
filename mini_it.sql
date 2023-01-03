-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 05:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `price` float DEFAULT NULL,
  `img` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `price`, `img`, `description`) VALUES
(1, 'Introduction To PCs', 35, './img/course1.webp', 'First of all, what is a PC and what are the components of a PC?\nWhen it comes to PC components, we have hardware parts that are well-known in publics.\nBut do you know there are hundreds of choices for each one of them from different manufacturers with different specs available?\nWell if you want to know more about PC components, this course will guide you to differentiate each components and learn each one of them in details.'),
(2, 'PC Building', 42, './img/course2.jpg', 'Building a PC is like putting all the human organs in place correctly so humans can be alive and function properly. Same goes to a PC, you need the right components in order to make them work properly.\r\nIn this course we will teach you how to build your ultimate PC whether if it is for gaming or your daily workstation PC. We will also talk about the safety procedure of building a PC.'),
(3, 'Knowing What You Need', 33, './img/course3.webp', 'How to find the best PC depending on your needs is a very important thing when you decide on buying a PC\r\nFinding a PC online requires some deep research into PC components and it will take a long time to find the one that suits your needs.\r\nBy taking this course you will learn a faster and safer to find the best PC for you. Our real PC expert will guide you accordingly to your needs and help you find the best price and components for your PC.'),
(4, 'Bying PC Parts', 39.9, './img/course4.webp', 'This course will teach you how and where to find PC parts online or physical stores.\r\nIt will also show you some websites where you can check the compatibility of the parts you chose with each other, to ensure you have a fully working PC with no building errors.'),
(5, 'Setting Up Your PC', 25, './img/course5.webp', '\"So what to do after I finish my PC build?\" This course will guide you through post building process like installing OS, all the useful software, and access your bios settings to setup your PC.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `user_password` text NOT NULL,
  `gender` text NOT NULL,
  `birthdate` text NOT NULL,
  `nationality` text NOT NULL,
  `phone_number` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `user_password`, `gender`, `birthdate`, `nationality`, `phone_number`) VALUES
(1, 'Omar', 'Ahmed', 'omar@hotmail.com', '$2y$10$iOFYVvn5/Mif/mBDMd1KjuC96riTnSr4T37ySX.cTw0U3ECKevJXG', 'male', '2000-10-29', 'egyptian', '+60123456789'),
(2, 'Omar', 'ahmed', 'omar@gmail.com', '$2y$10$PZfLd1p1bNOLdTg6xHa2feEAgRssfWcf.cAZsXNwyFjJkCNtxFKxK', 'male', '2000-10-29', 'egyptian', '+60123456789'),
(3, 'mokhtah', 'chelsea', 'mokhtah@gmail.com', '$2y$10$Fri.Hudv9ZNMua4hulXnhenWm8RFHKPAEdzJcqvI5qyE7z9V6oP.C', 'male', '2000-12-20', 'egyptian', '+60123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
