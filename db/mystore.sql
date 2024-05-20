-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 03:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'bench'),
(2, 'nike'),
(3, 'adidas'),
(4, 'Chanel'),
(5, 'Louis Vuitton'),
(6, 'Gucci'),
(7, 'rebook'),
(8, 'Champion'),
(9, 'sadas');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(29, '::1', 0),
(31, '::1', 0),
(33, '::1', 0),
(34, '::1', 0),
(35, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'jacket'),
(2, 'shoes'),
(3, 'dress'),
(4, 'pants'),
(5, 'shorts'),
(6, 'hoodies'),
(7, 'polo shirt'),
(8, 'Bags'),
(9, 't-shirt'),
(10, 'Eye glasses'),
(11, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(29, 'Back pack', 'Yellow Back Pack', 'Back pack Bag', 8, 5, 'b3.png', 'b2.png', 'b1.png', '300', '2023-12-11 14:00:19', 'true'),
(31, 'Men\'s Short', 'Black Men\'s Short', 'Black Men\'s Short', 5, 5, 'i1.png', 'i1.png', 'i1.png', '250', '2023-12-18 11:02:00', 'true'),
(32, 'Hoodies', 'Champion Gray Hoodies', 'Champion Gray Jacket', 6, 8, 'h3.png', 'h3.png', 'h3.png', '350', '2023-12-18 11:04:10', 'true'),
(33, 'Women\'s Bag', 'Red Bag', 'Women\'s Red  Bag', 8, 4, 'lb1.png', 'lb1.png', 'lb1.png', '450', '2023-12-18 11:05:59', 'true'),
(34, 'Long Sleeve', 'Men\'s Long Sleeve', 'Men\'s Long Sleeve', 1, 6, 'p6.png', 'p6.png', 'p6.png', '399', '2023-12-18 11:07:51', 'true'),
(35, 'Black Shoes', 'Men\'s Black Shoes', 'Men\'s Black Shoes', 2, 7, 's1.png', 's1.png', 's1.png', '499', '2023-12-18 11:11:15', 'true'),
(36, 'qweqwe', 'wqe', 'we', 2, 2, 'b3.png', 'b3.png', 'b3.png', '124', '2024-01-04 11:13:31', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
