-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoparts`
--

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`id_category`, `category_name`, `date_deleted`) VALUES
(1, 'Гуми и джанти', NULL),
(2, 'Двигател и трансмисия', NULL),
(3, 'Едрогабаритни части', NULL),
(4, 'Ел. части', NULL),
(5, 'Ходова част', '2016-03-30'),
(6, 'Ходова част', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `marks`
--

CREATE TABLE `marks` (
  `id_mark` int(11) NOT NULL,
  `mark_name` varchar(100) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `marks`
--

INSERT INTO `marks` (`id_mark`, `mark_name`, `date_deleted`) VALUES
(1, 'Honda', NULL),
(2, 'Mazda', NULL),
(3, 'Mitsubishi', NULL),
(4, 'Nissan', NULL),
(5, 'Subaru', NULL),
(6, 'Suzuki', NULL),
(7, 'Toyota', NULL),
(8, 'Lexus', '2016-03-31');

-- --------------------------------------------------------

--
-- Структура на таблица `models`
--

CREATE TABLE `models` (
  `id_model` int(11) NOT NULL,
  `model_name` varchar(200) NOT NULL,
  `id_mark` int(11) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `models`
--

INSERT INTO `models` (`id_model`, `model_name`, `id_mark`, `date_deleted`) VALUES
(1, 'Civic VII(2000-2005)', 1, NULL),
(2, 'CR-V II(2002-2006)', 1, NULL),
(3, 'Stream(2001-2003)', 1, NULL),
(4, '5(2006-2010)', 2, NULL),
(5, '6(2001-2008)', 2, NULL),
(6, 'RX-8(2003-2009)', 2, NULL),
(7, 'Galant VIII(1996-2006)', 3, NULL),
(8, 'Pajero Sport(1999-2001)', 3, NULL),
(9, 'Pajero Pinin(1998-2001)', 3, NULL),
(10, '300 ZX(1989-1996)', 4, NULL),
(11, 'Micra(K12)(2002-2010)', 4, NULL),
(12, 'Almera Tino(2000-2006)', 4, NULL),
(13, 'Forester(1997-2002)', 5, NULL),
(14, 'Impreza(1992-2000)', 5, NULL),
(15, 'Impreza(2000-2007)', 5, NULL),
(16, 'Grand Vitara(1998-2006)', 6, NULL),
(17, 'Swift(2005-2009)', 6, NULL),
(18, 'Celica VII(T230)(1999-2006)', 7, NULL),
(19, 'Land Cruiser 90(1999-2006)', 7, NULL),
(20, 'MR-2(2000-2002)', 7, NULL),
(21, 'MR-2(2000-2002)', 7, NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `parts`
--

CREATE TABLE `parts` (
  `id_part` int(11) NOT NULL,
  `part_name` varchar(250) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_model` int(11) NOT NULL,
  `photo` longblob,
  `description` text NOT NULL,
  `instock` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `parts`
--

INSERT INTO `parts` (`id_part`, `part_name`, `id_category`, `id_model`, `photo`, `description`, `instock`, `price`, `date_deleted`) VALUES
(6, 'Двигател', 2, 17, NULL, 'Двигател 1.5 бензин,за Suzuki Swift, 2008 год., хечбек.', 2, 1000, NULL),
(7, 'Дроселова клапа', 4, 1, NULL, 'Дроселова клапа за Honda Civic, 1.6 бензин, 2003 год.', 3, 120, NULL),
(8, 'Компютър', 4, 1, NULL, 'Компютър за Honda Civic, 1.6 бензин, 2005 год.', 3, 100, NULL),
(9, 'kkkkkkkkkkkkk', 4, 19, NULL, 'kkkkkkkkkk', 5, 350, '2016-03-31'),
(10, 'Джанти', 1, 5, NULL, 'Джанти за Мазда 6, 16 цола, 5х114,3', 1, 300, NULL),
(11, 'Броня', 3, 4, NULL, 'Предна броня от Mazda 5, Face, 2009 год.', 1, 250, NULL),
(12, 'Джанти', 1, 16, NULL, 'Джанти за Grand Vitara', 1, 330, NULL),
(13, 'Преден капак', 3, 18, NULL, 'Преден капак от Toyota Celica facelift, 2005 гог., хечбек.', 2, 170, NULL),
(14, 'Теглич', 3, 9, NULL, 'Теглич за Mitsubishi Pajero Pinin.', 1, 200, NULL),
(15, 'Броня', 3, 1, NULL, 'Предна броня от Honda Civic Type S, 2000 год.', 1, 170, NULL),
(16, 'Воден радиатор', 3, 1, NULL, 'Воден радиатор за Honda Civic, 1.7 CDTI, 2001 год.', 0, 100, NULL),
(17, 'Бубини', 4, 6, NULL, 'Бубини за Mazda RX-8, 1.8 VVTI, 2006 год.', 2, 200, NULL),
(18, 'Двигател', 2, 10, NULL, 'Двигател за Nissan 300ZX, 3.0 турбо, бензин, 1996 год.', 1, 5000, NULL),
(19, 'Носач', 2, 10, NULL, 'Долен носач за Nissan 300ZX, 1996 год.', 3, 210, NULL),
(20, 'Броня', 3, 13, NULL, 'Задна броня за Subaru Forester, 1999 год.', 1, 110, NULL),
(21, 'Вътрешен', 6, 11, NULL, 'Вътрешен накрайник за\r\nNissan Micra, 2004 год. ', 2, 25, NULL),
(22, 'Кормилна рейка', 6, 2, NULL, 'Кормилна рейка за Honda CR-V, десен волан, 2003 год.', 3, 80, NULL),
(23, 'Дискове', 6, 19, NULL, 'Дискове за Land Cruiser 90, 1999 год.', 2, 50, NULL),
(24, 'Динамо', 4, 1, NULL, ' Динамо за Honda Civic coupe, 1.7 бензин, 2001 год., хечбек.', 1, 70, NULL),
(25, 'Заден мост', 6, 1, NULL, 'Заден мост за Honda Civic, 2003 год.', 5, 310, NULL),
(26, 'Джанти', 1, 1, NULL, 'Джанти за Honda Civic Sport, 2005 год.', 1, 350, NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `surname`, `email`, `username`, `password`, `date_deleted`) VALUES
(1, 'Зорница', 'Димитрова', 'dzorunitsa@yahoo.fr', 'dzorunitsa', 'd7078e2df91c64785613', NULL),
(2, 'Димитър', 'Петров', 'dimitkodimitkov@yahoo.fr', 'dimitar', 'dc883ce3d99d8a9710ca', NULL),
(3, '', '', '', '', 'd41d8cd98f00b204e980', NULL),
(4, '', '', '', '', 'd41d8cd98f00b204e980', NULL),
(5, '', '', '', '', 'd41d8cd98f00b204e980', NULL),
(6, '', '', '', '', 'd41d8cd98f00b204e980', NULL),
(7, '', '', '', '', 'd41d8cd98f00b204e980', NULL),
(8, '', '', '', '', 'd41d8cd98f00b204e980', NULL),
(9, '', '', '', '', 'd41d8cd98f00b204e980', NULL),
(10, '', '', '', '', 'd41d8cd98f00b204e980', NULL),
(11, '', '', '', '', 'd41d8cd98f00b204e980', NULL),
(12, '', '', '', '', 'd41d8cd98f00b204e980', NULL),
(13, '', '', '', '', 'd41d8cd98f00b204e980', NULL),
(14, '', '', '', '', 'd41d8cd98f00b204e980', NULL),
(15, '', '', '', '', 'd41d8cd98f00b204e980', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id_mark`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id_model`),
  ADD KEY `id_mark` (`id_mark`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id_part`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_model` (`id_model`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id_mark` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id_part` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `fk_mark_id` FOREIGN KEY (`id_mark`) REFERENCES `marks` (`id_mark`);

--
-- Ограничения за таблица `parts`
--
ALTER TABLE `parts`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`),
  ADD CONSTRAINT `fk_model_id` FOREIGN KEY (`id_model`) REFERENCES `models` (`id_model`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
