<?php

namespace Dev4Press\Plugin\TopicPolls\Basic;

use Dev4Press\v53\Core\Plugins\InstallDB as BaseInstallDB;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class InstallDB extends BaseInstallDB {
	protected string $prefix = 'gdpol';
	protected int $version = 20241102;
	protected string $plugin = 'gd-topic-polls';
	protected array $tables = array(
		'votes' => array(
			'name'    => 'votes',
			'columns' => 5,
			'scope'   => 'blog',
			'data'    => "vote_id bigint(20) unsigned NOT NULL AUTO_INCREMENT, \n" .
			             "user_id bigint(20) unsigned NOT NULL default '0', \n" .
			             "poll_id bigint(20) unsigned NOT NULL default '0', \n" .
			             "answer_id smallint(5) unsigned NOT NULL default '0', \n" .
			             "voted datetime NULL default '0000-00-00 00:00:00' COMMENT 'gmt', \n" .
			             "PRIMARY KEY  (vote_id), \n" .
			             "KEY user_id (user_id), \n" .
			             "KEY poll_id (poll_id), \n" .
			             "KEY answer_id (answer_id)",
		),
	);
}
