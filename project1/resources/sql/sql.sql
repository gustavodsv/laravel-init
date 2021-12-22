-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.26 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando dados para a tabela laravel1.todo: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `todo` DISABLE KEYS */;
INSERT INTO `todo` (`id`, `title`, `date`, `status`) VALUES
	(1, 'ACORDAR', '2021-12-16', 0),
	(2, 'Levantar da cama', '2021-12-16', 0),
	(3, 'Arrumar a cama', '2021-12-16', 0),
	(4, 'Escovar os dentes', '2021-12-16', 0),
	(11, 'Tomar café da manhã', '2021-12-16', 0),
	(12, 'Dormir o dia todo', '2021-12-17', 0);
/*!40000 ALTER TABLE `todo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
