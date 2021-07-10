-- SCRIPT PARA LA CREACIÓN DE LA BBDD

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema tfg
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tfg
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tfg` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci ;
USE `tfg` ;

-- -----------------------------------------------------
-- Table `tfg`.`bomberos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tfg`.`bomberos` (
  `id_bombero` INT NOT NULL AUTO_INCREMENT,
  `nombre_apellido` VARCHAR(40) NOT NULL,
  `edad` INT NOT NULL,
  `dispositivo_id` INT NOT NULL,
  PRIMARY KEY (`id_bombero`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre_apellido` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ROW_FORMAT = COMPACT;


-- -----------------------------------------------------
-- Table `tfg`.`datos_uno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tfg`.`datos_uno` (
  `id_dato` INT NOT NULL AUTO_INCREMENT,
  `spO2` INT NOT NULL,
  `ppm` INT NOT NULL,
  `ecg` INT NOT NULL,
  `fechaRegistro` TIMESTAMP NULL,
  `dispositivo_id` INT NOT NULL,
  PRIMARY KEY (`id_dato`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ROW_FORMAT = COMPACT;


-- -----------------------------------------------------
-- Table `tfg`.`dispositivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tfg`.`dispositivo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_dispositivo` INT NOT NULL,
  `id_bombero` INT NOT NULL,
  `fechaRegistro` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tfg`.`datos_nano`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tfg`.`datos_nano` (
  `id_dato` INT NOT NULL AUTO_INCREMENT,
  `temp` FLOAT NOT NULL,
  `aX` FLOAT NOT NULL,
  `aY` FLOAT NOT NULL,
  `aZ` FLOAT NOT NULL,
  `gX` FLOAT NOT NULL,
  `gY` FLOAT NOT NULL,
  `gZ` FLOAT NOT NULL,
  `minG` FLOAT NOT NULL,
  `fechaRegistro` TIMESTAMP NULL,
  `dispositivo_id` INT NOT NULL,
  PRIMARY KEY (`id_dato`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ROW_FORMAT = COMPACT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
