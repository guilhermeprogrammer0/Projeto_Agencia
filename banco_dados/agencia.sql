-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/08/2024 às 03:51
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
(5, 'Guilherme', '55625684898', 'M', '2003-09-12', '16996091036', 'gui@gmail.com', 'gui123', 'Guariba', '1484000', 'Pi', 'rua teste', 'mariana 1', '261'),
(6, 'Kethilin', '47835841225', 'F', '2004-06-14', '16996341184', 'keth@gmail.com', 'keth', 'Guariba', '1484000', 'Se', 'rua teste2', 'cohab', '78'),
(7, 'teste', '456123369', 'M', '2003-06-14', '16996091036', 'teste@gmail.com', 'teste', 'Guariba', '14842512', 'SP', 'Rua José Carlos Loredo', 'Residencial Luiz Carlos Santin', '110');

-- --------------------------------------------------------

--
-- Estrutura para tabela `destinos`
--

CREATE TABLE `destinos` (
  `id_destino` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `preco` float NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `destinos`
--

INSERT INTO `destinos` (`id_destino`, `nome`, `preco`, `descricao`, `foto`) VALUES
(1, 'Rio de Janeiro', 1100, '4 Dias', 'd7e94d9c47e4561f63b60fed553795aa.jpg'),
(2, 'Capitólio', 800, '3 Dias', 'c591634095cdc12d6062595b683dd56c.jpg'),
(3, 'Florianópolis', 350, '10 Dias', 'a49eec2ddbf189a8494e2c9771067640.jpg'),
(5, 'Salvador', 700, '5 Dias', 'b2f9720524f29a8cbc946442a48821b5.jpg'),
(6, 'Ubatuba', 450, '4 Dias', '9e4b9f5974ce29d49d4305ee9ec15998.jpg'),
(8, 'Foz do Iguaçu', 700, '2 Dias', '6446268950e4ad77b7859da11242a082.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `destino` varchar(100) DEFAULT NULL,
  `qtd_passa` varchar(100) DEFAULT NULL,
  `valor_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `destino`, `qtd_passa`, `valor_total`) VALUES
(1, 'Capitólio', '5', 4000),
(2, 'Salvador', '5', 3500),
(3, 'Florianópolis', '3', 1350);

-- --------------------------------------------------------

--
-- Estrutura para tabela `reservas_realizadas`
--

CREATE TABLE `reservas_realizadas` (
  `id_realizada` int(11) NOT NULL,
  `id_comprador` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reservas_realizadas`
--

INSERT INTO `reservas_realizadas` (`id_realizada`, `id_comprador`, `id_reserva`) VALUES
(1, 5, 1),
(2, 5, 2),
(3, 5, 3);

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
-- Índices de tabela `reservas_realizadas`
--
ALTER TABLE `reservas_realizadas`
  ADD PRIMARY KEY (`id_realizada`),
  ADD KEY `FK_REALIZADAS_DADOS` (`id_comprador`),
  ADD KEY `FK_REALIZADAS_RESERVAS` (`id_reserva`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `reservas_realizadas`
--
ALTER TABLE `reservas_realizadas`
  MODIFY `id_realizada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `reservas_realizadas`
--
ALTER TABLE `reservas_realizadas`
  ADD CONSTRAINT `FK_REALIZADAS_DADOS` FOREIGN KEY (`id_comprador`) REFERENCES `dados_pessoais` (`id`),
  ADD CONSTRAINT `FK_REALIZADAS_RESERVAS` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id_reserva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
