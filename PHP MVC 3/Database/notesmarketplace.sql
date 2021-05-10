-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 06:36 AM
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
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `Name`, `Country_code`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'India', '+91', '2021-03-22 14:23:42', 1, NULL, NULL, b'01'),
(2, '', '', '2021-03-25 19:33:52', 1, NULL, NULL, b'01'),
(3, 'US', '+212', '2021-05-09 07:59:54', 4, '2021-05-09 08:06:53', 4, b'00');

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
  `Attachment_downloaded` bit(1) NOT NULL,
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
(5, 6, 2, 2, b'1', 'notes/STOCKREPORT.pdf', b'1', NULL, 5, '0', 'Basic Computer', '1', '2021-04-25 22:32:43', 10, NULL, NULL, b'01'),
(6, 6, 2, 10, b'1', 'notes/STOCKREPORT.pdf', b'1', NULL, 5, '0', 'Basic Computer', '1', '2021-04-25 22:32:43', 10, NULL, NULL, b'01');

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
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notecategories`
--

INSERT INTO `notecategories` (`id`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Computer ', 'Computer related books', '2021-03-22 14:10:50', 4, NULL, 1, b'01'),
(2, '', '', '2021-03-25 19:35:27', 1, NULL, NULL, b'01'),
(3, 'IT', 'Information Tech', '2021-05-08 20:03:17', 4, '2021-05-10 06:29:29', 13, b'00'),
(4, 'Store Book', 'Story', '2021-05-08 20:05:45', 4, '2021-05-10 06:30:04', 13, b'01');

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
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note_types`
--

INSERT INTO `note_types` (`id`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'cfgv', 'gh', '2021-03-24 16:31:59', 4, NULL, NULL, b'01'),
(2, '', '', NULL, NULL, NULL, NULL, b'00'),
(3, 'hand written', 'notes', '2021-05-09 07:49:56', 4, '2021-05-10 06:30:37', 13, b'01');

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
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
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
(4, 2, 9, 13, 'not to mark', '2021-04-19 22:47:13', 'Database System', 1, 'images/images.jpg', 2, 65, 'Dbms concpets', 'BVM', 1, 'Database', '009', 'S Chand', 4, '220', 'notes/STOCKREPORT.pdf', '2021-04-19 19:10:57', 2, '2021-05-02 07:41:55', 13, b'01'),
(6, 2, 11, 13, 'not to mark', NULL, 'Basic Computer', 1, 'images/images.jpg', 1, 45, 'Computer basics', 'BVM', 1, 'computer', '006', 'Dale Carnegie', 5, '0', 'notes/PURCHASEBILL.pdf', '2021-04-19 19:22:08', 2, '2021-05-09 13:05:07', 13, b'11');

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
(1, 4, 'STOCKREPORT.pdf', 'notes/STOCKREPORT.pdf', '2021-04-19 19:10:57', 2, NULL, NULL, b'01'),
(2, 6, 'STOCKREPORT.pdf', 'notes/STOCKREPORT.pdf', '2021-04-19 19:22:08', 2, NULL, NULL, b'01');

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
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
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
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_notes_reviews`
--

INSERT INTO `seller_notes_reviews` (`id`, `note_id`, `reviewer_id`, `download_id`, `Ratings`, `Comments`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(5, 6, 10, 4, '5', 'Nice Book', '2021-04-25 19:03:03', 10, NULL, NULL, b'11');

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
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_configurations`
--

INSERT INTO `system_configurations` (`id`, `Key`, `Value`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'support_email', 'dhaval7030@gmail.com', NULL, NULL, NULL, NULL, b'00'),
(2, 'support_phoneNo', '9574926575', NULL, NULL, NULL, NULL, b'00'),
(3, 'emailforevents', 'dhaval7030@gmail.com', NULL, NULL, NULL, NULL, b'00'),
(4, 'facebook_url', '', NULL, NULL, NULL, NULL, b'00'),
(5, 'twitter_url', '', NULL, NULL, NULL, NULL, b'00'),
(6, 'linkedin_url', '', NULL, NULL, NULL, NULL, b'00'),
(7, 'notedefaultimage', 'images/images.jpg', NULL, NULL, NULL, NULL, b'00'),
(8, 'sellerdefaultimage', 'images/1729008_d167_6.jpg', NULL, NULL, NULL, NULL, b'00');

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
  `Password` varchar(125) NOT NULL,
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
(2, 2, 'Dhaval', 'Hingu', 'dhaval1234545@gmail.com', '7f76b85e970d85d39c11f94d559a6a48', b'1', '2021-04-19 19:11:49', 0, '2021-04-19 19:56:49', 2, b'01'),
(4, 3, 'Super', 'Admin', 'superadmin@admin.com', '1e0a55d2ab93ff0fec2dc379284f05b3', b'1', '2021-04-19 23:33:16', 0, NULL, NULL, b'01'),
(10, 2, 'Nigam', 'Patel', 'techwork.dhaval@gmail.com', '6f3271a2e79d09216358407aa0bf4cd0', b'1', '2021-04-25 19:34:43', 0, '2021-04-25 16:13:12', 10, b'00'),
(13, 1, 'John', 'Admin', 'admin@admin.com', '0e7517141fb53f21ee439b355b5a1d0a', b'1', '2021-04-30 09:06:28', 4, '2021-05-08 19:43:51', 4, b'01');

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
(15, 2, '1999-08-21 00:00:00', 1, 'dhaval1234545@gmail.com', '1', '9574926575', 'images/1729008_d167_6.jpg', 'Gokul Nagar', 'b/h  Dr. Damaniya Hospital', 'Una', 'Gujarat', '362560', '1', 'GTU', 'BVM', '2021-04-20 11:11:00', 2, NULL, NULL, b'01'),
(16, 10, '1999-08-21 00:00:00', 1, 'techwork.dhaval@gmail.com', '1', '9574926575							', 'images/User-profile/user-img.png', 'gokul nagar', 'b/h. dr. damaniya hospital', 'Una', 'Gujarat', '362560', '1', 'GTU', 'BVM', '2021-04-25 19:02:16', 10, NULL, NULL, b'01'),
(18, 4, NULL, NULL, 'superadmin@admin.com', '1', '9574926575', '../images/User-profile/user-img.png', '', '', '', '', '', '', NULL, NULL, '2021-05-08 09:11:17', 4, '2021-05-08 09:19:25', 0, b'01'),
(21, 13, NULL, NULL, 'admin@admin.com', '1', '9574926575', 'images/1729008_d167_6.jpg', '', '', '', '', '', '', NULL, NULL, '2021-05-08 19:30:19', 4, '2021-05-09 08:56:43', 0, b'01');

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
  `IsActive` bit(2) NOT NULL DEFAULT b'1'
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notecategories`
--
ALTER TABLE `notecategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `note_types`
--
ALTER TABLE `note_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `referencedata`
--
ALTER TABLE `referencedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seller_notes`
--
ALTER TABLE `seller_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seller_notes_attachments`
--
ALTER TABLE `seller_notes_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller_notes_reported_issues`
--
ALTER TABLE `seller_notes_reported_issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seller_notes_reviews`
--
ALTER TABLE `seller_notes_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_configurations`
--
ALTER TABLE `system_configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
