-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 15, 2023 at 02:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_cake_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `session_id`) VALUES
(1, 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '27hn0rgei2ck3721i89judr9l0');

-- --------------------------------------------------------

--
-- Table structure for table `bakers`
--

CREATE TABLE `bakers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bakers`
--

INSERT INTO `bakers` (`id`, `name`, `position`, `note`, `image`) VALUES
(19, 'Mr. David', 'Certified master baker', 'Hope you enjoy our product !', 'team-1.jpg'),
(21, 'Mr. Jonney', 'Certified Journey Baker', 'Your order made our day!', 'team-3.jpg'),
(22, 'Mr. Christ', 'Certified Pastry Culinarian', 'We truly appreciate your support!', 'team-4.jpg'),
(30, 'Ms. Jessica', 'Certified Decorator', 'Thanks for your perchase!', 'team-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `card_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `card_no`, `password`, `amount`) VALUES
(1, '123456789', '123456', '99568180'),
(2, '987654321', '987654', '0');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(65, 'Cup Cake'),
(66, 'Donuts'),
(67, 'Cake'),
(68, 'Bun'),
(69, 'customize_cake');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`) VALUES
(13, 'Soe YY', 'soesoe2022@gmail.com', 'contact me!'),
(18, 'Soe YY', 'soe@gmail.com', 'hi'),
(19, 'Soe YY', 'soesoe2022@gmail.com', 'cwcwecwecwecwe');

-- --------------------------------------------------------

--
-- Table structure for table `creams`
--

CREATE TABLE `creams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `scent` varchar(255) NOT NULL,
  `taste` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `creams`
--

INSERT INTO `creams` (`id`, `name`, `color`, `scent`, `taste`, `price`) VALUES
(1, 'sweet_strawberry', 'pink', 'strawberry', 'strawberry', 5000),
(8, 'chocolate_cream', 'brown', 'chocolate', 'chocolate', 5000),
(9, 'vanilla_cream', 'white', 'orchit', 'vanilla', 5000),
(10, 'blueberry_cream', 'blue', 'blueberry', 'blueberry', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `customize_order_details`
--

CREATE TABLE `customize_order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cream_id` int(11) NOT NULL,
  `doll_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customize_order_details`
--

INSERT INTO `customize_order_details` (`id`, `order_id`, `product_id`, `cream_id`, `doll_id`, `size_id`, `description`, `qty`, `unit_price`, `subtotal`) VALUES
(1, 524, 85, 1, 8, 3, 'happy birthday!', 1, 55000, 55000),
(2, 525, 82, 8, 10, 8, 'Cream Myar Myar lay lote pay', 1, 63000, 63000),
(3, 527, 84, 8, 8, 2, 'I love you Babe', 1, 55000, 55000),
(4, 529, 84, 9, 9, 3, 'I wanna be Hero', 1, 62000, 62000),
(5, 529, 88, 8, 10, 3, 'hi', 1, 80000, 80000),
(6, 532, 84, 1, 8, 2, 'happys', 5, 55000, 275000),
(7, 533, 89, 1, 8, 3, 'happy birthday my love !', 1, 73000, 73000),
(8, 534, 84, 1, 9, 3, 'happy birthday!', 2, 62000, 124000),
(9, 534, 87, 9, 8, 8, 'happy 19th birthday!', 1, 80000, 80000),
(10, 537, 84, 8, 8, 2, 'happy birthday!', 2, 55000, 110000);

-- --------------------------------------------------------

--
-- Table structure for table `dolls`
--

CREATE TABLE `dolls` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dolls`
--

INSERT INTO `dolls` (`id`, `type`, `price`) VALUES
(8, 'Barbie Doll', 5000),
(9, 'Superman ', 7000),
(10, 'Couple Toy', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `email`, `address`, `comments`, `rating`) VALUES
(13, 'Lee Min Ho ', 'leemin@gmail.com', 'Korea', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias porro distinctio, repudiandae labore quos est ducimus suscipi', '4'),
(14, 'Lee Min Ho ', 'leemin@gmail.com', 'Korea', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias porro distinctio, repudiandae labore quos est ducimus suscipi', '4'),
(15, 'Lee Min Ho ', 'leemin@gmail.com', 'Korea', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias porro distinctio, repudiandae labore quos est ducimus suscipi', '4'),
(17, 'Soe YY', 'yh456@gmail.com', 'Mandalay', 'ji', '1'),
(21, 'Soe', 'soeyiyiaung7@gmail.com', 'Mandalay', 'Hi', '4'),
(33, 'Honey', 'honey@gmail.com', 'Yangon', 'Very Good!', '4');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'Auguest'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_balance` int(11) NOT NULL,
  `promotion_amount` int(11) NOT NULL,
  `bill` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_quantity`, `total_balance`, `promotion_amount`, `bill`, `date`) VALUES
(524, 31, 5, 78000, 7800, 70200, '2023-03-14 09:03:01'),
(525, 33, 11, 105000, 10500, 94500, '2023-03-14 09:14:14'),
(526, 33, 8, 38700, 3870, 34830, '2023-03-14 09:15:50'),
(527, 33, 3, 65800, 6580, 59220, '2023-03-14 09:16:41'),
(528, 33, 3, 16500, 1650, 14850, '2023-03-14 09:17:18'),
(529, 33, 2, 142000, 14200, 127800, '2023-03-14 09:19:37'),
(530, 31, 20, 80000, 8000, 72000, '2023-03-14 09:31:35'),
(531, 31, 3, 16500, 1650, 14850, '2023-03-14 09:32:14'),
(532, 31, 5, 275000, 27500, 247500, '2023-03-14 09:33:47'),
(533, 34, 10, 136000, 13600, 122400, '2023-03-15 06:35:21'),
(534, 34, 3, 204000, 20400, 183600, '2023-03-15 06:36:51'),
(535, 31, 5, 18500, 1850, 16650, '2023-03-15 13:24:15'),
(536, 31, 2, 11300, 1130, 10170, '2023-03-15 13:33:07'),
(537, 31, 2, 110000, 11000, 99000, '2023-03-15 13:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `unit_price`, `subtotal`) VALUES
(1, 524, 38, 2, 5500, 11000),
(2, 524, 39, 2, 6000, 12000),
(3, 525, 37, 9, 4000, 36000),
(4, 525, 39, 1, 6000, 6000),
(5, 526, 38, 5, 5500, 27500),
(6, 526, 67, 1, 3000, 3000),
(7, 526, 60, 1, 5000, 5000),
(8, 526, 68, 1, 3200, 3200),
(9, 527, 72, 1, 6000, 6000),
(10, 527, 64, 1, 4800, 4800),
(11, 528, 38, 3, 5500, 16500),
(12, 530, 37, 20, 4000, 80000),
(13, 531, 38, 3, 5500, 16500),
(14, 533, 38, 2, 5500, 11000),
(15, 533, 71, 2, 7000, 14000),
(16, 533, 76, 3, 10000, 30000),
(17, 533, 81, 2, 4000, 8000),
(18, 535, 38, 1, 5500, 5500),
(19, 535, 37, 1, 4000, 4000),
(20, 535, 66, 3, 3000, 9000),
(21, 536, 42, 1, 4300, 4300),
(22, 536, 71, 1, 7000, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `image`, `price`, `description`) VALUES
(37, 65, 'Rainbow Cupcake', '63f84656a68fdproduct-4.jpg', 4000, 'Marshmello & candy topping'),
(38, 65, 'Mixed Berry Cupcake', '63f846a8708f9product-6.jpg', 5500, 'Mixed berry topping'),
(39, 65, 'Red Velvet Cupcake', '63f846da21828product-8.jpg', 6000, 'Rasberry topping'),
(40, 65, 'Mixed Fruit Cupcake', '63f84701eb15aproduct-5.jpg', 4500, 'Fruits & Chocolate topping'),
(41, 65, 'Chocolate Butter Cupcake', '63f847533ca6fproduct-2.jpg', 3500, 'Chocolate topping'),
(42, 65, 'Creamy Icing Cupcake', '63f8478b6cd49product-1.jpg', 4300, 'Peanut topping'),
(60, 65, 'Brownie Cupcake', '64074ddb0c0c4product-11.jpg', 5000, 'Cherry topping'),
(61, 65, 'Oreo Cupcake', '64074e38d37b8product-10.jpg', 4800, 'Chocolate Seed topping'),
(62, 65, 'Strawberry Cupcake', '64074e79a700aproduct-9.jpg', 3500, 'Candy Stone topping'),
(63, 65, 'Peanut Butter Cupcake', '64074f3f34744product-3.jpg', 4000, 'Rasberry topping'),
(64, 65, 'Red Velvet Cupcake-II', '64074f7de268eproduct-7.jpg', 4800, 'Heart Candy topping'),
(65, 65, 'Red Velvet Cupcake-III', '64074fd2248d6product-12.jpg', 5000, 'Vanilla topping'),
(66, 66, 'Vanilla Donut', '6407514395a09donut1.jpg', 3000, 'Melted Chocolate Topping'),
(67, 66, 'Chocolate Donut', '6407516b5994fdonut4.jpg', 3000, 'Chocolate Sprinkles'),
(68, 66, 'Pink Vanilla Donut', '640751b0c7091donut5.jpg', 3200, 'Strawberry Sprinkles'),
(69, 66, 'Mini Chocolate Donut', 'donut7.png', 2000, 'Melted Vanilla'),
(70, 67, 'Dried Cake', '640753bd3481cdried_cake.jpg', 5000, 'Contains dried fruits'),
(71, 67, 'Cheese Cake', '640753ff2d451cheese_cake1.jpg', 7000, 'Fruits Topping'),
(72, 67, 'Honey Cake', '64075427a740dhoney_cake.jpg', 6000, 'Contains Honey'),
(73, 67, 'Butter Cake', '64075471cc3e4butter_cake.jpg', 7000, 'Organic Butter'),
(74, 67, 'Chocolate Cake', '640754fdaf792product-big-2.jpg', 8000, 'Powdered Sugar'),
(75, 67, 'Strawberry Pie', '64075537175deproduct-big-4.jpg', 12000, 'Berry Topping'),
(76, 67, 'Berry cake', '640755c2448d4instagram-2.jpg', 10000, 'Berry Jam'),
(77, 67, 'Ice-cream Crape', '6407563d0b723instagram-3.jpg', 9000, 'With Ice-cream'),
(78, 68, 'Pineapple Bun', '640757356a66cpineapplebun.jpg', 3500, 'Contains pineapple'),
(79, 68, 'Original Bun', '64075767ae365bun1.jpg', 3000, 'Original Bun'),
(80, 68, 'Charcoal Bun', '640757a6a54f2bun3.jpg', 4000, 'Healthy bun'),
(81, 68, 'Strawberry Bun', '640757cc36a69strawberry_bun.jpeg', 4000, 'Contains strawberry jam'),
(82, 69, 'Vanilla Rounded Cake', '6407591561c6ebdcake1.webp', 18000, 'Contains white chocolate'),
(84, 69, 'Butterfly Rounded Plain Cake', 'bdcake3.jpg', 35000, 'Eatable Butterfly'),
(85, 69, 'Vanilla Fruits Rounded Cake', '64075a97346c2bdcake4.webp', 30000, 'Mixed Fruits'),
(86, 69, 'Vanilla Rounded Cake', '64075ae224f40bdcake2.webp', 35000, 'Red Velvet Powdered'),
(87, 69, 'Pillow Cake', '64075b4ca76d4bdcake5.jpg', 50000, 'Pillow Shape Special Cake'),
(88, 69, 'Rosy Heart Shape Cake', '64075b97023c3bdcake6.webp', 40000, 'With Creamy Rose'),
(89, 69, 'Pinky Heart Shape Cake', '64075c07dae91bdcake7.webp', 48000, '-'),
(90, 69, 'Chocolate Heart Shape Cake', '64075c3bb1989bdcake8.jpg', 43000, '-');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `percentage`, `start_date`, `end_date`) VALUES
(45, 'Thingyan', 10, '2023-03-13', '2023-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `price`) VALUES
(2, '9', 10000),
(3, '12', 15000),
(8, '15', 20000),
(9, '6', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `phone`, `address`, `email`, `session_id`) VALUES
(29, 'Khaing Maw Htun', 'd81466c92818b3a3c1bae9e2a045d42c', '09456789321', 'Mandalay', 'kmh@gmail.com', 'sdi9e4sm5qa5d8akkgskr7edp2'),
(30, 'Soe Yi Yi Aung', '05c57354c42a7b1d493f4ae7ddd8aa87', '09456789321', 'Korea', 'syya133@gmail.com', '3lifgrkutqmi0p0htbhn5j7im2'),
(31, 'Ye Htun Aung', 'd4da83689cb1615eab77a2696bcbb6f7', '09456789321', 'Mandalay', 'yh@gmail.com', 'n231qhsg1jifrmsvhcrls969so'),
(32, 'Aom Kham Phaung', 'e8d659e66614dc6e5671a2e1245fdc40', '09456789321', 'Mandalay', 'akp@gmail.com', ''),
(33, 'Arakar', '912ec803b2ce49e4a541068d495ab570', '09793798369', 'MDY', 'arkar@gmail.com', ''),
(34, 'Ahn Hyo Seop', 'b2654b918d1623652d4084375611bdb6', '09456789321', 'Korea', 'ahs@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bakers`
--
ALTER TABLE `bakers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creams`
--
ALTER TABLE `creams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customize_order_details`
--
ALTER TABLE `customize_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_id` (`cream_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `doll_id` (`doll_id`);

--
-- Indexes for table `dolls`
--
ALTER TABLE `dolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `promotion_id` (`total_quantity`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bakers`
--
ALTER TABLE `bakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `creams`
--
ALTER TABLE `creams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customize_order_details`
--
ALTER TABLE `customize_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dolls`
--
ALTER TABLE `dolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=538;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customize_order_details`
--
ALTER TABLE `customize_order_details`
  ADD CONSTRAINT `customize_order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `customize_order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `customize_order_details_ibfk_3` FOREIGN KEY (`cream_id`) REFERENCES `creams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customize_order_details_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customize_order_details_ibfk_5` FOREIGN KEY (`doll_id`) REFERENCES `dolls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
