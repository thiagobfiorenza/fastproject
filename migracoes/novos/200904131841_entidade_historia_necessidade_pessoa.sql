-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Abr 13, 2009 as 06:39 PM
-- Versão do Servidor: 5.0.45
-- Versão do PHP: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `fastproject`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `entidade`
--

CREATE TABLE `entidade` (
  `codigo` int(10) unsigned NOT NULL auto_increment,
  `nome` varchar(140) NOT NULL,
  `descricao` text,
  `situacao` enum('S','N') default NULL,
  `inclusao` datetime default NULL,
  `atualizacao` datetime default NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `entidade`
--

INSERT INTO `entidade` (`codigo`, `nome`, `descricao`, `situacao`, `inclusao`, `atualizacao`) VALUES
(1, 'Cliente', '', 'S', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historia`
--

CREATE TABLE `historia` (
  `codigo` int(10) unsigned NOT NULL auto_increment,
  `nome` varchar(140) NOT NULL,
  `descricao` text NOT NULL,
  `prioridade` int(10) default NULL,
  `andamento` enum('S','N') default NULL,
  `observacao` text,
  `situacao` enum('S','N') default NULL,
  `inclusao` datetime default NULL,
  `atualizacao` datetime default NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `historia`
--

INSERT INTO `historia` (`codigo`, `nome`, `descricao`, `prioridade`, `andamento`, `observacao`, `situacao`, `inclusao`, `atualizacao`) VALUES
(8, 'Teste', '', 1, 'S', NULL, 'S', '2009-04-08 19:55:14', NULL),
(10, 'Implementar área de produtos', '', 1, 'S', NULL, 'S', '2009-04-08 20:10:23', NULL),
(18, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaa', '', 1, 'S', NULL, 'S', '2009-04-08 20:19:26', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historia_seq`
--

CREATE TABLE `historia_seq` (
  `sequence` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`sequence`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `historia_seq`
--

INSERT INTO `historia_seq` (`sequence`) VALUES
(18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `necessidade`
--

CREATE TABLE `necessidade` (
  `codigo` int(10) unsigned NOT NULL auto_increment,
  `nome` varchar(140) NOT NULL,
  `descricao` text NOT NULL,
  `observacao` text,
  `codigo_pessoa` int(10) NOT NULL,
  `situacao` enum('S','N') default NULL,
  `inclusao` datetime default NULL,
  `atualizacao` datetime default NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `necessidade`
--

INSERT INTO `necessidade` (`codigo`, `nome`, `descricao`, `observacao`, `codigo_pessoa`, `situacao`, `inclusao`, `atualizacao`) VALUES
(15, 'Cadastrar um produto', 'Preciso de uma tela de cadastro de produtos. Estes produtos estarão divididos em categorias e cada produto poderá ter uma ou mais fotos.', 'Teste.', 1, 'S', '2009-04-05 15:03:25', '2009-04-05 15:08:55'),
(13, 'Cadastrar um produto', 'Preciso de uma tela de cadastro de produtos. Estes produtos estarão divididos em categorias e cada produto poderá ter uma ou mais fotos.', 'Isto é um teste.', 1, 'N', '2009-04-05 11:56:17', '2009-04-05 14:44:39'),
(19, 'Teste', 'Description', 'Observation', 1, 'S', '2009-04-08 19:48:29', '2009-04-08 19:49:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `necessidade_seq`
--

CREATE TABLE `necessidade_seq` (
  `sequence` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`sequence`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `necessidade_seq`
--

INSERT INTO `necessidade_seq` (`sequence`) VALUES
(19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `codigo` int(10) unsigned NOT NULL auto_increment,
  `nome` varchar(140) NOT NULL,
  `usuario` varchar(20) default NULL,
  `senha` varchar(32) NOT NULL,
  `observacao` text,
  `codigo_entidade` int(10) NOT NULL,
  `situacao` enum('S','N') default NULL,
  `inclusao` datetime default NULL,
  `atualizacao` datetime default NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`codigo`, `nome`, `usuario`, `senha`, `observacao`, `codigo_entidade`, `situacao`, `inclusao`, `atualizacao`) VALUES
(1, 'Seu Valmor', 'valmor', '123456', NULL, 1, NULL, NULL, NULL);
