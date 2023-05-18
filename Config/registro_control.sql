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
CREATE DATABASE IF NOT EXISTS `registro_control` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `registro_control`;

-- Volcando estructura para tabla registro_control.accesorios
CREATE TABLE IF NOT EXISTS `accesorios` (
  `id_accesorios` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcon` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_accesorios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.accesorios: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.color
CREATE TABLE IF NOT EXISTS `color` (
  `id_color` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.color: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.dispositivos
CREATE TABLE IF NOT EXISTS `dispositivos` (
  `id_registro_dispositivos` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_tipo_dispositivo` bigint unsigned NOT NULL,
  `id_marca` bigint unsigned NOT NULL,
  `id_color` bigint unsigned NOT NULL,
  `serie` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_registro_dispositivos`),
  KEY `FK_dispositivos_tipo_dispositivos` (`id_tipo_dispositivo`),
  KEY `FK_dispositivos_marcas` (`id_marca`),
  KEY `FK_dispositivos_color` (`id_color`),
  CONSTRAINT `FK_dispositivos_color` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`),
  CONSTRAINT `FK_dispositivos_marcas` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`),
  CONSTRAINT `FK_dispositivos_tipo_dispositivos` FOREIGN KEY (`id_tipo_dispositivo`) REFERENCES `tipo_dispositivos` (`id_tipo_dispositivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.dispositivos: ~0 rows (aproximadamente)

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
  CONSTRAINT `FK_ingresar_dispositivos` FOREIGN KEY (`id_registro_dispositivos`) REFERENCES `dispositivos` (`id_registro_dispositivos`),
  CONSTRAINT `FK_ingresar_personas` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.ingresar: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.marcas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `id_persona` bigint unsigned NOT NULL AUTO_INCREMENT,
  `numero_identificacion` varchar(45) NOT NULL,
  `primer_nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `segundo_nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `primer_apellido` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `segundo_apellido` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `telefono` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `direccion` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `genero` tinyint unsigned NOT NULL COMMENT '1 H, 0 M',
  `id_rol` bigint unsigned NOT NULL,
  `id_tipo_identificacion` bigint unsigned NOT NULL,
  `foto` longtext,
  PRIMARY KEY (`id_persona`),
  KEY `FK_personas_roles` (`id_rol`),
  KEY `FK_personas_tipo_identificacion` (`id_tipo_identificacion`),
  CONSTRAINT `FK_personas_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  CONSTRAINT `FK_personas_tipo_identificacion` FOREIGN KEY (`id_tipo_identificacion`) REFERENCES `tipo_identificacion` (`id_tipo_identificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.personas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.posiciones
CREATE TABLE IF NOT EXISTS `posiciones` (
  `id_posicion` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_posicion`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Sectores de vigilancia';

-- Volcando datos para la tabla registro_control.posiciones: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.registroaccesorios
CREATE TABLE IF NOT EXISTS `registroaccesorios` (
  `id_registro_accesorio` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_registro_dispositivos` bigint unsigned NOT NULL,
  `id_accesorio` bigint unsigned NOT NULL,
  PRIMARY KEY (`id_registro_accesorio`) USING BTREE,
  KEY `FK_registroaccesorios_dispositivos` (`id_registro_dispositivos`),
  CONSTRAINT `FK_registroaccesorios_dispositivos` FOREIGN KEY (`id_registro_dispositivos`) REFERENCES `dispositivos` (`id_registro_dispositivos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.registroaccesorios: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id_rol`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.roles: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.sedes
CREATE TABLE IF NOT EXISTS `sedes` (
  `id_sede` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_sede`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.sedes: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.tipo_dispositivos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.tipo_identificacion
CREATE TABLE IF NOT EXISTS `tipo_identificacion` (
  `id_tipo_identificacion` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`id_tipo_identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.tipo_identificacion: ~5 rows (aproximadamente)
INSERT INTO `tipo_identificacion` (`id_tipo_identificacion`, `nombre`) VALUES
	(1, 'Cédula de Ciudadania'),
	(2, 'Targeta de Identidad'),
	(3, 'Targeta de Extranjeria'),
	(4, 'Cédula de Extranjeria'),
	(5, 'Pasaporte');

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