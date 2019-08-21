-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 20, 2019 at 12:28 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakery_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `category_name` varchar(40) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Bread'),
(4, 'Cake'),
(5, 'Muffin'),
(11, 'Juice');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(20) NOT NULL,
  `product_name` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `product_price` varchar(22) COLLATE utf8mb4_swedish_ci NOT NULL,
  `product_detail` longtext COLLATE utf8mb4_swedish_ci NOT NULL,
  `category_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_detail`, `category_id`) VALUES
(1, 'Blackforest Banana', '220000', 'Kue besar yang dapat anda santap lebih dari 5 orang, dengan isi coklat blackforest dengan potongan pisang disekelilingnya', 4),
(2, 'Muffin Honey Chocolate', '40000', 'Kue muffin? kecil tapi dengan paduan coklat dan madu yang manis dan lezat', 5),
(3, 'Bread Stuffin Mozarela', '80000', 'Roti panjang dengan isi lelehan keju mozarella yang enak', 1),
(5, 'Avocado Juice', '27000', 'Jus alpukat dengan paduan coklat dan wipe cream', 11);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `order_number` varchar(40) COLLATE utf8mb4_swedish_ci NOT NULL,
  `order_detail` longtext COLLATE utf8mb4_swedish_ci NOT NULL,
  `total_price` bigint(40) NOT NULL,
  `order_time` datetime NOT NULL,
  `status` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`order_number`, `order_detail`, `total_price`, `order_time`, `status`) VALUES
('201908200001', 'Nama Pelanggan : Fulki Arrafi<br> Nomor Telepon : 081296504556 <br><h3>DETAIL : </h3>Nama pesanan : Blackforest Banana.<br> Jumlah : 4<br>Nama pesanan : Bread Stuffin Mozarela.<br> Jumlah : 4<br>Nama pesanan : Muffin Honey Chocolate.<br> Jumlah : 5<br>', 1400000, '2019-08-20 11:24:57', 1),
('201908200003', 'Nama Pelanggan : test<br> Nomor Telepon : 081296504556 <br><h3>DETAIL : </h3>Nama pesanan : Muffin Honey Chocolate.<br> Jumlah : 4<br>Nama pesanan : Blackforest Banana.<br> Jumlah : 11<br>Nama pesanan : Bread Stuffin Mozarela.<br> Jumlah : 20<br>Nama pesanan : Avocado Juice.<br> Jumlah : 12<br>', 4504000, '2019-08-20 12:21:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(40) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `fullname` varchar(40) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`) VALUES
(1, 'xshot51', 'your_password_with_md5', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
