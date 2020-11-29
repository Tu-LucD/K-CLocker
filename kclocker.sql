-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 04:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kclocker`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fname`, `lname`, `email`, `admin`, `username`, `password`) VALUES
(1, 'James', 'Cortez', 'jamescortez91@gmail.com', 0, 'james', 'polo'),
(2, 'James', 'Cortez', 'jamessscortezzz@gmail.com', 0, 'Jamez', 'polo');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `feedback_content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `order_shipping` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_item_quantity` int(11) NOT NULL,
  `order_item_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sport` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_description`, `product_image`, `price`, `sport`, `category`) VALUES
(1, 'Adidas NMD_R1 Shoes', 'Run with it. These adidas NMD_R1 Shoes are a little technical and a lot street smart. Their midsole plugs flash back to the \'80s, but the knit upper, full-length cushioned midsole and EVA inserts are 100 percent fashion forward.', 'images/product1.jpg', '170.00', 'running', 'footwear'),
(2, 'CCM Jetspeed Pro Grip Hockey Stick', 'The CCM Jetspeed Pro Senior Hockey Stick is a great option no matter what position you play because of the hybrid kickpoint that delivers powerful slap shots and accurate quick release wrist shots. The Jetspeed Shaft offers a smooth transition area to maximize bending and transfer energy from the blade to the puck - to the back of the net.', 'images/product2.jpg', '99.99', 'Hockey', 'Equipment'),
(3, 'Wilson Advantage Adult L3 Tennis Racquet ', 'Wilson Advantage Adult L3 Tennis Racquet is extra long for extended reach, has an extra-large head for greater power on the court, and a V-Matrix technology for a larger sweet spot.', 'images/product3.jpg', '25.99', 'Tennis', 'Equipment'),
(4, 'Adidas Pro Model 2G Shoes', 'These Adidas shoes deliver a lightweight and flexible fit to keep you comfortable for all-day play. Lace up in foot support designed for everyday hoops.', 'images/product4.jpg', '130.00', 'Basketball', 'Footwear'),
(5, 'Mavis 350 - Nylon Shuttlecocks (Pack of 6) ', 'The Yonex Mavis 350 nylon shuttlecocks are designed to have a similar flight time as a feather shuttlecock. They give an accurate and durable performance so you can enjoy the play, game after game.', 'images/product5.jpg', '14.44', 'Badminton', 'Equipment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
