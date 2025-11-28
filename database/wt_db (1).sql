-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 28, 2025 at 06:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `subject`, `message`, `cid`) VALUES
('Sumit Adhikari', 'sumitadhikari972@gmail.com', 'Good', 'Hello', 1),
('hi', 'hi@gmail.com', 'hi', 'hello', 2),
('Vinicius Jr', 'vini7@gmail.com', 'Madrid', 'Hala Madrid.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`username`, `password`) VALUES
('admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` float NOT NULL,
  `photo` varchar(255) NOT NULL,
  `availability` enum('available','not available') NOT NULL,
  `category` enum('Starters','Main Course','Desserts','Beverages','Specials') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `description`, `price`, `photo`, `availability`, `category`) VALUES
(2, 'Pizza', 'Special Pizza', 499, 'menu/pizza.jpg', 'available', 'Starters'),
(3, 'Chicken Wings', 'Chicken Wings', 700, 'menu/chicken wings.jpg', 'not available', 'Starters'),
(6, 'Coffee', 'Delicious Coffee', 199, 'menu/coffee.jpg', 'available', 'Beverages'),
(7, 'Fresh Lemonade', 'Special Lemonade.', 350, 'menu/fresh lemonade.jpg', 'available', 'Beverages'),
(8, 'Momo', 'Cooked', 199, 'menu/momo.jpg', 'not available', 'Starters'),
(10, 'Grilled Chicken', 'Have a grilled chicken', 900, 'menu/grilled chicken.jpg', 'available', 'Main Course'),
(11, 'Fried rice', 'Have a fried rice', 200, 'menu/fried rice.jpg', 'available', 'Starters'),
(12, 'Biryani', 'Have Biryani', 499, 'menu/biryani.jpg', 'not available', ''),
(16, 'hgyDF', 'GFYTF', 786, 'menu/_- visual selection (1).png', 'not available', 'Starters');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `order_time` time DEFAULT curtime(),
  `status` enum('pending','processing','completed','cancelled') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `order_time`, `status`) VALUES
(3, 'Sumit Adhikari', '9818385754', 'Kathmandu', '15:21:28', 'completed'),
(4, 'Cristiano Ronaldo', '015453432', 'Riyadh', '15:23:21', 'processing'),
(5, 'Arda Guler', '123456789', 'Turkiye', '17:33:41', 'processing'),
(6, 'Huijsen', '0000000001', 'Madrid', '15:47:18', 'completed'),
(8, 'Hala', '9887635642', 'Madrid', '19:32:51', 'pending'),
(9, 'Endrick', '987633', 'Madrid', '19:45:47', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `iid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `food_id`, `food_name`, `price`, `quantity`, `iid`) VALUES
(3, 2, 'Pizza', 350, 3, 1),
(3, 3, 'Chicken Wings', 700, 3, 2),
(4, 3, 'Chicken Wings', 700, 2, 3),
(5, 6, 'Coffee', 199, 2, 4),
(5, 10, 'Grilled Chicken', 900, 3, 5),
(6, 11, 'Fried rice', 200, 3, 6),
(8, 6, 'Coffee', 199, 3, 8),
(9, 7, 'Fresh Lemonade', 350, 2, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`iid`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `food_id` (`food_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
