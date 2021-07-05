-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 05 2021 г., 15:36
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5


SET SQL_MODE = "";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `booking`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `title` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Одноместный '),
(2, ' Двуместный '),
(3, 'Люкс'),
(4, 'Де-Люкc');

-- --------------------------------------------------------

--
-- Структура таблицы `leads`
--

CREATE TABLE `leads` (
  `id` int NOT NULL,
  `room_id` int NOT NULL,
  `date_in` datetime NOT NULL,
  `date_out` datetime NOT NULL,
  `user_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `leads`
--

INSERT INTO `leads` (`id`, `room_id`, `date_in`, `date_out`, `user_name`, `email`) VALUES
(1, 1, '2021-07-05 15:19:47', '2021-07-05 15:23:00', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(2, 2, '2021-07-05 15:20:11', '2021-07-06 15:20:11', 'ЕУФАВЫФА', 'JordanPeterson@gmail.com'),
(3, 3, '2021-07-05 15:20:32', '2021-07-05 15:20:32', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(4, 4, '2021-07-05 15:20:52', '2021-07-05 15:33:52', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(5, 5, '2021-07-05 15:21:09', '2021-07-05 15:33:52', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(6, 11, '2021-07-05 15:21:29', '2021-07-05 15:20:32', 'Jordan Peterson', 'TEST@gmail.com'),
(7, 6, '2021-07-05 15:21:49', '2021-07-05 15:33:52', 'XCZVXCVZXCV', 'JordanPeterson@gmail.com'),
(8, 12, '2021-07-05 15:22:08', '2021-07-05 15:33:52', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(9, 13, '2021-07-05 15:22:28', '2021-07-05 15:33:52', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(10, 14, '2021-07-05 15:22:47', '2021-07-05 15:20:32', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(11, 1, '2021-07-05 15:23:27', '2021-07-05 15:33:52', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(12, 7, '2021-07-05 15:23:54', '2021-07-05 15:33:52', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(13, 8, '2021-07-05 15:24:11', '2021-07-05 15:33:52', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(14, 9, '2021-07-05 15:24:28', '2021-07-05 15:20:32', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(15, 10, '2021-07-05 15:24:47', '2021-07-05 15:25:00', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(16, 14, '2021-07-05 15:26:49', '2021-07-05 15:33:52', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(17, 14, '2021-07-05 15:26:49', '2021-07-05 15:33:52', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(18, 3, '2021-07-05 15:27:13', '2021-07-05 15:33:52', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(19, 9, '2021-07-05 15:27:31', '2021-07-05 15:20:32', 'Jordan Peterson', 'JordanPeterson@gmail.com'),
(20, 1, '2021-07-05 16:27:56', '2021-07-05 17:27:56', 'Jordan Peterson', 'JordanPeterson@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1625201952),
('m130524_201442_init', 1625201955),
('m190124_110200_add_verification_token_column_to_user_table', 1625201955);

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 3),
(4, 3),
(5, 3),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(11, 2),
(12, 2),
(13, 2),
(14, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reserve_id` int NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
