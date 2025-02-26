CREATE TABLE IF NOT EXISTS `#__credentials_type` (
 `crdidtype` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
 `namekey` varchar(150) NOT NULL,
 `alias` varchar(150) NOT NULL,
 `rolid` smallint(5) unsigned NOT NULL DEFAULT '1',
 `uid` int(10) unsigned NOT NULL DEFAULT '0',
 `modifiedby` int(10) unsigned NOT NULL DEFAULT '0',
 `core` tinyint(4) NOT NULL DEFAULT '0',
 `publish` tinyint(4) NOT NULL DEFAULT '0',
 `created` int(10) unsigned NOT NULL DEFAULT '0',
 `modified` int(10) unsigned NOT NULL DEFAULT '0',
 `category` tinyint(3) unsigned NOT NULL DEFAULT '0',
 PRIMARY KEY (`crdidtype`),
 UNIQUE KEY `UK_credentials_type_namekey` (`namekey`),
 KEY `IX_credentials_type_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;