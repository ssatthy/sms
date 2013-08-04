SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Staff`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Staff` (
  `id` VARCHAR(32) NOT NULL ,
  `firstname` VARCHAR(45) NULL ,
  `lastname` VARCHAR(45) NULL ,
  `dateofbirth` VARCHAR(45) NULL ,
  `type` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Center`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Center` (
  `cent_id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `location` VARCHAR(45) NULL ,
  PRIMARY KEY (`cent_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Student`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Student` (
  `st_id` VARCHAR(32) NOT NULL ,
  `cent_id` INT NOT NULL ,
  PRIMARY KEY (`st_id`) ,
  INDEX `center_id_idx` (`cent_id` ASC) ,
  CONSTRAINT `parent_id`
    FOREIGN KEY (`st_id` )
    REFERENCES `mydb`.`Staff` (`id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `center_id`
    FOREIGN KEY (`cent_id` )
    REFERENCES `mydb`.`Center` (`cent_id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Professor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Professor` (
  `prof_id` VARCHAR(32) NOT NULL ,
  `cent_id` INT NOT NULL ,
  INDEX `fk_Professor_Person1_idx` (`prof_id` ASC) ,
  PRIMARY KEY (`prof_id`) ,
  INDEX `fk_Professor_Center1_idx` (`cent_id` ASC) ,
  CONSTRAINT `fk_parent_id`
    FOREIGN KEY (`prof_id` )
    REFERENCES `mydb`.`Staff` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_center_id`
    FOREIGN KEY (`cent_id` )
    REFERENCES `mydb`.`Center` (`cent_id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`IntSupervisor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`IntSupervisor` (
  `int_supr_id` VARCHAR(32) NOT NULL ,
  `cent_id` INT NOT NULL ,
  INDEX `fk_IntSupervisor_Person1_idx` (`int_supr_id` ASC) ,
  PRIMARY KEY (`int_supr_id`) ,
  INDEX `fk_IntSupervisor_Center1_idx` (`cent_id` ASC) ,
  CONSTRAINT `fk_parent_id`
    FOREIGN KEY (`int_supr_id` )
    REFERENCES `mydb`.`Staff` (`id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_center_id`
    FOREIGN KEY (`cent_id` )
    REFERENCES `mydb`.`Center` (`cent_id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Module`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Module` (
  `mod_id` VARCHAR(32) NOT NULL ,
  `mod_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`mod_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Class`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Class` (
  `cl_id` VARCHAR(32) NOT NULL ,
  `year` VARCHAR(32) NULL ,
  `semester` INT NULL ,
  `prof_id` VARCHAR(32) NOT NULL ,
  `mod_id` VARCHAR(32) NOT NULL ,
  PRIMARY KEY (`cl_id`) ,
  INDEX `fk_Class_Professor1_idx` (`prof_id` ASC) ,
  INDEX `fk_Class_Module1_idx` (`mod_id` ASC) ,
  CONSTRAINT `fk_prof_id`
    FOREIGN KEY (`prof_id` )
    REFERENCES `mydb`.`Professor` (`prof_id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_module_id`
    FOREIGN KEY (`mod_id` )
    REFERENCES `mydb`.`Module` (`mod_id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ClassEntrolled`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`ClassEntrolled` (
  `cl_id` VARCHAR(32) NOT NULL ,
  `st_id` VARCHAR(32) NOT NULL ,
  PRIMARY KEY (`cl_id`, `st_id`) ,
  INDEX `fk_Class_has_Student_Student1_idx` (`st_id` ASC) ,
  INDEX `fk_Class_has_Student_Class1_idx` (`cl_id` ASC) ,
  CONSTRAINT `fk_class_id`
    FOREIGN KEY (`cl_id` )
    REFERENCES `mydb`.`Class` (`cl_id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_student_id`
    FOREIGN KEY (`st_id` )
    REFERENCES `mydb`.`Student` (`st_id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`CenterClass`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`CenterClass` (
  `cent_id` INT NOT NULL ,
  `cl_id` VARCHAR(32) NOT NULL ,
  PRIMARY KEY (`cent_id`, `cl_id`) ,
  INDEX `fk_Center_has_Class_Class1_idx` (`cl_id` ASC) ,
  INDEX `fk_Center_has_Class_Center1_idx` (`cent_id` ASC) ,
  CONSTRAINT `fk_center_id`
    FOREIGN KEY (`cent_id` )
    REFERENCES `mydb`.`Center` (`cent_id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_class_id`
    FOREIGN KEY (`cl_id` )
    REFERENCES `mydb`.`Class` (`cl_id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ExtSupervisor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`ExtSupervisor` (
  `ext_supr_id` VARCHAR(32) NOT NULL ,
  INDEX `fk_table1_Staff1_idx` (`ext_supr_id` ASC) ,
  PRIMARY KEY (`ext_supr_id`) ,
  CONSTRAINT `fk_parent_id`
    FOREIGN KEY (`ext_supr_id` )
    REFERENCES `mydb`.`Staff` (`id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Assignment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Assignment` (
  `assign_no` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `source` VARCHAR(45) NULL ,
  `cl_id` VARCHAR(32) NOT NULL ,
  `st_id` VARCHAR(32) NOT NULL ,
  INDEX `fk_table2_ClassEntrolled1_idx` (`cl_id` ASC, `st_id` ASC) ,
  PRIMARY KEY (`assign_no`, `cl_id`, `st_id`) ,
  CONSTRAINT `fk_classentrolled_id`
    FOREIGN KEY (`cl_id` , `st_id` )
    REFERENCES `mydb`.`ClassEntrolled` (`cl_id` , `st_id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ExtSupCenter`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`ExtSupCenter` (
  `ext_supr_id` VARCHAR(32) NOT NULL ,
  `cent_id` INT NOT NULL ,
  PRIMARY KEY (`ext_supr_id`, `cent_id`) ,
  INDEX `fk_table1_has_Center_Center1_idx` (`cent_id` ASC) ,
  INDEX `fk_ex_sup_id_idx` (`ext_supr_id` ASC) ,
  CONSTRAINT `fk_ex_sup_id`
    FOREIGN KEY (`ext_supr_id` )
    REFERENCES `mydb`.`ExtSupervisor` (`ext_supr_id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_center_id`
    FOREIGN KEY (`cent_id` )
    REFERENCES `mydb`.`Center` (`cent_id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Grade`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Grade` (
  `id` INT NOT NULL ,
  `staff_id` VARCHAR(32) NOT NULL ,
  `assign_no` INT NOT NULL ,
  `cl_id` VARCHAR(32) NOT NULL ,
  `st_id` VARCHAR(32) NOT NULL ,
  `comment` MEDIUMTEXT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Grade_Staff1_idx` (`staff_id` ASC) ,
  INDEX `fk_Grade_Assignment1_idx` (`assign_no` ASC, `cl_id` ASC, `st_id` ASC) ,
  CONSTRAINT `fk_staff_id`
    FOREIGN KEY (`staff_id` )
    REFERENCES `mydb`.`Staff` (`id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_assign_id`
    FOREIGN KEY (`assign_no` , `cl_id` , `st_id` )
    REFERENCES `mydb`.`Assignment` (`assign_no` , `cl_id` , `st_id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`GradeColumn`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`GradeColumn` (
  `grade_id` INT NOT NULL ,
  `field` VARCHAR(45) NULL ,
  `mark` INT NULL ,
  INDEX `fk_GradeColumn_Grade1_idx` (`grade_id` ASC) ,
  UNIQUE INDEX `grade_id_UNIQUE` (`grade_id` ASC) ,
  PRIMARY KEY (`grade_id`) ,
  CONSTRAINT `fk_grade_id`
    FOREIGN KEY (`grade_id` )
    REFERENCES `mydb`.`Grade` (`id` )
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Login`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Login` (
  `username` VARCHAR(32) NOT NULL ,
  `password` VARCHAR(32) NULL ,
  PRIMARY KEY (`username`) ,
  CONSTRAINT `fk_user_id`
    FOREIGN KEY (`username` )
    REFERENCES `mydb`.`Staff` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
