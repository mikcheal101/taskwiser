--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `_id` int(11) NOT NULL,
  `_name` varchar(245) NOT NULL,
  `_img` longtext,
  `_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='this is the categories on the first page';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`_id`, `_name`, `_img`, `_parent`) VALUES
(1, 'DIESEL', 'assets/icons/diesel_icon.png', NULL),
(2, 'MOVING', 'assets/icons/moving_icon.png', NULL),
(4, 'HANDY MAN', 'assets/icons/hammer_icon.png', NULL),
(5, 'CLEANER', 'assets/icons/cleaning_icon.png', NULL),
(6, 'LAUNDRY', 'assets/icons/laundry_icon.png', NULL),
(7, 'COOKING', 'assets/icons/chef_icon.png', NULL),
(8, 'DELIVERY', 'assets/icons/delivery_icon.png', NULL),
(9, 'AUTO REPAIRER', 'assets/icons/mechanic_icon.png', NULL),
(10, 'DRIVER', 'assets/icons/driver_icon.png', NULL),
(12, 'DIESEL DELIVERY', NULL, 1),
(13, 'HOUSE MOVE', NULL, 2),
(14, 'OFFICE MOVE', NULL, 2),
(15, 'ELECTRICIAN', NULL, 4),
(16, 'PLUMBER', NULL, 4),
(17, 'CARPENTER', NULL, 4),
(18, 'TAILOR', NULL, 4),
(19, 'AIR CONDITIONER REPAIRS', NULL, 4),
(20, 'GENERATOR REPAIRS', NULL, 4),
(21, 'OVEN REPAIRER', NULL, 4),
(22, 'PAINTER', NULL, 4),
(23, 'HOUSE CLEAN', NULL, 5),
(24, 'OFFICE CLEAN', NULL, 5),
(25, 'WASHERMAN', NULL, 6),
(26, 'DRY CLEANER', NULL, 6),
(27, 'COOK', NULL, 7),
(28, 'PACKAGE DELIVERY', NULL, 8),
(29, 'FOOD DELIVERY', NULL, 8),
(30, 'BEAUTY', 'assets/icons/beauty_icon.png', NULL),
(31, 'PHOTOGRAPHER', NULL, 110),
(32, 'DISC JOCKEY', NULL, 110),
(33, 'LIVE BAND', NULL, 110),
(110, 'EVENTS', 'assets/icons/events_icon.png', NULL),
(111, 'CUSTOM TASKS', 'assets/icons/open_book.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_question`
--

CREATE TABLE `category_question` (
  `_id` int(11) NOT NULL,
  `_category` int(11) NOT NULL,
  `_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_question`
--

INSERT INTO `category_question` (`_id`, `_category`, `_question`) VALUES
(1, 5, 1),
(2, 5, 2),
(3, 5, 3),
(4, 5, 4),
(5, 5, 5),
(6, 1, 2),
(7, 1, 5),
(8, 1, 6),
(9, 2, 3),
(10, 2, 4),
(11, 2, 5),
(12, 2, 7),
(13, 2, 8),
(14, 2, 11),
(15, 111, 2),
(16, 111, 3),
(17, 111, 4),
(18, 111, 5),
(19, 6, 3),
(20, 6, 4),
(21, 6, 5),
(22, 6, 10),
(23, 8, 2),
(24, 8, 3),
(25, 8, 4),
(26, 8, 5),
(27, 8, 11),
(28, 10, 2),
(29, 10, 3),
(30, 10, 4),
(31, 10, 5),
(32, 10, 9),
(33, 110, 2),
(34, 110, 3),
(35, 110, 4),
(36, 110, 5),
(37, 110, 9),
(38, 30, 2),
(39, 30, 4),
(40, 30, 5),
(41, 30, 3),
(42, 9, 5),
(43, 7, 5),
(44, 4, 5),
(45, 4, 2),
(46, 4, 3),
(47, 4, 4),
(48, 1, 3),
(49, 1, 4),
(50, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `_id` int(11) NOT NULL,
  `_username` varchar(200) NOT NULL,
  `_pwd` text NOT NULL,
  `_email` varchar(254) NOT NULL,
  `_tel` varchar(20) DEFAULT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `address` text,
  `_city` int(11) DEFAULT NULL,
  `_state` int(11) DEFAULT NULL,
  `_status` int(11) NOT NULL DEFAULT '0',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_verification_code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`_id`, `_username`, `_pwd`, `_email`, `_tel`, `fullname`, `address`, `_city`, `_state`, `_status`, `ts`, `_verification_code`) VALUES
(1, 'sample@email.com', 'fc580293576c2fe88d4deb90ff791f87', 'sample@email.com', '09020464737', 'gabriel suswam', 'lagos', 13, 12, 1, '2016-12-23 02:14:09', '7925634fc19b9f481543'),
(2, 'james@sample.com', 'd2700d71db1', 'james@sample.com', NULL, NULL, NULL, NULL, NULL, 0, '2016-12-23 02:15:06', '1db137c53da7f53267b9'),
(3, 'liquid@mail.com', '518bf76f19e', 'liquid@mail.com', NULL, NULL, NULL, NULL, NULL, 0, '2016-12-23 02:18:27', 'f19ebb0c3afa8d97322d'),
(4, 'drain@mail.com', '2b867fefe0f', 'drain@mail.com', NULL, NULL, NULL, NULL, NULL, 0, '2016-12-23 02:20:13', 'fe0febf4890ec09bbed4'),
(5, 'io@mail.com', '4eca817d08f', 'io@mail.com', NULL, NULL, NULL, NULL, NULL, 0, '2016-12-23 02:21:41', 'd08f6949def5bcf51752'),
(6, 'green@mail.com', 'f64db2a49b2', 'green@mail.com', NULL, NULL, NULL, NULL, NULL, 0, '2016-12-23 02:22:26', '49b2013d85b5ae24b779'),
(7, 'hemen@m.com', '34966d3c61f', 'hemen@m.com', NULL, NULL, NULL, NULL, NULL, 0, '2016-12-23 02:24:42', 'c61f2ddc630f7f1578a6'),
(8, 'liquid@mails.com', '8496233ddf2', 'liquid@mails.com', NULL, NULL, NULL, NULL, NULL, 0, '2016-12-23 02:40:14', 'ddf269ca00a6b4f11435'),
(9, 'hirekaanmicheal@gmail.com', '408e937c0cb', 'hirekaanmicheal@gmail.com', NULL, NULL, NULL, NULL, NULL, 0, '2017-01-07 20:04:54', 'c0cb306e13811dd63fb1');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `_id` int(11) NOT NULL,
  `_name` varchar(100) NOT NULL,
  `is_state` tinyint(1) NOT NULL DEFAULT '0',
  `_main_cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`_id`, `_name`, `is_state`, `_main_cat`) VALUES
(12, 'Lagos State', 1, NULL),
(13, 'Ikoyi Water Side', 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `_id` int(11) NOT NULL,
  `_customer` int(11) NOT NULL,
  `_category` int(11) NOT NULL,
  `_assigned_staff` int(11) DEFAULT NULL,
  `rooms` int(11) NOT NULL,
  `liters` float NOT NULL,
  `boxes` int(11) NOT NULL,
  `shirts` int(11) NOT NULL,
  `troussers` int(11) NOT NULL,
  `suits` int(11) NOT NULL,
  `gowns` int(11) NOT NULL,
  `others` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `address` text NOT NULL,
  `delivery_address` text NOT NULL,
  `extra` text NOT NULL,
  `_status` int(11) NOT NULL DEFAULT '1',
  `_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` decimal(16,0) NOT NULL DEFAULT '0',
  `_transaction_code` varchar(200) NOT NULL DEFAULT 'TW-0000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`_id`, `_customer`, `_category`, `_assigned_staff`, `rooms`, `liters`, `boxes`, `shirts`, `troussers`, `suits`, `gowns`, `others`, `hours`, `address`, `delivery_address`, `extra`, `_status`, `_ts`, `price`, `_transaction_code`) VALUES
(28, 1, 12, NULL, 0, 2, 0, 0, 0, 0, 0, 0, 0, 'my address in tahiti', '', 'nothing to say', 1, '2016-12-26 23:43:40', '0', 'TW-001c'),
(29, 1, 12, 4, 0, 5, 0, 0, 0, 0, 0, 0, 0, 'gboko', '', 'extra ', 1, '2016-12-26 23:43:40', '3000', 'TW-001d'),
(30, 9, 12, NULL, 0, 500, 0, 0, 0, 0, 0, 0, 0, 'address', '', '', 1, '2017-01-07 20:21:20', '0', '0030'),
(32, 9, 12, NULL, 0, 500, 0, 0, 0, 0, 0, 0, 0, 'address', '', '', 1, '2017-01-07 20:33:42', '0', '0032'),
(33, 9, 12, NULL, 0, 500, 0, 0, 0, 0, 0, 0, 0, 'abs town', '', '', 1, '2017-01-07 23:10:58', '0', '0033'),
(34, 9, 12, 4, 0, 500, 0, 0, 0, 0, 0, 0, 0, 'abs town', '', '', 6, '2017-01-07 23:27:47', '5000', 'TW-0034'),
(35, 9, 12, NULL, 0, 500, 0, 0, 0, 0, 0, 0, 0, 'abs town', '', '', 1, '2017-01-08 01:41:55', '0', 'TW-0035'),
(36, 9, 29, NULL, 0, 500, 0, 0, 0, 0, 0, 0, 0, 'sample address', 'this is the delivery address', 'nothing much ', 1, '2017-01-08 01:50:13', '0', 'TW-0036'),
(37, 1, 24, NULL, 0, 500, 0, 0, 0, 0, 0, 0, 0, 'sample address', '', '', 1, '2017-01-08 03:03:59', '0', 'TW-0037');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `_id` int(11) NOT NULL,
  `_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `_order` int(11) NOT NULL,
  `_amt` double NOT NULL,
  `_transaction_code` varchar(200) NOT NULL,
  `_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `_id` int(11) NOT NULL,
  `_question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`_id`, `_question`) VALUES
(1, 'number of rooms'),
(2, 'address'),
(3, 'date'),
(4, 'time'),
(5, 'message / extras'),
(6, 'liters amt'),
(7, 'amount of boxes'),
(8, 'need help parking / just moving boxes ?'),
(9, 'how long required'),
(10, 'items with quantities [shirts, troussers, suits, gowns, others]'),
(11, 'delivery address');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_status`
--

CREATE TABLE `request_status` (
  `_id` int(11) NOT NULL,
  `_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `request_status`
--

INSERT INTO `request_status` (`_id`, `_name`) VALUES
(1, 'processing request...'),
(2, 'in-transit'),
(3, 'suspended'),
(4, 'cancelled'),
(5, 'done'),
(6, 'awaiting payment...');

-- --------------------------------------------------------

--
-- Table structure for table `request_user`
--

CREATE TABLE `request_user` (
  `id` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) DEFAULT NULL,
  `sub_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`, `category`, `sub_category`) VALUES
(1, 'moving', NULL, NULL),
(2, 'DIESEL', NULL, NULL),
(3, 'CLEANER', NULL, NULL),
(4, 'Handyman', NULL, NULL),
(5, 'Laundry', NULL, NULL),
(6, 'Cooking', NULL, NULL),
(7, 'delivery', NULL, NULL),
(8, 'Mechanic', NULL, NULL),
(9, 'driver', NULL, NULL),
(10, 'EVENTS', NULL, NULL),
(11, 'house move', 1, NULL),
(12, 'office move', 1, NULL),
(13, 'house clean', 3, NULL),
(14, 'office clean', 3, NULL),
(15, 'spring cleaning', 3, 13),
(16, 'normal cleaning', 3, 13),
(17, 'electrician', 4, NULL),
(18, 'plumber', 4, NULL),
(19, 'carpenter', 4, NULL),
(20, 'air conditon repairs', 4, NULL),
(21, 'generator repairs', 4, NULL),
(22, 'tailor', 4, NULL),
(23, 'washerman', 5, NULL),
(24, 'dry cleaning', 5, NULL),
(25, 'package delivery', 7, NULL),
(26, 'cook', 6, NULL),
(27, 'food delivery', 7, NULL),
(28, 'driver for the day', 9, NULL),
(29, 'cake', 10, NULL),
(30, 'live band', 10, NULL),
(31, 'drinks(cocktail)', 10, NULL),
(32, 'photograper', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `notes` text COLLATE utf8_unicode_ci,
  `profile_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT 'assets/imgs/profile-blank.png',
  `first_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `usertype` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `address`, `notes`, `profile_image`, `first_name`, `last_name`, `middle_name`, `email`, `usertype`) VALUES
(1, 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', NULL, NULL, 'sample-4.jpg', 'Aris', 'Caifas', NULL, 'administrator@mail.com', 1),
(4, 'samuel101', 'd41d8cd98f00b204e9800998ecf8427e', 'address', NULL, 'uploads/Passeport_Photography_AMBEU_Monsan_Josias_Phares_Youth_Advisory_Board1.jpg', 'samuel', 'samuel', '', 'samuel@yahoo.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `_id` int(11) NOT NULL,
  `_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`_id`, `_name`) VALUES
(1, 'admin'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `worker_tasks`
--

CREATE TABLE `worker_tasks` (
  `_id` int(11) NOT NULL,
  `_worker` int(11) NOT NULL,
  `_task` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker_tasks`
--

INSERT INTO `worker_tasks` (`_id`, `_worker`, `_task`) VALUES
(24, 4, 12),
(25, 4, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_name_UNIQUE` (`_name`),
  ADD KEY `_parent` (`_parent`);

--
-- Indexes for table `category_question`
--
ALTER TABLE `category_question`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `_category` (`_category`),
  ADD KEY `_question` (`_question`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_username` (`_username`),
  ADD UNIQUE KEY `_email` (`_email`),
  ADD UNIQUE KEY `_verification_code` (`_verification_code`),
  ADD UNIQUE KEY `_tel` (`_tel`),
  ADD KEY `_state` (`_state`),
  ADD KEY `_city` (`_city`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `_main_cat` (`_main_cat`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `_customer` (`_customer`),
  ADD KEY `_category` (`_category`),
  ADD KEY `_status` (`_status`),
  ADD KEY `_assigned_staff` (`_assigned_staff`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_transaction_code` (`_transaction_code`),
  ADD KEY `_order` (`_order`),
  ADD KEY `_customer` (`_customer`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `request_status`
--
ALTER TABLE `request_status`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertype` (`usertype`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_name` (`_name`);

--
-- Indexes for table `worker_tasks`
--
ALTER TABLE `worker_tasks`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_id` (`_id`,`_worker`),
  ADD KEY `_worker` (`_worker`),
  ADD KEY `_task` (`_task`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `category_question`
--
ALTER TABLE `category_question`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `request_status`
--
ALTER TABLE `request_status`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `worker_tasks`
--
ALTER TABLE `worker_tasks`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`_parent`) REFERENCES `categories` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_question`
--
ALTER TABLE `category_question`
  ADD CONSTRAINT `category_question_ibfk_1` FOREIGN KEY (`_category`) REFERENCES `categories` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_question_ibfk_2` FOREIGN KEY (`_question`) REFERENCES `questions` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`_main_cat`) REFERENCES `locations` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`_category`) REFERENCES `categories` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`_customer`) REFERENCES `customers` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`_assigned_staff`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`_order`) REFERENCES `orders` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`_customer`) REFERENCES `customers` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `worker_tasks`
--
ALTER TABLE `worker_tasks`
  ADD CONSTRAINT `worker_tasks_ibfk_1` FOREIGN KEY (`_worker`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `worker_tasks_ibfk_2` FOREIGN KEY (`_task`) REFERENCES `categories` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;
