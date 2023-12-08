-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 11:55 AM
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
-- Database: `websitecatalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`) VALUES
(1, 'Apple', 2.50, 'Fruits'),
(2, 'Banana', 1.50, 'Fruits'),
(3, 'Carrot', 1.00, 'Vegetables'),
(4, 'Salmon', 8.99, 'Meat-Fish'),
(5, 'Potato Chips', 3.50, 'Snacks'),
(6, 'Soda', 1.99, 'Beverages'),
(7, 'Orange', 4.49, 'Fruits'),
(8, 'Guava Jav', 5.99, 'Fruits'),
(9, 'Korean Strawberry', 20.07, 'Fruits'),
(10, 'Import Berry', 18.99, 'Fruits'),
(11, 'Soup Vegetables', 5.99, 'Vegetables'),
(12, 'Organic Carrot', 5.80, 'Vegetables'),
(13, 'Cucumbar', 4.60, 'Vegetables'),
(14, 'Bell Peppers', 6.10, 'Vegetables'),
(15, 'Flesh Meat', 40.87, 'Meat-Fish'),
(16, 'Sausage', 13.78, 'Meat-Fish'),
(17, 'Salmon Fish', 40.60, 'Meat-Fish'),
(18, 'Meat Var 2', 38.78, 'Meat-Fish'),
(19, 'Pink Macaron', 6.99, 'Snacks'),
(20, 'White Popcorn', 6.80, 'Snacks'),
(21, 'Gummy Bear', 4.22, 'Snacks'),
(22, 'Marble Candy', 6.10, 'Snacks'),
(23, 'Cannabis Infused', 6.99, 'Beverages'),
(24, 'Bottle Drink', 4.58, 'Beverages'),
(25, 'Mac Cafe Coffee', 5.80, 'Beverages'),
(26, 'Starbucks Coffee', 8.99, 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`) VALUES
(4, 'Bunga', 'akuntakterdaftar@gmail.com', 'Bunagana', '$2y$10$Z.LAflC4AOoIXgfb0ZStFeapdkWppRn5OP.z0Cgkpmj9k2p0HQ4iq'),
(11, 'Bunga', 'akuntakterdaftar@gmail.com', '111', '$2y$10$VaZ2aPQzwEB6gQD8OphXOOJ201PCrrNnYKslipS/TDD/IaH921jj.'),
(12, 'no team', 'bungamagelang57@gmail.com', 'aaa', '$2y$10$53MHebZ3r9SF2AVsFHIj/OWBAgH2mElsQ8oToURO3KkTC9wyEJonO'),
(13, 'BUNGA LAELATUL LAELATUL MUNA', '21102010@ittelkom-pwt.ac.id', 'saidin', '$2y$10$Jtoaj9GmogP7Qt8NQQb7oO6Kya/IJ83bnqdoWBs6c7K/EDapaIGgC'),
(16, 'Bunga Lm', 'akuntakterdaftar@gmail.com', 'bungaa', '$2y$10$UucI.awG.GnrtGb26F2QD.AV6e2RTp9knkbtcQUlm5TV.H4tJrY6m'),
(17, 'Bunga', 'akuntakterdaftar@gmail.com', 'aaaa', '$2y$10$7XWA8w5SKQr8I087miDwnu/mLu4Kl.p8TYl0fo3c3cjAR49q0FwCO'),
(18, 'BUNGA LAELATUL LAELATUL MUNA', 'admin@gmail.com', 'bun_gana', '$2y$10$1R1Xmfm9Xab2tZYhd1G9TOKE5s39blU5H7zIikasEML1iUBp7lvw6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
