-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.5.24-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              7.0.0.4390
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para sahara
CREATE DATABASE IF NOT EXISTS `sahara` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sahara`;


-- Copiando estrutura para tabela sahara.shr_banners
DROP TABLE IF EXISTS `shr_banners`;
CREATE TABLE IF NOT EXISTS `shr_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) NOT NULL,
  `imagem` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sahara.shr_banners: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `shr_banners` DISABLE KEYS */;
INSERT INTO `shr_banners` (`id`, `descricao`, `imagem`) VALUES
	(5, 'Sahara', 'banner/sahara.png'),
	(6, 'Ayrton', 'banner/ayrton.png'),
	(7, 'Deserto', 'banner/deserto.png');
/*!40000 ALTER TABLE `shr_banners` ENABLE KEYS */;


-- Copiando estrutura para tabela sahara.shr_conteudos
DROP TABLE IF EXISTS `shr_conteudos`;
CREATE TABLE IF NOT EXISTS `shr_conteudos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sahara.shr_conteudos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `shr_conteudos` DISABLE KEYS */;
INSERT INTO `shr_conteudos` (`id`, `titulo`, `texto`) VALUES
	(1, 'Sobre', '<pre>\r\nhttp://profac.org/geoprofac/admin.php?modulo=daemon&acao=add&lat=%LAT&lng=%LON&anotacao=%DESC&satelites=%SAT&altitude=%ALT&speed=%SPD&precisao=%ACC&direcao=%DIR&provedor=%PROV&dta=%TIME&battery=%BATT&androidid=%AID&serial=%SER&hash=36b160a0ea\r\n\r\n\r\n\r\nhttp://profac.org/geoprofac/admin.php\r\nmodulo=Daemon\nacao=add\nlat=%LAT\nlng=%LON\nanotacao=%DESC\nsatelites=%SAT\naltitude=%ALT\nspeed=%SPD\nprecisao=%ACC\ndirecao=%DIR\nprovedor=%PROV\ndta=%TIME\nbattery=%BATT\nandroidid=%AID\nserial=%SER\r\nhash=36b160a0ea\r\n\r\n</pre>\r\n\r\n<a href="http://profac.org/geoprofac/admin.php\r\nmodulo=Daemon\nacao=add\nlat=%LAT\nlng=%LON\nanotacao=%DESC\nsatelites=%SAT\naltitude=%ALT\nspeed=%SPD\nprecisao=%ACC\ndirecao=%DIR\nprovedor=%PROV\ndta=%TIME\nbattery=%BATT\nandroidid=%AID\nserial=%SER\r\nhash=36b160a0ea">Link Direto</a>');
/*!40000 ALTER TABLE `shr_conteudos` ENABLE KEYS */;


-- Copiando estrutura para tabela sahara.shr_funcionarios
DROP TABLE IF EXISTS `shr_funcionarios`;
CREATE TABLE IF NOT EXISTS `shr_funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `prf_id` varchar(10) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `funcionarios_fk` (`prf_id`),
  CONSTRAINT `funcionarios_fk` FOREIGN KEY (`prf_id`) REFERENCES `shr_perfis` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sahara.shr_funcionarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `shr_funcionarios` DISABLE KEYS */;
INSERT INTO `shr_funcionarios` (`id`, `email`, `prf_id`, `nome`, `senha`) VALUES
	(1, 'admin', 'admin', 'Administrador', 'e10adc3949ba59abbe56e057f20f883e'),
	(2, 'tarcio', 'admin', 'Tarcio', 'e10adc3949ba59abbe56e057f20f883e'),
	(3, 'tarcio.net@gmail.com', 'admin', 'Tarcio.net', 'e10adc3949ba59abbe56e057f20f883e'),
	(4, 'fulano2@gmail.com', 'admin', 'Fulano2', 'e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `shr_funcionarios` ENABLE KEYS */;


-- Copiando estrutura para tabela sahara.shr_menus
DROP TABLE IF EXISTS `shr_menus`;
CREATE TABLE IF NOT EXISTS `shr_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prf_id` varchar(10) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_fk` (`prf_id`),
  CONSTRAINT `menus_fk` FOREIGN KEY (`prf_id`) REFERENCES `shr_perfis` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sahara.shr_menus: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `shr_menus` DISABLE KEYS */;
INSERT INTO `shr_menus` (`id`, `prf_id`, `descricao`, `link`) VALUES
	(1, 'front', 'Início', 'index.php'),
	(3, 'front', 'Entrar', 'admin.php'),
	(9, 'admin', 'Rastreamentos', 'admin.php?modulo=Rastreamentos&acao=gerenciar'),
	(10, 'admin', 'Última Localização', 'admin.php?modulo=Rastreamentos&acao=ultimo'),
	(11, 'admin', 'Rotas', 'admin.php?modulo=Rastreamentos&acao=rota'),
	(12, 'admin', 'Banners', 'admin.php?modulo=Banners&acao=gerenciar'),
	(13, 'admin', 'Menus', 'admin.php?modulo=Menus&acao=gerenciar'),
	(14, 'admin', 'Usuários', 'admin.php?modulo=Funcionarios&acao=gerenciar'),
	(15, 'admin', 'Ajuda', 'admin.php?modulo=Conteudos&acao=exibir&id=1');
/*!40000 ALTER TABLE `shr_menus` ENABLE KEYS */;


-- Copiando estrutura para tabela sahara.shr_perfis
DROP TABLE IF EXISTS `shr_perfis`;
CREATE TABLE IF NOT EXISTS `shr_perfis` (
  `id` varchar(10) NOT NULL,
  `descricao` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sahara.shr_perfis: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `shr_perfis` DISABLE KEYS */;
INSERT INTO `shr_perfis` (`id`, `descricao`) VALUES
	('admin', 'Admin'),
	('front', 'Frontend');




-- Copiando estrutura para tabela sahara.shr_gpslogger
CREATE TABLE IF NOT EXISTS `shr_gpslogger` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `lat` varchar(50) NOT NULL,
  `lng` varchar(50) NOT NULL,
  `alt` varchar(50) DEFAULT NULL,
  `dta` datetime NOT NULL,
  `speed` varchar(50) DEFAULT NULL,
  `battery` tinyint(3) unsigned DEFAULT NULL,
  `satelites` varchar(50) DEFAULT NULL,
  `precisao` varchar(50) DEFAULT NULL,
  `direcao` varchar(50) DEFAULT NULL,
  `provedor` varchar(50) DEFAULT NULL,
  `androidid` varchar(50) DEFAULT NULL,
  `serial` varchar(50) DEFAULT NULL,
  `anotacao` varchar(50) DEFAULT NULL,
  `distancia` double DEFAULT NULL COMMENT 'Distancia do ultimo ponto conhecido',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

/*!40000 ALTER TABLE `shr_perfis` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
