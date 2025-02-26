CREATE TABLE IF NOT EXISTS `#__audit_fields` (
 `auditfldid` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `uid` int(10) unsigned NOT NULL DEFAULT '0',
 `created` int(10) unsigned NOT NULL DEFAULT '0',
 `dbcid` mediumint(8) unsigned NOT NULL DEFAULT '0',
 `sid` smallint(5) unsigned NOT NULL DEFAULT '0',
 `eid` int(10) unsigned NOT NULL DEFAULT '0',
 `before_value_string` varchar(255) NOT NULL,
 `after_value_string` varchar(255) NOT NULL,
 `before_value_text` text NOT NULL,
 `after_value_text` text NOT NULL,
 PRIMARY KEY (`auditfldid`),
 KEY `IK_audit_fields_uid_created` (`uid`,`created`),
 KEY `IK_audit_fields_sid_created` (`sid`,`created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;