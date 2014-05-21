-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 21-Maio-2014 às 19:21
-- Versão do servidor: 5.5.37-MariaDB
-- versão do PHP: 5.5.12

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

--
-- Extraindo dados da tabela `Aluno`
--

INSERT INTO `Aluno` (`id`, `nome`, `data_nascimento`, `sexo`, `cpf`, `email`, `telefone`, `celular`) VALUES
(1, 'Valdir R. Lavandoski', '1979-08-16', 'masculino', '956.170.000-04', 'valdir.lavandoski@bento.ifrs.edu.br', '54 3055 3808', '54 91382871'),
(2, 'Bryan Aislan Zinn', '1990-01-01', 'masculino', '11111111111', 'bryan.zinn@ifrs.edu.br', '99999999', '9999999'),
(3, 'Gregori Bedin', '1990-01-01', 'masculino', '11111111111', 'gregory.bedin@bento.ifrs.edu.br', '99999999', '9999999'),
(4, 'Airton Fitarelli Junior', '1980-01-01', 'M', '00000000', 'teste@teste', '000000000000', '000000000000'),
(5, 'Glauber Griffante', '1980-01-01', 'masculino', '11111111111', 'teste@teste', '99999999', '9999999'),
(6, 'Alex Zanon', '1980-01-01', 'masculino', '11111111111', 'teste@teste', '99999999', '9999999'),
(7, 'Eduardo Borowski', '1980-01-01', 'masculino', '11111111111', 'teste@teste', '99999999', '9999999'),
(8, 'Vinícius de Carli', '1980-01-01', 'masculino', '11111111111', 'teste@teste', '99999999', '9999999'),
(9, 'Eduardo Hoff', '1980-01-01', 'masculino', '11111111111', 'teste@teste', '99999999', '9999999'),
(10, 'Leonardo Pedrotti', '1980-01-01', 'masculino', '11111111111', 'teste@teste', '99999999', '9999999'),
(11, 'Franciele Zardo', '1980-01-01', 'masculino', '11111111111', 'teste@teste', '99999999', '9999999'),
(12, 'Márcio Bortolini dos Santos', '1980-01-01', 'masculino', '11111111111', 'teste@teste', '99999999', '9999999'),
(13, 'Thais Roberta Koch', '1980-01-01', 'masculino', '11111111111', 'teste@teste', '99999999', '9999999');

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

--
-- Extraindo dados da tabela `Aluno_Turma`
--

INSERT INTO `Aluno_Turma` (`id`, `aluno_id`, `turma_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `Chamada`
--

INSERT INTO `Chamada` (`id`, `turma_horario_id`, `aluno_id`, `presenca`) VALUES
(1, 1, 4, 1),
(2, 1, 6, 0),
(3, 1, 2, 1),
(4, 1, 7, 0),
(5, 1, 9, 1),
(6, 1, 5, 1),
(7, 1, 10, 1),
(8, 1, 11, 1),
(9, 1, 3, 1),
(10, 1, 12, 1),
(11, 1, 13, 1),
(12, 1, 1, 0),
(13, 1, 8, 1),
(14, 2, 6, 1),
(15, 2, 9, 0),
(16, 2, 11, 1),
(17, 2, 5, 1),
(18, 2, 3, 1),
(19, 2, 10, 0),
(20, 2, 7, 1),
(21, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Curso`
--

CREATE TABLE IF NOT EXISTS `Curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `Curso`
--

INSERT INTO `Curso` (`id`, `nome`) VALUES
(1, 'Tecnologia em Análise e Desenvolvimento de Sistema'),
(2, 'Licenciatura em Matemática');

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

--
-- Extraindo dados da tabela `Disciplina`
--

INSERT INTO `Disciplina` (`id`, `nome`, `curso_id`) VALUES
(1, 'Desenvolvimento de Sistemas II', 1),
(2, 'Redes II', 1);

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

--
-- Extraindo dados da tabela `Horarios`
--

INSERT INTO `Horarios` (`id`, `hora_inicio`, `hora_fim`) VALUES
(1, '18:15:00', '20:30:00'),
(2, '19:00:00', '20:30:00'),
(3, '20:45:00', '22:15:00');

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

--
-- Extraindo dados da tabela `Professor`
--

INSERT INTO `Professor` (`id`, `nome`, `email`, `celular`) VALUES
(1, 'Rogério Tessari', 'rogerio.tessari@bento.ifrs.edu.br', '(54) 91193737');

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

--
-- Extraindo dados da tabela `Professor_Turma`
--

INSERT INTO `Professor_Turma` (`id`, `professor_id`, `turma_id`) VALUES
(3, 1, 1);

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

--
-- Extraindo dados da tabela `Turma`
--

INSERT INTO `Turma` (`id`, `disciplina_id`, `descricao`) VALUES
(1, 1, 'DSII-2014'),
(2, 2, 'REDESII-2014');

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
-- Extraindo dados da tabela `Turma_Horarios`
--

INSERT INTO `Turma_Horarios` (`id`, `turma_id`, `horario_id`, `data`) VALUES
(1, 1, 1, '2014-05-07'),
(2, 1, 1, '2014-05-09'),
(3, 1, 1, '2014-05-14'),
(4, 1, 1, '2014-05-16'),
(5, 1, 1, '2014-05-28'),
(6, 1, 1, '2014-05-30');

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
