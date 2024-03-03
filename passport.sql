-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Сер 10 2023 р., 16:13
-- Версія сервера: 5.7.39
-- Версія PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `passport`
--

-- --------------------------------------------------------

--
-- Структура таблиці `organ`
--

CREATE TABLE `organ` (
  `code` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `organ`
--

INSERT INTO `organ` (`code`, `name`, `address`) VALUES
('1001', 'Міграційна служба', 'вул. Центральна, 1, Київ'),
('1002', 'Паспортний стол', 'вул. Леніна, 15, Хмельницький'),
('1003', 'Паспортна служба', 'пр. Незалежності, 70, Черкаси'),
('1029', 'Паспортна служба Загублених цивілізацій', 'пр. Невідомий, 19, Інша дімензія'),
('1234', 'Управління паспортного обслуговування', 'вул. Футуристична, 10, Київ'),
('1357', 'Міграційна служба Таємничих аномалій', 'пр. Дивний, 55, Загадковість'),
('2001', 'Паспортний стол', 'вул. Шевченка, 10, Львів'),
('2002', 'Міграційна служба', 'вул. Садова, 9, Львів'),
('2003', 'Міграційна служба', 'вул. Заводська, 22, Харків'),
('2468', 'Департамент паспортів майбутнього', 'вул. Телепортна, 21, Кіберпростір'),
('3001', 'Департамент охорони правопорядку', 'пр. Миру, 5, Одеса'),
('3002', 'Департамент міграції', 'пр. Перемоги, 30, Київ'),
('3003', 'Департамент охорони правопорядку', 'вул. Грушевського, 9, Київ'),
('3579', 'Департамент паралельних реальностей', 'пр. Паралельний, 77, Мультивсесвіт'),
('4001', 'Паспортна служба', 'вул. Перемоги, 25, Харків'),
('4002', 'Паспортна служба', 'вул. Центральна, 50, Одеса'),
('4003', 'Паспортний стол', 'вул. Леніна, 60, Миколаїв'),
('4265', 'Міграційний офіс Часових петель', 'вул. Часова, 3, Тиметревелія'),
('4321', 'Міграційний центр Загадкових сутностей', 'вул. Небесна, 7, Всесвіт'),
('4593', 'Управління паспортами Забутих мрій', 'вул. Мрійлива, 12, Сновидіння'),
('5001', 'Міграційна служба', 'вул. Привокзальна, 8, Запоріжжя'),
('5002', 'Міграційна служба', 'вул. Головна, 11, Запоріжжя'),
('5003', 'Міграційна служба', 'пр. Перемоги, 18, Запоріжжя'),
('5678', 'Департамент міграційних технологій', 'вул. Кібернетична, 5, Львів'),
('5731', 'Департамент забутого минулого', 'вул. Загадкова, 87, Давність'),
('6001', 'Департамент міграції', 'вул. Соборна, 14, Дніпро'),
('6002', 'Департамент охорони правопорядку', 'пр. Миру, 12, Чернігів'),
('6003', 'Департамент міграції', 'вул. Центральна, 5, Житомир'),
('6248', 'Паспортний стол Чудових створінь', 'вул. Фантастична, 23, Фейріленд'),
('7001', 'Паспортна служба', 'вул. Гагаріна, 2, Вінниця'),
('7002', 'Паспортний стол', 'вул. Стара, 17, Вінниця'),
('7003', 'Паспортна служба', 'вул. Шевченка, 25, Вінниця'),
('7890', 'Паспортний стол Екзотичних локацій', 'вул. Тропічна, 30, Парадиз'),
('8001', 'Міграційна служба', 'вул. Козацька, 7, Закарпаття'),
('8002', 'Міграційна служба', 'вул. Соборна, 5, Львів'),
('8003', 'Міграційна служба', 'вул. Садова, 40, Львів'),
('8642', 'Управління паспортами Підземного королівства', 'вул. Містична, 13, Глибини'),
('9001', 'Департамент охорони правопорядку', 'пр. Свободи, 40, Черкаси'),
('9002', 'Департамент міграції', 'вул. Хмельницька, 32, Рівне'),
('9003', 'Департамент охорони правопорядку', 'вул. Миру, 15, Чернівці'),
('9012', 'Міграційна служба Зоряних систем', 'пр. Зірковий, 8, Галактіка'),
('9876', 'Паспортна служба Інтергалактичного району', 'пр. Космічний, 42, Земля');

-- --------------------------------------------------------

--
-- Структура таблиці `travel`
--

CREATE TABLE `travel` (
  `id` int(11) NOT NULL,
  `pass_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `travel`
--

INSERT INTO `travel` (`id`, `pass_id`, `date`, `country`) VALUES
(1, 1, '2023-08-01', 'USA'),
(2, 1, '2023-08-05', 'Canada'),
(3, 2, '2023-08-02', 'Japan'),
(4, 2, '2023-08-07', 'Italy'),
(5, 1, '2023-08-10', 'Japan'),
(6, 1, '2023-08-15', 'Australia'),
(7, 2, '2023-08-18', 'Japan'),
(8, 2, '2023-08-22', 'USA'),
(9, 1, '2023-08-25', 'USA'),
(10, 1, '2023-08-29', 'Mexico'),
(11, 1, '2023-08-01', 'USA'),
(12, 1, '2023-08-05', 'Canada'),
(13, 2, '2023-08-02', 'Japan'),
(14, 2, '2023-08-07', 'Italy'),
(15, 1, '2023-08-10', 'Japan'),
(16, 1, '2023-08-15', 'Australia'),
(17, 2, '2023-08-18', 'Japan'),
(18, 2, '2023-08-22', 'USA'),
(19, 1, '2023-08-25', 'USA'),
(20, 1, '2023-08-29', 'Mexico'),
(21, 12, '2023-09-01', 'Germany'),
(22, 12, '2023-09-05', 'France'),
(23, 12, '2023-09-10', 'Spain'),
(24, 12, '2023-09-15', 'Italy'),
(25, 12, '2023-09-20', 'Greece'),
(26, 12, '2023-09-25', 'Turkey'),
(27, 2, '2023-09-01', 'Australia'),
(28, 2, '2023-09-05', 'New Zealand'),
(29, 1, '2023-08-01', 'USA'),
(30, 1, '2023-08-05', 'Canada'),
(31, 2, '2023-08-02', 'Japan'),
(32, 2, '2023-08-07', 'Italy'),
(33, 1, '2023-08-10', 'Japan'),
(34, 1, '2023-08-15', 'Australia'),
(35, 2, '2023-08-18', 'Japan'),
(36, 2, '2023-08-22', 'USA'),
(37, 1, '2023-08-25', 'USA'),
(38, 1, '2023-08-29', 'Mexico'),
(39, 12, '2023-09-01', 'Germany'),
(40, 12, '2023-09-05', 'France'),
(41, 12, '2023-09-10', 'Spain'),
(42, 12, '2023-09-15', 'Italy'),
(43, 12, '2023-09-20', 'Greece'),
(44, 12, '2023-09-25', 'Turkey'),
(45, 2, '2023-09-01', 'Australia'),
(46, 2, '2023-09-05', 'New Zealand'),
(47, 2, '2023-09-10', 'Fiji'),
(48, 1, '2023-09-20', 'Canada'),
(49, 1, '2023-09-25', 'USA'),
(50, 12, '2023-10-01', 'Germany'),
(51, 12, '2023-10-05', 'Spain'),
(52, 12, '2023-10-10', 'Italy'),
(53, 12, '2023-10-15', 'Greece'),
(54, 2, '2023-10-01', 'Australia'),
(55, 2, '2023-10-05', 'New Zealand'),
(56, 2, '2023-10-10', 'Australia'),
(57, 2, '2023-10-15', 'Fiji');

-- --------------------------------------------------------

--
-- Структура таблиці `ukr_pass`
--

CREATE TABLE `ukr_pass` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `end_date` date NOT NULL,
  `num` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conf` int(11) NOT NULL,
  `img` varchar(2555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organ` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `ukr_pass`
--

INSERT INTO `ukr_pass` (`id`, `user`, `name`, `surname`, `pb`, `sex`, `date_of_birth`, `end_date`, `num`, `conf`, `img`, `gr`, `organ`) VALUES
(3, 1, 'Вася/Vasia', 'Пупкін/Pupkin', 'Іванович', 'Чоловік/Male', '2005-05-22', '2033-07-29', '41502946', 0, 'https://krot.info/uploads/posts/2022-03/1646169653_3-krot-info-p-smeshnoi-muzhik-smeshnie-foto-4.jpg', 'Україна/Ukraine', '1234'),
(4, 1, 'Вася/Vasia', 'НеПупкін/NePupkin', 'Іванович', 'Чоловік/Male', '2005-05-22', '2033-07-29', '55067247', 1, 'https://krot.info/uploads/posts/2022-03/1646169653_3-krot-info-p-smeshnoi-muzhik-smeshnie-foto-4.jpg', 'Україна/Ukraine', '1002'),
(12, 2, 'Ольга/Olha', 'Пупкін/Pupkin', 'Дмитрівна', 'Жінка/Female', '2003-07-21', '2033-08-02', '59695701', 1, 'https://povaha.org.ua/wp-content/uploads/2017/08/DSC_3084.jpg', 'Україна/Ukraine', '6003'),
(14, 12, 'Антон/Anton', 'Бекмембек/Bekmembek', 'Іванович', 'Чоловік/Male', '1999-07-21', '2033-08-02', '75545474', 1, 'https://img.freepik.com/free-photo/handsome-confident-smiling-man-with-hands-crossed-on-chest_176420-18743.jpg?w=2000', 'Україна/Ukraine', '8001');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(2555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `gender`, `img`, `city`, `role`) VALUES
(1, 'Вася', 'Пупкін', 'qwe123@gmail.com', '200820e3227815ed1756a6b531e7e0d2', 'Чоловік', 'https://abrakadabra.fun/uploads/posts/2021-12/1640882881_1-abrakadabra-fun-p-nakachennii-muzhchina-1.jpg', 'Житомир', 0),
(2, 'Женщіна', 'Пупкін', 'ewq123@gmail.com', '200820e3227815ed1756a6b531e7e0d2', 'Жінка', 'https://img.freepik.com/free-photo/portrait-of-a-young-businesswoman-holding-eyeglasses-in-hand-against-gray-backdrop_23-2148029483.jpg?w=2000', 'Житомир', 0),
(3, 'Admin', 'Admin', 'admin@gmail.com', '200820e3227815ed1756a6b531e7e0d2', 'Чоловік', 'https://p4.wallpaperbetter.com/wallpaper/537/541/239/sunset-background-dandelion-fluff-hd-wallpaper-preview.jpg', 'admin', 1),
(12, 'Антон', 'Бекмембек', 'zxc@gmail.com', '200820e3227815ed1756a6b531e7e0d2', 'Чоловік', 'https://img.freepik.com/premium-photo/beautiful-gay-man-with-glitter-on-face-wearing-crop-top-and-rainbow-lgbt-flag-posing-against-white-background_1258-40632.jpg', 'Житомир', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `zak_pass`
--

CREATE TABLE `zak_pass` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `end_date` date NOT NULL,
  `num` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conf` int(11) NOT NULL,
  `img` varchar(2555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organ` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `zak_pass`
--

INSERT INTO `zak_pass` (`id`, `user`, `name`, `surname`, `city_of_birth`, `sex`, `date_of_birth`, `end_date`, `num`, `conf`, `img`, `gr`, `organ`) VALUES
(1, 2, 'Ольга/Olha', 'Бекмембек/Bekmembek', 'Житомир/Zhytomyr', 'Жінка/Female', '2005-05-22', '2033-08-02', '65523623', 1, 'https://cdn.goodhouse.com.ua/images-jpg/18685/186850.jpg', 'Україна/Ukraine', '4003'),
(2, 1, 'Вася/Vasia', 'Пупкін/Pupkin', 'Житомир/Zhytomyr', 'Чоловік/Male', '2002-07-21', '2033-08-02', '02967837', 1, 'https://www.momjunction.com/wp-content/uploads/2021/02/What-Is-A-Sigma-Male-And-Their-Common-Personality-Trait-910x1024.jpg', 'Україна/Ukraine', '9002'),
(12, 12, 'Антон/Anton', 'Бекмембек/Bekmembek', 'Житомир/Zhytomyr', 'Чоловік/Male', '1999-07-21', '2033-08-02', '90355456', 1, 'https://gloss.ua/file/16/02/04/0suy5_thumb460x460.jpg', 'Україна/Ukraine', '2002');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `organ`
--
ALTER TABLE `organ`
  ADD PRIMARY KEY (`code`);

--
-- Індекси таблиці `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pass_id` (`pass_id`);

--
-- Індекси таблиці `ukr_pass`
--
ALTER TABLE `ukr_pass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `organ` (`organ`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `zak_pass`
--
ALTER TABLE `zak_pass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `organ` (`organ`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблиці `ukr_pass`
--
ALTER TABLE `ukr_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблиці `zak_pass`
--
ALTER TABLE `zak_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `travel`
--
ALTER TABLE `travel`
  ADD CONSTRAINT `travel_ibfk_1` FOREIGN KEY (`pass_id`) REFERENCES `zak_pass` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `ukr_pass`
--
ALTER TABLE `ukr_pass`
  ADD CONSTRAINT `ukr_pass_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `ukr_pass_ibfk_2` FOREIGN KEY (`organ`) REFERENCES `organ` (`code`);

--
-- Обмеження зовнішнього ключа таблиці `zak_pass`
--
ALTER TABLE `zak_pass`
  ADD CONSTRAINT `zak_pass_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `zak_pass_ibfk_2` FOREIGN KEY (`organ`) REFERENCES `organ` (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
