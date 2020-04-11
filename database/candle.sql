-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 11 2020 г., 19:46
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
  `color_candle` varchar(30) NOT NULL,
  `form_candle` varchar(30) NOT NULL,
  `smell_candle` varchar(30) NOT NULL,
  `size_candle` varchar(30) NOT NULL,
  `price_candle` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `candles`
--

INSERT INTO `candles` (`id_candle`, `color_candle`, `form_candle`, `smell_candle`, `size_candle`, `price_candle`) VALUES
(1, 'фиолетовый', 'цилиндр', 'лаванда', 'маленький', 150),
(2, 'красный', 'динамит', 'помойка', 'средний', 600),
(3, 'желтый', 'круглый', 'лимон', 'большой', 1000);

-- --------------------------------------------------------

--
-- Структура таблицы `candle_order`
--

CREATE TABLE `candle_order` (
  `id_candle` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `cost_candle` int(5) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `candle_order`
--

INSERT INTO `candle_order` (`id_candle`, `quantity`, `cost_candle`, `id_order`, `id_user`, `date`) VALUES
(1, 2, 300, 1, 1, '2020-04-11 00:00:00'),
(2, 3, 1200, 2, 1, '2020-04-11 00:00:00'),
(3, 3, 3000, 3, 2, '2020-04-11 16:16:11'),
(3, 1, 20, 4, 1, '2020-04-11 16:16:11');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `fio`, `phone`, `address`) VALUES
(1, 'dwdwdw', 'dwdwd', 'dwdwd', 'dwdw', 'dwd'),
(2, 'mik@mail.ru', 'daddy)))', 'zbp', '88005553535', 'Мой адрес не дом и не улица, мой адрес - бахча');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `candles`
--
ALTER TABLE `candles`
  ADD PRIMARY KEY (`id_candle`);

--
-- Индексы таблицы `candle_order`
--
ALTER TABLE `candle_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_candle` (`id_candle`),
  ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT для таблицы `candle_order`
--
ALTER TABLE `candle_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `candle_order`
--
ALTER TABLE `candle_order`
  ADD CONSTRAINT `candle_order_ibfk_1` FOREIGN KEY (`id_candle`) REFERENCES `candles` (`id_candle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candle_order_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
