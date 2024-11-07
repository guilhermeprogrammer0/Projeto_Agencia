-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/11/2024 às 01:31
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
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `administrativo`
--

INSERT INTO `administrativo` (`id_adm`, `nome`, `usuario`, `senha`) VALUES
(1, 'Émerson', 'emerferreira@gmail.com', 'emer123'),
(2, 'Maysa Pedro', 'maysa@gmail.com', 'maysa123'),
(3, 'Matheus', 'matheus@gmail.com', 'matheus'),
(4, 'Guilherme', 'guilherme@gmail.com', 'guilherme');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` char(11) DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `data_nascimento` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `cep` char(8) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `sexo`, `data_nascimento`, `telefone`, `email`, `senha`, `cidade`, `cep`, `estado`, `logradouro`, `bairro`, `numero`) VALUES
(4, 'Guilherme Souza', '55625684898', 'M', '2003-09-12', '16996091036', 'guilherme@gmail.com', 'gui123', 'Guariba', '14842512', 'SP', 'Rua José Carlos Loredo', 'Residencial Luiz Carlos Santin', '110');

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
(2, 'Capitólio', 450, '1 Dia', '66c5335b2d308.jpg'),
(3, 'Florianópolis', 420, '2 Dias', '66c5336d059f0.jpg'),
(4, 'Fernando de Noronha', 510, '3 Dias', '66c533826e05c.jpg'),
(5, 'Foz do Iguaçu', 700, '4 Dias', '66c5339d55c52.jpg'),
(7, 'Salvador', 500, '2 Dias', '66c533cd7277d.jpg'),
(8, 'Ubatuba', 400, '4 Dias', '66c533dc62654.jpg'),
(9, 'Campos do Jordão', 650, '2 dias', '6725131089edc.jpg'),
(10, 'Rio de Janeiro', 500, '3 dias', '672c0185cc1a3.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `qtd_passa` int(11) NOT NULL,
  `data_viagem` date NOT NULL,
  `data_realizou` date NOT NULL,
  `valor_total` float NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_destino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `qtd_passa`, `data_viagem`, `data_realizou`, `valor_total`, `id_cliente`, `id_destino`) VALUES
(1, 2, '2025-01-12', '2024-11-06', 1300, 4, 9);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrativo`
--
ALTER TABLE `administrativo`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
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
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `FK_RESERVA_CLIENTE` (`id_cliente`),
  ADD KEY `FK_RESERVA_DESTINOS` (`id_destino`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrativo`
--
ALTER TABLE `administrativo`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `FK_RESERVA_CLIENTE` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `FK_RESERVA_DESTINOS` FOREIGN KEY (`id_destino`) REFERENCES `destinos` (`id_destino`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
