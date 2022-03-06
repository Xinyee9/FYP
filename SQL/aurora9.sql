-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-03-06 19:53:39
-- 服务器版本： 10.4.21-MariaDB
-- PHP 版本： 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `aurora`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
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
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_gender`, `admin_phone`, `admin_password`, `admin_profile_pic`) VALUES
(1, 'Ng Wee Woen', 'ngweewoen@gmail.com', 'female', 1112919518, 'ad57484016654da87125db86f4227ea3', 'Admin_116.png');

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(4) NOT NULL,
  `cart_qty` int(4) NOT NULL,
  `food_id` int(4) NOT NULL,
  `userid` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_qty`, `food_id`, `userid`) VALUES
(9, 2, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `category_id` int(4) UNSIGNED NOT NULL,
  `cate_code` int(6) NOT NULL,
  `cate_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`category_id`, `cate_code`, `cate_name`) VALUES
(1, 2037, 'burger'),
(2, 2038, 'pasta'),
(3, 2039, 'chicken steak');

-- --------------------------------------------------------

--
-- 表的结构 `contactus`
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
-- 转存表中的数据 `contactus`
--

INSERT INTO `contactus` (`conID`, `conName`, `conEmail`, `conPhone`, `conMessage`, `conDatetime`, `conStatus`) VALUES
(001, 'Jessie', 'jessie@hotmail.com', '0112345678', 'Hello!', '0000-00-00 00:00:00', 0),
(002, 'Xinyee', 'xinyeee926@gmail.com', '0176339543', 'I like the service attitude of your restaurant~ ', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- 表的结构 `customer`
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
-- 表的结构 `delivery`
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
-- 表的结构 `food`
--

CREATE TABLE `food` (
  `food_id` int(4) UNSIGNED NOT NULL,
  `food_code` varchar(100) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_price` float NOT NULL,
  `food_description` text NOT NULL,
  `food_image` varchar(255) NOT NULL,
  `food_stock` int(4) NOT NULL,
  `food_status` varchar(100) NOT NULL,
  `admin_id` int(4) UNSIGNED NOT NULL,
  `cate_id` int(4) UNSIGNED NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `food`
--

INSERT INTO `food` (`food_id`, `food_code`, `food_name`, `food_price`, `food_description`, `food_image`, `food_stock`, `food_status`, `admin_id`, `cate_id`, `active`) VALUES
(1, 'food01', 'Blackpepper Chickenchop', 11, 'Marinated chicken grilled or pan-fried in a thick, strong black pepper sauce.', 'c1.jpeg', 500, '', 1, 3, 'Yes'),
(2, 'food02', 'Creammy Rigatoni Vege', 12.5, 'It\'s the ideal mix of handmade vegetable sauce, smoked tomato, and rigatoni pasta, topped with grated cheese and fresh parsley.', 's1.jpg', 500, '', 1, 2, 'Yes'),
(3, 'food03', 'Steamed Cheeseburger', 9.4, 'It is a steamed hamburger with cheese on top.', 'b1.jpg', 500, '', 1, 1, 'Yes'),
(4, 'food04', 'Chickenchop with Mushroom', 10.2, 'Created with partly cooked boneless thigh and leg parts that have been dipped in batter. ', 'c2.jpg', 500, '', 1, 3, 'Yes'),
(5, 'food05', 'Spaghetti Aglio e Olio', 11.6, 'The garlic imparts a rich, nutty taste to the oil, and the salty, starchy pasta boiling water converts it into a highly delicious sauce. ', 's2.jpg', 500, '', 1, 2, 'Yes'),
(6, 'food06', 'Wild Salmon Burgers', 14, 'Made almost entirely with fresh salmon without added breadcrumbs or eggs.', 'b2.jpg', 500, '', 1, 1, 'Yes'),
(7, 'food07', 'Honey Lemon Chicken Chop', 9.2, 'The meat is crispy and drenched in a delicious, sticky honey lemon sauce. The zest of fresh lemon adds so much flavour!', 'c4.jpg', 500, '', 1, 3, 'Yes'),
(8, 'food08', 'Spaghetti Bolognese', 10, 'The Bolognese Sauce is rich and thick, with a wonderful depth of flavour.', 's3.jpg', 500, '', 1, 2, 'Yes'),
(9, 'food09', 'Beef Burgers', 12, 'Packed with onions and herbs for more flavour, and ideal for topping with cheese, lettuce, and tomato.', 'b4.jpg', 500, '', 1, 1, 'Yes'),
(10, 'food10', 'Chicken Parmigiana', 8, 'The sauce is too bland, or cheddar cheese is substituted for mozzarella.', 'c5.jpg', 500, '', 1, 3, 'Yes'),
(11, 'food11', 'Dill Butter Shrimp Farfalle Pasta', 13.9, 'It is a creamy pasta with shrimp, peas, red pepper, and celery mixed in a dill-flavored mayonnaise dressing.', 's4.jpg', 500, '', 1, 2, 'Yes'),
(12, 'food12', 'Spicy Elk Burger', 13, 'To bring out the taste of the meat, season it with simple seasonings such as salt, pepper, onion powder, and garlic powder.', 'b5.jpg', 500, '', 1, 1, 'Yes'),
(13, 'food13', 'Seared Salmon Steak with Wasabi Lemon Vinaigrette', 13.9, 'Simply grilled salmon steak with wasabi lemon vinaigrette, haricots verts, and cress.', 'c6.jpg', 500, '', 1, 3, 'Yes'),
(14, 'food14', 'Creammy Corn Gemelli', 12.2, 'A delectable sauce consisting of puréed fresh corn and fragrant sautéed onions.', 's5.jpg', 500, '', 1, 2, 'Yes'),
(15, 'food15', 'Bison Burgers', 13.4, 'Seasoned with a variety of delectable spices such as onion, garlic, paprika, and parsley.', 'b6.jpg', 500, '', 1, 1, 'Yes');

-- --------------------------------------------------------

--
-- 表的结构 `transaction`
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
-- 表的结构 `transaction detail`
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
-- 表的结构 `useraddress`
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
-- 表的结构 `users`
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
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`userid`, `username`, `userpassword`, `useremail`, `userprivilege`, `userfirstname`, `userlastname`, `block?`) VALUES
(00001, 'user0001', 'user0001', 'user0001@gmail.com', 'user', 'User', '0001', 0),
(00002, 'admin', 'admin', 'auroraadmin@gmail.com', 'admin', 'Aurora', 'Admin', 0),
(00003, 'Jessie', 'jessie', 'jessie@hotmail.com', 'user', '', '', 0),
(00005, 'rogesh', 'rogesh', 'rogesh@hotmail.com', 'user', '', '', 1);

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- 表的索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- 表的索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- 表的索引 `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`conID`);

--
-- 表的索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- 表的索引 `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- 表的索引 `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- 表的索引 `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tran_id`);

--
-- 表的索引 `transaction detail`
--
ALTER TABLE `transaction detail`
  ADD PRIMARY KEY (`trand_id`);

--
-- 表的索引 `useraddress`
--
ALTER TABLE `useraddress`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `contactus`
--
ALTER TABLE `contactus`
  MODIFY `conID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `useraddress`
--
ALTER TABLE `useraddress`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
