CREATE TABLE `clientes` (
  `clientid` bigint(15) NOT NULL AUTO_INCREMENT,
  `clientname` varchar(128) DEFAULT NULL,
  `clientgender` char(3) DEFAULT NULL,
  `clientphone1` varchar(255) DEFAULT NULL,
  `clientphone2` varchar(255) DEFAULT NULL,
  `clientemail` varchar(255) DEFAULT NULL,
  `clientIdnumber` varchar(45) DEFAULT NULL,
  `clientbio` varchar(5000) DEFAULT NULL,
  `clientstatus` char(3) DEFAULT NULL,
  `clientdatecrt` datetime DEFAULT NULL,
  `clientusercreates` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`clientid`)
) ENGINE=InnoDB;
