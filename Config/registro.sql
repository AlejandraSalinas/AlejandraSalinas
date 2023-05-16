-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema registro_base_datos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema registro_base_datos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `registro_base_datos` DEFAULT CHARACTER SET utf8 ;
USE `registro_base_datos` ;

-- -----------------------------------------------------
-- Table `registro_base_datos`.`TipoIdentificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`TipoIdentificacion` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`Roles` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`Personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`Personas` (
  `id_persona` BIGINT NOT NULL AUTO_INCREMENT,
  `numero_identificacion` VARCHAR(45) NOT NULL,
  `Primer_Nombre` VARCHAR(45) NOT NULL,
  `Segundo_Nombre` VARCHAR(45) NOT NULL,
  `Primer_Apellido` VARCHAR(45) NOT NULL,
  `Segundo_Apellido` VARCHAR(45) NOT NULL,
  `Telefono` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Direccion` VARCHAR(45) NOT NULL,
  `Genero` TINYINT NOT NULL COMMENT '1 H, 0 M',
  `id_rol` BIGINT NOT NULL,
  `id_tipo_identificacion` BIGINT NOT NULL,
  PRIMARY KEY (`id_persona`),
  INDEX `personas_idx` (`id_tipo_identificacion` ASC) VISIBLE,
  INDEX `personas_idx1` (`id_rol` ASC) VISIBLE,
  CONSTRAINT `personas`
    FOREIGN KEY (`id_tipo_identificacion`)
    REFERENCES `registro_base_datos`.`TipoIdentificacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `personas`
    FOREIGN KEY (`id_rol`)
    REFERENCES `registro_base_datos`.`Roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`Vigilantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`Vigilantes` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `id_persona` BIGINT NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `Inicio_Contrato` VARCHAR(45) NOT NULL,
  `Fin_contrato` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_vigilante_persona_id_idx` (`id_persona` ASC) VISIBLE,
  CONSTRAINT `FK_vigilante_persona_id`
    FOREIGN KEY (`id_persona`)
    REFERENCES `registro_base_datos`.`Personas` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`tipoDispositivos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`tipoDispositivos` (
  `id_tipo` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(50) NULL,
  PRIMARY KEY (`id_tipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`marca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`marca` (
  `id_marca` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `descripcion` VARCHAR(60) NULL,
  PRIMARY KEY (`id_marca`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`color`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`color` (
  `id_color` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `descripcion` VARCHAR(60) NULL,
  PRIMARY KEY (`id_color`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`RegistroDispositivos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`RegistroDispositivos` (
  `id_registro` BIGINT NOT NULL AUTO_INCREMENT,
  `id_tipo` BIGINT NOT NULL,
  `id_marca` BIGINT NOT NULL,
  `id_color` BIGINT NOT NULL,
  `Serie` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(60) NULL,
  PRIMARY KEY (`id_registro`),
  INDEX `FK_RegistroDispositivos_tipo_id_idx` (`id_tipo` ASC) VISIBLE,
  INDEX `FK_RegistroDispositivos_marca_id_idx` (`id_marca` ASC) VISIBLE,
  INDEX `FK_RegistroDispositivos_color_id_idx` (`id_color` ASC) VISIBLE,
  CONSTRAINT `FK_RegistroDispositivos_tipo_id`
    FOREIGN KEY (`id_tipo`)
    REFERENCES `registro_base_datos`.`tipoDispositivos` (`id_tipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_RegistroDispositivos_marca_id`
    FOREIGN KEY (`id_marca`)
    REFERENCES `registro_base_datos`.`marca` (`id_marca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_RegistroDispositivos_color_id`
    FOREIGN KEY (`id_color`)
    REFERENCES `registro_base_datos`.`color` (`id_color`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`ingresar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`ingresar` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `id_persona` BIGINT NOT NULL,
  `id_registro` BIGINT NOT NULL,
  `Fecha_Entrada` DATETIME NOT NULL,
  `Fecha_salida` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Usuario_persona_id_idx` (`id_persona` ASC) VISIBLE,
  INDEX `FK_Usuario_RegistroDisposipivos_id_idx` (`id_registro` ASC) VISIBLE,
  CONSTRAINT `FK_ingresar_RegistroDisposipivos_id`
    FOREIGN KEY (`id_registro`)
    REFERENCES `registro_base_datos`.`RegistroDispositivos` (`id_registro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_ingresar_persona_id`
    FOREIGN KEY (`id_persona`)
    REFERENCES `registro_base_datos`.`Personas` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`Sedes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`Sedes` (
  `id_sede` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_sede`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`Posiciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`Posiciones` (
  `id_posiciones` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_posiciones`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`Supervisores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`Supervisores` (
  `id_supervisor` BIGINT NOT NULL AUTO_INCREMENT,
  `id_persona` BIGINT NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_supervisor`),
  INDEX `FK_supervisores_personas_id_idx` (`id_persona` ASC) VISIBLE,
  CONSTRAINT `FK_supervisores_personas_id`
    FOREIGN KEY (`id_persona`)
    REFERENCES `registro_base_datos`.`Personas` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`turnos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`turnos` (
  `id_turno` BIGINT NOT NULL AUTO_INCREMENT,
  `id_vigilante` BIGINT NOT NULL,
  `id_sede` BIGINT NOT NULL,
  `id_posicion` BIGINT NOT NULL,
  `id_supervisor` BIGINT NOT NULL,
  `fecha` DATE NULL,
  `hora_inicio` DATETIME NULL,
  `hora_fin` DATETIME NULL,
  PRIMARY KEY (`id_turno`),
  INDEX `FK_turnos_vigilante_id_idx` (`id_vigilante` ASC) VISIBLE,
  INDEX `FK_turnos_sedes_id_idx` (`id_sede` ASC) VISIBLE,
  INDEX `FK_turnos_posiciones_id_idx` (`id_posicion` ASC) VISIBLE,
  INDEX `FK_turnos_supevisores_id_idx` (`id_supervisor` ASC) VISIBLE,
  CONSTRAINT `FK_turnos_vigilante_id`
    FOREIGN KEY (`id_vigilante`)
    REFERENCES `registro_base_datos`.`Vigilantes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_turnos_sedes_id`
    FOREIGN KEY (`id_sede`)
    REFERENCES `registro_base_datos`.`Sedes` (`id_sede`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_turnos_posiciones_id`
    FOREIGN KEY (`id_posicion`)
    REFERENCES `registro_base_datos`.`Posiciones` (`id_posiciones`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_turnos_supevisores_id`
    FOREIGN KEY (`id_supervisor`)
    REFERENCES `registro_base_datos`.`Supervisores` (`id_supervisor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`accesorios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`accesorios` (
  `id_accesorios` BIGINT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `descripcon` VARCHAR(60) NULL,
  PRIMARY KEY (`id_accesorios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registro_base_datos`.`registroAccesorios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registro_base_datos`.`registroAccesorios` (
  `id_registroAccesorios` BIGINT NOT NULL AUTO_INCREMENT,
  `id_registro` BIGINT NOT NULL,
  `id_accesorios` BIGINT NOT NULL,
  PRIMARY KEY (`id_registroAccesorios`),
  INDEX `FK_registroAccesorios_accesorios_id_idx` (`id_accesorios` ASC) VISIBLE,
  INDEX `FK_registroAccesorios_registro_id_idx` (`id_registro` ASC) VISIBLE,
  CONSTRAINT `FK_registroAccesorios_registro_id`
    FOREIGN KEY (`id_registro`)
    REFERENCES `registro_base_datos`.`RegistroDispositivos` (`id_registro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_registroAccesorios_accesorios_id`
    FOREIGN KEY (`id_accesorios`)
    REFERENCES `registro_base_datos`.`accesorios` (`id_accesorios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
