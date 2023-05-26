-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 06:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbaccountsjuga`
--
CREATE DATABASE IF NOT EXISTS `dbaccountsjuga` DEFAULT CHARACTER SET utf8
COLLATE utf8_general_ci;
USE `dbaccountsjuga`;

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
`ID` int(10) UNSIGNED NOT NULL,
`NamaLengkap` varchar(100) NOT NULL,
`Username` varchar(100) NOT NULL,
`Email` varchar(100) NOT NULL,
`Pass` varchar(100) NOT NULL,
`Alamat` varchar(100) NOT NULL,
`Umur` int(10) NOT NULL,
`NoHp` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`ID`,`NamaLengkap` , `Username`, `Email`, `Pass`, `Alamat`, `Umur`, `NoHp`) VALUES
(1,'admin' , 'admin', '20104034@ittelkom-pwt.ac.id', 'admin', 'admin', 20, 0987654321);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;