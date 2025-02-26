CREATE TABLE IF NOT EXISTS `#__redirect_sef` (
 `sefid` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `namekey` varchar(250) NOT NULL,
 `lgid` tinyint(3) unsigned NOT NULL DEFAULT '1',
 `controller` varchar(100) NOT NULL,
 `task` varchar(100) NOT NULL,
 `eid` int(10) unsigned NOT NULL DEFAULT '0',
 `others` varchar(254) NOT NULL,
 PRIMARY KEY (`sefid`),
 KEY `IX_redirect_sef_all` (`lgid`,`controller`(30),`task`(20),`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;