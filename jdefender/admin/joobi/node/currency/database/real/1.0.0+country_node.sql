CREATE TABLE IF NOT EXISTS `#__country_node` (
 `ctyid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
 `isocode2` char(2) NOT NULL,
 `namekey` varchar(80) NOT NULL,
 `name` varchar(80) NOT NULL,
 `isocode3` char(3) NOT NULL,
 `numcode` smallint(6) NOT NULL DEFAULT '0',
 `timezone` smallint(6) NOT NULL DEFAULT '0',
 `publish` tinyint(4) NOT NULL DEFAULT '1',
 `core` tinyint(4) NOT NULL DEFAULT '0',
 `ordering` smallint(5) unsigned NOT NULL DEFAULT '1',
 `modified` int(10) unsigned NOT NULL DEFAULT '0',
 `description` text NOT NULL,
 PRIMARY KEY (`ctyid`),
 UNIQUE KEY `UK_country_node_namekey` (`namekey`),
 KEY `IX_country_node_publish_isocode3_ordering` (`publish`,`isocode3`,`ordering`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;