-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-03-31 01:14:16
-- 服务器版本： 10.4.22-MariaDB
-- PHP 版本： 7.4.28

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
-- 表的结构 `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(4) NOT NULL,
  `cart_qty` int(4) NOT NULL,
  `ori_price` float NOT NULL,
  `subtotal` float NOT NULL,
  `food_id` int(4) NOT NULL,
  `userid` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(001, 'Xinyee', 'xinyeee926@gmail.com', '0176339543', 'Your service is good!', '2022-03-08 01:53:47', 0);

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
(1, 'food01', 'Blackpepper Chickenchop', 11, 'Marinated chicken grilled or pan-fried in a thick, strong black pepper sauce.', 'c1.jpeg', 500, 'available', 1, 3, 'Yes'),
(2, 'food02', 'Creammy Rigatoni Vege', 12.5, 'It\'s the ideal mix of handmade vegetable sauce, smoked tomato, and rigatoni pasta, topped with grated cheese and fresh parsley.', 's1.jpg', 500, 'available', 1, 2, 'Yes'),
(3, 'food03', 'Steamed Cheeseburger', 9.4, 'It is a steamed hamburger with cheese on top.', 'b1.jpg', 500, 'available', 1, 1, 'Yes'),
(4, 'food04', 'Chickenchop with Mushroom', 10.2, 'Created with partly cooked boneless thigh and leg parts that have been dipped in batter. ', 'c2.jpg', 500, 'available', 1, 3, 'Yes'),
(5, 'food05', 'Spaghetti Aglio e Olio', 11.6, 'The garlic imparts a rich, nutty taste to the oil, and the salty, starchy pasta boiling water converts it into a highly delicious sauce. ', 's2.jpg', 500, 'available', 1, 2, 'Yes'),
(6, 'food06', 'Wild Salmon Burgers', 14, 'Made almost entirely with fresh salmon without added breadcrumbs or eggs.', 'b2.jpg', 500, 'available', 1, 1, 'Yes'),
(7, 'food07', 'Honey Lemon Chicken Chop', 9.2, 'The meat is crispy and drenched in a delicious, sticky honey lemon sauce. The zest of fresh lemon adds so much flavour!', 'c4.jpg', 500, 'available', 1, 3, 'Yes'),
(8, 'food08', 'Spaghetti Bolognese', 10, 'The Bolognese Sauce is rich and thick, with a wonderful depth of flavour.', 's3.jpg', 500, 'available', 1, 2, 'Yes'),
(9, 'food09', 'Beef Burgers', 12, 'Packed with onions and herbs for more flavour, and ideal for topping with cheese, lettuce, and tomato.', 'b4.jpg', 500, 'available', 1, 1, 'Yes'),
(10, 'food10', 'Chicken Parmigiana', 8, 'The sauce is too bland, or cheddar cheese is substituted for mozzarella.', 'c5.jpg', 500, 'available', 1, 3, 'Yes'),
(11, 'food11', 'Dill Butter Shrimp Farfalle Pasta', 13.9, 'It is a creamy pasta with shrimp, peas, red pepper, and celery mixed in a dill-flavored mayonnaise dressing.', 's4.jpg', 500, 'available', 1, 2, 'Yes'),
(12, 'food12', 'Spicy Elk Burger', 13, 'To bring out the taste of the meat, season it with simple seasonings such as salt, pepper, onion powder, and garlic powder.', 'b5.jpg', 500, 'available', 1, 1, 'Yes'),
(13, 'food13', 'Seared Salmon Steak with Wasabi Lemon Vinaigrette', 13.9, 'Simply grilled salmon steak with wasabi lemon vinaigrette, haricots verts, and cress.', 'c6.jpg', 500, 'available', 1, 3, 'Yes'),
(14, 'food14', 'Creammy Corn Gemelli', 12.2, 'A delectable sauce consisting of puréed fresh corn and fragrant sautéed onions.', 's5.jpg', 500, 'available', 1, 2, 'Yes'),
(15, 'food15', 'Bison Burgers', 13.4, 'Seasoned with a variety of delectable spices such as onion, garlic, paprika, and parsley.', 'b6.jpg', 500, 'available', 1, 1, 'Yes');

-- --------------------------------------------------------

--
-- 表的结构 `real_cart`
--

CREATE TABLE `real_cart` (
  `real_cart_id` int(5) NOT NULL,
  `cart_qty` int(5) NOT NULL,
  `ori_price` float NOT NULL,
  `subtotal` float NOT NULL,
  `total` float NOT NULL,
  `transaction_id` int(5) DEFAULT NULL,
  `userid` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `real_cart`
--

INSERT INTO `real_cart` (`real_cart_id`, `cart_qty`, `ori_price`, `subtotal`, `total`, `transaction_id`, `userid`) VALUES
(37, 1, 11, 11, 1, 60, 1),
(38, 3, 12.5, 37.5, 2, 60, 1);

-- --------------------------------------------------------

--
-- 表的结构 `trans`
--

CREATE TABLE `trans` (
  `transaction_id` int(5) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_time` time NOT NULL,
  `e_d_time` time NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `Trans_Address` varchar(150) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Trans_State` varchar(255) NOT NULL,
  `Zip` int(10) NOT NULL,
  `delivery_status` varchar(200) NOT NULL,
  `userid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `trans`
--

INSERT INTO `trans` (`transaction_id`, `transaction_date`, `transaction_time`, `e_d_time`, `Full_Name`, `Trans_Address`, `City`, `Trans_State`, `Zip`, `delivery_status`, `userid`) VALUES
(60, '2022-03-31', '06:48:49', '07:18:49', 'Jayson', '(M.C.Office A-01-01) B-11-07, Ixora Apartment', 'Bukit Beruang', 'Melaka', 75450, 'Order Confirm', 1);

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
  `userfirstname` varchar(200) DEFAULT NULL,
  `userlastname` varchar(200) DEFAULT NULL,
  `block?` tinyint(1) NOT NULL DEFAULT 0,
  `verify_token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`userid`, `username`, `userpassword`, `useremail`, `userprivilege`, `userfirstname`, `userlastname`, `block?`, `verify_token`) VALUES
(00001, 'aurorauser0001', 'aurorauser0001', 'aurorauser0001@gmail.com', 'user', 'Aurora', 'User', 0, ''),
(00002, 'admin', 'admin', 'auroraadmin@gmail.com', 'admin', 'Aurora', 'Admin', 0, ''),
(00003, 'Jessie', 'jessie', 'jessie@hotmail.com', 'user', '', '', 0, ''),
(00005, 'rogesh', 'rogesh', 'rogesh@hotmail.com', 'user', '', '', 1, ''),
(00006, 'Ng Wee Woen', '123', 'ngweewoen0415@gmail.com', 'admin', '', '', 0, '4a405b34206fa317ac92c50563b3e135'),
(00007, 'Jayson Lim Chun Keat', 'Jayson123', 'jaysonlimck@gmail.com', 'admin', '', '', 0, '53fe92197f0a239d028f946729c72c4d'),
(00008, 'Chong Xin Yee', '456', 'xinyeeada@hotmail.com', 'admin', NULL, NULL, 0, '2dfd53f56fae8db5c1a16908e6b80398');

--
-- 转储表的索引
--

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
-- 表的索引 `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- 表的索引 `real_cart`
--
ALTER TABLE `real_cart`
  ADD PRIMARY KEY (`real_cart_id`);

--
-- 表的索引 `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`transaction_id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `contactus`
--
ALTER TABLE `contactus`
  MODIFY `conID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `real_cart`
--
ALTER TABLE `real_cart`
  MODIFY `real_cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用表AUTO_INCREMENT `trans`
--
ALTER TABLE `trans`
  MODIFY `transaction_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
