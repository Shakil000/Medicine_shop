-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2020 at 09:26 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obmbsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `manager_name` varchar(100) NOT NULL,
  `pharmacy` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `manager_name`, `pharmacy`, `location`, `address`, `phone`, `email`, `password`, `images`) VALUES
(1, 'Kyle Shaw', 'Ma Pharmacy', 'mirpur 12', '+1 (786) 753-8478', 1, 'riwojodahu@mailinator.net', '123', 'a:1:{i:0;s:17:\"images/promo2.jpg\";}'),
(2, 'Md Bappy', 'Teriz Pharma', 'Mirpur 11', 'Beside Popular Hospital', 1917234567, 'bappy@gmail.com', '123', 'a:1:{i:0;s:13:\"images/h2.jpg\";}'),
(3, 'Dillon Kirkland', '+1 (543) 144-1311', 'Uttara', '+1 (919) 226-9565', 1, 'kuxy@mailinator.com', '123', 'a:1:{i:0;s:21:\"images/169764_web.jpg\";}');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `quantity`, `amount`) VALUES
(11, 6, 2, 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `number` int(20) NOT NULL,
  `password` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `number`, `password`, `status`) VALUES
(1, 'shanta', 'shanta@gmail.com', 'rajshahi', 1632269186, '1', 1),
(2, 'shakil', 'shakil@gmail.com', 'dhaka', 2147483647, '1', 1),
(3, 'Dara Christensen', 'asd@mailinator.com', 'Eveniet proident d', 275, '5', 1),
(4, 'ashiq', 'asd@gmail.com', 'ashulia', 1718, '2', 1),
(5, 'Miranda Slater', 'daqobis@mailinator.com', 'In voluptas ipsum pa', 620, 'Pa$$w0rd!', 1),
(6, 'abdullah', 'ab@gmail.com', 'Mirpur', 234, '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `person_name`, `address`, `phone`, `email`, `password`, `branch_id`, `images`) VALUES
(3, 'Kaitlin Dillard', '+1 (642) 368-9543', '+1 (414) 182-3147', 'ks@gmail.com', ' 1', 1, 'a:1:{i:0;s:32:\"images/Almex-5X4-Bolus_large.png\";}'),
(5, 'Colette Nichols', '+1 (898) 271-2602', '+1 (786) 603-7571', 'at@gmail.com', '123', 2, 'a:1:{i:0;s:59:\"images/colorful-flower-on-dark-tropical-260nw-721703848.jpg\";}');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `hospital_name`, `address`, `phone`, `email`, `images`) VALUES
(1, 'Lab Aid', 'Uttara, Jasim Uddin Bus Stand', '+1 (405) 874-8846', 'qezi@mailinator.net', 'a:1:{i:0;s:19:\"images/hospital.JPG\";}'),
(2, 'popular hospital', 'Shyamoli', '+1 (581) 496-9691', 'at@gmail.com', 'a:1:{i:0;s:14:\"images/hos.jpg\";}'),
(3, 'Ahsania mission hospital', 'Uttara', '+1 (581) 496-9691', 'tanvir59@outlook.com', 'a:1:{i:0;s:74:\"images/Ahsania Mission Cancer & General Hospital Uttara Location Phone.jpg\";}');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `paymentmethod` varchar(50) DEFAULT NULL,
  `branch_id` int(50) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `card_name` varchar(50) DEFAULT NULL,
  `card_number` varchar(50) DEFAULT NULL,
  `expiration` date DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `amount`, `paymentmethod`, `branch_id`, `address`, `card_name`, `card_number`, `expiration`, `cvv`, `delivery_id`, `order_date`) VALUES
(2, 1, NULL, 935, 'credit', 1, 'Dolorem omnis ea deb', 'Whitney Butler', '515', '2005-07-02', 0, 3, '0000-00-00'),
(3, 2, NULL, 935, 'credit', 1, 'Dolorem omnis ea deb', 'Whitney Butler', '515', '2005-07-02', 0, 5, '0000-00-00'),
(8, 6, NULL, 1870, 'credit', 2, 'Perferendis laborum', 'Ifeoma Nielsen', '930', '2004-09-04', 0, NULL, '0000-00-00'),
(9, 6, NULL, 1870, 'credit', 2, 'Perferendis laborum', 'Ifeoma Nielsen', '930', '2004-09-04', 0, NULL, '0000-00-00'),
(10, 6, NULL, 2850, 'credit', 2, 'Rem magna accusantiu', 'Ramona Mendez', '850', '1971-01-14', 0, NULL, '2019-12-31'),
(11, 6, NULL, 0, 'credit', 3, 'Velit est cillum a', 'Tashya Sanford', '286', '2007-11-18', 0, NULL, '2020-01-01'),
(12, 6, NULL, 72, 'credit', 1, 'Mirpur', 'abd', '1234', '2020-01-02', 1234, NULL, '2020-01-01'),
(13, 6, NULL, 24, 'credit', 1, 'Mirpur', 'mamun', '1234', '2020-01-18', 456, 3, '2020-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `hospital_id` int(50) NOT NULL,
  `branch_id` int(50) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `customer_id`, `phone`, `patient_name`, `doctor_name`, `hospital_id`, `branch_id`, `images`) VALUES
(1, 1, 1, 'Wyatt Chambers', 'Zia Rutledge', 1, 2, 'a:1:{i:0;s:24:\"branch/images/pres 2.PNG\";}'),
(2, 1, 1, 'Amy Boyd', 'Shannon Barnes', 1, 1, 'a:1:{i:0;s:46:\"branch/images/Annotation 2019-11-25 001900.png\";}'),
(3, 6, 1, 'Eaton Goodwin', 'Ingrid Cooley', 1, 1, 'a:1:{i:0;s:24:\"branch/images/pres 2.PNG\";}'),
(4, 6, 1, 'Fatima Irwin', 'Bree Shepard', 2, 1, 'a:1:{i:0;s:24:\"branch/images/pres 2.PNG\";}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(30) NOT NULL,
  `medicine_name` varchar(30) NOT NULL,
  `group` varchar(500) DEFAULT NULL,
  `images` text NOT NULL,
  `power` varchar(50) DEFAULT NULL,
  `company` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `medicine_name`, `group`, `images`, `power`, `company`, `price`, `description`, `code`) VALUES
(2, 'Napa', 'Paracetamol', 'a:1:{i:0;s:21:\"images/Napa-500mg.jpg\";}', '500 mg', 'Square', '24', 'Eat Carefully', '1'),
(5, 'Amodis', 'Metranidazol', 'a:1:{i:0;s:21:\"images/AMODIS-400.jpg\";}', '400 mg', 'Square', ' 2', 'Aut alias facere dol', '2'),
(6, 'Tuska', '', 'a:1:{i:0;s:16:\"images/tuska.jpg\";}', '', 'Square', ' 110', 'Consequuntur mollit ', '3'),
(7, 'Moxibac', 'Moxifloxacin', 'a:1:{i:0;s:18:\"images/moxibac.jpg\";}', '', 'Popular', ' 150', 'lonomafami@mailinator.net', '4'),
(9, 'Seclo', 'Omeprazol', 'a:1:{i:0;s:22:\"images/SECLO-40_l1.jpg\";}', '40 mg', 'Square', ' 7', 'Aut alias facere dol', '5'),
(10, 'Aquaphen', '', 'a:1:{i:0;s:18:\"images/INC0043.jpg\";}', '', 'Incepta', ' 72', 'Rojas Bowers Plc', '362'),
(11, 'Ambrox', '', 'a:1:{i:0;s:29:\"images/Ambrox-syrup-100ml.jpg\";}', '', 'Square', ' 68', 'Hodge and Wynn LLC', '21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `phone`, `email`, `password`, `status`, `images`) VALUES
(1, 'shanta', 'rajshahi', '01632269186', 'skshanta01@gmail.com', '123', 1, ''),
(13, 'shakil', 'hdghsjd', '01632269186', 'shakil@gmail.com', '111111', 1, ''),
(14, 'himel', 'gazipur', '01632324325', 'himel@gmail.com', '1', 1, ''),
(15, 'subrina', 'dhaka', '01632269186', 'subrina@gmail.com', '1', 1, ''),
(16, 'subrina', 'rajshahi', '01632269186', 's@gmail.com', '1', 0, ''),
(17, 'ryjewibug@mailinator.net', 'refihizix@mailinator.com', 'poju@mailinator.com', 'asd@gmail.com', '123', 1, ''),
(18, 'muxikawa@mailinator.com', 'wekug@mailinator.net', 'fogyk@mailinator.net', 'kumo@mailinator.com', ' 123', 1, 'a:1:{i:0;s:20:\"images/FCL 70571.jpg\";}'),
(19, 'Borhan', 'Mirpur 11 bus stand', '123', 'syz@gmail.com', '1', 1, 'a:1:{i:0;s:20:\"images/FCL 70571.jpg\";}'),
(20, 'xeraxi@mailinator.com', 'gagufi@mailinator.com', 'deqeza@mailinator.com', 'asd@gmail.com', ' 1', 1, 'a:1:{i:0;s:20:\"images/FCL 70571.jpg\";}'),
(21, 'zunejekely@mailinator.com', 'xydedub@mailinator.com', 'weqenadymu@mailinator.net', 'at@mailinator.net', '1', 1, 'a:1:{i:0;s:16:\"images/promo.jpg\";}'),
(22, 'xebit@mailinator.com', 'juhakyqyxu@mailinator.net', 'dodoliw@mailinator.net', 'am@gmail.com', '1', 1, 'a:1:{i:0;s:16:\"images/promo.jpg\";}'),
(23, 'tonaxabime@mailinator.com', 'sixekozu@mailinator.net', '33', 'kalu@gmail.com', '123', 1, 'a:1:{i:0;s:16:\"images/promo.jpg\";}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `delivery_id` (`delivery_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `prescription_ibfk_3` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
