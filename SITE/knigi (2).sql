-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране:  4 септ 2022 в 19:35
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
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `item_rating`
--

INSERT INTO `item_rating` (`ratingId`, `itemId`, `userId`, `ratingNumber`, `title`, `comments`, `created`, `modified`) VALUES
(88, 5, 1, 3, 'h', 't', '2022-06-09 17:06:18', '2022-06-09 17:06:18'),
(89, 5, 1, 4, 't', 'w', '2022-06-14 11:00:29', '2022-06-14 11:00:29');

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
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `knigi`
--

INSERT INTO `knigi` (`id`, `IME`, `AUTHOR`, `TYP`, `GOD`, `IZD`, `STR`, `GENRE`, `TAG`, `url`) VALUES
(1, 'Списъкът', 'Луси Фоли', 'Романи', 2021, 'СофтПРЕС', 320, 'Трилъри', '', 'https://i4.helikon.bg/products/8012/22/228012/7889567_b.jpg'),
(2, 'Проста истина', 'Дейвид Балдачи', 'Романи', 2021, 'СББ Медиа', 392, 'Трилъри', '', 'https://cdn.ozone.bg/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/p/r/52408146f510410b3f8ddebed6af511c/prosta-istina-30.jpg'),
(3, 'Обрат в играта', 'Нийл Шустърман', 'Романи', 2021, 'Orange Books', 416, 'Научна фантастика', '', 'https://www.book.store.bg/lrgimg/314310/obrat-v-igrata.jpg'),
(4, 'Тя винаги се завръща', 'Джонатан Баркър', 'Романи ', 2021, 'Плеяда ', 288, 'Фентъзи ', '', 'https://cdn.ozone.bg/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/t/y/7f7e01b3d60b261deef9fc7ded16a5c6/tya-vinagi-se-zavrashta-30.jpg'),
(5, 'Проектът „Аве Мария“', 'Анди Уеър', 'Романи ', 2021, 'Бард ', 512, 'Научна фантастика ', '', 'https://knijarnicasefer.com/wp-content/uploads/2021/05/viber_image_2021-04-24_16-48-07.jpg'),
(6, 'Невидимият човек', 'Хърбърт Уелс', 'Романи ', 2021, 'Паритет ', 232, 'Научна фантастика ', '', 'https://cdn.ozone.bg/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/n/e/cd8dea5f100fd79e260bb05b3407f1c9/nevidimiyat-chovek-30.jpg'),
(22, 'Последният човек', 'Мери Шели', 'Романи', 2022, 'Изток-Запад', 352, 'Научна фантастика', '', 'https://cdn.ozone.bg/media/catalog/product/cache/1/image/a4e40ebdc3e371adff845072e1c73f37/p/o/5654ba14002a75e384fc24af542f2caf/posledniyat-chovek-e-kniga-30.jpg'),
(23, 'Последният олимпиец', 'Рик Риърдън', 'Романи', 2022, 'Егмонт', 368, 'Фентъзи', '', 'https://cdn.ozone.bg/media/catalog/product/cache/1/image/a4e40ebdc3e371adff845072e1c73f37/p/o/b0bab9d7053d1a855c355db454867d96/posledniyat-olimpiets-parsi-dzhaksan-i-bogovete-na-olimp-5---ilyustrator-vikto-ngay-30.jpg'),
(24, 'Намери я', 'Лиса Гарднър', 'Романи ', 2022, 'СББ Медиа ', 352, 'Трилъри ', 'Майсторите на трилъра ', 'https://cdn.ozone.bg/media/catalog/product/cache/1/image/a4e40ebdc3e371adff845072e1c73f37/n/a/88b048941df91dbaba9a3f94e7769ae8/nameri-ya-30.jpg'),
(25, 'Без страх', 'Лиса Гарднър', 'Романи', 2022, 'СББ Медиа', 352, 'Трилъри', 'Криминални шедьоври', 'https://cdn.ozone.bg/media/catalog/product/cache/1/image/a4e40ebdc3e371adff845072e1c73f37/b/e/70a3986892256ea98589d0a2d6858d57/bez-strah-sbb-media-30.jpg'),
(26, 'Диви жокери', 'Джордж Р. Р. Мартин', 'Романи ', 2021, 'Сиела ', 424, 'Научна фантастика ', 'Жокери (Джордж Р. Р. Мартин) ', 'https://cdn.ozone.bg/media/catalog/product/cache/1/image/a4e40ebdc3e371adff845072e1c73f37/d/i/098359e812bf2a9803b0cb187642fddb/divi-zhokeri-zhokeri-3-30.jpg'),
(27, 'И будителите били хора', 'Валентина Вълчева', 'Биографии', 2022, 'Mama', 144, 'Българска история', 'История', 'https://cdn.ozone.bg/media/catalog/product/cache/1/image/a4e40ebdc3e371adff845072e1c73f37/i/_/ec8a8793916aad509106c6aafd3d52a0/i-buditelite-bili-hora-30.jpg'),
(28, 'Как да оцелееш в България', 'Владимир Иванов', 'Разкази', 2022, 'Сиела', 256, 'Хумористични разкази', '', 'https://cdn.ozone.bg/media/catalog/product/cache/1/image/a4e40ebdc3e371adff845072e1c73f37/k/a/21118d58d524f607d4c1c7cbb8cfffb4/kak-da-otseleesh-v-balgariya-e-kniga-30.jpg');

-- --------------------------------------------------------

--
-- Структура на таблица `request_books`
--

CREATE TABLE `request_books` (
  `id` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `typpe` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `request_books`
--

INSERT INTO `request_books` (`id`, `itemId`, `userId`, `typpe`, `created`) VALUES
(1, 4, 1, 'Заявка за заемане', '2022-06-18 14:29:21'),
(2, 4, 1, 'Заявка за заемане', '2022-06-18 14:29:23'),
(3, 4, 1, 'Заявка за заемане', '2022-06-18 14:30:51'),
(4, 4, 1, 'Заявка за печатане', '2022-06-18 14:30:52'),
(5, 2, 1, 'Заявка за заемане', '2022-06-18 15:12:19'),
(6, 5, 1, 'Заявка за сканиране', '2022-06-20 18:22:39'),
(7, 5, 1, 'Заявка за сканиране', '2022-06-20 18:22:40'),
(8, 5, 1, 'Заявка за сканиране', '2022-06-20 18:22:49'),
(9, 5, 1, 'Заявка за сканиране', '2022-06-20 18:26:50'),
(10, 5, 1, 'Заявка за сканиране', '2022-06-20 18:35:22'),
(11, 5, 1, 'Заявка за сканиране', '2022-06-20 20:03:39'),
(12, 5, 1, 'Заявка за сканиране', '2022-06-20 20:03:54'),
(13, 2, 1, 'Заявка за заемане', '2022-07-24 12:05:34');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `admin` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `admin`) VALUES
(1, 'Георги ', 'Георгиев', 'gogi1014', 'gogi1014@abv.bg', '97e2ac28b1c0771c0db5b28493865180f8214bd2042be5c998796389d556d06a', '1'),
(23, 'Стефан', 'Яворов', 'teretr', 'ggg@abg.bg', '82c699c00d540439a0e7ea7a4ed62217842359011f7a85805dd4bba480722a64', '1'),
(24, 'Пенка', 'Ангелова', 'weawe', 'reewr@abv.bg', 'e702b8024a6fbdc032a67f1dedf13f7dbde9fcb2069780226152f445be1e0f58', ''),
(25, 'Христо', 'Спасов', 'hristo', 'sss@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', NULL),
(26, 'gfgfg', 'rterte', 'sss25', 'dssd@abv.bg', '99834619b3c160248b69c7f42ba868f945a0ea04cd31cf2f60dc4bc8f7d13b8a', NULL),
(27, 'fdsfds', 'dsfsdfs', 'wwwww', 'ggggg@abv.bg', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12', NULL);

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `item_rating`
--
ALTER TABLE `item_rating`
  ADD PRIMARY KEY (`ratingId`),
  ADD KEY `userId` (`userId`);

--
-- Индекси за таблица `knigi`
--
ALTER TABLE `knigi`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `request_books`
--
ALTER TABLE `request_books`
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
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `knigi`
--
ALTER TABLE `knigi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `request_books`
--
ALTER TABLE `request_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `item_rating`
--
ALTER TABLE `item_rating`
  ADD CONSTRAINT `item_rating_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
