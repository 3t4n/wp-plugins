CREATE TABLE IF NOT EXISTS `#__audit_badwords` (
 `adbdwdid` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `alias` varchar(150) NOT NULL,
 `uid` int(10) unsigned NOT NULL DEFAULT '0',
 `publish` tinyint(4) NOT NULL DEFAULT '0',
 `created` int(10) unsigned NOT NULL DEFAULT '0',
 `modified` int(10) unsigned NOT NULL DEFAULT '0',
 `lgid` tinyint(3) unsigned NOT NULL DEFAULT '0',
 `type` tinyint(4) NOT NULL DEFAULT '1',
 PRIMARY KEY (`adbdwdid`),
 UNIQUE KEY `UK_audit_badwords_lgid_alias` (`lgid`,`alias`),
 KEY `IX_audit_badwords_publish` (`publish`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;