-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema imperialdb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema imperialdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `imperialdb` DEFAULT CHARACTER SET utf8 ;
USE `imperialdb` ;

-- -----------------------------------------------------
-- Table `imperialdb`.`movie_genres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imperialdb`.`movie_genres` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `active` TINYINT NOT NULL DEFAULT 1,
  `created` TIMESTAMP NULL,
  `modified` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imperialdb`.`movies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imperialdb`.`movies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `director` VARCHAR(255) NULL,
  `year` DATE NULL,
  `movie_gender_id` INT NOT NULL,
  `grade` FLOAT NULL,
  `duration` INT NULL,
  `cast` TEXT NULL,
  `sinopse` VARCHAR(45) NULL,
  `released` TINYINT NOT NULL DEFAULT 0,
  `poster` VARCHAR(255) NULL,
  `active` TINYINT NOT NULL DEFAULT 1,
  `created` TIMESTAMP NULL,
  `modified` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_movies_movie_genders_idx` (`movie_gender_id` ASC),
  CONSTRAINT `fk_movies_movie_genders`
    FOREIGN KEY (`movie_gender_id`)
    REFERENCES `imperialdb`.`movie_genres` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imperialdb`.`media_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imperialdb`.`media_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `price` DECIMAL(15,2) NOT NULL,
  `active` TINYINT NOT NULL DEFAULT 1,
  `created` TIMESTAMP NULL,
  `modified` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imperialdb`.`payment_methods`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imperialdb`.`payment_methods` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `active` TINYINT NOT NULL DEFAULT 1,
  `created` TIMESTAMP NULL,
  `modified` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imperialdb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imperialdb`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(45) NOT NULL,
  `access_admin` TINYINT NULL,
  `access_attendant` TINYINT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NULL,
  `gender` ENUM('FEMALE', 'MALE', 'OTHER') NOT NULL,
  `user_id` INT NULL,
  `address` TEXT NULL,
  `phone_res` VARCHAR(45) NULL,
  `address_work` TEXT NULL,
  `phone_work` VARCHAR(45) NULL,
  `cellphone` VARCHAR(45) NULL,
  `cpf` VARCHAR(45) NULL,
  `birthdate` DATETIME NOT NULL,
  `active` TINYINT NULL,
  `created` TIMESTAMP NULL,
  `modified` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `imperialdb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imperialdb`.`movie_media_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imperialdb`.`movie_media_types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `movie_id` INT NOT NULL,
  `media_type_id` INT NOT NULL,
  `quatity` INT NOT NULL DEFAULT 0,
  `active` TINYINT NULL,
  `created` TIMESTAMP NULL,
  `modified` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_movie_media_types_movies1_idx` (`movie_id` ASC),
  INDEX `fk_movie_media_types_media_types1_idx` (`media_type_id` ASC),
  CONSTRAINT `fk_movie_media_types_movies1`
    FOREIGN KEY (`movie_id`)
    REFERENCES `imperialdb`.`movies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movie_media_types_media_types1`
    FOREIGN KEY (`media_type_id`)
    REFERENCES `imperialdb`.`media_types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imperialdb`.`rentals`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imperialdb`.`rentals` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `start_date` DATETIME NOT NULL,
  `end_date` DATETIME NULL,
  `return_date` DATETIME NULL,
  `price` DECIMAL(15,2) NULL,
  `pre_paid` TINYINT NOT NULL DEFAULT 0,
  `payment_method_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `finished` TINYINT NULL,
  `movie_media_type_id` INT NOT NULL,
  `active` TINYINT NOT NULL DEFAULT 1,
  `created` TIMESTAMP NULL,
  `modified` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_rentals_payment_methods1_idx` (`payment_method_id` ASC),
  INDEX `fk_rentals_users1_idx` (`user_id` ASC),
  INDEX `fk_rentals_movie_media_types1_idx` (`movie_media_type_id` ASC),
  CONSTRAINT `fk_rentals_payment_methods1`
    FOREIGN KEY (`payment_method_id`)
    REFERENCES `imperialdb`.`payment_methods` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rentals_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `imperialdb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rentals_movie_media_types1`
    FOREIGN KEY (`movie_media_type_id`)
    REFERENCES `imperialdb`.`movie_media_types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
