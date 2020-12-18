-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2020 m. Grd 16 d. 22:36
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) NOT NULL,
  `firstname` text COLLATE utf8_bin NOT NULL,
  `lastname` text COLLATE utf8_bin NOT NULL,
  `personal_id` bigint(11) NOT NULL,
  `b_number` text COLLATE utf8_bin NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Sukurta duomenų kopija lentelei `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `personal_id`, `b_number`, `amount`) VALUES
(4, 'sdads', 'daderwrew', 12345678909, 'LT601010000000000004', 0),
(5, 'sdads', 'daderwrew', 12345678907, 'LT601010000000000005', 0),
(6, 'sdads', 'daderwrew', 12345678914, 'LT601010000000000006', 0),
(7, 'vard', 'pavard', 12345678111, 'LT601010000000000007', 0),
(9, 'uierret', 'ewrujreerw', 74859632101, 'LT601010000000000009', 0),
(10, 'ewkme', 'ekrewpl', 87459632104, 'LT601010000000000010', 0),
(11, 'Jurga', 'Asmanauskaite', 12547896301, 'LT601010000000000010', 0),
(12, 'Darius', 'Brazauskas', 15184789651, 'LT601010000000000011', 44),
(13, 'Andrius', 'Andriusevicius', 54789632104, 'LT601010000000000012', 1),
(14, 'Turkas', 'Trakauskas', 47896512302, 'LT601010000000000013', 0),
(15, 'Vardukas', 'Pavardukas', 54789654121, 'LT601010000000000014', 0),
(16, 'Redas', 'Blekaitis', 58749632101, 'LT601010000000000015', 71.5),
(17, 'Agne', 'Kazauskaite', 54789632101, 'LT601010000000000016', 147.48),
(18, 'Rimas', 'Krimauskas', 85697412305, 'LT601010000000000017', 0),
(21, 'ewrwq', 'werewerw', 45698712302, 'LT601010000000000020', 605.191),
(22, 'asda', 'asdsda', 75369841202, 'LT601010000000000021', 0),
(23, 'fdsfd', 'erwe', 58746932105, 'LT601010000000000022', 0),
(24, 'antoska', 'kartoska', 54789632102, 'LT601010000000000023', 0),
(25, 'Arturelis', 'Andrijauskas', 58746932107, 'LT601010000000000020', 605.191);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `employees`
--

CREATE TABLE `employees` (
  `id` int(10) NOT NULL,
  `firstname` text COLLATE utf8_bin NOT NULL,
  `lastname` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Sukurta duomenų kopija lentelei `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Vardenis', 'Pavardenis', 'admin@admin.lt', '$2y$10$h0pxXUJNzlZ8.A9wXJRxM.D1ML2ktZFB/y4dqoGBzdxMytRZ.tfKS');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `value` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Sukurta duomenų kopija lentelei `sessions`
--

INSERT INTO `sessions` (`id`, `email`, `value`) VALUES
(10, 'admin@admin.lt', '0529749f399b58be7096656396ca7db1efa56f73');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
