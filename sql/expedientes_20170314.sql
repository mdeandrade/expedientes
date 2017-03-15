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

/*Table structure for table `cargos` */

DROP TABLE IF EXISTS `cargos`;

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cargo` varchar(50) DEFAULT NULL,
  `id_estatus` int(1) DEFAULT '1',
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `cargos` */

insert  into `cargos`(`id_cargo`,`nom_cargo`,`id_estatus`) values 
(1,'Obrero',1),
(2,'Asistente Administrativo',1),
(3,'Técnico',1),
(4,'Analista',1),
(5,'Coordinador',1),
(6,'Jefe',1),
(7,'Director',1),
(8,'Sub-Contralor (a) del Área Metropolitana de Carcas',1),
(9,'Contralor (a) del Área Metropolitana de Carcas',1);

/*Table structure for table `estatus` */

DROP TABLE IF EXISTS `estatus`;

CREATE TABLE `estatus` (
  `id_estatus` int(11) NOT NULL,
  `nom_estatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `estatus` */

insert  into `estatus`(`id_estatus`,`nom_estatus`) values 
(0,'Deshabilitado'),
(1,'Habilitado'),
(2,'Prestado');

/*Table structure for table `expedientes` */

DROP TABLE IF EXISTS `expedientes`;

CREATE TABLE `expedientes` (
  `id_expediente` int(11) NOT NULL AUTO_INCREMENT,
  `cod_expediente` varchar(50) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `id_estatus` int(11) DEFAULT '1',
  `fec_creacion` date DEFAULT NULL,
  PRIMARY KEY (`id_expediente`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `expedientes_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personal` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `expedientes` */

insert  into `expedientes`(`id_expediente`,`cod_expediente`,`id_persona`,`id_estatus`,`fec_creacion`) values 
(1,'V-19195437',1,1,'2017-03-14'),
(2,'V-18020594',2,1,'2017-03-14');

/*Table structure for table `expedientes_detalles` */

DROP TABLE IF EXISTS `expedientes_detalles`;

CREATE TABLE `expedientes_detalles` (
  `id_expediente` int(11) NOT NULL,
  `id_folio` int(11) NOT NULL,
  `id_tipdoc` int(11) NOT NULL,
  `ubi_docserver` varchar(100) NOT NULL,
  `fec_creado` date DEFAULT NULL,
  `id_estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_expediente`,`id_folio`,`id_tipdoc`,`ubi_docserver`),
  KEY `id_folio` (`id_folio`),
  CONSTRAINT `expedientes_detalles_ibfk_1` FOREIGN KEY (`id_expediente`) REFERENCES `expedientes` (`id_expediente`),
  CONSTRAINT `expedientes_detalles_ibfk_2` FOREIGN KEY (`id_folio`) REFERENCES `folios` (`id_folio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `expedientes_detalles` */

insert  into `expedientes_detalles`(`id_expediente`,`id_folio`,`id_tipdoc`,`ubi_docserver`,`fec_creado`,`id_estatus`) values 
(1,3,20,'//ANTIGUEDAD/antecedenteservicios_0.doc','2017-03-14',1);

/*Table structure for table `expedientes_prestamos` */

DROP TABLE IF EXISTS `expedientes_prestamos`;

CREATE TABLE `expedientes_prestamos` (
  `id_expediente_prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediente` int(11) NOT NULL,
  `id_persona` int(11) DEFAULT NULL COMMENT 'Persona a la que se presta',
  `fec_prestamo` datetime DEFAULT NULL,
  `fec_devolucion` datetime DEFAULT NULL,
  `aprobado` varchar(1) DEFAULT 'S' COMMENT 'S = Si, N = No',
  `autorizado_por` int(11) DEFAULT NULL COMMENT 'id_persona que autorizooooooooo',
  `documento` varchar(50) DEFAULT 'MEMORANDO' COMMENT 'MEMORANDUM, OFICIO',
  `numero_documento` varchar(50) DEFAULT NULL,
  `fec_documento` date DEFAULT NULL,
  PRIMARY KEY (`id_expediente_prestamo`),
  KEY `id_persona` (`id_persona`),
  KEY `id` (`id_expediente_prestamo`),
  CONSTRAINT `expedientes_prestamos_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `personal` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `expedientes_prestamos` */

/*Table structure for table `folios` */

DROP TABLE IF EXISTS `folios`;

CREATE TABLE `folios` (
  `id_folio` int(11) NOT NULL AUTO_INCREMENT,
  `nom_folio` varchar(50) DEFAULT NULL,
  `des_folio` varchar(50) DEFAULT NULL,
  `archivo` varchar(50) DEFAULT NULL,
  `id_estatus` int(1) DEFAULT '1',
  PRIMARY KEY (`id_folio`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `folios` */

insert  into `folios`(`id_folio`,`nom_folio`,`des_folio`,`archivo`,`id_estatus`) values 
(1,'DOCUMENTOS_PERSONALES','Documentos personales','documentos_personales.php',1),
(2,'FORMACION_ACADEMICA','Formación académica','formacion_academica.php',1),
(3,'ANTIGUEDAD','Antigüedad','antiguedad.php',1),
(4,'BENEFICIOS_SOCIOECONOMICOS','Beneficios socio-económicos','beneficios_socioeconomicos.php',1),
(5,'FIDEICOMISO','Fideicomiso','fideicomiso.php',1),
(6,'AUSENCIAS','Ausencias','ausencias.php',1),
(7,'SEGURO_SOCIAL_OBLIGATORIO','Seguro social obligatorio','seguro_social.php',1),
(8,'VARIOS','Varios','varios.php',1);

/*Table structure for table `folios_tipos_documentos` */

DROP TABLE IF EXISTS `folios_tipos_documentos`;

CREATE TABLE `folios_tipos_documentos` (
  `id_folio` int(11) NOT NULL,
  `id_tipdoc` int(11) NOT NULL,
  `orden` int(11) DEFAULT NULL,
  `id_estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_folio`,`id_tipdoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `folios_tipos_documentos` */

insert  into `folios_tipos_documentos`(`id_folio`,`id_tipdoc`,`orden`,`id_estatus`) values 
(1,1,1,1),
(1,2,1,1),
(1,3,1,1),
(1,4,1,1),
(1,5,1,1),
(1,6,1,1),
(1,7,1,1),
(1,8,1,1),
(1,9,1,1),
(1,10,1,1),
(1,11,1,1),
(1,12,1,1),
(1,13,1,1),
(1,14,1,1),
(1,15,1,1),
(2,16,1,1),
(2,17,1,1),
(2,18,1,1),
(2,19,1,1),
(3,20,1,1),
(3,21,1,1),
(4,22,1,1),
(4,23,1,1),
(4,24,1,1),
(4,25,1,1),
(4,26,1,1),
(4,27,1,1),
(5,28,1,1),
(5,29,1,1),
(5,30,1,1),
(6,31,1,1),
(6,32,1,1),
(6,33,1,1),
(6,34,1,1),
(7,35,1,1),
(7,36,1,1),
(7,37,1,1),
(7,38,1,1),
(8,39,1,1),
(8,40,1,1),
(8,41,1,1),
(8,42,1,1),
(8,43,1,1);

/*Table structure for table `grupos` */

DROP TABLE IF EXISTS `grupos`;

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_grupo` varchar(50) DEFAULT NULL,
  `insertar` varchar(1) DEFAULT 'S',
  `actualizar` varchar(1) DEFAULT 'S',
  `eliminar` varchar(1) DEFAULT 'S',
  `fec_creado` date DEFAULT NULL,
  `id_estatus` int(11) DEFAULT '1',
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `grupos` */

insert  into `grupos`(`id_grupo`,`nom_grupo`,`insertar`,`actualizar`,`eliminar`,`fec_creado`,`id_estatus`) values 
(1,'Administradores','S','S','S',NULL,1),
(2,'Recursos humanos','S','S','S',NULL,1),
(3,'Usuarios','S','S','S',NULL,1),
(4,'Tecnología','S','S','S',NULL,1);

/*Table structure for table `personal` */

DROP TABLE IF EXISTS `personal`;

CREATE TABLE `personal` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `fec_nac` date DEFAULT NULL,
  `tip_dociden` varchar(20) DEFAULT 'CED',
  `doc_iden` varchar(20) DEFAULT NULL,
  `id_ubicacion` int(11) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `id_estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `id_ubicacion` (`id_ubicacion`),
  KEY `id_cargo` (`id_cargo`),
  CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicaciones` (`id_ubicacion`),
  CONSTRAINT `personal_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `personal` */

insert  into `personal`(`id_persona`,`nombres`,`apellidos`,`sexo`,`fec_nac`,`tip_dociden`,`doc_iden`,`id_ubicacion`,`id_cargo`,`id_estatus`) values 
(1,'DENINSON','CABEZA','M','1989-10-04','CED','V-19195437',9,1,1),
(2,'MARCOS','DE ANDRADE','M','2017-03-14','CED','V-18020594',1,1,1);

/*Table structure for table `tipo_grupos` */

DROP TABLE IF EXISTS `tipo_grupos`;

CREATE TABLE `tipo_grupos` (
  `id_tip_grupo` int(11) NOT NULL,
  `nombre_tip_grupo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tip_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipo_grupos` */

insert  into `tipo_grupos`(`id_tip_grupo`,`nombre_tip_grupo`) values 
(1,'Administrador'),
(2,'Usuario');

/*Table structure for table `tipos_documentos` */

DROP TABLE IF EXISTS `tipos_documentos`;

CREATE TABLE `tipos_documentos` (
  `id_tipdoc` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tipdoc` varchar(100) DEFAULT NULL,
  `nom_variable` varchar(50) DEFAULT NULL,
  `id_estatus` int(11) DEFAULT NULL,
  `multiple` varchar(1) DEFAULT 'N',
  PRIMARY KEY (`id_tipdoc`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

/*Data for the table `tipos_documentos` */

insert  into `tipos_documentos`(`id_tipdoc`,`nom_tipdoc`,`nom_variable`,`id_estatus`,`multiple`) values 
(1,'Oferta de servicio ','oferta',1,'N'),
(2,'Currículo Vitae','curriculo',1,'N'),
(3,'Evaluación de los Requisitos Mínimos del Cargo','evaluacionrequisitos',1,'N'),
(4,'Punto de Cuenta aprobado (ingreso)','ingreso',1,'N'),
(5,'Resolución','resolucion',1,'N'),
(6,'Acta de Juramentación de Toma de Posesión','tomaposesion',1,'N'),
(7,'Notificación de la Designación','notificaciondesignacion',1,'N'),
(8,'Notificación de las Políticas y Normas de la Contraloría Metropolitana de Caracas','notificacionpoliticas',1,'N'),
(9,'Resultado del Registro de Inhabilitados','registroinhabilitados',1,'N'),
(10,'Amonestaciones','amonestaciones',1,'N'),
(11,'Ascensos','ascensos',1,'N'),
(12,'Reenganche','reenganche',1,'N'),
(13,'Traslado de Unidad (Dirección)','trasladounidad',1,'N'),
(14,'Documentos relativos al egreso del trabajor','documentosegreso',1,'N'),
(15,'Liquidación de Prestaciones Sociales ','liquidacionprestaciones',1,'N'),
(16,'Títulos','titulos',1,'S'),
(17,'Certificados de Cursos y/o Talleres','certificadoscursos',1,'S'),
(18,'Pasantias','pasantias',1,'S'),
(19,'Cualquier otra informacion relacionada a estudios (Conferencias, Seminarios, charlas, entre otros..','cualquierotraestudios',1,'S'),
(20,'Antecedentes de Servicio','antecedenteservicios',1,'S'),
(21,'Constancias de Trabajos Anteriores','constanciastrabajosanteriores',1,'S'),
(22,'Caja de Ahorros','cajaahorros',1,'S'),
(23,'Fondo Especial de Jubilaciones','fondoespecial',1,'S'),
(24,'Seguros H.C.M. ','seguroshcm',1,'S'),
(25,'Copia de Cédula de Identidad (Trabajador, Padre e Hijos) ','copiafamiliares',1,'S'),
(26,'Partidas de Nacimiento (Trabajador, Padre e Hijos) ','partidasnacimiento',1,'S'),
(27,'Acta de Matrimonio y/o Concubinato','actamatrimonio',1,'S'),
(28,'Oficio de Apertura de Cuenta del Fideicomiso ','oficioaperturafideicomiso',1,'N'),
(29,'Anticipos de Prestaciones Sociales','anticiposprestaciones',1,'S'),
(30,'Documentos probatorios de adelantos de Prestaciones','documentosprobatorios',1,'S'),
(31,'Inasistencia','inasistencias',1,'S'),
(32,'Permisos','permisos',1,'S'),
(33,'Reposos','reposos',1,'S'),
(34,'Vacaciones','vacaciones',1,'S'),
(35,'Forma 14-02, Registro del Trabajador (Ingreso)','formaingreso',1,'N'),
(36,'Forma 14-03, Constacia de Egreso del Trabajador','constanciaegreso',1,'N'),
(37,'Forma 14-100, Constacia del Trabajador para el IVSS','constanciaivss',1,'N'),
(38,'Cualquier otra información relacionada al IVSS','constanciaotraivss',1,'S'),
(39,'Declaración Jurada de Patrimonio','declaracionjurada',1,'N'),
(40,'Copia del RIF del Trabajador','copiarif',1,'N'),
(41,'Planilla ARI (Impuesto sobre la Renta) ','ari',1,'S'),
(42,'Comprobante de Retención ARC - ISRL','comprobantearc',1,'S'),
(43,'Notificaciones Varias','notificacionesvarias',1,'S');

/*Table structure for table `ubicaciones` */

DROP TABLE IF EXISTS `ubicaciones`;

CREATE TABLE `ubicaciones` (
  `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ubicacion` varchar(100) DEFAULT NULL,
  `id_estatus` int(1) DEFAULT '1',
  PRIMARY KEY (`id_ubicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `ubicaciones` */

insert  into `ubicaciones`(`id_ubicacion`,`nom_ubicacion`,`id_estatus`) values 
(1,'DESPACHO DEL CONTRALOR METROPOLITANO DE CARACAS',1),
(2,'DESPACHO DEL SUB CONTRALOR METROPOLITANO DE CARACA',1),
(3,'UNIDAD DE AUDITORÍA INTERNA',1),
(4,'OFICINA DE ATENCIÓN CIUDADANA',1),
(5,'DIRECCIÓN DE ADMINISTRACIÓN',1),
(6,'DIRECCIÓN DE CONSULTORÍA JURÍDICA',1),
(7,'DIRECCIÓN DE PLANIFICACIÓN PRESUPUESTO Y CONTROL DE GESTIÓN',1),
(8,'DIRECCIÓN DE RECURSOS HUMANOS',1),
(9,'DIRECCIÓN DE TECNOLOGÍA DE INFORMACIÓN',1),
(10,'DIRECCIÓN DE CONTROL DE LA ADMINISTRACIÓN CENTRALIZADA',1),
(11,'DIRECCIÓN DE CONTROL DE LA ADMINISTRACIÓN DESCENTRALIZADA',1);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) DEFAULT NULL,
  `id_persona` int(11) NOT NULL,
  `nom_usuario` varchar(50) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  `id_estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personal` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`id_persona`,`nom_usuario`,`clave`,`id_grupo`,`id_estatus`) values 
(1,1,'DCABEZA','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',1,1),
(2,2,'MDEANDRADE','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',2,1);

/*Table structure for table `usuarios_grupos` */

DROP TABLE IF EXISTS `usuarios_grupos`;

CREATE TABLE `usuarios_grupos` (
  `id_persona` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `status` varchar(3) DEFAULT NULL,
  `fec_creado` date DEFAULT NULL,
  PRIMARY KEY (`id_persona`,`id_grupo`),
  KEY `id_grupo` (`id_grupo`),
  CONSTRAINT `usuarios_grupos_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personal` (`id_persona`),
  CONSTRAINT `usuarios_grupos_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usuarios_grupos` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
