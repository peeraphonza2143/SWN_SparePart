-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 03:45 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swn_project1.1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invertory_sparepart`
--

CREATE TABLE `tbl_invertory_sparepart` (
  `Iv_ID` int(11) NOT NULL,
  `Iv_year` varchar(100) NOT NULL,
  `Iv_month` int(11) NOT NULL,
  `Iv_Mfg` varchar(100) NOT NULL,
  `Iv_Num_befor` int(11) NOT NULL,
  `Iv_Num_Add` int(11) NOT NULL,
  `Iv_Num_reduce` int(11) NOT NULL,
  `Iv_Num_after` int(11) NOT NULL,
  `Iv_Status` varchar(100) NOT NULL,
  `datesave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_invertory_sparepart`
--

INSERT INTO `tbl_invertory_sparepart` (`Iv_ID`, `Iv_year`, `Iv_month`, `Iv_Mfg`, `Iv_Num_befor`, `Iv_Num_Add`, `Iv_Num_reduce`, `Iv_Num_after`, `Iv_Status`, `datesave`) VALUES
(152, '2021', 7, '1', 214, 0, 0, 214, 'First', '2021-07-07 06:19:01'),
(153, '2021', 7, '2', 1091, 20, 0, 1111, 'First', '2021-07-07 06:19:01'),
(154, '2021', 7, '3', 0, 0, 0, 0, 'First', '2021-07-07 06:19:01'),
(155, '2021', 7, '4', 0, 0, 0, 0, 'First', '2021-07-07 06:19:01'),
(156, '2021', 7, '5', 0, 0, 0, 0, 'First', '2021-07-07 06:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_ID` int(11) NOT NULL,
  `member_username` varchar(20) NOT NULL,
  `member_pass` varchar(20) NOT NULL,
  `member_nameF` varchar(100) NOT NULL,
  `member_nameL` varchar(100) NOT NULL,
  `member_PIN` varchar(100) NOT NULL,
  `member_department` varchar(100) NOT NULL,
  `member_Tel` varchar(100) NOT NULL,
  `member_Role` varchar(100) NOT NULL,
  `member_Key_Line` varchar(100) NOT NULL,
  `member_Alert_count` int(11) NOT NULL,
  `member_Alert_count2` int(11) NOT NULL,
  `datesave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_ID`, `member_username`, `member_pass`, `member_nameF`, `member_nameL`, `member_PIN`, `member_department`, `member_Tel`, `member_Role`, `member_Key_Line`, `member_Alert_count`, `member_Alert_count2`, `datesave`) VALUES
(1, '111', '111', 'admin1', 'admin1', 'ST024', 'Improvement', '0981545067', 'Super', '0', 0, 0, '2018-11-16 05:34:50'),
(7, '222', '222', '222', '222', '222', '222', '222', 'Admin', '0', 0, 0, '2021-07-01 09:47:23'),
(8, '333', '333', '333', '333', '33789', '333', '333', 'Member', '0', 0, 0, '2021-07-01 09:52:31'),
(11, '999', '999', '999', '999', '999', '999', '999', 'Member', '0', 0, 0, '2021-07-06 03:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spare_part`
--

CREATE TABLE `tbl_spare_part` (
  `Sp_ID` int(11) NOT NULL,
  `Sp_number` varchar(20) NOT NULL,
  `Sp_Name` varchar(20) NOT NULL,
  `Sp_Itemgroup` varchar(100) NOT NULL,
  `Sp_warehouse` varchar(100) NOT NULL,
  `Sp_Quantity` int(11) NOT NULL,
  `Sp_Mfg` varchar(100) NOT NULL,
  `Sp_Image` varchar(100) NOT NULL,
  `Sp_Unit` varchar(100) NOT NULL,
  `datesave` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_spare_part`
--

INSERT INTO `tbl_spare_part` (`Sp_ID`, `Sp_number`, `Sp_Name`, `Sp_Itemgroup`, `Sp_warehouse`, `Sp_Quantity`, `Sp_Mfg`, `Sp_Image`, `Sp_Unit`, `datesave`) VALUES
(5, '', '', '', '', 20, '', 'uploads/bird.png', '', '2021-07-02'),
(58, '123', '123', '123', '12', 1111, '2', 'uploads/', '123', '2021-07-06'),
(59, 'SED101142', '123', '456', '123', 102, '1', 'uploads/', '1', '2021-07-07'),
(60, 'SMD', '1213465', '1', '23', 112, '1', 'uploads/', '10', '2021-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_withdraw_sparepart`
--

CREATE TABLE `tbl_withdraw_sparepart` (
  `withdraw_ID` int(11) NOT NULL,
  `withdraw_member_PIN` varchar(100) NOT NULL,
  `withdraw_member_name` varchar(100) NOT NULL,
  `withdraw_Item_number` varchar(100) NOT NULL,
  `withdraw_Item_name` varchar(100) NOT NULL,
  `withdraw_Mfg` varchar(100) NOT NULL,
  `withdraw_Quantity` int(11) NOT NULL,
  `withdraw_Status` varchar(100) NOT NULL,
  `withdraw_cause` varchar(100) NOT NULL,
  `withdraw_date` varchar(100) NOT NULL,
  `withdraw_day` int(11) NOT NULL,
  `withdraw_month` varchar(100) NOT NULL,
  `withdraw_year` varchar(100) NOT NULL,
  `withdraw_date_use` varchar(100) NOT NULL,
  `datesave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_invertory_sparepart`
--
ALTER TABLE `tbl_invertory_sparepart`
  ADD PRIMARY KEY (`Iv_ID`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_ID`);

--
-- Indexes for table `tbl_spare_part`
--
ALTER TABLE `tbl_spare_part`
  ADD PRIMARY KEY (`Sp_ID`);

--
-- Indexes for table `tbl_withdraw_sparepart`
--
ALTER TABLE `tbl_withdraw_sparepart`
  ADD PRIMARY KEY (`withdraw_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_invertory_sparepart`
--
ALTER TABLE `tbl_invertory_sparepart`
  MODIFY `Iv_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_spare_part`
--
ALTER TABLE `tbl_spare_part`
  MODIFY `Sp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_withdraw_sparepart`
--
ALTER TABLE `tbl_withdraw_sparepart`
  MODIFY `withdraw_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
