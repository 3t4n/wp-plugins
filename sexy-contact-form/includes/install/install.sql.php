<?php 
global $wpdb;
global $wpscf_db_version;

delete_option("wpscf_db_version");
add_option("wpscf_db_version", $wpscf_db_version);

require_once(ABSPATH . '/wp-admin/includes/upgrade.php');

$sql =
"
CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."sexy_forms` (
`id` int(10) unsigned NULL AUTO_INCREMENT,
`email_to` text NULL,
`email_bcc` text NULL,
`email_subject` text NULL,
`email_from` text NULL,
`email_from_name` text NULL,
`email_replyto` text NULL,
`email_replyto_name` text NULL,
`shake_count` mediumint(8) unsigned NULL,
`shake_distanse` mediumint(8) unsigned NULL,
`shake_duration` mediumint(8) unsigned NULL,
`id_template` mediumint(8) unsigned NULL,
`name` text NULL,
`top_text` text NULL,
`pre_text` text NULL,
`thank_you_text` text NULL,
`send_text` text NULL,
`send_new_text` text NULL,
`close_alert_text` text NULL,
`form_width` text NULL,
`alias` text NULL,
`created` datetime NULL,
`publish_up` datetime NULL,
`publish_down` datetime NULL,
`published` tinyint(1) NULL,
`checked_out` int(10) unsigned NULL,
`checked_out_time` datetime NULL,
`access` int(10) unsigned NULL,
`featured` tinyint(3) unsigned NULL,
`ordering` int(11) NULL,
`language` char(7) NULL,
`redirect` enum('0','1') NULL DEFAULT '0',
`redirect_itemid` int(10) unsigned NULL,
`redirect_url` text NULL,
`redirect_delay` int(11) NULL,
`send_copy_enable` enum('0','1') NULL,
`send_copy_text` text NULL,
`show_back` enum('0','1') NULL DEFAULT '1',
PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET = `utf8`;
";
dbDelta($sql);
$sql =
"
INSERT IGNORE INTO `".$wpdb->prefix."sexy_forms` (`id`, `email_to`, `email_bcc`, `email_subject`, `email_from`, `email_from_name`, `email_replyto`, `email_replyto_name`, `shake_count`, `shake_distanse`, `shake_duration`, `id_template`, `name`, `top_text`, `pre_text`, `thank_you_text`, `send_text`, `send_new_text`, `close_alert_text`, `form_width`, `alias`, `created`, `publish_up`, `publish_down`, `published`, `checked_out`, `checked_out_time`, `access`, `featured`, `ordering`, `language`, `redirect`, `redirect_itemid`, `redirect_url`, `redirect_delay`, `send_copy_enable`, `send_copy_text`) VALUES
(1, '', '', '', '', '', '', '', 2, 10, 300, 4, 'Contact Form Example', 'Contact Us', 'Feel free to contact us if you have any questions', 'Message successfully sent', 'Send', 'New email', 'OK', '100%', '', '2013-06-26 15:43:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', 1, 0, 0, '', '0', 103, '', 0, '1', 'Send me a copy');
";
$wpdb->query($sql);

$sql =
"
CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."sexy_fields` (
`id` int(10) unsigned NULL AUTO_INCREMENT,
`id_user` int(10) unsigned NULL,
`id_form` mediumint(8) unsigned NULL,
`name` text NULL,
`id_type` mediumint(8) unsigned NULL,
`alias` text NULL,
`created` datetime NULL,
`publish_up` datetime NULL,
`publish_down` datetime NULL,
`published` tinyint(1) NULL,
`checked_out` int(10) unsigned NULL,
`checked_out_time` datetime NULL,
`access` int(10) unsigned NULL,
`featured` tinyint(3) unsigned NULL,
`ordering` int(11) NULL,
`language` char(7) NULL,
`required` enum('0','1') NULL DEFAULT '0',
`width` text NULL,
`select_show_scroll_after` int(11) NULL DEFAULT '10',
`select_show_search_after` int(11) NULL DEFAULT '10',
`message_required` text NULL,
`message_invalid` text NULL,
`ordering_field` enum('0','1') NULL DEFAULT '0',
`show_parent_label` enum('0','1') NULL DEFAULT '1',
`select_default_text` text NULL,
`select_no_match_text` text NULL,
`upload_button_text` text NULL,
`upload_minfilesize` text NULL,
`upload_maxfilesize` text NULL,
`upload_acceptfiletypes` text NULL,
`upload_minfilesize_message` text NULL,
`upload_maxfilesize_message` text NULL,
`upload_acceptfiletypes_message` text NULL,
`captcha_wrong_message` text NULL,
PRIMARY KEY (`id`),
KEY `id_user` (`id_user`),
KEY `id_form` (`id_form`)
) ENGINE=MyISAM CHARACTER SET = `utf8`;
";
dbDelta($sql);
$sql =
"
INSERT IGNORE INTO `".$wpdb->prefix."sexy_fields` (`id`, `id_user`, `id_form`, `name`, `id_type`, `alias`, `created`, `publish_up`, `publish_down`, `published`, `checked_out`, `checked_out_time`, `access`, `featured`, `ordering`, `language`, `required`, `width`, `select_show_scroll_after`, `select_show_search_after`, `message_required`, `message_invalid`, `ordering_field`, `show_parent_label`, `select_default_text`, `select_no_match_text`, `upload_button_text`, `upload_minfilesize`, `upload_maxfilesize`, `upload_acceptfiletypes`, `upload_minfilesize_message`, `upload_maxfilesize_message`, `upload_acceptfiletypes_message`, `captcha_wrong_message`) VALUES
(1, 0, 1, 'Name', 3, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', 1, 0, 1, '', '1', '', 10, 10, '', '', '0', '1', '', '', '', '', '', '', '', '', '', ''),
(2, 0, 1, 'Email', 4, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', 0, 0, 2, '', '1', '', 10, 10, '', '', '', '1', '', '', '', '0', '0', '', '', '', '', ''),
(3, 0, 1, 'Message', 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', 1, 0, 5, '', '1', '', 10, 10, '', '', '0', '1', '', '', '', '', '', '', '', '', '', '');
";
$wpdb->query($sql);

$sql =
"
CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."sexy_field_types` (
`id` int(10) unsigned NULL AUTO_INCREMENT,
`name` text NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET = `utf8`;
";
dbDelta($sql);
$sql =
"
INSERT IGNORE INTO `".$wpdb->prefix."sexy_field_types` (`id`, `name`) VALUES
(1, 'Text Input'),
(2, 'Text Area'),
(3, 'Name'),
(4, 'E-mail'),
(5, 'Address'),
(6, 'Phone'),
(7, 'Number'),
(8, 'Url'),
(9, 'Select'),
(10, 'Multiple Select'),
(11, 'Checkbox'),
(12, 'Radio'),
(13, 'Captcha : PRO feature'),
(14, 'File upload : PRO feature');
";
$wpdb->query($sql);

$sql =
"
CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."sexy_form_options` (
`id` int(10) unsigned NULL AUTO_INCREMENT,
`id_parent` int(11) unsigned NULL,
`name` text NULL,
`value` text NULL,
`ordering` int(11) NULL,
`showrow` enum('0','1') NULL DEFAULT '1',
`selected` enum('0','1') NULL DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET = `utf8`;
";
dbDelta($sql);

$sql =
"
CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."sexy_contact_templates` (
`id` mediumint(8) unsigned NULL AUTO_INCREMENT,
`name` text NULL,
`created` datetime NULL,
`date_start` date NULL,
`date_end` date NULL,
`publish_up` datetime NULL,
`publish_down` datetime NULL,
`published` tinyint(1) NULL,
`checked_out` int(10) unsigned NULL,
`checked_out_time` datetime NULL,
`access` int(10) unsigned NULL,
`featured` tinyint(3) unsigned NULL,
`ordering` int(11) NULL,
`language` char(7) NULL,
`styles` text NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET = `utf8`;
";
dbDelta($sql);
$sql =
"
INSERT IGNORE INTO `".$wpdb->prefix."sexy_contact_templates` (`id`, `name`, `created`, `date_start`, `date_end`, `publish_up`, `publish_down`, `published`, `checked_out`, `checked_out_time`, `access`, `featured`, `ordering`, `language`, `styles`) VALUES
(1, 'Black', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', 0, 0, 0, '', '0~#2e2d2e|130~#050505|207~15|214~16|213~25|208~16|131~|1~#2b2b2b|2~1|3~solid|4~5|5~5|6~5|7~5|8~#202020|9~|10~0|11~0|12~7|13~0|14~#000000|15~|16~0|17~0|18~10|19~1|20~#ffffff|21~22|22~bold|23~normal|24~none|25~left|27~#000000|28~1|29~1|30~3|190~2|191~0|192~90|193~6|194~1|195~#808080|196~dotted|197~#fafafa|198~12|199~normal|200~italic|201~none|202~|203~#ffffff|204~0|205~0|206~0|215~10|216~0|217~2|218~1|31~#ffffff|32~14|33~normal|34~normal|35~none|36~left|37~#000000|38~1|39~1|40~1|41~#e03c00|42~16|43~normal|44~normal|46~#ffffff|47~0|48~0|49~0|132~#202020|133~#383838|168~43|169~90|170~150|134~#949494|135~1|136~solid|137~4|138~4|139~4|140~4|141~#ffffff|142~|143~0|144~0|145~0|146~0|147~#fafafa|148~14|149~normal|150~normal|151~none|152~tahoma|153~#fcfcfc|154~0|155~0|156~0|157~#454545|158~#0a0a0a|159~#ffffff|160~#ff0000|161~#6b6b6b|162~#fcffc2|163~|164~0|165~0|166~20|167~-1|171~#e03c00|172~#000000|173~0|174~1|175~2|176~#f0b400|177~#701a00|178~#e6cfcf|179~#ffffff|180~#000000|181~-1|182~-1|183~1|184~#ffffff|185~|186~0|187~0|188~15|189~-2|91~#878387|50~#000000|212~left|92~5|93~43|210~16|211~0|219~1|220~0|209~90|100~#383038|101~1|127~solid|102~12|103~0|104~0|105~12|94~#ffffff|95~|96~0|97~2|98~12|99~-2|106~#ffffff|107~14|108~normal|109~normal|110~none|112~Arial|113~#000103|114~1|115~-1|116~1|51~#000000|52~#878387|124~#fafafa|125~#000000|126~#383038|117~#ffffff|118~|119~1|120~-1|121~12|122~-2'),
(2, 'Poison Green', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', 0, 0, 0, '', '0~#a7de00|130~#76a101|207~17|214~17|213~10|208~17|131~''Comic Sans MS'',Georgia,sans-serif!important|1~#2b2b2b|2~0|3~solid|4~8|5~8|6~8|7~8|8~#688a00|9~|10~0|11~0|12~11|13~2|14~#000000|15~|16~0|17~0|18~10|19~1|20~#ffffff|21~24|22~bold|23~normal|24~none|25~left|27~#5b6b00|28~1|29~1|30~3|190~6|191~-2|192~90|193~3|194~1|195~#ffffff|196~dotted|197~#fafafa|198~13|199~normal|200~italic|201~none|202~|203~#323b00|204~0|205~0|206~4|215~0|216~0|217~4|218~0|31~#ffffff|32~13|33~normal|34~normal|35~none|36~left|37~#749d0b|38~1|39~1|40~1|41~#aa00cc|42~16|43~normal|44~normal|46~#ffffff|47~0|48~0|49~0|132~#c5ea0e|133~#c5ea0e|168~46|169~95|170~150|134~#4a8a00|135~1|136~solid|137~4|138~4|139~4|140~4|141~#618208|142~inset|143~6|144~6|145~18|146~0|147~#303e18|148~14|149~normal|150~normal|151~none|152~tahoma|153~#fc0a0a|154~0|155~0|156~0|157~#c5ea0e|158~#e0ff30|159~#151c09|160~#ff0000|161~#9fbd07|162~#749d0b|163~|164~0|165~0|166~20|167~4|171~#9100bd|172~#000000|173~0|174~0|175~0|176~#b361ff|177~#5a0073|178~#450085|179~#ffffff|180~#000000|181~0|182~0|183~0|184~#6e008a|185~inset|186~0|187~0|188~18|189~0|91~#a5d211|50~#407002|212~right|92~6|93~25|210~3|211~0|219~3|220~0|209~95|100~#3f7000|101~1|127~solid|102~11|103~11|104~11|105~11|94~#ffffff|95~inset|96~3|97~3|98~18|99~-3|106~#ffffff|107~14|108~bold|109~normal|110~none|112~''Comic Sans MS'',Georgia,sans-serif!important|113~#427007|114~1|115~-1|116~1|51~#79d107|52~#233d00|124~#fafafa|125~#3e6e00|126~#355e00|117~#ffffff|118~|119~-2|120~-2|121~12|122~-2'),
(4, 'Gray', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', 0, 0, 0, '', '0~#fafafa|130~#a3a3a3|207~17|214~17|213~10|208~17|131~\'Source Sans Pro\', Helvetica, sans-serif|1~#ababab|2~1|3~solid|4~8|5~8|6~8|7~8|8~#333333|9~|10~3|11~3|12~13|13~-1|14~#000000|15~|16~0|17~0|18~10|19~1|20~#333333|21~28|22~normal|23~italic|24~none|25~left|27~#ffffff|28~1|29~1|30~3|190~10|191~-2|192~100|193~3|194~1|195~#292929|196~dotted|197~#333333|198~13|199~normal|200~italic|201~none|202~|203~#ffffff|204~0|205~0|206~4|215~0|216~0|217~1|218~0|31~#000000|32~14|33~normal|34~normal|35~none|36~left|37~#ffffff|38~0|39~0|40~0|41~#f00000|42~16|43~normal|44~normal|46~#ffffff|47~0|48~0|49~0|132~#f0f0f0|133~#9c9c9c|168~60|169~95|170~150|134~#333333|135~1|136~solid|137~4|138~4|139~4|140~4|141~#969696|142~inset|143~0|144~0|145~3|146~0|147~#000000|148~14|149~normal|150~normal|151~none|152~tahoma|153~#fafafa|154~0|155~0|156~0|157~#ffffff|158~#ffffff|159~#1c1c1c|160~#949494|161~#4a4a4a|162~#424142|163~inset|164~0|165~0|166~18|167~0|171~#c40a0a|172~#000000|173~0|174~0|175~0|176~#b5b5b5|177~#000000|178~#000000|179~#ffffff|180~#000000|181~0|182~0|183~0|184~#424142|185~inset|186~0|187~0|188~18|189~0|91~#bababa|50~#212121|212~right|92~6|93~25|210~3|211~0|219~3|220~0|209~95|100~#141414|101~1|127~solid|102~7|103~7|104~7|105~7|94~#636363|95~inset|96~2|97~2|98~3|99~-1|106~#ffffff|107~14|108~bold|109~normal|110~none|112~|113~#000000|114~1|115~-1|116~1|51~#212121|52~#bababa|124~#fafafa|125~#000000|126~#141414|117~#5c5c5c|118~inset|119~-2|120~-2|121~3|122~-1'),
(5, 'Orange', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', 0, 0, 0, '', '0~#fca000|130~#ff9900|207~17|214~17|213~10|208~17|131~|1~#cc4100|2~1|3~solid|4~10|5~10|6~10|7~10|8~#cc4100|9~inset|10~10|11~10|12~45|13~2|14~#cc4100|15~inset|16~12|17~12|18~50|19~6|20~#ffffff|21~24|22~normal|23~normal|24~none|25~left|27~#000000|28~-1|29~-1|30~2|190~6|191~-2|192~90|193~3|194~1|195~#ffffff|196~dotted|197~#000000|198~13|199~normal|200~italic|201~none|202~|203~#ffd500|204~0|205~0|206~1|215~0|216~0|217~1|218~3|31~#000000|32~14|33~normal|34~normal|35~none|36~left|37~#ffd500|38~0|39~0|40~1|41~#d9001d|42~18|43~bold|44~normal|46~#ffffff|47~0|48~0|49~0|132~#b0b0b0|133~#ffffff|168~63|169~93|170~150|134~#ffffff|135~1|136~solid|137~7|138~7|139~7|140~7|141~#262524|142~inset|143~0|144~0|145~25|146~-2|147~#000000|148~14|149~normal|150~normal|151~none|152~tahoma|153~#fafafa|154~0|155~0|156~0|157~#ebebeb|158~#ffffff|159~#1c1c1c|160~#949494|161~#424242|162~#ffffff|163~inset|164~0|165~0|166~10|167~0|171~#c40a0a|172~#000000|173~0|174~0|175~0|176~#b5b5b5|177~#616161|178~#000000|179~#ffffff|180~#000000|181~0|182~0|183~0|184~#1f1f1f|185~inset|186~8|187~10|188~27|189~1|91~#ff0000|50~#630000|212~right|92~6|93~25|210~3|211~0|219~3|220~0|209~93|100~#610000|101~1|127~solid|102~7|103~7|104~7|105~7|94~#300000|95~inset|96~0|97~0|98~0|99~0|106~#ffffff|107~14|108~bold|109~normal|110~none|112~|113~#000000|114~1|115~-1|116~1|51~#ff0000|52~#520000|124~#fafafa|125~#000000|126~#610000|117~#300000|118~inset|119~2|120~3|121~9|122~-2'),
(6, 'Red', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', 0, 0, 0, '', '0~#b0000f|130~#700009|207~17|214~17|213~10|208~17|131~|1~#470006|2~1|3~solid|4~10|5~10|6~10|7~10|8~#470006|9~inset|10~0|11~0|12~49|13~10|14~#470006|15~inset|16~0|17~0|18~50|19~15|20~#ffffff|21~24|22~normal|23~normal|24~none|25~left|27~#000000|28~2|29~1|30~2|190~6|191~-2|192~90|193~3|194~1|195~#ffffff|196~dotted|197~#ffffff|198~13|199~normal|200~italic|201~none|202~|203~#000000|204~2|205~1|206~1|215~0|216~0|217~1|218~3|31~#ffffff|32~14|33~normal|34~normal|35~none|36~left|37~#000000|38~2|39~1|40~1|41~#ffffff|42~18|43~bold|44~normal|46~#ffffff|47~0|48~0|49~0|132~#ffffff|133~#ffffff|168~63|169~93|170~150|134~#540000|135~1|136~solid|137~7|138~7|139~7|140~7|141~#000000|142~inset|143~0|144~0|145~25|146~1|147~#000000|148~14|149~normal|150~normal|151~none|152~tahoma|153~#fafafa|154~0|155~0|156~0|157~#ebebeb|158~#ffffff|159~#1c1c1c|160~#949494|161~#424242|162~#ffffff|163~inset|164~0|165~0|166~10|167~0|171~#f7ff05|172~#000000|173~0|174~0|175~0|176~#7a7a7a|177~#030303|178~#000000|179~#ffffff|180~#000000|181~0|182~0|183~0|184~#1f1f1f|185~inset|186~8|187~10|188~27|189~2|91~#4f4f4f|50~#000000|212~right|92~6|93~25|210~3|211~0|219~3|220~0|209~93|100~#2e0606|101~1|127~solid|102~7|103~7|104~7|105~7|94~#a10000|95~|96~0|97~0|98~16|99~4|106~#ffffff|107~14|108~bold|109~normal|110~none|112~|113~#000000|114~1|115~-1|116~1|51~#424242|52~#000000|124~#fafafa|125~#000000|126~#2e0606|117~#a10000|118~|119~0|120~0|121~18|122~7'),
(7, 'Blue', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', 0, 0, 0, '', '0~#0036bd|130~#0036bd|207~17|214~17|213~10|208~17|131~|1~#001445|2~1|3~solid|4~10|5~10|6~10|7~10|8~#001445|9~inset|10~0|11~0|12~49|13~10|14~#001445|15~inset|16~0|17~0|18~50|19~15|20~#ffffff|21~24|22~normal|23~normal|24~none|25~left|27~#000000|28~2|29~1|30~2|190~6|191~-2|192~90|193~3|194~1|195~#ffffff|196~dotted|197~#ffffff|198~13|199~normal|200~italic|201~none|202~|203~#000000|204~2|205~1|206~1|215~0|216~0|217~1|218~3|31~#ffffff|32~14|33~normal|34~normal|35~none|36~left|37~#000000|38~2|39~1|40~1|41~#ff0000|42~18|43~bold|44~normal|46~#000000|47~2|48~1|49~1|132~#8389fc|133~#ffffff|168~63|169~93|170~150|134~#b6c9f5|135~1|136~solid|137~7|138~7|139~7|140~7|141~#89a100|142~inset|143~0|144~0|145~0|146~0|147~#000000|148~14|149~normal|150~normal|151~none|152~tahoma|153~#fafafa|154~0|155~0|156~0|157~#ebebeb|158~#ffffff|159~#1c1c1c|160~#949494|161~#424242|162~#ffffff|163~inset|164~0|165~0|166~10|167~0|171~#f70021|172~#000000|173~2|174~1|175~1|176~#ff0022|177~#380000|178~#52000b|179~#ffffff|180~#000000|181~0|182~0|183~0|184~#000000|185~inset|186~1|187~1|188~10|189~0|91~#e30000|50~#330000|212~right|92~6|93~25|210~3|211~0|219~3|220~0|209~93|100~#780000|101~1|127~solid|102~7|103~7|104~7|105~7|94~#000899|95~|96~0|97~0|98~16|99~4|106~#ffffff|107~14|108~bold|109~normal|110~none|112~|113~#000000|114~1|115~-1|116~1|51~#b80404|52~#1f0000|124~#fafafa|125~#000000|126~#780000|117~#000899|118~|119~0|120~0|121~18|122~7'),
(8, 'White', '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', 0, 0, 0, '', '0~#ffffff|130~#ffffff|207~17|214~17|213~10|208~17|131~|1~#ffffff|2~1|3~solid|4~10|5~10|6~10|7~10|8~#ffffff|9~inset|10~0|11~0|12~49|13~10|14~#ffffff|15~inset|16~0|17~0|18~50|19~15|20~#3d2d3d|21~24|22~normal|23~normal|24~none|25~left|27~#ffffff|28~2|29~1|30~2|190~5|191~6|192~90|193~3|194~1|195~#302930|196~dashed|197~#3d2d3d|198~12|199~bold|200~italic|201~none|202~|203~#ffffff|204~0|205~0|206~0|215~0|216~0|217~1|218~3|31~#3d2d3d|32~14|33~normal|34~normal|35~none|36~left|37~#ffffff|38~2|39~1|40~1|41~#ff0000|42~18|43~bold|44~normal|46~#ffffff|47~2|48~1|49~1|132~#ffffff|133~#ffffff|168~63|169~93|170~150|134~#b6c9f5|135~1|136~solid|137~7|138~7|139~7|140~7|141~#89a100|142~inset|143~0|144~0|145~0|146~0|147~#000000|148~14|149~normal|150~normal|151~none|152~tahoma|153~#000000|154~0|155~0|156~0|157~#ebebeb|158~#ffffff|159~#1c1c1c|160~#949494|161~#424242|162~#ffffff|163~inset|164~0|165~0|166~10|167~0|171~#f70021|172~#ffffff|173~2|174~1|175~1|176~#ed8e9b|177~#ed8e9b|178~#52000b|179~#ffffff|180~#ffffff|181~0|182~0|183~0|184~#cc7ecc|185~inset|186~1|187~1|188~10|189~0|91~#000000|50~#000000|212~right|92~6|93~25|210~3|211~0|219~3|220~0|209~93|100~#ffffff|101~1|127~solid|102~7|103~7|104~7|105~7|94~#ffffff|95~|96~0|97~0|98~16|99~4|106~#ffffff|107~14|108~bold|109~normal|110~none|112~|113~#000000|114~1|115~-1|116~1|51~#666464|52~#666464|124~#fafafa|125~#000000|126~#ffffff|117~#ffffff|118~|119~0|120~0|121~18|122~7');
";
$wpdb->query($sql);
?>