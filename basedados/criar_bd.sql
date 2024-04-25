-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Abr-2024 às 18:01
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
(1, 'Engenharia Informática', 'Engenharia para a informática', 150, 0, '2024-03-05', '2025-04-09', ''),
(2, 'Engenhaira do desemprego', 'Em outras palavras artes', 200, 0, '2024-04-02', '2024-10-04', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `nome` varchar(60) NOT NULL,
  `id_curso` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lecionar`
--

CREATE TABLE `lecionar` (
  `nome` varchar(100) NOT NULL,
  `id_curso` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `selecao`
--

CREATE TABLE `selecao` (
  `metodo_selecao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `nome` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telemovel` int(10) NOT NULL,
  `tipo_utilizador` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`nome`, `password`, `morada`, `email`, `telemovel`, `tipo_utilizador`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 0, 3),
('aluno', 'ca0cd09a12abade3bf0777574d9f987f', 'aluno', 'aluno@gmail.com', 123456789, 1),
('docente', 'ac99fecf6fcb8c25d18788d14a5384ee', 'fadc', 'fasdfa@gmail.com', 2321421, 2),
('docente1', '085a4315b710361139bef0018d90ac48', 'fadinhoyauuuuuu', 'fasdfa@gmail.com', 2321421, 2),
('dsa', 'c20ad4d76fe97759aa27a0c99bff6710', 'sac', 'dsa@cfads.com', 2315, 0),
('edbhasg', '1558a650b39e1ffa6b715449f44dd475', 'gasgsgg', 'yeet@gmail.com', 225151, 0),
('feas', '01cfcd4f6b8770febfb40cb906715822', 'vycdavhjac', 'hvcda@hbea.com', 425164789, 0),
('Guilherme', 'd6ee4e61af68a10f9bb9ee130313881f', 'rua da praca', 'guilherme.roque@ipcbcampus.pt', 973023847, 0);

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
  ADD PRIMARY KEY (`nome`,`id_curso`),
  ADD KEY `id_cursoFK` (`id_curso`);

--
-- Índices para tabela `lecionar`
--
ALTER TABLE `lecionar`
  ADD PRIMARY KEY (`nome`,`id_curso`),
  ADD KEY `FK_id_curso` (`id_curso`);

--
-- Índices para tabela `selecao`
--
ALTER TABLE `selecao`
  ADD PRIMARY KEY (`metodo_selecao`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`nome`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `id_cursoFK` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nome_FK` FOREIGN KEY (`nome`) REFERENCES `utilizador` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `lecionar`
--
ALTER TABLE `lecionar`
  ADD CONSTRAINT `FK_id_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_nome` FOREIGN KEY (`nome`) REFERENCES `utilizador` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
