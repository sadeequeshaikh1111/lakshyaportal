-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 07:39 PM
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
-- Database: `lakshyadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_basic_details`
--

CREATE TABLE `candidate_basic_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `taluka` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `preferred_exam_location_1` varchar(255) DEFAULT NULL,
  `preferred_exam_location_2` varchar(255) DEFAULT NULL,
  `preferred_exam_location_3` varchar(255) DEFAULT NULL,
  `custom_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`custom_values`)),
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `User_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_basic_details`
--

INSERT INTO `candidate_basic_details` (`id`, `registration_number`, `first_name`, `middle_name`, `last_name`, `mother_name`, `date_of_birth`, `permanent_address`, `gender`, `country`, `state`, `district`, `taluka`, `mobile_number`, `preferred_exam_location_1`, `preferred_exam_location_2`, `preferred_exam_location_3`, `custom_values`, `email`, `created_at`, `updated_at`, `User_id`) VALUES
(1, '3aa9c35b-ee15-469d-818e-0f7c313a6278', 'Ayeza', 'Sadik', 'Shaikh', 'Naziya', '2024-05-25', '187 Vikjay Deshmukh nagar,Solapur', 'Female', 'India', 'Maharashtra', 'Solapur', 'Solapur', '8793365379', 'Solapur', 'Tembhurni', 'Pandharpur', NULL, 'ayezashaikh@gmail.com', '2024-07-13 13:32:11', '2024-07-15 14:03:56', 0),
(4, 'ef1f2f1f-32c5-4e14-be4b-9afa66d1dc58', 'Akib shaikh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'akib11@gmail.com', '2024-07-20 14:26:50', '2024-07-20 14:26:50', 10),
(5, '71d03e10-e407-4fc3-bdc7-985d89ca2015', 'shreyas', 'Laxman', 'Shendge', NULL, NULL, 'Shete vasti,Solapur', 'Male', 'India', 'Maharashtra', 'Solapur', 'South Solapur', '888888888', NULL, NULL, NULL, NULL, 'shreyas.s@gmail.com', '2024-08-15 07:11:44', '2024-08-15 07:14:59', 11),
(6, '485a9024-f298-44db-822e-28988543e7bd', 'Akib', 'Abdul Gaffar', 'Shaikh', 'Qumrunnisa', '2024-09-01', 's', 'Male', 'India', 'Maharashtra', 'Solapur', 'Solapur', '8208171670', 'Solapur', 'Solapur', 'Solapur', NULL, 'akib22@gmail.com', '2024-09-01 06:20:14', '2024-09-01 12:07:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ISO` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `ISO`, `created_at`, `updated_at`) VALUES
(1, 'India', 'IND', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `country_id`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'Solapur', 1, '14', NULL, NULL),
(2, 'Pune', 1, '14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_details`
--

CREATE TABLE `document_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_details`
--

INSERT INTO `document_details` (`id`, `category`, `course`, `file_name`, `file_path`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Educational document', '12th', '1721160553_Hello.png', '/storage/uploads/documents/1721160553_Hello.png', 'ayezashaikh@gmail.com', '2024-07-16 14:39:13', '2024-07-16 14:39:13'),
(2, 'Educational document', '10th', '1721161146_Hello.png', '/storage/uploads/documents/1721161146_Hello.png', 'ayezashaikh@gmail.com', '2024-07-16 14:49:07', '2024-07-16 14:49:07'),
(3, 'Educational document', '12th', '1721500183_Hello.png', '/storage/uploads/documents/1721500183_Hello.png', 'ayezashaikh@gmail.com', '2024-07-20 12:59:43', '2024-07-20 12:59:43'),
(4, 'Identity document', 'Adhaar card', '1721501194_20 Enemies.png', '/storage/uploads/documents/1721501194_20 Enemies.png', 'ayezashaikh@gmail.com', '2024-07-20 13:16:35', '2024-07-20 13:16:35'),
(5, 'Educational document', 'Diploma', '1723726338_Hello.png', '/storage/uploads/documents/1723726338_Hello.png', 'shreyas.s@gmail.com', '2024-08-15 07:22:18', '2024-08-15 07:22:18'),
(6, 'Address proof', 'Adhar Card', '1723726397_adhar.png', '/storage/uploads/documents/1723726397_adhar.png', 'shreyas.s@gmail.com', '2024-08-15 07:23:17', '2024-08-15 07:23:17'),
(7, 'Educational document', '12th', '1725184707_Screenshot 2024-05-12 131347.png', '/storage/uploads/documents/1725184707_Screenshot 2024-05-12 131347.png', 'ayezashaikh@gmail.com', '2024-09-01 04:28:28', '2024-09-01 04:28:28'),
(8, 'Identity document', 'Adhaar card', '1725192133_Screenshot 2024-05-12 131347.png', '/storage/uploads/documents/1725192133_Screenshot 2024-05-12 131347.png', 'akib22@gmail.com', '2024-09-01 06:32:13', '2024-09-01 06:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `educational_details`
--

CREATE TABLE `educational_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_board` varchar(255) NOT NULL,
  `college_institute` varchar(255) NOT NULL,
  `passing_year` varchar(10) NOT NULL,
  `cgpa_percentage` decimal(5,2) NOT NULL,
  `edu_category` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educational_details`
--

INSERT INTO `educational_details` (`id`, `university_board`, `college_institute`, `passing_year`, `cgpa_percentage`, `edu_category`, `course`, `created_at`, `updated_at`, `email`) VALUES
(1, 'Pune', 'COEP', '2045', 95.00, 'Graduation', 'Engineering', '2024-07-13 14:15:04', '2024-07-13 14:15:04', '0'),
(3, 'solapur', 'Social college', '2042', 90.00, '12th', 'Science', '2024-07-14 14:22:53', '2024-07-14 14:22:53', 'ayezashaikh@gmail.com'),
(4, 'Solapur University', 'Solapur university', '2047', 90.00, 'Post Graduation', 'Science', '2024-07-14 14:23:51', '2024-07-14 14:23:51', 'ayezashaikh@gmail.com'),
(5, 'Solapur', 'St Josef School', '2039', 90.00, '10th', 'Other', '2024-07-15 13:01:16', '2024-07-15 13:01:16', 'ayezashaikh@gmail.com'),
(10, 'Bharti Vidyapeeth', 'AKIMSS', '2042', 98.00, 'Graduation', 'Engineering', '2024-07-16 12:19:19', '2024-07-16 12:19:19', 'ayezashaikh@gmail.com'),
(14, 'MSBTE', 'BMP', '2014', 70.00, 'Diploma', 'IT', '2024-08-15 07:19:33', '2024-08-15 07:19:33', 'shreyas.s@gmail.com'),
(15, 'Pune', 'COEP', '2024', 70.00, 'Graduation', 'Engineering', '2024-08-15 07:39:32', '2024-08-15 07:39:32', 'shreyas.s@gmail.com'),
(16, 'Demo', 'Akimss', '2020', 77.00, 'Graduation', 'Science', '2024-09-01 03:38:30', '2024-09-01 03:38:30', 'ayezashaikh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `exam_details`
--

CREATE TABLE `exam_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `custom1_field` varchar(255) NOT NULL,
  `custom2_field` varchar(255) NOT NULL,
  `custom3_field` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_07_194616_create_candidate_basic_details', 1),
(6, '2024_06_12_160734_create_countries_table', 1),
(7, '2024_06_12_160936_create_districts_table', 1),
(8, '2024_06_12_160953_create_talukas_table', 1),
(9, '2024_06_22_115235_create_states_table', 1),
(10, '2024_06_23_132412_exam_info_table', 1),
(11, '2024_07_12_183656_create_educational_details_table', 1),
(12, '2024_07_16_185329_create_document_details_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Andhra Pradesh', 1, NULL, NULL),
(2, 'Arunachal Pradesh', 1, NULL, NULL),
(3, 'Assam', 1, NULL, NULL),
(4, 'Bihar', 1, NULL, NULL),
(5, 'Chhattisgarh', 1, NULL, NULL),
(6, 'Goa', 1, NULL, NULL),
(7, 'Gujarat', 1, NULL, NULL),
(8, 'Haryana', 1, NULL, NULL),
(9, 'Himachal Pradesh', 1, NULL, NULL),
(10, 'Jharkhand', 1, NULL, NULL),
(11, 'Karnataka', 1, NULL, NULL),
(12, 'Kerala', 1, NULL, NULL),
(13, 'Madhya Pradesh', 1, NULL, NULL),
(14, 'Maharashtra', 1, NULL, NULL),
(15, 'Manipur', 1, NULL, NULL),
(16, 'Meghalaya', 1, NULL, NULL),
(17, 'Mizoram', 1, NULL, NULL),
(18, 'Nagaland', 1, NULL, NULL),
(19, 'Odisha', 1, NULL, NULL),
(20, 'Punjab', 1, NULL, NULL),
(21, 'Rajasthan', 1, NULL, NULL),
(22, 'Sikkim', 1, NULL, NULL),
(23, 'Tamil Nadu', 1, NULL, NULL),
(24, 'Telangana', 1, NULL, NULL),
(25, 'Tripura', 1, NULL, NULL),
(26, 'Uttar Pradesh', 1, NULL, NULL),
(27, 'Uttarakhand', 1, NULL, NULL),
(28, 'West Bengal', 1, NULL, NULL),
(29, 'Andaman and Nicobar Islands', 1, NULL, NULL),
(30, 'Chandigarh', 1, NULL, NULL),
(31, 'Dadra and Nagar Haveli and Daman and Diu', 1, NULL, NULL),
(32, 'Delhi', 1, NULL, NULL),
(33, 'Jammu and Kashmir', 1, NULL, NULL),
(34, 'Ladakh', 1, NULL, NULL),
(35, 'Lakshadweep', 1, NULL, NULL),
(36, 'Puducherry', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `talukas`
--

CREATE TABLE `talukas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `Basic_details_status` varchar(255) NOT NULL DEFAULT 'Not Completed',
  `Educational_details_status` varchar(255) NOT NULL DEFAULT 'Not Completed',
  `Upload_docs_status` varchar(255) NOT NULL DEFAULT 'Not Completed',
  `Applied_exams` varchar(255) NOT NULL DEFAULT 'Not Applied',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `Basic_details_status`, `Educational_details_status`, `Upload_docs_status`, `Applied_exams`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ayeza shaikh', 'ayezashaikh@gmail.com', NULL, '$2y$12$NPwLHSmyiJ4Pq8BJnIQ3ver/DrsYLh5YYEezDA87TnTn4B2Ez8sPW', 'Updated', 'Not Completed', 'Not Completed', 'Not Applied', NULL, '2024-07-13 13:32:10', '2024-07-13 13:38:18'),
(10, 'Akib shaikh', 'akib11@gmail.com', NULL, '$2y$12$SAbdXhe.SqUQ7MpK3ZRj.uQ9p.TbZWhr2Xybrrq9ziW7mTpljSR/.', 'Not Completed', 'Not Completed', 'Not Completed', 'Not Applied', NULL, '2024-07-20 14:26:50', '2024-07-20 14:26:50'),
(11, 'shreyas', 'shreyas.s@gmail.com', NULL, '$2y$12$naQgn2gcdMFGDARIu5mhuuB9IhPrQSYfuyYbOf90K5iOwp87u5Lc6', 'Updated', 'Not Completed', 'Not Completed', 'Not Applied', NULL, '2024-08-15 07:11:43', '2024-08-15 07:14:59'),
(12, 'Akib', 'akib22@gmail.com', NULL, '$2y$12$Wut0w2Dn7zU2XPP0uDNpeORzUsOe8rxDekjmzZPgWxFFj.V01O5lO', 'Updated', 'Not Completed', 'Not Completed', 'Not Applied', NULL, '2024-09-01 06:20:13', '2024-09-01 06:23:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_basic_details`
--
ALTER TABLE `candidate_basic_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `candidate_basic_details_registration_number_unique` (`registration_number`),
  ADD UNIQUE KEY `candidate_basic_details_email_unique` (`email`),
  ADD UNIQUE KEY `User_id` (`User_id`),
  ADD UNIQUE KEY `User_id_2` (`User_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_country_id_foreign` (`country_id`);

--
-- Indexes for table `document_details`
--
ALTER TABLE `document_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_details`
--
ALTER TABLE `educational_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_details`
--
ALTER TABLE `exam_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talukas`
--
ALTER TABLE `talukas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_basic_details`
--
ALTER TABLE `candidate_basic_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `document_details`
--
ALTER TABLE `document_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `educational_details`
--
ALTER TABLE `educational_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `exam_details`
--
ALTER TABLE `exam_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `talukas`
--
ALTER TABLE `talukas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
