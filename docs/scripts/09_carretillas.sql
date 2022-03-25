CREATE TABLE`carretilla_anon` (
  `anoncartid` BIGINT(18) NOT NULL,
  `invPrdId` BIGINT(13) NOT NULL,
  `cartCtd` INT(6) NULL,
  `cartPrc` DECIMAL(13,2) NULL,
  `cartIat` DATETIME NULL,
  PRIMARY KEY (`anoncartid`, `invPrdId`),
  INDEX `fk_carretilla_anon_productos_idx` (`invPrdId` ASC),
  CONSTRAINT `fk_carretilla_anon_productos`
    FOREIGN KEY (`invPrdId`)
    REFERENCES `productos` (`invPrdId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



CREATE TABLE `carretilla_auth` (
  `usercod` bigint(10) NOT NULL,
  `invPrdId` BIGINT(13) NOT NULL,
  `cartCtd` INT(6) NULL,
  `cartPrc` DECIMAL(13,2) NULL,
  `cartIat` DATETIME NULL,
  PRIMARY KEY (`usercod`, `invPrdId`),
  INDEX `fk_carretilla_auth_productos_idx` (`invPrdId` ASC),
  CONSTRAINT `fk_carretilla_auth_productos`
    FOREIGN KEY (`invPrdId`)
    REFERENCES `productos` (`invPrdId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carretilla_auth_usuarios_idx`
    FOREIGN KEY (`usercod`)
    REFERENCES `usuario` (`usercod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
