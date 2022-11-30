-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 04:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `title`, `img`, `category_id`, `user_id`, `content`, `timestamp`) VALUES
(1, 'Title', 'logo2.jpg', 7, NULL, '<div>uasvdha basgycbagudsahjksdadadada</div>', '2022-11-25 18:35:25'),
(9, 'Cara membuat Paguyuban', '/GitHub/Blog-Web-Assignment/img/article/menu2.jpeg', 6, 17, '<ol><li>Menyiapkan sajian yang nikmat</li><li>mengundang orang</li></ol>', '2022-11-28 05:18:25'),
(10, 'How to be an ironman', '/GitHub/Blog-Web-Assignment/img/article/download.jpeg', 4, 4, '<ol><li>Belajar untuk menulis</li><li>Belajar untuk membaca</li><li>Mempelajari teknologi</li><li>Milikilah tekad yang kuat</li><li>Jangan menyerah</li><li>Harus diculik terlebih dahulu di timur tengah</li><li>BUat sebuah mesin ditengah-tengah penculikan yang ada</li><li>Nanti saat jamntung anda terasa rusak, buatlah jantung buatan untuk membantu kinerja jantung anda</li><li>buatlah kostum yang baik dan benar</li><li>jadilah ironman</li></ol>', '2022-11-29 04:45:37'),
(11, 'Jakarta Keras', NULL, 7, 4, '<div>asdbasbsajdhasjkadksaadsasda</div>', '2022-11-29 08:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Social Media'),
(2, 'Games'),
(3, 'Health'),
(4, 'Technology'),
(5, 'Music'),
(6, 'Economy'),
(7, 'Uncategorized');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(13) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `isAdmin`) VALUES
(-1895082438, 'userhh', 'test@gamc.co', '$2y$10$MIrYB4o2NvG4H5wfn4JRSeEtQETiSv7PIS29KBZ0sEUtxu8D9fZS6', 0),
(-1754684920, 'asduk', 'asduk@go.co', '$2y$10$g3CZme3Vq.K3LMhsB42Ieu/owk5Ju6KPMU6HmfKX/AE/jA57vhB5K', 0),
(-393713445, 'uasa123', 'uck12@gam.co', '$2y$10$SQDSidVa52gbsZPBsbVQhOw342YLtCbeiRH/40zb2Te2HTwn4oMMy', 0),
(-223848381, 'emailbaru', 'emailbaru@go.id', '$2y$10$Ctk0y3H7d9qRqnofOY3ydOKb/kuRfBX.AgdB72CHY6czs3XwptQzC', 0),
(4, 'admin123', 'admin@polteksuhat.com', '$2y$10$8XKoWrfleezsN7YKHI11Je2Acu0IVN5F8samsK4NqFeFzlxMRk9eq', 1),
(17, 'caklukman', 'caklukman@usman.com', '$2y$10$AqQTvVDt7C.1Y82jdx6GbeWUvXadhH2/fUrf4zRmBS1Mgi1CZoETi', 0),
(6385, 'userbaru123', 'userbaru123@email.co', '$2y$10$NFQwwHiv9Aa8AdkGZUEojeH2LmX5KZEGBRFh2WO6XYusWaMmBMiR.', 0),
(1669722, 'testering123', 'testing78@emial.co', '$2y$10$wS2s9qXekG4p4Z0S5S./gOffqu231nfurXzfbLThTUtTSguEFLkTm', 0),
(2147483647, 'userbaru', 'userbaru@gakadnsja.co', '$2y$10$f1ML7Oi6NnYEHxjnnPz/HOqc1rIw1cGmGkViDewxY6uwZwmf2urYG', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
