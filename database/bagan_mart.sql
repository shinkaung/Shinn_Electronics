-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 09:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bagan_mart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(6) NOT NULL,
  `p_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `qty` int(6) NOT NULL,
  `price` double NOT NULL,
  `total_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`) VALUES
(9, 7, 2, 'Water Level Sensor', 'water-level-sensor.jpg', 1, 1500, 1500),
(11, 6, 3, 'HDC1080 Digital Humidity Sensor', 'hdc1080-high-accuracy-digital-humidity-sensor-with-temperature-sensor-module.jpg', 1, 8000, 8000),
(12, 5, 3, 'HC-SR501PIR Motion Sensor', 'hc-sr501-adjust-ir-infrared-pir-motion-sensor.jpg', 1, 2000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `remark`, `created_date`, `modified_date`) VALUES
(1, 'Sensors', '', '2020-03-31', '2020-03-31'),
(2, 'Modules', '', '2020-03-31', '2020-03-31'),
(3, 'Arduino', '', '2020-03-31', '2020-03-31'),
(4, 'Robotics', '', '2020-04-02', '2020-04-02'),
(5, 'Laptops', '', '2020-05-28', '2020-05-28'),
(6, 'Headphone', '', '2020-05-29', '2020-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(6) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`, `created_date`, `modified_date`) VALUES
(1, 'Shin', 'Kaung', 'abc123@gmail.com', 'dbb342c8604b24b466a1920002a14858', '9423259619', 'mdy', '0000-00-00', '0000-00-00'),
(2, 'Thant', 'Zin', 'thantzin@gmail.com', 'ff203888946a399d2450b64d40f61a3c', '0912387611', 'Yangon', '0000-00-00', '0000-00-00'),
(3, 'Wint', 'Wah', 'wintwah@gmail.com', '0b0d2810ae64abac6b2b04b6d4c3df1b', '2125553456', 'Seik Phyu', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(6) NOT NULL,
  `customer_id` int(6) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_id`, `status`, `remark`, `created_date`, `modified_date`) VALUES
(1, 1, 'Confirmed', 'Your order has been confirmed!', '2020-06-02', '2020-06-02'),
(2, 1, 'Pending', '', '2020-06-03', '2020-06-03'),
(3, 1, 'Confirmed', 'Your order has been confirmed!', '2020-06-03', '2020-06-03'),
(4, 1, 'Pending', '', '2020-06-04', '2020-06-04'),
(5, 1, 'Pending', '', '2020-06-04', '2020-06-04'),
(6, 1, 'Confirmed', 'Your order has been confirmed!', '2020-06-04', '2020-06-04'),
(7, 1, 'Confirmed', 'Your order has been confirmed!', '2020-05-31', '2020-05-31'),
(8, 1, 'Confirmed', 'Your order has been confirmed!', '2020-06-08', '2020-06-08'),
(9, 1, 'Confirmed', 'Your order has been confirmed!', '2020-06-08', '2020-06-08'),
(10, 2, 'Confirmed', 'Your order has been confirmed!', '2020-06-09', '2020-06-09'),
(11, 2, 'Pending', '', '2020-06-09', '2020-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(6) NOT NULL,
  `product_id` int(6) NOT NULL,
  `order_id` int(6) NOT NULL,
  `quantity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `product_id`, `order_id`, `quantity`) VALUES
(1, 5, 1, 1),
(2, 6, 1, 1),
(4, 4, 2, 1),
(5, 5, 2, 1),
(6, 15, 2, 1),
(7, 5, 3, 3),
(8, 4, 4, 1),
(9, 8, 4, 2),
(10, 5, 5, 1),
(11, 9, 5, 1),
(12, 18, 6, 1),
(13, 17, 6, 1),
(14, 4, 7, 1),
(15, 4, 8, 1),
(16, 5, 9, 1),
(17, 4, 10, 1),
(18, 11, 10, 1),
(19, 19, 10, 1),
(20, 4, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` double NOT NULL,
  `image` text NOT NULL,
  `keywords` text NOT NULL,
  `cid` int(6) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `quantity`, `price`, `image`, `keywords`, `cid`, `created_date`, `modified_date`) VALUES
(4, 'XD-58C Heart Rate Pulse Sensor', 'Pulse Sensorâ€ is a well-designed plug-and-play heart-rate sensor for Arduino', 100, 5500, 'xd-58c-heart-rate-pulse-sensor.jpg', 'Sensor Heart Pulse XD-58C', 1, '2020-04-02', '2020-04-02'),
(5, 'HC-SR501PIR Motion Sensor', ' HC-SR501PIR Motion Sensor', 97, 2000, 'hc-sr501-adjust-ir-infrared-pir-motion-sensor.jpg', 'HC-SR501 Motion Sensor Infrared PIR', 1, '2020-04-02', '2020-04-02'),
(6, 'HDC1080 Digital Humidity Sensor', 'The main chip is GY-213V-HDC1080(Can use SHT21 HTU21D SI7021 chip to made the same sensor)', 90, 8000, 'hdc1080-high-accuracy-digital-humidity-sensor-with-temperature-sensor-module.jpg', 'HDC1080 Digital Humidity Sensor Temperature Sensor', 1, '2020-04-02', '2020-04-02'),
(8, 'Ublox GPS Module', 'The NEO-6 module series is a family of stand-alone GPS receivers featuring the high performance u-blox 6 positioning engine.', 50, 180000, 'ublox-gps-module.jpg', 'Ublox GPS Module', 2, '2020-04-02', '2020-04-02'),
(9, 'HC06 Wireless Bluetooth Module', 'Bluetooth Module', 50, 8000, 'hc06-wireless-bluetooth-module.jpg', 'HC06 Wireless Bluetooth Module', 2, '2020-04-02', '2020-04-02'),
(11, 'One Channel with ESP8266', 'ESP8266 Wireless WiFi DC-5V One Channel Relay Module (Without ESP-01)', 20, 4000, 'esp8266-wireless-wifi-dc-5v-one-channel-relay-module-without-esp-01.jpg', 'ESP8266 Wireless WiFi Relay Module ', 2, '2020-04-02', '2020-04-02'),
(13, 'Arduino Nano Dev Board', 'Arduino Nano Development Board', 30, 6000, 'arduino-nano-dev-board.jpg', 'Arduino Nano ATMega 328P', 3, '2020-04-02', '2020-04-02'),
(14, 'Arduino Mega 2560 Dev Board', 'The Arduino Mega 2560 is a microcontroller board based on the ATmega2560', 10, 15500, 'arduino-mega-2560-dev-board.jpg', 'Arduino Mega ATMega 2560', 3, '2020-04-02', '2020-04-02'),
(15, 'Arduino Uno Board', 'The Arduino Uno is a microcontroller board based on the ATmega 328', 20, 9000, 'arduino-uno-board.jpg', 'Arduino Uno ATMega 328P', 3, '2020-04-02', '2020-04-02'),
(16, 'Yellow Head Gear Motor', 'Yellow Head Gear Motor ( Gear Ratio 1:48 )', 10, 1700, 'yellow-head-gear-motor-gear-ratio-148-.jpg', 'Yellow Head Gear Motor', 4, '2020-04-02', '2020-04-02'),
(17, 'DC Motor Wheel', 'DC Motor Wheel (inner diameter 4mm, external diameter 65mm)', 30, 4800, 'dc-motor-wheel-inner-diameter-4mm-external-diameter-65mm.jpg', 'DC Motor Wheel', 4, '2020-04-02', '2020-04-02'),
(18, 'DC Gear Motor ( 500RPM )', 'GM25-370-24140 DC Gear Motor ( 500RPM ) with Cable', 10, 12500, 'gm25-370-24140-dc-gear-motor-500rpm-with-cable.jpg', 'GM25-370-24140 DC Gear Motor 500RPM', 4, '2020-04-02', '2020-04-02'),
(19, 'Msi Prestige', 'MSI laptop', 1, 1500000, 'large.jpg', 'laptop', 5, '2020-05-28', '2020-05-28'),
(20, 'Gaming headphone', 'Gaming headphone', 1, 25000, '68a0a1435b7048369a265b2ad8e09018_Large.jpg', 'Headphone', 6, '2020-05-29', '2020-05-29'),
(21, '  Asus ProArt', ' Asus ProArt StudioBook Pro 17 W700G3T-XH99', 4, 1800000, 'AsusProArtStudioBookPro17W700G3T__1_.jpg', 'laptop', 5, '2020-07-12', '2020-07-12'),
(22, 'Razer Blade', 'Razer Blade 15 39.6 cm (15.6\") Notebook Notebook (black)', 7, 2000000, 'Razer-Blade-15-Advanced-2019-review.png', 'laptop', 5, '2020-07-12', '2020-07-12'),
(23, 'Gamdias headset', '  GAMDIAS HEBE E1 RGB HEADPHONE', 4, 28000, 'HEAD-4.jpg', 'Headphone', 6, '2020-07-12', '2020-07-12'),
(24, 'wired stereo headset', '  LVL50 Wired Stereo Gaming Headset', 5, 45000, '00_048-124_render-hero.png', 'Headphone', 6, '2020-07-12', '2020-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `username`, `position`, `password`) VALUES
(2, 'Shin', 'Kaung', 'shinkaung@gmail.com', 'shinkaung', 'Admin', '$2y$10$ds1gqSSjIHq/I7c.Ly/w9eF.OPgcXyeG09wL71loBGy0qLkNzUZlS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
