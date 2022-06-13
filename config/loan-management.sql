-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 09:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `loan_plans`
--

CREATE TABLE `loan_plans` (
  `plan_id` int(10) NOT NULL,
  `plan_term` int(10) NOT NULL,
  `interest_percentage` int(10) NOT NULL,
  `mode_of_payment` varchar(100) NOT NULL COMMENT 'Monthly or 15th/30th'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_plans`
--

INSERT INTO `loan_plans` (`plan_id`, `plan_term`, `interest_percentage`, `mode_of_payment`) VALUES
(1, 6, 0, 'Monthly'),
(2, 3, 0, '15th/30th');

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `loantype_id` int(11) NOT NULL,
  `typeofLoan` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`loantype_id`, `typeofLoan`, `description`) VALUES
(1, 'Small business', 'starting business');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_charges`
--

CREATE TABLE `tbl_charges` (
  `charges_id` int(10) NOT NULL,
  `charges_type` varchar(255) NOT NULL,
  `charge_percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_charges`
--

INSERT INTO `tbl_charges` (`charges_id`, `charges_type`, `charge_percentage`) VALUES
(1, 'Service Charge', 1),
(2, 'Other Charges', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comakers`
--

CREATE TABLE `tbl_comakers` (
  `comaker_id` int(10) NOT NULL,
  `cm_firstName` varchar(255) NOT NULL,
  `cm_middleName` varchar(255) NOT NULL,
  `cm_lastName` varchar(255) NOT NULL,
  `cm_address` varchar(255) NOT NULL,
  `cm_birthDate` date NOT NULL,
  `cm_emailAddress` varchar(255) NOT NULL,
  `cm_contactNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `transact_id` int(10) NOT NULL,
  `reference_id` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `plan_id` int(10) NOT NULL,
  `loantype_id` int(10) NOT NULL,
  `comaker_id` int(10) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `transact_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(10) NOT NULL,
  `accountNumber` int(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `birthDate` date NOT NULL,
  `profilePhoto` varchar(255) NOT NULL,
  `contactNumber` varchar(50) NOT NULL,
  `userCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `accountNumber`, `firstName`, `middleName`, `lastName`, `address`, `age`, `birthDate`, `profilePhoto`, `contactNumber`, `userCreated`, `email`, `password`) VALUES
(1, 139337001, 'Janbert', 'Recimulo', 'Gabica', 'Capalaran, Tangub City', 22, '1999-10-11', '', '9300344555', '2022-06-05 19:23:27', 'janbert.gabica@nmsc.edu.ph', 'MjAxOC0wNTYw'),
(2, 134401297, 'Gann Deryl', 'Canino', 'Balili', 'Molicay, Ozamis City', 22, '2000-05-15', '', '+639197263539', '2022-06-06 14:57:51', 'gannderyl.balili@nmsc.edu.ph', 'MjAxOC0wMTY1'),
(3, 139447513, 'Nico', 'Fuentes', 'Sambiog', 'Tangub City', 22, '2000-04-09', '', '+639380012063', '2022-06-07 11:11:22', 'nico.sambiog@nmsc.edu.ph', 'MTIzNDU2Nzg5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loan_plans`
--
ALTER TABLE `loan_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`loantype_id`);

--
-- Indexes for table `tbl_charges`
--
ALTER TABLE `tbl_charges`
  ADD PRIMARY KEY (`charges_id`);

--
-- Indexes for table `tbl_comakers`
--
ALTER TABLE `tbl_comakers`
  ADD PRIMARY KEY (`comaker_id`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`transact_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan_plans`
--
ALTER TABLE `loan_plans`
  MODIFY `plan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `loantype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_charges`
--
ALTER TABLE `tbl_charges`
  MODIFY `charges_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_comakers`
--
ALTER TABLE `tbl_comakers`
  MODIFY `comaker_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `transact_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
