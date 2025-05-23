-- MySQL Script generated by MySQL Workbench
-- Mon Mar 11 08:40:26 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema nesuperhry
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema nesuperhry
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `nesuperhry` DEFAULT CHARACTER SET utf8 ;
USE `nesuperhry` ;

-- -----------------------------------------------------
-- Table `nesuperhry`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nesuperhry`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(90) NOT NULL,
  `PFPpath` VARCHAR(255) NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `idUser_UNIQUE` (`idUser` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nesuperhry`.`Hra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nesuperhry`.`Hra` (
  `idHra` INT NOT NULL AUTO_INCREMENT,
  `nazev` VARCHAR(45) NOT NULL,
  `banerPath` VARCHAR(255) NOT NULL,
  `ScriptPath` VARCHAR(255) NULL,
  `kategorie` VARCHAR(45) NULL,
  PRIMARY KEY (`idHra`),
  UNIQUE INDEX `idHra_UNIQUE` (`idHra` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `nesuperhry`.`User_has_Hra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nesuperhry`.`User_has_Hra` (
  `User_idUser` INT NOT NULL,
  `Hra_idHra` INT NOT NULL,
  `SavePath` VARCHAR(255) NULL,
  `lastsaveTime` VARCHAR(45) NULL,
  PRIMARY KEY (`User_idUser`, `Hra_idHra`),
  INDEX `fk_User_has_Hra_Hra1_idx` (`Hra_idHra` ASC) ,
  INDEX `fk_User_has_Hra_User_idx` (`User_idUser` ASC) ,
  CONSTRAINT `fk_User_has_Hra_User`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `nesuperhry`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Hra_Hra1`
    FOREIGN KEY (`Hra_idHra`)
    REFERENCES `nesuperhry`.`Hra` (`idHra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

insert INTO User(idUser, Username)
