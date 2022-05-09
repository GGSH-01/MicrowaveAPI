-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 10 2022 г., 02:10
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `microwave`
--

-- --------------------------------------------------------

--
-- Структура таблицы `microwave_settings`
--

CREATE TABLE `microwave_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'off',
  `program` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'standart',
  `door` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'close',
  `power` int DEFAULT '0',
  `timer` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `microwave_settings`
--

INSERT INTO `microwave_settings` (`id`, `name`, `status`, `program`, `door`, `power`, `timer`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'off', 'meat', 'close', 600, 180, '2022-05-09 11:33:50', '2022-05-09 14:15:12'),
(7, 'LG 303', 'off', NULL, 'closed', 0, 0, '2022-05-09 13:41:13', '2022-05-09 13:41:13'),
(8, 'LG 5005', 'on', NULL, 'closed', 200, 10, '2022-05-09 13:42:37', '2022-05-09 14:16:11');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `microwave_settings`
--
ALTER TABLE `microwave_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `microwave_settings`
--
ALTER TABLE `microwave_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
