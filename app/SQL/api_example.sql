-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 14/08/2021 às 00:59
-- Versão do servidor: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `api_example`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstparent_id` int(11) DEFAULT NULL,
  `secondparent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `person`
--

INSERT INTO `person` (`id`, `firstname`, `lastname`, `firstparent_id`, `secondparent_id`) VALUES
(1, 'Krasimir', 'Hristozov', NULL, NULL),
(2, 'Maria', 'Hristozova', NULL, NULL),
(3, 'Masha', 'Hristozova', 1, 2),
(4, 'Jane', 'Smith', NULL, NULL),
(5, 'John', 'Smith', NULL, NULL),
(6, 'Richard', 'Smith', 4, 5),
(7, 'Donna', 'Smith', 4, 5),
(8, 'Josh', 'Harrelson', NULL, NULL),
(9, 'Anna', 'Harrelson', 7, 8),
(13, 'Lilica', 'Morais', 1, 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstparent_id` (`firstparent_id`),
  ADD KEY `secondparent_id` (`secondparent_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`firstparent_id`) REFERENCES `person` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `person_ibfk_2` FOREIGN KEY (`secondparent_id`) REFERENCES `person` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
