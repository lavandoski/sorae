-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 09-Maio-2014 às 18:12
-- Versão do servidor: 5.5.37-MariaDB
-- versão do PHP: 5.5.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `sorae`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Aluno`
--

CREATE TABLE IF NOT EXISTS `Aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) CHARACTER SET latin1 NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` varchar(10) CHARACTER SET latin1 NOT NULL,
  `cpf` varchar(15) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `telefone` varchar(30) CHARACTER SET latin1 NOT NULL,
  `celular` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nome` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Aluno_Turma`
--

CREATE TABLE IF NOT EXISTS `Aluno_Turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `aluno_id` (`aluno_id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Chamada`
--

CREATE TABLE IF NOT EXISTS `Chamada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `turma_horario_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `presenca` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_horario_id` (`turma_horario_id`),
  KEY `aluno_id` (`aluno_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Curso`
--

CREATE TABLE IF NOT EXISTS `Curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Disciplina`
--

CREATE TABLE IF NOT EXISTS `Disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Horarios`
--

CREATE TABLE IF NOT EXISTS `Horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Professor`
--

CREATE TABLE IF NOT EXISTS `Professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `celular` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nome` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Professor_Turma`
--

CREATE TABLE IF NOT EXISTS `Professor_Turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `turma_id` (`turma_id`),
  KEY `professor_id` (`professor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Turma`
--

CREATE TABLE IF NOT EXISTS `Turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disciplina_id` int(11) NOT NULL,
  `descricao` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_disciplina` (`disciplina_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Turma_Horarios`
--

CREATE TABLE IF NOT EXISTS `Turma_Horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `turma_id` int(11) NOT NULL,
  `horario_id` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`),
  KEY `horario_id` (`horario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Aluno_Turma`
--
ALTER TABLE `Aluno_Turma`
  ADD CONSTRAINT `Aluno_Turma_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `Aluno` (`id`),
  ADD CONSTRAINT `Aluno_Turma_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `Turma` (`id`);

--
-- Limitadores para a tabela `Chamada`
--
ALTER TABLE `Chamada`
  ADD CONSTRAINT `Chamada_ibfk_1` FOREIGN KEY (`turma_horario_id`) REFERENCES `Turma_Horarios` (`id`),
  ADD CONSTRAINT `Chamada_ibfk_2` FOREIGN KEY (`aluno_id`) REFERENCES `Aluno` (`id`);

--
-- Limitadores para a tabela `Professor_Turma`
--
ALTER TABLE `Professor_Turma`
  ADD CONSTRAINT `Professor_Turma_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `Professor` (`id`),
  ADD CONSTRAINT `Professor_Turma_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `Turma` (`id`);

--
-- Limitadores para a tabela `Turma`
--
ALTER TABLE `Turma`
  ADD CONSTRAINT `Turma_ibfk_1` FOREIGN KEY (`disciplina_id`) REFERENCES `Disciplina` (`id`);

--
-- Limitadores para a tabela `Turma_Horarios`
--
ALTER TABLE `Turma_Horarios`
  ADD CONSTRAINT `Turma_Horarios_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `Turma` (`id`),
  ADD CONSTRAINT `Turma_Horarios_ibfk_2` FOREIGN KEY (`horario_id`) REFERENCES `Horarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
