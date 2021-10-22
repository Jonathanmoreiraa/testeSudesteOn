-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Out-2021 às 07:18
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sudesteonline`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cultures`
--

CREATE TABLE `cultures` (
  `id` int(11) NOT NULL,
  `name` varchar(220) NOT NULL,
  `type` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cultures`
--

INSERT INTO `cultures` (`id`, `name`, `type`, `created`, `modified`) VALUES
(1, 'Arroz', 'arrozes', '2021-10-22 00:43:10', '2021-10-22 00:43:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dosages`
--

CREATE TABLE `dosages` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pest_id` int(11) NOT NULL,
  `culture_id` int(11) NOT NULL,
  `permitted_dosage` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dosages`
--

INSERT INTO `dosages` (`id`, `product_id`, `pest_id`, `culture_id`, `permitted_dosage`, `created`, `modified`) VALUES
(1, 1, 2, 1, '300L', '2021-10-22 01:16:22', '2021-10-22 01:16:22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pests`
--

CREATE TABLE `pests` (
  `id` int(11) NOT NULL,
  `name` varchar(220) CHARACTER SET utf8 NOT NULL,
  `scientific_name` varchar(220) CHARACTER SET utf8 DEFAULT NULL,
  `pest_group` enum('ARTROPODES','VERTEBRADOS','ERVAS DANINHAS','PATOGENOS','NEMATODOS') CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pests`
--

INSERT INTO `pests` (`id`, `name`, `scientific_name`, `pest_group`, `created`, `modified`) VALUES
(2, 'Inseto', 'insetus', 'ARTROPODES', '2021-10-22 00:19:48', '2021-10-22 00:37:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `class` varchar(100) CHARACTER SET utf8 NOT NULL,
  `lote` text CHARACTER SET utf8 NOT NULL,
  `product_composition` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `class`, `lote`, `product_composition`, `user_id`, `created`, `modified`) VALUES
(1, 'Inseticida', 'Classe II', '0000', 'Larvas', 1, '2021-10-21 23:15:13', '2021-10-21 23:15:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(220) NOT NULL,
  `password` varchar(220) NOT NULL,
  `name` varchar(220) NOT NULL,
  `username` varchar(220) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `username`, `created`) VALUES
(1, 'teste@teste.com', '$2y$10$ZjHNpYzj8xhxF5IBAu/HMO0cTRU6RbQ1aPtRDXz.5jFyxwqicHVI2', 'teste', 'teste', '2021-10-22 03:08:33'),
(4, 'teste3@email.com', '$2y$10$30fAE2kBxX/n4pVejgVSzevY21M5vxPyYK2krc6VSn41lntcq9Rci', 'sei la', 'sei.la', '2021-10-21 22:35:57'),
(5, 'email1@email.com', '$2y$10$VxSsEo277Fr/JzKq5JqFX.AR.W8SEN62LOMmd9uo6Nb.IIWbmPG76', 'nome', 'user1', '2021-10-21 22:37:15');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cultures`
--
ALTER TABLE `cultures`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dosages`
--
ALTER TABLE `dosages`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pests`
--
ALTER TABLE `pests`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cultures`
--
ALTER TABLE `cultures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `dosages`
--
ALTER TABLE `dosages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pests`
--
ALTER TABLE `pests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
