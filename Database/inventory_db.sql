-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2025 at 05:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `matcode` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`matcode`, `description`, `category`, `uom`, `quantity`) VALUES
('1695', 'Envelope - wdw reg no ass white for brnchs(500 pcs/box)', 'Paper & Paper Products', 'Box', 0),
('1823', 'Paper-bond w/letterhead, a4 size 70gsm\r\n', 'Paper & Paper Products', 'Ream', 0),
('1938', 'DEATH CLAIM APPLICATION PAGE 1\r\n', 'Printed Forms', 'RIM', 0),
('1939', 'RETIREMENT P.1', 'Printed Forms', 'RIM', 0),
('1949', 'DEATH CLAIM APPLICATION PAGE 2\r\n', 'Printed Forms', 'RIM', 0),
('1950', 'RETIREMENT P.2', 'Printed Forms', 'RIM', 0),
('1960', 'Correction tape\r\n', 'Supplies – Others', 'Piece', 0),
('1972', 'Plastic envelope, 10 x 15 gauge no. 5\r\n', 'Supplies – Others', 'Piece', 0),
('1976', 'MEMBER\'S/CLAIMANT\'S PHOTO SIGNATURE CARD', 'Printed Forms', 'RIM', 0),
('199', 'REGISTRY RETURN RECEIPT CARD\r\n', 'Printed Forms', ' ', 0),
('2067', 'Bond prem,ls, 216x330mm,70gsm 500shts/rm\r\n', 'Paper & Paper Products', 'Ream', 0),
('2136', 'Ink stamp pad, black\r\n', 'Supplies – Others', 'Piece', 0),
('222', 'L-501-SPECIMENT SIGNATURE CARD', 'Printed Forms', 'PC', 0),
('2276', 'Bond copy paper, a4 size,70gsm 500shts/rm', 'Paper & Paper Products', 'Ream', 8),
('2340', 'Ink for trodat dater, black 28ml/bottle', 'Supplies – Others', 'Bottle', 0),
('2366', 'Envelope, expanding kraftboard for legal docs.\r\n', 'Paper & Paper Products', 'Piece', 0),
('2386', 'Rel-9 rep 25sets/pad 4ply (carbonless)', 'Printed Forms', 'Pad', 0),
('2399', 'R-6 Misc p.r, 25shts 07\'13 (carbonless)\r\n', 'Printed Forms', 'Pad', 0),
('2519', 'E4-PAGE 1-MEMBER DATA CHANGE PAGE 1', 'Printed Forms', 'RIM', 0),
('2520', 'E4-PAGE 2-MEMBER DATA CHANGE PAGE 2\r\n', 'Printed Forms', 'RIM', 0),
('2521', 'PAYMENT SLIP-CONTRIBUTION\r\n', 'Printed Forms', 'RIM', 0),
('2536', 'Flag 3 x 6', 'Supplies – Others', 'Piece', 0),
('2537', 'Packaging tape 2”\r\n', 'Supplies – Others', 'Roll', 0),
('2538', 'Paper clip big\r\n', 'Supplies – Others', 'Box', 0),
('2546', 'Binder clip 3/4”\r\n', 'Supplies – Others', 'Box', 0),
('2551', 'Binder clip 1 1/4”\r\n', 'Supplies – Others', 'Box', 0),
('2552', 'Binder clip 2”\r\n', 'Supplies – Others', 'Box', 0),
('2576', 'PAYMENT SLIP-MEMBER LOAN', 'Printed Forms', 'Box', 0),
('2617', 'Alcohol, ethyl, 68%-72%\r\n', 'Supplies – Others', 'Gallon', 0),
('2618', 'Alcohol, ethyl, 68%-72% (500ml)\r\n', 'Supplies – Others', 'Bottle', 0),
('2631', 'File Organizer', 'Supplies – Others', 'Piece', 0),
('2634', 'Carbon film, legal\r\n', 'Paper & Paper Products', 'Box', 0),
('27', 'Bond copy paper, 8 1/2x 11\r\n', 'Paper & Paper Products', 'Ream', 0),
('2796', 'ACOP-Retirement/Permanent Disability\r\n', 'Printed Forms', 'RIM', 0),
('2797', 'ACOP-Surviving Spouse\r\n', 'Printed Forms', 'RIM', 0),
('2798', 'ACOP-Representative Payee', 'Printed Forms', 'RIM', 0),
('281', 'Paper – tissue\r\n', 'Supplies – Others', 'Roll', 0),
('2896', 'Staple wire remover\r\n', 'Supplies – Others', 'Piece', 0),
('293', 'Ink - stamp pad, violet', 'Supplies – Others', 'Bottle', 0),
('300', 'Tape - masking 1\r\n', 'Supplies – Others', 'Roll', 0),
('301', 'Tape - transparent 1\r\n', 'Supplies – Others', 'Roll', 0),
('305', 'Paper fastener, 50 pcs\r\n', 'Supplies – Others', 'Box', 0),
('306', 'Paper clip, 100 pcs', 'Supplies – Others', 'Box', 0),
('307', 'Rubber band - multicolor, 450 grams\r\n', 'Supplies – Others', 'Box', 0),
('308', 'Rubber band - transparent 445 grams\r\n', 'Supplies – Others', 'Bag', 0),
('309', 'Rag - camiseta\r\n', 'Supplies – Others', 'Kilo', 0),
('310', 'Staple wire, 5000 pcs\r\n', 'Supplies – Others', 'Box', 0),
('311', 'Twine - plastic\r\n', 'Supplies – Others', 'Roll', 0),
('312', 'Empty cartons', 'Supplies – Others', 'Piece', 0),
('313', 'Corrugated box', 'Supplies – Others', 'Set', 0),
('330', 'Folder - legal size, 36mm thick (14pts)\r\n', 'Paper & Paper Products', 'C', 0),
('331', 'Folder - cardboard loose lift 8-1/2x14\r\n', 'Paper & Paper Products', 'Set', 0),
('333', 'Record book, 300 pages\r\n', 'Supplies – Others', 'Piece', 0),
('334', 'Steno notebook, 50 sheets per pad', 'Supplies – Others', 'Piece', 0),
('336', 'Paste - solid w/ waterwell and applicator', 'Supplies – Others', 'Piece', 0),
('337', 'Ballpoint pen', 'Supplies – Others', 'Piece', 0),
('338', 'Marking pen\r\n', 'Supplies – Others', 'Piece', 0),
('339', 'Sign pen\r\n', 'Supplies – Others', 'Piece', 0),
('341', 'Ruler - plastic\r\n', 'Supplies – Others', 'Piece', 0),
('342', 'Stamp pad - big 3-7/16 x 5-5/8\r\n', 'Supplies – Others', 'Piece', 0),
('344', 'Waste basket\r\n', 'Supplies – Others', 'Piece', 0),
('345', 'Marking pen - whiteboard\r\n', 'Supplies – Others', 'Piece', 0),
('40', 'Envelope - window reg mailing only white (500 pcs/box)\r\n', 'Paper & Paper Products', 'Box', 0),
('46', 'Envelope - document, 10 x 15\r\n', 'Paper & Paper Products', 'C', 0),
('5', 'Cartolina - white, 22-1/2 x 28-1/2\r\n', 'Paper & Paper Products', 'Piece', 0),
('59', 'Envelope - expanding 11x15x 2 w/out flap\r\n', 'Paper & Paper Products', 'PC', 0),
('65', 'Folder - marble green\r\n', 'Paper & Paper Products', 'Set', 0),
('70', 'Paper - adding machine tape, 2-1/4\r\n', 'Paper & Paper Products', 'Piece', 0);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `logID` int(11) NOT NULL,
  `logDate` date NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `department` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `uom` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `department`, `date`) VALUES
(1, 'jomel', '$2y$10$me/4YKz6drysmsrrCcO3v.0CX.AseV8pC4Ocf4n1106GVaE0H2kPu', 'Ariate, Jomel Jay H.', 'Admin', '2025-06-25 03:01:30'),
(2, 'gerald', '$2y$10$lU0hNCru52UYa/wpb5uIN.obGTblBuXv07i7174nEKx4H7.APncdq', 'Gerald Rupido', 'MSS', '2025-06-25 06:08:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`matcode`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
