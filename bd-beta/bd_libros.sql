-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema libros
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `libros` ;

-- -----------------------------------------------------
-- Schema libros
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `libros` DEFAULT CHARACTER SET utf8 ;
USE `libros` ;

-- -----------------------------------------------------
-- Table `libros`.`Libros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libros`.`Libros` (
  `idLibros` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(150) NOT NULL,
  `isbn` INT NOT NULL,
  `paginas` INT NOT NULL,
  `size` FLOAT NOT NULL,
  `year` YEAR NOT NULL,
  `edicion` INT NOT NULL,
  `fechaUp` DATE NOT NULL,
  `tomo` INT NOT NULL,
  `idBiblio` INT NOT NULL,
  `url` VARCHAR(500) NOT NULL,
  `portada` VARCHAR(500) NULL,
  PRIMARY KEY (`idLibros`),
  UNIQUE INDEX `isbn_UNIQUE` (`isbn` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libros`.`TipoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libros`.`TipoUsuario` (
  `idTipoUsuario` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libros`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libros`.`Usuarios` (
  `id` BIGINT NOT NULL,
  `nombre` VARCHAR(60) NOT NULL,
  `apellido` VARCHAR(60) NOT NULL,
  `user` VARCHAR(45) NOT NULL,
  `pwd` VARCHAR(60) NOT NULL,
  `suspendido` TINYINT NOT NULL,
  `picture` VARCHAR(120) NULL,
  `idTipoUsuario` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idTipoUsuario_idx` (`idTipoUsuario` ASC) ,
  CONSTRAINT `idTipoUsuario`
    FOREIGN KEY (`idTipoUsuario`)
    REFERENCES `libros`.`TipoUsuario` (`idTipoUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libros`.`Menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libros`.`Menu` (
  `idMenu` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `url` VARCHAR(500) NOT NULL,
  `submenu` TINYINT NOT NULL,
  `iconClass` VARCHAR(60) NULL,
  `padre` INT NULL,
  `idTipoUsuario` INT NOT NULL,
  PRIMARY KEY (`idMenu`),
  INDEX `idTipoUsuario_idx` (`idTipoUsuario` ASC) ,
  CONSTRAINT `idTipoUsuarioMenu`
    FOREIGN KEY (`idTipoUsuario`)
    REFERENCES `libros`.`TipoUsuario` (`idTipoUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libros`.`MisLibros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libros`.`MisLibros` (
  `idMisLibros` INT NOT NULL AUTO_INCREMENT,
  `subido` TINYINT NOT NULL,
  `favorito` TINYINT NOT NULL,
  `idLibros` INT NOT NULL,
  `id` BIGINT NOT NULL,
  PRIMARY KEY (`idMisLibros`),
  INDEX `idLibros_idx` (`idLibros` ASC) ,
  INDEX `id_idx` (`id` ASC) ,
  CONSTRAINT `idLibros`
    FOREIGN KEY (`idLibros`)
    REFERENCES `libros`.`Libros` (`idLibros`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `id`
    FOREIGN KEY (`id`)
    REFERENCES `libros`.`Usuarios` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libros`.`Asignatura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libros`.`Asignatura` (
  `idAsignatura` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `carrera` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAsignatura`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libros`.`librosAsignatura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libros`.`librosAsignatura` (
  `idlibrosAsignatura` INT NOT NULL AUTO_INCREMENT,
  `idLibros` INT NOT NULL,
  `idAsignatura` INT NOT NULL,
  PRIMARY KEY (`idlibrosAsignatura`),
  INDEX `idLibros_idx` (`idLibros` ASC) ,
  INDEX `idAsignatura_idx` (`idAsignatura` ASC) ,
  CONSTRAINT `idLibrosA`
    FOREIGN KEY (`idLibros`)
    REFERENCES `libros`.`Libros` (`idLibros`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idAsignatura`
    FOREIGN KEY (`idAsignatura`)
    REFERENCES `libros`.`Asignatura` (`idAsignatura`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libros`.`Autores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libros`.`Autores` (
  `idAutores` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAutores`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libros`.`librosAutores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libros`.`librosAutores` (
  `idlibrosAutores` INT NOT NULL AUTO_INCREMENT,
  `idLibros` INT NOT NULL,
  `idAutores` INT NOT NULL,
  PRIMARY KEY (`idlibrosAutores`),
  INDEX `idLibros_idx` (`idLibros` ASC) ,
  INDEX `idAutores_idx` (`idAutores` ASC) ,
  CONSTRAINT `idLibrosE`
    FOREIGN KEY (`idLibros`)
    REFERENCES `libros`.`Libros` (`idLibros`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `idAutores`
    FOREIGN KEY (`idAutores`)
    REFERENCES `libros`.`Autores` (`idAutores`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
