<?php

defined( 'ABSPATH' ) or die( 'Na na na na na...' );

require __DIR__ . '/../backend/SMCBackend.php';
require __DIR__ . '/../frontend/SMCEnqueue.php';

if ( ! class_exists( 'JKSocialMediaChat' ) ) {
	class JKSocialMediaChat {
		public function __construct() {
			SMCBackend::register();
			SMCEnqueue::register();
		}
	}
}

if ( is_admin() ) {
	$JKSocialMediaChat = new JKSocialMediaChat();
}