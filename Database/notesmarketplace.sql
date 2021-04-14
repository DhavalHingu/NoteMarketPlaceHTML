-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 01:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notesmarketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Country_code` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `Name`, `Country_code`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'India', '+91', '2021-03-22 14:23:42', 1, NULL, NULL, b'01'),
(2, '', '', '2021-03-25 19:33:52', 1, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `Seller` int(11) NOT NULL,
  `Downloader` int(11) NOT NULL,
  `Allowed_Download` bit(1) NOT NULL,
  `Attachment_path` varchar(500) DEFAULT NULL,
  `Attachment_downloaded` bit(2) NOT NULL,
  `Attachment_downloaded_date` datetime DEFAULT NULL,
  `IsPaid` int(11) NOT NULL,
  `Purchased_price` decimal(10,0) DEFAULT NULL,
  `Note_title` varchar(100) NOT NULL,
  `Note_category` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `note_id`, `Seller`, `Downloader`, `Allowed_Download`, `Attachment_path`, `Attachment_downloaded`, `Attachment_downloaded_date`, `IsPaid`, `Purchased_price`, `Note_title`, `Note_category`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 38, 10, 10, b'1', 'notes/DUEREPORT.pdf', b'00', NULL, 4, '550', 'dT Manual', '1', '2021-04-02 10:41:32', 10, NULL, NULL, b'01'),
(2, 52, 10, 5, b'1', 'notes/STOCKREPORT.pdf', b'00', NULL, 4, '5555', 'aaaa', '1', '2021-04-02 11:06:20', 5, NULL, NULL, b'01'),
(3, 53, 10, 5, b'0', 'notes/depwisekot.pdf', b'00', NULL, 4, '889', 'sdfd', '1', '2021-04-02 11:10:56', 5, NULL, NULL, b'01'),
(4, 76, 15, 5, b'0', 'notes/PURCHASEBILL.pdf', b'00', NULL, 4, '99', 'Hanuman Chalisha', '1', '2021-04-02 11:20:26', 5, NULL, NULL, b'01'),
(5, 72, 5, 5, b'0', 'notes/KOTBILL.pdf', b'00', NULL, 4, '900', 'Database management system', '1', '2021-04-02 12:47:33', 5, NULL, NULL, b'01'),
(6, 55, 10, 5, b'0', 'notes/DAILYSALES.pdf', b'00', NULL, 4, '7894', 'yuiuhgjnb', '1', '2021-04-02 12:50:11', 5, NULL, NULL, b'01'),
(22, 75, 5, 5, b'1', 'notes/STOCKREPORT.pdf', b'00', NULL, 4, '8000', 'design pattern', '1', '2021-04-02 20:19:03', 5, NULL, NULL, b'01'),
(24, 73, 5, 5, b'1', 'notes/Domain&Hosting_hostinger.co.uk.pdf', b'00', NULL, 4, '42', 'yghj', '1', '2021-04-02 20:29:44', 5, NULL, NULL, b'01'),
(35, 53, 10, 10, b'0', 'notes/depwisekot.pdf', b'00', NULL, 4, '889', 'sdfd', '1', '2021-04-03 12:10:05', 10, NULL, NULL, b'01'),
(37, 73, 5, 10, b'1', 'notes/Domain&Hosting_hostinger.co.uk.pdf', b'00', NULL, 4, '42', 'yghj', '1', '2021-04-03 12:13:31', 10, NULL, NULL, b'01'),
(38, 78, 5, 5, b'1', 'notes/PURCHASEBILL.pdf', b'00', NULL, 4, '200', 'win friends', '1', '2021-04-03 16:19:46', 5, NULL, NULL, b'01'),
(39, 54, 10, 5, b'0', 'notes/KOTCUSTOM.pdf', b'00', NULL, 4, '9874', 'dcffdvcfvfcvfcvfcvfcvfc', '1', '2021-04-03 16:32:39', 5, NULL, NULL, b'01'),
(40, 57, 10, 5, b'0', 'notes/STOCKREPORT.pdf', b'00', NULL, 4, '9856', 'pqrs', '1', '2021-04-03 16:45:02', 5, NULL, NULL, b'01'),
(41, 60, 10, 5, b'0', 'notes/depwisekot.pdf', b'00', NULL, 4, '4952', 'gvhjn', '1', '2021-04-03 16:46:47', 5, NULL, NULL, b'01'),
(42, 76, 10, 10, b'0', 'notes/PURCHASEBILL.pdf', b'00', NULL, 4, '99', 'Hanuman Chalisha', '1', '2021-04-03 16:48:36', 10, NULL, NULL, b'01'),
(43, 78, 5, 10, b'0', 'notes/PURCHASEBILL.pdf', b'00', NULL, 4, '200', 'win friends', '1', '2021-04-03 16:50:16', 10, NULL, NULL, b'01'),
(44, 71, 11, 10, b'0', 'notes/DUEREPORT.pdf', b'00', NULL, 4, '95', 'yyyy', '1', '2021-04-03 16:52:26', 10, NULL, NULL, b'01'),
(59, 77, 10, 10, b'1', 'notes/depwisekot.pdf', b'00', NULL, 5, '0', 'php', '1', '2021-04-03 23:49:48', 10, NULL, NULL, b'01'),
(63, 60, 10, 10, b'0', 'notes/depwisekot.pdf', b'00', NULL, 4, '4952', 'gvhjn', '1', '2021-04-03 23:58:00', 10, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `notecategories`
--

CREATE TABLE `notecategories` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notecategories`
--

INSERT INTO `notecategories` (`id`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'abc', 'ghjk', '2021-03-22 14:10:50', NULL, NULL, 1, b'01'),
(2, '', '', '2021-03-25 19:35:27', 1, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `note_types`
--

CREATE TABLE `note_types` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note_types`
--

INSERT INTO `note_types` (`id`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'cfgv', 'gh', '2021-03-24 16:31:59', 1, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `referencedata`
--

CREATE TABLE `referencedata` (
  `id` int(11) NOT NULL,
  `Value` varchar(100) NOT NULL,
  `Datavalue` varchar(100) NOT NULL,
  `RefCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referencedata`
--

INSERT INTO `referencedata` (`id`, `Value`, `Datavalue`, `RefCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Male', 'M', 'Gender', '2021-03-21 21:29:43', 1, NULL, NULL, b'01'),
(2, 'Female', 'Fe', 'Gender', '2021-03-21 21:32:11', 1, NULL, NULL, b'01'),
(3, 'Unknown', 'U', 'Gender', '2021-03-21 21:32:45', 1, NULL, NULL, b'00'),
(4, 'Paid', 'P', 'Selling Mode', '2021-03-21 21:33:26', 1, NULL, NULL, b'01'),
(5, 'Free', 'F', 'Selling Mode', '2021-03-21 21:34:23', 1, NULL, NULL, b'01'),
(6, 'Draft', 'Draft', 'Notes Status', '2021-03-21 21:35:16', 1, NULL, NULL, b'01'),
(7, 'Submitted For review', 'Submitted For review', 'Notes Review', '2021-03-21 21:35:55', 1, NULL, NULL, b'01'),
(8, 'In Review', 'In Review', 'Notes Status', '2021-03-21 21:36:56', 1, NULL, NULL, b'01'),
(9, 'Published', 'Approved', 'Notes Status', '2021-03-21 21:37:47', 1, NULL, NULL, b'01'),
(10, 'Rejected', 'Rejected', 'Notes Status', '2021-03-21 21:38:24', 1, NULL, NULL, b'01'),
(11, 'Removed', 'Removed', 'Notes Status', '2021-03-21 21:39:30', 1, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes`
--

CREATE TABLE `seller_notes` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `ActionedBy` int(11) DEFAULT NULL,
  `AdminRemarks` varchar(500) DEFAULT NULL,
  `Published_date` datetime DEFAULT NULL,
  `Title` varchar(100) NOT NULL,
  `Category` int(11) NOT NULL,
  `Display_picture` varchar(500) DEFAULT NULL,
  `Note_type` int(11) DEFAULT NULL,
  `Number_of_pages` int(11) DEFAULT NULL,
  `Description` varchar(500) NOT NULL,
  `University_name` varchar(200) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `Course_code` varchar(100) DEFAULT NULL,
  `Professor` varchar(100) DEFAULT NULL,
  `IsPaid` int(11) NOT NULL,
  `Selling_price` decimal(10,0) DEFAULT NULL,
  `NotesPreview` varchar(500) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_notes`
--

INSERT INTO `seller_notes` (`id`, `seller_id`, `status`, `ActionedBy`, `AdminRemarks`, `Published_date`, `Title`, `Category`, `Display_picture`, `Note_type`, `Number_of_pages`, `Description`, `University_name`, `Country`, `Course`, `Course_code`, `Professor`, `IsPaid`, `Selling_price`, `NotesPreview`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(38, 10, 7, NULL, NULL, NULL, 'DT Manual', 1, 'images/aa.jpg', 1, 55, 'Hotel Store System Manual', 'Dhaval  Technosoft', 1, '[DT] Softawares', '007', 'Dhaval Hingu', 4, '550', 'notes/slazzer-edit-image(1).png', '2021-03-24 18:56:04', 10, NULL, NULL, b'00'),
(53, 10, 7, NULL, NULL, NULL, 'sdfd', 1, 'images/aa.jpg', 1, 45, 'gyhujik', 'ghjk', 1, 'jnkml', '456', 'hjnkml', 4, '889', 'notes/dh.jpg', '2021-03-25 12:59:34', 10, NULL, NULL, b'01'),
(55, 10, 7, NULL, NULL, NULL, 'yuiuhgjnb', 1, 'images/aa.jpg', 1, 44, 'gyhjk', 'tgyuhij', 1, 'gvhbj', '444', 'ghj', 4, '7894', 'notes/dh.jpg', '2021-03-25 13:05:51', 10, NULL, NULL, b'01'),
(60, 10, 7, NULL, NULL, NULL, 'gvhjn', 1, 'images/aa.jpg', 1, 452, 'gyhjkl;', 'dfgh', 1, 'ghjk', '455', 'cfgvhbj', 4, '4952', 'notes/dh.jpg', '2021-03-25 14:34:40', 10, NULL, NULL, b'01'),
(71, 11, 7, NULL, NULL, NULL, 'yyyy', 1, 'images/aa.jpg', 1, 405, 'ghjk', 'gthjk', 1, 'ghjk', '44', 'hjnkm', 4, '95', 'notes/dt-removebg-preview(1).png', '2021-03-25 15:25:20', 11, NULL, NULL, b'01'),
(72, 5, 7, NULL, NULL, NULL, 'Database management system', 1, 'images/apna.jpg', 1, 480, 'You can learn backend here..', 'BVM', 1, 'Software Developement', '55', 'Dhaval Hingu', 4, '900', 'notes/DAILYSALES.pdf', '2021-03-29 15:18:35', 5, NULL, NULL, b'01'),
(73, 5, 6, NULL, NULL, NULL, 'yghj', 1, 'images/1729008_d167_6.jpg', 1, 444, 'cvbnm', 'vgbhnj', 1, 'vghbjn', '124', 'cvghbj', 4, '42', 'notes/PURCHASEBILL.pdf', '2021-03-29 15:22:52', 5, NULL, NULL, b'11'),
(74, 5, 6, NULL, NULL, NULL, 'design pattern', 1, 'images/apana-hotel.jpg', 1, 55, 'You can learn best practises over coding here.', 'BVM', 1, 'Software Developemnet', '556', 'Dhaval Hingu', 4, '800', 'notes/KOTCUSTOM.pdf', '2021-03-29 15:29:22', 5, NULL, NULL, b'11'),
(75, 5, 7, NULL, NULL, NULL, 'design pattern', 1, 'images/apana-hotel.jpg', 1, 55, 'You can learn best practises over coding here.', 'BVM', 1, 'Software Developemnet', '556', 'Dhaval Hingu', 4, '8000', 'notes/KOTCUSTOM.pdf', '2021-03-29 15:29:56', 5, NULL, NULL, b'01'),
(77, 5, 7, NULL, NULL, NULL, 'php', 1, 'images/images.png', 1, 445, 'hbjnkm', 'bvm', 1, 'computer', '26', 'hjk', 5, '0', 'notes/KOTCUSTOM.pdf', '2021-04-01 07:15:24', 5, NULL, NULL, b'01'),
(79, 10, 7, NULL, NULL, NULL, 'aaaa', 1, 'images/', 1, 99, 'hjnkml,;', 'ghjik', 1, 'hjk', '456', 'ghjk', 4, '5555', 'notes/', '2021-04-03 21:43:08', 10, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes_attachments`
--

CREATE TABLE `seller_notes_attachments` (
  `id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `File_name` varchar(100) NOT NULL,
  `File_path` varchar(500) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_notes_attachments`
--

INSERT INTO `seller_notes_attachments` (`id`, `note_id`, `File_name`, `File_path`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(5, 38, 'DUEREPORT.pdf', 'notes/DUEREPORT.pdf', '2021-03-24 18:56:04', 10, NULL, NULL, b'00'),
(6, 52, 'STOCKREPORT.pdf', 'notes/STOCKREPORT.pdf', '2021-03-25 12:53:27', 10, NULL, NULL, b'01'),
(7, 53, 'depwisekot.pdf', 'notes/depwisekot.pdf', '2021-03-25 12:59:34', 10, NULL, NULL, b'01'),
(8, 54, 'KOTCUSTOM.pdf', 'notes/KOTCUSTOM.pdf', '2021-03-25 13:02:45', 10, NULL, NULL, b'01'),
(9, 55, 'DAILYSALES.pdf', 'notes/DAILYSALES.pdf', '2021-03-25 13:05:51', 10, NULL, NULL, b'01'),
(10, 56, 'STOCKREPORT.pdf', 'notes/STOCKREPORT.pdf', '2021-03-25 13:32:39', 10, NULL, NULL, b'01'),
(11, 57, 'STOCKREPORT.pdf', 'notes/STOCKREPORT.pdf', '2021-03-25 13:37:14', 10, NULL, NULL, b'01'),
(12, 58, 'PURCHASEBILL.pdf', 'notes/PURCHASEBILL.pdf', '2021-03-25 14:02:33', 10, NULL, NULL, b'01'),
(13, 59, 'STOCKREPORT.pdf', 'notes/STOCKREPORT.pdf', '2021-03-25 14:30:27', 10, NULL, NULL, b'01'),
(14, 60, 'depwisekot.pdf', 'notes/depwisekot.pdf', '2021-03-25 14:34:40', 10, NULL, NULL, b'01'),
(15, 71, 'DUEREPORT.pdf', 'notes/DUEREPORT.pdf', '2021-03-25 15:25:20', 11, NULL, NULL, b'01'),
(16, 72, 'DUEREPORT.pdf', 'notes/DUEREPORT.pdf', '2021-03-29 15:18:35', 5, NULL, NULL, b'01'),
(17, 72, 'KOTBILL.pdf', 'notes/KOTBILL.pdf', '2021-03-29 15:18:35', 5, NULL, NULL, b'01'),
(19, 74, 'STOCKREPORT.pdf', 'notes/STOCKREPORT.pdf', '2021-03-29 15:29:22', 5, NULL, NULL, b'01'),
(20, 75, 'STOCKREPORT.pdf', 'notes/STOCKREPORT.pdf', '2021-03-29 15:29:56', 5, NULL, NULL, b'01'),
(21, 76, 'PURCHASEBILL.pdf', 'notes/PURCHASEBILL.pdf', '2021-03-31 17:11:56', 15, NULL, NULL, b'01'),
(22, 77, 'depwisekot.pdf', 'notes/depwisekot.pdf', '2021-04-01 07:15:24', 5, NULL, NULL, b'01'),
(23, 78, 'PURCHASEBILL.pdf', 'notes/PURCHASEBILL.pdf', '2021-04-03 10:15:35', 5, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes_reported_issues`
--

CREATE TABLE `seller_notes_reported_issues` (
  `id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `reported_id` int(11) NOT NULL,
  `download_id` int(11) NOT NULL,
  `Remarks` varchar(500) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes_reviews`
--

CREATE TABLE `seller_notes_reviews` (
  `id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `download_id` int(11) NOT NULL,
  `Ratings` decimal(10,0) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_configurations`
--

CREATE TABLE `system_configurations` (
  `id` int(11) NOT NULL,
  `Key` varchar(100) NOT NULL,
  `Value` varchar(500) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email_id` varchar(100) NOT NULL,
  `Password` varchar(24) NOT NULL,
  `IsEmailVerified` bit(1) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT 0,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `FirstName`, `LastName`, `Email_id`, `Password`, `IsEmailVerified`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(3, 1, 'Admin', '', 'admin@admin.com', 'admin123', b'1', '2021-03-17 20:57:38', NULL, NULL, NULL, b'01'),
(5, 2, 'Dhaval', 'Hingu', 'dhaval7030@gmail.com', 'dhaval123', b'1', NULL, NULL, NULL, NULL, b'01'),
(10, 2, 'Shree ', 'Bhai', 'dhaval1234545@gmail.com', '456', b'1', NULL, NULL, NULL, NULL, b'01'),
(11, 2, 'abcd', 'efgh', 'abc@abc.com', '4567', b'1', NULL, NULL, NULL, NULL, b'01'),
(12, 3, '', '', 'superadmin@admin.com', 'superAdmin@123', b'1', NULL, NULL, NULL, NULL, b'01'),
(13, 2, 'd', 'hjn', 'd@d.com', 'Dhaval@123', NULL, NULL, NULL, NULL, NULL, b'01'),
(15, 2, 'alpesh', 'solanki', 'greentech.solutions.77@gmail.com', 'Green@123', b'1', NULL, NULL, NULL, NULL, b'01'),
(16, 2, 'abcd', 'abc', 'abcd@abc.com', 'Dhaval@123', NULL, NULL, NULL, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `DOB` datetime DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `SecondaryEmailAddress` varchar(100) NOT NULL,
  `CountryCode` varchar(5) NOT NULL,
  `Phone_number` varchar(20) NOT NULL,
  `Profile_picture` varchar(500) DEFAULT NULL,
  `Addressline_1` varchar(100) NOT NULL,
  `Addressline_2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Zipcode` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `University` varchar(100) DEFAULT NULL,
  `College` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `DOB`, `Gender`, `SecondaryEmailAddress`, `CountryCode`, `Phone_number`, `Profile_picture`, `Addressline_1`, `Addressline_2`, `City`, `State`, `Zipcode`, `Country`, `University`, `College`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(7, 10, '1999-08-21 00:00:00', 1, 'dhaval1234545@gmail.com', '', '9574926575							', 'images/logo.png', 'bhjnkm', 'hjk', 'hjk', 'yhuji', '845120', '2', 'gh', 'gyhu ', NULL, NULL, NULL, NULL, b'01'),
(8, 11, '2021-03-21 00:00:00', 2, 'abc@abc.com', '1', '9714841723', 'images/1729008_d167_6.jpg', 'hjk', 'hbjnk', 'jnkm', 'jnkm', '5148', '1', 'ghjk', 'hjk', NULL, NULL, NULL, NULL, b'01'),
(9, 5, '1999-08-21 00:00:00', 1, 'dhaval7030@gmail.com', '1', '9714841723										', 'images/apna.jpg', 'gokul', 'nagar', 'una', 'gujrat', '362560', '1', 'abc', 'abc              ', NULL, NULL, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(450) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Administrator', 'Admin Member', '2021-03-16 13:59:38', NULL, NULL, NULL, b'01'),
(2, 'Member', 'User Member', '2021-03-16 14:00:29', NULL, NULL, NULL, b'01'),
(3, 'master', 'Super Admin', '2021-03-31 16:12:48', NULL, NULL, NULL, b'01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_id` (`note_id`),
  ADD KEY `Seller` (`Seller`),
  ADD KEY `Downloader` (`Downloader`);

--
-- Indexes for table `notecategories`
--
ALTER TABLE `notecategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note_types`
--
ALTER TABLE `note_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referencedata`
--
ALTER TABLE `referencedata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_notes`
--
ALTER TABLE `seller_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `status` (`status`),
  ADD KEY `Category` (`Category`),
  ADD KEY `Country` (`Country`),
  ADD KEY `Note_type` (`Note_type`),
  ADD KEY `ActionedBy` (`ActionedBy`);

--
-- Indexes for table `seller_notes_attachments`
--
ALTER TABLE `seller_notes_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_id` (`note_id`);

--
-- Indexes for table `seller_notes_reported_issues`
--
ALTER TABLE `seller_notes_reported_issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_id` (`note_id`),
  ADD KEY `reported_id` (`reported_id`),
  ADD KEY `download_id` (`download_id`);

--
-- Indexes for table `seller_notes_reviews`
--
ALTER TABLE `seller_notes_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_id` (`note_id`),
  ADD KEY `reviewer_id` (`reviewer_id`),
  ADD KEY `download_id` (`download_id`);

--
-- Indexes for table `system_configurations`
--
ALTER TABLE `system_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `Gender` (`Gender`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `notecategories`
--
ALTER TABLE `notecategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `note_types`
--
ALTER TABLE `note_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `referencedata`
--
ALTER TABLE `referencedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seller_notes`
--
ALTER TABLE `seller_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `seller_notes_attachments`
--
ALTER TABLE `seller_notes_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `seller_notes_reported_issues`
--
ALTER TABLE `seller_notes_reported_issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_notes_reviews`
--
ALTER TABLE `seller_notes_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_configurations`
--
ALTER TABLE `system_configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_notes` (`id`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`Seller`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `downloads_ibfk_3` FOREIGN KEY (`Downloader`) REFERENCES `users` (`id`);

--
-- Constraints for table `seller_notes`
--
ALTER TABLE `seller_notes`
  ADD CONSTRAINT `seller_notes_ibfk_1` FOREIGN KEY (`status`) REFERENCES `referencedata` (`id`),
  ADD CONSTRAINT `seller_notes_ibfk_2` FOREIGN KEY (`Category`) REFERENCES `notecategories` (`id`),
  ADD CONSTRAINT `seller_notes_ibfk_3` FOREIGN KEY (`Note_type`) REFERENCES `note_types` (`id`),
  ADD CONSTRAINT `seller_notes_ibfk_4` FOREIGN KEY (`Country`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `seller_notes_ibfk_5` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `seller_notes_ibfk_6` FOREIGN KEY (`ActionedBy`) REFERENCES `users` (`id`);

--
-- Constraints for table `seller_notes_attachments`
--
ALTER TABLE `seller_notes_attachments`
  ADD CONSTRAINT `seller_notes_attachments_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_notes` (`id`);

--
-- Constraints for table `seller_notes_reported_issues`
--
ALTER TABLE `seller_notes_reported_issues`
  ADD CONSTRAINT `seller_notes_reported_issues_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_notes` (`id`),
  ADD CONSTRAINT `seller_notes_reported_issues_ibfk_2` FOREIGN KEY (`reported_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `seller_notes_reported_issues_ibfk_3` FOREIGN KEY (`download_id`) REFERENCES `downloads` (`id`);

--
-- Constraints for table `seller_notes_reviews`
--
ALTER TABLE `seller_notes_reviews`
  ADD CONSTRAINT `seller_notes_reviews_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_notes` (`id`),
  ADD CONSTRAINT `seller_notes_reviews_ibfk_2` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `seller_notes_reviews_ibfk_3` FOREIGN KEY (`download_id`) REFERENCES `downloads` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`Gender`) REFERENCES `referencedata` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
