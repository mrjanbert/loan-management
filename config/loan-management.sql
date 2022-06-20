-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 08:39 AM
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
(2, 3, 0, '15th/30th'),
(3, 0, 0, 'Monthly'),
(4, 0, 0, '15th/30th'),
(5, 0, 0, '15th/30th'),
(6, 2, 0, 'Monthly'),
(7, 3, 0, 'Monthly'),
(8, 5, 1, 'Monthly'),
(9, 12, 0, 'Monthly'),
(10, 11, 0, 'Monthly'),
(11, 2, 0, '15th/30th'),
(12, 30, 1, 'Monthly'),
(13, 1, 2, '15th/30th');

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
(1, 'Small business', 'starting business'),
(2, 'Insurance', 'Insurance Loan'),
(3, 'Loan', 'loan \r\n'),
(4, 'Loanss', 'loansas'),
(5, 'Other Loan', 'other loans\r\n'),
(6, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `module_permission`
--

CREATE TABLE `module_permission` (
  `mod_id` int(2) NOT NULL,
  `accountNumber` int(255) NOT NULL,
  `mod_name` varchar(255) NOT NULL,
  `mod_create` tinyint(1) NOT NULL,
  `mod_read` tinyint(1) NOT NULL,
  `mod_update` tinyint(1) NOT NULL,
  `mod_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_permission`
--

INSERT INTO `module_permission` (`mod_id`, `accountNumber`, `mod_name`, `mod_create`, `mod_read`, `mod_update`, `mod_delete`) VALUES
(73, 139337001, 'Payments', 0, 1, 0, 0),
(74, 139337001, 'Manage Loans', 0, 1, 0, 0),
(75, 139337001, 'Loan Plans', 0, 1, 0, 0),
(76, 139337001, 'Loan Types', 0, 1, 0, 0),
(77, 139337001, 'Charges', 0, 1, 0, 0),
(78, 139337001, 'Borrowers', 0, 1, 0, 0),
(85, 139337001, 'User Management', 1, 1, 1, 0),
(93, 139337001, 'SMS Logs', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrowers`
--

CREATE TABLE `tbl_borrowers` (
  `borrower_id` int(10) NOT NULL,
  `account_number` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `userCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `email_address` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_borrowers`
--

INSERT INTO `tbl_borrowers` (`borrower_id`, `account_number`, `first_name`, `middle_name`, `last_name`, `address`, `age`, `profile_picture`, `birth_date`, `contact_number`, `userCreated`, `email_address`, `password`) VALUES
(1, 123303458, 'Janbert', 'Recimulo', 'Gabica', 'Capalaran, Tangub City', 22, 'resources/uploads/profile.png', '1999-10-11', '+639300344555', '2022-06-19 08:20:15', 'janbert.gabica@nmsc.edu.ph', 'MjAxOC0wNTYw');

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
(2, 'Other Charges', 1),
(3, 'Notarial Fees', 1),
(4, 'Other services', 1),
(5, 'Notarial Feesss', 1),
(6, 'Notarial Fees', 12),
(7, 'Sample charges', 1),
(8, 'test', 1);

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
  `id` int(10) NOT NULL,
  `transact_id` varchar(255) NOT NULL,
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
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `accountNumber`, `firstName`, `middleName`, `lastName`, `address`, `age`, `birthDate`, `profilePhoto`, `contactNumber`, `userCreated`, `email`, `password`, `user_role`) VALUES
(1, 139337001, 'Janbert', 'Recimulo', 'Gabica', 'Capalaran, Tangub City', 22, '1999-10-11', '', '9300344555', '2022-06-05 19:23:27', 'janbert.gabica@nmsc.edu.ph', 'MjAxOC0wNTYw', 'admin'),
(2, 134401297, 'Gann Deryl', 'Canino', 'Balili', 'Molicay, Ozamis City', 22, '2000-05-15', '', '+639197263539', '2022-06-06 14:57:51', 'gannderyl.balili@nmsc.edu.ph', 'MjAxOC0wMTY1', ''),
(3, 139447513, 'Nico', 'Fuentes', 'Sambiog', 'Tangub City', 22, '2000-04-09', '', '+639380012063', '2022-06-07 11:11:22', 'nico.sambiog@nmsc.edu.ph', 'MTIzNDU2Nzg5', ''),
(4, 137817594, 'nico', 'sambiog', 'fuentes', 'Banyadero ozamiz city', 22, '2000-04-09', '', '+639380012063', '2022-06-12 08:29:30', 'sambiog@gmail.com', 'MTIzNDU2Nzg5', ''),
(5, 133867891, 'John', 'Lana', 'Doe', 'United States', 23, '1999-12-15', '', '+639123456789', '2022-06-13 09:53:53', 'johndoe@email.com', 'MTIzNDU2Nzg5', '');

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
-- Indexes for table `module_permission`
--
ALTER TABLE `module_permission`
  ADD PRIMARY KEY (`mod_id`);

--
-- Indexes for table `tbl_borrowers`
--
ALTER TABLE `tbl_borrowers`
  ADD PRIMARY KEY (`borrower_id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `plan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `loantype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `module_permission`
--
ALTER TABLE `module_permission`
  MODIFY `mod_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tbl_borrowers`
--
ALTER TABLE `tbl_borrowers`
  MODIFY `borrower_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_charges`
--
ALTER TABLE `tbl_charges`
  MODIFY `charges_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_comakers`
--
ALTER TABLE `tbl_comakers`
  MODIFY `comaker_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
