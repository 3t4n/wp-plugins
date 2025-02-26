<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Node_install extends WInstall {
	public function install(&$object) {
		if ( !empty( $this->newInstall ) || (property_exists($object, 'newInstall') && $object->newInstall) ) {
			$schedulerInstallC = WClass::get( 'scheduler.install', null, 'class', false );
			if ( !empty($schedulerInstallC) ) $schedulerInstallC->newScheduler(
					'security.deleteactivity.scheduler'
					, WText::t('1454276766LNLX')
					, WText::t('1454276766LNLY')
					, 100						, 86400						, 120						, 1					);
			if ( !empty($schedulerInstallC) ) $schedulerInstallC->newScheduler(
					'security.unblock.scheduler'
					, WText::t('1454276766LNLZ')
					, WText::t('1454276766LNMA')
					, 1						, 300						, 60						, 1					);
						$scr = JOOBI_DS_NODE . 'security/install/images/flags';
			$dest = JOOBI_DS_MEDIA . 'images/flags';
			$fileHandler = WGet::folder();
			$fileHandler->move( $scr, $dest, true );
		}
		return true;
	}
	public function addExtensions() {
				$extension = new stdClass;
		$extension->namekey = 'security.system.plugin';
		$extension->name = 'Joobi - Secure Activity';			$extension->folder = 'system';
		$extension->type = 50;
		$extension->publish = 1;
		$extension->certify = 1;
		$extension->destination = 'node|security|plugin';
		$extension->core = 1;
		$extension->params = 'publish=1';
		$extension->description = "Monitor the users' activity and block undesirable users.";
		if ( $this->insertNewExtension( $extension ) ) $this->installExtension( $extension->namekey );
				$extension = new stdClass;
		$extension->namekey = 'security.incident.module';
		$extension->name = 'Joobi - Incidents';
		$extension->folder = 'incident';
		$extension->type = 25;
		$extension->publish = 1;
		$extension->certify = 1;
		$extension->destination = 'node|security|module';
		$extension->core = 1;
		$extension->params = "position=cpanel\npublish=1\naccess=1\nclient=1\nordering=1";
		$extension->description = '';
		if ( $this->insertNewExtension( $extension ) ) $this->installExtension( $extension->namekey );
				$extension = new stdClass;
		$extension->namekey = 'security.activity.module';
		$extension->name = 'Joobi - Logged In Users';
		$extension->folder = 'activity';
		$extension->type = 25;
		$extension->publish = 1;
		$extension->certify = 1;
		$extension->destination = 'node|security|module';
		$extension->core = 1;
		$extension->params = "position=cpanel\npublish=1\naccess=1\nclient=1\nordering=1";
		$extension->description = '';
		if ( $this->insertNewExtension( $extension ) ) $this->installExtension( $extension->namekey );
				$extension = new stdClass;
		$extension->namekey = 'security.blocked.module';
		$extension->name = 'Joobi - Blocked IPs';
		$extension->folder = 'blocked';
		$extension->type = 25;
		$extension->publish = 1;
		$extension->certify = 1;
		$extension->destination = 'node|security|module';
		$extension->core = 1;
		$extension->params = "position=cpanel\npublish=1\naccess=1\nclient=1\nordering=2";
		$extension->description = '';
		if ( $this->insertNewExtension( $extension ) ) $this->installExtension( $extension->namekey );
	}
}