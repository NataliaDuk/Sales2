-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 08 2021 г., 22:09
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sales`
--

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL COMMENT '№',
  `code` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Группа стран',
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Наименование страны'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'ЕАЭС', 'Кыргызстан'),
(2, 'СНГ', 'Азербайджан'),
(3, 'ЕАЭС', 'Армения'),
(4, 'ЕАЭС', 'Казахстан'),
(5, 'СНГ', 'Узбекистан'),
(6, 'ЕС', 'Польша'),
(7, 'ЕС', 'Литва'),
(8, 'ЕС', 'Латвия'),
(9, 'Страны дальнего зарубежья', 'Китай'),
(10, 'Страны дальнего зарубежья', 'Ливия'),
(11, 'Страны дальнего зарубежья', 'Египет'),
(12, 'Страны дальнего зарубежья', 'Сирия');

-- --------------------------------------------------------

--
-- Структура таблицы `produkt`
--

CREATE TABLE `produkt` (
  `id` int NOT NULL COMMENT '№',
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Наименование продукции',
  `code` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Группа продукции'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `produkt`
--

INSERT INTO `produkt` (`id`, `name`, `code`) VALUES
(1, 'Масло', 'Молочная продукция'),
(2, 'Сыры', 'Молочная продукция'),
(3, 'СОМ', 'Молочная продукция'),
(4, 'СЦМ', 'Молочная продукция'),
(5, 'Цельномолочная продукция', 'Молочная продукция'),
(6, 'Колбасные изделия', 'Мясная продукция'),
(7, 'Говядина', 'Мясная продукция'),
(8, 'Говяжьи полуфабрикаты', 'Мясная продукция'),
(9, 'Жир пищевой', 'Мясная продукция'),
(10, 'Мука', 'Мукомольно-крупяная продукция'),
(11, 'Яйца куриные', 'Продукция птицефабрик'),
(12, 'Мясо птицы', 'Продукция птицефабрик'),
(13, 'Отруби', 'Мукомольно-крупяная продукция');

-- --------------------------------------------------------

--
-- Структура таблицы `sale`
--

CREATE TABLE `sale` (
  `id` int NOT NULL COMMENT '№',
  `data` date NOT NULL COMMENT 'Дата отгрузки',
  `customer` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Покупатель',
  `weight` float NOT NULL COMMENT 'Вес, тонн',
  `cost` float NOT NULL COMMENT 'Стоимость, USD',
  `users_id` int NOT NULL COMMENT 'Наименование предприятия',
  `produkt_id1` int NOT NULL COMMENT 'Наименование продукции',
  `countries_id` int NOT NULL COMMENT 'Страна назначения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL COMMENT '№',
  `login` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Логин',
  `pass` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Пароль',
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Имя',
  `user_groups_id` int NOT NULL COMMENT 'Группа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `user_groups_id`) VALUES
(4, 'macha123', 'ce712210e778841ed1ee79a2408a2d08', 'ОАО \"Молоко\"', 2),
(6, 'admin', '3c2b7b63bc7531b7bb544f33e4deba6e', 'Иван Иванович', 1),
(7, 'lena15', 'lena15678', 'ОАО \"Полоцкий молочный комбинат\"', 2),
(8, 'Viktor', 'viktor12345', 'ОАО \"Витебский мясокомбинат\"', 2),
(9, 'Gena', 'gena12345', 'ОАО \"Глубокский мясокомбинат\"', 2),
(10, 'Yra123', 'yra12345', 'ОАО \"Витебский комбинат хлебопродуктов\"', 2),
(11, 'Gera', 'Gera12345', 'ОАО \"Городокская тицефабрика\"', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Название',
  `code` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Группа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `code`) VALUES
(1, 'Администратор', 'admin'),
(2, 'Пользователь', 'user'),
(3, 'Гости', 'guest');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sale_users1_idx` (`users_id`),
  ADD KEY `fk_sale_produkt2_idx` (`produkt_id1`),
  ADD KEY `fk_sale_countries1_idx` (`countries_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_usergroup1_idx` (`user_groups_id`);

--
-- Индексы таблицы `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `produkt`
--
ALTER TABLE `produkt`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№';

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `fk_sale_countries1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `fk_sale_produkt2` FOREIGN KEY (`produkt_id1`) REFERENCES `produkt` (`id`),
  ADD CONSTRAINT `fk_sale_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_usergroup1` FOREIGN KEY (`user_groups_id`) REFERENCES `user_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
