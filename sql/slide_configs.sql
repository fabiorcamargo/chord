-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Tempo de geração: 09/02/2024 às 16:57
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
-- Estrutura para tabela `slide_configs`
--

CREATE TABLE `slide_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bible_background` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `bg_color` varchar(255) DEFAULT NULL,
  `bible_font` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `slide_configs`
--

INSERT INTO `slide_configs` (`id`, `bible_background`, `type`, `bg_color`, `bible_font`, `created_at`, `updated_at`) VALUES
(1, 6, 'image', 'rgba(0, 0, 0, 0.58)', 1, '2024-02-08 13:04:10', '2024-02-09 01:11:38');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `slide_configs`
--
ALTER TABLE `slide_configs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slide_configs_bible_background_foreign` (`bible_background`),
  ADD KEY `slide_configs_bible_font_foreign` (`bible_font`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `slide_configs`
--
ALTER TABLE `slide_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `slide_configs`
--
ALTER TABLE `slide_configs`
  ADD CONSTRAINT `slide_configs_bible_background_foreign` FOREIGN KEY (`bible_background`) REFERENCES `image_banks` (`id`),
  ADD CONSTRAINT `slide_configs_bible_font_foreign` FOREIGN KEY (`bible_font`) REFERENCES `font_banks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
