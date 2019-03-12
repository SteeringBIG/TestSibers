-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 12 2019 г., 21:25
-- Версия сервера: 5.7.25
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_sibers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_pass` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` tinytext,
  `birth` date DEFAULT NULL,
  `access` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `user_login`, `user_pass`, `first_name`, `last_name`, `gender`, `birth`, `access`) VALUES
(1, 'admin', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'iOne', 'Bu', 'male', '1945-05-09', 1),
(2, 'User', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(3, 'test_user', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'test', 'user', 'male', '2013-05-05', 0),
(4, 'User1', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(5, 'User2', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(6, 'User3', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(7, 'User4', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(8, 'User5', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(9, 'User7', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(10, 'User6', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(11, 'User8', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(12, 'User9', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(13, 'User10', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(14, 'User11', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(15, 'User12', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(16, 'User13', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(17, 'User14', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(18, 'User15', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(19, 'User16', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(20, 'User17', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0),
(21, 'User18', '95fcc594b3ab6bb8550a435a74f7cfd6b61d959c', 'User 1', '007', 'female', '2000-05-09', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
