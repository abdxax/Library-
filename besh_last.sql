-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 نوفمبر 2020 الساعة 21:36
-- إصدار الخادم: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `besh`
--

-- --------------------------------------------------------

--
-- بنية الجدول `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `total` varchar(200) NOT NULL,
  `payway` varchar(200) NOT NULL,
  `residual` varchar(40) NOT NULL,
  `email` varchar(200) NOT NULL,
  `totalpay` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `bill`
--

INSERT INTO `bill` (`id`, `total`, `payway`, `residual`, `email`, `totalpay`, `status`) VALUES
(1, '308', '1', '0', '20111', 0, ''),
(2, '308', '1', '0', '20111', 0, ''),
(3, '308', '1', '0', '20111', 0, ''),
(4, '308', '1', '0', '20111', 0, ''),
(5, '308', '1', '0', '20111', 0, ''),
(6, '308', '1', '0', '20111', 0, ''),
(7, '88', '2', '0', '20111', 0, ''),
(8, '168', '2', '0', '20111', 0, 'done'),
(9, '50', '2', '0', '20111', 50, 'done'),
(10, '50', '1', '0', '20111', 0, 'done');

-- --------------------------------------------------------

--
-- بنية الجدول `car`
--

CREATE TABLE `car` (
  `email` varchar(200) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `qu` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `car`
--

INSERT INTO `car` (`email`, `contact_id`, `qu`, `bill_id`, `status`) VALUES
('20111', 3, 1, 0, 'wait'),
('20111', 4, 1, 0, 'wait'),
('20111', 3, 3, 0, 'wait'),
('20111', 2, 1, 0, 'wait'),
('20111', 2, 1, 0, 'wait'),
('20111', 2, 1, 0, 'wait'),
('20111', 3, 1, 0, 'wait'),
('20111', 3, 1, 7, 'wait'),
('20111', 3, 1, 8, 'done'),
('20111', 2, 1, 8, 'done'),
('20111', 4, 1, 8, 'done'),
('20111', 2, 1, 9, 'done'),
('20111', 2, 1, 10, 'done');

-- --------------------------------------------------------

--
-- بنية الجدول `colloeg_dep`
--

CREATE TABLE `colloeg_dep` (
  `id` int(11) NOT NULL,
  `name_col` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `colloeg_dep`
--

INSERT INTO `colloeg_dep` (`id`, `name_col`) VALUES
(1, 'الهندسة '),
(2, 'الحاسب');

-- --------------------------------------------------------

--
-- بنية الجدول `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `id_types` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` varchar(40) NOT NULL,
  `quenity` int(11) NOT NULL,
  `file_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `contact`
--

INSERT INTO `contact` (`id`, `id_types`, `title`, `price`, `quenity`, `file_path`) VALUES
(2, 3, 'كتاب 1', '50', 20, '../poster/1qkbYI7WgR0wATRmb2lKQ5qqPagF2Jnhymcy2OzS.jpeg'),
(3, 3, 'كتاب  2', '30', 6, '../poster/University Emblem v1.jpg'),
(4, 3, 'كتاب 2', '88', 9, '../poster/بدون عنوان.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `departemnt`
--

CREATE TABLE `departemnt` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `departemnt`
--

INSERT INTO `departemnt` (`id`, `dep_name`) VALUES
(1, 'قرطاسية'),
(3, 'كتب');

-- --------------------------------------------------------

--
-- بنية الجدول `info`
--

CREATE TABLE `info` (
  `user_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `college` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `info`
--

INSERT INTO `info` (`user_id`, `name`, `phone`, `email`, `college`) VALUES
('1111', 'eee', '22222', 'info@neamaah.com', 0),
('20111', 'عبدالرحمن', '+966568508989', 'aa@a.aa', 0),
('2222', 'Abdulrahman ALJarallah', '+966568508989', 'aljarallahabdulrahman@gmail.com', 0),
('88809', 'Abdulrahman ALJarallah', '+966568508989', 'aljarallahabdulrahman@gmail.com', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'student'),
(3, 'Faculty');

-- --------------------------------------------------------

--
-- بنية الجدول `type_contc`
--

CREATE TABLE `type_contc` (
  `id` int(11) NOT NULL,
  `type_nam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role_i` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`user_id`, `userName`, `password`, `role_i`) VALUES
(3, '1111', '011c945f30ce2cbafc452f39840f025693339c42', 2),
(4, '2222', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2),
(5, '20111', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2),
(6, '9990', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3),
(7, '88809', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colloeg_dep`
--
ALTER TABLE `colloeg_dep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_types` (`id_types`);

--
-- Indexes for table `departemnt`
--
ALTER TABLE `departemnt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `type_contc`
--
ALTER TABLE `type_contc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colloeg_dep`
--
ALTER TABLE `colloeg_dep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departemnt`
--
ALTER TABLE `departemnt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_contc`
--
ALTER TABLE `type_contc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;