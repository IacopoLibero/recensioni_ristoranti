-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 05, 2024 alle 21:31
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recensioni_ristoranti`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `idrecensione` int(11) NOT NULL,
  `voto` int(11) NOT NULL,
  `data` date NOT NULL,
  `idutente` int(11) NOT NULL,
  `codiceristorante` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `ristorante`
--

CREATE TABLE `ristorante` (
  `codice` varchar(10) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `citta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `ristorante`
--

INSERT INTO `ristorante` (`codice`, `nome`, `indirizzo`, `citta`) VALUES
('ris01', 'Trattoria dall\'Oste', 'Borgo S. Lorenzo, 31', 'Firenze'),
('ris02', 'Fiorenza', 'Via Reginaldo Giuliani, 51', 'Firenze'),
('ris03', 'Ristorante Il Molo', 'Via S. Giovanni, 54', 'Livorno'),
('ris04', 'L\'ostricaio', 'Viale Italia, 100', 'Livorno'),
('ris05', 'La Ghiotteria', 'Vicolo delle Donzelle, 9', 'Pisa'),
('ris06', 'Osteria dei Cavalieri', 'Via S. Frediano, 16', ''),
('ris07', 'La BotteGaia', 'Via del Lastrone, 17', 'Pistoia'),
('ris08', 'Ristorante Alessandro', 'Via Montalese, 9', 'Pistoia'),
('ris09', 'Paca Ristorante', 'Via Frà Bartolomeo, 13', 'Prato'),
('ris10', 'Baghino', 'Via dell\'Accademia, 9', 'Prato');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dataregistrazione` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`idrecensione`),
  ADD KEY `fk_recensione_utente` (`idutente`),
  ADD KEY `fk_recensione_ristorante` (`codiceristorante`);

--
-- Indici per le tabelle `ristorante`
--
ALTER TABLE `ristorante`
  ADD PRIMARY KEY (`codice`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `idrecensione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `fk_recensione_ristorante` FOREIGN KEY (`codiceristorante`) REFERENCES `ristorante` (`codice`),
  ADD CONSTRAINT `fk_recensione_utente` FOREIGN KEY (`idutente`) REFERENCES `utente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
