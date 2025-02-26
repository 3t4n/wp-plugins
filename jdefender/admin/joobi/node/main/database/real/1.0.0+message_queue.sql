CREATE TABLE IF NOT EXISTS `#__message_queue` (
 `mgqid` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `mgid` int(10) unsigned NOT NULL DEFAULT '0',
 `uid` int(10) unsigned NOT NULL DEFAULT '0',
 `created` int(10) unsigned NOT NULL DEFAULT '0',
 `priority` tinyint(3) unsigned NOT NULL DEFAULT '254',
 `expirationdate` int(10) unsigned NOT NULL DEFAULT '0',
 `repetition` tinyint(3) unsigned NOT NULL DEFAULT '1',
 `params` text NOT NULL,
 `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
 `content` text NOT NULL,
 `isread` tinyint(3) unsigned NOT NULL DEFAULT '0',
 `title` varchar(255) NOT NULL,
 `subtitle` varchar(255) NOT NULL,
 `link` varchar(254) NOT NULL,
 PRIMARY KEY (`mgqid`),
 KEY `IX_message_queue_uid_read_create` (`uid`,`isread`,`created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;