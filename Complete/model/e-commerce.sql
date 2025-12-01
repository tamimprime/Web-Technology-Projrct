-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2022 at 07:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pdetails` text NOT NULL,
  `image` text NOT NULL,
  `total_price` int(255) NOT NULL,
  `purchase_date` date NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `delivery_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(255) NOT NULL,
  `pname` text NOT NULL,
  `pdetails` text NOT NULL,
  `price` int(255) NOT NULL,
  `image` text NOT NULL,
  `review` text NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `pdetails`, `price`, `image`, `review`, `category`) VALUES
(1, 'SPLY 350', 'Many believe that it simply stands for Supply 350. But others think that there is a more complex meaning behind the mysterious print on the shoes. It is widely speculated that the print stands for \'Saint Pablo Loves You\'.', 120, './images/shoes/shoe-1.png', 'Nice Product', 'shoes'),
(2, 'Nike 360', 'Featuring a full-length foam midsole and VaporMax Air unit, the Nike Air VaporMax 360 gives you remarkable underfoot comfort with bold 2000s style inspired by the Air Max 360.', 320, './images/shoes/shoe-2.png', 'Good Product', 'shoes'),
(3, 'Red Airmax', 'The invention of Air Max had taken place over a decade earlier, with the silhouette becoming particularly popular on the dancefloors of jungle and garage raves.', 350, './images/shoes/shoe-3.png', 'Good Shoes', 'shoes'),
(4, 'Red Bag', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 120, './images/bags/bag-1.png', 'good', 'backpack'),
(5, 'Blue Bag', 'This card has supporting text below as a natural lead-in to additional content.', 320, './images/bags/bag-2.png', 'Great', 'backpack'),
(6, 'Rolex DATEJUST 36', 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 120, './images/watches/watch-1.png', 'Nice', 'watch');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` longtext NOT NULL,
  `phn` varchar(20) NOT NULL,
  `prlink` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `pass`, `type`, `fname`, `lname`, `dob`, `gender`, `address`, `phn`, `prlink`, `email`, `photo`) VALUES
(22, 'ratul', '1234', 'admin', 'ratul ', 'vattacharji', '1999-11-12', 'Male', 'nilphamari dhaka', '+8801767268796', '', 'mahadialmohok3@gmail.com', '../image/defult.png'),
(23, 'sufian', '1111', '', 'Sufian', 'tanzid', '1999-03-12', 'Male', 'dhaka', 'null', '', 'mmilliking@gmail.com', '../image/defult.png'),
(24, 'mohok', '1111', '', 'Mahadial', 'Mohok', '1999-03-12', 'Male', 'nilphamari', '01767268796', 'http://localhost/final/view/EditProfile.php', 'mahadialmohok3@gmail.com', '../image/defult.png'),
(25, 'ratul1', '1111', '', 'ratul', 'vat', '1999-03-12', 'Male', 'nilphamari', 'null', '', 'mahadialmohok3@gmail.com', '../image/defult.png'),
(28, 'maha111111', '1234', '', 'Mahadial', 'Mohok', '2000-12-03', 'Male', 'kishorgang', 'null', '', 'mahadialmohok3@gmail.com', '../image/defult.png'),
(29, 'Saidul', '1111', 'Delivery', 'saidul', 'khan', '2022-03-19', 'Male', 'Dhaka', 'null', NULL, 'mahadialmohok3@gmail.com', ''),
(30, 'adrita', '123', 'customer', 'Adrita', 'Omor', '2022-03-03', 'Female', '383/1 Free School Street, Hatirpul', 'null', NULL, 'adru@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(6) NOT NULL,
  `address` text NOT NULL,
  `phn` int(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
