-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 06:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_about`, `admin_contact`) VALUES
(3, 'Admin2', 'hij@12gmail.com', 'admin1234567', 'uwekh ufl fjeh flfnasljlabnalsk lia shdfkas', '9899999888'),
(4, 'Admin1', 'efg13@gmail.com', 'admin123456', 'dsfkjh kdfhl djfnldf alsdn ascas', '9877771111');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'Laptops', 'laptops'),
(2, 'Desktop PC', 'desktop-pc'),
(3, 'Tablets', 'tablets'),
(4, 'Smart Phones', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`) VALUES
(4, 'xingxing', 'd_xingxing11@gmail.com', 'youthwithyou1', '9811122000'),
(5, 'chaeng', 'sonchaeng17@yahoo.com', 'strawberry', '9818181818'),
(6, 'jaebeom', 'jaebeom12@yahoo.com', 'jaybhrnow', '9800110011'),
(7, 'abc', 'abc11@gmail.com', 'abcdef', '9800000011');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `product_id`, `amount`, `qty`, `size`, `order_date`) VALUES
(60, 4, 7, 1000, 1, 'small', '2022-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(14, 9, 11, 2),
(15, 9, 13, 5),
(16, 9, 3, 2),
(17, 9, 1, 3),
(18, 10, 13, 3),
(19, 10, 2, 4),
(20, 10, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `p_cat_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img` text DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `date`, `product_title`, `product_img`, `product_price`, `product_keywords`, `product_desc`) VALUES
(2, 2, '2022-06-12 07:18:55', 'Sasuke Hoodie', 'Sasuke Hoodie.jpeg', 2000, 'Hoodie', 'dsifj ludsighsd khlsdlsdjbvlsd'),
(3, 1, '2022-06-12 07:19:17', 'Kaneki ken T-shirt', 'kaneki ken.jpeg', 1000, 'tshirt', 'dkf dughbkd gousdlh dghdslkgh sdiubgskbgs,dgjbjbdgds'),
(4, 2, '2022-06-12 07:20:33', 'Team Kakashi Hoodie', 'Team Kakashi.jpeg', 2000, 'Hoodie', 'sidfh fla djnlingolgnoug udshkfj s shdl1'),
(6, 3, '2022-06-12 07:20:46', 'Fairy Tail Necklace', 'Fairy Tail Necklace.jpg', 500, 'necklace', 'sjdfh kagsdks bdsfn dkjfb idsbfskjd ofndsiu bsdkfn sdjfnksdjb'),
(7, 3, '2022-06-17 09:14:11', 'One piece mask', 'one piece mask.jpeg', 1000, 'mask', '<p>dsjf kufhsdjkfb ofhal sflhasalnagdfs&nbsp;</p>'),
(9, 2, '2022-07-16 03:41:29', 'Asta Hoodie', 'Asta Hooodie.jpg', 1500, 'hoodiee', '<p>sdkfh kudfh sdfh kdhflslf ldsdlgn dslksldfnsdlkfn slknsldkfn lsdjfnlsdfj sldjfnlsdjfn lsdnflsd lfskdnflksdlsdbnfl&nbsp; dsifhlsdnfl</p>'),
(10, 1, '2022-07-25 12:03:36', 'Kakashi Black T-shirt', 'KAKASHI-COTTON-BLACK-TSHIRT.jpg', 2000, 'asdk suashdka sasbnd', '<p>jkasbdas a<strong>sdas asdb&nbsp;</strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(11) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Tshirts', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti necessitatibus a id omnis cum enim voluptas, praesentium placeat doloremque odit beatae, tenetur in, perspiciatis voluptatibus rem amet voluptatem! Deserunt, adipisci.'),
(2, 'Hoodies', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti necessitatibus a id omnis cum enim voluptas, praesentium placeat doloremque odit beatae, tenetur in, perspiciatis voluptatibus rem amet voluptatem! Deserunt, adipisci.'),
(3, 'Accessories', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti necessitatibus a id omnis cum enim voluptas, praesentium placeat doloremque odit beatae, tenetur in, perspiciatis voluptatibus rem amet voluptatem! Deserunt, adipisci.');

-- --------------------------------------------------------

--
-- Table structure for table `salesreport`
--

CREATE TABLE `salesreport` (
  `sdate` varchar(100) NOT NULL,
  `cemail` varchar(100) NOT NULL,
  `ptitle` text NOT NULL,
  `quty` int(100) NOT NULL,
  `amnt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesreport`
--

INSERT INTO `salesreport` (`sdate`, `cemail`, `ptitle`, `quty`, `amnt`) VALUES
('2022-7-9', 'kakaza@yahoo.com', 'Mask', 3, '500'),
('2020-8-12', 'efgdsd@gmail.com', 'RingDing', 1, '500'),
('2022-01-01', 'efg@gmail.com', 'Black', 3, '700');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
