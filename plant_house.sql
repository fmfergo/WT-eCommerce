-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 02:10 AM
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
-- Database: `wt_the_plant_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total`, `order_date`) VALUES
(1, 2, 31.98, '2024-06-06 11:56:33'),
(2, 3, 23.98, '2024-06-10 00:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_contents`
--

CREATE TABLE `order_contents` (
  `content_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_contents`
--

INSERT INTO `order_contents` (`content_id`, `order_id`, `item_id`, `quantity`, `price`) VALUES
(1, 1, 1, 2, 15.99),
(2, 2, 2, 1, 12.99),
(3, 2, 4, 1, 10.99);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `item_desc` varchar(200) NOT NULL,
  `item_img` varchar(20) NOT NULL,
  `item_price` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `item_name`, `item_desc`, `item_img`, `item_price`) VALUES
(1, 'Rubber Plant', 'A popular ornamental plant known for its large, glossy leaves.', 'rubber_plant.jpg', 15.99),
(2, 'Snake Plant', 'An easy-to-care-for plant with tall, rigid leaves.', 'snake_plant.jpg', 12.99),
(3, 'Spider Plant', 'A popular houseplant with long, thin leaves and spider-like offshoots.', 'spider_plant.jpg', 8.99),
(4, 'Jade Plant', 'A succulent plant with thick, lush leaves.', 'jade_plant.jpg', 10.99),
(5, 'Ficus', 'A common houseplant with various species, known for its tree-like appearance.', 'ficus.jpg', 18.99),
(7, 'Aloe', 'A succulent plant known for its medicinal properties.', 'aloe.jpg', 9.99),
(8, 'Umbrella Plant', 'A plant with large, umbrella-like leaves.', 'umbrella_plant.jpg', 16.99),
(9, 'Peace Lily', 'A popular flowering plant known for its white blooms.', 'peace_lily.jpg', 13.99),
(10, 'Common Ivy', 'A climbing plant with lush, green foliage.', 'common_ivy.jpg', 7.99),
(11, 'Pothos', 'A hardy plant with heart-shaped leaves, known for its air-purifying qualities.', 'pothos.jpg', 11.99),
(12, 'Philodendron', 'A popular houseplant with large, glossy leaves.', 'philodendron.jpg', 12.99),
(13, 'Tradescantia Nanouk', 'A popular flowering plant known for its white blooms.', 'tradescantia.jpg', 13.99);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `reg_date`) VALUES
(2, 'Francisco Manuel', 'Fernández Gómez', 'fergofm@gmail.com', 'fmfergo', '2024-06-02 04:08:22'),
(3, 'John', 'Smith', 'John.Smith@gmail.com', 'myPassword123', '2024-06-09 04:46:51');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_products`
-- (See below for the actual view)
--
CREATE TABLE `view_products` (
`item_id` int(10) unsigned
,`item_name` varchar(20)
,`item_desc` varchar(200)
,`item_img` varchar(20)
,`item_price` decimal(4,2)
);

-- --------------------------------------------------------

--
-- Structure for view `view_products`
--
DROP TABLE IF EXISTS `view_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_products`  AS SELECT `products`.`item_id` AS `item_id`, `products`.`item_name` AS `item_name`, `products`.`item_desc` AS `item_desc`, `products`.`item_img` AS `item_img`, `products`.`item_price` AS `item_price` FROM `products` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_contents`
--
ALTER TABLE `order_contents`
  MODIFY `content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
