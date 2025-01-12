-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 01:38 AM
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
(4, 'Математика2', 'Со решение на Министерот за образование и наука на Република Македонија бр. 26 - 1204/1 од 27.09.2022 се одобрува употребата на овој учебник\r\n', 'https://www.e-ucebnici.mon.gov.mk/naslovni/Korica%20Matematika%20I%20-%20ZA%20PECAT-1.png', 36, 1, 'Слаѓана Јакимовиќ, Ирена Богданоска', 'rrr', 2022, 1, 250, 1, 0),
(5, 'Природни науки', 'Со решение на Министерот за образование и наука на Република Македонија бр. 26-1410/1 од 14.10.2022 се одобрува употребата на овој учебник', 'https://www.e-ucebnici.mon.gov.mk/naslovni/Korica%20Prirodni%202%20odd.png', 100, 1, 'Соња Кирковска, Нела Слезенкова-Никовска', '', 2022, 2, 234, 2, 0),
(6, 'Јазик и култура на Бошњаците (изборен)', 'Со решение на Министерот за образование и наука на Република Македонија бр. 22-48/1 од 13.01.2016 се одобрува употребата на овој учебник\r\nСо решение на Министерот за образование и наука на Република Македонија бр. 26-1265/1 се продолжува важноста на одлуката за одобрување и употреба на овој учебник\r\n', 'https://www.e-ucebnici.mon.gov.mk/naslovni/Jazik%20i%20kultura%20na%20Bosnjacite%20-%20izboren_4_KORICA_PRINT.png', 45, 1, 'Изета Бабичиќ, Реџеп Шкријељ', '', 2016, 4, 445, 3, 0),
(7, 'Биологија', 'Со решение на Министерот за образование и наука на Република Македонија бр. 08-9064/1 од 25.07.2018 се одобрува употребата на овој учебник\r\n', 'https://www.e-ucebnici.mon.gov.mk/naslovni/bio7mk.jpg', 4, 1, 'Mary Jones,Diane Fellowes-Freeman and David Sang', '', 2018, 7, 56, 0, 0),
(12, 'Информатика', 'asdasdd', 'views/resourses/images/pngwing.com.png', 33, 0, 'sdfsdfsdfs', 'МОН', 2024, 1, 0, 0, 0),
(14, 'Басни од Езоп', 'Лектири и читанки за основно образование', 'views/resourses/images/007864_w_1200_1200px.jpg', 1, 1, 'Езоп', 'МОН', 2024, 6, 355, 0, 0),
(15, 'Физичко', 'Некоја книга', 'views/resourses/images/Panovi-sef.png', 2, 0, 'Андријана Томовска', 'МОН', 2024, 1, 0, 0, 0),
(17, 'Информатика2', '2', 'views/resourses/images/451187198_685923317082166_5486730016092497171_n.jpg', 2, 2, 'asdasdasdasda', 'TON', 2024, 4, 0, 0, 0),
(20, 'Ликовно образование2', '2', 'views/resourses/images/logo-Karikaturi.png', 2, 0, 'Даниел Тодоровски', 'TON', 2024, 1, 0, 0, 0),
(21, 'Ликовно образование23', '2', './views/resourses/images/Delijaaa.png', 2, 0, 'Даниел Тодоровски', 'TON', 2024, 1, 0, 0, 0),
(23, 'Ликовно образование2', '2', 'views/resourses/images/default-image_0.jpeg', 2, 0, 'Даниел Тодоровски', 'TON', 2024, 1, 0, 0, 0),
(33, 'Информатика555555', '34', 'views/resourses/images/6665656.png', 45, 0, 'dfggd', 'МОН', 2024, 1, 0, 0, 0),
(45, 'MOMOOOO', 'adasdasd', './views/resourses/images/ewrwrerw.jpg', 3, 0, 'dwd', '3', 2024, 1, 0, 0, 0),
(46, 'MOMOOOO', 'adasdasd', './views/resourses/images/mudonja.png', 3, 0, 'dwd', '3', 2024, 1, 0, 0, 0),
(49, 'Ликовно образование55', 'fgjghgj', './views/resourses/images/Delijaaa.png', 56, 0, 'gjghhj', '5h', 2024, 1, 0, 0, 0),
(50, 'Ликовно образование55', 'fgjghgj', './views/resourses/images/Delijaaa.png', 56, 0, 'gjghhj', '5h', 2024, 1, 0, 0, 0),
(51, 'Ликовно образование55', 'fgjghgj', './views/resourses/images/Delijaaa.png', 56, 0, 'gjghhj', '5h', 2024, 1, 0, 0, 0),
(52, 'adasd', 'asdad', 'views/resourses/images/default-image_0.jpeg', 3, 0, 'asdasd', 'adda', 2024, 1, 0, 0, 0),
(53, 'adasd', 'asdad', 'views/resourses/images/default-image_0.jpeg', 3, 0, 'asdasd', 'adda', 2024, 1, 0, 0, 0),
(54, 'adasd', 'asdad', 'views/resourses/images/default-image_0.jpeg', 3, 0, 'asdasd', 'adda', 2024, 1, 0, 0, 0),
(55, 'adasd', 'asdad', 'views/resourses/images/default-image_0.jpeg', 3, 0, 'asdasd', 'adda', 2024, 1, 0, 0, 0),
(56, 'adasd', 'asdad', 'views/resourses/images/default-image_0.jpeg', 3, 0, 'asdasd', 'adda', 2024, 1, 0, 0, 0),
(57, 'adasd', 'asdad', 'views/resourses/images/default-image_0.jpeg', 3, 0, 'asdasd', 'adda', 2024, 1, 0, 0, 0),
(58, 'adasd', 'asdad', 'views/resourses/images/default-image_0.jpeg', 3, 0, 'asdasd', 'adda', 2024, 1, 0, 0, 0),
(59, 'adasd', 'asdad', 'views/resourses/images/default-image_0.jpeg', 3, 0, 'asdasd', 'adda', 2024, 1, 0, 0, 0),
(60, 'ТЕСТ КНИГА ЗА МУЛТИПЛЕ', 'ТЕСТ КНИГА ЗА МУЛТИПЛЕ', './views/resourses/images/469616426_3603588339941791_2397897784072576882_n.jpg', 1, 2, 'Даниел Тодоровски', 'TON', 2008, 7, 120, 2, 0),
(61, 'ТЕСТ КНИГА ЗА МУЛТИПЛЕ2', 'ТЕСТ КНИГА ЗА МУЛТИПЛЕ2', './views/resourses/images/469616426_3603588339941791_2397897784072576882_n.jpg', 1, 2, 'Даниел Тодоровски', 'TON', 2008, 8, 120, 2, 0);

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

INSERT INTO `ucenici` (`id`, `ucenikIme`, `ucenikPrezime`, `ucenikEmail`, `odd_id`, `klasen`, `stat`, `zabeleska`) VALUES
(1, 'Ученик 1', 'Презиме 1', 'test@email.com', 8, 'Даниел Тодоровски', 0, 'Некоја забелешка'),
(2, 'Име 2', 'Презиме', 'test@mail.com', 3, 'Некој класен', 1, 'Тест Тест'),
(3, 'Име 3', 'презиме', 'test@gmail.com', 9, 'Nekoj driug', 2, 'Незнам'),
(4, 'Ученик 4', 'Презиме 4', 'daniel.likovno@gmail.com', 1, 'Даниел Тодоровски', 0, 'Даниел Тодоровски'),
(5, 'Ученик 5', 'Презиме 5', 'mkkarikaturi@gmail.com', 8, 'Даниел Тодоровски', 1, 'Даниел Тодоровски'),
(7, 'Ученик 6', 'Презиме 6', 'daniel.likovno@gmail.com', 9, 'Даниел Тодоровски', 1, '');

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
  `vratena` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zadolzi`
--

INSERT INTO `zadolzi` (`id`, `kniga_id`, `ucenik_id`, `stat`, `zemena`, `vratena`) VALUES
(1, 45, 0, 1, '2024-12-10', '0000-00-00'),
(2, 45, 0, 1, '2024-12-10', '0000-00-00'),
(3, 45, 0, 1, '2024-12-10', '0000-00-00'),
(4, 45, 0, 1, '2024-12-10', '0000-00-00'),
(5, 45, 0, 1, '2024-12-10', '0000-00-00'),
(6, 45, 1, 1, '2024-12-10', '0000-00-00'),
(7, 55, 1, 1, '2024-12-10', '0000-00-00'),
(8, 33, 1, 1, '2024-12-10', '0000-00-00'),
(9, 12, 1, 1, '2024-12-10', '0000-00-00'),
(10, 52, 1, 1, '2024-12-10', '0000-00-00'),
(11, 61, 1, 1, '2024-12-10', '0000-00-00'),
(12, 46, 1, 1, '2024-12-10', '0000-00-00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `zadolzi`
--
ALTER TABLE `zadolzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
