-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Set-2023 às 21:27
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

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
-- Estrutura da tabela `administrativo`
--

CREATE TABLE `administrativo` (
  `id_adm` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `administrativo`
--

INSERT INTO `administrativo` (`id_adm`, `usuario`, `senha`) VALUES
(1, 'agenciaadm@adm.com', 'agenciaadm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_pessoais`
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
-- Extraindo dados da tabela `dados_pessoais`
--

INSERT INTO `dados_pessoais` (`id`, `nome`, `cpf`, `sexo`, `data_nascimento`, `telefone`, `email`, `senha`, `cidade`, `cep`, `estado`, `logradouro`, `bairro`, `numero`) VALUES
(1, 'Guilherme', '55625684898', 'M', '2003-09-12', '16996091036', 'guilherme@gmail.com', 'guilherme', 'Guariba', '14840000', 'Sã', 'Avenida Alzira', 'Morada do Sol', '100'),
(2, 'Daniel', '12589632510', 'M', '2000-05-10', '16988525252', 'daniel@teste.com', 'daniel123', 'Guariba', '1484000', 'Sã', 'Rua Jornalista ', 'Nova Guariba', '25'),
(3, 'Maysa Pedro', '12045025896', 'F', '2004-03-05', '16988523698', 'maysa@gmiail.com', 'maysa123', 'Guariba', '14840000', 'Sã', 'Rua Teste', 'Nova Guariba', '100'),
(4, 'Junior Teste', '12012012058', 'M', '2003-05-12', '16998541236', 'juniorteste@gmail.com', 'junior2023', 'Guariba', '1484000', 'Ma', 'Rua teste', 'Teste 2', '458');

-- --------------------------------------------------------

--
-- Estrutura da tabela `destinos`
--

CREATE TABLE `destinos` (
  `id_destino` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `destinos`
--

INSERT INTO `destinos` (`id_destino`, `nome`) VALUES
(1, 'Ubatuba'),
(2, 'Capitólio'),
(3, 'Rio de Janeiro'),
(4, 'Fernando de Noronha'),
(5, 'Porto de Galinhas'),
(6, 'Santos'),
(7, 'São Paulo'),
(8, 'Brasília'),
(9, 'Maceió'),
(10, 'Campos do Jordão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `destino` varchar(100) DEFAULT NULL,
  `pacotes` varchar(100) DEFAULT NULL,
  `qtd_passa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `destino`, `pacotes`, `qtd_passa`) VALUES
(1, 'Capitólio', '2', '2'),
(5, 'Maceió', '3', '2'),
(6, 'São Paulo', '3', '1'),
(7, 'Rio de Janeiro', '1', '2'),
(8, 'Fernando de Noronha', '2', '2'),
(10, 'Ubatuba', '2', '4'),
(12, 'Rio de Janeiro', '3', '2'),
(13, 'Rio de Janeiro', '3', '2'),
(14, 'Rio de Janeiro', '2', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva_realizada`
--

CREATE TABLE `reserva_realizada` (
  `id_realizada` int(11) NOT NULL,
  `comprador` int(11) DEFAULT NULL,
  `destino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `reserva_realizada`
--

INSERT INTO `reserva_realizada` (`id_realizada`, `comprador`, `destino`) VALUES
(1, 1, 1),
(2, 1, 5),
(3, 2, 6),
(4, 2, 7),
(5, 3, 8),
(6, 1, 10),
(7, 3, 13),
(8, 4, 14);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrativo`
--
ALTER TABLE `administrativo`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices para tabela `dados_pessoais`
--
ALTER TABLE `dados_pessoais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id_destino`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Índices para tabela `reserva_realizada`
--
ALTER TABLE `reserva_realizada`
  ADD PRIMARY KEY (`id_realizada`),
  ADD KEY `comprador` (`comprador`),
  ADD KEY `destino` (`destino`);

--
-- AUTO_INCREMENT de tabelas despejadas
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
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `reserva_realizada`
--
ALTER TABLE `reserva_realizada`
  MODIFY `id_realizada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `reserva_realizada`
--
ALTER TABLE `reserva_realizada`
  ADD CONSTRAINT `reserva_realizada_ibfk_1` FOREIGN KEY (`comprador`) REFERENCES `dados_pessoais` (`id`),
  ADD CONSTRAINT `reserva_realizada_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `reservas` (`id_reserva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
