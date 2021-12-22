-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.36 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para seguranca_auditoria
DROP DATABASE IF EXISTS `seguranca_auditoria`;
CREATE DATABASE IF NOT EXISTS `seguranca_auditoria` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `seguranca_auditoria`;

-- Copiando estrutura para tabela seguranca_auditoria.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `cpf` varbinary(128) DEFAULT NULL,
  `salt` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela seguranca_auditoria.usuario: ~2 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `user`, `pass`, `cpf`, `salt`) VALUES
	(1, 'chris', '50bbe7e6097ccba220de397c4fc79280', _binary 0x6c8f4a25893cac99670c063f77350d325c4fb3b6cdbef72b29d4cafc0fa6a153c9c8406c4946ac41c84c29016a5876be, '6517b555a8d77c12b6a08e7c7b125eb7fcd4a769d0cbb0d202683f6f87d187c10d2a7294836d3f9c41d71e3abae2773827aaff223427cc45304d6c8967f369d2'),
	(2, 'christian', 'c3729cf5e5929c474873559384c4fce2', _binary 0x9b00ba1cdbd95aa037049562350843bdce89f00eb0e0e5e9d306160c37a6292ac9c8406c4946ac41c84c29016a5876be, 'f4f56f092250698f06c699011dc1447328aa542ad375d288068c7858f258a17414ec7cc8db711ec1cd54440f13fa6a3509561f58b2ae3dd716d44249eb389258'),
	(3, 'danilo', '79ee431fbc453c39141ef2685068d773', _binary 0x9c55137c6d900fda868e50d37772da6156ceff0ec5b70adec307130d989996cec9c8406c4946ac41c84c29016a5876be, 'cbee507510030de77001a49c930d8667a0da335041473139075cdb760a186f495e90259a1ba5ca8de9ca1dc17fa667d3ad978aa2b9a2e1571b8dcf518160051f');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
