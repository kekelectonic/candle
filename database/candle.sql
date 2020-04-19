-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 19 2020 г., 14:22
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
  `id_name_candle` int(11) NOT NULL,
  `id_color_candle` int(11) NOT NULL,
  `id_smell_candle` int(11) NOT NULL,
  `id_size_candle` int(11) NOT NULL,
  `id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `candles`
--

INSERT INTO `candles` (`id_candle`, `id_name_candle`, `id_color_candle`, `id_smell_candle`, `id_size_candle`, `id_image`) VALUES
(1, 2, 6, 1, 2, 2),
(2, 3, 3, 2, 2, 3),
(3, 4, 1, 3, 2, 4),
(4, 5, 7, 4, 2, 5),
(5, 6, 1, 5, 2, 6),
(6, 7, 6, 6, 2, 7),
(7, 1, 3, 1, 1, 1),
(8, 1, 1, 1, 2, 1),
(9, 1, 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `candle_color`
--

CREATE TABLE `candle_color` (
  `id_color_candle` int(11) NOT NULL,
  `name_color` varchar(30) NOT NULL,
  `eng_color` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `candle_color`
--

INSERT INTO `candle_color` (`id_color_candle`, `name_color`, `eng_color`) VALUES
(1, 'Красный', 'red'),
(2, 'Оранжевый', 'orange'),
(3, 'Желтый', 'yellow'),
(4, 'Зеленый', 'green'),
(5, 'Голубой', 'blue'),
(6, 'Синий', 'darkblue'),
(7, 'Фиолетовый', 'purple');

-- --------------------------------------------------------

--
-- Структура таблицы `candle_image`
--

CREATE TABLE `candle_image` (
  `id_image` int(11) NOT NULL,
  `url_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `candle_image`
--

INSERT INTO `candle_image` (`id_image`, `url_image`) VALUES
(1, '../img/1.jpg'),
(2, '../img/2.jpg'),
(3, '../img/3.jpg'),
(4, '../img/4.jpg'),
(5, '../img/5.jpg'),
(6, '../img/6.jpg'),
(7, '../img/7.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `candle_name`
--

CREATE TABLE `candle_name` (
  `id_name_candle` int(11) NOT NULL,
  `name_candle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `candle_name`
--

INSERT INTO `candle_name` (`id_name_candle`, `name_candle`) VALUES
(1, 'Пользовательская свеча'),
(2, 'Заснеженная ель'),
(3, 'Морозный пряник'),
(4, 'Сверкающая звезда'),
(5, 'Рассвет в горах'),
(6, 'Кленовый чай'),
(7, 'Уютное шале');

-- --------------------------------------------------------

--
-- Структура таблицы `candle_size_price`
--

CREATE TABLE `candle_size_price` (
  `id_size_price` int(11) NOT NULL,
  `size_candle` varchar(30) NOT NULL,
  `price_size` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `candle_size_price`
--

INSERT INTO `candle_size_price` (`id_size_price`, `size_candle`, `price_size`) VALUES
(1, 'маленькая', 200),
(2, 'средняя', 500),
(3, 'большая', 700);

-- --------------------------------------------------------

--
-- Структура таблицы `candle_smell`
--

CREATE TABLE `candle_smell` (
  `id_smell_candle` int(11) NOT NULL,
  `name_smell` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `candle_smell`
--

INSERT INTO `candle_smell` (`id_smell_candle`, `name_smell`) VALUES
(1, 'Ель, Черная смородина'),
(2, 'Корица, Имбирный пряник'),
(3, 'Пачули, Амбра, Сандал'),
(4, 'Бальзамин, Ваниль, Сосна'),
(5, 'Корица, Гвоздика, Кардамон'),
(6, 'Ветивер, Пачули, Амбра');

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
  `id_order_user` int(11) NOT NULL,
  `status_order` varchar(30) NOT NULL,
  `cost_order` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(4, 'admin', '$2y$10$QgS7i9wLEmDCgNcsgqG4/ez/9AU5AkebNUNC3kPOrrn94uAylz1gq', 'Баженов Евгений Батькович', '88005553535', 'Нижнее Бутово', 69),
(5, 'lil', '$2y$10$AapB4yjtpHt/jZxtafQ3MurfW56If04HVhIHH9/AZM.K2QX1t2/De', 'lilpeep', 'lil', 'Нижнее Бутово', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `candles`
--
ALTER TABLE `candles`
  ADD PRIMARY KEY (`id_candle`),
  ADD KEY `id_name_candle` (`id_name_candle`),
  ADD KEY `id_color_candle` (`id_color_candle`),
  ADD KEY `id_smell_candle` (`id_smell_candle`),
  ADD KEY `id_size_candle` (`id_size_candle`),
  ADD KEY `id_image` (`id_image`);

--
-- Индексы таблицы `candle_color`
--
ALTER TABLE `candle_color`
  ADD PRIMARY KEY (`id_color_candle`);

--
-- Индексы таблицы `candle_image`
--
ALTER TABLE `candle_image`
  ADD PRIMARY KEY (`id_image`);

--
-- Индексы таблицы `candle_name`
--
ALTER TABLE `candle_name`
  ADD PRIMARY KEY (`id_name_candle`);

--
-- Индексы таблицы `candle_size_price`
--
ALTER TABLE `candle_size_price`
  ADD PRIMARY KEY (`id_size_price`);

--
-- Индексы таблицы `candle_smell`
--
ALTER TABLE `candle_smell`
  ADD PRIMARY KEY (`id_smell_candle`);

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
  MODIFY `id_candle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `candle_color`
--
ALTER TABLE `candle_color`
  MODIFY `id_color_candle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `candle_image`
--
ALTER TABLE `candle_image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `candle_name`
--
ALTER TABLE `candle_name`
  MODIFY `id_name_candle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `candle_size_price`
--
ALTER TABLE `candle_size_price`
  MODIFY `id_size_price` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `candle_smell`
--
ALTER TABLE `candle_smell`
  MODIFY `id_smell_candle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `candles`
--
ALTER TABLE `candles`
  ADD CONSTRAINT `candles_ibfk_1` FOREIGN KEY (`id_color_candle`) REFERENCES `candle_color` (`id_color_candle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candles_ibfk_3` FOREIGN KEY (`id_name_candle`) REFERENCES `candle_name` (`id_name_candle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candles_ibfk_4` FOREIGN KEY (`id_size_candle`) REFERENCES `candle_size_price` (`id_size_price`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candles_ibfk_5` FOREIGN KEY (`id_smell_candle`) REFERENCES `candle_smell` (`id_smell_candle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candles_ibfk_6` FOREIGN KEY (`id_image`) REFERENCES `candle_image` (`id_image`) ON DELETE CASCADE ON UPDATE CASCADE;

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
