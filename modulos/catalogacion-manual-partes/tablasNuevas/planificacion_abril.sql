/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 8.0.12 : Database - planificacion_abril
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`planificacion_abril` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `planificacion_abril`;

/*Table structure for table `files_upload` */

DROP TABLE IF EXISTS `files_upload`;

CREATE TABLE `files_upload` (
  `id_files_upload` int(11) NOT NULL AUTO_INCREMENT,
  `archivo` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `id_categoria` varchar(30) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `id_subfile` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_files_upload`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

/*Data for the table `files_upload` */

insert  into `files_upload`(`id_files_upload`,`archivo`,`id_categoria`,`id_subfile`) values 
(1,'retroexcabadora.jpg','Z80',1),
(2,'retroexcabadoracabina.jpg','Z80',1),
(3,'generico.jpg','HAE 250',1),
(4,'generico.jpg','24M',1),
(5,'palamecanica.jpg','16M',1),
(6,'camionminero.jpg','797F',1);

/*Table structure for table `mapeo_files` */

DROP TABLE IF EXISTS `mapeo_files`;

CREATE TABLE `mapeo_files` (
  `id_mapeo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usemap` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `href_link` varchar(350) COLLATE utf8_spanish_ci DEFAULT NULL,
  `coordenadas` text COLLATE utf8_spanish_ci,
  `shape` varchar(16) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigo_archivo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_mapeo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `mapeo_files` */

insert  into `mapeo_files`(`id_mapeo`,`titulo`,`usemap`,`href_link`,`coordenadas`,`shape`,`codigo_archivo`) values 
(1,'Cabina','mapretroex','http://localhost/JPMODULAR/main/lista-equipo/797f','331,168,328,188,334,197,334,224,318,260,314,293,308,319,322,308,359,305,391,305,421,313,442,335,461,358,476,370,512,368,514,317,513,285,534,279,547,267,526,217,519,187,486,168','poly','1'),
(2,'Motor','mapretroex','http://localhost/JPMODULAR/main/lista-equipo/Z80','529,304,546,283,600,284,670,303,702,369,704,409,646,396,609,398,588,421,577,456,494,458,484,429,479,391,478,374,524,373','poly','1');

/*Table structure for table `partes_equipos` */

DROP TABLE IF EXISTS `partes_equipos`;

CREATE TABLE `partes_equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_parte_equipo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_parte` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo_segmento` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ficha_tecnica` blob,
  `cod_equipo` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `partes_equipos` */

insert  into `partes_equipos`(`id`,`codigo_parte_equipo`,`nombre_parte`,`titulo_segmento`,`ficha_tecnica`,`cod_equipo`) values 
(1,'A103CTimon','Timon','cabina','{\"Diametro\":\"45cm\",\"Marca\":\"Caterpillar\",\"Calidad\":\"alta\",\"Resistencia\":\"1000bar\"}','Z80'),
(2,'A103CPuerta','Puerta','cabina','{\"Area\":\"185cm x 75cm\",\"Material\":\"Vidrio templado Granulado\",\"Manubrio\":\"Metalico Negro\",\"Marca\":\"Komatsu\"}','Z80');

/*Table structure for table `tipo_files` */

DROP TABLE IF EXISTS `tipo_files`;

CREATE TABLE `tipo_files` (
  `id_tipo_files` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_tipo_files`)
) ENGINE=MEMORY AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `tipo_files` */

insert  into `tipo_files`(`id_tipo_files`,`nombre`) values 
(1,'imagen'),
(2,'PDF');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
