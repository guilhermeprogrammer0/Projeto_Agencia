-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/08/2024 às 02:59
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agencia`
--
CREATE DATABASE IF NOT EXISTS `agencia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `agencia`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrativo`
--

CREATE TABLE `administrativo` (
  `id_adm` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `administrativo`
--

INSERT INTO `administrativo` (`id_adm`, `usuario`, `senha`) VALUES
(1, 'agencia@adm.com', 'agenciaadm');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados_pessoais`
--

CREATE TABLE `dados_pessoais` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `data_nascimento` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `dados_pessoais`
--

INSERT INTO `dados_pessoais` (`id`, `nome`, `cpf`, `sexo`, `data_nascimento`, `telefone`, `email`, `senha`, `cidade`, `cep`, `estado`, `logradouro`, `bairro`, `numero`) VALUES
(5, 'Guilherme', '55625684898', 'M', '2003-09-12', '16996091036', 'gui@gmail.com', 'gui123', 'Guariba', '1484000', 'Pi', 'rua teste', 'mariana 1', '261');

-- --------------------------------------------------------

--
-- Estrutura para tabela `destinos`
--

CREATE TABLE `destinos` (
  `id_destino` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `destinos`
--

INSERT INTO `destinos` (`id_destino`, `nome`, `foto`) VALUES
(30, 'Rio', 'd64cb407335dd8efcf3f5885b78bf17e.jpg'),
(31, 'Salvador', 'b5a38b527b4e6c1810e7ebd5c41fafb8.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `destino` varchar(100) DEFAULT NULL,
  `pacotes` varchar(100) DEFAULT NULL,
  `qtd_passa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reserva_realizada`
--

CREATE TABLE `reserva_realizada` (
  `id_realizada` int(11) NOT NULL,
  `comprador` int(11) DEFAULT NULL,
  `destino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrativo`
--
ALTER TABLE `administrativo`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices de tabela `dados_pessoais`
--
ALTER TABLE `dados_pessoais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id_destino`);

--
-- Índices de tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Índices de tabela `reserva_realizada`
--
ALTER TABLE `reserva_realizada`
  ADD PRIMARY KEY (`id_realizada`),
  ADD KEY `comprador` (`comprador`),
  ADD KEY `destino` (`destino`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrativo`
--
ALTER TABLE `administrativo`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `dados_pessoais`
--
ALTER TABLE `dados_pessoais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `reserva_realizada`
--
ALTER TABLE `reserva_realizada`
  MODIFY `id_realizada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `reserva_realizada`
--
ALTER TABLE `reserva_realizada`
  ADD CONSTRAINT `reserva_realizada_ibfk_1` FOREIGN KEY (`comprador`) REFERENCES `dados_pessoais` (`id`),
  ADD CONSTRAINT `reserva_realizada_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `reservas` (`id_reserva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
