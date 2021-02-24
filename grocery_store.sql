-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 10:18 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `date`, `description`) VALUES
(1, 'May 2018', 'We started.'),
(3, 'April 2020', 'We Got Our Websiter Running.');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `status`) VALUES
(3, 'Kitchen', 'ba.jpg', 1),
(4, 'Household', 'ba2.jpg', 1),
(5, 'Cosmetics', 'resized-60163390d6b5a6.07761798.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'owner admin', 'lakefoodjkb@gmail.com', 'f', 'fvd'),
(2, 'owner admin', 'lakefoodjkb@gmail.com', 'f', 'fvd'),
(3, 'erg', 'lakefoodjkb@gmail.com', 'r', 'rga'),
(4, 'wve', 'lakefoodjkb@gmail.com', 'fe', 'fv'),
(5, 'dsc', 'lakefoodjkb@gmail.com', 'cd', 'fw'),
(7, 'owner admin', 'lakefoodjkb@gmail.com', 'very kul', 'kiyt');

-- --------------------------------------------------------

--
-- Table structure for table `cupon`
--

CREATE TABLE IF NOT EXISTS `cupon` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `percentage` float NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cupon`
--

INSERT INTO `cupon` (`id`, `code`, `percentage`, `status`) VALUES
(2, 'JASSTUTORIALS', 50, 1),
(3, 'JASSTUTORIALSL', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`) VALUES
(1, 'It Is A Long Established Fact That A Reader Will Be Distracted ?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. .\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment` text NOT NULL,
  `total` float NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` text NOT NULL,
  `category` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `img1` text NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `meta_title` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_tags` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `orders` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `short_desc`, `long_desc`, `category`, `status`, `img1`, `mrp`, `price`, `meta_title`, `meta_desc`, `meta_tags`, `quantity`, `orders`) VALUES
(3, 'Ashirvad Aata 2kg', 'lol', 'Best wheat for health at the best price.', 3, 1, '5faa2f38b8fb89.58426011.png', 500, 200, 'f', 'vf', 'aata, ashirvad, ashirvad aata, wheat', 200, 200),
(10, 'Kelloggs Chocos 500G', 'lol', 'Breakfast snacks for kids.', 3, 1, '5faa31680c6526.35781914.png', 500, 399, 'fd', 'sfv', 'chocos, kellogs chocos, kellogs', 100, 1),
(11, 'Dhara Oil 1L', 'lol', 'Best oil free of colestrol at cheapest price.', 3, 1, '5faa521f98e030.64483003.png', 500, 399, 'fe', 'e', 'oil, dara oil, kitchen', 197, 113),
(12, 'Funschool Birthday Candles', 'lol', 'Birthday candles for kids.', 4, 1, '5faa53bb1b3828.64675300.png', 100, 69, 'fd b', 'sfv', 'candles, birthday candles, playschool candles', 400, 0),
(13, 'Mr. Muscle Cleaning Spray', 'lol', 'Cleaning spray for household use.', 4, 1, '5faa5487e60019.45070138.png', 200, 99, 'fev', 'vfe', 'spray, colin, house hold, colin spray, mrmuscle spray, mrmuscle', 66, 0),
(14, 'Personal small room Dustbin', 'lol', 'A small dustbin for your personal room.', 4, 1, '5faa563005c581.59372167.png', 300, 200, 'fev', 'fe', 'dustbin, small dustbin, house hold', 398, 2),
(15, 'Paracute Skin Cream', 'lol', 'Best skin Cream.', 5, 1, '5faa57124d5a42.36387748.png', 200, 99, 'fev', 'vf', 'women, cream, skin cream, cosmetics', 94, 6),
(16, 'Cinthol Sun Cream', 'lol', 'Cinthol suns cream at the cheapest price.', 5, 1, '5faa5be03643d9.21208456.png', 150, 100, 'fev', 'fdg', 'cinthol, suns cream, cosmetics', 387, 13),
(18, 'Nyle Skin Cream', 'lol', 'Nyle Skin ceam 200g at cheapest price.', 5, 1, '5faa5cc84d0976.63759892.png', 100, 79, 'rdse', 'fdg', 'nyle cream, cosmetics', 8, 112);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
  `id` int(11) NOT NULL,
  `sno` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `sno`, `title`, `description`) VALUES
(3, 1, 'Delevery Charges', 'Your delevery charges can vary according to your location. They are not mentioned in the website. If you reject taking product remember you still have to pay the charges.'),
(4, 2, 'Returns', 'You cannot return any product after you have taken it from the delevery person & given him money. So check the product before taking.'),
(7, 3, 'Payment', 'Online Payments Are SSL Secured And Provided By Paytm But You Always Have A Opion Of Cash On Delevery.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `phno` text NOT NULL,
  `name` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `stadd` text NOT NULL,
  `city` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `phno`, `name`, `password`, `stadd`, `city`, `pincode`, `status`) VALUES
(11, '7006259151', 'Admin', '$2y$10$cHuXAALx/BZKz1ujnvDw7OUMDxWsj45PJN73MLLHYaz/wDTPlKbmC', 'tggghbgb', 'Saharsa', 555555, 1),
(12, '7006259152', 'Jasim', '$2y$10$U0YMDbRUU6rLoimVOz0vXOJTg8qMXaMHYQhwZ/7Sn8ebRLZVOKlii', 'tggghbgb', 'Saharsa', 555555, 0),
(13, '7006259153', 'Staff', '$2y$10$wHAP9UbCPjhZRecp0MqSR.oCKjlzgvtyiVBcaiIsWZEDlB2wCfqnS', 'tggghbgb', 'Saharsa', 555555, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cupon`
--
ALTER TABLE `cupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
