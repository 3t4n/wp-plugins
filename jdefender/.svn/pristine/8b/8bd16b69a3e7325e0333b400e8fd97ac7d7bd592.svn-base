CREATE TABLE IF NOT EXISTS `#__audit_node` (
 `auditid` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `uid` int(10) unsigned NOT NULL DEFAULT '0',
 `created` int(10) unsigned NOT NULL DEFAULT '0',
 `dbtid` smallint(5) unsigned NOT NULL DEFAULT '0',
 `sid` smallint(5) unsigned NOT NULL DEFAULT '0',
 `eid` int(10) unsigned NOT NULL DEFAULT '0',
 `before_text` text NOT NULL,
 `after_text` text NOT NULL,
 `namekeyvalue` varchar(254) NOT NULL,
 `action` tinyint(3) unsigned NOT NULL DEFAULT '0',
 PRIMARY KEY (`auditid`),
 KEY `IX_audit_node_uid_created` (`created`,`uid`),
 KEY `IX_audit_node_sid_created` (`sid`,`created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;