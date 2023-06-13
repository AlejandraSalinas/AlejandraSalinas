-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.32 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para registro_control
CREATE DATABASE IF NOT EXISTS `registro_control` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `registro_control`;

-- Volcando estructura para tabla registro_control.accesorios
CREATE TABLE IF NOT EXISTS `accesorios` (
  `id_accesorios` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcon` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_accesorios`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.accesorios: ~2 rows (aproximadamente)
INSERT INTO `accesorios` (`id_accesorios`, `nombre`, `descripcon`) VALUES
	(1, 'Cargador', NULL),
	(2, 'Mouse', NULL),
	(3, 'Teclado', NULL);

-- Volcando estructura para tabla registro_control.color
CREATE TABLE IF NOT EXISTS `color` (
  `id_color` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.color: ~2 rows (aproximadamente)
INSERT INTO `color` (`id_color`, `nombre`, `descripcion`) VALUES
	(1, 'Blanco', NULL),
	(2, 'Gris', NULL),
	(3, 'Negro', NULL);

-- Volcando estructura para tabla registro_control.dispositivos
CREATE TABLE IF NOT EXISTS `dispositivos` (
  `id_dispositivo` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` bigint unsigned NOT NULL,
  `id_tipo_dispositivo` bigint unsigned NOT NULL,
  `id_marca` bigint unsigned NOT NULL,
  `id_color` bigint unsigned NOT NULL,
  `serie` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_dispositivo`) USING BTREE,
  KEY `FK_dispositivos_tipo_dispositivos` (`id_tipo_dispositivo`),
  KEY `FK_dispositivos_marcas` (`id_marca`),
  KEY `FK_dispositivos_color` (`id_color`),
  KEY `FK_dispositivos_personas` (`id_persona`),
  CONSTRAINT `FK_dispositivos_color` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`),
  CONSTRAINT `FK_dispositivos_marcas` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`),
  CONSTRAINT `FK_dispositivos_personas` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`),
  CONSTRAINT `FK_dispositivos_tipo_dispositivos` FOREIGN KEY (`id_tipo_dispositivo`) REFERENCES `tipo_dispositivos` (`id_tipo_dispositivo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.dispositivos: ~1 rows (aproximadamente)
INSERT INTO `dispositivos` (`id_dispositivo`, `id_persona`, `id_tipo_dispositivo`, `id_marca`, `id_color`, `serie`, `descripcion`) VALUES
	(1, 1, 2, 1, 3, 'CR57', 'PORTATIL ROJO CON NEGRO 32GB DE RAM 2.5TB M.2');

-- Volcando estructura para tabla registro_control.ingresar
CREATE TABLE IF NOT EXISTS `ingresar` (
  `id_ingresar` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` bigint unsigned NOT NULL,
  `id_registro_dispositivos` bigint unsigned NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL,
  PRIMARY KEY (`id_ingresar`),
  KEY `FK_ingresar_personas` (`id_persona`),
  KEY `FK_ingresar_dispositivos` (`id_registro_dispositivos`),
  CONSTRAINT `FK_ingresar_dispositivos` FOREIGN KEY (`id_registro_dispositivos`) REFERENCES `dispositivos` (`id_dispositivo`),
  CONSTRAINT `FK_ingresar_personas` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.ingresar: ~0 rows (aproximadamente)
INSERT INTO `ingresar` (`id_ingresar`, `id_persona`, `id_registro_dispositivos`, `fecha_entrada`, `fecha_salida`) VALUES
	(1, 1, 1, '2023-06-07 18:54:18', '2023-06-07 22:55:22');

-- Volcando estructura para tabla registro_control.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_marca`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.marcas: ~8 rows (aproximadamente)
INSERT INTO `marcas` (`id_marca`, `nombre`, `descripcion`) VALUES
	(1, 'Acer', NULL),
	(2, 'Apple', NULL),
	(3, 'Asus', NULL),
	(4, 'Dell', NULL),
	(5, 'HP', NULL),
	(6, 'Lenovo', NULL),
	(7, 'Microsoft Surface', NULL),
	(8, 'Razer', NULL),
	(9, 'Samsung', NULL);

-- Volcando estructura para tabla registro_control.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `id_persona` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_rol` bigint unsigned NOT NULL,
  `id_tipo_identificacion` bigint unsigned NOT NULL,
  `numero_identificacion` varchar(45) NOT NULL,
  `primer_nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `segundo_nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `primer_apellido` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `segundo_apellido` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_sexo` bigint unsigned NOT NULL DEFAULT '0' COMMENT '1 H, 2 M',
  `telefono` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `direccion` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `foto` longtext,
  PRIMARY KEY (`id_persona`),
  KEY `FK_personas_roles` (`id_rol`),
  KEY `FK_personas_tipo_identificacion` (`id_tipo_identificacion`),
  KEY `FK_personas_sexo` (`id_sexo`),
  CONSTRAINT `FK_personas_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  CONSTRAINT `FK_personas_sexo` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`),
  CONSTRAINT `FK_personas_tipo_identificacion` FOREIGN KEY (`id_tipo_identificacion`) REFERENCES `tipo_identificacion` (`id_tipo_identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.personas: ~0 rows (aproximadamente)
INSERT INTO `personas` (`id_persona`, `id_rol`, `id_tipo_identificacion`, `numero_identificacion`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `id_sexo`, `telefono`, `email`, `direccion`, `foto`) VALUES
	(1, 1, 1, '1120564623', 'JHON', 'HADER', 'RODRIGUEZ', 'PERDOMO', 2, '3182825959', 'JHHRODRIGUEZP@SENA.EDU.CO', 'CALLE FALSA 123', NULL);

-- Volcando estructura para tabla registro_control.personas_accesorios
CREATE TABLE IF NOT EXISTS `personas_accesorios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` bigint unsigned NOT NULL,
  `id_accesorio` bigint unsigned NOT NULL,
  `id_marca` bigint unsigned NOT NULL,
  `serie` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_personas_accesorios_personas` (`id_persona`),
  KEY `FK_personas_accesorios_accesorios` (`id_accesorio`),
  KEY `FK_personas_accesorios_marcas` (`id_marca`),
  CONSTRAINT `FK_personas_accesorios_accesorios` FOREIGN KEY (`id_accesorio`) REFERENCES `accesorios` (`id_accesorios`),
  CONSTRAINT `FK_personas_accesorios_marcas` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`),
  CONSTRAINT `FK_personas_accesorios_personas` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla registro_control.personas_accesorios: ~2 rows (aproximadamente)
INSERT INTO `personas_accesorios` (`id`, `id_persona`, `id_accesorio`, `id_marca`, `serie`) VALUES
	(1, 1, 1, 5, 'DSADAS515'),
	(2, 1, 1, 3, '6068');

-- Volcando estructura para tabla registro_control.posiciones
CREATE TABLE IF NOT EXISTS `posiciones` (
  `id_posicion` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_posicion`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Sectores de vigilancia';

-- Volcando datos para la tabla registro_control.posiciones: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id_rol`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.roles: ~0 rows (aproximadamente)
INSERT INTO `roles` (`id_rol`, `nombre`) VALUES
	(1, 'INSTRUCTOR');

-- Volcando estructura para tabla registro_control.sedes
CREATE TABLE IF NOT EXISTS `sedes` (
  `id_sede` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_sede`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.sedes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.sexo
CREATE TABLE IF NOT EXISTS `sexo` (
  `id_sexo` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0' COMMENT '1 H, 2 M',
  PRIMARY KEY (`id_sexo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla registro_control.sexo: ~2 rows (aproximadamente)
INSERT INTO `sexo` (`id_sexo`, `nombre`) VALUES
	(1, 'FEMENINO'),
	(2, 'MASCULINO');

-- Volcando estructura para tabla registro_control.supervisores
CREATE TABLE IF NOT EXISTS `supervisores` (
  `id_supervisor` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` bigint unsigned NOT NULL,
  `password` varchar(45) NOT NULL,
  `estado` tinyint(1) DEFAULT '1' COMMENT '1=activo, 0=inactivo',
  PRIMARY KEY (`id_supervisor`),
  KEY `FK_supervisores_personas` (`id_persona`),
  CONSTRAINT `FK_supervisores_personas` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.supervisores: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.tipo_dispositivos
CREATE TABLE IF NOT EXISTS `tipo_dispositivos` (
  `id_tipo_dispositivo` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_tipo_dispositivo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.tipo_dispositivos: ~3 rows (aproximadamente)
INSERT INTO `tipo_dispositivos` (`id_tipo_dispositivo`, `nombre`, `descripcion`) VALUES
	(1, 'Computador', NULL),
	(2, 'Portátil', NULL),
	(3, 'Tablets', NULL);

-- Volcando estructura para tabla registro_control.tipo_identificacion
CREATE TABLE IF NOT EXISTS `tipo_identificacion` (
  `id_tipo_identificacion` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`id_tipo_identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.tipo_identificacion: ~4 rows (aproximadamente)
INSERT INTO `tipo_identificacion` (`id_tipo_identificacion`, `nombre`) VALUES
	(1, 'Cédula de Ciudadanía'),
	(2, 'Tarjeta de Identidad'),
	(3, 'Cédula de Extranjería'),
	(4, 'Tarjeta de Extranjería'),
	(9, 'Pasaporte');

-- Volcando estructura para tabla registro_control.turnos
CREATE TABLE IF NOT EXISTS `turnos` (
  `id_turno` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_vigilante` bigint unsigned NOT NULL,
  `id_sede` bigint unsigned NOT NULL,
  `id_posicion` bigint unsigned NOT NULL,
  `id_supervisor` bigint unsigned NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` datetime NOT NULL,
  `hora_fin` datetime NOT NULL,
  PRIMARY KEY (`id_turno`),
  KEY `FK_turnos_vigilantes` (`id_vigilante`),
  KEY `FK_turnos_sedes` (`id_sede`),
  KEY `FK_turnos_posiciones` (`id_posicion`),
  KEY `FK_turnos_supervisores` (`id_supervisor`),
  CONSTRAINT `FK_turnos_posiciones` FOREIGN KEY (`id_posicion`) REFERENCES `posiciones` (`id_posicion`),
  CONSTRAINT `FK_turnos_sedes` FOREIGN KEY (`id_sede`) REFERENCES `sedes` (`id_sede`),
  CONSTRAINT `FK_turnos_supervisores` FOREIGN KEY (`id_supervisor`) REFERENCES `supervisores` (`id_supervisor`),
  CONSTRAINT `FK_turnos_vigilantes` FOREIGN KEY (`id_vigilante`) REFERENCES `vigilantes` (`id_vigilante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.turnos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.vigilantes
CREATE TABLE IF NOT EXISTS `vigilantes` (
  `id_vigilante` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` bigint unsigned NOT NULL,
  `password` varchar(45) NOT NULL,
  `inicio_contrato` date NOT NULL,
  `fin_contrato` date NOT NULL,
  `estado` tinyint DEFAULT '1' COMMENT '1 =activo, 0=inactivo',
  PRIMARY KEY (`id_vigilante`) USING BTREE,
  KEY `FK_vigilantes_personas` (`id_persona`),
  CONSTRAINT `FK_vigilantes_personas` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.vigilantes: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
