-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 31 2021 г., 10:09
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
  `code` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Группа стран',
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Страна'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'ЕАЭС', 'Россия'),
(2, 'ЕАЭС', 'Армения'),
(3, 'ЕС', 'Польша'),
(4, 'СНГ', 'Молдова'),
(5, 'EAЭС', 'Казахстан');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL COMMENT '№',
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Покупатель'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `name`) VALUES
(1, 'АО \"Тандер\"'),
(2, 'OOO \"Элемент\"'),
(3, 'ООО \"Лидер\"'),
(4, 'ТОО \"Казанский\"'),
(5, 'ООО \"Ритм\"'),
(6, 'OOO \"Квадрат\"');

-- --------------------------------------------------------

--
-- Структура таблицы `produkt`
--

CREATE TABLE `produkt` (
  `id` int NOT NULL COMMENT '№',
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Продукция',
  `code` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Группа продуктов'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `produkt`
--

INSERT INTO `produkt` (`id`, `name`, `code`) VALUES
(1, 'колбасные изделия', 'Мясная продукция'),
(2, 'СОМ', 'Молочная продукция'),
(3, 'Мука', 'Мукомольно-крупяная продукция'),
(4, 'масло животное', 'Молочная продукция'),
(5, 'Говядина', 'Мясная продукция');

-- --------------------------------------------------------

--
-- Структура таблицы `sale`
--

CREATE TABLE `sale` (
  `id` int NOT NULL COMMENT '№',
  `data` date NOT NULL COMMENT 'Дата',
  `users_id` int NOT NULL COMMENT 'Предприятие-изготовитель',
  `customers_id` int NOT NULL COMMENT 'Покупатель',
  `countries_id` int NOT NULL COMMENT 'Страна',
  `produkt_id1` int NOT NULL COMMENT 'Продукция',
  `weight` float NOT NULL COMMENT 'Вес, тонн',
  `cost` float NOT NULL COMMENT 'Стоимость, тыс.долл.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sale`
--

INSERT INTO `sale` (`id`, `data`, `users_id`, `customers_id`, `countries_id`, `produkt_id1`, `weight`, `cost`) VALUES
(1, '2021-08-20', 2, 1, 1, 4, 10, 150),
(2, '2021-08-18', 2, 1, 1, 1, 10, 150),
(3, '2021-06-10', 2, 1, 1, 2, 10, 150),
(5, '2021-05-20', 3, 2, 3, 3, 20, 500),
(6, '2020-02-20', 2, 2, 4, 2, 50, 600),
(7, '2021-11-16', 3, 2, 2, 3, 20, 600),
(8, '2021-08-13', 3, 2, 3, 2, 20, 600),
(9, '2021-08-05', 3, 2, 2, 2, 10, 300),
(10, '2021-08-12', 3, 4, 5, 3, 20, 300),
(11, '2021-08-10', 4, 2, 2, 1, 10, 150),
(12, '2021-08-03', 4, 4, 5, 1, 10, 100),
(13, '2021-08-10', 2, 2, 2, 1, 50, 1000),
(14, '2021-08-17', 2, 1, 1, 1, 50, 150),
(15, '2020-08-03', 2, 2, 2, 4, 50, 250),
(16, '2021-05-01', 4, 5, 5, 5, 20, 100),
(17, '2021-05-01', 2, 4, 5, 4, 50, 250),
(18, '2021-06-19', 3, 2, 1, 3, 50, 15),
(19, '2021-05-10', 2, 1, 1, 4, 50, 250),
(20, '2021-08-26', 7, 4, 5, 4, 50, 250),
(21, '2020-05-04', 7, 2, 2, 2, 20, 50),
(22, '2021-05-06', 7, 3, 4, 4, 20, 100);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL COMMENT '№',
  `login` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'Логин',
  `pass` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Пароль',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Предприятие-поставщик',
  `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `users_id`) VALUES
(2, 'moloko', '84b489710748279e3c895a3b3b61f8f1', 'ОАО \"Молоко\"', 2),
(3, 'polotsk', '0ce4e25ac5c21a68931d5671666c8734', 'ОАО \"Полоцкий комбинат хлебопродуктов\"', 2),
(4, 'vitebsk', '95e566ba6dab108957cf298f4cdd1b5a', 'ОАО \"Витебский мясокомбинат\"', 2),
(5, 'lepel', '9c5120b0709d19ed6bc1df0c0b0fe745', 'Филиал \"Лепельский молочноконсервный комбинат\"', 2),
(6, 'adminA', 'df10c473250d40907c819584c28e456c', 'adminA', 1),
(7, 'vmsz', 'db2e876b4e5f1da4adbf729af2bd6fdb', 'ОАО \"Верхнедвинский маслосырзавод\"', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int NOT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Наименование группы',
  `code` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Код группы'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `code`) VALUES
(1, 'Администратор', 'admin'),
(2, 'Пользователь', 'user'),
(3, 'Гость', 'guest');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
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
  ADD KEY `fk_sale_countries1_idx` (`countries_id`),
  ADD KEY `fk_sale_customers1_idx` (`customers_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_usergroup1_idx` (`users_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `produkt`
--
ALTER TABLE `produkt`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `fk_sale_customers1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `fk_sale_produkt2` FOREIGN KEY (`produkt_id1`) REFERENCES `produkt` (`id`),
  ADD CONSTRAINT `fk_sale_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_usergroup1` FOREIGN KEY (`users_id`) REFERENCES `user_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
