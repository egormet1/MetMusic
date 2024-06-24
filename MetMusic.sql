-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 24 2024 г., 13:55
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `MetMusic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int NOT NULL,
  `login` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`account_id`, `login`, `email`, `password`, `role`) VALUES
(1, '123', '123@mail.ru', '123123', '2'),
(3, 'egor1234', 'egor12345@mail.ru', 'egor1234', '1'),
(4, 'EgorHorus', '1222223@mail.ru', '1231231', '1'),
(5, 'egormetelin11', '1232@mail.ru', '123123', '1'),
(6, 'egormetelin123', 'isip_e.d.metelin@mpt.ru', '123111', '1'),
(11, '89998566084', '89998566084@mail.ru', '1111', '1'),
(12, 'egormetelin12', 'egormetelin12@mail.ru', 'egormetelin12', '1'),
(13, '12312312f3gfgfh', '12312312f3gfgfh@mail.ru', '12312312f3gfgfh', '1'),
(14, '1111QWRQW', '11111231231@MAIL.RU', '1111', '1'),
(15, '123', 'lol@mail.ru', '123', NULL),
(16, '123123111', '123123111@mail.ru', '123123111', NULL),
(17, '123123111', '123123111er@mail.ru', '123123111', NULL),
(18, 'lolllllll', 'lolllllll@mail.ru', 'lolllllll', '1'),
(19, 'redhead', 'redhead@mail.ru', 'redhead', '2'),
(22, 'test', 'test@mial.ru', 'test', NULL),
(23, 'egoqw', '123123tgdgfh@mail.ru', '123123123', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `Alboms`
--

CREATE TABLE `Alboms` (
  `alboms_id` int NOT NULL,
  `NameAlbom` varchar(50) NOT NULL,
  `track_id` int NOT NULL,
  `artist_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Alboms`
--

INSERT INTO `Alboms` (`alboms_id`, `NameAlbom`, `track_id`, `artist_id`) VALUES
(2, 'MoneyConver', 11, 1),
(3, 'LongVite', 17, 1),
(4, 'R1tern', 16, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `Artists`
--

CREATE TABLE `Artists` (
  `artist_id` int NOT NULL,
  `NameArtist` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Artists`
--

INSERT INTO `Artists` (`artist_id`, `NameArtist`) VALUES
(1, 'Scally Milano'),
(2, 'ЛСП'),
(3, 'OG Buda'),
(4, 'Ramshtain'),
(5, 'Slipknot');

-- --------------------------------------------------------

--
-- Структура таблицы `Janr`
--

CREATE TABLE `Janr` (
  `janr_id` int NOT NULL,
  `NameJanr` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Janr`
--

INSERT INTO `Janr` (`janr_id`, `NameJanr`) VALUES
(1, 'Рэп'),
(2, 'Классика'),
(3, 'Хип-хоп'),
(4, 'Рок');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `account_id` int NOT NULL,
  `track_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`account_id`, `track_id`) VALUES
(3, 11),
(1, 16),
(5, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `tracks`
--

CREATE TABLE `tracks` (
  `track_id` int NOT NULL,
  `NameTrack` varchar(255) NOT NULL,
  `ArtistTrack` varchar(255) NOT NULL,
  `Song` blob NOT NULL,
  `TimeTrack` varchar(10) NOT NULL,
  `janr_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tracks`
--

INSERT INTO `tracks` (`track_id`, `NameTrack`, `ArtistTrack`, `Song`, `TimeTrack`, `janr_id`) VALUES
(11, 'Не виноват', 'Scally Milano', 0x6d757a2f4e6556696e6f7661742d534d2e6d7033, '1:53', 1),
(15, 'Бандиты', 'OG Buda', 0x6d757a2f64656d6f6e2d534d2e6d7033, '2:12', 1),
(16, 'Axtreee', 'Slipknot', 0x6d757a2f535741472d534d2c3136332e6d7033, '3:14', 4),
(17, 'Котлета', 'Scally Milano', 0x6d757a2f4b6f746c6574612d534d2e6d7033, '2:14', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tracks_count`
--

CREATE TABLE `tracks_count` (
  `count_id` int NOT NULL,
  `track_id` int NOT NULL,
  `play_count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tracks_count`
--

INSERT INTO `tracks_count` (`count_id`, `track_id`, `play_count`) VALUES
(1, 11, 781),
(2, 15, 326),
(3, 16, 18),
(4, 17, 412);

-- --------------------------------------------------------

--
-- Структура таблицы `trackYear`
--

CREATE TABLE `trackYear` (
  `trackYear_id` int NOT NULL,
  `track_id` int NOT NULL,
  `year` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `trackYear`
--

INSERT INTO `trackYear` (`trackYear_id`, `track_id`, `year`) VALUES
(1, 15, 2023),
(2, 11, 2021),
(3, 17, 2019),
(4, 16, 2022);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Индексы таблицы `Alboms`
--
ALTER TABLE `Alboms`
  ADD PRIMARY KEY (`alboms_id`),
  ADD KEY `track_id` (`track_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Индексы таблицы `Artists`
--
ALTER TABLE `Artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Индексы таблицы `Janr`
--
ALTER TABLE `Janr`
  ADD PRIMARY KEY (`janr_id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`account_id`,`track_id`),
  ADD KEY `track_id` (`track_id`);

--
-- Индексы таблицы `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `tracks` (`janr_id`);

--
-- Индексы таблицы `tracks_count`
--
ALTER TABLE `tracks_count`
  ADD PRIMARY KEY (`count_id`),
  ADD KEY `PlayCount` (`track_id`);

--
-- Индексы таблицы `trackYear`
--
ALTER TABLE `trackYear`
  ADD PRIMARY KEY (`trackYear_id`),
  ADD KEY `Av` (`track_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `Alboms`
--
ALTER TABLE `Alboms`
  MODIFY `alboms_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Artists`
--
ALTER TABLE `Artists`
  MODIFY `artist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `Janr`
--
ALTER TABLE `Janr`
  MODIFY `janr_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tracks`
--
ALTER TABLE `tracks`
  MODIFY `track_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `tracks_count`
--
ALTER TABLE `tracks_count`
  MODIFY `count_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `trackYear`
--
ALTER TABLE `trackYear`
  MODIFY `trackYear_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Alboms`
--
ALTER TABLE `Alboms`
  ADD CONSTRAINT `artist_id` FOREIGN KEY (`artist_id`) REFERENCES `Artists` (`artist_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `track_id` FOREIGN KEY (`track_id`) REFERENCES `tracks` (`track_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`track_id`) REFERENCES `tracks` (`track_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks` FOREIGN KEY (`janr_id`) REFERENCES `Janr` (`janr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `tracks_count`
--
ALTER TABLE `tracks_count`
  ADD CONSTRAINT `PlayCount` FOREIGN KEY (`track_id`) REFERENCES `tracks` (`track_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `trackYear`
--
ALTER TABLE `trackYear`
  ADD CONSTRAINT `Av` FOREIGN KEY (`track_id`) REFERENCES `tracks` (`track_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
