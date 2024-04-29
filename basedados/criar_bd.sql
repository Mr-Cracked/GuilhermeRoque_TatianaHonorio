-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Abr-2024 às 22:03
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
(1, 'Engenharia Informática', 'Engenharia para a informática', 150, 2, '2024-03-05', '2025-04-09', ''),
(2, 'Engenhaira do desemprego', 'Em outras palavras artes', 200, 3, '2024-04-02', '2024-10-04', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `id_utilizador` int(40) NOT NULL,
  `id_curso` int(40) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `inscricao`
--

INSERT INTO `inscricao` (`id_utilizador`, `id_curso`, `descricao`) VALUES
(2, 1, 'ola tenho 88 anos'),
(2, 2, 'olaaa'),
(5, 1, 'saf'),
(5, 2, 'dsa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `leciona`
--

CREATE TABLE `leciona` (
  `id_utilizador` int(40) NOT NULL,
  `id_curso` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id_utilizador` int(40) NOT NULL,
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

INSERT INTO `utilizador` (`id_utilizador`, `nome`, `password`, `morada`, `email`, `telemovel`, `tipo_utilizador`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ola', 'ola@gmail.com', 0, 3),
(2, 'aluno', 'ca0cd09a12abade3bf0777574d9f987f', 'aluno', 'aluno@gmail.com', 123456789, 1),
(3, 'docente', 'ac99fecf6fcb8c25d18788d14a5384ee', 'fadc', 'fasdfa@gmail.com', 2321421, 2),
(4, 'docente1', '085a4315b710361139bef0018d90ac48', 'fadinhoyauuuuuu', 'fasdfa@gmail.com', 2321421, 2),
(5, 'dsa', '5f039b4ef0058a1d652f13d612375a5b', 'sac', 'dsa@cfads.com', 2315, 1),
(6, 'edbhasg', 'c4ca4238a0b923820dcc509a6f75849b', 'gasgsgg', 'yeet@gmail.com', 225151, 1),
(7, 'feas', '01cfcd4f6b8770febfb40cb906715822', 'vycdavhjac', 'hvcda@hbea.com', 425164789, 0),
(8, 'Guilherme', 'c00425797de3c98e7b32e814b54a6ec5', 'rua da praca', 'guilherme.roque@ipcbcampus.pt', 973023847, 3);

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
  MODIFY `id_curso` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id_utilizador` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `FK_id_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_utilizador` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
