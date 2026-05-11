
LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'ViewAny:InstallationPoint','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(2,'View:InstallationPoint','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(3,'Create:InstallationPoint','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(4,'Update:InstallationPoint','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(5,'Delete:InstallationPoint','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(6,'Restore:InstallationPoint','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(7,'ForceDelete:InstallationPoint','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(8,'ForceDeleteAny:InstallationPoint','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(9,'RestoreAny:InstallationPoint','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(10,'Replicate:InstallationPoint','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(11,'Reorder:InstallationPoint','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(12,'ViewAny:MaintenanceRecord','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(13,'View:MaintenanceRecord','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(14,'Create:MaintenanceRecord','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(15,'Update:MaintenanceRecord','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(16,'Delete:MaintenanceRecord','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(17,'Restore:MaintenanceRecord','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(18,'ForceDelete:MaintenanceRecord','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(19,'ForceDeleteAny:MaintenanceRecord','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(20,'RestoreAny:MaintenanceRecord','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(21,'Replicate:MaintenanceRecord','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(22,'Reorder:MaintenanceRecord','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(23,'ViewAny:Opd','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(24,'View:Opd','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(25,'Create:Opd','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(26,'Update:Opd','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(27,'Delete:Opd','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(28,'Restore:Opd','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(29,'ForceDelete:Opd','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(30,'ForceDeleteAny:Opd','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(31,'RestoreAny:Opd','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(32,'Replicate:Opd','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(33,'Reorder:Opd','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(34,'ViewAny:ProgressUpdate','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(35,'View:ProgressUpdate','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(36,'Create:ProgressUpdate','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(37,'Update:ProgressUpdate','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(38,'Delete:ProgressUpdate','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(39,'Restore:ProgressUpdate','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(40,'ForceDelete:ProgressUpdate','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(41,'ForceDeleteAny:ProgressUpdate','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(42,'RestoreAny:ProgressUpdate','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(43,'Replicate:ProgressUpdate','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(44,'Reorder:ProgressUpdate','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(45,'ViewAny:Role','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(46,'View:Role','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(47,'Create:Role','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(48,'Update:Role','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(49,'Delete:Role','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(50,'Restore:Role','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(51,'ForceDelete:Role','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(52,'ForceDeleteAny:Role','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(53,'RestoreAny:Role','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(54,'Replicate:Role','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(55,'Reorder:Role','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(56,'ViewAny:User','web','2026-01-05 20:27:34','2026-01-05 20:27:34'),(57,'View:User','web','2026-01-05 20:27:34','2026-01-05 20:27:34'),(58,'Create:User','web','2026-01-05 20:27:34','2026-01-05 20:27:34'),(59,'Update:User','web','2026-01-05 20:27:34','2026-01-05 20:27:34'),(60,'Delete:User','web','2026-01-05 20:27:34','2026-01-05 20:27:34'),(61,'Restore:User','web','2026-01-05 20:27:34','2026-01-05 20:27:34'),(62,'ForceDelete:User','web','2026-01-05 20:27:34','2026-01-05 20:27:34'),(63,'ForceDeleteAny:User','web','2026-01-05 20:27:34','2026-01-05 20:27:34'),(64,'RestoreAny:User','web','2026-01-05 20:27:34','2026-01-05 20:27:34'),(65,'Replicate:User','web','2026-01-05 20:27:34','2026-01-05 20:27:34'),(66,'Reorder:User','web','2026-01-05 20:27:34','2026-01-05 20:27:34'),(67,'View:RecentUpdates','web','2026-01-05 20:27:34','2026-01-05 20:27:34'),(68,'View:StatsOverview','web','2026-01-05 20:27:34','2026-01-05 20:27:34'),(69,'View:StatusChart','web','2026-01-05 20:27:34','2026-01-05 20:27:34');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'super_admin','web','2026-01-04 20:25:59','2026-01-04 20:25:59'),(2,'panel_user','web','2026-01-04 21:18:34','2026-01-04 21:18:34'),(3,'Vendor','web','2026-01-05 20:06:13','2026-01-05 20:06:13');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-07 11:09:18
