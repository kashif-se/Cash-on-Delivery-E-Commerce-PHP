-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2015 at 04:32 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `ptcl` varchar(15) NOT NULL,
  `mobile1` varchar(16) NOT NULL,
  `mobile2` varchar(16) NOT NULL,
  `email` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `rss` text NOT NULL,
  `mapx` decimal(13,7) DEFAULT NULL,
  `mapy` decimal(13,7) NOT NULL,
  `about` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ptcl`, `mobile1`, `mobile2`, `email`, `facebook`, `twitter`, `rss`, `mapx`, `mapy`, `about`) VALUES
('+92608-362144', '+92-300-8682144', '+92-336-8682144', 'info@pakunitedfoods.com', 'http://www.facebook.com', 'http://www.twitter.com', 'http://rss', '16.8496189', '96.1288854', '<p>Pak United Foods (pvt) Ltd. Is the name of business company with the independent board members which is registered under the relevant laws as laid down by the Government of Pakistan. That has led itself in the heaven of succession and proved itself to be the best quality fruits provider and this all has been possible due to the hard work and zeal of our team. A few years ago company started its business only at town level but within short period of time our clients from all over Pakistan appreciated our services and encouraged our company. Considering this we are trying to introduce our Pakistani fruits in international market. The main focus of PUF is to provide farm fresh fruits to the clients. Fruits and vegetables presented by our company are sourced directly from our company registered progressive farmers. State of the art technology is used to maintain freshness and quality of fruits.PUF has its own system for quality analysis and checks. Research &amp; Development department of our company has always designed the packing to make products safe and fresh for our valued customers.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `fruits`
--

CREATE TABLE IF NOT EXISTS `fruits` (
`fruit_id` int(11) NOT NULL,
  `fruit_name` varchar(70) DEFAULT NULL,
  `fruit_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`fruit_id`, `fruit_name`, `fruit_time`) VALUES
(1, 'Mangoes', '2015-05-24 13:08:24'),
(2, 'Dates', '2015-05-24 13:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`item_id` int(11) NOT NULL,
  `item_name` varchar(60) NOT NULL,
  `item_fruit` int(11) NOT NULL,
  `item_desc` mediumtext NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_price` float NOT NULL,
  `item_unit` varchar(100) NOT NULL,
  `item_active` int(1) NOT NULL DEFAULT '1',
  `item_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_fruit`, `item_desc`, `item_image`, `item_price`, `item_unit`, `item_active`, `item_time`) VALUES
(1, 'Summer Sandwich', 1, '<p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.</p>', 'blogpost1.jpg', 2500, 'Carton', 1, '2015-05-26 17:49:54'),
(2, 'New Great Taste', 2, 'Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.', 'blogpost2.jpg', 350, 'Carton', 1, '2015-05-26 17:52:07'),
(3, 'A New &lt;h&gt;Product&lt;/h&gt;', 1, '<h2>This is the&nbsp;</h2>\r\n<p>New product</p>', 'product_1433074744.jpg', 1500, 'Kg', 1, '2015-05-31 12:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
`logins_id` int(11) NOT NULL,
  `login_name` varchar(255) NOT NULL,
  `login_password` varchar(255) DEFAULT NULL,
  `login_activation` varchar(255) NOT NULL,
  `login_type` int(11) DEFAULT NULL,
  `login_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `login_active` int(1) NOT NULL DEFAULT '1',
  `login_fname` varchar(50) NOT NULL DEFAULT 'Name',
  `login_phone` varchar(16) NOT NULL,
  `login_address` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`logins_id`, `login_name`, `login_password`, `login_activation`, `login_type`, `login_create`, `login_active`, `login_fname`, `login_phone`, `login_address`) VALUES
(1, 'kashif', 'c29oYWls', 'a2FzaGlm', 1, '2015-05-26 17:18:26', 1, 'Name', '+923015642191', 'Sahiwal'),
(3, 'aatif.se@gmail.com', 'YXRpZjEyMw==', '', 2, '2015-06-02 07:52:26', 1, 'Atif Sohail', '+923015642191', 'Chak No 91/9-L Sahiwal');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `od_order_id` int(11) NOT NULL,
  `od_product_id` int(11) NOT NULL,
  `od_rate` int(11) NOT NULL,
  `od_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`od_order_id`, `od_product_id`, `od_rate`, `od_qty`) VALUES
(1, 1, 250, 10),
(2, 1, 250, 7),
(3, 2, 350, 12),
(4, 1, 2500, 20);

-- --------------------------------------------------------

--
-- Table structure for table `order_summary`
--

CREATE TABLE IF NOT EXISTS `order_summary` (
`order_id` int(11) NOT NULL,
  `order_user` int(11) NOT NULL,
  `order_amount` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_summary`
--

INSERT INTO `order_summary` (`order_id`, `order_user`, `order_amount`, `order_status`, `order_time`, `order_update_time`) VALUES
(1, 1, 2500, 1, '2015-05-30 07:00:36', '2015-05-30 07:00:36'),
(2, 1, 1750, 4, '2015-05-30 09:28:43', '2015-05-31 15:34:36'),
(3, 1, 4200, 3, '2015-05-30 09:30:25', '2015-06-01 04:59:07'),
(4, 1, 50000, 2, '2015-06-02 07:00:20', '2015-06-02 07:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
`slide_id` int(11) NOT NULL,
  `slides_image` varchar(45) DEFAULT NULL,
  `slide_caption` longtext,
  `slide_number` int(11) DEFAULT NULL,
  `slide_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `slide_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slide_id`, `slides_image`, `slide_caption`, `slide_number`, `slide_time`, `slide_active`) VALUES
(1, 'slide1.jpg', '<h1>Delicious Meals</h1><p>Donec justo dui, semper vitae aliquam euzali, ornare pretium enim. Maecenas molestie diam<br><br>eget tellus luctus fermentum.</p><a href="products.php">Shop Now</a>', 1, '2015-05-24 11:56:40', 1),
(2, 'slide2.jpg', '<h1>Ice-cream Menus</h1>							<p>								Nulla id iaculis ligula. Vivamus mattis quam eget urna tincidunt consequat. Nullam								<br>								<br>								consectetur tempor neque vitae iaculis. Aliquam erat volutpat.							</p>							<a href="products.php">More Details</a>', 2, '2015-05-24 11:58:02', 1),
(3, 'slide3.jpg', '<h1>Healthy Drinks</h1>							<p>								Maecenas fermentum est ut elementum vulputate. Ut vel consequat urna. Ut aliquet								<br>								<br>								ornare massa, quis dapibus quam condimentum id.							</p>							<a href="products.php">Get Ready</a>', 3, '2015-05-24 11:58:42', 1),
(7, 'slider_1433071903.jpg', '<h1>Delicious Meals</h1>\r\n<p>Donec justo dui, semper vitae aliquam euzali, ornare pretium enim. Maecenas molestie diam<br /><br />eget tellus luctus fermentum.</p>\r\n<p><a href="products.php">Shop Now</a></p>', 4, '2015-05-31 11:21:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`staff_id` int(11) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `staff_post` varchar(100) NOT NULL,
  `staff_pic` varchar(255) NOT NULL,
  `staff_fb` varchar(255) NOT NULL,
  `staff_link` varchar(255) NOT NULL,
  `staff_twi` varchar(255) NOT NULL,
  `staff_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `staff_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_post`, `staff_pic`, `staff_fb`, `staff_link`, `staff_twi`, `staff_time`, `staff_active`) VALUES
(1, 'Tracy', 'Designer', 'author1.jpg', '#', '#', '#', '2015-05-27 13:14:59', 1),
(2, 'Mary', 'Developer', 'author2.jpg', '#', '#', '#', '2015-05-27 13:16:09', 1),
(3, 'Julia', 'Director', 'author3.jpg', '#', '#', '#', '2015-05-27 13:16:54', 1),
(4, 'Linda', 'Manager', 'author4.jpg', '#', '#', '#', '2015-05-27 13:17:25', 1),
(5, 'Kashif Sohail', 'Director Afairs', 'staff_1433258083.jpg', 'http://www.facebook.com', 'http://www.linkedin.com', 'http://www.twitter.com', '2015-06-02 15:14:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`status_id` int(11) NOT NULL,
  `status_name` text NOT NULL,
  `status_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`, `status_time`) VALUES
(1, 'Order Submitted', '2015-05-30 06:58:29'),
(2, 'Received to company', '2015-05-31 15:04:18'),
(3, 'Sent to Customer', '2015-05-31 15:04:39'),
(4, 'Delivered to customer', '2015-05-31 15:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
`subs_id` int(11) NOT NULL,
  `subs_email` text NOT NULL,
  `subs_ip` text NOT NULL,
  `subs_active` int(1) NOT NULL DEFAULT '1',
  `subs_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`subs_id`, `subs_email`, `subs_ip`, `subs_active`, `subs_time`) VALUES
(1, 'kashif.ezone@gmail.com', '::1', 1, '2015-05-24 15:59:42'),
(2, 'kashif.ezone@gmail.com', '::1', 1, '2015-05-25 08:40:29'),
(3, 'kashif.ezone@gmail.com', '::1', 1, '2015-05-27 13:32:48'),
(4, 'kashif.ezone@gmail.com', '::1', 1, '2015-05-28 10:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `testomonial`
--

CREATE TABLE IF NOT EXISTS `testomonial` (
`testmonial_id` int(11) NOT NULL,
  `testomonial_text` longtext NOT NULL,
  `testomonial_person` text NOT NULL,
  `testomonial_post` text NOT NULL,
  `testomonial_link` text NOT NULL,
  `testomonial_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `testmonial_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testomonial`
--

INSERT INTO `testomonial` (`testmonial_id`, `testomonial_text`, `testomonial_person`, `testomonial_post`, `testomonial_link`, `testomonial_time`, `testmonial_active`) VALUES
(1, 'Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.', 'Jennifer', 'Chief Designer', '#', '2015-05-24 12:27:07', 1),
(2, 'Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.', 'Laureen', 'Marketing Executive', '#', '2015-05-24 12:28:35', 1),
(3, 'Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.', 'Tanya', 'Creative Director', '#', '2015-05-24 12:29:26', 1),
(4, 'New testimonial Written to update test', 'Kashif Sohail', 'Team Supervisor', 'http://pakunitedfoods.com', '2015-06-02 14:13:56', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fruits`
--
ALTER TABLE `fruits`
 ADD PRIMARY KEY (`fruit_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
 ADD PRIMARY KEY (`logins_id`,`login_name`), ADD UNIQUE KEY `login_name` (`login_name`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
 ADD PRIMARY KEY (`od_order_id`,`od_product_id`);

--
-- Indexes for table `order_summary`
--
ALTER TABLE `order_summary`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
 ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
 ADD PRIMARY KEY (`subs_id`);

--
-- Indexes for table `testomonial`
--
ALTER TABLE `testomonial`
 ADD PRIMARY KEY (`testmonial_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fruits`
--
ALTER TABLE `fruits`
MODIFY `fruit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
MODIFY `logins_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_summary`
--
ALTER TABLE `order_summary`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
MODIFY `subs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `testomonial`
--
ALTER TABLE `testomonial`
MODIFY `testmonial_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
