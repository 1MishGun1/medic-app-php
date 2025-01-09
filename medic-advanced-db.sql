-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2025 at 02:29 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medic-advanced-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int UNSIGNED NOT NULL,
  `doctor_id` int UNSIGNED NOT NULL,
  `complaints_id` int UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `status_id` int UNSIGNED NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_admin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `doctor_id`, `complaints_id`, `description`, `comment`, `user_id`, `status_id`, `create_at`, `comment_admin`, `date`, `time`) VALUES
(8, 7, 1, 'Болит 5 зуб', NULL, 3, 1, '2025-01-08 20:02:17', NULL, '2025-01-08', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `title`) VALUES
(1, 'Зубная боль'),
(2, 'Отравление'),
(3, 'Диарея'),
(4, 'Плохое зрение'),
(5, 'Повреждение глаза');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `experience` int NOT NULL DEFAULT '0',
  `education` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `experience`, `education`, `specialization`, `img`) VALUES
(6, 'Смирнов Альберт Андреевич', 5, 'Северо-Западный государственный медицинский университет им. И.И. Мечникова', 'Гастроэнтерология, Диетология', '7_1736363268_seResbSqKAA3m8ch3NkODjdzhlVYNY2E.jpg'),
(7, 'Казанова Анна Константиновна', 6, 'Первый Санкт-Петербургский государственный медицинский университет имени академика И.П. Павлова Минздрава России', 'Стоматология', '7_1736363388_fJlVAg1ELkvmi8g9u-3QR6mVEubsljPZ.jpg'),
(8, 'Коротков Алексей Владимирович', 7, 'Московский НИИ глазных болезней им. Гельмгольца', 'Офтальмология', '7_1736363827_Y1YX2B8vOpYU7BraveHn7DRaj-jszj8l.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `title`) VALUES
(1, 'Новый'),
(2, 'Одобрен'),
(3, 'Отменен');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `passport` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `policy` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `auth_key` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `login`, `email`, `passport`, `policy`, `password`, `phone`, `auth_key`, `create_at`, `role_id`) VALUES
(1, 'фыв', 'asd', 'asd', 'asd', 'asd', '$2y$13$NGCA0gnJJqnvOtWJ/KaqRuZ6i8CJMj8P3bfbr4wuufg9wOIxVsXY.', 'asd', 'zN153iIVFWfs7_piWtQG_3Z1w4HZ-fWN', '2025-01-05 12:53:06', 2),
(2, 'Иванов Иван Степаныч', 'ivan123', 'ivan.iva@ia.asdf', '1111 111111', '1111 1111 1111 1111', '$2y$13$hgjwWnToZI4CXo2OWQzUfeGnyfJEpy3B4K.NrIDuHcddPRrbPEbM6', '+7(111)-111-11-11', 'C4Gf6_I5s3wuZGeCepWhHz06OQqEdW2I', '2025-01-05 13:19:53', 2),
(3, 'Степанов Игорь Алексеевич', 'user123', 'user.user@sdf.sd', '1111 111111', '1111 1111 1111 1111', '$2y$13$b8qnKazQ7ML02nRy/McSoO4BITm1/uHCG5ocd1yMuBK1Cc7QJUxI2', '+7(111)-111-11-11', 'ITR4RLrtaq4_7O_g3udQGWexyqueQ3Gf', '2025-01-05 13:24:05', 2),
(7, 'Админ', 'general-medic', 'admin@admin.admin', '1111 111111', '1111 1111 1111 1111', '$2y$13$AomrlI91QYTztpVLLVRDvuCYgN1s.vGi8IRL5NJoPbmNYClaVh3Xq', '+7(111)-111-11-11', 'UQkuLfIp6eIWlCwf7lHP7a0rtzoQSKeq', '2025-01-07 13:06:14', 1),
(8, 'Степанов Игорь Алексеевич', 'stapa123', 'sta@sadf.asdf', '1111 111111', '1111 1111 1111 1111', '$2y$13$Zv8agLuxGdsDYIku2vr7.e6tsAeaAxFMp3XudDwKZKkJhXiS4pPY2', '+7(111)-111-11-11', 'hoQST5RhhyWNoJ396lRJpedDr32HG14z', '2025-01-07 13:54:47', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `complaints_id` (`complaints_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`complaints_id`) REFERENCES `complaint` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
