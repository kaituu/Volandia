-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 20, 2023 alle 23:40
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volandia`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `biglietti`
--

CREATE TABLE `biglietti` (
  `CodiceTicket` int(11) NOT NULL,
  `DataAcquisto` date NOT NULL,
  `NumeroVolo` varchar(10) NOT NULL,
  `CodiceFiscale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `biglietti`
--

INSERT INTO `biglietti` (`CodiceTicket`, `DataAcquisto`, `NumeroVolo`, `CodiceFiscale`) VALUES
(1000000, '2022-10-01', 'AFR192', 'TTTGSI02M02'),
(1000001, '2021-05-24', 'EZY321', 'MRTCRA87M15'),
(1000002, '2021-06-30', 'LH231', 'TTTGSI02M02'),
(1000003, '2020-11-15', 'IT34', 'MRTCRA87M15'),
(1000006, '2021-05-23', 'LH231', 'PLAMRA98M03'),
(1000007, '2022-01-09', 'LH231', 'TTTMRS97M07'),
(10000016, '2023-04-12', 'EZY231', 'MRTCRA87M15'),
(10000020, '2023-04-20', 'AFR192', 'eererre');

-- --------------------------------------------------------

--
-- Struttura della tabella `compagnie`
--

CREATE TABLE `compagnie` (
  `Cod_IATA` varchar(10) NOT NULL,
  `Compagnia` varchar(30) NOT NULL,
  `Nazione` varchar(30) NOT NULL,
  `SedeLegale` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `compagnie`
--

INSERT INTO `compagnie` (`Cod_IATA`, `Compagnia`, `Nazione`, `SedeLegale`) VALUES
('AFR', 'AirFrance', 'Francia', 'Parigi'),
('EZY', 'EasyJet', 'Inghilterra', 'Londra'),
('IT', 'ITA', 'Italia', 'Roma'),
('LH', 'Lufthansa', 'Germania', 'Berlino');

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `numvoli`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `numvoli` (
`origine` varchar(30)
,`numeri` bigint(21)
);

-- --------------------------------------------------------

--
-- Struttura della tabella `passeggeri`
--

CREATE TABLE `passeggeri` (
  `CF` varchar(20) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cognome` varchar(45) NOT NULL,
  `DataNascita` date NOT NULL,
  `Nazionalita` varchar(40) DEFAULT NULL,
  `tipo_via` varchar(15) NOT NULL,
  `nome_via` varchar(25) NOT NULL,
  `n_via` varchar(15) NOT NULL,
  `Citta` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `passeggeri`
--

INSERT INTO `passeggeri` (`CF`, `Nome`, `Cognome`, `DataNascita`, `Nazionalita`, `tipo_via`, `nome_via`, `n_via`, `Citta`) VALUES
('eererre', 'errereer', 'erreer', '2023-04-24', 'erreer', 'reerre', 'errere', 'reerre', 'rererere'),
('MRTCRA87M15', 'Carlo', 'Martelli', '1987-11-15', 'Italiana', 'Via', 'Libischi', '1', 'Milano'),
('PLAMRA98M03', 'Maria', 'Paoli', '1998-03-09', 'Francese', 'Via', 'Bastiglia', '4', 'Parigi'),
('TTTGSI02M02', 'Giusy', 'Totti', '2002-02-02', 'Svizzera', 'Via', 'Paolino', '111', 'Roma'),
('TTTMRS97M07', 'Carlo', 'Martelli', '2015-07-07', 'Italiana', 'Via', 'Roma', '11', 'Milano');

-- --------------------------------------------------------

--
-- Struttura della tabella `personale`
--

CREATE TABLE `personale` (
  `Matricola` varchar(10) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cognome` varchar(45) NOT NULL,
  `DataNascita` date NOT NULL,
  `Ruolo` varchar(30) DEFAULT NULL,
  `Qualifica` varchar(30) DEFAULT NULL,
  `Cod_DITTA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `personale`
--

INSERT INTO `personale` (`Matricola`, `Nome`, `Cognome`, `DataNascita`, `Ruolo`, `Qualifica`, `Cod_DITTA`) VALUES
('A1122', 'Carlo', 'Remigi', '1988-08-02', 'Assistente', 'Assistente Volo', 'MKV'),
('A54424', 'Giulia', 'Paoli', '1993-06-30', 'Assistente', 'Assistente Volo', 'MKV'),
('T12133', 'Paolo', 'Morelli', '1988-12-03', 'Tecnico', 'Meccanico', 'PHY'),
('T33311', 'Carla', 'Milli', '1989-05-11', 'Tecnico', 'Meccanico', 'PHY');

-- --------------------------------------------------------

--
-- Struttura della tabella `societa`
--

CREATE TABLE `societa` (
  `Cod_DITTA` varchar(10) NOT NULL,
  `Azienda` varchar(30) NOT NULL,
  `Nazione` varchar(30) NOT NULL,
  `SedeLegale` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `societa`
--

INSERT INTO `societa` (`Cod_DITTA`, `Azienda`, `Nazione`, `SedeLegale`) VALUES
('MKV', 'Flight Assistance', 'Svizzera', 'Zurigo'),
('PHY', 'Handling', 'Belgio', 'Bruxelles'),
('RKA', 'Customer Service', 'Italia', 'Milano');

-- --------------------------------------------------------

--
-- Struttura della tabella `societa_compagnia`
--

CREATE TABLE `societa_compagnia` (
  `Cod_DITTA` varchar(10) NOT NULL,
  `Cod_IATA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `societa_compagnia`
--

INSERT INTO `societa_compagnia` (`Cod_DITTA`, `Cod_IATA`) VALUES
('MKV', 'LH'),
('RKA', 'IT'),
('RKA', 'EZY'),
('RKA', 'LH'),
('PHY', 'AFR'),
('PHY', 'LH');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ID` int(11) NOT NULL,
  `nomeutente` varchar(20) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ID`, `nomeutente`, `nome`, `cognome`, `password`, `admin`) VALUES
(1, 'ferdinando', 'paolo', 'rossi', '$2y$10$yJvIiD4VnSz8mWLgNc3c4.STY.55F7r0KBIIy4aVtSiWcwDBBZhjy', 0),
(2, 'admin', 'luca', 'luca', '$2y$10$K7hNLBETSVA7zj9FSsE4zOK1QnrNTPNfMh/ghM3WZDnwSUc742Akq', 1),
(3, 'bob', 'bob', 'bob', '$2y$10$wfNxOSegjjGMHCrK4LqBzuoteFxU7PxHJnLdr43qM1LX5sJxxycBK', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `voli`
--

CREATE TABLE `voli` (
  `NumeroVolo` varchar(10) NOT NULL,
  `Origine` varchar(30) NOT NULL,
  `Destinazione` varchar(30) NOT NULL,
  `DataPartenza` timestamp NOT NULL DEFAULT current_timestamp(),
  `DataArrivo` timestamp NOT NULL DEFAULT current_timestamp(),
  `Prezzo` int(11) NOT NULL,
  `Cod_IATA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `voli`
--

INSERT INTO `voli` (`NumeroVolo`, `Origine`, `Destinazione`, `DataPartenza`, `DataArrivo`, `Prezzo`, `Cod_IATA`) VALUES
('AFR192', 'Parigi', 'New York', '2021-12-10 20:00:00', '2021-12-10 05:30:00', 500, 'AFR'),
('DF433443', 'Milano', 'Molise', '2023-04-11 00:01:00', '2023-04-18 00:03:00', 9, 'IT'),
('EZY231', 'Roma', 'Bruxelles', '2021-11-15 08:00:00', '2021-11-15 13:00:00', 130, 'EZY'),
('EZY321', 'Parigi', 'Francoforte', '2021-05-30 09:30:00', '2021-05-30 12:00:00', 100, 'EZY'),
('IT34', 'Milano', 'Palermo', '2023-01-01 09:00:00', '2023-01-01 23:00:00', 80, 'IT'),
('LH231', 'Monaco', 'Seoul', '2022-07-15 20:00:00', '2022-07-15 06:00:00', 400, 'LH');

-- --------------------------------------------------------

--
-- Struttura per vista `numvoli`
--
DROP TABLE IF EXISTS `numvoli`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `numvoli`  AS SELECT `voli`.`Origine` AS `origine`, count(0) AS `numeri` FROM `voli` GROUP BY `voli`.`Origine``Origine`  ;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `biglietti`
--
ALTER TABLE `biglietti`
  ADD PRIMARY KEY (`CodiceTicket`),
  ADD KEY `biglietti_ibfk_1` (`NumeroVolo`),
  ADD KEY `biglietti_ibfk_2` (`CodiceFiscale`);

--
-- Indici per le tabelle `compagnie`
--
ALTER TABLE `compagnie`
  ADD PRIMARY KEY (`Cod_IATA`);

--
-- Indici per le tabelle `passeggeri`
--
ALTER TABLE `passeggeri`
  ADD PRIMARY KEY (`CF`);

--
-- Indici per le tabelle `personale`
--
ALTER TABLE `personale`
  ADD PRIMARY KEY (`Matricola`),
  ADD KEY `Cod_DITTA` (`Cod_DITTA`);

--
-- Indici per le tabelle `societa`
--
ALTER TABLE `societa`
  ADD PRIMARY KEY (`Cod_DITTA`);

--
-- Indici per le tabelle `societa_compagnia`
--
ALTER TABLE `societa_compagnia`
  ADD KEY `Cod_DITTA` (`Cod_DITTA`),
  ADD KEY `Cod_IATA` (`Cod_IATA`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `nomeutente` (`nomeutente`);

--
-- Indici per le tabelle `voli`
--
ALTER TABLE `voli`
  ADD PRIMARY KEY (`NumeroVolo`),
  ADD KEY `Cod_IATA` (`Cod_IATA`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `biglietti`
--
ALTER TABLE `biglietti`
  MODIFY `CodiceTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000023;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `biglietti`
--
ALTER TABLE `biglietti`
  ADD CONSTRAINT `biglietti_ibfk_1` FOREIGN KEY (`NumeroVolo`) REFERENCES `voli` (`NumeroVolo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `biglietti_ibfk_2` FOREIGN KEY (`CodiceFiscale`) REFERENCES `passeggeri` (`CF`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `personale`
--
ALTER TABLE `personale`
  ADD CONSTRAINT `personale_ibfk_1` FOREIGN KEY (`Cod_DITTA`) REFERENCES `societa` (`Cod_DITTA`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `societa_compagnia`
--
ALTER TABLE `societa_compagnia`
  ADD CONSTRAINT `societa_compagnia_ibfk_1` FOREIGN KEY (`Cod_DITTA`) REFERENCES `societa` (`Cod_DITTA`) ON UPDATE CASCADE,
  ADD CONSTRAINT `societa_compagnia_ibfk_2` FOREIGN KEY (`Cod_IATA`) REFERENCES `compagnie` (`Cod_IATA`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `voli`
--
ALTER TABLE `voli`
  ADD CONSTRAINT `voli_ibfk_1` FOREIGN KEY (`Cod_IATA`) REFERENCES `compagnie` (`Cod_IATA`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
