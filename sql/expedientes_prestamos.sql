/*
SQLyog Community v12.15 (64 bit)
MySQL - 5.5.53-0ubuntu0.14.04.1 : Database - expedientes
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`expedientes` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*Table structure for table `expedientes_prestamos` */

DROP TABLE IF EXISTS `expedientes_prestamos`;

CREATE TABLE `expedientes_prestamos` (
  `id_expediente_prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL,
  `id_persona` int(11) DEFAULT NULL COMMENT 'Persona a la que se presta',
  `fec_prestamo` datetime DEFAULT NULL,
  `fec_devolucion` datetime DEFAULT NULL,
  `aprobado` varchar(1) DEFAULT 'S' COMMENT 'S = Si, N = No',
  `autorizado_por` int(11) DEFAULT NULL COMMENT 'id_persona que autorizo',
  `documento` varchar(50) DEFAULT 'MEMORANDO' COMMENT 'MEMORANDUM, OFICIO',
  `numero_documento` varchar(50) DEFAULT NULL,
  `fec_documento` date DEFAULT NULL,
  PRIMARY KEY (`id_expediente_prestamo`),
  KEY `id_persona` (`id_persona`),
  KEY `id` (`id_expediente_prestamo`),
  CONSTRAINT `expedientes_prestamos_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `personal` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `expedientes_prestamos` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
