-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 30-Abr-2019 às 23:43
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_inventario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE IF NOT EXISTS `cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

DROP TABLE IF EXISTS `cidades`;
CREATE TABLE IF NOT EXISTS `cidades` (
  `id_cidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `estados_id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_cidade`),
  KEY `fk_cidades_estados1_idx` (`estados_id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenadores`
--

DROP TABLE IF EXISTS `coordenadores`;
CREATE TABLE IF NOT EXISTS `coordenadores` (
  `id_coordenador` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_coordenador`),
  KEY `fk_coordenadores_pessoas1_idx` (`id_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucoes`
--

DROP TABLE IF EXISTS `devolucoes`;
CREATE TABLE IF NOT EXISTS `devolucoes` (
  `id_devolucao` int(11) NOT NULL AUTO_INCREMENT,
  `id_emprestimo` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `observacao` varchar(45) NOT NULL,
  PRIMARY KEY (`id_devolucao`),
  KEY `fk_devolucoes_emprestimos1_idx` (`id_emprestimo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

DROP TABLE IF EXISTS `emprestimos`;
CREATE TABLE IF NOT EXISTS `emprestimos` (
  `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT,
  `id_funcionário` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `observacao` varchar(45) NOT NULL,
  `data_devolucaol` datetime NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  KEY `fk_emprestimos_funcionarios1_idx` (`id_funcionário`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id_funcionário` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `horario` time NOT NULL,
  `status` tinyint(1) NOT NULL,
  `setores_id_setores` int(11) NOT NULL,
  PRIMARY KEY (`id_funcionário`),
  KEY `fk_funcionarios_pessoas1_idx` (`id_pessoa`),
  KEY `fk_funcionarios_cargos1_idx` (`id_cargo`),
  KEY `fk_funcionarios_setores1_idx` (`setores_id_setores`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE IF NOT EXISTS `itens` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_setor` int(11) NOT NULL,
  `matricula` varchar(25) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `localizacao` varchar(100) NOT NULL,
  `data_aquisicao` datetime NOT NULL,
  `vida_util` datetime NOT NULL,
  `descricao_estado` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `valor_aquisicao` int(11) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `fk_itens_setores1_idx` (`id_setor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_devolucoes`
--

DROP TABLE IF EXISTS `itens_devolucoes`;
CREATE TABLE IF NOT EXISTS `itens_devolucoes` (
  `id_devolucao` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  PRIMARY KEY (`id_devolucao`,`id_item`),
  KEY `fk_devolucoes_has_itens_itens1_idx` (`id_item`),
  KEY `fk_devolucoes_has_itens_devolucoes1_idx` (`id_devolucao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_emprestimos`
--

DROP TABLE IF EXISTS `itens_emprestimos`;
CREATE TABLE IF NOT EXISTS `itens_emprestimos` (
  `id_emprestimo` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  PRIMARY KEY (`id_emprestimo`,`id_item`),
  KEY `fk_emprestimos_has_itens_itens1_idx` (`id_item`),
  KEY `fk_emprestimos_has_itens_emprestimos1_idx` (`id_emprestimo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE IF NOT EXISTS `pessoas` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `CPF` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  PRIMARY KEY (`id_pessoa`),
  KEY `fk_pessoas_cidades1_idx` (`id_cidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

DROP TABLE IF EXISTS `setores`;
CREATE TABLE IF NOT EXISTS `setores` (
  `id_setores` int(11) NOT NULL AUTO_INCREMENT,
  `id_coordenador` int(11) NOT NULL,
  `ramal_telefonico` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_setores`),
  KEY `fk_setores_coordenadores1_idx` (`id_coordenador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `fk_cidades_estados1` FOREIGN KEY (`estados_id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `coordenadores`
--
ALTER TABLE `coordenadores`
  ADD CONSTRAINT `fk_coordenadores_pessoas1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `devolucoes`
--
ALTER TABLE `devolucoes`
  ADD CONSTRAINT `fk_devolucoes_emprestimos1` FOREIGN KEY (`id_emprestimo`) REFERENCES `emprestimos` (`id_emprestimo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD CONSTRAINT `fk_emprestimos_funcionarios1` FOREIGN KEY (`id_funcionário`) REFERENCES `funcionarios` (`id_funcionário`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `fk_funcionarios_cargos1` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_funcionarios_pessoas1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_funcionarios_setores1` FOREIGN KEY (`setores_id_setores`) REFERENCES `setores` (`id_setores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `fk_itens_setores1` FOREIGN KEY (`id_setor`) REFERENCES `setores` (`id_setores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens_devolucoes`
--
ALTER TABLE `itens_devolucoes`
  ADD CONSTRAINT `fk_devolucoes_has_itens_devolucoes1` FOREIGN KEY (`id_devolucao`) REFERENCES `devolucoes` (`id_devolucao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_devolucoes_has_itens_itens1` FOREIGN KEY (`id_item`) REFERENCES `itens` (`id_item`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens_emprestimos`
--
ALTER TABLE `itens_emprestimos`
  ADD CONSTRAINT `fk_emprestimos_has_itens_emprestimos1` FOREIGN KEY (`id_emprestimo`) REFERENCES `emprestimos` (`id_emprestimo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_emprestimos_has_itens_itens1` FOREIGN KEY (`id_item`) REFERENCES `itens` (`id_item`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `fk_pessoas_cidades1` FOREIGN KEY (`id_cidade`) REFERENCES `cidades` (`id_cidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `setores`
--
ALTER TABLE `setores`
  ADD CONSTRAINT `fk_setores_coordenadores1` FOREIGN KEY (`id_coordenador`) REFERENCES `coordenadores` (`id_coordenador`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
