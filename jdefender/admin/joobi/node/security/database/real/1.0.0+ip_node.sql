CREATE TABLE IF NOT EXISTS `#__ip_node` (
 `ipid` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `from` double unsigned NOT NULL DEFAULT '0',
 `to` double unsigned NOT NULL DEFAULT '0',
 `ctyid` smallint(5) unsigned NOT NULL DEFAULT '0',
 `created` int(10) unsigned NOT NULL DEFAULT '1456900000',
 PRIMARY KEY (`ipid`),
 UNIQUE KEY `UK_ip_node_to_from` (`to`,`from`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;