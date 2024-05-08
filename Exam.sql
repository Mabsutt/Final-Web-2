-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 08, 2024 at 09:15 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `ID` int(11) NOT NULL,
  `BOOK` varchar(100) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `IS_ACTIVE` tinyint(1) NOT NULL,
  `USERID` varchar(11) DEFAULT NULL,
  `IMAGE_PATH` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`ID`, `BOOK`, `DESCRIPTION`, `IS_ACTIVE`, `USERID`, `IMAGE_PATH`, `Price`) VALUES
(9, 'JO & LAURE', 'best  seller', 1, '5', '../BackEnd/uploadedBooks/fe457550a8fea7e7a2dded5288635e1d.jpg', 12),
(10, 'Pride and Prejudice', 'good book', 1, '5', '../BackEnd/uploadedBooks/a289442adc325653e343496016ae1397.jpg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(70) NOT NULL,
  `USERNAME` varchar(80) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `PHONE_NUMBER` varchar(20) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `IS_ADMIN` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `EMAIL`, `USERNAME`, `PASSWORD`, `PHONE_NUMBER`, `CREATED_AT`, `IS_ADMIN`) VALUES
(1, 'ee@yqhoo.com', '11', '*0801D10217B06C5A9F32430C1A34E030D41A0257', '11', '2024-05-07 09:14:36', NULL),
(2, 'ee@yqhoo.com', '11', '*0801D10217B06C5A9F32430C1A34E030D41A0257', '11', '2024-05-07 09:16:39', 1),
(3, 'qaq@yahoo.com', 'check', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '123', '2024-05-07 09:21:47', 1),
(4, 'qwwaq@yahoo.comw', 'wwwwcheck', '*6EA02B5FC9AA5532F3DD97488BACB94C7CC6794E', '123', '2024-05-07 09:22:34', 0),
(5, 'walid@yahoo.com', 'walid', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '123', '2024-05-07 09:26:51', 1),
(6, 'mabsout@yahoo.com', 'mabsout', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '03240576', '2024-05-07 13:28:53', 0),
(7, 'Mabs@Mabs', 'maps', '*0FBFC0E07D0E116F77F18F4BAC635967D1D7292A', '8888', '2024-05-07 14:20:49', 1),
(8, 'Mabs@Mabs', 'maps', '*0FBFC0E07D0E116F77F18F4BAC635967D1D7292A', '8888', '2024-05-07 14:20:53', 1),
(13, 'Mabs@Mabs.com', 'maps', '*055B0CA27E1897F4B1D9ABBF029ED23F295D2F1F', '03240576', '2024-05-07 14:21:17', 1),


--
-- Indexes for dumped tables
--

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
