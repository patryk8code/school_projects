-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 03, 2024 at 09:35 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `break`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `nick` varchar(25) DEFAULT NULL,
  `my_money` bigint(20) DEFAULT NULL,
  `my_clicks` int(11) DEFAULT NULL,
  `buy_items_num` int(11) DEFAULT NULL,
  `buy_items_of_0` int(11) DEFAULT NULL,
  `buy_items_of_1` int(11) DEFAULT NULL,
  `buy_items_of_2` int(11) DEFAULT NULL,
  `buy_items_of_3` int(11) DEFAULT NULL,
  `buy_items_of_4` int(11) DEFAULT NULL,
  `buy_items_of_5` int(11) DEFAULT NULL,
  `buy_items_of_6` int(11) DEFAULT NULL,
  `buy_items_of_7` int(11) DEFAULT NULL,
  `buy_items_of_8` int(11) DEFAULT NULL,
  `buy_items_of_9` int(11) DEFAULT NULL,
  `buy_items_of_10` int(11) DEFAULT NULL,
  `buy_items_of_11` int(11) DEFAULT NULL,
  `buy_items_of_12` int(11) DEFAULT NULL,
  `buy_items_of_13` int(11) DEFAULT NULL,
  `buy_items_of_14` int(11) DEFAULT NULL,
  `buy_items_of_15` int(11) DEFAULT NULL,
  `buy_items_x2` int(11) DEFAULT NULL,
  `buy_items_auto` int(11) DEFAULT NULL,
  `buy_items_time` int(11) DEFAULT NULL,
  `data_create_account` datetime DEFAULT '2024-01-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `nick`, `my_money`, `my_clicks`, `buy_items_num`, `buy_items_of_0`, `buy_items_of_1`, `buy_items_of_2`, `buy_items_of_3`, `buy_items_of_4`, `buy_items_of_5`, `buy_items_of_6`, `buy_items_of_7`, `buy_items_of_8`, `buy_items_of_9`, `buy_items_of_10`, `buy_items_of_11`, `buy_items_of_12`, `buy_items_of_13`, `buy_items_of_14`, `buy_items_of_15`, `buy_items_x2`, `buy_items_auto`, `buy_items_time`, `data_create_account`) VALUES
(1, 'admin', 'admin', 'SZEF!', 999, 10, 2, 55, 69, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99, 98, 0, '2023-12-24 05:55:55'),
(1126, 'adam', 'super_gość', 'qwerty', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2222-11-11 05:05:05'),
(1127, 'adas', 'adassss', '123', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2222-11-11 05:05:05'),
(1128, 'adam', '123', 'kotek', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2222-11-11 05:05:05');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
