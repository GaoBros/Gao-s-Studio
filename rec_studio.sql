-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 10 2025 г., 03:43
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rec_studio`
--

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

CREATE TABLE `albums` (
  `ID_Album` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Release_year` year(4) DEFAULT NULL,
  `Recording_date` date DEFAULT NULL,
  `Genre` varchar(50) DEFAULT NULL,
  `ID_Studio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `albums`
--

INSERT INTO `albums` (`ID_Album`, `Title`, `Release_year`, `Recording_date`, `Genre`, `ID_Studio`) VALUES
(1, 'Время мечтать', '2023', '2023-02-15', 'Рок', 1),
(2, 'Ночная песня', '2022', '2022-08-10', 'Поп', 2),
(3, 'Звуки природы', '2024', '2024-03-25', 'Электроника', 1),
(4, 'Ритмы города', '2021', '2021-11-30', 'Хип-хоп', 3),
(5, 'Мелодии души', '2020', '2020-06-05', 'Акустика', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `ID_Client` int(11) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Registration_date` date NOT NULL,
  `ID_Studio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`ID_Client`, `First_name`, `Last_name`, `Email`, `Phone`, `Password`, `Registration_date`, `ID_Studio`) VALUES
(1, 'Иван', 'Петров', 'ivan.p@mail.ru', '+79990001111', 'gggg', '2023-05-12', 1),
(2, 'Алина', 'Смирнова', 'alina.s@mail.ru', '+79990002222', 'Alonskl', '2024-01-08', 2),
(3, 'Дмитрий', 'Козлов', 'dmitry.k@mail.ru', '+79990003333', 'DKozlov', '2022-11-15', 1),
(4, 'Светлана', 'Федорова', 'svetlana.f@mail.ru', '+79990004444', 'SFedor', '2023-07-20', 3),
(5, 'Николай', 'Морозов', 'nikolay.m@mail.ru', '+79990005555', 'NikMore', '2021-12-01', 5),
(8, 'dfgsdfbgsfb', 'sdfbsfb', 'admin@example.com', '84959999999', 'admin', '2025-11-07', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `ID_Employee` int(11) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `ID_Position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`ID_Employee`, `First_name`, `Last_name`, `Email`, `Phone`, `ID_Position`) VALUES
(1, 'Алексей', 'Иванов', 'alexey@mail.ru', '+79990001122', 1),
(2, 'Мария', 'Петрова', 'maria@mail.ru', '+79990003344', 2),
(3, 'Олег', 'Сидоров', 'oleg@mail.ru', '+79990005566', 3),
(4, 'Елена', 'Кузнецова', 'elena@mail.ru', '+79990007788', 4),
(5, 'Игорь', 'Николаев', 'igor@mail.ru', '+79990009900', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `equipments`
--

CREATE TABLE `equipments` (
  `ID_Equipment` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `ID_Studio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `objects`
--

CREATE TABLE `objects` (
  `ID_Project` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ID_Type` int(11) DEFAULT NULL,
  `ID_Client` int(11) DEFAULT NULL,
  `ID_Track` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE `positions` (
  `ID_Position` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `positions`
--

INSERT INTO `positions` (`ID_Position`, `Title`, `Description`) VALUES
(1, 'Главный инженер', 'Ответственный за техническую часть'),
(2, 'Звукорежиссер', 'Обработка и сведение звука'),
(3, 'Продюсер', 'Координация проекта'),
(4, 'Техник', 'Поддержка оборудования'),
(5, 'Музыкальный директор', 'Контроль музыкального процесса');

-- --------------------------------------------------------

--
-- Структура таблицы `project_types`
--

CREATE TABLE `project_types` (
  `ID_Type` int(11) NOT NULL,
  `Type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `project_types`
--

INSERT INTO `project_types` (`ID_Type`, `Type_name`) VALUES
(3, 'EP'),
(1, 'Альбом'),
(5, 'Демо'),
(4, 'Микс'),
(2, 'Сингл');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `ID_Service` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`ID_Service`, `Name`, `Description`) VALUES
(1, 'Запись вокала', 'Профессиональная запись вокала с использованием качественного оборудования'),
(2, 'Сведение и мастеринг', 'Обработка звука для идеального звучания'),
(3, 'Аренда студии', 'Аренда современного звукозаписывающего зала'),
(4, 'Саунд-дизайн', 'Создание уникальных звуковых эффектов'),
(5, 'Репетиции', 'Аренда помещения для репетиций');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `ID_Session` int(11) NOT NULL,
  `Start_time` time NOT NULL,
  `End_time` time NOT NULL,
  `Date_session` date NOT NULL,
  `ID_Service` int(11) DEFAULT NULL,
  `ID_Employee` int(11) DEFAULT NULL,
  `ID_Studio` int(11) DEFAULT NULL,
  `ID_Client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`ID_Session`, `Start_time`, `End_time`, `Date_session`, `ID_Service`, `ID_Employee`, `ID_Studio`, `ID_Client`) VALUES
(1, '12:00:00', '14:00:00', '0000-00-00', 4, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `studios`
--

CREATE TABLE `studios` (
  `ID_Studio` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` text DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `studios`
--

INSERT INTO `studios` (`ID_Studio`, `Name`, `Address`, `Phone`) VALUES
(1, 'Gao\'s Studio 1', 'г. Москва, ул. Музыкальная, 12', '+7 (495) 123-45-67'),
(2, 'Gao\'s Studio 2', 'г. Москва, пр. Звуковой, 34', '+7 (495) 987-65-43'),
(3, 'Gao\'s Studio 3', 'г. Москва, ул. Нотная, 56', '+7 (495) 567-89-01'),
(4, 'Gao\'s Studio 4', 'г. Москва, ул. Ритмическая, 78', '+7 (495) 112-23-34'),
(5, 'Gao\'s Studio 5', 'г. Москва, пр. Мелодичный, 90', '+7 (495) 445-56-67');

-- --------------------------------------------------------

--
-- Структура таблицы `tracks`
--

CREATE TABLE `tracks` (
  `ID_Track` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Duration` time DEFAULT NULL,
  `File_path` varchar(255) DEFAULT NULL,
  `Date_realise` date DEFAULT NULL,
  `ID_Album` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tracks`
--

INSERT INTO `tracks` (`ID_Track`, `Title`, `Duration`, `File_path`, `Date_realise`, `ID_Album`) VALUES
(1, 'Песня мечты', '00:03:45', '/tracks/track1.mp3', '2023-02-15', 1),
(2, 'Танец луны', '00:04:12', '/tracks/track2.mp3', '2022-08-10', 2),
(3, 'Шум ветра', '00:05:00', '/tracks/track3.mp3', '2024-03-25', 3),
(4, 'Городской поток', '00:03:30', '/tracks/track4.mp3', '2021-11-30', 4),
(5, 'Вечерняя мелодия', '00:04:20', '/tracks/track5.mp3', '2020-06-05', 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`ID_Album`),
  ADD KEY `ID_Studio` (`ID_Studio`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID_Client`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `ID_Studio` (`ID_Studio`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID_Employee`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `ID_Position` (`ID_Position`);

--
-- Индексы таблицы `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`ID_Equipment`),
  ADD KEY `ID_Studio` (`ID_Studio`);

--
-- Индексы таблицы `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`ID_Project`),
  ADD KEY `ID_Type` (`ID_Type`),
  ADD KEY `ID_Client` (`ID_Client`),
  ADD KEY `ID_Track` (`ID_Track`);

--
-- Индексы таблицы `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`ID_Position`);

--
-- Индексы таблицы `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`ID_Type`),
  ADD UNIQUE KEY `Type_name` (`Type_name`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ID_Service`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`ID_Session`),
  ADD KEY `ID_Service` (`ID_Service`),
  ADD KEY `ID_Employee` (`ID_Employee`),
  ADD KEY `ID_Studio` (`ID_Studio`),
  ADD KEY `ID_Client` (`ID_Client`);

--
-- Индексы таблицы `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`ID_Studio`);

--
-- Индексы таблицы `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`ID_Track`),
  ADD KEY `ID_Album` (`ID_Album`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `albums`
--
ALTER TABLE `albums`
  MODIFY `ID_Album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `ID_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `ID_Employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `equipments`
--
ALTER TABLE `equipments`
  MODIFY `ID_Equipment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `objects`
--
ALTER TABLE `objects`
  MODIFY `ID_Project` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
  MODIFY `ID_Position` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `project_types`
--
ALTER TABLE `project_types`
  MODIFY `ID_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `ID_Service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `sessions`
--
ALTER TABLE `sessions`
  MODIFY `ID_Session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `studios`
--
ALTER TABLE `studios`
  MODIFY `ID_Studio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tracks`
--
ALTER TABLE `tracks`
  MODIFY `ID_Track` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`ID_Studio`) REFERENCES `studios` (`ID_Studio`);

--
-- Ограничения внешнего ключа таблицы `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`ID_Studio`) REFERENCES `studios` (`ID_Studio`);

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`ID_Position`) REFERENCES `positions` (`ID_Position`);

--
-- Ограничения внешнего ключа таблицы `equipments`
--
ALTER TABLE `equipments`
  ADD CONSTRAINT `equipments_ibfk_1` FOREIGN KEY (`ID_Studio`) REFERENCES `studios` (`ID_Studio`);

--
-- Ограничения внешнего ключа таблицы `objects`
--
ALTER TABLE `objects`
  ADD CONSTRAINT `objects_ibfk_1` FOREIGN KEY (`ID_Type`) REFERENCES `project_types` (`ID_Type`),
  ADD CONSTRAINT `objects_ibfk_2` FOREIGN KEY (`ID_Client`) REFERENCES `clients` (`ID_Client`),
  ADD CONSTRAINT `objects_ibfk_3` FOREIGN KEY (`ID_Track`) REFERENCES `tracks` (`ID_Track`);

--
-- Ограничения внешнего ключа таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`ID_Service`) REFERENCES `services` (`ID_Service`),
  ADD CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`ID_Employee`) REFERENCES `employees` (`ID_Employee`),
  ADD CONSTRAINT `sessions_ibfk_3` FOREIGN KEY (`ID_Studio`) REFERENCES `studios` (`ID_Studio`),
  ADD CONSTRAINT `sessions_ibfk_4` FOREIGN KEY (`ID_Client`) REFERENCES `clients` (`ID_Client`);

--
-- Ограничения внешнего ключа таблицы `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_ibfk_1` FOREIGN KEY (`ID_Album`) REFERENCES `albums` (`ID_Album`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
