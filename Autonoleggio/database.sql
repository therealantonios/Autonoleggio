-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 09, 2021 alle 10:38
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_sito`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `auto`
--

CREATE TABLE `auto` (
  `id_auto` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `cilindrata` int(11) DEFAULT NULL,
  `prezzo_set` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `auto`
--

INSERT INTO `auto` (`id_auto`, `nome`, `categoria`, `marca`, `cilindrata`, `prezzo_set`) VALUES
(1, 'panda', 'utilitaria', 'fiat', 1300, '210'),
(2, '500L', 'utilitaria', 'fiat', 1200, '200'),
(5, 'giulia', 'berlina', 'alfa_romeo', 2000, '280'),
(6, 'tipo', 'berlina', 'fiat', 1800, '300'),
(8, 'X6', 'suv', 'BMW', 3000, '355'),
(9, 'Q7', 'suv', 'audi', 2500, '320'),
(11, 'fortwo', 'compatte', 'smart', 1000, '170'),
(12, 'mini ', 'compatte', 'BMW', 1100, '160'),
(14, 'punto', 'berlina', 'fiat', 1300, '215');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `id_prenotazione` int(11) NOT NULL,
  `data_prenotazione` varchar(200) DEFAULT NULL,
  `fk_users` int(11) DEFAULT NULL,
  `fk_auto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`id_prenotazione`, `data_prenotazione`, `fk_users`, `fk_auto`) VALUES
(1, '07/07/2021', 11, 1),
(2, '05/07/2021', 12, 2),
(3, '07/07/2021', 11, 1),
(4, '05/07/2021', 12, 2),
(5, '05/07/2021', 12, 2),
(6, '05/07/2021', 13, 2),
(7, '05/07/2021', 13, 1),
(8, '05/07/2021', 13, 2),
(9, '25/08/2021', 13, 8),
(10, '05/07/2021', 13, 2),
(11, '05/07/2021', 13, 2),
(12, '05/07/2021', 13, 1),
(13, '05/07/2021', 13, 1),
(14, '28/05/2022', 13, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `residenza` varchar(50) NOT NULL,
  `CF` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nome`, `cognome`, `residenza`, `CF`, `telefono`) VALUES
(11, 'Franca', '$2y$10$PpI1YJDtDzzHulTaTFunY.UHPbQH68WiGaKayA9TE2JgjgDykAumK', 'Parma', 'Parma', 'montechiarugolo', 'cf02354', '3472169472'),
(12, 'therealantonios', '$2y$10$BbCJxnNfuMHC2PcA17ehqePtRZrEVFoyCkz4Enm8nD5RJxnrtAsGG', 'Antonio', 'Signorelli', 'Melfi', 'AS0625KF2S', '325785691'),
(13, 'Martina', '$2y$10$slW4IVnkK9S2RhjfqBICtO974OlptLVUr8K9Qb0vw/frSlZSDBlme', 'Martina', 'Parma', 'montechiarugolo', 'MH259PO2', '05218968754'),
(14, 'Annalisa', '$2y$10$hBQ5OcqO6Bc8jdPYeqjE7.o5Qu6ykDXQA8jOFqnCx8rD62euYd4AC', 'Annalisa', 'Rossi', 'montechiarugolo', 'AR02589TR', '366785978'),
(15, 'Gianni', '$2y$10$liRxz/vhsXW9d1rZlDU7Iuk62w9NJei6txMrNcPBuTYIVmrSY9Vti', 'Gianni', 'Rossi', 'Melfi', 'GR02258YT', '02599756'),
(16, 'Mariobianchi', '$2y$10$Fx6X/DMZMLX72acZayAahe.CgP4zJgAW6aBxyAkW2QyBkRb1WPr66', 'Mario', 'Bianchi', 'montechiarugolo', 'MR255FGTDB', '3472169472'),
(17, 'Sararossi', '$2y$10$5zZmVL7JHOkbxZNhPn654.KVs6lFYjULg4ckRuTX0M1a06yhUblXu', 'Sara', 'Rossi', 'montechiarugolo', 'SRTF2258', '3472169472'),
(18, 'Sararossi_', '$2y$10$b7tzSJtzemisCX4zhu1YIeILl5mJtGzIwXNROdoXFBpP.xvSacAIW', 'Sara', 'Rossi', 'montechiarugolo', 'SRTF2258', '3472169472'),
(19, 'Maria', '$2y$10$Iaa/sQrnxS3orF6kvsrnpOlnxin4KFWH.iFDF/Ww1jjw28aAAK8KS', 'maria', 'rossi', 'montechiarugolo', 'MR02581FG', '3472169472');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id_auto`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`id_prenotazione`),
  ADD KEY `fk_auto` (`fk_auto`),
  ADD KEY `fk_users` (`fk_users`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `id_prenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `fk_auto` FOREIGN KEY (`fk_auto`) REFERENCES `auto` (`id_auto`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`fk_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
