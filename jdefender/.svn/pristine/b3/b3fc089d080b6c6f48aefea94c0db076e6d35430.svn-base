CREATE TABLE IF NOT EXISTS `#__activity_incident` (
 `incdtid` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
 `created` int(10) unsigned NOT NULL DEFAULT '0',
 `url` varchar(255) NOT NULL,
 `actid` int(10) unsigned NOT NULL DEFAULT '0',
 `ip` double unsigned NOT NULL DEFAULT '0',
 `details` text NOT NULL,
 `uid` int(10) unsigned NOT NULL DEFAULT '0',
 `alias` varchar(255) NOT NULL,
 `publish` tinyint(4) NOT NULL DEFAULT '1',
 `severity` tinyint(4) NOT NULL DEFAULT '0',
 PRIMARY KEY (`incdtid`),
 KEY `IX_activity_incident_created` (`created`),
 KEY `IX_activity_incident_uid` (`uid`),
 KEY `IX_activity_incident_ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;