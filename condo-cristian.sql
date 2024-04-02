-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 01:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `condo-cristian`
--

-- --------------------------------------------------------

--
-- Table structure for table `condo`
--

CREATE TABLE `condo` (
  `Apt_ID` int(11) NOT NULL,
  `Apt_Num` int(11) NOT NULL,
  `Apt_Name` varchar(255) NOT NULL,
  `Apt_Last` varchar(255) NOT NULL,
  `Apt_Postal` varchar(255) NOT NULL,
  `Apt_Sex` varchar(255) NOT NULL,
  `Apt_Email` varchar(255) NOT NULL,
  `Apt_Tel` varchar(255) NOT NULL,
  `Apt_Alt_Tel` varchar(255) NOT NULL,
  `Apt_Quota_Mon` float(9,2) NOT NULL,
  `Apt_Debt` float(9,2) NOT NULL,
  `Apt_Com_Sec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `condo`
--

INSERT INTO `condo` (`Apt_ID`, `Apt_Num`, `Apt_Name`, `Apt_Last`, `Apt_Postal`, `Apt_Sex`, `Apt_Email`, `Apt_Tel`, `Apt_Alt_Tel`, `Apt_Quota_Mon`, `Apt_Debt`, `Apt_Com_Sec`) VALUES
(8, 1, 'Cristian', 'Segui', 'Sabana Grande', '', 'CristianSeg@mail.com', '787', '787', 200.00, 1000.00, ''),
(9, 2, 'Juan', 'Quiñones', 'Street #2 Apt #2', '', 'JuanQ@emil.com', '585', '121', 100.00, 200.00, ''),
(10, 3, 'Rosa', 'Tirado', 'Street#3 aparment #3', 'Female', 'Ros.Tir@mail.com', '7894562315', '4854597896', 200.00, 200.00, 'Lives in the house with a lot of flowers.'),
(11, 4, 'Raul', 'Velez', 'Street #4 Apt#4', 'Male', 'RaVel@email.com', '1234564569', '4561237896', 50.00, 0.00, 'Super Car Guy');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `Info_ID` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Tel` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`Info_ID`, `Location`, `Tel`, `Email`) VALUES
(1, 'Sabana Grande PR', '787-765-1230', 'condo.cristian@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `Pay_ID` int(11) NOT NULL,
  `Apt_Num` int(11) NOT NULL,
  `Pay_Concept` varchar(255) NOT NULL,
  `Pay_Description` varchar(255) NOT NULL,
  `Pay_Amount` float(9,2) NOT NULL,
  `Pay_Method` varchar(255) NOT NULL,
  `Pay_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay`
--

INSERT INTO `pay` (`Pay_ID`, `Apt_Num`, `Pay_Concept`, `Pay_Description`, `Pay_Amount`, `Pay_Method`, `Pay_Date`) VALUES
(127, 1, 'Lawn Clean Up', 'For your Lawn', 100.00, '', '2023-05-08 21:24:40'),
(128, 1, 'Parked outside', '', 100.00, '', '2023-05-08 21:30:58'),
(130, 1, 'Paying back the lawn', 'He thanked us for cleaning the lawn.', 100.00, 'Cash', '2023-05-08 21:28:01'),
(131, 1, 'Paying part of the Month', 'He said he can pay the rest next week', 50.00, 'Debit', '2023-05-08 21:29:23'),
(132, 1, 'Paying the rest of the month', 'Like he said he would', 50.00, 'Credit', '2023-05-08 21:29:57'),
(133, 1, 'Monthly Quota!', '', 100.00, '', '2023-05-09 20:15:13'),
(134, 1, 'Monthly Quota!', '', 100.00, '', '2023-05-09 20:16:24'),
(200, 1, 'Monthly Quota!', 'This works now', 200.00, '', '2023-05-15 11:11:00'),
(201, 1, 'Monthly Quota!', 'Edits', 200.00, '', '2023-05-15 17:29:11'),
(209, 1, 'Monthly Quota!', 'Time is up', 200.00, '', '2023-05-15 17:29:40'),
(210, 2, 'Monthly Quota!', 'Time is up', 100.00, '', '2023-05-15 17:29:40'),
(211, 1, 'Monthly Quota!', 'This works now', 200.00, '', '2023-05-15 18:14:53'),
(212, 2, 'Monthly Quota!', 'This works now', 100.00, '', '2023-05-15 18:14:53'),
(213, 3, 'Monthly Quota!', 'This works now', 200.00, '', '2023-05-15 18:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `User_Last` varchar(255) NOT NULL,
  `User_Sex` varchar(255) NOT NULL,
  `User_Email` varchar(255) NOT NULL,
  `User_Tel` varchar(255) NOT NULL,
  `User_Alt_Tel` varchar(255) NOT NULL,
  `User_UsName` varchar(255) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `User_Comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `User_Last`, `User_Sex`, `User_Email`, `User_Tel`, `User_Alt_Tel`, `User_UsName`, `User_Password`, `User_Comment`) VALUES
(3, 'Juan', 'Del Valle', 'Male', 'Delvalle@email.co', '234', '234', 'Juan', '2f0fb5f650beebc026802c8f7baf80b6b6275243a73861b073f46751491afb88ed1ce04c3d98283a0e968c08ca7b80fb710d6ec0259311090a6f1c2d500ea0b8', 'New employee here'),
(4, 'Admin', 'Admin', 'Male', 'Admin@email.com', '123', '123', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'This was the error!'),
(5, 'Pedro', 'Sanchez', 'Male', 'SanPedro@mail.com', '123468796', '7896541236', 'Pedro', '31250129f3290c691935100597b50ea202265d36610def06565f0958188b38582584855abd10dc49ded337bc0e2ff79c277b60fc5273017cd6afdca9838085f1', 'Been working here for 2 years now.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `condo`
--
ALTER TABLE `condo`
  ADD PRIMARY KEY (`Apt_ID`),
  ADD KEY `pay_ibfk_1` (`Apt_Num`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`Info_ID`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`Pay_ID`),
  ADD KEY `pay_ibfk_1` (`Apt_Num`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `condo`
--
ALTER TABLE `condo`
  MODIFY `Apt_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `Info_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pay`
--
ALTER TABLE `pay`
  MODIFY `Pay_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pay`
--
ALTER TABLE `pay`
  ADD CONSTRAINT `pay_ibfk_1` FOREIGN KEY (`Apt_Num`) REFERENCES `condo` (`Apt_Num`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
