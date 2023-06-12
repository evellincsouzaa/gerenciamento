-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jun-2023 às 18:30
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerenciadordetarefas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerenciamentodetarefas`
--

CREATE TABLE `gerenciamentodetarefas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `gerenciamentodetarefas`
--

INSERT INTO `gerenciamentodetarefas` (`id`, `titulo`, `categoria`, `data`, `horario`, `descricao`) VALUES
(28, 'Fazer tarefa de matemática', 'Atividades em casa', '2023-06-13', '10:00:00', 'pq vou estar com dor após tanto bolo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `gerenciamentodetarefas`
--
ALTER TABLE `gerenciamentodetarefas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `gerenciamentodetarefas`
--
ALTER TABLE `gerenciamentodetarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
