-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Abr-2014 às 00:37
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `heliotermico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `angulacao_espelho`
--

CREATE TABLE IF NOT EXISTS `angulacao_espelho` (
  `idangulacao_espelho` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `angulacao_espelho` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idangulacao_espelho`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `angulacao_espelho`
--

INSERT INTO `angulacao_espelho` (`idangulacao_espelho`, `angulacao_espelho`) VALUES
(1, '10'),
(2, '20'),
(3, '25'),
(4, '30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `incidencia_solar`
--

CREATE TABLE IF NOT EXISTS `incidencia_solar` (
  `idincidencia_solar` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricaoincidencia_solar` double DEFAULT NULL,
  PRIMARY KEY (`idincidencia_solar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `incidencia_solar`
--

INSERT INTO `incidencia_solar` (`idincidencia_solar`, `descricaoincidencia_solar`) VALUES
(1, 0.05),
(2, 0.08),
(3, 0.1),
(4, 0.01);

-- --------------------------------------------------------

--
-- Estrutura da tabela `monitoramento`
--

CREATE TABLE IF NOT EXISTS `monitoramento` (
  `idmonitoramento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `angulacao_espelho_idangulacao_espelho` int(10) unsigned NOT NULL,
  `incidencia_solar_idincidencia_solar` int(10) unsigned NOT NULL,
  `temperatura_coletor_idtemperatura_coleto` int(10) unsigned NOT NULL,
  `descricaomonitoramento` varchar(255) DEFAULT NULL,
  `data_monitoramento` date DEFAULT NULL,
  `hora_monitoramento` time DEFAULT NULL,
  PRIMARY KEY (`idmonitoramento`),
  KEY `monitoramento_FKIndex1` (`temperatura_coletor_idtemperatura_coleto`),
  KEY `monitoramento_FKIndex2` (`incidencia_solar_idincidencia_solar`),
  KEY `monitoramento_FKIndex3` (`angulacao_espelho_idangulacao_espelho`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `monitoramento`
--

INSERT INTO `monitoramento` (`idmonitoramento`, `angulacao_espelho_idangulacao_espelho`, `incidencia_solar_idincidencia_solar`, `temperatura_coletor_idtemperatura_coleto`, `descricaomonitoramento`, `data_monitoramento`, `hora_monitoramento`) VALUES
(1, 1, 1, 1, 'monitoramento teste 1', '2014-04-25', '18:00:00'),
(2, 2, 2, 2, 'monitoramento teste 2', '2014-04-25', '19:00:00'),
(3, 3, 3, 3, 'monitoramento teste 3', '2014-04-25', '17:00:00'),
(4, 4, 4, 4, 'monitoramento teste 4', '2014-04-25', '20:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `temperatura_coletor`
--

CREATE TABLE IF NOT EXISTS `temperatura_coletor` (
  `idtemperatura_coleto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `temperatura_coletor` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`idtemperatura_coleto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `temperatura_coletor`
--

INSERT INTO `temperatura_coletor` (`idtemperatura_coleto`, `temperatura_coletor`) VALUES
(1, '10'),
(2, '15'),
(3, '6'),
(4, '20');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `monitoramento`
--
ALTER TABLE `monitoramento`
  ADD CONSTRAINT `monitoramento_ibfk_1` FOREIGN KEY (`temperatura_coletor_idtemperatura_coleto`) REFERENCES `temperatura_coletor` (`idtemperatura_coleto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `monitoramento_ibfk_2` FOREIGN KEY (`incidencia_solar_idincidencia_solar`) REFERENCES `incidencia_solar` (`idincidencia_solar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `monitoramento_ibfk_3` FOREIGN KEY (`angulacao_espelho_idangulacao_espelho`) REFERENCES `angulacao_espelho` (`idangulacao_espelho`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
