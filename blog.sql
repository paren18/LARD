-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 27 2024 г., 21:33
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `author`, `text`) VALUES
(1, 'Title1', 'Author1', 'Вид текста на экране зависит только от тегов, он не зависит от пробелов и разбивки на строки. Все элементы оформления HTML-документов разделяются на два типа: строчные и блочные. Строчные элементы могут являться частью строки, а блочные элементы всегда занимают обособленное место на web-странице и всегда начинаются с новой строки. Естественно, блочные элементы могут включать в себя другие блочные элементы и строчные элементы. По вполне понятным причинам строчные элементы не могут включать в себя блочные элементы.\r\nОбъединение элементов web-страницы в блоки позволяет применять к ним единое оформление, осуществлять верстку. Достаточно будет изменить расположение блока, изменив один объединяющий тег. Естественно, это удобнее, чем менять расположение каждого элемента web-страницы по отдельности.'),
(2, 'Title2', 'Author2', 'Вид текста на экране зависит только от тегов, он не зависит от пробелов и разбивки на строки. Все элементы оформления HTML-документов разделяются на два типа: строчные и блочные. Строчные элементы могут являться частью строки, а блочные элементы всегда занимают обособленное место на web-странице и всегда начинаются с новой строки. Естественно, блочные элементы могут включать в себя другие блочные элементы и строчные элементы. По вполне понятным причинам строчные элементы не могут включать в себя блочные элементы. Объединение элементов web-страницы в блоки позволяет применять к ним единое оформление, осуществлять верстку. Достаточно будет изменить расположение блока, изменив один объединяющий тег. Естественно, это удобнее, чем менять расположение каждого элемента web-страницы по отдельности.'),
(3, 'Title3', 'Author3', 'Вид текста на экране зависит только от тегов, он не зависит от пробелов и разбивки на строки. Все элементы оформления HTML-документов разделяются на два типа: строчные и блочные. Строчные элементы могут являться частью строки, а блочные элементы всегда занимают обособленное место на web-странице и всегда начинаются с новой строки. Естественно, блочные элементы могут включать в себя другие блочные элементы и строчные элементы. По вполне понятным причинам строчные элементы не могут включать в себя блочные элементы. Объединение элементов web-страницы в блоки позволяет применять к ним единое оформление, осуществлять верстку. Достаточно будет изменить расположение блока, изменив один объединяющий тег. Естественно, это удобнее, чем менять расположение каждого элемента web-страницы по отдельности.');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `id_article` int NOT NULL,
  `user_name` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `id_article`, `user_name`, `text`, `parent_id`) VALUES
(109, 1, '123@mail.ru', 'оо', 1),
(110, 1, '123@mail.ru', 'лл', 109),
(111, 1, '1234@mail.ru', '1цуйуйцу', 110);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(13, '123@mail.ru', '$2y$10$4lehcx1HwYs3TeIUUIScoeAc/4IFYoWvrBdoz2p3vn7QSkutxiUH6'),
(14, '1234@mail.ru', '$2y$10$Cc.FdfJ4kqm/4xZDeeBvx.KLtTFYRpO/i4qRdVFfo0gDM58HGEm.C'),
(15, '123@mail.ru', '$2y$10$JbQe2F04GnjX9iHFym3JP.rcpBY9e/k/WLJdFzNFPt1qU0WD1939W');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `user_name` (`user_name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_name`) REFERENCES `users` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
