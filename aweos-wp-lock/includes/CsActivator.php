<?php
class CsActivator {
	public static function activate() {
		// Zuerst alle alten Optionen löschen
		delete_option('wpLockMode');
		delete_option('wpLockUntil');
		delete_option('wpLockFor');
		delete_option('wpLockForI');
		delete_option('wpLockUpdated');
		delete_option('wpLockUnlockFrom');
		delete_option('wpLockUnlockTo');
		delete_option('wpLockLockFrom');
		delete_option('wpLockLockTo');
		delete_option('wpLockMessage');
		delete_option('wpLockDisableFor');
		delete_option('wpLockDisableForI');
		delete_option('wpLockEnableFor');
		delete_option('wpLockEnableForI');

		// Dann neue Optionen mit leeren Standardwerten setzen
		add_option('wpLockMode', '0');
		add_option('wpLockUntil', '');
		add_option('wpLockFor', '');
		add_option('wpLockForI', '');
		add_option('wpLockUpdated', '');
		add_option('wpLockUnlockFrom', '');
		add_option('wpLockUnlockTo', '');
		add_option('wpLockLockFrom', '');
		add_option('wpLockLockTo', '');
		add_option('wpLockMessage', "This site is currently not available. Please return later!");
		add_option('wpLockDisableFor', '');
		add_option('wpLockDisableForI', '');
		add_option('wpLockEnableFor', '');
		add_option('wpLockEnableForI', '');
		add_option('wpLockAllowedRoles', array('administrator'));
	}
}
