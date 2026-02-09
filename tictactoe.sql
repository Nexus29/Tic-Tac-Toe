-- phpMyAdmin SQL Dump
-- version 5.2.3deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2026 at 12:02 PM
-- Server version: 11.8.5-MariaDB-3 from Debian
-- PHP Version: 8.4.16

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
(1, 'gaia', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `partite`
--

CREATE TABLE `partite` (
  `partite_idPartita` int(11) NOT NULL,
  `partite_idGiocatore` int(11) NOT NULL,
  `partite_vittorie` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `giocatori_idGiocatore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partite`
--
ALTER TABLE `partite`
  MODIFY `partite_idPartita` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
