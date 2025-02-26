CREATE TABLE IF NOT EXISTS `#__currency_conversion` (
 `curid` tinyint(3) unsigned NOT NULL,
 `curid_ref` smallint(5) unsigned NOT NULL,
 `name` varchar(100) NOT NULL,
 `alias` varchar(100) NOT NULL,
 `exchange` decimal(12,6) unsigned NOT NULL DEFAULT '0.000000',
 `rate` decimal(12,6) unsigned NOT NULL DEFAULT '0.000000',
 `fee` decimal(4,2) unsigned NOT NULL DEFAULT '0.00',
 `publish` tinyint(4) NOT NULL DEFAULT '0',
 `modified` int(10) unsigned NOT NULL DEFAULT '0',
 `accepted` tinyint(4) NOT NULL DEFAULT '0',
 `ordering` tinyint(3) unsigned NOT NULL DEFAULT '0',
 PRIMARY KEY (`curid`,`curid_ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;