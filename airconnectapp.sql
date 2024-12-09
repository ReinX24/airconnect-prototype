-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 04:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(15, 1, 'Carrier Aura Inverter Floor Mounted', 180000, 1, 3, 'Rein', '2024-12-09 11:16:53'),
(22, 1, 'Carrier Aura Inverter Floor Mounted', 180000, 1, 7, 'Benjamin', '2024-12-09 11:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_tickets`
--

CREATE TABLE `maintenance_tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `category` varchar(255) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance_tickets`
--

INSERT INTO `maintenance_tickets` (`id`, `user_id`, `name`, `email`, `product_id`, `product_name`, `purchase_date`, `category`, `message`) VALUES
(1, 3, 'Rein', 'rein@gmail.com', 3, 'Carrier Aura Inverter Window Type, Remote 1.0hp ', '2024-12-08 14:53:03', 'cleaning', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat eos laudantium repellat. Enim, commodi. Quaerat sunt consectetur ratione incidunt, numquam minima animi laboriosam totam libero et, amet, autem quisquam veritatis aliquam vitae accusantium enim debitis iure commodi quas saepe corrupti officia. Suscipit doloremque expedita, ad distinctio repellendus illo obcaecati excepturi!'),
(2, 3, 'Rein', 'rein@gmail.com', 3, 'Carrier Aura Inverter Window Type, Remote 1.0hp ', '2024-12-08 14:53:03', 'cleaning', 'Test Message'),
(3, 3, 'Rein', 'rein@gmail.com', 3, 'Carrier Aura Inverter Window Type, Remote 1.0hp ', '2024-12-08 14:53:03', 'cleaning', 'Test Message on laptop'),
(4, 3, 'Rein', 'rein@gmail.com', 3, 'Carrier Aura Inverter Window Type, Remote 1.0hp ', '2024-12-08 14:53:03', 'cleaning', 'Lorem Ipusum 50');

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
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
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
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `product_id`, `product_name`, `product_price`, `quantity`, `customer_id`, `customer_name`, `created_at`) VALUES
(1, 3, 'Carrier Aura Inverter Window Type, Remote 1.0hp ', 37100, 2, 3, 'Rein', '2024-12-08 14:53:03'),
(2, 1, 'Carrier Aura Inverter Floor Mounted', 180000, 2, 3, 'Rein', '2024-01-01 15:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`id`, `user_id`, `name`, `email`, `message`, `contact_info`, `location`) VALUES
(1, 3, 'Rein', 'rein@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis exercitationem nostrum incidunt odio mollitia optio obcaecati quo beatae totam voluptatibus, tempore officia alias iusto iure. Totam voluptatibus quae molestiae minus aliquid perspiciatis, voluptate corrupti esse odit corporis quibusdam velit animi ut, voluptatum quas autem harum maxime dicta magni repellat ea.', '0912 3345 678', 'Easy Street'),
(2, 3, 'Rein', 'rein@gmail.com', 'Test Message', '0912 3345 678', 'Sesame Street'),
(3, 3, 'Rein', 'rein@gmail.com', 'Test Message', '0912 3345 678', 'Sesame Street');

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
(3, 'Rein', 'rein@gmail.com', '$2y$10$SxzAj9QAmQX0mWF/TjdS8eqk8k.UroMiLCvRmHzzgRlcK/.Dy2LAO'),
(6, 'Jake Doe', 'jake@example.com', '$2y$10$n094hZRJYG69QxtIMJ3hO.U5xQbJb6R5EdTbmYkfbd2EpNJEAqqN6'),
(7, 'Benjamin', 'benjie@example.com', '$2y$10$8nNMYoAjXBmFGZhZhLZBhOZb4R9Rr.QJGxtNcD/CsYsv/a/JyJNjm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `cart_product_id` (`product_id`);

--
-- Indexes for table `maintenance_tickets`
--
ALTER TABLE `maintenance_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_product_id` (`product_id`),
  ADD KEY `purchases_customer_id` (`customer_id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `maintenance_tickets`
--
ALTER TABLE `maintenance_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
