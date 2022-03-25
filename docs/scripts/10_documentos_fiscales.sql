CREATE TABLE `documento_fiscal` (
  `doccod` bigint(18) NOT NULL AUTO_INCREMENT,
  `docfch` datetime DEFAULT NULL,
  `usercod` bigint(10) DEFAULT NULL,
  `docobs` varchar(256) DEFAULT NULL,
  `docshipping` varchar(256) DEFAULT NULL,
  `docest` char(3) DEFAULT NULL,
  `docmeta` mediumtext,
  `docfchdlv` datetime DEFAULT NULL,
  `docestdlv` char(3) DEFAULT NULL,
  `docFrmPgo` char(3) DEFAULT NULL,
  PRIMARY KEY (`doccod`),
  KEY `fk_documento_fiscal_usuario_idx` (`usercod`),
  CONSTRAINT `fk_documento_fiscal_usuario` FOREIGN KEY (`usercod`) REFERENCES `usuario` (`usercod`) ON DELETE NO ACTION ON UPDATE NO ACTION
);


CREATE TABLE `documento_fiscal_lineas` (
  `doccod` BIGINT(18) NOT NULL,
  `invPrdId` BIGINT(13) NOT NULL,
  `docCtd` INT(6) NULL,
  `docPrc` DECIMAL(13,2) NULL,
  `docIva` DECIMAL(6,2) NULL,
  `docLObs` VARCHAR(256) NULL,
  `docDsc` DECIMAL(6,2) NULL,
  PRIMARY KEY (`doccod`, `invPrdId`),
  INDEX `fk_linea_documento_fiscal_producto_idx_idx` (`invPrdId` ASC),
  CONSTRAINT `fk_linea_documento_fiscal_idx`
    FOREIGN KEY (`doccod`)
    REFERENCES `nw202201`.`documento_fiscal` (`doccod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_linea_documento_fiscal_producto_idx`
    FOREIGN KEY (`invPrdId`)
    REFERENCES `nw202201`.`productos` (`invPrdId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
