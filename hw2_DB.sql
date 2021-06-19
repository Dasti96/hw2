-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 19, 2021 alle 09:08
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw2`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `acquisto`
--

CREATE TABLE `acquisto` (
  `id` int(11) NOT NULL,
  `nome_prodotto` varchar(30) DEFAULT NULL,
  `quantita` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `acquisto`
--

INSERT INTO `acquisto` (`id`, `nome_prodotto`, `quantita`, `created_at`, `updated_at`, `user_id`) VALUES
(26, 'Grand Theft Auto V', 3, '2021-06-15 06:56:17', '2021-06-15 06:56:17', 1),
(27, 'Portal 2', 2, '2021-06-15 06:56:17', '2021-06-15 06:56:17', 1),
(28, 'The Witcher 3: Wild Hunt', 1, '2021-06-15 06:56:17', '2021-06-15 06:56:17', 1),
(29, 'Grand Theft Auto V', 2, '2021-06-19 04:42:49', '2021-06-19 04:42:49', 25),
(30, 'Tomb Raider (2013)', 1, '2021-06-19 04:42:49', '2021-06-19 04:42:49', 25),
(31, 'The Elder Scrolls V: Skyrim', 1, '2021-06-19 04:46:41', '2021-06-19 04:46:41', 25),
(32, 'The Elder Scrolls V: Skyrim', 1, '2021-06-19 04:48:42', '2021-06-19 04:48:42', 25),
(33, 'Grand Theft Auto V', 1, '2021-06-19 04:58:11', '2021-06-19 04:58:11', 25),
(34, 'Tomb Raider (2013)', 3, '2021-06-19 04:59:37', '2021-06-19 04:59:37', 25),
(35, 'The Witcher 3: Wild Hunt', 1, '2021-06-19 04:59:58', '2021-06-19 04:59:58', 25),
(36, 'The Witcher 3: Wild Hunt', 2, '2021-06-19 05:00:35', '2021-06-19 05:00:35', 25),
(37, 'Tomb Raider (2013)', 1, '2021-06-19 05:00:35', '2021-06-19 05:00:35', 25);

-- --------------------------------------------------------

--
-- Struttura della tabella `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `messaggio` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `oggetto` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `messages`
--

INSERT INTO `messages` (`id`, `id_user`, `messaggio`, `created_at`, `updated_at`, `oggetto`, `categoria`) VALUES
(4, 25, 'Cercate dei programmatori?', '2021-06-11 14:29:27', '2021-06-11 14:29:27', 'Info assunzioni 2021', 'assunzioni'),
(13, 1, 'Non e\' arrivata la copia che ho ordinato qualche giorno fa. Necessito assistenza.', '2021-06-19 04:37:33', '2021-06-19 04:37:33', 'Copia gioco non spedita', 'problemi_prod'),
(14, 1, 'Sono specializzato in modelli 3D. Sono disponibile per un full-time.', '2021-06-19 04:38:34', '2021-06-19 04:38:34', 'Grafico a tempo pieno', 'assunzioni');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cognome` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `nome`, `cognome`, `email`, `username`, `password`, `telefono`, `created_at`, `updated_at`) VALUES
(1, 'marco', 'rossi', 'marco.rossi@hotmail.it', 'marco', '1234', '3487522301', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Marcello', 'Licciardello', 'marcello@hotmail.it', 'marcello123', 'marc', NULL, '2021-06-06 08:13:27', '2021-06-06 08:13:27'),
(29, 'Salvo', 'Ali', 'salvo.ali@hotmail.it', 'salvo96', '1234', NULL, '2021-06-19 05:05:39', '2021-06-19 05:05:39');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `acquisto`
--
ALTER TABLE `acquisto`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `acquisto`
--
ALTER TABLE `acquisto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT per la tabella `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
