-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 17-Jun-2019 às 21:35
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

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
CREATE SCHEMA IF NOT EXISTS `sistema_inventario` DEFAULT CHARACTER SET utf8 ;
USE `sistema_inventario` ;
-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE IF NOT EXISTS `cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `descricao`, `status`) VALUES
(1, 'teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

DROP TABLE IF EXISTS `cidades`;
CREATE TABLE IF NOT EXISTS `cidades` (
  `id_cidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_cidade`),
  KEY `fk_cidades_estados1_idx` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id_cidade`, `nome`, `id_estado`) VALUES
(1, 'Ceres', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenadores`
--

DROP TABLE IF EXISTS `coordenadores`;
CREATE TABLE IF NOT EXISTS `coordenadores` (
  `id_coordenador` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id_coordenador`),
  KEY `fk_coordenadores_pessoas1_idx` (`id_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `coordenadores`
--

INSERT INTO `coordenadores` (`id_coordenador`, `id_pessoa`, `status`, `senha`) VALUES
(1, 1, 2, 'e4da3b7fbbce2345d7772b0674a318d5'),
(5, 5, 1, '905669063311d8a17bd6958cd353eedd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucoes`
--

DROP TABLE IF EXISTS `devolucoes`;
CREATE TABLE IF NOT EXISTS `devolucoes` (
  `id_devolucao` int(11) NOT NULL AUTO_INCREMENT,
  `id_emprestimo` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_devolucao`),
  KEY `fk_devolucoes_emprestimos1_idx` (`id_emprestimo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='COLUNA STATUS PARA CONTROLE DO QUE FOI DEVOLVIDO';

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

DROP TABLE IF EXISTS `emprestimos`;
CREATE TABLE IF NOT EXISTS `emprestimos` (
  `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT,
  `id_funcionario` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `data_devolucao` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  KEY `fk_emprestimos_funcionarios1_idx` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='COLUNA STATUS PARA CONTROLAR SITUACAO EMPRESTIMO';

--
-- Extraindo dados da tabela `emprestimos`
--

INSERT INTO `emprestimos` (`id_emprestimo`, `id_funcionario`, `data`, `data_devolucao`, `status`) VALUES
(1, 2, '2019-06-13 00:00:00', '2019-07-06 00:00:00', 1),
(2, 3, '2019-06-24 00:00:00', '2019-07-06 00:00:00', 1),
(3, 2, '2019-06-04 00:00:00', '2019-06-03 00:00:00', 1),
(4, 2, '2019-06-03 00:00:00', '2019-06-10 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id_estado`, `nome`) VALUES
(1, 'Goias');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `horario` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_setor` int(11) NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `fk_funcionarios_pessoas1_idx` (`id_pessoa`),
  KEY `fk_funcionarios_cargos1_idx` (`id_cargo`),
  KEY `fk_funcionarios_setores1_idx` (`id_setor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `id_pessoa`, `id_cargo`, `horario`, `status`, `id_setor`) VALUES
(2, 2, 1, '20', 0, 1),
(3, 3, 1, '12', 1, 1),
(4, 4, 1, '07 as 17 ', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE IF NOT EXISTS `itens` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(25) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `localizacao` varchar(100) NOT NULL,
  `data_aquisicao` datetime NOT NULL,
  `valor_aquisicao` int(11) NOT NULL,
  `vida_util` datetime NOT NULL,
  `observacao` varchar(255) NOT NULL,
  `situacao` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='COLUNA SITUACAO PARA CONTROLE SE ESTA DISPONIVEL OU EMPRESTADO';

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id_item`, `matricula`, `modelo`, `localizacao`, `data_aquisicao`, `valor_aquisicao`, `vida_util`, `observacao`, `situacao`, `status`) VALUES
(1, '134187915', 'Notebook A315-53-34Y4', 'TI Ar 1', '2017-04-11 00:00:00', 2500, '2020-05-12 00:00:00', 'Novo', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_devolucoes`
--

DROP TABLE IF EXISTS `itens_devolucoes`;
CREATE TABLE IF NOT EXISTS `itens_devolucoes` (
  `id_devolucao` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_devolucao`,`id_item`),
  KEY `fk_devolucoes_has_itens_itens1_idx` (`id_item`),
  KEY `fk_devolucoes_has_itens_devolucoes1_idx` (`id_devolucao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_emprestimos`
--

DROP TABLE IF EXISTS `itens_emprestimos`;
CREATE TABLE IF NOT EXISTS `itens_emprestimos` (
  `id_emprestimo` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_emprestimo`,`id_item`),
  KEY `fk_emprestimos_has_itens_itens1_idx` (`id_item`),
  KEY `fk_emprestimos_has_itens_emprestimos1_idx` (`id_emprestimo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itens_emprestimos`
--

INSERT INTO `itens_emprestimos` (`id_emprestimo`, `id_item`, `observacao`, `status`) VALUES
(1, 1, NULL, 1),
(2, 1, NULL, 1),
(3, 1, NULL, 1),
(4, 1, NULL, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id_pessoa`, `nome`, `CPF`, `telefone`, `email`, `sexo`, `endereco`, `id_cidade`) VALUES
(1, 'Luana Queiros Faria', '123456', '996769272', 'luana@gmail.com', 'F', 'Rua 10', 1),
(2, 'Bob St', '190', '3215987', 'teste@teste.com', 'M', 'bem ali', 1),
(3, 'Luan', '12345678955', '546', 'teste@teste.com', 'M', 'asdasd', 1),
(4, 'Pedro ', '123456789', '12345678', 'bob@gmail.com', 'M', 'rua 23', 1),
(5, 'Bruno', '123456789', '23659', 'bruno@gmail.com', 'M', '0123', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

DROP TABLE IF EXISTS `setores`;
CREATE TABLE IF NOT EXISTS `setores` (
  `id_setor` int(11) NOT NULL AUTO_INCREMENT,
  `id_coordenador` int(11) NOT NULL,
  `ramal_telefonico` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_setor`),
  KEY `fk_setores_coordenadores1_idx` (`id_coordenador`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`id_setor`, `id_coordenador`, `ramal_telefonico`, `nome`, `status`) VALUES
(1, 1, 3435321, 'TI', 1),
(2, 5, 12986, 'RH', 0),
(3, 5, 1298, 'RH', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `fk_cidades_estados1` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_emprestimos_funcionarios1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `fk_funcionarios_cargos1` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_funcionarios_pessoas1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_funcionarios_setores1` FOREIGN KEY (`id_setor`) REFERENCES `setores` (`id_setor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
