-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 28-Ago-2018 às 17:37
-- Versão do servidor: 5.5.61-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `senha`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `sigla` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `senhas`
--

CREATE TABLE IF NOT EXISTS `senhas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `senha` int(11) NOT NULL,
  `status` enum('AGUARDANDO','ATENDENDO','ATENDIDO','CANCELADO') NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_chamado` datetime NOT NULL,
  `data_finalizado` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_categoria` (`id_categoria`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_categoria_2` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ra` varchar(100) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `curso` varchar(250) NOT NULL,
  `senha` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `ra`, `nome`, `curso`, `senha`) VALUES
(1, '123456', 'Thiago', 'SI', '123456'),
(3, '123456368368', 'Rafael Almeida', 'SI', '123456');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `senhas`
--
ALTER TABLE `senhas`
  ADD CONSTRAINT `senhas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `senhas_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
