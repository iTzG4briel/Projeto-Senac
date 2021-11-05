-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Set-2020 às 19:44
-- Versão do servidor: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_euavalio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(50) NOT NULL,
  `obs_categoria` varchar(255) DEFAULT NULL,
  `status_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`, `obs_categoria`, `status_categoria`) VALUES
(1, 'Terror', NULL, 'Ativo'),
(2, 'Comédia', NULL, 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `email_cliente` varchar(50) NOT NULL,
  `cpf_cliente` char(14) NOT NULL,
  `usuario_cliente` varchar(50) NOT NULL,
  `senha_cliente` varchar(50) NOT NULL,
  `obs_cliente` varchar(255) DEFAULT NULL,
  `status_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filme`
--

CREATE TABLE `filme` (
  `id_filme` int(11) NOT NULL,
  `id_categoria_filme` int(11) NOT NULL,
  `nome_filme` varchar(50) NOT NULL,
  `valor_filme` decimal(10,2) NOT NULL,
  `desc_filme` varchar(64000) NOT NULL,
  `foto_filme` varchar(255) NOT NULL,
  `datacad_filme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nota_filme` float NOT NULL,
  `obs_filme` varchar(255) DEFAULT NULL,
  `status_filme` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `filme`
--

INSERT INTO `filme` (`id_filme`, `id_categoria_filme`, `nome_filme`, `valor_filme`, `desc_filme`, `foto_filme`, `datacad_filme`, `nota_filme`, `obs_filme`, `status_filme`) VALUES
(2, 1, 'Slender Man: Pesadelo sem Rosto', '3.00', 'Sem Descricao', 'Slender_Man.jpg', '2020-09-03 17:14:07', 1, 'sem obs', 'Ativo'),
(3, 2, 'BAD BOYS 3', '5.00', '', 'BadBoys.jpg', '2020-09-03 17:14:07', 3, '', 'ATIVO'),
(4, 1, 'JUMANJI - PRóXIMA FASE', '6.90', 'SEM DESCRICAO', 'Jumanji3.jpg', '2020-09-03 17:15:01', 4.5, '', 'ATIVO'),
(5, 2, 'O PODEROSO CHEFINHO', '2.60', 'O PODEROSO CHEFINHO', 'OPoderosoChefinho.jpg', '2020-09-03 17:16:49', 3, '', 'ATIVO'),
(6, 1, 'SAW', '3.90', 'SAW 1 - DA ATé MEDO DESSE FILME', 'SAW.jpg', '2020-09-03 17:17:41', 4, '', 'ATIVO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(50) NOT NULL,
  `usuario_funcionario` varchar(50) NOT NULL,
  `senha_funcionario` varchar(50) NOT NULL,
  `obs_funcionario` varchar(255) DEFAULT NULL,
  `status_funcionario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `usuario_funcionario`, `senha_funcionario`, `obs_funcionario`, `status_funcionario`) VALUES
(1, 'Administrador', 'admin', '123', 'Valor alterado novamente', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `id_venda_item` int(11) NOT NULL,
  `id_filme_item` int(11) NOT NULL,
  `valor_item` decimal(10,2) NOT NULL,
  `qtde_item` int(11) NOT NULL,
  `obs_item` varchar(255) DEFAULT NULL,
  `status_item` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_cliente_nota` int(11) NOT NULL,
  `id_filme_nota` int(11) NOT NULL,
  `nota_nota` float NOT NULL,
  `obs_nota` varchar(255) DEFAULT NULL,
  `status_nota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_cliente_venda` int(11) NOT NULL,
  `Total_venda` decimal(10,2) NOT NULL,
  `data_venda` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo_pagamento_venda` varchar(50) DEFAULT NULL,
  `obs_venda` varchar(255) DEFAULT NULL,
  `status_venda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `email_cliente` (`email_cliente`),
  ADD UNIQUE KEY `cpf_cliente` (`cpf_cliente`),
  ADD UNIQUE KEY `usuario_cliente` (`usuario_cliente`);

--
-- Indexes for table `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`id_filme`),
  ADD UNIQUE KEY `foto_filme` (`foto_filme`),
  ADD KEY `FK_ID_Categoria` (`id_categoria_filme`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `usuario_funcionario` (`usuario_funcionario`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `FK_id_venda_item` (`id_venda_item`),
  ADD KEY `FK_id_filme_item` (`id_filme_item`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `FK_ID_Clietne_Nota` (`id_cliente_nota`),
  ADD KEY `FK_id_filme_nota` (`id_filme_nota`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `FK_id_cliente_venda` (`id_cliente_venda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `filme`
--
ALTER TABLE `filme`
  MODIFY `id_filme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `filme`
--
ALTER TABLE `filme`
  ADD CONSTRAINT `FK_ID_Categoria` FOREIGN KEY (`id_categoria_filme`) REFERENCES `categoria` (`id_categoria`);

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_id_filme_item` FOREIGN KEY (`id_filme_item`) REFERENCES `filme` (`id_filme`),
  ADD CONSTRAINT `FK_id_venda_item` FOREIGN KEY (`id_venda_item`) REFERENCES `venda` (`id_venda`);

--
-- Limitadores para a tabela `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `FK_ID_Clietne_Nota` FOREIGN KEY (`id_cliente_nota`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `FK_id_filme_nota` FOREIGN KEY (`id_filme_nota`) REFERENCES `filme` (`id_filme`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `FK_id_cliente_venda` FOREIGN KEY (`id_cliente_venda`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
