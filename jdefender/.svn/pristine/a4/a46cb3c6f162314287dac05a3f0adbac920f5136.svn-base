CREATE TABLE IF NOT EXISTS `#__activity_pages` (
 `actpgid` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `created` int(10) unsigned NOT NULL DEFAULT '0',
 `actid` int(10) unsigned NOT NULL DEFAULT '0',
 `pagetile` varchar(100) NOT NULL,
 `pageurl` varchar(254) NOT NULL,
 `ctrid` mediumint(8) unsigned NOT NULL DEFAULT '0',
 `wid` mediumint(8) unsigned NOT NULL DEFAULT '0',
 `controller` varchar(200) NOT NULL,
 `task` varchar(200) NOT NULL,
 `eid` int(10) unsigned NOT NULL DEFAULT '0',
 `request` text NOT NULL,
 `login` tinyint(3) unsigned NOT NULL DEFAULT '5',
 PRIMARY KEY (`actpgid`),
 KEY `IX_activity_pages_created` (`created`),
 KEY `IX_activity_pages_actid` (`actid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;