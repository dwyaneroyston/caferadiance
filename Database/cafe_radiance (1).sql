-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 08:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe_radiance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('adminroy', 'admin11'),
('dummy', '123'),
('dummy', '123'),
('af', '123'),
('dummy', '123'),
('jk', '789');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `title` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal_amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `price`, `title`, `quantity`, `subtotal_amount`, `date`, `invoice_number`, `user_id`) VALUES
(7, 45.00, 'AMERICANO - HOT ESPRESSO (12 OZ)', 1, 45.00, '2024-02-15', 'INV-227284', 5),
(8, 40.00, 'COLOMBIAN SUPREMO CUP (12 OZ)', 1, 40.00, '2024-02-15', 'INV-227284', 5),
(9, 50.00, 'NITRO COLD BREW W/ STRAW (12 OZ)', 1, 50.00, '2024-02-15', 'INV-227284', 5),
(10, 30.00, 'SEASONAL SINGLE-ORIGIN (12 OZ)', 1, 30.00, '2024-02-15', 'INV-227284', 5),
(11, 30.00, 'SEASONAL SINGLE-ORIGIN (12 OZ)', 1, 30.00, '2024-02-20', 'INV-145345', 5),
(12, 40.00, 'INDONESIAN SUMATRA MANDHELING (12 OZ)', 1, 40.00, '2024-02-20', 'INV-145345', 5),
(13, 55.00, 'MINT MOJITO ICED COFFEE (12 OZ)', 1, 55.00, '2024-02-20', 'INV-145345', 5),
(14, 45.00, 'AMERICANO - HOT ESPRESSO (12 OZ)', 1, 45.00, '2024-02-20', 'INV-340924', 6),
(15, 40.00, 'COLOMBIAN SUPREMO CUP (12 OZ)', 1, 40.00, '2024-02-20', 'INV-340924', 6),
(16, 50.00, 'NITRO COLD BREW W/ STRAW (12 OZ)', 1, 50.00, '2024-02-20', 'INV-340924', 6),
(17, 45.00, 'AMERICANO - HOT ESPRESSO (12 OZ)', 1, 45.00, '2024-02-20', 'INV-730424', 5),
(18, 40.00, 'COLOMBIAN SUPREMO CUP (12 OZ)', 1, 40.00, '2024-02-20', 'INV-730424', 5),
(28, 40.00, 'INDONESIAN SUMATRA MANDHELING', 1, 40.00, '2024-03-12', 'INV-807980', 8),
(29, 55.00, 'CARAMEL COLD FOAM COLD BREW', 1, 55.00, '2024-03-12', 'INV-807980', 8),
(30, 40.00, 'COLOMBIAN SUPREMO CUP', 1, 40.00, '2024-03-12', 'INV-807980', 8),
(31, 40.00, 'COLOMBIAN SUPREMO CUP', 1, 40.00, '2024-03-13', 'INV-633238', 8),
(32, 50.00, 'NITRO COLD BREW W/ STRAW', 1, 50.00, '2024-03-13', 'INV-633238', 8),
(33, 40.00, 'COLOMBIAN SUPREMO CUP', 1, 40.00, '2024-03-13', 'INV-230013', 0),
(34, 50.00, 'NITRO COLD BREW W/ STRAW', 1, 50.00, '2024-03-13', 'INV-230013', 0),
(35, 40.00, 'INDONESIAN SUMATRA MANDHELING', 1, 40.00, '2024-03-13', 'INV-670147', 8),
(36, 55.00, 'ETHIOPIAN YIRGACHEFFE CUP', 1, 55.00, '2024-03-13', 'INV-670147', 8),
(37, 35.00, 'COLD BREW TONIC IN A CUP', 1, 35.00, '2024-03-13', 'INV-670147', 8),
(38, 50.00, 'Nitro Cold Brew W/ Straw', 1, 50.00, '2024-03-13', 'INV-505125', 8),
(39, 40.00, 'Colombian Supremo Cup', 1, 40.00, '2024-03-13', 'INV-817679', 8),
(40, 55.00, 'Mint Mojito Iced Coffee', 1, 55.00, '2024-03-13', 'INV-420181', 8),
(41, 55.00, 'Mint Mojito Iced Coffee', 1, 55.00, '2024-03-13', 'INV-952923', 8),
(42, 35.00, 'Cold Brew Tonic In A Cup', 1, 35.00, '2024-03-13', 'INV-18599', 8),
(43, 55.00, 'Mint Mojito Iced Coffee', 4, 220.00, '2024-03-14', 'INV-960164', 11),
(44, 40.00, 'Colombian Supremo Cup', 1, 40.00, '2024-03-14', 'INV-910500', 11),
(45, 50.00, 'Nitro Cold Brew W/ Straw', 1, 50.00, '2024-03-14', 'INV-910500', 11),
(46, 40.00, 'COLOMBIAN SUPREMO CUP', 1, 40.00, '2024-03-14', 'INV-895948', 11),
(47, 40.00, 'COLOMBIAN SUPREMO CUP', 5, 200.00, '2024-03-14', 'INV-895948', 11),
(48, 50.00, 'NITRO COLD BREW W/ STRAW', 7, 350.00, '2024-03-14', 'INV-895948', 11),
(49, 35.00, 'COLD BREW TONIC IN A CUP', 1, 35.00, '2024-03-14', 'INV-16071', 11),
(50, 55.00, 'CARAMEL COLD FOAM COLD BREW', 1, 55.00, '2024-03-14', 'INV-16071', 11);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reservation_date` date DEFAULT NULL,
  `reservation_time` time DEFAULT NULL,
  `num_guests` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `user_id`, `reservation_date`, `reservation_time`, `num_guests`) VALUES
(13, 16, '2024-03-15', '15:03:00', 5),
(14, 16, '2024-07-23', '15:57:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `phone_number`, `create_datetime`) VALUES
(16, 'Dwyane Thennav Royston E', 'dwyane', 'dwyaneroyston1105@gmail.com', '202cb962ac59075b964b07152d234b70', '9342862726', '2024-03-14 12:59:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
