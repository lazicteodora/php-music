-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 09:17 PM
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
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`, `nationality`, `year`, `img`) VALUES
(1, 'Post Malone', 'United States', 1995, 'img/artists/postmalone.png'),
(2, 'The Beatles', 'England', 1960, 'img/artists/beatles.png'),
(3, 'Madonna', 'United States', 1958, 'img/artists/madonna.png'),
(4, 'Sam Smith', 'England', 1992, 'img/artists/samsmith.png'),
(5, 'Dua Lipa', 'England', 1995, 'img/artists/dualipa.png'),
(6, 'Kanye West', 'United States', 1977, 'img/artists/kanye.png');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `artistid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `duration` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `artistid`, `title`, `album`, `genre`, `year`, `duration`) VALUES
(1, 5, 'Levitating', 'Future Nostalgia', 'Pop', 2020, '3:23'),
(2, 5, 'Physical', 'Future Nostalgia', 'Pop', 2020, '3:13'),
(3, 6, 'Blood on the Leaves', 'Yeezus', 'Rap', 2013, '6:00'),
(4, 1, 'Better Now', 'Beerbongs & Bentleys', 'Hip-hop', 2018, '3:41'),
(5, 3, 'Sorry', 'Confessions on a Dance Floor', 'Pop', 2005, '4:41'),
(6, 2, 'Come Together', 'Abbey Road', 'Rock', 1969, '5:12'),
(7, 4, 'Good Thing', 'In The Lonely Hour', 'Pop', 2014, '3:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artistid` (`artistid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`artistid`) REFERENCES `artist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
