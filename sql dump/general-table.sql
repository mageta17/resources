--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drivers` (
  `employeeId` int NOT NULL AUTO_INCREMENT,
  `first_name` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `middle_name` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `employeeName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `employeePosition` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `drivingLicenseNo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `drivingLicenseNoExpire` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `drivingLicenseImage` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fieldSupervisor` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mobileNo1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mobileNo2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `project` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `vehicleNo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_ID` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `issued_fuel` int NOT NULL,
  `company` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `dob` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `pob` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nationality` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `marital_status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `box` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `town` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `email` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_employment` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `employment_no` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `nssf_no` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `tin_no` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `nida_no` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `banckacc_no` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `bankname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `dependant_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dependant_dob` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `depandant_relationship` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `dependant_name_1` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dependant_dob_1` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `depandant_relationship_1` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `dependant_name_2` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dependant_dob_2` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `depandant_relationship_2` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `dependant_name_3` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dependant_dob_3` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `depandant_relationship_3` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `dependant_name_4` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dependant_dob_4` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `depandant_relationship_4` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kin_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kin_dob` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kin_contact` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kin_relationship` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kin_name_1` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kin_dob_1` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kin_contact_1` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kin_relationship_1` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `national_id_attachment` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `marriage_certificate_attachment` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `img_name` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `total_leave` int NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `delete_status` int NOT NULL,
  `employment_terms` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `salary` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `termination_status` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `termination_reason` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `termination_date` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `contract_exp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`employeeId`)
) ENGINE=InnoDB AUTO_INCREMENT=751 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--


LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` VALUES (1,'Pascal','Yohana','Tessua','Pascal Yohana Tessua','Operation manager','Operations','32324324243','2021-6-22','','Dar es salaam','Danson Oluoch Okongo','+255677047893','0658 880168','Minara','T996CXG','279',5571,'Northern engineering works ltd','1981-04-25','DAR - ES - SALAAM','Male','TANZANIAN','Married','1105','255','Moshi','ptessua1@gmail.com','2018-03-15','P965','38 206 285','110-499-442','19810425-23118-00003-22','0150 170 214 300','Crdb','Stella','1983-06-23','Wife','Michael','2007-03-11','Child','Joan','2011-03-15','Child','Happy','2015-05-15','Child','Eliza','2012-09-12','Child','Laurent','1979-01-31','0753 557 725','Brother','Stella Nampuuga','1983-06-23','07156 703 19','Wife','','pascalyohanatessua.6438f3984e4fc7.52320545.pdf','pascalyohanatessua.6438ee74923390.77398741.jpg',28,'Field Supervisor',0,'Fixed Terms','1,500,000','Active','','','Expired'),(2,'Noel','Marandu','','Noel Marandu','Driver','','4000329653','2020-11-6','','Makambako','','0767 817062','','HTT','','323',0,'Northern engineering works ltd','','','','','','0','0','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','',28,'',1,'Fixed Terms','','Active','','','');

/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicles` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `vehicleNo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `make` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `series` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `modelNo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bodyType` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `chassisNo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `engineNo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `currentMileage` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `odometer` int NOT NULL,
  `lastServiceMileage` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `lastTyreExchangeMileage` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `fuelUsed` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'RUNNING',
  `project` text COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Waiting for plan',
  `mode` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `manufactureYear` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `zone` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `delete_status` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (1,'T109AUH','Toyota','Landcruiser','75R','AHT31PJ','Pick-up','AHT31PJ7507601579','0215248','162',0,'158529','0','Diesel','RUNNING','Minara','Ngara','Waiting for plan','4X4','1997','Northern engineering works ltd','',0,'2022-12-21 18:57:11'),(3,'T123CWX','Toyota','Landcruiser','79R','JTELB71J','Pick-up','JTELB71J607036155','1HZ0435793','378000',0,'0','362649','Petrol','UNDER REPAIR','Fleet','Arusha ','Waiting for plan','4X4','2003','Northern engineering works ltd','',0,'2022-12-21 18:57:11');

/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;