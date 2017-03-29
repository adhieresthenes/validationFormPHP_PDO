-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2017 at 11:27 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdo_registertest`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(11, 'admin', 'admin@gmail.com', '$2y$10$zLktQaqI1x.b9R8dHpPf1ums4n7B.y0tyqgisRYdNsf.XqS0g6Rea'),
(8, 'testadi', 'testadi@gmail.com', '$2y$10$S5VzwaUk52CWP4.jqLZlYeij8/GxDCM7gxYbp/hDhuTuoxTDlDm/q'),
(9, 'adiernes', 'adiernes@gmail.com', '$2y$10$.mTAYfbYe/Q.XSveXBScXOCRYlovoZQW3ViioxZIxhLd4xLTQ9m.K'),
(15, 'udin', 'udin@gmail.com', '$2y$10$eHV0tW9GmaFKKSxoFDC1auzNOMWtPbpf40OKILZN4PbscMwZw6D4.'),
(14, 'maho', 'maho@gmail.com', '$2y$10$njKWofJLC8eZ1cptDL7lIuJDN1im4ggHN73wl0r8/PHwWqJxxeblG'),
(16, 'bapuk', 'bapuk@gmail.com', '$2y$10$B/Wn25n.J3QoEmv7gwPHQ.lWXp.THNyzmjXghok2ZlE4QHlNhJsMu'),
(17, 'asdasd', 'asdasd@gmail.com', '$2y$10$pLLuq6Wyj1dUDH.w4Du4DOJwWcfplEEfVoau7i9suZiVT1f2suybe'),
(18, 'dody', 'dody@gmail.com', '$2y$10$o06SAhta6bEQQalJ19JJ8.lGpG2scyUaS6PK3IZzwn8xVdDLi4wAC'),
(19, 'emenasdasd', 'emen@gmail.com', '$2y$10$PN3gBYnX6y3qcw0zMvkk4.JfR8mBs4PuaDIGkLFBGF3eNoPW427He'),
(20, 'mahoni', 'maho@gmai.com', '$2y$10$q3RTVEO21FfX.2VnTU5sQeWOAUWzS6mcVRYdVjagOkqCe2iBbNZ8i'),
(21, 'edan', 'edan@gmail.com', '$2y$10$eoV69IAXhOY/pBwH0EuBrecxwwkxKJIGsieXL9PPVpdAQv0e9gRca'),
(22, 'tester', 'tester@gmail.com', '$2y$10$nJFIFMgCNx2kA2sVkkv8leilvckWQ6PZwF6.LauDdZCkP1CD.qBla'),
(23, 'benyamin', 'benyamin@gmail.com', '$2y$10$ARs8bmcknTjwO7svcqIZb.3gDteRJBnhQ1/cHGn0kJpIpCCekzg5u'),
(24, 'gila', 'gila@gmail.com', '$2y$10$6pNPV1di51YICLopteUMvOcoequ8ecxU1lMFClent1ZdS05tXiO9.'),
(25, 'bagong', 'bagong@gmail.com', '$2y$10$prJ2YCYK1arrSr5azaQM8eqG6F5Lw/5drC3McbG/.hI17jiru87Pu'),
(26, 'gaji', 'gaji@gmail.com', '$2y$10$jfGI7JSVzfuBJS9fjjCFrOaGLyY7tag4Z7WPN8/a8rAufu.CtxXRa'),
(27, 'sapujagat', 'sapujagat@gmail.com', '$2y$10$VpOlhVhlIn70gktV8d96aOnTb6IdZwhffusZLHyi4TtgJBhF1mbd2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
