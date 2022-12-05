-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 11:18 AM
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
-- Database: `vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` varchar(13) NOT NULL COMMENT 'หมายเลขบัตรประชาชน/หมายเลขบัตร',
  `number` int(2) NOT NULL COMMENT 'หมายเลขเลือกตั้ง',
  `name` varchar(50) NOT NULL COMMENT 'ชื่อ-สกุล ผู้ลงสมัคร',
  `description` text DEFAULT NULL COMMENT 'รายละเอียดต่าง ๆ',
  `photo` text NOT NULL COMMENT 'ที่อยุ่รูปภาพ',
  `year` int(4) NOT NULL COMMENT 'ปี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `number`, `name`, `description`, `photo`, `year`) VALUES
('1579900921147', 1, 'นายสมชาย บริบูรณ์', 'เพิ่มเงินเดือน', '1579900921147638db88f7fc63.jpg', 2564),
('1579900921148', 2, 'สมหมาย สมใจอยาก', 'นั้นแหละ ๆ', '1579900921148638dbba2c3e93.jpg', 2565),
('1579900921149', 3, 'dawd fde', '1579900921147', '1579900921149638dc1e4dea14.gif', 2643);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `status` int(1) NOT NULL COMMENT 'สถานะเปิด/ปิดการเลือกตั้ง 1 | 0',
  `name` varchar(20) NOT NULL COMMENT 'ชื่อการเลือกตั้ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`status`, `name`) VALUES
(1, 'การเลือกตั้งประธาน');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(13) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `role`) VALUES
('somchai2647', '123456', 'Somchai', 'admin'),
('user01', '123456', 'นายเอ มาเยอะ', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `chairman` int(2) NOT NULL COMMENT 'หมายเลขลำดับผู้เลือกตั้ง',
  `user` varchar(13) NOT NULL COMMENT 'ชื่อผู้ใช้งานลงเลือกตั้ง',
  `created_date` varchar(10) DEFAULT NULL COMMENT 'วันเวลาลงคะแนน',
  `year` int(4) NOT NULL COMMENT 'ปีการลงคะแนน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq number` (`number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
