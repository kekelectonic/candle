-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 16 2020 г., 19:58
-- Версия сервера: 5.7.19-log
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `candle`
--

-- --------------------------------------------------------

--
-- Структура таблицы `candles`
--

CREATE TABLE `candles` (
  `id_candle` int(11) NOT NULL,
  `name_candle` varchar(20) NOT NULL,
  `color_candle` varchar(30) NOT NULL,
  `form_candle` varchar(30) NOT NULL,
  `smell_candle` varchar(30) NOT NULL,
  `size_candle` varchar(30) NOT NULL,
  `price_candle` int(5) NOT NULL,
  `img_candle` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `candles`
--

INSERT INTO `candles` (`id_candle`, `name_candle`, `color_candle`, `form_candle`, `smell_candle`, `size_candle`, `price_candle`, `img_candle`) VALUES
(1, 'Лаванда Ф', 'фиолетовый', 'цилиндр', 'лаванда', 'маленький', 150, '../img/cart.png'),
(2, 'Помойка К', 'красный', 'динамит', 'помойка', 'средний', 600, '../img/cart.png'),
(3, 'Лимон ж', 'желтый', 'круглый', 'лимон', 'большой', 1000, '');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id_orders` int(11) NOT NULL,
  `id_candle` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_order_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id_orders`, `id_candle`, `quantity`, `id_user`, `date`, `id_order_user`) VALUES
(1, 1, 5, 4, '2020-04-16 18:42:08', 17),
(2, 2, 4, 4, '2020-04-16 18:42:48', 17),
(3, 3, 3, 4, '2020-04-16 18:42:51', 17);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `session_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `fio`, `phone`, `address`, `session_order`) VALUES
(3, 'maphioznik', '$2y$10$3PBjoljevQULsppVaxG1qejKG3YLx7Der9caIjMqZdMvg4zHf2h3W', 'Зубенко Михаил Петрович', '88005553535', 'Шумиловский городок', 2),
(4, 'admin', '$2y$10$QgS7i9wLEmDCgNcsgqG4/ez/9AU5AkebNUNC3kPOrrn94uAylz1gq', 'Баженов Евгений Батькович', '88005553535', 'Нижнее Бутово', 17);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `candles`
--
ALTER TABLE `candles`
  ADD PRIMARY KEY (`id_candle`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `id_candle` (`id_candle`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_order_user` (`id_order_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `candles`
--
ALTER TABLE `candles`
  MODIFY `id_candle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_candle`) REFERENCES `candles` (`id_candle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
