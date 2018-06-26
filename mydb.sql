-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 18-Abr-2018 às 22:42
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_aluno`
--

DROP TABLE IF EXISTS `tbl_aluno`;
CREATE TABLE IF NOT EXISTS `tbl_aluno` (
  `RA` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `nome_disciplina` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`RA`)
) ENGINE=InnoDB AUTO_INCREMENT=2345235 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_aluno`
--

INSERT INTO `tbl_aluno` (`RA`, `nome`, `nome_disciplina`) VALUES
(12341, 'Aril', 'Teoria'),
(1425962, 'Koda', 'SO'),
(2345234, 'Danielle', 'Redes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_disciplina`
--

DROP TABLE IF EXISTS `tbl_disciplina`;
CREATE TABLE IF NOT EXISTS `tbl_disciplina` (
  `nome_disciplina` varchar(6) NOT NULL,
  `nome_professor` varchar(40) NOT NULL,
  `creditos` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_disciplina`
--

INSERT INTO `tbl_disciplina` (`nome_disciplina`, `nome_professor`, `creditos`) VALUES
('SO', 'ANderson', 60),
('REDES', 'SAUL', 40),
('Teoria', 'Rodrigo', 60);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
