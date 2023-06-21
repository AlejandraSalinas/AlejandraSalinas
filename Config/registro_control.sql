-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.32 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
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
  `id_accesorios` bigint unsigned NOT NULL,
  `serie` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_registro_dispositivos`),
  KEY `FK_dispositivos_tipo_dispositivos` (`id_tipo_dispositivo`),
  KEY `FK_dispositivos_marcas` (`id_marca`),
  KEY `FK_dispositivos_color` (`id_color`),
  KEY `FK_dispositivos_accesorios` (`id_accesorios`),
  CONSTRAINT `FK_dispositivos_accesorios` FOREIGN KEY (`id_accesorios`) REFERENCES `accesorios` (`id_accesorios`),
  CONSTRAINT `FK_dispositivos_color` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`),
  CONSTRAINT `FK_dispositivos_marcas` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`),
  CONSTRAINT `FK_dispositivos_tipo_dispositivos` FOREIGN KEY (`id_tipo_dispositivo`) REFERENCES `tipo_dispositivos` (`id_tipo_dispositivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.dispositivos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla registro_control.info_vigilantes
CREATE TABLE IF NOT EXISTS `info_vigilantes` (
  `id_vigilante` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` bigint unsigned NOT NULL,
  `pass` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `inicio_contrato` date NOT NULL,
  `fin_contrato` date NOT NULL,
  `estado` tinyint DEFAULT '1' COMMENT '1 =activo, 0=inactivo',
  PRIMARY KEY (`id_vigilante`) USING BTREE,
  KEY `FK_vigilantes_personas` (`id_persona`),
  CONSTRAINT `FK_vigilantes_personas` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.info_vigilantes: ~6 rows (aproximadamente)
INSERT INTO `info_vigilantes` (`id_vigilante`, `id_persona`, `pass`, `inicio_contrato`, `fin_contrato`, `estado`) VALUES
	(7, 46, '123457', '2023-01-01', '2025-05-01', 1),
	(10, 45, '5564245', '2023-01-01', '2025-05-12', 0),
	(11, 40, '5435435435', '2023-01-30', '2026-11-19', 0),
	(16, 45, '487464', '2023-04-02', '2024-05-02', 1),
	(17, 40, '35151', '2023-02-03', '2024-02-20', 1),
	(18, 40, '123456', '2023-02-22', '2024-02-22', 1);

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
  `id_tipo_identificacion` bigint unsigned NOT NULL,
  `numero_identificacion` varchar(10) NOT NULL,
  `primer_nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `segundo_nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `primer_apellido` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `segundo_apellido` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `telefono` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `direccion` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_sexo` bigint unsigned NOT NULL COMMENT '1 F, 2 M',
  `id_rol` bigint unsigned NOT NULL,
  `foto` longtext,
  PRIMARY KEY (`id_persona`),
  KEY `FK_personas_roles` (`id_rol`),
  KEY `FK_personas_tipo_identificacion` (`id_tipo_identificacion`),
  KEY `FK_personas_sexo` (`id_sexo`),
  CONSTRAINT `FK_personas_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  CONSTRAINT `FK_personas_sexo` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`),
  CONSTRAINT `FK_personas_tipo_identificacion` FOREIGN KEY (`id_tipo_identificacion`) REFERENCES `tipo_identificacion` (`id_tipo_identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.personas: ~4 rows (aproximadamente)
INSERT INTO `personas` (`id_persona`, `id_tipo_identificacion`, `numero_identificacion`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `telefono`, `email`, `direccion`, `id_sexo`, `id_rol`, `foto`) VALUES
	(40, 35, '12345078', 'pepito', '', 'perez', '', '13245620', 'perezpepito@gmail.com', 'CARRERA#0', 2, 4, NULL),
	(45, 32, '1256555454', 'el', '', 'guachiman', '', '5151561516', 'elwachi@gmail.com', 'cll20.', 2, 4, NULL),
	(46, 33, '1123324555', 'carlos', 'antonio ', 'locura', '', '3123456896', 'locuraantonio@gmail.com', 'calle#1234', 2, 4, NULL),
	(47, 32, '1354365136', 'norma', 'suley', 'suarez', '', '3126854365', 'suarez@gmail.com', '', 1, 1, NULL);

-- Volcando estructura para tabla registro_control.posiciones
CREATE TABLE IF NOT EXISTS `posiciones` (
  `id_posicion` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_posicion`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COMMENT='Sectores de vigilancia';

-- Volcando datos para la tabla registro_control.posiciones: ~1 rows (aproximadamente)
INSERT INTO `posiciones` (`id_posicion`, `nombre`, `descripcion`) VALUES
	(1, 'PARQUEADERO', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.roles: ~6 rows (aproximadamente)
INSERT INTO `roles` (`id_rol`, `nombre`) VALUES
	(1, '  APrendiz'),
	(2, 'INSTRUCTOR'),
	(3, 'VISITANTE'),
	(4, 'VIGILANTE'),
	(5, 'SUPERVISOR'),
	(6, 'ADMINISTRADOR');

-- Volcando estructura para tabla registro_control.sedes
CREATE TABLE IF NOT EXISTS `sedes` (
  `id_sede` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_sede`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.sedes: ~1 rows (aproximadamente)
INSERT INTO `sedes` (`id_sede`, `nombre`, `descripcion`) VALUES
	(1, 'SEDE MODELO', NULL);

-- Volcando estructura para tabla registro_control.sexo
CREATE TABLE IF NOT EXISTS `sexo` (
  `id_sexo` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '1 F, 2 M',
  PRIMARY KEY (`id_sexo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.supervisores: ~1 rows (aproximadamente)
INSERT INTO `supervisores` (`id_supervisor`, `id_persona`, `password`, `estado`) VALUES
	(1, 40, '12345', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.tipo_identificacion: ~5 rows (aproximadamente)
INSERT INTO `tipo_identificacion` (`id_tipo_identificacion`, `nombre`) VALUES
	(32, 'CÉDULA DE CUIDADANIA'),
	(33, 'TARJETA DE IDENTIDAD'),
	(35, 'CÉDULA DE EXTRANJERÍA'),
	(36, 'TARJETA DE EXTRANJERÍA'),
	(37, 'PASAPORTE');

-- Volcando estructura para tabla registro_control.turnos
CREATE TABLE IF NOT EXISTS `turnos` (
  `id_turno` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_vigilante` bigint unsigned NOT NULL,
  `id_sede` bigint unsigned NOT NULL,
  `id_posicion` bigint unsigned NOT NULL,
  `id_supervisor` bigint unsigned NOT NULL,
  `fecha_inicial` date NOT NULL,
  `hora_inicial` time NOT NULL,
  `fecha_final` date NOT NULL,
  `hora_final` time NOT NULL,
  PRIMARY KEY (`id_turno`),
  KEY `FK_turnos_vigilantes` (`id_vigilante`),
  KEY `FK_turnos_sedes` (`id_sede`),
  KEY `FK_turnos_posiciones` (`id_posicion`),
  KEY `FK_turnos_supervisores` (`id_supervisor`),
  CONSTRAINT `FK_turnos_posiciones` FOREIGN KEY (`id_posicion`) REFERENCES `posiciones` (`id_posicion`),
  CONSTRAINT `FK_turnos_sedes` FOREIGN KEY (`id_sede`) REFERENCES `sedes` (`id_sede`),
  CONSTRAINT `FK_turnos_supervisores` FOREIGN KEY (`id_supervisor`) REFERENCES `supervisores` (`id_supervisor`),
  CONSTRAINT `FK_turnos_vigilantes` FOREIGN KEY (`id_vigilante`) REFERENCES `info_vigilantes` (`id_vigilante`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla registro_control.turnos: ~1 rows (aproximadamente)
INSERT INTO `turnos` (`id_turno`, `id_vigilante`, `id_sede`, `id_posicion`, `id_supervisor`, `fecha_inicial`, `hora_inicial`, `fecha_final`, `hora_final`) VALUES
	(1, 17, 1, 1, 1, '2023-06-01', '06:00:00', '2023-06-15', '12:00:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;