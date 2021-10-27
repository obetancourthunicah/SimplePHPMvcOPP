CREATE TABLE `categorias` (
  `catid` BIGINT(8) NOT NULL AUTO_INCREMENT,
  `catnom` VARCHAR(45) NULL,
  `catest` CHAR(3) NULL DEFAULT 'ACT',
  PRIMARY KEY (`catid`));
