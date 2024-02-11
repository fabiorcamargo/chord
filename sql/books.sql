-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Tempo de geração: 09/02/2024 às 16:56
-- Versão do servidor: 11.0.3-MariaDB
-- Versão do PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bitnami_myapp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `bible_id` bigint(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `abbrev` varchar(5) DEFAULT NULL,
  `testament` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `books`
--

INSERT INTO `books` (`id`, `bible_id`, `name`, `abbrev`, `testament`) VALUES
(1, 1, 'Gênesis', 'gn', '1'),
(2, 1, 'Êxodo', 'ex', '1'),
(3, 1, 'Levítico', 'lv', '1'),
(4, 1, 'Números', 'nm', '1'),
(5, 1, 'Deuteronômio', 'dt', '1'),
(6, 1, 'Josué', 'js', '1'),
(7, 1, 'Juízes', 'jz', '1'),
(8, 1, 'Rute', 'rt', '1'),
(9, 1, '1º Samuel', '1sm', '1'),
(10, 1, '2º Samuel', '2sm', '1'),
(11, 1, '1º Reis', '1rs', '1'),
(12, 1, '2º Reis', '2rs', '1'),
(13, 1, '1º Crônicas', '1cr', '1'),
(14, 1, '2º Crônicas', '2cr', '1'),
(15, 1, 'Esdras', 'ed', '1'),
(16, 1, 'Neemias', 'ne', '1'),
(17, 1, 'Ester', 'et', '1'),
(18, 1, 'Jó', 'job', '1'),
(19, 1, 'Salmos', 'sl', '1'),
(20, 1, 'Provérbios', 'pv', '1'),
(21, 1, 'Eclesiastes', 'ec', '1'),
(22, 1, 'Cânticos', 'ct', '1'),
(23, 1, 'Isaías', 'is', '1'),
(24, 1, 'Jeremias', 'jr', '1'),
(25, 1, 'Lamentações de Jeremias', 'lm', '1'),
(26, 1, 'Ezequiel', 'ez', '1'),
(27, 1, 'Daniel', 'dn', '1'),
(28, 1, 'Oséias', 'os', '1'),
(29, 1, 'Joel', 'jl', '1'),
(30, 1, 'Amós', 'am', '1'),
(31, 1, 'Obadias', 'ob', '1'),
(32, 1, 'Jonas', 'jn', '1'),
(33, 1, 'Miquéias', 'mq', '1'),
(34, 1, 'Naum', 'na', '1'),
(35, 1, 'Habacuque', 'hc', '1'),
(36, 1, 'Sofonias', 'sf', '1'),
(37, 1, 'Ageu', 'ag', '1'),
(38, 1, 'Zacarias', 'zc', '1'),
(39, 1, 'Malaquias', 'ml', '1'),
(40, 1, 'Mateus', 'mt', '1'),
(41, 1, 'Marcos', 'mc', '1'),
(42, 1, 'Lucas', 'lc', '1'),
(43, 1, 'João', 'jo', '1'),
(44, 1, 'Atos', 'at', '1'),
(45, 1, 'Romanos', 'rm', '1'),
(46, 1, '1ª Coríntios', '1co', '1'),
(47, 1, '2ª Coríntios', '2co', '1'),
(48, 1, 'Gálatas', 'gl', '1'),
(49, 1, 'Efésios', 'ef', '1'),
(50, 1, 'Filipenses', 'fp', '1'),
(51, 1, 'Colossenses', 'cl', '1'),
(52, 1, '1ª Tessalonicenses', '1ts', '1'),
(53, 1, '2ª Tessalonicenses', '2ts', '1'),
(54, 1, '1ª Timóteo', '1tm', '1'),
(55, 1, '2ª Timóteo', '2tm', '1'),
(56, 1, 'Tito', 'tt', '1'),
(57, 1, 'Filemom', 'fm', '1'),
(58, 1, 'Hebreus', 'hb', '1'),
(59, 1, 'Tiago', 'tg', '1'),
(60, 1, '1ª Pedro', '1pe', '1'),
(61, 1, '2ª Pedro', '2pe', '1'),
(62, 1, '1ª João', '1jo', '1'),
(63, 1, '2ª João', '2jo', '1'),
(64, 1, '3ª João', '3jo', '1'),
(65, 1, 'Judas', 'jd', '1'),
(66, 1, 'Apocalipse', 'ap', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `books_bible_id_foreign` (`bible_id`),
  ADD KEY `bible_id` (`bible_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_id` FOREIGN KEY (`bible_id`) REFERENCES `bibles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
