-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 12:58 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `item_id` int(50) NOT NULL,
  `fName` varchar(256) NOT NULL,
  `lName` varchar(256) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model_no` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `address` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item_id`, `fName`, `lName`, `username`, `email`, `type`, `brand`, `model_no`, `price`, `address`) VALUES
(6, 5, 'uhj', 'iuj', 'a', 'a@hjn.cd', 'sneakers', 'nike', '125hjvg', 2000, 'a'),
(17, 3, 'uhj', 'iuj', 'a', 'a@hjn.cd', 'jeans', 'levi', 'saca', 5555, 'a'),
(18, 3, 'uhj', 'iuj', 'a', 'a@hjn.cd', 'jeans', 'levi', 'saca', 5555, 'a'),
(19, 17, 'Swapnil', 'Jaiswal', 'admin', 'swapnil@gmail.com', 'sneakers', '', 'k', 542, ''),
(20, 5, 'Swapnil', 'Jaiswal', 'admin', 'swapnil@gmail.com', 'sneakers', 'nike', '125hjvg', 2000, '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(50) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `confirmPassword` varchar(256) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fName`, `lName`, `username`, `email`, `password`, `confirmPassword`, `phone`, `address`) VALUES
(18, 'Swapnil', 'Jaiswal', 'admin', 'swapnil@gmail.com', '$2y$10$LeqdC34P3/mALKFT.21oBuTkt493vTvOL0X2Ct3xESjNE9XipFkm.', '$2y$10$EaCMU/O1qezKfYOvd7LML.KlW8ViTlDSp525ZFtMEfV3tZYlewYvi', '789652', ''),
(19, 'gte', 'dg', 'dgb', 'JAiswal@gmail.com', '$2y$10$OVFq9oAi7utgmfDNDGevUuNpJnXL1azfBC7IesT/IKTCugSisrHd2', '$2y$10$QoRYOUhECBW/N4NkndmeXeD6V4BJkZIIVWcoH26YjDasV5IeB4gam', '639', ''),
(20, 'UY', 'HJ', '1', 'S@N.VF', '$2y$10$z4d3VIAob4xZ0qRFFSD97eUN0BKoJdJSE8E87LrJhzIHDshgobhFG', '$2y$10$8Q8fHOCfavC3NhoIqLTdverNj/SJ59NIwupoKFejE1WpVBgNHlWt2', '1', ''),
(21, 'uhj', 'iuj', 'a', 'a@hjn.cd', '$2y$10$lSinSadRwa0WG.G/W7j6E.J2JUVrMGr9.qLVe87/60PcLho7nlliy', '$2y$10$uVEzAVJNxGZqEouh6Oz9Qe1pBSj3Y8zsNW9HYDBve6fvEnqrePskS', '16532', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `message` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `username`, `message`) VALUES
(1, 'admin', 'You have successfully placed your order of jeans  1 having price : 1'),
(2, 'admin', 'You have successfully placed your order of tablets  84 having price : 5'),
(3, 'admin', 'You have successfully placed your order of jeans  1 having price : 1'),
(4, 'admin', 'You have successfully placed your order of jeans levi saca having price : 5555'),
(5, 'admin', 'You have successfully placed your order of mobile samsung d dfdf df having price : 222'),
(6, 'admin', 'You have successfully placed your order of sneakers  k having price : 542'),
(7, 'admin', 'You have successfully placed your order of sneakers nike 125hjvg having price : 2000'),
(8, 'admin', 'You have successfully added sneakers nike 125hjvg having price : 2000 to your cart');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `adtitle` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `adtitle`, `description`, `image`) VALUES
(1, 'tttt', '', '039-300x300.png'),
(2, 'tttt', '', '039-300x300.png'),
(3, 'tttt', '', '039-300x300.png'),
(4, 'd', 'df', '284131185_029.png'),
(5, 'ddsdsdsdsd', 'dfsddsddsd', '284131185_029.png'),
(6, 'ddsdsdsdsd', 'dfsddsddsd', '284131185_029.png'),
(7, 'ddsdsdsdsd', 'dfsddsddsd', '284131185_029.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(5) NOT NULL,
  `category` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `brand` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `model_no` varchar(45) NOT NULL,
  `des` varchar(1024) NOT NULL,
  `image` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='	';

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `category`, `type`, `brand`, `price`, `model_no`, `des`, `image`, `quantity`) VALUES
(1, 'electronic', 'mobile', 'samsung', '222', 'd dfdf df', '', 'g5.jpg', 22),
(2, 'footwear', 'sneakers', 'nike', '56', 'asca', '', '4.jpg', 2),
(3, 'clothing', 'jeans', 'levi', '5555', 'saca', '', '2.jpg', 22),
(4, 'footwear', 'sneakers', 'nike', '500', '11', '', 'profile18.jpg', 1),
(5, 'footwear', 'sneakers', 'nike', '2000', '125hjvg', '', 'Pair_Of_Shoes_Image.jpg', 2),
(6, 'clothing', 'jeans', '', '1', '1', '', 'Vertical Logo.png', 4),
(7, 'clothing', 'jeans', '', '1', '1', '', 'Shoe_Image.PNG', 4),
(8, 'electronic', 'tablets', '', '5', '84', '54svfd sd zcda', 'Vertical Logo.png', 5),
(9, 'clothing', 'jeans', '', '25000', '1145', '', 'puma.jpg', 4),
(10, 'clothing', 'jeans', '', '25000', '1145', 'fcgvnk;m', 'puma.jpg', 4),
(11, 'footwear', 'sneakers', 'nike', '25000', '1145', 'lomnkljb hgghiohipjok[', 'puma.jpg', 4),
(12, 'footwear', 'sneakers', 'nike', '25000', '1145', 'lomnkljb hgghiohipjok[', 'puma.jpg', 4),
(13, 'footwear', 'sneakers', 'nike', '25000', '1145', 'lomnkljb hgghiohipjok[', 'puma.jpg', 4),
(14, 'footwear', 'sneakers', 'nike', '25000', '1145', 'lomnkljb hgghiohipjok[', 'puma.jpg', 4),
(15, 'footwear', 'sneakers', '', '', '', '', '', 0),
(16, 'footwear', 'sneakers', '', '542', 'k', 'm]\r\np,l4;5\'46\r\n3', 'book.png', 547),
(17, 'footwear', 'sneakers', '', '542', 'k', 'm]\r\np,l4;5\'46\r\n3', 'puma.jpg', 547),
(18, 'footwear', 'sneakers', '', '542', 'k', 'm]\r\np,l4;5\'46\r\n3', 'Untitled.jpg', 547);

-- --------------------------------------------------------

--
-- Table structure for table `product_overview`
--

CREATE TABLE `product_overview` (
  `category` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `brand` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_overview`
--

INSERT INTO `product_overview` (`category`, `type`, `brand`) VALUES
('electronic', 'mobile', 'samsung'),
('electronic', 'smartphones', 'samsung'),
('electronic', 'tablets', 'samsung'),
('clothing', 'jeans', 'levi\'s'),
('footwear', 'sneakers', 'nike'),
('medicines', 'painkiller', 'manforce');

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `userid` varchar(256) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(200) NOT NULL,
  `First` varchar(200) NOT NULL,
  `Last` varchar(200) NOT NULL,
  `Company` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `Address` varchar(256) NOT NULL,
  `Pin` varchar(200) NOT NULL,
  `Pan` varchar(200) NOT NULL,
  `Password1` varchar(200) NOT NULL,
  `Password2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `First`, `Last`, `Company`, `Email`, `Phone`, `Address`, `Pin`, `Pan`, `Password1`, `Password2`) VALUES
(1, 'sd', 'sd', 'sd', 'df', 'gf', 'gg', 'gg', 'gg', 'ff', 'ff'),
(2, 'knj', 'nj', 'nol', 'nkl', 'lnk', 'lnkm', 'lknm', 'lknm', 'lkn ', 'nlk'),
(3, 'ibhk', 'ibkh', 'iubjk', 'uh@uh.ds', '65', 'hvujgcxtfyckujl', 'gvjkhl', '542', '$2y$10$sVf77Lw73VQX/hqc0uqAKOpiXtPkDyvqnqXEQ7t30G7iICHS8yoiO', '$2y$10$LPYom0ZBM7n8McP1JvQInu2r8n6lc9a9FJDYHpAA5j2a7B6XAK2Fa'),
(4, 'iygh', 'iubkj', 'uoj', 'oujl@bn.dfw', '645321', 'ibhkjl', '54vf', '54h', '$2y$10$VW3kcOaWyzScNATfGFMDUOC4NP8Jv.YcltWCaFbbzcnh0/DwUStS2', '$2y$10$KfkiTdxaRfJpQxzP8ugXj.j/vNcl2UsqiNx605mqSSuCerfwyU2Ri'),
(5, 'ihk', 'iubkj', 'bkj', 'kjb@cv.cd', '5455156', 'hg', '65sd', '31', '$2y$10$m/zvZpyJBZ89CQ0cUCL8B.q4MsBWCGlFh50lwyXt08YcXh9vpl5Ei', '$2y$10$RPX5dOmTtXEwrjPmY1RVdugmtyIegrdprCxxUHKr8nEGpNKjdzJBm'),
(6, 'df', 'ikhv', 'nojbuivh', 'uh@uh.ds', '5613', 'hvki', 'ouv', '564', '$2y$10$2HGBz7DsONv6BZ7KzpkrIOr1CCZGIVwMzLwM7wdMQ9xnEC83GyB9i', '$2y$10$yrxPWIuKdVNXWsdeNIld9.Otf18MBx26Utaceia74zFZGIfLd3Oy.'),
(7, 'bh', 'hk', 'i', 'kjb@cv.cd', '6548', 'vfjkdc', 'dss', '2', '$2y$10$/OfMXFuHQyOYIm65l2B21.JYgiKaQWAH/BG60vXmxn0xd3UJd3j7i', '$2y$10$fokS0YZ4Hneq4YNAqtUjd.8oq0LqVRL8roiMjSIKWTIPTabYzutbi'),
(8, 'ibhjk', 'bjk', 'kbj', 'kjb@cv.cd', '6541', '65', '8', '53', '$2y$10$bxABw0TLI5dQfqhc6CoXA.gQE9N3.gMJlVhZzQOusfaqprYEIY2ny', '$2y$10$//eyEukUYrm4EqQQF2mGvOGe1mnVY6l2iI72LGRPsSlPoUx3SU4Vu'),
(9, 'jki', 'jk', 'nk', 'kjb@cv.cd', '65', '651', '65', '65', '$2y$10$/fxPSFrqW2ogZ1n9E0k9.urmR20tl8Ty.qfT6E4nmSl8Khrf5Oovi', '$2y$10$v2jjkfcDzFKZ61whZ5Jxfu6VJch1loGrHdPnZmSdINRU6wbrmtstG'),
(10, 'bju', 'ujb', 'bj', 'kjb@cv.cd', '5', '45', '45', '45', '$2y$10$AOb.ubsMsNhU0w/WwBsYPOUnZWuW/uhWcNA/R5EgDtJLY0o82reqG', '$2y$10$HnN3PIUuKrBprKP6s6v24ehRckppUr4xmlT4uGoLCTpywaDlGU0vi'),
(11, 'vjh', 'vh', 'khbkj', 'uh@uh.ds', '8', 'yugh', 'giyh', 'ihkb', '$2y$10$T9zvMH8voXdygLcoXjsov.G8VT1fyAV2PQV0kC7ewZ.EQa6.KBNkG', '$2y$10$CtcEscltI0EmMcujNzNjX.li6FH3G0hLhlK27mC6tdCDYS/K7.hjG'),
(12, 'in', 'inj', 'inj', 'uh@uh.ds', '8654', '\\r\\n654cd', '456fd65', 'fv', '$2y$10$J5ooq5lZaKLr/FADVDniNeGcLkE644GmSD2ACd7zEoI7g8HIe2UWW', '$2y$10$.WzO1QLv0HuziFZT8lDGKOGN9D0LPoqgfrQ0ksrn33Rl6WfcmuFMi'),
(13, 'kbj', 'bjk', 'bjk', 'olnjsd@fvbd.d', '84651', '645', '645', '64', '$2y$10$T2nRPliutP094NuC6GZyx.2S9RO2uOgDU4qyty2BNQepfiRXG7BxS', '$2y$10$uoAMgbmOOZXCZwaCyyHnEuvNuV0diYLemzthWFOBJAw4f/RiFV9Yq'),
(14, 'kj', 'jkm', 'njm', 'kjb@cv.cd', '562', '456ds', 'vhj', 'hj', '$2y$10$rs4M/LlV09r.MckFiKenRuvS6thpdrq7owEZe8YzgnQY0XuwlY9/m', '$2y$10$tFa3MRfVT9jBr4n704QJL.neoWcQNvZYiY.KJYIC4dqt.NCanzXi2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`) USING BTREE;

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
