CREATE TABLE `almacenes_productos` (
  `almcod` BIGINT(18) NOT NULL,
  `invPrdId` BIGINT(13) NOT NULL,
  `stock` INT(6) NULL,
  PRIMARY KEY (`almcod`, `invPrdId`),
  INDEX `fk_almacenes_productos_productos_idx` (`invPrdId` ASC),
  CONSTRAINT `fk_almacenes_productos_almacenes`
    FOREIGN KEY (`almcod`)
    REFERENCES `nw202201`.`almacenes` (`almcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_almacenes_productos_productos`
    FOREIGN KEY (`invPrdId`)
    REFERENCES `nw202201`.`productos` (`invPrdId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

ALTER TABLE `productos` 
ADD COLUMN `invPrdPrcVnt` DECIMAL(13,2) NULL DEFAULT 0 AFTER `invPrdVnd`;
