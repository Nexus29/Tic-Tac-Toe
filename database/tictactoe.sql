-- phpMyAdmin SQL Dump
-- version 5.2.3deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 11, 2026 at 09:18 AM
-- Server version: 11.8.3-MariaDB-1+b1 from Debian
-- PHP Version: 8.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tictactoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `giocatori`
--

CREATE TABLE `giocatori` (
  `giocatori_idGiocatore` int(11) NOT NULL,
  `giocatori_username` varchar(64) NOT NULL,
  `giocatori_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giocatori`
--

INSERT INTO `giocatori` (`giocatori_idGiocatore`, `giocatori_username`, `giocatori_password`) VALUES
(1, 'gaia', '1234'),
(2, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `partite`
--

CREATE TABLE `partite` (
  `partite_idPartita` int(11) NOT NULL,
  `partite_idGiocatore` int(11) NOT NULL,
  `partite_risultato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partite`
--

INSERT INTO `partite` (`partite_idPartita`, `partite_idGiocatore`, `partite_risultato`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giocatori`
--
ALTER TABLE `giocatori`
  ADD PRIMARY KEY (`giocatori_idGiocatore`);

--
-- Indexes for table `partite`
--
ALTER TABLE `partite`
  ADD PRIMARY KEY (`partite_idPartita`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giocatori`
--
ALTER TABLE `giocatori`
  MODIFY `giocatori_idGiocatore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partite`
--
ALTER TABLE `partite`
  MODIFY `partite_idPartita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
