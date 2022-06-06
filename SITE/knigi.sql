-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране:  1 юни 2022 в 08:35
-- Версия на сървъра: 10.4.21-MariaDB
-- Версия на PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `knigi`
--

-- --------------------------------------------------------

--
-- Структура на таблица `item_rating`
--

CREATE TABLE `item_rating` (
  `ratingId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ratingNumber` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `item_rating`
--

INSERT INTO `item_rating` (`ratingId`, `itemId`, `userId`, `ratingNumber`, `title`, `comments`, `created`, `modified`, `status`) VALUES
(57, 5, 1, 1, 'gfd', 'dfg', '2022-05-28 15:10:36', '2022-05-28 15:10:36', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `knigi`
--

CREATE TABLE `knigi` (
  `id` int(10) UNSIGNED NOT NULL,
  `IME` varchar(40) NOT NULL,
  `AUTHOR` varchar(60) NOT NULL,
  `TYP` varchar(20) NOT NULL,
  `GOD` int(11) NOT NULL,
  `IZD` varchar(40) NOT NULL,
  `STR` int(11) NOT NULL,
  `GENRE` varchar(20) NOT NULL,
  `TAG` varchar(40) NOT NULL,
  `url` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `knigi`
--

INSERT INTO `knigi` (`id`, `IME`, `AUTHOR`, `TYP`, `GOD`, `IZD`, `STR`, `GENRE`, `TAG`, `url`, `user_id`, `book_id`, `rating`) VALUES
(1, 'Списъкът', 'Луси Фоли', 'Романи', 2021, 'СофтПРЕС', 320, 'Трилъри', '', 'https://i4.helikon.bg/products/8012/22/228012/7889567_b.jpg', 0, 0, 0),
(2, 'Проста истина', 'Дейвид Балдачи', 'Романи', 2021, 'СББ Медиа', 392, 'Трилъри', '', 'https://cdn.ozone.bg/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/p/r/52408146f510410b3f8ddebed6af511c/prosta-istina-30.jpg', 0, 0, 0),
(3, 'Обрат в играта', 'Нийл Шустърман', 'Романи', 2021, 'Orange Books', 416, 'Научна фантастика', '', 'https://www.book.store.bg/lrgimg/314310/obrat-v-igrata.jpg', 0, 0, 0),
(4, 'Тя винаги се завръща', 'Джонатан Баркър', 'Романи ', 2021, 'Плеяда ', 288, 'Трилъри  Фентъзи ', '', 'https://cdn.ozone.bg/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/t/y/7f7e01b3d60b261deef9fc7ded16a5c6/tya-vinagi-se-zavrashta-30.jpg', 0, 0, 0),
(5, 'Проектът „Аве Мария“', 'Анди Уеър', 'Романи ', 2021, 'Бард ', 512, 'Научна фантастика ', '', 'https://knijarnicasefer.com/wp-content/uploads/2021/05/viber_image_2021-04-24_16-48-07.jpg', 0, 0, 0),
(6, 'Невидимият човек', 'Хърбърт Уелс', 'Романи ', 2021, 'Паритет ', 232, 'Научна фантастика ', '', 'https://cdn.ozone.bg/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/n/e/cd8dea5f100fd79e260bb05b3407f1c9/nevidimiyat-chovek-30.jpg', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`) VALUES
(1, 'gogi1014', 'gogi1014@abv.bg', '31821b393b6387c2aa7639f50e6bef1c', '1'),
(23, 'teretr', 'ggg@abg.bg', '31821b393b6387c2aa7639f50e6bef1c', '1'),
(24, 'weawe', 'reewr@abv.bg', '31821b393b6387c2aa7639f50e6bef1c', NULL),
(25, 'hristo', 'sss@gmail.com', '2a5baac4b0db221c986b7309f03a13d7', NULL);

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `item_rating`
--
ALTER TABLE `item_rating`
  ADD PRIMARY KEY (`ratingId`);

--
-- Индекси за таблица `knigi`
--
ALTER TABLE `knigi`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_rating`
--
ALTER TABLE `item_rating`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `knigi`
--
ALTER TABLE `knigi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
