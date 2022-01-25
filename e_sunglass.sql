-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 10:24 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_sunglass`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `r_name` varchar(400) NOT NULL,
  `s_name` varchar(55) NOT NULL,
  `o_email` varchar(55) NOT NULL,
  `u_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`id`, `order_id`, `name`, `b_name`, `r_name`, `s_name`, `o_email`, `u_name`) VALUES
(1, 1309424814, 'kanchon kumar shill', 'freelancer', 'Sadullapur Road Gaibandha Sadar', 'store one', 'tulipkumar81@gmail.com', 'tulipkumar81@gmail.com'),
(2, 446764381, 'kanchon kumar shill', 'freelancer', 'Sadullapur Road Gaibandha Sadar', 'store one', 'tulipkumar81@gmail.com', 'tulipkumar81@gmail.com'),
(3, 569747225, 'kanchon kumar shill', 'Freelancer', 'Sadullapur road', 'store two', 'tulipkumar81@gmail.com', 'tulipkumar81@gmail.com'),
(4, 2069647548, 'kanchon kumar shill', 'Freelancer', 'Sadullapur road', 'store two', 'tulipkumar81@gmail.com', 'tulipkumar81@gmail.com'),
(5, 541272484, 'kanchon kumar shill', 'web developer', 'road no three house no twenty two', 'store two', 'tulipkumar81@gmail.com', 'tulipkumar81@gmail.com'),
(6, 1293347645, 'kanchon kumar shill', 'web developer', 'road no three house no twenty two', 'store two', 'tulipkumar81@gmail.com', 'tulipkumar81@gmail.com'),
(7, 23021872, 'kanchon kumar shill', 'web desinger and developer', 'gaibandha sadar', 'store one', 'kanchonkumar49@gmail.com', 'kanchonkumar49@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `u_name` varchar(55) NOT NULL,
  `o_status` varchar(55) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `p_quantity`, `u_name`, `o_status`) VALUES
(1, 1309424814, 898600452, 2, 'tulipkumar81@gmail.com', 'Pending'),
(2, 446764381, 898600452, 2, 'tulipkumar81@gmail.com', 'Pending'),
(3, 446764381, 1417740018, 2, 'tulipkumar81@gmail.com', 'Pending'),
(4, 446764381, 1482932776, 2, 'tulipkumar81@gmail.com', 'Pending'),
(5, 569747225, 1262909599, 10, 'tulipkumar81@gmail.com', 'Pending'),
(6, 569747225, 1417740018, 10, 'tulipkumar81@gmail.com', 'Pending'),
(7, 569747225, 1688395536, 10, 'tulipkumar81@gmail.com', 'Pending'),
(8, 2069647548, 1262909599, 5, 'tulipkumar81@gmail.com', 'Pending'),
(9, 2069647548, 1417740018, 5, 'tulipkumar81@gmail.com', 'Pending'),
(10, 2069647548, 1688395536, 5, 'tulipkumar81@gmail.com', 'Pending'),
(11, 541272484, 1417740018, 5, 'tulipkumar81@gmail.com', 'Pending'),
(12, 1293347645, 1262909599, 5, 'tulipkumar81@gmail.com', 'Pending'),
(13, 23021872, 875615731, 5, 'kanchonkumar49@gmail.com', 'Pending'),
(14, 23021872, 1688395536, 3, 'kanchonkumar49@gmail.com', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `product_store`
--

CREATE TABLE `product_store` (
  `id` int(11) NOT NULL,
  `p_collection` varchar(55) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_image` varchar(55) NOT NULL,
  `p_category` varchar(55) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_color` varchar(55) NOT NULL,
  `p_size` varchar(55) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `p_description` text NOT NULL,
  `p_main_category` varchar(55) NOT NULL,
  `p_featured` varchar(55) NOT NULL DEFAULT 'NONE',
  `p_delivery` varchar(55) NOT NULL,
  `p_discount` int(11) NOT NULL,
  `p_id` int(20) NOT NULL,
  `p_modify` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_store`
--

INSERT INTO `product_store` (`id`, `p_collection`, `p_name`, `p_image`, `p_category`, `p_price`, `p_color`, `p_size`, `p_quantity`, `p_description`, `p_main_category`, `p_featured`, `p_delivery`, `p_discount`, `p_id`, `p_modify`) VALUES
(1, 'Default', 'New Product', '4.jpg', 'Classic', 89, 'Red', 'Small', 80, 'I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product ', 'Featured', 'Delivery', 'YES', 0, 898600452, '2021-05-24 11:49:24'),
(2, 'Default', 'Trendy Product', '5.jpg', 'Classic', 80, 'Green', 'Medium', 0, 'I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product ', 'Featured', 'Discount', '', 10, 1262909599, '2021-05-26 04:56:31'),
(3, 'Default', 'Classic Product', '6.jpg', 'Vintage', 90, 'Blue', 'Large', 60, 'I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product ', 'Newest', 'NONE', '', 0, 1419121315, '2021-05-24 11:51:18'),
(4, 'Default', 'Vintage', '7.jpg', 'Trendy', 65, 'Red', 'Large', 77, 'I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product ', 'Newest', 'NONE', '', 0, 1174506905, '2021-05-24 11:52:02'),
(5, 'Summer', 'New Product', '8.jpg', 'Trendy', 90, 'Red', 'Small', 0, 'I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product ', 'Featured_2', 'Delivery_2', 'YES', 0, 1417740018, '2021-05-24 11:52:47'),
(6, 'Summer', 'Classic Product', '9.jpg', 'Classic', 80, 'Red', 'Medium', 2, 'I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product ', 'Featured_2', 'Delivery_2', 'YES', 0, 1688395536, '2021-05-24 11:53:37'),
(7, 'Summer', 'Vintage', '10.jpg', 'Vintage', 60, 'Blue', 'Large', 50, 'I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product ', 'Newest_2', 'NONE', '', 0, 1482932776, '2021-05-24 11:54:14'),
(8, 'Summer', 'Fashoniate', '11.jpg', 'Fashoniate', 30, 'Black', 'Small', 20, 'I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product ', 'Newest_2', 'NONE', '', 0, 791216311, '2021-05-24 11:54:58'),
(9, 'Winter', 'New Product', '13.jpg', 'Trendy', 80, 'Yellow', 'Small', 75, 'I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product ', 'Featured_3', 'Delivery_3', 'YES', 0, 875615731, '2021-05-24 11:55:30'),
(10, 'Winter', 'Classic Product', '14.jpg', 'Classic', 90, 'Black', 'Medium', 80, 'I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product ', 'Featured_3', 'Discount_3', '', 15, 235851249, '2021-05-24 11:56:25'),
(11, 'Winter', 'Vintage', '15.jpg', 'Vintage', 70, 'Blue', 'Large', 60, 'I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I ', 'Newest_3', 'NONE', '', 0, 367741996, '2021-06-13 04:17:33'),
(12, 'Winter', 'Fashoniate', '16.jpg', 'Fashoniate', 60, 'Yellow', 'Small', 60, 'I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product ', 'Newest_3', 'NONE', '', 0, 1737954081, '2021-05-24 11:57:50'),
(13, 'Default', 'New Product', '4.jpg', 'Classic', 80, 'Red', 'Small', 80, 'I love this product', 'Newest', 'NONE', '', 0, 1934616182, '2021-05-24 16:41:30'),
(14, 'Default', 'New Product', '4.jpg', 'Classic', 89, 'Red', 'Medium', 80, 'I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product I love this product ', 'Newest', 'NONE', '', 0, 1199547532, '2021-05-24 16:44:31'),
(15, 'Default', 'New Product', '4.jpg', 'Classic', 89, 'Red', 'Medium', 70, 'I love ', 'Newest', 'NONE', '', 0, 1196634856, '2021-05-24 17:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `email`, `password`) VALUES
(1, 'kanchonkumar49@gmail.com', '123'),
(2, 'kapsul@gmail.com', '123'),
(3, 'tulipkumar81@gmail.com', '123456'),
(4, 'kapsul2@gmail.com', '1212223');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_store`
--
ALTER TABLE `product_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_store`
--
ALTER TABLE `product_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
