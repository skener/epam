-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Трв 01 2019 р., 22:32
-- Версія сервера: 10.1.30-MariaDB
-- Версія PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `books`
--

-- --------------------------------------------------------

--
-- Структура таблиці `books`
--

CREATE TABLE `books` (
                       `id` int(11) NOT NULL,
                       `poster` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
                       `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
                       `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
                       `price` float DEFAULT NULL,
                       `date` datetime(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `books`
--

INSERT INTO `books` (`id`, `poster`, `name`, `author`, `price`, `date`) VALUES
(1, 'https://images-na.ssl-images-amazon.com/images/I/51mk+9J-dbL._AC_US218_.jpg', 'Learning php, mysql & JavaScript', 'Robin Nixon', 30, '2017-08-12 00:00:00.0000'),
(3, 'https://images-na.ssl-images-amazon.com/images/I/41Bgqdnu7kL._AC_US218_.jpg', 'Php for the Web: Visual QuickStart Guide', 'Larry Ullman', 25, '2017-08-11 00:00:00.0000'),
(7, 'https://images-na.ssl-images-amazon.com/images/I/516kv5hpwuL._AC_US218_.jpg', 'Modern PhP: New Features and Good Practices', 'Josh Lockhart', 24, '2017-08-10 00:00:00.0000'),
(9, 'https://images-na.ssl-images-amazon.com/images/I/41kKdIyD06L._AC_US218_.jpg', 'pHp and MySqL for Dynamic Web Sites', 'Larry Ullman', 14.39, '2017-08-05 00:00:00.0000');

-- --------------------------------------------------------

--
-- Структура таблиці `books_tags`
--

CREATE TABLE `books_tags` (
                            `book_id` int(11) NOT NULL,
                            `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `books_tags`
--

INSERT INTO `books_tags` (`book_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(1, 5),
(3, 1),
(7, 1),
(9, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `tags`
--

CREATE TABLE `tags` (
                      `id` int(11) NOT NULL,
                      `title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `tags`
--

INSERT INTO `tags` (`id`, `title`) VALUES
(1, 'php'),
(2, 'javascript'),
(5, 'mysql'),
(6, 'jquery');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `books` ADD FULLTEXT KEY `search` (`name`,`author`);

--
-- Індекси таблиці `books_tags`
--
ALTER TABLE `books_tags`
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `books_tags_ibfk_1` (`book_id`);

--
-- Індекси таблиці `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблиці `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `books_tags`
--
ALTER TABLE `books_tags`
  ADD CONSTRAINT `books_tags_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
