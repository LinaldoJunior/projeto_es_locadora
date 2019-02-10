-- MySQL Script generated by MySQL Workbench
-- Sun Feb 10 19:26:53 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema imperialdb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `imperialdb` ;

-- -----------------------------------------------------
-- Schema imperialdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `imperialdb` DEFAULT CHARACTER SET utf8 ;
USE `imperialdb` ;

-- -----------------------------------------------------
-- Table `imperialdb`.`media_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imperialdb`.`media_types` ;

CREATE TABLE IF NOT EXISTS `imperialdb`.`media_types` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `price` DECIMAL(15,2) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT '1',
  `created` TIMESTAMP NULL DEFAULT NULL,
  `modified` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `imperialdb`.`movie_genres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imperialdb`.`movie_genres` ;

CREATE TABLE IF NOT EXISTS `imperialdb`.`movie_genres` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT '1',
  `created` TIMESTAMP NULL DEFAULT NULL,
  `modified` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `imperialdb`.`movies`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imperialdb`.`movies` ;

CREATE TABLE IF NOT EXISTS `imperialdb`.`movies` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `director` VARCHAR(255) NULL DEFAULT NULL,
  `year` DATE NULL DEFAULT NULL,
  `movie_gender_id` INT(11) NOT NULL,
  `grade` FLOAT NULL DEFAULT NULL,
  `duration` INT(11) NULL DEFAULT NULL,
  `cast` TEXT NULL DEFAULT NULL,
  `sinopse` TEXT NULL DEFAULT NULL,
  `released` TINYINT(4) NOT NULL DEFAULT '0',
  `poster` VARCHAR(255) NULL DEFAULT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT '1',
  `created` TIMESTAMP NULL DEFAULT NULL,
  `modified` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_movies_movie_genders_idx` (`movie_gender_id` ASC),
  CONSTRAINT `fk_movies_movie_genders`
    FOREIGN KEY (`movie_gender_id`)
    REFERENCES `imperialdb`.`movie_genres` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `imperialdb`.`movie_media_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imperialdb`.`movie_media_types` ;

CREATE TABLE IF NOT EXISTS `imperialdb`.`movie_media_types` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `movie_id` INT(11) NOT NULL,
  `media_type_id` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL DEFAULT '0',
  `active` TINYINT(1) NOT NULL DEFAULT '1',
  `created` TIMESTAMP NULL DEFAULT NULL,
  `modified` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_movie_media_types_movies1_idx` (`movie_id` ASC),
  INDEX `fk_movie_media_types_media_types1_idx` (`media_type_id` ASC),
  CONSTRAINT `fk_movie_media_types_media_types1`
    FOREIGN KEY (`media_type_id`)
    REFERENCES `imperialdb`.`media_types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movie_media_types_movies1`
    FOREIGN KEY (`movie_id`)
    REFERENCES `imperialdb`.`movies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `imperialdb`.`payment_methods`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imperialdb`.`payment_methods` ;

CREATE TABLE IF NOT EXISTS `imperialdb`.`payment_methods` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT '1',
  `created` TIMESTAMP NULL DEFAULT NULL,
  `modified` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `imperialdb`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imperialdb`.`users` ;

CREATE TABLE IF NOT EXISTS `imperialdb`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(45) NOT NULL,
  `access_admin` TINYINT(4) NULL DEFAULT NULL,
  `access_attendant` TINYINT(4) NULL DEFAULT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `gender` ENUM('FEMALE', 'MALE', 'OTHER') NOT NULL,
  `parent_id` INT(11) NULL DEFAULT NULL,
  `lft` INT(11) NULL DEFAULT NULL,
  `rght` INT(11) NULL DEFAULT NULL,
  `address` TEXT NULL DEFAULT NULL,
  `phone_res` VARCHAR(45) NULL DEFAULT NULL,
  `address_work` TEXT NULL DEFAULT NULL,
  `phone_work` VARCHAR(45) NULL DEFAULT NULL,
  `cellphone` VARCHAR(45) NULL DEFAULT NULL,
  `cpf` VARCHAR(45) NULL DEFAULT NULL,
  `birthdate` DATETIME NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT '1',
  `created` TIMESTAMP NULL DEFAULT NULL,
  `modified` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_users1_idx` (`parent_id` ASC),
  CONSTRAINT `fk_users_users1`
    FOREIGN KEY (`parent_id`)
    REFERENCES `imperialdb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `imperialdb`.`rentals`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imperialdb`.`rentals` ;

CREATE TABLE IF NOT EXISTS `imperialdb`.`rentals` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `start_date` DATETIME NOT NULL,
  `end_date` DATETIME NULL DEFAULT NULL,
  `pre_paid` DECIMAL(15,2) NULL DEFAULT 0,
  `payment_method_id` INT(11) NOT NULL,
  `client_id` INT(11) NOT NULL,
  `finished` TINYINT(4) NULL DEFAULT NULL,
  `attendant_id` INT(11) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT '1',
  `created` TIMESTAMP NULL DEFAULT NULL,
  `modified` TIMESTAMP NULL DEFAULT NULL,
  `quantity` INT NOT NULL DEFAULT 0,
  `movie_media_types_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_rentals_payment_methods1_idx` (`payment_method_id` ASC),
  INDEX `fk_rentals_users1_idx` (`client_id` ASC),
  INDEX `fk_rentals_users2_idx` (`attendant_id` ASC),
  INDEX `fk_rentals_movie_media_types1_idx` (`movie_media_types_id` ASC),
  CONSTRAINT `fk_rentals_payment_methods1`
    FOREIGN KEY (`payment_method_id`)
    REFERENCES `imperialdb`.`payment_methods` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rentals_users1`
    FOREIGN KEY (`client_id`)
    REFERENCES `imperialdb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rentals_users2`
    FOREIGN KEY (`attendant_id`)
    REFERENCES `imperialdb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rentals_movie_media_types1`
    FOREIGN KEY (`movie_media_types_id`)
    REFERENCES `imperialdb`.`movie_media_types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
