-- AgentLogManagement    Version: 1.0
-- author: benlop27

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema loggerOneLink
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema loggerOneLink
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `loggerOneLink` DEFAULT CHARACTER SET utf8 ;
USE `loggerOneLink` ;

-- -----------------------------------------------------
-- Table `loggerOneLink`.`departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loggerOneLink`.`departamento` (
  `id_departamento` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_departamento` VARCHAR(45) NOT NULL,
  `descripcion_departamento` VARCHAR(45) NULL DEFAULT NULL,
  `activo_departamento` TINYINT(1) NULL DEFAULT '1',
  PRIMARY KEY (`id_departamento`),
  UNIQUE INDEX `id_departamento_UNIQUE` (`id_departamento` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `loggerOneLink`.`area`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loggerOneLink`.`area` (
  `id_area` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_area` VARCHAR(45) NOT NULL,
  `descripcion_area` VARCHAR(45) NULL DEFAULT NULL,
  `activo_area` TINYINT(1) NULL DEFAULT '1',
  `id_departamento` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_area`),
  UNIQUE INDEX `id_area_UNIQUE` (`id_area` ASC),
  INDEX `fk_area_departamento_idx` (`id_departamento` ASC),
  CONSTRAINT `fk_area_departamento`
    FOREIGN KEY (`id_departamento`)
    REFERENCES `loggerOneLink`.`departamento` (`id_departamento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `loggerOneLink`.`cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loggerOneLink`.`cargo` (
  `id_cargo` INT(11) NOT NULL,
  `nombre_cargo` VARCHAR(45) NOT NULL,
  `descripcion_cargo` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_cargo`),
  UNIQUE INDEX `id_cargo_UNIQUE` (`id_cargo` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `loggerOneLink`.`cuenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loggerOneLink`.`cuenta` (
  `id_cuenta` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_cuenta` VARCHAR(45) NULL DEFAULT NULL,
  `descripcion_cuenta` VARCHAR(45) NULL DEFAULT NULL,
  `activo_cuenta` TINYINT(1) NULL DEFAULT '1',
  `id_area` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`),
  UNIQUE INDEX `id_cuenta_UNIQUE` (`id_cuenta` ASC),
  INDEX `fk_area_cuenta_idx` (`id_area` ASC),
  CONSTRAINT `fk_area_cuenta`
    FOREIGN KEY (`id_area`)
    REFERENCES `loggerOneLink`.`area` (`id_area`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `loggerOneLink`.`empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loggerOneLink`.`empleado` (
  `id_empleado` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_empleado` VARCHAR(45) NULL DEFAULT NULL,
  `telefono_empleado` VARCHAR(45) NULL DEFAULT NULL,
  `direcion_empleado` VARCHAR(45) NULL DEFAULT NULL,
  `fecha_entrada_empledo` DATE NULL DEFAULT NULL,
  `activo_empleado` TINYINT(1) NULL DEFAULT '1',
  `id_cargo` INT(11) NOT NULL,
  `id_cuenta` INT(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  UNIQUE INDEX `id_usuario_UNIQUE` (`id_empleado` ASC),
  INDEX `fk_cargo_empleado_idx` (`id_cargo` ASC),
  INDEX `fk_cuenta_empleado_idx` (`id_cuenta` ASC),
  CONSTRAINT `fk_cargo_empleado`
    FOREIGN KEY (`id_cargo`)
    REFERENCES `loggerOneLink`.`cargo` (`id_cargo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_cuenta_empleado`
    FOREIGN KEY (`id_cuenta`)
    REFERENCES `loggerOneLink`.`cuenta` (`id_cuenta`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `loggerOneLink`.`tipo_estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loggerOneLink`.`tipo_estado` (
  `id_tipo_estado` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_estado` VARCHAR(45) NULL DEFAULT NULL,
  `descripcion_tipo_estado` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_estado`),
  UNIQUE INDEX `id_tipo_estado_UNIQUE` (`id_tipo_estado` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `loggerOneLink`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loggerOneLink`.`estado` (
  `id_estado` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion_estado` VARCHAR(45) NULL DEFAULT NULL,
  `id_empleado` INT(11) NOT NULL,
  `id_tipo_estado` INT(11) NULL DEFAULT NULL,
  `fecha_estado` DATETIME NOT NULL,
  `tiempo_estado` TIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_estado`),
  UNIQUE INDEX `id_estado_UNIQUE` (`id_estado` ASC),
  INDEX `fk_empleado_estado_idx` (`id_empleado` ASC),
  INDEX `fk_tipo_estado_idx` (`id_tipo_estado` ASC),
  CONSTRAINT `fk_empleado_estado`
    FOREIGN KEY (`id_empleado`)
    REFERENCES `loggerOneLink`.`empleado` (`id_empleado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tipo_estado`
    FOREIGN KEY (`id_tipo_estado`)
    REFERENCES `loggerOneLink`.`tipo_estado` (`id_tipo_estado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 37
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `loggerOneLink`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loggerOneLink`.`usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nickname_usuario` VARCHAR(45) NOT NULL,
  `password_usuario` VARCHAR(45) NOT NULL,
  `descripcion_usuario` VARCHAR(45) NULL DEFAULT NULL,
  `activo_usuario` TINYINT(1) NULL DEFAULT NULL,
  `id_empleado` INT(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `id_usuario_UNIQUE` (`id_usuario` ASC),
  INDEX `fk_empleado_usuario_idx` (`id_empleado` ASC),
  CONSTRAINT `fk_empleado_usuario`
    FOREIGN KEY (`id_empleado`)
    REFERENCES `loggerOneLink`.`empleado` (`id_empleado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
