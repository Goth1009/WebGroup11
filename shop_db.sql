-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2024 at 06:56 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `profile`) VALUES
('XRK6wORojdlbEjmMYxoi', 'Prasanna', 'prasanna@gmail.com', '03b2075b33b5d1352fa6e2bb11a540b63ea0fde1', 'avatar1.png'),
('7Hb3L3t9BCqXcCahSWko', 'Shanika Hansani', 'shanika@gmail.com', 'a098e35ec9da954282119ec33105b81ceb7398a1', 'avatar3.png'),
('JMUytYX5wDbmmau9rq2r', 'Alex Witson', 'alex@gmail.com', '8c710486ceb03f08de3ebdae34ead9f249a2f699', 'avatar2.png'),
('Qgv4KaIg1dRPvihKjiba', 'Jenny Shefard', 'jenny@gmail.com', '8c84bbf4f643d6b8c4c188935eb1196d8cdcf10b', 'avatar4.png'),
('aaTkYMMlFn3GWdCxB0vE', 'Gothnima Sathsarani', 'gothnima@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', ''),
('gUQQil4ZUfYWTITk7w1s', 'Gothnima', 'goth1234@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'avatar3.png'),
('5caFwFYdIg5fiyqgkt25', 'Sathsarani Gunarathn', 'sath345@gmail.com', 'ae8fe380dd9aa5a7a956d9085fe7cf6b87d0d028', 'avatar4.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `product_id` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `price`, `qty`) VALUES
('vOttGsjtQ3tlm2KP2EU8', 'kFseo7HhJnHrlvz9wB8q', '9pEFR4x03QTpApzjFLWb', 50, 1),
('4n3Ag8rUkIVTAm5dTV0t', 'D7fUP8O7Ci5r8cbmam0O', '9pEFR4x03QTpApzjFLWb', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `number` int(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `address_type` varchar(50) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `product_id` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `address`, `address_type`, `method`, `product_id`, `price`, `qty`, `date`, `status`) VALUES
('hNnHKefTBqTNhpFlnpU3', '', 'Gothnima Sathsarani', 762611725, 'gothnima@gmail.com', 'No. 16,Haliela,Badulla,Sri Lanka,1123', 'home', 'cash on delivery', 'hYdqpRjqP4qE5KtgxBZI', 45, 1, NULL, 'canceled'),
('A8nSqQK7YDU1CNiSYr7c', 'FNe5CrbxcQEBPiTiGn9L', 'Gothnima', 762611725, 'gothnima12345@gmail.com', 'No. 16,Haliela,Badulla,Sri Lanka,1123', 'home', 'cash on delivery', 'NYs2JTmHCYlsQvsoq5yd', 20, 1, NULL, 'canceled'),
('vddUO4wXzd82QTHLYi6e', 'kFseo7HhJnHrlvz9wB8q', 'Gothnima', 762611725, 'sathsarani1234@gmail.com', 'No. 16,Haliela,Badulla,Sri Lanka,1123', 'home', 'cash on delivery', 'NYs2JTmHCYlsQvsoq5yd', 20, 1, NULL, 'canceled'),
('99a01FH4hGF0jfsXmSHz', 'D7fUP8O7Ci5r8cbmam0O', 'Sathsarani', 762611725, 'sathsarani12345@gmail.com', 'No. 16,Hali Ela,Badulla,Sri Lanka,1123', 'home', 'cash on delivery', 'NYs2JTmHCYlsQvsoq5yd', 20, 1, NULL, 'canceled');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` varchar(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_detail` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `product_detail`, `status`) VALUES
('Jc2YNWuLZEy4pxmcTaYh', 'Strawberry Frozen Dessert', 10, '8.png', 'Amet minim mollit non deserunt ullamco est sit aliqua amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Pellentesque nec tristique sapien etiam non augue lacus.', 'active'),
('9pEFR4x03QTpApzjFLWb', 'Klondike Original Ice Cream', 50, '1.png', 'Amet minim mollit non deserunt ullamco est sit aliqua amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Pellentesque nec tristique sapien etiam non augue lacus.', 'active'),
('PDkYZ6BnGh3yUu8gnJsE', 'Cheesecake Ice Cream', 60, '2.png', 'Amet minim mollit non deserunt ullamco est sit aliqua amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Pellentesque nec tristique sapien etiam non augue lacus.\r\n\r\n', 'active'),
('QQn3PBfo173U9f95srp5', 'Pumpkin Cheesecake Ice Cream', 60, '3.png', 'Amet minim mollit non deserunt ullamco est sit aliqua amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Pellentesque nec tristique sapien etiam non augue lacus.\r\n\r\n', 'active'),
('NYs2JTmHCYlsQvsoq5yd', 'Chocolate Fudge Brownie', 20, '4.png', 'Amet minim mollit non deserunt ullamco est sit aliqua amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Pellentesque nec tristique sapien etiam non augue lacus.\r\n\r\n', 'deactive'),
('gqACvVafTLYWsGh3EHgf', 'Fruit Ice Cream', 20, '5.png', 'Amet minim mollit non deserunt ullamco est sit aliqua amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Pellentesque nec tristique sapien etiam non augue lacus.\r\n\r\n', 'deactive'),
('hYdqpRjqP4qE5KtgxBZI', 'Vanilla Brownie', 45, '6.png', 'Vestibulum eu quam nec neque pellentesque efficitur id eget nisl. Proin porta est convallis lacus blandit pretium sed non enim. Maecenas lacinia non orci at aliquam. Donec finibus, urna bibendum ultricies laoreet, augue eros luctus sapien, ut euismod leo tortor ac enim. In hac habitasse platea dictumst.', 'active'),
('TlIH7zljGw5dKwHIk7lc', 'Strawberry Frozen Dessert', 40, 'product_2_4-800x800.jpg', 'This is an amazing ice cream you need to taste.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
('izD3Vd7fyR54DvC7H613', 'Gothnima Sathsarani', 'gothnima123@gmail.com', '123678', NULL),
('Zhc5FTnaT4RjEJkWxYP6', 'Gothnima Sathsarani', 'gothnima23@gmail.com', '123678', NULL),
('eTCGYOzu1gQovvVq228x', 'Gothnima Sathsarani', 'goth1234@gmail.com', '1234#', NULL),
('stmFGA29rY1HRvCphTVv', 'Gothnima Sathsarani', 'gothnima1@gmail.com', '123qwe', NULL),
('FNe5CrbxcQEBPiTiGn9L', 'Gothnima', 'gothnima12345@gmail.com', '12345', NULL),
('kFseo7HhJnHrlvz9wB8q', 'Gothnima', 'sathsarani123@gmail.com', '12345', NULL),
('D7fUP8O7Ci5r8cbmam0O', 'Sathsarani', 'sathsarani12345@gmail.com', '12345', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` varchar(50) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `product_id` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
