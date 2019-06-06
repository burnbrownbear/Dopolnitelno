-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 05 2019 г., 14:32
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id_basket` int(10) NOT NULL,
  `product_menu_basket` varchar(300) NOT NULL,
  `students_name_basket` varchar(300) NOT NULL,
  `number_basket` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id_basket`, `product_menu_basket`, `students_name_basket`, `number_basket`) VALUES
(34, '5', '5', 3),
(35, '6', '5', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `chec`
--

CREATE TABLE `chec` (
  `id_chec` int(10) NOT NULL,
  `text_chec` varchar(300) NOT NULL,
  `number_chec` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(10) NOT NULL,
  `name_menu` varchar(300) NOT NULL,
  `sale_menu` int(10) NOT NULL,
  `opis_menu` varchar(300) NOT NULL,
  `img_menu` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id_menu`, `name_menu`, `sale_menu`, `opis_menu`, `img_menu`) VALUES
(1, 'чай', 2, 'чай: чырный', '2.jpg'),
(2, 'пирожок', 40, 'пирожок с мясо', '1.jpg'),
(3, 'палпи', 50, 'палпи персиковый', '3.jpg'),
(4, 'cосиска в тесте', 30, 'сосиска', '4.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `number_product` int(11) NOT NULL,
  `id_school_product` varchar(11) NOT NULL,
  `id_menu_product` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id_product`, `number_product`, `id_school_product`, `id_menu_product`) VALUES
(3, 10, '14', 'cосиска'),
(4, 2, 'FTL', 'палпи'),
(5, 0, 'FTL', 'пирожок'),
(6, 13, 'FTL', 'чай');

-- --------------------------------------------------------

--
-- Структура таблицы `school`
--

CREATE TABLE `school` (
  `id_school` int(10) NOT NULL,
  `name_school` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `school`
--

INSERT INTO `school` (`id_school`, `name_school`) VALUES
(1, '17'),
(2, '18'),
(3, 'FTL'),
(4, 'RL'),
(5, 'ЯГНГ'),
(6, 'ЯГЛ'),
(7, '14'),
(8, '31');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id_students` int(10) NOT NULL,
  `school_students` varchar(300) NOT NULL,
  `password_students` varchar(300) NOT NULL,
  `login_students` varchar(300) NOT NULL,
  `class_students` int(2) NOT NULL,
  `year_students` year(4) NOT NULL,
  `name_students` varchar(300) NOT NULL,
  `mail_students` varchar(300) NOT NULL,
  `money` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id_students`, `school_students`, `password_students`, `login_students`, `class_students`, `year_students`, `name_students`, `mail_students`, `money`) VALUES
(1, '1', '1', '1', 1, 0000, '1', '1@gmail.com', 56),
(2, '2', '2', '2', 2, 0000, '2', '2@gmail.com', 112),
(3, '17', '123', 'basad', 10, 0000, 'Ханин Виктор', 'khanvi23ghg@gmail.com', 204),
(4, '17', '10062010', '10062010', 9, 0000, 'Бурнашев Кирилл Федорович', 'burnashiev17@gmail.ru', 340),
(5, '17', '123', 'Bur', 9, 0000, 'Бурнашев Кирилл Федорович', 'burnashiev17@gmail.ru', 568);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_basket`);

--
-- Индексы таблицы `chec`
--
ALTER TABLE `chec`
  ADD PRIMARY KEY (`id_chec`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Индексы таблицы `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id_school`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_students`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id_basket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `chec`
--
ALTER TABLE `chec`
  MODIFY `id_chec` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `school`
--
ALTER TABLE `school`
  MODIFY `id_school` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id_students` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
