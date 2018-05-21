CREATE DATABASE `sms_marketing`;
USE `sms_marketing` ;

-- -----------------------------------------------------
-- Table `sms_marketing`.`negocio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sms_marketing`.`negocio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `razonSocial` VARCHAR(100) NULL,
  `rubro` VARCHAR(45) NULL,
  `direccion` VARCHAR(100) NULL,
  `tipoSuscripcion` VARCHAR(20) NULL,
  `fechaRegistro` DATETIME NULL,
  `fechaModificacion` DATETIME NULL,
  `estado` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sms_marketing`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sms_marketing`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` VARCHAR(15) NOT NULL,
  `pass` VARCHAR(41) NULL,
  `nivel` TINYINT NULL,
  `email` VARCHAR(45) NULL,
  `fechaRegistro` DATETIME NULL,
  `fechaModificacion` DATETIME NULL,
  `estado` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombreusuario_UNIQUE` (`nombreUsuario` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sms_marketing`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sms_marketing`.`persona` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(15) NULL,
  `apellidos` VARCHAR(15) NULL,
  `telefono` VARCHAR(8) NULL,
  `email` VARCHAR(45) NULL,
  `direccion` VARCHAR(60) NULL,
  `genero` VARCHAR(10) NULL,
  `fechaNacimiento` DATE NULL,
  `fechaRegistro` DATETIME NULL,
  `fechaModificacion` DATETIME NULL,
  `estado` TINYINT NOT NULL DEFAULT 1,
  `usuario_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `usuario_id`),
  INDEX `fk_cliente_usuario_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_cliente_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `sms_marketing`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sms_marketing`.`persona_negocio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sms_marketing`.`persona_negocio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `rol` VARCHAR(45) NULL,
  `negocio_id` INT(11) NOT NULL,
  `persona_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `negocio_id`, `persona_id`),
  INDEX `fk_cliente_negocio_negocio_idx` (`negocio_id` ASC),
  INDEX `fk_cliente_negocio_persona1_idx` (`persona_id` ASC),
  CONSTRAINT `fk_cliente_negocio_negocio`
    FOREIGN KEY (`negocio_id`)
    REFERENCES `sms_marketing`.`negocio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_negocio_persona1`
    FOREIGN KEY (`persona_id`)
    REFERENCES `sms_marketing`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sms_marketing`.`contactanos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sms_marketing`.`contactanos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `correo` VARCHAR(45) NULL,
  `asunto` VARCHAR(45) NULL,
  `mensaje` VARCHAR(300) NULL,
  `fechaRegistro` DATETIME NULL,
  `estado` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sms_marketing`.`destinatario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sms_marketing`.`destinatario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `telefono` VARCHAR(8) NULL,
  `email` VARCHAR(45) NULL,
  `fechaRegistro` DATETIME NULL,
  `fechaModificacion` DATETIME NULL,
  `estado` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sms_marketing`.`mensaje`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sms_marketing`.`mensaje` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fechaenvio` DATETIME NOT NULL,
  `contenido` VARCHAR(100) NULL,
  `estado` TINYINT NOT NULL DEFAULT 1,
  `persona_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `persona_id`),
  INDEX `fk_mensaje_persona1_idx` (`persona_id` ASC),
  CONSTRAINT `fk_mensaje_persona1`
    FOREIGN KEY (`persona_id`)
    REFERENCES `sms_marketing`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sms_marketing`.`mensaje_destinatario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sms_marketing`.`mensaje_destinatario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `mensaje_id` INT(11) NOT NULL,
  `destinatario_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `mensaje_id`, `destinatario_id`),
  INDEX `fk_mensaje_destinatario_mensaje1_idx` (`mensaje_id` ASC),
  INDEX `fk_mensaje_destinatario_destinatario1_idx` (`destinatario_id` ASC),
  CONSTRAINT `fk_mensaje_destinatario_mensaje1`
    FOREIGN KEY (`mensaje_id`)
    REFERENCES `sms_marketing`.`mensaje` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mensaje_destinatario_destinatario1`
    FOREIGN KEY (`destinatario_id`)
    REFERENCES `sms_marketing`.`destinatario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sms_marketing`.`rubro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sms_marketing`.`rubro` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `fechaRegistro` DATETIME NULL,
  `fechaModificacion` DATETIME NULL,
  `estado` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sms_marketing`.`negocio_rubro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sms_marketing`.`negocio_rubro` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `negocio_id` INT(11) NOT NULL,
  `rubro_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `negocio_id`, `rubro_id`),
  INDEX `fk_negocio_rubro_negocio1_idx` (`negocio_id` ASC),
  INDEX `fk_negocio_rubro_rubro1_idx` (`rubro_id` ASC),
  CONSTRAINT `fk_negocio_rubro_negocio1`
    FOREIGN KEY (`negocio_id`)
    REFERENCES `sms_marketing`.`negocio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_negocio_rubro_rubro1`
    FOREIGN KEY (`rubro_id`)
    REFERENCES `sms_marketing`.`rubro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



