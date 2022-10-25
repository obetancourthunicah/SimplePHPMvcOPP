CREATE TABLE `quotes` (
  `quoteId` BIGINT(18) NOT NULL AUTO_INCREMENT,
  `quote` VARCHAR(512) NULL,
  `author` VARCHAR(128) NULL,
  `status` CHAR(3) NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  PRIMARY KEY (`quoteId`));
