-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 07:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_trip_memo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `pk_admin_id` int(5) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`pk_admin_id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$LvKAdnodij9sY1KrqPVhcOX/9JmMpsdVC8LCDHlgozRhiqmOXc85y');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `pk_blog_id` int(5) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `thumbnail` text NOT NULL,
  `description` text DEFAULT NULL,
  `address` text NOT NULL,
  `fk_admin_id` int(5) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`pk_blog_id`, `title`, `thumbnail`, `description`, `address`, `fk_admin_id`, `created_at`) VALUES
(1, 'Trip to Japan', 'uploads/1715100669_40fc4b28bd286aef3025.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at fermentum orci. Duis a auctor orci. Mauris vel ante a nulla posuere bibendum. Quisque ullamcorper scelerisque erat, fringilla pretium lacus aliquam vel. Quisque rutrum, mi in efficitur semper, libero magna porttitor tortor, vel tempus leo ex non elit. Quisque ut turpis scelerisque, semper velit eu, consequat dolor. Praesent porta non diam ut dignissim. Sed sit amet orci tempor, dignissim leo et, auctor ex. Nulla id quam quam.</p><p><br></p><p>Pellentesque placerat at ipsum sit amet venenatis. Proin vitae commodo orci, vitae accumsan lorem. Suspendisse sed tortor at mauris convallis lacinia. Cras erat odio, tincidunt vitae eros fringilla, convallis malesuada nulla. Vivamus volutpat est odio, sed placerat nisl gravida id. Vivamus in lectus nunc. Sed cursus neque quis odio facilisis consequat.</p>', 'Japan Address Street', 1, '2024-05-07 16:59:51'),
(2, 'Trip to Korea', 'uploads/1715100921_f1b00144db4be3763e0a.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at fermentum orci. Duis a auctor orci. Mauris vel ante a nulla posuere bibendum. Quisque ullamcorper scelerisque erat, fringilla pretium lacus aliquam vel. Quisque rutrum, mi in efficitur semper, libero magna porttitor tortor, vel tempus leo ex non elit. Quisque ut turpis scelerisque, semper velit eu, consequat dolor. Praesent porta non diam ut dignissim. Sed sit amet orci tempor, dignissim leo et, auctor ex. Nulla id quam quam.</p><p><br></p><p>Pellentesque placerat at ipsum sit amet venenatis. Proin vitae commodo orci, vitae accumsan lorem. Suspendisse sed tortor at mauris convallis lacinia. Cras erat odio, tincidunt vitae eros fringilla, convallis malesuada nulla. Vivamus volutpat est odio, sed placerat nisl gravida id. Vivamus in lectus nunc. Sed cursus neque quis odio facilisis consequat.<br></p>', 'Korean Address Street', 1, '2024-05-07 16:59:51'),
(3, 'Jakarta Center City of Indonesia', 'uploads/1715101014_6be57e9f956f5c0705a3.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at fermentum orci. Duis a auctor orci. Mauris vel ante a nulla posuere bibendum. Quisque ullamcorper scelerisque erat, fringilla pretium lacus aliquam vel. Quisque rutrum, mi in efficitur semper, libero magna porttitor tortor, vel tempus leo ex non elit. Quisque ut turpis scelerisque, semper velit eu, consequat dolor. Praesent porta non diam ut dignissim. Sed sit amet orci tempor, dignissim leo et, auctor ex. Nulla id quam quam.</p><p><br></p><p>Pellentesque placerat at ipsum sit amet venenatis. Proin vitae commodo orci, vitae accumsan lorem. Suspendisse sed tortor at mauris convallis lacinia. Cras erat odio, tincidunt vitae eros fringilla, convallis malesuada nulla. Vivamus volutpat est odio, sed placerat nisl gravida id. Vivamus in lectus nunc. Sed cursus neque quis odio facilisis consequat.</p>', 'Jalan Brembes No. 8', 1, '2024-05-07 16:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-05-05-002130', 'App\\Database\\Migrations\\BlogPost', 'default', 'App', 1715101101, 1),
(2, '2024-05-05-035712', 'App\\Database\\Migrations\\Admins', 'default', 'App', 1715101101, 1),
(3, '2024-05-06-133101', 'App\\Database\\Migrations\\AddAddressField', 'default', 'App', 1715101101, 1),
(4, '2024-05-06-133509', 'App\\Database\\Migrations\\AddAuthorIdAndCreateDate', 'default', 'App', 1715101101, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`pk_admin_id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`pk_blog_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `pk_admin_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `pk_blog_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
