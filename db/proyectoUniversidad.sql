-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema proyecto
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `proyecto` ;

-- -----------------------------------------------------
-- Schema proyecto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `proyecto` DEFAULT CHARACTER SET latin1 ;
USE `proyecto` ;

-- -----------------------------------------------------
-- Table `proyecto`.`estudiante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto`.`estudiante` ;

CREATE TABLE IF NOT EXISTS `proyecto`.`estudiante` (
  `idEstudiante` INT(11) NOT NULL AUTO_INCREMENT,
  `documento` INT(11) NOT NULL,
  `nombreAlumno` VARCHAR(50) NOT NULL,
  `apellidoAlumno` VARCHAR(50) NOT NULL,
  `generoAlumno` VARCHAR(50) NOT NULL,
  `fechaNacimiento` DATE NOT NULL,
  `cursosInscritos` VARCHAR(2) NULL DEFAULT NULL,
  PRIMARY KEY (`idEstudiante`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `proyecto`.`grado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto`.`grado` ;

CREATE TABLE IF NOT EXISTS `proyecto`.`grado` (
  `idGradoAcademico` INT(11) NOT NULL AUTO_INCREMENT,
  `gradoAcademico` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idGradoAcademico`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `proyecto`.`matricula`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto`.`matricula` ;

CREATE TABLE IF NOT EXISTS `proyecto`.`matricula` (
  `idMatricula` INT(11) NOT NULL AUTO_INCREMENT,
  `tipoVinculacion` VARCHAR(50) NOT NULL,
  `valorCargo` INT(11) NOT NULL,
  `valorPago` INT(11) NOT NULL,
  `valorBeca` INT(11) NOT NULL,
  PRIMARY KEY (`idMatricula`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `proyecto`.`programa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto`.`programa` ;

CREATE TABLE IF NOT EXISTS `proyecto`.`programa` (
  `idPrograma` INT(11) NOT NULL,
  `codigoPrograma` VARCHAR(5) NOT NULL,
  `programa` VARCHAR(50) NOT NULL,
  `semestre` INT(3) NULL DEFAULT NULL,
  `codGrado` INT(11) NOT NULL,
  `codEstudiante` INT(11) NOT NULL,
  `codMatricula` INT(11) NOT NULL,
  PRIMARY KEY (`idPrograma`, `codGrado`, `codEstudiante`, `codMatricula`),
  CONSTRAINT `fk_programa_grado`
    FOREIGN KEY (`codGrado`)
    REFERENCES `proyecto`.`grado` (`idGradoAcademico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_programa_estudiante`
    FOREIGN KEY (`codEstudiante`)
    REFERENCES `proyecto`.`estudiante` (`idEstudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_programa_matricula`
    FOREIGN KEY (`codMatricula`)
    REFERENCES `proyecto`.`matricula` (`idMatricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_programa_grado_idx` ON `proyecto`.`programa` (`codGrado` ASC);

CREATE INDEX `fk_programa_estudiante_idx` ON `proyecto`.`programa` (`codEstudiante` ASC);

CREATE INDEX `fk_programa_matricula_idx` ON `proyecto`.`programa` (`codMatricula` ASC);


-- -----------------------------------------------------
-- Table `proyecto`.`rol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto`.`rol` ;

CREATE TABLE IF NOT EXISTS `proyecto`.`rol` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `proyecto`.`estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto`.`estado` ;

CREATE TABLE IF NOT EXISTS `proyecto`.`estado` (
  `idEstado` INT NOT NULL AUTO_INCREMENT,
  `nombreEstado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `proyecto`.`usuarios` (
  `id` INT(11) NOT NULL,
  `usuario` VARCHAR(200) NOT NULL,
  `nombre` VARCHAR(200) NOT NULL,
  `clave` VARCHAR(200) NOT NULL,
  `estado` INT(11) NOT NULL,
  `tipo_identificacion` VARCHAR(500) NOT NULL,
  `nit` VARCHAR(500) NOT NULL,
  `fecha_nacimiento` VARCHAR(500) NOT NULL,
  `celular` VARCHAR(500) NULL,
  `email` VARCHAR(500) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_usuarios_estado`
    FOREIGN KEY (`estado`)
    REFERENCES `proyecto`.`estado` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_usuarios_estado_idx` ON `proyecto`.`usuarios` (`estado` ASC);


-- -----------------------------------------------------
-- Table `proyecto`.`rol_usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `proyecto`.`rol_usuarios` ;

CREATE TABLE IF NOT EXISTS `proyecto`.`rol_usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cod_rol` INT(11) NULL,
  `cod_usuario` INT(11) NULL,
  PRIMARY KEY (`id`, `cod_rol`, `cod_usuario`),
  CONSTRAINT `fk_rolusu_usuario`
    FOREIGN KEY (`cod_usuario`)
    REFERENCES `proyecto`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rolusu_rol`
    FOREIGN KEY (`cod_rol`)
    REFERENCES `proyecto`.`rol` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 590
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_rolusu_usuario_idx` ON `proyecto`.`rol_usuarios` (`cod_usuario` ASC);

CREATE INDEX `fk_rolusu_rol_idx` ON `proyecto`.`rol_usuarios` (`cod_rol` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
