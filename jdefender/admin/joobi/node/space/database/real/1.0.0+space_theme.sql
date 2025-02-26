CREATE TABLE IF NOT EXISTS `#__space_theme` (
 `wsid` smallint(5) unsigned NOT NULL DEFAULT '0',
 `size` tinyint(3) unsigned NOT NULL DEFAULT '0',
 `device` tinyint(3) unsigned NOT NULL DEFAULT '0',
 `tmid` mediumint(8) unsigned NOT NULL DEFAULT '0',
 PRIMARY KEY (`wsid`,`size`,`device`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;