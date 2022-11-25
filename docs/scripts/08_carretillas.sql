

CREATE TABLE `productos` (
  `codprd` BIGINT(18) NOT NULL AUTO_INCREMENT,
  `dscprd` VARCHAR(70) NOT NULL,
  `sdscprd` VARCHAR(255) NOT NULL,
  `ldscprd` TEXT NULL,
  `skuprd` VARCHAR(128) NOT NULL,
  `bcdprd` VARCHAR(128) NOT NULL,
  `stkprd` INT NOT NULL,
  `typprd` CHAR(3) NOT NULL,
  `prcprd` DECIMAL(12,2) NOT NULL,
  `urlprd` VARCHAR(255) NULL,
  `urlthbprd` VARCHAR(255) NULL,
  `estprd` CHAR(3) NOT NULL,
  PRIMARY KEY (`codprd`),
  UNIQUE INDEX `skuprd_UNIQUE` (`skuprd` ASC),
  UNIQUE INDEX `bcdprd_UNIQUE` (`bcdprd` ASC));

CREATE TABLE `carretilla` (
  `usercod` BIGINT(10) NOT NULL,
  `codprd` BIGINT(18) NOT NULL,
  `crrctd` INT(5) NOT NULL,
  `crrprc` DECIMAL(12,2) NOT NULL,
  `crrfching` DATETIME NOT NULL,
  PRIMARY KEY (`usercod`, `codprd`),
  INDEX `codprd_idx` (`codprd` ASC),
  CONSTRAINT `carretilla_user_key`
    FOREIGN KEY (`usercod`)
    REFERENCES `usuario` (`usercod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `carretilla_prd_key`
    FOREIGN KEY (`codprd`)
    REFERENCES `productos` (`codprd`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `carretillaanon` (
  `anoncod` varchar(128) NOT NULL,
  `codprd` bigint(18) NOT NULL,
  `crrctd` int(5) NOT NULL,
  `crrprc` decimal(12,2) NOT NULL,
  `crrfching` datetime NOT NULL,
  PRIMARY KEY (`anoncod`,`codprd`),
  KEY `codprd_idx` (`codprd`),
  CONSTRAINT `carretillaanon_prd_key` FOREIGN KEY (`codprd`) REFERENCES `productos` (`codprd`) ON DELETE NO ACTION ON UPDATE NO ACTION
);
