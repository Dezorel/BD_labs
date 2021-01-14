-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 14 2021 г., 17:35
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `story`
--

-- --------------------------------------------------------

--
-- Структура таблицы `action`
--

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `name_action` varchar(100) DEFAULT NULL,
  `id_season` int(11) DEFAULT NULL,
  `id_person` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `action`
--

INSERT INTO `action` (`id_action`, `name_action`, `id_season`, `id_person`) VALUES
(1, 'Spit', 1, 9),
(2, 'Visovivaet usi v okno', 1, 10),
(3, 'Prigaet na elke', 3, 11),
(4, 'Gotovitsia k zime', 3, 9),
(7, 'Dremlet na dereve', 1, 11),
(8, 'Prigaet s vetki na vetku', 1, 4),
(11, 'Ubiraetsia v dome misani', 2, 4),
(12, 'Sekotet nogi misani', 2, 11),
(13, 'Gotovit podarki', 4, 12),
(14, 'Darit podarki', 1, 12),
(23, 'Prosipaetsia', 2, 9),
(39, 'готовится к аттестациям', 12, 42);

-- --------------------------------------------------------

--
-- Структура таблицы `dwelling`
--

CREATE TABLE `dwelling` (
  `id_dwelling` int(11) NOT NULL,
  `name_dwelling` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `dwelling`
--

INSERT INTO `dwelling` (`id_dwelling`, `name_dwelling`) VALUES
(1, 'berloga'),
(2, 'duplo'),
(3, 'gnezdo'),
(4, 'nora'),
(5, 'severnii polus'),
(23, 'Кишинёв'),
(35, 'В НАШИХ СЕРДЦАХ');

-- --------------------------------------------------------

--
-- Структура таблицы `gift`
--

CREATE TABLE `gift` (
  `id_gift` int(11) NOT NULL,
  `name_gift` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `gift`
--

INSERT INTO `gift` (`id_gift`, `name_gift`) VALUES
(4, 'chocolate'),
(5, 'honey'),
(6, 'морковку'),
(7, 'happines'),
(27, '10 по ооп'),
(39, 'Спонсоры');

-- --------------------------------------------------------

--
-- Структура таблицы `person`
--

CREATE TABLE `person` (
  `id_person` int(11) NOT NULL,
  `name_person` varchar(20) DEFAULT NULL,
  `id_gift` int(11) DEFAULT NULL,
  `id_dwelling` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `person`
--

INSERT INTO `person` (`id_person`, `name_person`, `id_gift`, `id_dwelling`) VALUES
(4, 'Белка', 7, 2),
(9, 'Medved', 5, 1),
(10, 'Zaiats', 6, 4),
(11, 'Vorobei', 4, 3),
(12, 'Ded Moroz', 7, 5),
(30, 'Андрей', 27, 23),
(42, 'Политех', 39, 35);

-- --------------------------------------------------------

--
-- Структура таблицы `season`
--

CREATE TABLE `season` (
  `id_season` int(11) NOT NULL,
  `name_season` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `season`
--

INSERT INTO `season` (`id_season`, `name_season`) VALUES
(1, 'winter'),
(2, 'spring'),
(3, 'autumn'),
(4, 'summer'),
(12, 'all seasons');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id_action`),
  ADD KEY `id_season` (`id_season`),
  ADD KEY `id_person` (`id_person`);

--
-- Индексы таблицы `dwelling`
--
ALTER TABLE `dwelling`
  ADD PRIMARY KEY (`id_dwelling`);

--
-- Индексы таблицы `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`id_gift`);

--
-- Индексы таблицы `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`),
  ADD KEY `id_gift` (`id_gift`),
  ADD KEY `id_dwelling` (`id_dwelling`);

--
-- Индексы таблицы `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id_season`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `action`
--
ALTER TABLE `action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `dwelling`
--
ALTER TABLE `dwelling`
  MODIFY `id_dwelling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `gift`
--
ALTER TABLE `gift`
  MODIFY `id_gift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `season`
--
ALTER TABLE `season`
  MODIFY `id_season` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`id_season`) REFERENCES `season` (`id_season`),
  ADD CONSTRAINT `action_ibfk_2` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`);

--
-- Ограничения внешнего ключа таблицы `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`id_gift`) REFERENCES `gift` (`id_gift`),
  ADD CONSTRAINT `person_ibfk_2` FOREIGN KEY (`id_dwelling`) REFERENCES `dwelling` (`id_dwelling`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
