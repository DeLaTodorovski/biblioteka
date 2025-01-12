-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 08:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `knigi`
--

CREATE TABLE `knigi` (
  `id` int(11) NOT NULL,
  `imeKniga` varchar(255) NOT NULL,
  `objasnuvanje` text NOT NULL,
  `slika` varchar(255) DEFAULT NULL,
  `tiraz` int(11) NOT NULL,
  `kategorija` int(11) NOT NULL,
  `avtori` varchar(255) NOT NULL,
  `izdavac` varchar(255) NOT NULL,
  `godina` int(11) NOT NULL,
  `oddelenie` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `z_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `knigi`
--

INSERT INTO `knigi` (`id`, `imeKniga`, `objasnuvanje`, `slika`, `tiraz`, `kategorija`, `avtori`, `izdavac`, `godina`, `oddelenie`, `cena`, `stat`, `z_id`) VALUES
(5, 'Природни науки', 'Со решение на Министерот за образование и наука на Република Македонија бр. 26-1410/1 од 14.10.2022 се одобрува употребата на овој учебник', 'https://www.e-ucebnici.mon.gov.mk/naslovni/Korica%20Prirodni%202%20odd.png', 100, 1, 'Соња Кирковска, Нела Слезенкова-Никовска', 'TONw', 2022, 2, 234, 2, 0),
(6, 'Јазик и култура на Бошњаците (изборен)', 'Со решение на Министерот за образование и наука на Република Македонија бр. 22-48/1 од 13.01.2016 се одобрува употребата на овој учебник\r\nСо решение на Министерот за образование и наука на Република Македонија бр. 26-1265/1 се продолжува важноста на одлуката за одобрување и употреба на овој учебник\r\n', 'https://www.e-ucebnici.mon.gov.mk/naslovni/Jazik%20i%20kultura%20na%20Bosnjacite%20-%20izboren_4_KORICA_PRINT.png', 45, 1, 'Изета Бабичиќ, Реџеп Шкријељ', 'МОН', 2016, 4, 445, 3, 0),
(7, 'Биологија', 'Со решение на Министерот за образование и наука на Република Македонија бр. 08-9064/1 од 25.07.2018 се одобрува употребата на овој учебник\r\n', 'https://www.e-ucebnici.mon.gov.mk/naslovni/bio7mk.jpg', 4, 1, 'Mary Jones,Diane Fellowes-Freeman and David Sang', 'МОН', 2018, 8, 56, 0, 0),
(12, 'Информатика', 'asdasdd', 'views/resourses/images/pngwing.com.png', 33, 0, 'sdfsdfsdfs', 'МОН', 2024, 1, 0, 0, 0),
(14, 'Басни од Езоп', 'Лектири и читанки за основно образование', 'views/resourses/images/007864_w_1200_1200px.jpg', 1, 1, 'Езоп', 'МОН', 2024, 6, 355, 0, 0),
(45, 'MOMOOOO', 'adasdasd', './views/resourses/images/ewrwrerw.jpg', 3, 0, 'dwd', '3', 2024, 1, 0, 0, 0),
(46, 'MOMOOOO', 'adasdasd', './views/resourses/images/mudonja.png', 3, 0, 'dwd', '3', 2024, 1, 0, 0, 0),
(49, 'Ликовно образование55', 'fgjghgj', './views/resourses/images/Delijaaa.png', 56, 0, 'gjghhj', '5h', 2024, 1, 0, 0, 0),
(50, 'Ликовно образование55', 'fgjghgj', './views/resourses/images/Delijaaa.png', 56, 0, 'gjghhj', '5h', 2024, 1, 0, 0, 0),
(51, 'Ликовно образование55', 'fgjghgj', './views/resourses/images/Delijaaa.png', 56, 0, 'gjghhj', '5h', 2024, 1, 0, 0, 0),
(60, 'ТЕСТ КНИГА ЗА МУЛТИПЛЕ', 'ТЕСТ КНИГА ЗА МУЛТИПЛЕ', './views/resourses/images/469616426_3603588339941791_2397897784072576882_n.jpg', 1, 2, 'Даниел Тодоровски', 'TON', 2008, 7, 120, 2, 0),
(66, 'Тест', 'Тест', './views/resourses/images/2.jpg', 2, 0, 'Даниел Тодоровски', 'TON', 2024, 1, 111, 0, 0),
(67, 'LOLOLO', 'LOLOLO', './views/resourses/images/2.jpg', 12, 0, 'asdasdasdasda', 'TON', 2024, 1, 0, 0, 0),
(68, 'LOLOLO', 'LOLOLO', './views/resourses/images/2.jpg', 12, 0, 'asdasdasdasda', 'TON', 2024, 1, 0, 0, 0),
(69, 'LOLOLO', 'LOLOLO', './views/resourses/images/2.jpg', 12, 0, 'asdasdasdasda', 'TON', 2024, 1, 0, 0, 0),
(70, 'LOLOLO', 'LOLOLO', './views/resourses/images/2.jpg', 12, 0, 'asdasdasdasda', 'TON', 2024, 1, 0, 0, 0),
(71, 'LOLOLO', 'LOLOLO', './views/resourses/images/2.jpg', 12, 0, 'asdasdasdasda', 'TON', 2024, 1, 0, 0, 0),
(72, 'Природни науки 1', 'trekst', 'views/resourses/images/default-image_0.jpeg', 13, 0, 'Даниел Тодоровски', 'TON', 2024, 1, 0, 0, 0),
(73, 'Природни науки 12', '222', './views/resourses/images/IMG_20250107_182124.jpg', 2, 2, 'Даниел Тодоровски', '22', 2016, 1, 0, 0, 0),
(74, 'Природни науки22222', '2', './views/resourses/images/472669418_2491352394558377_5178229439717771351_n (1).jpg', 2, 0, '2', '2', 2024, 1, 0, 0, 0),
(75, 'Со решение на Министерот ', 'Со решение на Министерот за образование и наука на Република Македонија бр. 26-1410/1 од 14.10.2022 се одобрува употребата на овој учебник', './views/resourses/images/472374887_2490957397931210_5827870912377144101_n.jpg', 12, 0, 'Соња Кирковска, Нела Слезенкова-Никовска', '222', 2024, 1, 0, 0, 0),
(77, 'Природни науки', 'дфдфдфдфг', 'views/resourses/images/default-image_0.jpeg', 34, 0, 'фдгдгф', '334534г', 2024, 1, 0, 0, 0),
(78, 'Природни науки', 'дфдфдфдфг', 'views/resourses/images/default-image_0.jpeg', 34, 0, 'фдгдгф', '334534г', 2024, 1, 0, 0, 0),
(79, 'Природни науки', 'дфдфдфдфг', 'views/resourses/images/default-image_0.jpeg', 34, 0, 'фдгдгф', '334534г', 2024, 1, 0, 0, 0),
(80, 'Природни науки', 'дфдфдфдфг', 'views/resourses/images/default-image_0.jpeg', 34, 0, 'фдгдгф', '334534г', 2024, 1, 0, 0, 0),
(81, 'Природни науки', 'дфдфдфдфг', 'views/resourses/images/default-image_0.jpeg', 34, 0, 'фдгдгф', '334534г', 2024, 1, 0, 0, 0),
(82, 'Природни науки', 'дфдфдфдфг', './views/resourses/images/a3b056da-e7b2-4378-9451-07f3c6df916f.jpeg', 34, 0, 'фдгдгф', '334534г', 2024, 1, 0, 0, 0),
(83, 'Природни науки', 'дфдфдфдфг', 'views/resourses/images/default-image_0.jpeg', 34, 0, 'фдгдгф', '334534г', 2024, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `imeKorisnik` varchar(255) NOT NULL,
  `prezimeKorisnik` varchar(255) NOT NULL,
  `slikaKorisnik` varchar(255) DEFAULT NULL,
  `emailKorisnik` varchar(255) NOT NULL,
  `passwordKorisnik` varchar(255) NOT NULL,
  `roljaKorisnik` int(11) NOT NULL,
  `privilegii` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privilegii`
--

CREATE TABLE `privilegii` (
  `id` int(11) NOT NULL,
  `privilegijaIme` int(11) NOT NULL,
  `rolja_id` int(11) NOT NULL,
  `zabranetPristap` varchar(255) NOT NULL,
  `objasnuvanje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rolji`
--

CREATE TABLE `rolji` (
  `id` int(11) NOT NULL,
  `imeRolja` varchar(255) NOT NULL,
  `slikaRolja` varchar(255) NOT NULL,
  `objasnuvanje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ucenici`
--

CREATE TABLE `ucenici` (
  `id` int(11) NOT NULL,
  `bid` varchar(5) DEFAULT NULL,
  `ucenikIme` varchar(255) NOT NULL,
  `ucenikPrezime` varchar(255) NOT NULL,
  `ucenikEmail` varchar(255) DEFAULT NULL,
  `odd_id` int(11) NOT NULL,
  `klasen` varchar(255) NOT NULL,
  `stat` int(11) NOT NULL,
  `zabeleska` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ucenici`
--

INSERT INTO `ucenici` (`id`, `bid`, `ucenikIme`, `ucenikPrezime`, `ucenikEmail`, `odd_id`, `klasen`, `stat`, `zabeleska`) VALUES
(1, '2554', 'Ученик 222', 'Презиме 1', 'test@email.com', 4, 'Даниел Тодоровски', 0, 'Некоја забелешка'),
(2, '', 'Име 2', 'Презиме', 'test@mail.com', 3, 'Некој класен', 2, 'Тест Тест'),
(3, '', 'Име 3', 'презиме', 'test@gmail.com', 6, 'Nekoj driug', 1, 'Незнам'),
(4, '', 'Ученик 4', 'Презиме 4', 'daniel.likovno@gmail.com', 1, 'Даниел Тодоровски', 0, 'Даниел Тодоровски'),
(5, '', 'Ученик 5', 'Презиме 5', 'mkkarikaturi@gmail.com', 9, 'Даниел Тодоровски', 1, 'Даниел Тодоровски'),
(8, '', 'Андреа', 'Тодоровска', '', 2, 'Ирена Трајковска', 0, ''),
(9, '22541', 'Даниел', 'Тодоровски', 'daniel.likovno@gmail.com', 9, 'Ирена Трајковска', 0, ''),
(10, '', 'Дамиена', 'Тоскина', '', 5, 'Нема', 1, ''),
(11, '', 'Ученик 5', 'Презиме 4', '', 1, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `zadolzi`
--

CREATE TABLE `zadolzi` (
  `id` int(11) NOT NULL,
  `kniga_id` int(11) NOT NULL,
  `ucenik_id` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `zemena` date NOT NULL,
  `vratena` date DEFAULT NULL,
  `dase_vrati` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zadolzi`
--

INSERT INTO `zadolzi` (`id`, `kniga_id`, `ucenik_id`, `stat`, `zemena`, `vratena`, `dase_vrati`) VALUES
(14, 5, 1, 0, '2024-12-11', '2024-12-30', NULL),
(15, 45, 2, 0, '2024-12-11', '2025-01-11', NULL),
(16, 20, 1, 0, '2024-12-11', '2024-12-30', NULL),
(17, 6, 1, 0, '2024-12-11', '2025-01-03', NULL),
(18, 46, 1, 0, '2024-12-30', '2024-12-30', NULL),
(19, 17, 1, 0, '2024-12-30', '2025-01-12', NULL),
(20, 17, 2, 0, '2024-12-30', '2025-01-12', NULL),
(21, 17, 1, 0, '2024-12-30', '2025-01-12', NULL),
(22, 60, 1, 0, '2025-01-02', '2025-01-12', NULL),
(23, 4, 1, 0, '2025-01-02', '2025-01-03', NULL),
(24, 12, 1, 0, '2025-01-03', '2025-01-03', NULL),
(25, 6, 1, 0, '2025-01-03', '2025-01-03', NULL),
(26, 17, 3, 0, '2025-01-03', '2025-01-12', NULL),
(27, 33, 1, 0, '2025-01-03', '2025-01-10', NULL),
(28, 4, 1, 0, '2025-01-03', '2025-01-03', NULL),
(29, 4, 1, 0, '2025-01-03', '2025-01-03', NULL),
(30, 4, 1, 0, '2025-01-03', '2025-01-03', NULL),
(31, 4, 1, 0, '2025-01-03', '2025-01-03', NULL),
(32, 4, 1, 0, '2025-01-03', '2025-01-03', NULL),
(33, 45, 1, 0, '2025-01-03', '2025-01-11', NULL),
(34, 12, 1, 0, '2025-01-03', '2025-01-03', NULL),
(35, 4, 1, 0, '2025-01-03', '2025-01-03', NULL),
(36, 4, 1, 0, '2025-01-03', '2025-01-03', NULL),
(37, 12, 1, 0, '2025-01-03', '2025-01-03', NULL),
(38, 12, 8, 1, '2025-01-03', NULL, '2025-02-02'),
(39, 17, 8, 0, '2025-01-03', '2025-01-12', NULL),
(40, 17, 8, 0, '2025-01-03', '2025-01-12', NULL),
(41, 45, 8, 0, '2025-01-03', '2025-01-11', NULL),
(42, 33, 1, 0, '2025-01-10', '2025-01-10', NULL),
(43, 7, 1, 0, '2025-01-11', '2025-01-12', NULL),
(44, 60, 11, 0, '2025-01-12', '2025-01-12', NULL),
(45, 17, 1, 1, '2025-01-12', NULL, '2025-02-11'),
(46, 5, 2, 1, '2025-01-12', NULL, '2025-02-11'),
(47, 49, 1, 1, '2025-01-12', NULL, '2025-02-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `knigi`
--
ALTER TABLE `knigi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilegii`
--
ALTER TABLE `privilegii`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rolji`
--
ALTER TABLE `rolji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ucenici`
--
ALTER TABLE `ucenici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zadolzi`
--
ALTER TABLE `zadolzi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `knigi`
--
ALTER TABLE `knigi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privilegii`
--
ALTER TABLE `privilegii`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rolji`
--
ALTER TABLE `rolji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ucenici`
--
ALTER TABLE `ucenici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `zadolzi`
--
ALTER TABLE `zadolzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
