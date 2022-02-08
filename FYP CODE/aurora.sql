-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 08:25 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aurora`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_gender` varchar(10) NOT NULL,
  `admin_phone` int(11) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(4) NOT NULL,
  `cate_code` int(6) NOT NULL,
  `cate_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(4) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_address` varchar(150) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `cust_gender` varchar(10) NOT NULL,
  `cust_phone` int(11) NOT NULL,
  `cust_password` varchar(20) NOT NULL,
  `cust_profile_pic` varchar(255) NOT NULL,
  `cust_state` varchar(255) NOT NULL,
  `cust_postcode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(4) NOT NULL,
  `delivery_date` varchar(10) NOT NULL,
  `delivery_status` varchar(255) NOT NULL,
  `delivery_address` varchar(150) NOT NULL,
  `delivery_state` varchar(255) NOT NULL,
  `delivery_postcode` int(6) NOT NULL,
  `tran_address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(4) NOT NULL,
  `food_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `food_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `food_price` float NOT NULL,
  `food_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `food_stock` int(4) NOT NULL,
  `food_status` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_code`, `food_name`, `food_price`, `food_image`, `food_stock`, `food_status`) VALUES
(1, 'food01', 'Blackpepper Chickenchop', 11, 'c1.jpeg', 500, ''),
(2, 'food02', 'Creammy Rigatoni Vege', 12.5, 's1.jpg', 500, ''),
(3, 'food03', 'Steamed Cheeseburger', 9.4, 'b1.jpg', 500, ''),
(4, 'food04', 'Chickenchop with Mushroom', 10.2, 'c2.jpg', 500, ''),
(5, 'food05', 'Spaghetti Aglio e Olio', 11.6, 's2.jpg', 500, ''),
(6, 'food06', 'Wild Salmon Burgers', 14, 'b2.jpg', 500, ''),
(7, 'food07', 'Honey Lemon Chicken Chop', 9.2, 'c4.jpg', 500, ''),
(8, 'food08', 'Spaghetti Bolognese', 10, 's3.jpg', 500, ''),
(9, 'food09', 'Beef Burgers', 12, 'b4.jpg', 500, ''),
(10, 'food10', 'Chicken Parmigiana', 8, 'c5.jpg', 500, ''),
(11, 'food11', 'Dill Butter Shrimp Farfalle Pasta', 13.9, 's4.jpg', 500, ''),
(12, 'food12', 'Spicy Elk Burger', 13, 'b5.jpg', 500, ''),
(13, 'food13', 'Dill Butter Shrimp Farfalle Pasta', 13.9, 'c6.jpg', 500, ''),
(14, 'food14', 'Creammy Corn Gemelli', 12.2, 's5.jpg', 500, ''),
(15, 'food15', 'Bison Burgers', 13.4, 'b6.jpg', 500, '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tran_id` int(4) NOT NULL,
  `tran_prod_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tran_date` varchar(10) NOT NULL,
  `tran_name` varchar(50) NOT NULL,
  `tran_email` varchar(30) NOT NULL,
  `tran_phone` int(11) NOT NULL,
  `tran_address` varchar(150) NOT NULL,
  `tran_card` text NOT NULL,
  `tran_card_name` varchar(30) NOT NULL,
  `tran_status` varchar(255) NOT NULL,
  `tran_payment_method` varchar(255) NOT NULL,
  `tran_card_expiry` varchar(4) NOT NULL,
  `tran_card_cvv` varchar(255) NOT NULL,
  `cust_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction detail`
--

CREATE TABLE `transaction detail` (
  `trand_id` int(4) NOT NULL,
  `trand_shop_stock` int(4) NOT NULL,
  `trand_total` float NOT NULL,
  `trand_subtotal` varchar(63) NOT NULL,
  `trand_quantity` int(4) NOT NULL,
  `food_id` int(4) NOT NULL,
  `tran_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tran_id`);

--
-- Indexes for table `transaction detail`
--
ALTER TABLE `transaction detail`
  ADD PRIMARY KEY (`trand_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `food_ibfk_2` FOREIGN KEY (`cate_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
