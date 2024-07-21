-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2024 at 09:49 AM
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
-- Database: `myblog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `disabled` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slug`, `disabled`) VALUES
(3, 'Mobile', 'mobile', 0),
(4, 'Accessories', 'accessories', 0),
(5, 'Gadgets', 'gadgets', 0),
(6, 'Electronics', 'electronics', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `content`, `image`, `date`, `slug`) VALUES
(5, 1, 6, 'Boatik Kids Digital Camera', 'Boatik Kids Digital Camera\r\nBoatik Kids Digital Camera equipped with auto Focus, 8.0 Mega pixels and 1080P Video. Greatly improved the definition of photos. Catch the wonderful joy moment for boys or girls. With Big head sticker shooting, children can take photos with frames, leave some hilarious photos with family or friends.\r\nThis camera is used high quality non-toxic soft plastic, safer and more comfortable for children’s skin. Shockproof shell provides effective anti-fall protection.\r\nKey Features:\r\nPhoto Sensor Technology	MOS\r\nSupported File Format	JPEG,MP4\r\nOptical Zoom	4 x\r\nBrand	Boatik\r\nModel Name	Kids Digital Camera\r\nPhoto Sensor Size	1/2-inch\r\nExposure Control Type	Automatic\r\nForm Factor	Compact\r\nEffective Still Resolution	13 MP\r\nColour	Green colour\r\nLink: https://amzn.to/4eonvgr \r\n', 'uploads/1721493174Boatik Kids Digital Camera.jpg', '2024-07-20 21:09:42', 'dxfcgvhb'),
(6, 1, 6, 'Karaoke Machine for Kids Adults', 'Karaoke Machine for Kids Adults\r\nMini Karaoke Machine is a powerful and crystal-clear audio with our mini karaoke machine. Equipped with dual speakers, it delivers deep bass and crisp treble, creating a captivating three-dimensional effect. Plus, the built-in LED light enhances the singing atmosphere.\r\nYou can enjoy this mini karaoke with friends using the 1 included wireless microphone. The device features a sensitive radio that ensures great sound quality no matter how you sing. Have fun with five different voice modes, including Original, Female, Male, Baby, and Monster voices. Easily adjust the echo effect by double-clicking the microphone volume button.\r\nKey Features:\r\nBrand	Wembley\r\nColour	Multicolor\r\nIncluded Components	1 Wireless Mic\r\nPower Source	Battery Powered\r\nSpeaker Count	1\r\nLink: https://amzn.to/45oviXK\r\n', 'uploads/1721490585Karaoke Machine for Kids Adults.jpg', '2024-07-20 21:19:45', 'my-second-post'),
(7, 1, 5, 'Wooden Sling Puck Board Game for Kids, Adults and Families', 'Wooden Sling Puck Board Game for Kids, Adults and Families\r\nPortable design string hockey board game is a new toy design that requires no stick, ice, or air. It\'s a great way for kids to get involved in a strategic game of table hockey, but on a table. With two sets of boards, this portable fast sling puck game can be taken anytime!\r\nThis is an exciting string hockey game for children that will help them learn and absorb basic information skills quickly, help them develop their creativity and imagination, and promote their thinking and reasoning abilities. This toy will improve children\'s hand-eye coordination, enhance fine motor skills, and expand children\'s attention. It will also promote children to respond to the world around them.\r\nKey Features:\r\nBrand	Clapjoy\r\nColour	Multicolor\r\nMaterial	Wood\r\nProduct Dimensions	59L x 31W x 4H Centimeters\r\n', 'uploads/1721490622Wooden Sling Puck Board Game for Kids, Adults and Families.jpg', '2024-07-20 21:20:22', 'why-are-you-here'),
(8, 1, 3, 'Zoro Tshrirt', '<p>i want to write blog and earn money</p><p><br></p><p>okay buy now<br></p><p><br></p><p><br></p><p> <br></p><p><br></p><p><br></p><p><br></p><p>&nbsp;<br><br></p>', 'uploads/1721540198set-isolated-white-t-shirts.png', '2024-07-21 11:06:38', 'zoro-tshrirt'),
(9, 1, 4, 'qwtdujythafew', '<p>Aewghwjhjareweettdnrgefw<br></p>', 'uploads/1721545544Firefly cartoon watermelon with arms and legs 57456.jpg', '2024-07-21 12:35:44', 'qwtdujythafew'),
(10, 1, 6, 'qERAHTS', '<p>WERAJTHQBFD<br></p>', 'uploads/1721545556Firefly cartoon pineapple with arms and legs 13877.jpg', '2024-07-21 12:35:56', 'qerahts'),
(11, 1, 3, 'AE5SDTYYQDC', '<p>2AWEST<br></p>', 'uploads/1721545572Firefly cartoon orange with arms and legs 57456.jpg', '2024-07-21 12:36:12', 'ae5sdtyyqdc');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `date`, `role`) VALUES
(1, 'Nerswn', 'blynerswn1@gmail.com', '$2y$10$vcg/cFtrgqbBh3itYaRrhOlMQox3o3pfiP.z22CfAVzKRCYe/1UGu', 'uploads/1721486062_pngegg (9).png', '2024-07-19 17:00:54', 'admin'),
(5, 'Puspa', 'narzarypuspanjali109@gmail.com', '$2y$10$c1Km5ZOXXAnSrPZA6TvBGuRZ80mwnUEC9VbzZE/tHUB0BDfvKo.nu', 'uploads/1721536117_pngegg (2).png', '2024-07-21 09:58:26', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `title` (`title`),
  ADD KEY `slug` (`slug`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
