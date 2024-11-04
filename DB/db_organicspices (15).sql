-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 11:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_organicspices`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminreg`
--

CREATE TABLE `tbl_adminreg` (
  `admin_id` int(15) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_contact` int(11) NOT NULL,
  `admin_password` varchar(16) NOT NULL,
  `admin_mail` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_adminreg`
--

INSERT INTO `tbl_adminreg` (`admin_id`, `admin_name`, `admin_contact`, `admin_password`, `admin_mail`) VALUES
(6, 'Harini.c', 2147483647, 'Harini4551', 'jananiharini4551');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(10) NOT NULL,
  `booking_amount` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_amount`, `booking_status`, `product_id`, `user_id`, `booking_address`) VALUES
(1, '2024-10-05', 599, 2, 0, 6, ''),
(2, '2024-10-08', 958, 2, 0, 6, ''),
(3, '2024-10-09', 599, 2, 0, 6, ''),
(4, '2024-10-09', 599, 2, 0, 6, ''),
(5, '2024-10-09', 399, 2, 0, 6, ''),
(6, '2024-10-25', 1277, 2, 0, 6, ''),
(7, '2024-11-01', 0, 2, 0, 8, ''),
(8, '2024-11-01', 0, 2, 0, 8, 'piravom\r\nernakulam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL DEFAULT 1,
  `product_id` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT 0,
  `booking_id` int(11) NOT NULL,
  `deliveryagent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_quantity`, `product_id`, `cart_status`, `booking_id`, `deliveryagent_id`) VALUES
(1, 1, 1, 4, 1, 17),
(2, 2, 1, 4, 2, 17),
(3, 1, 1, 1, 3, 0),
(4, 1, 1, 1, 4, 0),
(5, 1, 3, 1, 5, 0),
(6, 4, 3, 1, 6, 0),
(7, 7, 9, 5, 7, 18),
(8, 5, 10, 4, 8, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(14, 'Baking and Desserts'),
(16, 'sweet spices'),
(17, 'Earthy spices'),
(18, 'Spicy/Hot'),
(19, 'Seeds'),
(20, 'Roots and Rhizomes'),
(21, 'Leafy spices');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_vstatus` int(11) NOT NULL DEFAULT 0,
  `company_name` varchar(30) NOT NULL,
  `company_id` int(20) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_password` varchar(16) NOT NULL,
  `company_address` varchar(30) NOT NULL,
  `company_district` varchar(30) NOT NULL,
  `place_id` int(30) NOT NULL,
  `company_logo` varchar(100) NOT NULL,
  `company_proof` varchar(100) NOT NULL,
  `company_doj` varchar(20) NOT NULL,
  `company_contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_vstatus`, `company_name`, `company_id`, `company_email`, `company_password`, `company_address`, `company_district`, `place_id`, `company_logo`, `company_proof`, `company_doj`, `company_contact`) VALUES
(1, 'harini', 1, 'jananiharini4551@gmail.com', '66666', 'jew street\r\n', '', 1, 'img 5.jpg', 'bpc.jpg', '', 'ddf@gmail.'),
(1, 'Aleena reji', 11, 'aleenareji002@gmail.com', '002', 'thurathel(H)\r\nkothamangalam\r\n', '', 9, 'customer.jpeg', '', '', '6238834461');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_content` varchar(500) NOT NULL,
  `complaint_date` varchar(10) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `complaint_reply` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `complaint_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_date`, `complaint_status`, `complaint_reply`, `user_id`, `product_id`, `complaint_file`) VALUES
(1, 'hkhj', 'gii', '2024-07-12', 0, 'GOOD', 6, 18, 'bay leaf.webp'),
(2, '', '', '2024-07-16', 0, '', 6, 0, ''),
(3, 'bad', 'less quantity in cumin', '2024-07-19', 1, 'GOOD', 6, 23, 'cumin seeds.webp'),
(4, 'bad', 'less quantity in cumin', '2024-07-19', 0, '', 6, 23, 'cumin seeds.webp'),
(5, 'xc', 'cvcv ', '2024-08-07', 0, '', 6, 23, 'bay leaf.webp'),
(6, 'bad', 'dwertykl', '2024-08-07', 0, '', 6, 23, 'cumin seeds.webp'),
(7, 'kolluls', 'sdfvgbhj', '2024-10-05', 1, 'uvva', 6, 1, 'about-img.jpg'),
(8, 'tttt', 'ffff', '2024-10-09', 1, 'bad', 6, 1, 'clove.webp'),
(9, 'ggty', 'cccc', '2024-10-09', 1, 'sorry', 6, 1, 'bay leaf.webp'),
(10, 'bad', 'ertyuiop', '2024-10-09', 1, 'bad', 6, 1, 'cumin seeds.webp'),
(11, 'good', 'good product', '2024-11-01', 0, '', 8, 9, ''),
(12, 'good', 'its a good product', '2024-11-01', 1, 'thank you', 8, 10, 'Nutmeg.webp'),
(13, '', '', '2024-11-01', 0, '', 8, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deliveryagent`
--

CREATE TABLE `tbl_deliveryagent` (
  `deliveryagent_id` int(11) NOT NULL,
  `deliveryagent_name` varchar(250) NOT NULL,
  `deliveryagent_gender` varchar(100) NOT NULL,
  `deliveryagent_email` varchar(150) NOT NULL,
  `deliveryagent_password` varchar(50) NOT NULL,
  `deliveryagent_photo` varchar(1000) NOT NULL,
  `deliveryagent_contact` varchar(100) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_deliveryagent`
--

INSERT INTO `tbl_deliveryagent` (`deliveryagent_id`, `deliveryagent_name`, `deliveryagent_gender`, `deliveryagent_email`, `deliveryagent_password`, `deliveryagent_photo`, `deliveryagent_contact`, `company_id`) VALUES
(4, 'ann', 'Female', 'mychael@gmail.com', '00000', 'bay leaf.webp', '9897969594', 0),
(5, 'mariya', 'Female', 'mariya@gmail.com', '2334', 'black cardamom.webp', '9897969594', 0),
(6, 'mariya', 'Female', 'mariya@gmail.com', '2334', 'bay leaf.webp', '9897969594', 0),
(8, 'mariya', 'Female', 'mariya@gmail.com', '2334', 'bay leaf.webp', '9897969594', 0),
(9, 'mariya', 'Female', 'mariya@gmail.com', '2334', 'bay leaf.webp', '9897969594', 0),
(11, 'akku', 'Female', 'mychael@gmail.com', '0000', 'clove.webp', '9897969594', 0),
(12, 'anu', 'Female', 'anu@gmail.com', 'anuu', 'volly.jpg', '9087665645', 0),
(17, 'mariya', 'Female', 'mariya@gmail.com', '123', 'IMG-20231012-WA0083.jpg', '9897969594', 1),
(18, 'sree', 'Female', 'mychael@gmail.com', '2345', 'admin profile.jpeg', '9895914551', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `dis_id` int(11) NOT NULL,
  `dis_percentage` int(11) NOT NULL,
  `dis_amount` int(11) NOT NULL,
  `dis_maxamount` int(11) NOT NULL,
  `dis_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_discount`
--

INSERT INTO `tbl_discount` (`dis_id`, `dis_percentage`, `dis_amount`, `dis_maxamount`, `dis_status`) VALUES
(1, 20, 200, 3000, 0),
(2, 20, 1000, 400, 1),
(3, 10, 1000, 300, 1),
(4, 20, 1000, 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(3, 'ernakulam'),
(7, 'Idukki'),
(8, 'Kottayam'),
(9, 'Trivandrum'),
(10, 'Idukki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'muvattupuzha', 3),
(2, 'pala', 6),
(3, 'kochi', 3),
(4, 'piravom', 3),
(5, 'vytila', 3),
(6, 'vandiperiyar', 7),
(7, 'kumaly', 7),
(8, 'Thekkady', 0),
(9, 'kothamangalam', 3),
(10, 'mundakayam', 8),
(11, 'kanjirapally ', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `product_photo` varchar(200) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_description`, `subcat_id`, `product_photo`, `product_quantity`, `product_price`, `product_name`, `company_id`) VALUES
(1, 'Coffee beans are primarily known for their role in', 21, 'Fried coffee beans.webp', 2, 599, 'Coffee Beans', 1),
(3, ' Adds a sweet, warm flavor to baked goods (like ca', 11, 'cinnamon roll.webp', 3, 399, 'Cinnamon', 1),
(9, 'Black pepper is a versatile spice widely used in c', 12, 'black pepper.webp', 2, 755, 'Black Pepper', 0),
(10, 'Nutmeg is a key ingredient in spice blends such as', 8, 'Nutmeg.webp', 5, 288, 'Nutmeg', 11),
(11, 'Cinnamon rolls are a versatile and delicious pastr', 7, 'cinnamon roll.webp', 4, 280, 'Cinnamon ', 0),
(12, ' nutmace is a versatile spice with various culinar', 24, 'Nutmace.webp', 3, 199, 'Nutmace', 0),
(13, 'Culinary uses include adding flavor to baked goods', 9, 'clove.webp', 1, 100, 'Cloves', 0),
(14, ' white pepper is used in Ayurvedic medicine to tre', 20, 'White Pepper.webp', 350, 3, 'White pepper', 0),
(15, 'Cinnamon stick used for adding warmth and flavor t', 29, 'Cinnamon stick.webp', 5, 400, 'Cinnamon stick', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `rating_value` int(11) NOT NULL,
  `rating_content` varchar(30) NOT NULL,
  `rating_datetime` varchar(30) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `rating_value`, `rating_content`, `rating_datetime`, `product_id`, `user_id`) VALUES
(1, 2, 'hhkw', '2024-09-27 15:48:12', 23, 6),
(2, 4, 'Hola\n', '2024-10-25 11:08:47', 1, 6),
(3, 1, 'Kollula\n', '2024-10-25 11:09:11', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spices`
--

CREATE TABLE `tbl_spices` (
  `spices_id` int(11) NOT NULL,
  `spices_name` varchar(30) NOT NULL,
  `subcat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_spices`
--

INSERT INTO `tbl_spices` (`spices_id`, `spices_name`, `subcat_id`) VALUES
(9, 'cumin', 0),
(10, 'Pepper', 0),
(12, 'Turmeric', 0),
(13, 'teyla', 0),
(14, 'cardamom', 0),
(15, 'Black pepper', 0),
(16, 'Cloves', 0),
(17, 'Bay leaves', 0),
(18, 'Mustard seed', 0),
(19, 'Yellow mustard', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(10) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `stock_date` varchar(10) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_quantity`, `stock_date`, `product_id`) VALUES
(1, 2, '2024-10-05', 1),
(2, 5, '2024-10-08', 3),
(3, 3, '2024-10-08', 1),
(4, 3, '2024-11-01', 9),
(5, 4, '2024-11-01', 9),
(6, 3, '2024-11-01', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcat_id`, `subcat_name`, `category_id`) VALUES
(7, 'Cinnamon', 14),
(8, 'Nutmeg', 14),
(9, 'Cloves', 14),
(10, 'Black pepper', 15),
(12, 'Black pepper', 18),
(14, 'Cumin', 19),
(15, 'Fennel', 19),
(16, 'Mustard', 19),
(20, 'white pepper', 14),
(21, 'Cofee beans', 19),
(22, 'Turmeric', 17),
(23, 'Coriander', 17),
(24, 'Nutmace', 14),
(25, 'Poppy seeds ', 19),
(26, 'Red chilly', 18),
(27, 'Kokkum(kudampuli)', 17),
(28, 'Dry ginger', 20),
(29, 'Cinnamon stick', 14),
(30, 'Cardamom', 16),
(31, 'Black cardamom', 19),
(32, 'Starnise', 16),
(33, 'Tea', 17),
(34, 'Curry leaf', 21),
(35, 'Bay leaf', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_address`, `place_id`, `user_photo`, `user_password`) VALUES
(6, 'Nandu', 'nandu@gmail.com', '8528528525', 'jhiukjhg', 1, 'bpc.jpj.jpg', '1111'),
(8, 'sreeshna regi', 'sree4102004@gmail.com', '9527317445', 'sresh bhavan\r\npiravom\r\n kerala', 4, 'user.jpeg', '22222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminreg`
--
ALTER TABLE `tbl_adminreg`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_deliveryagent`
--
ALTER TABLE `tbl_deliveryagent`
  ADD PRIMARY KEY (`deliveryagent_id`);

--
-- Indexes for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_spices`
--
ALTER TABLE `tbl_spices`
  ADD PRIMARY KEY (`spices_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminreg`
--
ALTER TABLE `tbl_adminreg`
  MODIFY `admin_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_deliveryagent`
--
ALTER TABLE `tbl_deliveryagent`
  MODIFY `deliveryagent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_spices`
--
ALTER TABLE `tbl_spices`
  MODIFY `spices_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
