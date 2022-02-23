-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 10:31 AM
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
  `admin_id` int(4) UNSIGNED NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_gender` varchar(10) NOT NULL,
  `admin_phone` int(11) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_gender`, `admin_phone`, `admin_password`, `admin_profile_pic`) VALUES
(1, 'Ng Wee Woen', 'ngweewoen@gmail.com', 'female', 1112919518, 'ad57484016654da87125db86f4227ea3', 'Admin_116.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(4) UNSIGNED NOT NULL,
  `cate_code` int(6) NOT NULL,
  `cate_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `cate_code`, `cate_name`) VALUES
(1, 2037, 'burger'),
(2, 2038, 'pasta'),
(3, 2039, 'chicken steak');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `conID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `conName` text NOT NULL,
  `conEmail` text NOT NULL,
  `conPhone` text DEFAULT NULL,
  `conMessage` longtext NOT NULL,
  `conDatetime` datetime NOT NULL,
  `conStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`conID`, `conName`, `conEmail`, `conPhone`, `conMessage`, `conDatetime`, `conStatus`) VALUES
(001, 'Jessie', 'jessie@hotmail.com', '0112345678', 'Hello hohoho', '0000-00-00 00:00:00', 0),
(005, 'Lele', 'lele@gmail.com', '012-9875543', 'happy', '0000-00-00 00:00:00', 0),
(006, 'Lolo', 'lolo@hotmail.com', '0156674325', 'I love php', '0000-00-00 00:00:00', 0),
(007, 'Jessie', 'cheng200126@gmail.com', '0112345678', 'hi', '0000-00-00 00:00:00', 0),
(008, 'Jessie', 'xinyeee926@gmail.com', '0112345678', 'hi', '0000-00-00 00:00:00', 0),
(009, 'Jessie', 'xinyeee926@gmail.com', '012-9875543', 'hi', '0000-00-00 00:00:00', 0),
(010, 'Jessie', 'xinyeee926@gmail.com', '012-9875543', 'halo', '0000-00-00 00:00:00', 0),
(011, 'Xinyee', 'xinyeee926@gmail.com', '0117997514', 'Your page very beautiful', '0000-00-00 00:00:00', 0),
(012, 'Blue', 'xinyeee926@gmail.com', '0117997514', 'Nice', '0000-00-00 00:00:00', 0),
(013, 'Phobe', 'phobe@gmail.com', '0136775489', 'Burger looks nice', '0000-00-00 00:00:00', 0),
(014, 'Howard', 'howard@gmail.com', '0198765422', 'Halo', '0000-00-00 00:00:00', 0),
(015, 'xy', 'xinyeee926@gmail.com', '0123367452', 'Bello', '0000-00-00 00:00:00', 0),
(016, 'jayson', 'jayson@hotmail.com', '0112345678', 'NIce food', '0000-00-00 00:00:00', 0),
(017, 'jayson', 'jaysonlimck520@gmail.com', '0125678999', 'Your service is good', '0000-00-00 00:00:00', 0),
(018, 'Turkey', 'turkey@hotmail.com', '0127786543', 'Hellooooo', '0000-00-00 00:00:00', 0),
(019, 'xinyee', 'xinyeee926@gmail.com', '0117997514', 'Burger delicious', '0000-00-00 00:00:00', 0);

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
  `food_id` int(4) UNSIGNED NOT NULL,
  `food_code` varchar(100) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_price` float NOT NULL,
  `food_image` varchar(255) NOT NULL,
  `food_stock` int(4) NOT NULL,
  `food_status` longtext NOT NULL,
  `admin_id` int(4) UNSIGNED NOT NULL,
  `cate_id` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_code`, `food_name`, `food_price`, `food_image`, `food_stock`, `food_status`, `admin_id`, `cate_id`) VALUES
(1, 'food01', 'Blackpepper Chickenchop', 11, 'c1.jpeg', 500, '', 1, 3),
(2, 'food02', 'Creammy Rigatoni Vege', 12.5, 's1.jpg', 500, '', 1, 2),
(3, 'food03', 'Steamed Cheeseburger', 9.4, 'b1.jpg', 500, '', 1, 1),
(4, 'food04', 'Chickenchop with Mushroom', 10.2, 'c2.jpg', 500, '', 1, 3),
(5, 'food05', 'Spaghetti Aglio e Olio', 11.6, 's2.jpg', 500, '', 1, 2),
(6, 'food06', 'Wild Salmon Burgers', 14, 'b2.jpg', 500, '', 1, 1),
(7, 'food07', 'Honey Lemon Chicken Chop', 9.2, 'c4.jpg', 500, '', 1, 3),
(8, 'food08', 'Spaghetti Bolognese', 10, 's3.jpg', 500, '', 1, 2),
(9, 'food09', 'Beef Burgers', 12, 'b4.jpg', 500, '', 1, 1),
(10, 'food10', 'Chicken Parmigiana', 8, 'c5.jpg', 500, '', 1, 3),
(11, 'food11', 'Dill Butter Shrimp Farfalle Pasta', 13.9, 's4.jpg', 500, '', 1, 2),
(12, 'food12', 'Spicy Elk Burger', 13, 'b5.jpg', 500, '', 1, 1),
(13, 'food13', 'Dill Butter Shrimp Farfalle Pasta', 13.9, 'c6.jpg', 500, '', 1, 3),
(14, 'food14', 'Creammy Corn Gemelli', 12.2, 's5.jpg', 500, '', 1, 2),
(15, 'food15', 'Bison Burgers', 13.4, 'b6.jpg', 500, '', 1, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE `useraddress` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `userid` varchar(200) NOT NULL,
  `line1` varchar(200) DEFAULT NULL,
  `line2` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `postcode` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(5) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(200) NOT NULL,
  `userpassword` varchar(200) NOT NULL,
  `useremail` varchar(200) NOT NULL,
  `userprivilege` varchar(200) NOT NULL DEFAULT 'user',
  `userfirstname` varchar(200) NOT NULL,
  `userlastname` varchar(200) NOT NULL,
  `block?` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `userpassword`, `useremail`, `userprivilege`, `userfirstname`, `userlastname`, `block?`) VALUES
(00001, 'user0001', 'user0001', 'user0001@gmail.com', 'user', 'User', '0001', 0),
(00002, 'admin', 'admin', 'auroraadmin@gmail.com', 'admin', 'Aurora', 'Admin', 0),
(00003, 'Jessie', 'jessie', 'jessie@hotmail.com', 'user', '', '', 0),
(00005, 'rogesh', 'rogesh', 'rogesh@hotmail.com', 'user', '', '', 1);

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
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`conID`);

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
-- Indexes for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `conID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `useraddress`
--
ALTER TABLE `useraddress`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
