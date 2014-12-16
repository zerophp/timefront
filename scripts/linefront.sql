-- MySQL Workbench Synchronization
-- Generated: 2014-12-16 02:56
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Carlos

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `timeline` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `timeline`.`timeline` (
  `id_timeline` VARCHAR(255) NOT NULL,
  `start_date` DATE NOT NULL,
  `end_date` DATE NULL DEFAULT NULL,
  `headline` MEDIUMTEXT NOT NULL,
  `text` MEDIUMTEXT NULL DEFAULT NULL,
  `media` VARCHAR(255) NULL DEFAULT NULL COMMENT '(Optional) can be a link to: youtube, vimeo, soundcloud, dailymotion, instagram, twit pic, twitter status, google plus status, wikipedia, or an image',
  `media_credit` VARCHAR(255) NULL DEFAULT NULL,
  `media_caption` MEDIUMTEXT NULL DEFAULT NULL,
  `media_thumbnail` VARCHAR(255) NULL DEFAULT NULL COMMENT '(Optional) Link to a image file. The image should be no larger than 32px x 32px.',
  `type` VARCHAR(255) NULL DEFAULT NULL COMMENT '(Optional) This indicates which slide is the title slide. You can also set era slides but please note that era slides will only display headlines and dates (no media)',
  `tag_id_tag` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_timeline`),
  INDEX `fk_timeline_tag_idx` (`tag_id_tag` ASC),
  CONSTRAINT `fk_timeline_tag`
    FOREIGN KEY (`tag_id_tag`)
    REFERENCES `timeline`.`tag` (`id_tag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `timeline`.`tag` (
  `id_tag` VARCHAR(255) NOT NULL,
  `tag_name` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Tags (Categories) You can have up to 6. If you define more than 6 some of them won\'t be displayed.',
  PRIMARY KEY (`id_tag`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
