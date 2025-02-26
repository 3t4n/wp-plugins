CREATE TABLE IF NOT EXISTS `#__scheduler_processes` (
 `pcsid` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `schid` smallint(5) unsigned NOT NULL DEFAULT '0',
 `created` int(10) unsigned NOT NULL DEFAULT '0',
 PRIMARY KEY (`pcsid`),
 KEY `IX_scheduler_processes_schid` (`schid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;