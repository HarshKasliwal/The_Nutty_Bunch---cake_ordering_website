-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2020 at 12:27 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `a_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(30) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `hint` varchar(255) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`a_id`, `admin_id`, `pswd`, `hint`) VALUES
(1, 'a@gmail.com', 'f09696910bdd874a99cd74c8f05b5c44', 'f09696910bdd874a99cd74c8f05b5c44'),
(2, 'vai@gmail.com', 'c52432e367f45ea05d58e918989f4c63', '5171eb10e3545d7f03d811788992090d'),
(3, 'brij@gmail.com', '9db077197b5f4184cd9eb439086fbdef', '9f02fde8b692b98d7c4a9096e420ee43'),
(4, 'srs@gmail.com', '0487cc982f7db39c51695026e4bdc692', '6224c92b767b330d2e8c0460d9c40c37'),
(5, 'aa@gmail.com', '4542e4c233f26b4faf6b5f3fed24280c', 'd41d8cd98f00b204e9800998ecf8427e');

-- --------------------------------------------------------

--
-- Table structure for table `cake_details`
--

DROP TABLE IF EXISTS `cake_details`;
CREATE TABLE IF NOT EXISTS `cake_details` (
  `cake_id` int(10) NOT NULL AUTO_INCREMENT,
  `cake_name` varchar(255) NOT NULL,
  `cake_img` varchar(255) NOT NULL,
  `diff_ty` varchar(50) NOT NULL,
  `flavour` varchar(50) NOT NULL,
  `cake_price` double(5,2) NOT NULL,
  PRIMARY KEY (`cake_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cake_details`
--

INSERT INTO `cake_details` (`cake_id`, `cake_name`, `cake_img`, `diff_ty`, `flavour`, `cake_price`) VALUES
(1, 'strawberry cupcack cake', 'cake_image/3333095352slider-14.jpg', 'cupcack', 'strawberry', 299.00),
(2, 'chocolate cupcack cake', 'cake_image/9047796010blog-c-3.jpg', 'cupcack', 'chocolate', 399.00),
(3, 'white forest birthday cake', 'cake_image/6740255661portfolio-8.jpg', 'birthday', 'white forest', 599.00),
(4, 'butterscotch birthday cake', 'cake_image/2481018960slider-12.jpg', 'birthday', 'butterscotch', 499.00),
(5, 'vanilla birthday cake', 'cake_image/7690345758slider-10.jpg', 'birthday', 'vanilla', 699.00),
(6, 'truffle birthday cake', 'cake_image/6453665406service-4.png', 'birthday', 'truffle', 449.00),
(7, 'chocolate brithday cake', 'cake_image/1863392620product-details-1.jpg', 'birthday', 'chocolate', 799.00),
(8, 'vanilla cupcack cake', 'cake_image/9666491208slider-13.jpg', 'cupcack', 'vanilla', 349.00),
(9, 'fondant anniversary cake', 'cake_image/2592479634blog-c-6.jpg', 'Anniversary', 'fondant', 549.00),
(10, 'red velvet Eggless cake', 'cake_image/2191440515c-feature-1.jpg', 'Eggless', 'red velvet', 449.00),
(14, 'mango anniversary cake', 'cake_image/5428358211arivals-pic.jpg', 'Anniversary', 'mango', 699.00),
(12, 'fruit anniversary cake', 'cake_image/1468519620special-recipe.jpg', 'Anniversary', 'fruit', 499.00),
(15, 'fruit Eggless cake', 'cake_image/7824428474c-feature-3.jpg', 'Eggless', 'fruit', 399.00),
(16, 'pineapple Anniversary cake', 'cake_image/6704091390service-3.png', 'Anniversary', 'pineapple', 999.00),
(18, 'vanilla Eggless cake', 'cake_image/3683744824slider-11.jpg', 'Eggless', 'vanilla', 449.00);

-- --------------------------------------------------------

--
-- Table structure for table `cake_feedback`
--

DROP TABLE IF EXISTS `cake_feedback`;
CREATE TABLE IF NOT EXISTS `cake_feedback` (
  `feed_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`feed_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cake_feedback`
--

INSERT INTO `cake_feedback` (`feed_id`, `customer_name`, `email`, `subject`, `message`) VALUES
(1, 'anu', 'anu@gmail.com', 'for cake', 'Good cake'),
(2, 'Brijesh', 'brij@gmail.com', 'About Cake', 'Very Testy Cakes\r\nGood For Health');

-- --------------------------------------------------------

--
-- Table structure for table `cake_flavour`
--

DROP TABLE IF EXISTS `cake_flavour`;
CREATE TABLE IF NOT EXISTS `cake_flavour` (
  `f_id` int(10) NOT NULL AUTO_INCREMENT,
  `flavour` varchar(50) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cake_flavour`
--

INSERT INTO `cake_flavour` (`f_id`, `flavour`) VALUES
(1, 'chocolate'),
(2, 'butterscotch'),
(3, 'black forest'),
(14, 'fruit'),
(5, 'pineapple'),
(6, 'red velvet'),
(7, 'white forest'),
(13, 'vanilla'),
(9, 'mango'),
(10, 'fondant'),
(11, 'truffle'),
(12, 'strawberry');

-- --------------------------------------------------------

--
-- Table structure for table `cake_type`
--

DROP TABLE IF EXISTS `cake_type`;
CREATE TABLE IF NOT EXISTS `cake_type` (
  `t_id` int(10) NOT NULL AUTO_INCREMENT,
  `diff_ty` varchar(255) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cake_type`
--

INSERT INTO `cake_type` (`t_id`, `diff_ty`) VALUES
(1, 'birthday'),
(2, 'Anniversary'),
(3, 'Eggless'),
(4, 'Combos'),
(7, 'Theme'),
(6, 'Photo'),
(13, 'Couple'),
(11, 'cupcack');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(30) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mob` varchar(13) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `pswd`, `email`, `mob`, `address`) VALUES
(1, 'anu', 'f09696910bdd874a99cd74c8f05b5c44', 'anu@gmail.com', '9898278874', 'Near By Bank of Baroda,Mahuva Road,Badhada'),
(2, 'brijesh', '9db077197b5f4184cd9eb439086fbdef', 'brij@gmail.com', '1234567890', 'neshadi'),
(3, 'suresh', '0487cc982f7db39c51695026e4bdc692', 'srs@gmail.com', '9876543211', 'vijpadi'),
(4, 'vaidip', 'c52432e367f45ea05d58e918989f4c63', 'vai@gmail.com', '1234512345', 'junuvadar'),
(5, 'paresh', '6c452c76957f2c36c9d4f8394e2a63a3', 'paresh@gmail.com', '1234561234', 'amreli');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `o_id` int(10) NOT NULL,
  `cake_id` int(10) NOT NULL,
  `cake_name` varchar(255) NOT NULL,
  `cake_qty` int(3) NOT NULL,
  `cake_price` double(6,2) NOT NULL,
  `all_total` double(12,2) NOT NULL,
  KEY `o_id` (`o_id`),
  KEY `cack_id` (`cake_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

DROP TABLE IF EXISTS `order_master`;
CREATE TABLE IF NOT EXISTS `order_master` (
  `o_id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` double(10,2) NOT NULL,
  `c_id` int(10) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `delivery_status` enum('ConfirmOrder','packingcake','onway','done') NOT NULL DEFAULT 'ConfirmOrder',
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNO` bigint(13) NOT NULL,
  PRIMARY KEY (`o_id`),
  KEY `c_id` (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `cardholderName` varchar(50) NOT NULL,
  `cardNumber` varchar(30) NOT NULL,
  `vaildthru` varchar(50) NOT NULL,
  `cvv/cvc` varchar(50) NOT NULL,
  `payment_type` varchar(60) NOT NULL,
  `c_id` int(10) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `o_id` int(10) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `c_id` (`c_id`),
  KEY `o_id` (`o_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
