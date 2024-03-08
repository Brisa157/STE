/*
SQLyog Ultimate v9.10 
MySQL - 5.5.5-10.4.32-MariaDB : Database - db_itszo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_itszo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_itszo`;

/*Table structure for table `alumno` */

DROP TABLE IF EXISTS `alumno`;

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `numero_control` varchar(50) DEFAULT NULL,
  `nombre_completo` varchar(250) NOT NULL,
  `semestre` int(11) DEFAULT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `examen_seleccion` tinyint(4) DEFAULT NULL,
  `puntaje_seleccion` int(11) DEFAULT NULL,
  `certificado_bachillerato` text DEFAULT NULL,
  `certificado_calificacion` float DEFAULT NULL,
  `entrevista` tinyint(4) DEFAULT NULL,
  `carta_entregada` tinyint(4) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `is_alumno` tinyint(4) NOT NULL,
  `numero_ficha` int(11) DEFAULT NULL,
  `propedeutico_calificacion` float DEFAULT NULL,
  `total_ponderado` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id_alumno`),
  UNIQUE KEY `numero_control_UNIQUE` (`numero_control`),
  KEY `fk_id_carrera_idx` (`id_carrera`),
  KEY `fk_alumno_id_periodo_idx` (`id_periodo`),
  CONSTRAINT `fk_alumno_id_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_id_periodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `alumno` */

insert  into `alumno`(`id_alumno`,`numero_control`,`nombre_completo`,`semestre`,`id_carrera`,`id_periodo`,`examen_seleccion`,`puntaje_seleccion`,`certificado_bachillerato`,`certificado_calificacion`,`entrevista`,`carta_entregada`,`fecha_registro`,`is_alumno`,`numero_ficha`,`propedeutico_calificacion`,`total_ponderado`) values (1,'5645656','Lenin Ramos',1,1,1,1,100,'1',9,1,1,'2024-01-31',1,NULL,NULL,NULL),(2,'4565645','TestAlumno',1,1,1,1,100,'1',9,1,1,'2024-02-05',1,NULL,NULL,NULL);

/*Table structure for table `asigna_beca` */

DROP TABLE IF EXISTS `asigna_beca`;

CREATE TABLE `asigna_beca` (
  `id_asigna_beca` int(11) NOT NULL AUTO_INCREMENT,
  `semestre` int(11) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_beca` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  PRIMARY KEY (`id_asigna_beca`),
  KEY `fk_asigna_beca_id_alumno_idx` (`id_alumno`),
  KEY `fk_asigna_beca_id_beca_idx` (`id_beca`),
  KEY `fk_asigna_beca_id_periodo_idx` (`id_periodo`),
  CONSTRAINT `fk_asigna_beca_id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_asigna_beca_id_beca` FOREIGN KEY (`id_beca`) REFERENCES `beca` (`id_beca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asigna_beca_id_periodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `asigna_beca` */

insert  into `asigna_beca`(`id_asigna_beca`,`semestre`,`id_alumno`,`id_beca`,`id_periodo`) values (1,4,1,3,1);

/*Table structure for table `asistencia` */

DROP TABLE IF EXISTS `asistencia`;

CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_asistencia`),
  KEY `fk_asistencia_id_alumno_idx` (`id_alumno`),
  CONSTRAINT `fk_asistencia_id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `asistencia` */

/*Table structure for table `beca` */

DROP TABLE IF EXISTS `beca`;

CREATE TABLE `beca` (
  `id_beca` int(11) NOT NULL AUTO_INCREMENT,
  `beca` varchar(100) NOT NULL,
  PRIMARY KEY (`id_beca`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `beca` */

insert  into `beca`(`id_beca`,`beca`) values (1,'Superación Académica'),(2,'Inscripción'),(3,'Mejoramiento Académico'),(4,'Alto Desempeño'),(5,'Derecho De Trabajadores'),(6,'COZCYT'),(7,'Jóvenes Escribiendo El Futuro'),(8,'Alimentación');

/*Table structure for table `canalizacion` */

DROP TABLE IF EXISTS `canalizacion`;

CREATE TABLE `canalizacion` (
  `id_canalizacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_canalizacion`),
  KEY `fk_canalizacion_id_alumno_idx` (`id_alumno`),
  CONSTRAINT `fk_canalizacion_id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `canalizacion` */

/*Table structure for table `carrera` */

DROP TABLE IF EXISTS `carrera`;

CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `carrera` varchar(250) NOT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `carrera` */

insert  into `carrera`(`id_carrera`,`carrera`) values (1,'Ingeniería En Sistemas Computacionales');

/*Table structure for table `certificacion` */

DROP TABLE IF EXISTS `certificacion`;

CREATE TABLE `certificacion` (
  `id_certificaciones` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `certificado` text NOT NULL,
  `vigencia` varchar(45) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  PRIMARY KEY (`id_certificaciones`),
  KEY `fk_certificaciones_id_certificacion_idx` (`id_alumno`),
  KEY `fk_certificacion_id_periodo_idx` (`id_periodo`),
  CONSTRAINT `fk_certificacion_id_periodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_certificaciones_id_certificacion` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `certificacion` */

/*Table structure for table `credito` */

DROP TABLE IF EXISTS `credito`;

CREATE TABLE `credito` (
  `id_credito` int(11) NOT NULL AUTO_INCREMENT,
  `actividad` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `archivo` varchar(250) DEFAULT NULL,
  `tipo_credito` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_credito`),
  KEY `fk_credito_id_alumno_idx` (`id_alumno`),
  CONSTRAINT `fk_credito_id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `credito` */

/*Table structure for table `examen_raven` */

DROP TABLE IF EXISTS `examen_raven`;

CREATE TABLE `examen_raven` (
  `id_examen_raven` int(11) NOT NULL AUTO_INCREMENT,
  `puntaje` varchar(50) NOT NULL,
  `comentarios` text NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_examen_raven`),
  KEY `fk_examen_raven_id_alumno_idx` (`id_alumno`),
  CONSTRAINT `fk_examen_raven_id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `examen_raven` */

/*Table structure for table `ingles` */

DROP TABLE IF EXISTS `ingles`;

CREATE TABLE `ingles` (
  `id_ingles` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` int(11) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `curso_nivelacion` tinyint(4) DEFAULT NULL,
  `calificacion_curso_nivelacion` int(11) DEFAULT NULL,
  `calificacion_final` float DEFAULT NULL,
  `examen_ubicacion` tinyint(4) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_periodo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ingles`),
  KEY `fk_ingles_id_alumno_idx` (`id_alumno`),
  KEY `fk_ingles_id_periodo_idx` (`id_periodo`),
  CONSTRAINT `fk_ingles_id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ingles_id_periodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ingles` */

/*Table structure for table `investigacion` */

DROP TABLE IF EXISTS `investigacion`;

CREATE TABLE `investigacion` (
  `id_investigacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proyecto` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `id_tipo_participacion` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_investigacion`),
  KEY `fk_investigacion_id_alumno_idx` (`id_alumno`),
  KEY `fk_investigacion_id_tipo_participacion_idx` (`id_tipo_participacion`),
  CONSTRAINT `fk_investigacion_id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_investigacion_id_tipo_participacion` FOREIGN KEY (`id_tipo_participacion`) REFERENCES `tipo_participacion` (`id_tipo_participacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `investigacion` */

/*Table structure for table `movilidad` */

DROP TABLE IF EXISTS `movilidad`;

CREATE TABLE `movilidad` (
  `id_movilidad` int(11) NOT NULL AUTO_INCREMENT,
  `semestre` int(11) NOT NULL,
  `motivo` text NOT NULL,
  `institucion` varchar(250) NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_regreso` date NOT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_movilidad`),
  KEY `fk_movilidad_id_alumno_idx` (`id_alumno`),
  CONSTRAINT `fk_movilidad_id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `movilidad` */

/*Table structure for table `periodo` */

DROP TABLE IF EXISTS `periodo`;

CREATE TABLE `periodo` (
  `id_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `periodo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `periodo` */

insert  into `periodo`(`id_periodo`,`periodo`) values (1,'Agosto - Diciembre 2023'),(2,'Enero - Junio 2024'),(3,'Enero - Junio 2023');

/*Table structure for table `residencia` */

DROP TABLE IF EXISTS `residencia`;

CREATE TABLE `residencia` (
  `id_residencia` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `empresa` varchar(250) NOT NULL,
  `asesor_externo` varchar(250) NOT NULL,
  `asesor_interno` varchar(250) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_liberacion` date DEFAULT NULL,
  PRIMARY KEY (`id_residencia`),
  KEY `fk_residencia_id_alumno_idx` (`id_alumno`),
  CONSTRAINT `fk_residencia_id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `residencia` */

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `rol` */

insert  into `rol`(`id_rol`,`rol`) values (1,'Admin'),(2,'Jefatura'),(3,'Secretaria'),(4,'Beca'),(5,'Servicio Social'),(6,'Psicologia'),(7,'Residencias'),(8,'Extraescolares'),(9,'Ingles');

/*Table structure for table `semana_academica` */

DROP TABLE IF EXISTS `semana_academica`;

CREATE TABLE `semana_academica` (
  `id_semana_academica` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_regreso` date NOT NULL,
  `telefono_tutor` varchar(10) NOT NULL,
  `is_firmado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_semana_academica`),
  KEY `fk_semana_academica_id_alumno_idx` (`id_alumno`),
  CONSTRAINT `fk_semana_academica_id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `semana_academica` */

/*Table structure for table `servicio_social` */

DROP TABLE IF EXISTS `servicio_social`;

CREATE TABLE `servicio_social` (
  `id_servicio_social` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(250) NOT NULL,
  `asesor` varchar(250) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_liberacion` date DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_servicio_social`),
  KEY `fk_residencia_id_alumno_idx` (`id_alumno`),
  CONSTRAINT `fk_servicio_social_id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `servicio_social` */

/*Table structure for table `tipo_participacion` */

DROP TABLE IF EXISTS `tipo_participacion`;

CREATE TABLE `tipo_participacion` (
  `id_tipo_participacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_participacion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_tipo_participacion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tipo_participacion` */

insert  into `tipo_participacion`(`id_tipo_participacion`,`tipo_participacion`) values (1,'Curso Emprendedor'),(2,'Curso Investigación'),(3,'Ponencia'),(4,'Cartel');

/*Table structure for table `tutoria` */

DROP TABLE IF EXISTS `tutoria`;

CREATE TABLE `tutoria` (
  `id_tutoria` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `tutor` varchar(250) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  PRIMARY KEY (`id_tutoria`),
  KEY `fk_tutoria_id_alumno_idx` (`id_alumno`),
  KEY `fk_tutoria_id_periodo_idx` (`id_periodo`),
  CONSTRAINT `fk_tutoria_id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tutoria_id_periodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tutoria` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `contrasenia` varchar(20) NOT NULL,
  `nombre_completo` varchar(250) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_id_rol_idx` (`id_rol`),
  CONSTRAINT `fk_usuario_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`usuario`,`contrasenia`,`nombre_completo`,`id_rol`) values (1,'admin','12345','Admin',1),(2,'jefatura','12345','Jefatura',2),(3,'laura','12345','laura',3),(4,'beca','12345','Beca',4),(5,'serviciosocial','12345','Servicio Social',5),(6,'psicologia','12345','Psicología',6),(7,'residencia','12345','Residencia',7),(8,'extraescolares','12345','extraescolares',8),(9,'ingles','12345','ingles',9);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
