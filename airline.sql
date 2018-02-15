-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3308
-- Generation Time: Feb 15, 2018 at 08:47 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `admin_type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `user_name`, `passwd`, `admin_type`) VALUES
(1, 'chetan', '5f4dcc3b5aa765d61d8327deb882cf99', 'super'),
(6, 'superadmin', '5f4dcc3b5aa765d61d8327deb882cf99', 'super');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE IF NOT EXISTS `booking_details` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(50) NOT NULL,
  `b_fid` varchar(5) NOT NULL,
  `b_phno` varchar(15) NOT NULL,
  `b_mail` varchar(50) NOT NULL,
  `b_add` varchar(100) NOT NULL,
  `b_price` varchar(10) NOT NULL,
  `b_child` varchar(3) NOT NULL,
  `b_adults` varchar(3) NOT NULL,
  `b_total` varchar(3) NOT NULL,
  `b_status` varchar(10) NOT NULL,
  `b_pnr` varchar(20) NOT NULL,
  `b_card` varchar(16) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`b_id`, `b_name`, `b_fid`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`, `b_card`) VALUES
(1, 'Ankur Sinha', '100', '9988877768', 'ankur218@yahoo.com', '45 XYZ Street ABC Nagar Chennai 80', '3000', '0', '1', '1', 'Booked', '161942161942', '1234567891234567'),
(2, 'Ankur Sinha', '100', '9988877768', 'ankur218@yahoo.com', '45 XYZ Street ABC Nagar Chennai 80', '3000', '0', '1', '1', 'Booked', '141332141332', '1234567891234567');

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

CREATE TABLE IF NOT EXISTS `card_details` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(50) NOT NULL,
  `c_cvv` int(3) NOT NULL,
  `c_cnum` varchar(16) NOT NULL,
  `c_balance` int(8) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87880 ;

--
-- Dumping data for table `card_details`
--

INSERT INTO `card_details` (`c_id`, `c_name`, `c_cvv`, `c_cnum`, `c_balance`) VALUES
(87878, 'Ankur Sinha', 232, '1234567891234567', 42989),
(87879, 'Sukanya Sunder', 899, '9876543212345678', 89898);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `f_name`, `l_name`, `gender`, `address`, `city`, `state`, `phone`, `email`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(12, 'Chetan1', 'Shenai', 'male', 'Priyadarshini', 'mumbai', 'Maharashtra', '34343432', 'chetanshenai9@gmail.com', '1995-06-05', NULL, '2018-02-15 00:55:47'),
(18, 'bhushan', 'Chhadva', 'male', 'Padmavati', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1991-06-18', NULL, NULL),
(19, 'Jayant', 'atre', 'male', 'Priyadarshini A102, adwa2', 'wad', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1998-05-18', NULL, NULL),
(21, 'bhushan', 'sutar', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '2016-11-24', NULL, NULL),
(23, 'Paolo', ' Accorti', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1992-02-04', NULL, NULL),
(24, 'Roland', ' Mendel', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '2016-11-30', NULL, NULL),
(25, 'John', 'doe', 'male', 'City, view', '', 'Maharashtra', '8875207658', 'john@abc.com', '2017-01-27', NULL, NULL),
(26, 'Maria', 'Anders', 'female', 'New york city', '', 'Maharashtra', '8856705387', 'chetanshenai9@gmail.com', '2017-01-28', NULL, NULL),
(27, 'Ana', ' Trujillo', 'female', 'Street view', '', 'Maharashtra', '9975658478', 'chetanshenai9@gmail.com', '1992-07-16', NULL, NULL),
(28, 'Thomas', 'Hardy', 'male', '120 Hanover Sq', '', 'Maharashtra', '885115323', 'abc@abc.com', '1985-06-24', NULL, NULL),
(29, 'Christina', 'Berglund', 'female', 'Berguvsvägen 8', '', 'Maharashtra', '9985125366', 'chetanshenai9@gmail.com', '1997-02-12', NULL, NULL),
(30, 'Ann', 'Devon', 'male', '35 King George', '', 'Maharashtra', '8865356988', 'abc@abc.com', '1988-02-09', NULL, NULL),
(31, 'Helen', 'Bennett', 'female', 'Garden House Crowther Way', '', 'Maharashtra', '75207654', 'chetanshenai9@gmail.com', '1983-06-15', NULL, NULL),
(32, 'Annette', 'Roulet', 'female', '1 rue Alsace-Lorraine', '', ' ', '3410005687', 'abc@abc.com', '1992-01-13', NULL, NULL),
(33, 'Yoshi', 'Tannamuri', 'male', '1900 Oak St.', '', 'Maharashtra', '8855647899', 'chetanshenai9@gmail.com', '1994-07-28', NULL, NULL),
(34, 'Carlos', 'González', 'male', 'Barquisimeto', '', 'Maharashtra', '9966447554', 'abc@abc.com', '1997-06-24', NULL, NULL),
(35, 'Fran', ' Wilson', 'male', 'Priyadarshini ', '', 'Maharashtra', '5844775565', 'fran@abc.com', '1997-01-27', NULL, NULL),
(36, 'Jean', ' Fresnière', 'female', '43 rue St. Laurent', '', 'Maharashtra', '9975586123', 'chetanshenai9@gmail.com', '2002-01-28', NULL, NULL),
(37, 'Jose', 'Pavarotti', 'male', '187 Suffolk Ln.', '', 'Maharashtra', '875213654', ' Pavarotti@gmail.com', '1997-02-04', NULL, NULL),
(38, 'Palle', 'Ibsen', 'female', 'Smagsløget 45', '', 'Maharashtra', '9975245588', 'Palle@gmail.com', '1991-06-17', NULL, '2018-01-14 17:11:42'),
(39, 'Paula', 'Parente', 'male', 'Rua do Mercado, 12', '', 'Maharashtra', '659984878', 'abc@gmail.com', '1996-02-06', NULL, NULL),
(40, 'Matti', ' Karttunen', 'female', 'Keskuskatu 45', '', 'Maharashtra', '845555125', 'abc@abc.com', '1984-06-19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flight_search`
--

CREATE TABLE IF NOT EXISTS `flight_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fno` varchar(10) NOT NULL,
  `from_city` varchar(20) NOT NULL,
  `to_city` varchar(20) NOT NULL,
  `departure_date` varchar(20) NOT NULL,
  `arrival_date` varchar(20) NOT NULL,
  `departure_time` varchar(20) NOT NULL,
  `arrival_time` varchar(20) NOT NULL,
  `e_seats_left` int(3) NOT NULL DEFAULT '20',
  `b_seats_left` int(3) NOT NULL DEFAULT '10',
  `e_price` int(5) NOT NULL,
  `b_price` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `flight_search`
--

INSERT INTO `flight_search` (`id`, `fno`, `from_city`, `to_city`, `departure_date`, `arrival_date`, `departure_time`, `arrival_time`, `e_seats_left`, `b_seats_left`, `e_price`, `b_price`) VALUES
(1, 'SA218', 'Chennai', 'Delhi', '18-02-2018', '19-02-2018', '09:00', '12:00 ', 15, 10, 2500, 5000),
(2, 'SA2112', 'Delhi', 'Chennai', '18-02-2018', '18-02-2018', '13:00', '16:00', 15, 10, 2500, 5000),
(3, 'SA219', 'Chennai', 'Delhi', '18-02-2018', '18-02-2018', '18:00 ', '21:00 ', 18, 10, 2500, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `flight_users`
--

CREATE TABLE IF NOT EXISTS `flight_users` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_fname` varchar(20) NOT NULL,
  `f_lname` varchar(20) NOT NULL,
  `f_sex` varchar(10) NOT NULL,
  `f_uname` varchar(32) NOT NULL,
  `f_password` varchar(32) NOT NULL,
  `f_mailid` varchar(100) NOT NULL,
  `f_mailcode` varchar(100) NOT NULL,
  `f_active` int(11) NOT NULL,
  `f_regdate` datetime NOT NULL,
  `f_passrec` int(11) NOT NULL,
  `f_address` varchar(500) NOT NULL,
  `f_phone` varchar(10) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `flight_users`
--

INSERT INTO `flight_users` (`f_id`, `f_fname`, `f_lname`, `f_sex`, `f_uname`, `f_password`, `f_mailid`, `f_mailcode`, `f_active`, `f_regdate`, `f_passrec`, `f_address`, `f_phone`) VALUES
(100, 'Ankur', 'Sinha', 'Male', 'ankur', '5f4dcc3b5aa765d61d8327deb882cf99', 'ankur218@yahoo.com', '', 1, '2014-07-20 12:55:28', 0, '45 XYZ Street ABC Nagar Chennai 80', '9988877768'),
(101, 'Sukanya', 'Sunder', 'Female', 'sukanya', '5f4dcc3b5aa765d61d8327deb882cf99', 'sukanyasunder@gmail.com', '', 1, '2014-07-20 12:55:28', 0, 'No. 54, ABC Street, XYZ Nagar, Delhi - 6', '7827318927');

-- --------------------------------------------------------

--
-- Table structure for table `passenger_details`
--

CREATE TABLE IF NOT EXISTS `passenger_details` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_pnr` varchar(25) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_age` varchar(3) NOT NULL,
  `p_sex` varchar(10) NOT NULL,
  `p_fno` varchar(10) NOT NULL,
  `p_from` varchar(10) NOT NULL,
  `p_to` varchar(10) NOT NULL,
  `p_dedate` varchar(20) NOT NULL,
  `p_ardate` varchar(20) NOT NULL,
  `p_detime` varchar(20) NOT NULL,
  `p_artime` varchar(20) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  `p_class` varchar(10) NOT NULL,
  `p_passtype` varchar(1) NOT NULL,
  `p_fid` varchar(5) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `passenger_details`
--

INSERT INTO `passenger_details` (`p_id`, `p_pnr`, `p_name`, `p_age`, `p_sex`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_status`, `p_class`, `p_passtype`, `p_fid`) VALUES
(1, '141332141332', 'Ankut', 'M', '25', 'SA218', 'Chennai', 'Delhi', '18-02-2018', '19-02-2018', '09:00', '12:00 ', 'Booked', 'Economy', 'A', '100');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
