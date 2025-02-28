-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jun-2024 às 23:25
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gestaocursos`
--
CREATE DATABASE IF NOT EXISTS `gestaocursos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gestaocursos`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(40) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `vagas` int(40) NOT NULL,
  `vagas_preenchidas` int(40) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `metodo_selecao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome`, `descricao`, `vagas`, `vagas_preenchidas`, `data_inicio`, `data_fim`, `metodo_selecao`) VALUES
(43, 'Curso 1', 'ola', 2, 1, '2024-04-27', '2024-05-09', 'dsada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `id_utilizador` int(40) NOT NULL,
  `id_curso` int(40) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `inscricao`
--

INSERT INTO `inscricao` (`id_utilizador`, `id_curso`, `descricao`, `estado`) VALUES
(68, 43, 'cgac', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `leciona`
--

CREATE TABLE `leciona` (
  `id_utilizador` int(40) NOT NULL,
  `id_curso` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `leciona`
--

INSERT INTO `leciona` (`id_utilizador`, `id_curso`) VALUES
(18, 43);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id_utilizador` int(40) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telemovel` int(10) NOT NULL,
  `tipo_utilizador` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id_utilizador`, `nome`, `pass`, `morada`, `email`, `telemovel`, `tipo_utilizador`) VALUES
(18, 'docente', 'ac99fecf6fcb8c25d18788d14a5384ee', 'dasd', 'dasdasdas@gmail.com', 321, 2),
(23, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'olaateste', '35221@gmail.com', 420, 3),
(68, 'aluno', 'ca0cd09a12abade3bf0777574d9f987f', 'aluno', '35221@gmail.com', 432141, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`id_utilizador`,`id_curso`),
  ADD KEY `FK_id_curso` (`id_curso`);

--
-- Índices para tabela `leciona`
--
ALTER TABLE `leciona`
  ADD PRIMARY KEY (`id_utilizador`,`id_curso`),
  ADD KEY `FK_leciona_id_curso` (`id_curso`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id_utilizador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id_utilizador` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `FK_id_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_utilizador` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `leciona`
--
ALTER TABLE `leciona`
  ADD CONSTRAINT `FK_leciona_id_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_leciona_id_utilizador` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
