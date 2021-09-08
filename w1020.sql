-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 03 2021 г., 20:14
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `w1020`
--
CREATE DATABASE IF NOT EXISTS `w1020` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `w1020`;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
                            `id` int NOT NULL COMMENT '№',
                            `text` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Комментарий',
                            `news_id` int NOT NULL,
                            `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `news_id`, `users_id`) VALUES
(1, 'лоашгршнпануапшуцнпаунцшпашныиашнауншан', 24, 18),
(2, '12121212121цвцвц\r\nцуацуауауауауау', 24, 18),
(3, 'hgj', 24, 18),
(4, 'add comment', 24, 20),
(5, 'add', 25, 20),
(6, 'news', 25, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
                        `id` int NOT NULL,
                        `caption` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Заголовок',
                        `text` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Новости',
                        `picture` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Имя файла'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `caption`, `text`, `picture`) VALUES
(24, 'Bentley Continental GT II Рестайлинг Concours Series', 'Отличное состояние автомобиля! Продает второй владелец. Оригинальное ЛКП. Лицевая часть автомобиля вся в бронепленке с момента покупки! Всегда своеврменное обслуживание. Под капотом Bentley Continental GT находится V-образный 8-цилиндровый двигатель с двумя турбонагнетателями мощностью 507 л.с. Специальное исполнение \"Concours Series\" обладает уникальным сочетанием изысканных элементов отделки, таких как эффектная контрастная прострочка, вышивка на комфортных подголовниках и металлические накладки на пороги с эмблемой Concours Series. Только гаражное хранение. Возможен осмотр на любом Вашем СТО. Примем Ваш автомобиль в зачет.', 'e41467edaad1ea58064c7b78fd2b6e13.jpeg'),
(25, 'На что сейчас снижена цена в Каталоге? Свежая подборка скидок', 'Продолжаем добрую традицию с подборками скидок. Просмотрели страницу всех суперцен и отобрали для вас самые лучшие предложения, которые сейчас выгодно купить в Каталоге. Получилось много полезных товаров для дома, новые наушники Redmi AirDots и популярные микрофоны HyperX.\r\nЕсли вдруг вы видите полотно из картинок, то отключите, пожалуйста, ваш блокировщик рекламы. За ним прячутся ссылки на товар в Каталоге с актуальной ценой и описанием.', '70641421d5446695bb4ea396d560c31c.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
                         `id` int NOT NULL COMMENT '№',
                         `login` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Логин',
                         `pass` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Пароль',
                         `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Имя',
                         `user_groups_id` int NOT NULL COMMENT 'Группа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `user_groups_id`) VALUES
(17, 'admin', '3c2b7b63bc7531b7bb544f33e4deba6e', 'Иван Иванович', 1),
(18, 'user', '50721e8a26c9ecb89fc8e62754869158', 'Максим Петрович', 2),
(20, 'user2', '7de7c0e0f80506e1a3943a343bdcee6d', 'USER', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_groups`
--

CREATE TABLE `user_groups` (
                               `id` int NOT NULL,
                               `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Название',
                               `code` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Группа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

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
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_news1_idx` (`news_id`),
  ADD KEY `fk_comments_users1_idx` (`users_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `fk_users_user_groups_idx` (`user_groups_id`);

--
-- Индексы таблицы `user_groups`
--
ALTER TABLE `user_groups`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
    MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
    MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `user_groups`
--
ALTER TABLE `user_groups`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
    ADD CONSTRAINT `fk_comments_news1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `fk_comments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
    ADD CONSTRAINT `fk_users_user_groups` FOREIGN KEY (`user_groups_id`) REFERENCES `user_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
