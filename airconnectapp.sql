-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 03:59 PM
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
-- Database: `airconnectapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `product_price`, `quantity`, `customer_id`, `customer_name`, `created_at`) VALUES
(1, 2, 'Carrier Aura Inverter Floor Mounted 3T/4.0hp ', 126000, 3, 3, 'Rein', '2024-12-07 13:47:15'),
(2, 1, 'Carrier Aura Inverter Floor Mounted', 180000, 1, 3, 'Rein', '2024-12-07 13:47:15'),
(4, 3, 'Carrier Aura Inverter Window Type, Remote 1.0hp ', 37100, 2, 3, 'Rein', '2024-12-07 16:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `user_id`) VALUES
(1, 'This is the first post!', 0),
(2, 'This is the second post!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `photo`, `description`) VALUES
(1, 'Carrier Aura Inverter Floor Mounted', 180000, 10, '/images/products/Floor-Mounted-1.jpg', 'With Carrier XFV Premium Floor Standing air conditioning, enjoy the highest level of indoor air quality. It has IAQ characteristics that eliminate bacteria and viruses for a healthy indoor environment. Its strong cooling has a 20-meter range and a 5-star energy rating.\r\n\r\n \r\n\r\nIt contains hepa filter that resist 95% of the dust. It is equipped with auxilliary H11 filter that absorbs harmful gases. It also features a UVC bulb that kills bacteria and virsues. Its centrifugal fan brings a strong supply of wind creating a 20 meter range of airflow. It also has an anti corrosive golden coating that can with stand salty air, rain and other corrosive elements preventing bacteria from breeding and improving heat transfer efficiency.\r\n'),
(2, 'Carrier Aura Inverter Floor Mounted 3T/4.0hp ', 126000, 11, '/images/products/Floor-Mounted-2.jpg', 'With Carrier XFV Premium Floor Standing air conditioning, enjoy the highest level of indoor air quality. It has IAQ characteristics that eliminate bacteria and viruses for a healthy indoor environment. Its strong cooling has a 20-meter range and a 5-star energy rating.'),
(3, 'Carrier Aura Inverter Window Type, Remote 1.0hp ', 37100, 12, '/images/products/Window-Type-1.jpg', 'Carrier Aura complements the modern home with its sleek and smart aesthetic, powered by an energy-efficient machine. Built with 8-in-1 Air Filter Technology, it negates airborne free radicals. Breathe easy without volatile organic compounds, bacteria, viruses, molds, gas, smoke, and other irritant '),
(4, 'Carrier Aura Inverter Window Type, Remote 1.5hp ', 40000, 10, '/images/products/Window-Type-2.jpg', 'Carrier Aura complements the modern home with its sleek and smart aesthetic, powered by an energy-efficient machine. Built with 8-in-1 Air Filter Technology, it negates airborne free radicals. Breathe easy without volatile organic compounds, bacteria, viruses, molds, gas, smoke, and other irritant ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'John Doe', 'john@gmail.com', '$2y$10$dKeE3UneIQ9MGm6GxhLtkOWJz0ZlFxspvwVKZ3G.QSHbgxVp5viue'),
(2, 'Jane Doe', 'jane@gmail.com', '$2y$10$4S3QdrbtSipb72qYrIv/7ex1PI1lrc3FPYmCes9a6sbX4T7NiCIGa'),
(3, 'Rein', 'rein@gmail.com', '$2y$10$SxzAj9QAmQX0mWF/TjdS8eqk8k.UroMiLCvRmHzzgRlcK/.Dy2LAO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`customer_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
