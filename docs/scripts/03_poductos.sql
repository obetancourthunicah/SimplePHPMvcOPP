CREATE TABLE `productos` (
  `invPrdId` bigint(13) NOT NULL AUTO_INCREMENT,
  `invPrdBrCod` varchar(128) DEFAULT NULL,
  `invPrdCodInt` varchar(128) DEFAULT NULL,
  `invPrdDsc` varchar(128) DEFAULT NULL,
  `invPrdTip` char(3) DEFAULT NULL,
  `invPrdEst` char(3) DEFAULT NULL,
  `invPrdPadre` bigint(13) DEFAULT NULL,
  `invPrdFactor` int(11) DEFAULT NULL,
  `invPrdVnd` char(3) DEFAULT NULL,
  PRIMARY KEY (`invPrdId`),
  UNIQUE KEY `invPrdBrCod_UNIQUE` (`invPrdBrCod`),
  UNIQUE KEY `invPrdCodIng_UNIQUE` (`invPrdCodInt`)
) ENGINE=InnoDB;
